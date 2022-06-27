@extends('layouts.app')
@section('title',  'Edit ' .  $promotion?->employee?->FirstName . ' ' . $promotion?->employee?->LastName .  ' Promotion')
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
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
  {{ Session::get('success') }}
</div>
@endif
<div class="card rounded-0 shadow-none border-none">
    <div class="card-body">
        <form action="{{ route('promotion.update', $promotion->promotion_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-10">
                    <label class='text-uppercase h6'>Employee Name</label>
                    <input type="text" class='form-control form-control-xs' id="employeeName" value="{{ $promotion?->employee?->fullname }}" readonly>
                </div>

                <div class="col-lg-2">
                    <label class='text-uppercase h6'>Employee ID</label>
                    <input type="text" id="employeeID" class='form-control' readonly value="{{ $promotion?->employee_id }}">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <label class='text-uppercase h6'>Office</label>
                    <select data-style="btn-primarys text-white" class="form-control form-control-xs selectpicker"
                        name="office" data-live-search="true" id="office" data-size="5">
                        <option value=""></option>
                        @foreach($offices as $office)
                        <option {{ $promotion->new_plantilla_position->plantillas->office_code == $office->office_code ? 'selected' : '' }} value="{{ $office->office_code }}">{{ $office->office_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-lg-6">
                    <label class='text-uppercase h6'>Division</label>
                    <select data-style="btn-primarys text-white" class="form-control form-control-xs" name="division"
                        data-live-search="true" id="division" data-size="5">
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <label class='text-uppercase h6'>Position</label>
                    <span class='float-right text-primary text-decoration-underline font-weight-bold' id='changeCurrentPosition' style='cursor:pointer;'>Change</span>
                    <input type="text" id="positionReadonly" class='form-control form-control-xs' readonly value="{{ $promotion?->new_plantilla_position->plantillas?->plantilla_positions?->position?->Description }}">
                    <select data-style="btn-primarys text-white" class="form-control form-control-xs selectpicker d-none"
                        name="position" data-live-search="true" id="position" data-size="5">
                        <option value=""></option>
                    </select>
                </div>

                <div class="col-lg-6">
                    <label class='text-uppercase h6'>Status</label>
                    <select data-style="btn-primarys text-white" class="form-control form-control-xs" name="status"
                        data-live-search="true" id="status" data-size="5">
                        @foreach($employeeStatus as $status)
                        <option {{ strtoupper($status) === strtoupper($promotion->new_plantilla_position->plantillas->status) }} value="{{ $status }}">{{ $status }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-6">
                    <label class='text-uppercase h6'>Item No</label>
                    <input type="text" class='form-control form-control-xs' name="item_no" id="item_no" value="{{ $promotion->new_plantilla_position->plantillas->item_no }}" readonly>
                </div>

                <div class="col-lg-6">
                    <label class='text-uppercase h6'>Old Item No</label>
                    <div class="input-group mb-3">
                        <input type="text" class='form-control form-control-xs' name="old_item_no" id="old_item_no" value="{{ $promotion->new_plantilla_position->plantillas->old_item_no }}" readonly>
                        {{-- <div class="input-group-append">
                            <button class="btn btn-primarys" id="btnViewOldItem" type="button">
                                <i class='fas fa-eye'></i>
                            </button>
                        </div> --}}
                    </div>
                </div>

            </div>

            <hr>

            <div class="row">
                <div class="col-lg-3">
                    <label class='text-uppercase h6'>Current Salary Grade Year</label>
                    <input type="text" class='form-control form-control-xs' name="current_salary_grade_year" value="{{ $promotion->sg_year }}" id="current_salary_grade_year" readonly>
                </div>

                <div class="col-lg-3">
                    <label class='text-uppercase h6'>Salary Grade</label>
                    <input type="text" class='form-control form-control-xs' name="salary_grade" id="salary_grade" value="{{ $promotion->sg_no }}" readonly>
                </div>

                <div class="col-lg-3">
                    <label class='text-uppercase h6'>Steps</label>
                    <select class='form-control form-control-xs' name="step" id="step">
                        @foreach(range(1, 8) as $increment)
                        <option {{ $promotion->step_no == $increment ? 'selected' : '' }} value="{{ $increment }}">{{ $increment }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-lg-3">
                    <label class='text-uppercase h6'>Salary Amount</label>
                    <input type="text" class='form-control form-control-xs' name="salary_amount" id="salary_amount" value="{{ number_format($promotion?->new_plantilla_position?->plantillas->salary_amount, 2, ".", ",") }}" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <label class='text-uppercase h6'>Original Appointment</label>
                    <input type="date" class='form-control form-control-xs' name="original_appointment" value="{{ $promotion->new_plantilla_position->plantillas->date_original_appointment }}">
                </div>

                <div class="col-lg-6">
                    <label class='text-uppercase h6'>Last Promotion</label>
                    <input type="date" class='form-control form-control-xs' name="last_promotion" id="last_promotion" value="{{ $promotion->new_plantilla_position->plantillas->date_last_promotion }}">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <label class='text-uppercase h6'>Area Code</label>
                    <select name="area_code" id="area_code" class='form-control form-control-xs'>
                        @foreach($areaCode as $area)
                        <option {{ Str::upper($area) === Str::upper($promotion->new_plantilla_position->plantillas->area_code) ? 'selected' : '' }} value="{{ $area }}">{{ $area }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-lg-4">
                    <label class='text-uppercase h6'>Area Type</label>
                    <select name="area_type" id="area_type" class='form-control form-control-xs'>
                        @foreach($areaType as $areaType)
                        <option {{ Str::upper($areaType) === Str::upper($promotion->new_plantilla_position->plantillas->area_type) ? 'selected' : '' }} value="{{ $areaType }}">{{ $areaType }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-lg-4">
                    <label class='text-uppercase h6'>Area Level</label>
                    <select class='form-control form-control-xs' name="area_level" id="area_level">
                        @foreach($areaLevel as $level)
                        <option {{ Str::upper($level) === Str::upper($promotion->new_plantilla_position->plantillas->area_level) ? 'selected' : '' }} value="{{ $level }}">{{ $level }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="float-right mt-3">
                <button class='btn btn-success text-white' type="submit">
                  <i class="las la-save"></i>
                    Update Promotion
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
<script>
    let employeePlantilla = {};
    let PROMOTION_POSITION = "{{ $promotion->new_plantilla_position->PosCode }}";
    let isChange = false;

      let userSelectOffice = () => {
            let office = $('#office').val();
            if (office) {
                  $.get({
                        url: `/api/division-by-office/${office}`,
                        success: function (response) {
                              $('#division').children().remove();
                              response.divisions.forEach((division) => $(`#division`).append(`<option value="${division.division_id}">${division.division_name}</option>`));
                        }
                  });

                  $.get({
                        url: `/api/office-plantilla-positions/${office}`,
                        success: function (response) {
                              $('#position').children().remove();
                              $('#position').append(`<option value=""></option>`);
                               response.positions.forEach((position) => $(`#position`).append(`<option value="${position.pp_id}">${position.position.Description}</option>`));
                               $('#position').selectpicker('refresh');
                        }
                  });
            } else {
                  $('#division').children().remove();
                  $('#position').children().remove()
                  $('#position').selectpicker('refresh').trigger('change');
            }
      };


      let userSelectPosition = () => {
            let selectedEmployee = $('#employeeID').val();
            let plantillaPositionID = $('#position').val();
            if (plantillaPositionID) {
                  $.get({
                  url: `/api/plantilla-position-details/${plantillaPositionID}`,
                  success: function (response) {
                        let year = $('#current_salary_grade_year').val();
                        $('#salary_grade').val(response.sg_no);
                        $('#item_no').val(response.item_no);

                        let step = $('#step').val() || 1;
                        $.get({
                              url: `/api/salary-amount/${response.sg_no}/${step}/${year}`,
                              success: function (salary_amount) {
                                    $('#salary_amount').val(salary_amount);
                              }
                        });
                  }
                  });

                  $.get({
                        url: `/api/personnel-get-current-plantilla/${selectedEmployee}`,
                        success: function (currentPlantilla) {
                              employeePlantilla = currentPlantilla;
                              $('#btnViewOldItem').removeClass('d-none');
                              $('#old_item_no').val(currentPlantilla.item_no);
                        }
                  });
            } else {
                  $('#item_no').val('');
                  $('#old_item_no').val('');
                  $('#current_salary_grade_year').val('');
                  $('#salary_grade').val('');
                  $('#salary_amount').val('');
                  $('#btnViewOldItem').addClass('d-none');
            }
      };
    userSelectOffice();

    $('#office').change(userSelectOffice);
    $('#position').change(userSelectPosition);

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
            let selectedEmployeeID = $('#employeeID').val();
            let selectedEmployeeFullname = $('#employeeName').val();
            $('#oldItemModalTitle').html(`<strong>${selectedEmployeeID} - ${selectedEmployeeFullname}</strong> Current Plantilla`);
            
            $('#employee-current-plantilla-container').html(``).append(`
                  <tr>
                        <td>${employeePlantilla?.plantilla_positions?.position?.Description || ''}</td>
                        <td>${employeePlantilla?.office?.office_name || ''}</td>
                        <td>${employeePlantilla.item_no || ''}</td>
                        <td>${employeePlantilla.status || ''}</td>
                        <td>${employeePlantilla.year || ''}</td>
                  </tr>
            `);
        }
    });

    $('#changeCurrentPosition').click(function () {
            if(!isChange) {
                  $('#positionReadonly').addClass('d-none');
                  $('#position').parent().removeClass('d-none');
                  $('#changeCurrentPosition').text('Discard');
                  isChange = true;
            } else {
                  $('#positionReadonly').removeClass('d-none');
                  $('#position').parent().addClass('d-none');
                  $('#changeCurrentPosition').text('Change');
                  isChange = false;
            }
            
    });

</script>
@endpush
@endsection
