<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Medicinas;
use Illuminate\Http\Request;

class MedicinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $medicinas = [];
        if ($request->has('q') && $request->get('q') != '')
            $medicinas = Medicinas::where('nombre', 'LIKE', '%' . $request->get('q') . '%')->get();
        else
            $medicinas = Medicinas::all();

        return view('dashboard.medicinas', [
            'medicinas' => $medicinas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.medicinas-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string',
            'stock' => 'required|integer'
        ]);

        if (Medicinas::where('nombre', $validated['nombre'])->count() == 0) {
            Medicinas::create($validated);
        } else {
            Medicinas::where('nombre', $validated['nombre'])->increment('stock', $validated['stock']);
        }

        return to_route('medicinas');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $medicina = Medicinas::findOrFail($id);

        return view('dashboard.medicinas-form', [
            'nombre' => $medicina->nombre,
            'stock' => $medicina->stock
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nombre' => 'required|string',
            'stock' => 'required|integer'
        ]);

        if ($validated['stock'] == 0) {
            Medicinas::where('idMedicina', $id)->delete();
        } else {
            Medicinas::where('idMedicina', $id)->update([
                'nombre' => $validated['nombre'],
                'stock' => $validated['stock']
            ]);
        }

        return to_route('medicinas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Medicinas::where('idMedicina', $id)->delete();

        return to_route('medicinas');
    }
}
