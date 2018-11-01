<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function amountDetails(){
      return view('site.amount-details');
    }
}
