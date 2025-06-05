<?php

use App\Http\Controllers\API\SectionContentApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\PropertyController;
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
Route::post('get-section-content', [SectionContentApiController::class, 'getContent']);

Route::get('sanctum/csrf-cookie', [\Laravel\Sanctum\Http\Controllers\CsrfCookieController::class, 'show']);
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('refresh', [AuthController::class, 'refresh'])->middleware('throttle:10,1');
Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [AuthController::class, 'user']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('add-booking',[BookingController::class,'addBooking']);
});
