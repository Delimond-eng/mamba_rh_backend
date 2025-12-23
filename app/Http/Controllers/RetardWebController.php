<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Retard;
use App\Models\Agent;
use App\Models\Site;
use Illuminate\Support\Facades\Auth;

class RetardWebController extends Controller
{
    public function index()
    {
        $sites = Site::orderBy('name')->get();
        $agents = Agent::orderBy('fullname')->get();
        return view('retards', compact('sites','agents'));
    }

    public function storeBulk(Request $request)
    {
        $data = $request->validate([
            'agent_ids' => 'required|array|min:1',
            'agent_ids.*' => 'integer|exists:agents,id',
            'motif' => 'required|string',
            'date_retard' => 'required|date',
            'heure_arrivee' => 'nullable|date_format:H:i',
            'observation' => 'nullable|string',
        ]);

        $created = [];
        foreach ($data['agent_ids'] as $agentId) {
            $created[] = Retard::create([
                'agent_id' => $agentId,
                'motif' => $data['motif'],
                'date_retard' => $data['date_retard'],
                'heure_arrivee' => $data['heure_arrivee'] ?? null,
                'observation' => $data['observation'] ?? null,
                'saisi_par' => Auth::id(),
            ]);
        }

        return response()->json(['status' => 'success', 'count' => count($created)], 201);
    }

    public function agentsBySite($site = null)
    {
        $q = Agent::orderBy('fullname');
        if ($site && $site !== 'all') $q->where('site_id', $site);
        $list = $q->get()->map(fn($a) => ['id' => $a->id, 'text' => $a->fullname . ' — #' . $a->matricule . ($a->site? ' (' . $a->site->name . ')' : '')])->toArray();
        return response()->json($list);
    }

    public function listRecent()
    {
        return response()->json(Retard::with('agent','saisiPar')->orderByDesc('id')->limit(200)->get());
    }
}
