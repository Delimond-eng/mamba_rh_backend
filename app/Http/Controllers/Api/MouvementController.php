<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mouvement;
use Illuminate\Http\Request;

class MouvementController extends Controller
{
    public function index()
    {
        return Mouvement::with(['agentAbsent','agentRemplacant','site'])->paginate(25);
    }

    public function show(Mouvement $mouvement)
    {
        return $mouvement->load(['agentAbsent','agentRemplacant','site']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'agent_absent_id' => 'required|integer|exists:agents,id',
            'agent_remplacant_id' => 'required|integer|exists:agents,id',
            'site_id' => 'required|integer|exists:sites,id',
            'poste' => 'required|string',
            'motif' => 'required|in:absence,congé,sanction,urgence',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date',
            'status' => 'nullable|in:actif,terminé,annulé',
        ]);

        $m = Mouvement::create($data);
        return response()->json($m, 201);
    }

    public function update(Request $request, Mouvement $mouvement)
    {
        $data = $request->validate([
            'poste' => 'sometimes|string',
            'motif' => 'sometimes|in:absence,congé,sanction,urgence',
            'date_debut' => 'sometimes|date',
            'date_fin' => 'nullable|date',
            'status' => 'nullable|in:actif,terminé,annulé',
        ]);

        $mouvement->update($data);
        return response()->json($mouvement, 200);
    }

    public function destroy(Mouvement $mouvement)
    {
        $mouvement->delete();
        return response()->noContent();
    }
}
