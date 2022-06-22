@extends('layouts.app')
@section('title', 'Add New Promotion')
@prepend('page-css')
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
<div class="card">
      <div class="card-body">
            <form action="{{ route('promotion.store') }}" method="POST">
                  @csrf
                  <div class="row">
                        <div class="col-lg-10">
                              <label>Employee Name</label>
                              <select data-style="btn-primarys text-white" class="form-control form-control-xs selectpicker" name="employee" data-live-search="true" id="employee" data-size="5">
                                    <option value=""></option>
                                    @foreach($employees as $employee)
                                    <option value="{{ $employee->Employee_id }}">{{ $employee->fullname }}</option>
                                    @endforeach
                              </select>
                        </div>

                        <div class="col-lg-2">
                              <label>Employee ID</label>
                              <input type="text" id="employeeID" class='form-control' readonly>
                        </div>
                  </div>

                  <div class="row">
                        <div class="col-lg-6">
                              <label>Office</label>
                              <select data-style="btn-primarys text-white" class="form-control form-control-xs selectpicker" name="office" data-live-search="true" id="office" data-size="5">
                                    <option value=""></option>
                                    @foreach($offices as $office)
                                    <option value="{{ $office->office_code }}">{{ $office->office_name }}</option>
                                    @endforeach
                              </select>
                        </div>

                        <div class="col-lg-6">
                              <label>Division</label>
                              <select data-style="btn-primarys text-white" class="form-control form-control-xs" name="division" data-live-search="true" id="division" data-size="5">
                              </select>
                        </div>
                  </div>

                  <div class="row">
                        <div class="col-lg-6">
                              <label>Position</label>
                              <select data-style="btn-primarys text-white" class="form-control form-control-xs selectpicker" name="position" data-live-search="true" id="position" data-size="5">
                                    <option value=""></option>
                              </select>
                        </div>

                        <div class="col-lg-6">
                              <label>Status</label>
                              <select data-style="btn-primarys text-white" class="form-control form-control-xs" name="status" data-live-search="true" id="status" data-size="5">
                                    @foreach($employeeStatus as $status)
                                    <option value="{{ $status }}">{{ $status }}</option>
                                    @endforeach
                              </select>
                        </div>
                  </div>

                  <hr>

                  <div class="row">
                        <div class="col-lg-6">
                              <label>Item No</label>
                              <input type="text" class='form-control form-control-xs' name="item_no" id="item_no">
                        </div>

                        <div class="col-lg-6">
                              <label>Old Item No</label>
                              <input type="text" class='form-control form-control-xs' name="old_item_no" id="old_item_no">
                        </div>
                  </div>

                  <div class="row">
                        <div class="col-lg-3">
                              <label>Current Salary Grade Year</label>
                              <input type="text" class='form-control form-control-xs' name="current_salary_grade_year" id="current_salary_grade_year" readonly>
                        </div>

                        <div class="col-lg-3">
                              <label>Salary Grade</label>
                              <input type="text" class='form-control form-control-xs' name="salary_grade" id="salary_grade" readonly>
                        </div>

                        <div class="col-lg-3">
                              <label>Steps</label>
                              <select class='form-control form-control-xs' name="step" id="step">
                                    @foreach(range(1, 8) as $increment)
                                    <option value="{{ $increment }}">{{ $increment }}</option>
                                    @endforeach
                              </select>
                        </div>

                        <div class="col-lg-3">
                              <label>Salary Amount</label>
                              <input type="text" class='form-control form-control-xs' name="salary_amount" id="salary_amount" readonly>
                        </div>
                  </div>

                  <hr>

                  <div class="row">
                        <div class="col-lg-6">
                              <label>Original Appointment</label>
                              <input type="date" class='form-control form-control-xs' name="original_appointment">
                        </div>

                        <div class="col-lg-6">
                              <label>Last Promotion</label>
                              <input type="date" class='form-control form-control-xs' name="last_promotion">
                        </div>
                  </div>

                  <hr>

                  <div class="row">
                        <div class="col-lg-4">
                              <label>Area Code</label>
                              <select name="area_code" id="area_code" class='form-control form-control-xs'>
                                    @foreach($areaCode as $area)
                                    <option value="{{ $area }}">{{ $area }}</option>
                                    @endforeach
                              </select>
                        </div>

                        <div class="col-lg-4">
                              <label>Area Type</label>
                              <select name="area_type" id="area_type" class='form-control form-control-xs'>
                                    @foreach($areaType as $areaType)
                                    <option value="{{ $areaType }}">{{ $areaType }}</option>
                                    @endforeach
                              </select>
                        </div>

                        <div class="col-lg-4">
                              <label>Area Level</label>
                              <select class='form-control form-control-xs' name="area_level" id="area_level">
                                    @foreach($areaLevel as $level)
                                    <option value="{{ $level }}">{{ $level }}</option>
                                    @endforeach
                              </select>
                        </div>
                  </div>

                  <div class="float-right mt-3">
                        <button class='btn btn-primarys' type="submit">
                              <i class="fas fa-save"></i>
                              Save
                        </button>
                  </div>
            </form>
      </div>

</div>
@push('page-scripts')
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script>
      $('#employee').change(function() {
            let employeeID = $(this).val();
            $('#employeeID').val(employeeID);
      });

      $('#office').change(function() {
            let office = $(this).val();
            if (office) {
                  $.get({
                        url: `/api/division-by-office/${office}`, 
                        success: function(response) {
                                    $('#division').children().remove();
                                    response.divisions.forEach((division) => $(`#division`).append(`<option value="${division.division_id}">${division.division_name}</option>`));
                        }
                  });

                  $.get({
                        url : `/api/office-plantilla-positions/${office}`,
                        success : function (response) {
                              $('#position').children().remove();
                              $('#position').append(`<option value=""></option>`);
                              response.positions.forEach((position) => $(`#position`).append(`<option value="${position.pp_id}">${position.position.Description}</option>`));
                              $('#position').selectpicker('refresh');
                        }
                  });
            }
      });

      $('#position').change(function() {
            let plantillaPositionID = $(this).val();
            $.ajax({
                  url: `/api/plantilla-position-details/${plantillaPositionID}`
                  , success: function(response) {
                        $('#current_salary_grade_year').val(response.year);
                        $('#salary_grade').val(response.sg_no);
                        $('#item_no').val(response.item_no);

                        let step = $('#step').val() || 1;

                        $.ajax({
                              url: `/api/salary-amount/${response.sg_no}/${step}/${response.year}`
                              , success: function(salary_amount) {
                                    $('#salary_amount').val(salary_amount);
                              }
                        });
                  }
            });
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

</script>
@endpush
@endsection
