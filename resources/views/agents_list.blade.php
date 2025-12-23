@extends('layouts.app')

@section('content')
<div class="content">
    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h2 class="mb-1">Liste des agents</h2>
        </div>
        <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
            <div class="mb-2">
                <a href="{{ url('/agents') }}" id="btn-create-agent" class="btn btn-success d-flex align-items-center"><i class="ti ti-plus me-2"></i>Ajouter agent</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="agents-table">
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Photo</th>
                      <th>Matricule</th>
                      <th>Nom</th>
                      <th>Telephone</th>
                      <th>Email</th>
                      <th>Service</th>
                      <th>Groupe</th>
                      <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal: bulletin agent -->
<div class="modal fade" id="agentBulletinModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Bulletin agent</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="agent-bulletin-body">
        <!-- filled by JS -->
      </div>
      <div class="modal-footer">
        <a href="#" id="btn-edit-agent-from-bulletin" class="btn btn-primary">Modifier agent</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

      <!-- Modal: edit agent inline -->
      <div class="modal fade" id="agentEditModal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Compléter / Modifier agent</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="agent-edit-form">
                <input type="hidden" id="edit-agent-id" />
                <div class="mb-3">
                  <label class="form-label">Nom complet</label>
                  <input id="edit-agent-fullname" class="form-control" />
                </div>
                <div class="mb-3">
                  <label class="form-label">Téléphone</label>
                  <input id="edit-agent-telephone" class="form-control" />
                </div>
                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input id="edit-agent-email" class="form-control" />
                </div>
                <div class="mb-3">
                  <label class="form-label">Date d'embauche</label>
                  <input id="edit-agent-date-embauche" type="date" class="form-control" />
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" id="btn-save-agent-inline" class="btn btn-primary">Enregistrer</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            </div>
          </div>
        </div>
      </div>

@push('scripts')
<script src="{{ asset('assets/js/project-helpers.js') }}"></script>
<script src="{{ asset('assets/js/pages/agents_list.js') }}"></script>
@endpush

@endsection
