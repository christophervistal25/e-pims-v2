@extends('layouts.app')
@section('title', 'Edit Salary Grade')
@prepend('page-css')
<link rel="stylesheet"
    href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />
{{-- CSS HERE --}}
@endprepend
@section('content')
<div class="content">
    @include('SalaryGrade.add-ons.success')
    <div class="kanban-board card shadow mb-0">
        <div class="card-body">
            <div id="" class="page-header {{  count($errors->all())}}">

                <div class="alert alert-secondary text-center font-weight-bold" role="alert">EDIT SALARY GRADE</div>

                <form id="editSalaryGrade">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <input class="d-none" id="salaryGradeId" value="{{ $salaryGrade->id }}">
                        <div class="form-group col-6 col-lg-6">
                            <label class="has-float-label sgNo mb-0">
                                    <select value="" class="form-control selectpicker" name="sgNo" data-live-search="true" id="sgNo" data-size="4" data-width="100%" style="outline: none; box-shadow: 0px 0px 0px transparent;" disabled>
                                        <option></option>
                                        @foreach(range(1, 33) as $salarygrade)
                                            <option {{ $salaryGrade->sg_no == $salarygrade ? 'selected' : '' }}
                                            value="{{ $salarygrade }}">{{ $salarygrade }}</option>
                                        @endforeach
                                    </select>
                                    <span class="font-weight-bold">Salary Grade<span class="text-danger">*</span></span>
                            </label>
                        </div>
                        <div class="col-6 col-lg-6">
                            <label class="has-float-label" for="">
                                <input
                                    class="form-control text-right {{ $errors->has('')  ? 'is-invalid' : ''}}"
                                    value="{{ old('') ?? $salaryGrade->sg_year }}" id=""
                                    name="" type="text" maxlength="12"
                                    style="outline: none; box-shadow: 0px 0px 0px transparent;" readonly>
                                <span class="font-weight-bold">Salary Grade Year<span class="text-danger">*</span></span>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <span class="input-group-text">&#8369;</span>
                                <label class="has-float-label" for="sgStep1">
                                    <input
                                        class="form-control text-right {{ $errors->has('sgStep1')  ? 'is-invalid' : ''}}"
                                        value="{{ old('sgStep1') ?? $salaryGrade->sg_step1 }}" id="sgStep1"
                                        name="sgStep1" type="text" maxlength="12"
                                        style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <span class="font-weight-bold">Step 1 <span class="text-danger">*</span></span>
                                </label>
                            </div>
                            <div id='step-1-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="input-group">
                                <span class="input-group-text">&#8369;</span>
                                <label class="has-float-label" for="sgStep2">
                                    <input
                                        class="form-control text-right {{ $errors->has('sgStep2')  ? 'is-invalid' : ''}}"
                                        value="{{ old('sgStep2') ?? $salaryGrade->sg_step2 }}" id="sgStep2"
                                        name="sgStep2" type="text" maxlength="12"
                                        style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <span class="font-weight-bold">Step 2 <span class="text-danger">*</span></span>
                                </label>
                            </div>
                            <div id='step-2-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="input-group">
                                <span class="input-group-text">&#8369;</span>
                                <label class="has-float-label" for="sgStep3">
                                    <input
                                        class="form-control text-right {{ $errors->has('sgStep3')  ? 'is-invalid' : ''}}"
                                        value="{{ old('sgStep3') ?? $salaryGrade->sg_step3 }}" id="sgStep3"
                                        name="sgStep3" type="text" maxlength="12"
                                        style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <span class="font-weight-bold">Step 3 <span class="text-danger">*</span></span>
                                </label>
                            </div>
                            <div id='step-3-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="input-group">
                                <span class="input-group-text">&#8369;</span>
                                <label class="has-float-label" for="sgStep4">
                                    <input
                                        class="form-control text-right {{ $errors->has('sgStep4')  ? 'is-invalid' : ''}}"
                                        value="{{ old('sgStep4') ?? $salaryGrade->sg_step4 }}" id="sgStep4"
                                        name="sgStep4" type="text" maxlength="12"
                                        style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <span class="font-weight-bold">Step 4 <span class="text-danger">*</span></span>
                                </label>
                            </div>
                            <div id='step-4-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="input-group">
                                <span class="input-group-text">&#8369;</span>
                                <label class="has-float-label" for="sgStep5">
                                    <input
                                        class="form-control text-right {{ $errors->has('sgStep5')  ? 'is-invalid' : ''}}"
                                        value="{{ old('sgStep5') ?? $salaryGrade->sg_step5 }}" id="sgStep5"
                                        name="sgStep5" type="text" maxlength="12"
                                        style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <span class="font-weight-bold">Step 5 <span class="text-danger">*</span></span>
                                </label>
                            </div>
                            <div id='step-5-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="input-group">
                                <span class="input-group-text">&#8369;</span>
                                <label class="has-float-label">
                                    <input
                                        class="form-control text-right {{ $errors->has('sgStep6')  ? 'is-invalid' : ''}}"
                                        value="{{ old('sgStep6') ?? $salaryGrade->sg_step6 }}" id="sgStep6"
                                        name="sgStep6" type="text" maxlength="12"
                                        style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <span class="font-weight-bold">Step 6 <span class="text-danger">*</span></span>
                                </label>
                            </div>
                            <div id='step-6-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="input-group">
                                <span class="input-group-text">&#8369;</span>
                                <label class="has-float-label" for="sgStep7">
                                    <input
                                        class="form-control text-right {{ $errors->has('sgStep7')  ? 'is-invalid' : ''}}"
                                        value="{{ old('sgStep7') ?? $salaryGrade->sg_step7 }}" id="sgStep7"
                                        name="sgStep7" type="text" maxlength="12"
                                        style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <span class="font-weight-bold">Step 7 <span class="text-danger">*</span></span>
                                </label>
                            </div>
                            <div id='step-7-error-message' class='text-danger text-sm'>
                            </div>
                        </div>


                        <div class="col-lg-4">
                            <div class="input-group">
                                <span class="input-group-text">&#8369;</span>
                                <label class="has-float-label" for="sgStep8">
                                    <input
                                        class="form-control text-right {{ $errors->has('sgStep8')  ? 'is-invalid' : ''}}"
                                        value="{{ old('sgStep8') ?? $salaryGrade->sg_step8 }}" id="sgStep8"
                                        name="sgStep8" type="text" maxlength="12"
                                        style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <span class="font-weight-bold">Step 8 <span class="text-danger">*</span></span>
                                </label>
                            </div>
                            <div id='step-8-error-message' class='text-danger text-sm'>
                            </div>
                        </div>
                    </div>

                        <div class="form-group submit-section col-12">
                            <button id="saveBtn" class="btn btn-success submit-btn float-right" type="submit">
                                <span id="loading" class="spinner-border spinner-border-sm d-none" role="status"
                                    aria-hidden="false"></span>
                                    <i style="color:white;" class="fas fa-save"></i> <b style="color:white;" id="saving">Update</b>
                            </button>
                            <a href="/salary-grade"><button style="margin-right:10px;" type="button" id="cancelbutton"
                                    class="btn btn-warning submit-btn float-right text-white shadow"><i
                                        class="fas fa-arrow-left"></i> Back</button>
                        </div>
                    </div>
                </form>
            </div>
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
        "sgStep1": {
                "#sgStep1": "#step-1-error-message"
            },
            "sgStep2": {
                "#sgStep2": "#step-2-error-message"
            },
            "sgStep3": {
                "#sgStep3": "#step-3-error-message"
            },
            "sgStep4": {
                "#sgStep4": "#step-4-error-message"
            },
            "sgStep5": {
                "#sgStep5": "#step-5-error-message"
            },
            "sgStep6": {
                "#sgStep6": "#step-6-error-message"
            },
            "sgStep7": {
                "#sgStep7": "#step-7-error-message"
            },
            "sgStep8": {
                "#sgStep8": "#step-8-error-message"
            },
    };



    $("#editSalaryGrade").submit(function (e) {
        e.preventDefault();
        let salaryGradeId = $('#salaryGradeId').val();
        let data = $(this).serialize();
        $("#saveBtn").attr("disabled", true);
        $("#loading").removeClass("d-none");
        $("#saving").html("Updating . . .");
        $.ajax({
            type: "PUT",
            url: `/salary-grade/${salaryGradeId}`,
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
@endpush
@endsection
