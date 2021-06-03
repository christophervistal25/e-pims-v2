@extends('layouts.app')
@section('title', 'Salary Adjustment Per Office')
@prepend('page-css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@prepend('page-css')
<script src="{{ asset('/js/app.js') }}" defer></script>
@endprepend
<style>
    .swal-content ul{
    list-style-type: none;
    padding: 0;
}
#line {
        border-bottom: 1px solid black;
        padding-bottom:15px;
    }
</style>
@endprepend
@section('content')
<div class="kanban-board card mb-0">
    <div class="card-body">
        <div id="add" class="page-header  {{  count($errors->all())  !== 0 ?  '' : 'd-none' }}">

            <div style='padding-bottom:50px;margin-right:-15px;' class="col-auto ml-auto">
                <button id="cancelbutton" class="btn submit-btn btn-primary float-right"><i class="fa fa-list"></i> Salary Adjustment List</button>
            </div>
            <div class="row">
            <div class="col-12">
                <div class="alert alert-secondary text-center font-weight-bold" role="alert" ><a id="officeAdjustment"></a></div>
            </div>
        </div>
        </div>

        <div id="table" class="page-header ">
            {{-- {{  count($errors->all()) == 0 ? '' : 'd-none' }} --}}
            <div class="row">
                <div class="col-6 mb-2">
                    <select value="" data-style="btn-primary text-white" class="form-control form-control-xs selectpicker {{ $errors->has('employeeOffice')  ? 'is-invalid' : ''}}"
                        name="employeeOffice" data-live-search="true" id="employeeOffice" data-size="5" onchange="ValidateDropDown(this)">
                        <option></option>
                        @foreach($plantilla as $plantillas)
                        <option data-plantilla="{{ $plantillas->office->office_name }}" value="{{ $plantillas->office->office_code }}">{{ $plantillas->office->office_name }}</option>
                        @endforeach
                        </select>
            </div>
            <div class="col-6 mb-2">
                    <div class="float-right">
                        <button id="addbutton" class="btn btn-primary float-right" disabled><i class="fa fa-plus"></i> Adjust Salary</button>
                    </div>
                </div>
            </div>
            <div class="table" style="overflow-x:auto;">
                <table class="table table-bordered text-center" id="salaryAdjustmentPerOffice"  style="width:100%;">
                    <thead>
                    <tr>
                        <td style="margin-top:10px;" scope="col" id="sample" class="text-center font-weight-bold d-none"><input style='transform:scale(1.3); margin-top:18px;' name="selectAll" value="selectAll" id="selectAll" type="checkbox" /></td>
                        <td scope="col" class="text-center font-weight-bold">Employee Name</td>
                        <td scope="col" class="text-center font-weight-bold d-none">Office</td>
                        <td scope="col" class="text-center font-weight-bold">Salary Grade</td>
                        <td scope="col" class="text-center font-weight-bold">Step Number</td>
                        <td scope="col" class="text-center font-weight-bold">Salary Previous</td>
                        <td scope="col" class="text-center font-weight-bold">Salary New</td>
                        <td scope="col" class="text-center font-weight-bold">Salary Difference</td>
                        <td scope="col" class="text-center font-weight-bold">Action</td>
                    </tr>
                    </thead>
                </table>
                <p style="visibility: visible;" id="line" class="text-center">No data available in table</p>
            </div>
        </div>

    </div>
</div>
@push('page-scripts')
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="{{ asset('/assets/js/salary-adjustment-per-office.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@endpush
@endsection
