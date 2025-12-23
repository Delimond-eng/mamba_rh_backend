<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BaremeSalariaux;

class BaremeSalariauxController extends Controller
{
    public function index()
    {
        return response()->json(BaremeSalariaux::orderBy('id','desc')->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'categorie' => 'required|string|max:100',
            'classe' => 'required|string|max:50',
            'echelon' => 'required|string|max:50',
            'fonction' => 'nullable|string',
            'allocation_familiale' => 'nullable|numeric',
            'transport_journalier'=> 'nullable|numeric',
            'transport_mensuel'=> 'nullable|numeric',
            'prime_fonction'=> 'nullable|numeric',
            'prime_risque'=> 'nullable|numeric',
            'prime_anciennete'=> 'nullable|numeric',
            'treizieme_mois'=> 'nullable|numeric',
            'treizieme_mois_montant'=> 'nullable|numeric',
            'note'=> 'nullable|string',
            'salaire_mensuel' => 'nullable|numeric',
            'devise' => 'nullable|string|max:10',
            'statut' => 'nullable|in:actif,inactif',
        ]);
  
        $exists = BaremeSalariaux::where('categorie', $data['categorie'])
            ->where('classe', $data['classe'])
            ->where('echelon', $data['echelon'])
            ->exists();
        if ($exists) {
            return response()->json(['message' => 'Un barème existe déjà pour cette catégorie/classe/échelon'], 422);
        }

        try {
            $bareme = BaremeSalariaux::create($data + $request->only([
                'allocation_familiale','transport_journalier','transport_mensuel',
                'prime_fonction','prime_risque','prime_anciennete','treizieme_mois','treizieme_mois_montant','note'
            ]));
            return response()->json($bareme, 201);
        } catch (\Exception $e) {
            report($e);
            return response()->json(['message' => 'Erreur serveur lors de la création du barème', 'data' => $data ], 500);
        }
    }

    public function show($id)
    {
        $b = BaremeSalariaux::findOrFail($id);
        return response()->json($b);
    }

    public function update(Request $request, $id)
    {
        $b = BaremeSalariaux::findOrFail($id);
        $data = $request->validate([
            'categorie' => 'required|string|max:100',
            'classe' => 'required|string|max:50',
            'echelon' => 'required|string|max:50',
            'fonction' => 'nullable|string',
            'salaire_mensuel' => 'nullable|numeric',
            'devise' => 'nullable|string|max:10',
            'statut' => 'nullable|in:actif,inactif',
        ]);
        try {
            $b->update($data + $request->only([
                'allocation_familiale','transport_journalier','transport_mensuel',
                'prime_fonction','prime_risque','prime_anciennete','treizieme_mois','treizieme_mois_montant','note'
            ]));
            return response()->json($b);
        } catch (\Exception $e) {
            report($e);
            return response()->json(['message' => 'Erreur serveur lors de la mise à jour du barème'], 500);
        }
    }

    public function destroy($id)
    {
        $b = BaremeSalariaux::findOrFail($id);
        $b->delete();
        return response()->json(['deleted' => true]);
    }
}
