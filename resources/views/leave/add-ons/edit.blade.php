@extends('layouts.app')
@section('title', 'Edit Leave Application Filing')
@prepend('page-css')
<link rel="stylesheet"
    href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />
<link rel="stylesheet" href="/assets/css/style.css">
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
            <div class="card">
                    <div class="card-body">
                        <form action="{{ route('leave-list.update', $data->id) }}" method="POST" id="updateLeaveForm">
                        @csrf
                        @method('PUT')

                        <div class="alert alert-secondary text-center font-weight-bold">LEAVE APPLICATION FILING</div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6 border border-bottom-0 border-left-0 border-top-0">
                                <h6 class="text-sm text-left font-weight-medium">EMPLOYEE NAME</h6>

                                <input type="number" name="employeeID" class="form-control" id="employeeId" value="{{ old('employeeID') ?? $types->employee_id }}" hidden>

                                <label class="has-float-label" for="employeeName">
                                    <input type="text" name="employeeName" class="form-control" id="employeeName"
                                        value="{{ old('employeeName') ?? $types->lastname }}, {{ old('employeeName') ?? $types->firstname }} {{ old('employeeName') ?? $types->middlename }}" style="color: white; margin-bottom: 15px; background: linear-gradient(90deg, rgba(148,0,132,1) 0%, rgba(253,29,29,1) 50%, rgba(252,176,69,1) 100%); font-weight: bold;"
                                        readonly style="outline: none; box-shadow: 0px 0px 0px;">
                                </label>

                                <label for="date__apply" class="form-group has-float-label">
                                    <input 
                                        type="date" 
                                        name="dateApply" 
                                        id="dateApplied"
                                        class="form-control"
                                        value="{{ old('dateApply') ?? $data->date_applied }}">
                                    <span>
                                        <strong>DATE APPLY
                                            <span class="text-danger">*</span>
                                        </strong>
                                    </span>
                                </label>

                
                                <label for="type__of__leave" class="form-group has-float-label">
                                    <select 
                                        class="form-control border" 
                                        id="leaveTypes"
                                        name="selectedLeave"
                                        value=""
                                        data-live-search="true">
                                        {{-- <option selected disabled value="">-------------------------</option> --}}
                                        @foreach($gender->groupBy('category') as $category => $type)
                                        <optgroup class="text-uppercase" label="{{ $category }}" value="{{ old('selectedLeave') ?? $data->leave_type_id }}">
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
                        
                                <label for="incase__of" class="form-group has-float-label">
                                    <input class="form-control" id="incaseOf" name="inCaseOfLeave" value="{{ old('inCaseOfLeave') ?? $data->incase_of }}">
                                    <span id="in__case__of__label"><strong>IN CASE OF<span class="text-danger">*</span></strong></span>
                                </label>

                                <label for="no__of__days" class="form-group has-float-label">
                                    <input 
                                    type="number" 
                                    class="form-control" 
                                    id="numberOfDays" 
                                    name="numberOfDays"
                                    value="{{ old('numberOfDays') ?? $data->no_of_days }}"
                                    readonly>
                                    <span><strong>NUMBER OF DAYS<span class="text-danger">*</span></strong></span>
                                </label>
                                <hr>
                            
                                <div class="col-auto p-0">
                                    <label for="start__date" class="form-group has-float-label">
                                        <input 
                                        type="date" 
                                        class="form-control" 
                                        id="dateStarted" 
                                        name="startDate"
                                        value="{{ old('startDate') ?? $data->date_from }}"
                                        readonly>
                                        <span id="start__date__label"><strong>START DATE<span class="text-danger">*</span></strong></span>
                                    </label>
                                </div>

                                <div class="col-auto p-0">
                                    <label for="end__date" class="form-group has-float-label">
                                        <input 
                                            type="date" 
                                            class="form-control" 
                                            id="dateEnded" 
                                            name="endDate"
                                            value="{{ old('endDate') ?? $data->date_to }}"
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
                                            name="earnedSickLeave"
                                            value="{{ $sickLeaveEarned }}"
                                            readonly>
                                            <span id="earnedLabel"><strong>EARNED</strong></span>
                                        </label>
                                    </div>
                                    <div class="col-4">
                                        <label for="earnedLess" class="form-group has-float-label">
                                            <input 
                                            type="text" 
                                            id="lessEarned" 
                                            class="form-control" 
                                            name="earned__less"
                                            value="{{ old('earned_less') ?? $data->no_of_days }}"
                                            readonly>
                                            <span id="earnedLessLabel"><strong>LESS</strong></span>
                                        </label>

                                    </div>
                                    <div class="col-4">
                                        <label for="earnedRemain" class="form-group has-float-label">
                                            <input
                                            type="text"
                                            id="remainEarned"
                                            class="form-control"
                                            name="earnedRemaing"
                                            value="{{ $sickLeaveEarned - $data->no_of_days }}"
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
                                                id="dateAsOf" 
                                                class="form-control" 
                                                disabled
                                                name="balanceAsOfDate"
                                                value="{{ old('balanceAsOfDate') ?? $asOfDate }}">
                                            <span><strong>AS OF</strong></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="vacation__leave__earned" class="form-group has-float-label">
                                            <input 
                                                type="number" 
                                                class="form-control" 
                                                id="vacationLeaveEarned"
                                                disabled
                                                name="vacationLeaveEarned"
                                                value="{{ old('vacationLeaveEarned') ?? $vacationLeave }}">
                                            <span><strong>VL EARNED</strong></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="vacation__leave__used" class="form-group has-float-label">
                                            <input 
                                                type="number" 
                                                class="form-control" 
                                                id="vacationLeaveUsed"
                                                disabled 
                                                name="vacationLeaveUsed"
                                                value="{{ old('vacationLeaveUsed') ?? $vacationLeaveUsed }}">
                                            <span><strong>VL USED</strong></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="vacation__leave__balance" class="form-group has-float-label">
                                            <input 
                                                type="number" 
                                                class="form-control" 
                                                id="vacationLeaveBalanced"
                                                disabled
                                                name="vacationLeaveBalance"
                                                value="{{ $vacationLeave - $vacationLeaveUsed }}">
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
                                                id="sickLeaveEarned" 
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
                                                id="sickLeaveUsed" 
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
                                                id="sickLeaveBalanced" 
                                                disabled
                                                name="sickLeaveBalance"
                                                value="{{ $sickLeaveEarned - $sickLeaveUsed }}">
                                            <span><strong>SL BALANCE</strong></span>
                                        </label>
                                    </div>

                                    <div class="col-lg-12">
                                        <label for="total__balance" class="form-group has-float-label">
                                            <input 
                                                type="number" 
                                                class="form-control" 
                                                id="totalLeaveBalance" 
                                                disabled 
                                                name="totalBalance"
                                                value="{{ ($vacationLeave - $vacationLeaveUsed) }}">
                                            <span><strong>TOTAL BALANCE</strong></span>
                                        </label>
                                    </div>

                                    <div class="col-lg-12 p-0 m-0">
                                        <hr>
                                    </div>

                                    <div class="col-lg-12">
                                        <label for="mandatory__leave__balance" class="form-group has-float-label mt-4">
                                            <input type="number" class="form-control" id="mandatoryLeaveBalance" disabled
                                                value="5" name="mandatoryLeaveBalance">
                                            <span><strong>MANDATORY LEAVE</strong></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-lg-12 col-sm-12 pl-0 pt-0">
                            <label for="commutation" class="form-group has-float-label">
                                <select 
                                    class="form-control" 
                                    id="commutation"
                                    name="commutation">
                                    <option readonly selected value="REQUESTED">REQUESTED</option>
                                    <option value="NOT REQUESTED">NOT REQUESTED</option>
                                </select>
                                <span><strong>COMMUTATION<span class="text-danger">*</span></strong></span>
                            </label>
                            <label for="recoApproval" class="form-group has-float-label">
                                <input 
                                    class="form-control" 
                                    name="recommendingApproval" 
                                    id="recommendingApproval"
                                    value="{{ old('recommendingApproval') ?? $data->recommending_approval }}">
                                <span><strong>RECOMMENDING APPROVAL<span class="text-danger">*</span></strong></span>
                            </label>
                            <label for="approvedBy" class="form-group has-float-label">
                                <input 
                                    class="form-control" 
                                    name="approvedBy" 
                                    id="approvedBy" 
                                    value="{{ old('approvedBy') ?? $data->approved_by }}">
                                <span><strong>APPROVED BY<span class="text-danger">*</span></strong></span>
                            </label>
                            
                        </div>
                        <div class="row mt-2 float-right">
                            <input type="date" name="dateApproved" id="dateApproved" class="form-control col-3 mr-3" value="{{ date('Y-m-d') }}" hidden>

                            <a href="/employee/leave/leave-list" class="btn btn-lg mr-3" style="background-color: orange; color: white;"><i class="la la-list"></i> Go back to List</a>
                            <button class="btn btn-danger btn-lg mr-3" id="btnReject"><i class="fas fa-thumbs-down"></i> Reject</button>
                            <button type="submit" class="btn btn-success btn-lg mr-4" id="btnApproved"><i class="far fa-thumbs-up"></i> Approved</i></button>
                        </div>
                        <div class="clearfix"></div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>


@push('page-scripts')
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    const ROUTE = "{{ route('employee.leave.application.filling.submit') }}";
    const VACATION_LEAVE_EARNED = "{{ $vacationLeave }}";
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

    $('#leaveTypes').change(function (e) {
        let selectedLeaveTypeID = $(this).val();
        let type = {};
        let types = JSON.parse($('meta[name="holiday-types"]').attr('content'));

        [type] = types.filter((leaveType) => leaveType.id == selectedLeaveTypeID);


        if (type.code.toUpperCase() === 'SL') {
            checkEarnedPoints(type.days_period, SICK_LEAVE_EARNED).then((data) => {
                $('#in_case_of__label').text(`IN CASE OF ${type.name}`);

                $('#numberOfDays').val(type.days_period);

                $('#dateStarted').val(moment().format('YYYY-MM-DD'));

                $('#dateEnded').val(moment($('#dateStarted').val()).add(type.days_period, 'days')
                    .format(
                        'YYYY-MM-DD'));

                $('#incaseOf').attr('disabled', false)
                    .append(`<option value="in_hospital">IN HOSPITAL</option>`)
                    .append(`<option value="out_patient">OUT PATIENT</option>`);

                $('#earned').val(data.earned_points);

                $('#dateStarted, #dateEnded').attr('readonly', false);

                $('#lessEarned').val(data.period_days);

                $('#remainEarned').val(parseFloat(data.earned_points - data.period_days));
            }).catch((fail) => {
                $('#lessEarned').val(parseFloat(SICK_LEAVE_EARNED - type.days_period));
                $('#remainEarned').val(0.000);
            });
        } else if (type.code.toUpperCase() === 'VL') {
            $('#in_case_of__label').text(`IN CASE OF ${type.name}`);
            $('#incaseOf')
                .append(`<option value="within_the_philippines">WITHIN THE PHILIPPINES</option>`)
                .append(`<option value="abroad">ABROAD</option>`);

            $('#dateStarted').val(moment().add(5, 'days').format('YYYY-MM-DD'));

            $('#earned').val(VACATION_LEAVE_EARNED);
        } else {
            $('#incaseOf').attr('readonly', true)
                .children()
                .remove();
            $('#in_case_of__label').text(`IN CASE OF`);
        }
    });

    $('#dateStarted').change(function () {
        let startDate = moment($('#dateStarted').val())
        let dateNow = moment();
        let startDateMoreThanFiveDays = startDate.diff(dateNow, 'days') >= 5;

        // if(!startDateMoreThanFiveDays) {
        //     alert('You must select five days after file');
        // }

    });

    $('#dateEnded').change(function () {
        let startDate = $('#dateStarted').val();
        let endDate = $('#dateEnded').val();

        // Calculate no. of days ask for leave.
        $('#numberOfDays').val(moment(endDate).diff(startDate, 'days'));

        let period = $('#numberOfDays').val();

        checkEarnedPoints(period, SICK_LEAVE_EARNED).then((data) => {
            $('#dateStarted, #dateEnded').attr('readonly', false);
            $('#lessEarned').val(parseFloat(SICK_LEAVE_EARNED - period));
            let remaining = $('#earned').val() - $('#lessEarned').val();
            $('#remainEarned').val(parseFloat(remaining));
        }).catch((fail) => {
            $('#lessEarned').val(parseFloat(SICK_LEAVE_EARNED - period));
            $('#remainEarned').val(0.000);
        });
    });

    $('#apply__for__leave__form').submit(function (e) {
        e.preventDefault();
        
        let data = {
            dateApply : $('#dateApplied').val(),
            typeOfLeave : $('#leaveTypes').val(),
            inCaseOf : $('#incaseOf').val(),
            noOfDays : $("#numberOfDays").val(),
            startDate : $('#dateStarted').val(),
            endDate : $('#dateEnded').val(),
            earned : $('#earned').val(),
            earnedLess : $('#lessEarned').val(),
            earnedRemaining : $('#remainEarned').val(),
            commutation : $('#commutation').val(),
            recommendingApproval : $('#recommendingApproval').val(),
            approvedBy : $('#approvedBy').val(),
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


    let btnApproved = document.querySelector('#btnApproved');

    btnApproved.addEventListener('click', (e)=> {
        e.preventDefault();
        let id = "{{ $data->id }}";

        let data = {
                employeeID : document.querySelector('#employeeId').value,
                recommendingApproval : document.querySelector('#recommendingApproval').value,
                approvedBy : document.querySelector('#approvedBy').value,
                selectedLeave : document.querySelector('#leaveTypes').value,
                dateApply : document.querySelector('#dateApplied').value,
                commutation : document.querySelector('#commutation').value,
                inCaseOfLeave : document.querySelector('#incaseOf').value,
                numberOfDays : document.querySelector('#numberOfDays').value,
                startDate : document.querySelector('#dateStarted').value,
                endDate: document.querySelector('#dateEnded').value,
                dateApproved : document.querySelector('#dateApproved').value
            };

        
        fetch(`/employee/leave/leave-list/${id}`, {
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
                }).then(res => res.json())
                .then((data) => {
        });

            swal("Good Job!", "You have successfully updated.", "success");
    });

</script>
@endpush
@endsection
