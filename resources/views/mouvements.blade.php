@extends('layouts.app')

@section('content')
<div class="content">
    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h2 class="mb-1">Mouvements — Gestion</h2>
            <p class="text-muted">Créer un mouvement (remplacement / affectation temporaire / retour)</p>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-5">
                    <h5>Agent remplaçant</h5>
                    <div class="mb-2">
                        <select id="agent-replacing" class="form-select" style="width:100%"></select>
                    </div>
                </div>

                <div class="col-lg-2 d-flex align-items-center justify-content-center">
                    <div class="text-center small text-muted">Choisissez le remplaçant et l'agent remplacé</div>
                </div>

                <div class="col-lg-5">
                    <h5>Agent remplacé</h5>
                    <div class="mb-2">
                        <select id="agent-replaced" class="form-select" style="width:100%"></select>
                    </div>

                    <div id="replaced-summary" class="small text-muted mt-2"></div>
                </div>
            </div>

            <hr/>

            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Type de mouvement</label>
                    <select id="type-mouvement" class="form-select">
                        <option value="remplacement">Remplacement</option>
                        <option value="affectation_temporaire">Affectation temporaire</option>
                        <option value="retour_disponible">Retour disponible</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Motif</label>
                    <select id="motif-type" class="form-select">
                        <option value="">-- Choisir motif --</option>
                        <option value="Sanction">Sanction</option>
                        <option value="Separation">Séparation</option>
                        <option value="Conge">Congé</option>
                        <option value="Desertion">Désertion</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Date début</label>
                    <input id="mouvement-date-debut" type="datetime-local" class="form-control" />
                </div>
            </div>

            <div id="motif-forms" class="mt-3">
                <!-- dynamic forms injected here -->
            </div>

            <div class="mt-3 d-flex justify-content-end">
                <button id="btn-save-mouvement" class="btn btn-primary">Enregistrer le mouvement</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('assets/js/project-helpers.js') }}"></script>
<script src="{{ asset('assets/js/pages/mouvements.js') }}"></script>
@endpush

@endsection
