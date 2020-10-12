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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','GoutteController@doWebScraping');
Route::post('/cart/add','CartController@cartAdd')->name('cart.add');
Route::get('/cart','CartController@cartPage')->name('cart.page');
Route::post('/cart/update','CartController@cartUpdate')->name('cart.update');
Route::get('/cart/delete/{rowId}','CartController@cartDelete')->name('cart.delete');
Route::get('/checkout','CartController@checkout')->name('checkout.page');
Route::post('/order/store','CartController@orderStore')->name('order.store');
Route::get('/order','CartController@orderPage')->name('order');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/order/detail/{id}', 'HomeController@detail')->name('order.details');
