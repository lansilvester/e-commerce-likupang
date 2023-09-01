<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DestinasiWisataController;
use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\HomestayController;
use App\Http\Controllers\SouvenirController;

Auth::routes();

Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::post('/feedback', [FeedbackController::class, 'create'])->name('feedback');
Route::resource('homestay', HomestayController::class);
Route::resource('souvenir', SouvenirController::class);
Route::resource('destinasi_wisata', DestinasiWisataController::class);

Route::get('dashboard', [DashboardController::class, 'index']);
