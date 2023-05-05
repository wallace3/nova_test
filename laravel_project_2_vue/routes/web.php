<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::resource('airlines', AirlinesController::class);
//Route::resource('flights', FlightsController::class);
//Route::resource('airports', AirportsController::class);

Route::post('airlines', 'App\Http\Controllers\AirlinesController@store');

