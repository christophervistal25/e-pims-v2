@extends('accounts.employee.layouts.app')
@section('title', 'Your Leave Card')
@prepend('page-css')
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/bootstrap-float-label.css') }}">
<style>
    table {
        border-collapse: collapse;
    }

</style>
@endprepend
@section('content')
<div class="p-3">
    <div class="card shadow-none">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">
                                <img class="w-75 h-75 mt-3 shadow-sm" src="/storage/employee_images/{{ $employee->information->photo ?? 'no_image.png' }}" alt="">
                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5 profile-info-left">
                                    <div>
                                        <h3 class="user-name m-t-0">{{ $employee->fullname }}</h3>
                                        <div class="staff-id">Employee ID : {{ $employee->employee_id }}</div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="personal-info">
                                        <li>
                                            <span class="title">Position</span>
                                            <span class="text">{{ $employee->information->position->position_name ?? 'N/A' }}</span>
                                        </li>
                                        <li>
                                            <span class="title">Office</span>
                                            <span class="text">{{ $employee->information->office->office_name ?? 'N/A' }}</span>
                                        </li>
                                        <li>
                                            <span class="title">Salary</span>
                                            <span class="text">{{ $employee->plantilla->salary_amount ?? 'N/A' }}</span>
                                        </li>
                                        <li>
                                            <span class="title">First day of service</span>
                                            <span class="text">{{ $employee->first_day_of_service ?? 'N/A' }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row bg-light">
        <div class="col-lg-4">
            <label for="startDate" class="form-group has-float-label">
                <input type="date" id="startDate" class="form-control"
                    value="{{ @$startDate ? Carbon\Carbon::parse($startDate)->format('Y-m-d') : '' }}">
                <span>
                    <strong>START DATE</strong>
                </span>
            </label>
        </div>
        <div class="col-lg-5">
            <label for="endDate" class="form-group has-float-label">
                <input type="date" id="endDate" class="form-control"
                    value="{{ @$endDate ? Carbon\Carbon::parse($endDate)->format('Y-m-d') : '' }}">
                <span>
                    <strong>END DATE</strong>
                </span>
            </label>
        </div>
        <div class="col-lg-1">
            <button class='btn btn-info shadow-sm btn-block' id="btnFilter">
                <i class='la la-filter'></i>
                Filter
            </button>
        </div>

        <div class="col-lg-1">
            <button class='btn btn-warning text-white shadow-sm btn-block' id="btnReset">
                <i class='la la-times'></i>
                Reset
            </button>
        </div>

        <div class="col-lg-1">
            <button class='btn btn-primary shadow-sm btn-block' id="btnPrint">
                <i class='la la-print'></i>
                Print
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-0 rounded-0 shadow-sm">
                <div class="card-body">
                    <div class="">
                        <table class="table table-bordered table-hover" id="leave-card-table">
                            <thead>
                                <tr>
                                    <th rowspan="2" class='text-center align-middle font-weight-bold'>PERIOD</th>
                                    <th rowspan="2" class='text-center align-middle font-weight-bold'>PARTICULAR</th>
                                    <th colspan="4" class='text-center align-middle font-weight-bold'>VACATION LEAVE
                                    </th>
                                    <th colspan="4" class='text-center align-middle font-weight-bold'>SICK LEAVE</th>
                                    <th rowspan="2" class="text-center align-middle font-weight-bold">BALANCE</th>
                                </tr>
                                <tr>
                                    <th class='text-xs text-center align-middle'>EARNED</th>
                                    <th class='text-xs text-center align-middle'>ABSENCES UNDER TIME W/ PAY</th>
                                    <th class='text-xs text-center align-middle'>BALANCE</th>
                                    <th class='text-xs text-center align-middle'>ABSENCES UNDER TIME W/O PAY</th>

                                    <th class='text-xs text-center align-middle'>EARNED</th>
                                    <th class='text-xs text-center align-middle'>ABSENCES UNDER TIME W/ PAY</th>
                                    <th class='text-xs text-center align-middle'>BALANCE</th>
                                    <th class='text-xs text-center align-middle'>ABSENCES UNDER TIME W/O PAY</th>
                                </tr>
                            </thead>
                            <tbody id='leave-card-body'>
                                {{-- DATA FOR FORWARDED BALANCE --}}
                                {{-- VACATION LEAVE --}}
                                @if($forwardedBalance->count() != 0)
                                <tr>
                                    <td class='text-truncate align-middle'>
                                        {{ Carbon\Carbon::parse($forwardedVacationLeave->fb_as_of)->format('M. Y') }}
                                    </td>
                                    <td class='text-truncate text-center bg-light'>ENTRANCE</td>
                                    <td class='text-truncate text-center'></td>
                                    <td class='text-truncate text-center'></td>
                                    <td class='text-truncate text-center bg-light font-weight-bold'
                                        data-label="vacation_balance">
                                        {{ number_format($forwardedVacationLeave->earned - $forwardedVacationLeave->used, 3, '.', '') }}
                                    </td>
                                    <td class='text-truncate text-center'></td>

                                    {{-- SICK LEAVE --}}
                                    <td class='text-truncate text-center' </td> <td class='text-truncate text-center'>
                                    </td>
                                    <td class='text-truncate text-center bg-light font-weight-bold'>
                                        {{ number_format($forwardedSickLeave->earned - $forwardedSickLeave->used, 3, '.', '') }}
                                    </td>
                                    <td class='text-truncate text-center'></td>

                                    {{-- TOTAL --}}
                                    <td class='text-truncate text-center bg-light font-weight-bold'>
                                        {{ number_format(($forwardedVacationLeave->earned - $forwardedVacationLeave->used) + ($forwardedSickLeave->earned - $forwardedSickLeave->used), 3, '.', '') }}
                                    </td>
                                </tr>
                                @endif

                                @foreach($recordsWithoutForwarded as $monthWithType => $record)
                                @php
                                list($date, $type) = explode('-', $monthWithType)
                                @endphp

                                @if($type == $TYPES['INCREMENT'])
                                <tr>
                                    {{-- VACATION LEAVE DATA --}}
                                    <td class='text-truncate align-middle'>{{ $record[0]->date_record->format('M. Y') }}
                                    </td>
                                    <td class='text-truncate text-center align-middle bg-light'>
                                        {{ $record[0]->particular }}</td>
                                    <td class='text-truncate text-center align-middle bg-light font-weight-bold'>
                                        {{ $record[0]->earned }}</td>
                                    <td class='text-truncate text-center align-middle'></td>
                                    <td class='text-truncate text-center align-middle bg-light font-weight-bold'>
                                        {{ $forwardedVacationLeave->earned += $record[0]->earned }}</td>
                                    <td class='text-truncate text-center align-middle'></td>


                                    {{-- SICK LEAVE DATA --}}
                                    <td class='text-truncate text-center align-middle bg-light font-weight-bold'>
                                        {{ $record[1]->earned }}</td>
                                    <td class='text-truncate text-center align-middle'></td>
                                    <td class='text-truncate text-center align-middle bg-light font-weight-bold'>
                                        {{ $forwardedSickLeave->earned += $record[1]->earned }}</td>
                                    <td></td>

                                    <td class='text-truncate text-center align-middle bg-light font-weight-bold'>
                                        {{ ($forwardedVacationLeave->earned + $forwardedSickLeave->earned) }}</td>
                                </tr>
                                @elseif($type == $TYPES['DECREMENT'])
                                @foreach($record as $data)
                                @if(!is_null($data->leave_application_id))
                                <tr>
                                    {{-- VACATION LEAVE DATA --}}
                                    <td class='text-truncate align-middle'>
                                        {{ $data->date_record->format('M. d') }} -
                                        {{ $data->leave_file_application->date_to->format('M. d, Y') }}
                                    </td>
                                    <td class='text-truncate text-center bg-light'>{{ $data->particular }}</td>
                                    <td class='text-truncate text-center' data-label="vacation_earned"></td>
                                    @if($data->type->code_number === $VACATION_LEAVE_CODE_NUMBER)
                                    <td class='text-truncate text-center font-weight-bold'
                                        data-label="vacation_absences_under_time_with_pay">{{ $data->used }}</td>
                                    <td class='text-truncate text-center bg-light font-weight-bold' data-label="">
                                        {{ number_format($forwardedVacationLeave->earned -= $data->used, 3, '.', '') }}
                                    </td>
                                    @else
                                    <td class="text-truncate text-center"></td>
                                    <td class='text-truncate text-center' data-label="">
                                        {{ number_format($forwardedVacationLeave->earned, 3, '.', '') }}</td>
                                    @endif
                                    <td data-label="vacation_absences_under_time_without_pay"></td>

                                    {{-- SICK LEAVE DATA --}}
                                    <td data-label="sick_earned"></td>
                                    @if($data->type->code_number === $SICK_LEAVE_CODE_NUMBER)
                                    <td class='text-truncate text-center bg-light font-weight-bold'>{{ $data->used }}
                                    </td>
                                    <td class='text-truncate text-center bg-light font-weight-bold' data-label="">
                                        {{ number_format($forwardedSickLeave->earned -= $data->used, 3, '.', '')  }}
                                    </td>
                                    @else
                                    <td></td>
                                    <td class='text-truncate text-center' data-label="">
                                        {{ number_format($forwardedSickLeave->earned, 3, '.', '') }}</td>
                                    @endif
                                    <td></td>

                                    <td class='text-truncate text-center bg-light font-weight-bold'>
                                        {{ number_format($forwardedVacationLeave->earned + $forwardedSickLeave->earned, 3, '.', '') }}
                                    </td>
                                </tr>
                                @elseif(!is_null($data->undertime_id))
                                <tr>
                                    {{-- VACATION LEAVE DATA --}}
                                    <td class='text-truncate align-middle'>
                                        {{ $data->undertime->month_year->format('M. d, Y') }}
                                    </td>
                                    <td class='text-truncate text-center bg-light'>{{ $data->particular }}</td>
                                    <td class='text-truncate text-center' data-label="vacation_earned"></td>
                                    @if($data->type->code_number === $VACATION_LEAVE_CODE_NUMBER)
                                    <td class='text-truncate text-center font-weight-bold bg-light'>
                                        {{ $data->undertime->equivalent }}</td>
                                    <td class='text-truncate text-center bg-light font-weight-bold'>
                                        {{ number_format($forwardedVacationLeave->earned -= $data->undertime->equivalent, 3, '.', '') }}
                                    </td>
                                    @else
                                    <td></td>
                                    <td>{{ number_format($forwadedVacationLeave->earned, 3, '.', '') }}</td>
                                    @endif
                                    <td data-label="vacation_absences_under_time_without_pay"></td>

                                    {{-- SICK LEAVE DATA --}}
                                    <td data-label="sick_earned"></td>
                                    @if($data->type->code_number === $SICK_LEAVE_CODE_NUMBER)
                                    <td class='text-truncate text-center font-weight-bold bg-light'>
                                        {{ $data->undertime->equivalent }}</td>
                                    <td class='text-truncate text-center bg-light'>
                                        {{ number_format($forwardedSickLeave->earned -= $data->undertime->equivalent, 3, '.', '') }}
                                    </td>
                                    @else
                                    <td></td>
                                    <td class='text-truncate text-center'>
                                        {{ number_format($forwardedSickLeave->earned, 3, '.', '') }}</td>
                                    @endif
                                    <td></td>

                                    <td class='text-truncate text-center bg-light font-weight-bold'>
                                        {{ number_format($forwardedVacationLeave->earned + $forwardedSickLeave->earned, 3, '.', '') }}
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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

<script>
    let leaveCardData = [];
    const MAX_ITEM_PER_ROW = 11;

    $('#btnFilter').click(function () {
        let startDate = $('#startDate').val();
        let endDate = $('#endDate').val();

        if (startDate && endDate) {
            window.location.href = `/employee-leave-card/${startDate}/${endDate}`;
        } else {
            swal("Oops!", "Start & End Date must have a value", "error");
        }
    });

    $('#btnReset').click(function () {
        let startDate = $('#startDate').val();
        let endDate = $('#endDate').val();
        if (startDate && endDate) {
            $('#startDate, #endDate').val('');
            window.location.href = '/employee-leave-card';
        }
    });

    $('#btnPrint').click(function () {
        leaveCardData = [];
        $('#leave-card-body > tr').each(function (index, row) {
            let tableRow = $(row).children();
            if (tableRow.length === MAX_ITEM_PER_ROW) {
                leaveCardData.push({
                    period: tableRow[0].innerText,
                    particular: tableRow[1].innerText,
                    vacation_earned: tableRow[2].innerText,
                    vacation_absences_under_time_with_pay: tableRow[3].innerText,
                    vacation_balance: tableRow[4].innerText,
                    vacation_absences_under_time_without_pay: tableRow[5].innerText,
                    sick_earned: tableRow[6].innerText,
                    sick_absences_under_time_with_pay: tableRow[7].innerText,
                    sick_balance: tableRow[8].innerText,
                    sick_absences_under_time_without_pay: tableRow[9].innerText,
                    taken: '',
                    total: tableRow[10].innerText,
                });
            }
        });


        $.ajax({
            url: '/employee-leave-card-print',
            method: 'POST',
            data: {
                leaveCardData
            },
            success: function (response) {
                let window_title = "PREVIEW_LEAVE_CARD";
                let fullname = document.querySelector('#employee__fullname').innerText;
                if (response.success) {
                    socket.emit('preview_leave_card', {
                        arguments: `${fullname}|${window_title}`
                    });
                }
            }
        });
    });

</script>
@endpush
@endsection
