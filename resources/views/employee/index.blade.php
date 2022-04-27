@extends('layouts.app')
@section('title', 'Employees')
@prepend('page-css')
<link rel="stylesheet" href="/assets/css/style.css" />
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}" />
<style>
    .required:after {
        content : ' *';
        color :red;
    }

</style>
@endprepend
@section('content')
<div id='employees-data-table'>
    <div id="accordion">
        <div class="card shadow-none mb-0">
            <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#filterOptions" aria-expanded="true" aria-controls="filterOptions">
                <span class='h5'>FILTER</span>
            </div>
            <div id="filterOptions" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-3 mb-3">
                            <label for="#officeChargingSelect" class='h5'>OFFICE CHARGING</label>
                            <select class="form-control select2" style='width : 100%;' id="officeChargingSelect">
                                <option value="*" selected>ALL</option>
                                @foreach($offices as $office)
                                <option value="{{ $office->OfficeCode }}">{{ $office->Description }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-3 mb-3">
                            <label for="#officeAssignmentSelect" class='h5'>OFFICE ASSIGNMENT</label>
                            <select class="form-control select2" style="width : 100%" id="officeAssignmentSelect">
                                <option value="*" selected>ALL</option>
                                @foreach($offices as $office)
                                <option value="{{ $office->OfficeCode }}">{{ $office->Description }}</option>
                                @endforeach
                            </select>
                        </div>

                            <div class="mb-3 col-lg-3">
                            <label for="#employeeStatus" class='h5'>WORK STATUS</label>
                            <select id="employeeStatus" class="form-control form-select">
                                <option value="*" selected>ALL</option>
                                <option value="PERMANENT">PERMANENT</option>
                                <option value="TEMPORARY">TEMPORARY</option>
                                <option value="CO-TERMINOUS">CO-TERMINOUS</option>
                                <option value="CONTRACT OF SERVICE">CONTRACT OF SERVICE</option>
                                <option value="ELEECTED">ELECTED</option>
                                <option value="CASUAL">CASUAL</option>
                                <option value="PROVISIONAL">PROVISIONAL</option>
                                <option value="COTERMINOUS-TEMPORARY">COTERMINOUS-TEMPORARY</option>
                                <option value="SUBSTITUTE">SUBSTITUTE</option>
                            </select>
                        </div>

                        <div class="col-lg-3 mb-3">
                            <label for="#employeeStatus" class='h5'>STATUS</label>
                            <select id="activeStatus" class="form-control form-select">
                                <option value="*" selected>ALL</option>
                                <option value="1">Active</option>
                                <option value="0">In-Active</option>
                            </select>
                        </div>

                    </div>

                </div>
            </div>
        </div>


    </div>

    <div class="float-right">
        <button id='addNewEmployee' class='btn btn-primary shadow mt-3'>
            <i class='las la-plus'></i>
            Add New Employee
        </button>
    </div>
    <div id="employees">
        <div class="table-responsive">
            <table class="table table-bordered table-hover bg-white" id="employees-table" width="100%">
                <thead>
                    <tr>
                        <th class="text-truncate text-uppercase text-sm">
                            Employee ID
                        </th>
                        <th class="text-truncate text-uppercase text-sm">
                            Lastname
                        </th>
                        <th class="text-truncate text-uppercase text-sm">
                            Firstname
                        </th>
                        <th class="text-truncate text-uppercase text-sm">
                            Middlename
                        </th>
                        <th class="text-truncate text-uppercase text-sm">Suffix</th>
                        <th class="text-truncate text-uppercase text-sm">
                            Position
                        </th>
                        <th class="text-truncate text-uppercase text-sm">
                            Office Charging
                        </th>
                        <th class="text-truncate text-uppercase text-sm" nowrap>
                            Office Assignment
                        </th>
                        <th class="text-truncate text-uppercase text-sm">Employee Status</th>
                        <th class="text-truncate text-uppercase text-sm">Active Status</th>
                        <th class="text-truncate text-uppercase text-sm text-center">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
@include('employee.create', ['lastEmployeeID' => $lastEmployeeID])
@include('employee.edit')
@push('page-scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
<script src="/assets/js/jquery.dataTables.min.js"></script>
<script src="/assets/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('/assets/js/employee.js') }}"></script>
@endpush 
@endsection
