
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
    <a class="btn btn-success" name="{{ $office }}|{{ $year }}"  id="downloadBtn"><i class="las la-download"></i>&nbspDownload</a>
    <a class="btn btn-primary" name="{{ $office }}|{{ $year }}" id="printBtn"><i class="la la-print"></i>&nbspPrint</a>
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
                <span style="font-size: 40px; font-family: 'Monotype Corsiva'; font-weight: bold;">Office of the Governor</span>
            </div>
            <hr size="8" width="100%" color="black">
            <br>
            <span class="float-right" style="font-size: 1.3em; font-family: 'Open Sans', sans-serif;">Annex “B”</span>
            <br>
        </div>
        <div class="text-center">
            <h4>NOTICE OF SALARY ADJUSTMENT</h4>
        </div>
        <br>
        <p class="float-right">{{ Carbon\Carbon::parse($salaryAdjustment->date_adjustment)->format('F d, Y') }}</p>

        {{-- DATE --}}
        <div class="card-body-p">
            <br>
            {{-- NAME --}}
            <h4>{{ ($salaryAdjustment->employee->Gender == 'FEMALE') ? "MS." : "MR."; }} {{ $salaryAdjustment->employee->FirstName }} {{ $salaryAdjustment->employee->MiddleName[0] }}. {{ $salaryAdjustment->employee->LastName }}</h4>
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
            {{-- &nbsp;&nbsp;&nbsp;<span class="text text-md ml-4 pl-4 spanFirstParagraph" id="spanFirstParagraph">{{ $firstparagraph }}</span> --}}
            &nbsp;&nbsp;&nbsp;<span class="text text-md ml-4 pl-4 spanFirstParagraph" id="spanFirstParagraph">{{ $setting['Keyvalue1'] }}</span>
            <br>
            <br>
                <span class="text text-md ml-4 pl-5">&nbsp 1. Adjusted monthly basic salary at SG - {{ $salaryAdjustment->old_sg_no }}, Step {{ $salaryAdjustment->old_step_no }};</span><span class="col-3 offset-1 float-right">&#8369
                {{ number_format($salaryAdjustment->salary_previous, 2, ".", ",") }}</span>
                <br>
                <span class="text text-md ml-4 pl-5">&nbsp&nbsp&nbsp&nbsp <span class="font-weight-bold" name="{{ date('Y-m-d',(strtotime ( '-1 day' , strtotime ( date('Y-m-d', strtotime($salaryAdjustment->retirement_date. ' - 3 months'))) ) )) }}" id="spanminus1day_{{ $salaryAdjustment->id }}">{{ ($salaryAdjustment->retirement_date == '') ? '' : date('F d, Y',(strtotime ( '-1 day' , strtotime ( date('Y-m-d', strtotime($salaryAdjustment->retirement_date. ' - 3 months'))) ) )) }}</span></span>









                <br>
                <br>
                 {{-- {{ 'December 31, '.Carbon\Carbon::now()->addYears(-1)->format('Y') }}; --}}
                <span class="text text-md ml-4 pl-5">&nbsp 2. Add: one (1) salary grade increase 3 months</span><span class="col-3 offset-1 float-right">&#8369
                {{ number_format($salaryAdjustment->salary_diff, 2, ".", ",") }}</span>
                <br>
                <span class="text text-md ml-4 pl-5">&nbsp&nbsp&nbsp&nbsp Prior to compulsory retirement as Public Health Worker</span>
                 {{-- SG - {{ $salaryAdjustment->sg_no }}, Step {{ $salaryAdjustment->step_no }} --}}
                <br>
                <br>
                <span class="text text-md ml-4 pl-5">&nbsp 3. Adjusted monthly basic salary at SG - {{ $salaryAdjustment->sg_no }}, Step {{ $salaryAdjustment->step_no }} effective</span><span class="col-3 offset-1 float-right" style="text-decoration: underline">&#8369
                {{ number_format($salaryAdjustment->salary_new, 2, ".", ",") }}</span>
                {{-- {{ 'January 1, '.Carbon\Carbon::now()->format('Y') }} --}}
                <br>
                <span class="text text-md ml-4 pl-5">&nbsp&nbsp&nbsp&nbsp <span class="font-weight-bold" name="{{ date('Y-m-d', strtotime($salaryAdjustment->retirement_date. ' - 3 months')); }}" id="spanminus3months_{{ $salaryAdjustment->id }}">{{ ($salaryAdjustment->retirement_date == '') ? '' : date('F d, Y', strtotime($salaryAdjustment->retirement_date. ' - 3 months')) }}</span></span>
                <br>
                <br>
            @if($key == 0)
                <i class="la la-pencil" style="margin-left: -30px;" data-toggle="modal" data-target="#editbtnSecondParagraphBtn" id="editbtnSecondParagraph" style="cursor: pointer;"></i>
            @endif
            <span class="text text-md ml-1 spanSecondParagraph" id="spanSecondParagraph">{{ $setting['Keyvalue2'] }}</span>
            <br><br>
            {{-- @if($key == 0)
                <i class="la la-pencil" style="margin-left: -30px;" data-toggle="modal" data-target="#editbtnThirdParagraphBtn" id="editbtnThirdParagraph" style="cursor: pointer;"></i>
            @endif --}}
            <span class="text text-md ml-1">Item No. /Unique Item No., FY {{ Carbon\Carbon::parse($salaryAdjustment->date_adjustment)->format('Y') }} Personnel Services Itemization and/or Plantilla of Personnel: {{ $salaryAdjustment->item_no }}</span>
            {{-- <span class="text text-md ml-1 spanThirdParagraph" id="spanThirdParagraph">{{ $setting['Keyvalue3'] }}</span> --}}
            <br><br>
            <span class="text text-md ml-1">Date of Compulsory Retirement as Public Health Worker </span>
            {{-- @if($key == 0)  --}}
                <i class="la la-pencil editbtnFourthParagraph" data-toggle="modal" data-target="#editbtnFourthParagraphBtn" id="editbtnFourthParagraph" name="{{ $salaryAdjustment->id }}" style="cursor: pointer;"></i>
            {{-- @endif --}}
            <u><span class="font-weight-bold spanFourthParagraph" name="{{ $salaryAdjustment->retirement_date }}" id="spanFourthParagraph_{{ $salaryAdjustment->id }}">{{ ($salaryAdjustment->retirement_date == '') ? '' : Carbon\Carbon::parse($salaryAdjustment->retirement_date)->format('F d, Y') }}</span>.</u>
            {{-- CLOSING, SIGNATURE --}}
            <br><br><br><br>
            <div class="mr-5 float-right">
                <p class="mb-5">Very truly yours,</p>
                <h4 class="mt-2"><b>ALEXANDER T. PIMENTEL</b></h4>
                <h5 class="ml-5">&nbsp Provincial Governor</h5>
            </div>

            {{-- <br><br><br><br>
            <br><br><br><br> --}}
            {{-- <div class="mr-5 float-left">
                <p>Position Title: <b style="text-decoration: underline">{{ $salaryAdjustment->plantillaPosition->position->Description }}</b></p>
                <p>Salary Grade: {{ $salaryAdjustment->sg_no }}</p>
                <p>Item No., FY: {{ Carbon\Carbon::parse($salaryAdjustment->date_adjustment)->format('Y') }} Plantilla of Personnel: {{ $salaryAdjustment->item_no }}</p>
            </div> --}}

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



@include('Reports.SalaryAdjustment.add-onsMagnaCarta.salaryadjustmentmodalFirst')
@include('Reports.SalaryAdjustment.add-onsMagnaCarta.salaryadjustmentmodalSecond')
{{-- @include('Reports.SalaryAdjustment.add-onsMagnaCarta.salaryadjustmentmodalThird') --}}
@include('Reports.SalaryAdjustment.add-onsMagnaCarta.salaryadjustmentmodalFourth')
@push('page-scripts')
<script src="{{ asset('/assets/js/custom.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(document).click(function () {
                //console.log("Hello World");
            });
        });
        document.getElementById('downloadBtn').addEventListener('click', function(){
            if(this.name.split('_')[1] == 'individual'){
                window.open('/print-adjustmentmagnacarta-report-individual/' + this.name.split('|')[0] + '_' + this.name.split('|')[1] + `/individual/download`,`_blank`);
            }else{
                window.open('/print-adjustmentmagnacarta-report-individual/' + this.name.split('|')[0] + '/' + this.name.split('|')[1] + `/download`,`_blank`);
            }
        });
        document.getElementById('printBtn').addEventListener('click', function(){
            if(this.name.split('_')[1] == 'individual'){
                window.open('/print-adjustmentmagnacarta-report-individual/' + this.name.split('|')[0] + '_' + this.name.split('|')[1] + `/individual/print`,`_blank`);
            }else{
                window.open('/print-adjustmentmagnacarta-report-individual/' + this.name.split('|')[0] + '/' + this.name.split('|')[1] + `/print`,`_blank`);
            }
        });
        //First
        document.getElementById('editbtnFirstParagraph').addEventListener('click', function(){
            let spanFirstParagraph = document.getElementById('spanFirstParagraph').innerHTML;
            document.getElementById('FirstParagraph').value = spanFirstParagraph;
        });
        document.getElementById('btnFirstParagraph').addEventListener('click', function(){
            let FirstParagraph = document.getElementById('FirstParagraph').value;
            for(var i=0; i <= document.querySelectorAll(".spanFirstParagraph").length - 1; i++){
                document.querySelectorAll(".spanFirstParagraph")[i].innerHTML = FirstParagraph;
            }
            $.ajax({
                url: '/print-adjustmentmagnacarta-report-individual-editFirstparagraph',
                type: "POST",
                data:{
                    _token:'{{ csrf_token() }}',
                    key_value:FirstParagraph
                },
                success: function(html){
                    if(html.success == 'true'){
                        swal("Successfully modify!", "", "success");
                        $('#editbtnFirstParagraphBtn').modal('hide');
                    }
                }
            });
        });
        //Second
        document.getElementById('editbtnSecondParagraph').addEventListener('click', function(){
            let spanSecondParagraph = document.getElementById('spanSecondParagraph').innerHTML;
            document.getElementById('SecondParagraph').value = spanSecondParagraph;
        });
        document.getElementById('btnSecondParagraph').addEventListener('click', function(){
            let SecondParagraph = document.getElementById('SecondParagraph').value;
            for(var i=0; i <= document.querySelectorAll(".spanSecondParagraph").length - 1; i++){
                document.querySelectorAll(".spanSecondParagraph")[i].innerHTML = SecondParagraph;
            }
            $.ajax({
                url: '/print-adjustmentmagnacarta-report-individual-editSecondparagraph',
                type: "POST",
                data:{
                    _token:'{{ csrf_token() }}',
                    key_value:SecondParagraph
                },
                success: function(html){
                    if(html.success == 'true'){
                        swal("Successfully modify!", "", "success");
                        $('#editbtnSecondParagraphBtn').modal('hide');
                    }
                }
            });
        });
        //Third
        //document.getElementById('editbtnThirdParagraph').addEventListener('click', function(){
        //    let spanThirdParagraph = document.getElementById('spanThirdParagraph').innerHTML;
        //    document.getElementById('ThirdParagraph').value = spanThirdParagraph;
        //});
        //document.getElementById('btnThirdParagraph').addEventListener('click', function(){
        //    let ThirdParagraph = document.getElementById('ThirdParagraph').value;
        //    for(var i=0; i <= document.querySelectorAll(".spanThirdParagraph").length - 1; i++){
        //        document.querySelectorAll(".spanThirdParagraph")[i].innerHTML = ThirdParagraph;
        //    }
        //    $.ajax({
        //        url: '/print-adjustmentmagnacarta-report-individual-editThirdparagraph',
        //        type: "POST",
        //        data:{
        //            _token:'{{ csrf_token() }}',
        //            key_value:ThirdParagraph
        //        },
        //        success: function(html){
        //            if(html.success == 'true'){
        //                swal("Successfully modify!", "", "success");
        //                $('#editbtnThirdParagraphBtn').modal('hide');
        //            }
        //        }
        //    });
        //});
        //Fourth
        $('.editbtnFourthParagraph').click(function(){
            let id = this.getAttribute('name');
            let spanFourthParagraph = document.getElementById('spanFourthParagraph_' + id).getAttribute('name');
            document.getElementById('FourthParagraph').value = spanFourthParagraph;
            document.getElementById('btnFourthParagraph').setAttribute('name', id);
        });
        document.getElementById('btnFourthParagraph').addEventListener('click', function(){
            let FourthParagraph = document.getElementById('FourthParagraph').value;
            let date = FourthParagraph.split('-');
            const monthNames = ["","January ", "February ", "March ", "April ", "May ", "June ", "July ", "August ", "September ", "October ", "November ", "December "];
            console.log(parseInt(date[1], 10));
            let id = this.getAttribute('name');
            document.getElementById('spanFourthParagraph_' + id).innerHTML = monthNames[parseInt(date[1], 10)] + date[2] + ', ' + date[0];
            document.getElementById('spanFourthParagraph_' + id).setAttribute('name', FourthParagraph);

            if(date[1] == '03' || date[1] == '02' || date[1] == '01'){
                var month = (date[1]-3)+12;
                var year = date[0]-1;
            }else{
                var month = date[1]-3;
                var year = date[0];
            }
            document.getElementById('spanminus3months_' + id).innerHTML = monthNames[month] + date[2] + ', ' + year;
            document.getElementById('spanminus3months_' + id).setAttribute('name', year + '-' + month + '-' + date[2]);

            var dates = new Date(month + '-' + date[2] + '-' + year);
            var day = dates.getDate() - 1;
            dates.setDate(day);

            var years = dates.getFullYear();
            if(month == '01' && date[2] == '01'){
                var day = dates.getDate();
                var months = (month-1)+12;
            }else{
                if(date[2] == '01'){
                    var day = dates.getDate();
                    var months = (month-1);
                }else{
                    var day = dates.getDate();
                    var months = (parseInt(month, 10));
                }
            }
            document.getElementById('spanminus1day_' + id).innerHTML = monthNames[months] + day + ', ' + years;
            document.getElementById('spanminus1day_' + id).setAttribute('name', years + '-' + months + '-' + day);

            $.ajax({
                url: '/print-adjustmentmagnacarta-report-individual-editFourthparagraph',
                type: "POST",
                data:{
                    _token:'{{ csrf_token() }}',
                    key_id:id,
                    key_value:FourthParagraph
                },
                success: function(html){
                    if(html.success == 'true'){
                        swal("Successfully modify!", "", "success");
                        $('#editbtnFourthParagraphBtn').modal('hide');
                    }
                }
            });
        });
    </script>

    @endpush
@endsection
