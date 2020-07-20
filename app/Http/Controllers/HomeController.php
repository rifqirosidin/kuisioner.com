<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\FormSubmit;
use App\Models\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $userId = Auth::id();
        $balance = Balance::where('user_id',$userId)->first();
        $totalTask = Task::where('user_id', $userId)->count();
        $tasks = DB::table('tasks')
            ->join('forms','tasks.id','=','forms.task_id')
            ->selectRaw("forms.id as formId")
            ->whereRaw("tasks.user_id = $userId")
            ->get();
        $formId = [];
        foreach($tasks as $task){
            array_push($formId, $task->formId);
        }

        $submit = FormSubmit::where('submit_by_user_id', $userId)
            ->whereNotIn('form_id', $formId)
            ->count();

        return view('dashboard.index', compact('balance', 'totalTask', 'submit'));
    }
}
