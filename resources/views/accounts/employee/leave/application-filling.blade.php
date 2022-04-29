@extends('accounts.employee.layouts.app')
@section('title', 'Leave Application Filing')
@prepend('page-css')
<link rel="stylesheet"
    href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endprepend
@prepend('meta-data')
<meta name="leave-types" content="{{ $types->toJson() }}">
@endprepend
@section('title', 'Application Filling')
@section('content')

<div class="p-4">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">@yield('title')</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item active">@yield('title')</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger d-none" role="alert" id="formErrors">
                
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form method="POST" id="submitLeaveFileButton">
                        {{-- <div class="alert alert-secondary text-center font-weight-bold">LEAVE APPLICATION FILING</div> --}}
                        {{-- <hr> --}}
                        <div class="row">
                            <div class="col-lg-6 border border-bottom-0 border-left-0 border-top-0">
                                <h6 class="text-sm text-center">&nbsp;</h6>
                                <label for="dateApply" class="form-group has-float-label">
                                    <input type="date" name="dateApply" id="dateApply" class="form-control"
                                        value="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                    <span>
                                        <strong>DATE APPLY
                                            <span class="text-danger">*</span>
                                        </strong>
                                    </span>
                                </label>
                                {{-- <label for="controlNo" class="form-group has-float-label">
                            <input type="text" name="controlNo" id="controlNo" class="form-control"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>CONTROL NO.</strong></span>
                        </label> --}}
                                <label for="typeOfLeave" class="form-group has-float-label">
                                    <select class="form-control selectpicker border type-of-leave" id="typeOfLeave"
                                        name="selectedLeave" data-live-search="true">
                                        <option selected disabled value="">-------------------------</option>
                                        @foreach($types->groupBy('category') as $category => $type)
                                        <optgroup class="text-uppercase" label="{{ $category }}">
                                            @foreach($type as $t)
                                                <option value="{{ $t->code_number }}">{{ $t->name }}
                                                </option>
                                            @endforeach
                                        </optgroup>
                                        @endforeach
                                    </select>
                                    <span>
                                        <strong>TYPES OF LEAVE
                                            <span class="text-danger">*</span>
                                        </strong>
                                    </span>
                                </label>


                                <div id="inCaseOfContainer">
                                    <label for="inCaseOf" class="form-group has-float-label">
                                        <select class="form-control" id="inCaseOf" name="inCaseOfLeave"></select>
                                            <span id="in_case_of__label">
                                                <strong>IN CASE OF 
                                                    <span class='text-danger'>*</span>
                                                </strong>
                                            </span>
                                    </label>
                                </div>
                                
                                <div class="col-auto p-0">
                                    <label for="startDate" class="form-group has-float-label">
                                        <input type="date" class="form-control" id="startDate" name="startDate"
                                            >
                                        <span id="start__date__label"><strong>START DATE <span
                                                    class='text-danger'>*</span></strong></span>
                                    </label>
                                </div>

                                <div class="col-auto p-0">
                                    <label for="endDate" class="form-group has-float-label">
                                        <input type="date" class="form-control" id="endDate" name="endDate" >
                                        <span id="end__date__Label"><strong>END DATE <span
                                                    class='text-danger'>*</span></strong></span>
                                    </label>
                                </div>

                                <div class="col-auto p-0">
                                    <label for="noOfDays" class="form-group has-float-label">
                                        <input type="number" class="form-control" id="noOfDays" name="numberOfDays" readonly>
                                        <span><strong>NUMBER OF DAYS<span class="text-danger">*</span></strong></span>
                                    </label>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-6">
                                        <label for="earnedLess" class="form-group has-float-label">
                                            <input type="text" id="earnedLess" class="form-control" name="earnedLess" readonly>
                                            <span id="earnedLessLabel"><strong>LESS</strong></span>
                                        </label>

                                    </div>
                                    <div class="col-6">
                                        <label for="earnedRemain" class="form-group has-float-label">
                                            <input type="text" id="earnedRemaining" class="form-control" name="earnedRemain" readonly>
                                            <span id="earnedRemainLabel"><strong>REMAINING</strong></span>
                                        </label>
                                    </div>

                                    {{-- <div class="col-lg-12">
                                        <div class="float-right">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="leave_has_pay" id="withPay" value="with_pay" disabled>
                                                <label class="form-check-label text-sm" for="withPay">W/ PAY</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="leave_has_pay" id="withoutPay" value="without_pay" disabled>
                                                <label class="form-check-label text-sm" for="withoutPay">W/O PAY</label>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="col-lg-12">
                                        <div id="error_message_for_points"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h6 class="text-sm text-center font-weight-medium">LEAVE CREDITS</h6>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="asOf" class="form-group has-float-label">
                                            <input type="date" id="asOf" class="form-control" disabled
                                                name="balanceAsOfDate" value="{{ $forwardBalanceAsOfDate }}">
                                            <span><strong>AS OF</strong></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="vacation__leave__earned" class="form-group has-float-label">
                                            <input type="number" class="form-control" id="vacation__leave__earned"
                                                disabled name="vacationLeaveEarned" value="{{ $vacationLeaveEarned }}">
                                            <span><strong>VL EARNED</strong></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="vacation__leave__used" class="form-group has-float-label">
                                            <input type="number" class="form-control" id="vacation__leave__used"
                                                disabled name="vacationLeaveUsed" value="{{ $vacationLeaveUsed }}">
                                            <span><strong>VL USED</strong></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="vacation__leave__balance" class="form-group has-float-label">
                                            <input type="number" class="form-control" id="vacation__leave__balance"
                                                disabled name="vacationLeaveBalance"
                                                value="{{ (float) ($vacationLeaveEarned - $vacationLeaveUsed) }}">
                                            <span><strong>VL BALANCE</strong></span>
                                        </label>
                                    </div>

                                    <div class="col-lg-12 m-0 p-0">
                                        <hr>
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="sick__leave__earned" class="form-group has-float-label">
                                            <input type="number" id="sick__leave__earned" class="form-control" disabled
                                                name="sickLeaveEarned" value="{{ $sickLeaveEarned }}">
                                            <span><strong>SL EARNED</strong></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="sick__leave__used" class="form-group has-float-label">
                                            <input type="number" class="form-control" id="sick__leave__used" disabled
                                                name="sickLeaveUsed" value="{{ $sickLeaveUsed }}">
                                            <span><strong>SL USED</strong></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="sick__leave__balance" class="form-group has-float-label">
                                            <input type="number" class="form-control" id="sick__leave__balance" disabled
                                                name="sickLeaveBalance"
                                                value="{{ (float) ($sickLeaveEarned - $sickLeaveUsed)  }}">
                                            <span><strong>SL BALANCE</strong></span>
                                        </label>
                                    </div>
                                    
                                    <div class="col-lg-12">
                                        <hr>
                                        <label for="total__balance" class="form-group has-float-label">
                                            <input type="number" class="form-control" id="total__balance" disabled
                                                name="totalBalance"
                                                value="{{ (float) ($vacationLeaveEarned - $vacationLeaveUsed) + ($sickLeaveEarned - $sickLeaveUsed) }}">
                                            <span><strong>TOTAL BALANCE</strong></span>
                                        </label>
                                    </div>

                                    <div class="col-lg-12 p-0 m-0">
                                        <hr>
                                    </div>

                                    <div class="col-lg-12">
                                        <label for="mandatory__leave__balance" class="form-group has-float-label mt-4">
                                            <input type="number" class="form-control" id="mandatory__leave__balance" disabled
                                                value="5" name="mandatoryLeaveBalance">
                                            <span><strong>MANDATORY LEAVE</strong></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 pl-0 pt-0">
                            <label for="commutation" class="form-group has-float-label">
                                <select class="form-control" id="commutation" name="communication">
                                    <option readonly selected value="REQUESTED">REQUESTED</option>
                                    <option value="NOT REQUESTED">NOT REQUESTED</option>
                                </select>
                                <span><strong>COMMUTATION<span class="text-danger">*</span></strong></span>
                            </label>
                            <label for="recoApproval" class="form-group has-float-label">
                                <input class="form-control" name="recommendingApproval" id="recommendingApproval"
                                    disabled value="4994">
                                <span><strong>RECOMMENDING APPROVAL<span class="text-danger">*</span></strong></span>
                            </label>
                            <label for="approveBy" class="form-group has-float-label">
                                <input class="form-control" name="approveBy" id="approvedBy" disabled
                                    value="{{ $approvedBy->OfficeHead }}">
                                <span><strong>APPROVED BY<span class="text-danger">*</span></strong></span>
                            </label>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="text-white shadow btn btn-primary" id="btn--apply--for--leave">
                                <div class="spinner-border spinner-border-sm text-light d-none" id="apply-spinner"
                                    role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <i class="la la-user-plus" id="apply-button-icon"></i>

                                Apply for Leave
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@push('page-scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.js"></script>
<script src="{{ asset('/assets/js/custom/leave/leave.js') }}"></script>
<script>
    const ROUTE                        = "{{ route('employee.leave.application.filling.submit') }}";
    const VACATION_LEAVE_EARNED        = "{{ $vacationLeaveEarned }}";
    const SICK_LEAVE_EARNED            = "{{ $sickLeaveEarned }}";
    const vacationLeaveIncaseOf        = ['WITHIN THE PHILIPPINES', 'ABROAD'];
    const sickLeaveIncaseOf            = ['IN HOSPITAL', 'OUT PATIENT'];
    const ALREADY_HAVE_PENDING_FILE    = 423;
    const CANNOT_ACCESS_SELECTED_LEAVE = 424;
    const SPACE                        = new RegExp(/\s+/, "ig");
    const LEAVE_TYPES                  = new Map([]);

    let types = JSON.parse($('meta[name="leave-types"]').attr('content'));

    // Function to create a key value pair Map for leave types.
    types.forEach((type) => LEAVE_TYPES.set(type.name.replace(SPACE, '_'), type.code_number));

    // Function to get the other information of selected leave type.
    let getSelectedLeaveTypeData = (types, selectedType) => types.find(type => type.code_number == selectedType);
    
    // Function to calculate the # of weekends by range.
    let getNoOfWeekendInRange = (periodStart, periodEnd) => {
        let i = 0;
        let noOfWeekEnds = 0;
        while (i < moment(periodEnd).diff(periodStart, 'days')) {
            let date = moment(periodStart).add(i, 'days');
            if(date.format('dddd').toLowerCase() === 'saturday' || date.format('dddd').toLowerCase() === 'sunday') {
                noOfWeekEnds++;
            }
            i++;
        }

        return noOfWeekEnds;
    };

    // When user select a type of leave.
    $('#typeOfLeave').change(function (e) {
        let selectedType = $('#typeOfLeave').val();

        let type = getSelectedLeaveTypeData(types, selectedType);

        // Initialize value of Incase of.
        let incaseOf = [];

        switch (type.code_number) {
            case LEAVE_TYPES.get('MANDATORY_LEAVE'):
                    $('#inCaseOfContainer').addClass('d-none');
                    $('#withPay, #withoutPay').attr('disabled', true);
                break;

            case LEAVE_TYPES.get('VACATION_LEAVE'):
                    incaseOf = vacationLeaveIncaseOf;
                    $('#inCaseOfContainer').removeClass('d-none');
                break;

            case LEAVE_TYPES.get('SICK_LEAVE'):
                    incaseOf = sickLeaveIncaseOf;
                    $('#inCaseOfContainer').removeClass('d-none');
                    $('#withPay, #withoutPay').attr('disabled', false);
                break;
        }

        // Remove options of in case of select element
        $('#inCaseOf').children().remove();
        
        // Dynamically insert value for incase of.
        incaseOf.map((data) => $('#inCaseOf').append(`<option value="${data}">${data}</option>`));
    });


    $('#startDate').change(function () {
        let period = moment($('#endDate').val()).diff($('#startDate').val(), 'days');
        let POINTS = 0;

        $('#noOfDays').val(period);


        let type = getSelectedLeaveTypeData(types, $('#typeOfLeave').val());

        if(type.code_number === LEAVE_TYPES.get('MANDATORY_LEAVE')) {
            POINTS = 5;
        } else if(LEAVE_TYPES.get('VACATION_LEAVE')) {
            POINTS = VACATION_LEAVE_EARNED;
        } else if(LEAVE_TYPES.get('SICK_LEAVE')) {
            POINTS = SICK_LEAVE_EARNED;
        }

        $('#insufficient_points_error').remove();
        if(POINTS <= Math.abs(period)) {
            $('#formErrors').prepend(`<span id="insufficient_points_error">- Insufficient Leave points <br></span>`);
        } else {
            $('#earnedLess').val(period || 0);
            $('#earnedRemaining').val((POINTS - period) || 0);
        }
    });

    $('#endDate').change(function () {
        let rangePeriod = {
            start : moment($('#startDate').val()),
            end : moment($('#endDate').val()),
        };

        if(rangePeriod.end.format('dddd').toLowerCase() === 'saturday' || rangePeriod.end.format('dddd').toLowerCase() === 'sunday') {
            return '';
        }
        
        let period = (moment(rangePeriod.end).diff(rangePeriod.start, 'days') - getNoOfWeekendInRange(rangePeriod.start, rangePeriod.end)) +1;

        let POINTS = 0;

        $('#noOfDays').val(period);

        let type = getSelectedLeaveTypeData(types, $('#typeOfLeave').val());

        if(type.code_number === LEAVE_TYPES.get('MANDATORY_LEAVE')) {
            POINTS = 5;
        } else if(LEAVE_TYPES.get('VACATION_LEAVE')) {
            POINTS = VACATION_LEAVE_EARNED;
        } else if(LEAVE_TYPES.get('SICK_LEAVE')) {
            POINTS = SICK_LEAVE_EARNED;
        }

        $('#insufficient_points_error').remove();
        if(POINTS <= Math.abs(period)) {
            $('#formErrors').prepend(`<span id="insufficient_points_error">- Insufficient Leave points <br></span>`);
        } else {
            $('#earnedLess').val(period || 0);
            $('#earnedRemaining').val((POINTS - period) || 0);
        }
    });


    $('#submitLeaveFileButton').submit(function (e) {
        e.preventDefault();


        $('#apply-spinner').removeClass('d-none');
        $('#apply-button-icon').addClass('d-none');

        let data = {
            dateApply           : $('#dateApply').val(),
            typeOfLeave         : $('#typeOfLeave').val(),
            inCaseOf            : $('#inCaseOf').val(),
            noOfDays            : $("#noOfDays").val(),
            startDate           : $('#startDate').val(),
            endDate             : $('#endDate').val(),
            earned              : $('#earned').val(),
            earnedLess          : $('#earnedLess').val(),
            earnedRemaining     : $('#earnedRemaining').val(),
            commutation         : $('#commutation').val(),
            recommendingApproval: $('#recommendingApproval').val(),
            approvedBy          : $('#approvedBy').val(),
        };

        $.ajax({
            url: ROUTE,
            method: 'POST',
            data: data,
            success: function (response) {
                $('#formErrors').addClass('d-none').html('');
                $('#apply-spinner').addClass('d-none');
                $('#apply-button-icon').removeClass('d-none');

                if (response.success) {

                    Object.keys(data).map((elementID) => {
                        $(`${elementID}`).removeClass('is-invalid');
                    });

                    swal({
                        title: "Good Job!",
                        text: "Your leave application successfully submit plesae wait for the approval.",
                        icon: "success",
                        timer: 5000
                    });
    
                    data.fullname = response.fullname;

                    // socket.emit(`submit_application_for_leave`, data);
                    // socket.emit('notify_administrator', { arguments : `${response.fullname}|NOTIFY_ADMINISTRATOR`});
                    socket.emit('service_notify_administrator', { arguments : `${response.fullname}|NOTIFY_ADMINISTRATOR`});
                }
            },
            error: function (response) {
                $('#apply-spinner').addClass('d-none');
                $('#apply-button-icon').removeClass('d-none');

                if (response.status == 422) {
                    Object.keys(data).map((elementID) => {
                        $(`${elementID}`).removeClass('d-none');
                    });

                    $('#formErrors').removeClass('d-none').html('');
                    Object.keys(response.responseJSON.errors).map((fieldID) => {
                        let [message] = response.responseJSON.errors[fieldID];
                        if (fieldID.includes('typeOf')) {
                            // Select field with select picker.
                            $('button[data-id="typeOfLeave"]').addClass(
                                'border border-danger');
                        } else {
                            $(`#${fieldID}`).addClass('is-invalid');
                        }
                        
                        $('#formErrors').append(`<span>- ${message}</span> <br>`);
                    });
                } else if (response.status == ALREADY_HAVE_PENDING_FILE) {
                    swal('Oops!', response.responseJSON.message, 'error');
                } else if(response.status === CANNOT_ACCESS_SELECTED_LEAVE) {
                    swal('Oops!', response.responseJSON.message, 'error');
                }
            }
        });
    });

</script>
@endpush
@endsection
