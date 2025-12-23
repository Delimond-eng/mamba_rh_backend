@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="intro-y box p-5">
        <h2 class="text-lg font-medium mb-4">Rapports véhicules</h2>

        <style>
        .affect-card { background:#fff; border:1px solid #e5e7eb; border-radius:.5rem; padding:.6rem; box-shadow:0 1px 2px rgba(0,0,0,0.03); }
        .affect-card + .affect-card { margin-top:0.6rem; }
        .affect-card .form-label { margin-bottom:.25rem; display:block; }
        .affect-card .form-control { padding:.35rem .5rem !important; }
        .affect-card.two-cols .two-col { display:flex; gap:0.5rem; }
        .affect-card.two-cols .two-col > div { flex:1; }
        </style>

        <div class="grid grid-cols-12 gap-4 items-start">
            <div class="col-span-12 lg:col-span-4">
                <div class="affect-card two-cols">
                    <div class="two-col">
                        <div>
                            <label class="form-label">Véhicule</label>
                            <select id="vehicule_id" class="form-control">
                                @foreach($vehicules as $v)
                                    <option value="{{ $v->id }}">{{ $v->immatriculation }} — {{ $v->marque }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="form-label">Date</label>
                            <input id="date_rapport" type="date" class="form-control" />
                        </div>
                    </div>
                </div>

                <div class="affect-card mt-3 two-cols">
                    <div class="two-col">
                        <div>
                            <label class="form-label">Kilométrage début</label>
                            <input id="kilometrage_debut" type="number" class="form-control" />
                        </div>
                        <div>
                            <label class="form-label">Kilométrage fin</label>
                            <input id="kilometrage_fin" type="number" class="form-control" />
                        </div>
                        <div>
                        </div>
                        <div>
                            <label class="form-label">Kilométrage (total)</label>
                            <input id="kilometrage" type="number" class="form-control" />
                        </div>
                    </div>
                </div>

                <div class="affect-card mt-3 two-cols">
                    <div class="two-col">
                        <div>
                            <label class="form-label">Niveau carburant (ex: 1/2 ou -1/2,3/4)</label>
                            <input id="niveau_carburant" type="text" class="form-control" placeholder="valeurs séparées par une virgule pour 2 réservoirs" />
                        </div>
                        <div>
                            <label class="form-label">Carburant reçu (litres, optionnel)</label>
                            <input id="carburant_recu" type="number" step="0.01" class="form-control" />
                        </div>
                    </div>
                </div>

                <div class="affect-card mt-3 two-cols">
                    <div class="two-col">
                        <div>
                            <label class="form-label">Agent (optionnel)</label>
                            <select id="agent_id" class="form-control">
                                <option value="">—</option>
                                @foreach(\App\Models\Agent::orderBy('fullname')->get() as $a)
                                    <option value="{{ $a->id }}">{{ $a->fullname }} — #{{ $a->matricule }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="affect-card mt-3">
                    <label class="form-label">Observation</label>
                    <textarea id="observation" class="form-control" rows="3"></textarea>
                </div>

                <div class="affect-card mt-3">
                    <button id="saveRapport" class="btn btn-primary">Enregistrer rapport</button>
                </div>
            </div>

            <div class="col-span-12 lg:col-span-8">
                <div class="affect-card">
                    <h3 class="text-md font-medium mb-2">Historique des rapports</h3>
                    <div id="rapportList" class="overflow-x-auto">
                        <table class="table table-report">
                            <thead>
                                <tr><th>#</th><th>Véhicule</th><th>Date</th><th>Kilométrage début</th><th>Kilométrage fin</th><th>Kilométrage</th><th>Niveau carburant</th><th>Carburant reçu</th><th>Agent</th><th>Observation</th></tr>
                            </thead>
                            <tbody id="rapportBody"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    (function(){
        // init select2 if available
        if (window.jQuery && jQuery().select2) {
            $('#vehicule_id').select2({ placeholder: 'Choisir un véhicule', width: '100%' });
            $('#agent_id').select2({ placeholder: 'Choisir un agent (optionnel)', width: '100%', allowClear: true });
        }

        async function loadRapports(){
            const body = document.getElementById('rapportBody');
            body.innerHTML = '<tr><td colspan="6">Chargement...</td></tr>';
            try{
                const res = await fetch('/api/vehicule-rapports');
                if (!res.ok) throw new Error('Réponse du serveur: ' + res.status);
                const json = await res.json();
                body.innerHTML = '';
                json.forEach(r => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `<td>${r.id}</td><td>${r.vehicule.immatriculation}</td><td>${new Date(r.date_rapport).toLocaleDateString()}</td><td>${r.kilometrage_debut ?? ''}</td><td>${r.kilometrage_fin ?? ''}</td><td>${r.kilometrage ?? ''}</td><td>${r.niveau_carburant ?? ''}</td><td>${r.carburant_recu ?? ''}</td><td>${r.agent? r.agent.fullname : ''}</td><td>${r.observation || ''}</td>`;
                    body.appendChild(tr);
                });
            } catch (e) {
                body.innerHTML = `<tr><td colspan="6">Erreur lors du chargement: ${e.message}</td></tr>`;
                console.error(e);
            }
        }

        document.getElementById('saveRapport').addEventListener('click', async function(){
            const btn = this; const prev = btn.innerHTML; btn.disabled = true; btn.innerHTML = 'Enregistrement...';
            const payload = {
                vehicule_id: document.getElementById('vehicule_id').value,
                date_rapport: document.getElementById('date_rapport').value,
                kilometrage_debut: document.getElementById('kilometrage_debut').value || null,
                kilometrage_fin: document.getElementById('kilometrage_fin').value || null,
                kilometrage: document.getElementById('kilometrage').value,
                niveau_carburant: document.getElementById('niveau_carburant').value || null,
                carburant_recu: document.getElementById('carburant_recu').value || null,
                agent_id: document.getElementById('agent_id').value || null,
                observation: document.getElementById('observation').value,
            };
            try{
                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                const res = await fetch('/api/vehicule-rapports', { method: 'POST', headers: {'Content-Type':'application/json','X-CSRF-TOKEN': token, 'Accept': 'application/json'}, body: JSON.stringify(payload) });
                const contentType = res.headers.get('content-type') || '';
                if (contentType.includes('application/json')) {
                    const json = await res.json();
                    if (res.ok && json.status === 'success') {
                        Swal.fire({ icon: 'success', title: 'Rapport enregistré', text: 'Le rapport a été enregistré avec succès.' });
                        loadRapports();
                        document.getElementById('kilometrage').value = '';
                        document.getElementById('observation').value = '';
                        return;
                    }
                    if (json.errors) {
                        const fieldLabels = { vehicule_id: 'Véhicule', date_rapport: 'Date', kilometrage: 'Kilométrage', kilometrage_debut: 'Kilométrage début', kilometrage_fin: 'Kilométrage fin', niveau_carburant: 'Niveau carburant', carburant_recu: 'Carburant reçu', observation: 'Observation', agent_id: 'Agent' };
                        let messages = [];
                        for (const [field, msgs] of Object.entries(json.errors)) {
                            const label = fieldLabels[field] || field;
                            messages.push(`${label} : ${msgs.join(' ' )}`);
                        }
                        Swal.fire({ icon: 'error', title: 'Erreur de validation', html: messages.join('<br/>') });
                        return;
                    }
                    Swal.fire({ icon: 'error', title: 'Erreur', text: json.message || JSON.stringify(json) });
                    return;
                }
                const text = await res.text();
                Swal.fire({ icon: 'error', title: 'Erreur inattendue', text: text.substring(0,200) });
            } catch(e){ Swal.fire({ icon: 'error', title: 'Erreur', text: e.message }); }
            finally { btn.disabled = false; btn.innerHTML = prev; }
        });

        // initial load
        loadRapports();
    })();
</script>
@endpush

@endsection
