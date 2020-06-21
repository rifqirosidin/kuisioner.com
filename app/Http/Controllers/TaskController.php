<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTask;
use App\Models\ElementType;
use App\Models\Form;
use App\Models\FormElement;
use App\Models\ListOption;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use mysql_xdevapi\Result;
use function PHPSTORM_META\map;


class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::with('user')->latest()->get();

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
        $task= $task->with('form.formSubmits')->first();

        $result = collect($task->form->formSubmits);


        $datas = array();
        foreach ($result as $data){
            $convert = json_encode($data->value, true);
            array_push($datas, $data->value);
        }
        $removeEscape = array();
        foreach ($datas as $key =>$item){
           array_push($removeEscape, $item[$key]);
        }
        return $removeEscape;
        return view('dashboard.task.result_survey', compact('task','datas'));
    }
    function escapeJsonString($value) {
        # list from www.json.org: (\b backspace, \f formfeed)
        $search = array("\n", "\r", "\u", "\t", "\f", "\b", "/", '"');
        $replace = array("\\n", "\\r", "\\u", "\\t", "\\f", "\\b", "\/", "\"");
        $result = str_replace($search, $replace, $value);
        return $result;
    }

    public function showForm($taskId)
    {
        $task = Task::with(['form.formElements.listOptions'])
            ->has('form')
            ->where(['user_id' => Auth::id(), 'id' => $taskId])
            ->first();

        return view('list_survey.show_form', compact('task'));
    }

    public function edit(Task $task)
    {
        //
    }

    public function update(Request $request, Task $task)
    {
        //
    }

    public function destroy(Task $task)
    {
        //
    }


}
