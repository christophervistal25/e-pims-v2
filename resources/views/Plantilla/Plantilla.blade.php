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
                <form action="/plantilla" method="post">
                    @csrf
                    <div class="row">
                    <div class="form-group col-4 col-lg-2">
                        <label>Old Item No<span class="text-danger">*</span></label>
                        <input value="{{ old('old_item_no') }}" class="form-control {{ $errors->has('old_item_no')  ? 'is-invalid' : ''}}" name="old_item_no" id="num-only" type="text">
                        @if($errors->has('old_item_no'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('old_item_no') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-4 col-lg-2">
                        <label>New Item No<span class="text-danger">*</span></label>
                        <input value="{{ old('new_item_no') }}" class="form-control {{ $errors->has('new_item_no')  ? 'is-invalid' : ''}}" name="new_item_no" id="num-only" type="text">
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
                        <select value="" class="form-control form-control-xs selectpicker {{ $errors->has('employee_name')  ? 'is-invalid' : ''}}" 
                        name="employee_name" data-live-search="true" id="employee_name">
                            <option>{{ old('employee_name') }}</option>
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
                        <select name="current_salary_grade" value="" class="select floating {{ $errors->has('current_salary_grade')  ? 'is-invalid' : ''}}" id="currentSalarygrade">
                            <option>Please Select</option>
                           @foreach (range(1 , 33) as $salarygrades)
                             <option {{ old('current_salary_grade') == $salarygrades ? 'selected' : '' }} value="{{ $salarygrades}}">{{ $salarygrades}}</option>
                           @endforeach
                        </select>
                        @if($errors->has('current_salary_grade'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('current_salary_grade') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-6 col-lg-2">
                        <label>Current Step No<span class="text-danger">*</span></label>
                        <select name="current_step_no" id="currentStepno" value="" class="select floating {{ $errors->has('current_step_no')  ? 'is-invalid' : ''}}">
                            <option>{{ old('current_step_no') }}</option>
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
                        <label>Current SG Year<span class="text-danger">*</span></label>
                        <select name="currentSgyear" id="currentSgyear" value="" class="select floating">
                            <option>{{ old('currentSgyear') }}</option>
                            {{ $year2 = date("Y",strtotime("-1 year")) }}
                            <option value={{ $year2 }}>{{ $year2 }}</option>
                            {{ $year3 = date("Y",strtotime("-0 year")) }}
                            <option value={{ $year3 }}>{{ $year3 }}</option>
                            @foreach (range(1, 10) as $year)
                            {{ $year1 = date("Y",strtotime("$year year")) }}
                            <option value={{ $year1 }}>{{ $year1 }}</option>
                            @endforeach
                         </select>
                         @if($errors->has('currentSgyear'))
                         <small  class="form-text text-danger">
                         {{ $errors->first('currentSgyear') }} </small>
                         @endif
                    </div>





                    <div class="form-group col-6 col-lg-3">
                        <label>Current Salary Amount<span class="text-danger">*</span></label>
                        <input value="{{ old('current_salary_amount') }}" class="form-control {{ $errors->has('current_salary_amount')  ? 'is-invalid' : ''}}" name="current_salary_amount" id="currentSalaryamount" type="text">
                        @if($errors->has('current_salary_amount'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('current_salary_amount') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-6 col-lg-3">
                        <label>Office<span class="text-danger">*</span></label>
                        <select value="" name="office_code" class="select {{ $errors->has('office_code')  ? 'is-invalid' : ''}}">
                            <option>{{ old('office_code') }}</option>
                            @foreach($office as $offices)
                                <option value="{{ $offices->office_code}}"> {{ $offices->office_name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('office_code'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('office_code') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-4 col-lg-3">
                        <label>Division<span class="text-danger">*</span></label>
                        <select value="" name="division_code" class="select {{ $errors->has('division_code')  ? 'is-invalid' : ''}}">
                            <option>{{ old('division_code') }}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
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
                        <select value="" name="status" class="select {{ $errors->has('status')  ? 'is-invalid' : ''}}">
                            <option>{{ old('status') }}</option>
                            <option value="Casual">Casual</option>
                            <option value="Contractual">Contractual</option>
                            <option value="Coterminous">Coterminous</option>
                            <option value="Coterminous-Temporary">Coterminous-Temporary</option>
                            <option value="Permanent">Permanent</option>
                            <option value="Provisional">Provisional</option>
                            <option value="Regular Permanent">Regular Permanent</option>
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
                        <select value="" name="dbm_previous_sg_no" class="select floating {{ $errors->has('dbm_previous_sg_no')  ? 'is-invalid' : ''}}" id="dbmPreviousSgno">
                            <option>{{ old('dbm_previous_sg_no') }}</option>
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
                        <select value="" name="dbm_previous_step_no" class="select floating {{ $errors->has('dbm_previous_step_no')  ? 'is-invalid' : ''}}" id="dbmPreviousStepno">
                            <option>{{ old('dbm_previous_step_no') }}</option>
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
                        <select value="" class="select floating {{ $errors->has('dbm_previous_sg_year')  ? 'is-invalid' : ''}}"  name="dbm_previous_sg_year" id="dbmPreviousSgyear">
                            <option>{{ old('dbm_previous_sg_year') }}</option>
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
                        <input value="{{ old('dbm_previous_amount') }}" class="form-control {{ $errors->has('dbm_previous_amount')  ? 'is-invalid' : ''}}" name="dbm_previous_amount" id="dbmPreviousAmount" type="text">
                        @if($errors->has('dbm_previous_amount'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('dbm_previous_amount') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-1">
                        <label>DBM Current</label>
                    </div>
                    <div class="form-group col-3">
                        <select value="" name="dbm_current_sg_no" class="select floating {{ $errors->has('dbm_current_sg_no')  ? 'is-invalid' : ''}}" id="dbmCurrentSgno">
                            <option>{{ old('dbm_current_sg_no') }}</option>
                           @foreach (range(1, 35) as $currentsg)
                             <option value="{{ $currentsg }}">{{ $currentsg }}</option>
                           @endforeach
                        </select>
                        @if($errors->has('dbm_current_sg_no'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('dbm_current_sg_no') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-3">
                        <select value="" name="dbm_current_step_no" class="select floating {{ $errors->has('dbm_current_step_no')  ? 'is-invalid' : ''}}" id="dbmCurrentStepno">
                            <option>{{ old('dbm_current_step_no') }}</option>
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
                        <select value="" class="select floating {{ $errors->has('dbm_current_sg_year')  ? 'is-invalid' : ''}}" name="dbm_current_sg_year" id="dbmCurrentSgyear">
                            <option>{{ old('dbm_current_sg_year') }}</option>
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
                        <input value="{{ old('dbm_current_amount') }}" class="form-control {{ $errors->has('dbm_current_amount')  ? 'is-invalid' : ''}}" name="dbm_current_amount" id="dbmCurrentAmount" type="text">
                        @if($errors->has('dbm_current_amount'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('dbm_current_amount') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-1">
                        <label>CSC Previous</label>
                    </div>
                    <div class="form-group col-3">
                        <select value="" name="csc_previous_sg_no" class="select floating {{ $errors->has('csc_previous_sg_no')  ? 'is-invalid' : ''}}" id="cscPreviousSgno">
                            <option>{{ old('csc_previous_sg_no') }}</option>
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
                        <select value="" name="csc_previous_step_no" class="select floating {{ $errors->has('csc_previous_step_no')  ? 'is-invalid' : ''}}" id="cscPreviousStepno">
                            <option>{{ old('csc_previous_step_no') }}</option>
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
                        <select value="" class="select floating {{ $errors->has('csc_previous_sg_year')  ? 'is-invalid' : ''}}" name="csc_previous_sg_year" id="cscPreviousSgyear">
                                <option>{{ old('csc_previous_sg_year') }}</option>
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
                        <input value="{{ old('csc_previous_amount') }}" class="form-control {{ $errors->has('csc_previous_amount')  ? 'is-invalid' : ''}}" name="csc_previous_amount" id="cscPreviousAmount" type="text">
                        @if($errors->has('csc_previous_amount'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('csc_previous_amount') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-1">
                        <label>CSC Current</label>
                    </div>
                    <div class="form-group col-3">
                        <select value="" name="csc_current_sg_no" class="select floating {{ $errors->has('csc_current_sg_no')  ? 'is-invalid' : ''}}" id="cscCurrentSgno">
                            <option>{{ old('csc_current_sg_no') }}</option>
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
                        <select value="" name="csc_current_step_no" class="select floating {{ $errors->has('csc_current_step_no')  ? 'is-invalid' : ''}}" id="cscCurrentStepno">
                            <option>{{ old('csc_current_step_no') }}</option>
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
                        <select value="" class="select floating {{ $errors->has('csc_current_sg_year')  ? 'is-invalid' : ''}}" name="csc_current_sg_year" id="cscCurrentSgyear">
                                <option>{{ old('csc_current_sg_year') }}</option>
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
                        <input value="{{ old('csc_current_amount') }}" class="form-control {{ $errors->has('csc_current_amount')  ? 'is-invalid' : ''}}" name="csc_current_amount" id="cscCurrentAmount" type="text">
                        @if($errors->has('csc_current_amount'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('csc_current_amount') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-2">
                        <label>Area Code<span class="text-danger">*</span></label>
                        <select name="area_code" value="" class="select floating {{ $errors->has('area_code')  ? 'is-invalid' : ''}}">
                            <option>{{ old('area_code') }}</option>
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
                        <select name="area_type" value="" class="select floating {{ $errors->has('area_type')  ? 'is-invalid' : ''}}">
                            <option>{{ old('area_type') }}</option>
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
                        <select name="area_level" value="" class="select floating {{ $errors->has('area_level')  ? 'is-invalid' : ''}}">
                            <option>{{ old('area_level') }}</option>
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
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('/assets/js/plantilla.js') }}"></script>
@endpush
@endsection