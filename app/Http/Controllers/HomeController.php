<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\FormSubmit;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $balance = Balance::where('user_id', Auth::id())->first();

        $totalTask = Task::where('user_id', Auth::id())->count();
        $submit = FormSubmit::where('submit_by_user_id', Auth::id())->count();
        return view('dashboard.index', compact('balance', 'totalTask', 'submit'));
    }
}
