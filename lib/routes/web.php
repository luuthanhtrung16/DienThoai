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
Route::group(['prefix'=>'admin'],function(){
	Route::group(['prefix'=>'login','middleware'=>'CheckLogedIn'],function(){
		Route::get('/','LoginController@getLogin');
		Route::post('/','LoginController@postLogin');

	});
	Route::get('logout','LoginController@getLogout');
	Route::group(['prefix'=>'admin','middleware'=>'CheckLogdout'],function(){
		Route::get('home','HomeController@getHome');
		Route::group(['prefix'=>'category'],function(){
			Route::get('/','CategoryController@getCate');
			Route::post('/','CategoryController@postCateAdd');
			Route::get('edit/{id}','CategoryController@getCateEdit');
			Route::post('edit/{id}','CategoryController@postCateEdit');
			Route::get('delete/{id}','CategoryController@getCateDelete');
		});
		Route::group(['prefix'=>'product'],function(){
			Route::get('/','ProductController@getProd');
			Route::get('add','ProductController@getProdAdd');
			Route::post('add','ProductController@postProdAdd');
			Route::get('edit/{id}','ProductController@getProdEdit');
			Route::post('edit/{id}','ProductController@postProdEdit');
			Route::get('delete/{id}','ProductController@getProdDelete');
		});
	});
});
//cái middleware => để kiểm tra xem có login chưa mà vô trang index của admin ấ