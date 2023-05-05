<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* ROUTES OF PRODUCTS */ 
Route::get('products', 'App\Http\Controllers\ProductsController@index');
Route::post('products', 'App\Http\Controllers\ProductsController@store');
Route::put('product/{id}', 'App\Http\Controllers\ProductsController@update');
Route::get('product/show/{id}', 'App\Http\Controllers\ProductsController@show');
Route::delete('product/{id}', 'App\Http\Controllers\ProductsController@destroy');
/* END ROUTES OF PRODUCTS */

/* ROUTES OF CATEGORIES */ 
Route::get('categories', 'App\Http\Controllers\CategoriesController@index');
Route::post('category', 'App\Http\Controllers\CategoriesController@store');
Route::put('category/{id}', 'App\Http\Controllers\CategoriesController@update');
Route::get('category/show/{id}', 'App\Http\Controllers\CategoriesController@show');
Route::delete('category/{id}', 'App\Http\Controllers\CategoriesController@destroy');
/* END ROUTES OF CATEGORIES*/

