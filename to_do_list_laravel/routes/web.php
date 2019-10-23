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

// Auth the login
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//Route::resource('todos'.'TodosController');

//show the data
Route::get('todos','TodosController@index');
Route::get('todos/{todo}','TodosController@show');

//create data
Route::get('newTodos','TodosController@create');
Route::post('store-todos','TodosController@store');

//edit data
Route::get('todos/{todo}/edit','TodosController@edit');
Route::post('todos/{todo}/update-todos','TodosController@update');

//delete data
Route::get('todos/{todo}/delete','TodosController@destroy');




