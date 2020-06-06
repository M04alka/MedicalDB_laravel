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

//==INFO ROUTES==//

//--info page--//
Route::get('/info','InfoController@index');
//==================//


//==PATIENTS ROUTES==//

//--patient page--//
Route::get('/patients','PatientController@index');
//--store new patient--//
Route::post('/patients/store','PatientController@store');
//--update patient insurance--//
Route::post('/insurance/update','PatientController@update');
//--update patient insurance--//
Route::get('/insurance/active/{reg_number}','PatientController@activateInsurance');

//==================//


//==PATIENT CARD ROUTES==//

//--patient page--//
Route::get('/patients/{reg_number}','PatientController@show');
//--store med certificate--//
Route::post('/medcertificate/store','PatientController@medCertifStore');
//--store psy certificate--//
Route::post('/pscertificate/store','PatientController@psychCertifStore');
//--store new recipe--//
Route::post('/recipe/store','PatientController@storeRecipe');

//==================//

//==PILLS ROUTES==//

//--pills page--//
Route::get('/pills','PillController@index');
//--sell pills--//
Route::post('/pills','PillController@store');

//==================//

//==INCOMES ROUTES==//

//--income page--//
Route::get('/incomes','IncomeController@index');
//--add new income--//
Route::post('/incomes','IncomeController@store');

//==================//

//==MORGUE ROUTES==//

//--morgue page--//
Route::get('/morgue','MorgueController@index');
//--store new body--//
Route::post('/morgue','MorgueController@store');

//==================//

//==WORKERS ROUTES==//

//--workers page--//
Route::get('/workers','WorkerController@index');
//--hire new doctor--//
Route::put('/worker/update','WorkerController@update');
//--delete new user--//
Route::put('/worker/delete','WorkerController@delete');
//--update doctor's role--//
Route::put('/worker/newrole','WorkerController@updateRole');
//--fire doctor--//
Route::delete('/worker/fire','WorkerController@fireWorker');
//--restore fired doctor--//
Route::put('/worker/restore','WorkerController@restoreWorker');

//==================//

//==NAVBAR ROUTES==//

//--fired doctors page--//
Route::get('/find','NavbarController@find');

//==================//



//==SETTINGS ROUTES==//

//--settings page--//
Route::get('/settings','SettingController@index');
//--set pills count for selling--//
//Route::post('/settings/pillscount/store','SettingsPageController@setPillsCount');
//--auto active insurance setting--//
//Route::post('/settings/autoinsurance/store','SettingsController@insuranceAutoActive');
//--allow to sell pill without insurance--//
//Route::post('/settings/sellpills/store','SettingsController@sellPillsWithoutInsurance');
//--add new or update existing pill--//
Route::post('/settings/updateorcreatepill','SettingController@updateOrCreatePill');

//==================//


//==HOSPITAL ROUTES==//

//--hospital page--//
Route::get('/hospital','HospitalController@index');

//==================//
