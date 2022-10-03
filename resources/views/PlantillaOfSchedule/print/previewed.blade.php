<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    {{-- <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap"> --}}
    <title>Print Step-Increment</title>
    <style>
        @media print {
            #action-buttons {
                display :none !important;
            }
            @page {
                size: legal landscape;
            }
        }
    </style>
</head>
<body style="font-family: Serif;">

{{-- BUTTONS --}}
<div id='action-buttons' class="float-right mt-3 mb-2">
    <a href="" class="btn btn-outline-dark" onclick="window.print()" id="printBtn"><i class="la la-print"></i>&nbsp Print</a>
    <a href="/plantilla-of-schedule" class="btn btn-info"><i class="la la-list"></i>&nbsp View Table</a>
</div>
<div class="clearfix"></div>

<div class="col-12 pl-5 pr-0 card" id='main-container'>
    <div class="card-header pl-5 pr-0" id="headingOne">
        {{-- HEADING --}}
        <div class="text-center">
            <span style="font-size: 13px;">Republic of the Philippines</span><br>
            <span style="font-size: 13px;">Civil Service Commission</span><br>
            <span style="font-size: 13px;font-weight: bolder;">PLANTILLA OF PERSONNEL</span>
            <br>
            <br>
            <span style="font-size: 13px;">For the Fiscal Year {{Carbon\Carbon::now()->format('Y')}}</span>
        </div>
        <div>
        <br>
        <table id="table" class="table table-bordered" style="border: 1px solid black;">
            <thead>
                    <tr>
                        <th style="padding: 0;border: 1px solid black !important;font-size: 13px;background-color: #808080 !important; color: #FFFFFF !important; -webkit-print-color-adjust: exact;" colspan="8">&nbsp;(1) Department : <span style="text-align:center;font-weight: bolder;">{{$office[0]->office_short_name}}</span></th>
                        <th style="padding: 0;border: 1px solid black !important;font-size: 13px;" colspan="8">&nbsp;(2) Bureau/Agency/Subsidiary : <span style="font-weight: bolder;">Provincial Government of Surigao del Sur</span></th>
                    </tr>
                    <tr>
                        <th style="padding: 0;border: 1px solid black !important;font-size: 13px;text-align:center;" class="align-bottom" rowspan="2">Item<br>No.<br><br>(3)</th>
                        <th style="padding: 0;border: 1px solid black !important;font-size: 13px;text-align:center;" class="align-bottom" rowspan="2">Position Title<br><br>(4)</th>
                        <th style="padding: 0;border: 1px solid black !important;font-size: 13px;text-align:center;" class="align-bottom" rowspan="2">SG<br><br>(5)</th>
                        <th style="padding: 0;border: 1px solid black !important;font-size: 13px;text-align:center;" class="align-middle" colspan="2">Annual Salary</th>
                        <th style="padding: 0;border: 1px solid black !important;font-size: 13px;text-align:center;" class="align-bottom" rowspan="2">S<br>T<br>E<br>P<br>(8)</th>
                        <th style="padding: 0;border: 1px solid black !important;font-size: 13px;text-align:center;" class="align-middle" colspan="2">Area</th>
                        <th style="padding: 0;border: 1px solid black !important;font-size: 13px;text-align:center;" class="align-bottom" rowspan="2">L<br>E<br>V<br>E<br>L<br>(11)</th>
                        <th style="padding: 0;border: 1px solid black !important;font-size: 13px;text-align:center;" class="align-middle" colspan="3">Name of Incumbents</th>
                        <th style="padding: 0;border: 1px solid black !important;font-size: 13px;text-align:center;" class="align-bottom" rowspan="2">Date of Birth<br>(mm/dd/yyyy)<br><br>(15)</th>
                        <th style="padding: 0;border: 1px solid black !important;font-size: 13px;text-align:center;" class="align-bottom" rowspan="2">Date of<br>Original<br>Appointment<br>(mm/dd/yyyy)<br>(16)</th>
                        <th style="padding: 0;border: 1px solid black !important;font-size: 13px;text-align:center;" class="align-bottom" rowspan="2">Date of<br>Last<br>Promotion<br><br>(17)</th>
                        <th style="padding: 0;border: 1px solid black !important;font-size: 13px;text-align:center;" class="align-bottom" rowspan="2">Status<br><br>(18)</th>
                    </tr>
                    <th style="padding: 0;border: 1px solid black !important;font-size: 13px;text-align:center;" class="align-bottom">Authorized<br><br>(6)</th>
                    <th style="padding: 0;border: 1px solid black !important;font-size: 13px;text-align:center;" class="align-bottom">Actual<br><br>(7)</th>
                    <th style="padding: 0;border: 1px solid black !important;font-size: 13px;text-align:center;" class="align-bottom">C<br>O<br>D<br>E<br>(9)</th>
                    <th style="padding: 0;border: 1px solid black !important;font-size: 13px;text-align:center;" class="align-bottom">T<br>Y<br>P<br>E<br>(10)</th>
                    <th style="padding: 0;border: 1px solid black !important;font-size: 13px;text-align:center;" class="align-bottom">Last Name<br><br>(12)</th>
                    <th style="padding: 0;border: 1px solid black !important;font-size: 13px;text-align:center;" class="align-bottom">First Name<br><br>(13)</th>
                    <th style="padding: 0;border: 1px solid black !important;font-size: 13px;text-align:center;" class="align-bottom">Middle Name<br><br>(14)</th>
            </thead>
            <tbody>
                @foreach($plantillaPosition as $plantillaPositions)
                    <tr>
                        <td style="padding: 0;border: 1px solid black !important;font-size: 14px;color: #000000;text-align: center;">{{$plantillaPositions->item_no}}</td>
                        <td style="padding: 0;border: 1px solid black !important;font-size: 14px;color: #000000;text-align: center;">{{$plantillaPositions->position->position_name}}</td>
                        <td style="padding: 0;border: 1px solid black !important;font-size: 14px;color: #000000;text-align: center;">{{$plantillaPositions->sg_no}}</td>
                        <td style="padding: 0;border: 1px solid black !important;font-size: 14px;color: #000000;text-align: center;">
                            @foreach($plantillaSchedule as $plantillaSchedules)
                                {{$plantillaPositions->pp_id == $plantillaSchedules->pp_id ? number_format($plantillaSchedules->salary_amount * 12, 2) : ''}}
                            @endforeach
                        </td>
                        <td style="padding: 0;border: 1px solid black !important;font-size: 14px;color: #000000;text-align: center;">
                            @if ($plantillaPositions->plantillas['year'] == Carbon\Carbon::now()->format('Y'))
                                {{empty($plantillaPositions->plantillas['salary_amount']) ? number_format($plantillaPositions->salary_grade->sg_step1 * 12, 2) : number_format($plantillaPositions->plantillas->salary_amount * 12, 2) }}
                            @else
                                {{empty($plantillaPositions->plantillas['salary_amount']) ? number_format($plantillaPositions->salary_grade->sg_step1 * 12, 2) : ''}}
                            @endif
                        </td>
                        <td style="padding: 0;border: 1px solid black !important;font-size: 14px;color: #000000;text-align: center;">
                            @if ($plantillaPositions->plantillas['year'] == Carbon\Carbon::now()->format('Y'))
                                {{empty($plantillaPositions->plantillas['step_no']) ? '' : $plantillaPositions->plantillas->step_no }}
                            @else
                                {{empty($plantillaPositions->plantillas['step_no']) ? '1' : ''}}
                            @endif
                        </td>
                        <td style="padding: 0;border: 1px solid black !important;font-size: 14px;color: #000000;text-align: center;">
                            @if ($plantillaPositions->plantillas['year'] == Carbon\Carbon::now()->format('Y'))
                                {{empty($plantillaPositions->plantillas['area_code']) ? '' : mb_substr($plantillaPositions->plantillas['area_code'], 0, 1) == 'C' ? '15' : '' }}
                            @else
                                {{empty($plantillaPositions->plantillas['area_code']) ? '15' : ''}}
                            @endif
                        {{-- {{mb_substr($plantillaPositions->plantillas['area_code'], 0, 1) == 'C' ? '15' : ''}} --}}
                        </td>
                        <td style="padding: 0;border: 1px solid black !important;font-size: 14px;color: #000000;text-align: center;">
                            @if ($plantillaPositions->plantillas['year'] == Carbon\Carbon::now()->format('Y'))
                                {{empty($plantillaPositions->plantillas['area_type']) ? '' : mb_substr($plantillaPositions->plantillas['area_type'], 0, 1) }}
                            @else
                                {{empty($plantillaPositions->plantillas['area_type']) ? 'P' : ''}}
                            @endif
                        </td>
                        <td style="padding: 0;border: 1px solid black !important;font-size: 14px;color: #000000;text-align: center;">
                            @if ($plantillaPositions->plantillas['year'] == Carbon\Carbon::now()->format('Y'))
                                {{empty($plantillaPositions->plantillas['area_level']) ? '' : mb_substr($plantillaPositions->plantillas['area_level'], 0, 1) }}
                            @else
                                {{empty($plantillaPositions->plantillas['area_level']) ? 'T' : ''}}
                            @endif
                        {{-- {{mb_substr($plantillaPositions->plantillas['area_level'], 0, 1)}} --}}
                        </td>
                        <td style="padding: 0;border: 1px solid black !important;font-size: 14px;color: #000000;text-align: center;">
                            {{ $plantillaPositions->plantillas['year'] == Carbon\Carbon::now()->format('Y') ? '' : 'Vacant'}}
                            @foreach($employee as $employees)
                                {{$plantillaPositions->plantillas['employee_id'] == $employees->employee_id ?  $employees->lastname : ''}}
                            @endforeach
                        </td>
                        <td style="padding: 0;border: 1px solid black !important;font-size: 14px;color: #000000;text-align: center;">
                            @foreach($employee as $employees)
                                {{$plantillaPositions->plantillas['employee_id'] == $employees->employee_id ?  $employees->firstname : ''}}
                            @endforeach
                        </td>
                        <td style="padding: 0;border: 1px solid black !important;font-size: 14px;color: #000000;text-align: center;">
                            @foreach($employee as $employees)
                                {{$plantillaPositions->plantillas['employee_id'] == $employees->employee_id ?  $employees->middlename : ''}}
                            @endforeach
                        </td>
                        <td style="padding: 0;border: 1px solid black !important;font-size: 14px;color: #000000;text-align: center;">
                            @foreach($employee as $employees)
                                {{$plantillaPositions->plantillas['employee_id'] == $employees->employee_id ?  Carbon\Carbon::parse($employees->date_birth)->format('m/d/Y') : ''}}
                            @endforeach
                        </td>
                        <td style="padding: 0;border: 1px solid black !important;font-size: 14px;color: #000000;text-align: center;">
                            @foreach($plantillaSchedule as $plantillaSchedules)
                                {{$plantillaPositions->pp_id == $plantillaSchedules->pp_id ? Carbon\Carbon::parse($plantillaSchedules->date_original_appointment)->format('m/d/Y') : ''}}
                            @endforeach
                        </td>
                        <td style="padding: 0;border: 1px solid black !important;font-size: 14px;color: #000000;text-align: center;">
                            @foreach($plantillaSchedule as $plantillaSchedules)
                                {{$plantillaPositions->pp_id == $plantillaSchedules->pp_id ? Carbon\Carbon::parse($plantillaSchedules->date_last_promotion)->format('m/d/Y') : ''}}
                            @endforeach
                        </td>
                        <td style="padding: 0;border: 1px solid black !important;font-size: 14px;color: #000000;text-align: center;">
                            @foreach($plantillaSchedule as $plantillaSchedules)
                                {{$plantillaPositions->pp_id == $plantillaSchedules->pp_id ? $plantillaSchedules->status : ''}}
                            @endforeach
                        </td>
                    </tr>
                @Endforeach
                <tbody id="displayEmptyRows" style="border: 1px solid black !important;">
                </tbody>
            </tbody>
        </table>
            <div class="float-right">
                <span><b style="font-size: 13px;">LEGEND:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></span><br><br>
                <span style="font-size: 13px;">K- Elected Officials</span><br>
                <span style="font-size: 13px;">A- Perm./Coterm.</span><br>
                <span style="font-size: 13px;">Type - Provincial</span><br>
                <span style="font-size: 13px;">Code - 15</span><br>
                <span style="font-size: 13px;">E - Elected</span><br>
                <span style="font-size: 13px;">C - Coterminous</span><br>
                <span style="font-size: 13px;">P - Permanent</span><br>
            </div>




            <div class="col-10 float-left">
                <p style="font-size: 12px;">(19) Total Number of Personnel Items:  {{$plantillaPositionCount}}</p>
                <p style="font-size: 12px;">I certify to the correctness of the entries and that above Position items are duly approved and authorized by the agency and in<br>
                compliance to existing rules and regulations. I further certify that employees whose names appear above are the incumbents<br>
                of the position.</p>
                <span style="font-size: 12px;font-weight: bolder;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Prepared:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="font-size: 12px;font-weight: bolder;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Approved:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br><br>
                <div>
                    <span><b style="font-size: 13px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ACE R. ORCULLO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></span><span style="font-size: 13px;text-decoration: underline;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Carbon\Carbon::now()->format('m/d/Y')}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span><b style="font-size: 13px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ALEXANDER T. PIMENTEL</b></span><br>
                    <span style="font-size: 13px;">Provincial Human Resource Management Officer</span>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span style="font-size: 13px;">Date</span>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span style="font-size: 13px;">Provincial Governor</span>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        if(localStorage.getItem('serviceRecordsRows') != null){
            var emptyRowsNumber = localStorage.getItem('serviceRecordsRows');
            var tr = [];
                for(var i = 1;i <= emptyRowsNumber; i++){
                    tr += `<tr>
                    <td style="border: 1px solid black !important;font-size: 13px;color:#000000;text-align: center;"></td>
                    <td style="border: 1px solid black !important;font-size: 13px;color:#000000;text-align: center;"></td>
                    <td style="border: 1px solid black !important;font-size: 13px;color:#000000;text-align: center;"></td>
                    <td style="border: 1px solid black !important;font-size: 13px;color:#000000;text-align: center;"></td>
                    <td style="border: 1px solid black !important;font-size: 13px;color:#000000;text-align: center;"></td>
                    <td style="border: 1px solid black !important;font-size: 13px;color:#000000;text-align: center;"></td>
                    <td style="border: 1px solid black !important;font-size: 13px;color:#000000;text-align: center;"></td>
                    <td style="border: 1px solid black !important;font-size: 13px;color:#000000;text-align: center;"></td>
                    <td style="border: 1px solid black !important;font-size: 13px;color:#000000;text-align: center;"></td>
                    <td style="border: 1px solid black !important;font-size: 13px;color:#000000;text-align: center;"></td>
                    <td style="border: 1px solid black !important;font-size: 13px;color:#000000;text-align: center;"></td>
                    <td style="border: 1px solid black !important;font-size: 13px;color:#000000;text-align: center;"></td>
                    <td style="border: 1px solid black !important;font-size: 13px;color:#000000;text-align: center;"></td>
                    <td style="border: 1px solid black !important;font-size: 13px;color:#000000;text-align: center;"></td>
                    <td style="border: 1px solid black !important;font-size: 13px;color:#000000;text-align: center;"></td>
                    <td style="border: 1px solid black !important;font-size: 13px;color:#000000;text-align: center;"></td>
                </tr>`;
                }
                document.getElementById('displayEmptyRows').innerHTML = tr;
        }
        window.print();
    </script>
</body>
</html>
