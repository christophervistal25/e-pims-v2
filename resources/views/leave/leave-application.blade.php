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
                <h3 class="card-title text-center text-sm">Search Options</h3>
                <div class="checkbox">
                    <label class="checkbox-inline no_indent text-sm" for="individual">
                        <input type="checkbox" name="individual" id="individual"
                            style="transform: scale(1.2)">Individual
                    </label>
                </div>
                <div class="checkbox">
                    <label class="checkbox-inline no_indent text-sm" for="officename">
                        <input type="checkbox" name="officename" id="officename" style="transform: scale(1.2)">Office /
                        Department
                    </label>
                </div>
                <hr class="mt-1">
                <label for="officelist" class="form-group has-float-label mb-0">
                    <select name="officelist" type="text" id="officelist" class="form-control"
                        style="outline: none; box-shadow: 0px 0px 0px transparent;">
                        <option readonly selected>Select Office Name</option>
                        <option>Office Name I</option>
                    </select>
                    <span>Office Name</span>
                </label>
                <hr>
                <label for="filteropt" class="form-group has-float-label mb-0">
                    <select name="filteropt" type="text" id="filteropt" class="form-control"
                        style="outline: none; box-shadow: 0px 0px 0px transparent;">
                        <option readonly selected>Active</option>
                        <option>Active</option>
                    </select>
                    <span>Filter Options</span>
                </label>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-title text-center text-sm mb-4">Search Employee</div>
                <div class="row">
                    <div class="col-lg">
                        <label for="empName" class="form-group has-float-label">
                            <input class="form-control" type="text" id="empName"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>Name of Employee</strong></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="card shadow">
            <div class="card-body">
                <div class="alert alert-secondary text-center"><strong>LEAVE APPLICATION FILING</strong></div>
                {{-- <h3 class="card-title">Leave Application Filing</h3> --}}
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
                        <label for="typeOfLeave" class="form-group has-float-label">
                            <select class="form-control" for="typeOfLeave"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <option readonly selected value="">Type of Leave</option>
                                <option value="">Vacation Leave</option>
                                <option value="">Maternity/Paternity Leave</option>
                                <option value="">Sick Leave</option>
                                <option value="">Others</option>
                            </select>
                            <span><strong>LEAVE OPTION<span class="text-danger">*</span></strong></span>
                        </label>
                        <label for="noOfDays" class="form-group has-float-label">
                            <input type="number" class="form-control" id="noOfDays"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>NUMBER OF DAYS<span class="text-danger">*</span></strong></span>
                        </label>
                        <label for="caseOfVl" class="form-group has-float-label">
                            <select class="form-control" id="caseOfVl"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <option readonly selected value="">Out Patient</option>
                                <option value="">----</option>
                            </select>
                            <span><strong>IN CASE OF VL</strong></span>
                        </label>
                        <label for="commutation" class="form-group has-float-label">
                            <select class="form-control" id="commutation"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <option readonly selected value="">Requested</option>
                                <option value="">----</option>
                            </select>
                            <span><strong>COMMUTATION<span class="text-danger">*</span></strong></span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <h6 class="text-sm text-center">Leave Balance</h6>
                        <label for="asOf" class="form-group has-float-label">
                            <input type="text" id="asOf" class="form-control"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>AS OF</strong></span>
                        </label>
                        <label for="vlEarned" class="form-group has-float-label">
                            <input type="text" class="form-control" id="vlEarned"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>VL EARNED</strong></span>
                        </label>
                        <label for="vlBalance" class="form-group has-float-label">
                            <input type="text" class="form-control" id="vlBalance"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>VL BALANCE</strong></span>
                        </label>
                        <label for="slEarned" class="form-group has-float-label">
                            <input type="text" id="slEarned" class="form-control"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>SL EARNED</strong></span>
                        </label>
                        <label for="slEnjoyed" class="form-group has-float-label">
                            <input type="text" class="form-control" id="slEnjoyed"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>SL ENJOYED</strong></span>
                        </label>
                        <label for="slBalance" class="form-group has-float-label">
                            <input type="text" class="form-control" id="slBalance"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>SL BALANCE</strong></span>
                        </label>
                        <hr>
                        <label for="total" class="form-group has-float-label">
                            <input type="text" name="total" id="total" class="form-control"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>Total VL - SL</strong></span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <h6 class="text-center">Inclusive Dates</h6>
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
                            <option value="">Whole Day</option>
                            <option value="">Half Day</option>
                        </select>
                        <hr>
                        <div class="text-center">
                            <button type="button" class="text-white btn btn-primary px-5 shadow"><i
                                    class="las la-calendar-plus"></i> Add
                                Days</button>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-lg-9">
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
                            <option value="">Approved</option>
                            <option value="">Pending</option>
                        </select>
                        <span><strong>APPLICATION STATUS<span class="text-danger">*</span></strong></span>
                    </label>
                </div>
                <div class="float-right">
                    <button type="button" title="New Application"
                        class="text-white shadow rounded-circle btn btn-primary ml-3"><i
                            class="las la-user-plus"></i></button>
                    <button type="button" class="text-white shadow rounded-circle btn btn-success"
                        title="Save Changes"><i class="lar la-save"></i></button>
                    <button type="button" class="text-white shadow rounded-circle btn btn-dark" title="Print"><i
                            class="las la-print"></i></button>
                </div>

            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th class="text-center">Name of Employee</th>
                            <th class="text-center">Date Filed</th>
                            <th class="text-center">Control Number</th>
                            <th class="text-center">Leave Type</th>
                            <th class="text-center">Days</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="text-center">1</td>
                                <td class="text-center">1</td>
                                <td class="text-center">1</td>
                                <td class="text-center">1</td>
                                <td class="text-center">
                                    <div class="dropdown action-label">
                                        <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#"
                                            data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-dot-circle-o text-success"></i> Approved
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i
                                                    class="fa fa-dot-circle-o text-purple"></i> New</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="fa fa-dot-circle-o text-info"></i> Pending</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal"
                                                data-target="#approve_leave"><i
                                                    class="fa fa-dot-circle-o text-success"></i> Approved</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="fa fa-dot-circle-o text-danger"></i> Declined</a>
                                        </div>
                                    </div>
                                </td>
                                </td>
                                <td>
                                    <button class="btn btn-sm rounded-circle shadow btn-success"><i
                                            class="fa fa-edit"></i></button>
                                    &nbsp;
                                    <button class="btn btn-danger btn-sm rounded-circle shadow"><i
                                            class="fa fa-trash"></i></button>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>











@push('page-scripts')
<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
@endpush
@endsection
