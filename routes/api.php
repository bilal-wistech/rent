<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\PropertyController;
use App\Http\Controllers\Api\BookingController;
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
Route::get('areas', [HomeController::class, 'areas']);
Route::get('testimonials', [HomeController::class, 'testimonials']);
Route::get('vacant-properties', [HomeController::class, 'vacantProperties']);
Route::get('properties', [PropertyController::class, 'searchProperties']);
Route::get('properties/{slug}', [PropertyController::class, 'show']);
Route::get('locations', [PropertyController::class, 'getLocations']);
Route::get('get-bookings', [BookingController::class, 'getBookings']);
