@extends('layouts.app')

@section('content')

<div class="content">
    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h2 class="mb-1">Affectation Barème</h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form id="assign-bareme-form">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Agent</label>
                        <select id="select-agent" class="form-select">
                            <option value="">Choisir un agent...</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Barème salarial</label>
                        <select id="select-bareme" class="form-select">
                            <option value="">Choisir un barème...</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Note</label>
                        <input id="assign-note" class="form-control" />
                    </div>
                    <div class="col-12 text-end">
                        <button type="button" id="btn-assign-bareme" class="btn btn-primary">Affecter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('assets/js/project-helpers.js') }}"></script>
<script src="{{ asset('assets/js/pages/agent-bareme.js') }}"></script>
@endpush

@endsection
