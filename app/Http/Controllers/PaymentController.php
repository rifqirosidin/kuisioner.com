<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{

    public function index()
    {
        $tasks = Task::with(['payment.paymentMethod', 'user'])->has('payment')->latest()->get();
        return view('admin.payment.index', compact('tasks'));

    }

    public function verifyPayment()
    {
        $RECEIVE = 'receive';
        $REJECT = 'reject';

        if (\request()->ajax()){
            $taskId = \request('task_id');
            $type = \request('type');
            $task = Task::find($taskId);
            if ($type == $RECEIVE){
                $active = 1;
                $status = 'verified';
            } elseif ($type == $REJECT){
                $active = 0;
                $status = 'rejected';
            }
            DB::beginTransaction();
            try {
                $task->update([
                    'is_active' => $active
                ]);
                $task->payment()->update([
                   'status' =>  $status
                ]);
                DB::commit();
            }catch (\Exception $exception){
                DB::rollBack();
            }


            Session::flash('success', 'Terima bukti pembayaran sukses');

            return route('payments.index');
        }
    }


}
