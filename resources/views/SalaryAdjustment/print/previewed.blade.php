<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap">
    <title>Print Step-Increment</title>
    <style>
        @media print {
            #action-buttons {
                display :none !important;
            }
        }
    </style>
</head>
<body>
    
{{-- BUTTONS --}}
<div id='action-buttons' class="float-right mt-3 mb-2">
    <a href="" class="btn btn-outline-dark" onclick="window.print()" id="printBtn"><i class="la la-print"></i>&nbsp Print</a>
    <a href="/salary-adjustment" class="btn btn-info"><i class="la la-list"></i>&nbsp View Table</a>
</div>
<div class="clearfix"></div>

<div class="col-12 card" id='main-container'>
    <div class="card-header pl-5 pr-5" id="headingOne">
        {{-- HEADING --}}
        <div class="body-container row">
            {{-- LOGO --}}
            <div class="w-25">
                <img src="/assets/img/sdslogo.jpg" width="165px" style="margin-right: 100px">
            </div>
            <div class="" style="margin-left: 30px">
                <span class="h4">Republic of the Philippines</span>
                <h3>PROVINCE OF SURIGAO DEL SUR</h3>
                <h4>TANDAG</h4>
                <br>
                <h1>Office of the Governor</h1>
            </div>
            <hr size="8" style="width: 86%;text-align: center" color="black">
            <br>
        </div>
        <div class="text-center">
            <h4>NOTICE OF SALARY ADJUSTMENT</h4>
        </div>
        
        {{-- DATE --}}
        <div class="card-body-p">
            <p class="date">{{ Carbon\Carbon::parse($salaryAdjustment->date_adjustment)->format('F d, Y' ) }}</p>
            <br>
            {{-- NAME --}}
            <h4>{{ $salaryAdjustment->employee->firstname }} {{ $salaryAdjustment->employee->middlename }}.
                {{ $salaryAdjustment->employee->lastname }}</h4>
            <p>{{ $salaryAdjustment->employee->plantilla->office->office_name }}</p>
            <br>
            <br>

            {{-- SALUTATION OR GREETING --}}
            <p class="text text-md mb-4">Sir/Madam:</p>

            {{-- BODY --}}
            <span class="text text-md ml-4 pl-5">{{ $setting->key_value }}</span>
            <br>
            <br>
                <span class="text text-md ml-4 pl-5">&nbsp 1. Adjusted monthly basic salary effective {{ 'January 1, '.Carbon\Carbon::now('Y')->format('Y') }},</span><span class="col-3 offset-1 float-right">&#8369
                {{ number_format($salaryAdjustment->salary_new, 2, ".", ",") }}</span>
                <br>
                <span class="text text-md ml-4 pl-5">&nbsp&nbsp&nbsp&nbsp under the new Salary Schedule; SG - {{ $salaryAdjustment->sg_no }}, Step {{ $salaryAdjustment->step_no }}</span>
                <br>
                <br>
                <span class="text text-md ml-4 pl-5">&nbsp 2. Actual monthly basic salary as of {{ 'December 31, '.Carbon\Carbon::now()->addYears(-1)->format('Y') }};</span><span class="col-3 offset-1 float-right">&#8369
                {{ number_format($salaryAdjustment->salary_previous, 2, ".", ",") }}</span>
                <br>
                <span class="text text-md ml-4 pl-5">&nbsp&nbsp&nbsp&nbsp SG - {{ $salaryAdjustment->sg_no }}, Step {{ $salaryAdjustment->step_no }}</span>
                <br>
                <br>
                <span class="text text-md ml-4 pl-5">&nbsp 3. Monthly salary adjustment effective {{ 'January 1, '.Carbon\Carbon::now()->format('Y') }}</span><span class="col-3 offset-1 float-right" style="text-decoration: underline">&#8369
                {{ number_format($salaryAdjustment->salary_diff, 2, ".", ",") }}</span>
                <br>
                <span class="text text-md ml-4 pl-5">&nbsp&nbsp&nbsp&nbsp (1-2)</span>
                <br>
                <br>
            <span class="text text-md ml-4 pl-5">&nbsp It is understood that this salary adjustment is subject to usual accounting and auditing rules and regulations, and to appropriate re-adjustment and refund if found not in order.</span>
            {{-- CLOSING, SIGNATURE --}}
            <br><br><br><br>
            <div class="mr-5 float-right">
                <p class="mb-5">Very truly yours,</p>
                <h4 class="mt-2"><b>ALEXANDER T. PIMENTEL</b></h4>
                <h5 class="ml-5">&nbsp Provincial Governor</h5>
            </div>

            <br><br><br><br>
            <br><br><br><br>
            <div class="mr-5 float-left">
                <p>Position Title: <b style="text-decoration: underline">{{ $salaryAdjustment->position->position_name }}</b></p> 
                <p>Salary Grade: {{ $salaryAdjustment->sg_no }}</p>
                <p>Item No., FY: 2021 Plantilla of Personnel: 1</p>
            </div>

            {{-- FOOTER --}}
            <br><br><br><br><br><br><br><br><br><br><br><br><br>
            <div class="float-left">
                <h6>Copy Furnished: GSIS-Tandag, Surigao del Sur</h6>
                <h6 class="mb-5">CSC-Field Office, Tandag City</h6>
            </div>

        </div>
    </div>
</div>
    <script>
        window.print();
    </script>
</body>
</html>