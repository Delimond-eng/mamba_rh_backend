@extends('layouts.app')

@section('content')

<div class="content">
    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h2 class="mb-1">Horaires</h2>
        </div>
        <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
            <div class="mb-2">
                <a href="#" id="btn-add-horaire" class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Nouveau Horaire</a>
            </div>
        </div>
    </div>

    <!-- Modal: New/Edit Horaire -->
    <div class="modal fade" id="horaireModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="horaireModalLabel">Horaire</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="horaire-form">
                        <input type="hidden" id="horaire-id" />
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Libellé</label>
                                <input id="horaire-libelle" class="form-control" maxlength="191" required />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Heure début</label>
                                <input id="horaire-started" class="form-control" placeholder="08:00" required />
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Heure fin</label>
                                <input id="horaire-ended" class="form-control" placeholder="17:00" required />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Tolérance (mm:ss)</label>
                                <input id="horaire-tolerence" class="form-control" placeholder="00:15" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" id="btn-save-horaire">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="horaires-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Libellé</th>
                            <th>Début</th>
                            <th>Fin</th>
                            <th>Tolérance</th>
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
<script src="{{ asset('assets/js/pages/horaires.js') }}"></script>
@endpush

@endsection
