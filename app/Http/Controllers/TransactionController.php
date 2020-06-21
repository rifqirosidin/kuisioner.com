<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class TransactionController extends Controller
{

    public function index()
    {
        $payments = Payment::with(['paymentMethod','task'])->latest()->get();
        return view('transaction.index', compact('payments'));
    }


    public function edit($id)
    {
        $transaction = Payment::find($id);
        $paymentMethods = PaymentMethod::all();

        return view('transaction.edit', compact('transaction', 'paymentMethods'));
    }


    public function update(Request $request, $id)
    {
       $validated = $request->validate([
           'payment_method_id' => 'required|numeric' ,
           'amount' => 'required' ,

        ]);
        $payment = Payment::find($id);
       if ($request->hasFile('proof_of_payment')){
           Storage::delete($payment->proof_of_payment);
           $validated['proof_of_payment'] = $request->file('proof_of_payment')->store('payment');
       }

        $payment->update($validated);
        return redirect()->route('transactions.index');
    }

    public function destroy($id)
    {
        $payment = Payment::find($id);
        try {
            $payment->delete();
            Storage::delete($payment->proof_of_payment);
            Session::flash('success', 'Delete transaksi berhasil');
            return route('transactions.index');
        }catch (\Exception $exception){
            Session::flash('success', 'Delete transaksi gagal');
            return route('transactions.index');
        }

    }
}
