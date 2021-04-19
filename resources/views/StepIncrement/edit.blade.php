@extends('layouts.app')
@section('title', 'Edit Step Increment')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"> --}}
 {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
@endprepend
@section('content')

    <div class="content container-fluid">
        <div class="kanban-board card mb-0">
            <div class="card-body">
                <div id="addIncrement" class="page-header">
                    <form action="" method="POST" id="formStepIncrement">
                    @csrf
                    <div class="row">

                        <div class="col-12">
                            <div class="alert alert-secondary text-center font-weight-bold" role="alert">Edit Step Increment</div>
                        </div>

                        <div class="card-body">

                            <div class="form-group col-12 col-lg-11">
                                <label>Date:</label>
                                <input class="form-control" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" id="dateIncrement" name="dateStepIncrement" type="date">
                            </div>

                            <div class="form-group col-12 col-lg-11">
                                <input class="form-control"  id="employeeId" name="employeeID" type="hidden" readonly>
                            </div>
                            
                            <div class="form-group col-12 col-lg-11">
                                <label>Employee Name:</label>
                                <select class="form-control selectpicker" value="" data-live-search="true" name="employeeName" id="employeeName">
                                    <option>Search name here</option>
                                    @foreach($employee as $employees)
                                    <option data-plantilla="{{ $employees->plantilla }}" value="{{ $employees->employee_id }}">{{ $employees->lastname }}, {{ $employees->firstname }} {{ $employees->middlename }}</option>
                                    @endforeach
                                </select>
                                <div id="employeeName-error-message" class="text-danger">
                                </div>
                            </div>

                            {{-- <div class="form-group">
                            <input type="hidden" name="plantillaID" id="plantillaId" class="">
                            </div> --}}

                            <div class="form-group col-12 col-lg-11">
                                <input class="form-control d-none" value="" id="positionId" name="positionID" type="text" readonly>
                            </div>

                            <div class="form-group col-12 col-lg-11">
                                <label>Position:</label>
                                <input class="form-control" value="" id="positionName" name="positionName" type="text" readonly>
                            </div>

                            <div class="form-group col-12 col-lg-11">
                                <label>Item No:</label>
                                <input class="form-control" value="" id="itemNo" name="itemNoFrom" type="text" readonly>
                            </div>

                            <div class="form-group col-12 col-lg-11">
                                <label>Date of Last Appointment:</label>
                                <input class="form-control" value="" id="lastAppointment" name="datePromotion" type="text" readonly>
                            </div>
                            
                            <div class="form-row col-12">
                                <div class="form-group col-6 col-lg-6">
                                    <label>Salary Grade:</label>
                                    <input class="form-control" value="" id="salaryGrade" name="sgNoFrom" type="text" readonly>                    
                                </div>
                                
                                <div class="form-group col-6 col-lg-5 ml-2">
                                    <label>Step:</label>
                                    <input class="form-control" value="" id="stepNo" name="stepNoFrom" type="text" readonly>                
                                </div>
                            </div>
                            
                            <div class="form-group col-12 col-lg-11">
                                <label>Amount:</label>
                                <input class="form-control" value="" id="amount" name="amountFrom" type="text" readonly>
                            </div>
                        </div>

                        {{-- FORM THAT HAS TO BE INPUT --}}
                        <!-- <div class="step-increment"> -->
                        <div class="card-body">        
                            <div class="form-group col-12 col-lg-12">
                                <label>Salary Grade:</label>
                                <input type="text" class="form-control" name="sgNo2" id="sgNo2" readonly>
                                <div id="sgNo2-error-message" class="text-danger">
                                </div>
                            </div>

                            <div class="form-group col-12 col-lg-12">
                                <label>Step:</label>
                                <select name="stepNo2" id="stepNo2" value="{{ old('stepNo2') }}" class="form-control floating {{ $errors->has('stepNo2')  ? 'is-invalid' : ''}}">
                                    <option>Please select</option>
                                </select>
                                <div id="stepNo2-error-message" class="text-danger">
                                </div>
                            </div>
                            
                            <div class="form-group col-12 col-lg-12">
                                <label>Amount:</label>
                                <input class="form-control" value="" id="amount2" name="amount2" type="text" readonly>
                                <div id="amount2-error-message" class="text-danger">
                                </div>
                            </div>

                            <div class="form-group col-12 col-lg-12">
                                <label>Monthly Difference:</label>
                                <input class="form-control" value="" id="monthlyDifference" name="monthlyDifference" type="text" readonly>
                            </div>

                            <div class="form-group col-12 col-lg-12" id="buttons">
                                <button type="button" id="btnCancel" class="form-control col-5 btn btn-warning float-right">Cancel</button>
                                <button type="submit" style="margin-right:10px" id="btnSave"  class="form-control col-5 float-right btn btn-success mb-5">Update</button>
                            </div>
                        </div>
                    <form>
                </div>
            </div>
        </div>
    </div>

    @push('page-scripts')

    <script src="{{ asset('/assets/js/custom.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @endpush

    @endsection