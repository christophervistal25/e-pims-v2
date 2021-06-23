@extends('layouts.app-vue')
@section('title', 'Leave Forwarded Balance')
@prepend('page-css')
<script src="{{ asset('/js/app.js') }}" defer></script>
<link rel="stylesheet"
    href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />
<link rel="stylesheet"
    href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
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
                <div class="alert alert-secondary text-center font-weight-bold">LEAVE FORWARDED BALANCE</div>
                <hr>
                <div class="row">
                    <div class="col-lg-5">
                        <h6 class="text-sm text-center">EMPLOYEE INFORMATION</h6>
                        <label for="empName" class="form-group has-float-label">
                            <input type="text" name="empName" id="empName" class="form-control"
                                style="outline: nne; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>EMPLOYEE NAME</strong></span>
                        </label>
                        <label for="office" class="form-group has-float-label">
                            <input type="text" name="office" id="office" class="form-control"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span class="font-weight-bold">OFFICE</span>
                        </label>
                        <label for="position" class="form-group has-float-label">
                            <input type="text" name="position" id="position" class="form-control"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span class="font-weight-bold">POSITION</span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <h6 class="text-sm text-center">LEAVE FORWARDED BALANCE DETAIL</h6>
                        <div class="card shadow">
                            <div class="card-body">
                                <label for="vacationLeave" class="form-group has-float-label">
                                    <input type="text" name="vacationLeave" id="vacationLeave" class="form-control"
                                        style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <span class="font-weight-bold">VACATION LEAVE</span>
                                </label>
                                <label for="sickLeave" class="form-group has-float-label">
                                    <input type="text" name="sickLeave" id="sickLeave"
                                        style="outline: none; box-shadow: 0px 0px 0px transparent;"
                                        class="form-control">
                                    <span class="font-weight-bold">SICK LEAVE</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <h6 class="text-sm">&nbsp;</h6>
                        <div class="bg-danger shadow h-75 w-75 mx-auto"></div>
                    </div>
                </div>
                <div class="float-right mr-5">
                    <button class="btn btn-primary rounded-circle shadow" title="New Record"><i
                            class="las la-user-plus"></i></button>
                    <button class="btn btn-success rounded-circle shadow" title="Save"><i
                            class="lar la-save"></i></button>
                    <button class="btn btn-danger rounded-circle shadow" title="Cancel Record"><i
                            class="las la-ban"></i></button>
                </div>

            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">EMPLOYEE NAME</th>
                            <th class="text-center">VACATION LEAVE</th>
                            <th class="text-center">SICK LEAVE</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>
</div>





@push('page-scripts')
<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
@endpush
@endsection
