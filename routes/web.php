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

Route::get('/' , 'mailController@index')->name('top');

Route::post('confirm' , 'mailController@confirm')->name('confirm');

Route::get('show' , 'mailController@show')->name('show');

Route::post('inquiry' , 'mailController@inquiry')->name('inquiry');

Route::get('send' , 'mailController@send')->name('send');