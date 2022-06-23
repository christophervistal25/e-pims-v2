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
                                          <label for="empName" class="form-group has-float-label bg-light">
                                                <select class="form-control selectpicker" data-live-search="true" name="employeeName" id="employeeName" data-size="6" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                                      <option value="">Search name here</option>
                                                      @foreach($employees as $employee)
                                                      <option 
                                                            data-office="{{ $employee->offices->office_name }}" 
                                                            data-officeHead="{{ $employee->offices->office_head }}" 
                                                            data-position="{{ $employee?->position?->Description }}" 
                                                            data-employeeId="{{ $employee->Employee_id }}"
                                                            data-leaveRecord="{{  $employee->forwarded_leave_records }}" 
                                                            data-vlBalance="{{ $employee->forwarded_leave_records?->vl_balance }}" 
                                                            data-slBalance="{{ $employee->forwarded_leave_records?->sl_balance }}" 
                                                            data-vawcBalance="{{ $employee->forwarded_leave_records?->vawc_balance }}" 
                                                            data-adoptBalance="{{ $employee->forwarded_leave_records?->adopt_balance }}" 
                                                            data-mandatoryBalance="{{ $employee->forwarded_leave_records?->mandatory_balance }}" 
                                                            data-maternityBalance="{{ $employee->forwarded_leave_records?->maternity_balance }}" 
                                                            data-paternityBalance="{{ $employee->forwarded_leave_records?->paternity_balance }}" 
                                                            data-soloparentBalance="{{ $employee->forwarded_leave_records?->soloparent_balance }}" 
                                                            data-emergencyBalance="{{ $employee->forwarded_leave_records?->emergency_balance }}" 
                                                            data-slbBalance="{{ $employee->forwarded_leave_records?->slb_balance }}" 
                                                            data-studyBalance="{{ $employee->forwarded_leave_records?->study_balance }}" 
                                                            data-splBalance="{{ $employee->forwarded_leave_records?->spl_balance }}" 
                                                            data-rehabBalance="{{ $employee->forwarded_leave_records?->rehab_balance }}" 
                                                            value="{{ $employee->Employee_id }}">{{ $employee->LastName }},
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
                                          <table class="table table-condensed table-sm">
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
                                                            <td>Special Emer Leave</td>
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
                  let employeeOfficeHead = selectedItem.getAttribute('data-officeHead') || '';
                  let employeePosition = selectedItem.getAttribute('data-position') || '';
                  let vlBalance = selectedItem.getAttribute('data-vlBalance') || '';
                  let slBalance = selectedItem.getAttribute('data-slBalance') || '';
                  let vawcBalance = selectedItem.getAttribute('data-vawcBalance') || '';
                  let adoptBalance = selectedItem.getAttribute('data-adoptBalance') || '';
                  let mandatoryBalance = selectedItem.getAttribute('data-mandatoryBalance') || '';
                  let maternityBalance = selectedItem.getAttribute('data-maternityBalance') || '';
                  let paternityBalance = selectedItem.getAttribute('data-paternityBalance') || '';
                  let soloparentBalance = selectedItem.getAttribute('data-soloparentBalance') || '';
                  let emergencyBalance = selectedItem.getAttribute('data-emergencyBalance') || '';
                  let slbBalance = selectedItem.getAttribute('data-slbBalance') || '';
                  let studyBalance = selectedItem.getAttribute('data-studyBalance') || '';
                  let splBalance = selectedItem.getAttribute('data-splBalance') || '';
                  let rehabBalance = selectedItem.getAttribute('data-rehabBalance') || '';
                  let photo = selectedItem.getAttribute('data-photo') || '';
                  $('#office').val(employeeOffice);
                  $('#position').val(employeePosition);
                  $('#vlBal').text(vlBalance);
                  $('#slBal').text(slBalance);
                  $('#vawcBal').text(vawcBalance);
                  $('#adoptBal').text(adoptBalance);
                  $('#mandatoryBal').text(mandatoryBalance);
                  $('#maternityBal').text(maternityBalance);
                  $('#paternityBal').text(paternityBalance);
                  $('#soloparentBal').text(soloparentBalance);
                  $('#emergencyBal').text(emergencyBalance);
                  $('#slbBal').text(slbBalance);
                  $('#studyBal').text(studyBalance);
                  $('#splBal').text(splBalance);
                  $('#rehabBal').text(rehabBalance);
                  $('#recommendingApproval').val(employeeOfficeHead);

                  if($('#date_from').val() != null && $('#date_to').val() != null ){
                        $('#date_to').trigger('change');
                  }
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
                  if ($('#employeeName').val() == '') {
                        swal({
                              text: "Select first Employee."
                              , icon: "warning"
                              , timer: 2000
                        });
                        $('#leave_type_id').val(null);
                  } else {
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
                  }
            });


            $('#date_from').change(function() {
                  let leave_type = $('#leave_type_id').val();
                  
                  if(leave_type == null){
                        swal({
                              text: "Select Type of Leave first."
                              , icon: "warning"
                              , timer: 2000
                        });
                        $('#date_from').val('');
                  }else{
                        $('.inclusiveDates').empty();
                        let noOfDays = 0;
                        let from = $('#date_from').val();
                        let to = $('#date_to').val();
                        let employee_id = $('#employeeName').val();
                  
                        $.get({
                              url: `/api/generate/periods/${from}/${to}/${employee_id}`
                              , success: function(response) {
                                    jQuery.each(response.period, function(index, item) {
                                          $('.inclusiveDates').append(`  <tr>
                                                                              <td class="text-center">${item}</td>
                                                                              <td class="text-center"><input type="radio" class="leave_date" data-child="${index}" data-date="${item}" value="whole_day" name="date[${index}]" checked></td>
                                                                              <td class="text-center"><input type="radio" class="leave_date" data-child="${index}" data-date="${item}" value="pm" name="date[${index}]"></td>
                                                                              <td class="text-center"><input type="radio" class="leave_date" data-child="${index}" data-date="${item}" value="am" name="date[${index}]"><input type="hidden" id='parent-${index}' class="noOfDays${item}" value="1"></td>
                                                                        </tr>`);
                                          noOfDays += parseFloat($(`#parent-${index}`).val());
                                    });
                                    $('#no_of_days').val(noOfDays);
                              }
                        });
                  }
            });

            $('#date_to').change(function() {
                  let leave_type = $('#leave_type_id').val();
                  
                  if(leave_type == null){
                        swal({
                              text: "Select Type of Leave first."
                              , icon: "warning"
                              , timer: 2000
                        });
                        $('#date_to').val('');
                  }else{
                        $('.inclusiveDates').empty();
                        let type = getSelectedLeaveTypeData(types, $('#leave_type_id').val());

                        let noOfDays = 0;
                        let from = $('#date_from').val();
                        let to = $('#date_to').val();
                        let employee_id = $('#employeeName').val();

                        $.get({
                              url: `/api/generate/periods/${from}/${to}/${employee_id}`
                              , success: function(response) {
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
                              }
                        });
                  }
            });

            $(document).on('click', function (e) {
                  let noOfDays = 0;

                  if(e.target.tagName == 'INPUT' && e.target.getAttribute('class').includes('leave_date')) {
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
                  let emLeaveRecord = selectedItem.getAttribute('data-leaveRecord') || '';

                  if ($('#employeeName').val() == '') {
                        swal({
                              text: "Select first Employee."
                              , icon: "warning"
                              , timer: 2000
                        });
                  } else {
                        if(emLeaveRecord == ''){
                              swal({
                                    text: "No Leave Balances. Unable to create application."
                                    , icon: "warning"
                                    , timer: 2000
                              });
                        }else{
                              $('#apply-spinner').removeClass('d-none');
                              $('#apply-button-icon').addClass('d-none');

                              $('.leave_date').each(function(index, date) {
                                    let key = $(date).attr('data-date');
                                    if($(date).is(':checked')) {
                                          leaveDates.push({
                                                [key] : $(date).val(),
                                          });
                                    }
                              });

                              console.log(leaveDates);

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

                              // console.log(leaveDates);
                              
                              $.ajax({
                                    url: ROUTE, 
                                    method: 'POST', 
                                    data: data, 
                                    success: function(response) {
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
                                    }, 
                                    error: function(response) {
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
                        
                  }
            });

      });

</script>
@endpush
@endsection
