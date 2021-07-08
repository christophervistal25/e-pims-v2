
@extends('layouts.app')
@section('title', 'Print Service Records of Employee')
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
    <a class="btn btn-outline-dark" href="{{ route('service-records.previewed.print', $id) }}" id="printBtn"><i class="la la-print"></i>&nbsp Print</a>
    <a href="/service-records" class="btn btn-info"><i class="la la-list"></i>&nbsp View Table</a>
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
            <h4>SERVICE RECORDS</h4>
        </div>
        
        {{-- DATE --}}
        <div class="card-body-p">
        {{ Carbon\Carbon::parse($serviceRecord->separation_date)->format('F d, Y') }}<br>
        {{ $employee[0]['lastname']. ', ' .$employee[0]['firstname']. ' ' .$employee[0]['middlename'].'.' }}<br>            
        {{ $office[0]['office_name'] }}<br>
        {{ $position[0]['position_name'] }}<br>
        {{$serviceRecord['service_to_date']}}
        {{$serviceRecord['service_to_date']}}
        {{$serviceRecord['status']}}
        {{$serviceRecord['salary']}}
        {{$serviceRecord['separation_cause']}}
        <br>



            
        </div>
    </div>
</div>
@include('ServiceRecords.add-ons.servicerecordsmodal')
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
