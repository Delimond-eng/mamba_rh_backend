<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VehiculeRapport;
use Illuminate\Http\Request;

class VehiculeRapportController extends Controller
{
    public function index()
    {
        return VehiculeRapport::with(['vehicule','agent'])->paginate(25);
    }

    public function show(VehiculeRapport $vehiculeRapport)
    {
        return $vehiculeRapport->load(['vehicule','agent']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'vehicule_id' => 'required|integer|exists:vehicules,id',
            'date_rapport' => 'required|date',
            'kilometrage' => 'nullable|integer',
            'observation' => 'nullable|string',
            'agent_id' => 'nullable|integer|exists:agents,id',
        ]);

        $r = VehiculeRapport::create($data);
        return response()->json($r, 201);
    }

    public function update(Request $request, VehiculeRapport $vehiculeRapport)
    {
        $data = $request->validate([
            'date_rapport' => 'sometimes|date',
            'kilometrage' => 'nullable|integer',
            'observation' => 'nullable|string',
            'agent_id' => 'nullable|integer|exists:agents,id',
        ]);

        $vehiculeRapport->update($data);
        return response()->json($vehiculeRapport, 200);
    }

    public function destroy(VehiculeRapport $vehiculeRapport)
    {
        $vehiculeRapport->delete();
        return response()->noContent();
    }
}
