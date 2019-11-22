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

/*
	This is admin OWSAS 
*/

// User
//Route::get('/user','User@user');
//Route::get('/user/add','User@user');



//Route::get('/qualification','QualificationController@index');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');


