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
                <div class="header-text w-25 logo" style="margin-top: -20px">
                    <img src="file:///laragon/www/E-PIMS-V2/public/assets/img/sdslogo.jpg" width="150px">
                </div>
                <div class="header-text">
                    <span style="font-size: 1em; margin-top: 50px; font-family: 'Open Sans', sans-serif;">Republic of the Philippines</span>
                    <br>
                    <span style="font-size: 1.5em; font-family: 'Open Sans', sans-serif;">PROVINCE OF SURIGAO DEL SUR</span>
                    <br>
                    <span style="font-size: 1em; font-family: 'Open Sans', sans-serif;">TANDAG CITY</span>
                    <br>
                    <br>
                    <span style="font-size: 2em; font-family: 'Open Sans', sans-serif;">Office of the Governor</span>
                    <br>
                    <hr style="width: 100%;text-align: center; border: solid black;">
                    <span style="font-size: 1.3em; font-family: 'Open Sans', sans-serif;">NOTICE OF STEP INCREMENT</span>
                    <br>
                </div>
            </div>


            {{-- DATE --}}
            <div class="card-body-p">
                <br>
                <p class="float-right date" style="margin-top: 1rem; font-family: 'Open Sans', sans-serif;">
                    {{ Carbon\Carbon::parse($stepIncrement->date_step_increment)->format('F d, Y' ) }}
                </p>
                <br>
                <br>
                <br>
                <br>
                {{-- NAME --}}
                <span style="font-size: 25px; font-weight: bold; font-family: 'Open Sans', sans-serif;">{{ $stepIncrement->employee->FirstName }} {{ $stepIncrement->employee->MiddleName[0] }}. {{ $stepIncrement->employee->LastName }}</span>
                <br>
                <span style="font-family: 'Open Sans', sans-serif">{{ $stepIncrement->employee->office_charging->Description }}</span>
            
                {{-- SALUTATION OR GREETING --}}
                <p class="text" style="margin-top: 2rem; font-family: 'Open Sans', sans-serif;">Sir/Madam:</p>

                {{-- BODY --}}
                <div class="paragraph-body d-flex">
                    <p class="text-indent" style="font-family: 'Open Sans', sans-serif;">
                        Pursuant to Joint Civil Service Commission (CSC) and Department of Budget and Management (DBM) Circular No. 1 series 1990, implementing Section 13 (c) of RA 6758, your salary as {{$stepIncrement->position->Description}}, SG-{{ $stepIncrement->sg_no_to }}, in the Office of {{ $stepIncrement->employee->office_charging->Description }} is hereby adjusted effective {{ Carbon\Carbon::parse($stepIncrement->date_step_increment)->format( 'F d, Y') }} as shown below:
                    </p>
                </div>

                <span class="text text-md mt-3 pl-5" style="font-family: 'Open Sans', sans-serif;">Basic Salary as of
                    {{ Carbon\Carbon::parse($stepIncrement->date_step_increment)->format( 'F d, Y' ) }}</span><span
                    class="text text-md" style="margin-left: 14rem">&#8369; {{ number_format($stepIncrement->salary_amount_from, 2, ".", ",") }}</span>
                <p class="text text-md pl-5" style="font-family: 'Open Sans', sans-serif;">Salary Adjustment:</p>
                <span style="padding-left: 100px" style="font-family: 'Open Sans', sans-serif;">a) Merit &nbsp &nbsp &nbsp &nbsp( &nbsp</span><span class="boxing">&nbsp
                    &nbsp &nbsp &nbsp</span><span>Step/s)</span>
                <br>
                <span style="padding-left: 100px; font-family: 'Open Sans', sans-serif;">b) Length of Service {{ $stepIncrement->sg_no_to }} /
                    {{ $stepIncrement->step_no_to }} Step/s</span><span style="padding: 160px">&#8369;
                    {{ number_format($stepIncrement->salary_diff, 2, ".", ",") }}</span>
                <br>
                <br>
                <span class="text text-md pl-5" style="font-family: 'Open Sans', sans-serif;">Adjusted Salary effective
                    {{ Carbon\Carbon::parse($stepIncrement->date_step_increment)->format( 'F d, Y' ) }}</span><span
                    style="padding-left: 174px; text-decoration: underline">&#8369; {{ number_format($stepIncrement->salary_amount_to, 2, ".", ",") }}</span>
                <br>
                <br>
                <p class="text-indent d-flex" style="font-family: 'Open Sans', sans-serif;">
                    This Step Increment is subject for review and post-audit by the Department
                    of Budget and Management and to re-adjustment and refund if not in order.
                </p>

                {{-- CLOSING, SIGNATURE --}}    
                <div class="float-right" style="margin-top: 30px">
                    <p class="mb-5" style="font-family: 'Open Sans', sans-serif">Very truly yours,</p>
                    <h4 style="margin-top: 50px; font-family: 'Open Sans', sans-serif;"><b>ALEXANDER T. PIMENTEL</b></h4>
                    <h5 style="margin-left: 40px; font-family: 'Open Sans', sans-serif;">&nbsp Provincial Governor</h5>
                </div>

                {{-- FOOTER --}}
                <div class="float-left" style="margin-top: 250px">
                    <h6 style="font-family: 'Open Sans', sans-serif;">Copy Furnished: GSIS-Tandag, Surigao del Sur</h6>
                    <h6 style="font-family: 'Open Sans', sans-serif;">CSC-Field Office, Tandag City</h6>
                </div>

            </div>
        </div>
    </div>

</body>
</html>