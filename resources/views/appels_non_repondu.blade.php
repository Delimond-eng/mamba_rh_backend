@extends('layouts.app')
    try{
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const res = await fetch('/api/appels-non-repondu', {
            method: 'POST', headers: {'Content-Type':'application/json','X-CSRF-TOKEN': token, 'Accept': 'application/json'}, body: JSON.stringify(payload)
        });
        const contentType = res.headers.get('content-type') || '';
        if (contentType.includes('application/json')) {
            const json = await res.json();
            if (res.ok && json.status === 'success') {
                Swal.fire({ icon: 'success', title: 'Appels enregistrés', text: 'Les appels ont été enregistrés.' }).then(() => location.reload());
                return;
            }
            if (json.errors) {
                const fieldLabels = { 'agent_ids': 'Agents', 'date_appel': 'Date', 'heure': 'Heure', 'nombre_appels': "Nombre d'appels" };
                let messages = [];
                for (const [field, msgs] of Object.entries(json.errors)) {
                    const label = fieldLabels[field] || field;
                    messages.push(`${label} : ${msgs.join(' ')}`);
                }
                Swal.fire({ icon: 'error', title: 'Erreur de validation', html: messages.join('<br/>') });
                return;
            }
            Swal.fire({ icon: 'error', title: 'Erreur', text: json.message || JSON.stringify(json) });
            return;
        }
        const text = await res.text();
        Swal.fire({ icon: 'error', title: 'Erreur inattendue', text: text.substring(0,200) });
    } catch(err){ Swal.fire({ icon: 'error', title: 'Erreur', text: err.message }); }
        .affect-card.two-cols .two-col { display:flex; gap:0.5rem; }
        .affect-card.two-cols .two-col > div { flex:1; }
        .affect-card .two-col .form-control { width:100%; }
        </style>

        <div class="grid grid-cols-12 gap-4 items-start">
            <div class="col-span-12 lg:col-span-4">
                <div class="affect-card two-cols">
                    <div class="two-col">
                        <div>
                            <label class="form-label font-medium text-sm mb-1">Filtrer par site</label>
                            <select id="site_filter" class="form-control">
                                <option value="all">Tous les sites</option>
                                @foreach($sites as $s)
                                    <option value="{{ $s->id }}">{{ $s->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="form-label">Date appel</label>
                            <input type="datetime-local" name="date_appel" form="appelForm" class="form-control" required />
                        </div>
                    </div>
                </div>

                <div class="affect-card mt-3 two-cols">
                    <div class="two-col">
                        <div>
                            <label class="form-label">Nombre d'appels</label>
                            <input type="number" name="nombre_appels" form="appelForm" class="form-control" min="1" value="1" />
                        </div>
                        <div>
                            <label class="form-label">Heure (optionnelle)</label>
                            <input type="text" name="heure" form="appelForm" class="form-control" placeholder="HH:MM" />
                        </div>
                    </div>
                </div>

                <div class="affect-card mt-3">
                    <button type="submit" form="appelForm" class="btn btn-primary w-full">Enregistrer</button>
                </div>
            </div>

            <div class="col-span-12 lg:col-span-8">
                <form id="appelForm" class="">
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
                <div id="appelResult" class="mt-3 text-sm"></div>
            </div>
        </div>
    </div>

    <div class="intro-y box p-5">
        <h2 class="text-lg font-medium mb-4">Historique</h2>
        @php
            $items = \App\Models\AppelNonRepondu::with('agent')->orderByDesc('id')->limit(100)->get();
        @endphp

        <div class="overflow-x-auto">
            <table class="table table-report">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Agent</th>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Nombre</th>
                        <th>Saisi par</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($items as $it)
                    <tr>
                        <td>{{ $it->id }}</td>
                        <td>{{ $it->agent?->fullname ?? '—' }}</td>
                        <td>{{ optional($it->date_appel)->format('d/m/Y') ?? $it->date_appel }}</td>
                        <td>{{ $it->heure ?? '—' }}</td>
                        <td>{{ $it->nombre_appels }}</td>
                        <td>{{ $it->saisiPar?->name ?? '—' }}</td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center">Aucun appel non répondu</td></tr>
                @endforelse
                </tbody>
            </table>
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
        const siteId = this.value;
        const $sel = $('#agent_ids');
        $sel.empty();
        try{
            const res = await fetch('/api/agents-by-site/' + siteId);
            const json = await res.json();
            json.forEach(it => { $sel.append(new Option(it.text, it.id)); });
            $sel.trigger('change');
        } catch(e){ console.error(e); }
    });

    document.getElementById('appelForm').addEventListener('submit', async function(e){
        e.preventDefault();
        const form = e.target;
        const data = new FormData(form);
        const payload = {};
        data.forEach((v,k) => {
            if (k === 'agent_ids[]') { payload.agent_ids = payload.agent_ids || []; payload.agent_ids.push(Number(v)); }
            else payload[k] = v;
        });
        const submitBtn = form.querySelector('button[type="submit"]');
        try{
            submitBtn.disabled = true; const prev = submitBtn.innerHTML; submitBtn.innerHTML = 'Enregistrement...';
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const res = await fetch('/api/appels-non-repondu', {
                method: 'POST', headers: {'Content-Type':'application/json','X-CSRF-TOKEN': token, 'Accept': 'application/json'}, body: JSON.stringify(payload)
            });
            const contentType = res.headers.get('content-type') || '';
            if (contentType.includes('application/json')) {
                const json = await res.json();
                if (res.ok && json.status === 'success') {
                    Swal.fire({ icon: 'success', title: 'Appels enregistrés', text: 'Les appels ont été enregistrés.' }).then(() => location.reload());
                } else if (json.errors) {
                    const fieldLabels = { 'agent_ids': 'Agents', 'date_appel': 'Date', 'heure': 'Heure', 'nombre_appels': "Nombre d'appels" };
                    let messages = [];
                    for (const [field, msgs] of Object.entries(json.errors)) {
                        const label = fieldLabels[field] || field;
                        messages.push(`${label} : ${msgs.join(' ')}`);
                    }
                    Swal.fire({ icon: 'error', title: 'Erreur de validation', html: messages.join('<br/>') });
                } else {
                    Swal.fire({ icon: 'error', title: 'Erreur', text: json.message || JSON.stringify(json) });
                }
            } else {
                const text = await res.text(); Swal.fire({ icon: 'error', title: 'Erreur inattendue', text: text.substring(0,200) });
            }
        } catch(err){ document.getElementById('appelResult').innerText = err.message; }
        finally { submitBtn.disabled = false; submitBtn.innerHTML = prev; }
    });
});
</script>
@endpush

@endsection
