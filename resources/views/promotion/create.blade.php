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

            <div class="row px-4 mt-2">
                <div class="col-lg-4">
                    <label class="text-uppercase">Date Promotion</label>
                    <input type="date" class="form-control form-control-xs" name="date_promotion">
                </div>

                <div class="col-lg-4">
                    <label class="text-uppercase">Employee Name</label>
                    <select data-style="{{ $errors->has('employee') ? 'border-danger' : 'border form-select' }}" class="form-control form-control-xs selectpicker" name="employee" data-live-search="true" id="employee" data-size="15">
                        <option value=""></option>
                        @foreach($employees as $employee)
                        <option data-fullname="{{ $employee->fullname }}" value="{{ $employee->Employee_id }}">{{ $employee->fullname }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-lg-4">
                    <label class="text-uppercase">Employee ID</label>
                    <input type="text" class="form-control" name="employee_id" id="employee_id" readonly>
                </div>
            </div>

            <div class="py-3 bg-light my-4 border-bottom border-top">
                <span class="px-3 font-weight-bold">
                    CURRENT PLANTILLA
                </span>
            </div>

            <div class="row px-4 mb-3">
                <div class="col-lg-6">
                    <label class="text-uppercase">Office</label>
                    <input type="text" class="form-control" id="current_office" readonly>
                </div>

                <div class="col-lg-6">
                    <label class="text-uppercase">Position</label>
                    <input type="text" class="form-control"  id="current_position" readonly>
                </div>
            </div>

            <div class="row px-4 mb-3">
                <div class="col-lg-1">
                    <label class="text-uppercase">Item No</label>
                    <input type="text" class="form-control text-center" name="old_item_no"  id="current_item_no" readonly>
                </div>

                <div class="col-lg-2">
                    <label class="text-uppercase">Salary Grade Year</label>
                    <input type="text" class="form-control text-center"  id="current_salary_grade_year" readonly>
                </div>

                <div class="col-lg-3">
                    <label class="text-uppercase">Salary Grade</label>
                    <input type="text" class="form-control text-center" id="current_salary_grade" readonly>
                </div>

                <div class="col-lg-3">
                    <label class="text-uppercase">Step</label>
                    <input type="text" class="form-control text-center"  id="current_step" readonly>
                </div>

                <div class="col-lg-3">
                    <label class="text-uppercase">Salary Amount</label>
                    <input type="text" class="form-control text-center" id="current_salary_amount" readonly>
                </div>

            </div>

            <div class="py-3 bg-light my-4 border-bottom border-top">
                <span class="px-3 font-weight-bold">
                    NEW PLANTILLA
                </span>
            </div>

            <div class="row px-4 mb-3">
                <div class="col-lg-6">
                    <label class="text-uppercase">Office</label>
                    <select name="office" id="office" class="form-control selectpicker" data-live-search="true" data-size="5">
                        <option value=""></option>
                        @foreach($offices as $office)
                        <option value="{{ $office->office_code }}">{{ $office->office_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-lg-6">
                    <label class="text-uppercase">Position</label>
                    <select name="position" id="position" class="form-control selectpicker" data-live-search="true" data-size="5">
                    </select>
                </div>
            </div>

            <div class="row px-4 mb-3">
                <div class="col-lg-1">
                    <label class="text-uppercase">Item No</label>
                    <input type="text" class="form-control text-center" name="item_no" id="item_no" readonly>
                </div>

                <div class="col-lg-2">
                    <label class="text-uppercase">Salary Grade Year</label>
                    <input type="text" class="form-control text-center" name="salary_grade_year" id="salary_grade_year">
                </div>

                <div class="col-lg-3">
                    <label class="text-uppercase">Salary Grade</label>
                    <input type="text" class="form-control text-center" name="salary_grade" id="salary_grade">
                </div>

                <div class="col-lg-3">
                    <label class="text-uppercase">Step</label>
                    <select class="form-control" name="step" id="step">
                        @foreach(range(1, 8) as $step)
                        <option value="{{ $step }}">{{ $step }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-lg-3">
                    <label class="text-uppercase">Salary Amount</label>
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
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    let employeePlantilla = {};

    $('#employee').change(function() {
        let employeeID = $(this).val();
        if (employeeID) {
            axios(`/api/personnel-get-current-plantilla/${employeeID}`).then((response) => {
                $('#employee_id').val(employeeID);
                $('#current_salary_amount').val(response.data.salary_amount);
                $('#current_step').val(response.data.step_no || 1);
                $('#current_salary_grade').val(response.data.sg_no);
                $('#current_salary_grade_year').val(response.data.year);
                $('#current_item_no').val(response.data.item_no);
                $('#current_position').val(response.data.plantilla_positions.position.Description);
                $('#current_office').val(response.data.plantilla_positions.office.office_name);
            });
        }
    });

    $('#office').change(function() {
        let office = $(this).val();
        if (office) {
            $.get({
                url: `/api/office-plantilla-positions/${office}`
                , success: function(response) {
                    $('#position').children().remove();
                    $('#position').append(`<option value=""></option>`);
                    response.positions.forEach((position) => $(`#position`).append(
                        `<option value="${position.pp_id}">${position.position.Description}</option>`
                    ));
                    $('#position').selectpicker('refresh');
                }
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
            $.get({
                url: `/api/plantilla-position-details/${plantillaPositionID}`
                , success: function(response) {
                    $('#item_no').val(response.item_no);
                    $('#salary_grade_year').val(response.plantillas.year);
                    $('#salary_grade').val(response.plantillas.sg_no);
                    $('#salary_amount').val(response.plantillas.salary_amount);
                    $('#step').val(response.plantillas.step_no);
                }
            });
        } else {
            $('#status').val('');
            $('#item_no').val('');
            $('#salary_grade_year').val('');
            $('#salary_grade').val('');
            $('#salary_amount').val('');
            $('#step').val('');
        }

    });

    $('#step').change(function() {
        let grade = $('#salary_grade').val();
        let year = $('#current_salary_grade_year').val();
        let step = $('#step').val() || 1;

        $.ajax({
            url: `/api/salary-amount/${grade}/${step}/${year}`
            , success: function(salary_amount) {
                $('#salary_amount').val(salary_amount);
            }
        });
    });

    $('#btnViewOldItem').click(function() {
        if (employeePlantilla) {
            $('#oldItemModal').modal('toggle');
            let selectedEmployeeID = $('#employee').val();
            let selectedEmployeeFullname = $('#employee').find(":selected").attr('data-fullname');
            $('#oldItemModalTitle').html(`<strong>${selectedEmployeeID} - ${selectedEmployeeFullname}</strong> Current Plantilla`);

            $('#employee-current-plantilla-container').html(``).append(`
                  <tr>
                        <td>${employeePlantilla?.position?.Description || ''}</td>
                        <td>${employeePlantilla?.office?.office_name || ''}</td>
                        <td>${employeePlantilla.item_no || ''}</td>
                        <td>${employeePlantilla?.plantillas?.status || ''}</td>
                        <td>${employeePlantilla?.plantillas?.year || ''}</td>
                  </tr>
            `);
        }
    });

</script>
@endpush
@endsection
