@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="intro-y box p-5">
        <h2 class="text-lg font-medium mb-4">Véhicules</h2>

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
                            <label class="form-label">Immatriculation</label>
                            <input id="immatriculation" class="form-control" />
                        </div>
                        <div>
                            <label class="form-label">Marque</label>
                            <input id="marque" class="form-control" />
                        </div>
                    </div>
                </div>

                <div class="affect-card two-cols mt-3">
                    <div class="two-col">
                        <div>
                            <label class="form-label">Modele</label>
                            <input id="modele" class="form-control" />
                        </div>
                        <div>
                            <label class="form-label">Etat</label>
                            <select id="etat" class="form-control">
                                <option value="actif">Actif</option>
                                <option value="maintenance">Maintenance</option>
                                <option value="hors_service">Hors service</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="affect-card mt-3">
                    <button id="saveVehicule" class="btn btn-primary">Enregistrer véhicule</button>
                </div>
            </div>

            <div class="col-span-12 lg:col-span-8">
                <div class="affect-card">
                    <h3 class="text-md font-medium mb-2">Liste des véhicules</h3>
                    <div id="vehiculeList" class="overflow-x-auto">
                        <table class="table table-report">
                            <thead>
                                <tr><th>#</th><th>Immatriculation</th><th>Marque</th><th>Modele</th><th>Etat</th></tr>
                            </thead>
                            <tbody>
                            @foreach($vehicules as $v)
                                <tr>
                                    <td>{{ $v->id }}</td>
                                    <td>{{ $v->immatriculation }}</td>
                                    <td>{{ $v->marque }}</td>
                                    <td>{{ $v->modele }}</td>
                                    <td>{{ ucfirst($v->etat) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@push('scripts')
<script>
$(function(){
    document.getElementById('saveVehicule').addEventListener('click', async function(){
        const btn = this; const prev = btn.innerHTML; btn.disabled = true; btn.innerHTML = 'Enregistrement...';
        const payload = {
            immatriculation: document.getElementById('immatriculation').value,
            marque: document.getElementById('marque').value,
            modele: document.getElementById('modele').value,
            etat: document.getElementById('etat').value,
        };
        try{
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const res = await fetch('/api/vehicules', { method: 'POST', headers: {'Content-Type':'application/json','X-CSRF-TOKEN': token, 'Accept': 'application/json'}, body: JSON.stringify(payload) });

            const contentType = res.headers.get('content-type') || '';
            if (contentType.includes('application/json')) {
                const json = await res.json();
                if (res.ok && json.status === 'success') {
                    Swal.fire({ icon: 'success', title: 'Véhicule enregistré', text: `Véhicule ${json.vehicule.immatriculation} enregistré avec succès.` }).then(() => location.reload());
                    return;
                }

                // handle validation errors from Laravel
                if (json.errors) {
                    const fieldLabels = { immatriculation: 'Immatriculation', marque: 'Marque', modele: 'Modèle', etat: 'État' };
                    let messages = [];
                    for (const [field, msgs] of Object.entries(json.errors)) {
                        const label = fieldLabels[field] || field;
                        messages.push(`${label} : ${msgs.join(' ' )}`);
                    }
                    Swal.fire({ icon: 'error', title: 'Erreur de validation', html: messages.join('<br/>') });
                    return;
                }

                // other json error
                const msg = json.message || JSON.stringify(json);
                Swal.fire({ icon: 'error', title: 'Erreur', text: msg });
                return;
            }

            // non-json response
            const text = await res.text();
            Swal.fire({ icon: 'error', title: 'Erreur inattendue', text: text.substring(0, 200) });
        } catch(e){
            Swal.fire({ icon: 'error', title: 'Erreur', text: e.message });
        } finally { btn.disabled = false; btn.innerHTML = prev; }
    });
});
</script>
@endpush
