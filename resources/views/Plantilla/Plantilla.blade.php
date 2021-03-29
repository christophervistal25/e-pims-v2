@extends('layouts.app')
@section('title', 'Plantilla')
@prepend('page-css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endprepend
@section('content')
<div class="content container-fluid">
    <div class="kanban-board card mb-0">    
        <div class="card-body">
            <div id="add" class="page-header {{  count($errors->all())  !== 0 ?  '' : 'd-none' }}">
                <form action="/plantilla" method="post">
                    @csrf
                  
                    <div class="row">

                    <div class="col-12">
                        <div class="alert alert-secondary text-center font-weight-bold" role="alert" >Add New Plantilla</div>
                    </div>
        
                    <div class="form-group col-4 col-lg-2">
                        <label>Plantilla ID<span class="text-danger">*</span></label>
                        <input value="{{ old('plantillaId') }}" class="form-control {{ $errors->has('plantillaId')  ? 'is-invalid' :''}}" name="plantillaId" id="num-only" type="text">
                        @if($errors->has('plantillaId'))
                            <small  class="form-text text-danger">
                        {{ $errors->first('plantillaId') }} </small>
                        @endif
                    </div>
                
                    <div class="form-group col-4 col-lg-2">
                        <label>Item No<span class="text-danger">*</span></label>
                        <input value="{{ old('itemNo') }}" class="form-control {{ $errors->has('itemNo')  ? 'is-invalid' : ''}}" name="itemNo" id="num-only" type="text" placeholder="Item No.">
                        @if($errors->has('itemNo'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('itemNo') }} </small>
                        @endif
                    </div>

                    <div class="form-group col-4 col-lg-2">
                        <label>Old Item No<span class="text-danger">*</span></label>
                        <input value="{{ old('oldItemNo') }}" class="form-control {{ $errors->has('oldItemNo')  ? 'is-invalid' : ''}}" name="oldItemNo" id="num-only" type="text" placeholder="Old Item No">
                        @if($errors->has('oldItemNo'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('oldItemNo') }} </small>
                        @endif
                    </div>

                    <div class="form-group col-6 col-lg-4">
                        <label>Position<span class="text-danger">*</span></label>
                        <select value="" class="form-control form-control-xs selectpicker {{ $errors->has('positionTitle')  ? 'is-invalid' : ''}}" 
                        name="positionTitle" data-live-search="true" id="positionTitle">
                            <option>{{ old('positionTitle') }}</option>
                            @foreach($employee as $employees)
                                <option value="{{ $employees->employee_id }}"> {{ $employees->lastname }}, {{ $employees->firstname }} {{ $employees->middlename }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('positionTitle'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('positionTitle') }} </small>
                        @endif
                    </div>





                    <div class="form-group col-6 col-lg-2">
                        <label>Position Ext</label>
                        <input value="{{ old('positionTitleExt') }}" class="form-control {{ $errors->has('positionTitleExt')  ? 'is-invalid' : ''}}" name="positionTitleExt" type="text">
                        @if($errors->has('positionTitleExt'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('positionTitleExt') }} </small>
                        @endif
                    </div>

                    <div class="form-group col-6 col-lg-4">
                        <label>Employee Name<span class="text-danger">*</span></label>
                        <select value="" class="form-control form-control-xs selectpicker {{ $errors->has('employeeName')  ? 'is-invalid' : ''}}" 
                        name="employeeName" data-live-search="true" id="employeeName">
                            <option>{{ old('employeeName') }}</option>
                            @foreach($employee as $employees)
                                <option value="{{ $employees->employee_id }}"> {{ $employees->lastname }}, {{ $employees->firstname }} {{ $employees->middlename }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('employeeName'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('employeeName') }} </small>
                        @endif
                    </div>

                    <div class="form-group col-6 col-lg-3">
                        <label>Salary Grade<span class="text-danger">*</span></label>
                        <select name="salaryGrade" value="" class="select floating {{ $errors->has('salaryGrade')  ? 'is-invalid' : ''}}" id="currentSalarygrade">
                            <option>Please Select</option>
                           @foreach (range(1 , 33) as $salarygrades)
                             <option {{ old('salaryGrade') == $salarygrades ? 'selected' : '' }} value="{{ $salarygrades}}">{{ $salarygrades}}</option>
                           @endforeach
                        </select>
                        @if($errors->has('salaryGrade'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('salaryGrade') }} </small>
                        @endif
                    </div>

                    <div class="form-group col-6 col-lg-2">
                        <label>Steps<span class="text-danger">*</span></label>
                        <select name="stepNo" id="currentStepno" value="" class="select floating {{ $errors->has('stepNo')  ? 'is-invalid' : ''}}">
                            <option>Please Select</option>
                            @foreach (range(1, 8) as $step_no)
                              <option {{ old('stepNo') == $step_no ? 'selected' : '' }} value="{{ $step_no}}">{{ $step_no}}</option>
                            @endforeach
                         </select>
                         @if($errors->has('stepNo'))
                         <small  class="form-text text-danger">
                         {{ $errors->first('stepNo') }} </small>
                         @endif
                    </div>

                    <div class="form-group col-6 col-lg-3 d-none">
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

                    <div class="form-group col-6 col-lg-3">
                        <label>Salary Amount<span class="text-danger">*</span></label>
                        <input value="{{ old('salaryAmount') }}" class="form-control {{ $errors->has('salaryAmount')  ? 'is-invalid' : ''}}" name="salaryAmount" id="currentSalaryamount" type="text" readonly>
                        @if($errors->has('salaryAmount'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('salaryAmount') }} </small>
                        @endif
                    </div>

                    <div class="form-group col-6 col-lg-3">
                        <label>Office<span class="text-danger">*</span></label>
                        <select value="" name="officeCode" class="select {{ $errors->has('officeCode')  ? 'is-invalid' : ''}}">
                            <option>Please Select</option>
                            <option>{{ old('officeCode') }}</option>
                            @foreach($office as $offices)
                                <option {{ old('officeCode') == $offices ? 'selected' : '' }} value="{{ $offices->office_code}}">{{ $offices->office_name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('officeCode'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('officeCode') }} </small>
                        @endif
                    </div>

                    <div class="form-group col-4 col-lg-3">
                        <label>Division<span class="text-danger">*</span></label>
                        <select value="" name="divisionId" class="select {{ $errors->has('divisionId')  ? 'is-invalid' : ''}}">
                            <option>Please Select</option>
                            <option>{{ old('divisionId') }}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                        @if($errors->has('divisionId'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('divisionId') }} </small>
                        @endif
                    </div>

                    <div class="form-group col-8 col-lg-3">
                        <label>Original Appointment<span class="text-danger">*</span></label>
                        <input value="{{ old('originalAppointment') }}" class="form-control {{ $errors->has('originalAppointment')  ? 'is-invalid' : ''}}" name="originalAppointment" type="date">
                        @if($errors->has('originalAppointment'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('originalAppointment') }} </small>
                        @endif
                    </div>

                    <div class="form-group col-6 col-lg-3">
                        <label>Last Promotion</label>
                        <input value="{{ old('lastPromotion') }}" class="form-control {{ $errors->has('lastPromotion')  ? 'is-invalid' : ''}}" name="lastPromotion" type="date">
                        @if($errors->has('lastPromotion'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('lastPromotion') }} </small>
                        @endif
                    </div>
                    
                    <div class="form-group col-6 col-lg-4">
                        <label>Status <span class="text-danger">*</span></label>
                        <select value="" name="status" class="select {{ $errors->has('status')  ? 'is-invalid' : ''}}">
                            <option>Please Select</option>
                            <option>{{ old('status') }}</option>
                            <option value="Casual">Casual</option>
                            <option value="Contractual">Contractual</option>
                            <option value="Coterminous">Coterminous</option>
                            <option value="Coterminous-Temporary">Coterminous-Temporary</option>
                            <option value="Permanent">Permanent</option>
                            <option value="Provisional">Provisional</option>
                            <option value="Regular Permanent">Regular Permanent</option>
                            <option value="Substitute">Substitute</option>
                            <option value="Temporary">Temporary</option>
                            <option value="Elected">Elected</option>
                        </select>
                        @if($errors->has('status'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('status') }} </small>
                        @endif
                    </div>

                    <div class="form-group col-3">
                        <label>Area Code<span class="text-danger">*</span></label>
                        <select name="areaCode" value="" class="select floating {{ $errors->has('areaCode')  ? 'is-invalid' : ''}}">
                            <option>Please Select</option>
                            <option>{{ old('areaCode') }}</option>
                            <option value="1">1 - Region 1</option>
                            <option value="2">2 - Region 2</option>
                            <option value="3">3 - Region 3</option>
                            <option value="4">4 - Region 4</option>
                            <option value="5">5 - Region 5</option>
                            <option value="6">6 - Region 6</option>
                            <option value="7">7 - Region 7</option>
                            <option value="8">8 - Region 8</option>
                            <option value="9">9 - Region 9</option>
                            <option value="10">10 - Region 10</option>
                            <option value="11">11 - Region 11</option>
                            <option value="12">12 - Region 12</option>
                            <option value="13">13 - NCR</option>
                            <option value="14">14 - CAR</option>
                            <option value="15">15 - CARAGA</option>
                            <option value="16">16 - ARMM</option>
                        </select>
                        @if($errors->has('areaCode'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('areaCode') }} </small>
                        @endif
                    </div>
                    
                    <div class="form-group form-group col-3">
                        <label>Area Type<span class="text-danger">*</span></label>
                        <select name="areaType" value="" class="select floating {{ $errors->has('areaType')  ? 'is-invalid' : ''}}">
                            <option>Please Select</option>
                            <option>{{ old('areaType') }}</option>
                            <option value="R">R - Region</option>
                            <option value="P">P - Province</option>
                            <option value="D">D - District</option>
                            <option value="M">M - Municipality</option>
                            <option value="F">F - Foreign Post</option>
                        </select>
                        @if($errors->has('areaType'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('areaType') }} </small>
                        @endif
                    </div>

                    <div class="form-group form-group col-2">
                        <label>Area Level<span class="text-danger">*</span></label>
                        <select name="areaLevel" value="" class="select floating {{ $errors->has('areaLevel')  ? 'is-invalid' : ''}}">
                            <option>Please Select</option>
                            <option>{{ old('areaLevel') }}</option>
                            <option value="K">K</option>
                            <option value="T">T</option>
                            <option value="S">S</option>
                            <option value="A">A</option>
                        </select>
                        @if($errors->has('areaLevel'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('areaLevel') }} </small>
                        @endif
                    </div>

                    <div class="form-group form-group submit-section col-12">
                        <button type="submit" class="btn btn-success submit-btn float-right">Save</button>
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
            <table class="table table-bordered" id="plantilla"  style="width:100%;">
                <thead>
                  <tr>
                    <td scope="col" class="text-center font-weight-bold">ID</td>
                    <td scope="col" class="text-center font-weight-bold">Old Item No</td>
                    <td scope="col" class="text-center font-weight-bold">New Item No</td>
                    <td scope="col" class="text-center font-weight-bold">Position Title</td>
                    <td scope="col" class="text-center font-weight-bold">Employee ID</td>
                    <td scope="col" class="text-center font-weight-bold">Office</td>
                    <td scope="col" class="text-center font-weight-bold">Status</td>
                  </tr>
                </thead>
              </table>
        </div>
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