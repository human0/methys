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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
	Route::get('/', 'VehicleController@index');
	Route::resource('vehicle', 'VehicleController');
	Route::resource('userdetail', 'userdetailController', ['only' => ['index', 'store']]);
	Route::resource('type', 'typeController', ['only' => ['index', 'store']]);
	Route::resource('manufacturer', 'manufacturerController', ['only' => ['index', 'show']]);
});