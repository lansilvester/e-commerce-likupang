<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DestinasiWisataController;
use App\Http\Controllers\DestinasiWisataAdminController;
use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\HomestayAdminController;
use App\Http\Controllers\HomestayController;
use App\Http\Controllers\SearchAdminController;
use App\Http\Controllers\SouvenirAdminController;
use App\Http\Controllers\SouvenirController;

Auth::routes();

Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::post('/feedback', [FeedbackController::class, 'create'])->name('feedback');
Route::resource('homestay', HomestayController::class);
Route::resource('souvenir', SouvenirController::class);
Route::resource('destinasi_wisata', DestinasiWisataController::class);

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('dashboard_destinasi_wisata', DestinasiWisataAdminController::class);
Route::resource('dashboard_souvenir', SouvenirAdminController::class);
Route::resource('dashboard_homestay', HomestayAdminController::class);

Route::get('search/destinasi_wisata',[SearchAdminController::class, 'destinasi_wisata'])->name('search_destinasi_wisata');