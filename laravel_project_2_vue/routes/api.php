<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* ROUTES OF AIRLINES */ 

Route::get('airlines', 'App\Http\Controllers\AirlinesController@index');
Route::post('airlines', 'App\Http\Controllers\AirlinesController@store');
Route::put('airlines/{id}', 'App\Http\Controllers\AirlinesController@update');
Route::get('airlines/show/{id}', 'App\Http\Controllers\AirlinesController@show');
Route::delete('airlines/{id}', 'App\Http\Controllers\AirlinesController@destroy');

/* END ROUTES OF AIRLINES */


/* ROUTES OF AIRPORTS */ 

Route::get('airports', 'App\Http\Controllers\AirportsController@index');
Route::post('airports', 'App\Http\Controllers\AirportsController@store');
Route::put('airports/{id}', 'App\Http\Controllers\AirportsController@update');
Route::get('airports/show/{id}', 'App\Http\Controllers\AirportsController@show');
Route::delete('airports/{id}', 'App\Http\Controllers\AirportsController@destroy');

/* END ROUTES OF AIRPORTS */

/* ROUTES OF FLIGHTS */ 

Route::get('flights', 'App\Http\Controllers\FlightsController@index');
Route::post('flights', 'App\Http\Controllers\FlightsController@store');
Route::put('flights/{id}', 'App\Http\Controllers\FlightsController@update');
Route::get('flights/show/{id}', 'App\Http\Controllers\FlightsController@show');
Route::delete('flights/{id}', 'App\Http\Controllers\FlightsController@destroy');
Route::get('flights/tracking', 'App\Http\Controllers\FlightsController@getFlightsRelated');

/* ROUTES OF USERS */

Route::post('/auth/register', 'App\Http\Controllers\Auth\AuthController@createUser');
Route::post('/auth/login', 'App\Http\Controllers\Auth\AuthController@loginUser');


/* END ROUTES OF USERS */ 
