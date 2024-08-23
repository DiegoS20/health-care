<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pacientes = [];
        $condition = '%' . $request->get('q') . '%';
        if ($request->has('q') && $request->get('q') != '')
            $pacientes = Paciente::where('nombres', 'LIKE', $condition)
                ->orWhere('apellidos', 'LIKE', $condition)
                ->orWhere('telefono', 'LIKE', $condition)
                ->orWhere('sexo', 'LIKE', $condition)
                ->orWhere('fecha_nacimiento', 'LIKE', $condition)
                ->get();
        else
            $pacientes = Paciente::all();
        return view('dashboard.pacientes', [
            'pacientes' => $pacientes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pacientes-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'telefono' => 'required|string|max:8',
            'fecha_nacimiento' => 'required|string',
            'sexo' => 'required|in:H,M'
        ]);

        if (
            Paciente::where('nombres', $validated['nombres'])
                ->where('apellidos', $validated['apellidos'])
                ->count() > 0
        )
            return redirect('pacientes');

        $validated['codigo'] = rand(10000, 99999);
        Paciente::create($validated);

        return to_route('pacientes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('dashboard.pacientes-historial');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $paciente = Paciente::findOrFail($id);

        return view('dashboard.pacientes-form', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'telefono' => 'required|string|max:8',
            'fecha_nacimiento' => 'required|string',
            'sexo' => 'required|in:H,M'
        ]);

        Paciente::where('idPaciente', $id)->update($validated);

        return to_route('pacientes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Paciente::where('idPaciente', $id)->delete();

        return to_route('pacientes');
    }
}
