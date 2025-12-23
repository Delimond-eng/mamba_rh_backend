@extends('layouts.app')

@section('content')

<div class="content">
    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h2 class="mb-1">Sites</h2>
            <p class="text-muted">Gestion des sites et affectation aux secteurs</p>
        </div>
        <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
            <div class="mb-2 me-2">
                <a href="#" id="btn-new-site" class="btn btn-primary d-flex align-items-center"><i class="ti ti-plus me-2"></i>Nouveau site</a>
            </div>
            <div class="mb-2">
                <a href="#" id="btn-new-secteur" class="btn btn-outline-secondary d-flex align-items-center"><i class="ti ti-plus me-2"></i>Nouveau secteur</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="sites-table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Secteur</th>
                            <th>Adresse</th>
                            <th>Téléphone</th>
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
<div class="modal fade" id="siteModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nouveau site</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="site-form">
            <input type="hidden" id="site-id" />
            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input id="site-name" class="form-control" />
            </div>
            <div class="mb-3">
                <label class="form-label">Secteur</label>
                <select id="site-secteur" class="form-select"><option value="">-- Aucun --</option></select>
            </div>
            <div class="mb-3">
                <label class="form-label">Adresse</label>
                <input id="site-adresse" class="form-control" />
            </div>
            <div class="mb-3">
                <label class="form-label">Téléphone</label>
                <input id="site-phone" class="form-control" />
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" id="btn-save-site">Enregistrer</button>
      </div>
    </div>
  </div>
</div>

<!-- Secteur Modal -->
<div class="modal fade" id="secteurModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nouveau secteur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="secteur-form">
                        <input type="hidden" id="secteur-id" />
                        <div class="mb-3">
                                <label class="form-label">Libellé</label>
                                <input id="secteur-libelle" class="form-control" />
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-outline-primary" id="btn-save-secteur-add">Enregistrer et ajouter un autre</button>
                <button type="button" class="btn btn-primary" id="btn-save-secteur">Enregistrer</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('assets/js/project-helpers.js') }}"></script>
<script src="{{ asset('assets/js/pages/sites.js') }}"></script>
@endpush

@endsection
