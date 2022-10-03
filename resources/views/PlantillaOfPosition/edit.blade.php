@extends('layouts.app')
@section('title', 'Edit Plantilla Of Position')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('/css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link rel="stylesheet"
    href="{{ asset('/css/bootstrap-float-label.min.css') }}" />
<script src="{{ asset("js/sweetalert.min.js") }}"></script>
<style>
    .swal-content ul {
        list-style-type: none;
        padding: 0;
    }

</style>
<meta id="divisionMetaData" content="@foreach($division as $divisions){ |officeCode|:|{{ $divisions->office_code }}|, |divisionId|:|{{ $divisions->division_id }}|, |divisionName|:|{{ $divisions->division_name }}|}, @endforeach">
<meta id="sectionMetaData" content="@foreach($section as $sections){ |divisionId|:|{{ $sections->division_id }}|, |sectionId|:|{{ $sections->section_id }}|, |sectionName|:|{{ $sections->section_name }}|}, @endforeach">
@endprepend
@section('content')
@include('PlantillaOfPosition.add-ons.success')
<div class="kanban-board shadow card mb-0">
    <div class="card-body">
        <div id="add" class="page-header {{  count($errors->all())  !== 0 ?  '' : '' }}">
            <form id="editPlantillaPosition">
                @csrf
                @method('PUT')

                <div class="col-12">
                    <div class="alert alert-secondary text-center font-weight-bold" role="alert">EDIT POSITION</div>
                </div>
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                    <div class="row">
                        <input type="text" value="{{ $plantillaofposition->pp_id }}" id="editId" class="d-none" disabled>
                        <div class="col-6 col-md-6 col-lg-6">
                            <label class="has-float-label officeCode">
                                <select value=""
                                    class="form-control selectpicker "
                                    name="officeCode" data-live-search="true" id="officeCode" data-size="4"
                                    data-width="100%"
                                    style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <option></option>
                                    @foreach($office as $offices)
                                    <option
                                        {{ $plantillaofposition->office_code == $offices->office_code ? 'selected' : '' }}
                                        value="{{ $offices->office_code }}">{{ $offices->office_name }}</option>
                                    @endforeach
                                </select>
                                <span class="font-weight-bold">OFFICE<span class="text-danger">*</span></span>
                            </label>
                            <div id='office-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                                <div class="col-6 col-md-6 col-lg-6">
                                    <label class="has-float-label mb-0">
                                        <input value="{{ old('itemNo') ??  $plantillaofposition->item_no}}"
                                            class="form-control"
                                            name="itemNo" id="itemNo" type="text"
                                            style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                        <span class="font-weight-bold">ITEM NO<span class="text-danger">*</span></span>
                                    </label>
                                    <div id='item-error-message' class='text-danger text-sm'>
                                    </div>
                                </div>

                                <div class="col-5 col-lg-6">
                                    <label class="has-float-label divisionId mb-0">
                                          <select value="" class="form-control form-control-xs selectpicker" name="divisionId" data-live-search="true" id="divisionId" data-size="4" data-width="100%" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                                <option></option>
                                                @foreach($divisionedit as $divisionedits)
                                                    <option style="width:350px;" {{ $plantillaofposition->division_id == $divisionedits->division_id ? 'selected' : '' }} value="{{ $divisionedits->division_id }}">{{ $divisionedits->division_name }}</option>
                                                @endforeach
                                          </select>
                                          <span class="font-weight-bold">DIVISION<span class="text-danger">*</span></span>
                                    </label>
                                    <div id='division-error-message' class='text-danger text-sm'>
                                    </div>
                              </div>

                              <div class="col-5 col-lg-6">
                                <label class="has-float-label sectionId mb-0">
                                      <select value="" class="form-control form-control-xs selectpicker" name="sectionId" data-live-search="true" id="sectionId" data-size="4" data-width="100%" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                            <option></option>
                                            @foreach($sectionedit as $sectionedits)
                                                <option style="width:350px;" {{ $plantillaofposition->section_id == $sectionedits->section_id ? 'selected' : '' }} value="{{ $sectionedits->section_id }}">{{ $sectionedits->section_name }}</option>
                                            @endforeach
                                      </select>
                                      <span class="font-weight-bold">SECTION<span class="text-danger">*</span></span>
                                </label>
                                <div id='section-error-message' class='text-danger text-sm'>
                                </div>
                          </div>

                                <div class="col-6 col-md-6 col-lg-6">
                                    <label class="has-float-label positionTitle mb-0">
                                    <select value="" class="form-control form-control-xs selectpicker" name="positionTitle" data-live-search="true" id="positionTitle" data-size="4" data-width="100%" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                        <option></option>
                                        @foreach($position as $positions)
                                            <option data-position="{{ $positions }}" {{ $plantillaofposition->PosCode == $positions->PosCode ? 'selected' : '?? $plantillaofposition->PosCode' }} style="width:350px;" {{ old('positionTitle') == $positions->PosCode ? 'selected' : '' }} value="{{ $positions->PosCode}}">{{ $positions->Description }}</option>
                                        @endforeach
                                  </select>
                                        <span class="font-weight-bold">POSITION<span class="text-danger">*</span></span>
                                    </label>
                                    <div id='position-title-error-message' class='text-danger text-sm'>
                                    </div>
                                </div>

                                <div class="col-6 col-md-6 col-lg-6">
                                    <label class="has-float-label mb-0">
                                        <input
                                            value="{{ old('positionOldName') ?? $plantillaofposition->old_position_name }}"
                                            class="form-control"
                                            name="positionOldName" id="positionOldName" type="text" placeholder=""
                                            style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                        <span class="font-weight-bold">OLD POSITION NAME<span
                                                class="text-danger">*</span></span>
                                    </label>
                                    <div id='old-position-name-error-message' class='text-danger text-sm'>
                                    </div>
                                </div>

                                <div class="col-6 col-md-6 col-lg-6">
                                    <label class="has-float-label salaryGrade">
                                        <select value=""
                                            class="form-control selectpicker"
                                            name="salaryGrade" data-live-search="true" id="salaryGrade" data-size="4"
                                            data-width="100%"
                                            style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                            <option></option>
                                            @foreach (range(1 , 33) as $salarygrades)
                                            <option
                                                {{ $plantillaofposition->sg_no == $salarygrades ? 'selected' : '?? $plantillaofposition->sg_no' }}
                                                value="{{ $salarygrades}}">{{ $salarygrades}}</option>
                                            @endforeach
                                        </select>
                                        <span class="font-weight-bold">SALARY GRADE<span
                                                class="text-danger">*</span></span>
                                    </label>
                                    <div id='salary-grade-error-message' class='text-danger text-sm'>
                                    </div>
                                </div>

                                <div class=" col-6 col-md-6 col-lg-6">
                                    <label class="has-float-label areaCode mb-0">
                                        <select value="" class="form-control selectpicker" name="areaCode" data-live-search="true" id="areaCode" data-size="4" data-width="100%" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                                <option selected></option>
                                            @foreach($areacode as $areacodes)
                                            <option {{ $plantillaofposition->area_code == $areacodes->area_code_id ? 'selected' : '' }}  value="{{ $areacodes->area_code_id }}">{{ $areacodes->area_code_id }}</option>
                                            @endforeach
                                        </select>
                                        <span class="font-weight-bold">AREA CODE<span class="text-danger">*</span></span>
                                    </label>
                                    <div id='area-code-error-message' class='text-danger text-sm'>
                                    </div>
                            </div>

                            <div class=" col-6 col-md-6 col-lg-6">
                                <label class="has-float-label areaType mb-0">
                                    <select value="" class="form-control selectpicker" name="areaType" data-live-search="true" id="areaType" data-size="4" data-width="100%" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                            <option selected></option>
                                            @foreach($areatype as $areatypes)
                                            <option {{ $plantillaofposition->area_type == $areatypes->area_type_id ? 'selected' : '' }}  value="{{ $areatypes->area_type_id }}">{{ $areatypes->area_type_id }} - {{ $areatypes->description }}</option>
                                            @endforeach
                                    </select>
                                    <span class="font-weight-bold">AREA TYPE<span class="text-danger">*</span></span>
                                </label>
                                <div id='area-type-error-message' class='text-danger text-sm'>
                                </div>
                        </div>

                        <div class=" col-6 col-md-6 col-lg-6">
                            <label class="has-float-label areaLevel mb-0">
                                <select value="" class="form-control selectpicker" name="areaLevel" data-live-search="true" id="areaLevel" data-size="4" data-width="100%" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                        <option selected></option>
                                        @foreach($arealevel as $arealevels)
                                                <option {{ $plantillaofposition->area_level == $arealevels->area_level_id ? 'selected' : '' }}  value="{{ $arealevels->area_level_id }}">{{ $arealevels->area_level_id }} - {{ $arealevels->description }}</option>
                                        @endforeach
                                </select>
                                <span class="font-weight-bold">AREA LEVEL<span class="text-danger">*</span></span>
                            </label>
                            <div id='area-level-error-message' class='text-danger text-sm'>
                            </div>
                    </div>





                            <div class="form-group form-group submit-section col-12">
                                <button id="saveBtn" class="btn btn-success submit-btn float-right" type="submit">
                                    <span id="loading" class="spinner-border spinner-border-sm d-none" role="status"
                                        aria-hidden="false"></span>
                                        <i style="color:white;" class="fas fa-save"></i> <b style="color:white;" id="saving">Save</b>
                                </button>
                                <a href="/plantilla-of-position"><button style="margin-right:10px;" type="button"
                                        class="text-white btn btn-warning submit-btn float-right"><i
                                            class="fas fa-arrow-left"></i>
                                        Back</button></a>
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

    $("#editPlantillaPosition").submit(function (e) {
        e.preventDefault();
        let editId = $('#editId').val();
        let data = $(this).serialize();
        $("#saveBtn").attr("disabled", true);
        $("#loading").removeClass("d-none");
        $("#saving").html("Saving . . .");
        $.ajax({
            type: "PUT",
            url: `/plantilla-of-position/${editId}`,
            data: data,
            success: function (response) {
                if (response.success) {
                    $("#plantillaofposition").DataTable().ajax.reload();
                    swal("Sucessfully Saved!", "", "success");
                    $("#saveBtn").attr("disabled", false);
                    $("#loading").addClass("d-none");
                    document.getElementById("saving").innerHTML = "Save";
                    $("#saving").html("Save");
                    let errorClass = [
                        "#itemNo",
                        "#positionOldName",
                    ];
                    $.each(errorClass, function (index, value) {
                            $(`${value}`).removeClass("is-invalid");
                    });
                    let errorMessage = [
                        "#office-error-message",
                        "#item-error-message",
                        "#old-position-name-error-message",
                        "#salary-grade-error-message",
                    ];
                    $.each(errorMessage, function (index, value) {
                            $(`${value}`).html("");
                        });
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
                    if (errors.hasOwnProperty("salaryGrade")) {
                        $(".salaryGrade .dropdown").addClass("is-invalid");
                        $("#salary-grade-error-message").html("");
                        $("#salary-grade-error-message").append(
                            `<span>${errors.salaryGrade[0]}</span>`
                        );
                    } else {
                        $("#salaryGrade").removeClass("is-invalid");
                        $("#salary-grade-error-message").html("");
                    }
                    if (errors.hasOwnProperty("officeCode")) {
                        $(".officeCode .dropdown").addClass("is-invalid");
                        $("#office-error-message").html("");
                        $("#office-error-message").append(
                            `<span>${errors.officeCode[0]}</span>`
                        );
                    } else {
                        $("#officeCode").removeClass("is-invalid");
                        $("#office-error-message").html("");
                    }
                    if (errors.hasOwnProperty("positionOldName")) {
                        $("#positionOldName").addClass("is-invalid");
                        $("#old-position-name-error-message").html("");
                        $("#old-position-name-error-message").append(
                            `<span>${errors.positionOldName[0]}</span>`
                        );
                    } else {
                        $("#positionOldName").removeClass("is-invalid");
                        $("#old-position-name-error-message").html("");
                    }
                    if (errors.hasOwnProperty("areaCode")) {
                        $(".areaCode .dropdown").addClass("is-invalid");
                        $("#area-code-error-message").html("");
                        $("#area-code-error-message").append(
                            `<span>${errors.areaCode[0]}</span>`
                        );
                    } else {
                        $(".areaCode .dropdown").removeClass("is-invalid");
                        $("#area-code-error-message").html("");
                    }
                    if (errors.hasOwnProperty("areaType")) {
                        $(".areaType .dropdown").addClass("is-invalid");
                        $("#area-type-error-message").html("");
                        $("#area-type-error-message").append(
                            `<span>${errors.areaType[0]}</span>`
                        );
                    } else {
                        $(".areaType .dropdown").removeClass("is-invalid");
                        $("#area-type-error-message").html("");
                    }
                    if (errors.hasOwnProperty("areaLevel")) {
                        $(".areaLevel .dropdown").addClass("is-invalid");
                        $("#area-level-error-message").html("");
                        $("#area-level-error-message").append(
                            `<span>${errors.areaLevel[0]}</span>`
                        );
                    } else {
                        $(".areaLevel .dropdown").removeClass("is-invalid");
                        $("#area-level-error-message").html("");
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
                    $("#saving").html("Save");
                }
            },
        });
    });
    $(document).ready(function () {
        // get value of employees sg, sn, sp
    $("#positionTitle").change(function (e) {
        let position = $($("#positionTitle option:selected")[0]).attr(
            "data-position"
        );
        if (position != "") {
            position = JSON.parse(position);
            $("#salaryGrade").val(position.sg_no).change();
        } else {
            $("#salaryGrade").val("").change();
        }
    });
    // end get values of employees
    });





</script>
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/js/plantillaofposition.js') }}"></script>
@endpush
@endsection
