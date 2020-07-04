<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTask;
use App\Models\FormSubmit;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::with('user')->where('user_id', Auth::id())->latest()->get();

        return view('dashboard.task.index', compact('tasks'));
    }

    public function create()
    {

        return view('dashboard.task.create');
    }

    public function store(StoreTask $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();
        $respondentFee = request('respondent_fee');
        $numberOfRespondents = request('number_of_respondents');
        $subTotal = $numberOfRespondents * $respondentFee;
        $costAdmin = $subTotal * 0.05;
        $total = $costAdmin + $subTotal;

        $validated['total_cost'] = $total;
        try {

           $task = Task::create($validated);

            Session::flash('success', 'Task saved');
            return redirect()->route('surveys.create', $task->id);
        }catch (\Exception $exception){
            Session::flash('error', 'Task failed to save');
            return redirect()->back();
        }

    }

    // hasil survey
    public function show(Task $task)
    {
        $task= Task::with(['form.formSubmits','form.formElements'])
            ->has('form')
            ->where('id', $task->id)
            ->first();

        if (isset($task)){
            $result = collect($task->form->formSubmits);
            $length = collect($task->form->formElements)->count();
//            $totalResponses = $result->where('submit_by_user_id', '!=', Auth::id())->count();
            $totalResponses = $result->count();

            $respondent = array();
            foreach ($result as $key => $item) {
                $respondent[$key] = json_decode($item->value, true);
            }

            $collect = collect($respondent);

            $responses = array();
            for ($i=0;$i<$length;$i++){
                $responses[$i] = array($i+1 =>  $collect->pluck($i+1));
            }
        } else {
            $collect = "";
            $responses = "";
            $totalResponses= 0;
        }

        return view('dashboard.task.result_survey', compact('task','responses', 'collect', 'totalResponses'));
    }

    public function showForm($taskId)
    {
        $task = Task::with(['form.formElements.listOptions'])
            ->has('form')
            ->where('id', $taskId)
            ->first();

        $submitUser = FormSubmit::where(['submit_by_user_id' => Auth::id(), 'form_id' => $task->form->id])->first();

        if (isset($submitUser) && $task->user_id != Auth::id()){
            Session::flash('error', 'Anda sudah mengerjakan survey ini');
            return redirect()->route('list.survey');
        }

        return view('list_survey.show_form', compact('task'));
    }

    public function edit(Task $task)
    {

        return view('dashboard.task.edit', compact('task'));
    }

    public function update(StoreTask $request, Task $task)
    {
        $validated = $request->validated();
        $task->update($validated);
        Session::flash('success', 'Update task sukses');
        return redirect()->route('tasks.index');

    }

    public function destroy(Task $task)
    {
        $task->delete();
        Session::flash('success', 'Hapus task sukses');
        return route('tasks.index');
    }

}
