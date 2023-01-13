<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> --}}
	{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
    {{-- <link rel="preconnect" href="https://fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	{{-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"> --}}
    <title>Print Salary-Adjustment</title>
    <style>
        .card {
            padding: 10px 0px;
            margin: auto;
        }






        .text-indent{
            text-indent: 50px;
        }

        .header-text:nth-of-type(2) {
            text-align: center;
            position: relative;
        }

        .d-flex {
            display: flex;
            text-align: justify;
        }

        .float-right {
            float: right;
        }

        .pl-5 {
            margin-left: 3rem;
        }

        .logo {
            background: url('/assets/img/sdslogo.jpg');
            position: absolute;
            margin-left: -2rem;
        }

        table, th, td {
            border: 1px solid;
        }
        th {
            text-align: center;
            padding: 5px; 0;
        }
        td {
            font-size: 11px;
            text-align: center;
            padding: 5px; 0;
        }
    </style>
</head>
<body>

<div class="col-12 card" id='main-container' style="font-family: 'Open Sans', sans-serif">
    <div class="card-header" id="headingOne">
        {{-- HEADING --}}
        <div class="body-container row">
            <!-- {{-- LOGO --}} -->
            <div class="header-text w-25 logo" style="margin-top: -20px">
                {{-- <img src="file:///laragon/www/E-PIMS/public/assets/img/province.png" width="150px"> --}}
            </div>
            <div class="header-text">
                <span style="font-size: 1em; margin-top: 50px; font-family: 'Open Sans', sans-serif;">Republic of the Philippines</span>
                <br>
                <span style="font-size: 1.5em; font-family: 'Open Sans', sans-serif;">PROVINCE OF SURIGAO DEL SUR</span>
                <br>
                <span style="font-size: 1em; font-family: 'Open Sans', sans-serif;">TANDAG CITY</span>
                <br>
                <br>
                <span style="font-size: 2em; font-family: 'Open Sans', sans-serif;">{{ $office_name }}</span>
                <br>
                <hr style="width: 100%;text-align: center; border: solid black;">
                <span style="font-size: 1.3em; font-family: 'Open Sans', sans-serif;">NOTICE OF SALARY ADJUSTMENT</span>
                <br>
                <p class="float-right">Year: <b style="text-decoration: underline">&nbsp;&nbsp;&nbsp;{{ $year }}&nbsp;&nbsp;&nbsp;</b></p>
            </div>
        </div>

        {{-- DATE --}}
        <div class="card-body-p">
            <br>
            <table class="table table-bordered table-hover text-center" id="salaryAdjustmentPerOffice" style="width:100%;">
                <thead>
                        <tr>
                            <th scope="col" class="text-center">Adjustment Date</th>
                            <th scope="col" class="text-center d-none">Office</th>
                            <th scope="col" class="text-center">Employee Name</th>
                            <th scope="col" class="text-center">Salary Grade</th>
                            <th scope="col" class="text-center">Step Number</th>
                            <th scope="col" class="text-center">Previous Salary</th>
                            <th scope="col" class="text-center">New Salary</th>
                            <th scope="col" class="text-center">Salary Difference</th>
                        </tr>
                </thead>
                <tbody>
                    @foreach($salary_adjustment as $key => $salary_adjustments)
                        <tr>
                            <td>{{ Carbon\Carbon::parse($salary_adjustments->salary_adjustment[0]->date_adjustment)->format('F d, Y' ) }}</td>
                            <td>{{ $salary_adjustments->office_code }}</td>
                            <td>{{ $salary_adjustments->employee->fullname }}</td>
                            <td>{{ $salary_adjustments->sg_no }}</td>
                            <td>{{ $salary_adjustments->step_no }}</td>
                            <td>{{ $salary_adjustments->salary_adjustment[0]->salary_previous }}</td>
                            <td>{{ $salary_adjustments->salary_adjustment[0]->salary_new }}</td>
                            <td>{{ $salary_adjustments->salary_adjustment[0]->salary_diff }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>










            {{-- <p class="float-right date" style="margin-top: 1rem; font-family: 'Open Sans', sans-serif;">{{ Carbon\Carbon::parse($salaryAdjustment->date_adjustment)->format('F d, Y' ) }}</p> --}}
            <br>
            {{-- NAME --}}
            {{-- <span style="font-size: 25px; font-weight: bold; font-family: 'Open Sans', sans-serif;">{{ $salaryAdjustment->employee->FirstName }} {{ $salaryAdjustment->employee->MiddleName[0] }}. {{ $salaryAdjustment->employee->LastName }}</span> --}}
            <br>
            {{-- <span style="font-family: 'Open Sans', sans-serif">{{ $salaryAdjustment->employee->plantilla?->office->Description }}</span> --}}
            <br>
            <br>

            {{-- SALUTATION OR GREETING --}}
            {{-- <p class="text text-md mb-4">Sir/Madam:</p> --}}

            {{-- BODY --}}
            {{-- <span class="text-indent d-flex" style="font-family: 'Open Sans', sans-serif;">{{ $setting->Keyvalue }}</span> --}}
            <br>
            <br>
                {{-- <span class="text text-md ml-4 pl-5">&nbsp 1. Adjusted monthly basic salary effective {{ 'January 1, '.Carbon\Carbon::now('Y')->format('Y') }},</span><span class="col-3 offset-1 float-right">&#8369
                {{ number_format($salaryAdjustment->salary_new, 2, ".", ",") }}{!!$space!!}</span>
                <br>
                <span class="text text-md ml-4 pl-5">&nbsp&nbsp&nbsp&nbsp under the new Salary Schedule; SG - {{ $salaryAdjustment->sg_no }}, Step {{ $salaryAdjustment->step_no }}</span>
                <br>
                <br>
                <span class="text text-md ml-4 pl-5">&nbsp 2. Actual monthly basic salary as of {{ 'December 31, '.Carbon\Carbon::now()->addYears(-1)->format('Y') }};</span><span class="col-3 offset-1 float-right">&#8369
                {{ number_format($salaryAdjustment->salary_previous, 2, ".", ",") }}{!!$space!!}</span>
                <br>
                <span class="text text-md ml-4 pl-5">&nbsp&nbsp&nbsp&nbsp SG - {{ $salaryAdjustment->sg_no }}, Step {{ $salaryAdjustment->step_no }}</span>
                <br>
                <br>
                <span class="text text-md ml-4 pl-5">&nbsp 3. Monthly salary adjustment effective {{ 'January 1, '.Carbon\Carbon::now()->format('Y') }}</span><span class="col-3 offset-1 float-right"><u>&#8369
                {{ number_format($salaryAdjustment->salary_diff, 2, ".", ",") }}</u>{!!$space!!}</span>
                <br>
                <span class="text text-md ml-4 pl-5">&nbsp&nbsp&nbsp&nbsp (1-2)</span>
                <br>
                <br> --}}
            {{-- <span class="text text-md ml-4 pl-5">&nbsp It is understood that this salary adjustment is subject to usual accounting and auditing rules and regulations, and to appropriate re-adjustment and refund if found not in order.</span> --}}
            {{-- CLOSING, SIGNATURE --}}
            {{-- <br><br><br><br>
            <div class="mr-5 float-right" style="font-family: 'Open Sans', sans-serif">
                <p class="mb-5">Very truly yours,</p>
                <h4 class="mt-2"><b>ALEXANDER T. PIMENTEL</b></h4>
                <h5 class="ml-5">&nbsp Provincial Governor</h5>
            </div> --}}

            <br><br><br><br>
            <br><br><br><br>
            <div style="font-family: 'Open Sans', sans-serif">
                {{-- <p>Position Title: <b style="text-decoration: underline">{{ $salaryAdjustment->plantilla->plantilla_positions->position->Description }}</b></p>
                <p>Salary Grade: {{ $salaryAdjustment->sg_no }}</p> --}}
                {{-- <p>Item No., FY: 2021 Plantilla of Personnel: 1</p> --}}
            </div>

            {{-- FOOTER --}}
            <br><br><br><br>
            <div class="float-left">
                {{-- <h6 style="font-family: 'Open Sans', sans-serif;">Copy Furnished: GSIS-Tandag, Surigao del Sur</h6>
                <h6 style="font-family: 'Open Sans', sans-serif;">CSC-Field Office, Tandag City</h6> --}}
            </div>

        </div>
    </div>
</div>
    {{-- <script>
        window.print();
    </script> --}}
</body>
</html>
