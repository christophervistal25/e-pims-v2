
@extends('layouts.app')
@section('title', 'Print Salary Adjustment of Employee')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> --}}
<script src="{{ asset("js/sweetalert.min.js") }}"></script>
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
<div id='action-buttons' class="float-right mb-2">
    <a class="btn btn-outline-dark" href="/print-adjustment-report-individual/{{ $office }}/{{ $year }}/print" id="printBtn"><i class="la la-print"></i>&nbsp Print</a>
</div>
<div class="clearfix"></div>




@foreach($salaryAdjustments as $key => $salaryAdjustment)
<div class="card" id='main-container'>
    <div class="card-header pl-5 pr-5" id="headingOne">
        {{-- HEADING --}}
        <div class="body-container">
            {{-- LOGO --}}
            <div class="w-25">
                <img src="/assets/img/province.png" width="165px">
            </div>
            <div class="text-center" style="margin-top: -180px;">
                <span class="h4">Republic of the Philippines</span>
                <h3>PROVINCE OF SURIGAO DEL SUR</h3>
                <h4>TANDAG CITY</h4>
                <br>
                <h1>Office of the Governor</h1>
            </div>
            <hr size="8" width="100%" color="black">
            <br>
            <span class="float-right" style="font-size: 1.3em; font-family: 'Open Sans', sans-serif;">Annex “B-1”</span>
            <br>
        </div>
        <div class="text-center">
            <h4>NOTICE OF SALARY ADJUSTMENT</h4>
        </div>
        <br>
        <p class="float-right">{{ Carbon\Carbon::parse($salaryAdjustment->salary_adjustment[0]->date_adjustment)->format('F d, Y') }}</p>

        {{-- DATE --}}
        <div class="card-body-p">
            <br>
            {{-- NAME --}}
            <h4>{{ $salaryAdjustment->employee->FirstName }} {{ $salaryAdjustment->employee->MiddleName[0] }}. {{ $salaryAdjustment->employee->LastName }}</h4>
            <p>{{ $salaryAdjustment->office->office_name }}</p>
            <p>{{ $salaryAdjustment->office->office_address }}</p>
            <br>
            <br>

            {{-- SALUTATION OR GREETING --}}
            <p class="text text-md mb-4">{{ ($salaryAdjustment->employee->Gender == 'FEMALE') ? "Ma'am:" : "Sir:"; }}</p>

            {{-- BODY --}}
            @if($key == 0) 
                <i class="la la-pencil" data-toggle="modal" data-target="#editbtnFirstParagraphBtn" id="editbtnFirstParagraph" style="cursor: pointer;"></i>
            @endif
            &nbsp;&nbsp;&nbsp;<span class="text text-md ml-4 pl-4 spanFirstParagraph" id="spanFirstParagraph">{{ $setting->Keyvalue }}</span>
            <br>
            <br>
                <span class="text text-md ml-4 pl-5">&nbsp 1. Adjusted monthly basic salary effective {{ 'January 1, '.Carbon\Carbon::now('Y')->format('Y') }},</span><span class="col-3 offset-1 float-right">&#8369
                {{ number_format($salaryAdjustment->salary_adjustment[0]->salary_new, 2, ".", ",") }}</span>
                <br>
                <span class="text text-md ml-4 pl-5">&nbsp&nbsp&nbsp&nbsp under the new Salary Schedule; SG - {{ $salaryAdjustment->sg_no }}, Step {{ $salaryAdjustment->salary_adjustment[0]->step_no }}</span>
                <br>
                <br>
                <span class="text text-md ml-4 pl-5">&nbsp 2. Actual monthly basic salary as of {{ 'December 31, '.Carbon\Carbon::now()->addYears(-1)->format('Y') }};</span><span class="col-3 offset-1 float-right">&#8369
                {{ number_format($salaryAdjustment->salary_adjustment[0]->salary_previous, 2, ".", ",") }}</span>
                <br>
                <span class="text text-md ml-4 pl-5">&nbsp&nbsp&nbsp&nbsp SG - {{ $salaryAdjustment->salary_adjustment[0]->sg_no }}, Step {{ $salaryAdjustment->salary_adjustment[0]->step_no }}</span>
                <br>
                <br>
                <span class="text text-md ml-4 pl-5">&nbsp 3. Monthly salary adjustment effective {{ 'January 1, '.Carbon\Carbon::now()->format('Y') }}</span><span class="col-3 offset-1 float-right" style="text-decoration: underline">&#8369
                {{ number_format($salaryAdjustment->salary_adjustment[0]->salary_diff, 2, ".", ",") }}</span>
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
                <p>Position Title: <b style="text-decoration: underline">{{ $salaryAdjustment->plantilla_positions->position->Description }}</b></p>
                <p>Salary Grade: {{ $salaryAdjustment->salary_adjustment[0]->sg_no }}</p>
                <p>Item No., FY: {{ Carbon\Carbon::parse($salaryAdjustment->salary_adjustment[0]->date_adjustment)->format('Y') }} Plantilla of Personnel: {{ ++$key }}</p>
            </div>

            {{-- FOOTER --}}
            <br><br><br><br><br><br><br><br>
            <div class="float-left">
                <h6>Copy Furnished: GSIS</h6>
                {{-- <h6>Copy Furnished: GSIS-Tandag, Surigao del Sur</h6> --}}
                {{-- <h6 class="mb-5">CSC-Field Office, Tandag City</h6> --}}
            </div>
            <br><br>
            <br><br>

        </div>
    </div>
</div>
@endforeach




@include('SalaryAdjustment.add-ons.salaryadjustmentmodal')
@push('page-scripts')
<script src="{{ asset('/assets/js/custom.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(document).click(function () {
                //console.log("Hello World");
            });
        });
        document.getElementById('editbtnFirstParagraph').addEventListener('click', function(){
            let spanFirstParagraph = document.getElementById('spanFirstParagraph').innerHTML;
            document.getElementById('firstParagraph').value = spanFirstParagraph;
        });
        document.getElementById('btnFirstParagraph').addEventListener('click', function(){
            let firstParagraph = document.getElementById('firstParagraph').value;
            for(var i=0; i <= document.querySelectorAll(".spanFirstParagraph").length - 1; i++){
                document.querySelectorAll(".spanFirstParagraph")[i].innerHTML = firstParagraph;
            }
            $.ajax({
                url: '/print-adjustment-report-individual-editfirstparagraph',
                type: "POST",
                data:{
                    _token:'{{ csrf_token() }}',
                    key_value:firstParagraph
                },
                success: function(html){
                    if(html.success == true){
                        swal("Successfully modify!", "", "success");
                        $('#editbtnFirstParagraphBtn').modal('hide');
                    }
                }
            });
        });
    </script>

    @endpush
@endsection
