<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

$this->get('amount', 'BalanceController@amountDetails')->name('amount-details');

$this->get('amount/deposit', 'BalanceController@amountDeposit')->name('amount-deposit');
$this->post('amount/deposit/store', 'BalanceController@amountStore')->name('deposit-store');