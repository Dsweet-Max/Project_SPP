<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PrintController;
use GuzzleHttp\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


    Route::controller(LoginController::class)->group(function(){
        Route::get('/','index')->name('login');
        Route::post('login/proses','proses');
        Route::get('logout', 'logout');
    });

    Route::group(['middleware' => ['auth']], function(){
        Route::group(['middleware' => ['cekUserLogin:1']], function(){
            Route::resource('dashboard', DashboardController::class);
            Route::resource('siswa', SiswaController::class);
            Route::resource('kelas', KelasController::class);
            Route::resource('spp', SppController::class);
            Route::resource('petugas', PetugasController::class);
            Route::resource('pembayaran', PembayaranController::class);
            Route::resource('print', PrintController::class);
        });

        Route::group(['middleware' => ['cekUserLogin:2']], function(){  
        Route::resource('dashboard', DashboardController::class);
            });   
    });

    Route::get('halo', function () {
        return "Halo, Selamat datang di tutorial laravel www.malasngoding.com";  });