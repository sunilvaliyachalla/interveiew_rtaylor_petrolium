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
Route::get('/user-edit', "UserController@edit")->name("edit");
Route::put('/user-update', "UserController@update")->name("update");
Route::delete('/user-delete', "UserController@update")->name("delete");
Route::get('/user-show', "UserController@show")->name("show");
