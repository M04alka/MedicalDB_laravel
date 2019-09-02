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

Route::get('/certificates','CertificateController@index');
//insurance routes
Route::get('user/insurance','PatientsController@patients');
Route::post('/certificate/store','CertificateController@store');
Route::get('/fire/{reg_number}','DoctorsController@fire');

//==LOGIN ROUTES==//

//--login page--//
Route::get('/login','LoginController@index');
//--authentication--//
Route::post('/login','LoginController@store');

//==================//


//==SIGNIN ROUTES==//

//--signin page--//
Route::get('/signin','SigninController@index');
//--registration--//
Route::post('/signin','SigninController@store');

//==================//


//==MAIN ROUTES==//

//--main page--//
Route::get('/main','MainController@index');

//==================//


//==PATIENTS ROUTES==//

//--patient page--//
Route::get('/patients','PatientsController@index');
//--store new patient--//
Route::post('/patients/store','PatientsController@store');
//--update patient insurance--//
Route::post('/insurance/update','PatientsController@update');

//==================//


//==PATIENT CARD ROUTES==//

//--patient page--//
Route::get('/patients/{patient}','PatientController@index');
//--store med certificate--//
Route::post('/medcertificate/store','CertificateController@medCertifStore');
//--store psy certificate--//
Route::post('/pscertificate/store','CertificateController@psychCertifStore');

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
Route::post('/income/store','IncomesController@store');

//==================//


//==WORKERS ROUTES==//

//--workers page--//
Route::get('/workers','WorkersController@index');

//==================//


//==NEW USERS ROUTES==//

//--new users page--//
Route::get('/new','NewWorkers@index');
//--hire or delete new doctor--//
Route::put('/new/decide','NewWorkers@update');

//==================//


//==FIRED DOCTORS ROUTES==//

//--fired doctors page--//
Route::get('/fired','FiredController@index');
//--restore fired doctor--//
Route::put('/restore/{reg_number}','DoctorsController@restore');

//==================//

