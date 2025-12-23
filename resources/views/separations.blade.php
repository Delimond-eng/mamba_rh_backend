@extends('layouts.app')

@section('content')
<div class="content">
    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h2 class="mb-1">Séparations des agents</h2>
            <p class="text-muted">Enregistrer une séparation d'agent (démission, licenciement, décès...)</p>
        </div>
        <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
            <div class="mb-2">
                <a href="#" id="btn-new-separation" class="btn btn-primary d-flex align-items-center"><i class="ti ti-plus me-2"></i>Nouvelle séparation</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="separations-table">
                    <thead>
                        <tr>
                            <th>Agent</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Motif</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="separationModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nouvelle séparation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="separation-form">
            <div class="mb-3">
                <label class="form-label">Agent</label>
                <select id="separation-agent" class="form-select"></select>
            </div>
            <div class="mb-3">
                <label class="form-label">Type</label>
                <select id="separation-type" class="form-select">
                    <option value="demission">Démission</option>
                    <option value="licenciement">Licenciement</option>
                    <option value="deces">Décès</option>
                    <option value="essai_non_concluant">Essai non concluant</option>
                    <option value="fin_contrat">Fin de contrat</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Date événement</label>
                <input type="date" id="separation-date" class="form-control" />
            </div>
            <div class="mb-3">
                <label class="form-label">Motif</label>
                <textarea id="separation-motif" class="form-control"></textarea>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="separation-document" />
                <label class="form-check-label" for="separation-document">Document remis</label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="separation-solde" />
                <label class="form-check-label" for="separation-solde">Solde final effectué</label>
            </div>
            <div class="mb-3">
                <label class="form-label">Décision par</label>
                <input id="separation-decision" class="form-control" />
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" id="btn-save-separation">Enregistrer</button>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script src="{{ asset('assets/js/project-helpers.js') }}"></script>
<script src="{{ asset('assets/js/pages/separations.js') }}"></script>
@endpush

@endsection
