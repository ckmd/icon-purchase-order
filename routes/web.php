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

Route::resource('purchase-order','PurchaseOrderController')->middleware('auth');
Route::resource('sbu','SbuController')->middleware('auth');
Route::resource('item','ItemController')->middleware('auth');
Route::resource('report','ReportController')->middleware('auth');
Route::resource('dashboard','DashboardController')->middleware('auth');
Route::resource('add-stock','AddStockController')->middleware('auth');
Route::post('add-stock-reload','AddStockController@reload')->middleware('auth');

Route::get('purchase-order-detail/{po_number}','PurchaseOrderController@detail')->middleware('auth');
