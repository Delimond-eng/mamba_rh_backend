<?php

namespace App\Http\Controllers;

use App\Models\Affectation;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AffectationController extends Controller
{
    /**
     * .
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'agent_ids' => 'required|array|min:1',
            'agent_ids.*' => 'required|int|exists:agents,id',
            'ancien_site_id' => 'nullable|int|exists:sites,id',
            'nouveau_site_id' => 'required|int|exists:sites,id',
            'type_affectation' => 'required|in:exclusive,temporaire',
            'motif' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut',
        ]);

        DB::beginTransaction();
        try {
            $created = [];
            foreach ($data['agent_ids'] as $agentId) {
                $agent = Agent::findOrFail($agentId);

                $aff = Affectation::create([
                    'agent_id' => $agent->id,
                    'ancien_site_id' => $data['ancien_site_id'] ?? $agent->site_id,
                    'nouveau_site_id' => $data['nouveau_site_id'],
                    'type_affectation' => $data['type_affectation'],
                    'motif' => $data['motif'],
                    'date_debut' => $data['date_debut'],
                    'date_fin' => $data['date_fin'] ?? null,
                    'update_site_agent' => $data['type_affectation'] === 'exclusive' ? true : false,
                ]);


                if ($data['type_affectation'] === 'exclusive') {
                    $agent->site_id = $data['nouveau_site_id'];
                    $agent->save();
                }

                $created[] = $aff;
            }

            DB::commit();

            return response()->json(['status' => 'success', 'result' => $created]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
