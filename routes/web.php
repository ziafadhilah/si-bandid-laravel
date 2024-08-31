<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HaljolController;
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

Route::prefix('/activity')->group(function () {
    Route::get('/', [ActivityController::class, 'index']);
    Route::get('/create', [ActivityController::class, 'create']);
    Route::post('/', [ActivityController::class, 'store']);
    Route::get('/edit/{id}', [ActivityController::class, 'edit']);
    Route::patch('/{id}', [ActivityController::class, 'update']);
    Route::get('/show/{id}', [ActivityController::class, 'show']);
    Route::delete('/{id}', [ActivityController::class, 'destroy']);
});
