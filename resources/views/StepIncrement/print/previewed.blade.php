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
    <a href="/step-increment" class="btn btn-info"><i class="la la-list"></i>&nbsp View Table</a>
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
            <h4>NOTICE OF STEP INCREMENT</h4>
        </div>
        
        {{-- DATE --}}
        <div class="card-body-p">
            <p class="date">{{ Carbon\Carbon::parse($stepIncrement->date_step_increment)->format('F d, Y' ) }}</p>
            <br>
            {{-- NAME --}}
            <h4>{{ $stepIncrement->employee->firstname }} {{ $stepIncrement->employee->middlename }}.
                {{ $stepIncrement->employee->lastname }}</h4>
            <p>{{ $stepIncrement->employee->plantilla->office->office_name }}</p>
            <br>
            <br>

            {{-- SALUTATION OR GREETING --}}
            <p class="text text-md mb-4">Sir/Madam:</p>

            {{-- BODY --}}
            <span class="text text-md ml-4 pl-5">&nbsp Pursuant to Joint Civil Service Commission (CSC) and Department
                of Budget and Management (DBM) Circular No. 1 series 1990, implementing Section 13 (c) of RA 6758, your
                salary as {{ $stepIncrement->employee->plantilla->position->position_name }},
                SG-{{ $stepIncrement->sg_no_to }}, in the Office of
                {{ $stepIncrement->employee->plantilla->office->office_name }} is hereby adjusted effective
                {{ Carbon\Carbon::parse($stepIncrement->date_step_increment)->format( 'F d, Y' ) }} as shown
                below:</span>
            <br>
            <br>
            <span class="text text-md mt-3 pl-5">Basic Salary as of
                {{ Carbon\Carbon::parse($stepIncrement->date_step_increment)->format( 'F d, Y' ) }}</span><span
                class="text text-md" style="padding: 120px">P {{ $stepIncrement->salary_amount_from }}</span>
            <p class="text text-md pl-5">Salary Adjustment:</p>
            <span style="padding-left: 100px">a) Merit &nbsp &nbsp &nbsp &nbsp( &nbsp</span><span class="boxing">&nbsp
                &nbsp &nbsp &nbsp</span><span>Step/s)</span>
            <br>
            <span style="padding-left: 100px">b) Length of Service {{ $stepIncrement->sg_no_to }} /
                {{ $stepIncrement->step_no_to }} Step/s</span><span style="padding: 120px">P
                {{ $stepIncrement->salary_diff }}</span>
            <br>
            <br>
            <span class="text text-md pl-5">Adjusted Salary effective
                {{ Carbon\Carbon::parse($stepIncrement->date_step_increment)->format( 'F d, Y' ) }}</span><span
                class="amount">P {{ $stepIncrement->salary_amount_to }}</span>
            <br>
            <br>
            <span class="text text-md pl-5">This Step Increment is subject for review and post-audit by the Department
                of Budget and Management and to re-adjustment and refund ifo not in order.</span>

            {{-- CLOSING, SIGNATURE --}}
            <br><br><br><br>
            <div class="mr-5 float-right">
                <p class="mb-5">Very truly yours,</p>
                <h4 class="mt-2"><b>ALEXANDER T. PIMENTEL</b></h4>
                <h5 class="ml-5">&nbsp Provincial Governor</h5>
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