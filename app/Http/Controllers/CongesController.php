<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AgentAutorisation;
use App\Models\AutorisationType;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CongesController extends Controller
{
    // Assigner les autorisations (congés) à des agents
    public function assign(Request $request)
    {
        $data = $request->validate([
            'agent_ids' => 'required|array|min:1',
            'agent_ids.*' => 'required|integer|exists:agents,id',
            'autorisation_type_id' => 'required|exists:autorisations_types,id',
            'date_debut' => 'required|date',
            'status' => 'nullable|string'
        ]);

        try {
            $type = AutorisationType::findOrFail($data['autorisation_type_id']);
            $dateDebut = Carbon::parse($data['date_debut']);

            $records = [];
            foreach ($data['agent_ids'] as $agentId) {
                $dateFin = null;
                if (!is_null($type->nombre_jours)) {
                    $dateFin = $dateDebut->copy()->addDays(max(0, $type->nombre_jours - 1))->toDateString();
                }
                $records[] = AgentAutorisation::create([
                    'agent_id' => $agentId,
                    'autorisation_type_id' => $data['autorisation_type_id'],
                    'date_debut' => $dateDebut->toDateString(),
                    'date_fin' => $dateFin,
                    'status' => $request->input('status','en_attente'),
                    'created_by' => Auth::id() ?? null,
                ]);
            }

            return response()->json(['created' => count($records)], 201);
        } catch (\Exception $e) {
            report($e);
            return response()->json(['message' => 'Erreur serveur lors de l\'affectation des congés'], 500);
        }
    }
}
