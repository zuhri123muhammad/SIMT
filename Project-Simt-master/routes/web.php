<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PrestasiMahasiswaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('detail/profile/{id}', [HomeController::class, 'detail'])->name('detail-profile');

Route::get('login', [AuthController::class, 'viewLogin'])->name('login');
Route::post('login-request', [AuthController::class, 'login'])->name('login-request');
Route::get('register', [AuthController::class, 'viewRegister'])->name('register');
Route::post('register-request', [AuthController::class, 'register'])->name('register-request');
Route::get('prestasi/search', [PrestasiMahasiswaController::class ,'search'])->name('search');
Route::get('/buat/{id}', [PrestasiMahasiswaController::class, 'process'])->name('buat');


Route::group([
    'middleware' => 'auth',
    'prefix' => 'operator',
], function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::controller(MahasiswaController::class)->group(function () {
        Route::get('mahasiswa', 'index')->name('data-mahasiswa');
        Route::get('mahasiswa/create', 'create')->name('create-mahasiswa');
        Route::post('mahasiswa/store', 'store')->name('store-mahasiswa');
        Route::get('mahasiswa/edit/{id}', 'edit')->name('edit-mahasiswa');
        Route::post('mahasiswa/update/{id}', 'update')->name('update-mahasiswa');
        Route::get('mahasiswa/destroy/{id}', 'destroy')->name('destroy-mahasiswa');
        Route::get('mahasiswa/prestasi/{id}', 'show')->name('prestasi-mahasiswa');
    });
    Route::controller(PrestasiMahasiswaController::class)->group(function () {
        Route::get('prestasi/mahasiswas', 'index')->name('prestasi-mhs');
        Route::get('prestasi', 'selfIndex')->name('prestasi');
        Route::get('prestasi/create', 'create')->name('prestasi-create');
        Route::post('prestasi/store', 'store')->name('prestasi-store');
        Route::get('prestasi/download/{name}', 'download')->name('prestasi-download');
        Route::get('prestasi-download', 'downloadPdf')->name('pdf-download');
        Route::get('prestasi/destroy/{id}', 'destroy')->name('prestasi-destroy');
    });
    Route::controller(HomeController::class)->group(function () {
        Route::get('dashboard', 'dashboard')->name('dashboard');
        Route::get('profil', 'profil')->name('profil');
    });
});