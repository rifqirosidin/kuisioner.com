<?php

namespace App\Http\Controllers;

use App\Models\PriceBalance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PriceBalanceController extends Controller
{

    public function index()
    {
        $prices = PriceBalance::all();
        return view('admin.setting.balance.index', compact('prices'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
           'price' => 'required|numeric',
           'amount_balance' => 'required|numeric'
        ]);

        Session::flash('success', 'Buat harga saldo sukses');
        PriceBalance::create($validated);
        return redirect()->route('price-balances.index');
    }


    public function edit(PriceBalance $priceBalance)
    {
        return view('admin.setting.balance.edit', compact('priceBalance'));
    }


    public function update(Request $request, PriceBalance $priceBalance)
    {
        $validated = $request->validate([
            'price' => 'required|numeric',
            'amount_balance' => 'required|numeric'
        ]);

        $priceBalance->update($validated);
        Session::flash('success', 'Update harga saldo sukses');
        return redirect()->route('price-balances.index');
    }

    public function destroy(PriceBalance $priceBalance)
    {
        $priceBalance->delete();
        Session::flash('success', 'Hapus harga saldo sukses');
        return route('price-balances.index');
    }

    public function ajaxPrice()
    {
        if (\request()->ajax()){

            try {
                $amount= \request('amount_balance');
                $price = PriceBalance::where('amount_balance', $amount)->first();

                return response()->json($price);
            }catch (\Exception $exception){
                return response()->json($exception);
            }

        }


    }
}
