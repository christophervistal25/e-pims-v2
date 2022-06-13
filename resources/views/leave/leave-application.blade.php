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
<link rel="stylesheet" href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />
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
      <div class="d-flex col-lg-3">
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
                                          <label for="empName" class="form-group has-float-label bg-light">
                                                <select class="form-control selectpicker" data-live-search="true" name="employeeName" id="employeeName" data-size="6" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                                      <option value="">Search name here</option>
                                                      @foreach($employees as $employee)
                                                      <option data-office="{{ $employee->office_charging->Description }}" data-position="{{ $employee?->position?->Description }}" data-employeeId="{{ $employee->Employee_id }}" data-vlBalance="{{ $employee->forwarded_leave_records?->vl_earned - $employee->forwarded_leave_records?->vl_used }}" data-slBalance="{{ $employee->forwarded_leave_records?->sl_earned - $employee->forwarded_leave_records?->sl_used }}" value="{{ $employee->Employee_id }}">{{ $employee->LastName }},
                                                            {{ $employee->FirstName }} {{ $employee->MiddleName }} </option>
                                                      @endforeach
                                                </select>
                                                <span><strong>EMPLOYEE NAME</strong></span>
                                          </label>

                                          <label for="office" class="form-group has-float-label">
                                                <input type="text" name="office" id="office" class="form-control bg-light" style="outline: none; box-shadow: 0px 0px 0px transparent;" readonly>
                                                <span class="font-weight-bold">OFFICE</span>
                                          </label>
                                          <label for="position" class="form-group has-float-label">
                                                <input type="text" name="position" id="position" class="form-control bg-light" style="outline: none; box-shadow: 0px 0px 0px transparent;" readonly>
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
                                          <div class="row">
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
                                          </div>
                                          <div class="alert alert-danger d-none" role="alert" id="formErrors"></div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
      <div class="d-flex col-lg-9">
            <div class="flex-fill">
                  <div class="card h-100">
                        <div class="card-body">
                              <form method="POST" id="submitLeaveFileButton">
                                    {{-- <div class="alert alert-secondary text-center font-weight-bold">LEAVE APPLICATION FILING</div> --}}
                                    {{-- <hr> --}}
                                    <div class="row">
                                          <div class="col-lg-6 border border-bottom-0 border-left-0 border-top-0">
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
                                                      <input class="form-control" name="recommendingApproval" id="recommendingApproval" disabled value="">
                                                      <span><strong>RECOMMENDING APPROVAL<span class="text-danger">*</span></strong></span>
                                                </label>
                                                <label for="approveBy" class="form-group has-float-label">
                                                      <input class="form-control" name="approveBy" id="approvedBy" disabled value="">
                                                      <span><strong>APPROVED BY<span class="text-danger">*</span></strong></span>
                                                </label>
                                          </div>
                                          <div class="col-lg-6">
                                                <h6 class="text-sm text-center font-weight-medium">LEAVE CREDITS <br><small>(will be applied upon approval of this leave application)</small></h6>
                                                <div class="row">
                                                      <div class="col-lg-12">
                                                            <label for="asOf" class="form-group has-float-label">
                                                                  <input type="date" id="asOf" class="form-control" disabled name="balanceAsOfDate" value="">
                                                                  <span><strong>AS OF</strong></span>
                                                            </label>
                                                      </div>
                                                      <div class="col-lg-6">
                                                            <label for="vacation__leave__earned" class="form-group has-float-label">
                                                                  <input type="number" class="form-control" id="vacation__leave__earned" disabled name="vacationLeaveEarned" value="">
                                                                  <span><strong>VL EARNED</strong></span>
                                                            </label>
                                                      </div>
                                                      <div class="col-lg-6">
                                                            <label for="vacation__leave__used" class="form-group has-float-label">
                                                                  <input type="number" class="form-control" id="vacation__leave__used" disabled name="vacationLeaveUsed" value="">
                                                                  <span><strong>VL USED</strong></span>
                                                            </label>
                                                      </div>
                                                      <div class="col-lg-12">
                                                            <label for="vacation__leave__balance" class="form-group has-float-label">
                                                                  <input type="number" class="form-control" id="vacation__leave__balance" disabled name="vacationLeaveBalance" value="">
                                                                  <span><strong>VL BALANCE</strong></span>
                                                            </label>
                                                      </div>

                                                      <div class="col-lg-12 m-0 p-0">
                                                            <hr>
                                                      </div>

                                                      <div class="col-lg-6">
                                                            <label for="sick__leave__earned" class="form-group has-float-label">
                                                                  <input type="number" id="sick__leave__earned" class="form-control" disabled name="sickLeaveEarned" value="">
                                                                  <span><strong>SL EARNED</strong></span>
                                                            </label>
                                                      </div>
                                                      <div class="col-lg-6">
                                                            <label for="sick__leave__used" class="form-group has-float-label">
                                                                  <input type="number" class="form-control" id="sick__leave__used" disabled name="sickLeaveUsed" value="">
                                                                  <span><strong>SL USED</strong></span>
                                                            </label>
                                                      </div>
                                                      <div class="col-lg-12">
                                                            <label for="sick__leave__balance" class="form-group has-float-label">
                                                                  <input type="number" class="form-control" id="sick__leave__balance" disabled name="sickLeaveBalance" value="">
                                                                  <span><strong>SL BALANCE</strong></span>
                                                            </label>
                                                      </div>

                                                      <div class="col-lg-12">
                                                            <hr>
                                                            <label for="total__balance" class="form-group has-float-label">
                                                                  <input type="number" class="form-control" id="total__balance" disabled name="totalBalance" value="">
                                                                  <span><strong>TOTAL BALANCE</strong></span>
                                                            </label>
                                                      </div>

                                                      <div class="col-lg-12 p-0 m-0">
                                                            <hr>
                                                      </div>

                                                      <div class="col-lg-12">
                                                            <label for="mandatory__leave__balance" class="form-group has-float-label mt-4">
                                                                  <input type="number" class="form-control" id="mandatory__leave__balance" disabled value="5" name="mandatoryLeaveBalance">
                                                                  <span><strong>MANDATORY LEAVE</strong></span>
                                                            </label>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="text-right">
                                          <button type="submit" class="text-white shadow btn btn-primary" id="btn--apply--for--leave">
                                                <div class="spinner-border spinner-border-sm text-light d-none" id="apply-spinner" role="status">
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
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.js"></script>
<script src="{{ asset('/assets/libs/winbox/winbox.bundle.js') }}"></script>
<script>
      $(function() {

            // SHOWS THE DATA VALUE IN INPUT INCLUDING THE PHOTO OF THE EMPLOYEE AND THE LEAVE RECORDS OF THE EMPLOYEE
            $('#employeeName').change(function(e) {
                  let empID = e.target.value;
                  let [selectedItem] = $("#employeeName option:selected");

                  let employeeOffice = selectedItem.getAttribute('data-office') || '';
                  let employeePosition = selectedItem.getAttribute('data-position') || '';
                  let vlBalance = selectedItem.getAttribute('data-vlBalance') || '';
                  let slBalance = selectedItem.getAttribute('data-slBalance') || '';
                  let photo = selectedItem.getAttribute('data-photo') || '';
                  let totBalance = parseInt(vlBalance) + parseInt(slBalance);
                  $('#office').val(employeeOffice);
                  $('#position').val(employeePosition);
                  $('table tbody').html('');
                  $('#vlBal').val(vlBalance);
                  $('#slBal').val(slBalance);
                  $('#totalBalance').val(totBalance);
            });

            const ROUTE = "{{ route('employee.leave.application.filling.admin.create') }}";
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

            // Function to calculate the # of weekends by range.
            let getNoOfWeekendInRange = (periodStart, periodEnd) => {
                  let i = 0;
                  let noOfWeekEnds = 0;
                  while (i < moment(periodEnd).diff(periodStart, 'days')) {
                        let date = moment(periodStart).add(i, 'days');
                        if (date.format('dddd').toLowerCase() === 'saturday' || date.format('dddd').toLowerCase() === 'sunday') {
                              noOfWeekEnds++;
                        }
                        i++;
                  }

                  return noOfWeekEnds;
            };

            // When user select a type of leave.
            $('#leave_type_id').change(function(e) {
                  let selectedType = $('#leave_type_id').val();

                  let type = getSelectedLeaveTypeData(types, selectedType);

                  // Initialize value of Incase of.
                  let incaseOf = [];

                  switch (selectedType) {
                        case LEAVE_TYPES.get('VL'):
                              incaseOf = vacationLeaveIncaseOf;
                              $('#inCaseOfContainer').removeClass('d-none');
                              break;
                        case LEAVE_TYPES.get('SPL'):
                              incaseOf = vacationLeaveIncaseOf;
                              $('#inCaseOfContainer').removeClass('d-none');
                              break;
                        case LEAVE_TYPES.get('SL'):
                              incaseOf = sickLeaveIncaseOf;
                              $('#inCaseOfContainer').removeClass('d-none');
                              $('#withPay, #withoutPay').attr('disabled', false);
                              break;
                        case LEAVE_TYPES.get('SLB'):
                              incaseOf = slbwIncaseOf;
                              $('#inCaseOfContainer').removeClass('d-none');
                              $('#withPay, #withoutPay').attr('disabled', false);
                              break;
                        case LEAVE_TYPES.get('STL'):
                              incaseOf = studtyLeaveIncaseOf;
                              $('#inCaseOfContainer').removeClass('d-none');
                              $('#withPay, #withoutPay').attr('disabled', false);
                              break;
                        default:
                              $('#inCaseOfContainer').addClass('d-none');
                              $('#withPay, #withoutPay').attr('disabled', true);
                  }

                  // Remove options of in case of select element
                  $('#inCaseOf').children().remove();

                  // Dynamically insert value for incase of.
                  incaseOf.map((data) => $('#inCaseOf').append(`<option value="${data}">${data}</option>`));
            });


            $('#date_from').change(function() {
                  let period = moment($('#date_to').val()).diff($('#date_from').val(), 'days');
                  let POINTS = 0;

                  $('#no_of_days').val(period);


                  let type = getSelectedLeaveTypeData(types, $('#leave_type_id').val());

                  /* if (type.leave_type_id === LEAVE_TYPES.get('FL')) {
                        POINTS = 5;
                  } else if (LEAVE_TYPES.get('VL')) {
                        POINTS = VACATION_LEAVE_EARNED;
                  } else if (LEAVE_TYPES.get('SL')) {
                        POINTS = SICK_LEAVE_EARNED;
                  }*/

                  $('#insufficient_points_error').remove();
                  if (POINTS <= Math.abs(period)) {
                        $('#formErrors').prepend(`<span id="insufficient_points_error">- Insufficient Leave points <br></span>`);
                  } else {
                        $('#earnedLess').val(period || 0);
                        $('#earnedRemaining').val((POINTS - period) || 0);
                  }
            });

            $('#date_to').change(function() {
                  let rangePeriod = {
                        start: moment($('#date_from').val())
                        , end: moment($('#date_to').val())
                  , };

                  if (rangePeriod.end.format('dddd').toLowerCase() === 'saturday' || rangePeriod.end.format('dddd').toLowerCase() === 'sunday') {
                        return '';
                  }

                  let period = (moment(rangePeriod.end).diff(rangePeriod.start, 'days') - getNoOfWeekendInRange(rangePeriod.start, rangePeriod.end)) + 1;

                  let POINTS = 0;

                  $('#no_of_days').val(period);

                  let type = getSelectedLeaveTypeData(types, $('#leave_type_id').val());

                  /*if (type.leave_type_id === LEAVE_TYPES.get('FL')) {
                        POINTS = 5;
                  } else if (LEAVE_TYPES.get('VL')) {
                        POINTS = VACATION_LEAVE_EARNED;
                  } else if (LEAVE_TYPES.get('SL')) {
                        POINTS = SICK_LEAVE_EARNED;
                  }*/

                  $('#insufficient_points_error').remove();
                  if (POINTS <= Math.abs(period)) {
                        $('#formErrors').prepend(`<span id="insufficient_points_error">- Insufficient Leave points <br></span>`);
                  } else {
                        $('#earnedLess').val(period || 0);
                        $('#earnedRemaining').val((POINTS - period) || 0);
                  }


                  let from = $('#date_from').val();
                  let to = $('#date_to').val();
                  $.get({
                        url: `/api/generate/periods/${from}/${to}`
                        , success: function(response) {
                              alert(response.period);
                        }
                  });
            });


            $('#submitLeaveFileButton').submit(function(e) {
                  e.preventDefault();

                  if ($('#employeeName').val() == '') {
                        swal({
                              text: "Select first Employee."
                              , icon: "warning"
                              , timer: 2000
                        });
                  } else {
                        $('#apply-spinner').removeClass('d-none');
                        $('#apply-button-icon').addClass('d-none');

                        let data = {
                              date_applied: $('#date_applied').val()
                              , employeeName: $('#employeeName').val()
                              , leave_type_id: $('#leave_type_id').val()
                              , inCaseOf: $('#inCaseOf').val()
                              , specify: $('#specify').val()
                              , no_of_days: $("#no_of_days").val()
                              , date_from: $('#date_from').val()
                              , date_to: $('#date_to').val()
                              , earned: $('#earned').val()
                              , earnedLess: $('#earnedLess').val()
                              , earnedRemaining: $('#earnedRemaining').val()
                              , commutation: $('#commutation').val()
                              , recommendingApproval: $('#recommendingApproval').val()
                              , approvedBy: $('#approvedBy').val()
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
                                          // socket.emit(`submit_application_for_leave`, data);
                                          // socket.emit('notify_administrator', { arguments : `${response.fullname}|NOTIFY_ADMINISTRATOR`});
                                          // socket.emit('service_notify_administrator', { arguments : `${response.fullname}|NOTIFY_ADMINISTRATOR`});
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
