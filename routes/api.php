<?php

require_once __DIR__.'/../vendor/autoload.php';

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

// Public Routes (Kayıt ve giriş işlemleri)
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// Protected Routes (JWT ile korunan rotalar)
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    
    // Event Routes
    Route::get('events', [EventController::class, 'index']);  // Tüm etkinlikleri listele
    Route::post('events', [EventController::class, 'store']);  // Yeni etkinlik oluştur
    Route::get('events/{event}', [EventController::class, 'show']);  // Tek etkinlik göster
    Route::put('events/{event}', [EventController::class, 'update']);  // Etkinlik güncelle
    Route::delete('events/{event}', [EventController::class, 'destroy']);  // Etkinlik sil
});