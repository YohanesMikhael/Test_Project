<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SubscribeController;

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
Route::get('/', [LocationController::class, 'index']);
Route::get('/provinces', [LocationController::class, 'getProvinces']);
Route::get('/regencies/{province_id}', [LocationController::class, 'getRegenciesByProvince']);
Route::get('/districts/{regency_id}', [LocationController::class, 'getDistrictsByRegency']);
Route::get('/villages/{district_id}', [LocationController::class, 'getVillagesByDistrict']);
Route::post('/subscribe', [SubscribeController::class, 'subscribe']);
Route::get('/subscribe', [SubscribeController::class, 'index']);