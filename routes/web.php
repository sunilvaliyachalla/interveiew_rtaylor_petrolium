<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/user-list', "UserController@index")->name("index");
Route::get('/user-create', "UserController@create")->name("create");
Route::post('/user-list', "UserController@store")->name("store");
Route::get('/user-edit/{user}', "UserController@edit")->name("edit");
Route::put('/user-update/{user}', "UserController@update")->name("update");
Route::delete('/user-delete/{user}', "UserController@destroy")->name("delete");
Route::get('/user-show/{user}', "UserController@show")->name("show");
