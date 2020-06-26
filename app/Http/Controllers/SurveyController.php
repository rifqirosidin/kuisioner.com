<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePayment;
use App\Models\Balance;
use App\Models\ElementType;
use App\Models\Form;
use App\Models\FormElement;
use App\Models\FormSubmit;
use App\Models\ListOption;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Task;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SurveyController extends Controller
{

    public function index()
    {
        $userId = Auth::id();
        if (Auth::check()) {
            $taskId = Task::where(['user_id' => $userId])->get(['id']);
            $formId = Form::whereIn('task_id', $taskId)->get(['id']);
            $submitByUserId = FormSubmit::where('submit_by_user_id', $userId)
                ->whereNotIn('form_id', $formId)
                ->get(['form_id']);
            $tasks = Task::with(['user', 'form' => function ($query) use ($submitByUserId) {
                $query->whereNotIn('id', $submitByUserId);
            }])->active()->latest()->get();

        } else {

            $tasks = Task::with('user')->active()->latest()->get();
        }

        return view('list_survey.index', compact('tasks'));
    }

    public function create($taskId)
    {
        $task = $this->checkTask($taskId);
        if (isset($task->form)) {
            Session::flash('success', 'Survey already exist');
            return redirect()->route('tasks.index');
        }

        $paymentMethods = PaymentMethod::all();
        $balance = Balance::where('user_id', Auth::id())->first();

        return view('dashboard.survey.create', compact('task', 'paymentMethods', 'balance'));
    }

    public function checkTask($id)
    {
        $task = Task::with('form')->where(['id' => $id, 'user_id' => auth()->id()])->first();

        if (!isset($task)) {
            abort(404);
        }

        return $task;
    }

    public function store(Request $request, $taskId, StorePayment $payment)
    {
        $TYPE_RADIO = 'radio';
        $TYPE_CHECKBOX = 'checkbox';
        $TYPE_SELECT = 'select';
        $length = \request('label-question');
//        $taskId = \request()->route('taskId');

        $input = $request->all();
//        return $input;
        DB::beginTransaction();
        try {
            $this->storePayment($payment, $taskId);

            $form = Form::firstOrCreate(
                ['task_id' => $taskId],
                [
                    'task_id' => $taskId,
                    'closing_sentence' => \request('closing_sentence')
                ]);
            foreach ($length as $key => $item) {
                $request->validate([
                    'label-question' => 'required'
                ]);
                $type = $input['element_type'][$key];

                $elementType = ElementType::where('name', $type)->first();

                $element = FormElement::firstOrCreate(
                    [
                        'form_id' => $form->id,
                        'column_id' => $key + 1,
                        'element_type_id' => $elementType->id,
                        'name' => $input['label-question'][$key],
                        'is_required' => isset($input['required'][$key]) ? $input['required'][$key] : ""
                    ]);

                if ($type == $TYPE_RADIO) {
                    $id = $key + 1;
                    $radio = $input["radio-option_$id"];
                    foreach ($radio as $radioId => $i) {
                        $value = $radio[$radioId];
                        $this->storeOptionElement($element->id, $value, $type);
                    }
                }
                if ($type == $TYPE_CHECKBOX) {
                    $id = $key + 1;
                    $checkbox = $input["checkbox-option_$id"];
                    foreach ($checkbox as $checkboxId => $item) {
                        $value = $checkbox[$checkboxId];
                        $this->storeOptionElement($element->id, $value, $type);
                    }
                }
                if ($type == $TYPE_SELECT) {
                    $id = $key + 1;
                    $select = $input["select-option_$id"];
                    foreach ($select as $selectId => $item) {
                        $value = $select[$selectId];
                        $this->storeOptionElement($element->id, $value, $type);
                    }
                }
                $balance = Balance::where('user_id', Auth::id())->first();
                $totalCost = request('total_cost');
                if (\request('payment_method_id') == 1) {
                    if ($balance->amount >= $totalCost) {
                        $currentBalance = $balance->amount - $totalCost;
                        $balance->update([
                            'amount' => $currentBalance
                        ]);

                        Task::find($taskId)->update([
                            'is_active' => 1
                        ]);

                    } else {
                        Session::flash('error', 'Saldo anda tidak cukup silahkan Top Up');
                        return redirect()->back();
                    }

                }
            }
            DB::commit();
            Session::flash('success', 'Created Survey Successfully');
            return redirect()->route('tasks.index');
//            return redirect()->route('tasks.index');
        } catch (Exception $exception) {
            DB::rollBack();
            return $exception;
        }
    }

    public function storePayment(StorePayment $payment, $taskId)
    {
        $validated = $payment->validated();
        $userId = Auth::id();
        if (\request('payment_method_id') != 1) {
            \request()->validate([
                'proof_of_payment' => 'required|image:jpg,jpeg,png,svg',
            ]);
        }

        $task = $this->checkTask($taskId);
        if (\request()->file('proof_of_payment')) {
            $validated['proof_of_payment'] = \request()->file('proof_of_payment')->store('payment');
        }

        $validated['amount'] = $task->total_cost;
        $validated['user_id'] = $userId;
        $validated['task_id'] = $taskId;

        Payment::create($validated);

    }


    public function storeOptionElement($formElementId, $value, $type)
    {
        ListOption::create([
            'form_element_id' => $formElementId,
            'value' => $value,
            'type' => $type
        ]);

    }

    public function submitForm($formId)
    {
        $json = json_encode(\request()->except('_token'));
        $submitUser = FormSubmit::where(['submit_by_user_id' => Auth::id(), 'form_id' => $formId])->first();
        $form = Form::with('task')->where('id', $formId)->first();

        $mySurvey = Task::with('form')->where(['user_id' => Auth::id(), 'id' => $form->task->id])->first();

        if (isset($submitUser) && $form->task->user_id != Auth::id()) {
            Session::flash('error', 'Anda sudah mengerjakan survey ini');
            return redirect()->route('list.survey');
        }

        if ($form->task->total_responses >= $form->task->number_of_respondents){
            Session::flash('error', 'Target survey sudah terpenuhi');
            return redirect()->route('list.survey');
        }

        DB::beginTransaction();
        try {
            if (!isset($mySurvey)){
                $response = $form->task->total_responses + 1;
                $form->task()->update([
                   'total_responses' => $response
                ]);
            }

            FormSubmit::create([
                'form_id' => $formId,
                'value' => $json,
                'submit_by_user_id' => Auth::id()

            ]);

            if ($form->task->user_id != Auth::id()) {
                $fee = $form->task->respondent_fee;
                $balance = Balance::where('user_id', Auth::id())->first();
                if (isset($balance)){
                    $currentBalance = $balance->amount + $fee;
                }else{
                    $currentBalance = $fee;
                }

               Balance::updateOrCreate(
                        ['user_id' => Auth::id()],
                        [
                            'user_id' => Auth::id(),
                            'amount' => $currentBalance,
                        ]
                    );
            }

            DB::commit();
            Session::flash('success', 'Terima kasih sudah mengisi survey ini');
            return redirect()->route('closing.sentence', $formId);
        } catch (Exception $exception) {
            return $exception;
            Session::flash('error', 'Survey gagal diisi');
            DB::rollBack();
            return redirect()->back();
        }

    }

    public function closingSentence($formId)
    {
        $form = Form::find($formId);

        return view('list_survey.closing_sentence', compact('form'));
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


}
