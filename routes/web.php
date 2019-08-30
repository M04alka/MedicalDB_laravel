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
Route::get('/signin','UsersController@create');
Route::get('/login','UsersController@login');
Route::get('/patients','PatientsController@patients');
Route::get('/pills','PillsController@index');
Route::get('/certificates','CertificateController@index');
Route::get('/workers','UsersController@listOfWorkers');

//routes for signin
Route::post('/signin','UsersController@store');

//routes for login
Route::post('/login','UsersController@logon');

//for tests
Route::get('user/test','UsersController@test');

Route::get('user/main','UsersController@main');

//patients routes
Route::post('/patients/store','PatientsController@store');

//pills routes
Route::post('user/pills','UsersController@pills');

//insurance routes
Route::get('user/insurance','PatientsController@patients');
Route::post('/insurance/update','PatientsController@update');

//patient routes
Route::get('/patients/{patient}','PatientsController@show');



Route::post('/certificate/store','CertificateController@store');
Route::post('/medcertificate/store','CertificateController@medCertifStore');
Route::post('/pscertificate/store','CertificateController@psychCertifStore');