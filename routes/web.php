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

//pages routes
Route::get('/signin','DoctorsController@signin');
Route::get('/login','DoctorsController@login');

Route::get('/pills','PillsController@index');
Route::get('/certificates','CertificateController@index');
Route::get('/workers','DoctorsController@workers');
Route::get('/new','DoctorsController@new');
Route::get('/fired','DoctorsController@fired');
Route::get('/income','IncomesController@index');

//routes for signin
Route::post('/signin','DoctorsController@store');

//routes for login
Route::post('/login','DoctorsController@logon');

//for tests
Route::get('user/test','DoctorsController@test');

Route::get('/main','DoctorsController@main');

//==PATIENTS ROUTES==//

//--patient page--//
Route::get('/patients','PatientsController@index');
//--store new patient--//
Route::post('/patients/store','PatientsController@store');
//--update patient insurance--//
Route::post('/insurance/update','PatientsController@update');

//==================//


//==PILLS ROUTES==//

//--pills page--//
Route::get('/pills','PillsController@index');
//--sell pills--//
Route::post('/pills/store','PillsController@store');

//==================//


//==INCOMES ROUTES==//

//--income page--//
Route::get('/income','IncomesController@index');
//--add new income--//
Route::post('/income/store','IncomesController@addNewIncome');

//==================//

//pills routes
Route::post('/pills/store','PillsController@store');

//insurance routes
Route::get('user/insurance','PatientsController@patients');


//patient routes
Route::get('/patients/{patient}','PatientsController@show');



Route::post('/certificate/store','CertificateController@store');
Route::post('/medcertificate/store','CertificateController@medCertifStore');
Route::post('/pscertificate/store','CertificateController@psychCertifStore');

Route::post('/new/{reg_number}','DoctorsController@new');
Route::post('/fire/{reg_number}','DoctorsController@fired');