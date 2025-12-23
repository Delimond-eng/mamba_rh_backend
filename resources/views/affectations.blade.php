@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="intro-y box p-5">
        <h2 class="text-lg font-medium mb-4">Nouvelle affectation</h2>
        <style>
        /* Small card wrappers for each input group */
        .affect-card { background:#fff; border:1px solid #e5e7eb; border-radius:.5rem; padding:.6rem; box-shadow:0 1px 2px rgba(0,0,0,0.03); }
        .affect-card + .affect-card { margin-top:0.6rem; }
        .affect-card .form-label { margin-bottom:.25rem; display:block; }
        .affect-card .form-control { padding:.35rem .5rem !important; }

        /* Two-column compact layout inside a card */
        .affect-card.two-cols .two-col { display:flex; gap:0.5rem; }
        .affect-card.two-cols .two-col > div { flex:1; }
        .affect-card .two-col .form-control { width:100%; }
        </style>

         <div class="card">
        <div class="card-body">
        <form id="affectationForm" class="affectation-form">
            @csrf
            <div class="grid grid-cols-12 gap-4 items-end">
                <div class="col-span-12 lg:col-span-7">
                    <div class="affect-card">
                        <label class="form-label font-medium text-sm mb-1">Agents (sélection multiple)</label>
                        <select name="agent_ids[]" id="agent_ids" class="form-control mt-1 px-3 py-2 text-sm" multiple size="6" style="min-height:120px;">
                            @foreach(\App\Models\Agent::orderBy('fullname')->get() as $agent)
                                <option value="{{ $agent->id }}">{{ $agent->fullname }} — #{{ $agent->matricule }} @if($agent->site) ({{ $agent->site->name }}) @endif</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-span-12 lg:col-span-5">
                    <div class="affect-card">
                        <label class="form-label font-medium text-sm mb-1">Nouveau site</label>
                        <select name="nouveau_site_id" id="nouveau_site_id" class="form-control mt-1 px-3 py-2 text-sm w-full">
                            @foreach(\App\Models\Site::orderBy('name')->get() as $site)
                                <option value="{{ $site->id }}">{{ $site->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="affect-card mt-3 two-cols">
                        <div class="two-col">
                            <div>
                                <label class="form-label font-medium text-sm mb-1">Type</label>
                                <select name="type_affectation" id="type_affectation" class="form-control mt-1 px-3 py-2 text-sm">
                                    <option value="exclusive">Exclusive</option>
                                    <option value="temporaire">Temporaire</option>
                                </select>
                            </div>

                            <div>
                                <label class="form-label font-medium text-sm mb-1">Motif</label>
                                <input type="text" name="motif" class="form-control mt-1 px-3 py-2 text-sm" required />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-12 lg:col-span-7">
                    <div class="affect-card two-cols">
                        <div class="two-col">
                            <div>
                                <label class="form-label font-medium text-sm mb-1">Date début</label>
                                <input type="datetime-local" name="date_debut" class="form-control mt-1 px-3 py-2 text-sm" required />
                            </div>
                            <div>
                                <label class="form-label font-medium text-sm mb-1">Date fin (optionnelle)</label>
                                <input type="datetime-local" name="date_fin" class="form-control mt-1 px-3 py-2 text-sm" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-12 lg:col-span-5 flex items-center justify-end">
                    <div class="affect-card">
                        <button type="submit" class="btn btn-primary px-4 py-2 text-sm">Enregistrer</button>
                    </div>
                </div>
            </div>
        </form>

        <div id="result" class="mt-4 text-sm text-gray-700"></div>
    </div>
    </div>
    </div>

    <div class="intro-y box p-5">
        <h2 class="text-lg font-medium mb-4">Historique des affectations</h2>

        @php
            $affectations = \App\Models\Affectation::with(['agent', 'ancienSite', 'nouveauSite'])->orderByDesc('id')->limit(50)->get();
        @endphp

        <div class="overflow-x-auto">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">#</th>
                        <th class="whitespace-nowrap">Agent</th>
                        <th class="whitespace-nowrap">Ancien site</th>
                        <th class="whitespace-nowrap">Nouveau site</th>
                        <th class="whitespace-nowrap">Type</th>
                        <th class="whitespace-nowrap">Motif</th>
                        <th class="whitespace-nowrap">Début</th>
                        <th class="whitespace-nowrap">Fin</th>
                        <th class="whitespace-nowrap">Maj site</th>
                        <th class="whitespace-nowrap">Créé</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($affectations as $a)
                    <tr class="intro-x">
                        <td>{{ $a->id }}</td>
                        <td>{{ $a->agent?->fullname ?? '—' }}<div class="text-xs text-gray-500">#{{ $a->agent?->matricule ?? '' }}</div></td>
                        <td>{{ $a->ancienSite?->name ?? '—' }}</td>
                        <td>{{ $a->nouveauSite?->name ?? '—' }}</td>
                        <td>{{ ucfirst($a->type_affectation) }}</td>
                        <td>{{ $a->motif }}</td>
                        <td>{{ optional($a->date_debut)->format('d/m/Y H:i') ?? $a->date_debut }}</td>
                        <td>{{ optional($a->date_fin)->format('d/m/Y H:i') ?? ($a->date_fin ?? '—') }}</td>
                        <td>{{ $a->update_site_agent ? 'Oui' : 'Non' }}</td>
                        <td>{{ optional($a->created_at)->format('d/m/Y H:i') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center">Aucune affectation trouvée.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(function(){
    // init searchable selects
    if (jQuery().select2) {
        $('#agent_ids').select2({ placeholder: 'Choisir des agents', width: '100%' });
        $('#nouveau_site_id').select2({ placeholder: 'Choisir un site', width: '100%' });
    }

    document.getElementById('affectationForm').addEventListener('submit', async function(e){
    e.preventDefault();
    const form = e.target;
    const formData = new FormData(form);
    const payload = {};
    formData.forEach((v,k) => {
        if (k === 'agent_ids[]') {
            payload['agent_ids'] = payload['agent_ids'] || [];
            payload['agent_ids'].push(Number(v));
        } else {
            payload[k] = v;
        }
    });
    const submitBtn = form.querySelector('button[type="submit"]');
    try {
        // show loader
        submitBtn.disabled = true; const prevText = submitBtn.innerHTML; submitBtn.innerHTML = 'Enregistrement...';
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const res = await fetch('/api/affectations', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            body: JSON.stringify(payload)
        });
        const json = await res.json();
        document.getElementById('result').innerText = json.status === 'success' ? 'Affectations créées.' : (json.message || JSON.stringify(json));
        if (json.status === 'success') location.reload();
    } catch (err) {
        document.getElementById('result').innerText = err.message;
    } finally { submitBtn.disabled = false; submitBtn.innerHTML = prevText; }
    });
});
</script>
@endpush

@endsection
