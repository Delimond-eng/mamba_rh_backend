@extends('layouts.app')

@section('content')

<div class="content">
    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h2 class="mb-1">Barèmes salariaux</h2>
        </div>
        <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
            <div class="mb-2">
                <a href="#" id="btn-add-bareme" class="btn btn-primary d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Nouveau Barème</a>
            </div>
        </div>
    </div>

    <!-- Modal: New/Edit Barème -->
    <div class="modal fade" id="baremeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="baremeModalLabel">Barème</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="bareme-form">
                        <input type="hidden" id="bareme-id" />
                        <div class="row g-3">
                            <!-- 'societe' removed -->
                            <div class="col-md-4">
                                <label class="form-label">Catégorie</label>

                                <select id="bareme-categorie" class="form-control">
                                    <option value="">-- Choisir une catégorie --</option>

                                    <option value="manoeuvre">Manœuvre</option>
                                    <option value="agent_execution">Agent d’exécution</option>
                                    <option value="agent_qualifie">Agent qualifié</option>
                                    <option value="agent_specialise">Agent spécialisé</option>

                                    <option value="agent_securite">Agent de sécurité</option>
                                    <option value="chef_equipe">Chef d’équipe</option>
                                    <option value="superviseur">Superviseur</option>
                                    <option value="inspecteur">Inspecteur</option>

                                    <option value="technicien">Technicien</option>
                                    <option value="technicien_superieur">Technicien supérieur</option>

                                    <option value="agent_administratif">Agent administratif</option>
                                    <option value="assistant">Assistant</option>
                                    <option value="chef_service">Chef de service</option>

                                    <option value="cadre">Cadre</option>
                                    <option value="cadre_collaboration">Cadre de collaboration</option>
                                    <option value="cadre_superieur">Cadre supérieur</option>
                                    <option value="direction">Direction</option>
                                    </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Échelon</label>
                                <input id="bareme-echelon" class="form-control" maxlength="50" required />
                            </div>
                             <div class="col-md-4">
                                <label class="form-label">Classe</label>
                                <input id="bareme-classe" class="form-control" maxlength="50" required />
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">Fonction</label>
                                <input id="bareme-fonction" class="form-control" />
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Salaire mensuel</label>
                                <input id="bareme-salaire" type="number" step="0.01" class="form-control" />
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Devise</label>
                                <select id="bareme-devise" class="form-select">
                                    <option value="USD">USD</option>
                                    <option value="EUR">EUR</option>
                                    <option value="CDF">CDF</option>
                                </select>

                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Allocation familiale</label>
                                <input id="bareme-allocation" type="number" step="0.01" class="form-control" />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Transport journalier</label>
                                <input id="bareme-transport-j" type="number" step="0.01" class="form-control" />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Transport mensuel</label>
                                <input id="bareme-transport-m" type="number" step="0.01" class="form-control" />
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Prime fonction</label>
                                <input id="bareme-prime-fonction" type="number" step="0.01" class="form-control" />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Prime risque</label>
                                <input id="bareme-prime-risque" type="number" step="0.01" class="form-control" />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Prime ancienneté</label>
                                <input id="bareme-prime-anciennete" type="number" step="0.01" class="form-control" />
                            </div>

                            <div class="col-md-3 d-flex align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="bareme-treizieme" />
                                    <label class="form-check-label" for="bareme-treizieme">13ème mois</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Montant 13ème</label>
                                <input id="bareme-treizieme-montant" type="number" step="0.01" class="form-control" />
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Statut</label>
                                <select id="bareme-statut" class="form-select">
                                    <option value="actif">Actif</option>
                                    <option value="inactif">Inactif</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Note</label>
                                <textarea id="bareme-note" class="form-control" rows="2"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" id="btn-save-bareme">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="baremes-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Catégorie</th>
                            <th>Classe</th>
                            <th>Échelon</th>
                            <th>Salaire</th>
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
<script src="{{ asset('assets/js/pages/baremes.js') }}"></script>
@endpush

@endsection
