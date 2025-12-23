<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sanction;
use Illuminate\Http\Request;

class SanctionController extends Controller
{
    public function index()
    {
        return Sanction::with(['agent','saisiPar'])->paginate(25);
    }

    public function show(Sanction $sanction)
    {
        return $sanction->load(['agent','saisiPar']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'agent_id' => 'required|integer|exists:agents,id',
            'type' => 'required|in:avertissement,blame,mise_a_pied',
            'duree' => 'nullable|integer',
            'motif' => 'required|string',
            'date_effet' => 'required|date',
            'saisi_par' => 'nullable|integer|exists:users,id',
        ]);

        $sanction = Sanction::create($data);
        return response()->json($sanction, 201);
    }

    public function update(Request $request, Sanction $sanction)
    {
        $data = $request->validate([
            'type' => 'sometimes|in:avertissement,blame,mise_a_pied',
            'duree' => 'nullable|integer',
            'motif' => 'sometimes|string',
            'date_effet' => 'sometimes|date',
            'saisi_par' => 'nullable|integer|exists:users,id',
        ]);

        $sanction->update($data);
        return response()->json($sanction, 200);
    }

    public function destroy(Sanction $sanction)
    {
        $sanction->delete();
        return response()->noContent();
    }
}
