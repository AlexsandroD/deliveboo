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

Route::get('/categories', 'Api\CategoryController@index');
Route::get('/restaurants', 'Api\RestaurantController@index');
Route::get('/filters', 'Api\RestaurantController@filterCategory');
Route::get('/restaurants/{slug}', 'Api\RestaurantController@show');
Route::get('/orders-token', 'Api\OrderController@token');
Route::get('/orders-payment', 'Api\OrderController@payment');





