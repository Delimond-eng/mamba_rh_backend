<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AgentSeparation;
use App\Models\Agent;
use Illuminate\Support\Facades\Auth;

class AgentSeparationController extends Controller
{

    public function index(Request $request)
    {
        $query = AgentSeparation::with('agent')->orderBy('date_evenement', 'desc');
        $key = $request->query('key') ?? 'all';
        if ($key === 'active') {
            $query->where('status', 'valide');
        }
        $items = $query->get();
        return response()->json(['data' => $items]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'agent_id' => 'required|integer|exists:agents,id',
            'type' => 'required|in:demission,licenciement,deces,essai_non_concluant,fin_contrat',
            'date_evenement' => 'required|date',
            'motif' => 'nullable|string',
            'document_remis' => 'nullable|boolean',
            'solde_final_effectue' => 'nullable|boolean',
            'decision_par' => 'nullable|string',
        ]);

        $sep = AgentSeparation::create([
            'agent_id' => $data['agent_id'],
            'type' => $data['type'],
            'date_evenement' => $data['date_evenement'],
            'motif' => $data['motif'] ?? null,
            'document_remis' => isset($data['document_remis']) ? (bool)$data['document_remis'] : false,
            'solde_final_effectue' => isset($data['solde_final_effectue']) ? (bool)$data['solde_final_effectue'] : false,
            'decision_par' => $data['decision_par'] ?? null,
            'status' => 'valide'
        ]);


        try {
            $agent = Agent::find($data['agent_id']);
            if ($agent) {
                $agent->status = $data['type'];
                $agent->save();
            }
        } catch (\Exception $e) {
            report($e);
        }

        return response()->json(['status' => 'success', 'data' => $sep]);
    }

   
    public function updateStatus(Request $request, $id)
    {
        $sep = AgentSeparation::findOrFail($id);
        $data = $request->validate([
            'status' => 'required|string'
        ]);
        $sep->status = $data['status'];
        $sep->save();
        return response()->json(['status' => 'success', 'data' => $sep]);
    }
}
