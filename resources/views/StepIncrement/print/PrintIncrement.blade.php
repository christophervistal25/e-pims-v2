
@extends('layouts.app')
@section('title', 'Print Increment of Employee')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

<style>
   @media print{
    .header,.sidebar, #action-buttons,.breadcrumb {
        display: none !important;
    }
    body { 
        width : 100vw;
        background :red !important;
        
    }

    #main-container {
        width: 150%;
        height:auto;
    }
}
</style>
@endprepend
@section('content')

{{-- BUTTONS --}}
<div class="container col-lg-10">
    <div id='action-buttons' class="float-right mb-2">
        <a class="btn btn-info" href="{{ route('step-increment.previewed.print', $id) }}" id="printBtn"><i class="fas fa-print"></i>&nbsp; Print</a>
        <a href="/step-increment" class="btn btn-primary"><i class="fa fa-list"></i>&nbsp; Personnel List</a>
    </div>
    <div class="clearfix"></div>

    <div class="card col-lg-12 col-md-12" id='main-container' contenteditable="true">  {{-- contenteditable is it can able to edit inside of the page --}}
        <div class="card-header pl-5 pr-5" id="headingOne">

            {{-- HEADING --}}
            <div class="col-lg-12 col-md-12 row mt-5">
                {{-- LOGO --}}
                <div class="col-lg-1 w-25" style="2rem">
                    <img src="/assets/img/sdslogo.jpg" width="155px" style="margin-right: 100px">
                </div>
                {{-- END LOGO --}}

                <div class="col-lg-10 text-center">
                    <h4>Republic of the Philippines</h4>
                    <h3>PROVINCE OF SURIGAO DEL SUR</h3>
                    <h4>TANDAG CITY</h4>
                    <h1>Office of the Governor</h1>
                </div>
                <hr size="8" width="100%" style="border: solid black;">
            </div>
            
            <div class="text-center">
                

                <h4>NOTICE OF STEP INCREMENT</h4>
            </div>
            
            {{-- DATE --}}
            <div class="card-body-p" contenteditable="true">
                <p class="date">{{ Carbon\Carbon::parse($stepIncrement->date_step_increment)->format('F d, Y') }}</p>
                <br>
                {{-- FULLNAME --}}
                <h4>{{ $stepIncrement->employee->FirstName }} {{ $stepIncrement->employee->MiddleName[0] }}. {{ $stepIncrement->employee->LastName }}</h4>
                {{-- OFFICE --}}
                <p>{{ $stepIncrement->employee->office_charging->Description }}</p>
                    
                <br>
                <br>

                {{-- SALUTATION OR GREETING --}}
                <p class="text text-md mb-4">Sir/Madam:</p>


                {{-- First Paragraph --}}
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


                {{-- Second Paragraph --}}
                <div class="col-lg-12 col-md-12 row">
                    
                    <div class="col-lg-6">
                        <p class="text text-md mt-3 pl-5">
                            Basic Salary as of {{ Carbon\Carbon::parse($stepIncrement->date_step_increment)->format( 'F d, Y' ) }}
                        </p>

                        <p class="text text-md pl-5">Salary Adjustment:</p>
                        <span style="padding-left: 100px">a) Merit &nbsp; &nbsp; &nbsp; &nbsp;( &nbsp</span><span class="boxing">&nbsp &nbsp &nbsp &nbsp</span><span>Step/s)</span>

                        <p style="padding-left: 100px">
                            b) Length of Service {{ $stepIncrement->sg_no_to }} / {{ $stepIncrement->step_no_to }} Step/s
                        </p>

                        <p class="text text-md pl-5">
                            Adjusted Salary effective {{ Carbon\Carbon::parse($stepIncrement->date_step_increment)->format( 'F d, Y' ) }}
                        </p>
                    </div>

                    {{-- figures --}}
                    <div class="col-lg-5">
                        <p class="text text-md mt-3 offset-lg-5" style="">&#8369; 
                            {{ number_format($stepIncrement->salary_amount_from, 2, ".", ",") }}
                        </p>

                        <br>

                        <div class="offset-lg-5" style="margin-top: 40px">
                            <p class="text text-md">&#8369; 
                                {{ number_format($stepIncrement->salary_diff, 2, ".", ",") }}
                            </p>

                            <p clas="text text-md" style="text-decoration: underline">&#8369; 
                                {{ number_format($stepIncrement->salary_amount_to, 2, ".", ",") }}
                            </p>
                        </div>
                    </div>

                </div>


                {{-- Third Paragraph --}}
                <div class="col-lg-12 mt-5 row">
                    <p class="text text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        This Step Increment is subject for review and post-audit by the Department
                        of Budget and Management and to re-adjustment and refund if not in order.
                    </p>
                </div>


                {{-- CLOSING, SIGNATURE --}}
                <div class="mr-5 float-right" style="margin-top: 70px">
                    <p class="mb-5">Very truly yours,</p>
                    <h4 class="mt-5"><b>ALEXANDER T. PIMENTEL</b></h4>
                    <h5 class="ml-5">&nbsp Provincial Governor</h5>
                </div>

                {{-- FOOTER --}}
                <div class="float-left" style="margin-top: 300px">
                    <h6>Copy Furnished: GSIS-Tandag, Surigao del Sur</h6>
                    <h6 class="mb-5">CSC-Field Office, Tandag City</h6>
                </div>

            </div>
        </div>
    </div>
</div>

@push('page-scripts')
    <script src="{{ asset('/assets/js/custom.js') }}"></script>

    <script>
        $(document).ready( ()=> {
            $(document).click( ()=> {
                console.log("Hello World");
            });
        });
    </script>

    @endpush
@endsection
