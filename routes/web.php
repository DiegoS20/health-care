<?php

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

    Route::get('/medicinas', function () {
        return view('dashboard.medicinas');
    })->name('medicinas');

    Route::get('/pacientes', function () {
        return view('dashboard.pacientes');
    })->name('pacientes');
});
