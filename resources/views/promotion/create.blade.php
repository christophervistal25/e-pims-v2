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
@endif
<div class="card rounded-0 shadow-none">
    <div class="card-body">
        <form action="{{ route('promotion.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-10">
                    <label class='text-uppercase h6'>Employee Name</label>
                    <select data-style="{{ $errors->has('employee') ? 'border-danger' : 'border form-select' }}" class="form-control form-control-xs selectpicker"
                        name="employee" data-live-search="true" id="employee" data-size="5">
                        <option value=""></option>
                        @foreach($employees as $employee)
                            <option data-fullname="{{ $employee->fullname }}" value="{{ $employee->Employee_id }}">{{ $employee->fullname }}</option>
                        @endforeach
                    </select>
                    @error('employee')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-lg-2">
                    <label class='text-uppercase h6'>Employee ID</label>
                    <input type="text" id="employeeID" class='form-control' readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <label class='text-uppercase h6'>Office</label>
                    <select data-style="{{ $errors->has('office') ? 'border-danger' : 'border form-select' }}" class="form-control form-control-xs selectpicker"
                        name="office" data-live-search="true" id="office" data-size="5">
                        <option value=""></option>
                        @foreach($offices as $office)
                        <option value="{{ $office->office_code }}">{{ $office->office_name }}</option>
                        @endforeach
                    </select>
                    @error('office')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-6">
                    <label class='text-uppercase h6'>Position</label>
                    <select data-style="{{ $errors->has('position') ? 'border-danger' : 'border form-select' }}" class="form-control form-control-xs selectpicker"
                        name="position" data-live-search="true" id="position" data-size="5">
                    </select>
                    @error('position')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>




            </div>

            <div class="row">
                <div class="col-lg-3">
                    <label class='text-uppercase h6'>Division</label>
                    <input type="text" id="division" class="form-control form-control-xs border {{  $errors->has('division') ? 'is-invalid' : '' }}" name="division" readonly>
                    @error('division')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-lg-3">
                    <label class='text-uppercase h6'>Section</label>
                    <input class="form-control form-control-xs bordedr {{ $errors->has('section') ? 'is-invalid' : '' }}" name="section" id="section" readonly />
                    @error('section')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-lg-6">
                    <label class='text-uppercase h6'>Status</label>
                    <input class="form-control form-control-xs {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" readonly>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <label class='text-uppercase h6'>Item No</label>
                    <input type="text" class='form-control form-control-xs {{ $errors->has('item_no') ? 'is-invalid' : '' }}' name="item_no" id="item_no" readonly>
                    @error('item_no')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-lg-6">
                    <label class='text-uppercase h6'>Current Item No</label>
                    <div class="input-group mb-3">
                        <input type="text" class='form-control form-control-xs {{ $errors->has('old_item_no') ? 'is-invalid' : '' }}' name="old_item_no" id="old_item_no"
                            readonly>
                        <div class="input-group-append">
                            <button class="btn btn-primarys d-none" id="btnViewOldItem" type="button">
                                <i class='fas fa-eye'></i>
                            </button>
                        </div>
                    </div>
                    @error('old_item_no')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-lg-3">
                    <label class='text-uppercase h6'>Current Salary Grade Year</label>
                    <input type="text" class='form-control form-control-xs {{ $errors->has('current_salary_grade_year') ? 'is-invalid' : '' }}' name="current_salary_grade_year"
                        id="current_salary_grade_year" readonly value="{{ date('Y') }}">
                    @error('current_salary_grade_year')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-lg-3">
                    <label class='text-uppercase h6'>Salary Grade</label>
                    <input type="text" class='form-control form-control-xs {{ $errors->has('salary_grade') ? 'is-invalid' : '' }}' name="salary_grade" id="salary_grade"
                        readonly>
                    @error('salary_grade')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-lg-3">
                    <label class='text-uppercase h6'>Steps</label>
                    <input class='form-control form-control-xs {{ $errors->has('step') ? 'is-invalid' : '' }}' name="step" id="step" readonly>
                    @error('step')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-lg-3">
                    <label class='text-uppercase h6'>Salary Amount</label>
                    <input type="text" class='form-control form-control-xs {{ $errors->has('salary_amount')  ? 'is-invalid' : '' }}' name="salary_amount" id="salary_amount"
                        readonly>
                    @error('salary_amount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <label class='text-uppercase h6'>Original Appointment</label>
                    <input type="date" id="original_appointment" class='form-control form-control-xs {{ $errors->has('original_appointment') ? 'is-invalid' : '' }}' name="original_appointment">
                    @error('original_appointment')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-lg-6">
                    <label class='text-uppercase h6'>Last Promotion</label>
                    <input type="date" class='form-control form-control-xs {{ $errors->has('last_promotion') ? 'is-invalid' : '' }}' name="last_promotion" id="last_promotion">
                    @error('last_promotion')
                        <span class='text-danger'>{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <label class='text-uppercase h6'>Area Code</label>
                    <input type="text" class="form-control" name="area_code" id="area_code" readonly>
                    @error('area_code')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-lg-4">
                    <label class='text-uppercase h6'>Area Type</label>
                    <input type="text" class="form-control" name="area_type" id="area_type" readonly>
                    @error('area_type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-lg-4">
                    <label class='text-uppercase h6'>Area level</label>
                    <input type="text" class="form-control" name="area_level" id="area_level" readonly>
                    @error('area_level')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="float-right mt-3">
                <button class='btn btn-primarys' type="submit">
                    <i class="las la-folder-plus"></i>
                    Submit Promotion
                </button>
            </div>
        </form>
    </div>


    <!-- View Old Item Modal -->
    <div class="modal fade" id="oldItemModal" tabindex="-1" role="dialog" aria-labelledby="oldItemModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title h6 text-uppercase" id="oldItemModalTitle"></p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <table class='table table-bordered'>
                              <thead>
                                    <tr>
                                          <th>POSITION TITLE</th>
                                          <th>OFFICE</th>
                                          <th>ITEM NO</th>
                                          <th>STATUS</th>
                                          <th>YEAR</th>
                                    </tr>
                              </thead>
                              <tbody id='employee-current-plantilla-container'></tbody>
                        </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@push('page-scripts')
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    let employeePlantilla = {};

    $('#employee').change(function () {
        let employeeID = $(this).val();
        if(employeeID) {
            $('#employeeID').val(employeeID);
        } else {
            $('#employeeID').val('');
        }
    });

    $('#office').change(function () {
        let office = $(this).val();
        if (office) {
            // $.get({
            //     url: `/api/division-by-office/${office}`,
            //     success: function (response) {
            //         $('#division').children().remove();
            //         response.divisions.forEach((division) => $(`#division`).append(
            //             `<option value="${division.division_id}">${division.division_name}</option>`
            //         ));
            //     }
            // });

            $.get({
                url: `/api/office-plantilla-positions/${office}`,
                success: function (response) {
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

    $('#position').change(function () {
        let selectedEmployee = $('#employeeID').val();
        let plantillaPositionID = $(this).val();
        if (plantillaPositionID) {
            $.get({
                url: `/api/plantilla-position-details/${plantillaPositionID}`,
                success: function (response) {
                    $('#division').val(response?.division?.division_name || '');
                    $('#section').val(response?.section?.section_name || '');
                    $('#status').val(response?.plantillas?.status);
                    $('#item_no').val(response.item_no);
                    $('#old_item_no').val(response?.plantillas.item_no);
                    $('#original_appointment').val(response?.plantillas.date_original_appointment);
                    $('#last_promotion').val(response?.plantillas.date_last_promotion);
                    $('#current_salary_grade_year').val(response?.plantillas?.year);
                    $('#salary_grade').val(response?.plantillas.sg_no);
                    $('#salary_amount').val(response?.plantillas.salary_amount);
                    $('#step').val(response?.plantillas.step_no);
                    $('#area_code').val(`${response?.area_code.area_code_id} - ${response.area_code.description}`)
                    $('#area_type').val(`${response?.area_type.area_type_id} - ${response.area_type.description}`)
                    $('#area_level').val(`${response?.area_level.area_level_id} - ${response.area_level.description}`)
                    $('#btnViewOldItem').removeClass('d-none');
                    employeePlantilla = response;
                }
            });
        } else {
            $('#division').val('');
            $('#section').val('');
            $('#status').val('');
            $('#item_no').val('');
            $('#old_item_no').val('');
            $('#original_appointment').val('');
            $('#last_promotion').val('');
            $('#current_salary_grade_year').val('');
            $('#salary_grade').val('');
            $('#salary_amount').val('');
            $('#step').val('');
            $('#area_code').val('')
            $('#area_type').val('')
            $('#area_level').val('')
            $('#btnViewOldItem').addClass('d-none');
        }

    });

    $('#step').change(function () {
        let grade = $('#salary_grade').val();
        let year = $('#current_salary_grade_year').val();
        let step = $('#step').val() || 1;

        $.ajax({
            url: `/api/salary-amount/${grade}/${step}/${year}`,
            success: function (salary_amount) {
                $('#salary_amount').val(salary_amount);
            }
        });
    });

    $('#btnViewOldItem').click(function () {
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
