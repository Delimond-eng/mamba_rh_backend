<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\AgentInfo;
use App\Models\AgentBareme;
use App\Models\AgentAutorisation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\AgentServiceHistory;

class AgentController extends Controller
{
    public function saveInfo(Request $request)
    {
        $data = $request->validate([
            'matricule' => 'required|string',
            'fullname' => 'nullable|string',
            'telephone' => 'nullable|string',
            'email' => 'nullable|email',
            'date_naissance' => 'nullable|date',
            'lieu_naissance' => 'nullable|string',
            'adresse' => 'nullable|string',
            'etat_civil' => 'nullable|string',
            'est_marie' => 'nullable|boolean',
            'nom_conjoint' => 'nullable|string',
            'nombre_enfants' => 'nullable|integer',
            'noms_enfants' => 'nullable|string',
            'groupe_horaire' => 'nullable|integer|exists:agent_groups,id',
            'service_id' => 'nullable|integer|exists:services,id',
            'site_id' => 'nullable|integer|exists:sites,id',
            'bareme' => 'nullable|integer',
            'type_emploi' => 'nullable|string',
            'password' => 'nullable|string',
            'photo_url' => 'nullable|string'
        ]);

        $agentId = $request->input('agent_id');


        $matExists = Agent::where('matricule', $data['matricule'])
            ->when($agentId, function ($q) use ($agentId) { return $q->where('id', '<>', $agentId); })
            ->exists();
        if ($matExists) {
            return response()->json(['message' => 'Matricule déjà utilisé par un autre agent'], 422);
        }

        // telephone / email in agent_infos
        if (!empty($data['telephone'])) {
            $telExists = AgentInfo::where('telephone', $data['telephone'])
                ->when($agentId, function ($q) use ($agentId) { return $q->where('agent_id', '<>', $agentId); })
                ->exists();
            if ($telExists) {
                return response()->json(['message' => 'Numéro de téléphone déjà utilisé par un autre agent'], 422);
            }
        }
        if (!empty($data['email'])) {
            $emailExists = AgentInfo::where('email', $data['email'])
                ->when($agentId, function ($q) use ($agentId) { return $q->where('agent_id', '<>', $agentId); })
                ->exists();
            if ($emailExists) {
                return response()->json(['message' => 'Adresse email déjà utilisée par un autre agent'], 422);
            }
        }

        if ($agentId) {
            $agent = Agent::find($agentId);
            if (!$agent) {
                return response()->json(['message' => 'Agent introuvable'], 404);
            }

            $agent->matricule = $data['matricule'];

            if ($request->filled('fullname')) {
                $agent->fullname = $request->input('fullname');
            }
            if (is_null($agent->password)) $agent->password = '';
        } else {
            $agent = Agent::firstOrCreate([
                'matricule' => $data['matricule']
            ], [

                'password' => '',
                'fullname' => $request->input('fullname', 'Nouvel agent'),
                'status' => 'actif'
            ]);
        }

        // Update agent fields
        if (isset($data['groupe_horaire'])) {
            $agent->groupe_id = $data['groupe_horaire'];
        }
        if (isset($data['site_id'])) {
            $agent->site_id = $data['site_id'];
        }
        if (isset($data['service_id'])) {
            // set service_id if model/table has this attribute
            try {
                $agent->service_id = $data['service_id'];
            } catch (\Exception $e) {

            }
        }
        if (!empty($data['password'])) {
            $agent->password = Hash::make($data['password']);
        }
        if (!empty($data['photo_url'])) {
            $agent->photo = $data['photo_url'];
        }
        $agent->save();


        $infoData = [
            'telephone' => $data['telephone'] ?? null,
            'email' => $data['email'] ?? null,
            'date_naissance' => $data['date_naissance'] ?? null,
            'lieu_naissance' => $data['lieu_naissance'] ?? null,
            'adresse' => $data['adresse'] ?? null,
            'etat_civil' => $data['etat_civil'] ?? null,
            'est_marie' => isset($data['est_marie']) ? (bool)$data['est_marie'] : false,
            'nom_conjoint' => $data['nom_conjoint'] ?? null,
            'nombre_enfants' => $data['nombre_enfants'] ?? 0,
            'date_embauche' => $request->input('date_embauche') ?? null,
            'type_emploi' => $data['type_emploi'] ?? null,
            'date_fin_contrat' => $request->input('date_fin_contrat') ?? null,
            'niveau_etude' => $request->input('niveau_etude') ?? null,
            'fonction' => $request->input('fonction') ?? null,
            'status' => $request->input('status') ?? 'actif'
        ];


        if (!empty($data['noms_enfants'])) {
            $arr = array_filter(array_map('trim', explode(',', $data['noms_enfants'])));
            $infoData['noms_enfants'] = $arr;
        }

        $agentInfo = AgentInfo::updateOrCreate([
            'agent_id' => $agent->id
        ], $infoData + ['agent_id' => $agent->id]);

        // Bareme assignment
        if (!empty($data['bareme'])) {
            AgentBareme::updateOrCreate([
                'agent_id' => $agent->id
            ], [
                'bareme_id' => $data['bareme'],
                'assigned_at' => now(),
                'actif' => 1
            ]);
        }


        if (!empty($data['service_id'])) {

            $dateDebut = $request->input('date_embauche') ?? ($infoData['date_embauche'] ?? null);
            if (empty($dateDebut)) {
                $dateDebut = now()->toDateString();
            }
            try {
                AgentServiceHistory::create([
                    'agent_id' => $agent->id,
                    'service_id' => $data['service_id'],
                    'date_debut' => $dateDebut,
                    'date_fin' => null,
                    'saisi_par' => Auth::id() ?? null,
                ]);
            } catch (\Exception $e) {

                report($e);
            }
        }


        return response()->json(['status' => 'success', 'agent_id' => $agent->id]);
    }

    public function uploadPhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|max:5120'
        ]);

        $file = $request->file('photo');
        $path = $file->store('public/agents');
        $url = Storage::url($path);
      
        $full = asset($url);

        return response()->json(['url' => $full]);
    }

}
