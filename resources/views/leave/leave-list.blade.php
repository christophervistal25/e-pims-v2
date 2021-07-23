@extends('layouts.app-vue')
@section('title', 'Leave Lists')
@prepend('page-css')

<script src="{{ asset('/js/app.js') }}" defer></script>
<link rel="stylesheet"
    href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
<link rel="stylesheet"
    href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />
@endprepend
@section('content')

<div class="col-12">
    <div class="row">
        <div class="card card-body col-2 text-center bg-light">
            <h5 class="badge badge-info" style="justify-content: center">All</h5>
        </div>
        <div class="card card-body col-2 text-center bg-light">
            <h5 class="badge badge-warning" style="justify-content: center">Pending</h5>
        </div>
        <div class="card card-body col-2 text-center bg-light">
            <h5 class="badge badge-danger" style="justify-content: center">Reject</h5>
        </div>
        <div class="card card-body col-2 text-center bg-light">
            <h5 class="badge badge-success" style="justify-content: center">Approved</h5>
        </div>
        <div class="card card-body col-2 text-center bg-light">
            <h5 class="badge badge-secondary" style="justify-content: center">On-going</h5>
        </div>
        <div class="card card-body col-2 text-center bg-light">
            <h5 class="badge badge-primary" style="justify-content: center">Enjoyed</h5>
        </div>
    </div>
</div>

{{-- LEAVE APPLICATION CARD --}}
<div class="row">
    <div class="col-lg-12">
        <div id="leaveApplicationList" class="card bg-light">
            <div class="card-body">
                <div class="row mt-1">
                    <div class="col-lg-4">
                        <label for="officelist" class="form-group has-float-label mb-0">
                            <select class="form-control select-picker" name="officeList" type="text" id="officeList" data-live-search="true" data-size="4" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <option>All Office</option>
                                @foreach($offices as $office)
                                <option value="{{ $office->office_code }}">{{ $office->office_name }}</option>
                                @endforeach
                            </select>
                            <span><strong>Filter Offices</strong></span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label for="filteropt" class="form-group has-float-label mb-0">
                            <select name="filteropt" type="text" id="filteropt" class="form-control"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <option readonly selected>All</option>
                                <option>Pending</option>
                                <option>Approved</option>
                                <option>Declined</option>
                                <option>On-going</option>
                                <option>Enjoyed</option>
                            </select>
                            <span><strong>Status</strong></span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-10">
                                <label for="employeeName" class="form-group has-float-label">
                                        <select class="form-control selectpicker" name="searchName" id="searchName" data-live-search="true"
                                            style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                            <option>Select names...</option>
                                                @foreach($employees as $employee)
                                            <option value="{{ $employee->employee_id }}">{{ $employee->lastname }}, {{ $employee->firstname }} {{ $employee->middlename }}</option>
                                                @endforeach
                                        </select>
                                    <span><strong>Search by Employee</strong></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- LEAVE LIST DATATABLES --}}
               
                    <div class="table" style="overflow-x:auto;">
                        <table class="table table-bordered text-center" id="leaveListTable" style="width:100%;">
                            <thead>
                                <tr>
                                    <th class="font-weight-bold align-middle text-center text-truncate" rowspan="2">Name of Employee</th>
                                    <th class="font-weight-bold align-middle text-center" rowspan="2">Recommending Approval</th>
                                    <th class="font-weight-bold align-middle text-center" rowspan="2">Approved By</th>
                                    <th class="font-weight-bold align-middle text-center text-truncate" rowspan="2">Leave Type</th>
                                    <th class="font-weight-bold align-middle text-center" rowspan="2">Incase of</th>
                                    
                                    <th class="font-weight-bold align-middle text-center" rowspan="2">Commutation</th>   
                                    <th class="font-weight-bold align-middle text-center" rowspan="2">Status</th>
                                    <th class="font-weight-bold align-middle text-center" rowspan="1" colspan="4">Date</th>
                                    <th class="font-weight-bold align-middle text-center" rowspan="2">No. of Days</th>
                                    <th class="font-weight-bold align-middle text-center" rowspan="2">Actions</th>
                                    <tr>
                                        <td class="font-weight-bold align-middle text-center">Applied</td>
                                        <td class="font-weight-bold align-middle text-center">Approved</td>
                                        <td class="font-weight-bold align-middle text-center">From</td>
                                        <td class="font-weight-bold align-middle text-center">To</td>
                                    </tr>  
                                    </tr>
                                                                     
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>



        
        <div id="leaveApplication" style="display:none;" class="card shadow">
            <div class="card-body">
                <div class="alert alert-secondary text-center font-weight-bold">LEAVE APPLICATION FILING</div>
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
                        <label for="leaveOpt" class="form-group has-float-label">
                            <select name="leaveOpt" id="leaveOpt"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;" class="form-control">
                                <option selected value="" readonly>SELECT LEAVE OPTION</option>
                                <option value="leaveApp">LEAVE APPLICATION</option>
                            </select>
                            <span><strong>LEAVE OPTION<span class="text-danger">*</span></strong></span>
                        </label>
                        <label for="typeOfLeave" class="form-group has-float-label">
                            <select class="form-control" for="typeOfLeave"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <option readonly selected value="">SELECT TYPE OF LEAVE</option>
                                <option value="vacLeave">VACATION LEAVE</option>
                                <option value="mpLeave">MATERNITY/PATERNITY LEAVE</option>
                                <option value="sLeave">SICK LEAVE</option>
                                <option value="sEmpLeave">TO SEEK EMPLOYMENT</option>
                                <option value="others">OTHERS</option>
                            </select>
                            <span><strong>TYPE OF LEAVE<span class="text-danger">*</span></strong></span>
                        </label>
                        <label for="typeOthers" class="form-group has-float-label">
                            <input type="text" name="typeOthers" id="typeOthers" class="form-control">
                            <span><strong>IF OTHERS IS SELECTED</strong></span>
                        </label>
                        <label for="noOfDays" class="form-group has-float-label">
                            <input type="number" class="form-control" id="noOfDays"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>NUMBER OF DAYS<span class="text-danger">*</span></strong></span>
                        </label>
                        <label for="caseOfVl" class="form-group has-float-label">
                            <select class="form-control" id="caseOfVl"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <option readonly selected value="outPatient">OUT PATIENT</option>
                                <option readonly value="inHosp">IN HOSPITAL</option>
                                <option readonly value="withinPhil">WITHIN THE PHILIPPINES</option>
                                <option readonly value="abroad">ABROAD</option>
                            </select>
                            <span><strong>IN CASE OF VACATION LEAVE</strong></span>
                        </label>
                        <hr>
                        <label for="specify" class="form-group has-float-label">
                            <input type="text" class="form-control" name="specify" id="specify"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>PLEASE SPECIFY:</strong></span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <h6 class="text-sm text-center">Leave Balance</h6>
                        <label for="asOf" class="form-group has-float-label">
                            <input type="date" id="asOf" class="form-control"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;" disabled>
                            <span><strong>AS OF</strong></span>
                        </label>
                        <label for="vlEarned" class="form-group has-float-label">
                            <input type="number" class="form-control" id="vlEarned"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;" disabled>
                            <span><strong>VL EARNED</strong></span>
                        </label>
                        <label for="vlEnjoyed" class="form-group has-float-label">
                            <input type="number" class="form-control" id="vlEnjoyed"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;" disabled>
                            <span><strong>VL ENJOYED</strong></span>
                        </label>
                        <label for="vlBalance" class="form-group has-float-label">
                            <input type="number" class="form-control" id="vlBalance"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;" disabled>
                            <span><strong>VL BALANCE</strong></span>
                        </label>
                        <label for="slEarned" class="form-group has-float-label">
                            <input type="number" id="slEarned" class="form-control"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;" disabled>
                            <span><strong>SL EARNED</strong></span>
                        </label>
                        <label for="slEnjoyed" class="form-group has-float-label">
                            <input type="number" class="form-control" id="slEnjoyed"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;" disabled>
                            <span><strong>SL ENJOYED</strong></span>
                        </label>
                        <label for="slBalance" class="form-group has-float-label">
                            <input type="number" class="form-control" id="slBalance"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;" disabled>
                            <span><strong>SL BALANCE</strong></span>
                        </label>
                        <hr>
                        <label for="total" class="form-group has-float-label">
                            <input type="number" name="total" id="total" class="form-control"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;" disabled>
                            <span><strong>Total VL - SL</strong></span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <div class="card mt-5 shadow">
                            <div class="card-body">
                                <h6 class="text-center mt-3">Inclusive Dates</h6>
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
                                    <option value="wholeDay">WHOLE DAY</option>
                                    <option value="halfDay">HALF DAY</option>
                                </select>
                                <hr>
                                <div class="text-center">
                                    <button type="button" class="text-white btn btn-primary px-5 shadow"><i
                                            class="las la-calendar-plus"></i> Add
                                        Days</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <label for="commutation" class="form-group has-float-label">
                            <select class="form-control" id="commutation"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <option readonly selected value="">REQUESTED</option>
                                <option value="">NOT REQUESTED</option>
                            </select>
                            <span><strong>COMMUTATION<span class="text-danger">*</span></strong></span>
                        </label>
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
                                <option value="approved">APPROVED</option>
                                <option value="pending">PENDING</option>
                            </select>
                            <span><strong>APPLICATION STATUS<span class="text-danger">*</span></strong></span>
                        </label>
                    </div>
                </div>
                <div class="float-start">
                    <button type="button" class="text-white shadow btn btn-primary ml-3"><i
                            class="las la-user-plus"></i> New Application</button>
                    <button type="button" class="text-white shadow btn btn-success"><i class="lar la-save"></i> Save
                        Changes</button>
                    <button type="button" class="text-white shadow btn btn-dark px-5"><i class="las la-print">
                        </i> Print</button>
                     <button id="backButton" class="btn btn-primary shadow float-right" onclick="showLeaveApplicationList()"><i
                                            class="fa fa-arrow-left"></i> Back to List</button>
                </div>

            </div>
        </div>
    </div>
</div>

@push('page-scripts')
<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
<script src="/assets/js/jquery.dataTables.min.js"></script>
<script src="/assets/js/dataTables.bootstrap4.min.js"></script>
<script>

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



      
    $(document).ready( ()=> {
        let table = $('#leaveListTable').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            retrieve: true,
            pagingType: "full_numbers",
            ajax: '/employee/leave-list/list',
            language: {
                    processing: '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> ',
            },
            columns: [{
                data: 'fullname',
                name: 'fullname',
                searchable: true,
                sortable: false,
                visible: true
                },
                {
                    data: 'recommending_approval',
                    name: 'recommending_approval',
                    searchable: true,
                    sortable: false,
                    visible: true
                },
                {
                    data: 'approved_by',
                    name: 'approved_by',
                    searchable: true,
                    sortable: false,
                    visible: true
                },
                {
                    data: 'leave_type_name',
                    name: 'leave_type_name',
                    searchable: true,
                    sortable: false,
                    visible: true
                },
                {
                    data: 'incase_of',
                    name: 'incase_of',
                    searchable: true,
                    sortable: false,
                    visible: true
                },
                {
                    data: 'commutation',
                    name: 'commutation',
                    searchable: true,
                    sortable: false,
                    visible: true
                },
                {
                    data: 'approved_status',
                    name: 'approved_status',
                    searchable: true,
                    sortable: false,
                    visible: true
                },
                {
                    data: 'date_applied',
                    name: 'date_applied'
                },
                {
                    data: 'date_approved',
                    name: 'date_approved'
                },
                {
                    data: 'date_from',
                    name: 'date_from'
                },
                {
                    data: 'date_to',
                    name: 'date_to'
                },
                {
                    data: 'no_of_days',
                    name: 'no_of_days'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ] 

        });

        $('.dataTables_filter').remove();
        $('#leaveListTable_length').remove();
    
     });


     

    


    function showLeaveApplication() {
    var x = document.getElementById("leaveApplication");
    var y = document.getElementById("leaveApplicationList");
        x.style.display = "block";
        y.style.display = "none";
    }

    function showLeaveApplicationList() {
    var x = document.getElementById("leaveApplication");
    var y = document.getElementById("leaveApplicationList");
        x.style.display = "none";
        y.style.display = "block";
    }


   
</script>
@endpush
@endsection