<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\PaymentMethod;
use App\Models\PriceBalance;
use App\Models\TopUpBalance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TopUpBalanceController extends Controller
{

    public function index()
    {
        $topUps = TopUpBalance::with(['user', 'paymentMethod'])->active()->latest()->get();
        return view('admin.verify_balance.index', compact('topUps'));
    }

    public function create()
    {
        $topUpBalances = TopUpBalance::where('user_id', Auth::id())->latest()->get();
        $priceBalances = PriceBalance::all();
        $paymentMethods = PaymentMethod::all();

         return view('dashboard.top_up.create', compact('topUpBalances', 'priceBalances', 'paymentMethods'));
    }

    public function store(Request $request)
    {
        $userId = Auth::id();
        $validated = $request->validate([
            'amount_balance' => 'required|numeric',
            'proof_of_payment' => 'required|image:png,jpeg,jpg',
            'price' => 'required|numeric',
            'payment_method_id' => 'required|numeric'
        ]);
        if ($request->file('proof_of_payment')){
            $validated['proof_of_payment'] = $request->file('proof_of_payment')->store('payment');
        }
            $validated['user_id'] = $userId;
        TopUpBalance::create($validated);
        Session::flash('success', 'Top up Success');
        return redirect()->route('top-up.create');

    }

    public function ajaxVerified()
    {
        DB::beginTransaction();
        if (\request()->ajax()){
            try {
                $id = \request('id');
                $userId = \request('user_id');
                $topUp = TopUpBalance::find($id);
                $topUp->update([
                    'status' => 1
                ]);

                $oldBalance = Balance::where('user_id', $userId)->first();
                if (isset($oldBalance)){
                    $oldBalance = $oldBalance->amount;
                }else {
                    $oldBalance = 0;
                }
                $currentBalance =  $oldBalance + \request('amount_balance');

                Balance::updateOrCreate(
                    [
                        'user_id' => $userId ],
                    [
                        'user_id' => $userId,
                        'amount' => $currentBalance
                    ]
                );
                DB::commit();
                Session::flash('success', 'Terima pembayaran sukses');
            }catch (\Exception $exception){
                return $exception;
                DB::rollBack();
            }
            return route('top-up.index');

        }
    }

    public function ajaxUnVerified()
    {
        if (\request()->ajax()){
            try {
                $id = \request('id');
                $topUp = TopUpBalance::find($id);
                $topUp->update([
                    'status' => 0
                ]);


            }catch (\Exception $exception){
                return $exception;
            }
            Session::flash('success', 'Tolak pembayaran sukses');
            return route('top-up.index');

        }
    }

}
