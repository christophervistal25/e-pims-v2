@extends('layouts.app')
@section('title', 'Leave Lists')
@prepend('page-css')

{{-- <script src="{{ asset('/js/app.js') }}" defer></script> --}}
{{-- <link rel="stylesheet"
    href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"> --}}
<link rel="stylesheet"
    href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />
    <link rel="stylesheet" href="/assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endprepend
@section('content')
<style>
    #pendingIcon {
        animation: rotate 3s linear infinite;
    }

    #enjoyIcon {
        animation: shrink 4s linear infinite;
    }
    #ongoingIcon {
        animation: grow 3s linear infinite;
    }

    #approvedIcon {
        animation: grow 3s linear infinite;
    }

    #declinedIcon {
        animation: shrink 4s linear infinite;
    }

    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    @keyframes grow {
        from {
            transform: scale(1.2);
        }

        to {
            transform: scale(1);
        }
    }

    @keyframes shrink {
        from {
            transform: scale(1.2);
        }

        to {
            transform: scale(1);
        }
    }

    @keyframes grow {
        from {
            transform: scale(1);
        }

        to {
            transform: scale(1.2);
        }
    }

    @keyframes shrink {
        20% {
            transform: scale(1.2);
        }

        50% {
            transform: scale(1);
        }
    }


</style>



<section class="mb-2">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon">
                        <i class="fas fa-tasks text-dark"></i>
                    </span>
                    <div class="dash-widget-info">
                        <h3>{{ $approved + $reject + $pending + $ongoing + $enjoy }}</h3>
                        <span class="text-uppercase font Medium">ALL</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4 ">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon">
                        <i class="far fa-thumbs-up text-success" id="approvedIcon"></i>
                    </span>
                    <div class="dash-widget-info">
                        <h3 class="">{{ $approved }}</h3>
                        <span class="text-uppercase font Medium">APPROVED</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4 ">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon">
                        <i class="fas fa-times text-danger" id="declinedIcon"></i>
                    </span>
                    <div class="dash-widget-info">
                        <h3 class="">{{ $reject }}</h3>
                        <span class="text-uppercase font Medium">DECLINED</span>
                    </div>
                </div>
            </div>
        </div>
    

        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4 ">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon">
                        <i class="fas fa-spinner text-warning"  id="pendingIcon"></i>
                    </span>
                    <div class="dash-widget-info">
                        <h3>{{ $pending }}</h3>
                        <span class="text-uppercase font Medium">PENDING</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4 ">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon">
                        <i class="fas fa-paper-plane" style="color :#84bee1;"  id="ongoingIcon"></i>
                    </span>
                    <div class="dash-widget-info">
                        <h3>{{ $ongoing }}</h3>
                        <span class="text-uppercase font Medium">ON-GOING</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4 ">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon">
                        <i class="fas fa-smile-beam text-primary" id="enjoyIcon"></i>
                    </span>
                    <div class="dash-widget-info">
                        <h3>{{ $enjoy }}</h3>
                        <span class="text-uppercase font Medium">ENJOY</span>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</section>


{{-- LEAVE APPLICATION CARD --}}
<div class="row">
    <div class="col-lg-12">
        <div id="leaveApplicationList" class="card">
            <div class="card-body mt-3">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-4 col-xl-4 mt-3">
                        <label for="officelist" class="form-group has-float-label mb-0">
                            <select class="form-control selectpicker" name="officeList" type="text" id="searchOffice" data-live-search="true" data-size="4" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <option>All</option>
                                @foreach($offices as $office)
                                <option value="{{ $office->office_code }}">{{ $office->office_name }}</option>
                                @endforeach
                            </select>
                            <span><strong>Filter Offices</strong></span>
                        </label>
                    </div>

                    <div class="col-md-12 col-sm-12 col-lg-4 col-xl-4 mt-3">
                        <label for="filteropt" class="form-group has-float-label mb-0">
                            <select name="filteropt" type="text" id="searchStatus" class="form-control selectpicker border border-primary" data-live-search="true"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <option readonly selected value="all">All</option>
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="declined">Declined</option>
                                <option value="on-going">On-going</option>
                                <option value="enjoyed">Enjoyed</option>
                            </select>
                            <span><strong>Status</strong></span>
                        </label>
                    </div>

                    <div class="col-md-12 col-sm-12 col-lg-4 col-xl-4 mt-3">
                        <label for="employeeName" class="form-group has-float-label">
                                <select class="form-control selectpicker" name="searchName" id="searchName" data-live-search="true">
                                    <option value="all">All</option>
                                        @foreach($employees as $employee)
                                    <option value="{{ $employee->employee_id }}">{{ $employee->lastname }}, {{ $employee->firstname }} {{ $employee->middlename }}</option>
                                        @endforeach
                                </select>
                            <span><strong>Search by Employee</strong></span>
                        </label>
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
                                    <th class="font-weight-bold align-middle text-center" rowspan="1" colspan="5">Date</th>
                                    <th class="font-weight-bold align-middle text-center" rowspan="2">No. of Days</th>
                                    <th class="font-weight-bold align-middle text-center" rowspan="2">Actions</th>
                                    <tr>
                                        <td class="font-weight-bold align-middle text-center">Applied</td>
                                        <td class="font-weight-bold align-middle text-center">Approved</td>
                                        <td class="font-weight-bold align-middle text-center">Rejected</td>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>

// Display to the yajra data table 
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
            className : 'text-truncate',
            data: 'fullname',
            name: 'fullname',
            searchable: true,
            sortable: false,
            visible: true
        },
        {
            className : 'text-truncate',
            data: 'recommending_approval',
            name: 'recommending_approval',
            searchable: true,
            sortable: false,
            visible: true
        },
        {
            className : 'text-truncate',
            data: 'approved_by',
            name: 'approved_by',
            searchable: true,
            sortable: false,
            visible: true
        },
        {
            className: 'text-truncate',
            data: 'leave_type_name',
            name: 'leave_type_name',
            searchable: true,
            sortable: false,
            visible: true
        },
        {
            className: 'text-truncate',
            data: 'incase_of',
            name: 'incase_of',
            searchable: true,
            sortable: false,
            visible: true,
            render : function (data) {
                return data.replace('_', ' ').toUpperCase();
            }
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
            visible: true,
            render : function(data){
                if(data == 'pending'){
                    return `<span class='badge badge-warning text-white'>${data}</span>`;
                }else if (data == 'declined'){
                    return `<span class='badge badge-danger'>${data}</span>`;
                }else if (data == 'approved'){
                    return `<span class='badge badge-success'>${data}</span>`;
                }else if (data == 'on-going'){
                    return `<span class='badge badge-info'>${data}</span>`;
                }else if (data == 'enjoyed'){
                    return `<span class='badge badge-primary'>${data}</span>`;
                }
            }
        },
        {
            className: 'text-truncate',
            data: 'date_applied',
            name: 'date_applied'
        },
        {
            data: 'date_approved',
            name: 'date_approved'
        },
        {
            className: 'text-truncate',
            data: 'date_rejected',
            name: 'date_rejected'
        },
        {
            className: 'text-truncate',
            data: 'date_from',
            name: 'date_from'
        },
        {
            className: 'text-truncate',
            data: 'date_to',
            name: 'date_to'
        },
        {
            className: 'text-truncate',
            data: 'no_of_days',
            name: 'no_of_days'
        },
        {
            data: 'action',
            name: 'action'
        }
    ] 
});


// Remove record
removeSearchAndTableLength();

$(document).on('click', '.btnRemoveRecord', function () {
    let id = $(this).attr('data-id');
    let message = document.createElement('h3');
    message.innerText = 'Are you sure you want to delete this row?';


    swal({
        title: message.innerText,
        text: "Once you delete this row, it willl disappear on the table.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willSoftDelete) => {
        if (willSoftDelete) {
            $.ajax({
                url: `/employee/leave-list/${id}`, // /leave-list/ is a route
                method: 'DELETE',  // DELETE is from the route
                success: function (response) {
                    if (response.success) {
                        let messageText = document.createElement('h3');
                        messageText.innerText = 'The row has been deleted.';
                        swal({
                            title: messageText.innerText,
                            icon: "success",
                        });

                        table.draw();
                    }
                },
            });

        }
    });
});


    // Remove search input and table length
    function removeSearchAndTableLength() {
        $('.dataTables_filter').remove();
        $('#leaveListTable_length').remove();
    }

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


    // function for searching
    function filter() {
        
        let officeCode = $('#searchOffice').val();
        let pendingStatus = $('#searchStatus').val();
        let employeeID = $('#searchName').val();


            table.destroy();
            table = $("#leaveListTable").DataTable({
                processing: true,
                pagingType: "full_numbers",
                stateSave: true,
                serverSide: true,
                destroy: true,
                retrieve: true,
                language: {
                    processing:
                    '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span>'
                },
                ajax: {
                    url: `/api/leave/leave-list/${officeCode}/${pendingStatus}/${employeeID}`
                },
                columns: [{
                        className : 'text-truncate',
                        data: 'fullname',
                        name: 'fullname',
                        searchable: true,
                        sortable: false,
                        visible: true
                    },
                    {
                        className : 'text-truncate',
                        data: 'recommending_approval',
                        name: 'recommending_approval',
                        searchable: true,
                        sortable: false,
                        visible: true
                    },
                    {
                        className : 'text-truncate',
                        data: 'approved_by',
                        name: 'approved_by',
                        searchable: true,
                        sortable: false,
                        visible: true
                    },
                    {
                        className: 'text-truncate',
                        data: 'leave_type_name',
                        name: 'leave_type_name',
                        searchable: true,
                        sortable: false,
                        visible: true
                    },
                    {
                        className: 'text-truncate',
                        data: 'incase_of',
                        name: 'incase_of',
                        searchable: true,
                        sortable: false,
                        visible: true,
                        render : function (data) {
                            return data.replace('_', ' ').toUpperCase();
                        }
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
                        visible: true,
                        render : function(data){
                            if(data == 'pending'){
                                return `<span class='badge badge-warning text-white'>${data}</span>`;
                            }else if (data == 'declined'){
                                return `<span class='badge badge-danger'>${data}</span>`;
                            }else if (data == 'approved'){
                                return `<span class='badge badge-success'>${data}</span>`;
                            }else if (data == 'on-going'){
                                return `<span class='badge badge-info'>${data}</span>`;
                            }else if (data == 'enjoyed'){
                                return `<span class='badge badge-primary'>${data}</span>`;
                            }
                        }
                    },
                    {
                        className: 'text-truncate',
                        data: 'date_applied',
                        name: 'date_applied'
                    },
                    {
                        data: 'date_approved',
                        name: 'date_approved'
                    },
                    {
                        className: 'text-truncate',
                        data: 'date_rejected',
                        name: 'date_rejected'
                    },
                    {
                        className: 'text-truncate',
                        data: 'date_from',
                        name: 'date_from'
                    },
                    {
                        className: 'text-truncate',
                        data: 'date_to',
                        name: 'date_to'
                    },
                    {
                        className: 'text-truncate',
                        data: 'no_of_days',
                        name: 'no_of_days'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ] 
            });

        removeSearchAndTableLength();
    }

    
    // Search by office, employee name and status
    $("#searchOffice, #searchName, #searchStatus").change(() => filter());
</script>
@endpush
@endsection