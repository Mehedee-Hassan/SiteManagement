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




Route::get('/', "DashBoardController@index");
Route::get('/home', "DashBoardController@index");

Route::get('/dashboard/images/{date}/{flag}', "DashBoardController@show");
//Route::get('/restrict', "DashBoardController@back");

Route::get('/port', "PortController@index");
Route::get('/port/create', "PortController@create");
Route::post('/port', "PortController@store");
Route::get('/port/{id}/edit', "PortController@edit");
Route::get('/port/{id}/update', "PortController@update");
Route::get('/port/delete/{id}', "PortController@destroy");


Route::get('/work', "WorkController@index");
Route::get('/work/create', "WorkController@create");
Route::post('/work/update/{id}', "WorkController@update");
Route::post('/work', "WorkController@store");
Route::get('/work/{id}', "WorkController@edit");
Route::get('/work/delete/{id}',"WorkController@deleteWork");



Route::get('/image/delete/{imageId}/{id}', "WorkController@deleteImage");


 // report

Route::get('/report',"ReportController@create");
Route::get('/report/generate',"ReportController@generate");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/user','UserController@index');
Route::get('/user/{id}/edit','UserController@edit');
Route::get('/user/{id}/delete','UserController@destroy');
Route::get('/user/{id}/update','UserController@update');


Route::get('file/get/{filename}',  'WorkController@getImageFile');