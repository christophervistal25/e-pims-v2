@extends('layouts.app')
@section('title', 'Compensatory Build Up')
@prepend('page-css')
{{-- <script src="{{ asset('/js/app.js') }}" defer></script> --}}
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

.modal-header {
    background: rgb(255,190,36);
    background: linear-gradient(90deg, rgba(255,190,36,1) 0%, rgba(255,126,5,1) 75%, rgba(255,72,0,1) 100%);
}

.swal-text {
  text-align: center;
}

</style>
@endprepend
@section('content')
<div class="row">  
    <div class="col-lg-12">
        <div id="compensatoryleavesTable">
            <div>
            {{-- LIST OR DATA TABLES --}}
                <div class="page-header">
                    <div class="row align-items-right mb-2 ">
                        <div class="col-auto float-right ml-auto">
                            <button id="addBtn" type="button" class="btn btn-primary float-right shadow"><i class="la la-plus"></i>&nbsp
                                Compensatory Leave for Each Employee </button> 
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-condensed responsive display nowrap" id="compensatoryleaves" style="width:100%;">
                            <thead>
                                <tr>
                                    <th class="font-weight-bold align-middle" >Employee ID</th>
                                    <th class="font-weight-bold align-middle" >Employee Name</th>
                                    <th class="font-weight-bold align-middle" >As of</th>
                                    <th class="font-weight-bold align-middle" >CL Earned</th>
                                    <th class="font-weight-bold align-middle" >CL Availed</th>
                                    <th class="font-weight-bold align-middle" >CL Balance</th>
                                    <th class="font-weight-bold align-middle" >Actions</th>
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
        <div class="card d-none" id="compensatoryLeaveCard">
            <div class="card-body">
            <form action="" method="POST" id="compensatoryLeave">
                    @csrf
                <div class="row">
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <div class="spinner-border spinner-border-sm text-light d-none" id="save-spinner" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <img class="mb-5 rounded-circle img-thumbnail" id="empPhoto" src="/storage/employee_images/no-image.png" width="50%"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="empName" class="form-group has-float-label">
                                    <select class="form-control selectpicker"  data-live-search="true"
                                        name="employeeName" id="employeeName" data-size="6" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                        <option value="">Search name here</option>
                                        @foreach($employees as $employee)
                                        <option data-office="{{ $employee->information->office->office_name }}" 
                                                data-position="{{ $employee->information->position->position_name }}" 
                                                data-photo="{{ $employee->information->photo }}"
                                                data-employeeId="{{ $employee->information->EmpIDNo }}"
                                            value="{{ $employee->employee_id }}">{{ $employee->lastname }},
                                            {{ $employee->firstname }} {{ $employee->middlename }} </option>
                                        @endforeach
                                    </select>   
                                    <span><strong>EMPLOYEE NAME</strong></span>
                                    <div id="employeeName-error-message" class="text-danger text-sm"></div>
                                </label>
                                
                                <label for="office" class="form-group has-float-label">
                                    <input type="text" name="office" id="office" class="form-control"
                                        style="outline: none; box-shadow: 0px 0px 0px transparent;" readonly >
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
                                <hr>
                                <h5 class="text-sm text-center">COMPENSATORY LEAVE BALANCE (hours)</h5>
                                <label for="totalComBal" class="form-group has-float-label">   
                                    <input type="text" name="totalComBal" id="totalComBal" class="form-control" value="0"
                                        style="outline: none; box-shadow: 0px 0px 0px transparent; height: 180px; font-size:100px; text-align:center; background: white;" readonly>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="alert alert-secondary mb-0">
                                    <div class="row">
                                        <div class="col-lg-9 text-left font-weight-bold mt-2">
                                            COMPENSATORY BUILD UP
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-group year_filter">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i> &nbsp Year </span>
                                                </div>
                                                <select class="form-control" name="year_filter" id="year_filter">
                                                    @foreach($yearfilters as $yearfilter)
                                                    <option
                                                        value="{{ $yearfilter }}" {{ $yearfilter == date('Y') ? 'selected' : '' }}>{{ $yearfilter }} </option>
                                                    @endforeach
                                                </select> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3 forfeited">
                                    <div class="col-lg-9">
                                        <h4 class="text-danger"><strong>Note:</strong><small> Unused earned compensatory leave will automatically be forfeited by January on the next year.</small> </h4>
                                    </div>
                                    <div class="col-lg-3 text-right">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label mr-3" for="forfeited"> Forfeited </label>
                                            <input class="form-check-input" name="forfeited" type="checkbox" id="forfeited">
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive tableFixHead" style="height :50vh;" >
                                    <img class="mt-5 w-100" id="selectEmployee" src="{{ asset('/assets/img/selectEmployee.png') }}" />
                                    <table class="table table-condensed text-center"  id="compensatory-leave-table" width="100%">
                                        <thead>
                                            
                                            <tr>
                                                <th class="font-weight-bold align-middle text-center">Date Added</th>
                                                <th class="font-weight-bold align-middle text-center">Earned</th>
                                                <th class="font-weight-bold align-middle text-center">Availed</th>
                                                <th class="font-weight-bold align-middle text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th></th>
                                            <th id="totalearned"></th>
                                            <th id="totalavailed"></th>
                                            <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 pr-1 pl-1">
                                <button type="button" class="text-white shadow btn btn-lg btn-success btn-block mt-1" id="btnEarn"><i class="la la-plus-circle"></i> Earn Compensatory</button>
                            </div>
                            <div class="col-md-3 pr-1 pl-1">
                                <button type="button" class="text-white shadow btn btn-lg btn-info btn-block mt-1" id="btnAvail"><i class="la la-cart-arrow-down"></i> Avail Compensatory</button>
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="text-white shadow btn btn-lg btn-primary btn-block mt-1" id="btnBack"><i class="la la-list"></i>
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

<!-- ADD COMPENSATORY LEAVE MODAL -->
<div class="modal rounded-0 fade" id="addCompensatoryLeave" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-capitalize"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="addCompensatoryLeaveForm" method="POST">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="hidden" class='form-control' name="employee_id" id="employee_id">
                            <input type="hidden" class='form-control' name="action" id="action">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <label for="overtime_type" class="form-group has-float-label overtime_type">
                            <select name="overtime_type" class="form-control overtime_type" id="overtime_type"
                                 style="outline: none; box-shadow: 0px 0px 0px transparent; height: 50px; font-size:18px; font-family:Century Gothic; text-align:right; ">
                                <option value="weekdays">Week Days</option>
                                <option value="weekends/holidays">Weekends / Holidays</option>
                            </select>
                            <span class="font-weight-bold">OVERTIME TYPE <span class='text-danger'>*</span></span>
                        </label>
                        <div class='text-danger' id="overtime_type-error-message"></div>
                    </div>
                    <div class="col-lg-6">
                        <label for="date_added" class="form-group has-float-label">
                            <input type="date" name="date_added" id="date_added" class="form-control date_added"
                             style="outline: none; box-shadow: 0px 0px 0px transparent; height: 50px; font-size:18px; font-family:Century Gothic; text-align:right; ">
                            <span class="font-weight-bold date-span"></span>
                            <div class='text-danger' id="date_added-error-message"></div>
                        </label>
                        
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <label for="hours_rendered" class="form-group has-float-label hours_rendered">
                            <input type="number" name="hours_rendered" id="hours_rendered" class="form-control hours_rendered" value="0"
                                style="outline: none; box-shadow: 0px 0px 0px transparent; height: 100px; font-size:75px; font-family:Century Gothic; text-align:right; ">
                            <span class="font-weight-bold">HOURS RENDERED<span class='text-danger'>*</span></span>
                            <div class='text-danger' id="hours_rendered-error-message"></div>
                        </label>
                    </div>

                    <div class="col-lg-6">
                        <label for="earned" class="form-group has-float-label earned">
                            <input type="number" name="earned" id="earned" class="form-control earned" value="0"
                                style="outline: none; box-shadow: 0px 0px 0px transparent; height: 100px; font-size:75px; font-family:Century Gothic; text-align:right; " readonly>
                            <span class="font-weight-bold">LEAVE EARNINGS </span>
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <label for="availed" class="form-group has-float-label availed">
                            <input type="number" name="availed" id="availed" class="form-control availed" value="0"
                                style="outline: none; box-shadow: 0px 0px 0px transparent; height: 100px; font-size:75px; font-family:Century Gothic; text-align:right; ">
                            <span class="font-weight-bold">Availment(hours)<span class='text-danger'>*</span></span>
                            <div class='text-danger' id="availed-error-message"></div>
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <label for="remarks" class="form-group has-float-label">
                            <textarea id="remarks" name="remarks" rows="6" class="w-100 form-control remarks" placeholder="Write your remarks here"></textarea>
                            <span class="font-weight-bold">REMARKS <span class='text-danger'>*</span></span>
                            <div class='text-danger' id="remarks-error-message"></div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary shadow" id="btnSaveEarned">
                    <div class="spinner-border spinner-border-sm text-light d-none" id="save-spinner" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    Save
                </button>
                <button type="button" class="btn btn-primary shadow" id="btnSaveAvailed">
                    <div class="spinner-border spinner-border-sm text-light d-none" id="save-spinner" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    Save
                </button>
            </form>
                <button type="button" class="btn btn-danger shadow" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!-- END OF ADD MODAL -->

<!-- EDIT COMPENSATORY LEAVE MODAL -->
<div class="modal rounded-0 fade" id="editCompensatoryLeave" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-capitalize"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="editCompensatoryLeaveForm" method="POST">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="hidden" class='form-control' name="edit_id" id="edit_id">
                            <input type="hidden" class='form-control' name="edit_employee_id" id="edit_employee_id">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <label for="edit_overtime_type" class="form-group has-float-label edit_overtime_type">
                            <select name="edit_overtime_type" class="form-control" id="edit_overtime_type"
                                 style="outline: none; box-shadow: 0px 0px 0px transparent; height: 50px; font-size:18px; font-family:Century Gothic; text-align:right; ">
                                <option value="weekdays">Week Days</option>
                                <option value="weekends/holidays">Weekends / Holidays</option>
                            </select>
                            <span class="font-weight-bold">OVERTIME TYPE <span class='text-danger'>*</span></span>
                        </label>
                        <div class='text-danger' id="edit_overtimeType__error__element"></div>
                    </div>
                    <div class="col-lg-6">
                        <label for="edit_date_added" class="form-group has-float-label">
                            <input type="date" name="edit_date_added" id="edit_date_added" class="form-control"
                             style="outline: none; box-shadow: 0px 0px 0px transparent; height: 50px; font-size:18px; font-family:Century Gothic; text-align:right; " readonly>
                            <span class="font-weight-bold edit_date-span"></span>
                        </label>
                        
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <label for="edit_hours_rendered" class="form-group has-float-label edit_hours_rendered">
                            <input type="number" name="edit_hours_rendered" id="edit_hours_rendered" class="form-control" value="0"
                                style="outline: none; box-shadow: 0px 0px 0px transparent; height: 100px; font-size:75px; font-family:Century Gothic; text-align:right; ">
                            <span class="font-weight-bold">HOURS RENDERED<span class='text-danger'>*</span></span>
                            <div class='text-danger' id="edit_hours_rendered__error__element"></div>
                        </label>
                    </div>

                    <div class="col-lg-6">
                        <label for="edit_earned" class="form-group has-float-label edit_earned">
                            <input type="number" name="edit_earned" id="edit_earned" class="form-control" value="0"
                                style="outline: none; box-shadow: 0px 0px 0px transparent; height: 100px; font-size:75px; font-family:Century Gothic; text-align:right; " readonly>
                            <span class="font-weight-bold">LEAVE EARNINGS </span>
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <label for="edit_availed" class="form-group has-float-label edit_availed">
                            <input type="number" name="edit_availed" id="edit_availed" class="form-control" value="0"
                                style="outline: none; box-shadow: 0px 0px 0px transparent; height: 100px; font-size:75px; font-family:Century Gothic; text-align:right; ">
                            <span class="font-weight-bold">Availment(hours)<span class='text-danger'>*</span></span>
                            <div class='text-danger' id="edit_availed__error__element"></div>
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <label for="edit_remarks" class="form-group has-float-label">
                            <textarea id="edit_remarks" name="edit_remarks" rows="6" class="w-100 form-control" placeholder="Write your remarks here"></textarea>
                            <span class="font-weight-bold">REMARKS <span class='text-danger'>*</span></span>
                            <div class='text-danger' id="edit_remarks__error__element"></div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button title="Update Earned" type="button" class="btn btn-primary shadow" id="btnUpdateEarned">
                    <div class="spinner-border spinner-border-sm text-light d-none" id="save-spinner" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    Save
                </button>
                <button title="Update Availed" type="button" class="btn btn-primary shadow" id="btnUpdateAvailed">
                    <div class="spinner-border spinner-border-sm text-light d-none" id="save-spinner" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    Save
                </button>
            </form>
                <button type="button" class="btn btn-danger shadow" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!-- END OF EDIT MODAL -->

@push('page-scripts')
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready( function () {
    const ROUTE = "{{ route('compensatory-build-up.list') }}";
    let table = $('#compensatoryleaves').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ordering: false,
                paging: true,
                pagingType: "full_numbers",
                info: true,
                searching: true,
                language: {
                    processing:
                        '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
                },
                ajax: ROUTE,
                columns: [
                    { data: "employee_id", name: "employee_id", defaultContent : '' },
                    { data: "fullname", name: "fullname", defaultContent : ''},
                    { data: "date_added", name: "date_added" },
                    { data: "earned", name: "earned" },
                    { data: "availed", name: "availed" },
                    { data: "balance", name: "balance"},
                    {
                        data: "action",
                        name: "action",
                        searchable: false,
                        sortable: false
                    }
                ],
                columnDefs: [
                        { responsivePriority: 1, targets: [0, 1] },
                        { responsivePriority: 2, targets: 1 }
                    ]
            });
});

</script>
<script src="/assets/js/jquery.dataTables.min.js"></script>
<script src="/assets/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="/assets/js/sweetalert.min.js"></script>
<script src="{{ asset('/assets/js/compensatory.js') }}"></script>
@endpush
@endsection