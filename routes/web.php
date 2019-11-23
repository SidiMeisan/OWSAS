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
Route::get('admin/home', function () {
    return view('admin/home');
});
// admin --> University
// add university
Route::get('admin/university/register', function () {
    return view('admin/university/form');
});
// add university admin
Route::get('admin/university/register', function () {
    return view('admin/university/Adminform');
});
// admin --> qualification
// list of qualification
Route::get('admin/qualification', function () {
    return view('admin/qualification/qualification');
});
// create new qualification
Route::get('admin/qualification/add', function () {
    return view('admin/qualification/qualificationForm');
});

// list of qualification
Route::get('admin/qualification', function () {
    return view('admin/qualification/qualification');
});


//admin univ
Route::get('university/home', function () {
    return view('university/home');
});

//applicant
Route::get('applicant/home', function () {
    return view('applicant/home');
});
