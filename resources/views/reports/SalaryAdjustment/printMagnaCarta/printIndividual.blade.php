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
@if($office_name == 'All Offices')
    @for($a = 0; $a <= $count-1; $a++)
    

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
                        <span class="float-right" style="font-size: 1.3em; font-family: 'Open Sans', sans-serif;">Annex “B”</span>
                        <br><br>
                        <span style="font-size: 1.3em; font-family: 'Times New Roman'; font-weight: bold;">NOTICE OF SALARY ADJUSTMENT</span>
                        <br>
                    </div>
                </div>
                

                

                {{-- DATE --}}
                <div class="card-body-p">
                    <p class="float-right date" style="margin-top: 1rem; font-size: 1.3em; font-family: 'Times New Roman'">{{$array_date_adjustment[$a]}}</p>
                    <br><br><br>
                    {{-- NAME --}}
                    <span style="font-size: 1.3em; font-weight: bold; font-family: 'Times New Roman';">{{ ($array_Gender[$a] == 'FEMALE') ? "MS." : "MR."; }} {{ $array_FirstName[$a] }} {{ $array_MiddleName[$a] }}. {{ $array_LastName[$a] }}</span>
                    <br>
                    <span class="text" style="font-family: 'Open Sans', sans-serif">{{ $array_office_name[$a] }}</span>
                    <span class="text" style="font-family: 'Open Sans', sans-serif">{{ $array_office_address[$a] }}</span>
                    <br>
                    <br>

                    {{-- SALUTATION OR GREETING --}}
                    <p class="text text-md mb-4">{{ ($array_Gender[$a] == 'FEMALE') ? "Ma'am:" : "Sir:"; }}</p>

                    {{-- BODY --}}
                    <span class="text text-md ml-4 pl-5" style="font-family: 'Open Sans', sans-serif;">&nbsp {{ $setting['Keyvalue1'] }}</span>
                    <br>
                    <br>
                        <span class="text text-md ml-4 pl-5">&nbsp 1. Adjusted monthly basic salary at SG - {{ $array_old_sg_no[$a] }}, Step {{ $array_old_step_no[$a] }};</span><span class="text col-3 offset-1 float-right">&#8369
                        {{ $array_salary_previous[$a] }}{!!$space!!}</span>
                        <br>
                        <span class="text text-md ml-4 pl-5">&nbsp&nbsp&nbsp&nbsp {{ ($array_retirement_date[$a] == '') ? '' : $array_spanminus1day_formated[$a] }}</span>
                        <br>
                        <br>
                        <span class="text text-md ml-4 pl-5">&nbsp 2. Add: one (1) salary grade increase 3 months</span><span class="text col-3 offset-1 float-right">&#8369
                        {{ $array_salary_diff[$a] }}{!!$space!!}</span>
                        <br>
                        <span class="text text-md ml-4 pl-5">&nbsp&nbsp&nbsp&nbsp Prior to compulsory retirement as Public Health Worker</span>
                        <br>
                        <br>
                        <span class="text text-md ml-4 pl-5">&nbsp 3. Adjusted monthly basic salary at SG - {{ $array_sg_no[$a] }}, Step {{ $array_step_no[$a] }} effective</span><span class="text col-3 offset-1 float-right"><u>&#8369
                        {{ $array_salary_new[$a] }}</u>{!!$space!!}</span>
                        <br>
                        <span class="text text-md ml-4 pl-5">&nbsp&nbsp&nbsp&nbsp {{ ($array_retirement_date[$a] == '') ? '' : $array_spanminus3months_formated[$a] }}</span>
                        <br>
                        <br>
                    <span class="text text-md ml-1">&nbsp {{ $setting['Keyvalue2'] }}</span>
                    <br><br>
                    <span class="text text-md">Item No. /Unique Item No., FY {{ Carbon\Carbon::parse($array_date_adjustment[$a])->format('Y') }} Personnel Services Itemization and/or Plantilla of Personnel: {{ $array_item_no[$a] }}</span>
                    <br><br>
                    <span class="text text-md">Date of Compulsory Retirement as Public Health Worker <u><b>{{ ($array_retirement_date[$a] == '') ? '' : Carbon\Carbon::parse($array_retirement_date[$a])->format('F d, Y') }}.</b></u></span>
                    <br><br>
                    <div class="text mr-5 float-right" style="font-family: 'Open Sans', sans-serif">
                        <p class="mb-5">Very truly yours,</p><br>
                        <h4 class="mt-5"><b>ALEXANDER T. PIMENTEL</b></h4>
                        <p class="ml-5" style="margin-top: -20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Provincial Governor</p>
                    </div>
                    <br><br>
                    <br><br><br><br>
                    <br><br><br><br>
                    {{-- <div class="text" style="font-family: 'Open Sans', sans-serif">
                        <p>Position Title: <b style="text-decoration: underline">{{ $array_Description[$a] }}</b></p>
                        <p style="margin-top: -18px;">Salary Grade: {{ $array_sg_no[$a] }}</p>
                        <p style="margin-top: -18px;">Item No., FY: {{ Carbon\Carbon::parse($array_date_adjustment[$a])->format('Y') }} Plantilla of Personnel: {{ $array_item_no[$a] }}</p>
                    </div> --}}

                    {{-- FOOTER --}}
                    <div class="float-left">
                        <p style="font-size: 1.3em; font-family: 'Times New Roman'">Copy Furnished: GSIS</p>
                        {{-- <h6 style="font-family: 'Open Sans', sans-serif;">Copy Furnished: GSIS-Tandag, Surigao del Sur</h6>
                        <h6 style="font-family: 'Open Sans', sans-serif;">CSC-Field Office, Tandag City</h6> --}}
                    </div>

                </div>
            </div>
        </div>

    @endfor
@else
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
                <span class="float-right" style="font-size: 1.3em; font-family: 'Open Sans', sans-serif;">Annex “B”</span>
                <br><br>
                <span style="font-size: 1.3em; font-family: 'Times New Roman'; font-weight: bold;">NOTICE OF SALARY ADJUSTMENT</span>
                <br>
            </div>
        </div>
        

        

        {{-- DATE --}}
        <div class="card-body-p">
            <p class="float-right date" style="margin-top: 1rem; font-size: 1.3em; font-family: 'Times New Roman'">{{ Carbon\Carbon::parse($salaryAdjustment->date_adjustment)->format('F d, Y') }}</p>
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
            <span class="text text-md ml-4 pl-5" style="font-family: 'Open Sans', sans-serif;">&nbsp {{ $setting['Keyvalue1'] }}</span>
            <br>
            <br>
                <span class="text text-md ml-4 pl-5">&nbsp 1. Adjusted monthly basic salary at SG - {{ $salaryAdjustment->old_sg_no }}, Step {{ $salaryAdjustment->old_step_no }};</span><span class="text col-3 offset-1 float-right">&#8369
                {{ number_format($salaryAdjustment->salary_previous, 2, ".", ",") }}{!!$space!!}</span>
                <br>
                <span class="text text-md ml-4 pl-5">&nbsp&nbsp&nbsp&nbsp {{ ($salaryAdjustment->retirement_date == '') ? '' : date('F d, Y',(strtotime ( '-1 day' , strtotime ( date('Y-m-d', strtotime($salaryAdjustment->retirement_date. ' - 3 months'))) ) )) }}</span>
                <br>
                <br>
                <span class="text text-md ml-4 pl-5">&nbsp 2. Add: one (1) salary grade increase 3 months</span><span class="text col-3 offset-1 float-right">&#8369
                {{ number_format($salaryAdjustment->salary_diff, 2, ".", ",") }}{!!$space!!}</span>
                <br>
                <span class="text text-md ml-4 pl-5">&nbsp&nbsp&nbsp&nbsp Prior to compulsory retirement as Public Health Worker</span>
                <br>
                <br>
                <span class="text text-md ml-4 pl-5">&nbsp 3. Adjusted monthly basic salary at SG - {{ $salaryAdjustment->sg_no }}, Step {{ $salaryAdjustment->step_no }} effective</span><span class="text col-3 offset-1 float-right"><u>&#8369
                {{ number_format($salaryAdjustment->salary_new, 2, ".", ",") }}</u>{!!$space!!}</span>
                <br>
                <span class="text text-md ml-4 pl-5">&nbsp&nbsp&nbsp&nbsp {{ ($salaryAdjustment->retirement_date == '') ? '' : date('F d, Y', strtotime($salaryAdjustment->retirement_date. ' - 3 months')) }}</span>
                <br>
                <br>
            <span class="text text-md">{{ $setting['Keyvalue2'] }}</span>
            <br><br>
            <span class="text text-md">Item No. /Unique Item No., FY {{ Carbon\Carbon::parse($salaryAdjustment->date_adjustment)->format('Y') }} Personnel Services Itemization and/or Plantilla of Personnel: {{ $salaryAdjustment->item_no }}</span>
            <br><br>
            <span class="text text-md">Date of Compulsory Retirement as Public Health Worker <u><b>{{ ($salaryAdjustment->retirement_date == '') ? '' : Carbon\Carbon::parse($salaryAdjustment->retirement_date)->format('F d, Y') }}.</b></u></span>
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
            {{-- <div class="text" style="font-family: 'Open Sans', sans-serif">
                <p>Position Title: <b style="text-decoration: underline">{{ $salaryAdjustment->plantillaPosition->position->Description }}</b></p>
                <p style="margin-top: -18px;">Salary Grade: {{ $salaryAdjustment->sg_no }}</p>
                <p style="margin-top: -18px;">Item No., FY: {{ Carbon\Carbon::parse($salaryAdjustment->date_adjustment)->format('Y') }} Plantilla of Personnel: {{ $salaryAdjustment->item_no }}</p>
            </div> --}}

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
@endif
    {{-- <script>
        window.print();
    </script> --}}
</html>
