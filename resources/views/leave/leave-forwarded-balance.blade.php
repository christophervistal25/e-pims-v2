@extends('layouts.app')
@section('title', 'Leave Forwarded Balance')
@prepend('page-css')
<link rel="stylesheet" href="/assets/css/custom.css" />
<link rel="stylesheet" href="/assets/css/bootstrap-float-label.min.css" />
<link rel="stylesheet" href="/assets/css/line-awesome.min.css">
<link rel="stylesheet" href="/assets/css/style.css">
<link rel="stylesheet" href="/assets/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/assets/css/responsive.bootstrap4.min.css">
<style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

</style>
@endprepend
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div id="forwardedBalanceTable">
            <div class="card-body">
                {{-- LIST OR DATA TABLES --}}
                <div class="page-header">
                    <div class="row align-items-right mb-2 ">
                        <div class="col-auto float-right ml-auto">
                            <button id="addBtn" type="button" class="btn btn-primary float-right shadow"><i
                                    class="la la-plus"></i>&nbsp
                                Add Forwarded Balance
                            </button>
                        </div>
                    </div>
                    <hr>
                    <div class="">
                        <table class="responsive display nowrap table table-condensed" id="forwarded-balance-table"
                            style="width:100%;">
                            <thead>
                                <tr>
                                    <th class="font-weight-bold align-middle text-center " width="10%">Employee ID</th>
                                    <th class="font-weight-bold align-middle text-left " width="25%">Employee Name
                                    </th>
                                    <th class="font-weight-bold align-middle text-center " width="15%">As Of</th>
                                    <th class="font-weight-bold align-middle text-center " width="5%">VL Balance</th>
                                    <th class="font-weight-bold align-middle text-center " width="5%">SL Balance</th>
                                    <th class="font-weight-bold align-middle text-center" width="10%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card shadow d-none" id="forwardedBalanceCard">
            <div class="card-body">
                <form action="" method="POST" id="forwardedBalance">
                    @csrf
                    <div class="alert alert-secondary text-center font-weight-bold">LEAVE FORWARDED BALANCE</div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <div class="spinner-border spinner-border-sm text-light d-none" id="save-spinner"
                                        role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <img class="mb-5 rounded-circle img-thumbnail" id="empPhoto"
                                        src="/storage/employee_images/sdslogo.jpg" width="50%" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="Employee_id" class="form-group has-float-label">
                                        <select class="form-control selectpicker Employee_id" data-live-search="true"
                                            name="Employee_id" id="Employee_id" data-size="6"
                                            style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                            <option value="">Search name here</option>
                                            @foreach($employees as $employee)
                                            <option data-office="{{ $employee->office_charging->Description }}"
                                                data-position="{{ $employee->position->Description }}" data-photo=""
                                                data-employeeId="{{ $employee->Employee_id }}"
                                                value="{{ $employee->Employee_id }}">{{ $employee->fullname }} </option>
                                            @endforeach
                                        </select>
                                        <span><strong>EMPLOYEE NAME</strong></span>
                                        <div id="Employee_id-error-message" class="text-danger text-sm"></div>
                                    </label>

                                    <label for="office" class="form-group has-float-label">
                                        <input type="text" name="office" id="office" class="form-control"
                                            style="outline: none; box-shadow: 0px 0px 0px transparent;" readonly>
                                        <span class="font-weight-bold">OFFICE</span>
                                    </label>
                                    <label for="position" class="form-group has-float-label">
                                        <input type="text" name="position" id="position" class="form-control"
                                            style="outline: none; box-shadow: 0px 0px 0px transparent;" readonly>
                                        <span class="font-weight-bold">POSITION</span>
                                    </label>
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" id="employeeId" name="employeeID">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="text-sm text-center">Special Type of Leaves</h6><hr>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label for="vawc_balance" class="form-group has-float-label">
                                                        <input type="number" class="form-control" id="vawc_balance"
                                                            name="vawc_balance" style="font-weight:bold; text-align: right;" value="10.00">
                                                        <span><strong>VAWC BALANCE</strong></span>
                                                    </label>
                                                    <label for="adopt_balance" class="form-group has-float-label">
                                                        <input type="number" class="form-control" id="adopt_balance"
                                                            name="adopt_balance" style="font-weight:bold; text-align: right;" value="60.00">
                                                        <span><strong>ADOPT BALANCE</strong></span>
                                                    </label>
                                                    <label for="mandatory_balance" class="form-group has-float-label">
                                                        <input type="number" class="form-control" id="mandatory_balance"
                                                            name="mandatory_balance" style="font-weight:bold; text-align: right;" value="5.00">
                                                        <span><strong>MANDATORY BALANCE</strong></span>
                                                    </label>
                                                    <label for="maternity_balance" class="form-group has-float-label">
                                                        <input type="number" class="form-control" id="maternity_balance"
                                                            name="maternity_balance" style="font-weight:bold; text-align: right;" value="105.00">
                                                        <span><strong>MATERNITY BALANCE</strong></span>
                                                    </label>
                                                    <label for="paternity_balance" class="form-group has-float-label">
                                                        <input type="number" class="form-control" id="paternity_balance"
                                                            name="paternity_balance" style="font-weight:bold; text-align: right;" value="7.00">
                                                        <span><strong>PATERNITY BALANCE</strong></span>
                                                    </label>
                                                    <label for="soloparent_balance" class="form-group has-float-label">
                                                        <input type="number" class="form-control" id="soloparent_balance"
                                                            name="soloparent_balance" style="font-weight:bold; text-align: right;" value="7.00">
                                                        <span><strong>SOLO PARENT BALANCE</strong></span>
                                                    </label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="emergency_balance" class="form-group has-float-label">
                                                        <input type="number" class="form-control" id="emergency_balance"
                                                            name="emergency_balance" style="font-weight:bold; text-align: right;" value="5.00">
                                                        <span><strong>EMERGENCY BALANCE</strong></span>
                                                    </label>
                                                    <label for="slb_balance" class="form-group has-float-label">
                                                        <input type="number" class="form-control" id="slb_balance"
                                                            name="slb_balance" style="font-weight:bold; text-align: right;" value="60.00">
                                                        <span><strong>SLB BALANCE</strong></span>
                                                    </label>
                                                    <label for="study_balance" class="form-group has-float-label">
                                                        <input type="number" class="form-control" id="study_balance"
                                                            name="study_balance" style="font-weight:bold; text-align: right;" value="180.00">
                                                        <span><strong>STUDY BALANCE</strong></span>
                                                    </label>
                                                    <label for="spl_balance" class="form-group has-float-label">
                                                        <input type="number" class="form-control" id="spl_balance"
                                                            name="spl_balance" style="font-weight:bold; text-align: right;" value="5.00">
                                                        <span><strong>SPL BALANCE</strong></span>
                                                    </label>
                                                    <label for="rehab_balance" class="form-group has-float-label">
                                                        <input type="number" class="form-control" id="rehab_balance"
                                                            name="rehab_balance" style="font-weight:bold; text-align: right;" value="180.00">
                                                        <span><strong>REHABILITATION BALANCE</strong></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="text-sm text-center">Main Type of Leaves</h6><hr>
                                            <label for="vl_balance" class="form-group has-float-label">
                                                <input type="number" class="form-control vl_balance" id="vl_balance"
                                                    name="vl_balance"
                                                    style="outline: none; box-shadow: 0px 0px 0px transparent; height:50px; font-weight:bold; font-size:25px; text-align: right;">
                                                <span><strong>VL BALANCE</strong></span>
                                                <div id="vl_balance-error-message" class="text-danger text-sm"></div>
                                            </label>
                                            <label for="sl_balance" class="form-group has-float-label">
                                                <input type="number" class="form-control sl_balance" id="sl_balance"
                                                    name="sl_balance"
                                                    style="outline: none; box-shadow: 0px 0px 0px transparent; height:50px; font-weight:bold; font-size:25px; text-align: right;">
                                                <span><strong>SL BALANCE</strong></span>
                                                <div id="sl_balance-error-message" class="text-danger text-sm"></div>
                                            </label>
                                        </div>
                                    </div>
                                    <label for="date_forwarded" class="form-group has-float-label">
                                        <input type="date" name="date_forwarded" id="date_forwarded" class="form-control date_forwarded"
                                            style="outline: none; box-shadow: 0px 0px 0px transparent; height:50px; font-weight:bold; font-size:25px;">
                                        <span class="font-weight-bold">As of</span>
                                        <div id="date_forwarded-error-message" class="text-danger text-sm"></div>
                                    </label>
                                    <button type="submit"
                                        class="text-white shadow btn btn-lg btn-success w-100 ml-1 mt-2" id="btnSave"><i
                                            class="la la-save"></i> Add Record
                                    </button>
                                    <button type="submit"
                                        class="text-white shadow btn btn-lg btn-success btn-block ml-1 mt-2 d-none"
                                        id="btnUpdate"><i class="la la-save"></i>
                                        Save Changes
                                    </button>
                                    <button type="button" class="text-white shadow btn btn-lg btn-danger btn-block ml-1 mt-2 d-none"
                                        id="update_btnDelete"><i class="la la-trash"></i>
                                        Delete Record
                                    </button>
                                    <button type="button"
                                        class="text-white shadow btn btn-lg btn-primary w-100 ml-1 mt-2" id="btnBack"><i
                                            class="la la-list"></i>
                                        Go back to List
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('page-scripts')
<script src="/assets/js/jquery.dataTables.min.js"></script>
<script src="/assets/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="/assets/js/sweetalert.min.js"></script>
<script>
    $(document).ready(function () {
        const ROUTE = "{{ route('leave-forwarded-balance.list') }}";
        let table = $('#forwarded-balance-table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ordering: false,
            paging: true,
            pagingType: "full_numbers",
            info: true,
            searching: true,
            language: {
                processing: '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
            },
            ajax: ROUTE,
            columns: [{
                    data: "employee_id",
                    name: "employee_id",
                    defaultContent: ''
                },
                {
                    data: "fullname",
                    name: "fullname",
                    defaultContent: ''
                },
                {   
                    data: "date_forwarded",
                    name: "date_forwarded"
                },
                {
                    data: "vl_balance",
                    name: "vl_balance"
                },
                {
                    data: "sl_balance",
                    name: "sl_balance"
                },
                {
                    data: "action",
                    name: "action",
                    searchable: false,
                    sortable: false
                }
            ],
            columnDefs: [{
                    responsivePriority: 1,
                    targets: [0, 1]
                },
                {
                    responsivePriority: 2,
                    targets: 1
                },
                {
                    className: "text-center",
                    targets: [0, 2, 3, 4, 5],
                },
            ]
        });
    });

</script>
<script src="/assets/js/leaveforwardedBalance.js"></script>
@endpush
@endsection
