@extends('layouts.app')
@section('title', 'Leave Forwarded Balance')
@prepend('page-css')
{{-- <script src="{{ asset('/js/app.js') }}" defer></script> --}}
<link rel="stylesheet"
    href="{{ asset('assets/css/custom.css') }}" />
<link rel="stylesheet"
    href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />
<link rel="stylesheet"
    href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
<style>
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
                            <button id="addBtn" type="button" class="btn btn-warning float-right shadow"><i class="la la-plus"></i>&nbsp
                                Add Forwarded Balance </button> 
                        </div>
                    </div>
                    <div class="table" style="overflow-x:auto;">
                        <table class="table table-bordered text-center" id="step-increment-table" style="width:100%;">
                            <thead>
                                <tr>
                                    <th class="font-weight-bold align-middle text-center" rowspan="2">Employee ID</th>
                                    <th class="font-weight-bold align-middle text-center" rowspan="2">Employee Name</th>
                                    <th class="font-weight-bold align-middle text-center" rowspan="2">As Of</th>
                                    <th class="font-weight-bold align-middle text-center" rowspan="1 " colspan="3">Vacation Leave</th>
                                    <th class="font-weight-bold align-middle text-center" rowspan="1" colspan="3">Sick Leave</th>
                                    <th class="font-weight-bold align-middle text-center" rowspan="2" >Balance Leave Credits</th>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold align-middle text-center">Earned</td>
                                    <td class="font-weight-bold align-middle text-center">Enjoyed</td>
                                    <td class="font-weight-bold align-middle text-center">Balance</td>
                                    <td class="font-weight-bold align-middle text-center">Earned</td>
                                    <td class="font-weight-bold align-middle text-center">Enjoyed</td>
                                    <td class="font-weight-bold align-middle text-center">Balance</td>
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
                                            <td>{{ $employeeFullname }}</td>
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

                                            <td>{{ $totalBalance }}</td>
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
        <div class="row align-items-right mb-2 ">
            <div class="col-auto float-right ml-auto d-none" id="btnViewTableContainer">
                <button type="button" class="btn btn-primary float-right shadow"><i class='la la-list'></i>&nbsp View Table</button> 
            </div>
        </div>
        <div class="card shadow d-none" id="forwardedBalanceCard">
            <div class="card-body">
            <form action="{{ route('leave-monitoring.store') }}" method="POST" id="forwardedBalance">
                    @csrf
                <div class="alert alert-secondary text-center font-weight-bold">LEAVE FORWARDED BALANCE</div>
                <hr>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <div class="spinner-border spinner-border-sm text-light d-none" id="save-spinner" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <img class="mb-5 rounded-circle img-thumbnail" id="empPhoto" src="/storage/employee_images/no-image.png" width="55%" />
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
                    <div class="col-lg-8">
                        <div class="card shadow">
                            <div class="card-body">
                                 <label for="asOf" class="form-group has-float-label">
                                    <input type="date" name="asOf" id="asOf" class="form-control"
                                        style="outline: none; box-shadow: 0px 0px 0px transparent; height:50px; font-weight:bold; font-size:20px;" >
                                    <span class="font-weight-bold">As of</span>
                                    <div id="asOf-error-message" class="text-danger text-sm">
                                    </div>
                                </label>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h6 class="text-sm text-center">VACATION LEAVE</h6>
                                        <label for="vlEarned" class="form-group has-float-label">
                                            <input type="number" class="form-control" id="vlEarned" name="vlEarned"
                                                style="outline: none; box-shadow: 0px 0px 0px transparent; height:60px; font-weight:bold; font-size:30px;" >
                                            <span><strong>VL EARNED</strong></span>
                                            <div id="vlEarned-error-message" class="text-danger text-sm"></div>
                                        </label>
                                        <label for="vlEnjoyed" class="form-group has-float-label">
                                            <input type="number" class="form-control" id="vlEnjoyed" name="vlEnjoyed"
                                                style="outline: none; box-shadow: 0px 0px 0px transparent; height:60px; font-weight:bold; font-size:30px;" >
                                            <span><strong>VL ENJOYED</strong></span>
                                            <div id="vlEnjoyed-error-message" class="text-danger text-sm"></div>
                                        </label>
                                        <label for="vlBalance" class="form-group has-float-label">
                                            <input type="number" class="form-control" id="vlBalance" name="vlBalance" readonly
                                                style="outline: none; box-shadow: 0px 0px 0px transparent; height:60px; font-weight:bold; font-size:30px;">
                                            <span><strong>VL BALANCE</strong></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <h6 class="text-sm text-center">SICK LEAVE</h6>
                                        <label for="slEarned" class="form-group has-float-label">
                                            <input type="number" id="slEarned" class="form-control" name="slEarned"
                                                style="outline: none; box-shadow: 0px 0px 0px transparent; height:60px; font-weight:bold; font-size:30px;" >
                                            <span><strong>SL EARNED</strong></span>
                                            <div id="slEarned-error-message" class="text-danger text-sm"></div>
                                        </label>
                                        <label for="slEnjoyed" class="form-group has-float-label">
                                            <input type="number" class="form-control" id="slEnjoyed" name="slEnjoyed"
                                                style="outline: none; box-shadow: 0px 0px 0px transparent; height:60px; font-weight:bold; font-size:30px;" >
                                            <span><strong>SL ENJOYED</strong></span>
                                            <div id="slEnjoyed-error-message" class="text-danger text-sm"></div>
                                        </label>
                                        <label for="slBalance" class="form-group has-float-label">
                                            <input type="number" class="form-control" id="slBalance" name="slBalance" readonly
                                                style="outline: none; box-shadow: 0px 0px 0px transparent; height:60px; font-weight:bold; font-size:30px;" >
                                            <span><strong>SL BALANCE</strong></span>
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <label for="total_lb" class="form-group has-float-label">
                                    <input type="number" name="total_lb" id="total_lb" class="form-control"
                                        style="outline: none; box-shadow: 0px 0px 0px transparent; height:70px; font-weight:bold; font-size:40px;" disabled>
                                    <span><strong>Total VL - SL</strong></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-6">
                                <button type="submit" class="text-white shadow btn btn-lg btn-success w-100 ml-1" id="btnSave"><i class="lar la-save"></i> Add
                                Record</button>
                            </div>
                            <div class="col-lg-6">
                                <button type="button" class="text-white shadow btn btn-lg btn-warning w-100 ml-1"><i
                                    class="las la-ban"></i> Cancel Record</button>
                            </div>
                        </div>
                    </div>
                </div>  
            <form>
            </div>
        </div>
    </div>
</div>

@push('page-scripts')
<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
 
    vlBalance.value = 0;
    slBalance.value = 0;
    total_lb.value = 0;

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
                let data = $('#forwardedBalance').serialize();
                $.ajax({
                    url : '/employee/leave-forwarded-balance',
                    method : 'POST',
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

         // TRANSITION OF FORM TO TABLE
        $('#addBtn').click( ()=> {
            $('#forwardedBalanceTable').addClass('d-none');
            $('#forwardedBalanceCard').removeClass('d-none'); 
            $('#btnViewTableContainer').removeClass('d-none');

        });

        // DISPLAY TABLE
        $('#btnViewTableContainer').click( ()=> {
             $('#forwardedBalanceTable').removeClass('d-none');
            $('#forwardedBalanceCard').addClass('d-none'); 
           $('#btnViewTableContainer').addClass('d-none');
        });
</script>
@endpush
@endsection
