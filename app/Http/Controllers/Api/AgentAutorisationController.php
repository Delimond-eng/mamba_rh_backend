<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AgentAutorisation;
use App\Models\AutorisationType;
use Carbon\Carbon;

class AgentAutorisationController extends Controller
{
    public function index()
    {
        return response()->json(AgentAutorisation::with(['autorisationType','agent'])->orderBy('id','desc')->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'agent_id' => 'required|exists:agents,id',
            'autorisation_type_id' => 'required|exists:autorisations_types,id',
            'date_debut' => 'required|date',
            'status' => 'nullable|string'
        ]);

        try {
            $type = AutorisationType::findOrFail($data['autorisation_type_id']);
            $dateDebut = Carbon::parse($data['date_debut']);
            $dateFin = null;
            if (!is_null($type->nombre_jours)) {
              
                $dateFin = $dateDebut->copy()->addDays(max(0, $type->nombre_jours - 1))->toDateString();
            }

            $record = AgentAutorisation::create([
                'agent_id' => $data['agent_id'],
                'autorisation_type_id' => $data['autorisation_type_id'],
                'date_debut' => $dateDebut->toDateString(),
                'date_fin' => $dateFin,
                'status' => $request->input('status','en_attente'),
                'created_by' => auth()->id() ?? null,
            ]);

            return response()->json($record, 201);
        } catch (\Exception $e) {
            report($e);
            return response()->json(['message' => 'Erreur serveur lors de la création de l\'autorisation'], 500);
        }
    }

    public function show($id)
    {
        $r = AgentAutorisation::with(['autorisationType','agent'])->findOrFail($id);
        return response()->json($r);
    }

    public function update(Request $request, $id)
    {
        $r = AgentAutorisation::findOrFail($id);
        $data = $request->validate([
            'date_debut' => 'required|date',
            'status' => 'nullable|string'
        ]);

        try {
            $type = AutorisationType::findOrFail($r->autorisation_type_id);
            $dateDebut = Carbon::parse($data['date_debut']);
            $dateFin = null;
            if (!is_null($type->nombre_jours)) {
                $dateFin = $dateDebut->copy()->addDays(max(0, $type->nombre_jours - 1))->toDateString();
            }

            $r->update([
                'date_debut' => $dateDebut->toDateString(),
                'date_fin' => $dateFin,
                'status' => $request->input('status', $r->status),
            ]);

            return response()->json($r);
        } catch (\Exception $e) {
            report($e);
            return response()->json(['message' => 'Erreur serveur lors de la mise à jour'], 500);
        }
    }

    public function destroy($id)
    {
        $r = AgentAutorisation::findOrFail($id);
        $r->delete();
        return response()->json(['deleted' => true]);
    }
}
