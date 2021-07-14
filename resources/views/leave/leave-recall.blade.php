@extends('layouts.app-vue')
@section('title', 'Leave Recall, Cancel or Transfer')
@prepend('page-css')
<script src="{{ asset('/js/app.js') }}" defer></script>

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
                    <div class="col-lg-10 pr-0">
                        <label for="empName" class="form-group has-float-label">
                            <input class="form-control" type="text" id="empName"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>Name of Employee</strong></span>
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
        <div class="card shadow">
            <div class="card-body">
                <div class="alert alert-secondary text-center font-weight-bold">LEAVE RECALL, CANCEL OR TRANSFER</div>
                <hr>
                <div class="row">
                    <div class="col-lg-6">
                        <h6 class="text-sm text-center">APPLICATION DETAILS</h6>
                        <label for="dateApply" class="form-group has-float-label">
                            <input type="date" name="dateApply" id="dateApply" class="form-control"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>DATE APPLY<span class="text-danger">*</span></strong></span>
                        </label>
                        <label for="controlNo" class="form-group has-float-label">
                            <input type="text" name="controlNo" id="controlNo" class="form-control"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>CONTROL NO.<span class="text-danger">*</span></strong></span>
                        </label>
                        <label for="typeOfLeave" class="form-group has-float-label">
                            <select style="outline: none; box-shadow: 0px 0px 0px transparent;" class="form-control"
                                for="typeOfLeave">
                                <option readonly selected value="">SELECT TYPE OF LEAVE</option>
                                <option value="vacLeave">VACATION LEAVE</option>
                                <option value="mpLeave">MATERNITY/PATERNITY LEAVE</option>
                                <option value="sLeave">SICK LEAVE</option>
                                <option value="others">OTHERS</option>
                            </select>
                            <span><strong>TYPE OF LEAVE<span class="text-danger">*</span></strong></span>
                        </label>
                        <label for="noOfDays" class="form-group has-float-label">
                            <input type="number" class="form-control" name="noOfDays" id="noOfDays"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>NO. OF DAYS<span class="text-danger">*</span></strong></span>
                        </label>
                        <div class="text-center">
                            <button class="btn btn-success shadow px-5"><i class="las la-save"></i> Cancel
                                Leave</button>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <h6 class="text-sm">&nbsp;</h6>
                        <div class="bg-danger shadow w-75 h-75 mx-auto"></div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="text-sm text-center">Inclusive Dates</h6>
                                <label for="dateToApply" class="form-group has-float-label mt-3">
                                    <input type="date" name="dateToApply" id="dateToApply" class="form-control"
                                        style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <span><strong>DATE TO APPLY<span class="text-danger">*</span></strong></span>
                                </label>
                                <select name="" id="" class="form-control">
                                    <option value="wholeDay">WHOLE DAY</option>
                                    <option value="halfDay">HALF DAY</option>
                                </select>
                                <hr>
                                <div class="text-center">
                                    <button class="btn btn-primary px-5 shadow"><i class="las la-calendar-plus"></i> Add
                                        Days</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
                        <h6 class="text-sm mb-3 text-center">FILTER OPTIONS</h6>
                        <label for="yrApply" class="form-group has-float-label">
                            <input class="form-control" type="date"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>YEAR APPLY</strong></span>
                        </label>
                        <label for="operation" class="form-group has-float-label">
                            <select name="operation" id="operation" class="form-control"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <option value="" readonly selected>Cancel</option>
                            </select>
                            <span><strong>OPERATION</strong></span>
                        </label>
                        <label for="cntrlNo" class="form-group has-float-label">
                            <input type="text" name="cntrlNo" id="cntrlNo" class="form-control"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>CONTROL NO.</strong></span>
                        </label>
                        <div class="text-center">
                            <button class="btn btn-outline-dark px-5" type="button">View Result</button>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <table class="table table-hover">
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
                                    <td class="text-center">
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
</div>


@push('page-scripts')
<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
@endpush
@endsection
