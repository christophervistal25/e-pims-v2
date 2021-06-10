@extends('layouts.app-vue')
@section('title', 'Leave Starting Balance')
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
                <h3 class="card-title">Starting Leave Balance Detail</h3>
                <hr>
                <div class="row">
                    <div class="col-lg-9">
                        <label for="name" class="form-group has-float-label">
                            <input type="text" name="name" id="name" class="form-control" placeholder=""
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>NAME</strong></span>
                        </label>

                        <label for="office" class="form-group has-float-label">
                            <input type="text" name="office" id="office" class="form-control" placeholder=""
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>OFFICE</strong></span>
                        </label>

                        <label for="position" class="form-group has-float-label">
                            <input type="text" name="position" id="position" class="form-control" placeholder=""
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>POSITION</strong></span>
                        </label>
                    </div>
                    <div class="col-lg-3">
                        <div class='bg-danger w-75 h-100 mx-auto shadow '></div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-3">
                        <label for="dateStart" class="form-group has-float-label">
                            <input type="date" name="dateStart" id="dateStart" class="form-control" placeholder=""
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>DATE START</strong></span>
                        </label>
                    </div>
                    <div class="col-lg-3">
                        <label for="vleave" class="form-group has-float-label">
                            <input type="text" name="vleave" id="vleave" class="form-control" placeholder=""
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>VACATION LEAVE</strong></span>
                        </label>
                    </div>
                    <div class="col-lg-3">
                        <label for="sleave" class="form-group has-float-label">
                            <input type="text" name="sleave" id="sleave" class="form-control" placeholder=""
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>SICK LEAVE</strong></span>
                        </label>
                    </div>
                </div>



                <div class="float-left">
                    <button title="New Record" type="button"
                        class="text-white rounded-circle shadow btn btn-primary"><i
                            class="las la-user-plus"></i></button>
                    <button title="Save Changes" type="button"
                        class="text-white rounded-circle shadow btn btn-success"><i
                            class="lar la-save"></i></button>
                    <button title="Cancel Record" type="button"
                        class="text-white rounded-circle shadow btn btn-danger"><i
                            class="las la-ban"></i></button>

                </div>
            </div>

        </div>
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Date Started</th>
                            <th>Name of Employee</th>
                            <th>Vacation Leave</th>
                            <th>Sick Leave</th>
                            <th>Actions</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>
                                <button class=' btn btn-sm rounded-circle shadow btn-success'>
                                    <i class='fa fa-edit'></i>
                                </button>
                                &nbsp;
                                <button class=' btn btn-sm rounded-circle shadow btn-danger'>
                                    <i class='fa fa-trash'></i>
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- <div class="row">
        <div class="col-lg-3 d-none">
            <leave-search></leave-search>
        </div>
        <div class="col-lg-12">
            <leave-content></leave-content>
        </div>
    </div> --}}
@push('page-scripts')
<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
@endpush
@endsection
