@extends('layouts.app')
{{-- @section('title', 'Plantilla Of Personnel') --}}
@section('title', 'PLANTILLA OF PERSONNEL')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('/assets/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<script src="https://use.fontawesome.com/78c056906b.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
    .swal-content ul {
        list-style-type: none;
        padding: 0;
    }

    .swal-content ul {
        list-style-type: none;
        padding: 0;
    }
    table.dataTable.no-footer {
        border: 1px solid #dee2e6;
    }
    table.dataTable thead th,
    table.dataTable thead td {
        padding: 15px 25px;
        border-bottom: 1px solid #dee2e6;
    }
    table.dataTable {
        border-collapse: collapse;
    }
    .btn-primarys{
        background-color:#FF9B44;
        color: white;
    }
    .btn-primarys:hover {
    background-color: #FF8544;
    color: white;
    }
    .page-item.active .page-link {
    background-color: #FF9B44 !important;
    border: 1px solid #FF9B44;
}
.page-item.active .page-link:hover{
    background-color: #FF8544 !important;
    border: 1px solid #FF8544;
}

</style>
@endprepend

@prepend('meta-data')
<meta id="plantillaPositionMetaData" content="@foreach($plantillaPosition as $plantillaPositions){ |officeCode|:|{{ $plantillaPositions->office_code }}|, |positionId|:|{{ $plantillaPositions->PosCode }}|, |ppId|:|{{ $plantillaPositions->pp_id }}|}, @endforeach">
<meta id="positionMetaData" content="@foreach($position as $positions){ |positionId|:|{{ $positions->PosCode }}|, |positionName|:|{{ $positions->Description }}|}, @endforeach">
<meta id="divisionMetaData" content="@foreach($division as $divisions){ |officeCode|:|{{ $divisions->office_code }}|, |divisionId|:|{{ $divisions->division_id }}|, |divisionName|:|{{ $divisions->division_name }}|}, @endforeach">
@endprepend
@section('content')
<div class="kanban-board card shadow mb-0">
    <div class="card-body">
        <div id="add" class="page-header {{  count($errors->all())  !== 0 ?  '' : 'd-none' }}">
            <div style='padding-bottom:50px;'>
                <button id="displayListPlantilla" class="btn btn-primarys submit-btn float-right shadow"><i
                        class="fa fa-list"></i>
                    Personnel List</button>
            </div>
        <div class="alert alert-secondary font-weight-bold text-center">ADD NEW PLANTILLA OF PERSONNEL</div>
            <form action="/plantilla" method="post" id="plantillaForm">
                @csrf
                <div class="row">

                    <div class="form-group col-12 col-lg-10">
                        <label>Employee Name<span class="text-danger">*</span></label>
                        <select value=""
                            class="form-control employeeName selectpicker"
                            name="employeeName" data-live-search="true" id="employeeName" data-size="5">
                            <option></option>
                            @foreach($employee as $employees)
                            <option data-plantilla="{{ $employees->Employee_id }}"
                                {{ old('employeeName') == $employees->Employee_id ? 'selected' : '' }}
                                value="{{ $employees->Employee_id }}"> {{ $employees->fullname }}</option>
                            @endforeach
                        </select>
                        <div id='employee-name-error-message' class='text-danger text-sm'>
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-2">
                        <label>Employee ID</label>
                        <input value="{{ old('employeeID') }}"
                            class="form-control" name="employeeID"
                            id="employeeID" type="text" readonly>
                    </div>

                    <div class="form-group col-12 col-lg-6">
                        <label>Office<span class="text-danger">*</span></label>
                        <select value=""
                            class="form-control officeCode selectpicker"
                            name="officeCode" data-live-search="true" id="officeCode" data-size="5">
                            <option></option>
                            @foreach($office as $offices)
                            <option {{ old('officeCode') == $offices->office_code ? 'selected' : '' }} value="{{ $offices->office_code }}">
                                {{ $offices->office_name }}</option>
                            @endforeach
                        </select>
                        <div id='office-error-message' class='text-danger text-sm'>
                        </div>
                    </div>


                    <div class="form-group col-12 col-lg-6">
                        <label>Division<span class="text-danger">*</span></label>
                        <select value=""
                            class="form-control divisionId selectpicker"
                            name="divisionId" data-live-search="true" id="divisionId" data-size="5">
                            <option></option>
                        </select>
                        <div id='division-error-message' class='text-danger text-sm'>
                        </div>
                    </div>


                    <div class="form-group col-12 col-lg-6">
                        <label>Position<span class="text-danger">*</span></label>
                        <select value=""
                            class="form-control positionTitle selectpicker"
                            name="positionTitle" data-live-search="true" id="positionTitle" data-size="5" data-width="100%">
                            <option></option>
                        </select>
                        <div id='position-title-error-message' class='text-danger text-sm'>
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-6">
                        <label>Status<span class="text-danger">*</span></label>
                        <select value=""
                            class="form-control status selectpicker"
                            name="status" data-live-search="true" id="status" data-size="5" data-width="100%">
                            <option></option>
                            @foreach(range(0, 4) as $statuses)
                            @if($status[$statuses] == old('status'))
                            <option value="{{ $status[$statuses]}}" selected>{{ $status[$statuses] }}</option>
                            @else
                            <option value="{{ $status[$statuses]}}">{{ $status[$statuses] }}</option>
                            @endif
                            @endforeach
                        </select>
                        <div id='status-error-message' class='text-danger text-sm'>
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-6">
                        <label>Item No<span class="text-danger">*</span></label>
                        <input value="{{ old('itemNo') }}"
                            class="form-control {{ $errors->has('itemNo')  ? 'is-invalid' : ''}}" name="itemNo"
                            id="itemNo" type="text" placeholder="" readonly>
                        <div id='item-no-error-message' class='text-danger text-sm'>
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-6">
                        <label>Old Item No</label>
                        <input value="{{ old('oldItemNo') }}"
                            class="form-control" name="oldItemNo"
                            id="oldItemNo" type="text" placeholder="(optional)">
                        <div id='old_item-no-error-message' class='text-danger'>
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-3">
                        <label>Current Salary Grade Year<span class="text-danger">*</span></label>
                        <input value="{{ old('currentSgyear') ?? now()->year }}" class="form-control" name="currentSgyear"
                            id="currentSgyear" type="text" readonly>
                        <div id='year-error-message' class='text-danger text-sm'>
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-3">
                        <label>Salary Grade<span class="text-danger">*</span></label>
                        <input value="{{ old('salaryGrade') }}" class="form-control" name="salaryGrade"
                            id="currentSalarygrade" type="text" readonly>
                        <div id='salary-grade-error-message' class='text-danger text-sm'>
                        </div>
                    </div>


                    <div class="form-group col-12 col-lg-3">
                        <label>Steps<span class="text-danger">*</span></label>
                        <select value=""
                            class="form-control stepNo selectpicker"
                            name="stepNo" data-live-search="true" id="currentStepno" data-size="5" data-width="100%">
                            <option></option>
                            @foreach (range(1, 8) as $step_no)
                            <option {{ old('stepNo') == $step_no ? 'selected' : '' }} value="{{ $step_no}}">{{ $step_no}}</option>
                            @endforeach
                        </select>
                        <div id='steps-error-message' class='text-danger text-sm'>
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-3">
                        <label>Salary Amount<span class="text-danger">*</span></label>
                        <input value="{{ old('salaryAmount') }}"
                            class="form-control" name="salaryAmount"
                            id="currentSalaryamount" type="text" readonly>
                        <div id='salary-amount-error-message' class='text-danger text-sm'>
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-6">
                        <label>Original Appointment<span class="text-danger">*</span></label>
                        <input value="{{ old('originalAppointment') }}"
                            class="form-control" name="originalAppointment"
                            type="date" id="originalAppointment">
                        <div id='original-appointment-error-message' class='text-danger text-sm'>
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-6">
                        <label>Last Promotion<span class="text-danger">*</span></label>
                        <input value="{{ old('lastPromotion') }}"
                            class="form-control" name="lastPromotion" type="date"
                            id="lastPromotion">
                        <div id='last-promotion-error-message' class='text-danger text-sm'>
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-4">
                        <label>Area Code<span class="text-danger">*</span></label>
                        <select value=""
                            class="form-control areaCode selectpicker"
                            name="areaCode" data-live-search="true" id="areaCode" data-size="5">
                            <option></option>
                            @foreach(range(0, 15) as $areacodes)
                            @if($areacode[$areacodes] == 'CARAGA')
                            <option value="{{ $areacode[$areacodes]}}" selected>{{ $areacode[$areacodes] }}</option>
                            @else
                            <option value="{{ $areacode[$areacodes]}}">{{ $areacode[$areacodes] }}</option>
                            @endif
                            @endforeach
                        </select>
                        <div id='area-code-error-message' class='text-danger text-sm'>
                        </div>
                    </div>


                    <div class="form-group col-12 col-lg-4">
                        <label>Area Type<span class="text-danger">*</span></label>
                        <select value=""
                            class="form-control areaType selectpicker"
                            name="areaType" data-live-search="true" id="areaType" data-size="5">
                            <option></option>
                            @foreach(range(0, 4) as $areatypes)
                            @if($areatype[$areatypes] == 'Province')
                            <option value="{{ $areatype[$areatypes]}}" selected>{{ $areatype[$areatypes] }}</option>
                            @else
                            <option value="{{ $areatype[$areatypes]}}">{{ $areatype[$areatypes] }}</option>
                            @endif
                            @endforeach
                        </select>
                        <div id='area-type-error-message' class='text-danger text-sm'>
                        </div>
                    </div>


                    <div class="form-group col-12 col-lg-4">
                        <label>Area Level<span class="text-danger">*</span></label>
                        <select value=""
                            class="form-control areaLevel selectpicker"
                            name="areaLevel" data-live-search="true" id="areaLevel" data-size="5">
                            <option></option>
                            @foreach(range(0, 3) as $arealevels)
                            @if($arealevel[$arealevels] == 'A')
                            <option value="{{ $arealevel[$arealevels]}}" selected>{{ $arealevel[$arealevels] }}</option>
                            @else
                            <option value="{{ $arealevel[$arealevels]}}">{{ $arealevel[$arealevels] }}</option>
                            @endif
                            @endforeach
                        </select>
                        <div id='area-level-error-message' class='text-danger text-sm'>
                        </div>
                    </div>


                        <div class="form-group form-group submit-section col-12">
                            <button id="saveBtn" class="btn btn-primarys submit-btn float-right shadow" type="submit">
                                <span id="loading" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="false"></span>
                                <i class="fas fa-save"></i> <b id="saving">Save</b>
                            </button>
                            <button style="margin-right:10px;" type="button" id="cancelButton"
                                class="text-white btn btn-danger submit-btn float-right shadow"><i class="fas fa-ban"></i> Cancel</button>
                        </div>
                    </div>
                    </form>
                    </div>

                    <div id="table" class="page-header {{  count($errors->all()) == 0 ? '' : 'd-none' }}">
                        <div class="row">
                            <div class="col-5 mb-2">
                                <select value="" data-style="btn-primarys text-white" class="form-control form-control-xs selectpicker {{ $errors->has('employeeOffice')  ? 'is-invalid' : ''}}"
                                    name="employeeOffice" data-live-search="true" id="employeeOffice" data-size="5">
                                    <option value="*">All</option>
                                    @foreach($office as $offices){
                                        <option {{ '10001' == $offices->office_code ? 'selected' : '' }} value="{{ $offices->office_code }}">{{ $offices->office_name }}</option>
                                    }
                                    @endforeach
                                    </select>
                            </div>

                            <div class="col-2 mb-2">
                                <select value="" data-style="btn-primarys text-white" class="form-control form-control-xs selectpicker {{ $errors->has('employeeOffice')  ? 'is-invalid' : ''}}"
                                    name="currentYear" data-live-search="true" id="currentYear" data-size="5">
                                    @foreach($year as $years){
                                        <option {{ $selectedYear->year == $years->year ? 'selected' : '' }} value="{{ $years->year }}">{{ $years->year }}</option>
                                    }
                                    @endforeach
                                    </select>
                            </div>

                    <div class="col-5 float-right mb-10">
                        <button id="addButton" class="btn btn-primarys submit-btn float-right"><i class="fa fa-plus"></i> Add
                            Plantilla of Personnel</button>
                    </div>
                </div>

                    <div class="table">
                        <table class="table table-bordered table-hover text-center" id="plantilla" style="width:100%;">
                            <thead>
                                <tr>
                                    <td scope="col" class="text-center">Employee Name</td>
                                    <td scope="col" class="text-center">Position Title</td>
                                    <td scope="col" class="text-center">Office</td>
                                    <td scope="col" class="text-center">Item No</td>
                                    <td scope="col" class="text-center">Status</td>
                                    <td scope="col" class="text-center">Year</td>
                                    <td scope="col" class="text-center">Action</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                <div class="result">
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
</script>
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="{{ asset('/assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/assets/js/plantilla.js') }}"></script>
@endpush
@endsection
