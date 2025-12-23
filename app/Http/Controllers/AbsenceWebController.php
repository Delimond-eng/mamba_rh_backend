<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absence;
use App\Models\Agent;
use App\Models\Site;
use Illuminate\Support\Facades\Auth;

class AbsenceWebController extends Controller
{
    public function index()
    {
        $sites = Site::orderBy('name')->get();
        $agents = Agent::orderBy('fullname')->get();
        return view('absences', compact('sites','agents'));
    }

    // create multiple absences for many agents
    public function storeBulk(Request $request)
    {
        $data = $request->validate([
            'agent_ids' => 'required|array|min:1',
            'agent_ids.*' => 'integer|exists:agents,id',
            'type_absence' => 'required|in:absence_12h,absence_24h',
            'motif' => 'required|string',
            'date_absence' => 'required|date',
            'observation' => 'nullable|string',
        ]);

        $created = [];
        foreach ($data['agent_ids'] as $agentId) {
            $created[] = Absence::create([
                'agent_id' => $agentId,
                'type_absence' => $data['type_absence'],
                'motif' => $data['motif'],
                'date_absence' => $data['date_absence'],
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
        return response()->json(Absence::with('agent','saisiPar')->orderByDesc('id')->limit(200)->get());
    }
}
