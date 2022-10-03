@extends('layouts.app')
@section('title', 'Edit Office')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('css/jquery-datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap-float-label.css') }}">
<style>
      .swal-content ul {
            list-style-type: none;
            padding: 0;
      }

</style>
@endprepend
@section('content')
@include('Plantilla.add-ons.success')
<div class="kanban-board card shadow mb-0">
      <div class="card-body">
            <div id="add" class="page-header">
                  <form id="maintenanceOfficeEditForm">
                        @csrf
                        @method('PUT')
                        <div class="alert alert-secondary text-center font-weight-bold" role="alert">EDIT OFFICE</div>
                        <div class="container">
                              <input id="editOfficeId" type="text" class="d-none" value="{{$office->office_code}}">
                              <div class="row justify-content-center align-items-center">
                                    <div class="form-group col-12 col-md-6 col-lg-7">
                                          <label class="has-float-label mb-0">
                                                <input value="{{ old('officeName') ?? $office->office_name }}" class="form-control {{ $errors->has('officeName')  ? 'is-invalid' : ''}}" name="officeName" id="officeName" type="text" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                                <span class="font-weight-bold">Office Name<span class="text-danger">*</span></span>
                                          </label>
                                          <div id='office-name-error-message' class='text-danger text-sm'>
                                          </div>
                                    </div>

                                    <div class="form-group col-12 col-lg-7">
                                          <label class="has-float-label mb-0">
                                                <input value="{{ old('officeShortName') ?? $office->office_short_name }}" class="form-control {{ $errors->has('officeShortName')  ? 'is-invalid' : ''}}" name="officeShortName" id="officeShortName" type="text" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                                <span class="font-weight-bold">Office Short Name<span class="text-danger">*</span></span>
                                          </label>
                                          <div id='office-short-name-error-message' class='text-danger text-sm'>
                                          </div>
                                    </div>

                                    <div class="form-group col-12 col-lg-7">
                                          <label class="has-float-label mb-0">
                                                <input value="{{ old('officeAddress') ?? $office->office_address ?? '' }}" class="form-control {{ $errors->has('officeAddress')  ? 'is-invalid' : ''}}" name="officeAddress" id="officeAddress" type="text" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                                <span class="font-weight-bold">Office Address</span>
                                          </label>
                                          <div id='office-address-error-message' class='text-danger text-sm'>
                                          </div>
                                    </div>

                                    <div class="form-group col-12 col-lg-7">
                                          <label class="has-float-label mb-0">
                                                <input value="{{ old('officeShortAddress') ?? $office->office_short_address }}" class="form-control {{ $errors->has('officeShortAddress')  ? 'is-invalid' : ''}}" name="officeShortAddress" id="officeShortAddress" type="text" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                                <span class="font-weight-bold">Office Short Address</span>
                                          </label>
                                          <div id='office-short-address-error-message' class='text-danger text-sm'>
                                          </div>
                                    </div>

                                    <div class="form-group col-12 col-lg-7">
                                          <label class="has-float-label mb-0">
                                                <input value="{{ old('officeHead') ?? $office->office_head }}" class="form-control {{ $errors->has('officeHead')  ? 'is-invalid' : ''}}" name="officeHead" id="officeHead" type="text" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                                <span class="font-weight-bold">Office Head<span class="text-danger">*</span></span>
                                          </label>
                                          <div id='office-head-error-message' class='text-danger text-sm'>
                                          </div>
                                    </div>

                                    <div class="form-group col-12 col-lg-7">
                                          <label class="has-float-label mb-0">
                                                <input value="{{ $office->position_name }}" class="form-control {{ $errors->has('positionName')  ? 'is-invalid' : ''}}" name="positionName" id="positionName" type="text" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                                <span class="font-weight-bold">Position Name<span class="text-danger">*</span></span>
                                          </label>
                                          <div id='position-name-error-message' class='text-danger text-sm'>
                                          </div>
                                    </div>

                                    <div class="form-group col-12 col-lg-7">
                                          <label class="has-float-label mb-0">
                                                <input value="{{ old('departmentCode') }}" class="form-control {{ $errors->has('departmentCode')  ? 'is-invalid' : ''}}" name="departmentCode" id="departmentCode" type="text" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                                <span class="font-weight-bold">Department Code</span>
                                          </label>
                                          <div id='position-name-error-message' class='text-danger text-sm'>
                                                @error('departmentCode')
                                                {{ $errors->first('departmentCode') }}
                                                @enderror
                                          </div>
                                    </div>

                                    <div class="form-group form-group submit-section col-12">
                                          <button id="saveBtn" class="btn btn-success submit-btn float-right" type="submit">
                                                <span id="loading" class="spinner-border spinner-border-sm d-none" role="status"
                                                    aria-hidden="false"></span>
                                                    <i style="color:white;" class="fas fa-save"></i> <b style="color:white;" id="saving">Update</b>
                                            </button>
                                          <a href="/maintenance-office"><button style="margin-right:10px;" type="button" class="text-white btn btn-warning submit-btn float-right shadow"><i class="fas fa-arrow-left"></i> Back</button>
                                    </div>
                              </div>
                        </div>
                  </form>
            </div>
      </div>
</div>
@push('page-scripts')
<script>
      $.ajaxSetup({
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      });

      var arrayErrors = {
        "officeName": {
                "#officeName": "#office-name-error-message"
            },
            "officeShortName": {
                "#officeShortName": "#office-short-name-error-message"
            },
            "officeHead": {
                "#officeHead": "#office-head-error-message"
            },
            "positionName": {
                "#positionName": "#position-name-error-message"
            },
    };



    $("#maintenanceOfficeEditForm").submit(function (e) {
        e.preventDefault();
        let editOfficeId = $('#editOfficeId').val();
        let data = $(this).serialize();
        $("#saveBtn").attr("disabled", true);
        $("#loading").removeClass("d-none");
        $("#saving").html("Updating . . .");
        $.ajax({
            type: "PUT",
            url: `/maintenance-office-update/${editOfficeId}`,
            data: data,
            success: function (response) {
                if (response.success) {
                    swal("Sucessfully Saved!", "", "success");
                    $("#saveBtn").attr("disabled", false);
                    $("#loading").addClass("d-none");
                    $("#saving").html("Update");
                    $.each(arrayErrors, function (propertyName, arrayErrors) {
                        $.each(arrayErrors, function (errorClass, errorMessage) {
                            $(`${errorClass}`).removeClass("is-invalid");
                            $(`${errorMessage}`).html("");
                        });
                    });
                }
            },
            error: function (response) {
                if (response.status === 422) {
                    let errors = response.responseJSON.errors;
                    $.each(arrayErrors, function (propertyName, arrayErrors) {
                        $.each(arrayErrors, function (errorClass, errorMessage) {
                            if(errors[propertyName] != undefined){
                                $(`${errorClass}`).addClass("is-invalid");
                                $(`${errorMessage}`).html("");
                                $(`${errorMessage}`).append(
                                        `<span>${errors[propertyName][0]}</span>`
                                    );
                            }
                        });
                    });
                    // Create an parent element
                    let parentElement = document.createElement("ul");
                    let errorss = response.responseJSON.errors;
                    $.each(errorss, function (key, value) {
                        let errorMessage = document.createElement("li");
                        let [error] = value;
                        errorMessage.innerHTML = error;
                        parentElement.appendChild(errorMessage);
                    });
                    swal({
                        title: "The given data was invalid!",
                        icon: "error",
                        content: parentElement,
                    });
                    $("#saveBtn").attr("disabled", false);
                    $("#loading").addClass("d-none");
                    $("#saving").html("Update");
                }
            },
        });
    });

</script>
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/js/maintenance-office.js') }}"></script>
@endpush
@endsection
