<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Citas;
use App\Models\Medicinas;
use App\Models\Paciente;
use App\Models\Recetas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        $codigo = strval(rand(10000, 99999));
        $validated['codigo'] = $codigo;
        Paciente::create($validated);

        return to_route('pacientes', [
            'nombre' => $validated['nombres'] . ' ' . $validated['apellidos'],
            'codigo' => $codigo
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $citas = Citas::where('idPaciente', $id)
            ->orderBy('estado', 'asc')
            ->orderBy('fecha', 'desc')
            ->with('paciente')->get();
        return view('dashboard.pacientes-historial', compact('citas'));
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

    public function detalle(string $idPaciente, string $idCita)
    {
        $cita = Citas::where('idCita', $idCita)
            ->with('recetas')
            ->first();

        $medicinas = Medicinas::where('stock', '>', 0)->get();

        return view('dashboard.detalle-cita', compact('cita', 'medicinas'));
    }

    public function guardar_detalle(Request $request, string $idPaciente, string $idCita)
    {
        $body = $request->all();
        $notas_consulta = $body['notas'];
        $medicinas = $body['medicina'] ?? [];
        $cantidades = $body['cantidad'] ?? [];
        $comentarios = $body['comentario'] ?? [];

        $recetas = [];
        for ($i = 0; $i < count($medicinas); $i++) {
            $m = $medicinas[$i];
            $ca = $cantidades[$i];
            $co = $comentarios[$i];
            array_push($recetas, [
                'idMedicina' => intval($m),
                'idCita' => intval($idCita),
                'cantidad' => intval($ca),
                'nota' => $co
            ]);
        }

        Citas::where('idCita', $idCita)->update([
            'notas' => $notas_consulta,
            'estado' => 'R'
        ]);

        Recetas::insert($recetas);

        return to_route('historial-paciente', ['paciente' => $idPaciente]);
    }
}
