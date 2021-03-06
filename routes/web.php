<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

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

Route::resource('users', HomeController::class);
Route::get('/', [HomeController::class, 'index']);
Route::get('country-state-city', [LocationController::class, 'index']);
Route::post('get-states-by-country', [LocationController::class, 'getState']);
Route::post('get-cities-by-state', [LocationController::class, 'getCity']);

