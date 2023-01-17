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
            padding: 1px 75px;
            margin: auto;
            overflow: hidden;
            page-break-after: always;
        }
        .card:last-of-type {
            page-break-after: auto
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
        .text {
            font-size: 1.2em; 
            font-family: 'Open Sans', sans-serif;
        }
    </style>
</head>
@foreach($salaryAdjustments as $key => $salaryAdjustment)
<div class="col-12 card" id='main-container' style="font-family: 'Open Sans', sans-serif;">
    <div class="card-header" id="headingOne">
        {{-- HEADING --}}
        <div class="body-container row">
            <!-- {{-- LOGO --}} -->
            <div class="header-text w-25 logo" style="margin-top: -1px;">
                <img src="file:///laragon/www/E-PIMS-v2/public/assets/img/province.png" style="visibility:hidden;" width="25px">
                <img src="file:///laragon/www/E-PIMS-v2/public/assets/img/province.png" width="140px">
            </div>
            <div class="header-text">
                <span style="font-size: 1.2em; margin-top: 50px; font-family: 'Open Sans', sans-serif;">Republic of the Philippines</span>
                <br>
                <span style="font-size: 1.5em; font-family: 'Open Sans', sans-serif; font-weight: bolder;">PROVINCE OF SURIGAO DEL SUR</span>
                <br>
                <span style="font-size: 1.2em; font-family: 'Open Sans', sans-serif;">TANDAG CITY</span>
                <br>
                <br>
                <span style="font-size: 2em; font-family: 'Monotype Corsiva'; font-weight: bold;"><i>Office of the Governor</i></span>
                <hr style="width: 100%;text-align: center; border: 1px solid black;">
                <br>
                <span class="float-right" style="font-size: 1.3em; font-family: 'Open Sans', sans-serif;">Annex “B-1”</span>
                <br><br>
                <span style="font-size: 1.3em; font-family: 'Times New Roman'; font-weight: bold;">NOTICE OF SALARY ADJUSTMENT</span>
                <br>
            </div>
        </div>
        

        

        {{-- DATE --}}
        <div class="card-body-p">
            <p class="float-right date" style="margin-top: 1rem; font-size: 1.3em; font-family: 'Times New Roman'">{{ Carbon\Carbon::parse($salaryAdjustment->salary_adjustment[0]->date_adjustment)->format('F d, Y') }}</p>
            <br><br><br>
            {{-- NAME --}}
            <span style="font-size: 1.3em; font-weight: bold; font-family: 'Times New Roman';">{{ ($salaryAdjustment->employee->Gender == 'FEMALE') ? "MS." : "MR."; }} {{ $salaryAdjustment->employee->FirstName }} {{ $salaryAdjustment->employee->MiddleName[0] }}. {{ $salaryAdjustment->employee->LastName }}</span>
            <br>
            <span class="text" style="font-family: 'Open Sans', sans-serif">{{ $salaryAdjustment->office->office_name }}</span>
            <span class="text" style="font-family: 'Open Sans', sans-serif">{{ $salaryAdjustment->office->office_address }}</span>
            <br>
            <br>

            {{-- SALUTATION OR GREETING --}}
            <p class="text text-md mb-4">{{ ($salaryAdjustment->employee->Gender == 'FEMALE') ? "Ma'am:" : "Sir:"; }}</p>

            {{-- BODY --}}
            <span class="text text-md ml-4 pl-5" style="font-family: 'Open Sans', sans-serif;">&nbsp {{ $setting->Keyvalue }}</span>
            <br>
            <br>
                <span class="text text-md ml-4 pl-5">&nbsp 1. Adjusted monthly basic salary effective {{ 'January 1, '.Carbon\Carbon::now('Y')->format('Y') }},</span><span class="text col-3 offset-1 float-right">&#8369
                {{ number_format($salaryAdjustment->salary_adjustment[0]->salary_new, 2, ".", ",") }}{!!$space!!}</span>
                <br>
                <span class="text text-md ml-4 pl-5">&nbsp&nbsp&nbsp&nbsp under the new Salary Schedule; SG - {{ $salaryAdjustment->sg_no }}, Step {{ $salaryAdjustment->salary_adjustment[0]->step_no }}</span>
                <br>
                <br>
                <span class="text text-md ml-4 pl-5">&nbsp 2. Actual monthly basic salary as of {{ 'December 31, '.Carbon\Carbon::now()->addYears(-1)->format('Y') }};</span><span class="text col-3 offset-1 float-right">&#8369
                {{ number_format($salaryAdjustment->salary_adjustment[0]->salary_previous, 2, ".", ",") }}{!!$space!!}</span>
                <br>
                <span class="text text-md ml-4 pl-5">&nbsp&nbsp&nbsp&nbsp SG - {{ $salaryAdjustment->salary_adjustment[0]->sg_no }}, Step {{ $salaryAdjustment->salary_adjustment[0]->step_no }}</span>
                <br>
                <br>
                <span class="text text-md ml-4 pl-5">&nbsp 3. Monthly salary adjustment effective {{ 'January 1, '.Carbon\Carbon::now()->format('Y') }}</span><span class="text col-3 offset-1 float-right"><u>&#8369
                {{ number_format($salaryAdjustment->salary_adjustment[0]->salary_diff, 2, ".", ",") }}</u>{!!$space!!}</span>
                <br>
                <span class="text text-md ml-4 pl-5">&nbsp&nbsp&nbsp&nbsp (1-2)</span>
                <br>
                <br>
            <span class="text text-md ml-4 pl-5">&nbsp It is understood that this salary adjustment is subject to usual accounting and auditing rules and regulations, and to appropriate re-adjustment and refund if found not in order.</span>
            {{-- CLOSING, SIGNATURE --}}
            <br><br>
            <div class="text mr-5 float-right" style="font-family: 'Open Sans', sans-serif">
                <p class="mb-5">Very truly yours,</p><br>
                <h4 class="mt-5"><b>ALEXANDER T. PIMENTEL</b></h4>
                <p class="ml-5" style="margin-top: -20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Provincial Governor</p>
            </div>
            <br><br>
            <br><br><br><br>
            <br><br><br><br>
            <div class="text" style="font-family: 'Open Sans', sans-serif">
                <p>Position Title: <b style="text-decoration: underline">{{ $salaryAdjustment->plantilla_positions->position->Description }}</b></p>
                <p style="margin-top: -18px;">Salary Grade: {{ $salaryAdjustment->salary_adjustment[0]->sg_no }}</p>
                <p style="margin-top: -18px;">Item No., FY: {{ Carbon\Carbon::parse($salaryAdjustment->salary_adjustment[0]->date_adjustment)->format('Y') }} Plantilla of Personnel: {{ ++$key }}</p>
            </div>

            {{-- FOOTER --}}
            <div class="float-left">
                <p style="font-size: 1.3em; font-family: 'Times New Roman'">Copy Furnished: GSIS</p>
                {{-- <h6 style="font-family: 'Open Sans', sans-serif;">Copy Furnished: GSIS-Tandag, Surigao del Sur</h6>
                <h6 style="font-family: 'Open Sans', sans-serif;">CSC-Field Office, Tandag City</h6> --}}
            </div>

        </div>
    </div>
</div>
@endforeach
    {{-- <script>
        window.print();
    </script> --}}
</html>
