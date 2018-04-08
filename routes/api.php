<?php

use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('login', 'UserController@login');

Route::get('index', 'UserController@index');
Route::post('register', 'UserController@register');
Route::get('details', 'UserController@details');

Route::group(['middleware' => 'auth:api'], function(){

    Route::get('details', 'UserController@details');
    Route::post('measurements', 'MeasurementsController@store');
    Route::post('locations', 'LocationsController@store');
    Route::post('sensors', 'SensorsController@store');
    Route::post('devices', 'DevicesController@store');
});

Route::get('measurements', 'MeasurementsController@index');
Route::get('measurements/{id}', 'MeasurementsController@show');

Route::get('locations', 'LocationsController@index');
Route::get('locations/{id}', 'LocationsController@show');

Route::get('devices', 'DevicesController@index');
Route::get('devices/{id}', 'DevicesController@show');

Route::get('sensors', 'SensorsController@index');
Route::get('sensors/{id}', 'SensorsController@show');

Route::post('listener', 'TTNDataController@store');
