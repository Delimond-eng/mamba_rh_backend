<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicule;

class VehiculeController extends Controller
{
    public function index()
    {
        $vehicules = Vehicule::orderBy('immatriculation')->get();
        return view('vehicules', compact('vehicules'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'immatriculation' => 'required|string|unique:vehicules,immatriculation',
            'marque' => 'required|string',
            'modele' => 'nullable|string',
            'etat' => 'required|in:actif,maintenance,hors_service',
        ]);

        $v = Vehicule::create($data);
        return response()->json(['status' => 'success', 'vehicule' => $v], 201);
    }

    public function update(Request $request, Vehicule $vehicule)
    {
        $data = $request->validate([
            'immatriculation' => 'required|string|unique:vehicules,immatriculation,' . $vehicule->id,
            'marque' => 'required|string',
            'modele' => 'nullable|string',
            'etat' => 'required|in:actif,maintenance,hors_service',
        ]);

        $vehicule->update($data);
        return response()->json(['status' => 'success', 'vehicule' => $vehicule]);
    }

    public function destroy(Vehicule $vehicule)
    {
        $vehicule->delete();
        return response()->json(['status' => 'success']);
    }

    public function listAll()
    {
        return response()->json(Vehicule::orderBy('immatriculation')->get());
    }
}
