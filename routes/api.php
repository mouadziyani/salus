<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SymptomController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\HealthAdviceController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    Route::get('/symptoms', [SymptomController::class, 'index']);
    Route::post('/symptoms', [SymptomController::class, 'store']);
    Route::get('/symptoms/{id}', [SymptomController::class, 'show']);
    Route::put('/symptoms/{id}', [SymptomController::class, 'update']);
    Route::delete('/symptoms/{id}', [SymptomController::class, 'destroy']);

    Route::get('/appointments', [AppointmentController::class, 'index']);
    Route::post('/appointments', [AppointmentController::class, 'store']);
    Route::get('/appointments/{id}', [AppointmentController::class, 'show']);
    Route::put('/appointments/{id}', [AppointmentController::class, 'update']);
    Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy']);

    Route::get('/ai/health-advice', [HealthAdviceController::class, 'index']);
    Route::post('/ai/health-advice', [HealthAdviceController::class, 'store']);
});

Route::get('/doctors', [DoctorController::class, 'index']);
Route::get('/doctors/search', [DoctorController::class, 'search']);
Route::get('/doctors/{id}', [DoctorController::class, 'show']);
