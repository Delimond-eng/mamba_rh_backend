@extends('layouts.app')

@section('content')

<div class="content">
    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h2 class="mb-1">Paramètres — Formules (Autorisations / Congés)</h2>
        </div>
        <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
            <div class="mb-2">
                <a href="#" id="btn-add-type" class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Nouveau Type</a>
            </div>
        </div>
    </div>

    <!-- Modal: New/Edit Type -->
    <div class="modal fade" id="typeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="typeModalLabel">Type d'autorisation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="type-form">
                        <input type="hidden" id="type-id" />
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Code</label>
                                <input id="type-code" class="form-control" maxlength="100" required />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Libellé</label>
                                <input id="type-libelle" class="form-control" required />
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Type</label>
                                <select id="type-type" class="form-select">
                                    <option value="conge">Congé</option>
                                    <option value="autorisation">Autorisation</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Nombre de jours</label>
                                <input id="type-nombre" type="number" class="form-control" min="1" />
                            </div>
                            <div class="col-md-3 d-flex align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="type-payable" />
                                    <label class="form-check-label" for="type-payable">Payable</label>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="type-justificatif" />
                                    <label class="form-check-label" for="type-justificatif">Justificatif obligatoire</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Statut</label>
                                <select id="type-status" class="form-select">
                                    <option value="actif">Actif</option>
                                    <option value="inactif">Inactif</option>
                                </select>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" id="btn-save-type">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="types-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>Libellé</th>
                            <th>Type</th>
                            <th>Jours</th>
                            <th>Payable</th>
                            <th>Justificatif</th>
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

@push('scripts')
<script src="{{ asset('assets/js/project-helpers.js') }}"></script>
<script src="{{ asset('assets/js/pages/formules.js') }}"></script>
@endpush

@endsection
