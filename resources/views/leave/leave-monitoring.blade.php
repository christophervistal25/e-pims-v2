@extends('layouts.app-vue')
@section('title', 'Leave Monitoring Index')
@prepend('page-css')
<script src="{{ asset('/js/app.js') }}" defer></script>
<script src="https://use.fontawesome.com/78c056906b.js"></script>
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
                <div class="card-title text-center text-sm">Search Employee</div>
                <div class="row">
                    <div class="col-lg">
                        <label for="empName" class="form-group has-float-label">
                            <input class="form-control" type="text" placeholder="Search Employee" id="empName"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span>Name of Employee</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="card shadow">
            <div class="card-body">
                <h3 class="card-title">Leave Monitoring Index</h3>
                <hr>
                <h6 class="text-sm">Leave Index Information</h6>
                <div class="row">
                    <div class="col-lg-3">
                        <label for="transID" class="form-group has-float-label mt-3">
                            <input type="text" id="transID" class="form-control"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span>Transaction ID</span>
                        </label>
                        <label for="period" class="form-group has-float-label">
                            <input type="text" class="form-control"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span>Period</span>
                        </label>
                        <label for="particular" class="form-group has-float-label">
                            <input type="text" id="particular" class="form-control"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span>Particular</span>
                        </label>
                        <label for="leaveApp" class="form-group has-float-label">
                            <input type="text" id="leaveApp" style="outline:none; box-shadow: 0px 0px 0px transparent;"
                                class="form-control">
                            <span>Leave Application ID</span>
                        </label>
                        <label for="ordering" class="form-group has-float-label">
                            <input type="text" style="outline: none; box-shadow: 0px 0px 0px transparent;"
                                class="form-control" disabled>
                            <span>Ordering</span>
                        </label>
                    </div>
                    <div class="col-lg-9">
                        <div class="card mt-3">
                            <div class="card-body">
                                <h3 class="card-title">Balances</h3>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="vlEarned" class="form-group has-float-label">
                                            <input type="text" class="form-control" id="vlEarned"
                                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                            <span>VL Earned</span>
                                        </label>
                                        <label for="vlEnjoyedWP" class="form-group has-float-label">
                                            <input type="text" class="form-control"
                                                style="outline: none; box-shadow: 0px 0px 0px transparent;"
                                                id="vlEnjoyedWP">
                                            <span>VL Enjoyed (WP)</span>
                                        </label>
                                        <label for="vlEnjoyedWOP" class="form-group has-float-label">
                                            <input type="text" class="form-control"
                                                style="outline: none; box-shadow: 0px 0px 0px transparent;"
                                                id="vlEnjoyedWOP">
                                            <span>VL Enjoyed (WOP)</span>
                                        </label>
                                        <label for="vlBal" class="form-group has-float-label">
                                            <input type="text" class="form-control"
                                                style="outline: none; box-shadow: 0px 0px 0px transparent;" id="vlBal">
                                            <span>VL Balance</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="slEarned" class="form-group has-float-label">
                                            <input type="text" class="form-control" id="slEarned"
                                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                            <span>SL Earned</span>
                                        </label>
                                        <label for="slEnjoyedWP" class="form-group has-float-label">
                                            <input type="text" id="slEnjoyedWP" class="form-control"
                                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                            <span>SL Enjoyed (WP)</span>
                                        </label>
                                        <label for="slEnjoyedWOP" class="form-group has-float-label">
                                            <input type="text" id="slEnjoyed"
                                                style="outline: none; box-shadow: 0px 0px 0px transparent;"
                                                class="form-control">
                                            <span>SL Enjoyed (WOP)</span>
                                        </label>
                                        <label for="slBal" class="form-group has-float-label">
                                            <input type="text" id="slBal" class="form-control"
                                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                            <span>SL Balance</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col lg-12">
                        <button class="btn btn-outline-primary mr-3" type="button"><i class="fas fa-plus"></i> New
                            Record</button>
                        <button class="btn btn-outline-secondary mr-3" type="buttin"><i class="fas fa-ban"></i>
                            Cancel Record</button>
                        <button class="btn btn-outline-success mr-3" type="button"><i class="fas fa-save"></i> Save
                            Changes</button>
                        </div>
                            <div class="col-lg-3">
                            <label for="leaveOpt" class="form-group has-float-label mr-3">
                            <select name="" id="" class="custom-select" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <option value="">-----</option>
                            </select>
                            <span>Leave Index Options</span>
                            </label>
                            </div>
                        
                        </div>
                        
                            
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Particular</th>
                            <th class="text-center">Period</th>
                            <th class="text-center">VL Earned</th>
                            <th class="text-center">VL WP</th>
                            <th class="text-center">VL WOP</th>
                            <th class="text-center">VL Bal</th>
                            <th class="text-center">SL Earned</th>
                            <th class="text-center">Order</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="text-center">1</th>
                            <th class="text-center">1</th>
                            <th class="text-center">1</th>
                            <th class="text-center">1</th>
                            <th class="text-center">1</th>
                            <th class="text-center">1</th>
                            <th class="text-center">1</th>
                            <th class="text-center">1</th>
                            <th>
                                <button class="btn btn-sm rounded-circle shadow btn-success"><i
                                        class="fa fa-edit"></i></button>
                                &nbsp;
                                <button class="btn btn-danger btn-sm rounded-circle shadow"><i
                                        class="fa fa-trash"></i></button></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@push('page-scripts')
<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
@endpush
@endsection
