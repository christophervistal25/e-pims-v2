@extends('accounts.employee.layouts.app')
@section('title', 'Leave Application Filing')
@prepend('page-css')
<link rel="stylesheet"
    href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endprepend
@prepend('meta-data')
<meta name="holiday-types" content="{{  $types->toJson() }}">
@endprepend
@section('content')
<div class="p-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-body">
                    <div class="alert alert-secondary text-center font-weight-bold">LEAVE APPLICATION FILING</div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                            <h6 class="text-sm text-center">&nbsp;</h6>
                            <label for="dateApply" class="form-group has-float-label">
                                <input type="date" name="dateApply" id="dateApply" class="form-control form-control"
                                    value="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                                    style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span><strong>DATE APPLY<span class="text-danger">*</span></strong></span>
                            </label>
                            {{-- <label for="controlNo" class="form-group has-float-label">
                            <input type="text" name="controlNo" id="controlNo" class="form-control"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>CONTROL NO.</strong></span>
                        </label> --}}
                            <label for="typeOfLeave" class="form-group has-float-label">
                                <select class="form-control selectpicker border" id="typeOfLeave"
                                    data-live-search="true">
                                    <option selected disabled value="">-------------------------</option>
                                    @foreach($types->groupBy('category') as $category => $type)
                                    <optgroup class="text-uppercase" label="{{ $category }}">
                                        @foreach($type as $t)
                                        <option value="{{ $t->id }}">{{ $t->name }}</option>
                                        @endforeach
                                    </optgroup>
                                    @endforeach
                                </select>
                                <span><strong>TYPES OF LEAVE<span class="text-danger">*</span></strong></span>
                            </label>
                            {{-- <label for="typeOthers" class="form-group has-float-label">
                            <input type="text" name="typeOthers" id="typeOthers" class="form-control">
                            <span><strong>IF OTHERS IS SELECTED</strong></span>
                        </label> --}}
                            <label for="noOfDays" class="form-group has-float-label">
                                <input type="number" class="form-control" id="noOfDays" readonly
                                    style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span><strong>NUMBER OF DAYS<span class="text-danger">*</span></strong></span>
                            </label>
                            <div class="clearfix"></div>
                            <label for="caseOfVl" class="form-group has-float-label">
                                <select class="form-control" id="incaseOf" readonly
                                    style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                </select>
                                <span id="in_case_of__label"><strong>IN CASE OF</strong></span>
                            </label>
                            <hr>
                            {{-- <label for="specify" class="form-group has-float-label">
                                <input type="text" class="form-control" name="specify" id="specify"
                                    style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span><strong>PLEASE SPECIFY:</strong></span>
                            </label> --}}
                            <div class="col-auto p-0">
                                <label for="startDate" class="form-group has-float-label">
                                    <input type="date" class="form-control" id="startDate" readonly>
                                    <span id="startDateLabel"><strong>START DATE</strong></span>
                                </label>
                            </div>

                            <div class="col-auto p-0">
                                <label for="endDate" class="form-group has-float-label">
                                    <input type="date" class="form-control" id="endDate"  readonly>
                                    <span id="endDateLabel"><strong>END DATE</strong></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="text-sm text-center font-weight-medium">LEAVE CREDITS</h6>
                            <label for="asOf" class="form-group has-float-label">
                                <input type="date" id="asOf" class="form-control" disabled
                                    value="{{ $forwardBalanceAsOfDate }}">
                                <span><strong>AS OF</strong></span>
                            </label>
                            <label for="vlEarned" class="form-group has-float-label">
                                <input type="number" class="form-control" id="vlEarned" style="" disabled
                                    value="{{ $vacationLeaveEarned }}">
                                <span><strong>VL EARNED</strong></span>
                            </label>
                            <label for="vlEnjoyed" class="form-group has-float-label">
                                <input type="number" class="form-control " id="vlEnjoyed" style="" disabled  value="{{ $vacationLeaveUsed }}">
                                <span><strong>VL USED</strong></span>
                            </label>
                            <label for="vlBalance" class="form-group has-float-label">
                                <input type="number" class="form-control " id="vlBalance" style="" disabled
                                    value="{{ (float) ($vacationLeaveEarned - $vacationLeaveUsed) }}">
                                <span><strong>VL BALANCE</strong></span>
                            </label>
                            <label for="slEarned" class="form-group has-float-label">
                                <input type="number" id="slEarned" class="form-control" disabled
                                    value="{{ $sickLeaveEarned }}">
                                <span><strong>SL EARNED</strong></span>
                            </label>
                            <label for="slEnjoyed" class="form-group has-float-label">
                                <input type="number" class="form-control" id="slEnjoyed" disabled
                                    value="{{ $sickLeaveUsed }}">
                                <span><strong>SL USED</strong></span>
                            </label>
                            <label for="slBalance" class="form-group has-float-label">
                                <input type="number" class="form-control" id="slBalance" disabled
                                    value="{{  (float) ($sickLeaveEarned - $sickLeaveUsed)  }}">
                                <span><strong>SL BALANCE</strong></span>
                            </label>
                            <hr>
                            <label for="total" class="form-group has-float-label">
                                <input type="number" name="total" id="total" class="form-control"
                                    style="outline: none; box-shadow: 0px 0px 0px transparent;" disabled
                                    value="{{ ($vacationLeaveEarned - $vacationLeaveUsed) + ($sickLeaveEarned - $sickLeaveUsed) }}">
                                <span><strong>Total VL - SL</strong></span>
                            </label>
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
                            <select class="form-control" id="commutation"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <option readonly selected value="">REQUESTED</option>
                                <option value="">NOT REQUESTED</option>
                            </select>
                            <span><strong>COMMUTATION<span class="text-danger">*</span></strong></span>
                        </label>
                        <label for="recoApproval" class="form-group has-float-label">
                            <input class="form-control" name="recoApproval" id="recoApproval" disabled value="{{ $hrOfficeHead }}">
                            <span><strong>RECOMMENDING APPROVAL<span class="text-danger">*</span></strong></span>
                        </label>
                        <label for="approveBy" class="form-group has-float-label">
                            <input class="form-control" name="approveBy" id="approveBy" disabled value="{{ $approvedBy }}">
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
                        <button type="button" class="text-white shadow btn btn-primary">
                            <i class="la la-user-plus"></i> Apply for Leave
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



@push('page-scripts')
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.js"></script>
<script>
    $('#typeOfLeave').change(function (e) {
        let selectedLeaveTypeID = $(this).val();

        let type = {};

        let types = JSON.parse($('meta[name="holiday-types"]').attr('content'));

        [type] = types.filter((leaveType) => leaveType.id == selectedLeaveTypeID);

        // Enable date picker
        $('#startDate, #endDate').attr('readonly', false);

        // Set temporary value for start date.
        
        $('#noOfDays').val(type.days_period);

        $('#incaseOf').attr('readonly', false)
                        .children()
                        .remove();

        $('#startDate').val(moment().format('YYYY-MM-DD'));
        if (type.name.toLowerCase().includes('sick')) {
            $('#in_case_of__label').text(`IN CASE OF ${type.name}`)
            $('#incaseOf')
                .append(`<option value="in_hospital">IN HOSPITAL</option>`)
                .append(`<option value="out_patient">OUT PATIENT</option>`);
        } else if (type.name.toLowerCase().includes('vacation')) {
            $('#in_case_of__label').text(`IN CASE OF ${type.name}`);
            $('#incaseOf')
                .append(`<option value="within_the_philippines">WITHIN THE PHILIPPINES</option>`)
                .append(`<option value="abroad">ABROAD</option>`);
            $('#startDate').val(moment().add('days', 5).format('YYYY-MM-DD'));
        } else {
            $('#incaseOf').attr('readonly', true)
                            .children()
                            .remove();
            $('#in_case_of__label').text(`IN CASE OF`);
        }
    });

    $('#startDate').change(function () {
        let startDate = moment($('#startDate').val())
        let dateNow = moment();
        let startDateMoreThanFiveDays = startDate.diff(dateNow, 'days') >= 5;
        if(!startDateMoreThanFiveDays) {
            alert('You must select five days after file');
        }
        
    });

    $('#endDate').change(function () {
        // opposite of start date.
    });
</script>
@endpush
@endsection
