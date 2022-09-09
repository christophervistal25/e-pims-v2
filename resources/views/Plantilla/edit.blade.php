@extends('layouts.app')
@section('title', 'Edit Plantilla of Personnel')
@prepend('page-css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<style>
     .btn-primarys {
          background-color: #FF9B44;
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

     .page-item.active .page-link:hover {
          background-color: #FF8544 !important;
          border: 1px solid #FF8544;
     }

</style>
@endprepend
@prepend('meta-data')
<meta id="plantillaPositionMetaData" content="@foreach($plantillaPosition as $plantillaPositions){ |officeCode|:|{{ $plantillaPositions->office_code }}|, |positionId|:|{{ $plantillaPositions->PosCode }}|, |ppId|:|{{ $plantillaPositions->pp_id }}|}, @endforeach">
<meta id="positionMetaData" content="@foreach($position as $positions){ |positionId|:|{{ $positions->PosCode }}|, |positionName|:|{{ $positions->Description }}|}, @endforeach">
<meta id="divisionMetaData" content="@foreach($division as $divisions){ |officeCode|:|{{ $divisions->office_code }}|, |divisionId|:|{{ $divisions->division_id }}|, |divisionName|:|{{ $divisions->division_name }}|}, @endforeach">
<meta id="sectionMetaData" content="@foreach($section as $sections){ |divisionId|:|{{ $sections->division_id }}|, |sectionId|:|{{ $sections->section_id }}|, |sectionName|:|{{ $sections->section_name }}|}, @endforeach">
@endprepend
@section('content')
<div class="content">
     @include('Plantilla.add-ons.success')

     <div class="kanban-board card mb-0">
          <div class="card-body">
               <div id="add" class="page-header {{  count($errors->all())  !== 0 }}">
                    <form id="plantillaEditForm">
                         @csrf
                         @method('PUT')
                         <div class="row">

                              <div class="col-12">
                                   <div class="alert alert-secondary text-center font-weight-bold" role="alert">EDIT PLANTILLA
                                        OF PERSONNEL</div>
                              </div>

                              <input type="text" value="{{ $plantilla->plantilla_id  }}" id="plantillaId" class="d-none">

                              <div class="form-group col-12 col-lg-10">
                                   <label>Employee Name<span class="text-danger">*</span></label>
                                   <select value="{{ old('employeeName') }}" class="form-control form-control-xs selectpicker {{ $errors->has('employeeName')  ? 'is-invalid' : ''}}" name="employeeName" data-live-search="true" id="employeeName" data-size="5" disabled>
                                        <option></option>
                                        @foreach($employee as $employees)
                                        <option {{ $plantilla->employee_id == $employees->Employee_id ? 'selected' : '' }} value="{{ $employees->employee_id }}">{{ $employees->fullname }}</option>
                                        @endforeach
                                   </select>
                                   <div id='employee-name-error-message' class='text-danger text-sm'>
                                   </div>
                              </div>

                              <div class="form-group col-12 col-lg-2">
                                   <label>Employee Id<span class="text-danger">*</span></label>
                                   <input value="{{ old('employeeId') ?? $plantilla->employee_id }}" class="form-control {{ $errors->has ('employeeId')  ? 'is-invalid' : ''}}" name="employeeId" type="text" readonly>
                              </div>

                              <div class="form-group col-12 col-lg-4">
                                   <label>Office<span class="text-danger">*</span></label>
                                   <select value="" class="form-control selectpicker {{ $errors->has('officeCode')  ? 'is-invalid' : ''}}" name="officeCode" data-live-search="true" id="officeCode" data-size="5">
                                        <option></option>
                                        @foreach($office as $offices)
                                        <option {{ $plantilla->office_code == $offices->office_code ? 'selected' : '' }} value="{{ $offices->office_code }}">
                                             {{ $offices->office_name }}</option>
                                        @endforeach
                                   </select>
                                   <div id='office-error-message' class='text-danger text-sm'>
                                   </div>
                              </div>

                              <div class="form-group col-12 col-lg-4">
                                   <label>Division<span class="text-danger">*</span></label>
                                   <select value="" class="form-control selectpicker {{ $errors->has('divisionId')  ? 'is-invalid' : ''}}" name="divisionId" data-live-search="true" id="divisionId" data-size="5">
                                        <option></option>
                                        @foreach($divisionedit as $divisionedits)
                                        <option {{ $plantilla->division_id == $divisionedits->division_id ? 'selected' : '' }} value="{{ $divisionedits->division_id }}">{{ $divisionedits->division_name }}</option>
                                        @endforeach
                                   </select>
                                   <div id='division-error-message' class='text-danger text-sm'>
                                   </div>
                              </div>
                              
                              <div class="form-group col-12 col-lg-4">
                                   <label>Section<span class="text-danger">*</span></label>
                                   <select value="" class="form-control sectionId selectpicker {{ $errors->has('sectionId')  ? 'is-invalid' : ''}}" name="sectionId" data-live-search="true" id="sectionId" data-size="5">
                                        <option></option>
                                        @foreach($sectionedit as $sectionedits)
                                        <option {{ $plantilla->section_id == $sectionedits->section_id ? 'selected' : '' }} value="{{ $sectionedits->section_id }}">{{ $sectionedits->section_name }}</option>
                                        @endforeach
                                   </select>
                                   <div id='division-error-message' class='text-danger text-sm'>
                                   </div>
                              </div>

                              <div class="form-group col-12 col-lg-6">
                                   <label>Position<span class="text-danger">*</span></label>
                                   <select value="{{ old('positionTitle') }}" class="form-control form-control-xs selectpicker  {{ $errors->has('positionTitle')  ? 'is-invalid' : ''}}" name="positionTitle" data-live-search="true" id="positionTitle" data-size="5" data-width="100%">
                                        <option></option>
                                        @foreach($plantillaPosition as $plantillaPositions)
                                        <option {{ $plantilla->pp_id == $plantillaPositions->pp_id ? 'selected' : '' }} value="{{ $plantillaPositions->pp_id }}">
                                             {{ $plantillaPositions->position->Description }}</option>
                                        @endforeach
                                   </select>
                                   <div id='position-title-error-message' class='text-danger text-sm'>
                                   </div>
                              </div>

                              <div class="form-group col-12 col-lg-6">
                                   <label>Status<span class="text-danger">*</span></label>
                                   <select value="{{ old('status') }}" class="form-control form-control-xs selectpicker  {{ $errors->has('status')  ? 'is-invalid' : ''}}" name="status" data-live-search="true" id="status" data-size="5" data-width="100%">
                                        <option></option>
                                        @foreach(range(0, 5) as $statuses)
                                        @if($status[$statuses] == $plantilla->status)
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
                                   <input value="{{ old('itemNo') ?? $plantilla->item_no }}" class="form-control {{ $errors->has('itemNo')  ? 'is-invalid' : ''}}" name="itemNo" id="num-only" type="text" placeholder="Item No." readonly>
                                   <div id='item-no-error-message' class='text-danger text-sm'>
                                   </div>
                              </div>

                              <div class="form-group col-12 col-lg-6">
                                   <label>Old Item No<span class="text-danger">*</span></label>
                                   <input value="{{ old('oldItemNo') ?? $plantilla->old_item_no }}" class="form-control {{ $errors->has ('oldItemNo')  ? 'is-invalid' : ''}}" name="oldItemNo" id="num-only" type="text" placeholder="Old Item No">
                                   <div id='old_item-no-error-message' class='text-danger'>
                                   </div>
                              </div>

                              <div class="form-group col-12 col-lg-3">
                                   <label>Current Salary Grade Year<span class="text-danger">*</span></label>
                                   <input value="{{ old('currentSgyear') ?? $plantilla->year }}" class="form-control {{ $errors->has('currentSgyear')  ? 'is-invalid' : ''}}" name="currentSgyear" id="currentSgyear" type="text" placeholder="" readonly>
                                   <div id='year-error-message' class='text-danger text-sm'>
                                   </div>
                              </div>

                              <div class="form-group col-12 col-lg-3">
                                   <label>Salary Grade<span class="text-danger">*</span></label>
                                   <input value="{{ old('salaryGrade') ?? $plantilla->sg_no}}" class="form-control {{ $errors->has('')  ? 'is-invalid' : ''}}" name="salaryGrade" id="currentSalarygrade" type="text" readonly>
                              </div>

                              <div class="form-group col-12 col-lg-3">
                                   <label>Steps<span class="text-danger">*</span></label>
                                   <select value="{{ old('stepNo') }}" class="form-control form-control-xs selectpicker  {{ $errors->has('stepNo')  ? 'is-invalid' : ''}}" name="stepNo" data-live-search="true" id="currentStepno" data-size="5" data-width="100%">
                                        <option></option>
                                        @foreach (range(1, 8) as $step_no)
                                        <option {{ $plantilla->step_no == $step_no ? 'selected' : '' }} value="{{ $step_no}}">
                                             {{ $step_no}}</option>
                                        @endforeach
                                   </select>
                                   <div id='steps-error-message' class='text-danger text-sm'>
                                   </div>
                              </div>

                              <div class="form-group col-12 col-lg-3">
                                   <label>Salary Amount<span class="text-danger">*</span></label>
                                   <input value="{{ old('salaryAmount') ?? $plantilla->salary_amount}}" class="form-control {{ $errors->has('salaryAmount')  ? 'is-invalid' : ''}}" name="salaryAmount" id="currentSalaryamount" type="text" readonly>
                                   <div id='salary-amount-error-message' class='text-danger text-sm'>
                                   </div>
                              </div>

                              <div class="form-group col-12 col-lg-6">
                                   <label>Original Appointment<span class="text-danger">*</span></label>
                                   <input value="{{ old('originalAppointment') ?? $plantilla->date_original_appointment }}" class="form-control {{ $errors->has('originalAppointment')  ? 'is-invalid' : ''}}" name="originalAppointment" type="date">
                                   <div id='original-appointment-error-message' class='text-danger text-sm'>
                                   </div>
                              </div>

                              <div class="form-group col-12 col-lg-6">
                                   <label>Last Promotion<span class="text-danger">*</span></label>
                                   <input value="{{ old('lastPromotion') ?? $plantilla->date_last_promotion }}" class="form-control {{ $errors->has('lastPromotion')  ? 'is-invalid' : ''}}" name="lastPromotion" type="date">
                                   <div id='last-promotion-error-message' class='text-danger text-sm'>
                                   </div>
                              </div>

                              <div class="form-group col-12 col-lg-4">
                                   <label>Area Code<span class="text-danger">*</span></label>{{$plantilla->area_code}}DSADASDA
                                   <select value="{{ old('areaCode') }}" class="form-control form-control-xs selectpicker {{ $errors->has('areaCode')  ? 'is-invalid' : ''}}" name="areaCode" data-live-search="true" id="areaCode" data-size="5">
                                        <option></option>
                                        @foreach(range(0, 15) as $areacodes)
                                        @if($areacode[$areacodes] == $plantilla->area_code)
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
                                   <select value="{{ old('areaType') }}" class="form-control form-control-xs selectpicker {{ $errors->has('areaType')  ? 'is-invalid' : ''}}" name="areaType" data-live-search="true" id="areaType" data-size="5">
                                        <option></option>
                                        @foreach(range(0, 4) as $areatypes)
                                        @if($areatype[$areatypes] == $plantilla->area_type)
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
                                   <select value="{{ old('areaLevel') }}" class="form-control form-control-xs selectpicker {{ $errors->has('areaLevel')  ? 'is-invalid' : ''}}" name="areaLevel" data-live-search="true" id="areaLevel" data-size="5">
                                        <option></option>
                                        @foreach(range(0, 3) as $arealevels)
                                        @if($arealevel[$arealevels] == $plantilla->area_level)
                                        <option value="{{ $arealevel[$arealevels]}}" selected>{{ $arealevel[$arealevels] }}
                                        </option>
                                        @else
                                        <option value="{{ $arealevel[$arealevels]}}">{{ $arealevel[$arealevels] }}</option>
                                        @endif
                                        @endforeach
                                </select>
                                <div id='area-level-error-message' class='text-danger text-sm'>
                                </div>
                            </div>

                        <div class="form-group col-12 col-lg-6">
                            <label>Salary Authorized<span class="text-danger">*</span></label>
                            <input value="{{ old('salaryAuthorized') ?? $plantilla->salary_authorized }}" class="form-control {{ $errors->has ('salaryAuthorized')  ? 'is-invalid' : ''}}" name="salaryAuthorized" id="num-only" type="text" placeholder="Salary Authorized">
                            <div id='salaryAuthorized-no-error-message' class='text-danger'>
                            </div>
                        </div>

                              <div class="form-group form-group submit-section col-12">
                                   <button id="plantillaUpdate" type="submit" class="btn btn-primarys submit-btn float-right shadow"><span id="loading" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="false"></span>
                                        <i style="color:white;" class="fas fa-save"></i> <b style="color:white;" id="saving">Update</b>
                                        <a href="/plantilla-of-personnel"><button style="margin-right:10px;" type="button" class="text-white btn btn-danger submit-btn float-right shadow"><i class="fas fa-arrow-left"></i> Back</button></a>
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

</script>
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('/assets/js/plantilla.js') }}"></script>
@endpush
@endsection
