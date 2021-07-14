@extends('layouts.app')
{{-- @section('title', 'Plantilla Of Personnel') --}}
@section('title', 'Add New Plantilla of Personnel')
@prepend('page-css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<script src="https://use.fontawesome.com/78c056906b.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
    .swal-content ul {
        list-style-type: none;
        padding: 0;
    }

</style>
@endprepend

@prepend('meta-data')
<meta id="plantillaPositionMetaData" content="@foreach($plantillaPosition as $plantillaPositions){ |officeCode|:|{{ $plantillaPositions->office_code }}|, |positionId|:|{{ $plantillaPositions->position_id }}|, |ppId|:|{{ $plantillaPositions->pp_id }}|}, @endforeach">
<meta id="positionMetaData" content="@foreach($position as $positions){ |positionId|:|{{ $positions->position_id }}|, |positionName|:|{{ $positions->position_name }}|}, @endforeach">
<meta id="divisionMetaData" content="@foreach($division as $divisions){ |officeCode|:|{{ $divisions->office_code }}|, |divisionId|:|{{ $divisions->division_id }}|, |divisionName|:|{{ $divisions->division_name }}|}, @endforeach">
@endprepend
@section('content')
<div class="kanban-board card shadow mb-0">
    <div class="card-body">
        <div id="add" class="page-header {{  count($errors->all())  !== 0 ?  '' : 'd-none' }}">
            <div style='padding-bottom:50px;margin-right:-15px;' class="col-auto ml-auto">
                <button id="cancelbutton" class="btn btn-primary submit-btn float-right shadow"><i
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
                            class="form-control selectpicker {{ $errors->has('employeeName')  ? 'is-invalid' : ''}}"
                            name="employeeName" data-live-search="true" id="employeeName" data-size="5">
                            <option></option>
                            @foreach($employee as $employees)
                            <option data-plantilla="{{ $employees->employee_id }}"
                                {{ old('employeeName') == $employees->employee_id ? 'selected' : '' }}
                                value="{{ $employees->employee_id }}"> {{ $employees->firstname }}
                                {{ $employees->middlename }} {{ $employees->lastname }}</option>
                            @endforeach
                        </select>
                        <div id='employee-name-error-message' class='text-danger text-sm'>
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-2">
                        <label>Employee ID</label>
                        <input value="{{ old('employeeID') }}"
                            class="form-control {{ $errors->has('employeeID')  ? 'is-invalid' : ''}}" name="employeeID"
                            id="employeeID" type="text" readonly>
                    </div>

                    <div class="form-group col-12 col-lg-6">
                        <label>Office<span class="text-danger">*</span></label>
                        <select value=""
                            class="form-control selectpicker {{ $errors->has('officeCode')  ? 'is-invalid' : ''}}"
                            name="officeCode" data-live-search="true" id="officeCode" data-size="5">
                            <option></option>
                            @foreach($office as $offices)
                            <option {{ old('officeCode') == $offices->office_code ? 'selected' : '' }} value="{{ $offices->office_code}}">
                                {{ $offices->office_name }}</option>
                            @endforeach
                        </select>
                        <div id='office-error-message' class='text-danger text-sm'>
                        </div>
                    </div>


                    <div class="form-group col-12 col-lg-6">
                        <label>Division<span class="text-danger">*</span></label>
                        <select value=""
                            class="form-control selectpicker {{ $errors->has('divisionId')  ? 'is-invalid' : ''}}"
                            name="divisionId" data-live-search="true" id="divisionId" data-size="5">
                            <option></option>

                        </select>
                        <div id='division-error-message' class='text-danger text-sm'>
                        </div>
                    </div>


        <div class="form-group col-12 col-lg-6">
            <label>Position<span class="text-danger">*</span></label>
            <select value=""
                class="form-control selectpicker  {{ $errors->has('positionTitle')  ? 'is-invalid' : ''}}"
                name="positionTitle" data-live-search="true" id="positionTitle" data-size="5" data-width="100%">
                <option></option>

            </select>
            <div id='position-title-error-message' class='text-danger text-sm'>
            </div>
        </div>

        <div class="form-group col-12 col-lg-6">
            <label>Status<span class="text-danger">*</span></label>
            <select value="" name="status" class="select {{ $errors->has('status')  ? 'is-invalid' : ''}}" id="status">
                @foreach(range(0, 10) as $statuses)
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
                class="form-control {{ $errors->has('oldItemNo')  ? 'is-invalid' : ''}}" name="oldItemNo"
                id="oldItemNo" type="text" placeholder="(optional)">
            <div id='old_item-no-error-message' class='text-danger'>
            </div>
        </div>

        <div class="form-group col-12 col-lg-3">
            <label>Current Salary Grade Year<span class="text-danger">*</span></label>
            <select name="currentSgyear" id="currentSgyear" value="" class="select floating">
                {{ $year2 = date("Y",strtotime("-1  year")) }}
                <option {{ old('sgYear') == $year2 ? 'selected' : '' }} value={{ $year2 }}>{{ $year2 }}
                </option>
                {{ $year3 = date("Y",strtotime("-0 year")) }}
                <option {{ old('sgYear') == $year3 ? '' : 'selected' }} value={{ $year3 }}>{{ $year3 }}
                </option>
                @foreach (range(1, 3) as $year)
                {{ $year1 = date("Y",strtotime("$year year")) }}
                <option {{ old('sgYear') == $year1 ? 'selected' : '' }} value={{ $year1 }}>{{ $year1 }}
                </option>
                @endforeach
            </select>
            <div id='year-error-message' class='text-danger text-sm'>
            </div>
        </div>

    <div class="form-group col-12 col-lg-3">
        <label>Salary Grade<span class="text-danger">*</span></label>
        <input value="{{ old('') }}" class="form-control {{ $errors->has('')  ? 'is-invalid' : ''}}" name="salaryGrade"
            id="currentSalarygrade" type="text" readonly>
        <div id='salary-grade-error-message' class='text-danger text-sm'>
        </div>
    </div>

    <div class="form-group col-12 col-lg-3">
        <label>Steps<span class="text-danger">*</span></label>
        <select name="stepNo" value="" class="select floating {{ $errors->has('stepNo')  ? 'is-invalid' : ''}}"
            id="currentStepno">
            <option value="">Please Select</option>
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
            class="form-control {{ $errors->has('salaryAmount')  ? 'is-invalid' : ''}}" name="salaryAmount"
            id="currentSalaryamount" type="text" readonly>
        <div id='salary-amount-error-message' class='text-danger text-sm'>
        </div>
    </div>


    <div class="form-group col-12 col-lg-6">
        <label>Original Appointment<span class="text-danger">*</span></label>
        <input value="{{ old('originalAppointment') }}"
            class="form-control {{ $errors->has('originalAppointment')  ? 'is-invalid' : ''}}" name="originalAppointment"
            type="date" id="originalAppointment">
        <div id='original-appointment-error-message' class='text-danger text-sm'>
        </div>
    </div>

    <div class="form-group col-12 col-lg-6">
        <label>Last Promotion<span class="text-danger">*</span></label>
        <input value="{{ old('lastPromotion') }}"
            class="form-control {{ $errors->has('lastPromotion')  ? 'is-invalid' : ''}}" name="lastPromotion" type="date"
            id="lastPromotion">
        <div id='last-promotion-error-message' class='text-danger text-sm'>
        </div>
    </div>

    <div class="form-group col-12 col-lg-4">
        <label>Area Code<span class="text-danger">*</span></label>
        <select name="areaCode" value="" class="select floating {{ $errors->has('areaCode')  ? 'is-invalid' : ''}}"
            id="areaCode">
            @foreach(range(0, 16) as $areacodes)
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

    <div class="form-group form-group col-12 col-lg-4">
        <label>Area Type<span class="text-danger">*</span></label>
        <select name="areaType" value="" class="select floating {{ $errors->has('areaType')  ? 'is-invalid' : ''}}"
            id="areaType">
            @foreach(range(0, 5) as $areatypes)
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

    <div class="form-group form-group col-12 col-lg-4">
        <label>Area Level<span class="text-danger">*</span></label>
        <select name="areaLevel" value="" class="select floating {{ $errors->has('areaLevel')  ? 'is-invalid' : ''}}"
            id="areaLevel">
            @foreach(range(0, 4) as $arealevels)
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
        <button id="saveBtn" class="btn btn-success submit-btn float-right shadow" type="submit">
            <span id="loading" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="false"></span>
            <i class="fas fa-save"></i> Save
        </button>
        <button style="margin-right:10px;" type="button" id="cancelbutton1" onclick="myFunction()"
            class="text-white btn btn-warning submit-btn float-right shadow"><i class="fas fa-ban"></i> Cancel</button>
    </div>
</div>
</form>
</div>

    <div id="table" class="page-header {{  count($errors->all()) == 0 ? '' : 'd-none' }}">
        <div class="row">
            <div class="col-5 mb-2">
                <select value="" data-style="btn-primary text-white" class="form-control form-control-xs selectpicker {{ $errors->has('employeeOffice')  ? 'is-invalid' : ''}}"
                    name="employeeOffice" data-live-search="true" id="employeeOffice" data-size="5">
                    <option value="">All</option>
                    @foreach($office as $offices){
                        <option value="{{ $offices->office_code }}">{{ $offices->office_name }}</option>
                    }
                    @endforeach
                    </select>
            </div>

            <div class="col-7 float-right mb-10">
                <button id="addbutton" class="btn btn-primary submit-btn float-right"><i class="fa fa-plus"></i> Add
                    Plantilla of Personnel</button>
            </div>
        </div>
    <div class="table" style="overflow-x:auto;">
        <table class="table table-bordered text-center" id="plantilla" style="width:100%;">
            <thead>
                <tr>
                    <td scope="col" class="text-center font-weight-bold">Employee Name</td>
                    <td scope="col" class="text-center font-weight-bold">Position Title</td>
                    <td scope="col" class="text-center font-weight-bold">Office</td>
                    <td scope="col" class="text-center font-weight-bold">Item No</td>
                    <td scope="col" class="text-center font-weight-bold">Status</td>
                    <td scope="col" class="text-center font-weight-bold">Action</td>
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
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('/assets/js/plantilla.js') }}"></script>
@endpush
@endsection
