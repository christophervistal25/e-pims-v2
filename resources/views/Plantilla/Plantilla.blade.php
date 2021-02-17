@extends('layouts.app')
@section('title', 'Plantilla')
@prepend('page-css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endprepend
@section('content')
<div class="content container-fluid">
    <div class="page-header">
        <div style="padding-bottom:10px;" class="row align-items-right">
            <div class="col-auto float-right ml-auto">
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_leave"><i class="fa fa-plus"></i> Add Salary Grade</a>
            </div>
        </div>
        <div class="table" style="overflow-x:auto;">
            <table class="table table-bordered" id="plantilla"  style="width:100%;">
                <thead>
                  <tr>
                    <td scope="col" class="text-center font-weight-bold">ID</td>
                    <td scope="col" class="text-center font-weight-bold">Old Item No</td>
                    <td scope="col" class="text-center font-weight-bold">New Item No</td>
                    <td scope="col" class="text-center font-weight-bold">Position Title</td>
                    <td scope="col" class="text-center font-weight-bold">Employee ID</td>
                    <td scope="col" class="text-center font-weight-bold">Office</td>
                    <td scope="col" class="text-center font-weight-bold">Status</td>
                  </tr>
                </thead>
              </table>
        </div>
    </div>
</div>
@include('Plantilla.add-ons.plantillamodal')
@push('page-scripts')
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script>
    $(function() {
        $('#plantilla').DataTable({
    processing: true,
    serverSide: true,
    ajax: '/plantilla-list',
    columns: [
            { data: 'plantilla_id', name: 'plantilla_id' },
            { data: 'old_item_no', name: 'old_item_no' },
            { data: 'new_item_no', name: 'new_item_no' },
            { data: 'position_title', name: 'position_title' },
            { data: 'employee_id', name: 'employee_id' },
            { data: 'office_code', name: 'office_code' },
            { data: 'status', name: 'status' },
    ]
});
});
</script>
@endpush
@endsection