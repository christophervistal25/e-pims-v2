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
            <a href="" class="btn btn-info" onclick="window.print()" id="printBtn"><i class="fas fa-print"></i>&nbsp; Print</a>
            <a href="/step-increment" class="btn btn-primary"><i class="fa fa-list"></i>&nbsp; Personnel List</a>
        </div>
        <div class="clearfix"></div>

        <div class="col-12 card" id="main-container">
            <div class="card-header pl-5 pr-5" id="headingOne" contenteditable="true">
                {{-- HEADING --}}
                <div class="body-container row">
                    {{-- LOGO --}}
                    <div class="w-25">
                        <img src="/assets/img/sdslogo.jpg" width="165px" style="margin-right: 100px">
                    </div>
                    <div class="" style="margin-left: 25px">
                        <span class="h4">Republic of the Philippines</span>
                        <h3>PROVINCE OF SURIGAO DEL SUR</h3>
                        <h4>TANDAG</h4>
                        <br>
                        <h1>Office of the Governor</h1>
                    </div>
                    <hr size="8" style="width: 86%;text-align: center; border: solid black;">
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
                    <h4>{{ $stepIncrement->employee->FirstName }} {{ $stepIncrement->employee->MiddleName[0] }}. {{ $stepIncrement->employee->LastName }}</h4>
                    <p>{{ $stepIncrement->employee->office_charging->Description }}</p>
                    <br>
                    <br>

                    {{-- SALUTATION OR GREETING --}}
                    <p class="text text-md mb-4">Sir/Madam:</p>

                    {{-- BODY --}}
                    <div class="col-lg-12 mb-3 row">
                        <p class="text text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Pursuant to Joint Civil Service Commission (CSC) and Department
                            of Budget and Management (DBM) Circular No. 1 series 1990, implementing Section 13 (c) of RA 6758, your
                            salary as {{$stepIncrement->position->Description}},
                            SG-{{ $stepIncrement->sg_no_to }}, in the Office of {{$stepIncrement->employee->office_charging->Description}}
                            is hereby adjusted effective
                            {{ Carbon\Carbon::parse($stepIncrement->date_step_increment)->format( 'F d, Y') }} as shown
                            below:
                        </p>
                    </div>


                    <span class="text text-md mt-3 pl-5">Basic Salary as of
                        {{ Carbon\Carbon::parse($stepIncrement->date_step_increment)->format( 'F d, Y' ) }}</span><span
                        class="text text-md" style="padding: 227px">&#8369; {{ number_format($stepIncrement->salary_amount_from, 2, ".", ",") }}</span>
                    <p class="text text-md pl-5">Salary Adjustment:</p>
                    <span style="padding-left: 100px">a) Merit &nbsp &nbsp &nbsp &nbsp( &nbsp</span><span class="boxing">&nbsp
                        &nbsp &nbsp &nbsp</span><span>Step/s)</span>
                    <br>
                    <span style="padding-left: 100px">b) Length of Service {{ $stepIncrement->sg_no_to }} /
                        {{ $stepIncrement->step_no_to }} Step/s</span><span style="padding: 160px">&#8369;
                        {{ number_format($stepIncrement->salary_diff, 2, ".", ",") }}</span>
                    <br>
                    <br>
                    <span class="text text-md pl-5">Adjusted Salary effective
                        {{ Carbon\Carbon::parse($stepIncrement->date_step_increment)->format( 'F d, Y' ) }}</span><span
                        style="padding-left: 174px; text-decoration: underline">&#8369; {{ number_format($stepIncrement->salary_amount_to, 2, ".", ",") }}</span>
                    <br>
                    <br>
                    <span class="text text-md pl-5">This Step Increment is subject for review and post-audit by the Department
                        of Budget and Management and to re-adjustment and refund ifo not in order.</span>

                    {{-- CLOSING, SIGNATURE --}}
                    <br><br><br><br>
                    <div class="mr-5 float-right">
                        <p class="mb-5">Very truly yours,</p>
                        <h4 style="margin-top: 100px;"><b>ALEXANDER T. PIMENTEL</b></h4>
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