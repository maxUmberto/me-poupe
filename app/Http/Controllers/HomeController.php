<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    private $totalPage = 6;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $balance = auth()->user()->balance;
      $categories = auth()->user()->categories()->orderByRaw('created_at DESC')->limit(6)->get();

      $amount = $balance ? $balance->amount : 0;
        return view('home', compact('amount', 'categories'));
    }
}
