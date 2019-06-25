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

Route::get('index',[
	'as'=>'trang-chu',
	'uses'=>'PageController@getIndex'
]);

Route::get('index/ajax',[
	'as'=>'demo-ajax',
	'uses'=>'PageController@getIndex'
]);

Route::get('loai-san-pham/{type}',[
	'as'=>'loaisanpham',
	'uses'=>'PageController@getLoaiSp'
]);

Route::get('chi-tiet-san-pham/{id}',[
	'as'=>'chitietsanpham',
	'uses'=>'PageController@getChitiet'
]);

Route::get('lien-he',[
	'as'=>'lienhe',
	'uses'=>'PageController@getLienhe'
]);

// Route::get('gioi-thieu'[
// 	'as'=>'gioithieu',
// 	'uses'=>'PageController@getGioithieu'
// ]);

Route::get('/product/{id}',[ 
	'as'=>'detailProduct',
	'uses'=>'PageController@getDetailProduct'
]);

Route::get('/saleproduct/{id}',[
	'as'=>'saleProduct',
	'uses'=>'PageController@getSaleProduct'
]);

Route::get('add-to-cart/{id}',[
	'as'=>'themgiohang',
	'uses'=>'PageController@getAddtoCart'
]);

Route::get('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@getLogin'
]);

Route::post('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@postLogin'
]);

Route::get('dang-ky',[
	'as'=>'signup',
	'uses'=>'PageController@getSignup'
]);

Route::post('dang-ky',[
	'as'=>'signup',
	'uses'=>'PageController@postSignup'
]);

Route::get('dang-xuat',[
	'as'=>'logout',
	'uses'=>'PageController@getLogout'
]);

Route::get('search',[
	'as'=>'search',
	'uses'=>'PageController@getSearch'
]);



