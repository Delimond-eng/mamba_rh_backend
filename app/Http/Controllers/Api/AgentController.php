<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\AgentBareme;
use App\Models\AgentAutorisation;

class AgentController extends Controller
{
    public function index()
    {
        $agents = Agent::with(['site','service','groupe','agentInfo','baremes'])
            ->orderBy('id', 'desc')
            ->get();


        $result = $agents->map(function($agent) {
            $info = $agent->agentInfo ?? null;
            $activeBareme = null;
            if ($agent->relationLoaded('baremes') && !empty($agent->baremes)) {
                $b = collect($agent->baremes)->where('actif', 1)->sortByDesc('assigned_at')->first();
                if ($b) $activeBareme = $b['bareme_id'] ?? null;
            }

            return [
                'id' => $agent->id,
                'matricule' => $agent->matricule,
                'fullname' => $agent->fullname,
                'photo' => $agent->photo,
                'telephone' => $info->telephone ?? null,
                'email' => $info->email ?? null,
                'date_embauche' => $info->date_embauche ?? null,
                'service' => $agent->service ? ['id' => $agent->service->id, 'name' => ($agent->service->nom ?? $agent->service->name)] : null,
                'site' => $agent->site ? ['id' => $agent->site->id, 'name' => ($agent->site->nom ?? $agent->site->name)] : null,
                'status' => $agent->status ?? null,
                'groupe' => $agent->groupe ? ['id' => $agent->groupe->id, 'name' => ($agent->groupe->libelle ?? $agent->groupe->name)] : null,
                'bareme_active_id' => $activeBareme,
                'autorisations_count' => AgentAutorisation::where('agent_id', $agent->id)->count(),
            ];
        });

        return response()->json(['data' => $result]);
    }

    public function show($id)
    {
        $agent = Agent::with(['site','service','groupe'])
            ->findOrFail($id);

        $info = $agent->agentInfo()->first();
        $agent->info = $info;

        $bareme = AgentBareme::where('agent_id', $agent->id)->where('actif', 1)->orderBy('assigned_at', 'desc')->with('bareme')->first();
        $agent->bareme = $bareme ? $bareme->bareme : null;
      
        $agent->autorisations = AgentAutorisation::with('autorisationType')->where('agent_id', $agent->id)->orderBy('id', 'desc')->get();

        return response()->json($agent);
    }
}
