<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BangsusController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HaljolController;
use App\Http\Controllers\LapsitController;
use App\Http\Controllers\LitpersController;
use App\Http\Controllers\PamController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\RenpamController;
use App\Http\Controllers\SmtController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\KaryabaktiController;
use App\Http\Controllers\KomsosController;
// use App\Http\Controllers\KomsosController;
use Illuminate\Support\Facades\Route;



Route::get('/', [FrontendController::class, 'getActivityData'])->name('userOnly');

// Route Login
Route::group(['middleware' => 'guest'], function () {
    // Login Form
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);

    // Register Form
    Route::get('register', [
        AuthController::class,
        'showRegistrationForm'
        ])->name('register');
        Route::post('register', [AuthController::class, 'register']);
    });

    Route::group(['middleware' => 'auth'], function () {
        
        // Logout
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        
        // Memanggil URL haljol
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

    // MEMANGGIL URL PAM
    Route::prefix('/pam')->group(function () {
        Route::get('/', [PamController::class, 'index']);
        Route::get('/create', [PamController::class, 'create']);
        Route::post('/', [PamController::class, 'store']);
        Route::get('/edit/{id}', [PamController::class, 'edit']);
        Route::patch('/{id}', [PamController::class, 'update']);
        Route::get('/show/{id}', [PamController::class, 'show']);
        Route::delete('/{id}', [PamController::class, 'destroy']);
    });

    // MEMANGGIL URL SMT
    Route::prefix('/smt')->group(function () {
        Route::get('/', [SmtController::class, 'index']);
        Route::get('/create', [SmtController::class, 'create']);
        Route::post('/', [SmtController::class, 'store']);
        Route::get('/edit/{id}', [SmtController::class, 'edit']);
        Route::patch('/{id}', [SmtController::class, 'update']);
        Route::get('/show/{id}', [SmtController::class, 'show']);
        Route::delete('/{id}', [SmtController::class, 'destroy']);
    });

    // MEMANGGIL URL LAPSIT
    Route::prefix('/lapsit')->group(function () {
        Route::get('/', [LapsitController::class, 'index']);
        Route::get('/create', [LapsitController::class, 'create']);
        Route::post('/', [LapsitController::class, 'store']);
        Route::get('/edit/{id}', [LapsitController::class, 'edit']);
        Route::patch('/{id}', [LapsitController::class, 'update']);
        Route::get('/show/{id}', [LapsitController::class, 'show']);
        Route::delete('/{id}', [LapsitController::class, 'destroy']);
    });

    // MEMANGGIL URL RENPAM
    Route::prefix('/renpam')->group(function () {
        Route::get('/', [RenpamController::class, 'index']);
        Route::get('/create', [RenpamController::class, 'create']);
        Route::post('/', [RenpamController::class, 'store']);
        Route::get('/edit/{id}', [RenpamController::class, 'edit']);
        Route::patch('/{id}', [RenpamController::class, 'update']);
        Route::get('/show/{id}', [RenpamController::class, 'show']);
        Route::delete('/{id}', [RenpamController::class, 'destroy']);
    });

    // MEMANGGIL URL BANGSUS
    Route::prefix('/bangsus')->group(function () {
        Route::get('/', [BangsusController::class, 'index']);
        Route::get('/create', [BangsusController::class, 'create']);
        Route::post('/', [BangsusController::class, 'store']);
        Route::get('/edit/{id}', [BangsusController::class, 'edit']);
        Route::patch('/{id}', [BangsusController::class, 'update']);
        Route::get('/show/{id}', [BangsusController::class, 'show']);
        Route::delete('/{id}', [BangsusController::class, 'destroy']);
    });

    // MEMANGGIL URL PENGAJUAN
    Route::prefix('/pengajuan')->group(function () {
        Route::get('/', [PengajuanController::class, 'index']);
        Route::get('/create', [PengajuanController::class, 'create']);
        Route::post('/', [PengajuanController::class, 'store']);
        Route::get('/edit/{id}', [PengajuanController::class, 'edit']);
        Route::patch('/{id}', [PengajuanController::class, 'update']);
        Route::get('/show/{id}', [PengajuanController::class, 'show']);
        Route::delete('/{id}', [PengajuanController::class, 'destroy']);
    });

    // MEMANGGIL URL LITPERS
    Route::prefix('/litpers')->group(function () {
        Route::get('/', [LitpersController::class, 'index']);
        Route::get('/create', [LitpersController::class, 'create']);
        Route::post('/', [LitpersController::class, 'store']);
        Route::get('/edit/{id}', [LitpersController::class, 'edit']);
        Route::patch('/{id}', [LitpersController::class, 'update']);
        Route::get('/show/{id}', [LitpersController::class, 'show']);
        Route::delete('/{id}', [LitpersController::class, 'destroy']);
    });

    Route::prefix('/activity')->group(function () {
        Route::get('/', [ActivityController::class, 'index'])->name('activity');
        Route::get('/create', [ActivityController::class, 'create']);
        Route::post('/', [ActivityController::class, 'store']);
        Route::get('/edit/{id}', [ActivityController::class, 'edit']);
        Route::patch('/{id}', [ActivityController::class, 'update']);
        Route::get('/show/{id}', [ActivityController::class, 'show']);
        Route::delete('/{id}', [ActivityController::class, 'destroy']);
    });
    
    // Rute resource utama untuk Karyabakti
    Route::resource('ter/karyabakti', KaryabaktiController::class);

    // Rute tambahan untuk custom actions seperti edit dan show
    Route::get('/ter/karyabakti/edit/{id}', [KaryabaktiController::class, 'edit'])->name('karyabakti.edit');
    Route::get('/ter/karyabakti/show/{id}', [KaryabaktiController::class, 'show'])->name('karyabakti.show');
    Route::post('/ter/karyabakti/update/{id}', [KaryabaktiController::class, 'update'])->name('karyabakti.update');

    // MEMANGGIL URL TER->KOMSOS
    Route::resource('ter/komsos', KomsosController::class);
    Route::get('/ter/komsos/edit/{id}', [KomsosController::class, 'edit'])->name('komsos.edit');
    Route::post('/ter/komsos/update/{id}', [KomsosController::class, 'update'])->name('komsos.update');

    Route::prefix('/ter/komsos')->group(function () {
        Route::get('/ter/komsos', [KomsosController::class, 'index']);
        Route::get('/ter/komsos/create', [KomsosController::class, 'create']);
        Route::post('/ter/komsos', [KomsosController::class, 'store']);
        Route::get('/ter/komsos/edit/{id}', [KomsosController::class, 'edit']);
        Route::patch('/ter/komsos/{id}', [KomsosController::class, 'update']);
        Route::get('/ter/komsos/show/{id}', [KomsosController::class, 'show']);
        Route::delete('/ter/komsos/{id}', [KomsosController::class, 'destroy']);
    });
});
