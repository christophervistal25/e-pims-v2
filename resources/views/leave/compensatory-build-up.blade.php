@extends('layouts.app-vue')
@section('title', 'Compensatory Build Up')
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
                <h3 class="card-title text-center text-sm">Search Option</h3>
                <div class="checkbox">
                    <label class="checkbox-inline no_indent text-sm">
                        <input type="checkbox" name="individual" id="individual"
                            style="transform: scale(1.2)">Individual
                    </label>
                </div>
                <div class="checkbox">
                    <label class="checkbox-inline no_indent text-sm">
                        <input type="checkbox" name="officename" id="officename" style="transform: scale(1.2)">Office /
                        Department
                    </label>
                </div>
                <hr class="mt-1">
                <label for="officelist" class="form-group has-float-label mb-0">
                    <select name="officelist" type="text" id="officelist" class="form-control form-control-sm"
                        style="outline: none; box-shadow: 0px 0px 0px transparent;">
                        <option readonly selected>Select Office Name</option>
                        <option>Office Name I</option>
                    </select>
                    <span>Office Name</span>
                </label>
                <hr>
                <label for="filteropt" class="form-group has-float-label mb-0">
                    <select name="filteropt" type="text" id="filteropt" class="form-control form-control-sm"
                        style="outline: none; box-shadow: 0px 0px 0px transparent;">
                        <option readonly selected>Active</option>
                        <option>Active</option>
                    </select>
                    <span>Filter Option</span>
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
            <div class="alert alert-secondary text-center font-weight-bold">COMPENSATORY DETAIL</div>
            <hr>
            <div class="row">
                <div class="col-lg-9">
                <h3 class="text-sm text-center">EMPLOYEE INFORMATION</h3>
                <label for="empName" class="has-float-label form-group">
                    <input type="text" name="empName" id="empName" class="form-control" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                    <span class="font-weight-bold">NAME<span class="text-danger">*</span></span>
                </label>
                <label for="office" class="form-group has-float-label">
                    <input type="text" name="office" id="office" class="form-control" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                    <span class="font-weight-bold">OFFICE<span class="text-danger">*</span></span>
                </label>
                <label for="position" class="form-group has-float-label">
                    <input type="text" name="position" id="position" class="form-control" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                    <span class="font-weight-bold">POSITION<span class="text-danger">*</span></span>
                </label>
                <div class="row">
                    <div class="col-lg-6">
                    <label for="type" class="form-group has-float-label">
                        <select name="type" id="type" class="form-control" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                        <option value="OTwithinYear">OVERTIME WITHIN A YEAR</option>
                    </select>
                    <span class="font-weight-bold">TYPE<span class="text-danger">*</span></span>
                    </label>
                </div>
                <div class="col-lg-3">
                    <label for="debit" class="form-group has-float-label">
                        <input type="number" name="debit" id="debit" class="form-control" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                        <span class="font-weight-bold">DEBIT</span>
                    </label>
                </div>
                <div class="col-lg-3">
                    <label for="unit" class="form-group has-float-label">
                        <select name="unit" id="unit" class="form-control" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                        <option value="day">DAY</option>
                    </select>
                    <span class="font-weight-bold">UNIT<span class="text-danger">*</span></span>
                    </label>
                </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="remarks" class="form-group has-float-label">
                            <textarea name="remarks" id="remarks" rows="2" class="form-control" style="outline: none; box-shadow: 0px 0px 0px transparent;"></textarea>
                            <span class="font-weight-bold">REMARKS</span>
                        </label>
                    </div>
                <div class="col-lg-3">
                    <label for="date" class="form-group has-float-label">
                        <input type="date" name="date" id="date" class="form-control" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                        <span class="font-weight-bold">DATE ADDED<span class="text-danger">*</span></span>
                    </label>
                </div>
                <div class="col-lg-3">
                    <label for="forfeited" class="form-group has-float-label">
                        <select name="forfeited" id="forfeited" class="form-control" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <option value="yes">YES</option>
                            <option value="no">NO</option>
                        </select>
                        <span class="font-weight-bold">FORFEITED?<span class="text-danger">*</span></span>
                    </label>
                </div>
                </div>
                <button class="btn btn-success"><i class="fa fa-save"></i> Save Changes</button>
                <button class="btn btn-primary"><i class="las la-user-plus"></i> New Record</button>
                
            </div>

            <div class="col-lg-3">
                <div class="bg-danger w-75 h-50 mx-auto shadow mt-4"></div>
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
