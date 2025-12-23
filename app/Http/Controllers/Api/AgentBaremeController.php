<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AgentBareme;

class AgentBaremeController extends Controller
{
    public function index()
    {
        return response()->json(AgentBareme::with(['agent','bareme'])->orderBy('id','desc')->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'agent_id' => 'required|exists:agents,id',
            'bareme_id' => 'required|exists:baremes_salariaux,id',
            'note' => 'nullable|string',
        ]);

     
        $exists = AgentBareme::where('agent_id', $data['agent_id'])->where('bareme_id', $data['bareme_id'])->exists();
        if ($exists) {
            return response()->json(['message' => 'Affectation déjà existante'], 422);
        }

        $ab = AgentBareme::create(array_merge($data, ['assigned_at' => now(), 'actif' => 1]));
        return response()->json($ab, 201);
    }

    public function show($id)
    {
        $ab = AgentBareme::with(['agent','bareme'])->findOrFail($id);
        return response()->json($ab);
    }

    public function update(Request $request, $id)
    {
        $ab = AgentBareme::findOrFail($id);
        $data = $request->validate([
            'actif' => 'nullable|boolean',
            'note' => 'nullable|string',
        ]);
        $ab->update($data);
        return response()->json($ab);
    }

    public function destroy($id)
    {
        $ab = AgentBareme::findOrFail($id);
        $ab->delete();
        return response()->json(['deleted' => true]);
    }
}
