<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\City\CityController;
use App\Http\Controllers\Country\CountryController;
use App\Http\Controllers\Department\DepartmentController;
use App\Http\Controllers\Property\PropertyController;
use App\Http\Controllers\Sector\SectorController;
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
Route::get('/backend-data', [ApiController::class, 'fetchBackendData']);

Route::prefix('country')->group(function () {
    Route::get('/index', [CountryController::class, 'indexAllCountriesWithRelation']);
    Route::get('/detail', [CountryController::class, 'getDetailsCountries']);
    Route::get('/getAllCountries', [CountryController::class, 'getAllCountries']);
    Route::post('/saveOrUpdate', [CountryController::class, 'saveOrUpdate']);
    Route::post('/deleteCountry', [CountryController::class, 'deleteCountry']);


});
Route::prefix('department')->group(function () {
    Route::get('/index', [DepartmentController::class, 'index']);
    Route::post('/saveOrUpdate', [DepartmentController::class, 'saveOrUpdate']);
});
Route::prefix('city')->group(function () {
    Route::get('/index', [CityController::class, 'index']);
    Route::post('/saveOrUpdate', [CityController::class, 'saveOrUpdate']);
});
Route::prefix('sector')->group(function () {
    Route::get('/index', [SectorController::class, 'index']);
    Route::post('/saveOrUpdate', [SectorController::class, 'saveOrUpdate']);
});

Route::prefix('property')->group(function () {
    Route::get('/index', [PropertyController::class, 'index']);
    Route::post('/saveOrUpdate', [PropertyController::class, 'saveOrUpdateProperty']);
});

