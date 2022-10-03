@extends('layouts.app')
@section('title', 'Edit Plantilla Schedule')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('/css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endprepend
@prepend('meta-data')
<meta id="plantillaPositionMetaData" content="@foreach($plantillaSchedulePositionAll as $plantillaSchedulePositionAlls){ |officeCode|:|{{ $plantillaSchedulePositionAlls->office_code }}|, |positionId|:|{{ $plantillaSchedulePositionAlls->position_id }}|, |ppId|:|{{ $plantillaSchedulePositionAlls->pp_id }}|}, @endforeach">
<meta id="positionMetaData" content="@foreach($position as $positions){ |positionId|:|{{ $positions->position_id }}|, |positionName|:|{{ $positions->position_name }}|}, @endforeach">
<meta id="divisionMetaData" content="@foreach($division as $divisions){ |officeCode|:|{{ $divisions->office_code }}|, |divisionId|:|{{ $divisions->division_id }}|, |divisionName|:|{{ $divisions->division_name }}|}, @endforeach">
@endprepend
@section('content')
<div class="content">
    @include('Plantilla.add-ons.success')

    <div class="kanban-board card mb-0">
        <div class="card-body">
            <div id="add" class="page-header {{  count($errors->all())  !== 0 }}">
                <form action="{{ route('plantilla-of-schedule.update', $plantillaSchedule->ps_id) }}" method="post"
                    id="plantillaScheduleEditForm">
                    @csrf
                    @method('PUT')
                    <div class="row">

                        <div class="col-12">
                            <div class="alert alert-secondary text-center font-weight-bold" role="alert">EDIT PLANTILLA
                                SCHEDULE</div>
                        </div>

                        <div class="form-group col-12 col-lg-10">
                            <label>Employee Name<span class="text-danger">*</span></label>
                            <select value="{{ old('employeeName') }}"
                                class="form-control form-control-xs selectpicker {{ $errors->has('employeeName')  ? 'is-invalid' : ''}}"
                                name="employeeName" data-live-search="true" id="employeeName" data-size="5" disabled>
                                <option></option>
                                @foreach($employee as $employees)
                                <option {{ $plantillaSchedule->employee_id == $employees->employee_id ? 'selected' : '' }}
                                    value="{{ $employees->employee_id }}"> {{ $employees->lastname }},
                                    {{ $employees->firstname }} {{ $employees->middlename }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('employeeName'))
                            <small class="form-text text-danger">
                                {{ $errors->first('employeeName') }} </small>
                            @endif
                        </div>

                        <div class="form-group col-12 col-lg-2">
                            <label>Employee Id<span class="text-danger">*</span></label>
                            <input value="{{ old('employeeId')  ?? $plantillaSchedule->employee_id  }}"
                                class="form-control {{ $errors->has ('employeeId')  ? 'is-invalid' : ''}}"
                                name="employeeId" type="text" readonly>
                        </div>

                        <div class="form-group col-12 col-lg-6">
                            <label>Item No<span class="text-danger">*</span></label>
                            <input value="{{ old('itemNo')  ?? $plantillaSchedule->item_no  }}"
                                class="form-control {{ $errors->has('itemNo')  ? 'is-invalid' : ''}}" name="itemNo"
                                id="num-only" type="text" placeholder="Item No.">
                            @if($errors->has('itemNo'))
                            <small class="form-text text-danger">
                                {{ $errors->first('itemNo') }} </small>
                            @endif
                        </div>

                        <div class="form-group col-12 col-lg-6">
                            <label>Old Item No<span class="text-danger">*</span></label>
                            <input value="{{ old('oldItemNo') ?? $plantillaSchedule->old_item_no}}"
                                class="form-control {{ $errors->has ('oldItemNo')  ? 'is-invalid' : ''}}"
                                name="oldItemNo" id="num-only" type="text" placeholder="Old Item No">
                            @if($errors->has('oldItemNo'))
                            <small class="form-text text-danger">
                                {{ $errors->first('oldItemNo') }} </small>
                            @endif
                        </div>


                        <div class="form-group col-12 col-lg-6">
                            <label>Office<span class="text-danger">*</span></label>
                            <select value=""
                                class="form-control selectpicker {{ $errors->has('officeCode')  ? 'is-invalid' : ''}}"
                                name="officeCode" data-live-search="true" id="officeCode" data-size="5">
                                <option></option>
                                @foreach($office as $offices)
                                <option {{ $plantillaSchedule->office_code == $offices->office_code ? 'selected' : '' }}
                                    value="{{ $offices->office_code}}">
                                    {{ $offices->office_name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('officeCode'))
                            <small class="form-text text-danger">
                                {{ $errors->first('officeCode') }} </small>
                            @endif
                        </div>

                        <div class="form-group col-12 col-lg-6">
                            <label>Division<span class="text-danger">*</span></label>
                            <select value=""
                                class="form-control selectpicker {{ $errors->has('divisionId')  ? 'is-invalid' : ''}}"
                                name="divisionId" data-live-search="true" id="divisionId" data-size="5">
                                <option></option>
                                @foreach($division as $divisions)
                                <option {{ $plantillaSchedule->division_id == $divisions->division_id ? 'selected' : '' }}
                                    value="{{ $divisions->division_id }}">{{ $divisions->division_name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('divisionId'))
                            <small class="form-text text-danger">
                                {{ $errors->first('divisionId') }} </small>
                            @endif
                        </div>



                        <div class="form-group col-12 col-lg-6">
                            <label>Position<span class="text-danger">*</span></label>
                            <select value="{{ old('positionTitle') }}"
                                class="form-control form-control-xs selectpicker  {{ $errors->has('positionTitle')  ? 'is-invalid' : ''}}"
                                name="positionTitle" data-live-search="true" id="positionTitle" data-size="5" data-width="100%">
                                <option></option>
                                @foreach($plantillaSchedulePositionAll as $plantillaSchedulePositionAlls)
                                <option {{ $plantillaSchedule->pp_id == $plantillaSchedulePositionAlls->pp_id ? 'selected' : '' }} value="{{ $plantillaSchedulePositionAlls->pp_id }}">
                                    {{ $plantillaSchedulePositionAlls->position->position_name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('positionTitle'))
                            <small class="form-text text-danger">
                                {{ $errors->first('positionTitle') }} </small>
                            @endif
                        </div>

                        <div class="form-group col-12 col-lg-6">
                            <label>Status<span class="text-danger">*</span></label>
                            <select value="{{ old('status') }}" name="status"
                                class="select {{ $errors->has('status')  ? 'is-invalid' : ''}}">
                                @foreach(range(0, 10) as $statuses)
                                @if($status[$statuses] == $plantillaSchedule->status)
                                <option value="{{ $status[$statuses]}}" selected>{{ $status[$statuses] }}</option>
                                @else
                                <option value="{{ $status[$statuses]}}">{{ $status[$statuses] }}</option>
                                @endif
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                            <small class="form-text text-danger">
                                {{ $errors->first('status') }} </small>
                            @endif
                        </div>

                        <div class="form-group col-12 col-lg-3">
                            <label>Current Salary Grade Year<span class="text-danger">*</span></label>
                                <input value="{{ old('currentSgyear')  ?? $plantillaSchedule->year  }}"
                                class="form-control {{ $errors->has('currentSgyear')  ? 'is-invalid' : ''}}" name="currentSgyear"
                                id="num-only" type="text" placeholder="Item No." readonly>
                            @if($errors->has('currentSgyear'))
                            <small class="form-text text-danger">
                                {{ $errors->first('currentSgyear') }} </small>
                            @endif
                        </div>

                        <div class="form-group col-12 col-lg-3">
                            <label>Steps<span class="text-danger">*</span></label>
                            <select name="stepNo" id="currentStepno" value="{{ old('stepNo') }}"
                                class="select floating {{ $errors->has('stepNo')  ? 'is-invalid' : ''}}">
                                <option>Please Select</option>
                                @foreach (range(1, 8) as $step_no)
                                <option {{ $plantillaSchedule->step_no == $step_no ? 'selected' : '' }} value="{{ $step_no}}">
                                    {{ $step_no}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('stepNo'))
                            <small class="form-text text-danger">
                                {{ $errors->first('stepNo') }} </small>
                            @endif
                        </div>

                        <div class="form-group col-12 col-lg-3">
                            <label>Salary Grade<span class="text-danger">*</span></label>
                            <input value="{{ old('salaryGrade')  ?? $plantillaSchedule->sg_no }}"
                                class="form-control {{ $errors->has('')  ? 'is-invalid' : ''}}" name="salaryGrade"
                                id="currentSalarygrade" type="text" readonly>
                        </div>

                        <div class="form-group col-12 col-lg-3">
                            <label>Salary Amount<span class="text-danger">*</span></label>
                            <input value="{{ old('salaryAmount') ?? $plantillaSchedule->salary_amount  }}"
                                class="form-control {{ $errors->has('salaryAmount')  ? 'is-invalid' : ''}}"
                                name="salaryAmount" id="currentSalaryamount" type="text" readonly>
                            @if($errors->has('salaryAmount'))
                            <small class="form-text text-danger">
                                {{ $errors->first('salaryAmount') }} </small>
                            @endif
                        </div>

                        <div class="form-group col-12 col-lg-6">
                            <label>Original Appointment<span class="text-danger">*</span></label>
                            <input value="{{ old('originalAppointment')  ?? $plantillaSchedule->date_original_appointment  }}"
                                class="form-control {{ $errors->has('originalAppointment')  ? 'is-invalid' : ''}}"
                                name="originalAppointment" type="date">
                            @if($errors->has('originalAppointment'))
                            <small class="form-text text-danger">
                                {{ $errors->first('originalAppointment') }} </small>
                            @endif
                        </div>

                        <div class="form-group col-12 col-lg-6">
                            <label>Last Promotion<span class="text-danger">*</span></label>
                            <input value="{{ old('lastPromotion') ?? $plantillaSchedule->date_last_promotion  }}"
                                class="form-control {{ $errors->has('lastPromotion')  ? 'is-invalid' : ''}}"
                                name="lastPromotion" type="date">
                            @if($errors->has('lastPromotion'))
                            <small class="form-text text-danger">
                                {{ $errors->first('lastPromotion') }} </small>
                            @endif
                        </div>

                        <div class="form-group col-12 col-lg-4">
                            <label>Area Code<span class="text-danger">*</span></label>
                            <select name="areaCode" value="{{ old('areaCode') }}"
                                class="select floating {{ $errors->has('areaCode')  ? 'is-invalid' : ''}}">
                                @foreach(range(0, 16) as $areacodes)
                                @if($areacode[$areacodes] == $plantillaSchedule->area_code)
                                <option value="{{ $areacode[$areacodes]}}" selected>{{ $areacode[$areacodes] }}</option>
                                @else
                                <option value="{{ $areacode[$areacodes]}}">{{ $areacode[$areacodes] }}</option>
                                @endif
                                @endforeach
                            </select>
                            @if($errors->has('areaCode'))
                            <small class="form-text text-danger">
                                {{ $errors->first('areaCode') }} </small>
                            @endif
                        </div>

                        <div class="form-group form-group col-12 col-lg-4">
                            <label>Area Type<span class="text-danger">*</span></label>
                            <select name="areaType" value="{{ old('areaType') }}"
                                class="select floating {{ $errors->has('areaType')  ? 'is-invalid' : ''}}">
                                @foreach(range(0, 5) as $areatypes)
                                @if($areatype[$areatypes] == $plantillaSchedule->area_type)
                                <option value="{{ $areatype[$areatypes]}}" selected>{{ $areatype[$areatypes] }}</option>
                                @else
                                <option value="{{ $areatype[$areatypes]}}">{{ $areatype[$areatypes] }}</option>
                                @endif
                                @endforeach
                            </select>
                            @if($errors->has('areaType'))
                            <small class="form-text text-danger">
                                {{ $errors->first('areaType') }} </small>
                            @endif
                        </div>

                        <div class="form-group form-group col-12 col-lg-4">
                            <label>Area Level<span class="text-danger">*</span></label>
                            <select name="areaLevel" value="{{ old('areaLevel') }}"
                                class="select floating {{ $errors->has('areaLevel')  ? 'is-invalid' : ''}}">
                                @foreach(range(0, 4) as $arealevels)
                                @if($arealevel[$arealevels] == $plantillaSchedule->area_level)
                                <option value="{{ $arealevel[$arealevels]}}" selected>{{ $arealevel[$arealevels] }}
                                </option>
                                @else
                                <option value="{{ $arealevel[$arealevels]}}">{{ $arealevel[$arealevels] }}</option>
                                @endif
                                @endforeach
                            </select>
                            @if($errors->has('areaLevel'))
                            <small class="form-text text-danger">
                                {{ $errors->first('areaLevel') }} </small>
                            @endif
                        </div>

                        <div class="form-group form-group submit-section col-12">
                            <button type="submit" class="btn btn-success submit-btn float-right shadow"><i
                                    class="fas fa-check"></i> Update</button>
                            <a href="/plantilla-of-schedule"><button style="margin-right:10px;" type="button"
                                    class="text-white btn btn-warning submit-btn float-right shadow"><i
                                    class="fas fa-arrow-left"></i> Back</button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('Plantilla.add-ons.plantillamodal')
@push('page-scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //  filter position by office
$(document).ready(function() {
    $("#officeCode").change(function(e) {
        //plantillaPositionMetaData
        if (
            document.querySelectorAll('[id="plantillaPositionMetaData"]')[1] ==
            null
        ) {
            var plantillaMetaData = document
                .querySelectorAll('[id="plantillaPositionMetaData"]')[0]
                .content.replaceAll("|", '"');
        } else {
            var plantillaMetaData = document
                .querySelectorAll('[id="plantillaPositionMetaData"]')[1]
                .content.replaceAll("|", '"');
        }
        var plantillaMetaDataRemoveLast =
            "[" +
            plantillaMetaData.substring(0, plantillaMetaData.length - 2) +
            "]";
        let plantillaPositionOptionAll = JSON.parse(
            plantillaMetaDataRemoveLast
        );
        //positionMetaData
        if (document.querySelectorAll('[id="positionMetaData"]')[1] == null) {
            var metaData = document
                .querySelectorAll('[id="positionMetaData"]')[0]
                .content.replaceAll("|", '"');
        } else {
            var metaData = document
                .querySelectorAll('[id="positionMetaData"]')[1]
                .content.replaceAll("|", '"');
        }
        var metaDataRemoveLast =
            "[" + metaData.substring(0, metaData.length - 2) + "]";
        let positionOptionAll = JSON.parse(metaDataRemoveLast);
        let officeCode = e.target.value;
        //filter all position data in plantilla Schedule//
        let plantillaPositionIdFilter = plantillaPositionOptionAll.filter(
            function(position) {
                return position.officeCode == officeCode;
            }
        );
        //Remove all option in #positionTitle//
        function removeOptionsPosition(selectPosition) {
            var ii,
                L = selectPosition.options.length - 1;
            for (ii = L; ii >= 0; ii--) {
                selectPosition.remove(ii);
            }
        }
        removeOptionsPosition(document.getElementById("positionTitle"));
        //add position data based in what you select in #officeCode//
        var i,
            plantillaLengthPositionId = plantillaPositionIdFilter.length;
        $("#positionTitle").append("<option></option>");
        for (i = 0; i < plantillaLengthPositionId; i++) {
            var plantillaPositionIdFilter_final = plantillaPositionIdFilter[i];
            //filter all position data//
            let positionIdFilter = positionOptionAll.filter(function(position) {
                return (
                    position.positionId ==
                    plantillaPositionIdFilter_final.positionId
                );
            });
            $("#positionTitle").append(
                '<option value="' +
                    plantillaPositionIdFilter_final.ppId +
                    '">' +
                    positionIdFilter[0].positionName +
                    "</option>"
            );
        }
        $("#positionTitle").selectpicker("refresh");

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
            function(Division) {
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
            //filter all position data//
            let divisionIdFilter = divisionOptionAll.filter(function(Division) {
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
});
</script>
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/js/plantilla-of-schedule.js') }}"></script>
@endpush
@endsection
