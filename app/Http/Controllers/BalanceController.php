<?php

namespace App\Http\Controllers;

use App\Http\Requests\MoneyFormValidation;
use Illuminate\Http\Request;
use App\User;
use App\Models\Balance;

class BalanceController extends Controller
{
    public function amountDetails(){
      $balance = auth()->user()->balance;

      $amount = $balance ? $balance->amount : 0;

      return view('site.saldo.amount-details', compact('amount'));
    }

    public function amountDeposit(){
      $balance = auth()->user()->balance;

      $amount = $balance ? $balance->amount : 0;

      return view('site.saldo.amount-deposit', compact('amount'));
    }

    public function amountStore(MoneyFormValidation $request){
      $balance = auth()->user()->balance()->firstOrCreate([]);

      $response = $balance->deposit($request->value);

      if($response['success'])
        return redirect()
                ->route('amount-details')
                ->with('success', $response['message']);

      return redirect()
        ->back()
        ->with('error', $response['message']);
    }
}
