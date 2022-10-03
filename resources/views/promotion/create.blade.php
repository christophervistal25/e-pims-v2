@extends('layouts.app')
@section('title', 'Add New Promotion')
@prepend('page-css')
<link rel="stylesheet" href="/assets/css/style.css" />
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
    .btn-primarys {
        background-color: #FF9B44;
        color: white;
    }

    .btn-primarys:hover {
        background-color: #FF8544;
        color: white;
    }

    input:-moz-read-only {
        background-color: #f2f3f194 !important;
        border-color: #e9ecef !important;
        cursor : not-allowed !important;
    }

    input:read-only {
        background-color: #f2f3f194 !important;
        border-color: #e9ecef !important;
        cursor : not-allowed !important;
    }

    .bootstrap-select .dropdown-toggle:focus, .bootstrap-select>select.mobile-device:focus+.dropdown-toggle {
        outline: none !important;
    }


</style>
@endprepend
@section('content')
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@else

@endif
<div class="card rounded-0 shadow-none">
    <div class="card-body p-0">
        <form method="POST" action="{{ route('promotion.store') }}">
            @csrf
            <div class="p-3">
                <img src="{{
                    asset('/assets/img/placeholder.jpg')
                }}" width="300px" height="300px" id="employeeImage" class="border img-responsive border-default float-right rounded cursor-pointer d-md-none d-lg-block" height="360px" />
            </div>
            <div class="row px-4 mt-2">
                <div class="col-lg-4">
                    <label class="text-capitalize h5 font-weight-medium">Date Promotion</label>
                    <input type="date" class="form-control form-control-xs" name="date_promotion" value="{{ date('Y-m-d') }}">
                </div>

                <div class="col-lg-4">
                    <label class="text-capitalize h5 font-weight-medium">Employee ID</label>
                    <input type="text" class="form-control" name="employee_id" id="employee_id" readonly>
                </div>

                <div class="col-lg-4">
                    <label class="text-capitalize h5 font-weight-medium">Employee</label>
                    <select data-style="btn-primary text-white border-light {{ $errors->has('employee') ? 'border-danger' : 'border form-select' }}" class="form-control form-control-xs selectpicker" name="employee" data-live-search="true" id="employee" data-size="15">
                        <option value=""></option>
                        @foreach($employees as $employee)
                        <option data-fullname="{{ $employee->fullname }}" value="{{ $employee->Employee_id }}">{{ $employee->fullname }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="py-3 bg-light my-4 border-bottom border-top" style="width : 80vw;">
                <span class="px-3 font-weight-medium">
                    CURRENT PLANTILLA
                </span>
            </div>

            <div class="row px-4 mb-3">
                <div class="col-lg-6">
                    <label class="text-capitalize h5 font-weight-medium">Office</label>
                    <input type="text" class="form-control" id="current_office" readonly>
                </div>

                <div class="col-lg-6">
                    <label class="text-capitalize h5 font-weight-medium">Position</label>
                    <input type="text" class="form-control"  id="current_position" readonly>
                </div>
            </div>

            <div class="row px-4 mb-3">
                <div class="col-lg-1">
                    <label class="text-capitalize h5 font-weight-medium">Item No</label>
                    <input type="text" class="form-control text-center" name="old_item_no"  id="current_item_no" readonly>
                </div>

                <div class="col-lg-2">
                    <label class="text-capitalize h5 font-weight-medium">Salary Grade Year</label>
                    <input type="text" class="form-control text-center"  id="current_salary_grade_year" name="current_salary_grade_year" readonly>
                </div>

                <div class="col-lg-3">
                    <label class="text-capitalize h5 font-weight-medium">Salary Grade</label>
                    <input type="text" class="form-control text-center" id="current_salary_grade" readonly>
                </div>

                <div class="col-lg-3">
                    <label class="text-capitalize h5 font-weight-medium">Step</label>
                    <input type="text" class="form-control text-center"  id="current_step" readonly>
                </div>

                <div class="col-lg-3">
                    <label class="text-capitalize h5 font-weight-medium">Salary Amount</label>
                    <input type="text" class="form-control text-center" id="current_salary_amount" readonly>
                </div>

            </div>

            <div class="py-3 bg-light my-4 border-bottom border-top">
                <span class="px-3 font-weight-medium">
                    NEW PLANTILLA
                </span>
            </div>

            <div class="row px-4">
                <div class="col-lg-6">
                    <label class="text-capitalize h5 font-weight-medium">Office</label>
                    <select data-style="btn-primary text-white border-light outline-none" name="office" id="office" class="form-control selectpicker" data-live-search="true" data-size="5">
                        <option value=""></option>
                        @foreach($offices as $office)
                        <option value="{{ $office->office_code }}">{{ $office->office_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-lg-6">
                    <label class="text-capitalize h5 font-weight-medium">Position</label>
                    <select data-style="btn-primary text-white border-light" name="position" id="position" class="form-control selectpicker" data-live-search="true" data-size="5">
                        <option value=""></option>
                    </select>
                </div>
            </div>

            <div class="row px-4 mb-3">
                <div class="col-lg-1">
                    <label class="text-capitalize h5 font-weight-medium">Item No</label>
                    <input type="text" class="form-control text-center border" name="item_no" id="item_no" readonly>
                </div>

                <div class="col-lg-2">
                    <label class="text-capitalize h5 font-weight-medium">Salary Grade Year</label>
                    <input type="text" class="form-control text-center" readonly name="salary_grade_year" id="salary_grade_year">
                </div>

                <div class="col-lg-3">
                    <label class="text-capitalize h5 font-weight-medium">Salary Grade</label>
                    <input type="text" class="form-control text-center"  readonly name="salary_grade" id="salary_grade">
                </div>

                <div class="col-lg-3">
                    <label class="text-capitalize h5 font-weight-medium">Step</label>
                    <input type="text" class="form-control text-center" readonly name="step" id="step" >
                </div>

                <div class="col-lg-3">
                    <label class="text-capitalize h5 font-weight-medium">Salary Amount</label>
                    <input type="text" class="form-control text-center" readonly name="salary_amount" id="salary_amount">
                </div>

            </div>

            <div class="px-4">
                <div class="float-right">
                    <button class='btn btn-primarys' type="submit">
                        <i class="las la-folder-plus"></i>
                        Submit Promotion
                    </button>
                </div>
                <br>
                <br>
            </div>
        </form>
    </div>
</div>
@push('page-scripts')
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="{{ asset('js/axios.min.js') }}"></script>
<script>
    $('#employee').change(function() {
        let employeeID = $(this).val();
        console.log(employeeID);
        if (employeeID) {
            axios(`/api/personnel-get-current-plantilla/${employeeID}`).then((response) => {
                $('#employee_id').fadeOut(200).fadeIn(200).val(employeeID);
                $('#current_salary_amount').fadeOut(200).fadeIn(200).val(response.data.salary_amount);
                $('#current_step').fadeOut(200).fadeIn(200).val(response.data.step_no || 1);
                $('#current_salary_grade').fadeOut(200).fadeIn(200).val(response.data.sg_no);
                $('#current_salary_grade_year').fadeOut(200).fadeIn(200).val(response.data.year);
                $('#current_item_no').fadeOut(200).fadeIn(200).val(response.data.item_no);
                $('#current_position').fadeOut(200).fadeIn(200).val(response.data.plantilla_positions.position.Description);
                $('#current_office').fadeOut(200).fadeIn(200).val(response.data.plantilla_positions.office.office_name);
                $('#employeeImage').fadeOut(200).fadeIn(200).attr('src', `/assets/img/profiles/${employeeID}.jpg`)
            });
        } else {
            $('#employeeImage').fadeOut(200).fadeIn(200).attr('src', `/assets/img/placeholder.jpg`)
            $('#employee_id').fadeOut(200).fadeIn(200).val('');
            $('#current_salary_amount').fadeOut(200).fadeIn(200).val('');
            $('#current_step').fadeOut(200).fadeIn(200).val('');
            $('#current_salary_grade').fadeOut(200).fadeIn(200).val('');
            $('#current_salary_grade_year').fadeOut(200).fadeIn(200).val('');
            $('#current_item_no').fadeOut(200).fadeIn(200).val('');
            $('#current_position').fadeOut(200).fadeIn(200).val('');
            $('#current_office').fadeOut(200).fadeIn(200).val('');
        }
    });

    $('#office').change(function() {
        let office = $(this).val();
        if (office) {
            axios(`/api/office-plantilla-positions/${office}`).then((response) => {
                $('#position').children().remove();
                $('#position').append(`<option value=""></option>`);
                response.data.positions.forEach((position) => $(`#position`).append(`<option value="${position.pp_id}">${position.position.Description}</option>`));
                $('#position').selectpicker('refresh');
            });
        } else {
            $('#division').children().remove();
            $('#position').children().remove()
            $('#position').selectpicker('refresh').trigger('change');
        }
    });

    $('#position').change(function() {
        let selectedEmployee = $('#employeeID').val();
        let plantillaPositionID = $(this).val();
        if (plantillaPositionID) {
            axios(`/api/plantilla-position-details/${plantillaPositionID}`).then((response) => {
                $('#item_no').fadeOut(200).fadeIn(200).val(response.data.item_no);
                    $('#salary_grade_year').fadeOut(200).fadeIn(200).val(response.data.plantillas.year);
                    $('#salary_grade').fadeOut(200).fadeIn(200).val(response.data.plantillas.sg_no);
                    $('#salary_amount').fadeOut(200).fadeIn(200).val(response.data.plantillas.salary_amount);
                    $('#step').fadeOut(200).fadeIn(200).val(response.data.plantillas.step_no);
            });
        } else {
            $('#status').fadeOut(200).fadeIn(200).val('');
            $('#item_no').fadeOut(200).fadeIn(200).val('');
            $('#salary_grade_year').fadeOut(200).fadeIn(200).val('');
            $('#salary_grade').fadeOut(200).fadeIn(200).val('');
            $('#salary_amount').fadeOut(200).fadeIn(200).val('');
            $('#step').fadeOut(200).fadeIn(200).val('');
        }

    });

</script>
@endpush
@endsection
