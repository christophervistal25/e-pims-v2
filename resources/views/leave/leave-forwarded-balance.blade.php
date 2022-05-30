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
                                    <th class="font-weight-bold align-middle text-center " width="5%">VL Earned</th>
                                    <th class="font-weight-bold align-middle text-center " width="5%">VL Used</th>
                                    <th class="font-weight-bold align-middle text-center " width="5%">VL Balance</th>
                                    <th class="font-weight-bold align-middle text-center " width="5%">SL Earned</th>
                                    <th class="font-weight-bold align-middle text-center " width="5%">SL Used</th>
                                    <th class="font-weight-bold align-middle text-center " width="5%">SL Balance</th>
                                    <th class="font-weight-bold align-middle text-center " width="10%">Balance Leave
                                        Credits
                                    </th>
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
                        <div class="col-lg-4">
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
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h6 class="text-sm text-center">VACATION LEAVE</h6>
                                            <label for="vl_earned" class="form-group has-float-label">
                                                <input type="number" class="form-control vl_earned" id="vl_earned"
                                                    name="vl_earned"
                                                    style="outline: none; box-shadow: 0px 0px 0px transparent; height:60px; font-weight:bold; font-size:30px; text-align: right;">
                                                <span><strong>VL EARNED</strong></span>
                                                <div id="vl_earned-error-message" class="text-danger text-sm"></div>
                                            </label>
                                            <label for="vl_used" class="form-group has-float-label">
                                                <input type="number" value="0" class="form-control vl_used"
                                                    id="vl_used" name="vl_used"
                                                    style="outline: none; box-shadow: 0px 0px 0px transparent; height:60px; font-weight:bold; font-size:30px; text-align: right;">
                                                <span><strong>VL ENJOYED</strong></span>
                                                <div id="vl_used-error-message" class="text-danger text-sm"></div>
                                            </label>
                                            <label for="vl_balance" class="form-group has-float-label">
                                                <input type="number" class="form-control" id="vl_balance"
                                                    name="vl_balance" readonly
                                                    style="outline: none; box-shadow: 0px 0px 0px transparent; height:60px; font-weight:bold; font-size:30px; text-align: right;">
                                                <span><strong>VL BALANCE</strong></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-6">
                                            <h6 class="text-sm text-center">SICK LEAVE</h6>
                                            <label for="sl_earned" class="form-group has-float-label">
                                                <input type="number" id="sl_earned" class="form-control sl_earned"
                                                    name="sl_earned"
                                                    style="outline: none; box-shadow: 0px 0px 0px transparent; height:60px; font-weight:bold; font-size:30px; text-align: right;">
                                                <span><strong>SL EARNED</strong></span>
                                                <div id="sl_earned-error-message" class="text-danger text-sm"></div>
                                            </label>
                                            <label for="sl_used" class="form-group has-float-label">
                                                <input type="number" class="form-control sl_used" id="sl_used"
                                                    name="sl_used" value="0"
                                                    style="outline: none; box-shadow: 0px 0px 0px transparent; height:60px; font-weight:bold; font-size:30px; text-align: right;">
                                                <span><strong>SL ENJOYED</strong></span>
                                                <div id="sl_used-error-message" class="text-danger text-sm"></div>
                                            </label>
                                            <label for="sl_balance" class="form-group has-float-label">
                                                <input type="number" class="form-control" id="sl_balance"
                                                    name="sl_balance" readonly
                                                    style="outline: none; box-shadow: 0px 0px 0px transparent; height:60px; font-weight:bold; font-size:30px; text-align: right;">
                                                <span><strong>SL BALANCE</strong></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="date_forwarded" class="form-group has-float-label">
                                        <input type="date" name="date_forwarded" id="date_forwarded" class="form-control date_forwarded"
                                            style="outline: none; box-shadow: 0px 0px 0px transparent; height:70px; font-weight:bold; font-size:30px;">
                                        <span class="font-weight-bold">As of</span>
                                        <div id="date_forwarded-error-message" class="text-danger text-sm"></div>
                                    </label>
                                </div>
                                <div class="col-lg-6">
                                    <label for="total_lb" class="form-group has-float-label">
                                        <input type="number" name="total_lb" id="total_lb" class="form-control"
                                            style="outline: none; box-shadow: 0px 0px 0px transparent; height:70px; font-weight:bold; font-size:40px; text-align: right;"
                                            disabled>
                                        <span><strong>TOTAL LEAVE BALANCE</strong></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <button type="submit"
                                        class="text-white shadow btn btn-lg btn-success w-100 ml-1 mt-2" id="btnSave"><i
                                            class="la la-save"></i> Add
                                        Record
                                    </button>
                                </div>
                                <div class="col-lg-6">
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
        <div class="card shadow d-none" id="editForwardedBalanceCard">
            <div class="card-body">
                <form action="" method="POST" id="editForwardedBalance">
                    @csrf
                    <div class="alert alert-secondary text-center font-weight-bold">LEAVE FORWARDED BALANCE</div>
                    <div class="form-group">
                        <input class="form-control" type="hidden" id="leaveID" name="leaveID" value="">
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <div class="spinner-border spinner-border-sm text-light d-none" id="save-spinner"
                                        role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <img class="mb-3 rounded-circle img-thumbnail" id="update_empPhoto"
                                        src="/storage/employee_images/no_image.png" width="45%" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="update_employeeName" class="form-group has-float-label">
                                        <input type="text" name="update_employeeName" id="update_employeeName"
                                            class="form-control"
                                            style="outline: none; box-shadow: 0px 0px 0px transparent;" readonly>
                                        <span class="font-weight-bold">EMPLOYEE NAME</span>
                                    </label>
                                    <label for="update_office" class="form-group has-float-label">
                                        <input type="text" name="update_office" id="update_office" class="form-control"
                                            style="outline: none; box-shadow: 0px 0px 0px transparent;" readonly>
                                        <span class="font-weight-bold">OFFICE</span>
                                    </label>
                                    <label for="update_position" class="form-group has-float-label">
                                        <input type="text" name="update_position" id="update_position"
                                            class="form-control"
                                            style="outline: none; box-shadow: 0px 0px 0px transparent;" readonly>
                                        <span class="font-weight-bold">POSITION</span>
                                    </label>
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" id="update_Employee_id"
                                            name="update_Employee_id">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card shadow">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h6 class="text-sm text-center">VACATION LEAVE</h6>
                                            <label for="update_vl_earned" class="form-group has-float-label">
                                                <input type="number" class="form-control update_vl_earned"
                                                    id="update_vl_earned" name="update_vl_earned" step="any"
                                                    style="outline: none; box-shadow: 0px 0px 0px transparent; height:60px; font-weight:bold; font-size:30px; text-align: right;">
                                                <span><strong>VL EARNED</strong></span>
                                                <div id="update_vl_earned-error-message" class="text-danger text-sm">
                                                </div>
                                            </label>
                                            <label for="update_vl_used" class="form-group has-float-label">
                                                <input type="number" class="form-control update_vl_used"
                                                    id="update_vl_used" name="update_vl_used" step="any"
                                                    style="outline: none; box-shadow: 0px 0px 0px transparent; height:60px; font-weight:bold; font-size:30px; text-align: right;">
                                                <span><strong>VL ENJOYED</strong></span>
                                                <div id="update_vl_used-error-message" class="text-danger text-sm">
                                                </div>
                                            </label>
                                            <label for="update_vl_balance" class="form-group has-float-label">
                                                <input type="number" class="form-control" id="update_vl_balance"
                                                    name="update_vl_balance" readonly
                                                    style="outline: none; box-shadow: 0px 0px 0px transparent; height:60px; font-weight:bold; font-size:30px; text-align: right;">
                                                <span><strong>VL BALANCE</strong></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-6">
                                            <h6 class="text-sm text-center">SICK LEAVE</h6>
                                            <label for="update_sl_earned" class="form-group has-float-label">
                                                <input type="number" id="update_sl_earned"
                                                    class="form-control update_sl_earned" name="update_sl_earned"
                                                    step="any"
                                                    style="outline: none; box-shadow: 0px 0px 0px transparent; height:60px; font-weight:bold; font-size:30px; text-align: right;">
                                                <span><strong>SL EARNED</strong></span>
                                                <div id="update_sl_earned-error-message" class="text-danger text-sm">
                                                </div>
                                            </label>
                                            <label for="update_sl_used" class="form-group has-float-label">
                                                <input type="number" class="form-control update_sl_used"
                                                    id="update_sl_used" name="update_sl_used" step="any"
                                                    style="outline: none; box-shadow: 0px 0px 0px transparent; height:60px; font-weight:bold; font-size:30px; text-align: right;">
                                                <span><strong>SL ENJOYED</strong></span>
                                                <div id="update_sl_used-error-message" class="text-danger text-sm">
                                                </div>
                                            </label>
                                            <label for="update_sl_balance" class="form-group has-float-label">
                                                <input type="number" class="form-control" id="update_sl_balance"
                                                    name="update_sl_balance" readonly
                                                    style="outline: none; box-shadow: 0px 0px 0px transparent; height:60px; font-weight:bold; font-size:30px; text-align: right;">
                                                <span><strong>SL BALANCE</strong></span>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="update_date_forwarded" class="form-group has-float-label">
                                        <input type="date" name="update_date_forwarded" id="update_date_forwarded"
                                            class="form-control update_date_forwarded"
                                            style="outline: none; box-shadow: 0px 0px 0px transparent; height:70px; font-weight:bold; font-size:30px;">
                                        <span class="font-weight-bold">As of</span>
                                        <div id="update_date_forwarded-error-message" class="text-danger text-sm"></div>
                                    </label>
                                </div>
                                <div class="col-lg-6">
                                    <label for="update_total_lb" class="form-group has-float-label">
                                        <input type="number" name="update_total_lb" id="update_total_lb"
                                            class="form-control"
                                            style="outline: none; box-shadow: 0px 0px 0px transparent; height:70px; font-weight:bold; font-size:40px; text-align: right;"
                                            readonly>
                                        <span><strong>Total VL & SL</strong></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 pl-1 pr-1">
                                    <button type="submit"
                                        class="text-white shadow btn btn-lg btn-success btn-block mt-2"
                                        id="btnUpdate"><i class="la la-save"></i>
                                        Save Changes
                                    </button>
                                </div>
                                <div class="col-lg-3 pl-1 pr-1">
                                    <button type="button" class="text-white shadow btn btn-lg btn-danger btn-block mt-2"
                                        id="update_btnDelete"><i class="la la-trash"></i>
                                        Delete Record
                                    </button>
                                </div>
                                <div class="col-lg-3">
                                </div>
                                <div class="col-lg-3">
                                    <button type="button"
                                        class="text-white shadow btn btn-lg btn-primary btn-block float-right ml-1 mt-2"
                                        id="update_btnBack"><i class="la la-list"></i>
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
                    data: "vl_earned",
                    name: "vl_earned"
                },
                {
                    data: "vl_used",
                    name: "vl_used"
                },
                {
                    data: "vl_balance",
                    name: "vl_balance"
                },
                {
                    data: "sl_earned",
                    name: "sl_earned"
                },
                {
                    data: "sl_used",
                    name: "sl_used"
                },
                {
                    data: "sl_balance",
                    name: "sl_balance"
                },
                {
                    data: "leave_balance",
                    name: "leave_balance"
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
                    targets: [0, 2, 3, 4, 5, 6, 7, 8, 9],
                },
            ]
        });
    });

</script>
<script src="/assets/js/leaveforwardedBalance.js"></script>
@endpush
@endsection
