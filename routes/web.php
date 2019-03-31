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


Route::group(['as' => 'api.bathTime.', 'namespace' => 'Api'], function () {
    Route::get('/search', 'BathTimeController@search')->name('search');
});
Route::get('/', function () {
    return view('welcome');
});