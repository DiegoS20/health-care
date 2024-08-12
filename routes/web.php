<?php

use App\Http\Controllers\MedicinaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return view('dashboard.index');
    })->name('dashboard-index');

    Route::get('/citas', function () {
        return view('dashboard.citas');
    })->name('citas');

    Route::resource('/medicinas', MedicinaController::class)->names([
        'index' => 'medicinas',
        'store' => 'create-medicina'
    ]);

    Route::get('/pacientes', function () {
        return view('dashboard.pacientes');
    })->name('pacientes');
});
