@php
    $layouts = '';
    if (request()->winbox == 1) {
        $layouts = 'layouts.app-winbox';
    } else {
        $layouts = 'layouts.app';
    }
    echo request()->winbox;
@endphp
@extends($layouts)
@section('title', 'Leave Lists')
@prepend('page-css')
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
    <div class="row">
        <div class="col-lg-3">
            <div class="card shadow-none mb-0">
                <div id="filterOptions">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card dash-widget shadow-none mt-0 mb-0 pt-0">
                                    <div class="card-body">
                                        <span class="dash-widget-icon">
                                            <i class="fas fa-tasks text-dark"></i>
                                        </span>
                                        <div class="dash-widget-info">
                                            <h3>{{ array_sum($statuses) }}</h3>
                                            <span class="text-uppercase font Medium">ALL</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="card dash-widget shadow-none mt-0 pt-0 mb-0">
                                    <div class="card-body">
                                        <span class="dash-widget-icon">
                                            <i class="far fa-thumbs-up text-success" id="approvedIcon"></i>
                                        </span>
                                        <div class="dash-widget-info">
                                            <h3 class="">{{ $statuses['approved'] }}</h3>
                                            <span class="text-uppercase font Medium">APPROVED</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="card dash-widget shadow-none mt-0 pt-0 mb-0">
                                    <div class="card-body">
                                        <span class="dash-widget-icon">
                                            <i class="fas fa-times text-danger" id="declinedIcon"></i>
                                        </span>
                                        <div class="dash-widget-info">
                                            <h3 class="">{{ $statuses['declined'] }}</h3>
                                            <span class="text-uppercase font Medium">DECLINED</span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="card dash-widget shadow-none mt-0 pt-0 mb-0">
                                    <div class="card-body">
                                        <span class="dash-widget-icon">
                                            <i class="fas fa-spinner text-warning" id="pendingIcon"></i>
                                        </span>
                                        <div class="dash-widget-info">
                                            <h3>{{ $statuses['pending'] }}</h3>
                                            <span class="text-uppercase font Medium">PENDING</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="card dash-widget shadow-none mt-0 pt-0 mb-0">
                                    <div class="card-body">
                                        <span class="dash-widget-icon">
                                            <i class="fas fa-paper-plane" style="color :#84bee1;" id="ongoingIcon"></i>
                                        </span>
                                        <div class="dash-widget-info">
                                            <h3>{{ $statuses['on-going'] }}</h3>
                                            <span class="text-uppercase font Medium">ON-GOING</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="card dash-widget shadow-none mt-0 pt-0 mb-0">
                                    <div class="card-body">
                                        <span class="dash-widget-icon">
                                            <i class="fas fa-smile-beam text-primary" id="enjoyIcon"></i>
                                        </span>
                                        <div class="dash-widget-info">
                                            <h3>{{ $statuses['enjoyed'] }}</h3>
                                            <span class="text-uppercase font Medium">ENJOY</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        {{-- LEAVE APPLICATION CARD --}}
        <div class="col-lg-9">
            <div id="leaveApplicationList" class="card">
                <button type="button" class="text-white shadow btn btn-primary mt-4 mr-4 ml-auto" onclick="showLeaveApplication()"><i class="las la-user-plus"></i>
                    New Application
                </button>
                <div class="card-body mt-3">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-4 col-xl-4">
                            <label for="officelist" class="form-group has-float-label mb-0">
                                <select class="form-control selectpicker" name="officeList" type="text" id="searchOffice"
                                    data-live-search="true" data-size="6">
                                    <option value="ALL">ALL</option>
                                    @foreach($offices as $office)
                                    <option value="{{ $office->OfficeCode }}">{{ $office->Description }}</option>
                                    @endforeach
                                </select>
                                <span class='text-uppercase'><strong>Filter Offices</strong></span>
                            </label>
                        </div>

                        <div class="col-md-12 col-sm-12 col-lg-4 col-xl-4">
                            <label for="filteropt" class="form-group has-float-label mb-0">
                                <select name="filteropt" id="searchStatus"
                                    class="form-control selectpicker " data-live-search="true">
                                    @foreach($statuses as $status => $count)
                                    <option value="{{ Str::lower($status) }}">{{ Str::upper($status) }} - {{ $count }}
                                    </option>
                                    @endforeach
                                </select>
                                <span class='text-uppercase'><strong>Status</strong></span>
                            </label>
                        </div>

                        <div class="col-md-12 col-sm-12 col-lg-4 col-xl-4">
                            <label for="employeeName" class="form-group has-float-label">
                                <select class="form-control selectpicker text-dark" name="searchName" id="searchName"
                                    data-live-search="true">
                                    <option value="all">ALL</option>
                                    @foreach($employees as $employee)
                                    <option value="{{ $employee->employee_id }}">{{ $employee->LastName }},
                                        {{ $employee->FirstName }} {{ $employee->MiddleName }}</option>
                                    @endforeach
                                </select>
                                <span class='text-uppercase'><strong>Search by Employee</strong></span>
                            </label>
                        </div>
                    </div>

                    {{-- LEAVE LIST DATATABLES --}}
                    <div class="table">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="leaveListTable">
                                <thead>
                                    <tr class='text-uppercase'>
                                        <td class="font-weight-bold align-middle text-center">Applied</td>
                                        <td class="font-weight-bold align-middle text-center text-truncate">Name
                                            of Employee</td>
                                        <td class="font-weight-bold align-middle text-center text-truncate">
                                            Leave Type</td>
                                        <td class="font-weight-bold align-middle text-center">Status</td>
                                        <td class="font-weight-bold align-middle text-center">Actions</td>
                                        
                                    </tr>

                                    </tr>
                                </thead>
                                <tbody class='align-middle'>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
<script src="{{ asset('/assets/libs/winbox/winbox.bundle.js') }}"></script>
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
        columns: [
            {
                className: 'text-truncate',
                data: 'applied',
                name: 'applied'
            },
            {
                className: 'text-truncate',
                data: 'Employee_id',
                name: 'Employee_id',
                searchable: true,
                sortable: false,
                visible: true,
                render: function (rawData, _, row) {
                    return `${row.employee.fullname}`;
                }
            },
            {
                className: 'text-truncate',
                data: 'leave_type_id',
                name: 'leave_type_id',
                searchable: true,
                sortable: false,
                visible: true,
                render: function (rawData, _, row) {
                    return `${row.type.description}`;
                }
            },
            {
                data: 'status',
                name: 'status',
                searchable: true,
                sortable: false,
                visible: true,
                render: function (data, _, row, _) {
                    if (data == 'pending') {
                        return `<span class='badge badge-warning text-white text-uppercase'>${data}</span>`;
                    } else if (data == 'declined') {
                        return `<span class='badge badge-danger text-uppercase'>${data}</span>`;
                    } else if (data == 'approved') {
                        return `<span class='badge badge-success text-uppercase'>${data}</span>`;
                    } else if (data == 'on-going') {
                        return `<span class='badge badge-info text-uppercase'>${data}</span>`;
                    } else if (data == 'enjoyed') {
                        return `<span class='badge badge-primary text-uppercase'>${data}</span>`;
                    }
                }
            },
            {
                data: 'action',
                name: 'action',
                sortable: false,
            }
        ]
    });


    // Remove record
    removeSearchAndTableLength();

    $(document).on('click', '.btnRemoveRecord', function () {
        let id = $(this).attr('data-id');
        let message = document.createElement('h3');
        message.innerText = 'Delete this?';

        swal({
                title: message.innerText,
                text: "Click OK to confirm this action.",
                icon: "warning",
                buttons: true,
                dangerMode: true,   
            })
            .then((willSoftDelete) => {
                if (willSoftDelete) {
                    $.ajax({
                        url: `/employee/leave-list/${id}`, // /leave-list/ is a route
                        method: 'DELETE', // DELETE is from the route
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
        $(document.documentElement).attr('style', 'overflow:hidden;');
        // window.open('/employee/leave/application');
        new WinBox(`LEAVE APPLICATION`, {
                root: document.querySelector('.page-content'),
                class: ["no-min", "no-full", "no-resize", "no-max", "no-move"],
                title : "Deductions",
                url: `/employee/leave/application?winbox=1`,
                index: 999999,
                background: "#2a3042",
                width: window.innerWidth - 230,
                height: window.innerHeight,
                x: 230,
                y: 60,
                onclose: function(force){
                    $(document.documentElement).attr('style', 'overflow:auto;');
                    filter();
                }
            });
    }

    function editLeaveApplication(application_id) {
        $(document.documentElement).attr('style', 'overflow:hidden;');
        let ROUTE = `leave/leave-list/`+application_id+`?winbox=1`;
        // window.open('/employee/leave/application');
        new WinBox(`LEAVE APPLICATION`, {
                root: document.querySelector('.page-content'),
                class: ["no-min", "no-full", "no-resize", "no-max", "no-move"],
                title : "Deductions",
                url: ROUTE,
                index: 999999,
                background: "#2a3042",
                width: window.innerWidth - 230,
                height: window.innerHeight,
                x: 230,
                y: 60,
                onclose: function(force){
                    $(document.documentElement).attr('style', 'overflow:auto;');
                    filter();
                }
            });
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

        console.log(officeCode, pendingStatus, employeeID);
        table.destroy();
        table = $("#leaveListTable").DataTable({
            processing: true,
            pagingType: "full_numbers",
            stateSave: true,
            serverSide: true,
            destroy: true,
            retrieve: true,
            language: {
                processing: '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span>'
            },
            ajax: {
                url: `/api/leave/leave-list/${officeCode}/${pendingStatus}/${employeeID}`
            },
            columns: [
                {
                    className: 'text-truncate',
                    data: 'applied',
                    name: 'applied'
                },
                {
                    className: 'text-truncate',
                    data: 'Employee_id',
                    name: 'Employee_id',
                    searchable: true,
                    sortable: false,
                    visible: true,
                    render: function (_, a, row) {
                        return `${row.employee.fullname}`;
                    }
                },
                {
                    className: 'text-truncate',
                    data: 'leave_type_id',
                    name: 'leave_type_id',
                    searchable: true,
                    sortable: false,
                    visible: true,
                    render: function (rawData, _, row) {
                        return `${row.type.description}`;
                    }
                },
                {
                    data: 'status',
                    name: 'status',
                    searchable: true,
                    sortable: false,
                    visible: true,
                    render: function (data) {
                        if (data == 'pending') {
                            return `<span class='badge badge-warning text-white text-uppercase'>${data}</span>`;
                        } else if (data == 'declined') {
                            return `<span class='badge badge-danger text-uppercase'>${data}</span>`;
                        } else if (data == 'approved') {
                            return `<span class='badge badge-success text-uppercase'>${data}</span>`;
                        } else if (data == 'on-going') {
                            return `<span class='badge badge-info text-uppercase'>${data}</span>`;
                        } else if (data == 'enjoyed') {
                            return `<span class='badge badge-primary text-uppercase'>${data}</span>`;
                        }
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    sortable: false,
                }
            ]
        });

        removeSearchAndTableLength();
    }

    $(document).on('click', '.btnApprove', function () {
        let applicationID = $(this).attr('data-id');
        const status = 'approved';
        swal({
                title: "Approve Application",
                text: "You're about to approve this application. Continue?",
                icon: "warning",
                buttons: true,
                dangerMode: true,   
            })
            .then((willbeApproved) => {
                if (willbeApproved) {
                    $.ajax({
                        url : `/employee/leave/leave-list/${applicationID}`,
                        method : 'PUT',
                        data : { status },
                        success : function (response) {
                            if(response.success) {
                                filter();
                            }
                        }

                    });
                }
            });
        
    });


    // Search by office, employee name and status
    $("#searchOffice, #searchName, #searchStatus").change(() => filter());

</script>
@endpush
@endsection
