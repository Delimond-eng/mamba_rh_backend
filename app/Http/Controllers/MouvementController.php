<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Agent;
use App\Models\Sanction;
use App\Models\AgentSeparation;
use App\Models\AgentAutorisation;

class MouvementController extends Controller
{
    /**
     * creation des mouvements avec gestion des motifs lies.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'agent_id' => 'required|integer|exists:agents,id',
            'agent_remplace_id' => 'required|integer|exists:agents,id',
            'site_id' => 'nullable|integer|exists:sites,id',
            'groupe_id' => 'nullable|integer|exists:agent_groups,id',
            'type_mouvement' => 'required|in:remplacement,affectation_temporaire,retour_disponible',
            'motif_type' => 'nullable|string',
            'motif_payload' => 'nullable|array',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date',
            'observation' => 'nullable|string'
        ]);

        DB::beginTransaction();
        try {

            $replaced = Agent::findOrFail($data['agent_remplace_id']);

           //determine site_id and groupe_id to use
            $siteId = $data['site_id'] ?? $replaced->site_id ?? null;
            $groupeId = $data['groupe_id'] ?? $replaced->groupe_id ?? null;

            $motifType = $data['motif_type'] ?? null;

            $motifEnum = null;
            if ($motifType === 'Sanction') {
                $motifEnum = 'sanction';
            } elseif ($motifType === 'Conge') {
                $motifEnum = 'congé';
            } elseif ($motifType === 'Separation') {
                $motifEnum = 'absence';
            } elseif ($motifType === 'Desertion') {
                $motifEnum = 'urgence';
            }

            $mvtId = DB::table('mouvements')->insertGetId([
                'agent_absent_id' => $data['agent_id'],

                'agent_remplacant_id' => $data['agent_remplace_id'],
                'site_id' => $siteId,

                'poste' => $groupeId ? (string)$groupeId : null,
                'motif' => $motifEnum,
                'date_debut' => $data['date_debut'],
                'date_fin' => $data['date_fin'] ?? null,

                'status' => 'actif',
                'created_at' => now(),
                'updated_at' => now()
            ]);

            $motifType = $data['motif_type'] ?? null;
            $motifId = null;


            if ($motifType === 'Sanction') {
                $mp = $data['motif_payload'] ?? [];
                $s = Sanction::create([
                    'agent_id' => $replaced->id,
                    'type' => $mp['type'] ?? 'avertissement',
                    'duree_jours' => isset($mp['duree_jours']) ? $mp['duree_jours'] : ($mp['duree'] ?? null),
                    'motif' => $mp['motif'] ?? null,
                    'date_sanction' => $data['date_debut'],
                    'statut' => $mp['statut'] ?? 'actif'
                ]);
                $motifType = 'sanctions';
                $motifId = $s->id;
            } elseif ($motifType === 'Separation') {
                $mp = $data['motif_payload'] ?? [];
                $sep = AgentSeparation::create([
                    'agent_id' => $replaced->id,
                    'type' => $mp['type'] ?? 'fin_contrat',
                    'date_evenement' => $mp['date_evenement'] ?? $data['date_debut'],
                    'motif' => $mp['motif'] ?? null,
                    'document_remis' => $mp['document_remis'] ?? false,
                    'solde_final_effectue' => $mp['solde_final_effectue'] ?? false,
                    'decision_par' => $mp['decision_par'] ?? null,
                    'status' => $mp['status'] ?? 'valide'
                ]);
                $motifType = 'agent_separations';
                $motifId = $sep->id;
            } elseif ($motifType === 'Conge') {
                $mp = $data['motif_payload'] ?? [];
                $debut = $mp['date_debut'] ?? $data['date_debut'];
                $dateFin = $mp['date_fin'] ?? null;
                if (empty($debut) && empty($mp['autorisation_type_id'])) {

                    throw new \Exception('Données de congé incomplètes');
                }
                if (empty($dateFin) && !empty($mp['duree_jours'])) {
                    $dt = \Carbon\Carbon::parse($debut);
                    $dt->addDays(intval($mp['duree_jours']));
                    $dateFin = $dt->toDateString();
                }

                $a = AgentAutorisation::create([
                    'agent_id' => $replaced->id,
                    'autorisation_type_id' => $mp['autorisation_type_id'] ?? null,
                    'date_debut' => $debut,
                    'date_fin' => $dateFin,
                    'status' => $mp['status'] ?? 'en_attente',
                    'created_by' => $request->user()->id ?? null
                ]);
                $motifType = 'agent_autorisations';
                $motifId = $a->id;
            } elseif ($motifType === 'Desertion') {
               
                $motifType = 'desertions';
                $motifId = null;
            }
      DB::commit();

            $movement = DB::table('mouvements')->where('id', $mvtId)->first();
            return response()->json(['status' => 'success', 'data' => ['mouvement' => $movement, 'motif_id' => $motifId, 'motif_type' => $motifType]]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
