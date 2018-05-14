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
/**
 * Admin page routes
 */
Route::get('/admin/info', 'AdminInfoController@getInfo');
Route::post('/admin/info', 'AdminInfoController@updateInfo');

Route::get('/admin/pdf', 'AdminPDFController@index');
Route::post('/admin/pdf', 'AdminPDFController@updateContent');

Route::get('/admin/study', 'AdminStudyController@getList');
Route::post('/admin/study', 'AdminStudyController@addStudy');
Route::post('/admin/study', 'AdminStudyController@addMajor');

Route::get('/admin/trip', 'AdminTripController@getTrips');
Route::get('/admin/trip/{id}', 'AdminTripController@editTripForm');

Route::get('/admin/trip/edit', 'AdminTripController@editTripForm');
Route::get('/admin/trip/edit/{trip_id?}', 'AdminTripController@editTripForm');
Route::post('/admin/trip/update/', 'AdminTripController@editTrip');
Route::post('/admin/trip/insert/', 'AdminTripController@createTrip');

Route::get('/admin/zip', 'AdminZipController@index');
Route::get('/admin/zip/add', 'AdminZipController@addZipForm');
Route::post('/admin/zip/add', 'AdminZipController@addZip');
Route::get('/admin/zip/{id}', 'AdminZipController@editZipForm');
Route::post('/admin/zip/{id}/edit', 'AdminZipController@editZip');