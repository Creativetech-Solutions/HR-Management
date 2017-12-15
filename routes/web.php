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
//    return view('layout.layout');
//});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('');
Route::get('/employees/view_all', 'Employee\Employee@index');
Route::get('/clients', 'Client\Client@index');
Route::get('/clients/add', 'Client\Client@add');
//Route::get('/clients/store', 'Client\Client@store');
Route::post('/clients/store','Client\Client@store');


