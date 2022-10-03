@extends('layouts.app-vue')
@section('title', 'Profile')
@prepend('page-css')
<link rel="stylesheet" href="/assets/css/style.css" />
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap-float-label.css') }}">
<link rel="stylesheet" href="{{ asset('css/dropzone.min.css') }}">
<script src="{{ asset('js/dropzone.min.js') }}"></script>
<style>
</style>
@endprepend
@section('content')
<div class="card mb-0 rounded-0 shadow-none border-0">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="profile-view">
                    <div class="profile-img-wrap mt-4 border rounded-circle">
                        <div class="profile-img">
                            <img src="{{ asset("/assets/img/profiles/{$employee->Employee_id}.jpg") }}">
                        </div>
                    </div>
                    <div class="profile-basic">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="">
                                    <p class="user-name h4">
                                        <span class="font-weight-bold">{{ $employee->Employee_id }}</span>
                                        - {{ $employee->FirstName }} {{ $employee->LastName }}
                                    </p>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Office Charging:</div>
                                            <div class="text"><a href="">{{ $employee?->office_charging?->Description ??
                                                    '' }}</a></div>
                                        </li>
                                        <li>
                                            <div class="title">Office Assignment:</div>
                                            <div class="text"><a href="">{{ $employee?->office_assignment?->Description
                                                    ?? '' }}</a></div>
                                        </li>
                                        <li>
                                            <div class="title">Position:</div>
                                            <div class="text">{{ $employee?->plantilla?->plantilla_positions?->position?->Description ?? $employee?->Work_Status }}</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <ul class="personal-info">
                                    <li>
                                        <div class="title">Phone:</div>
                                        <div class="text"><a href="">{{ $employee->ContactNumber ?? '-' }}</a></div>
                                    </li>
                                    <li>
                                        <div class="title">Email:</div>
                                        <div class="text"><a href="mailto:{{ $employee->Email }}">{{ $employee->Email ?? '-' }}</a></div>
                                    </li>
                                    <li>
                                        <div class="title">Birthday:</div>
                                        <div class="text">{{ date('F d, Y', strtotime($employee->Birthdate)) }}</div>
                                    </li>
                                    <li>
                                        <div class="title">Address:</div>
                                        <div class="text">{{ $employee->Address ?? '-' }}</div>
                                    </li>
                                    <li>
                                        <div class="title">Gender:</div>
                                        <div class="text text-capitalize">{{ strtolower($employee->Gender) }}</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card tab-box rounded-0 border-0 shadow-none">
    <div class="row user-tabs">
        <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
            <ul class="nav nav-tabs nav-tabs-bottom" id="nav-tabs-wrapper">
                <li class="nav-item"><a href="#emp_personal" data-toggle="tab" class="nav-link">Personal</a></li>
                <li class="nav-item"><a href="#emp_payrolls" data-toggle="tab" class="nav-link">Payrolls</a></li>
                <li class="nav-item"><a href="#emp_personal_data_sheet" data-toggle="tab" class="nav-link">Personal Data Sheet</a></li>
                <li class="nav-item"><a href="#emp_personnel_file" data-toggle="tab" class="nav-link">Personnel 201 Files</a></li>
                <li class="nav-item"><a href="#emp_leave_history" data-toggle="tab" class="nav-link">Leave & Absense</a></li>
                <li class="nav-item"><a href="#emp_service_record" data-toggle="tab" class="nav-link">Service Records</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="tab-content">
    <div id="emp_personal" class="pro-overview tab-pane fade">
        <form id="updateEmployeeForm">
            <div>
                <div class="card shadow-none">
                    <div class="card-header h5 bg-primary text-white">
                        Basic Information
                    </div>
                    <div class="card-body">
                        <div class="row pb-0">
                            <div class="col-lg-3 pb-0" style="padding-left : 3px;">
                                <div class="form-group">
                                    <label for="lastname" class="text-capitalize h5 required">lastname</label>
                                    <input type="text" id="lastname" name="lastname" class="form-control" value="{{ old('lastname', $employee->LastName) }}" />
                                    <span class="text-sm text-danger" id="edit-lastname-error"></span>
                                </div>
                            </div>

                            <div class="col-lg-3 pb-0">
                                <div class="form-group">
                                    <label for="firstname" class="text-capitalize h5 required">firstname</label>
                                    <input type="text" id="firstname" name="firstname" class="form-control" value="{{ old('firstname', $employee->FirstName) }}" />
                                    <span class="text-sm text-danger" id="edit-firstname-error"></span>
                                </div>
                            </div>

                            <div class="col-lg-3 pb-0">
                                <div class="form-group">
                                    <label for="middlename" class="text-capitalize h5">middlename</label>
                                    <input type="text" id="middlename" name="middlename" class="form-control" value="{{ old('middlename', $employee->MiddleName) }}" />
                                    <span class="text-sm text-danger" id="edit-middlename-error"></span>
                                </div>
                            </div>

                            <div class="col-lg-3 pb-0">
                                <div class="form-group">
                                    <label for="suffix" class="text-capitalize h5">suffix</label>
                                    <input type="text" id="suffix" name="suffix" class="form-control" value="{{ old('suffix', $employee->Suffix) }}" />
                                    <span class="text-sm text-danger" id="edit-suffix-error"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row pb-0">
                            <div class="col-lg-3 pb-0" style="padding-left : 3px;">
                                <div class="form-group">
                                    <label for="birthdate" class="text-capitalize h5 required">birthdate</label>
                                    <input type="date" id="birthdate" name="birthdate" class="form-control" value="{{ old('birthdate', $employee->Birthdate) }}" />
                                    <span class="text-sm text-danger" id="edit-birthdate-error"></span>
                                </div>
                            </div>

                            <div class="col-lg-3 pb-0">
                                <div class="form-group">
                                    <label for="birthplace" class="text-capitalize h5 required">birthplace</label>
                                    <input type="text" id="birthplace" name="birthplace" class="form-control" value="{{ old('birthplace', $employee->BirthPlace) }}" />
                                    <span class="text-sm text-danger" id="edit-birthplace-error"></span>
                                </div>
                            </div>

                            <div class="col-lg-3 pb-0">
                                <div class="form-group">
                                    <label for="gender" class="text-capitalize h5 required">gender</label>
                                    <select class="form-control form-select" name="gender" id="gender">
                                        <option {{ strtoupper(old('gender', $employee->Gender)) == 'MALE' ? 'selected' : '' }} value="MALE">MALE</option>
                                        <option {{ strtoupper(old('gender', $employee->Gender)) == 'FEMALE' ? 'selected' : '' }} value="FEMALE">FEMALE</option>
                                    </select>
                                    <span class="text-sm text-danger" id="edit-gender-error"></span>
                                </div>
                            </div>

                            <div class="col-lg-3 pb-0">
                                <div class="form-group">
                                    <label for="civil_status" class="text-capitalize h5 required">civil status</label>
                                    <select class="form-control form-select" name="civil_status" id="civil_status">
                                        <option {{ strtoupper(old('civil_status', $employee->CivilStatus)) == 'SINGLE' ? 'selected' : '' }} value="SINGLE">SINGLE</option>
                                        <option {{ strtoupper(old('civil_status', $employee->CivilStatus)) == 'MARRIED' ? 'selected' : '' }} value="MARRIED">MARRIED</option>
                                        <option {{ strtoupper(old('civil_status', $employee->CivilStatus)) == 'WIDOWED' ? 'selected' : '' }} value="WIDOWED">WIDOWED</option>
                                        <option {{ strtoupper(old('civil_status', $employee->CivilStatus)) == 'DIVORCED' ? 'selected' : '' }} value="DIVORCED">DIVORCED</option>
                                        <option {{ strtoupper(old('civil_status', $employee->CivilStatus)) == 'SEPARATED' ? 'selected' : '' }} value="SEPARATED">SEPARATED</option>
                                    </select>
                                    <span class="text-sm text-danger" id="edit-civil_status-error"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <label for="address" class="text-capitalize h5 required">address</label>
                                <textarea name="address" id="address" class="form-control" cols="30" rows="3">{{ $employee->Address }}</textarea>
                                <span class="text-sm text-danger" id="edit-address-error"></span>
                            </div>
                        </div>

                        <div class="row pb-0">
                            <div class="col-lg-6 pb-0">
                                <label for="contact_no" class="text-capitalize h5 required">Contact #</label>
                                <input type="text" class="form-control" value="{{ old('contact_no', $employee->ContactNumber) }}" name="contact_no" id="contact_no" maxlength="13" />
                                <span class="text-sm text-danger" id="edit-contact_no-error"></span>
                            </div>

                            <div class="col-lg-6 pb-0">
                                <label for="active_status" class="text-capitalize h5 required">Active Status</label>
                                <select class="form-control" name="active_status" id="active_status">
                                    <option {{ old('active_status', $employee->isActive) == 1 ? 'selected' : '' }} value="1">Active</option>
                                    <option {{ old('active_status', $employee->isActive) == 0 ? 'selected' : '' }} value="0">In-Active</option>
                                </select>
                                <span class="text-sm text-danger" id="edit-active_status-error"></span>
                            </div>
                        </div>

                        <div class="row pb-0">
                            <div class="col-lg-6 pb-0">
                                <label for="office_charging" class="text-capitalize h5 required">Office Charging</label>
                                <select name="office_charging" id="office_charging" class="form-control form-select" {{ $employee->plantilla ? 'readonly' : '' }}>
                                    @foreach($charging as $office)
                                    <option {{ old('office_charging', $employee->OfficeCode) == $office->OfficeCode2 ? 'selected' : 'disabled' }} value="{{ $office->OfficeCode2 }}">{{ $office->Description }}</option>
                                    @endforeach
                                </select>
                                <span class="text-sm text-danger" id="edit-office_charging-error"></span>
                            </div>
                            <div class="col-lg-6 pb-0">
                                <label for="office_assignment" class="text-capitalize h5 required">Office Assignment</label>
                                <select name="office_assignment" id="office_assignment" class="form-control form-select" {{  $employee->plantilla ? 'readonly' : '' }}>
                                    @foreach($charging as $office)
                                    <option {{ old('office_assignment', $employee->OfficeCode2) == $office->OfficeCode2 ? 'selected' : 'disabled' }} value="{{ $office->OfficeCode2 }}">{{ $office->Description }}</option>
                                    @endforeach
                                </select>
                                <span class="text-sm text-danger" id="edit-office_assignment-error"></span>
                            </div>
                        </div>

                        <div class="row pb-0">
                            <div class="col-lg-6 pb-0">
                                <label for="position" class="text-capitalize h5 required">Position</label>
                                <select name="position" style="width : 100%;" id="position" class="form-control form-select" {{ $employee->plantilla ? 'readonly' : '' }}>
                                    <option selected value="">-</option>
                                    @foreach($positions as $position)
                                        <option {{ $employee?->plantilla?->plantilla_positions?->position?->PosCode == $position->PosCode ? 'selected' : 'disabled' }} value="{{ $position->PosCode }}">{{ $position->Description }}</option>
                                    @endforeach
                                </select>
                                <span class="text-sm text-danger" id="edit-position-error"></span>
                            </div>

                            <div class="col-lg-6 pb-0">
                                <label for="position" class="text-capitalize h5 required">Work Status</label>
                                <select name="status" style="width : 100%;" id="status" class="form-control form-select" {{ $employee->plantilla ? 'readonly' : '' }}>
                                    <option {{ old('status', $employee->Work_Status) == 'JOB ORDER' ? 'selected' : 'disabled'}} value="JOB ORDER">JOB ORDER</option>
                                    <option {{ old('status', $employee->Work_Status) == 'CONTRACT OF SERVICE' ? 'selected' : 'disabled'}} value="CONTRACT OF SERVICE">CONTRACT OF SERVICE</option>
                                    <option {{ old('status', $employee->Work_Status) == 'CASUAL' ? 'selected' : 'disabled'}} value="CASUAL">CASUAL</option>
                                    <option {{ old('status', $employee->Work_Status) == 'CO-TERMINUS' ? 'selected' : 'disabled'}} value="CO-TERMINUS">CO-TERMINUS</option>
                                    <option {{ old('status', $employee->Work_Status) == 'COTERMINOUS TEMPORARY' ? 'selected' : 'disabled'}} value="COTERMINOUS TEMPORARY">COTERMINOUS TEMPORARY</option>
                                    <option {{ old('status', $employee->Work_Status) == 'ELECTED' ? 'selected' : 'disabled'}} value="ELECTED">ELECTED</option>
                                    <option {{ old('status', $employee->Work_Status) == 'PERMANENT' ? 'selected' : 'disabled'}} value="PERMANENT">PERMANENT</option>
                                </select>
                                <span class="text-sm text-danger" id="edit-status-error"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <label for="salary_grade" class="text-capitalize h5 required">Salary Grade</label>
                                <input name="salary_grade" id="salary_grade" class="form-control form-select" readonly value="{{ old('salary_grade', $employee?->plantilla?->sg_no) }}">
                                <span class="text-sm text-danger" id="edit-salary_grade-error"></span>
                            </div>

                            <div class="col-lg-4">
                                <label for="step_increment" class="text-capiatlize h5 required">Step Increment</label>
                                <input name="step_increment" id="step_increment" class="form-control form-select" readonly value="{{ $employee?->plantilla?->step_no }}">
                                <span class="text-sm text-danger" id="edit-step_increment-error"></span>
                            </div>

                            <div class="col-lg-4">
                                <label for="salary_rate" class="text-capitalize h5 required">Salary rate</label>
                                <input name="salary_rate" id="salary_rate" class="form-control" readonly value="{{ old('salary_rate', $employee?->plantilla?->salary_amount ?? $employee->salary_rate) }}" />
                                <span class="text-sm text-danger" id="edit-salary_rate-error"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-none">
                <div class="card-header h5 bg-primary text-white">
                    Social Insurance
                </div>

                <div class="card-body">
                    <div class="row p-0">
                        <div class="col-lg-6 pb-0">
                            <div class="form-group">
                                <label for="philHealthNo" class="h5 text-uppercase">
                                    Phil Health
                                </label>
                                <input type="text" name="philhealth_no" class="form-control  {{ $errors->first('philhealth_no') ? 'is-invalid' : '' }}" id="philHealthNo" value="{{ old('philhealth_no', $employee->philhealth_no) }}" />
                                <span class="text-sm text-danger" id="edit-philhealth_no-error"></span>
                            </div>
                        </div>

                        <div class="col-lg-6 pb-0">
                            <div class="form-group">
                                <label for="pagIbigNo" class="h5 text-uppercase">
                                    Pag-Ibig
                                </label>
                                <input type="text" name="pagibig_no" class="form-control  {{ $errors->has('pagibig_no') ? 'is-invalid' : '' }}" id="pagIbigNo" value="{{ old('pagibig_no', $employee->pagibig_no) }}" />
                                <span class="text-sm text-danger" id="edit-pagibig_no-error"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="tinNo" class="text-uppercase h5">
                                    TIN
                                </label>
                                <input type="text" name="tin_no" class="form-control  {{ $errors->has('tin_no') ? 'is-invalid' : '' }}" id="tinNo" value="{{ old('tin_no', $employee->tin_no) }}" />
                                <span class="text-sm text-danger" id="edit-tin_no-error"></span>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="gsisNo" class="text-capitalize h5">
                                    GSIS
                                </label>
                                <input type="text" name="gsis_no" class="form-control  {{ $errors->has('gsis_no') ? 'is-invalid' : '' }}" id="gsisNo" value="{{ old('gsis_no', $employee->gsis_no) }}" />
                                <span class="text-sm text-danger" id="edit-gsis_no-error"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-none mb-2">
                <div class="card-header h5 bg-primary text-white">
                    Login Credentials
                </div>

                <div class="card-body">
                    <div class="row p-0">
                        <div class="col-lg-12 pb-0">
                            <div class="form-group">
                                <label class="h5 text-capitalize required">
                                    Username
                                </label>
                                <input type="text" name="username" id="username" class="form-control {{ $errors->first('username') ? 'is-invalid' : '' }}" value="{{ old('username', $employee?->account?->username) }}" />
                                <span class="text-sm text-danger" id='edit-username-error'></span>
                            </div>
                        </div>

                    </div>

                    <div class="row p-0">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="text-capitalize h5 ">
                                    Password
                                </label>
                                <input type="password" name="password" id="password" class="form-control  {{ $errors->has('password') ? 'is-invalid' : '' }}" value="{{ old('password') }}" />
                                <span class="text-sm text-danger" id='edit-password-error'></span>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="text-capitalize h5 ">
                                    Re-type Password
                                </label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control  {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" value="{{ old('password_confirmation') }}" />
                            </div>
                        </div>
                    </div>

                    <div class="row p-0">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="text-capitalize h5 ">
                                    User type
                                </label>
                                <select name="user_type" id="user_type" class='form-control form-select'>
                                    <option {{ $employee?->account?->user_type == 0 ? 'selecteed' : '' }} value="0" selected>USER</option>
                                    <option {{ $employee?->account?->user_type == 1 ? 'selected' : '' }} value="1">ADMINISTRATOR</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button class="btn btn-success btn-lg h5 shadow float-right" id="btnUpdateEmployee">
                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true" id='btnUpdateSpinner'></span>
                UPDATE
            </button>
        </form>
    </div>

    <div id="emp_personal_data_sheet" class="pro-overview tab-pane fade">
        <div class="card rounded-0 border-0 shadow-none">
            <div class="card-body p-2 m-0">
                <personal-data-sheet :id="{{ $employee->Employee_id }}"></personal-data-sheet>
            </div>
        </div>
    </div>

    <div id="emp_payrolls" class="pro-overview tab-pane fade">
        <div class="card rounded-0 border-0 shadow-none">
            <div class="card-body p-2 m-0">
                @forelse($payrolls as $payroll)
                @php
                list($month, $sequenceNo) = explode("-", $payroll->payroll_no);
                @endphp
                <div class="card" data-content="{{ $payroll->payroll_no }}">
                    <div class="card-header text-white bg-primary" id="{{ $payroll->payroll_no }}-ID">
                        <span class='text-uppercase'> {{ date('F Y', strtotime($month)) }} </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-5 col-sm-12 col-md-12 col-lg-12">
                                <table class='table' style="margin :0px; padding : 0px;">
                                    <tr>
                                        <th colspan="2" class='lead font-weight-bold'
                                            style='letter-spacing : 2.5px; border-top : 0px solid transparent;'>
                                            SALARY
                                            <span class="float-right d-xl-none">
                                                <small id="gross" class="font-weight-bold"></small>
                                            </span>
                                        </th>
                                    </tr>

                                    <tr style="border-top : 3px solid black;">
                                        <td>Monthly Salary</td>
                                        <td class='text-right' style='letter-spacing : 1.5px;'>
                                            {{ number_format($payroll->details->first()->monthly_salary ?? 0, 2,
                                            ".", ",") }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class='text-uppercase' style="letter-spacing : 1.5px;">Compensation
                                        </th>
                                        <th class='text-right' style='letter-spacing : 1.5px;'>
                                            {{ number_format($payroll->details->first()->add_compensation ?? 0, 2,
                                            ".", ",") }}
                                        </th>
                                    </tr>
                                    @foreach($payroll->compensations as $compensation)
                                    <tr class='align-middle'>
                                        <td><span class='ml-3'></span>{{
                                            $compensation->description->account_chart->accountDesc }}
                                        </td>
                                        <td class='text-right' style='letter-spacing : 1.5px'>
                                            {{ number_format($compensation->amount, 2, ".", ",") }}
                                        </td>
                                    </tr>
                                    @endforeach
                                    @php
                                        $totalRows = ($payroll->mandatory_deductions->count() + $payroll->personal_deductions->count() ) - $payroll->compensations->count()
                                    @endphp
                                    @foreach(range(1, $totalRows) as $index)
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                    <tr style="border-bottom: 2px solid gray; border-top: 0px solid transparent">
                                        <td><span class='font-weight-bold'
                                                style='margin-right : 90px; letter-spacing : 2px;'>GROSS
                                                SALARY</span></td>
                                        <td class='text-right' style='letter-spacing : 1.5px;'>
                                            <span class='font-weight-bold gross-salary'>{{ number_format($payroll->details->first()->gross_salary, 2, ".", ',') }}</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-xl-5 col-sm-12 col-md-12 col-lg-12">
                                <table class='table' style="margin-bottom : 0px;">
                                    <tr style="border-bottom : 3px solid black;">
                                        <th colspan="2" class='lead font-weight-bold'
                                            style='letter-spacing : 2.5px; border-top : 0px solid transparent;'>
                                            DEDUCTIONS
                                            <span class="float-right d-xl-none">
                                                <small id="deduction" class="font-weight-bold"></small>
                                            </span>
                                        </th>
                                    </tr>
                                    <tr class='align-middle'>
                                        <th class='text-uppercase' style='letter-spacing : 1.5px;'>Mandatory</th>
                                        <th class='text-right' style='letter-spacing : 1.5px'>
                                            {{ number_format($payroll->details->first()->mandatory_deductions, 2,
                                            ".", ",") }}
                                        </th>
                                    </tr>
                                    @foreach($payroll->mandatory_deductions as $mandatory_deductions)
                                    <tr class='align-middle'>
                                        <td><span class='ml-3'></span>{{
                                            $mandatory_deductions->description->account_chart->accountDesc }}
                                        </td>
                                        <td class='text-right' style='letter-spacing : 1.5px'>
                                            {{ number_format($mandatory_deductions->amount, 2, ".", ",") }}
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr class='align-middle'>
                                        <th class='text-uppercase' style='letter-spacing : 1.5px'>Personal</th>
                                        <th class='text-right' style='letter-spacing : 1.5px'>
                                            {{ number_format($payroll->details->first()->personal_deductions, 2,
                                            ".", ",") }}
                                        </th>
                                    </tr>
                                    @foreach($payroll->personal_deductions as $personal_deductions)
                                    <tr class='align-middle'>
                                        <td><span class='ml-3'></span>{{
                                            $personal_deductions->description->account_chart->accountDesc }}
                                        </td>
                                        <td class='text-right' style='letter-spacing : 1.5px'>
                                            {{ number_format($personal_deductions->amount, 2, ".", ",") }}
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr style="border-bottom: 2px solid gray; border-top: 0px solid transparent">
                                        <td><span class='font-weight-bold'
                                                style='margin-right : 90px; letter-spacing : 2px;'>TOTAL
                                                DEDUCTIONS</span>
                                        </td>
                                        <td class='text-right' style='letter-spacing : 1.5px; '><span
                                                class='font-weight-bold total-deduction'>{{
                                                number_format($payroll->mandatory_deductions->sum('amount') +
                                                $payroll->personal_deductions->sum('amount'), 2, ".", ",") }}</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-xl-2 col-sm-12 col-md-12 col-lg-12">
                                <table class='table' class='m-0'>
                                    <tr style="border-bottom : 3px solid black;">
                                        <th colspan="2" class='lead font-weight-bold'
                                            style='letter-spacing : 2.5px; border-top : 0px solid transparent;'>
                                            NET
                                            <span class="float-right d-xl-none">
                                                <small id="net" class="font-weight-bold"></small>
                                            </span>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>FIRST HALF</td>
                                        <td class='text-right' style='letter-spacing : 1.5px;'>
                                            {{ number_format($payroll->details->where('quencena',
                                            1)->first()->quencena_amount ?? 0, 2, ".", ",") }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>SECOND HALF</td>
                                        <td class='text-right' style='letter-spacing : 1.5px;'>
                                            {{ number_format($payroll->details->where('quencena',
                                            2)->first()->quencena_amount ?? 0, 2, ".", ",") }}
                                        </td>
                                    </tr>
                                    @foreach(range(1, ($payroll->mandatory_deductions->count() +
                                    $payroll->personal_deductions->count())) as $index)
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                    <tr style="border-bottom: 2px solid gray; border-top: 0px solid transparent">
                                        <td class='font-weight-bold'>NET PAY</td>
                                        <td class='text-right' style='letter-spacing : 1.5px; '><span
                                                class='font-weight-bold'>{{
                                                number_format($payroll->details->where('quencena',
                                                1)->first()->quencena_amount + $payroll->details->where('quencena',
                                                2)->first()->quencena_amount ?? 0, 2, ".", ",") }}</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
                @empty
                    <div class="text-center">
                        <img src="{{ asset("/assets/img/no-file-image.jpg") }}" width="7%"
                            alt="">
                        <p class="text-muted font-weight-medium">No payslips found</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <div id="emp_personnel_file" class="pro-overview tab-pane fade">
        <div class="card-header p-0 mb-0 border-0 rounded-0 shadow-none">
        </div>
        <div class="card rounded-0 border-0 shadow-none">
            <div class="card-body p-2 m-0">
                <div class="file-wrap">
                    <div class="file-content">
                        <div class="file-body">
                            <div class="file-scroll">
                                <div class="file-content-inner">
                                    @foreach($file_records as $fileType => $files)
                                    <p class="font-weight-bold">{{ $fileType }}</p>
                                    <div class="row row-sm">
                                        @foreach($files as $file)
                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="card card-file rounded-0 border shadow-none">
                                                <div class="dropdown-file">
                                                    <a href="" class="dropdown-link" data-toggle="dropdown"><i
                                                            class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item">Download</a>
                                                    </div>
                                                </div>
                                                <div class="card-file-thumb">
                                                    <i class="fa fa-file-pdf-o text-danger"></i>
                                                </div>
                                                <div class="card-body">
                                                    <p href="#" class="font-weight-medium">{{ $file->file }}</p>
                                                </div>
                                                <div class="card-footer">
                                                    <span class="d-none d-sm-inline">Uploaded at : </span>{{
                                                    $file->created_at }}
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="col" id="uploader-{{ $file->file_details->id }}">
                                            <div class="card card-file rounded-0 border shadow-none">
                                                <div class="card-body">
                                                    <form action="/personnel-file-upload" enctype="multipart/form-data" class="dropzone" id="my-great-dropzone">
                                                        <input type="hidden" name="id" value="{{ $file->file_details->id }}">
                                                        <input type="hidden" name="name" value="{{ $file->file_details->name }}">
                                                        <input type="hidden" name="emp" value="{{ $employee->Employee_id }}">
                                                    </form>
                                                </div>
                                                <div class="card-footer">
                                                    <span class="d-none d-sm-inline">&nbsp;</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @foreach($personnelFiles as $file)
                                    <p class="font-weight-bold">{{ $file->name }}</p>
                                    <div class="row row-sm" id="empty-uploader-{{ $file->id }}">
                                        <div class="col">
                                            <div class="card card-file rounded-0 border shadow-none">
                                                <form action="/personnel-file-upload" enctype="multipart/form-data" class="dropzone" id="my-great-dropzone">
                                                    <input type="hidden" name="id" value="{{ $file->id }}">
                                                    <input type="hidden" name="name" value="{{ $file->name }}">
                                                    <input type="hidden" name="emp" value="{{ $employee->Employee_id }}">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="emp_leave_history" class="pro-overview tab-pane fade">
        <div class="card rounded-0 border-0 shadow-none">
            <div class="card-body p-2 m-0">
                <div class="text-center">
                    <img src="{{ asset("/assets/img/no-file-image.jpg") }}" width="7%"
                        alt="">
                    <p class="text-muted font-weight-medium">No files found</p>
                </div>
            </div>
        </div>
    </div>

    <div id="emp_service_record" class="pro-overview tab-pane fade">
        <div class="card rounded-0 border-0 shadow-none">
            @if($serviceRecords->count() !== 0)
            <div class="card-header align-middle bg-primary text-white border-0">
                This is to certify that the employee actually rendered services in this office as shown by the service record below each line which is supported by appointment and other papers actually issued and approved by the Authorities concerned.
            </div>
            <div class="card-body p-2 m-0">
                <table class="table table-bordered table-hover" style="width:100%; padding : 0px; margin : 0px;">
                    <thead>
                         <tr>
                              <td class="bg-light align-middle text-center" rowspan="1 " colspan="2">Service<br><small>(Inclusive dates)</small></th>
                              <td class="bg-light align-middle text-center" rowspan="1" colspan="5">Records of
                                   Appointment</td>
                                   <td class="bg-light align-middle text-center" rowspan="2">Station/Place of Assignment</td>
                                   <td class="bg-light align-middle text-center" rowspan="2">Leave w/o Pay</td>
                                    <td class="bg-light align-middle text-center" rowspan="2">Separation Date</td>
                                    <td class="bg-light align-middle text-center" rowspan="2">Cause</td>
                            <tr>
                                <td class="bg-light align-middle text-center">From</td>
                                <td class="bg-light align-middle text-center">To</td>
                                <td class="bg-light align-middle text-center">Designation</td>
                                <td class="bg-light align-middle text-center">Status</td>
                                <td class="bg-light align-middle text-center">SG</td>
                                <td class="bg-light align-middle text-center">Step</td>
                                <td class="bg-light align-middle text-center">Salary</td>
                            </tr>
                         </tr>
                    </thead>
                    <tbody>
                        @foreach($serviceRecords as $service)
                            <tr>
                                <td class="text-center">{{ $service->service_from_date }}</td>
                                <td class="text-center">
                                    @if($loop->index ==0)
                                        <span class="badge badge-primary">PRESENT</span>
                                    @else
                                        {{ $service->service_from_to ?? '-' }}
                                    @endif
                                </td>
                                <td class="text-center">{{ $service->position->Description }}</td>
                                <td class="text-center">{{ $service->status }}</td>
                                <td class="text-center">-</td>
                                <td class="text-center">-</td>
                                <td class="text-center">{{ number_format($service->salary, 2, ".", ",") }}</td>
                                <td class="text-center">{{ $service->office->office_name }}</td>
                                <td class="text-center">{{ $service->leave_without_pay ?? '-' }}</td>
                                <td class="text-center">{{ $service->seperation_date ?? '-' }}</td>
                                <td class="text-center">{{ $service->seperation_cause ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
               </table>
            </div>
            @else
            <div class="card-body">
                <div class="text-center">
                    <img src="{{ asset("/assets/img/no-file-image.jpg") }}" width="7%" alt="">
                    <p class="text-muted font-weight-medium">No Service Records</p>
                </div>
            </div>
            @endif
        </div>
    </div>

</div>
@push('page-scripts')
<script>
    $(document).ready(function () {
        let [selected] = $('#nav-tabs-wrapper').children().eq(localStorage.getItem('CLICKED_TAB') || 0).addClass('active')
        $(selected).children().eq(0).trigger('click')
    });

    $(document).on('click', '#nav-tabs-wrapper > li.nav-item', function () {
        localStorage.setItem('CLICKED_TAB', $(this).index());
    });

    $(document).on('click', '#btnUpdateEmployee', function (e) {
        e.preventDefault();
        let employeeID = "{{ $employee->Employee_id }}";

        let data = $("#updateEmployeeForm").serialize();
        data += "&employeeID=" + employeeID;

        $("#btnUpdateSpinner").removeClass("d-none");

        $.ajax({
            url: `/api/employee/${employeeID}/update`,
            method: "PUT",
            data,
            success: function (response) {
                $('#btnUpdateEmployee').removeClass('btn-danger').addClass('btn-success');
                $("#btnUpdateSpinner").addClass("d-none");
                swal({
                    text: "Employee updated successfully",
                    icon: "success",
                    buttons: false,
                    timer: 1500,
                });
            },
            error: function (response) {
                $("#btnUpdateEmployee").removeAttr("disabled");
                $("#btnUpdateSpinner").addClass("d-none");
                if (response.status === 422) {
                    $('#btnUpdateEmployee').removeClass('btn-success').addClass('btn-danger');
                    for (const [field, error] of Object.entries(
                        response.responseJSON.errors
                    )) {
                        $(`[name='${field}']`).addClass("is-invalid");
                        $(`#edit-${field}-error`).text(error);
                    }
                }
            },
        });
    });
</script>
<script>
  Dropzone.options.myGreatDropzone = {
    paramName: "file",
    maxFilesize: 5,
    acceptedFiles: "application/pdf",
    init: function() {
        this.on("success", function(file, response) {
            if(response.success) {
                $(`#empty-uploader-${response.file_id}`).prepend(`<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <div class="card card-file rounded-0 border shadow-none">
                        <div class="dropdown-file">
                            <a href="" class="dropdown-link" data-toggle="dropdown"><i
                                    class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item">Download</a>
                            </div>
                        </div>
                        <div class="card-file-thumb">
                            <i class="fa fa-file-pdf-o text-danger"></i>
                        </div>
                        <div class="card-body">
                            <p href="#" class="font-weight-medium">${response.name}</p>
                        </div>
                        <div class="card-footer">
                            <span class="d-none d-sm-inline">Uploaded at : </span>${response.created_at}
                        </div>
                    </div>
                </div>`);


                $(`
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <div class="card card-file rounded-0 border shadow-none">
                        <div class="dropdown-file">
                            <a href="" class="dropdown-link" data-toggle="dropdown"><i
                                    class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item">Download</a>
                            </div>
                        </div>
                        <div class="card-file-thumb">
                            <i class="fa fa-file-pdf-o text-danger"></i>
                        </div>
                        <div class="card-body">
                            <p href="#" class="font-weight-medium">${response.name}</p>
                        </div>
                        <div class="card-footer">
                            <span class="d-none d-sm-inline">Uploaded at : </span>${response.created_at}
                        </div>
                    </div>
                </div>
                `).insertBefore(`#uploader-${response.file_id}`);
            }
        })
    }
  };
</script>
@endpush
@endsection
