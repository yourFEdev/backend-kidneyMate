<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FluidIntakeController;
use App\Http\Controllers\BloodPressureController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\MedicationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\InsightController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WeightRecordController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/register',[AuthController::class,'register']);

Route::post('/login',[AuthController::class,'login']);

Route::middleware('auth:api')->get('/me',function(Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->post('/logout',[AuthController::class,'logout']);

Route::middleware('auth:api')->group(function () {
    Route::apiResource('fluid-intakes', FluidIntakeController::class);
    Route::apiResource('blood-pressures', BloodPressureController::class);
    Route::apiResource('appointments', AppointmentController::class);
    Route::apiResource('medications', MedicationController::class);
    Route::get('/reports', [ReportController::class, 'index']);
    Route::get('/insight', [InsightController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'show']);
    Route::put('/profile', [ProfileController::class, 'update']);
    Route::put('/profile/password', [ProfileController::class, 'changePassword']);
    Route::apiResource('weight-records', WeightRecordController::class);
});
