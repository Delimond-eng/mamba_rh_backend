@extends('layouts.app')

@section('content')
<div class="content">
    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h2 class="mb-1">Congés — Affectation</h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-3">
                        <label class="form-label">Mode d'affectation</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="assign_mode" id="mode-conge" value="conge" {{ (isset($mode) && $mode === 'autorisation') ? '' : 'checked' }}>
                                <label class="form-check-label" for="mode-conge">Congés</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="assign_mode" id="mode-autorisation" value="autorisation" {{ (isset($mode) && $mode === 'autorisation') ? 'checked' : '' }}>
                                <label class="form-check-label" for="mode-autorisation">Autorisations spéciales</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Filtrer les agents</label>
                        <div class="row g-2">
                            <div class="col-md-4">
                                <select id="filter-site" class="form-select">
                                    <option value="">Tous les sites</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input id="filter-matricule" class="form-control" placeholder="Matricule" />
                            </div>
                            <div class="col-md-4">
                                <input id="filter-nom" class="form-control" placeholder="Nom" />
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sélectionner des agents (cliquez pour sélectionner)</label>
                        <div id="conges-agents-list" class="list-group" style="max-height:380px; overflow:auto"></div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Type de congé / autorisation</label>
                            <select id="conges-type" class="form-select">
                                <option value="">-- Choisir --</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Date de début</label>
                            <input id="conges-date-debut" type="date" class="form-control" />
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <button id="btn-assign-conges" class="btn btn-primary">Affecter aux agents sélectionnés</button>
                        </div>
                    </div>

                    <div class="mt-3" id="conges-note" class="small text-muted"></div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Astuce</h5>
                            <p class="small text-muted">Sélectionnez plusieurs agents (Ctrl+click) et choisissez le type de congé et la date de début. Le système calculera la date de fin si le type de congé a un nombre de jours défini.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('assets/js/project-helpers.js') }}"></script>
<script src="{{ asset('assets/js/pages/conges.js') }}"></script>
<script>
    // Ensure the JS mode matches server-provided mode (if any)
    document.addEventListener('DOMContentLoaded', function() {
        try {
            var mode = '{{ isset($mode) ? $mode : 'conge' }}';
            var el = document.getElementById('mode-' + mode);
            if (el) {
                el.checked = true;
                var ev = new Event('change');
                el.dispatchEvent(ev);
            }
        } catch (e) {}
    });
</script>
@endpush

@endsection
