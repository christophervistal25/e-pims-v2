@extends('layouts.app')
@section('title', 'Generate Training Reports')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('/assets/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap-float-label.css') }}">
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<style>
    .swal-content ul {
        list-style-type: none;
        padding: 0;
    }

    .swal-content ul {
        list-style-type: none;
        padding: 0;
    }

    table.dataTable.no-footer {
        border: 1px solid #dee2e6;
    }

    table.dataTable thead th,
    table.dataTable thead td {
        padding: 15px 25px;
        border-bottom: 1px solid #dee2e6;
    }

    table.dataTable {
        border-collapse: collapse;
    }

    .btn-primarys {
        background-color: #FF9B44;
        color: white;
    }

    .btn-primarys:hover {
        background-color: #FF8544;
        color: white;
    }

    .page-item.active .page-link {
        background-color: #FF9B44 !important;
        border: 1px solid #FF9B44;
    }

    .page-item.active .page-link:hover {
        background-color: #FF8544 !important;
        border: 1px solid #FF8544;
    }
    .bootstrap-select .btn:focus {
    outline: none !important;
}

</style>
@endprepend
@section('content')
<div class="row">
    <div class="col-lg-6">
        <label for="office">Office</label>
        <select name="office" id="office" class='form-control selectpicker border' data-live-search="true" style="outline:0px !important;">
            <option value="*">ALL</option>
            @foreach($offices as $office)
            <option value="{{ $office->OfficeCode }}">{{ $office->Description }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-6">
        <label for="month">Month</label>
        <input type="month" class='form-control' id="month">
    </div>
</div>

<div class="card mt-3 rounded-0">
    <div class="card-header"

    ></div>
    <div class="card-body">
        <div id='training-reports-table' class='mt-2'>
            <div class="float-right mb-2">
                {{-- <button class='btn btn-info shadow' id='btnDbmExport'>
            <i class="las la-file-excel"></i>
            DBM - EXPORT XLS
        </button> --}}

                {{-- <button class='btn btn-danger shadow' id='btnDbmExportPdf'>
            <i class="las la-file-pdf"></i>
            DBM - EXPORT PDF
        </button> --}}

                {{-- <button class='btn btn-info shadow' id='btnExport'>
            <i class="las la-file-excel"></i>
            CSC - EXPORT XLS
        </button> --}}

                {{-- <button class='btn btn-danger shadow' id='btnExportPdf'>
            <i class="las la-file-pdf"></i>
            CSC - EXPORT PDF
        </button> --}}
            </div>
        </div>
    </div>
</div>


@push('page-scripts')
<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script>
    $('#office').change(function () {
        let office = $(this).val();
        let month = $('#month').val();

        $.ajax({
            url: `/trainings-report/${office}/${month}`,
            success: function (data) {
                console.log(data);
            }
        });
    });

    $('#month').change(function () {
        let office = $('#office').val();
        let month = $(this).val();
    });
</script>
@endpush
@endsection
