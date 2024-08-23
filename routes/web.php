<?php

use App\Http\Controllers\MedicinaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth', function () {
    return view('auth.loginuser');
})->name('loginuser');

Route::prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return view('dashboard.index');
    })->name('dashboard-index');

    Route::get('/citas', function () {
        return view('dashboard.citas');
    })->name('citas');

    Route::resource('/medicinas', MedicinaController::class)->names([
        'index' => 'medicinas',
        'create' => 'create-medicina-form',
        'store' => 'create-medicina',
        'edit' => 'edit-medicina'
    ]);

    Route::get('/pacientes', function () {
        return view('dashboard.pacientes');
    })->name('pacientes');

    
    Route::get('/consultas/{view}', function ($view) {
        $allowedViews = ['nueva-consulta', 'consultas-pendientes', 'consultas-realizadas'];
        if (in_array($view, $allowedViews)) {
            return view("dashboard.partials.$view");
        }
        abort(404); 
    })->name('consultas-dinamicas');
});
