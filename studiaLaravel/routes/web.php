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
Route::get('/','Studia_Controller');
Route::get('/studenci', 'StudentController@showAll');
Route::post('/studenci/edit/{id}', 'StudentController@edit');
Route::post('/studenci/update/{id}', 'StudentController@update')->name('update');
Route::post('/studenci/destroy/{id}', 'StudentController@destroy')->name('destroy');
Route::resource('przedmiots', 'PrzedmiotController');
Route::resource('ocenas', 'OcenaController');
