<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Citas;
use App\Models\Paciente;
use Illuminate\Http\Request;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.citas');
    }

    /**
     * Display a listing of the resource.
     */
    public function pendientes()
    {
        $citas = Citas::where('estado', 'P')->with('paciente')->get();
        return view('dashboard.consultas-pendientes', [
            'citas' => $citas
        ]);
    }

    public function realizadas()
    {
        $citas = Citas::where('estado', 'R')->with('paciente')->get();
        return view('dashboard.consultas-realizadas', [
            'citas' => $citas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.citas-nueva', [
            'pacientes' => Paciente::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'idPaciente' => 'required|integer',
            'fecha' => 'required|date',
            'hora' => 'required|string'
        ]);

        $validated['fecha'] = $validated['fecha'] . 'T' . $validated['hora'];
        unset($validated['hora']);

        Citas::create($validated);

        return to_route('citas-pendientes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
