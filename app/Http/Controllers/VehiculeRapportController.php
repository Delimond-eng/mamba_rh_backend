<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehiculeRapport;
use App\Models\Vehicule;
use Illuminate\Support\Facades\Auth;

class VehiculeRapportController extends Controller
{
    public function index()
    {
        $vehicules = Vehicule::orderBy('immatriculation')->get();
        return view('vehicule_rapports', compact('vehicules'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'vehicule_id' => 'required|exists:vehicules,id',
            'date_rapport' => 'required|date',
            'kilometrage' => 'nullable|integer',
            'kilometrage_debut' => 'nullable|integer',
            'kilometrage_fin' => 'nullable|integer',
            'niveau_carburant' => 'nullable|string',
            'carburant_recu' => 'nullable|numeric',
            'observation' => 'nullable|string',
            'agent_id' => 'nullable|exists:agents,id',
        ]);

        // validate niveau_carburant values
        if (!empty($validated['niveau_carburant'])) {
            $allowed = ['1/4','1/2','3/4','4/4','-1/4','-1/2','-3/4','-4/4'];
            $parts = array_filter(array_map('trim', explode(',', $validated['niveau_carburant'])));
            foreach ($parts as $p) {
                if (!in_array($p, $allowed)) {
                    return response()->json(['status' => 'error', 'errors' => ['niveau_carburant' => ["Valeur de niveau carburant invalide: {$p}"]]], 422);
                }
            }
            // store normalized (comma separated)
            $validated['niveau_carburant'] = implode(',', $parts);
        }

        $validated['agent_id'] = $validated['agent_id'] ?? Auth::id();

        $r = VehiculeRapport::create($validated);
        return response()->json(['status' => 'success', 'rapport' => $r], 201);
    }

    public function listRecent()
    {
        return response()->json(VehiculeRapport::with('vehicule','agent')->orderByDesc('id')->limit(200)->get());
    }
}
