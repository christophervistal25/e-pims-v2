@php
$layouts = '';
if (request()->winbox == 1) {
$layouts = 'layouts.app-winbox';
} else {
$layouts = 'layouts.app';
}
@endphp
@extends($layouts)
@section('title', 'Leave Application Filing')
@prepend('page-css')
<script src="{{ asset('/js/app.js') }}" defer></script>
<link rel="stylesheet"
    href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />
<link rel="stylesheet" href="/assets/css/custom.css" />
<link rel="stylesheet" href="/assets/css/style.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                            <img class="mb-3 rounded-circle img-thumbnail" id="empPhoto" src="" width="50%" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="has-float-label" for="employeeName">
                                <input id="employeeID" type="hidden" value="{{ $employee->Employee_id }}">
                                <input type="text" name="employeeName" class="form-control" id="employeeName"
                                    value="{{ $employee->LastName }}, {{ $employee->FirstName }} {{ $employee->MiddleName }}"
                                    style="color: white; margin-bottom: 15px; background: linear-gradient(90deg, rgba(148,0,132,1) 0%, rgba(253,29,29,1) 50%, rgba(252,176,69,1) 100%); font-weight: bold;"
                                    readonly>
                            </label>

                            <label for="office" class="form-group has-float-label">
                                <input type="text" name="office" id="office" class="form-control bg-light"
                                    style="outline: none; box-shadow: 0px 0px 0px transparent;" value="{{ $employee->offices->office_name }}" readonly>
                                <span class="font-weight-bold">OFFICE</span>
                            </label>
                            <label for="position" class="form-group has-float-label">
                                <input type="text" name="position" id="position" class="form-control bg-light"
                                    style="outline: none; box-shadow: 0px 0px 0px transparent;" value="{{ $employee->position->Description }}" readonly >
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
                                        <td class="text-right font-weight-bold" id="slBal"></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">VACATION LEAVE</td>
                                        <td class="text-right font-weight-bold" id="vlBal"></td>
                                    </tr>
                                    <tr>
                                        <td>10-Day VAWC Leave</td>
                                        <td class="text-right" id="vawcBal"></td>
                                    </tr>
                                    <tr>
                                        <td>Adoption Leave</td>
                                        <td class="text-right" id="adoptBal"></td>
                                    </tr>
                                    <tr>
                                        <td>Mandatory Leave</td>
                                        <td class="text-right" id="mandatoryBal"></td>
                                    </tr>
                                    <tr>
                                        <td>Maternity Leave</td>
                                        <td class="text-right" id="maternityBal"></td>
                                    </tr>
                                    <tr>
                                        <td>Paternity Leave</td>
                                        <td class="text-right" id="paternityBal"></td>
                                    </tr>
                                    <tr>
                                        <td>Solo Parent Leave</td>
                                        <td class="text-right" id="soloparentBal"></td>
                                    </tr>
                                    <tr>
                                        <td>Special Emergency Leave</td>
                                        <td class="text-right" id="emergencyBal"></td>
                                    </tr>
                                    <tr>
                                        <td>Special Benefit for Women</td>
                                        <td class="text-right" id="slbBal"></td>
                                    </tr>
                                    <tr>
                                        <td>Study Leave</td>
                                        <td class="text-right" id="studyBal"></td>
                                    </tr>
                                    <tr>
                                        <td>Special Privilege Leave</td>
                                        <td class="text-right" id="splBal"></td>
                                    </tr>
                                    <tr>
                                        <td>Rehabilitation Leave</td>
                                        <td class="text-right" id="rehabBal"></td>
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
                                    <input type="hidden" name="applicationID" id="applicationID" value="{{ $data->application_id }}">
                                    <input type="date" name="date_applied" id="date_applied" class="form-control" 
                                        value="{{ Carbon\Carbon::parse($data->date_applied)->format('Y-m-d')}}"
                                        readonly>
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
                                    <select class="form-control selectpicker border type-of-leave" id="leave_type_id"
                                        name="selectedLeave" data-live-search="true">
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
                                        <select class="form-control" id="inCaseOf" name="inCaseOfLeave" value="{{ $data->inCaseOf }}"></select>
                                        <span id="in_case_of__label">
                                            <strong>IN CASE OF
                                                <span class='text-danger'>*</span>
                                            </strong>
                                        </span>
                                    </label>
                                    <label for="specify" class="form-group has-float-label">
                                        <input type="text" class="form-control" id="specify" name="specify" 
                                        value="{{ $data->specify }}">
                                        <span id="specify__label"><strong>SPECIFY<span
                                                    class='text-danger'>*</span></strong></span>
                                    </label>
                                </div>

                                <div class="col-auto p-0 mt-3">
                                    <label for="date_from" class="form-group has-float-label">
                                        <input type="date" class="form-control" id="date_from" name="date_from" >
                                        <span id="start__date__label"><strong>START DATE <span
                                                    class='text-danger'>*</span></strong></span>
                                    </label>
                                </div>
                                <div class="col-auto p-0">
                                    <label for="date_to" class="form-group has-float-label">
                                        <input type="date" class="form-control" id="date_to" name="date_to">
                                        <span id="end__date__Label"><strong>END DATE <span
                                                    class='text-danger'>*</span></strong></span>
                                    </label>
                                </div>
                                <div class="col-auto p-0">
                                    <label for="includeWeekends" class="form-group has-float-label">
                                        <input type="checkbox" class="form-checkbox" id="includeWeekends"
                                            name="includeWeekends">
                                        Include Weekends
                                    </label>
                                </div>
                                <input type="number" class="d-none" id="leave_balance" readonly>
                                <div class="col-auto p-0 mt-3">
                                    <label for="no_of_days" class="form-group has-float-label">
                                        <input type="number" class="form-control" id="no_of_days" name="numberOfDays"
                                            readonly value="{{ $data->no_of_days }}">
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
                                    <input class="form-control" name="recommendingApproval" id="recommendingApproval"
                                        disabled value="{{ $employee->offices->office_head }}">
                                    <span><strong>RECOMMENDING APPROVAL<span
                                                class="text-danger">*</span></strong></span>
                                </label>
                                <label for="approveBy" class="form-group has-float-label">
                                    <input class="form-control" name="approveBy" id="approvedBy" disabled
                                        value="{{ $signatory_for_approval }}">
                                    <span><strong>APPROVED BY<span class="text-danger">*</span></strong></span>
                                </label>
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
                        <div class="row mt-2 float-right">
                            <button type="submit" class="text-white shadow btn btn-primary mr-1"
                                id="btn--apply--for--leave">
                                <div class="spinner-border spinner-border-sm text-light d-none" id="apply-spinner"
                                    role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <i class="la la-save" id="apply-button-icon"></i>
                                Save Changes
                            </button>
                            <button type="button" class="btn btn-danger btn-md mr-1" id="btnReject"><i class="fa fa-times"></i> Decline</button>
                            <button type="button" class="btn btn-success text-white btn-md mr-4" id="btnApproved"><i class="fa fa-thumbs-up"></i> Approved</i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('page-scripts')
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.js"></script>
<script src="{{ asset('/assets/libs/winbox/winbox.bundle.js') }}"></script>
<script>
    $(function () {
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
        let getSelectedLeaveTypeData = (types, selectedType) => types.find(type => type.leave_type_id ===
            selectedType);

        // Function to calculate the # of weekends by range.
        let getNoOfWeekendInRange = (periodStart, periodEnd) => {
            let i = 0;
            let noOfWeekEnds = 0;
            while (i < moment(periodEnd).diff(periodStart, 'days')) {
                let date = moment(periodStart).add(i, 'days');
                if (date.format('dddd').toLowerCase() === 'saturday' || date.format('dddd')
                .toLowerCase() === 'sunday') {
                    noOfWeekEnds++;
                }
                i++;
            }

            return noOfWeekEnds;
        };

        // When user select a type of leave.
        $('#leave_type_id').change(function (e) {
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
            incaseOf.map((data) => $('#inCaseOf').append(
                `<option value="${data}">${data}</option>`));
        });


        $('#date_from').change(function () {
            let leave_type = $('#leave_type_id').val();
            let employeeID = $('#employeeID').val();
            $('#date_to').val($('#date_from').val());

            if (leave_type == null) {
                swal({
                    text: "Select Type of Leave first.",
                    icon: "warning",
                    timer: 2000
                });
                $('#date_from').val('');
            } else {
                $('.inclusiveDates').empty();
                let noOfDays = 0;
                let from = $('#date_from').val();
                let to = $('#date_to').val();
                let includeWeekends = $('#includeWeekends').is(':checked');

                $.get({
                    url: `/api/generate/periods/${from}/${to}/${includeWeekends}/${employeeID}`,
                    success: function (response) {
                        if (response.success) {
                            jQuery.each(response.period, function (index, item) {
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
                                text: "Unable to continue. Leave application date already exist.",
                                icon: "error",
                            });
                            $('#btn--apply--for--leave').attr('disabled', true);
                        }
                    }
                });
            }
        });

        $('#date_to').change(function () {
            let leave_type = $('#leave_type_id').val();
            let employeeID = $('#employeeID').val();

            if (leave_type == null) {
                swal({
                    text: "Select Type of Leave first.",
                    icon: "warning",
                    timer: 2000
                });
                $('#date_to').val('');
            } else {
                $('.inclusiveDates').empty();
                let type = getSelectedLeaveTypeData(types, $('#leave_type_id').val());

                let noOfDays = 0;
                let from = $('#date_from').val();
                let to = $('#date_to').val();
                let includeWeekends = $('#includeWeekends').is(':checked');

                $.get({
                    url: `/api/generate/periods/${from}/${to}/${includeWeekends}/${employeeID}`,
                    success: function (response) {
                        if (response.success) {
                            jQuery.each(response.period, function (index, item) {
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
                                text: "Unable to continue. Leave application date already exist.",
                                icon: "error",
                            });
                            $('#btn--apply--for--leave').attr('disabled', true);
                        }
                    }
                });
            }
        });

        $('#leave_type_id').val("{{ $data->leave_type_id }}").trigger('change');
        $('#commutation').val("{{ $data->commutation }}");
        $('#date_from').val("{{ Carbon\Carbon::parse($data->date_from)->format('Y-m-d')}}");
        $('#date_to').val("{{ Carbon\Carbon::parse($data->date_to)->format('Y-m-d')}}").trigger('change');


        $('#includeWeekends').click(function () {
            if ($(this).is(':checked')) {
                $('#date_to').trigger('change');
            } else {
                $('#date_to').trigger('change');
            }
        });

        $(document).on('click', function (e) {
            let noOfDays = 0;

            if (e.target.tagName == 'INPUT' && e.target.getAttribute('class').includes('leave_date')) {
                let child = e.target.getAttribute('data-child');
                $(`#parent-${child}`).val(e.target.getAttribute('data-equivalent'));
                $('.noOfDays').each(function (index, item) {
                    noOfDays += parseFloat(item.value);
                });
                $('#no_of_days').val(noOfDays);
            }
        });


        $('#submitLeaveFileButton').submit(function (e) {
            e.preventDefault();
            let employeeID = $('#employeeID').val();
            let applicationID = $('#applicationID').val();

            let leaveDates = [];
            let leave_balance = parseFloat($('#leave_balance').val());
            let leave_amount_applied = parseFloat($("#no_of_days").val());

            if (leave_balance < leave_amount_applied) {
                swal({
                    text: "Unable to create application. Insufficient leave balance.",
                    icon: "warning",
                    timer: 2000
                });
            } else {
                $('#apply-spinner').removeClass('d-none');
                $('#apply-button-icon').addClass('d-none');

                $('.leave_date').each(function (index, date) {
                    let key = $(date).attr('data-date');
                    if ($(date).is(':checked')) {
                        leaveDates.push({
                            [key]: $(date).val(),
                        });
                    }
                });

                let data = {
                    date_applied: $('#date_applied').val(),
                    employeeID: $('#employeeID').val(),
                    leave_type_id: $('#leave_type_id').val(),
                    inCaseOf: $('#inCaseOf').val(),
                    specify: $('#specify').val(),
                    no_of_days: $("#no_of_days").val(),
                    date_from: $('#date_from').val(),
                    date_to: $('#date_to').val(),
                    commutation: $('#commutation').val(),
                    leave_date: leaveDates,
                };

                // console.log(leaveDates);

                $.ajax({
                    url: `/employee/leave/leave-list/${applicationID}`,
                    method: 'PUT',
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
                                text: "Changes have been saved successfully.",
                                icon: "success",
                                timer: 5000
                            });

                            data.fullname = response.fullname;
                            // socket.emit(`submit_application_for_leave`, data);
                            // socket.emit('notify_administrator', { arguments : `${response.fullname}|NOTIFY_ADMINISTRATOR`});
                            // socket.emit('service_notify_administrator', { arguments : `${response.fullname}|NOTIFY_ADMINISTRATOR`});
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
                            Object.keys(response.responseJSON.errors).map((
                                fieldID) => {
                                    let [message] = response.responseJSON
                                        .errors[fieldID];
                                    if (fieldID.includes('typeOf')) {
                                        // Select field with select picker.
                                        $('button[data-id="leave_type_id"]')
                                            .addClass(
                                                'border border-danger');
                                    } else {
                                        $(`#${fieldID}`).addClass('is-invalid');
                                    }

                                    $('#formErrors').append(
                                        `<span>- ${message}</span> <br>`);
                                });
                        } else if (response.status == ALREADY_HAVE_PENDING_FILE) {
                            swal('Oops!', response.responseJSON.message, 'error');
                        } else if (response.status ===
                            CANNOT_ACCESS_SELECTED_LEAVE) {
                            swal('Oops!', response.responseJSON.message, 'error');
                        }
                    }
                });
            }
        });

        // APPROVED BUTTON FOR A LEAVE REQUEST //
        let btnApproved = document.querySelector('#btnApproved');

        btnApproved.addEventListener('click', (e) => {
            e.preventDefault();
            let employeeID = $('#employeeID');
            let id = "{{ $data->application_id }}";
            swal({
                    text : "Are you sure you want to approve this request?",
                    icon: "warning",
                    buttons: ['No', 'Yes'],
                    dangerMode: false,
                })
                .then((ifApproved) => {
                    $.ajax({
                        url: `/employee/leave/leave-list/${id}`,
                        data: {
                            status : 'approved',
                        },
                        method: 'PUT',
                        success: function(response) {
                            if(response.success) {
                                swal({
                                        title: "Request has been approved!",
                                        text : "You are also successfully updated a request",
                                        icon: "success",
                                });
                                socket.emit('notify_employee_leave_status', { fullname : 'Christopher Vistal Platino', phone_number : '09193693499', message : 'This is just a sample message'});
                            }
                        },
                    });
                });
        });


        // REJECT BUTTON FOR A LEAVE REQUEST //
        let btnReject = document.querySelector('#btnReject');

        btnReject.addEventListener('click', (e)=> {
            e.preventDefault();
            let employeeId = $('#employeeId');
            let recommendingApproval = $('#recommendingApproval');
            let approvedBy = $('#approvedBy');
            let leaveTypes = $('#leaveTypes');
            let dateApplied = $('#dateApplied');
            let commutation = $('#commutation');
            let incaseOf = $('#incaseOf');
            let numberOfDays = $('#numberOfDays');
            let dateStarted = $('#dateStarted');
            let dateEnded = $('#dateEnded');

            let getId = "{{ $data->application_id }}";
            
            swal({
                    text : "Are you sure you want to reject a request?",
                    icon: "warning",
                    buttons: ['No', 'Yes'],
                    dangerMode: false,
                })
                .then((isRejected) => {
                    if (isRejected) {
                        swal({
                            text: 'Enter the reason why you disapproved this application.',
                            content: "input",
                            button: {
                                text: "Submit",
                                closeModal: false,
                            },
                            })
                            .then(reason => {
                                if (!reason) throw null;
                                
                                $.ajax({
                                    url: `/employee/leave/leave-list/${getId}`,
                                    data: {
                                        status : 'declined',
                                        recommendation: reason,
                                    },
                                    method: 'PUT',
                                    success: function() {
                                        swal.stopLoading()
                                        swal({
                                            title: "Request has been rejected!",
                                            text : "You are rejected a leave request",
                                            icon: "success",
                                        });  
                                    },
                                });
                            });
                    }
                });
        });

    });

</script>
@endpush
@endsection
