@extends('layouts.app')
@section('title', 'Edit Maintenance Section')
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
@endprepend
@prepend('meta-data')
<meta id="divisionMetaData" content="@foreach($division as $divisions){ |officeCode|:|{{ $divisions->office_code }}|, |divisionId|:|{{ $divisions->division_id }}|, |divisionName|:|{{ $divisions->division_name }}|}, @endforeach">
@endprepend
@section('content')
@include('Plantilla.add-ons.success')
<div class="kanban-board card shadow mb-0">
    <div class="card-body">
        <div id="add" class="page-header">
            <form action="{{ route('maintenance-section.update', $section->section_id) }}" method="post"
                id="maintenanceSectionEditForm">
                @csrf
                @method('PUT')
                <div class="alert alert-secondary text-center font-weight-bold" role="alert">EDIT SECTION</div>
                <div class="container">
                    <div class="row justify-content-center align-items-center">

                        <div class="form-group col-10 col-lg-7">
                            <label class="has-float-label officeCode mb-0">
                                 <select value="" class="form-control selectpicker  {{ $errors->has('officeCode')  ? 'is-invalid' : ''}}" name="officeCode" data-live-search="true" id="officeCode" data-size="4" data-width="100%" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                         <option></option>
                                          @foreach($office as $offices)
                                         <option {{ $section->office_code  == $offices->office_code ? 'selected' : '' }} value="{{ $offices->office_code }}">
                                             {{ $offices->office_name }}
                                         </option>
                                         @endforeach
                                 </select>
                                 <span class="font-weight-bold">Office<span class="text-danger">*</span></span>
                            </label>
                            <div id='office-code-error-message' class='text-danger text-sm'>
                            </div>
                       </div>

                        <div class="form-group col-10 col-lg-7">
                            <label class="has-float-label divisionId mb-0">
                                 <select value="" class="form-control selectpicker divisionId  {{ $errors->has('divisionId')  ? 'is-invalid' : ''}}" name="divisionId" data-live-search="true" id="divisionId" data-size="4" data-width="100%" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                         <option></option>
                                         @foreach($divisionedit as $divisionedits)
                                         <option {{ $section->division_id  == $divisionedits->division_id ? 'selected' : '' }} value="{{ $divisionedits->division_id }}">{{ $divisionedits->division_name }}</option>
                                         @endforeach
                                 </select>
                                 <span class="font-weight-bold">Division<span class="text-danger">*</span></span>
                            </label>
                            <div id='division-id-error-message' class='text-danger text-sm'>
                            </div>
                       </div>

                          <div class="form-group col-12 col-md-6 col-lg-7">
                               <label class="has-float-label mb-0">
                                <input value="{{ old('sectionName') ?? $section->section_name }}"
                                class="form-control {{ $errors->has('sectionName')  ? 'is-invalid' : ''}}"
                                    name="sectionName" id="sectionName" type="text" placeholder=""
                                    style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <span class="font-weight-bold">Section Name<span class="text-danger">*</span></span>
                               </label>
                               <div id='section-name-error-message' class='text-danger text-sm'>
                               </div>
                          </div>




                        <div class="form-group form-group submit-section col-12">
                            <button type="submit" class="btn btn-success text-white submit-btn float-right shadow"><i
                                    class="fas fa-check"></i> Update</button>
                            <a href="/maintenance-section"><button style="margin-right:10px;" type="button"
                                    class="text-white btn btn-warning submit-btn float-right shadow"><i
                                        class="fas fa-arrow-left"></i> Back</button>
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


// filter position and division by office
$("#officeCode").change(function (e) {
    //divisionMetaData
    if (document.querySelectorAll('[id="divisionMetaData"]')[1] == null) {
        var divisionMetaData = document
            .querySelectorAll('[id="divisionMetaData"]')[0]
            .content.replaceAll("|", '"');
    } else {
        var divisionMetaData = document
            .querySelectorAll('[id="divisionMetaData"]')[1]
            .content.replaceAll("|", '"');
    }
    var divisionMetaDataRemoveLast =
        "[" +
        divisionMetaData.substring(0, divisionMetaData.length - 2) +
        "]";
    let divisionOfficeCodeOptionAll = JSON.parse(
        divisionMetaDataRemoveLast
    );
    if (document.querySelectorAll('[id="divisionMetaData"]')[1] == null) {
        var metaDataDivision = document
            .querySelectorAll('[id="divisionMetaData"]')[0]
            .content.replaceAll("|", '"');
    } else {
        var metaDataDivision = document
            .querySelectorAll('[id="divisionMetaData"]')[1]
            .content.replaceAll("|", '"');
    }
    var metaDataDivisionRemoveLast =
        "[" +
        metaDataDivision.substring(0, metaDataDivision.length - 2) +
        "]";
    let divisionOptionAll = JSON.parse(metaDataDivisionRemoveLast);
    let officeCode2 = e.target.value;
    //filter all division data in plantilla//
    let plantillaDivisionFilter = divisionOfficeCodeOptionAll.filter(
        function (Division) {
            return Division.officeCode == officeCode2;
        }
    );
    //Remove all option in #divisionId//
    function removeOptionsDivision(selectDivision) {
        var ii,
            L = selectDivision.options.length - 1;
        for (ii = L; ii >= 0; ii--) {
            selectDivision.remove(ii);
        }
    }
    removeOptionsDivision(document.getElementById("divisionId"));
    //add division data based in what you select in #officeCode//
    var i,
        plantillaLengthDivisionId = plantillaDivisionFilter.length;
    $("#divisionId").append("<option></option>");
    for (i = 0; i < plantillaLengthDivisionId; i++) {
        var plantillaDivisionFilter_final = plantillaDivisionFilter[i];
        //filter all division data//
        let divisionIdFilter = divisionOptionAll.filter(function (
            Division
        ) {
            return (
                Division.officeCode ==
                plantillaDivisionFilter_final.officeCode
            );
        });
        $("#divisionId").append(
            '<option value="' +
                divisionIdFilter[i].divisionId +
                '">' +
                divisionIdFilter[i].divisionName +
                "</option>"
        );
    }
    $("#divisionId").selectpicker("refresh");
});

</script>
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/js/maintenance-section.js') }}"></script>
@endpush
@endsection
