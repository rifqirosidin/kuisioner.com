<?php

namespace App\Http\Controllers;


use App\Http\Requests\StorePaymentMethod;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentMethodController extends Controller
{

    public function index()
    {
        $paymentMethods = PaymentMethod::all();
        return view('admin.setting.payment_method.index', compact('paymentMethods'));
    }

    public function store(StorePaymentMethod $request)
    {
       $validated = $request->validated();
        PaymentMethod::create($validated);
        Session::flash('success', 'Created Payment Method Successfully');
        return redirect()->back();
    }

    public function edit($id)
    {
        $paymentMethod = PaymentMethod::find($id);
        return view('admin.setting.payment_method.edit', compact('paymentMethod'));
    }

    public function update(StorePaymentMethod $request, $id)
    {
        $validated = $request->validated();
        $paymentMethod = PaymentMethod::find($id);
        $paymentMethod->update($validated);
        Session::flash('success', 'Updated Payment Method Successfully');
        return redirect()->route('payment-methods.index');
    }

    public function destroy($id)
    {
        PaymentMethod::destroy($id);
        Session::flash('success', 'Deleted Payment Method Successfully');
        return route('payment-methods.index');
    }
}
