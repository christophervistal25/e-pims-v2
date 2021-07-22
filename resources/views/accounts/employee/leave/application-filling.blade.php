@extends('accounts.employee.layouts.app')
@section('title', 'Leave Application Filing')
@prepend('page-css')
<link rel="stylesheet"
    href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endprepend
@prepend('meta-data')
<meta name="holiday-types" content="{{ $types->toJson() }}">
@endprepend
@section('content')

<div class="p-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card ">
                    <div class="card-body">
                        <form method="POST" id="apply__for__leave__form">
                        <div class="alert alert-secondary text-center font-weight-bold">LEAVE APPLICATION FILING</div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6 border border-bottom-0 border-left-0 border-top-0">
                                <h6 class="text-sm text-center">&nbsp;</h6>
                                <label for="date__apply" class="form-group has-float-label">
                                    <input 
                                        type="date" 
                                        name="dateApply" 
                                        id="date__apply"
                                        class="form-control"
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
                                <label for="type__of__leave" class="form-group has-float-label">
                                    <select 
                                        class="form-control selectpicker border" 
                                        id="type__of__leave"
                                        name="selectedLeave"
                                        data-live-search="true">
                                        <option selected disabled value="">-------------------------</option>
                                        @foreach($types->groupBy('category') as $category => $type)
                                        <optgroup class="text-uppercase" label="{{ $category }}">
                                            @foreach($type as $t)
                                            <option data-code="{{  $t->code }}" value="{{ $t->id }}">{{ $t->name }}
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
                                <label for="incase__of" class="form-group has-float-label">
                                    <select 
                                        class="form-control"
                                        id="incase__of" 
                                        name="inCaseOfLeave"
                                        disabled>
                                    </select>
                                    <span id="in_case_of__label"><strong>IN CASE OF</strong></span>
                                </label>
                                <label for="no__of__days" class="form-group has-float-label">
                                    <input 
                                    type="number" 
                                    class="form-control" 
                                    id="no__of__days" 
                                    name="numberOfDays"
                                    readonly>
                                    <span><strong>NUMBER OF DAYS<span class="text-danger">*</span></strong></span>
                                </label>
                                <hr>
                                {{-- <label for="specify" class="form-group has-float-label">
                                <input type="text" class="form-control" name="specify" id="specify"
                                    style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span><strong>PLEASE SPECIFY:</strong></span>
                            </label> --}}
                                <div class="col-auto p-0">
                                    <label for="start__date" class="form-group has-float-label">
                                        <input 
                                        type="date" 
                                        class="form-control" 
                                        id="start__date" 
                                        name="startDate"
                                        readonly>
                                        <span id="start__date__label"><strong>START DATE</strong></span>
                                    </label>
                                </div>

                                <div class="col-auto p-0">
                                    <label for="end__date" class="form-group has-float-label">
                                        <input 
                                            type="date" 
                                            class="form-control" 
                                            id="end__date" 
                                            name="endDate"
                                            readonly>
                                        <span id="end__date__Label"><strong>END DATE</strong></span>
                                    </label>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-4">
                                        <label for="earned" class="form-group has-float-label">
                                            <input 
                                            type="text"
                                            id="earned"
                                            class="form-control"
                                            name="earned"
                                            readonly>
                                            <span id="earnedLabel"><strong>EARNED</strong></span>
                                        </label>
                                    </div>
                                    <div class="col-4">
                                        <label for="earnedLess" class="form-group has-float-label">
                                            <input 
                                            type="text" 
                                            id="earned__less" 
                                            class="form-control" 
                                            name="earned__less"
                                            readonly>
                                            <span id="earnedLessLabel"><strong>LESS</strong></span>
                                        </label>

                                    </div>
                                    <div class="col-4">
                                        <label for="earnedRemain" class="form-group has-float-label">
                                            <input
                                            type="text"
                                            id="earned__remain"
                                            class="form-control"
                                            name="earnedRemain"
                                            readonly>
                                            <span id="earnedRemainLabel"><strong>REMAINING</strong></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h6 class="text-sm text-center font-weight-medium">LEAVE CREDITS</h6>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="asOf" class="form-group has-float-label">
                                            <input 
                                                type="date" 
                                                id="asOf" 
                                                class="form-control" 
                                                disabled
                                                name="balanceAsOfDate"
                                                value="{{ $forwardBalanceAsOfDate }}">
                                            <span><strong>AS OF</strong></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="vacation__leave__earned" class="form-group has-float-label">
                                            <input 
                                                type="number" 
                                                class="form-control" 
                                                id="vacation__leave__earned"
                                                disabled
                                                name="vacationLeaveEarned"
                                                value="{{ $vacationLeaveEarned }}">
                                            <span><strong>VL EARNED</strong></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="vacation__leave__used" class="form-group has-float-label">
                                            <input 
                                                type="number" 
                                                class="form-control" 
                                                id="vacation__leave__used"
                                                disabled 
                                                name="vacationLeaveUsed"
                                                value="{{ $vacationLeaveUsed }}">
                                            <span><strong>VL USED</strong></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="vacation__leave__balance" class="form-group has-float-label">
                                            <input 
                                                type="number" 
                                                class="form-control" 
                                                id="vacation__leave__balance"
                                                disabled
                                                name="vacationLeaveBalance"
                                                value="{{ (float) ($vacationLeaveEarned - $vacationLeaveUsed) }}">
                                            <span><strong>VL BALANCE</strong></span>
                                        </label>
                                    </div>

                                    <div class="col-lg-12 m-0 p-0">
                                        <hr>
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="sick__leave__earned" class="form-group has-float-label">
                                            <input 
                                                type="number" 
                                                id="sick__leave__earned" 
                                                class="form-control" 
                                                disabled
                                                name="sickLeaveEarned"
                                                value="{{ $sickLeaveEarned }}">
                                            <span><strong>SL EARNED</strong></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="sick__leave__used" class="form-group has-float-label">
                                            <input 
                                                type="number" 
                                                class="form-control" 
                                                id="sick__leave__used" 
                                                disabled
                                                name="sickLeaveUsed"
                                                value="{{ $sickLeaveUsed }}">
                                            <span><strong>SL USED</strong></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="sick__leave__balance" class="form-group has-float-label">
                                            <input 
                                                type="number" 
                                                class="form-control" 
                                                id="sick__leave__balance" 
                                                disabled
                                                name="sickLeaveBalance"
                                                value="{{ (float) ($sickLeaveEarned - $sickLeaveUsed)  }}">
                                            <span><strong>SL BALANCE</strong></span>
                                        </label>
                                    </div>

                                    <div class="col-lg-12">
                                        <label for="total__balance" class="form-group has-float-label">
                                            <input 
                                                type="number" 
                                                class="form-control" 
                                                id="total__balance" 
                                                disabled 
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
                            {{-- <div class="col-lg-4" id="employee__image__container">
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

                        </div> --}}
                        </div>
                        <div class="col-lg-12 col-sm-12 pl-0 pt-0">
                            <label for="commutation" class="form-group has-float-label">
                                <select 
                                    class="form-control" 
                                    id="commutation" 
                                    name="communication">
                                    <option readonly selected value="REQUESTED">REQUESTED</option>
                                    <option value="NOT REQUESTED">NOT REQUESTED</option>
                                </select>
                                <span><strong>COMMUTATION<span class="text-danger">*</span></strong></span>
                            </label>
                            <label for="recoApproval" class="form-group has-float-label">
                                <input 
                                    class="form-control" 
                                    name="recommendingApproval" 
                                    id="recommending__approval" 
                                    disabled
                                    value="{{ $hrOfficeHead }}">
                                <span><strong>RECOMMENDING APPROVAL<span class="text-danger">*</span></strong></span>
                            </label>
                            <label for="approveBy" class="form-group has-float-label">
                                <input 
                                    class="form-control" 
                                    name="approveBy" 
                                    id="approved__by" 
                                    disabled
                                    value="{{ $approvedBy }}">
                                <span><strong>APPROVED BY<span class="text-danger">*</span></strong></span>
                            </label>
                            {{-- <label for="appStatus" class="form-group has-float-label">
                            <select name="appStatus" class="custom-select" id="appStatus"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;" disabled>
                                <option value="approved">APPROVED</option>
                                <option value="pending">PENDING</option>
                            </select>
                            <span><strong>APPLICATION STATUS<span class="text-danger">*</span></strong></span>
                        </label> --}}
                        </div>
                        <div class="text-right">
                            <button type="submit" class="text-white shadow btn btn-primary" id="btn__apply__for__leave">
                                <i class="la la-user-plus"></i> Apply for Leave
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
<script src="https://cdn.socket.io/3.1.1/socket.io.min.js" integrity="sha384-gDaozqUvc4HTgo8iZjwth73C6dDDeOJsAgpxBcMpZYztUfjHXpzrpdrHRdVp8ySO" crossorigin="anonymous"></script>
<script>
    const socket = io.connect("{{ env('MIX_SOCKET_IP') }}");
    const ROUTE = "{{ route('employee.leave.application.filling.submit') }}";
    const VACATION_LEAVE_EARNED = "{{ $vacationLeaveEarned }}";
    const SICK_LEAVE_EARNED = "{{ $sickLeaveEarned }}";


    let checkEarnedPoints = (period_days, earned_points) => new Promise((resolve, reject) => {
        if (earned_points >= period_days) {
            resolve({
                earned_points,
                period_days
            });
        }
        reject(new Error('Insufficient earned points'));
    });

    $('#type__of__leave').change(function (e) {
        let selectedLeaveTypeID = $(this).val();
        let type = {};
        let types = JSON.parse($('meta[name="holiday-types"]').attr('content'));

        [type] = types.filter((leaveType) => leaveType.id == selectedLeaveTypeID);


        if (type.code.toUpperCase() === 'SL') {
            checkEarnedPoints(type.days_period, SICK_LEAVE_EARNED).then((data) => {
                $('#in_case_of__label').text(`IN CASE OF ${type.name}`);

                $('#no__of__days').val(type.days_period);

                $('#start__date').val(moment().format('YYYY-MM-DD'));

                $('#end__date').val(moment($('#start__date').val()).add(type.days_period, 'days')
                    .format(
                        'YYYY-MM-DD'));

                $('#incase__of').attr('disabled', false)
                    .append(`<option value="in_hospital">IN HOSPITAL</option>`)
                    .append(`<option value="out_patient">OUT PATIENT</option>`);

                $('#earned').val(data.earned_points);

                $('#start__date, #end__date').attr('readonly', false);

                $('#earned__less').val(data.period_days);

                $('#earned__remain').val(parseFloat(data.earned_points - data.period_days));
            }).catch((fail) => {
                $('#earned__less').val(parseFloat(SICK_LEAVE_EARNED - type.days_period));
                $('#earned__remain').val(0.000);
            });
        } else if (type.code.toUpperCase() === 'VL') {
            $('#in_case_of__label').text(`IN CASE OF ${type.name}`);
            $('#incase__of')
                .append(`<option value="within_the_philippines">WITHIN THE PHILIPPINES</option>`)
                .append(`<option value="abroad">ABROAD</option>`);

            $('#start__date').val(moment().add(5, 'days').format('YYYY-MM-DD'));

            $('#earned').val(VACATION_LEAVE_EARNED);
        } else {
            $('#incase__of').attr('readonly', true)
                .children()
                .remove();
            $('#in_case_of__label').text(`IN CASE OF`);
        }
    });

    $('#start__date').change(function () {
        let startDate = moment($('#start__date').val())
        let dateNow = moment();
        let startDateMoreThanFiveDays = startDate.diff(dateNow, 'days') >= 5;

        // if(!startDateMoreThanFiveDays) {
        //     alert('You must select five days after file');
        // }

    });

    $('#end__date').change(function () {
        let startDate = $('#start__date').val();
        let endDate = $('#end__date').val();

        // Calculate no. of days ask for leave.
        $('#no__of__days').val(moment(endDate).diff(startDate, 'days'));

        let period = $('#no__of__days').val();

        checkEarnedPoints(period, SICK_LEAVE_EARNED).then((data) => {
            $('#start__date, #end__date').attr('readonly', false);
            $('#earned__less').val(parseFloat(SICK_LEAVE_EARNED - period));
            let remaining = $('#earned').val() - $('#earned__less').val();
            $('#earned__remain').val(parseFloat(remaining));
        }).catch((fail) => {
            $('#earned__less').val(parseFloat(SICK_LEAVE_EARNED - period));
            $('#earned__remain').val(0.000);
        });
    });

    $('#apply__for__leave__form').submit(function (e) {
        e.preventDefault();
        
        let data = {
            dateApply : $('#date__apply').val(),
            typeOfLeave : $('#type__of__leave').val(),
            inCaseOf : $('#incase__of').val(),
            noOfDays : $("#no__of__days").val(),
            startDate : $('#start__date').val(),
            endDate : $('#end__date').val(),
            earned : $('#earned').val(),
            earnedLess : $('#earned__less').val(),
            earnedRemaining : $('#earned__remain').val(),
            commutation : $('#commutation').val(),
            recommendingApproval : $('#recommending__approval').val(),
            approvedBy : $('#approved__by').val(),
            fullname : '',
        };

        $.ajax({
            url : ROUTE,
            method : 'POST',
            data : data,
            success : function (response) {
                if(response.success) {
                    swal({
                        title: "Good Job!",
                        text: "Your leave application successfully submit plesae wait for the approval.",
                        icon: "success",
                        timer: 5000
                    });

                    data.fullname = response.fullname;

                    socket.emit(`submit_application_for_leave`, data);
                }
            },
        });

    });

</script>
@endpush
@endsection
