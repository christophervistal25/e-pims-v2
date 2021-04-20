@extends('layouts.app')
@section('title', 'Plantilla')
@prepend('page-css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<script src="{{ asset('/js/app.js') }}" defer></script>
<style>
    .swal-content ul{
    list-style-type: none;
    padding: 0;
}
</style>
@endprepend
@section('content')
    <div class="kanban-board card mb-0">    
        <div class="card-body">
            <div id="add" class="page-header {{  count($errors->all())  !== 0 ?  '' : 'd-none' }}">
                <form action="/plantilla" method="post" id="plantillaForm">
                    @csrf
                    <div class="row">

                    <div class="col-12">
                        <div class="alert alert-secondary text-center font-weight-bold" role="alert" >Add New Plantilla</div>
                    </div>
                
                    <div class="form-group col-12 col-lg-2">
                        <label>Item No<span class="text-danger">*</span></label>
                        <input value="{{ old('itemNo') }}" class="form-control {{ $errors->has('itemNo')  ? 'is-invalid' : ''}}" name="itemNo" id="itemNo" type="text" placeholder="Item No.">
                        <div id='item-no-error-message' class='text-danger'>
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-2">
                        <label>Old Item No<span class="text-danger">*</span></label>
                        <input value="{{ old('oldItemNo') }}" class="form-control {{ $errors->has('oldItemNo')  ? 'is-invalid' : ''}}" name="oldItemNo" id="oldItemNo" type="text" placeholder="Old Item No">
                        <div id='old_item-no-error-message' class='text-danger'>
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-4">
                        <label>Employee Name<span class="text-danger">*</span></label>
                        <select value="" class="form-control form-control-xs selectpicker {{ $errors->has('employeeName')  ? 'is-invalid' : ''}}" 
                        name="employeeName" data-live-search="true" id="employeeName" data-size="5">
                        <option></option>
                        @foreach($employee as $employees)
                        <option {{ old('employeeName') == $employees->employee_id ? 'selected' : '' }} value="{{ $employees->employee_id }}"> {{ $employees->firstname }} {{ $employees->middlename }} {{ $employees->lastname }}</option>
                    @endforeach
                        </select>
                        <div id='employee-name-error-message' class='text-danger'>
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-3">
                        <label>Position<span class="text-danger">*</span></label>
                        <select value=""  class="form-control selectpicker  {{ $errors->has('positionTitle')  ? 'is-invalid' : ''}}" 
                        name="positionTitle" data-live-search="true" id="positionTitle" data-size="5" data-width="100%">
                        <option></option>
                        @foreach($position as $positions)
                            <option style="width:350px;" {{ old('positionTitle') == $positions->position_id ? 'selected' : '' }} value="{{ $positions->position_id}}">{{ $positions->position_name }}</option>
                        @endforeach
                        </select>
                        <div id='position-title-error-message' class='text-danger'>
                        </div>
                    </div>
                    <div class="form-group col-12 col-lg-1">
                        <button id="addPosition" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#addPositionBtn"><i class="la la-plus"></i></button>
                    </div>

                    <div class="form-group col-12 col-lg-3">
                        <label>Position Ext</label>
                        <input value="{{ old('positionTitleExt') }}" class="form-control {{ $errors->has('positionTitleExt')  ? 'is-invalid' : ''}}" name="positionTitleExt" type="text">
                    </div>

                    {{-- <div class="form-group col-12 col-lg-3">
                        <label>Salary Grade<span class="text-danger">*</span></label>
                        <select name="salaryGrade" value="" class="select floating {{ $errors->has('salaryGrade')  ? 'is-invalid' : ''}}" id="currentSalarygrade">
                            <option>Please Select</option>
                           @foreach (range(1 , 33) as $salarygrades)
                             <option {{ old('salaryGrade') == $salarygrades ? 'selected' : '' }} value="{{ $salarygrades}}">{{ $salarygrades}}</option>
                           @endforeach
                        </select>
                        <div id='salary-grade-error-message' class='text-danger'>
                        </div>
                    </div> --}}

                    <div class="form-group col-12 col-lg-3">
                        <label>Salary Grade<span class="text-danger">*</span></label>
                        <input value="{{ old('') }}" class="form-control {{ $errors->has('')  ? 'is-invalid' : ''}}" name="salaryGrade" id="currentSalarygrade" type="text" readonly>
                        <div id='salary-grade-error-message' class='text-danger'>
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-3">
                        <label>Steps<span class="text-danger">*</span></label>
                        <select name="stepNo" value="" class="select floating {{ $errors->has('stepNo')  ? 'is-invalid' : ''}}"  id="currentStepno">
                            <option>Please Select</option>
                            @foreach (range(1, 8) as $step_no)
                              <option {{ old('stepNo') == $step_no ? 'selected' : '' }} value="{{ $step_no}}">{{ $step_no}}</option>
                            @endforeach
                         </select>
                         <div id='steps-error-message' class='text-danger'>
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-3 d-none">
                        <label>Current SG Year<span class="text-danger">*</span></label>
                        <select name="currentSgyear" id="currentSgyear" value="" class="select floating">
                            {{ $year3 = date("Y",strtotime("-0 year")) }}
                            <option value={{ $year3 }}>{{ $year3 }}</option>
                         </select>
                         @if($errors->has('currentSgyear'))
                         <small  class="form-text text-danger">
                         {{ $errors->first('currentSgyear') }} </small>
                         @endif
                    </div>

                    <div class="form-group col-12 col-lg-3">
                        <label>Salary Amount<span class="text-danger">*</span></label>
                        <input value="{{ old('salaryAmount') }}" class="form-control {{ $errors->has('salaryAmount')  ? 'is-invalid' : ''}}" name="salaryAmount" id="currentSalaryamount" type="text" readonly>
                        <div id='salary-amount-error-message' class='text-danger'>
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-3">
                        <label>Office<span class="text-danger">*</span></label>
                        <select value="" name="officeCode" class="select {{ $errors->has('officeCode')  ? 'is-invalid' : ''}}" id="officeCode">
                            <option>Please Select</option>
                            @foreach($office as $offices)
                            <option {{ old('officeCode') == $offices->office_code ? 'selected' : '' }} value="{{ $offices->office_code}}">{{ $offices->office_name }}</option>
                            @endforeach
                        </select>
                        <div id='office-error-message' class='text-danger'>
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-3">
                        <label>Division<span class="text-danger">*</span></label>
                        <select value="" name="divisionId" class="select {{ $errors->has('divisionId')  ? 'is-invalid' : ''}}" id="divisionId">
                            <option>Please Select</option>
                            @foreach($office as $offices)
                            <option {{ old('divisionId') == $offices->office_code ? 'selected' : '' }} value="{{ $offices->office_code}}">{{ $offices->office_name }}</option>
                            @endforeach
                        </select>
                        <div id='division-error-message' class='text-danger'>
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-3">
                        <label>Original Appointment<span class="text-danger">*</span></label>
                        <input value="{{ old('originalAppointment') }}" class="form-control {{ $errors->has('originalAppointment')  ? 'is-invalid' : ''}}" name="originalAppointment" type="date" id="originalAppointment">
                        <div id='original-appointment-error-message' class='text-danger'>
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-3">
                        <label>Last Promotion</label>
                        <input value="{{ old('lastPromotion') }}" class="form-control {{ $errors->has('lastPromotion')  ? 'is-invalid' : ''}}" name="lastPromotion" type="date" id="lastPromotion">
                        <div id='last-promotion-error-message' class='text-danger'>
                        </div>
                    </div>
                
                    <div class="form-group col-12 col-lg-4">
                        <label>Status <span class="text-danger">*</span></label>
                        <select value="" name="status" class="select {{ $errors->has('status')  ? 'is-invalid' : ''}}" id="status">
                            @foreach(range(0, 10) as $statuses)
                                @if($status[$statuses] == old('status'))
                                    <option value="{{ $status[$statuses]}}" selected>{{ $status[$statuses] }}</option>
                                @else
                                    <option value="{{ $status[$statuses]}}">{{ $status[$statuses] }}</option>
                                @endif
                            @endforeach
                        </select>
                        <div id='status-error-message' class='text-danger'>
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-3">
                        <label>Area Code<span class="text-danger">*</span></label>
                        <select name="areaCode" value="" class="select floating {{ $errors->has('areaCode')  ? 'is-invalid' : ''}}" id="areaCode">
                            @foreach(range(0, 16) as $areacodes)
                                @if($areacode[$areacodes] == old('areaCode'))
                                    <option value="{{ $areacode[$areacodes]}}" selected>{{ $areacode[$areacodes] }}</option>
                                @else
                                    <option value="{{ $areacode[$areacodes]}}">{{ $areacode[$areacodes] }}</option>
                                @endif
                            @endforeach
                        </select>
                        <div id='area-code-error-message' class='text-danger'>
                        </div>
                    </div>
                    
                    <div class="form-group form-group col-12 col-lg-3">
                        <label>Area Type<span class="text-danger">*</span></label>
                        <select name="areaType" value="" class="select floating {{ $errors->has('areaType')  ? 'is-invalid' : ''}}" id="areaType">
                            @foreach(range(0, 5) as $areatypes)
                            @if($areatype[$areatypes] == old('areaType'))
                                <option value="{{ $areatype[$areatypes]}}" selected>{{ $areatype[$areatypes] }}</option>
                            @else
                                <option value="{{ $areatype[$areatypes]}}">{{ $areatype[$areatypes] }}</option>
                            @endif
                        @endforeach
                        </select>
                        <div id='area-type-error-message' class='text-danger'>
                        </div>
                    </div>

                    <div class="form-group form-group col-12 col-lg-2">
                        <label>Area Level<span class="text-danger">*</span></label>
                        <select name="areaLevel" value="" class="select floating {{ $errors->has('areaLevel')  ? 'is-invalid' : ''}}" id="areaLevel">
                        @foreach(range(0, 4) as $arealevels)
                                @if($arealevel[$arealevels] == old('areaLevel'))
                                    <option value="{{ $arealevel[$arealevels]}}" selected>{{ $arealevel[$arealevels] }}</option>
                                @else
                                    <option value="{{ $arealevel[$arealevels]}}">{{ $arealevel[$arealevels] }}</option>
                                @endif
                        @endforeach
                        </select>
                        <div id='area-level-error-message' class='text-danger'>
                        </div>
                    </div>

                    <div class="form-group form-group submit-section col-12">
                        <button type="submit" id="save" class="btn btn-success submit-btn float-right">Save</button>
                        <button style="margin-right:10px;" type="button" id="cancelbutton" class="text-white btn btn-warning submit-btn float-right">Cancel</button>
                    </div>
                </div>
                </form>
            </div>
        <div id="table" class="page-header {{  count($errors->all()) == 0 ? '' : 'd-none' }}">
        <div style="padding-bottom:10px;" class="row align-items-right">
            <div class="col-auto float-right ml-auto">
                <button id="addbutton" class="btn btn-primary submit-btn float-right"><i class="fa fa-plus"></i> Add Plantillas</button>
            </div>
        </div>
        <div class="table" style="overflow-x:auto;">
            <table class="table table-bordered text-center" id="plantilla"  style="width:100%;">
                <thead>
                  <tr>
                    <td scope="col" class="text-center font-weight-bold">ID</td>
                    <td scope="col" class="text-center font-weight-bold">Item No</td>
                    <td scope="col" class="text-center font-weight-bold">Position Title</td>
                    <td scope="col" class="text-center font-weight-bold">Employee Name</td>
                    <td scope="col" class="text-center font-weight-bold">Office</td>
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