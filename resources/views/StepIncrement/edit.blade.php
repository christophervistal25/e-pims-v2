@extends('layouts.app')
@section('title', 'Edit Step Increment')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link rel="stylesheet"
    href="{{ asset('/css/bootstrap-float-label.min.css') }}" />
<link rel="stylesheet" href="/assets/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/assets/css/style.css">

@endprepend
@section('content')
@foreach($errors->all() as $error)
{{ $error }}
@endforeach
{{-- VIEW TABLE BUTTON IN FORM --}}
<div class="float-right mr-3 mb-2" id='btnViewTableContainer'>
    <a href="{{ route('print-increment', $stepIncrement->id) }}" class="btn btn-info"><i class="fas fa-print"></i>&nbsp;
        Print Preview</a>
    <a href="/step-increment" class="btn btn-primary"><i class="fa fa-list"></i>&nbsp; Personnel List </a>
</div>
<div class="clearfix"></div>

{{-- FORM AND TABLE --}}
<div class="content container-fluid">
    <div class="kanban-board card shadow mb-0">
        <div class="">
            <form >
                <div class="py-3 bg-light my-4 border-bottom border-top text-center">
                    <span class="px-3 font-weight-bold">
                        VIEW STEP INCREMENT
                    </span>
                </div>
                <div class="p-3">
                    <img src="/assets/img/profiles/{{ $stepIncrement->employee_id }}.jpg" width="250px" height="253px" id="employeeImage" class="border img-responsive border-default float-right rounded cursor-pointer d-md-none d-lg-block" height="360px" />
                </div>
                <div class="row px-4 mt-2">
                    <div class="col-12 col-lg-3">
                        <label class="form-group has-float-label" for="dateStepIncrement">
                        <input class="form-control" value="{{ $stepIncrement->date_step_increment }}"
                            id="dateIncrement" name="dateStepIncrement" type="date" style="outline: none; box-shadow: 0px 0px 0px transparent;" disabled>
                            <span><strong>DATE<span class="text-danger">*</span></strong></span>
                        </label>
                    </div>

                    <div class="col-12 col-lg-6">
                        <label class="form-group has-float-label" for="employeeId">
                        <input value="{{$stepIncrement->employee->fullname}}"  type="text" class="form-control" id="employeeId" name="employeeID"
                            readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>EMPLOYEE NAME</strong></span>
                        </label>
                    </div>

                        <div class="col-12 col-lg-3">
                            <label class="form-group has-float-label" for="employeeId">
                            <input value="{{$stepIncrement->employee_id}}"  type="text" class="form-control" id="employeeId" name="employeeID"
                                readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span><strong>EMPLOYEE ID</strong></span>
                            </label>
                        </div>

                        <div class="col-12 col-lg-4">
                            <label class="form-group has-float-label" for="lastAppointment">
                            <input value="{{$stepIncrement->last_latest_appointment}}" class="form-control" id="lastAppointment" name="datePromotion"
                                type="text" readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span><strong>DATE OF LAST APPOINTMENT</strong></span>
                            </label>
                        </div>

                        <div class="col-12 col-lg-4">
                            <label class="form-group has-float-label" for="lastAppointment">
                            <input value="{{$stepIncrement->last_step_increment}}" class="form-control" id="lastAppointment" name="datePromotion"
                                type="text" readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span><strong>DATE OF LAST STEP INCREMENT</strong></span>
                            </label>
                        </div>

                        <div class="col-12 col-lg-4">
                            <label for="positionName" class="form-group has-float-label">
                            <input value="{{$position->Description}}" class="form-control" id="positionName" data-position="" name="positionName" type="text"
                                readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span><strong>POSITION</strong></span>
                            </label>
                        </div>
                </div>

                        <div class="py-3 bg-light my-4 border-bottom border-top">
                            <span class="px-3 font-weight-bold">
                                PREVIOUS STEP
                            </span>
                        </div>

                        <div class="row px-4 mt-2">


                            <div class="col-12 col-lg-3">
                                <label for="itemNoFrom" class="form-group has-float-label">
                                    <input value="{{$stepIncrement->item_no}}" class="form-control" id="itemNo" name="itemNoFrom" type="text" readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span><strong>ITEM NO</strong></span>
                                </label>
                            </div>

                            <div class="col-12 col-lg-3">
                                <label class="form-group has-float-label" for="sgNoFrom">
                                <input value="{{$stepIncrement->sg_no_from}}" class="form-control" id="salaryGrade" name="sgNoFrom" type="text"
                                    readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span><strong>SALARY GRADE</strong></span>
                                </label>
                            </div>

                            <div class="col-12 col-lg-3">
                                <label class="form-group has-float-label mb-0" for="stepNo">
                                <input value="{{$stepIncrement->step_no_from}}" class="form-control" id="stepNo" name="stepNoFrom" type="text"
                                    readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span><strong>STEP</strong></span>
                                </label>
                            </div>

                            <div class="col-12 col-lg-3">
                                <label class="form-group has-float-label" for="amountFrom">
                                <input value="{{$stepIncrement->salary_amount_from}}" class="form-control" id="amount" name="amountFrom" type="text" readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span><strong>AMOUNT</strong></span>
                            </label>
                            </div>
                        </div>

                        <div class="py-3 bg-light my-4 border-bottom border-top">
                            <span class="px-3 font-weight-bold">
                                CURRENT STEP
                            </span>
                        </div>

                        <div class="row px-4 mt-2">
                                <div class="col-12 col-lg-3">
                                    <label class="form-group has-float-label" for="">
                                    <input value="{{$stepIncrement->sg_no_to}}" type="text" class="form-control" name="sgNo2" id="sgNo2" readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <span><strong>SALARY GRADE</strong></span>
                                </label>
                                    <div id="sgNo2-error-message" class="text-danger">
                                    </div>
                                </div>


                                <div class="col-12 col-lg-3">
                                    <label class="form-group has-float-label" for="stepNo2">
                                    <input value="{{$stepIncrement->step_no_to}}" type="text" class="form-control" id="stepNo2" name="stepNo2" readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <span><strong>STEP</strong></span>
                                </label>
                                    <div id="stepNo2-error-message" class="text-danger">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-3">
                                    <label class="form-group has-float-label" for="amount2">
                                    <input value="{{$stepIncrement->salary_amount_to}}" type="text" class="form-control" id="amount2" name="amount2" readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <span><strong>AMOUNT</strong></span>
                                </label>
                                    <div id="amount2-error-message" class="text-danger">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-3">
                                    <label class="form-group has-float-label" for="monthlyDifference">
                                    <input value="{{$stepIncrement->salary_diff}}" class="form-control" id="monthlyDifference" name="monthlyDifference"
                                        type="text" readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <span><strong>MONTHLY DIFFERENCE</strong></span>
                                    </label>
                                </div>
                                <div class="form-group form-group submit-section col-12">
                                         <a href="{{url('/step-increment')}}"><button style="margin-right:10px;" type="button" class="text-white btn btn-primary submit-btn float-right shadow"><i class="fas fa-arrow-left"></i> Back</button></a>
                               </div>
                        </div>
                    <form>
    </div>
</div>
</div>

@push('page-scripts')
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset("js/sweetalert.min.js") }}"></script>
@endpush

@endsection
