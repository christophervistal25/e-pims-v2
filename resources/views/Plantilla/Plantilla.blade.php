@extends('layouts.app')
@section('title', 'Plantilla')
@prepend('page-css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endprepend
@section('content')
<div class="content container-fluid">
    <div class="kanban-board card mb-0">
        <div class="card-body">
            <div id="add" class="page-header {{  count($errors->all())  !== 0 ?  '' : 'd-none' }}">
                <form action="/plantilla" method="post">
                    @csrf
                    <div class="row">
                    <div class="form-group col-4 col-lg-2">
                        <label>Old Item No<span class="text-danger">*</span></label>
                        <input value="{{ old('old_item_no') }}" class="form-control {{ $errors->has('old_item_no')  ? 'is-invalid' : ''}}" name="old_item_no" type="text">
                        @if($errors->has('old_item_no'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('old_item_no') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-4 col-lg-2">
                        <label>New Item No<span class="text-danger">*</span></label>
                        <input value="{{ old('new_item_no') }}" class="form-control {{ $errors->has('new_item_no')  ? 'is-invalid' : ''}}" name="new_item_no" type="text">
                        @if($errors->has('new_item_no'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('new_item_no') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-6 col-lg-3">
                        <label>Position Title<span class="text-danger">*</span></label>
                        <input value="{{ old('position_title') }}" class="form-control {{ $errors->has('position_title')  ? 'is-invalid' : ''}}" name="position_title" type="text">
                        @if($errors->has('position_title'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('position_title') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-6 col-lg-3">
                        <label>Position Title Ext<span class="text-danger">*</span></label>
                        <input value="{{ old('position_title_ext') }}" class="form-control {{ $errors->has('position_title_ext')  ? 'is-invalid' : ''}}" name="position_title_ext" type="text">
                        @if($errors->has('position_title_ext'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('position_title_ext') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-6 col-lg-2">
                        <label>Employee ID<span class="text-danger">*</span></label>
                        <input value="{{ old('employee_id') }}" class="form-control {{ $errors->has('employee_id')  ? 'is-invalid' : ''}}" id="employee_id" name="employee_id" type="text" readonly>
                        @if($errors->has('employee_id'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('employee_id') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-6 col-lg-4">
                        <label>Employee Name<span class="text-danger">*</span></label>
                        <select value="{{ old('employee_name') }}" class="form-control form-control-xs selectpicker {{ $errors->has('employee_name')  ? 'is-invalid' : ''}}" 
                        name="employee_name" data-live-search="true" id="employee_name">
                            <option selected disabled>Search Name</option>
                            @foreach($employee as $employees)
                                <option value="{{ $employees->employee_id }}"> {{ $employees->lastname }}, {{ $employees->firstname }} {{ $employees->middlename }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('employee_name'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('employee_name') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-6 col-lg-3">
                        <label>Current Salary Grade<span class="text-danger">*</span></label>
                        <select name="current_salary_grade" value="{{ old('current_salary_grade') }}" class="select floating {{ $errors->has('current_salary_grade')  ? 'is-invalid' : ''}}">
                            <option selected>Please Select</option>
                           @foreach (range(1, 35) as $salarygrade)
                             <option value="{{ $salarygrade }}">{{ $salarygrade }}</option>
                           @endforeach
                        </select>
                        @if($errors->has('current_salary_grade'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('current_salary_grade') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-6 col-lg-2">
                        <label>Current Step No<span class="text-danger">*</span></label>
                        <select name="current_step_no" value="{{ old('current_step_no') }}" class="select floating {{ $errors->has('current_step_no')  ? 'is-invalid' : ''}}">
                            <option selected>Please Select</option>
                            @foreach (range(1, 8) as $step_no)
                              <option value="{{ $step_no }}">{{ $step_no }}</option>
                            @endforeach
                         </select>
                         @if($errors->has('current_step_no'))
                         <small  class="form-text text-danger">
                         {{ $errors->first('current_step_no') }} </small>
                         @endif
                    </div>
                    <div class="form-group col-6 col-lg-3">
                        <label>Current Salary Amount<span class="text-danger">*</span></label>
                        <input value="{{ old('current_salary_amount') }}" class="form-control {{ $errors->has('current_salary_amount')  ? 'is-invalid' : ''}}" name="current_salary_amount" type="text">
                        @if($errors->has('current_salary_amount'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('current_salary_amount') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-6 col-lg-5">
                        <label>Office<span class="text-danger">*</span></label>
                        <select value="{{ old('office_code') }}" name="office_code" class="select {{ $errors->has('office_code')  ? 'is-invalid' : ''}}">
                            <option selected disabled>Select Office</option>
                            @foreach($office as $offices)
                                <option value="{{ $offices->office_name}}"> {{ $offices->office_name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('office_code'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('office_code') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-4 col-lg-4">
                        <label>Division<span class="text-danger">*</span></label>
                        <select value="{{ old('division_code') }}" name="division_code" class="select {{ $errors->has('division_code')  ? 'is-invalid' : ''}}">
                            <option>Select Division</option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                        @if($errors->has('division_code'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('division_code') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-8 col-lg-3">
                        <label>Date Of Original Appointment<span class="text-danger">*</span></label>
                        <input value="{{ old('date_original_appointment') }}" class="form-control {{ $errors->has('date_original_appointment')  ? 'is-invalid' : ''}}" name="date_original_appointment" type="date">
                        @if($errors->has('date_original_appointment'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('date_original_appointment') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-6 col-lg-4">
                        <label>Date Of Last Promotion</label>
                        <input value="{{ old('date_last_promotion') }}" class="form-control {{ $errors->has('date_last_promotion')  ? 'is-invalid' : ''}}" name="date_last_promotion" type="date">
                        @if($errors->has('date_last_promotion'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('date_last_promotion') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-6 col-lg-4">
                        <label>Status <span class="text-danger">*</span></label>
                        <select value="{{ old('status') }}" name="status" class="select {{ $errors->has('status')  ? 'is-invalid' : ''}}">
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
                        @if($errors->has('status'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('status') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-6 col-lg-4">
                    </div>
                    <div class="form-group col-1">
                        <label></label>
                    </div>
                    <div class="form-group col-3">
                        <label>Salary Grade</label>
                    </div>
                    <div class="form-group col-3">
                        <label>Step No</label>
                    </div>
                    <div class="form-group col-3">
                        <label>SG Year</label>
                    </div>
                    <div class="form-group col-2">
                        <label>Amount</label>
                    </div>
                    <div class="form-group col-1">
                        <label>DBM Previous</label>
                    </div>
                    <div class="form-group col-3">
                        <select value="{{ old('dbm_previous_sg_no') }}" name="dbm_previous_sg_no" class="select floating {{ $errors->has('dbm_previous_sg_no')  ? 'is-invalid' : ''}}">
                            <option selected>Please Select</option>
                           @foreach (range(1, 35) as $salarygrade)
                             <option value="{{ $salarygrade }}">{{ $salarygrade }}</option>
                           @endforeach
                        </select>
                        @if($errors->has('dbm_previous_sg_no'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('dbm_previous_sg_no') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-3">
                        <select value="{{ old('dbm_previous_step_no') }}" name="dbm_previous_step_no" class="select floating {{ $errors->has('dbm_previous_step_no')  ? 'is-invalid' : ''}}">
                            <option selected>Please Select</option>
                            @foreach (range(1, 8) as $step_no)
                              <option value="{{ $step_no }}">{{ $step_no }}</option>
                            @endforeach
                         </select>
                         @if($errors->has('dbm_previous_step_no'))
                         <small  class="form-text text-danger">
                         {{ $errors->first('dbm_previous_step_no') }} </small>
                         @endif
                    </div>
                    <div class="form-group col-3">
                        <select value="{{ old('dbm_previous_sg_year') }}" class="select floating {{ $errors->has('dbm_previous_sg_year')  ? 'is-invalid' : ''}}"  name="dbm_previous_sg_year">
                            <option selected>Please Select</option>
                            {{ $year2 = date("Y",strtotime("-1 year")) }}
                            <option value={{ $year2 }}>{{ $year2 }}</option>
                            {{ $year3 = date("Y",strtotime("-0 year")) }}
                            <option value={{ $year3 }}>{{ $year3 }}</option>
                            @foreach (range(1, 10) as $year)
                            {{ $year1 = date("Y",strtotime("$year year")) }}
                            <option value={{ $year1 }}>{{ $year1 }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('dbm_previous_sg_year'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('dbm_previous_sg_year') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-2">
                        <input value="{{ old('dbm_previous_amount') }}" class="form-control {{ $errors->has('dbm_previous_amount')  ? 'is-invalid' : ''}}" name="dbm_previous_amount" type="text">
                        @if($errors->has('dbm_previous_amount'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('dbm_previous_amount') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-1">
                        <label>DBM Current</label>
                    </div>
                    <div class="form-group col-3">
                        <select value="{{ old('dbm_current_sg_no') }}" name="dbm_current_sg_no" class="select floating {{ $errors->has('dbm_current_sg_no')  ? 'is-invalid' : ''}}">
                            <option selected>Please Select</option>
                           @foreach (range(1, 35) as $salarygrade)
                             <option value="{{ $salarygrade }}">{{ $salarygrade }}</option>
                           @endforeach
                        </select>
                        @if($errors->has('dbm_current_sg_no'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('dbm_current_sg_no') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-3">
                        <select value={{ old('dbm_current_step_no') }} name="dbm_current_step_no" class="select floating {{ $errors->has('dbm_current_step_no')  ? 'is-invalid' : ''}}">
                            <option selected>Please Select</option>
                            @foreach (range(1, 8) as $step_no)
                              <option value="{{ $step_no }}">{{ $step_no }}</option>
                            @endforeach
                         </select>
                         @if($errors->has('dbm_current_step_no'))
                         <small  class="form-text text-danger">
                         {{ $errors->first('dbm_current_step_no') }} </small>
                         @endif
                    </div>
                    <div class="form-group col-3">
                        <select value="{{ old('dbm_current_sg_year') }}" class="select floating {{ $errors->has('dbm_current_sg_year')  ? 'is-invalid' : ''}}" name="dbm_current_sg_year">
                            <option selected>Please Select</option>
                            {{ $year2 = date("Y",strtotime("-1 year")) }}
                            <option value={{ $year2 }}>{{ $year2 }}</option>
                            {{ $year3 = date("Y",strtotime("-0 year")) }}
                            <option value={{ $year3 }}>{{ $year3 }}</option>
                            @foreach (range(1, 10) as $year)
                            {{ $year1 = date("Y",strtotime("$year year")) }}
                            <option value={{ $year1 }}>{{ $year1 }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('dbm_current_sg_year'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('dbm_current_sg_year') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-2">
                        <input value="{{ old('dbm_current_amount') }}" class="form-control {{ $errors->has('dbm_current_amount')  ? 'is-invalid' : ''}}" name="dbm_current_amount" type="text">
                        @if($errors->has('dbm_current_amount'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('dbm_current_amount') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-1">
                        <label>CSC Previous</label>
                    </div>
                    <div class="form-group col-3">
                        <select value="{{ old('csc_previous_sg_no') }}" name="csc_previous_sg_no" class="select floating {{ $errors->has('csc_previous_sg_no')  ? 'is-invalid' : ''}}">
                            <option selected>Please Select</option>
                           @foreach (range(1, 35) as $salarygrade)
                             <option value="{{ $salarygrade }}">{{ $salarygrade }}</option>
                           @endforeach
                        </select>
                        @if($errors->has('csc_previous_sg_no'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('csc_previous_sg_no') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-3">
                        <select value="{{ old('csc_previous_step_no') }}" name="csc_previous_step_no" class="select floating {{ $errors->has('csc_previous_step_no')  ? 'is-invalid' : ''}}">
                            <option selected>Please Select</option>
                            @foreach (range(1, 8) as $step_no)
                              <option value="{{ $step_no }}">{{ $step_no }}</option>
                            @endforeach
                         </select>
                         @if($errors->has('csc_previous_step_no'))
                         <small  class="form-text text-danger">
                         {{ $errors->first('csc_previous_step_no') }} </small>
                         @endif
                    </div>
                    <div class="form-group col-3">
                        <select value="{{ old('csc_previous_sg_year') }}" class="select floating {{ $errors->has('csc_previous_sg_year')  ? 'is-invalid' : ''}}" name="csc_previous_sg_year" >
                                <option selected>Please Select</option>
                                {{ $year2 = date("Y",strtotime("-1 year")) }}
                                <option value={{ $year2 }}>{{ $year2 }}</option>
                                {{ $year3 = date("Y",strtotime("-0 year")) }}
                                <option value={{ $year3 }}>{{ $year3 }}</option>
                                @foreach (range(1, 10) as $year)
                                {{ $year1 = date("Y",strtotime("$year year")) }}
                                <option value={{ $year1 }}>{{ $year1 }}</option>
                                @endforeach
                        </select>
                        @if($errors->has('csc_previous_sg_year'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('csc_previous_sg_year') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-2">
                        <input value="{{ old('csc_previous_amount') }}" class="form-control {{ $errors->has('csc_previous_amount')  ? 'is-invalid' : ''}}" name="csc_previous_amount" type="text">
                        @if($errors->has('csc_previous_amount'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('csc_previous_amount') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-1">
                        <label>CSC Current</label>
                    </div>
                    <div class="form-group col-3">
                        <select value="{{ old('csc_current_sg_no') }}" name="csc_current_sg_no" class="select floating {{ $errors->has('csc_current_sg_no')  ? 'is-invalid' : ''}}">
                            <option selected>Please Select</option>
                           @foreach (range(1, 35) as $salarygrade)
                             <option value="{{ $salarygrade }}">{{ $salarygrade }}</option>
                           @endforeach
                        </select>
                        @if($errors->has('csc_current_sg_no'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('csc_current_sg_no') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-3">
                        <select value="{{ old('csc_current_step_no') }}" name="csc_current_step_no" class="select floating {{ $errors->has('csc_current_step_no')  ? 'is-invalid' : ''}}">
                            <option selected>Please Select</option>
                            @foreach (range(1, 8) as $step_no)
                              <option value="{{ $step_no }}">{{ $step_no }}</option>
                            @endforeach
                         </select>
                         @if($errors->has('csc_current_step_no'))
                         <small  class="form-text text-danger">
                         {{ $errors->first('csc_current_step_no') }} </small>
                         @endif
                    </div>
                    <div class="form-group col-3">
                        <select value="{{ old('csc_current_sg_year') }}" class="select floating {{ $errors->has('csc_current_sg_year')  ? 'is-invalid' : ''}}" name="csc_current_sg_year" >
                                <option selected>Please Select</option>
                                {{ $year2 = date("Y",strtotime("-1 year")) }}
                                <option value={{ $year2 }}>{{ $year2 }}</option>
                                {{ $year3 = date("Y",strtotime("-0 year")) }}
                                <option value={{ $year3 }}>{{ $year3 }}</option>
                                @foreach (range(1, 10) as $year)
                                {{ $year1 = date("Y",strtotime("$year year")) }}
                                <option value={{ $year1 }}>{{ $year1 }}</option>
                                @endforeach
                        </select>
                        @if($errors->has('csc_current_sg_year'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('csc_current_sg_year') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-2">
                        <input value="{{ old('csc_current_amount') }}" class="form-control {{ $errors->has('csc_current_amount')  ? 'is-invalid' : ''}}" name="csc_current_amount" type="text">
                        @if($errors->has('csc_current_amount'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('csc_current_amount') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-2">
                        <label>Area Code<span class="text-danger">*</span></label>
                        <select name="area_code" value="{{ old('area_code') }}" class="select floating {{ $errors->has('area_code')  ? 'is-invalid' : ''}}">
                            <option selected>Please Select</option>
                            <option value="1">1 - Region 1</option>
                            <option value="2">2 - Region 2</option>
                            <option value="3">3 - Region 3</option>
                            <option value="4">4 - Region 4</option>
                            <option value="5">5 - Region 5</option>
                            <option value="6">6 - Region 6</option>
                            <option value="7">7 - Region 7</option>
                            <option value="8">8 - Region 8</option>
                            <option value="9">9 - Region 9</option>
                            <option value="10">10 - Region 10</option>
                            <option value="11">11 - Region 11</option>
                            <option value="12">12 - Region 12</option>
                            <option value="13">13 - NCR</option>
                            <option value="14">14 - CAR</option>
                            <option value="15">15 - CARAGA</option>
                            <option value="16">16 - ARMM</option>
                        </select>
                        @if($errors->has('area_code'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('area_code') }} </small>
                        @endif
                    </div>
                    <div class="form-group form-group col-3">
                        <label>Area Type<span class="text-danger">*</span></label>
                        <select name="area_type" value="{{ old('area_type') }}" class="select floating {{ $errors->has('area_type')  ? 'is-invalid' : ''}}">
                            <option selected>Please Select</option>
                            <option value="R">R - Region</option>
                            <option value="P">P - Province</option>
                            <option value="D">D - District</option>
                            <option value="M">M - Municipality</option>
                            <option value="F">F - Foreign Post</option>
                        </select>
                        @if($errors->has('area_type'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('area_type') }} </small>
                        @endif
                    </div>
                    <div class="form-group form-group col-2">
                        <label>Area Level<span class="text-danger">*</span></label>
                        <select name="area_level" value="{{ old('area_level') }}" class="select floating {{ $errors->has('area_level')  ? 'is-invalid' : ''}}">
                            <option selected>Please Select</option>
                            <option value="K">K</option>
                            <option value="T">T</option>
                            <option value="S">S</option>
                            <option value="A">A</option>
                        </select>
                        @if($errors->has('area_level'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('area_level') }} </small>
                        @endif
                    </div>
                    <div class="form-group form-group submit-section col-12">
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