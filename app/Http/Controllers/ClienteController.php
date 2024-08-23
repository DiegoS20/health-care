<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Citas;
use App\Models\Medicinas;
use App\Models\Paciente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->session()->get('cliente_logged_id');
        $paciente = Paciente::where('idPaciente', $id)->first();
        $citas = Citas::where('idPaciente', $id)->get();
        return view('cliente.index', compact('paciente', 'citas'));
    }

    public function detalles(string $id)
    {
        $cita = Citas::where('idCita', $id)
            ->with('recetas')
            ->first();
        $medicinas = Medicinas::where('stock', '>', 0)->get();
        return view('cliente.detalle', compact('cita', 'medicinas'));
    }
}
