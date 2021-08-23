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
                <input type="date" id="startDate" class="form-control" value="{{ $startDate ? Carbon\Carbon::parse($startDate)->format('Y-m-d') : '' }}">
                    <span>
                        <strong>START DATE</strong>
                    </span>
            </label>
        </div>
        <div class="col-lg-5">
            <label for="endDate" class="form-group has-float-label">
                <input type="date" id="endDate" class="form-control" value="{{ $endDate ? Carbon\Carbon::parse($endDate)->format('Y-m-d') : '' }}">
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
                                    <th colspan="5" class='text-center align-middle font-weight-bold'>VACATION LEAVE
                                    </th>
                                    <th colspan="4" class='text-center align-middle font-weight-bold'>SICK LEAVE</th>
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
                                <tr>
                                    {{-- SICK LEAVE TABLE DATA --}}
                                    <td class='text-truncate text-center font-weight-bold'>
                                        Bal. forwaded as of
                                        <span class='align-middle'>
                                            {{ Carbon\Carbon::parse($forwardedBalance->first()->fb_as_of)->format('F d, Y') }}
                                        </span>
                                    </td>
                                    <td class='text-center align-middle text-sm text-uppercase font-weight-medium'>
                                        Entrance</td>
                                    <td class='text-center align-middle text-xs text-uppercase font-weight-bold'></td>
                                    <td class='text-center align-middle text-xs text-uppercase font-weight-bold'></td>
                                    <td
                                        class='text-center align-middle text-sm text-uppercase font-weight-bold'>
                                        {{ $forwardedSickLeave->earned }}</td>
                                    <td class='text-center align-middle text-xs text-uppercase font-weight-bold'></td>

                                    {{-- VACATION LEAVE TABLE DATA --}}
                                    <td class='text-center align-middle text-xs text-uppercase font-weight-bold'></td>
                                    <td class='text-center align-middle text-xs text-uppercase font-weight-bold'></td>
                                    <td
                                        class='text-center align-middle text-sm text-uppercase font-weight-bold'>
                                        {{ $forwardedVacationLeave->earned  }}</td>
                                    <td class='text-center align-middle text-xs text-uppercase font-weight-bold'></td>

                                    <td class='text-center align-middle text-xs text-uppercase font-weight-bold'></td>
                                    <td class='text-center align-middle text-sm text-uppercase font-weight-bold'>
                                        {{  $overAllTotal = $totalOfForwardedBalance }}</td>
                                </tr>
                                @foreach($recordsWithoutForwarded as $type => $record)
                                <tr>
                                    @if($type === $TYPES['INCREMENT'])
                                        @php
                                            $recordGroupByMonth = $record->groupBy(function ($record) {
                                                return $record->created_at->format('F - Y');
                                            });
                                        @endphp
                                        @foreach($recordGroupByMonth as $period => $data)
                                        @php
                                            $sickLeaveIncrement = $data->where('type.code_number', $SICK_LEAVE_CODE_NUMBER)->first();
                                            $vacationLeaveIncrement = $data->where('type.code_number', $VACATION_LEAVE_CODE_NUMBER)->first();
                                        @endphp
                                            <tr>
                                                {{-- VACATION LEAVE DATA --}}
                                                <td class='text-sm font-weight-bold text-center'>{{ $period }}</td>
                                                <td class='text-sm font-weight-medium text-center'>{{ $vacationLeaveIncrement->particular ?? 'EL' }}</td>
                                                <td class='text-sm font-weight-bold text-center'>{{ @$vacationLeaveIncrement->earned }}</td>
                                                <td class='text-sm font-weight-bold text-center'>{{ @$vacationLeaveIncrement->absences_under_time_with_pay_balance }}</td>
                                                <td class='text-sm font-weight-bold text-center'>{{ @$forwardedVacationLeave->earned += $vacationLeaveIncrement->earned }}</td>
                                                <td class='text-sm font-weight-bold text-center'>{{ @$vacationLeaveIncrement->absences_under_time_without_pay_balance }}</td>

                                                {{-- SICK LEAVE DATA --}}
                                                <td class='text-sm font-weight-bold text-center'>{{ @$sickLeaveIncrement->earned }}</td>
                                                <td class='text-sm font-weight-bold text-center'>{{ @$sickLeaveIncrement->absences_under_time_with_pay_balance }}</td>
                                                <td class='text-sm font-weight-bold text-center'>{{ @$forwardedSickLeave->earned += $sickLeaveIncrement->earned }}</td>
                                                <td class='text-sm font-weight-bold text-center'>{{ @$sickLeaveIncrement->absences_under_time_without_pay_balance }}</td>

                                                {{-- DATE & ACTION  --}}
                                                <td class='text-sm font-weight-bold text-center'></td>
                                                <td class='text-sm font-weight-bold text-center'>{{ $overAllTotal = $forwardedVacationLeave->earned + $forwardedSickLeave->earned }}</td>
                                            </tr>
                                        @endforeach
                                    @elseif($type === $TYPES['DECREMENT'])
                                            @foreach($record as $data)
                                                <tr>
                                                    <td class='text-sm text-center font-weight-bold'>{{ $data->created_at->format('F d, Y') }}</td>
                                                    <td class='bg-light text-sm text-center font-weight-medium'>{{ $data->particular }}</td>
                                                    {{-- VACATION LEAVE DATA --}}
                                                    @if($data->type->code_number === $VACATION_LEAVE_CODE_NUMBER)
                                                        <td class='bg-light'></td>
                                                        <td class='bg-light text-sm text-center font-weight-bold'>{{ $data->used }}</td>
                                                        <td class='bg-light text-sm text-center font-weight-bold'>{{ $forwardedVacationLeave->earned = ($forwardedVacationLeave->earned - $data->used) }}</td>
                                                        <td class='bg-light'></td>
                                                        
                                                        {{-- SICK LEAVE DATA --}}
                                                        <td></td>
                                                        <td></td>
                                                        <td class='text-sm text-center font-weight-medium'>{{ $forwardedSickLeave->earned = $forwardedSickLeave->earned - 0 }}</td>
                                                        <td></td>

                                                        {{-- DATE & ACTION --}}
                                                        <td class='text-sm text-center font-weight-bold'>{{ $data->used }}</td>
                                                        <td class='text-sm text-center font-weight-bold'>{{  ($forwardedVacationLeave->earned + $forwardedSickLeave->earned) - $data->used }}</td>
                                                    @endif
                                                    @if($data->type->code_number === $SICK_LEAVE_CODE_NUMBER)
                                                        {{-- VACATION LEAVE DATA --}}
                                                        <td></td>
                                                        <td></td>
                                                        <td class='text-sm text-center font-weight-medium'>{{ $forwardedVacationLeave->earned = $forwardedVacationLeave->earned - 0 }}</td>
                                                        <td></td>

                                                        {{-- SICK LEAVE DATA --}}
                                                        <td class='bg-light'></td>
                                                        <td class='bg-light text-sm text-center font-weight-bold'>{{ $data->used }}</td>
                                                        <td class='bg-light text-sm text-center font-weight-bold'>{{ $forwardedSickLeave->earned = ($forwardedSickLeave->earned - $data->used) }}</td>
                                                        <td class='bg-light'></td>

                                                        {{-- DATE & ACTION --}}
                                                        <td class='text-sm text-center font-weight-bold'>{{ $data->used }}</td>
                                                        <td class='text-sm text-center font-weight-bold'>{{  ($forwardedVacationLeave->earned + $forwardedSickLeave->earned) - $data->used }}</td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                    @endif
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <td colspan="12" class="text-center text-sm bg-light">
                                    &nbsp;
                                </td>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('page-scripts')
    <script>
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
    </script>
@endpush
@endsection
