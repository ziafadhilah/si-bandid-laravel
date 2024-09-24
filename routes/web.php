<?php
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BangsusController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HaljolController;
use App\Http\Controllers\KaryabaktiController;
use App\Http\Controllers\KomsosController;
use App\Http\Controllers\LapsitController;
use App\Http\Controllers\LitpersController;
use App\Http\Controllers\PamController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\RenpamController;
use App\Http\Controllers\SmtController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use Illuminate\Support\Facades\Route;

// Route halaman utama
Route::get('/', [FrontendController::class, 'getActivityData'])->name('userOnly');

// Route Login dan Register
Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
});

// Route Authenticated
Route::group(['middleware' => 'auth'], function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // Routes untuk Activity
    Route::resource('/activity', ActivityController::class)->names([
        'index' => 'activity',
        'store' => 'activity.store',
        'create' => 'activity.create',
        'edit' => 'activity.edit',
        'update' => 'activity.update',
        'show' => 'activity.show',
        'destroy' => 'activity.destroy',
    ]);
    
    // Routes untuk Haljol
    Route::resource('/haljol', HaljolController::class);
    
    // Routes untuk Surat Masuk
    Route::resource('/suratmasuk', SuratMasukController::class);
    
    // Routes untuk Surat Keluar
    Route::resource('/suratkeluar', SuratKeluarController::class);
    
    // Routes untuk PAM
    Route::resource('/pam', PamController::class);
    
    // Routes untuk SMT
    Route::resource('/smt', SmtController::class);
    
    // Routes untuk Lapsit
    Route::resource('/lapsit', LapsitController::class);
    
    // Routes untuk Renpam
    Route::resource('/renpam', RenpamController::class);
    
    // Routes untuk Bangsus
    Route::resource('/bangsus', BangsusController::class);
    
    // Routes untuk Pengajuan
    Route::resource('/pengajuan', PengajuanController::class);
    
    // Routes untuk Litpers
    Route::resource('/litpers', LitpersController::class);

    // Routes untuk Karyabakti
    Route::resource('ter/karyabakti', KaryabaktiController::class);
    
    // Routes untuk Komsos
    Route::resource('ter/komsos', KomsosController::class);
});
?>
