<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HaljolController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'getActivityData']);

// Route::get('/', function () {
//     return view('index');
// });

Route::prefix('/haljol')->group(function () {
    Route::get('/', [HaljolController::class, 'index']);
    Route::get('/create', [HaljolController::class, 'create']);
    Route::post('/', [HaljolController::class, 'store']);
    Route::get('/edit/{id}', [HaljolController::class, 'edit']);
    Route::patch('/{id}', [HaljolController::class, 'update']);
    Route::get('/show/{id}', [HaljolController::class, 'show']);
    Route::delete('/{id}', [HaljolController::class, 'destroy']);
});

// MEMANGGIL URL SURAT MASUK
Route::prefix('/suratmasuk')->group(function () {
    Route::get('/', [SuratMasukController::class, 'index']);
    Route::get('/create', [SuratMasukController::class, 'create']);
    Route::post('/', [SuratMasukController::class, 'store']);
    Route::get('/edit/{id}', [SuratMasukController::class, 'edit']);
    Route::patch('/{id}', [SuratMasukController::class, 'update']);
    Route::get('/show/{id}', [SuratMasukController::class, 'show']);
    Route::delete('/{id}', [SuratMasukController::class, 'destroy']);
});

// MEMANGGIL URL SURAT KELUAR
Route::prefix('/suratkeluar')->group(function () {
    Route::get('/', [SuratKeluarController::class, 'index']);
    Route::get('/create', [SuratKeluarController::class, 'create']);
    Route::post('/', [SuratKeluarController::class, 'store']);
    Route::get('/edit/{id}', [SuratKeluarController::class, 'edit']);
    Route::patch('/{id}', [SuratKeluarController::class, 'update']);
    Route::get('/show/{id}', [SuratKeluarController::class, 'show']);
    Route::delete('/{id}', [SuratKeluarController::class, 'destroy']);
});


Route::prefix('/activity')->group(function () {
    Route::get('/', [ActivityController::class, 'index']);
    Route::get('/create', [ActivityController::class, 'create']);
    Route::post('/', [ActivityController::class, 'store']);
    Route::get('/edit/{id}', [ActivityController::class, 'edit']);
    Route::patch('/{id}', [ActivityController::class, 'update']);
    Route::get('/show/{id}', [ActivityController::class, 'show']);
    Route::delete('/{id}', [ActivityController::class, 'destroy']);
});
