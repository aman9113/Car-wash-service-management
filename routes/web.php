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
Route::group(['middleware' => 'guest'], function(){
	Route::get('/', function () {
	    return view('welcome');
	});
	Route::get('/login', 'LoginController@index')->name('login');

	Route::post('/login/store', 'LoginController@store')->name('login.store');

	Route::get('/register', 'RegisterController@index')->name('register');

	Route::post('/register/store', 'RegisterController@store')->name('register.store');

});


Route::group(['middleware' => 'auth'], function(){
	Route::get('/logout', 'LoginController@logout')->name('logout');
});