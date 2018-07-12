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

Route::get('/','HomeController@bankFirstPage');
Route::get('/banks','HomeController@bank')->name('banks');
Route::get('/banks/{bankname}','HomeController@bankLastPage');

Route::get('/state','HomeController@state')->name('state');

Route::get('/banks/{bankname}/{state}','HomeController@stateLastPage');

Route::get('/banks/{bankname}/{state}/{district}','HomeController@districtLastPage');

Route::get('/banks/{bankname}/{state}/{district}/{city}','HomeController@cityLastPage');

Route::get('/banks/{bankname}/{state}/{district}/{city}/{branch}','HomeController@branchLastPage');

Route::get('/ifsccode','IfscCodeController@index');
Route::get('/ifsccodearray','IfscCodeController@findifsc')->name('ifsccode');







