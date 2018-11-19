<?php

namespace App\Http\Controllers;

use App\Http\Requests\MoneyFormValidation;
use Illuminate\Http\Request;
use App\User;
use App\Models\Balance;

class BalanceController extends Controller
{
    private function amount(){
      $balance = auth()->user()->balance;

      return  $balance;
    }

    public function amountDetails(){
      return view('site.saldo.amount-details')->with('balance', $this->amount());
    }

    public function amountDeposit(){

      return view('site.saldo.amount-deposit')->with('amount', $this->amount());
    }

    public function depositStore(MoneyFormValidation $request){
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

    public function amountWithdraw(){
      return view('site.saldo.amount-withdraw')->with('balance', $this->amount());
    }

    public function withdrawStore(MoneyFormValidation $request){
      if($request->value > $this->amount()){
        return redirect()
          ->back()
          ->with('error', 'Você não possui saldo suficiente para esse saque');
      }

      if($request->value > $this->amount()->avaiable_amount){
        return redirect()
          ->back()
          ->with('error', 'Você precisa sacar de suas categorias para realizar este saque');
      }

      $balance = auth()->user()->balance()->firstOrCreate([]);

      $response = $balance->withdraw($request->value);

      if($response['success'])
        return redirect()
          ->route('amount-details')
          ->with('success', $response['message']);

      return redirect()
        ->back()
        ->with('error', $response['message']);

    }
}
