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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



//stub design
//admin
Route::get('admin/home', unction () {
    return view('admin/home');
});

//admin univ

Route::get('university/home', unction () {
    return view('university/home');
});
//applicant

Route::get('applicant/home', unction () {
    return view('applicant/home');
});
