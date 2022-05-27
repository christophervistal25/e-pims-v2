<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .card {
            padding: 40px 40px;
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


    </style>
</head>
<body>

    <div class="card" id="main-container">
        <div class="card-header" id="headingOne" contenteditable="true">
            {{-- HEADING --}}
            <div class="body-container row">
                <!-- {{-- LOGO --}} -->
                <div class="header-text w-25 logo">
                    <img src="file:///laragon/www/E-PIMS-V2/public/assets/img/sdslogo.jpg" width="150px">
                </div>
                <div class="header-text">
                    <span class="h4">Republic of the Philippines</span>
                    <h3>PROVINCE OF SURIGAO DEL SUR</h3>
                    <h4>TANDAG CITY</h4>
                    <h1>Office of the Governor</h1>
                    <hr size="1" style="width: 100%;text-align: center; border: solid black;">
                    <h4>NOTICE OF STEP INCREMENT</h4>
                    <br>
                </div>
            </div>


            {{-- DATE --}}
            <div class="card-body-p">
                <p class="float-right date">
                    {{ Carbon\Carbon::parse($stepIncrement->date_step_increment)->format('F d, Y' ) }}
                </p>
                <br>
                {{-- NAME --}}
                <h4 style="margin-top: 4rem">{{ $stepIncrement->employee->FirstName }} {{ $stepIncrement->employee->MiddleName[0] }}. {{ $stepIncrement->employee->LastName }}</h4>
                <p>{{ $stepIncrement->employee->office_charging->Description }}</p>
            
                {{-- SALUTATION OR GREETING --}}
                <p class="text" style="margin-top: 3rem">Sir/Madam:</p>

                {{-- BODY --}}
                <div class="paragraph-body d-flex">
                    <p class="text-indent">
                        Pursuant to Joint Civil Service Commission (CSC) and Department of Budget and Management (DBM) Circular No. 1 series 1990, implementing Section 13 (c) of RA 6758, your salary as {{$stepIncrement->position->Description}}, SG-{{ $stepIncrement->sg_no_to }}, in the Office of {{ $stepIncrement->employee->office_charging->Description }} is hereby adjusted effective {{ Carbon\Carbon::parse($stepIncrement->date_step_increment)->format( 'F d, Y') }} as shown below:
                    </p>
                </div>

                <span class="text text-md mt-3 pl-5">Basic Salary as of
                    {{ Carbon\Carbon::parse($stepIncrement->date_step_increment)->format( 'F d, Y' ) }}</span><span
                    class="text text-md" style="margin-left: 14rem">&#8369; {{ number_format($stepIncrement->salary_amount_from, 2, ".", ",") }}</span>
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
                <p class="text-indent d-flex">
                    This Step Increment is subject for review and post-audit by the Department
                    of Budget and Management and to re-adjustment and refund if not in order.
                </p>

                {{-- CLOSING, SIGNATURE --}}    
                <div class="float-right" style="margin-top: 30px">
                    <p class="mb-5">Very truly yours,</p>
                    <h4 style="margin-top: 50px;"><b>ALEXANDER T. PIMENTEL</b></h4>
                    <h5 style="margin-left: 40px">&nbsp Provincial Governor</h5>
                </div>

                {{-- FOOTER --}}
                <div class="float-left" style="margin-top: 250px">
                    <h6>Copy Furnished: GSIS-Tandag, Surigao del Sur</h6>
                    <h6 class="mb-5">CSC-Field Office, Tandag City</h6>
                </div>

            </div>
        </div>
    </div>

</body>
</html>