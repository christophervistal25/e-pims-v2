    @if($forwardedBalance->count() === 0)
        <td colspan="12" class="text-center text-sm bg-light">
            <i class='fa fa-warning fa-2x text-danger'></i>
            <h6 class="display-5 text-uppercase">no available data</h6>
        </td>
        <input type="text" name="data_found" id="data_found" value="0">
    @else
    <tr>        
        {{-- VACATION LEAVE TABLE DATA --}}
        <td class='text-truncate text-center font-weight-medium' data-label="period">
            Bal. forwaded as of
            <span class='font-weight-bold'>
                ( {{ Carbon\Carbon::parse($forwardedBalance->first()->fb_as_of)->format('F d, Y') }} ) 
            </span>
        </td>
        <td class='text-center align-middle text-sm text-uppercase font-weight-medium' data-label="particular">
            Entrance</td>
        <td class='text-center align-middle text-xs text-uppercase font-weight-bold' data-label="earned"></td>
        <td class='text-center align-middle text-xs text-uppercase font-weight-bold' data-label="absences_with_pay"></td>   
        <td
            class='text-center align-middle text-sm text-uppercase font-weight-bold' data-label="vacation_balance">
            {{ $forwardedVacationLeave->earned = $forwardedVacationLeave->earned  - $forwardedVacationLeave->used }}</td>
        <td class='text-center align-middle text-xs text-uppercase font-weight-bold' data-label="absences_without_pay"></td>

        {{-- SICK LEAVE TABLE DATA --}}
        <td class='text-center align-middle text-xs text-uppercase font-weight-bold'></td>
        <td class='text-center align-middle text-xs text-uppercase font-weight-bold'></td>
        <td
            class='text-center align-middle text-sm text-uppercase font-weight-bold' data-label="sick_balance">
            {{ $forwardedSickLeave->earned = $forwardedSickLeave->earned - $forwardedSickLeave->used  }}</td>
        <td class='text-center align-middle text-xs text-uppercase font-weight-bold'></td>
        <td class='text-center align-middle text-sm text-uppercase font-weight-bold' data-label="over_all_total">
            {{  $overAllTotal = $totalOfForwardedBalance }}</td>
        <td class='text-center align-middle text-xs text-uppercase font-weight-bold'></td>
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
                    <td class='text-sm font-weight-bold text-center' data-label="period">{{ $period }}</td>
                    <td class='text-sm font-weight-medium text-center' data-label="particular">{{ $vacationLeaveIncrement->particular ?? 'EL' }}</td>
                    <td class='text-sm font-weight-medium text-center' data-label="vacation_earned">{{ @$vacationLeaveIncrement->earned }}</td>
                    <td class='text-sm font-weight-medium text-center' data-label="vacation_absences_with_pay">{{ @$vacationLeaveIncrement->absences_under_time_with_pay_balance }}</td>
                    <td class='text-sm font-weight-bold text-center' data-label="vacation_balance">{{ @$forwardedVacationLeave->earned += $vacationLeaveIncrement->earned }}</td>
                    <td class='text-sm font-weight-bold text-center' data-label="vacation_absences_without_pay">{{ @$vacationLeaveIncrement->absences_under_time_without_pay_balance }}</td>

                    {{-- SICK LEAVE DATA --}}
                    <td class='text-sm font-weight-medium text-center' data-label="sick_earned">{{ @$sickLeaveIncrement->earned }}</td>
                    <td class='text-sm font-weight-medium text-center' data-label="sick_absences_with_pay">{{ @$sickLeaveIncrement->absences_under_time_with_pay_balance }}</td>
                    <td class='text-sm font-weight-bold text-center' data-label="sick_balance">{{ @$forwardedSickLeave->earned += $sickLeaveIncrement->earned }}</td>
                    <td class='text-sm font-weight-medium text-center' data-label="sick_absences_without_pay">{{ @$sickLeaveIncrement->absences_under_time_without_pay_balance }}</td>

                    {{-- DATE & ACTION  --}}
                    <td class='text-sm font-weight-bold text-center' data-label="over_all_total">{{ $overAllTotal = $forwardedVacationLeave->earned + $forwardedSickLeave->earned }}</td>
                    <td class='text-sm font-weight-bold text-center'></td>
                </tr>
            @endforeach
        @elseif($type === $TYPES['DECREMENT'])
                @foreach($record as $data)
                    <tr>
                        @if($data->undertime_id === null)
                            <td class='text-sm text-center font-weight-bold' data-label="period">
                                {{
                                    Carbon\Carbon::parse($data->leave_file_application->date_from)->format('F d')  . ' - ' .  Carbon\Carbon::parse($data->leave_file_application->date_to)->format('F d, Y')
                                }}
                            </td>
                        @else
                            <td class='text-sm text-center font-weight-bold' data-label="period">
                                {{
                                    Carbon\Carbon::parse($data->undertime->date_added)->format('F Y') 
                                }}
                            </td>
                        @endif
                        <td class='bg-light text-sm text-center text-truncate font-weight-medium' data-label="particular">{{ $data->particular }}</td>
                        {{-- VACATION LEAVE DATA --}}
                        @if($data->type->code_number === $VACATION_LEAVE_CODE_NUMBER)
                            @if($data->undertime_id === null)
                                <td class='bg-light'></td>
                                <td class='bg-light text-sm text-center font-weight-medium' data-label="vacation_absences_with_pay">{{ $data->used }}</td>
                                <td class='bg-light text-sm text-center font-weight-bold' data-label="vacation_balance">{{ $forwardedVacationLeave->earned = ($forwardedVacationLeave->earned - $data->used) }}</td>
                                <td class='bg-light'></td>
                                
                                {{-- SICK LEAVE DATA --}}
                                <td></td>
                                <td></td>
                                <td class='text-sm text-center font-weight-medium' data-label="sick_balance">{{ $forwardedSickLeave->earned = $forwardedSickLeave->earned - 0 }}</td>
                                <td></td>

                                {{-- DATE & ACTION --}}
                                <td class='text-sm text-center font-weight-bold' data-label="over_all_total">{{ $overAllTotal = $overAllTotal - $data->used }}</td>
                                <td class='text-sm text-center font-weight-bold text-right' data-label="taken">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons md-18">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="/employee/leave/leave-list/{{ $data->leave_application_id }}"><i class="fa fa-pencil m-r-5  font-weight-bold" id="viewLA"></i> View Leave Application</a>
                                            <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-print m-r-5 font-weight-bold" id="printLA"></i> Print Certification</a>
                                        </div>
                                    </div>
                                </td>
                            @elseif($data->leave_application_id === null)
                                <td class='bg-light'></td>
                                <td class='bg-light text-sm text-center font-weight-medium' data-label="vacation_absences_with_pay">{{ $data->absences_under_time_with_pay_balance }}</td>
                                <td class='bg-light text-sm text-center font-weight-bold' data-label="vacation_balance">{{ $forwardedVacationLeave->earned = ($forwardedVacationLeave->earned - $data->absences_under_time_with_pay_balance) }}</td>
                                <td class='bg-light'></td>
                                
                                {{-- SICK LEAVE DATA --}}
                                <td></td>
                                <td></td>
                                <td class='text-sm text-center font-weight-medium' data-label="sick_balance">{{ $forwardedSickLeave->earned = $forwardedSickLeave->earned - 0 }}</td>
                                <td></td>

                                {{-- DATE & ACTION --}}
                                <td class='text-sm text-center font-weight-bold' data-label="over_all_total">{{ $overAllTotal = $overAllTotal - $data->absences_under_time_with_pay_balance }}</td>
                                <td class='text-sm text-center font-weight-bold text-right' data-label="taken">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons md-18">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button class="dropdown-item text-secondary" type="button" id="editUndertime" data-id="{{ $data->undertime_id }}"><i class="fa fa-pencil m-r-5 font-weight-bold" ></i> Edit</button>
                                            <button class="dropdown-item text-danger" type="button" id="deleteUndertime" data-id="{{ $data->undertime_id }}"><i class="fa fa-trash-o m-r-5 font-weight-bold"></i> Delete</button>
                                        </div>
                                    </div>
                                </td>
                            @endif
                        @endif
                        @if($data->type->code_number === $SICK_LEAVE_CODE_NUMBER)
                            {{-- VACATION LEAVE DATA --}}
                            <td></td>
                            <td></td>
                            <td class='text-sm text-center font-weight-medium' data-label="sick_balance">{{ $forwardedVacationLeave->earned = $forwardedVacationLeave->earned - 0 }}</td>
                            <td></td>

                            {{-- SICK LEAVE DATA --}}
                            <td class='bg-light'></td>
                            <td class='bg-light text-sm text-center font-weight-medium' data-label="sick_absences_with_pay">{{ $data->used }}</td>
                            <td class='bg-light text-sm text-center font-weight-bold' data-label="sick_balance">{{ $forwardedSickLeave->earned = ($forwardedSickLeave->earned - $data->used) }}</td>
                            <td class='bg-light'></td>

                            {{-- DATE & ACTION --}}
                            <td class='text-sm text-center font-weight-bold' data-label="over_all_total">{{ $overAllTotal = $overAllTotal - $data->used }}</td>
                            <td class='text-sm text-center font-weight-bold text-right' data-label="taken">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons md-18">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="/employee/leave/leave-list/{{ $data->leave_application_id }}"><i class="fa fa-pencil m-r-5  font-weight-bold" id="viewLA"></i> View Leave Application</a>
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-print m-r-5 font-weight-bold" id="printLA"></i> Print Certification</a>
                                    </div>
                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach
        @endif
        </tr>
    @endforeach
    @endif