@extends('layouts.app')
@section('title', 'Edit Salary Adjustment')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('/css/jquery.dataTables.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('/css/bootstrap-float-label.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<style>
    .swal-content ul {
        list-style-type: none;
        padding: 0;
    }

</style>
@endprepend
@section('content')
{{-- VIEW TABLE BUTTON IN FORM --}}
<div class="float-right mr-3 mb-2" id='btnViewTableContainer'>
    <a href="{{ route('print-adjustment', $salaryAdjustment->id) }}" class="btn btn-secondary"><i
            class="la la-print"></i>&nbsp; Print Preview</a>
    <a href="/salary-adjustment" class="btn btn-info"><i class="la la-list"></i>&nbsp; View List </a>
</div>
<div class="clearfix"></div>

{{-- FORM AND TABLE --}}
<div class="kanban-board card mb-0">
    <div class="card-body">
        <form id="saveEditSalaryAdjustmentPerOffice">
            @csrf
            @method('PUT')
            <div class="row">

                <div class="col-12">
                    <div class="alert alert-secondary text-center font-weight-bold" role="alert">EDIT SALARY ADJUSTMENT
                    </div>
                </div>


                <input id="idSalaryAdjustment" type="text" value={{ $salaryAdjustment->id }} class="form-control d-none">

                <div class="form-group col-12 col-lg-4">
                    <label class="has-float-label mb-0">
                        <input style="outline: none; box-shadow: 0px 0px 0px transparent;"
                            class="form-control {{ $errors->has('dateAdjustment')  ? 'is-invalid' : ''}}"
                            value="{{ $salaryAdjustment->date_adjustment->format('m-d-Y') }}"
                            name="dateAdjustment" id="dateAdjustment" type="text" readonly>
                        <span class="font-weight-bold">DATE ADJUSTMENT<span class="text-danger">*</span></span>
                    </label>
                    <div id='date-adjustment-error-message' class='text-danger'>
                    </div>
                    @if($errors->has('dateAdjustment'))
                    <small class="form-text text-danger">
                        {{ $errors->first('dateAdjustment') }} </small>
                    @endif
                </div>

                <div class="form-group col-12 col-lg-4 d-none">
                    <label class="has-float-label mb-0">
                        <input style="outline: none; box-shadow: 0px 0px 0px transparent;"
                            class="form-control {{ $errors->has('dateAdjustment2')  ? 'is-invalid' : ''}}"
                            value="{{ $salaryAdjustment->date_adjustment }}"
                            name="dateAdjustment2" id="dateAdjustment2" type="text">
                        <span class="font-weight-bold">DATE ADJUSTMENT<span class="text-danger">*</span></span>
                    </label>
                </div>

                <div class="form-group col-12 col-lg-4">
                    <label class="has-float-label">
                        <select value=""
                            class="form-control form-control-xs selectpicker {{ $errors->has('')  ? 'is-invalid' : ''}}"
                            name="" data-live-search="true" data-size="5" disabled
                            style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <option></option>
                            @foreach($employee as $employees)
                            <option {{ $salaryAdjustment->employee_id == $employees->Employee_id ? 'selected' : '' }}
                                value="{{ $employees->Employee_id }}">{{ $employees->Lastname }},
                                {{ $employees->Firstname }} {{ $employees->Middlename }}</option>
                            @endforeach
                        </select>
                        <span class="font-weight-bold">EMPLOYEE NAME</span>
                    </label>
                </div>

                <div class="form-group col-12 col-lg-4 d-none">
                    <label>Employee Id</label>
                    <input class="form-control" value="{{ $salaryAdjustment->employee_id }}" name="employeeName"
                        id="employeeName" type="text" readonly>
                    @if($errors->has('employeeName'))
                    <small class="form-text text-danger">
                        {{ $errors->first('employeeName') }} </small>
                    @endif
                </div>

                <div class="form-group col-12 col-lg-4">
                    <label class="has-float-label" for="itemNo">
                        <input style="outline: none; box-shadow: 0px 0px 0px transparent;"
                            class="form-control {{ $errors->has('itemNo')  ? 'is-invalid' : ''}}"
                            value="{{ old('itemNo') ?? $salaryAdjustment->item_no }}" name="itemNo" id="itemNo"
                            type="text" readonly>
                        <span class="font-weight-bold">ITEM NO</span>
                    </label>
                    @if($errors->has('itemNo'))
                    <small class="form-text text-danger">
                        {{ $errors->first('itemNo') }} </small>
                    @endif
                </div>

                <div class="form-group col-12 col-lg-4">
                    <label class="has-float-label">
                        <select value="{{ old('position') }}"
                            class="form-control form-control-xs selectpicker  {{ $errors->has('position')  ? 'is-invalid' : ''}}"
                            name="" data-live-search="true" data-width="100%" disabled
                            style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <option></option>
                            @foreach($plantillaPosition as $plantillaPositions)
                            <option style="width:350px;"
                                {{ $salaryAdjustment->pp_id == $plantillaPositions->pp_id ? 'selected' : '' }}
                                value="{{ $plantillaPositions->pp_id}}">{{ $plantillaPositions->position->Description }}</option>
                            @endforeach
                        </select>
                        <span class="font-weight-bold">POSITION</span>
                    </label>
                    @if($errors->has('position'))
                    <small class="form-text text-danger">
                        {{ $errors->first('position') }} </small>
                    @endif
                </div>

                <div class="form-group col-12 col-lg-4 d-none">
                    <label>Position Id</label>
                    <input class="form-control" value="{{ $salaryAdjustment->pp_id }}" name="position"
                        id="position" type="text" readonly>
                    @if($errors->has('position'))
                    <small class="form-text text-danger">
                        {{ $errors->first('position') }} </small>
                    @endif
                </div>


                <div class="form-group col-12 col-lg-4">
                    <label class="has-float-label" id="salaryGrade">
                        <input style="outline: none; box-shadow: 0px 0px 0px transparent;"
                            class="form-control {{ $errors->has('salaryGrade')  ? 'is-invalid' : ''}}"
                            value="{{ old('salaryGrade') ?? $salaryAdjustment->sg_no }}" name="salaryGrade"
                            id="salaryGrade" type="text" readonly>
                        <span class="font-weight-bold">SALARY GRADE</span>
                    </label>
                    @if($errors->has('salaryGrade'))
                    <small class="form-text text-danger">
                        {{ $errors->first('salaryGrade') }} </small>
                    @endif
                </div>

                <div class="form-group col-12 col-lg-4">
                    <label class="has-float-label" for="stepNo">
                        <input class="form-control {{ $errors->has('stepNo')  ? 'is-invalid' : ''}}"
                            value="{{ old('stepNo') ?? $salaryAdjustment->step_no }}" name="stepNo"
                            style="outline: none; box-shadow: 0px 0px 0px transparent;" id="stepNo" type="text"
                            readonly>
                        <span class="font-weight-bold">STEP NO</span>
                    </label>
                    <div id='step-no-error-message' class='text-danger'>
                    </div>
                    @if($errors->has('stepNo'))
                    <small class="form-text text-danger">
                        {{ $errors->first('stepNo') }} </small>
                    @endif
                </div>

                <div class="form-group col-12 col-lg-3 d-none">
                    <label>Current SG Year</label>
                    <select name="currentSgyear" id="currentSgyear" value="" class="select floating">
                        {{ $year3 = date("Y",strtotime("-0 year")) }}
                        <option value={{ $year3 }}>{{ $year3 }}</option>
                    </select>
                    @if($errors->has('currentSgyear'))
                    <small class="form-text text-danger">
                        {{ $errors->first('currentSgyear') }} </small>
                    @endif
                </div>

                <div class="col-lg-4">
                    <div class="form-group input-group">
                        <span class="input-group-text">&#8369;</span>
                        <label class="has-float-label">
                            <input class="form-control {{ $errors->has('salaryPrevious')  ? 'is-invalid' : ''}}"
                                value="{{ old('salaryPrevious') ?? $salaryAdjustment->salary_previous }}"
                                name="salaryPrevious" id="salaryPrevious" type="text" readonly
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span class="font-weight-bold">SALARY PREVIOUS</span>
                        </label>
                    </div>
                    @if($errors->has('salaryPrevious'))
                    <small class="form-text text-danger">
                        {{ $errors->first('salaryPrevious') }} </small>
                    @endif
                </div>

                <div class="col-lg-4">
                    <div class="form-group input-group">
                        <span class="input-group-text">&#8369;</span>
                        <label class="has-float-label" for="salaryNew">
                            <input class="form-control {{ $errors->has('salaryNew')  ? 'is-invalid' : ''}}"
                                value="{{ old('salaryNew') ?? $salaryAdjustment->salary_new }}" name="salaryNew"
                                id="salaryNew" type="text" placeholder="Input New Salary" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span class="font-weight-bold">SALARY NEW<span class="text-danger">*</span></span>
                            </label>
                    </div>
                    <div id='salary-new-error-message' class='text-danger text-sm text-center'>
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="form-group input-group">
                        <span class="input-group-text">&#8369;</span>
                    <label class="has-float-label">
                        <input class="form-control {{ $errors->has('salaryDifference')  ? 'is-invalid' : ''}}"
                            value="{{ old('salaryNew') ?? $salaryAdjustment->salary_diff }}" name="salaryDifference"
                            id="salaryDifference" type="text" readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                        <span class="font-weight-bold">SALARY DIFFERENCE</span>
                    </label>
                    @if($errors->has('salaryDifference'))
                    <small class="form-text text-danger">
                        {{ $errors->first('salaryDifference') }} </small>
                    @endif
                </div>
                </div>

                <div class="form-group col-12 col-lg-12 mt-4">
                    <label class="has-float-label mb-0">
                    <input value="{{ old('remarks') ??  $salaryAdjustment->remarks }}"
                        class="form-control {{ $errors->has('remarks')  ? 'is-invalid' : ''}}"
                        name="remarks" id="remarks" type="text" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                        <span class="font-weight-bold">REMARKS</span>
                    </label>
                </div>

                <div class="form-group form-group submit-section col-12">
                    <button id="saveBtn" class="btn btn-success submit-btn float-right" type="submit">
                        <span id="loading" class="spinner-border spinner-border-sm d-none" role="status"
                            aria-hidden="false"></span>
                            <i style="color:white;" class="fas fa-save"></i> <b style="color:white;" id="saving">Update</b>
                    </button>
                    <a href="/salary-adjustment-per-office"><button style="margin-right:10px;" type="button"
                            class="shadow text-white btn btn-warning submit-btn float-right"><i
                                class="fas fa-arrow-left"></i> Back</button></a>
                </div>

            </div>

            <form>

    </div>
</div>
@push('page-scripts')
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="{{ asset('/assets/js/salary-adjustment.js') }}"></script>
<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });



    $("#saveEditSalaryAdjustmentPerOffice").submit(function (e) {
        e.preventDefault();
        let id = $('#idSalaryAdjustment').val();
        let data = $(this).serialize();
        $("#saveBtn").attr("disabled", true);
        $("#loading").removeClass("d-none");
        $("#saving").html("Updating . . .");
        $.ajax({
            type: "PUT",
            url: `/salary-adjustment-per-office/update/${id}`,
            data: data,
            success: function (response) {
                if (response.success) {
                    swal("Sucessfully Saved!", "", "success");
                    $("#saveBtn").attr("disabled", false);
                    $("#loading").addClass("d-none");
                    document.getElementById("saving").innerHTML = "Update";
                    $("#saving").html("Update");
                    $(`#salaryNew`).removeClass("is-invalid");
                    $('#salary-grade-error-message').html("");
                }
            },
            error: function (response) {
                if (response.status === 422) {
                    let errors = response.responseJSON.errors;
                    if (errors.hasOwnProperty("itemNo")) {
                        $("#itemNo").addClass("is-invalid");
                        $("#item-error-message").html("");
                        $("#item-error-message").append(
                            `<span>${errors.itemNo[0]}</span>`
                        );
                    } else {
                        $("#itemNo").removeClass("is-invalid");
                        $("#item-error-message").html("");
                    }
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
