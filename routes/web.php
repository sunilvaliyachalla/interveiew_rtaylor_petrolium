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

Route::get('/user-list', "UserController@index");
Route::get('/user-create', "UserController@create");
Route::post('/user-list', "UserController@store");
Route::get('/user-edit', "UserController@edit");
Route::put('/user-update', "UserController@update");
