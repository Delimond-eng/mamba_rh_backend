@extends('layouts.app')

@section('content')
<div class="content">
    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h2 class="mb-1">Sanctions</h2>
            <p class="text-muted">Imposer des sanctions à un ou plusieurs agents</p>
        </div>
        <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
            <div class="mb-2">
                <a href="#" id="btn-new-sanction" class="btn btn-primary d-flex align-items-center"><i class="ti ti-plus me-2"></i>Nouvelle sanction</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="sanctions-table">
                    <thead>
                        <tr>
                            <th>Agent</th>
                            <th>Type</th>
                            <th>Durée (jours)</th>
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
<div class="modal fade" id="sanctionModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nouvelle sanction</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="sanction-form">
            <div class="mb-3">
                <label class="form-label">Agents (sélection multiple)</label>
                <select id="sanction-agents" class="form-select" multiple></select>
            </div>
            <div class="mb-3">
                <label class="form-label">Type</label>
                <select id="sanction-type" class="form-select">
                    <option value="avertissement">Avertissement</option>
                    <option value="blame">Blâme</option>
                    <option value="mise_en_garde">Mise en garde</option>
                    <option value="mise_a_pied">Mise à pied</option>
                </select>
            </div>
            <div class="mb-3" id="duree-wrapper" style="display:none">
                <label class="form-label">Durée (jours)</label>
                <input type="number" id="sanction-duree" class="form-control" min="1" />
            </div>
            <div class="mb-3">
                <label class="form-label">Date sanction</label>
                <input type="date" id="sanction-date" class="form-control" />
            </div>
            <div class="mb-3">
                <label class="form-label">Motif</label>
                <textarea id="sanction-motif" class="form-control"></textarea>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" id="btn-save-sanction">Enregistrer</button>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script src="{{ asset('assets/js/project-helpers.js') }}"></script>
<script src="{{ asset('assets/js/pages/sanctions.js') }}"></script>
@endpush

@endsection
