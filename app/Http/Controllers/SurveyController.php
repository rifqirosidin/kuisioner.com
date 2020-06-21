<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePayment;
use App\Models\ElementType;
use App\Models\Form;
use App\Models\FormElement;
use App\Models\FormSubmit;
use App\Models\ListOption;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Task;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class SurveyController extends Controller
{

    public function index()
    {
        $tasks = Task::with('user')->latest()->get();
        return view('list_survey.index', compact('tasks'));
    }

    public function create($taskId)
    {
       $task = $this->checkTask($taskId);
       if (isset($task->form)){
//           Session::flash('success', 'Survey already exist');
//           return redirect()->route('tasks.index');
       }

      $paymentMethods = PaymentMethod::all();
        return view('dashboard.survey.create', compact('task','paymentMethods'));
    }

    public function checkTask($id)
    {
        $task = Task::with('form')->where(['id' => $id, 'user_id' => auth()->id()])->first();

        if (!isset($task)){
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
             $this->storePayment($payment,$taskId);

            $form = Form::firstOrCreate(
                ['task_id' => $taskId],
                [
                    'task_id' => $taskId,
                    'closing_sentence' => \request('closing_sentence')
                ]);
            foreach ($length as $key => $item){
                $request->validate([
                    'label-question' => 'required'
                ]);
                $type = $input['element_type'][$key];

                $elementType = ElementType::where('name', $type)->first();

                $element = FormElement::firstOrCreate(
                    [
                       'form_id' => $form->id,
                       'column_id' => $key+1,
                       'element_type_id' => $elementType->id,
                        'name' => $input['label-question'][$key],
                        'is_required' => isset($input['required'][$key]) ? $input['required'][$key]: ""
                    ]);

                if ($type == $TYPE_RADIO){
                    $id = $key + 1;
                    $radio = $input["radio-option_$id"];
                    foreach ($radio as $radioId => $i){
                        $value = $radio[$radioId];
                        $this->storeOptionElement($element->id, $value, $type);
                    }
                }
                if ($type == $TYPE_CHECKBOX){
                    $id = $key + 1;
                    $checkbox = $input["checkbox-option_$id"];
                    foreach ($checkbox as $checkboxId => $item){
                        $value = $checkbox[$checkboxId];
                        $this->storeOptionElement($element->id, $value, $type);
                    }
                }
                if ($type == $TYPE_SELECT){
                    $id = $key + 1;
                    $select = $input["select-option_$id"];
                    foreach ($select as $selectId => $item){
                        $value = $select[$selectId];
                        $this->storeOptionElement($element->id, $value, $type);
                    }
                }


            }
            DB::commit();
            Session::flash('success', 'Created Survey Successfully');
            return redirect()->back();
//            return redirect()->route('tasks.index');
        }catch (\Exception $exception){
            DB::rollBack();
            return $exception;
        }


    }



    public function storePayment(StorePayment $payment, $taskId)
    {
       $validated = $payment->validated();
       $userId =  Auth::id();
        $task = $this->checkTask($taskId);
       if (\request()->file('proof_of_payment')){
           $file = \request()->file('proof_of_payment');
           $validated['user_id'] = $userId;
           $validated['task_id'] =  $taskId;
           $validated['proof_of_payment'] =  \request()->file('proof_of_payment')->store('payment');
           $validated['amount'] =  $task->total_cost;

       }

      Payment::create($validated);

    }


    public function storeOptionElement($formElementId, $value, $type)
    {
            ListOption::create([
                'form_element_id' => $formElementId,
                'value' => $value,
                'type' =>$type
            ]);

    }

    public function submitForm($formId)
    {
        $json = json_encode(\request()->except('_token'));

        FormSubmit::create([
           'form_id' => $formId,
            'value' => $json,
            'submit_by_user_id' => Auth::id()

        ]);
        Session::flash('success', 'Data Berhasil disimpan');
        return redirect()->route('closing.sentence', $formId);
    }

    public function closingSentence($formId)
    {
        $form = Form::find($formId);

        return view('dashboard.survey.closing_sentence', compact('form'));
    }



    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function store_old(Request $request)
    {
        if (\request()->ajax()){

            $columnId = \request('column_id');
            $name = \request('name'); //question or label form
            $typeElement = \request('element_type'); //ex: text,radio, dll
            $required = \request('is_required');


            $optionValue = \request('option_value');

            $optionType = \request('type'); //ex:checkbox,radio
            $taskId = \request('task_id');



            try {
                $this->storeFormElement($taskId, $typeElement, $columnId, $name, $required, $optionValue);

                try {$this->storeOptionElement($optionValue, $optionType, $taskId, $columnId);
                }catch (\Exception $exception){
                    return $exception;
                }

                $form = Form::where('task_id', $taskId)->get();
                return response()->json($form);

//               if (!isset($name) && !isset($optionValue)){
//                   Session::flash('success', 'Created Survey Successfully');
//                   return route('tasks.index');
//               }
                return route('tasks.index');
            }catch (\Exception $exception){
                return response()->json($exception);
                Session::flash('error', 'Created Survey Failed');
                return route('tasks.create');
            }

        }
    }

}
