@extends('layouts.app-vue')
@section('title', 'Leave Application Filing')
@prepend('page-css')
<script src="{{ asset('/js/app.js') }}" defer></script>
<link rel="stylesheet"
    href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
<link rel="stylesheet"
    href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />
@endprepend
@section('content')
<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center text-sm">Filters</h3>
                <label for="officelist" class="form-group has-float-label mb-0">
                    <select name="officelist" type="text" id="officelist" class="form-control"
                        style="outline: none; box-shadow: 0px 0px 0px transparent;">
                        <option readonly selected>All Office</option>
                        <option>Office Name I</option>
                    </select>
                    <span>Offices</span>
                </label>
                <hr>
                <div class="row">
                    <div class="col-lg-10 pr-0">
                        <label for="empName" class="form-group has-float-label">
                            <input class="form-control" type="text" id="empName"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>Search by Employee</strong></span>
                        </label>
                    </div>
                    <div class="col-lg-2 pl-0">
                        <button class="btn btn-outline-light"><i class="las la-search text-dark"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div id="leaveApplication" class="card shadow">
            
            <div class="card-body">
                <div class="alert alert-secondary text-center font-weight-bold">LEAVE APPLICATION FILING</div>
                <hr>
                <div class="row">
                    <div class="col-lg-4">
                        <h6 class="text-sm text-center">&nbsp;</h6>
                        <label for="dateApply" class="form-group has-float-label">
                            <input type="date" name="dateApply" id="dateApply" class="form-control form-control"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>DATE APPLY<span class="text-danger">*</span></strong></span>
                        </label>
                        <label for="controlNo" class="form-group has-float-label">
                            <input type="text" name="controlNo" id="controlNo" class="form-control"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>CONTROL NO.</strong></span>
                        </label>
                        <label for="leaveOpt" class="form-group has-float-label">
                            <select name="leaveOpt" id="leaveOpt"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;" class="form-control">
                                <option selected value="" readonly>SELECT LEAVE OPTION</option>
                                <option value="leaveApp">LEAVE APPLICATION</option>
                            </select>
                            <span><strong>LEAVE OPTION<span class="text-danger">*</span></strong></span>
                        </label>
                        <label for="typeOfLeave" class="form-group has-float-label">
                            <select class="form-control" for="typeOfLeave"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <option readonly selected value="">SELECT TYPE OF LEAVE</option>
                                <option value="vacLeave">VACATION LEAVE</option>
                                <option value="mpLeave">MATERNITY/PATERNITY LEAVE</option>
                                <option value="sLeave">SICK LEAVE</option>
                                <option value="sEmpLeave">TO SEEK EMPLOYMENT</option>
                                <option value="others">OTHERS</option>
                            </select>
                            <span><strong>TYPE OF LEAVE<span class="text-danger">*</span></strong></span>
                        </label>
                        <label for="typeOthers" class="form-group has-float-label">
                            <input type="text" name="typeOthers" id="typeOthers" class="form-control">
                            <span><strong>IF OTHERS IS SELECTED</strong></span>
                        </label>
                        <label for="noOfDays" class="form-group has-float-label">
                            <input type="number" class="form-control" id="noOfDays"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>NUMBER OF DAYS<span class="text-danger">*</span></strong></span>
                        </label>
                        <label for="caseOfVl" class="form-group has-float-label">
                            <select class="form-control" id="caseOfVl"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <option readonly selected value="outPatient">OUT PATIENT</option>
                                <option readonly value="inHosp">IN HOSPITAL</option>
                                <option readonly value="withinPhil">WITHIN THE PHILIPPINES</option>
                                <option readonly value="abroad">ABROAD</option>
                            </select>
                            <span><strong>IN CASE OF VACATION LEAVE</strong></span>
                        </label>
                        <hr>
                        <label for="specify" class="form-group has-float-label">
                            <input type="text" class="form-control" name="specify" id="specify"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>PLEASE SPECIFY:</strong></span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <h6 class="text-sm text-center">Leave Balance</h6>
                        <label for="asOf" class="form-group has-float-label">
                            <input type="date" id="asOf" class="form-control"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;" disabled>
                            <span><strong>AS OF</strong></span>
                        </label>
                        <label for="vlEarned" class="form-group has-float-label">
                            <input type="number" class="form-control" id="vlEarned"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;" disabled>
                            <span><strong>VL EARNED</strong></span>
                        </label>
                        <label for="vlEnjoyed" class="form-group has-float-label">
                            <input type="number" class="form-control" id="vlEnjoyed"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;" disabled>
                            <span><strong>VL ENJOYED</strong></span>
                        </label>
                        <label for="vlBalance" class="form-group has-float-label">
                            <input type="number" class="form-control" id="vlBalance"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;" disabled>
                            <span><strong>VL BALANCE</strong></span>
                        </label>
                        <label for="slEarned" class="form-group has-float-label">
                            <input type="number" id="slEarned" class="form-control"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;" disabled>
                            <span><strong>SL EARNED</strong></span>
                        </label>
                        <label for="slEnjoyed" class="form-group has-float-label">
                            <input type="number" class="form-control" id="slEnjoyed"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;" disabled>
                            <span><strong>SL ENJOYED</strong></span>
                        </label>
                        <label for="slBalance" class="form-group has-float-label">
                            <input type="number" class="form-control" id="slBalance"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;" disabled>
                            <span><strong>SL BALANCE</strong></span>
                        </label>
                        <hr>
                        <label for="total" class="form-group has-float-label">
                            <input type="number" name="total" id="total" class="form-control"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;" disabled>
                            <span><strong>Total VL - SL</strong></span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <div class="card mt-5 shadow">
                            <div class="card-body">
                                <h6 class="text-center mt-3">Inclusive Dates</h6>
                                <div class="checkbox">
                                    <label class="checkbox-inline no_indent text-sm" for="incWeekends">
                                        <input type="checkbox" name="incWeekends" id="incWeekends"
                                            style="transform: scale(1.2)">Include Weekends
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label class="checkbox-inline no_indent text-sm" for="incHolidays">
                                        <input type="checkbox" name="incHolidays" id="incHolidays"
                                            style="transform: scale(1.2)">Include Holidays
                                    </label>
                                </div>
                                <hr class="mt-1 mb-1">
                                <div class="checkbox">
                                    <label class="checkbox-inline no_indent text-sm" for="populateDate">
                                        <input type="checkbox" name="populateDate" id="populateDate" disabled
                                            style="transform: scale(1.2)">Populate Dates
                                    </label>
                                </div>
                                <h6 class="text-sm text-center">Date to Apply</h6>
                                <label for="dateApply" class="form-group has-float-label">
                                    <input type="date" name="dateApply" id="dateApply" class="form-control"
                                        style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <span><strong>SELECT DATE<span class="text-danger">*</span></strong></span>
                                </label>
                                <select name="" id="" class="form-control">
                                    <option value="wholeDay">WHOLE DAY</option>
                                    <option value="halfDay">HALF DAY</option>
                                </select>
                                <hr>
                                <div class="text-center">
                                    <button type="button" class="text-white btn btn-primary px-5 shadow"><i
                                            class="las la-calendar-plus"></i> Add
                                        Days</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <label for="commutation" class="form-group has-float-label">
                            <select class="form-control" id="commutation"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <option readonly selected value="">REQUESTED</option>
                                <option value="">NOT REQUESTED</option>
                            </select>
                            <span><strong>COMMUTATION<span class="text-danger">*</span></strong></span>
                        </label>
                        <label for="recoApproval" class="form-group has-float-label">
                            <select class="custom-select" name="recoApproval" id="recoApproval"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <option value="">-----</option>
                            </select>
                            <span><strong>RECOMMENDING APPROVAL<span class="text-danger">*</span></strong></span>
                        </label>
                        <label for="approveBy" class="form-group has-float-label">
                            <select class="custom-select" name="approveBy" id="approveBy"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <option value="">-----</option>
                            </select>
                            <span><strong>APPROVED BY<span class="text-danger">*</span></strong></span>
                        </label>
                        <label for="appStatus" class="form-group has-float-label">
                            <select name="appStatus" class="custom-select" id="appStatus"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <option value="approved">APPROVED</option>
                                <option value="pending">PENDING</option>
                            </select>
                            <span><strong>APPLICATION STATUS<span class="text-danger">*</span></strong></span>
                        </label>
                    </div>
                </div>
                <div class="float-start">
                    <button type="button" class="text-white shadow btn btn-primary ml-3"><i
                            class="las la-user-plus"></i> New Application</button>
                    <button type="button" class="text-white shadow btn btn-success"><i class="lar la-save"></i> Save
                        Changes</button>
                    <button type="button" class="text-white shadow btn btn-dark px-5"><i class="las la-print">
                        </i> Print</button>
                </div>

            </div>
        </div>
    </div>
</div>











@push('page-scripts')
<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
@endpush
@endsection
