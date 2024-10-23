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
    Route::resource('/haljol', HaljolController::class)->names([
        'index' => 'haljol.index',
        'store' => 'haljol.store',
        'create' => 'haljol.create',
        'edit' => 'haljol.edit',
        'update' => 'haljol.update',
        'show' => 'haljol.show',
        'destroy' => 'haljol.destroy',
    ]);
    
    // Routes untuk Surat Masuk
    Route::resource('/suratmasuk', SuratMasukController::class)->names([
        'index' => 'suratmasuk.index',
        'store' => 'suratmasuk.store',
        'create' => 'suratmasuk.create',
        'edit' => 'suratmasuk.edit',
        'update' => 'suratmasuk.update',
        'show' => 'suratmasuk.show',
        'destroy' => 'suratmasuk.destroy',
    ]);
    
    // Routes untuk Surat Keluar
    Route::resource('/suratkeluar', SuratKeluarController::class)->names([
        'index' => 'suratkeluar.index',
        'store' => 'suratkeluar.store',
        'create' => 'suratkeluar.create',
        'edit' => 'suratkeluar.edit',
        'update' => 'suratkeluar.update',
        'show' => 'suratkeluar.show',
        'destroy' => 'suratkeluar.destroy',
    ]);
    
    // Routes untuk PAM
    Route::resource('/pam', PamController::class)->names([
        'index' => 'pam.index',
        'store' => 'pam.store',
        'create' => 'pam.create',
        'edit' => 'pam.edit',
        'update' => 'pam.update',
        'show' => 'pam.show',
        'destroy' => 'pam.destroy',
    ]);
    
    // Routes untuk SMT
    Route::resource('/smt', SmtController::class)->names([
        'index' => 'smt.index',
        'store' => 'smt.store',
        'create' => 'smt.create',
        'edit' => 'smt.edit',
        'update' => 'smt.update',
        'show' => 'smt.show',
        'destroy' => 'smt.destroy',
    ]);
    
    // Routes untuk Lapsit
    Route::resource('/lapsit', LapsitController::class)->names([
        'index' => 'lapsit.index',
        'store' => 'lapsit.store',
        'create' => 'lapsit.create',
        'edit' => 'lapsit.edit',
        'update' => 'lapsit.update',
        'show' => 'lapsit.show',
        'destroy' => 'lapsit.destroy',
    ]);
    
    // Routes untuk Renpam
    Route::resource('/renpam', RenpamController::class)->names([
        'index' => 'renpam.index',
        'store' => 'renpam.store',
        'create' => 'renpam.create',
        'edit' => 'renpam.edit',
        'update' => 'renpam.update',
        'show' => 'renpam.show',
        'destroy' => 'renpam.destroy',
    ]);
    
    // Routes untuk Bangsus
    Route::resource('/bangsus', BangsusController::class)->names([
        'index' => 'bangsus.index',
        'store' => 'bangsus.store',
        'create' => 'bangsus.create',
        'edit' => 'bangsus.edit',
        'update' => 'bangsus.update',
        'show' => 'bangsus.show',
        'destroy' => 'bangsus.destroy',
    ]);
    
    // Routes untuk Pengajuan
    Route::resource('/pengajuan', PengajuanController::class)->names([
        'index' => 'pengajuan.index',
        'store' => 'pengajuan.store',
        'create' => 'pengajuan.create',
        'edit' => 'pengajuan.edit',
        'update' => 'pengajuan.update',
        'show' => 'pengajuan.show',
        'destroy' => 'pengajuan.destroy',
    ]);
    
    // Routes untuk Litpers
    Route::resource('/litpers', LitpersController::class)->names([
        'index' => 'litpers.index',
        'store' => 'litpers.store',
        'create' => 'litpers.create',
        'edit' => 'litpers.edit',
        'update' => 'litpers.update',
        'show' => 'litpers.show',
        'destroy' => 'litpers.destroy',
    ]);
    
    // Routes untuk Karyabakti
    Route::resource('ter/karyabakti', KaryabaktiController::class)->names([
        'index' => 'ter.karyabakti.index',
        'store' => 'ter.karyabakti.store',
        'create' => 'ter.karyabakti.create',
        'edit' => 'ter.karyabakti.edit',
        'update' => 'ter.karyabakti.update',
        'show' => 'ter.karyabakti.show',
        'destroy' => 'ter.karyabakti.destroy',
    ]);
    
    // Routes untuk Komsos
    Route::resource('ter/komsos', KomsosController::class)->names([
        'index' => 'ter.komsos.index',
        'store' => 'ter.komsos.store',
        'create' => 'ter.komsos.create',
        'edit' => 'ter.komsos.edit',
        'update' => 'ter.komsos.update',
        'show' => 'ter.komsos.show',
        'destroy' => 'ter.komsos.destroy',
    ]);
});
?>
