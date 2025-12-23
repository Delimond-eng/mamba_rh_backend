<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sanction;
use App\Models\Agent;

class SanctionController extends Controller
{
    public function index(Request $request)
    {
        $key = $request->query('key') ?? 'all';
        $query = Sanction::with('agent')->orderBy('date_sanction', 'desc');
        if ($key === 'active') {
            $query->where('statut', 'actif');
        }
        $items = $query->get();
        return response()->json(['data' => $items]);
    }

    public function store(Request $request)
    {
        $messages = [
            'date_sanction.required' => 'Le champ date sanction est requis.',
        ];

        $data = $request->validate([
            'agent_ids' => 'required|array|min:1',
            'agent_ids.*' => 'integer|exists:agents,id',
            'type' => 'required|in:avertissement,blame,mise_en_garde,mise_a_pied',
            'duree_jours' => 'nullable|integer',
            'motif' => 'nullable|string',
            'date_sanction' => 'required|date',
        ], $messages);

        $created = [];
        foreach ($data['agent_ids'] as $aid) {
            $payload = [
                'agent_id' => $aid,
                'type' => $data['type'],
                'duree_jours' => $data['type'] === 'mise_a_pied' ? ($data['duree_jours'] ?? null) : null,
                'motif' => $data['motif'] ?? null,
                'date_sanction' => $data['date_sanction'],
                'statut' => 'actif'
            ];
            $s = Sanction::create($payload);
            $created[] = $s;
        }

        return response()->json(['status' => 'success', 'data' => $created]);
    }

    public function updateStatus(Request $request, $id)
    {
        $s = Sanction::findOrFail($id);
        $data = $request->validate(['statut' => 'required|in:actif,levee,annulee']);
        $s->statut = $data['statut'];
        $s->save();
        return response()->json(['status' => 'success', 'data' => $s]);
    }
}
