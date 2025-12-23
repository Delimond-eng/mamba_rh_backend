<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AppelNonRepondu;
use Illuminate\Http\Request;

class AppelNonReponduController extends Controller
{
    public function index()
    {
        return AppelNonRepondu::with(['agent','saisiPar'])->paginate(25);
    }

    public function show(AppelNonRepondu $appel_non_repondu)
    {
        return $appel_non_repondu->load(['agent','saisiPar']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'agent_id' => 'required|integer|exists:agents,id',
            'date_appel' => 'required|date',
            'heure' => 'required',
            'nombre_appels' => 'nullable|integer',
            'saisi_par' => 'nullable|integer|exists:users,id',
        ]);

        $a = AppelNonRepondu::create($data);
        return response()->json($a, 201);
    }

    public function update(Request $request, AppelNonRepondu $appel_non_repondu)
    {
        $data = $request->validate([
            'date_appel' => 'sometimes|date',
            'heure' => 'sometimes',
            'nombre_appels' => 'nullable|integer',
            'saisi_par' => 'nullable|integer|exists:users,id',
        ]);

        $appel_non_repondu->update($data);
        return response()->json($appel_non_repondu, 200);
    }

    public function destroy(AppelNonRepondu $appel_non_repondu)
    {
        $appel_non_repondu->delete();
        return response()->noContent();
    }
}
