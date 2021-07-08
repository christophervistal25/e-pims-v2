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
    <a href="/service-records" class="btn btn-info"><i class="la la-list"></i>&nbsp View Table</a>
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
            <h4>SERVICE RECORDS</h4>
        </div>
        
        {{-- DATE --}}
        <div class="card-body-p">
            





            
        </div>
    </div>
</div>
    <script>
        window.print();
    </script>
</body>
</html>