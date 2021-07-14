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
<body style="font-family: Serif;">
    
{{-- BUTTONS --}}
<div id='action-buttons' class="float-right mt-3 mb-2">
    <a href="" class="btn btn-outline-dark" onclick="window.print()" id="printBtn"><i class="la la-print"></i>&nbsp Print</a>
    <a href="/service-records" class="btn btn-info"><i class="la la-list"></i>&nbsp View Table</a>
</div>
<div class="clearfix"></div>

<div class="col-12 card" id='main-container'>
    <div class="card-header pl-0 pr-0" id="headingOne" style="border: 2px solid black;">
        {{-- HEADING --}}
        <div style="padding-left:5px;margin-top: -10px;">
        <span>GSIS SMRO</span><br>  
        <span>SM - 01 - 02</span>
        </div>
        <div class="text-center">
            <span  style="font-size: 23px;"><b><u> </u><u>S</u> <u>E</u> <u>R</u> <u>V</u> <u>I</u> <u>C</u> <u>E</u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>R</u> <u>E</u> <u>C</u> <u>O</u> <u>R</u> <u>D</u> <u>S</u> </b></span><br>
            <span>(To be accomplished by Employer)</span>
        </div>
        <br>
        {{-- DATE --}}
        <div>
        <div style="padding-left:5px;"><table class="col-12">
            <tr>
                <td><span style="font-size: 15px">NAME:</span></td>
                <td style="border-bottom: 2px solid black;font-size: 15px;font-weight:bold;text-align:center;">{{ $employee[0]['lastname'] }}</td>
                <td style="border-bottom: 2px solid black;font-size: 15px;font-weight:bold;text-align:center;">{{ $employee[0]['firstname'] }}</td>
                <td style="border-bottom: 2px solid black;font-size: 15px;font-weight:bold;text-align:center;">{{ $employee[0]['middlename'].'.' }}</td>
                <td><span style="font-size: 14px">(If married woman, give the full maiden name )</span></td>
            </tr>
            <td style="font-size: 15px;text-align:center;"></td>
            <td style="font-size: 15px;text-align:center;">(Surname)</td>
            <td style="font-size: 15px;text-align:center;">(Given Name)</td>
            <td style="font-size: 15px;text-align:center;">(M.I.)</td>
        </table><br>
        <table class="col-12" style="margin-top:-10px;">
            <tr>
                <td><span style="font-size: 15px">PLACE OF BIRTH:</span></td>
                <td style="width:41.66%;border-bottom: 2px solid black;font-size: 15px;">{{ Carbon\Carbon::parse($employee[0]['date_birth'])->format('F d, Y') }}</td>
                <td><span style="font-size: 14px">Date herein should be checked from birth or baptismal</span><br></td>
            </tr>
            <td></td>
            <td></td>
            <td><span style="font-size: 14px">certificate or some other reliable documents.</span></td>
        </table>
        <table class="col-12" style="margin-bottom: -20px">
            <tr>
                <td><span style="font-size: 15px">PLACE OF BIRTH:</span></td>
                <td style="width:41.66%;border-bottom: 2px solid black;font-size: 15px;">{{ $employee[0]['place_birth'] }}</td>
                <td><span style="font-size: 14px;visibility:hidden;">Date herein should be checked from birth or baptismal</span><br></td>
            </tr>
            <td></td>
            <td></td>
            <td><span style="font-size: 14px;visibility:hidden;">certificate or some other reliable documents.</span></td>
        </table>
        <span style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that the employee named herein above actually rendered services in this office as shown by the service record below, each line of which is supported by appointment and other papers actually issued by this Office and approved by the authorities concerned.</span></div>
        <br><br>
        <table id="table" class="table table-bordered" style="border: 2px solid black;">
            <thead style="background-color:rgb(205,205,205) !important;">
                    <tr>
                        <th style="padding: 0;border: 2px solid black !important;font-size: 18px;font-weight:bold;text-align:center;" colspan="2">SERVICE</th>
                        <th style="padding: 0;border: 2px solid black !important;font-size: 18px;font-weight:bold;text-align:center;" colspan="3">RECORD OF APPOINTMENT</th>
                        <th style="padding: 0;border: 2px solid black !important;font-size: 18px;font-weight:bold;text-align:center;" colspan="2">OFFICE ENTITY/DIVISION</th>
                        <th style="padding: 0;border: 2px solid black !important;font-size: 18px;font-weight:bold;text-align:center;" colspan="2">SEPARATION</th>
                    </tr>
                    <tr>
                        <th style="padding: 0;border: 2px solid black !important;font-size: 16px;text-align:center;" colspan="2">(Inclusive Date)</th>
                        <th style="padding: 0;border: 2px solid black !important;font-size: 16px;text-align:center;" class="align-middle" rowspan="2">Designation</th>
                        <th style="padding: 0;border: 2px solid black !important;font-size: 16px;text-align:center;" class="align-middle" rowspan="2">Status</th>
                        <th style="padding: 0;border: 2px solid black !important;font-size: 16px;text-align:center;" class="align-middle" rowspan="2">Salary</th>
                        <th style="padding: 0;border: 2px solid black !important;font-size: 16px;text-align:center;" class="align-middle" rowspan="2">Station/Place<br>of Assignment</th>
                        <th style="padding: 0;border: 2px solid black !important;font-size: 16px;text-align:center;" class="align-middle" rowspan="2">Leave<br>w/o Pay</th>
                        <th style="padding: 0;border: 2px solid black !important;font-size: 16px;text-align:center;" class="align-middle" rowspan="2">Date</th>
                        <th style="padding: 0;border: 2px solid black !important;font-size: 16px;text-align:center;" class="align-middle" rowspan="2">Cause</th>
                    </tr>
                    <th style="padding: 0;border: 2px solid black !important;font-size: 16px;text-align:center;">From</th>
                    <th style="padding: 0;border: 2px solid black !important;font-size: 16px;text-align:center;">To</th>
                    
            </thead>
            <tbody>
                @foreach($serviceRecord as $serviceRecords)
                    <tr>
                        <td style="padding: 0;border: 2px solid black !important;font-size: 14px;color: #000000;text-align: center;">{{Carbon\Carbon::parse($serviceRecords->service_from_date)->format('m/d/Y')}}</td>
                        <td style="padding: 0;border: 2px solid black !important;font-size: 14px;color: #000000;text-align: center;">{{Carbon\Carbon::parse($serviceRecords->service_to_date)->format('m/d/Y')}}</td>
                        <td style="padding: 0;border: 2px solid black !important;font-size: 14px;color: #000000;text-align: center;">
                        @foreach ($position as $positions)
                            {{ $serviceRecords->position_id == $positions->position_id ? $positions->position_name : '' }}
                        @endforeach
                        </td>
                        <td style="padding: 0;border: 2px solid black !important;font-size: 14px;color: #000000;text-align: center;">{{$serviceRecords->status}}</td>
                        <td style="padding: 0;border: 2px solid black !important;font-size: 14px;color: #000000;text-align: center;">{{$serviceRecords->salary}}</td>
                        <td style="padding: 0;border: 2px solid black !important;font-size: 14px;color: #000000;text-align: center;">
                        @foreach ($office as $offices)
                            {{ $serviceRecords->office_code == $offices->office_code ? $offices->office_short_name.' - '.$offices->office_short_address : '' }}
                        @Endforeach
                        </td>
                        <td style="padding: 0;border: 2px solid black !important;font-size: 14px;color: #000000;text-align: center;">{{$serviceRecords->leave_without_pay}}</td>
                        <td style="padding: 0;border: 2px solid black !important;font-size: 14px;color: #000000;text-align: center;">{{Carbon\Carbon::parse($serviceRecords->separation_date)->format('m/d/Y')}}</td>
                        <td style="padding: 0;border: 2px solid black !important;font-size: 14px;color: #000000;text-align: center;">{{$serviceRecords->separation_cause}}</td>
                    </tr>
                @Endforeach  
                <tbody id="displayEmptyRows">
                </tbody>
            </tbody>
        </table>
            <div class="float-right">
                <p>CERTIFIED CORRECT:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><br><br>
                <div class="col-md-12">
                    <center><h6><b style="text-decoration: underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ACE R. ORCULLO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></h6>
                </div> </center><br><br>
                <div class="col-md-12">
                         <center><span style="text-decoration: underline">Provincial Human Resource Mgt. Officer</span><br>
                         <span>(Designation)</span></center>
                </div>
            </div>



            <div class="float-left">
                <p>IMPORTANT:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><br>
                <div class="col-md-12">
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PRAPARE IN DUPLICATE WITH THE<br> 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;USE OF PLAIN BOND PAPER</p>
                </div><br><br>
                <div class="col-md-9">
                         <center><span style="text-decoration: underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Carbon\Carbon::now()->format('F d, Y')}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
                         <span>Date</span></center>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        if(localStorage.getItem('serviceRecordsRows') != null){
            var emptyRowsNumber = localStorage.getItem('serviceRecordsRows');
            var tr = [];
                for(var i = 1;i <= emptyRowsNumber; i++){
                    tr += `<tr>
                    <td style="border: 2px solid black !important;font-size: 14px;color:#000000;text-align: center;"></td>
                    <td style="border: 2px solid black !important;font-size: 14px;color:#000000;text-align: center;"></td>
                    <td style="border: 2px solid black !important;font-size: 14px;color:#000000;text-align: center;"></td>
                    <td style="border: 2px solid black !important;font-size: 14px;color:#000000;text-align: center;"></td>
                    <td style="border: 2px solid black !important;font-size: 14px;color:#000000;text-align: center;"></td>
                    <td style="border: 2px solid black !important;font-size: 14px;color:#000000;text-align: center;"></td>
                    <td style="border: 2px solid black !important;font-size: 14px;color:#000000;text-align: center;"></td>
                    <td style="border: 2px solid black !important;font-size: 14px;color:#000000;text-align: center;"></td>
                    <td style="border: 2px solid black !important;font-size: 14px;color:#000000;text-align: center;"></td>
                </tr>`;
                }
                document.getElementById('displayEmptyRows').innerHTML = tr;
        }
        window.print();
    </script>
</body>
</html>