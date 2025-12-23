<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AgentServiceHistory;
use Illuminate\Http\Request;

class AgentServiceHistoryController extends Controller
{
    public function index()
    {
        return AgentServiceHistory::with(['agent','service','saisiPar'])->paginate(25);
    }

    public function show(AgentServiceHistory $agentServiceHistory)
    {
        return $agentServiceHistory->load(['agent','service','saisiPar']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'agent_id' => 'required|integer|exists:agents,id',
            'service_id' => 'required|integer|exists:services,id',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date',
            'saisi_par' => 'nullable|integer|exists:users,id',
        ]);

        $h = AgentServiceHistory::create($data);
        return response()->json($h, 201);
    }

    public function update(Request $request, AgentServiceHistory $agentServiceHistory)
    {
        $data = $request->validate([
            'date_debut' => 'sometimes|date',
            'date_fin' => 'nullable|date',
            'saisi_par' => 'nullable|integer|exists:users,id',
        ]);

        $agentServiceHistory->update($data);
        return response()->json($agentServiceHistory, 200);
    }

    public function destroy(AgentServiceHistory $agentServiceHistory)
    {
        $agentServiceHistory->delete();
        return response()->noContent();
    }
}
