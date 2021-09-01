@extends('accounts.employee.layouts.app')
@section('title', 'Your Leave Card')
@prepend('page-css')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet"
    href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />
<style>
    table {
        border-collapse: collapse;
    }
</style>
@endprepend
@section('content')
<div class="p-3">
    <div class="row">
        <div class="col-lg-12 align-middle">
            <div class="welcome-box">
                <div class="welcome-img e-avatar">
                    <img alt="" src="/storage/employee_images/0001_Pimentel.jpg">
                </div>
                <div class="welcome-det">
                    <h4>{{ $employee->fullname }}</h4>
                    <p><small><span class='text-dark font-weight-medium'>Office : </span><span
                                class='font-weight-bold text-dark'>{{ $employee->information->office->office_name }}</span></small>
                    </p>
                    <p><small><span class='text-dark font-weight-medium'>First day of service : </span> <span
                                class='font-weight-bold text-dark'>{{ $employee->first_day_of_service ?? 'N/A' }}
                            </span></small></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row bg-light">
        <div class="col-lg-4">
            <label for="startDate" class="form-group has-float-label">
                <input type="date" id="startDate" class="form-control" value="{{ @$startDate ? Carbon\Carbon::parse($startDate)->format('Y-m-d') : '' }}">
                    <span>
                        <strong>START DATE</strong>
                    </span>
            </label>
        </div>
        <div class="col-lg-5">
            <label for="endDate" class="form-group has-float-label">
                <input type="date" id="endDate" class="form-control" value="{{ @$endDate ? Carbon\Carbon::parse($endDate)->format('Y-m-d') : '' }}">
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
                                    <th colspan="5" class='text-center align-middle font-weight-bold'>VACATION
                                    </th>
                                    <th colspan="4" class='text-center align-middle font-weight-bold'>SICK</th>
                                    <th rowspan="2" colspan="2"
                                        class='text-center align-middle text-xs font-weight-bold'>DATE & ACTION TAKEN
                                        ON APPLICATION FOR LEAVE</th>
                                </tr>
                                <tr>
                                    <th class='text-xs text-center align-middle'>PARTICULAR</th>
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
                            <tbody>
                                    {{-- DATA FOR FORWARDED BALANCE --}}
                                    {{-- VACATION LEAVE --}}
                                    <tr>                                                              
                                        <td class='text-truncate align-middle'>{{ Carbon\Carbon::parse($forwardedVacationLeave->fb_as_of)->format('F Y') }}</td>
                                        <td class='text-truncate text-center bg-light'>ENTRANCE</td>
                                        <td class='text-truncate text-center'></td>
                                        <td class='text-truncate text-center'></td>
                                        <td class='text-truncate text-center bg-light'>{{ number_format($forwardedVacationLeave->earned - $forwardedVacationLeave->used, 3, '.', '') }}</td>
                                        <td class='text-truncate text-center'></td>

                                        {{-- SICK LEAVE --}}
                                        <td class='text-truncate text-center'></td>
                                        <td class='text-truncate text-center'></td>
                                        <td class='text-truncate text-center bg-light'>{{ number_format($forwardedSickLeave->earned - $forwardedSickLeave->used, 3, '.', '') }}</td>
                                        <td class='text-truncate text-center'></td>

                                        {{-- TOTAL --}}
                                        <td class='text-truncate text-center bg-light'>{{ number_format(($forwardedVacationLeave->earned - $forwardedVacationLeave->used) + ($forwardedSickLeave->earned - $forwardedSickLeave->used), 3, '.', '') }}</td>
                                    </tr>

                                    @foreach($recordsWithoutForwarded as $monthWithType => $record)
                                    @php
                                        list($date, $type) = explode('-', $monthWithType)
                                    @endphp
                                
                                        @if($type == $TYPES['INCREMENT'])
                                            <tr>
                                                {{-- VACATION LEAVE DATA --}}
                                                <td class='text-truncate align-middle'>{{ $record[0]->date_record->format('F Y') }}</td>
                                                <td class='text-truncate text-center align-middle bg-light'>{{ $record[0]->particular }}</td>
                                                <td class='text-truncate text-center align-middle bg-light'>{{ $record[0]->earned }}</td>
                                                <td class='text-truncate text-center align-middle'></td>
                                                <td class='text-truncate text-center align-middle bg-light'>{{ $forwardedVacationLeave->earned += $record[0]->earned }}</td>
                                                <td class='text-truncate text-center align-middle'></td>


                                                {{-- SICK LEAVE DATA --}}
                                                <td class='text-truncate text-center align-middle bg-light'>{{ $record[1]->earned }}</td>
                                                <td class='text-truncate text-center align-middle'></td>
                                                <td class='text-truncate text-center align-middle bg-light'>{{ $forwardedSickLeave->earned += $record[1]->earned }}</td>
                                                <td class='text-truncate text-center align-middle'></td>

                                                <td class='text-truncate text-center align-middle bg-light'>{{ ($forwardedVacationLeave->earned + $forwardedSickLeave->earned) }}</td>
                                            </tr>
                                        @elseif($type == $TYPES['DECREMENT'])
                                            @foreach($record as $data)
                                                @if(!is_null($data->leave_application_id))
                                                    <tr>
                                                        {{-- VACATION LEAVE DATA --}}
                                                        <td class='text-truncate align-middle'>
                                                            {{ $data->date_record->format('F d') }} - {{ $data->leave_file_application->date_to->format('F d, Y') }}
                                                        </td>
                                                        <td class='text-truncate text-center bg-light'>{{ $data->particular }}</td>
                                                        <td class='text-truncate text-center' data-label="vacation_earned"></td>
                                                        <td class='text-truncate text-center' data-label="vacation_absences_under_time_with_pay"></td>
                                                        @if($data->type->code_number === $VACATION_LEAVE_CODE_NUMBER)
                                                            <td class='text-truncate text-center bg-light' data-label="">{{ number_format($forwardedVacationLeave->earned -= $data->used, 3, '.', '') }}</td>
                                                            @else
                                                            <td class='text-truncate text-center' data-label="">{{ number_format($forwardedVacationLeave->earned, 3, '.', '') }}</td>
                                                        @endif
                                                        <td data-label="vacation_absences_under_time_without_pay"></td>

                                                        {{-- SICK LEAVE DATA --}}
                                                        <td data-label="sick_earned"></td>
                                                        <td data-label="sick_absences_under_time_with_pay"></td>
                                                        @if($data->type->code_number === $SICK_LEAVE_CODE_NUMBER)
                                                            <td class='text-truncate text-center bg-light' data-label="">{{ number_format($forwardedSickLeave->earned -= $data->used, 3, '.', '')  }}</td>
                                                            @else
                                                            <td class='text-truncate text-center' data-label="">{{ number_format($forwardedSickLeave->earned, 3, '.', '') }}</td>
                                                        @endif
                                                        <td></td>

                                                        <td class='text-truncate text-center bg-light'>{{ number_format($forwardedVacationLeave->earned + $forwardedSickLeave->earned, 3, '.', '') }}</td>
                                                    </tr>
                                                @elseif(!is_null($data->undertime_id))
                                                    <tr>
                                                        {{-- VACATION LEAVE DATA --}}
                                                        <td class='text-truncate align-middle'>
                                                            {{ $data->undertime->month_year->format('F d, Y') }}
                                                        </td>
                                                        <td class='text-truncate text-center bg-light'>{{ $data->particular }}</td>
                                                        <td class='text-truncate text-center' data-label="vacation_earned"></td>
                                                        <td class='text-truncate text-center' data-label="vacation_absences_under_time_with_pay"></td>
                                                        @if($data->type->code_number === $VACATION_LEAVE_CODE_NUMBER)
                                                            <td class='text-truncate text-center bg-light' data-label="">{{ number_format($forwardedVacationLeave->earned -= $data->undertime->equivalent, 3, '.', '') }}</td>
                                                            @else
                                                            <td>{{ number_format($forwadedVacationLeave->earned, 3, '.', '') }}</td>
                                                        @endif
                                                        <td data-label="vacation_absences_under_time_without_pay"></td>

                                                        {{-- SICK LEAVE DATA --}}
                                                        <td data-label="sick_earned"></td>
                                                        <td data-label="sick_absences_under_time_with_pay"></td>
                                                        @if($data->type->code_number === $SICK_LEAVE_CODE_NUMBER)
                                                            <td class='text-truncate text-center bg-light' data-label="">{{ number_format($forwardedSickLeave->earned -= $data->undertime->equivalent, 3, '.', '') }}</td>
                                                            @else
                                                            <td class='text-truncate text-center'>{{ number_format($forwardedSickLeave->earned, 3, '.', '') }}</td>
                                                        @endif
                                                        <td></td>

                                                        <td class='text-truncate text-center bg-light'>{{ number_format($forwardedVacationLeave->earned + $forwardedSickLeave->earned, 3, '.', '') }}</td>
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
        let data = [];
        const MAX_ITEM_PER_ROW = 12;

        $('#btnFilter').click(function () {
            let startDate = $('#startDate').val();
            let endDate = $('#endDate').val();

            if(startDate && endDate) {
                window.location.href = `/employee-leave-card/${startDate}/${endDate}`;
            } else {
                swal("Oops!", "Start & End Date must have a value", "error");
            }
        });

        $('#btnReset').click(function () {
            $('#startDate, #endDate').val('');
            window.location.href = '/employee-leave-card';
        });

        $('#btnPrint').click(function () {
            data = [];
            $('#leave-card-body > tr').each(function (index, row) {
                let tableRow = $(row).children();
                if(tableRow.length === MAX_ITEM_PER_ROW) {
                    data.push({
                        period                                  : tableRow[0].innerText,
                        particular                              : tableRow[1].innerText,
                        vacation_earned                         : tableRow[2].innerText,
                        vacation_absences_under_time_with_pay   : tableRow[3].innerText,
                        vacation_balance                        : tableRow[4].innerText,
                        vacation_absences_under_time_without_pay: tableRow[5].innerText,
                        sick_earned                             : tableRow[6].innerText,
                        sick_absences_under_time_with_pay       : tableRow[7].innerText,
                        sick_balance                            : tableRow[8].innerText,
                        sick_absences_under_time_without_pay    : tableRow[9].innerText,
                        taken                                   : tableRow[10].innerText,
                        over_all_total                          : tableRow[11].innerText,
                    });
                }
            });
            $.ajax({
                url : '/employee-leave-card-print',
                method : 'POST',
                data : { data },
                success : function (response) {
                    if(response.success) {
                        socket.emit('preview_leave_card', { arguments : `${fullname}|${window_title}`});
                        // socket.emit('preview_leave_certification', { arguments : `${fullname}|${window_title}` })
                    }
                }
            });
        });
    </script>
@endpush
@endsection
