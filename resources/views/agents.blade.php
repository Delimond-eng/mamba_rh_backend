@extends('layouts.app')

@section('content')

<div class="content">
    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h2 class="mb-1">Agent — Fiche et paramètres</h2>
        </div>
        <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
            <div class="mb-2">
                <a href="#" id="btn-save-agent" class="btn btn-success d-flex align-items-center"><i class="ti ti-check me-2"></i>Confirmer</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-9">
                    <!-- Tabs -->
                    <ul class="nav nav-tabs" id="agentTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab">Information privée</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="presence-tab" data-bs-toggle="tab" data-bs-target="#presence" type="button" role="tab">Paramètre de présence</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="application-tab" data-bs-toggle="tab" data-bs-target="#application" type="button" role="tab">Paramètre de l'application</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="paie-tab" data-bs-toggle="tab" data-bs-target="#paie" type="button" role="tab">Paramètres de paie</button>
                        </li>

                    </ul>

                    <div class="tab-content pt-3">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel">
                            <form id="agent-profile-form">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="form-label">Matricule</label>
                                        <input id="agent-matricule-input" class="form-control" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Nom local</label>
                                        <input id="agent-nom-local" class="form-control" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Contact Tél</label>
                                        <input id="agent-telephone" class="form-control" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Email</label>
                                        <input id="agent-email" class="form-control" />
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">Date de naissance</label>
                                        <input id="agent-date-naissance" type="date" class="form-control" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Date d'embauche</label>
                                        <input id="agent-date-embauche" type="date" class="form-control" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Lieu de naissance</label>
                                        <input id="agent-lieu-naissance" class="form-control" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Adresse</label>
                                        <input id="agent-adresse" class="form-control" />
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">Etat civil</label>
                                        <select id="agent-etat-civil" class="form-select">
                                            <option value="">--</option>
                                            <option value="celibataire">Célibataire</option>
                                            <option value="marie">Marié</option>
                                            <option value="veuf">Veuf</option>
                                            <option value="divorce">Divorcé</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Service</label>
                                        <select id="agent-service" class="form-select">
                                            <option value="">-- Aucun --</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Site</label>
                                        <select id="agent-site" class="form-select">
                                            <option value="">-- Aucun --</option>
                                        </select>
                                    </div>

                                    <div class="col-12 mt-3">
                                        <h5>Infos familiales</h5>
                                        <div class="row g-3">
                                            <div class="col-md-3 d-flex align-items-center">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="agent-est-marie" />
                                                    <label class="form-check-label" for="agent-est-marie">Marié</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Nom du conjoint</label>
                                                <input id="agent-nom-conjoint" class="form-control" />
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Nombre d'enfants</label>
                                                <input id="agent-nb-enfants" type="number" min="0" class="form-control" />
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Noms des enfants (séparés par des virgules)</label>
                                                <input id="agent-noms-enfants" class="form-control" placeholder='Paul, Marie, Junior' />
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="presence" role="tabpanel">
                            <form id="agent-presence-form">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Groupe horaire</label>
                                        <select id="agent-groupe-horaire" class="form-select">
                                            <option value="">-- Aucun --</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <div id="horaire-details" class="small text-muted mt-2"></div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="application" role="tabpanel">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Password (si accès à l'application)</label>
                                    <input id="agent-password" type="password" class="form-control" />
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="paie" role="tabpanel">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Barème</label>
                                    <select id="agent-bareme" class="form-select">
                                        <option value="">-- Aucun --</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Type d'emploi</label>
                                    <select id="agent-type-emploi" class="form-select">
                                        <option value="permanent">Permanent</option>
                                        <option value="temporaire">Temporaire</option>
                                        <option value="journalier">Journalier</option>
                                        <option value="contractuel">Contractuel</option>
                                        <option value="stagiaire">Stagiaire</option>
                                    </select>
                                </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div id="bareme-details" class="small text-muted"></div>
                                </div>
                            </div>
                            </div>
                        </div>



                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="avatar avatar-xxl mb-3">
                                <img src="{{ asset('assets/img/user-placeholder.png') }}" class="rounded-circle" alt="avatar">
                            </div>
                            <input type="hidden" id="agent-photo-url" />
                            <input type="hidden" id="agent-id" />
                            <h5 id="agent-fullname">Nouvel agent</h5>
                            <p class="text-muted mb-1">Matricule: <span id="agent-matricule">-</span></p>

                            <hr />

                            <div class="d-grid gap-2">
                                <a href="#" id="btn-open-photo" class="btn btn-outline-secondary">Modifier photo</a>
                                <a href="#" id="btn-reset-password" class="btn btn-outline-danger">Réinitialiser mot de passe</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('assets/js/project-helpers.js') }}"></script>
<script src="{{ asset('assets/js/pages/agents.js') }}"></script>
@endpush

@endsection
