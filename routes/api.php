<?php

use Illuminate\Http\Request;
Use App\measurements;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('measurements', 'MeasurementsController@index');
Route::get('measurements/{id}', 'MeasurementsController@show');
Route::post('measurements', 'MeasurementsController@store');

Route::post('listener', 'TTNDataController@store');
