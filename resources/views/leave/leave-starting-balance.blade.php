@extends('layouts.app-vue')
@section('title', 'Leave Starting Balance')
@prepend('page-css')
<script src="{{ asset('/js/app.js') }}" defer></script>
<link rel="stylesheet"
    href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
<link rel="stylesheet"
    href="{{ asset('/css/bootstrap-float-label.min.css') }}" />
@endprepend
@section('content')
<div class="row">

    {{-- Search Option Form --}}
    {{-- <div class="col-lg-3">
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
                    <select name="officelist" type="text" id="officelist" class="form-control form-control-md"
                        style="outline: none; box-shadow: 0px 0px 0px transparent;">
                        <option readonly selected>Select Office Name</option>
                        <option>Office Name I</option>
                    </select>
                    <span><strong>Office Name</strong></span>
                </label>
                <hr>
                <label for="filteropt" class="form-group has-float-label mb-0">
                    <select name="filteropt" type="text" id="filteropt" class="form-control form-control-md"
                        style="outline: none; box-shadow: 0px 0px 0px transparent;">
                        <option readonly selected>Active</option>
                        <option>Active</option>
                    </select>
                    <span><strong>Filter Option</strong></span>
                </label>
            </div>
        </div> --}}

        {{-- Search Employee Form --}}
        {{-- <div class="card">
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
    </div> --}}

    {{-- Starting Leave Balance Form --}}
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-body">
                <div class="alert alert-secondary text-center" role="alert"><strong
                        style="text-transform: uppercase">Starting Leave Balance Detail</strong>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="">
                            <label for="name" class="form-group has-float-label">
                                <select class="form-control selectpicker" value="" data-live-search="true"
                                name="employeeName" id="employeeName" data-size="6" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <option>Search name here</option>
                                <option data-plantilla="" value=""></option>
                                </select>
                                <span><strong>EMPLOYEE NAME<span class="text-danger">*</span></strong></span>
                            </label>
                        </div>

                        <div class="">
                            <label for="name" class="form-group has-float-label">
                                <select class="form-control selectpicker" value="" data-live-search="true"
                                name="employeeName" id="officeName" data-size="6" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <option>Search office here</option>
                                <option data-plantilla="" value=""></option>
                                </select>
                                <span><strong>OFFICE<span class="text-danger">*</span></strong></span>
                            </label>
                        </div>

                        <label for="position" class="form-group has-float-label">
                            <input type="text" name="position" id="position" class="form-control" placeholder=""
                                style="outline: none; box-shadow: 0px 0px 0px transparent;" readonly>
                            <span><strong>POSITION<span class="text-danger">*</span></strong></span>
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
                                style="outline: none; box-shadow: 0px 0px 0px transparent;" readonly>
                            <span><strong>DATE START<span class="text-danger">*</span></strong></span>
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


                 {{-- BUTTONS --}}
                <div class="float-left mt-3 col-md g-2">
                    <button type="button" class="text-white shadow btn btn-success"><i class="lar la-save"></i> Save
                        Record</button>
                    <button type="button" class="text-white shadow btn btn-warning"><i
                            class="las la-ban"></i> Cancel Record</button>
                    <button type="button" class="text-white px-5 shadow btn btn-dark"><i class="las la-print"></i>
                                Print</button>
                </div>
            </div>

        </div>

        {{-- YAJRA DATA TABLES --}}
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <table class="table table-hover">
                        <tr>
                            <th class="text-center">Date Started</th>
                            <th class="text-center">Name of Employee</th>
                            <th class="text-center">Vacation Leave</th>
                            <th class="text-center">Sick Leave</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-center">1</td>
                            <td class="text-center">1</td>
                            <td class="text-center">1</td>
                            <td class="text-center">
                                <button class=' btn btn-sm rounded-circle shadow btn-info'>
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

<script>
    alert("Hello");
</script>
@endpush
@endsection
