@extends('layouts.app')
@section('title', 'Plantilla')
@prepend('page-css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endprepend
@section('content')
<div class="content container-fluid">
    <div class="kanban-board card mb-0">
        <div class="card-body">
            <div id="add" class="page-header {{  count($errors->all())  !== 0 ?  '' : 'd-none' }}">
                <form action="/plantilla" method="">
                    @csrf
                    <div class="row">
                    <div class="form-group col-4 col-lg-2">
                        <label>Old Item No<span class="text-danger">*</span></label>
                        <input value="" class="form-control" name="old_item_no" type="text">
                    </div>
                    <div class="form-group col-4 col-lg-2">
                        <label>New Item No<span class="text-danger">*</span></label>
                        <input value="" class="form-control" name="new_item_no" type="text">
                    </div>
                    <div class="form-group col-6 col-lg-3">
                        <label>Position Title<span class="text-danger">*</span></label>
                        <input value="" class="form-control" name="position_title" type="text">
                    </div>
                    <div class="form-group col-6 col-lg-3">
                        <label>Position Title Ext<span class="text-danger">*</span></label>
                        <input value="" class="form-control" name="position_title_ext" type="text">
                    </div>
                    <div class="form-group col-6 col-lg-2">
                        <label>Employee ID<span class="text-danger">*</span></label>
                        <input class="form-control" id="employee_id" name="employee_id" type="text" readonly>
                    </div>
                    <div class="form-group col-6 col-lg-4">
                        <label>Employee Name<span class="text-danger">*</span></label>
                        <select class="form-control form-control-xs selectpicker" 
                        name="employee_name" data-live-search="true" id="employee_name">
                            <option selected disabled>Search Name</option>
                            @foreach($employee as $employees)
                                <option value="{{ $employees->employee_id }}"> {{ $employees->lastname }}, {{ $employees->firstname }} {{ $employees->middlename }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-6 col-lg-3">
                        <label>Current Salary Grade<span class="text-danger">*</span></label>
                        <select name="current_salary_grade" value="" class="select floating">
                            <option selected>Please Select</option>
                           @foreach (range(1, 35) as $salarygrade)
                             <option value="{{ $salarygrade }}">{{ $salarygrade }}</option>
                           @endforeach
                        </select>
                    </div>
                    <div class="form-group col-6 col-lg-2">
                        <label>Current Step No<span class="text-danger">*</span></label>
                        <select name="current_step_no" value="" class="select floating">
                            <option selected>Please Select</option>
                            @foreach (range(1, 8) as $step_no)
                              <option value="{{ $step_no }}">{{ $step_no }}</option>
                            @endforeach
                         </select>
                    </div>
                    <div class="form-group col-6 col-lg-3">
                        <label>Current Salary Amount<span class="text-danger">*</span></label>
                        <input value="" class="form-control" name="current_salary_amount" type="text">
                    </div>
                    <div class="form-group col-6 col-lg-6">
                        <label>Office<span class="text-danger">*</span></label>
                        <select name="office_code" class="select">
                            <option selected disabled>Select Office</option>
                            @foreach($office as $offices)
                                <option value="{{ $offices->office_name}}"> {{ $offices->office_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-4 col-lg-6">
                        <label>Division<span class="text-danger">*</span></label>
                        <select name="division_code" class="select">
                            <option>Select Division</option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group col-8 col-lg-4">
                        <label>Date Of Original Appointment<span class="text-danger">*</span></label>
                        <input value="" class="form-control" name="date_original_appointment" type="date">
                    </div>
                    <div class="form-group col-6 col-lg-4">
                        <label>Date Of Last Promotion</label>
                        <input value="" class="form-control" name="date_last_promotion" type="date">
                    </div>
                    <div class="form-group col-6 col-lg-4">
                        <label>Status <span class="text-danger">*</span></label>
                        <select name="status" class="select">
                            <option>Select Status</option>
                            <option value="Casual">Casual</option>
                            <option value="Contractual">Contractual</option>
                            <option value="Coterminous">Coterminous</option>
                            <option value="Coterminous-Temporary">Coterminous-Temporary</option>
                            <option value="Permanent">Permanent</option>
                            <option value="Provisional">Provisional</option>
                            <option value="Regular_Permanent">Regular Permanent</option>
                            <option value="Substitute">Substitute</option>
                            <option value="Temporary">Temporary</option>
                            <option value="Elected">Elected</option>
                        </select>
                    </div>
                    <div class="col-1">
                        <label></label>
                    </div>
                    <div class="col-3">
                        <label>Salary Grade</label>
                    </div>
                    <div class="col-3">
                        <label>Step No</label>
                    </div>
                    <div class="col-3">
                        <label>SG Year</label>
                    </div>
                    <div class="col-2">
                        <label>Amount</label>
                    </div>
                    <div class="col-1">
                        <label>DBM Previous</label>
                    </div>
                    <div class="col-3">
                        <input value="" class="form-control" name="dbm_previous_sg_no" type="text">
                    </div>
                    <div class="col-3">
                        <input value="" class="form-control" name="dbm_previous_step_no" type="text">
                    </div>
                    <div class="col-3">
                        <input value="" class="form-control" name="dbm_previous_sg_year" type="text">
                    </div>
                    <div class="col-2">
                        <input value="" class="form-control" name="dbm_previous_amount" type="text">
                    </div>
                    <div class="col-1">
                        <label>DBM Current</label>
                    </div>
                    <div class="col-3">
                        <input value="" class="form-control" name="dbm_current_sg_no" type="text">
                    </div>
                    <div class="col-3">
                        <input value="" class="form-control" name="dbm_current_step_no" type="text">
                    </div>
                    <div class="col-3">
                        <input value="" class="form-control" name="dbm_current_sg_year" type="text">
                    </div>
                    <div class="col-2">
                        <input value="" class="form-control" name="dbm_current_amount" type="text">
                    </div>
                    <div class="col-1">
                        <label>CSC Previous</label>
                    </div>
                    <div class="col-3">
                        <input value="" class="form-control" name="csc_previous_sg_no" type="text">
                    </div>
                    <div class="col-3">
                        <input value="" class="form-control" name="csc_previous_step_no" type="text">
                    </div>
                    <div class="col-3">
                        <input value="" class="form-control" name="csc_previous_sg_year" type="text">
                    </div>
                    <div class="col-2">
                        <input value="" class="form-control" name="csc_previous_amount" type="text">
                    </div>
                    <div class="col-1">
                        <label>CSC Current</label>
                    </div>
                    <div class="col-3">
                        <input value="" class="form-control" name="csc_current_sg_no" type="text">
                    </div>
                    <div class="col-3">
                        <input value="" class="form-control" name="csc_current_step_no" type="text">
                    </div>
                    <div class="col-3">
                        <input value="" class="form-control" name="csc_current_sg_year" type="text">
                    </div>
                    <div class="col-2">
                        <input value="" class="form-control" name="csc_current_amount" type="text">
                    </div>
                    <div class="form-group col-4">
                        <label>Area Code<span class="text-danger">*</span></label>
                        <input value="" class="form-control" name="area_code" type="text">
                    </div>
                    <div class="form-group col-4">
                        <label>Area Type<span class="text-danger">*</span></label>
                        <input value="" class="form-control" name="area_type" type="text">
                    </div>
                    <div class="form-group col-4">
                        <label>Area Level<span class="text-danger">*</span></label>
                        <input value="" class="form-control" name="area_level" type="text">
                    </div>
                    <div class="form-group submit-section col-12">
                        <button type="submit" class="btn btn-success submit-btn float-right">Save</button>
                        <button style="margin-right:10px;" type="button" id="cancelbutton" class="btn btn-primary submit-btn float-right">Cancel</button>
                    </div>
                </div>
                </form>
            </div>
        <div id="table" class="page-header {{  count($errors->all()) == 0 ? '' : 'd-none' }}">
        <div style="padding-bottom:10px;" class="row align-items-right">
            <div class="col-auto float-right ml-auto">
                <button id="addbutton" class="btn btn-primary submit-btn float-right"><i class="fa fa-plus"></i> Add Plantillas</button>
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
    </div>
</div>
@include('Plantilla.add-ons.plantillamodal')
@push('page-scripts')
<script src="{{ asset('/assets/js/custom.js') }}"></script>
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
 {{-- code for show add form--}}
 <script>
    $(document).ready(function(){
    $("#addbutton").click(function(){
        $("#add").attr("class", "page-header");
        $("#table").attr("class", "page-header d-none");
    });
    });
    </script>
    {{-- code for show table --}}
    <script>
        $(document).ready(function(){
          $("#cancelbutton").click(function(){
            $("#add").attr("class", "page-header d-none");
            $("#table").attr("class", "page-header");
          });
        });
    </script>
    {{-- code for getting emp id from name --}}
    <script>
    var select = document.getElementById('employee_name');
    var input = document.getElementById('employee_id');
    select.onchange = function() {
        input.value = select.value;
    }
    </script>
@endpush
@endsection