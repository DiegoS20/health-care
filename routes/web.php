<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MedicinaController;
use App\Http\Controllers\PacienteController;
use App\Models\Citas;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cliente', function () {
    if (session()->has('cliente_logged_id'))
        return to_route('index-cliente');
    return view('auth.loginuser');
})->name('login-user');

Route::get('/login', function () {
    if (session()->has('doctor_logged_in'))
        return to_route('dashboard-index');
    return view('auth.login');
})->name('login-doctor');


Route::post('/login-paciente', [AuthController::class, 'loginAsPaciente'])->name('login-paciente');
Route::post('/login-doctor', [AuthController::class, 'loginAsDoctor'])->name('login-doc');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['authenticateClient'])->prefix('cliente')->group(function () {
    Route::get('/citas', [ClienteController::class, 'index'])->name('index-cliente');
    Route::get('/citas/{id}', [ClienteController::class, 'detalles'])->name('detalle-cliente');
});

// Rutas protegidas por middleware
Route::middleware(['authenticatedUser'])->prefix('dashboard')->group(function () {
    Route::get('/', function () {
        $citas = Citas::where('estado', 'P')->with('paciente')->get();
        return view('dashboard.index', ['citas' => $citas]);
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
