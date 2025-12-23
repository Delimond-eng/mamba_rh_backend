<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppelNonRepondu;
use App\Models\Agent;
use App\Models\Site;
use Illuminate\Support\Facades\Auth;

class AppelNonReponduController extends Controller
{
    public function index()
    {
        $sites = Site::orderBy('name')->get();
       
        $agents = Agent::orderBy('fullname')->limit(200)->get();
        return view('appels_non_repondu', compact('sites', 'agents'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'agent_ids' => 'required|array|min:1',
            'agent_ids.*' => 'integer|exists:agents,id',
            'date_appel' => 'required|date',
            'heure' => 'nullable|string',
            'nombre_appels' => 'nullable|integer|min:1',
        ]);

        $userId = Auth::id();

        $created = [];
        foreach ($data['agent_ids'] as $agentId) {
            $a = AppelNonRepondu::create([
                'agent_id' => $agentId,
                'date_appel' => $data['date_appel'],
                'heure' => $data['heure'] ?? null,
                'nombre_appels' => $data['nombre_appels'] ?? 1,
                'saisi_par' => $userId,
            ]);
            $created[] = $a->id;
        }

        return response()->json(['status' => 'success', 'created' => $created], 201);
    }

    public function agentsBySite($siteId = null)
    {
        if (!$siteId || $siteId === 'all') {
            $agents = Agent::orderBy('fullname')->get();
        } else {
            $agents = Agent::where('site_id', $siteId)->orderBy('fullname')->get();
        }

        return response()->json($agents->map(function($a){
            return ['id' => $a->id, 'text' => $a->fullname . ' — #' . $a->matricule . ($a->site ? ' (' . $a->site->name . ')' : '')];
        }));
    }
}
