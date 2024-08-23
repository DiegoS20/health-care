<?php

use App\Http\Controllers\CitasController;
use App\Http\Controllers\MedicinaController;
use App\Http\Controllers\PacienteController;
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

    Route::get('/citas/pendientes', [CitasController::class, 'pendientes'])->name('citas-pendientes');
    Route::get('/citas/realizadas', [CitasController::class, 'realizadas'])->name('citas-realizadas');

    Route::resource('/citas', CitasController::class)->names([
        'index' => 'citas',
        'create' => 'nueva-cita',
        'store' => 'store-cita'
    ]);

    Route::resource('/medicinas', MedicinaController::class)->names([
        'index' => 'medicinas',
        'create' => 'create-medicina-form',
        'store' => 'create-medicina',
        'edit' => 'edit-medicina',
        'update' => 'update-medicina',
        'destroy' => 'destroy-medicina'
    ]);

    Route::get('/pacientes/{idPaciente}/detalle/{idCita}', [PacienteController::class, 'detalle'])->name('detalle-consulta');
    Route::post('/pacientes/{idPaciente}/detalle/{idCita}', [PacienteController::class, 'guardar_detalle'])->name('guardar_detalle');

    Route::resource('/pacientes', PacienteController::class)->names([
        'index' => 'pacientes',
        'create' => 'create-paciente-form',
        'store' => 'create-paciente',
        'edit' => 'edit-paciente',
        'update' => 'update-paciente',
        'destroy' => 'destroy-paciente',
        'show' => 'historial-paciente'
    ]);

    Route::get('/consultas/{view}', function ($view) {
        $allowedViews = ['nueva-consulta', 'consultas-pendientes', 'consultas-realizadas'];
        if (in_array($view, $allowedViews)) {
            return view("dashboard.partials.$view");
        }
        abort(404);
    })->name('consultas-dinamicas');
});
