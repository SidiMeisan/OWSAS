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

Route::get('/', 'HomeController@index')->name('home');

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

// admin
// admin --> University

// list  of university
Route::get('/admin/home', 'UniversityController@AdminUniversity');
// add university
// university form
Route::get('admin/university/form', 'UniversityController@AdminUniversityForm');

// store university
Route::post('/university/store', 'UniversityController@AdminAddUni');

// store Admin university 
Route::post('/uniAdmin/store', 'UniversityController@AdminAddAdmin');

// add university admin
Route::get('admin/university/adminform', function () {
    return view('AdminSys/university/adminform');
});


// admin --> qualification
// list of qualification
Route::get('admin/qualification', 'QualificationController@AdminQualification');

// create new qualification
Route::get('admin/qualification/form', function () {
    return view('AdminSys/qualification/qualificationForm');
});
Route::post('/QuaAdmin/store','QualificationController@QualificationStore');


//admin univ
Route::get('university/home', 'ProgrammeController@UniProgramme');

//applicant
Route::get('applicant/home', function () {
    return view('ApplicantSys/home');
});


Route::get('/logout', 'Auth\LoginController@logout');
