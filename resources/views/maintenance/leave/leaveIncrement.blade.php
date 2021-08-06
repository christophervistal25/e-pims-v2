@extends('layouts.app')
@section('title', 'LEAVE INCREMENT')
@prepend('page-css')
<script src="{{ asset('/js/app.js') }}" defer></script>
<link rel="stylesheet" href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css"/>
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
    <div class="col-md-3">
        <div class="btn-group-vertical w-100">
            <button type="button" class="btn btn-lg btn-light text-left" id="sickNav">
                <div class="row">
                    <div class="col-md-2 my-auto">
                        <i class="fas fa-bed fa-2x text-primary"></i>
                    </div>
                    <div class="col-md-10 my-auto">
                        <h4 class="mb-0 ml-3">SL Increment Settings</h4>
                        <small class="text-muted mt-0 ml-3">Update Sick Increment Value</small>
                    </div>
                </div>
            </button>
            <button type="button" class="btn btn-lg btn-light text-left" id="vacationNav">
                <div class="row">
                    <div class="col-md-2 my-auto">
                        <i class="fas fa-suitcase fa-2x text-primary"></i>
                    </div>
                    <div class="col-md-10 my-auto">
                        <h4 class="mb-0 ml-3">VL Increment Settings</h4>
                        <small class="text-muted mt-0 ml-3">Update Vacation Increment Value</small>
                    </div>
                </div>
            </button>
        </div>  
    </div>  
    <div class="col-md-9">
        <div class="card shadow" id="sickIncrementCard" >
            <div class="card-body" >
                <div class="row">
                    <div class="col-md-12">
                        <h4>SICK LEAVE INCREMENT SETTINGS</h4>
                        <hr>
                        <form action="" method="POST" id="sickIncrement">
                            @csrf
                            <input type="hidden" class='form-control' name="sick_id" id="sick_id" value="{{ $sickIncrement->id }}">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="sick_increment" class="form-group has-float-label edit_availed">
                                        <input type="number" name="sick_increment" id="sick_increment" class="form-control w-50 border-0" 
                                            value="{{ $sickIncrement->increment }}" 
                                            readonly
                                            style="outline: none; box-shadow: 0px 0px 0px transparent; height: 80px; font-size:40px; background: white;">
                                        <span class="font-weight-bold">INCREMENT</span>
                                        <div class='text-danger' id="sick_increment__error__element"></div>
                                    </label>
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="sick_description" class="form-group has-float-label">
                                        <textarea id="sick_description" name="sick_description" rows="1" class="w-100 form-control border-0 pt-3" placeholder="Description" readonly
                                        style="outline: none; box-shadow: 0px 0px 0px transparent; font-size:18px; resize:none; background: white;"
                                        >{{ $sickIncrement->description }}</textarea>
                                        <span class="font-weight-bold">DESCRIPTION</span>
                                        <div class='text-danger' id="sick_description__error__element"></div>
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <button type="button" class="btn btn-primary rounded-pill w-25" id="btnSick"><i class="fa fa-edit"></i> UPDATE</button>
                            <button type="button" class="btn btn-primary rounded-pill w-25" id="btnSickSave"><i class="fa fa-save"></i> Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow" id="vacationIncrementCard">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12   ">
                        <h4>VACATION LEAVE INCREMENT SETTINGS</h4>
                        <hr>
                        <form action="" method="POST" id="vacationIncrement">
                            @csrf
                            <input type="hidden" class='form-control' name="vacation_id" id="vacation_id" value="{{ $vacationIncrement->id }}">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="vacation_increment" class="form-group has-float-label edit_availed">
                                        <input type="number" name="vacation_increment" id="vacation_increment" class="form-control w-50 border-0" 
                                            value="{{ $vacationIncrement->increment }}" 
                                            readonly
                                            style="outline: none; box-shadow: 0px 0px 0px transparent; height: 80px; font-size:40px; background: white;">
                                        <span class="font-weight-bold">INCREMENT</span>
                                        <div class='text-danger' id="vacation_increment__error__element"></div>
                                    </label>
                                </div>
                            </div>  

                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="vacation_description" class="form-group has-float-label">
                                        <textarea id="vacation_description" name="vacation_description" rows="1" class="w-100 form-control border-0 pt-3" placeholder="Description" readonly
                                        style="outline: none; box-shadow: 0px 0px 0px transparent; font-size:18px; background: white; resize:none;"
                                        >{{ $vacationIncrement->description }}</textarea>
                                        <span class="font-weight-bold">DESCRIPTION</span>
                                        <div class='text-danger' id="vacation_description__error__element"></div>
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <button type="button" class="btn btn-primary rounded-pill w-25" id="btnVacation"><i class="fa fa-edit"></i> UPDATE</button>
                            <button type="button" class="btn btn-primary rounded-pill w-25" id="btnVacationSave"><i class="fa fa-save"></i> Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
    </div>  
</div>

@push('page-scripts')
    <script>    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // TRANSITION OF FORM TO TABLE
        $(document).on('click', '#btnSick', function () {
            $('#btnSickSave').removeClass('d-none');
            $('#btnSick').addClass('d-none');
            $('#sick_increment').removeClass('border-0');
            $('#sick_description').removeClass('border-0');
            $('#sick_increment').removeAttr('readonly');
            $('#sick_description').removeAttr('readonly');
            $('#sick_description').attr('rows', 4);
        });

        $(document).on('click', '#btnSickSave', function () {
            let sick_id = $('#sick_id').val();
            let sick_increment = $('#sick_increment').val();
            let sick_description = $('#sick_description').val();
            let errors = {};
            let filteredError = "";

            //sick increment required
            if (sick_increment === "" || sick_increment === "0" ) {
                $('#sick_increment__error__element').html('');
                $('#sick_increment__error__element').append(`<span> <small> This field is required. It should not be 0. </small> </span>`);
                errors.sick_increment = true;
            } else {
                $('#sick_increment__error__element').html('');
                errors.sick_increment = false;
            }
                
            //Hours Rendered required
            if (sick_description === "" )  {
                $('#sick_description__error__element').html('');
                $('#sick_description__error__element').append(`<span> <small> This field is required. </small> </span>`);
                errors.sick_description = true;
            } else {
                $('#sick_description__error__element').html('');
                errors.sick_description = false;
            }

            filteredError = Object.values(errors).filter((error) => error);
            // Check if the filtered error array variable has value or not.
            // if the length of this array is 0 this means that there is no error
            // or all fields that required is filled by the user.
            if (filteredError.length === 0) {
                let data = $('#sickIncrement').serialize();
                $.ajax({
                    url : `/maintenance/leaveIncrement/${sick_id}`,
                    method : 'PUT',
                    data : data,
                    success : function (response) {
                        if(response.success){
                            swal("", "Settings successfully changed.", "success").then((isClicked) => {
                                if(isClicked) {
                                    $('#btnSickSave').addClass('d-none');
                                    $('#btnSick').removeClass('d-none');
                                    $('#sick_increment').addClass('border-0');
                                    $('#sick_description').addClass('border-0');
                                    $('#sick_increment').attr('readonly', true);
                                    $('#sick_description').attr('readonly', true);
                                    $('#sick_description').attr('rows', 1);
                                }
                            })
                        }
                    },
                });
            }

        });

        $(document).on('click', '#btnVacation', function () {
            $('#btnVacationSave').removeClass('d-none');
            $('#btnVacation').addClass('d-none');
            $('#vacation_increment').removeClass('border-0');
            $('#vacation_description').removeClass('border-0');
            $('#vacation_increment').removeAttr('readonly');
            $('#vacation_description').removeAttr('readonly');
            $('#vacation_description').attr('rows', 4);
        });

        $(document).on('click', '#btnVacationSave', function () {
            let vacation_id = $('#vacation_id').val();
            let vacation_increment = $('#vacation_increment').val();
            let vacation_description = $('#vacation_description').val();
            let errors = {};
            let filteredError = "";

            //sick increment required
            if (vacation_increment === "" || vacation_increment === "0" ) {
                $('#vacation_increment__error__element').html('');
                $('#vacation_increment__error__element').append(`<span> <small> This field is required. It should not be 0. </small> </span>`);
                errors.vacation_increment = true;
            } else {
                $('#vacation_increment__error__element').html('');
                errors.vacation_increment = false;
            }
                
            //Hours Rendered required
            if (vacation_description === "" )  {
                $('#vacation_description__error__element').html('');
                $('#vacation_description__error__element').append(`<span> <small> This field is required. </small> </span>`);
                errors.vacation_description = true;
            } else {
                $('#vacation_description__error__element').html('');
                errors.vacation_description = false;
            }

            filteredError = Object.values(errors).filter((error) => error);
            // Check if the filtered error array variable has value or not.
            // if the length of this array is 0 this means that there is no error
            // or all fields that required is filled by the user.
            if (filteredError.length === 0) {
                let data = $('#vacationIncrement').serialize();
                $.ajax({
                    url : `/maintenance/leaveIncrement/${vacation_id}`,
                    method : 'PUT',
                    data : data,
                    success : function (response) {
                        if(response.success){
                            swal("", "Settings successfully changed.", "success").then((isClicked) => {
                                if(isClicked) {
                                    $('#btnVacationSave').addClass('d-none');
                                    $('#btnVacation').removeClass('d-none');
                                    $('#vacation_increment').addClass('border-0');
                                    $('#vacation_description').addClass('border-0');
                                    $('#vacation_increment').attr('readonly', true);
                                    $('#vacation_description').attr('readonly', true);
                                    $('#vacation_description').attr('rows', 1);
                                }
                            })
                        }
                    },
                });
            }
            
        });

        $(document).on('click', '#sickNav', function () {
           $('#sickIncrementCard').removeClass('d-none');
           $('#vacationIncrementCard').addClass('d-none');
           $('#sickNav').addClass('active');
           $('#vacationNav').removeClass('active');
        });

        $(document).on('click', '#vacationNav', function () {
           $('#sickIncrementCard').addClass('d-none');
           $('#vacationIncrementCard').removeClass('d-none');
           $('#sickNav').removeClass('active');
           $('#vacationNav').addClass('active');
        });
        
        $(document).ready( function () {
            $('#btnSickSave').addClass('d-none');
            $('#btnVacationSave').addClass('d-none');
            $('#vacationIncrementCard').addClass('d-none');
            $('#sickNav').addClass('active');
        });

        
    </script>
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
    <script src="/assets/js/jquery.dataTables.min.js"></script>
    <script src="/assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/js/custom.js') }}"></script>
    <script src="/assets/js/sweetalert.min.js"></script>
    
@endpush
@endsection
