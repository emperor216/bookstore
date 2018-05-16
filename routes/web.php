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

//Route::get('/', function () {
//  return view('welcome');
//});
Route::get('/', function () { return view('index'); });
Route::get('/index', function () { return view('index'); });
Route::get('/introduce', function () { return view('introduce'); });// 关于我们
Route::get('/products', 'ProductsController@index');// 列表页
Route::get('/single', 'SingleController@index');// 详情页
Route::post('/append', 'AppendController@index');// 加入购物车
Route::get('/checkout', 'CheckoutController@index');// 购物车
Route::post('/manage', 'ManageController@index');// 订单管理
Route::get('/cancel', 'CancelController@index');// 取消商品

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
