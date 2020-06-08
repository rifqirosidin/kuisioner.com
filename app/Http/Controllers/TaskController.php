<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTask;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        //
    }

    public function store(StoreTask $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();

        try {
            Task::create($validated);
            Session::flash('success', 'Created Survey Successfully');
            return redirect()->back();
        }catch (\Exception $exception){
            Session::flash('error', 'Created Survey Failed');
            return redirect()->back();
        }
    }

    public function show(Task $task)
    {

        return view('dashboard.task.show', compact('task'));
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
