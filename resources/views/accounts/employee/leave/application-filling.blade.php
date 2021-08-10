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
            <div class="card shadow-sm">
                <div class="card-body">
                    <form method="POST" id="apply--for--leave--form">
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
                                    <select class="form-control selectpicker border" id="typeOfLeave"
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
                                {{-- <label for="typeOthers" class="form-group has-float-label">
                            <input type="text" name="typeOthers" id="typeOthers" class="form-control">
                            <span><strong>IF OTHERS IS SELECTED</strong></span>
                        </label> --}}
                                <label for="inCaseOf" class="form-group has-float-label">
                                    <select class="form-control" id="inCaseOf" name="inCaseOfLeave"></select>
                                    <span id="in_case_of__label"><strong>IN CASE OF <span
                                                class='text-danger'>*</span></strong></span>
                                </label>
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
                                    <div class="col-4">
                                        <label for="earned" class="form-group has-float-label">
                                            <input type="text" id="earned" class="form-control" name="earned" >
                                            <span id="earnedLabel"><strong>EARNED</strong></span>
                                        </label>
                                    </div>
                                    <div class="col-4">
                                        <label for="earnedLess" class="form-group has-float-label">
                                            <input type="text" id="earnedLess" class="form-control" name="earnedLess"
                                                >
                                            <span id="earnedLessLabel"><strong>LESS</strong></span>
                                        </label>

                                    </div>
                                    <div class="col-4">
                                        <label for="earnedRemain" class="form-group has-float-label">
                                            <input type="text" id="earnedRemaining" class="form-control"
                                                name="earnedRemain" >
                                            <span id="earnedRemainLabel"><strong>REMAINING</strong></span>
                                        </label>
                                    </div>

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
                                        <label for="sick__leave__balance" class="form-group has-float-label mt-4">
                                            <input type="number" class="form-control" id="sick__leave__balance" disabled
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
                                    disabled value="{{ $hrOfficeHead }}">
                                <span><strong>RECOMMENDING APPROVAL<span class="text-danger">*</span></strong></span>
                            </label>
                            <label for="approveBy" class="form-group has-float-label">
                                <input class="form-control" name="approveBy" id="approvedBy" disabled
                                    value="{{ $approvedBy }}">
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
<script src="{{ asset('/assets/js/custom/leave/leave.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.js"></script>
{{-- <script src="https://cdn.socket.io/3.1.1/socket.io.min.js" integrity="sha384-gDaozqUvc4HTgo8iZjwth73C6dDDeOJsAgpxBcMpZYztUfjHXpzrpdrHRdVp8ySO" crossorigin="anonymous"></script> --}}
<script>
    // const socket = io.connect("{{ env('MIX_SOCKET_IP') }}");
    const ROUTE = "{{ route('employee.leave.application.filling.submit') }}";
    const VACATION_LEAVE_EARNED = "{{ $vacationLeaveEarned }}";
    const SICK_LEAVE_EARNED = "{{ $sickLeaveEarned }}";

    let types = $('meta[name="leave-types"]').attr('content');


    $('#typeOfLeave').change(function (e) {
        let selectedType = $(this).val();
        let [type] = JSON.parse(types).filter((type) => type.code_number == selectedType);

        $('#inCaseOf').children().remove();

        $('#earned').val(0);
        $('#earnedLess').val(0);
        $('#earnedRemaining').val(0);

        switch (type.code_number) {
            case 10003:
                $('#endDate').val(moment().add(5, 'days').format('YYYY-MM-DD'));
                break;

            case 10002:
                
                $('#inCaseOf').attr('disabled', false)
                            .append(
                                `<option value="within_the_philippines">WITHIN THE PHILIPPINES</option>`)
                            .append(`<option value="abroad">ABROAD</option>`);

                LeaveApplicationHelper.points(type.days_period, VACATION_LEAVE_EARNED)
                    .then((data) => {
                        $('#error_message_for_points').html('');

                        // Set data for earned, less, and remaining.
                        $('#earned').val(data.earned_points);
                        $('#earnedLess').val(data.period_days);
                        $('#earnedRemaining').val(parseFloat(data.earned_points - data.period_days));

                        // Insert values for in case of, by type.
                        $('#in_case_of__label').text(`IN CASE OF ${type.name}`);
                    });

                    // .catch((fail) => {
                    //     // Disabled date fields and in case of.
                    //     $('#startDate, #endDate').attr('readonly', true);
                    //     $('#inCaseOf').attr('disabled', true);

                    //     // Remove values for in case of, by type.
                    //     $('#in_case_of__label').text(`IN CASE OF`);
                    //     $('#inCaseOf').children().remove();
                    // })
                break;

            case 10001:
                $('#inCaseOf').attr('disabled', false)
                            .append(`<option value="in_hospital">IN HOSPITAL</option>`)
                            .append(`<option value="out_patient">OUT PATIENT</option>`);

                LeaveApplicationHelper.points(type.days_period, SICK_LEAVE_EARNED)
                    .then((data) => {
                        $('#error_message_for_points').html('');
                        // Set data for earned, less, and remaining.
                        $('#earned').val(data.earned_points);
                        $('#earnedLess').val(data.period_days);
                        $('#earnedRemaining').val(parseFloat(data.earned_points - data.period_days));
                        
                        // Insert values for in case of, by type.
                        $('#in_case_of__label').text(`IN CASE OF ${type.name}`);
                    });
                break;

            default:

        }



    });

    $('#startDate').change(function () {
        let startDate = $('#startDate').val()
        let endDate = $('#endDate').val();

        let dateNow = moment();

        let startDateDay = moment(startDate);
        let endDateDay = moment(endDate);

        $('#noOfDays').val(endDateDay.diff(startDateDay, 'days'));


        let period = $('#noOfDays').val();

        LeaveApplicationHelper.points(period, VACATION_LEAVE_EARNED).then((data) => {
            $('#earnedLess').val(parseFloat(data.period_days));

            let remaining = $('#earned').val() - $('#earnedLess').val();

            $('#earnedRemaining').val(parseFloat(remaining));
        }).catch((fail) => {
            let need = parseFloat(fail.earned_points - fail.period_days);
            $('#earnedLess').val(0.000);
            $('#earnedRemaining').val(0.000);
            if (need <= 0) {
                $('#error_message_for_points').html('').html(
                    `<p class='text-danger font-weight-bold'>${fail.message} you need ${Math.abs(need)} or more points.</p>`
                    );
            }
        });

    });

    $('#endDate').change(function () {
        let startDate = $('#startDate').val();
        let endDate = $('#endDate').val();
        let selectedLeaveType = $('#typeOfLeave').val();
        let points = 0;

        let [type] = JSON.parse(types).filter((type) => type.code_number == selectedLeaveType);

        switch (type.code_number) {
            case 10003:
                points = 5;
                break;

            case 10002:
                points = VACATION_LEAVE_EARNED;
                break;

            case 10001:
                points = SICK_LEAVE_EARNED;
                break;
        }


        // Calculate no. of days ask for leave.
        $('#noOfDays').val(moment(endDate).diff(startDate, 'days'));

        let period = $('#noOfDays').val();

        LeaveApplicationHelper.points(period, points).then((data) => {
            $('#error_message_for_points').html('');
            $('#earnedLess').val(parseFloat(data.period_days));

            let remaining = $('#earned').val() - $('#earnedLess').val();

            $('#earnedRemaining').val(parseFloat(remaining));
        }).catch((fail) => {
            let need = parseFloat(fail.earned_points - fail.period_days);
            $('#earnedLess').val(0.000);
            $('#earnedRemaining').val(0.000);
            $('#error_message_for_points').html('').html(
                `<p class='text-danger font-weight-bold'>${fail.message} you need ${Math.abs(need)} or more points.</p>`
                );
        });
    });

    $('#apply--for--leave--form').submit(function (e) {
        e.preventDefault();
        $('#apply-spinner').removeClass('d-none');
        $('#apply-button-icon').addClass('d-none');
        let data = {
            dateApply: $('#dateApply').val(),
            typeOfLeave: $('#typeOfLeave').val(),
            inCaseOf: $('#inCaseOf').val(),
            noOfDays: $("#noOfDays").val(),
            startDate: $('#startDate').val(),
            endDate: $('#endDate').val(),
            earned: $('#earned').val(),
            earnedLess: $('#earnedLess').val(),
            earnedRemaining: $('#earnedRemaining').val(),
            commutation: $('#commutation').val(),
            recommendingApproval: $('#recommendingApproval').val(),
            approvedBy: $('#approvedBy').val(),
        };

        $.ajax({
            url: ROUTE,
            method: 'POST',
            data: data,
            success: function (response) {
                $('#apply-spinner').addClass('d-none');
                $('#apply-button-icon').removeClass('d-none');
                if (response.success) {
                    swal({
                        title: "Good Job!",
                        text: "Your leave application successfully submit plesae wait for the approval.",
                        icon: "success",
                        timer: 5000
                    });

                    data.fullname = response.fullname;

                    // socket.emit(`submit_application_for_leave`, data);
                }
            },
            error: function (response) {
                $('#apply-spinner').addClass('d-none');
                $('#apply-button-icon').removeClass('d-none');

                if (response.status == 422) {
                    Object.keys(response.responseJSON.errors).map((fieldID) => {
                        let [message] = response.responseJSON.errors[fieldID];

                        if (fieldID.includes('typeOf')) {
                            // Select field with select picker.
                            $('button[data-id="typeOfLeave"]').addClass(
                                'border border-danger');
                        } else {
                            $(`#${fieldID}`).addClass('is-invalid');
                        }
                    });
                } else if (response.status == 423) {
                    swal('Oops!', response.responseJSON.message, 'error');
                } else if(response.status === 424) {
                    swal('Oops!', response.responseJSON.message, 'error');
                }
            }
        });

    });

</script>
@endpush
@endsection
