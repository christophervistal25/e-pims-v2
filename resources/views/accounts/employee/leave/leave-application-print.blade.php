<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print Leave Application | {{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ asset('/css/adminlte.css') }}">
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> --}}

    <style type="text/css">
        .rectangle {
            border: 1px outset black;
            height: 100px;
            width: 200px;
        }

        .content-wrapper {
            margin-left: 0px !important;
        }

        .myDiv {
            border: 1px outset black;
            /*text-align: center;*/
            padding: 5px;
            margin: auto;
        }

        .double {
            border-style: double;
            padding: 5px;
        }

        .half {
            width: 50%;

        }

        .form-group {
            margin-bottom: 0rem;
        }

      @page {
            /* Browser default, customizable by the user in the print dialogue. */

            /* Default, but explicitly in portrait or landscape orientation and not user-
            customizable. In my instance of Chrome, this is a vertical or horizontal letter
            format, but you might find something different depending on your locale. */
            size: legal portrait;
            margin :0;
      }
    </style>

</head>

<body>



    <div class="wrapper">



        <div class="container-fluid">
            <div class="box">
                <div class="box-body">
                    <div class="card shadow-none" id="app-print">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <text><small><b>Civil Service Form No. 6</b></small></text><br>
                                    <text><small><b>Revised 2020</b></small></text>
                                </div>
                                <div class="col">
                                    <div style="position: absolute; right: 5%">
                                        <text><small><b> ID: {{ date('m') }}{{ date('y') }}-{{ str_pad($seqNo, "3", "0", STR_PAD_LEFT) }} </b></small></text>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div style="position: relative; left: 25%;">
                                    <img src="{{ asset('/assets/img/province.png') }}" height="120px" width="120px">
                                </div>

                                <div class="text-center mx-auto" style="position: absolute; left: 40%; ">

                                    <div>
                                        <h6><b>Republic of the Philippines</b></h6>
                                        <h6><b>PROVINCE OF SURIGAO DEL SUR</b></h6>
                                        <h6><b><i> Tandag City</i></b></h6>

                                    </div>

                                </div>
                                <div style="position: absolute; right: 10%">
                                    <small>Stamp Date of Receipt</small>
                                    <div class="rectangle"></div>
                                </div>

                            </div>
                        </div>

                        <div class="card-body">

                            <div class="text-center mx-auto">
                                <h3><strong>APPLICATION FOR LEAVE</strong></h3>
                            </div>
                            <div class="myDiv">
                                <table style="width: 100%">
                                    <tr>
                                        <th>&nbsp 1. OFFICE/DEPARTMENT</th>
                                        <th> 2. NAME:</th>
                                        <th>(Last)</th>
                                        <th>(First)</th>
                                        <th>(Middle)</th>
                                    </tr>
                                    <tr>
                                        <td>&nbsp; {{ $employee->office_charging->Description }}</td>
                                        <td></td>
                                        <td>{{ $employee->LastName }}</td>
                                        <td>{{ $employee->FirstName }}</td>
                                        <td>{{ $employee->MiddleName }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="myDiv">
                                <table width="100%">
                                    <tr>
                                        <td>&nbsp 3. DATE OF FILING </td>
                                        <th><u>&nbsp; {{ $application->created_at->format('F d, Y h:i A') }}&nbsp;
                                            </u></th>
                                        <td> 4. POSITION </td>
                                        <th><u> &nbsp; {{ $employee->position->Description }} &nbsp; </u></th>
                                        <td> 5. SALARY </td>
                                        <th><u>&nbsp; &#8369;
                                                {{ number_format($employee->salary_rate, 2, ".", ",") }} &nbsp;</u>
                                        </th>
                                    </tr>
                                </table>
                            </div>
                            <div class="double">
                                <h6 class="text-center"><b>6. DETAILS OF APPLICATION</b></h6>
                            </div>

                            <div class="myDiv">
                                <div class="row">
                                    <div class="col-sm-6 border-right border-dark">
                                        <p>6.A TYPE OF LEAVE TO BE AVAILED </p>
                                        <!-- checkbox -->

                                        <div class="form-check">
                                            <div class="form-group">
                                                <input data-code="VL" type="checkbox" name="typeOfLeave" id="Vacation" onclick="return false;"
                                                    value="Vacation">
                                                <label class="form-check-label" for="typeOfLeave">Vacation
                                                    Leave <small>(Sec. 51, Rule XVI, Omnibus Rules
                                                        Implementing E.O. No. 292)</small></label>
                                            </div>
                                            <div class="form-group">
                                                <input type="checkbox" data-code="FL" name="typeOfLeave" id="Mandatory" onclick="return false;"
                                                    value="Mandatory">
                                                <label class="form-check-label" for="typeOfLeave">Mandatory/Forced
                                                    Leave <small>(Sec.
                                                        25, Rule XVI, Omnibus Rules Implementing E.O No.
                                                        292)</small></label>
                                            </div>
                                            <div class="form-group">
                                                <input type="checkbox" data-code="SL" name="typeOfLeave" id="Sick" onclick="return false;"
                                                    value="Sick">
                                                <label class="form-check-label" for="typeOfLeave">Sick Leave
                                                    <small>(Sec. 43, RuleXVI, Omnibus Rules Implementing
                                                        E.O. No. 292)</small></label>
                                            </div>
                                            <!-- start -->
                                            <div class="form-group">
                                                <input type="checkbox" data-code="ML" name="typeOfLeave" onclick="return false;"
                                                    id="Maternity Leave (RA 11210)" value="Maternity Leave (RA 11210)">
                                                <label class="form-check-label" for="typeOfLeave">Maternity
                                                    Leave <small>(R.A No.11210/IRR issued by CSC, DOLE and
                                                        SSS)</small></label>
                                            </div>
                                            <div class="form-group">
                                                <input type="checkbox" data-code="PL" name="typeOfLeave" onclick="return false;"
                                                    id="Paternity Leave (RA 8187)" value="Paternity Leave (RA 8187)">
                                                <label class="form-check-label" for="typeOfLeave">Paternity
                                                    Leave <small>(R.A. No. 8187/CSC MC No. 71, s. 1998, as
                                                        amended)</small></label>
                                            </div>
                                            <div class="form-group">
                                                <input type="checkbox" data-code="SPL" name="typeOfLeave" onclick="return false;"
                                                    id="Special Privilege Leave" value="Special Privilege Leave">
                                                <label class="form-check-label" for="typeOfLeave">Special
                                                    Privilege Leave <small>(Sec. 21, Rule XVI, Omnibus Rules
                                                        Implementing E.O. No. 292)</small></label>
                                            </div>
                                            <div class="form-group">
                                                <input type="checkbox" data-code="SOLOPARENT" name="typeOfLeave" onclick="return false;"
                                                    id="Solo Parent Leave (RA 8972)"
                                                    value="Solo Parent Leave (RA 8972)">
                                                <label class="form-check-label" for="typeOfLeave">Solo
                                                    Parent Leave <small>(RA No. 8972/CSC MC No. 8, s.
                                                        2004)</small></label>
                                            </div>
                                            <div class="form-group">
                                                <input type="checkbox" data-code="STL" name="typeOfLeave" onclick="return false;"
                                                    id="Study Leave" value="Study Leave">
                                                <label class="form-check-label" for="typeOfLeave">Study
                                                    Leave <small>(Sec. 68, Rule XVI, Omnibus Rules
                                                        Implementing E.O. No. 292)</small></label>
                                            </div>
                                            <div class="form-group">
                                                <input type="checkbox" data-code="VAWC" name="typeOfLeave" onclick="return false;"
                                                    id="10-Day VAWC Leave (RA 9262)"
                                                    value="10-Day VAWC Leave (RA 9262)">
                                                <label class="form-check-label" for="typeOfLeave">10-Day
                                                    VAWC Leave <small>(RA No.9262/CSC MC No. 15, s.
                                                        2005)</small></label>
                                            </div>
                                            <div class="form-group">
                                                <input type="checkbox" data-code="RL" name="typeOfLeave" onclick="return false;"
                                                    id="Rehabilitation" value="Rehabilitation">
                                                <label class="form-check-label" for="typeOfLeave">Rehabilitation
                                                    Privilege <small>(Sec.
                                                        55, Rule XVI, Omnibus Rules Implementing E.O. No.
                                                        292)</small></label>
                                            </div>
                                            <div class="form-group">
                                                <input type="checkbox" data-code="SLB" name="typeOfLeave" onclick="return false;"
                                                    id="Special Leave Benefits for Women (RA 9710)"
                                                    value="Special Leave Benefits for Women (RA 9710)">
                                                <label class="form-check-label" for="typeOfLeave">Special
                                                    Leave Benefits For Women <small>(RA No. 9710/CSC MC No.
                                                        25, s. 2010)</small></label>
                                            </div>
                                            <div class="form-group">
                                                <input type="checkbox" data-code="SEL" name="typeOfLeave" onclick="return false;"
                                                    id="Special Emergency (Calamity) Leave"
                                                    value="Special Emergency (Calamity) Leave">
                                                <label class="form-check-label" for="typeOfLeave">Special
                                                    Emergency (Calamity) Leave <small>(CSC MC No. 2, s.
                                                        2012, as amended)</small></label>
                                            </div>
                                            <div class="form-group">
                                                <input type="checkbox" data-code="AL" name="typeOfLeave" onclick="return false;"
                                                    id="Adoption Leave (RA 8552)" value="Adoption Leave (RA 8552)">
                                                <label class="form-check-label" for="typeOfLeave">Adoption
                                                    Leave <small>(R.A No. 8552)</small></label>
                                            </div>

                                            <!-- <div class="form-group">
                      <input type="checkbox" name="typeOfLeave" id="Leave without Pay" value="Leave without Pay"  >
                      <label class="form-check-label" for="typeOfLeave">Leave without Pay</label>
                    </div> -->

                                            <div class="form-group">
                                                <input type="checkbox" data-code="CTL" name="typeOfLeave" onclick="return false;"
                                                    id="COVID19 Leave (Quarantine)" value="COVID19 Leave (Quarantine)">
                                                <label class="form-check-label" for="typeOfLeave">COVID19
                                                    Leave (Quarantine) <small>(CSC MC No. 10, s.
                                                        2020)</small></label>
                                            </div>
                                            <div class="form-group">
                                                <input type="checkbox" name="typeOfLeave" id="COVID19 Leave (Treatment)" onclick="return false;"
                                                    value="COVID19 Leave (Treatment)">
                                                <label class="form-check-label" for="typeOfLeave">COVID19
                                                    Leave (Treatment) <small>(CSC MC No. 10, s.
                                                        2020)</small></label>
                                            </div>

                                            <!-- ADDITIONAL LEAVE -->
                                            <div class="form-group">
                                                <input type="checkbox" data-code="VACL" name="typeOfLeave" onclick="return false;"
                                                    id="Vaccination" value="Vaccination">
                                                <label class="form-check-label" for="typeOfLeave">Vaccination Leave
                                                    <small>(CSC MC No.
                                                        16, s. 2021)</small></label>
                                            </div>
                                            <!-- end -->
                                            &nbsp;
                                            <div class="form-group">
                                                <p>Others: <u> ___________________________________</u></p>
                                            </div>
                                        </div>

                                    </div>
                                    <!--col-sm-6 type of leave to be avaiiled-->
                                    <div class="col-sm-6">
                                        <p>6.B DETAILS OF LEAVE</p>
                                        <div class="form-group">

                                            <div class="form-check">
                                                <text><i>In case of Vacation/Special Privilege
                                                        Leave:</i></text>
                                                <table>

                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" data-key="WITHIN THE PHILIPPINES" name="vacationLoc" onclick="return false;"
                                                                value="vacationLoc"> Within the Philippines: <span data-key-text="WITHIN THE PHILIPPINES"></span>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><input type="checkbox" data-key="ABROAD SPECIFY" name="vacationLoc" onclick="return false;"
                                                                value="vacationLoc"> Abroad Specify: <span data-key-text="ABROAD SPECIFY"></span></td>
                                                    </tr>

                                                </table>
                                            </div>
                                            <br>
                                            <div class="form-check">
                                                <text><i>In case of Sick Leave:</i></text>
                                                <table>
                                                    <tr>
                                                        <td><input type="checkbox" data-key="IN HOSPITAL" name="sickLoc" value="In Hospital" onclick="return false;">
                                                            In Hospital (Specify
                                                            Illness): <span data-key-text="IN HOSPITAL"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" data-key="OUT PATIENT" name="sickLoc" value="Out Patient" onclick="return false;">
                                                            Out Patient (Specify
                                                            Illness): <span data-key-text="OUT PATIENT"></span></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <br>
                                            <div class="form-check">
                                                <!-- <table>
                            <tr>
                                <td><i>In case of Special Leave Benefits for Women:</i></td>

                            </tr>
                            <tr>
                                <td>(Specify Illness): &nbsp;&nbsp; <u> </u></td>

                            </tr>
                            </table> -->

                                                <div>
                                                    <text><i>In case of Special Leave Benefits for
                                                            Women:</i></text><br>
                                                    <text>(Specify Illness): &nbsp;&nbsp; <u> </u></text>
                                                </div>

                                            </div>
                                            <br>
                                            <div class="form-check">
                                                <text><i>In case of Study Leave:</i></text>
                                                <table>
                                                    <tr>
                                                        <td><input type="checkbox" name="studyreason" onclick="return false;"
                                                                value="Completion of Master's Degree">
                                                            Completion of Master's Degree</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" name="studyreason" onclick="return false;"
                                                                value="BAR/Board Examination Review">
                                                            BAR/Board Examination Review</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <br>
                                            <div class="form-check">
                                                <text><i>Other purpose:</i></text>
                                                <table>
                                                    <tr>
                                                        <td><input type="checkbox" name="typeOfLeave" onclick="return false;"
                                                                value="Monetization"> Monetization of Leave
                                                            Credits</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" name="typeOfLeave" onclick="return false;"
                                                                value="Terminal Leave"> Terminal Leave</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="myDiv">
                                <div class="row">
                                    <div class="col-sm-6 border-right border-dark">
                                        <p>6.C NUMBER OF WORKING DAYS APPLIED FOR </p>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <div><u> _____<b>{{ $application->no_of_days }}
                                                            {{ $application->no_of_days >= 2 ? 'DAYS' : 'DAY' }}</b>________</u>
                                                </div>

                                                <br>
                                                <div>INCLUSIVE DATES</div>
                                                <div class='font-weight-bold'>
                                                    <u>
                                                        {{ $application->date_from->format('F') }}
                                                        @foreach($inclusiveDates as $date)
                                                        @php
                                                        $dates .= $date->format('d') . ", "
                                                        @endphp
                                                        @endforeach
                                                        {{ rtrim($dates, ",") }}
                                                        {{ $application->date_from->format('Y') }}
                                                    </u>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <!--col-sm-6 type of leave to be avaiiled-->
                                    <div class="col-sm-6">
                                        <p>6.D COMMUTATION</p>
                                        <div class="form">

                                            <div class="form-check">
                                                <table>
                                                    <tr>
                                                        <td><input type="checkbox" name="" value="" checked onclick="return false">
                                                            Not Requested</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" name="" value="" onclick="return false">
                                                            Requested</td>
                                                    </tr>
                                                </table>
                                                <br>
                                                <div class="text-center">
                                                    <text><u>__<b> {{ $employee->FirstName }}
                                                                {{ substr($employee->MiddleName, 0, 1) . '.' }}
                                                                {{ $employee->LastName }}
                                                                {{ $employee->Suffix }}</b>__</u></text>
                                                    <div class="text-center">(Signature of Applicant) </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="double">
                                <h6 class="text-center"><b>7. DETAILS OF ACTION ON APPLICATION</b></h6>
                            </div>

                            <div class="myDiv">
                                <div class="row">
                                    <div class="col-sm-6 border-right border-dark">
                                        <p>7.A CERTIFICATION OF LEAVE CREDITS </p>

                                        <div class="form-group">
                                            <div class="text-center" style="margin-bottom: 5px;"> As of <u>
                                                    ___<b>{{ $dateForwarded->format('F - Y') }}</b>___ </u></div>

                                            <div class="card-body table-responsive p-0 myDiv" style="width: 80%">
                                                <table class="table table-hover table-bordered table-sm ">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th></th>
                                                            <th>Vacation Leave</th>
                                                            <th>Sick Leave</th>
                                                            <th>TOTAL</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="balance">
                                                            <td><b>Total Earned</b></td>
                                                            <td>{{ number_format($vacationCredit, 3, ".") }}</td>
                                                            <td>{{ number_format($sickCredit, 3, ".") }}</td>
                                                            <td>
                                                                {{
                                                                                                            number_format(
                                                                                                                  number_format($vacationCredit, 3, ".") + number_format($sickCredit, 3, "."),
                                                                                                                  2,
                                                                                                                  ".",
                                                                                                            )
                                                                                                       }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Less this application</b></td>
                                                            <td>
                                                                {{ $application->leave_type_id == 'VL' ? number_format($application->no_of_days, 3, ".") : 0 }}
                                                            </td>
                                                            <td>
                                                                {{ $application->leave_type_id == 'SL' ? number_format($application->no_of_days, 3, ".") : 0 }}
                                                            </td>
                                                            <td>
                                                                {{ $application->leave_type_id == 'VL' ? number_format($application->no_of_days, 3, ".") : '' }}
                                                                {{ $application->leave_type_id == 'SL' ? number_format($application->no_of_days, 3, ".") : '' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Balance</b></td>

                                                            <td>
                                                                @if($application->leave_type_id === 'VL')
                                                                {{ number_format($vacationCredit - $application->no_of_days, 3, ".") }}
                                                                @else
                                                                {{ number_format($vacationCredit, 3, ".") }}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($application->leave_type_id === 'SL')
                                                                {{ number_format($sickCredit - $application->no_of_days, 3, ".") }}
                                                                @else
                                                                {{ number_format($sickCredit, 3, ".") }}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                {{

                                                                                                       number_format(
                                                                                                            number_format($vacationCredit - $application->no_of_days, 3, ".") +
                                                                                                            number_format($sickCredit - $application->no_of_days, 3, "."),
                                                                                                            3,
                                                                                                            ".",
                                                                                                      )

                                                                                                      }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <br>
                                            <div class="">
                                                <div class="text-center">
                                                    <text><u>________________<b>{{ $hrmoOffice->office_head }}</b>_______________</u></text>

                                                    <div><b>({{ $hrmoOffice->position_name }})</b></div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <!--col-sm-6 certification of leave credits-->
                                    <div class="col-sm-6">
                                        <p>7.B RECOMMENDATION</p>
                                        <div class="form">

                                            <div class="form-check">
                                                <div>
                                                    <input type="checkbox" name="" onclick="return false"> For Approval
                                                </div>
                                                <div style="margin-right: 10px;">
                                                    <input type="checkbox" name="" onclick="return false"> For disapproval due to
                                                    <text><u>___________________________________________________________________________________________________________________________________________________________________________________________________________________________________</u></text>
                                                </div>

                                                <br>
                                                <br>
                                                <div class="text-center">
                                                    <text><u>____________<b> {{ $employee->offices->office_head }}
                                                            </b>____________</u></text>
                                                    <div class="text-center">({{ $employee->offices->position_name }})
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="myDiv">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <p>7.C APPROVED FOR:</p>
                                            <div class="form-check">
                                                <div> <text><u>__<b>{{ $application->no_of_days }}</b>__</u> days with
                                                        pay</text></div>
                                                <div> <text><u>_____</u> days without pay</text></div>

                                                <div> <text><u>_____</u> others (Specify)</text></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>7.D. DISAPPROVED DUE TO:</p>
                                        <div class="form-check">
                                            <div style="margin-right: 10px;">
                                                <P><u>____________________________________________________________________________________________________________________________</u>
                                                </P>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <br>
                                <div class="text-center">
                                    <u>__<b>{{ $provincialGovernor }}</b>__</u>
                                    <div><b>Provincial Governor</b></div>
                                </div>
                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
            let type = "{{ $application->leave_type_id }}";
            let incaseID = "{{ $application->incase_of }}";
            let specify = "{{ $application->specify }}";

            let leaveTypeElement = document.querySelector(`[data-code='${type}']`);
            let incaseOf = document.querySelector(`[data-key='${incaseID}']`);
            let incaseSpecify = document.querySelector(`[data-key-text='${incaseID}']`);

            if (leaveTypeElement) {
                  leaveTypeElement.setAttribute('checked', true);
            }

            if(incaseOf) {
                  incaseOf.setAttribute('checked', true);
            }

            if(incaseSpecify) {
                  incaseSpecify.innerText = specify;
            }

            window.print();
    </script>
</body>

</html>
