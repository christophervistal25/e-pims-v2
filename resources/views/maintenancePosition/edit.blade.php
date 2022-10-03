@extends('layouts.app')
@section('title', 'Edit Position')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('css/jquery-datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap-float-label.css') }}">
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<style>
    .swal-content ul {
        list-style-type: none;
        padding: 0;
    }

</style>
@endprepend
@section('content')
@include('Plantilla.add-ons.success')
<div class="kanban-board card shadow-none">
    <div class="card-body">
        <div id="add" class="page-header">
            <form id="maintenancePositionEditForm">
                @csrf
                @method('PUT')
                <div class="alert alert-secondary text-center font-weight-bold" role="alert">EDIT POSITION</div>
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <input id="positionEditId" type="text" class="d-none" value="{{ $position->PosCode }}">
                        <div class="form-group col-12 col-md-6 col-lg-7">
                            <label class="has-float-label mb-0">
                                <input value="{{ old('positionCode') ?? $position->PosCode}}" class="form-control {{ $errors->has('positionCode')  ? 'is-invalid' : ''}}" name="positionCode" id="positionCode" type="text" placeholder="" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span class="font-weight-bold">Position Code<span class="text-danger">*</span></span>
                            </label>
                            <div id='position-code-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-md-6 col-lg-7">
                            <label class="has-float-label mb-0">
                                <input value="{{ old('positionName') ?? $position->Description }}" class="form-control {{ $errors->has('positionName')  ? 'is-invalid' : ''}}" name="positionName" id="positionName" type="text" placeholder="" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span class="font-weight-bold">Position Name<span class="text-danger">*</span></span>
                            </label>
                            <div id='position-name-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="form-group col-10 col-lg-7">
                            <label class="has-float-label mb-0">
                                <select value="" class="form-control selectpicker  {{ $errors->has('salaryGradeNo')  ? 'is-invalid' : ''}}" name="salaryGradeNo" data-live-search="true" id="salaryGradeNo" data-size="4" data-width="100%" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <option></option>
                                    @foreach (range(1, 33) as $salaryGrade)
                                    <option {{ $position->sg_no == $salaryGrade ? 'selected' : '' }} value="{{ $salaryGrade}}">{{ $salaryGrade }}</option>
                                    @endforeach
                                </select>
                                <span class="font-weight-bold">Salary Grade<span class="text-danger">*</span></span>
                            </label>
                            <div id='salary-grade-no-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-7">
                            <label class="has-float-label mb-0">
                                <input value="{{ old('positionShortName') ?? $position->position_short_name}}" class="form-control {{ $errors->has('positionShortName')  ? 'is-invalid' : ''}}" name="positionShortName" id="positionShortName" type="text" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span class="font-weight-bold">Position Short Name<span class="text-danger">*</span></span>
                            </label>
                            <div id='position-short-name-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="form-group form-group submit-section col-12">
                            <button id="saveBtn" class="btn btn-success submit-btn float-right" type="submit">
                                <span id="loading" class="spinner-border spinner-border-sm d-none" role="status"
                                    aria-hidden="false"></span>
                                    <i style="color:white;" class="fas fa-save"></i> <b style="color:white;" id="saving">Update</b>
                            </button>
                            <a href="/maintenance-position"><button style="margin-right:10px;" type="button" class="text-white btn btn-warning submit-btn float-right shadow"><i class="fas fa-arrow-left"></i> Back</button>
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
        "positionCode": {
                "#positionCode": "#position-code-error-message"
            },
            "positionName": {
                "#positionName": "#position-name-error-message"
            },
            "salaryGradeNo": {
                "#salaryGradeNo": "#salary-grade-no-error-message"
            },
    };

    $("#maintenancePositionEditForm").submit(function (e) {
        e.preventDefault();
        let positionEditId = $('#positionEditId').val();
        let data = $(this).serialize();
        $("#saveBtn").attr("disabled", true);
        $("#loading").removeClass("d-none");
        $("#saving").html("Updating . . .");
        $.ajax({
            type: "PUT",
            url: `/maintenance-position-update/${positionEditId}`,
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
<script src="{{ asset('/assets/js/maintenance-position.js') }}"></script>

@endpush
@endsection
