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
Route::get('/home', 'HomeController@index');


//stub
//Route::get('/login', 'LoginController@getLogin')->middleware('guest');
//Route::post('/login', 'LoginController@postLogin');
//Route::get('/logout', 'LoginController@logout');

//Route::get('/login', function () {
//    return view('stub/login');
//});
Route::get('/logout', 'Auth\LoginController@logout');
Auth::routes();
