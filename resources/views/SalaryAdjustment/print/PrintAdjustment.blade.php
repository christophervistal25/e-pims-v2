
@extends('layouts.app')
@section('title', 'Print Salary Adjustment of Employee')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
    <a class="btn btn-outline-dark" href="{{ route('salary-adjustment.previewed.print', $id) }}" id="printBtn"><i class="la la-print"></i>&nbsp Print Preview</a>
    <a href="/salary-adjustment" class="btn btn-info"><i class="la la-list"></i>&nbsp View Table</a>
</div>
<div class="clearfix"></div>

<div class="card" id='main-container'>
    <div class="card-header pl-5 pr-5" id="headingOne">
        {{-- HEADING --}}
        <div class="body-container row">
            {{-- LOGO --}}
            <div class="w-25">
                <img src="/assets/img/sdslogo.jpg" width="165px" style="margin-right: 100px">
            </div>
            <div class="offset-1 ml-5 pl-4">
                <span class="h4">Republic of the Philippines</span>
                <h3>PROVINCE OF SURIGAO DEL SUR</h3>
                <h4>TANDAG</h4>
                <br>
                <h1>Office of the Governor</h1>
            </div>
            <hr size="8" width="88%" color="black">
            <br>
        </div>
        <div class="text-center">
            <h4>NOTICE OF SALARY ADJUSTMENT</h4>
        </div>
        
        {{-- DATE --}}
        <div class="card-body-p">
            <p class="date">{{ Carbon\Carbon::parse($salaryAdjustment->date_adjustment)->format('F d, Y') }}</p>
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
            <i class="la la-pencil h4" data-toggle="modal" data-target="#editbtnFirstParagraphBtn" id="editbtnFirstParagraph" style="cursor: pointer;"></i><span class="text text-md ml-4 pl-4" id="spanFirstParagraph">{{ $setting->key_value }}</span>
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
@include('SalaryAdjustment.add-ons.salaryadjustmentmodal')
@push('page-scripts')
<script src="{{ asset('/assets/js/custom.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(document).click(function () {
                console.log("Hello World");
            });
        });
        document.getElementById('editbtnFirstParagraph').addEventListener('click', function(){
            let spanFirstParagraph = document.getElementById('spanFirstParagraph').innerHTML;
            document.getElementById('firstParagraph').value = spanFirstParagraph;
        });
        document.getElementById('btnFirstParagraph').addEventListener('click', function(){
            let firstParagraph = document.getElementById('firstParagraph').value;
            let key_id = ('1');
            document.getElementById('spanFirstParagraph').innerHTML = firstParagraph;
            $.ajax({
                url: '/api/printEditAdjustment',
                type: "POST",
                data:{
                    _token:'{{ csrf_token() }}',
                    key_id:key_id,
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
