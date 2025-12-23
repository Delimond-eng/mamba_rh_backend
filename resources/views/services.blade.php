@extends('layouts.app')

@section('content')

<div class="content">

    <!-- Breadcrumb -->
    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h2 class="mb-1">Services</h2>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="salama"><i class="ti ti-smart-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        Personnel
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Services</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
            <div class="me-2 mb-2">
                <div class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle btn btn-white d-inline-flex align-items-center"
                        data-bs-toggle="dropdown">
                        <i class="ti ti-file-export me-1"></i>Export
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end p-3">
                        <li>
                            <a href="javascript:void(0);" class="dropdown-item rounded-1"><i
                                    class="ti ti-file-type-pdf me-1"></i>Export as PDF</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="dropdown-item rounded-1"><i
                                    class="ti ti-file-type-xls me-1"></i>Export as Excel </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mb-2">
                <a href="#" id="btn-add-service" class="btn btn-primary d-flex align-items-center"><i
                        class="ti ti-circle-plus me-2"></i>Nouveau Service</a>
            </div>
            <div class="head-icons ms-2">
                <a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-original-title="Collapse" id="collapse-header">
                    <i class="ti ti-chevrons-up"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title mb-0">Service List</h5>
                <div class="d-flex gap-2 align-items-center">
                    <div class="input-group">
                        <label class="input-group-text">Status</label>
                        <select class="form-select">
                            <option value="">All</option>
                            <option value="1">Actif</option>
                            <option value="0">Inactif</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label class="input-group-text">Sort By</label>
                        <select class="form-select">
                            <option value="recent">Last 7 Days</option>
                            <option value="alpha">Alpha</option>
                        </select>
                    </div>
                    <div>
                        <input type="search" class="form-control" id="service-search" placeholder="Search">
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped" id="services-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Actif</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- rows injected by JS --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="serviceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="serviceModalLabel">Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="service-form">
                    <input type="hidden" id="service-id" />
                    <div class="mb-3">
                        <label class="form-label">Code</label>
                        <input type="text" id="service-code" class="form-control" placeholder="Code service" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nom</label>
                        <input type="text" id="service-nom" class="form-control" placeholder="Nom du service"
                            required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea id="service-description" class="form-control" placeholder="Description du service"
                            rows="3"></textarea>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="1" id="service-actif" checked>
                        <label class="form-check-label" for="service-actif">Actif</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary" id="save-service">+ services</button>
            </div>

        </div>
    </div>
</div>

@push('styles')
<style>
    #services-table td { vertical-align: middle; }
</style>
@endpush

@push('scripts')
<script src="{{ asset('assets/js/project-helpers.js') }}"></script>
<script src="{{ asset('assets/js/pages/services.js') }}"></script>
@endpush

@endsection
