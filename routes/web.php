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
    return view('auth/login');
});

Auth::routes();

Route::get('/home{any}', 'HomeController@index')->where('any', '.*');

Route::post ( '/storeUser', 'UserController@storeUser' );

Route::get ( '/getUser', 'UserController@getUser' );

Route::get ( '/getSingleUser/{id}', 'UserController@getSingleUser' );

Route::post ( '/deleteManyUsers/{ids}', 'UserController@deleteManyUsers' );

Route::post ( '/updateUser/{ids}', 'UserController@updateUser' );