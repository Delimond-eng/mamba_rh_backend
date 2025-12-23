@extends('layouts.app')

@section('content')

<div class="content">
    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h2 class="mb-1">Groupes d'horaires</h2>
        </div>
        <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
            <div class="mb-2">
                <a href="#" id="btn-add-group" class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Nouveau Groupe</a>
            </div>
        </div>
    </div>

    <!-- Modal: New/Edit Groupe -->
    <div class="modal fade" id="groupModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="groupModalLabel">Groupe d'horaires</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="group-form">
                        <input type="hidden" id="group-id" />
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Libellé</label>
                                <input id="group-libelle" class="form-control" maxlength="191" required />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Horaire associé</label>
                                <select id="group-horaire" class="form-select">
                                    <option value="">-- Aucun --</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" id="btn-save-group">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="groups-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Libellé</th>
                            <th>Horaire</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('assets/js/project-helpers.js') }}"></script>
<script src="{{ asset('assets/js/pages/groupes.js') }}"></script>
@endpush

@endsection
