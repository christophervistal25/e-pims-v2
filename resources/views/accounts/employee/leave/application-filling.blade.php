@extends('accounts.employee.layouts.app')
@section('title', 'Leave Application Filing')
@prepend('page-css')
<script src="{{ asset('/js/app.js') }}" defer></script>
<link rel="stylesheet" href="/assets/css/custom.css" />
<link rel="stylesheet" href="/assets/css/style.css">
<link rel="stylesheet" href="{{ asset("/js/bootstrap-float-label.min.js") }}" />
<script src="{{ asset("/js/sweetalert.min.js") }}"></script>
<style>
    @media only screen and (max-width: 700px) {
        #button_group {
            display: flex;
            flex-direction: column;
        }

        #button_group>button {
            margin: 5px 0px 0px 0px;
            width: 82vw;
        }

    }

</style>
@endprepend
@prepend('meta-data')
<meta name="leave-types" content="{{ $types->toJson() }}">
@endprepend
@section('content')
<div class="row">
    <div class="d-flex col-lg-4">
        <div class="flex-fill">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <img class="mb-3 rounded-circle img-thumbnail" id="empPhoto" width="50%" src="{{asset('/assets/img/profiles/' . Auth::user()->Employee_id . '.jpg') }}" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="empName" class="form-group has-float-label bg-light">
                                <input type="hidden" id="employeeName" value="{{ $employee->Employee_id }}">
                                <input type="text" class='form-control' value="{{ $employee->fullname }}" readonly>
                                <span><strong>EMPLOYEE NAME</strong></span>
                            </label>

                            <label for="office" class="form-group has-float-label">
                                <input type="text" name="office" id="office" class="form-control bg-light" value="{{ $employee->office_charging->Description }}" style="outline: none; box-shadow: 0px 0px 0px transparent;" readonly>
                                <span class="font-weight-bold">OFFICE</span>
                            </label>
                            <label for="position" class="form-group has-float-label">
                                <input type="text" name="position" id="position" value="{{ $employee->position->Description }}" class="form-control bg-light" style="outline: none; box-shadow: 0px 0px 0px transparent;" readonly>
                                <span class="font-weight-bold">POSITION</span>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <hr class="mt-1 bg-secondary">
                            <div class="alert alert-warning text-center">
                                <strong>LEAVE BALANCES</strong>
                            </div>
                            <table class="table table-condensed table-sm" id="leaveBalanceTable">
                                <tbody>
                                    <tr>
                                        <td class="font-weight-bold">SICK LEAVE</td>
                                        <td class="text-right font-weight-bold" id="slBal">{{ number_format($leaveCredits['slBalance'], 3, ".", "") }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">VACATION LEAVE</td>
                                        <td class="text-right font-weight-bold" id="vlBal">{{ number_format($leaveCredits['vlBalance'], 3, ".", "") }}</td>
                                    </tr>
                                    <tr>
                                        <td>10-Day VAWC Leave</td>
                                        <td class="text-right" id="vawcBal">{{ number_format($leaveCredits['vawcBalance'], 3, ".", "") }}</td>
                                    </tr>
                                    <tr>
                                        <td>Adoption Leave</td>
                                        <td class="text-right" id="adoptBal">{{ number_format($leaveCredits['adoptBalance'], 3, ".", "") }}</td>
                                    </tr>
                                    <tr>
                                        <td>Mandatory Leave</td>
                                        <td class="text-right" id="mandatoryBal">{{ number_format($leaveCredits['mandatoryBalance'], 3, ".", "") }}</td>
                                    </tr>
                                    <tr>
                                        <td>Maternity Leave</td>
                                        <td class="text-right" id="maternityBal">{{ number_format($leaveCredits['maternityBalance'], 3, ".", "") }}</td>
                                    </tr>
                                    <tr>
                                        <td>Paternity Leave</td>
                                        <td class="text-right" id="paternityBal">{{ number_format($leaveCredits['paternityBalance'], 3, ".", "") }}</td>
                                    </tr>
                                    <tr>
                                        <td>Solo Parent Leave</td>
                                        <td class="text-right" id="soloparentBal">{{ number_format($leaveCredits['soloparentBalance'], 3, ".", "") }}</td>
                                    </tr>
                                    <tr>
                                        <td>Special Emergency Leave</td>
                                        <td class="text-right" id="emergencyBal">{{ number_format($leaveCredits['emergencyBalance'], 3, ".", "") }}</td>
                                    </tr>
                                    <tr>
                                        <td>Special Benefit for Women</td>
                                        <td class="text-right" id="slbBal">{{ number_format($leaveCredits['slbBalance'], 3, ".", "") }}</td>
                                    </tr>
                                    <tr>
                                        <td>Study Leave</td>
                                        <td class="text-right" id="studyBal">{{ number_format($leaveCredits['studyBalance'], 3, ".", "") }}</td>
                                    </tr>
                                    <tr>
                                        <td>Special Privilege Leave</td>
                                        <td class="text-right" id="splBal">{{ number_format($leaveCredits['splBalance'], 3, ".", "") }}</td>
                                    </tr>
                                    <tr>
                                        <td>Rehabilitation Leave</td>
                                        <td class="text-right" id="rehabBal">{{ number_format($leaveCredits['rehabBalance'], 3, ".", "") }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            {{-- <div class="row">
                                                <div class="col-lg-12">
                                                      <label for="vlBal" class="form-group has-float-label">
                                                            <input type="text" class="form-control text-right text-secondary font-weight-bold bg-light" id="vlBal" style="outline: none; box-shadow: 0px 0px 0px transparent; font-size: 20px" readonly>
                                                            <span><strong>VL BALANCE</strong></span>
                                                      </label>
                                                </div>
                                          </div>
                                          <div class="row">
                                                <div class="col-lg-12">
                                                      <label for="slBal" class="form-group has-float-label">
                                                            <input type="text" class="form-control text-right text-secondary font-weight-bold bg-light" id="slBal" style="outline: none; box-shadow: 0px 0px 0px transparent; font-size: 20px" readonly>
                                                            <span><strong>SL BALANCE</strong></span>
                                                      </label>
                                                </div>
                                          </div>
                                          <hr class="mt-0">
                                          <div class="row">
                                                <div class="col-lg-12">
                                                      <label for="totalBalance" class="form-group has-float-label">
                                                            <input type="text" class="form-control text-center text-primary font-weight-bold bg-light" id="totalBalance" style="outline: none; box-shadow: 0px 0px 0px transparent; height: 100px; font-size: 75px" readonly>
                                                            <span><strong>TOTAL LEAVE BALANCE</strong></span>
                                                      </label>
                                                </div>
                                          </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex col-lg-8">
        <div class="flex-fill">
            <div class="card h-100">
                <div class="card-body">
                    <form method="POST" id="submitLeaveFileButton">
                        {{-- <div class="alert alert-secondary text-center font-weight-bold">LEAVE APPLICATION FILING</div> --}}
                        {{-- <hr> --}}
                        <div class="row">
                            <div class="col-lg-6 border border-bottom-0 border-left-0 border-top-0">
                                <div class="alert alert-danger d-none mt-2" role="alert" id="formErrors"></div>
                                <h6 class="text-sm text-center">&nbsp;</h6>
                                <label for="date_applied" class="form-group has-float-label">
                                    <input type="date" name="date_applied" id="date_applied" class="form-control" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                    <span>
                                        <strong>DATE OF APPLICATION
                                            <span class="text-danger">*</span>
                                        </strong>
                                    </span>
                                </label>
                                {{-- <label for="controlNo" class="form-group has-float-label">
                                    <input type="text" name="controlNo" id="controlNo" class="form-control"
                                        style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <span><strong>CONTROL NO.</strong></span>
                                </label> --}}
                                <label for="leave_type_id" class="form-group has-float-label">
                                    <select class="form-control selectpicker border type-of-leave" id="leave_type_id" name="selectedLeave" data-live-search="true">
                                        <option selected disabled hidden>-------------------------</option>
                                        @foreach($types->groupBy('category') as $category => $type)
                                        <optgroup class="text-uppercase" label="{{ $category }}">
                                            @foreach($type as $t)
                                            <option value="{{ $t->leave_type_id }}">{{ $t->description }}
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


                                <div id="inCaseOfContainer" class="d-none">
                                    <label for="inCaseOf" class="form-group has-float-label">
                                        <select class="form-control" id="inCaseOf" name="inCaseOfLeave"></select>
                                        <span id="in_case_of__label">
                                            <strong>IN CASE OF
                                                <span class='text-danger'>*</span>
                                            </strong>
                                        </span>
                                    </label>
                                    <label for="specify" class="form-group has-float-label">
                                        <input type="text" class="form-control" id="specify" name="specify">
                                        <span id="specify__label"><strong>SPECIFY<span class='text-danger'>*</span></strong></span>
                                    </label>
                                </div>

                                <div class="col-auto p-0 mt-3">
                                    <label for="date_from" class="form-group has-float-label">
                                        <input type="date" class="form-control" id="date_from" name="date_from">
                                        <span id="start__date__label"><strong>START DATE <span class='text-danger'>*</span></strong></span>
                                    </label>
                                </div>
                                <div class="col-auto p-0">
                                    <label for="date_to" class="form-group has-float-label">
                                        <input type="date" class="form-control" id="date_to" name="date_to">
                                        <span id="end__date__Label"><strong>END DATE <span class='text-danger'>*</span></strong></span>
                                    </label>
                                </div>
                                <div class="col-auto p-0">
                                    <label for="includeWeekends" class="form-group has-float-label" style="cursor:pointer;">
                                        <input type="checkbox" class="form-checkbox" id="includeWeekends" name="includeWeekends">
                                        Include Weekends
                                    </label>
                                </div>
                                <input type="number" class="d-none" id="leave_balance" readonly>
                                <div class="col-auto p-0 mt-3">
                                    <label for="no_of_days" class="form-group has-float-label">
                                        <input type="number" class="form-control" id="no_of_days" name="numberOfDays" readonly>
                                        <span><strong>NUMBER OF DAYS<span class="text-danger">*</span></strong></span>
                                    </label>
                                </div>
                                <label for="commutation" class="form-group has-float-label">
                                    <select class="form-control" id="commutation" name="communication">
                                        <option readonly selected value="0">NOT REQUESTED</option>
                                        <option value="1">REQUESTED</option>
                                    </select>
                                    <span><strong>COMMUTATION<span class="text-danger">*</span></strong></span>
                                </label>
                                <label for="recoApproval" class="form-group has-float-label">
                                    <input class="form-control" name="recommendingApproval" id="recommendingApproval" readonly value="{{ $employee->offices->office_head }}">
                                    <span><strong>RECOMMENDING APPROVAL<span class="text-danger">*</span></strong></span>
                                </label>
                                <label for="approveBy" class="form-group has-float-label">
                                    <input class="form-control" name="approveBy" id="approvedBy" disabled value="{{ $signatory_for_approval }}">
                                    <span><strong>APPROVED BY<span class="text-danger">*</span></strong></span>
                                </label>
                                <button type="submit" class="text-white shadow btn btn-primary" id="btn--apply--for--leave">
                                    <div class="spinner-border spinner-border-sm text-light d-none" id="apply-spinner" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <i class="la la-user-plus" id="apply-button-icon"></i>
                                    Create Leave Application
                                </button>
                            </div>
                            <div class="col-lg-6 ">
                                <table class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Whole Day</th>
                                            <th class="text-center">PM</th>
                                            <th class="text-center">AM</th>
                                        </tr>
                                    </thead>
                                    <tbody class="inclusiveDates">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('page-scripts')
{{-- <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.js"></script> --}}
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="{{ asset('/js/moment.js') }}"></script>
<script src="{{ asset('/assets/libs/winbox/winbox.bundle.js') }}"></script>
<script>
    $(function() {

        // SHOWS THE DATA VALUE IN INPUT INCLUDING THE PHOTO OF THE EMPLOYEE AND THE LEAVE RECORDS OF THE EMPLOYEE
        const ROUTE = "{{ route('employee.leave.application.filling.submit') }}";
        const vacationLeaveIncaseOf = ['WITHIN THE PHILIPPINES', 'ABROAD'];
        const sickLeaveIncaseOf = ['IN HOSPITAL', 'OUT PATIENT'];
        const slbwIncaseOf = ['Specify Illness'];
        const studtyLeaveIncaseOf = ['COMPLETION OF MASTER`S DEGREE', 'BAR/Board Examination Review'];
        const othersIncaseOf = ['Monetization of Leave Credits', 'Terminal Leave'];

        const ALREADY_HAVE_PENDING_FILE = 423;
        const CANNOT_ACCESS_SELECTED_LEAVE = 424;
        const SPACE = new RegExp(/\s+/, "ig");
        const LEAVE_TYPES = new Map([]);

        let types = JSON.parse($('meta[name="leave-types"]').attr('content'));

        // Function to create a key value pair Map for leave types.
        types.forEach((type) => LEAVE_TYPES.set(type.leave_type_id, type.leave_type_id));

        // Function to get the other information of selected leave type.
        let getSelectedLeaveTypeData = (types, selectedType) => types.find(type => type.leave_type_id === selectedType);

        // When user select a type of leave.
        $('#leave_type_id').change(function(e) {

            let selectedType = $('#leave_type_id').val();

            let type = getSelectedLeaveTypeData(types, selectedType);

            // Initialize value of Incase of.
            let incaseOf = [];

            switch (selectedType) {
                case LEAVE_TYPES.get('SL'):
                    incaseOf = sickLeaveIncaseOf;
                    $('#inCaseOfContainer').removeClass('d-none');
                    $('#leaveBalanceTable tr').removeClass("bg-primary text-white");
                    $('#slBal').parent().addClass('bg-primary text-white');
                    $('#leave_balance').val($('#slBal').text());
                    break;
                case LEAVE_TYPES.get('VL'):
                    incaseOf = vacationLeaveIncaseOf;
                    $('#inCaseOfContainer').removeClass('d-none');
                    $('#leaveBalanceTable tr').removeClass("bg-primary text-white");
                    $('#vlBal').parent().addClass('bg-primary text-white');
                    $('#leave_balance').val($('#vlBal').text());
                    break;
                case LEAVE_TYPES.get('VAWC'):
                    incaseOf = vacationLeaveIncaseOf;
                    $('#inCaseOfContainer').removeClass('d-none');
                    $('#leaveBalanceTable tr').removeClass("bg-primary text-white");
                    $('#vawcBal').parent().addClass('bg-primary text-white');
                    $('#leave_balance').val($('#vawcBal').text());
                    break;
                case LEAVE_TYPES.get('AL'):
                    incaseOf = vacationLeaveIncaseOf;
                    $('#inCaseOfContainer').removeClass('d-none');
                    $('#leaveBalanceTable tr').removeClass("bg-primary text-white");
                    $('#adoptBal').parent().addClass('bg-primary text-white');
                    $('#leave_balance').val($('#adoptBal').text());
                    break;
                case LEAVE_TYPES.get('FL'):
                    incaseOf = vacationLeaveIncaseOf;
                    $('#inCaseOfContainer').removeClass('d-none');
                    $('#leaveBalanceTable tr').removeClass("bg-primary text-white");
                    $('#mandatoryBal').parent().addClass('bg-primary text-white');
                    $('#leave_balance').val($('#mandatoryBal').text());
                    break;
                case LEAVE_TYPES.get('ML'):
                    incaseOf = vacationLeaveIncaseOf;
                    $('#inCaseOfContainer').removeClass('d-none');
                    $('#leaveBalanceTable tr').removeClass("bg-primary text-white");
                    $('#maternityBal').parent().addClass('bg-primary text-white');
                    $('#leave_balance').val($('#maternityBal').text());
                    break;
                case LEAVE_TYPES.get('PL'):
                    incaseOf = vacationLeaveIncaseOf;
                    $('#inCaseOfContainer').removeClass('d-none');
                    $('#leaveBalanceTable tr').removeClass("bg-primary text-white");
                    $('#paternityBal').parent().addClass('bg-primary text-white');
                    $('#leave_balance').val($('#paternityBal').text());
                    break;
                case LEAVE_TYPES.get('SOLOPARENT'):
                    incaseOf = vacationLeaveIncaseOf;
                    $('#inCaseOfContainer').removeClass('d-none');
                    $('#leaveBalanceTable tr').removeClass("bg-primary text-white");
                    $('#soloparentBal').parent().addClass('bg-primary text-white');
                    $('#leave_balance').val($('#soloparentBal').text());
                    break;
                case LEAVE_TYPES.get('SEL'):
                    incaseOf = vacationLeaveIncaseOf;
                    $('#inCaseOfContainer').removeClass('d-none');
                    $('#leaveBalanceTable tr').removeClass("bg-primary text-white");
                    $('#emergencyBal').parent().addClass('bg-primary text-white');
                    $('#leave_balance').val($('#emergencyBal').text());
                    break;
                case LEAVE_TYPES.get('SLB'):
                    incaseOf = slbwIncaseOf;
                    $('#inCaseOfContainer').removeClass('d-none');
                    $('#leaveBalanceTable tr').removeClass("bg-primary text-white");
                    $('#slbBal').parent().addClass('bg-primary text-white');
                    $('#leave_balance').val($('#slbBal').text());
                    break;
                case LEAVE_TYPES.get('STL'):
                    incaseOf = studtyLeaveIncaseOf;
                    $('#inCaseOfContainer').removeClass('d-none');
                    $('#leaveBalanceTable tr').removeClass("bg-primary text-white");
                    $('#studyBal').parent().addClass('bg-primary text-white');
                    $('#leave_balance').val($('#studyBal').text());
                    break;
                case LEAVE_TYPES.get('SPL'):
                    incaseOf = vacationLeaveIncaseOf;
                    $('#inCaseOfContainer').removeClass('d-none');
                    $('#leaveBalanceTable tr').removeClass("bg-primary text-white");
                    $('#splBal').parent().addClass('bg-primary text-white');
                    $('#leave_balance').val($('#splBal').text());
                    break;
                case LEAVE_TYPES.get('RL'):
                    incaseOf = vacationLeaveIncaseOf;
                    $('#inCaseOfContainer').removeClass('d-none');
                    $('#leaveBalanceTable tr').removeClass("bg-primary text-white");
                    $('#rehabBal').parent().addClass('bg-primary text-white');
                    $('#leave_balance').val($('#rehabBal').text());
                    break;
                default:
                    $('#inCaseOfContainer').addClass('d-none');
                    $('#leaveBalanceTable tr').removeClass("bg-primary text-white");
                    $('#leave_balance').val('');
            }

            // Remove options of in case of select element
            $('#inCaseOf').children().remove();

            // Dynamically insert value for incase of.
            incaseOf.map((data) => $('#inCaseOf').append(`<option value="${data}">${data}</option>`));
        });


        $('#date_from').change(function() {
            let leave_type = $('#leave_type_id').val();
            let employeeID = $('#employeeName').val();
            $('#date_to').val($('#date_from').val());

            if (leave_type == null) {
                swal({
                    text: "Select Type of Leave first."
                    , icon: "warning"
                    , timer: 2000
                    , buttons: false
                , });
                $('#date_from').val('');
            } else {
                $('.inclusiveDates').empty();
                let noOfDays = 0;
                let from = $('#date_from').val();
                let to = $('#date_to').val();
                let includeWeekends = $('#includeWeekends').is(':checked');

                $.get({
                    url: `/api/generate/periods/${from}/${to}/${includeWeekends}/${employeeID}`
                    , success: function(response) {
                        if (response.success) {
                            jQuery.each(response.period, function(index, item) {
                                $('.inclusiveDates').append(` <tr>
                                                                        <td class="text-center">${item}</td>
                                                                        <td class="text-center"><input type="radio" class="leave_date" data-child="${index}" data-date="${item}" data-equivalent='1' value="whole_day" name="date[${index}]" checked></td>
                                                                        <td class="text-center"><input type="radio" class="leave_date" data-child="${index}" data-date="${item}" data-equivalent='.5' value="pm" name="date[${index}]"></td>
                                                                        <td class="text-center"><input type="radio" class="leave_date" data-child="${index}" data-date="${item}" data-equivalent='.5' value="am" name="date[${index}]"><input type="hidden" id='parent-${index}' class="noOfDays" value="1"></td>
                                                                  </tr>`);
                                noOfDays += parseFloat($(`#parent-${index}`).val());
                            });
                            $('#no_of_days').val(noOfDays);
                            $('#btn--apply--for--leave').attr('disabled', false);
                        } else {
                            swal({
                                text: "Unable to continue. Leave application date already exist."
                                , icon: "error"
                            , });
                            $('#btn--apply--for--leave').attr('disabled', true);
                        }
                    }
                });
            }
        });

        $('#date_to').change(function() {
            let leave_type = $('#leave_type_id').val();
            let employeeID = $('#employeeName').val();

            if (leave_type == null) {
                swal({
                    text: "Select Type of Leave first."
                    , icon: "warning"
                    , timer: 2000
                    , buttons: false
                , });
                $('#date_to').val('');
            } else {
                $('.inclusiveDates').empty();
                let type = getSelectedLeaveTypeData(types, $('#leave_type_id').val());

                let noOfDays = 0;
                let from = $('#date_from').val();
                let to = $('#date_to').val();
                let includeWeekends = $('#includeWeekends').is(':checked');

                $.get({
                    url: `/api/generate/periods/${from}/${to}/${includeWeekends}/${employeeID}`
                    , success: function(response) {
                        if (response.success) {
                            jQuery.each(response.period, function(index, item) {
                                $('.inclusiveDates').append(` <tr>
                                                                        <td class="text-center">${item}</td>
                                                                        <td class="text-center"><input type="radio" class="leave_date" data-child="${index}" data-date="${item}" data-equivalent='1' value="whole_day" name="date[${index}]" checked></td>
                                                                        <td class="text-center"><input type="radio" class="leave_date" data-child="${index}" data-date="${item}" data-equivalent='.5' value="pm" name="date[${index}]"></td>
                                                                        <td class="text-center"><input type="radio" class="leave_date" data-child="${index}" data-date="${item}" data-equivalent='.5' value="am" name="date[${index}]"><input type="hidden" id='parent-${index}' class="noOfDays" value="1"></td>
                                                                  </tr>`);
                                noOfDays += parseFloat($(`#parent-${index}`).val());
                            });
                            $('#no_of_days').val(noOfDays);
                            $('#btn--apply--for--leave').attr('disabled', false);
                        } else {
                            swal({
                                text: "Unable to continue. Leave application date already exist."
                                , icon: "error"
                            , });
                            $('#btn--apply--for--leave').attr('disabled', true);
                        }
                    }
                });
            }
        });

        $('#includeWeekends').click(function() {
            if ($(this).is(':checked')) {
                $('#date_to').trigger('change');
            } else {
                $('#date_to').trigger('change');
            }
        });

        $(document).on('click', function(e) {
            let noOfDays = 0;

            if (e.target.tagName == 'INPUT' && e.target.getAttribute('class').includes('leave_date')) {
                let child = e.target.getAttribute('data-child');
                $(`#parent-${child}`).val(e.target.getAttribute('data-equivalent'));
                $('.noOfDays').each(function(index, item) {
                    noOfDays += parseFloat(item.value);
                });
                $('#no_of_days').val(noOfDays);
            }
        });


        $('#submitLeaveFileButton').submit(function(e) {
            e.preventDefault();

            let leaveDates = [];
            let [selectedItem] = $("#employeeName option:selected");
            let leave_balance = parseFloat($('#leave_balance').val());
            let leave_amount_applied = parseFloat($("#no_of_days").val());

            if (leave_balance < leave_amount_applied) {
                swal({
                    text: "Unable to create application. Insufficient leave balance."
                    , icon: "warning"
                    , timer: 2000
                    , buttons: false
                , });
            } else {
                $('#apply-spinner').removeClass('d-none');
                $('#apply-button-icon').addClass('d-none');

                $('.leave_date').each(function(index, date) {
                    let key = $(date).attr('data-date');
                    if ($(date).is(':checked')) {
                        leaveDates.push({
                            [key]: $(date).val()
                        });
                    }
                });

                let data = {
                    date_applied: $('#date_applied').val()
                    , employeeName: $('#employeeName').val()
                    , leave_type_id: $('#leave_type_id').val()
                    , inCaseOf: $('#inCaseOf').val()
                    , specify: $('#specify').val()
                    , no_of_days: $("#no_of_days").val()
                    , date_from: $('#date_from').val()
                    , date_to: $('#date_to').val()
                    , commutation: $('#commutation').val()
                    , leave_date: leaveDates
                , };


                $.ajax({
                    url: ROUTE
                    , method: 'POST'
                    , data: data
                    , success: function(response) {
                        $('#formErrors').addClass('d-none').html('');
                        $('#apply-spinner').addClass('d-none');
                        $('#apply-button-icon').removeClass('d-none');

                        if (response.success) {

                            Object.keys(data).map((elementID) => {
                                $(`${elementID}`).removeClass('is-invalid');
                            });

                            swal({
                                title: "Good Job!"
                                , text: "Your leave application successfully submit plesae wait for the approval."
                                , icon: "success"
                                , timer: 5000
                            });

                            data.fullname = response.fullname;
                        }
                    }
                    , error: function(response) {
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
                                    $('button[data-id="leave_type_id"]').addClass(
                                        'border border-danger');
                                } else {
                                    $(`#${fieldID}`).addClass('is-invalid');
                                }

                                $('#formErrors').append(`<span>- ${message}</span> <br>`);
                            });
                        } else if (response.status == ALREADY_HAVE_PENDING_FILE) {
                            swal('Oops!', response.responseJSON.message, 'error');
                        } else if (response.status === CANNOT_ACCESS_SELECTED_LEAVE) {
                            swal('Oops!', response.responseJSON.message, 'error');
                        }
                    }
                });
            }

        });

    });

</script>
@endpush
@endsection
