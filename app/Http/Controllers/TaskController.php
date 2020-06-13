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


    public function show(Task $task)
    {

        return view('dashboard.task.show', compact('task'));
    }

    public function showForm($taskId)
    {
        $task = Task::with(['form.formElements.listOptions'])
            ->has('form')
            ->where(['user_id' => Auth::id(), 'id' => $taskId])
            ->first();

        return view('dashboard.task.show_form', compact('task'));
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
