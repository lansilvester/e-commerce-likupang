<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DestinasiWisataController;
use App\Http\Controllers\DestinasiWisataAdminController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\HomestayAdminController;
use App\Http\Controllers\HomestayController;
use App\Http\Controllers\KulinerAdminController;
use App\Http\Controllers\KulinerController;
use App\Http\Controllers\SearchAdminController;
use App\Http\Controllers\SosmedController;
use App\Http\Controllers\SouvenirAdminController;
use App\Http\Controllers\SouvenirController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\UserController;

Auth::routes();

Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::resource('homestay', HomestayController::class);
Route::resource('souvenir', SouvenirController::class);
Route::resource('destinasi_wisata', DestinasiWisataController::class);
Route::resource('kuliner', KulinerController::class);
Route::resource('ulasan', UlasanController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('dashboard_destinasi_wisata', DestinasiWisataAdminController::class)->middleware('role:SA,admin_objek_wisata');
    Route::resource('dashboard_souvenir', SouvenirAdminController::class)->middleware('role:SA,admin_souvenir');
    Route::resource('dashboard_homestay', HomestayAdminController::class)->middleware('role:SA,admin_homestay');
    Route::resource('dashboard_kuliner', KulinerAdminController::class)->middleware('role:SA,admin_kuliner');
    Route::resource('dashboard_sosmed', SosmedController::class)->middleware('role:SA');
    Route::resource('booking', BookingController::class);

    Route::resource('users', UserController::class)->middleware('role:SA');
    Route::post('/feedback', [FeedbackController::class, 'create'])->name('feedback');
    Route::delete('feedback/{id}', [DashboardController::class, 'destroy'])->name('feedback.destroy');
    
    Route::get('search/destinasi_wisata',[SearchAdminController::class, 'destinasi_wisata'])->name('search_destinasi_wisata')->middleware('role:SA,admin_objek_wisata');
    Route::get('search/souvenir',[SearchAdminController::class, 'sovenir'])->name('search_souvenir')->middleware('role:SA,admin_souvenir');
    Route::get('search/homestay',[SearchAdminController::class, 'homestay'])->name('search_homestay')->middleware('role:SA,admin_homestay');
    Route::get('search/kuliner',[SearchAdminController::class, 'kuliner'])->name('search_kuliner')->middleware('role:SA,admin_kuliner');
});