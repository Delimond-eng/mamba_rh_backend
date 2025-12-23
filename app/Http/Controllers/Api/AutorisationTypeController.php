<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AutorisationType;

class AutorisationTypeController extends Controller
{
    public function index()
    {
        return response()->json(AutorisationType::orderBy('id','desc')->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => 'required|string|max:100|unique:autorisations_types,code',
            'libelle' => 'required|string|max:191',
            'type' => 'required|in:conge,autorisation',
            'nombre_jours' => 'nullable|integer|min:1',
            'payable' => 'boolean',
            'justificatif_obligatoire' => 'boolean',
            'status' => 'nullable|string'
        ]);

        try {
            $t = AutorisationType::create($data + [
                'payable' => $request->boolean('payable', true),
                'justificatif_obligatoire' => $request->boolean('justificatif_obligatoire', false),
                'status' => $request->input('status','actif')
            ]);
            return response()->json($t, 201);
        } catch (\Exception $e) {
            report($e);
            return response()->json(['message' => 'Erreur serveur lors de la création du type d\'autorisation'], 500);
        }
    }

    public function show($id)
    {
        $t = AutorisationType::findOrFail($id);
        return response()->json($t);
    }

    public function update(Request $request, $id)
    {
        $t = AutorisationType::findOrFail($id);
        $data = $request->validate([
            'code' => 'required|string|max:100|unique:autorisations_types,code,'.$id,
            'libelle' => 'required|string|max:191',
            'type' => 'required|in:conge,autorisation',
            'nombre_jours' => 'nullable|integer|min:1',
            'payable' => 'boolean',
            'justificatif_obligatoire' => 'boolean',
            'status' => 'nullable|string'
        ]);

        try {
            $t->update($data + [
                'payable' => $request->boolean('payable', $t->payable),
                'justificatif_obligatoire' => $request->boolean('justificatif_obligatoire', $t->justificatif_obligatoire),
            ]);
            return response()->json($t);
        } catch (\Exception $e) {
            report($e);
            return response()->json(['message' => 'Erreur serveur lors de la mise à jour'], 500);
        }
    }

    public function destroy($id)
    {
        $t = AutorisationType::findOrFail($id);
        $t->delete();
        return response()->json(['deleted' => true]);
    }
}
