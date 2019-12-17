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


//Route::get('/user','User@user');
//Route::get('/user/add','User@user');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');





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




// admin --> qualification
// list of qualification
Route::get('admin/qualification', 'QualificationController@AdminQualification');

// create new qualification
Route::get('admin/qualification/form','QualificationController@QualificationForm');

Route::post('/QuaAdmin/store','QualificationController@QualificationStore');


//admin university
Route::get('university/home', 'ProgrammeController@UniProgramme');
//programme form
Route::get('programme/form', 'ProgrammeController@UniAddProgrammeForm');
//store programme 
Route::post('programme/store', 'ProgrammeController@UniAddProg');
//edit form
Route::get('programme/edit/{id}', 'ProgrammeController@UniAddProgrammeEditForm');
Route::post('programme/Estore', 'ProgrammeController@UniEditProg');

//applicant
Route::get('applicant/home', 'ApplicationController@Home');


Route::get('/logout', 'Auth\LoginController@logout');

//fake

Route::get('/home',function ()
{
	# code...
	return view('fake/');
});