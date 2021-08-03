@extends('layouts.app')
@section('title', 'Leave Forwarded Balance')
@prepend('page-css')
{{-- <script src="{{ asset('/js/app.js') }}" defer></script> --}}
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
<link rel="stylesheet" href="/assets/css/bootstrap-float-label.min.css" />
<link rel="stylesheet" href="/assets/css/line-awesome.min.css">
<link rel="stylesheet" href="/assets/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/assets/css/style.css">
<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
@endprepend
@section('content')
<div class="row">  
    <div class="col-lg-12">
        <div  id="forwardedBalanceTable" class="card shadow">
            <div class="card-body">
            {{-- LIST OR DATA TABLES --}}
                <div class="page-header">
                    <div class="row align-items-right mb-2 ">
                        <div class="col-auto float-right ml-auto">
                            <button id="addBtn" type="button" class="btn btn-primary float-right shadow"><i class="la la-plus"></i>&nbsp
                                Add Forwarded Balance </button> 
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-condensed text-center" id="forwarded-balance-table" style="width:100%;">
                            <thead>
                                <tr>
                                    <th class="font-weight-bold align-middle text-center" rowspan="2" width="5%">Employee ID</th>
                                    <th class="font-weight-bold align-middle text-center" rowspan="2">Employee Name</th>
                                    <th class="font-weight-bold align-middle text-center" rowspan="2">As Of</th>
                                    <th class="font-weight-bold align-middle text-center" rowspan="1 " colspan="3">Vacation Leave</th>
                                    <th class="font-weight-bold align-middle text-center" rowspan="1" colspan="3">Sick Leave</th>
                                    <th class="font-weight-bold align-middle text-center" rowspan="2" width="5%">Balance Leave Credits</th>
                                    <th class="font-weight-bold align-middle text-center" rowspan="2" width="10%">Actions</th>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold align-middle text-center" width="5%">Earned</th>
                                    <th class="font-weight-bold align-middle text-center" width="5%">Enjoyed</th>
                                    <th class="font-weight-bold align-middle text-center" width="5%">Balance</th>
                                    <th class="font-weight-bold align-middle text-center" width="5%">Earned</th>
                                    <th class="font-weight-bold align-middle text-center" width="5%">Enjoyed</th>
                                    <th class="font-weight-bold align-middle text-center" width="5%">Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($records as $employeeFullname => $record)
                                    @php 
                                    $vlBalance = (float) $record->where('type.code', 'VL')->sum('earned') - $record->where('type.code', 'VL')->sum('used');
                                    $slBAlance = (float) $record->where('type.code', 'SL')->sum('earned') - $record->where('type.code', 'SL')->sum('used'); 
                                    $totalBalance = (float) $vlBalance + $slBAlance;
                                    @endphp
                                        <tr>
                                            <td>{{ $record->first() ? $record[0]->employee_id : '' }}</td>
                                            <td class="text-center">{{ $employeeFullname }}</td>
                                            <td>{{ $record->first() ? $record[0]->fb_as_of : '' }}</td>
                                            {{-- VACATION LEAVE --}}
                                            <td>{{ $record->where('type.code', 'VL')->sum('earned') }}</td>
                                            <td>{{ $record->where('type.code', 'VL')->sum('used') }}</td>
                                            <td>{{ $vlBalance }}</td>
                                            {{-- END OF VACATION LEAVE --}}
                                            {{-- SICK LEAVE --}}
                                            <td>{{ $record->where('type.code', 'SL')->sum('earned') }}</td>
                                            <td>{{ $record->where('type.code', 'SL')->sum('used') }}</td>
                                            <td>{{ $slBAlance }}</td>
                                            {{-- END OF SICK LEAVE --}}

                                            <td><b>{{ $totalBalance }}</b></td>
                                            <td>
                                                 <button class='btn btn-success btn-sm rounded-circle shadow edit__leave__type' data-id="{{ $record->first() ? $record[0]->employee_id : '' }}">
                                                    <i class='la la-pencil'></i>
                                                </button>
                                                <button class='btn btn-danger btn-sm rounded-circle shadow delete__leave__type' data-id="{{ $record->first() ? $record[0]->employee_id : '' }}" data-as-of-date="{{ $record[0]->fb_as_of }} ">
                                                    <i class='la la-trash'></i>
                                                </button>
                                            </td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card shadow d-none" id="forwardedBalanceCard">
            <div class="card-body">
            <form action="" method="POST" id="forwardedBalance">
                    @csrf
                <div class="alert alert-secondary text-center font-weight-bold">LEAVE FORWARDED BALANCE</div>
                <hr>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <div class="spinner-border spinner-border-sm text-light d-none" id="save-spinner" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <img class="mb-5 rounded-circle img-thumbnail" id="empPhoto" src="/storage/employee_images/no-image.png" width="50%"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="empName" class="form-group has-float-label">
                                    <select class="form-control selectpicker"  data-live-search="true"
                                        name="employeeName" id="employeeName" data-size="6" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                        <option>Search name here</option>
                                        @foreach($employees as $employee)
                                        <option data-office="{{ $employee->information->office->office_name }}" 
                                                data-position="{{ $employee->information->position->position_name }}" 
                                                data-photo="{{ $employee->information->photo }}"
                                                data-employeeId="{{ $employee->information->EmpIDNo }}"
                                            value="{{ $employee->employee_id }}">{{ $employee->lastname }},
                                            {{ $employee->firstname }} {{ $employee->middlename }} </option>
                                        @endforeach
                                    </select>   
                                    <span><strong>EMPLOYEE NAME</strong></span>
                                    <div id="employeeName-error-message" class="text-danger text-sm"></div>
                                </label>
                                
                                <label for="office" class="form-group has-float-label">
                                    <input type="text" name="office" id="office" class="form-control"
                                        style="outline: none; box-shadow: 0px 0px 0px transparent;" readonly >
                                    <span class="font-weight-bold">OFFICE</span>
                                </label>
                                <label for="position" class="form-group has-float-label">   
                                    <input type="text" name="position" id="position" class="form-control"   
                                        style="outline: none; box-shadow: 0px 0px 0px transparent;" readonly>
                                    <span class="font-weight-bold">POSITION</span>
                                </label>
                                <div class="form-group">
                                    <input class="form-control" type="hidden" id="employeeId" name="employeeID">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h6 class="text-sm text-center">VACATION LEAVE</h6>
                                        <label for="vlEarned" class="form-group has-float-label">
                                            <input type="number" class="form-control" id="vlEarned" name="vlEarned"
                                                style="outline: none; box-shadow: 0px 0px 0px transparent; height:60px; font-weight:bold; font-size:30px; text-align: right;" >
                                            <span><strong>VL EARNED</strong></span>
                                            <div id="vlEarned-error-message" class="text-danger text-sm"></div>
                                        </label>
                                        <label for="vlEnjoyed" class="form-group has-float-label">
                                            <input type="number" value="0" class="form-control" id="vlEnjoyed" name="vlEnjoyed"
                                                style="outline: none; box-shadow: 0px 0px 0px transparent; height:60px; font-weight:bold; font-size:30px; text-align: right;" >
                                            <span><strong>VL ENJOYED</strong></span>
                                            <div id="vlEnjoyed-error-message" class="text-danger text-sm"></div>
                                        </label>
                                        <label for="vlBalance" class="form-group has-float-label">
                                            <input type="number" class="form-control" id="vlBalance" name="vlBalance" readonly
                                                style="outline: none; box-shadow: 0px 0px 0px transparent; height:60px; font-weight:bold; font-size:30px; text-align: right;">
                                            <span><strong>VL BALANCE</strong></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <h6 class="text-sm text-center">SICK LEAVE</h6>
                                        <label for="slEarned" class="form-group has-float-label">
                                            <input type="number" id="slEarned" class="form-control" name="slEarned"
                                                style="outline: none; box-shadow: 0px 0px 0px transparent; height:60px; font-weight:bold; font-size:30px; text-align: right;" >
                                            <span><strong>SL EARNED</strong></span>
                                            <div id="slEarned-error-message" class="text-danger text-sm"></div>
                                        </label>
                                        <label for="slEnjoyed" class="form-group has-float-label">
                                            <input type="number" class="form-control" id="slEnjoyed" name="slEnjoyed"
                                                style="outline: none; box-shadow: 0px 0px 0px transparent; height:60px; font-weight:bold; font-size:30px; text-align: right;" >
                                            <span><strong>SL ENJOYED</strong></span>
                                            <div id="slEnjoyed-error-message" class="text-danger text-sm"></div>
                                        </label>
                                        <label for="slBalance" class="form-group has-float-label">
                                            <input type="number" class="form-control" id="slBalance" name="slBalance" readonly
                                                style="outline: none; box-shadow: 0px 0px 0px transparent; height:60px; font-weight:bold; font-size:30px; text-align: right;" >
                                            <span><strong>SL BALANCE</strong></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="asOf" class="form-group has-float-label">
                                    <input type="date" name="asOf" id="asOf" class="form-control" 
                                    style="outline: none; box-shadow: 0px 0px 0px transparent; height:70px; font-weight:bold; font-size:30px;" >
                                    <span class="font-weight-bold">As of</span>
                                    <div id="asOf-error-message" class="text-danger text-sm"></div>
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label for="total_lb" class="form-group has-float-label">
                                    <input type="number" name="total_lb" id="total_lb" class="form-control"
                                    style="outline: none; box-shadow: 0px 0px 0px transparent; height:70px; font-weight:bold; font-size:40px; text-align: right;" disabled>
                                    <span><strong>TOTAL LEAVE BALANCE</strong></span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <button type="submit" class="text-white shadow btn btn-lg btn-success w-100 ml-1" id="btnSave"><i class="lar la-save"></i> Add
                                Record</button>
                            </div>
                            <div class="col-lg-6">
                                <button type="button" class="text-white shadow btn btn-lg btn-primary w-100 ml-1" id="btnBack"><i class="la la-list"></i>
                                    Go back to List
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
        <div class="card shadow d-none" id="editForwardedBalanceCard">
            <div class="card-body">
            <form action="" method="POST" id="editForwardedBalance">
                    @csrf
                <div class="alert alert-secondary text-center font-weight-bold">LEAVE FORWARDED BALANCE</div>
                                <div class="form-group">
                                    <input class="form-control" type="hidden" id="empID" name="empID" value="">
                                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <div class="spinner-border spinner-border-sm text-light d-none" id="save-spinner" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <img class="mb-3 rounded-circle img-thumbnail" id="update_empPhoto" src="/storage/employee_images/no-image.png" width="45%" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                 <label for="update_employeeName" class="form-group has-float-label">
                                    <input type="text" name="update_employeeName" id="update_employeeName" class="form-control"
                                        style="outline: none; box-shadow: 0px 0px 0px transparent;" readonly >
                                    <span class="font-weight-bold">EMPLOYEE NAME</span>
                                </label>
                                <label for="update_office" class="form-group has-float-label">
                                    <input type="text" name="update_office" id="update_office" class="form-control"
                                        style="outline: none; box-shadow: 0px 0px 0px transparent;" readonly >
                                    <span class="font-weight-bold">OFFICE</span>
                                </label>
                                <label for="update_position" class="form-group has-float-label">   
                                    <input type="text" name="update_position" id="update_position" class="form-control"   
                                        style="outline: none; box-shadow: 0px 0px 0px transparent;" readonly>
                                    <span class="font-weight-bold">POSITION</span>
                                </label>
                                <div class="form-group">
                                    <input class="form-control" type="hidden" id="update_employeeId" name="update_employeeId">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card shadow">
                            <div class="card-body">
                                
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h6 class="text-sm text-center">VACATION LEAVE</h6>
                                        <label for="update_vlEarned" class="form-group has-float-label">
                                            <input type="number" class="form-control" id="update_vlEarned" name="update_vlEarned" step="any"
                                                style="outline: none; box-shadow: 0px 0px 0px transparent; height:60px; font-weight:bold; font-size:30px; text-align: right;" >
                                            <span><strong>VL EARNED</strong></span>
                                            <div id="update_vlEarned-error-message" class="text-danger text-sm"></div>
                                        </label>
                                        <label for="update_vlEnjoyed" class="form-group has-float-label">
                                            <input type="number" class="form-control" id="update_vlEnjoyed" name="update_vlEnjoyed" step="any"
                                                style="outline: none; box-shadow: 0px 0px 0px transparent; height:60px; font-weight:bold; font-size:30px; text-align: right;" >
                                            <span><strong>VL ENJOYED</strong></span>
                                            <div id="update_vlEnjoyed-error-message" class="text-danger text-sm"></div>
                                        </label>
                                        <label for="update_vlBalance" class="form-group has-float-label">
                                            <input type="number" class="form-control" id="update_vlBalance" name="update_vlBalance" readonly
                                                style="outline: none; box-shadow: 0px 0px 0px transparent; height:60px; font-weight:bold; font-size:30px; text-align: right;">
                                            <span><strong>VL BALANCE</strong></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <h6 class="text-sm text-center">SICK LEAVE</h6>
                                        <label for="update_slEarned" class="form-group has-float-label">
                                            <input type="number"  id="update_slEarned" class="form-control" name="update_slEarned" step="any"
                                                style="outline: none; box-shadow: 0px 0px 0px transparent; height:60px; font-weight:bold; font-size:30px; text-align: right;" >
                                            <span><strong>SL EARNED</strong></span>
                                            <div id="update_slEarned-error-message" class="text-danger text-sm"></div>
                                        </label>
                                        <label for="update_slEnjoyed" class="form-group has-float-label">
                                            <input type="number"  class="form-control" id="update_slEnjoyed"  name="update_slEnjoyed" step="any"
                                                style="outline: none; box-shadow: 0px 0px 0px transparent; height:60px; font-weight:bold; font-size:30px; text-align: right;" >
                                            <span><strong>SL ENJOYED</strong></span>
                                            <div id="update_slEnjoyed-error-message" class="text-danger text-sm"></div>
                                        </label>
                                        <label for="update_slBalance" class="form-group has-float-label">
                                            <input type="number" class="form-control" id="update_slBalance" name="update_slBalance" readonly
                                                style="outline: none; box-shadow: 0px 0px 0px transparent; height:60px; font-weight:bold; font-size:30px; text-align: right;" >
                                            <span><strong>SL BALANCE</strong></span>
                                        </label>
                                    </div>
                                </div>
                                 
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="update_asOf" class="form-group has-float-label">
                                    <input type="date" name="update_asOf" id="update_asOf" class="form-control"
                                    style="outline: none; box-shadow: 0px 0px 0px transparent; height:70px; font-weight:bold; font-size:30px;" >
                                    <span class="font-weight-bold">As of</span>
                                    <div id="update_asOf-error-message" class="text-danger text-sm"></div>
                                </label>
                                <button type="submit" class="text-white shadow btn btn-lg btn-success ml-1" id="btnUpdate"><i class="la la-save"></i>  
                                    Save Changes
                                </button>
                                <button type="button" class="text-white shadow btn btn-lg btn-danger ml-1" id="update_btnDelete"><i class="la la-trash"></i>
                                    Delete Record
                                </button>
                            </div>
                            <div class="col-lg-6">
                                <label for="update_total_lb" class="form-group has-float-label">
                                    <input type="number" name="update_total_lb" id="update_total_lb" class="form-control"
                                    style="outline: none; box-shadow: 0px 0px 0px transparent; height:70px; font-weight:bold; font-size:40px; text-align: right;" readonly>
                                    <span><strong>Total VL & SL</strong></span>
                                </label>
                                <button type="button" class="text-white shadow btn btn-lg btn-primary float-right ml-1" id="update_btnBack"><i class="la la-list"></i>
                                    Go back to List
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

@push('page-scripts')
<script src="/assets/js/jquery.dataTables.min.js"></script>
<script src="/assets/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="/assets/js/sweetalert.min.js"></script>
<script>
    $(document).ready( function () {
        $('#forwarded-balance-table').DataTable({
            "ordering": false,
            "scrollX": true
        });
        
    });
</script>
<script>

     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let vlEarned = document.querySelector('#vlEarned');
    let vlEnjoyed = document.querySelector('#vlEnjoyed');
    let vlBalance = document.querySelector('#vlBalance');
    let slEarned = document.querySelector('#slEarned');
    let slEnjoyed = document.querySelector('#slEnjoyed');
    let slBalance = document.querySelector('#slBalance');   
    let total_lb = document.querySelector('#total_lb');

    let update_vlEarned = document.querySelector('#update_vlEarned');
    let update_vlEnjoyed = document.querySelector('#update_vlEnjoyed');
    let update_vlBalance = document.querySelector('#update_vlBalance');
    let update_slEarned = document.querySelector('#update_slEarned');
    let update_slEnjoyed = document.querySelector('#update_slEnjoyed');
    let update_slBalance = document.querySelector('#update_slBalance');   
    let update_total_lb = document.querySelector('#update_total_lb');
 
    vlBalance.value = 0;
    slBalance.value = 0;
    total_lb.value = 0;

    update_vlBalance.value = 0;
    update_slBalance.value = 0;
    update_total_lb.value = 0;

    vlEarned.addEventListener("keyup", function(){
        vlBalance.value = parseFloat(vlEarned.value) - parseFloat(vlEnjoyed.value);
        slBalance.value = parseFloat(slEarned.value) - parseFloat(slEnjoyed.value);
        total_lb.value = (parseFloat(vlBalance.value) + parseFloat(slBalance.value)).toFixed(3);
    })

    vlEnjoyed.addEventListener("keyup", function(){
        vlBalance.value = parseFloat(vlEarned.value) - parseFloat(vlEnjoyed.value);
        slBalance.value = parseFloat(slEarned.value) - parseFloat(slEnjoyed.value);
        total_lb.value = (parseFloat(vlBalance.value) + parseFloat(slBalance.value)).toFixed(3);
    })

    slEarned.addEventListener("keyup", function(){
        vlBalance.value = parseFloat(vlEarned.value) - parseFloat(vlEnjoyed.value);
        slBalance.value = parseFloat(slEarned.value) - parseFloat(slEnjoyed.value);
        total_lb.value = (parseFloat(vlBalance.value) + parseFloat(slBalance.value).toFixed(3));
    })

    slEnjoyed.addEventListener("keyup", function(){
        vlBalance.value = parseFloat(vlEarned.value) - parseFloat(vlEnjoyed.value);
        slBalance.value = parseFloat(slEarned.value) - parseFloat(slEnjoyed.value);
        total_lb.value = (parseFloat(vlBalance.value) + parseFloat(slBalance.value)).toFixed(3);
    })

    update_vlEarned.addEventListener("keyup", function(){
        update_vlBalance.value = parseFloat(update_vlEarned.value) - parseFloat(update_vlEnjoyed.value);
        update_slBalance.value = parseFloat(update_slEarned.value) - parseFloat(update_slEnjoyed.value);
        update_total_lb.value = (parseFloat(update_vlBalance.value) + parseFloat(update_slBalance.value)).toFixed(3);
    })

    update_vlEnjoyed.addEventListener("keyup", function(){
        update_vlBalance.value = parseFloat(update_vlEarned.value) - parseFloat(update_vlEnjoyed.value);
        update_slBalance.value = parseFloat(update_slEarned.value) - parseFloat(update_slEnjoyed.value);
        update_total_lb.value = (parseFloat(update_vlBalance.value) + parseFloat(update_slBalance.value)).toFixed(3);
    })

    update_slEarned.addEventListener("keyup", function(){
        update_vlBalance.value = parseFloat(update_vlEarned.value) - parseFloat(update_vlEnjoyed.value);
        update_slBalance.value = parseFloat(update_slEarned.value) - parseFloat(update_slEnjoyed.value);
        update_total_lb.value = (parseFloat(update_vlBalance.value) + parseFloat(update_slBalance.value).toFixed(3));
    })

    update_slEnjoyed.addEventListener("keyup", function(){
        update_vlBalance.value = parseFloat(update_vlEarned.value) - parseFloat(update_vlEnjoyed.value);
        update_slBalance.value = parseFloat(update_slEarned.value) - parseFloat(update_slEnjoyed.value);
        update_total_lb.value = (parseFloat(update_vlBalance.value) + parseFloat(update_slBalance.value)).toFixed(3);
    })


        // SHOWS THE DATA VALUE IN INPUT INCLUDING THE PHOTO OF THE EMPLOYEE
        $('#employeeName').change( function (e) {
            let employeeID = e.target.value;
            let [selectedItem] = $("#employeeName option:selected");

            let employeeOffice = selectedItem.getAttribute('data-office') || '';
            let employeePosition = selectedItem.getAttribute('data-position') || '';
            let photo = selectedItem.getAttribute('data-photo') || '';
            let employeeId = selectedItem.getAttribute('data-employeeId') || '';

                $('#office').val(employeeOffice);
                $('#position').val(employeePosition);
                $('#empPhoto').attr('src','/storage/employee_images/'+photo);
                $('#employeeId').val(employeeId);

            let employeeName = $('#employeeName').val();
        });

        $('#btnSave').click( (e)=> {
            e.preventDefault();

            let employeeName = $('#employeeName').val();
            let asOf = $('#asOf').val();
            let vlEarned = $('#vlEarned').val();
            let vlEnjoyed = $('#vlEnjoyed').val();
            let slEarned = $('#slEarned').val();
            let slEnjoyed = $('#slEnjoyed').val();
            let errors = {};
            let filteredError = "";
            
            //EmployeeName required
            if (employeeName == "" || employeeName.toLowerCase() == 'search name here') {
                $('#employeeName-error-message').html('');
                $('#employeeName-error-message').append(
                    `<span class="text-danger"> Employee name is required. </span>`);
                errors.employee = true;
            } else {
                $('#employeeName-error-message').html('');
                errors.employee = false;
            }

            //Date Asof required
            if (asOf === "") {
                $('#asOf-error-message').html('');
                $('#asOf-error-message').append(`<span> Please select a date. </span>`);
                errors.asOf = true;
            } else {
                $('#asOf-error-message').html('');
                errors.asOf = false;
            }

            //VL Earned required
            if (vlEarned === "") {
                $('#vlEarned-error-message').html('');
                $('#vlEarned-error-message').append(`<span> Vacation Leave Earned is required. </span>`);
                errors.vlEarned = true;
            } else {
                $('#vlEarned-error-message').html('');
                errors.vlEarned = false;
            }

            //VL Used required
            if (vlEnjoyed === "") {
                $('#vlEnjoyed-error-message').html('');
                $('#vlEnjoyed-error-message').append(`<span> Vacation Leave Enjoyed is required. </span>`);
                errors.vlEnjoyed = true;
            } else {
                $('#vlEnjoyed-error-message').html('');
                errors.vlEnjoyed = false;
            }

            //SL Earned required
            if (slEarned === "") {
                $('#slEarned-error-message').html('');
                $('#slEarned-error-message').append(`<span> Sick Leave Earned is required. </span>`);
                errors.slEarned = true;
            } else {
                $('#slEarned-error-message').html('');
                errors.slEarned = false;
            }

            //SL Used required
            if (slEnjoyed === "") {
                $('#slEnjoyed-error-message').html('');
                $('#slEnjoyed-error-message').append(`<span> Sick Leave Enjoyed is required. </span>`);
                errors.slEnjoyed = true;
            } else {
                $('#slEnjoyed-error-message').html('');
                errors.slEnjoyed = false;
            }



            filteredError = Object.values(errors).filter((error) => error);
            // Check if the filtered error array variable has value or not.
            // if the length of this array is 0 this means that there is no error
            // or all fields that required is filled by the user.
            if (filteredError.length === 0) {
                $('#save-spinner').removeClass('d-none');
                let data = $('#forwardedBalance').serialize();
                $.ajax({
                    url : '/employee/leave-forwarded-balance',
                    method : 'POST',
                    data : data,
                    success : function (response) {
                        if(response.success){
                            $('#save-spinner').addClass('d-none');
                            swal("Good job!", "Successfully added!", "success").then((isClicked) => {
                                if(isClicked) {
                                    location.reload();
                                }
                            })
                        }
                    },
                });
                
            }
        });

         // TRANSITION OF FORM TO TABLE
        $('#addBtn').click( ()=> {
            $('#forwardedBalanceTable').addClass('d-none');
            $('#forwardedBalanceCard').removeClass('d-none'); 
            $('#employeeName-error-message').html('');
            $('#asOf-error-message').html('');
            $('#vlEarned-error-message').html('');
            $('#vlEnjoyed-error-message').html('');
            $('#slEarned-error-message').html('');
            $('#slEnjoyed-error-message').html(''); 
        });

        $('#btnBack').click( ()=> {
            $('#forwardedBalanceTable').removeClass('d-none');
            $('#forwardedBalanceCard').addClass('d-none'); 
            $('#editForwardedBalanceCard').addClass('d-none'); 
        });

        $('#update_btnBack').click( ()=> {
            $('#forwardedBalanceTable').removeClass('d-none');
            $('#forwardedBalanceCard').addClass('d-none'); 
            $('#editForwardedBalanceCard').addClass('d-none'); 
        });

        $(document).on('click', '.edit__leave__type', function () {
            leaveID = $(this).attr('data-id');
            let fbAsOF = $(this).attr('data-as-of-date');
            $('#forwardedBalanceTable').addClass('d-none');
            $('#editForwardedBalanceCard').removeClass('d-none'); 
            $('#btnViewTableContainer').removeClass('d-none');
            $('#empID').val(leaveID);

            // Ajax request for fetching leave type data.
            $.ajax({
                url : `/employee/leave-forwarded-balance/${leaveID}/edit`,
                success : function (leave) {
                    // Collect data of form fields.
                    $('#update_empPhoto').attr('src','/storage/employee_images/'+leave.employee_information.information.photo);
                    $('#update_employeeName').val(leave.employee_information.fullname);
                    $('#update_office').val(leave.employee_information.information.office.office_name);
                    $('#update_position').val(leave.employee_information.information.position.position_name);
                    leave.leaveRecord.forEach(function(data){
                        $('#update_asOf').val(data.fb_as_of);
                        if(data.leave_type_id == 2){
                            $('#update_vlEarned').val(data.earned);
                            $('#update_vlEnjoyed').val(data.used);
                            vlBalanceVal = parseFloat(data.earned - data.used).toFixed(3);
                            $('#update_vlBalance').val(vlBalanceVal);
                        }else{
                            $('#update_slEarned').val(data.earned);
                            $('#update_slEnjoyed').val(data.used);
                            slBalanceVal = parseFloat(data.earned - data.used).toFixed(3);
                            $('#update_slBalance').val(slBalanceVal);
                        }    
                    })
                     $('#update_total_lb').val((parseFloat(vlBalanceVal) + parseFloat(slBalanceVal)).toFixed(3));
                },
            });
        });

        $('#btnUpdate').click( (e)=> {
            e.preventDefault();

            employeeID = $('#empID').val();
            let update_asOf = $('#update_asOf').val();
            let update_vlEarned = $('#update_vlEarned').val();
            let update_vlEnjoyed = $('#update_vlEnjoyed').val();
            let update_slEarned = $('#update_slEarned').val();
            let update_slEnjoyed = $('#update_slEnjoyed').val();
            let errors = {};
            let filteredError = "";

            //Date Asof required
            if (update_asOf === "") {
                $('#update_asOf-error-message').html('');
                $('#update_asOf-error-message').append(`<span> Please select a date. </span>`);
                errors.update_asOf = true;
            } else {
                $('#update_asOf-error-message').html('');
                errors.update_asOf = false;
            }

            //VL Earned required
            if (update_vlEarned === "") {
                $('#update_vlEarned-error-message').html('');
                $('#update_vlEarned-error-message').append(`<span> Vacation Leave Earned is required. </span>`);
                errors.update_vlEarned = true;
            } else {
                $('#update_vlEarned-error-message').html('');
                errors.update_vlEarned = false;
            }

            //VL Used required
            if (update_vlEnjoyed === "") {
                $('#update_vlEnjoyed-error-message').html('');
                $('#update_vlEnjoyed-error-message').append(`<span> Vacation Leave Enjoyed is required. </span>`);
                errors.update_vlEnjoyed = true;
            } else {
                $('#update_vlEnjoyed-error-message').html('');
                errors.update_vlEnjoyed = false;
            }

            //SL Earned required
            if (update_slEarned === "") {
                $('#update_slEarned-error-message').html('');
                $('#update_slEarned-error-message').append(`<span> Sick Leave Earned is required. </span>`);
                errors.update_slEarned = true;
            } else {
                $('#update_slEarned-error-message').html('');
                errors.update_slEarned = false;
            }

            //SL Used required
            if (update_slEnjoyed === "") {
                $('#update_slEnjoyed-error-message').html('');
                $('#update_slEnjoyed-error-message').append(`<span> Sick Leave Enjoyed is required. </span>`);
                errors.update_slEnjoyed = true;
            } else {
                $('#update_slEnjoyed-error-message').html('');
                errors.update_slEnjoyed = false;
            }



            filteredError = Object.values(errors).filter((error) => error);

            // Check if the filtered error array variable has value or not.
            // if the length of this array is 0 this means that there is no error
            // or all fields that required is filled by the user.
            if (filteredError.length === 0) {
                let data = $('#editForwardedBalance').serialize();
                $.ajax({
                    url : `/employee/leave-forwarded-balance/${employeeID}`,
                    method : 'PUT',
                    data : data,
                    success : function (response) {
                        if(response.success){
                            swal("Good job!", "Successfully added!", "success").then((isClicked) => {
                                if(isClicked) {
                                    location.reload();
                                }
                            })
                        }
                    },
                });
                
            }
        });

        $(document).on('click', '#update_btnDelete', function () {
        leaveID = $('#empID').val();
        let fbAsOF = $('#update_asOf').val();
        swal({
            title: "Are you sure?",
            text : "You are about to delete a forwarded leave balance record",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            }).then((willDelete) => {
                if(willDelete) {
                    $.ajax({
                        url : `/employee/leave-forwarded-balance/${leaveID}`,
                        data: { fb_as_of : fbAsOF },
                        method : 'DELETE',
                        success : function (response) {
                             swal("Good job!", "Successfully delete a leave record.", "success").then((isClicked) => {
                                if(isClicked) {
                                    location.reload();
                                }
                            })
                        }
                    });
                }
            });
        });

        $(document).on('click', '.delete__leave__type', function () {
        leaveID = $(this).attr('data-id');
        let fbAsOF = $(this).attr('data-as-of-date');
        swal({
            title: "Are you sure?",
            text : "You are about to delete a forwarded leave balance record",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            }).then((willDelete) => {
                if(willDelete) {
                    $.ajax({
                        url : `/employee/leave-forwarded-balance/${leaveID}`,
                        data: { fb_as_of : fbAsOF },
                        method : 'DELETE',
                        success : function (response) {
                             swal("Good job!", "Successfully delete a leave record.", "success").then((isClicked) => {
                                if(isClicked) {
                                    location.reload();
                                }
                            })
                        }
                    });
                }
            });
        });
</script>
@endpush
@endsection
