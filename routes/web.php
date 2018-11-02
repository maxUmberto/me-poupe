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

/* Rotas para ver detalhes do saldo */
$this->get('amount', 'BalanceController@amountDetails')->name('amount-details');

//Rotas para inseris saldo
$this->get('amount/deposit', 'BalanceController@amountDeposit')->name('amount-deposit');
$this->post('amount/deposit/store', 'BalanceController@depositStore')->name('deposit-store');

//Rotas para sacar
$this->get('amount/withdraw', 'BalanceController@amountWithdraw')->name('amount-withdraw');
$this->post('amount/withdraw/store', 'BalanceController@withdrawStore')->name('withdraw-store');

//Rota para ver o histórico
$this->get('historic', 'HistoricController@historic');