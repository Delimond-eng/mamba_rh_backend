@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="intro-y box p-5">
        <h2 class="text-lg font-medium mb-4">Pointage des retards</h2>

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
                            <label class="form-label">Filtrer par site</label>
                            <select id="site_filter" class="form-control">
                                <option value="all">Tous les sites</option>
                                @foreach($sites as $s)
                                    <option value="{{ $s->id }}">{{ $s->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="form-label">Date retard</label>
                            <input id="date_retard" type="date" class="form-control" />
                        </div>
                    </div>
                </div>

                <div class="affect-card mt-3">
                    <label class="form-label">Motif du retard</label>
                    <input id="motif" class="form-control" />
                </div>

                <div class="affect-card mt-3">
                    <label class="form-label">Heure arrivée (optionnel)</label>
                    <input id="heure_arrivee" type="time" class="form-control" />
                </div>

                <div class="affect-card mt-3">
                    <label class="form-label">Observation (optionnelle)</label>
                    <textarea id="observation" class="form-control" rows="3"></textarea>
                </div>

                <div class="affect-card mt-3">
                    <button id="saveRetard" class="btn btn-primary w-full">Enregistrer retards</button>
                </div>
            </div>

            <div class="col-span-12 lg:col-span-8">
                <form id="retardForm">
                    @csrf
                    <div class="affect-card">
                        <label class="form-label">Agents (sélection multiple)</label>
                        <select id="agent_ids" name="agent_ids[]" multiple class="form-control" style="min-height:260px;">
                            @foreach($agents as $a)
                                <option value="{{ $a->id }}">{{ $a->fullname }} — #{{ $a->matricule }} @if($a->site) ({{ $a->site->name }}) @endif</option>
                            @endforeach
                        </select>
                    </div>
                </form>

                <div class="mt-3">
                    <h3 class="text-md font-medium mb-2">Historique</h3>
                    <div class="affect-card overflow-x-auto">
                        <table class="table table-report">
                            <thead>
                                <tr><th>#</th><th>Agent</th><th>Motif</th><th>Date</th><th>Heure arrivée</th><th>Observation</th><th>Saisi par</th></tr>
                            </thead>
                            <tbody id="retardBody"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(function(){
    if (jQuery().select2) {
        $('#agent_ids').select2({ placeholder: 'Choisir des agents', width: '100%' });
        $('#site_filter').select2({ width: '100%' });
    }

    $('#site_filter').on('change', async function(){
        const siteId = this.value; const $sel = $('#agent_ids'); $sel.empty();
        try{
            const res = await fetch('/api/agents-by-site/' + siteId);
            const json = await res.json();
            json.forEach(it => { $sel.append(new Option(it.text, it.id)); });
            $sel.trigger('change');
        } catch(e){ console.error(e); }
    });

    async function loadRetards(){
        const body = document.getElementById('retardBody'); body.innerHTML = '<tr><td colspan="7">Chargement...</td></tr>';
        try{
            const res = await fetch('/api/retards'); if(!res.ok) throw new Error('Server: '+res.status);
            const json = await res.json(); body.innerHTML = '';
            json.forEach(r=>{
                const tr = document.createElement('tr');
                tr.innerHTML = `<td>${r.id}</td><td>${r.agent? r.agent.fullname : ''}</td><td>${r.motif}</td><td>${new Date(r.date_retard).toLocaleDateString()}</td><td>${r.heure_arrivee || ''}</td><td>${r.observation || ''}</td><td>${r.saisiPar? r.saisiPar.name : ''}</td>`;
                body.appendChild(tr);
            });
        } catch(e){ document.getElementById('retardBody').innerHTML = `<tr><td colspan="7">Erreur: ${e.message}</td></tr>`; }
    }

    document.getElementById('saveRetard').addEventListener('click', async function(){
        const btn = this; const prev = btn.innerHTML; btn.disabled = true; btn.innerHTML = 'Enregistrement...';
        const payload = {};
        const form = document.getElementById('retardForm');
        const data = new FormData(form);
        data.forEach((v,k)=>{ if(k==='agent_ids[]'){ payload.agent_ids = payload.agent_ids || []; payload.agent_ids.push(Number(v)); } else payload[k]=v; });
        payload.motif = document.getElementById('motif').value;
        payload.date_retard = document.getElementById('date_retard').value;
        payload.heure_arrivee = document.getElementById('heure_arrivee').value;
        payload.observation = document.getElementById('observation').value;
        try{
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const res = await fetch('/api/retards-bulk', { method: 'POST', headers: {'Content-Type':'application/json','X-CSRF-TOKEN': token, 'Accept':'application/json'}, body: JSON.stringify(payload) });
            const json = await res.json();
            if(res.ok && json.status==='success'){ Swal.fire({icon:'success', title:'Retards enregistrés', text: json.count+' retards créés'}); loadRetards(); }
            else if(json.errors){ let msgs=[]; for(const[f,m] of Object.entries(json.errors)){ msgs.push(f+': '+m.join(' ')); } Swal.fire({icon:'error', title:'Erreur', html:msgs.join('<br/>')}); }
            else Swal.fire({icon:'error', title:'Erreur', text: json.message || JSON.stringify(json)});
        }catch(e){ console.error(e); Swal.fire({icon:'error', title:'Erreur', text:e.message}); }
        finally{ btn.disabled=false; btn.innerHTML = prev; }
    });

    loadRetards();
});
</script>
@endpush

@endsection
