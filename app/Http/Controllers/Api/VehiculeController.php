<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    public function index()
    {
        return Vehicule::with('rapports')->paginate(25);
    }

    public function show(Vehicule $vehicule)
    {
        return $vehicule->load('rapports');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'immatriculation' => 'required|string|unique:vehicules,immatriculation',
            'marque' => 'required|string',
            'modele' => 'nullable|string',
            'etat' => 'nullable|in:actif,maintenance,hors_service',
        ]);

        $v = Vehicule::create($data);
        return response()->json($v, 201);
    }

    public function update(Request $request, Vehicule $vehicule)
    {
        $data = $request->validate([
            'immatriculation' => 'sometimes|string|unique:vehicules,immatriculation,' . $vehicule->id,
            'marque' => 'sometimes|string',
            'modele' => 'nullable|string',
            'etat' => 'nullable|in:actif,maintenance,hors_service',
        ]);

        $vehicule->update($data);
        return response()->json($vehicule, 200);
    }

    public function destroy(Vehicule $vehicule)
    {
        $vehicule->delete();
        return response()->noContent();
    }
}
