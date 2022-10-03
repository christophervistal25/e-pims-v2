@extends('layouts.app')
@section('title', 'Leave Types')
@prepend('page-css')
<link rel="stylesheet" href="/assets/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/assets/css/style.css">
<script src="{{ asset("js/sweetalert.min.js") }}"></script>
<style>
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

</style>
@endprepend
@section('content')
<div class="card">
    <div class="card-body">
        <div class="float-right mb-2">
        </div>
        <div class="clearfix"></div>
        <div class="table-responsive">
            <table class='table table-bordered table-hover' id='leave-types-table' width="100%">
                <thead>
                    <tr class='bg-light'>
                        <th class='text-uppercase'>Code</th>
                        <th class='text-uppercase'>Leave</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

@push('page-scripts')
<script src="/assets/js/jquery.dataTables.min.js"></script>
<script src="/assets/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('/assets/js/custom/maintenance/datatables-init.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>

@endpush
@endsection
