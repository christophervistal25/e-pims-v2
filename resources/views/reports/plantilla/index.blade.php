@extends('layouts.app')
@section('title', 'Plantilla Report History')
@prepend('page-css')
<link rel="stylesheet" href="/assets/css/style.css" />
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
<link rel="stylesheet" href="{{ asset('/assets/css/dataTables.bootstrap4.min.css') }}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endprepend
@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label class="text-uppercase font-weight-bold">Select Year</label>
            <select name="selected_year" id="year" class="form-control">
                <option value="*">All</option>
                @foreach($years as $year)
                <option value="{{ $year }}" {{ $year == date('Y') ? 'selected' : '' }}>{{ $year }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label class="text-uppercase font-weight-bold">Select Type</label>
            <select name="type" class="form-control" id="selectedType">
                <option value="*">All</option>
                <option value="CSC">CSC PLANTILLA</option>
                <option value="DBM">DBM PLANTILLA</option>
            </select>
        </div>
    </div>
    <div class="col-lg-2 align-middle">
        <label class="text-uppercase font-weight-bold">&nbsp;</label>
        <button class="btn btn-primary btn-block" id='btnGenerate'>Generate</button>
    </div>
</div>
<div class="card" id="report-wrapper">
    <div class="card-body rounded-0 shadow-none border-0">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="reports-table" width="100%">
                <thead>
                    <tr class="text-uppercase text-center bg-light">
                        <th>ID</th>
                        <th>Year</th>
                        <th>Description</th>
                        <th>AS OF Date</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="create-report-form-wrapper">
    <div class="card">
        <div class="card-body">
            <form id="generateReportForm">

                <div class="form-group">
                    <label>Year</label>
                    <input type="text" class="form-control" id="selectedYear" readonly>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" id="description"></textarea>
                </div>

                <div class="form-group">
                    <label>As of Date</label>
                    <input type="date" class="form-control" id="asOfDate">
                </div>

                <div class="form-group">
                    <label>Plantilla Type</label>
                    <input type="text" class="form-control" id="type" readonly>
                </div>

                <div class="float-right">
                    <button class="btn btn-info" id="back">
                        <i class="fas fa-arrow-left"></i>
                        Back
                    </button>

                    <button class="btn btn-primary" id="formBtnGenerate">
                        <i class="las la-folder-plus"></i>
                        Generate
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

@push('page-scripts')
<script src="/assets/js/jquery.dataTables.min.js"></script>
<script src="/assets/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="{{ asset('/assets/js/custom/reports/plantilla.js') }}"></script>
@endpush
@endsection
