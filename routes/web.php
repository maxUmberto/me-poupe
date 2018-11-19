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
$this->post('historic/search', 'HistoricController@search')->name('search');

//Rota para categorias
$this->get('categories', 'CategoryController@index');
$this->get('categories/add', 'CategoryController@addCategory')->name('add-category');
$this->post('categories/add/store', 'CategoryController@categoryStore')->name('category-store');
$this->get('categories/detail/{id}', 'CategoryController@categoryDetail')->name('category-detail');

//Rota para editar categorias
$this->get('categories/edit/{id}', 'CategoryController@categoryEdit')->name('category-edit');
$this->post('categories/edit/{id}/store', 'CategoryController@editStore')->name('edit-store');

//Rota para adicionar saldo da categoria
$this->get('categories/deposit/{id}', 'CategoryController@categoryDeposit')->name('category-deposit');
$this->post('categories/deposit/{id}/store', 'CategoryController@categoryDepositStore')->name('category-deposit-store');

//Rota para sacar da categoria
$this->get('categories/withdraw/{id}', 'CategoryController@categoryWithdraw')->name('category-withdraw');
$this->post('categories/withdraw/{id}/store', 'CategoryController@categoryWithdrawStore')->name('category-withdraw-store');

//Rota para excluir a categoria
$this->get('categories/delete/{id}', 'CategoryController@categoryDelete')->name('category-delete');
$this->get('categories/delete/{id}/store', 'CategoryController@categoryDeleteStore')->name('store-delete');
