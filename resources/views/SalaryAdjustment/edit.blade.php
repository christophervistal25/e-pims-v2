@extends('layouts.app')
@section('title', 'Edit Salary Adjustment')
@prepend('page-css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<style>
    .swal-content ul{
    list-style-type: none;
    padding: 0;
}
</style>
@endprepend
@section('content')
@include('SalaryAdjustment.add-ons.success')
<div class="kanban-board card mb-0">
    <div class="card-body">
            <form action="{{ route('salary-adjustment.update', $salaryAdjustment->id) }}" method="POST">
                @csrf
                @method('PUT')
                    <div class="row">

                        <div class="col-12">
                            <div class="alert alert-secondary text-center font-weight-bold" role="alert" >Edit Salary Adjustment</div>
                        </div>

                        <div class="form-group col-12 col-lg-4">
                            <label>Date Adjustment<span class="text-danger">*</span></label>
                            <input class="form-control {{ $errors->has('dateAdjustment')  ? 'is-invalid' : ''}}" value="{{ old('dateAdjustment') ?? $salaryAdjustment->date_adjustment }}" name="dateAdjustment" id="dateAdjustment" type="date">
                            <div id='date-adjustment-error-message' class='text-danger'>
                            </div>
                            @if($errors->has('dateAdjustment'))
                            <small  class="form-text text-danger">
                            {{ $errors->first('dateAdjustment') }} </small>
                            @endif
                        </div>

                        <div class="form-group col-12 col-lg-4">
                            <label>Employee Name</label>
                            <select value="" class="form-control form-control-xs selectpicker {{ $errors->has('')  ? 'is-invalid' : ''}}" 
                            name="" data-live-search="true" data-size="5" disabled>
                            <option></option>
                            @foreach($employee as $employees)
                            <option {{ $salaryAdjustment->employee_id == $employees->employee_id ? 'selected' : '' }} value="{{ $employees->employee_id }}">{{ $employees->lastname }}, {{ $employees->firstname }} {{ $employees->middlename }}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group col-12 col-lg-4 d-none">
                            <label>Employee Name</label>
                            <input class="form-control" value="{{ $salaryAdjustment->employee_id }}" name="positionName" id="employeeName" type="text" readonly>
                            @if($errors->has('employeeName'))
                            <small  class="form-text text-danger">
                            {{ $errors->first('employeeName') }} </small>
                            @endif
                        </div>

                        <div class="form-group col-12 col-lg-4">
                            <label>Item No</label>
                            <input class="form-control {{ $errors->has('itemNo')  ? 'is-invalid' : ''}}" value="{{ old('itemNo') ?? $salaryAdjustment->item_no }}" name="itemNo" id="itemNo" type="text" readonly>
                            @if($errors->has('itemNo'))
                            <small  class="form-text text-danger">
                            {{ $errors->first('itemNo') }} </small>
                            @endif
                        </div>

                        <div class="form-group col-12 col-lg-4">
                            <label>Position</label>
                            <select value="{{ old('') }}"  class="form-control form-control-xs selectpicker  {{ $errors->has('')  ? 'is-invalid' : ''}}" 
                            name="" data-live-search="true" data-width="100%" disabled>
                            <option></option>
                            @foreach($position as $positions)
                                <option style="width:350px;"  {{ $salaryAdjustment->position_id == $positions->position_id ? 'selected' : '' }} value="{{ $positions->position_id}}">{{ $positions->position_name }}</option>
                            @endforeach
                            </select>
                            @if($errors->has(''))
                            <small  class="form-text text-danger">
                            {{ $errors->first('') }} </small>
                            @endif
                        </div>


                        <div class="form-group col-12 col-lg-4">
                            <label>Salary Grade</label>
                            <input class="form-control {{ $errors->has('salaryGrade')  ? 'is-invalid' : ''}}" value="{{ old('salaryGrade') ?? $salaryAdjustment->sg_no }}" name="salaryGrade" id="salaryGrade" type="text" readonly>
                            @if($errors->has('salaryGrade'))
                            <small  class="form-text text-danger">
                            {{ $errors->first('salaryGrade') }} </small>
                            @endif
                        </div>
                        
                        <div class="form-group col-12 col-lg-4">
                            <label>Step No</label>
                            <input class="form-control {{ $errors->has('stepNo')  ? 'is-invalid' : ''}}" value="{{ old('stepNo') ?? $salaryAdjustment->step_no }}" name="stepNo" id="stepNo" type="text" readonly>
                            <div id='step-no-error-message' class='text-danger'>
                            </div>
                            @if($errors->has('stepNo'))
                            <small  class="form-text text-danger">
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
                            <small  class="form-text text-danger">
                            {{ $errors->first('currentSgyear') }} </small>
                            @endif
                        </div>

                        <div class="form-group col-12 col-lg-4">
                            <label>Salary Previous</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">&#8369;</span>
                                </div>
                            <input class="form-control {{ $errors->has('salaryPrevious')  ? 'is-invalid' : ''}}" value="{{ old('salaryPrevious') ?? $salaryAdjustment->salary_previous }}" name="salaryPrevious" id="salaryPrevious" type="text" readonly>
                            </div>
                            @if($errors->has('salaryPrevious'))
                            <small  class="form-text text-danger">
                            {{ $errors->first('salaryPrevious') }} </small>
                            @endif
                        </div>
                        
                        <div class="form-group col-12 col-lg-4">
                        <label>Salary New<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text">&#8369;</span>
                            </div>
                            <input class="form-control {{ $errors->has('salaryNew')  ? 'is-invalid' : ''}}" value="{{ old('salaryNew') ?? $salaryAdjustment->salary_new }}" name="salaryNew" id="salaryNew" type="text" placeholder="Input New Salary">
                            </div>
                            @if($errors->has('salaryNew'))
                            <small  class="form-text text-danger">
                            {{ $errors->first('salaryNew') }} </small>
                            @endif
                        </div>

                        <div class="form-group col-12 col-lg-4">
                            <label>Salary Difference</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text">&#8369;</span>
                                </div>
                            <input class="form-control {{ $errors->has('salaryDifference')  ? 'is-invalid' : ''}}" value="{{ old('salaryNew') ?? $salaryAdjustment->salary_diff }}" name="salaryDifference" id="salaryDifference" type="text" readonly>
                            </div>
                            @if($errors->has('salaryDifference'))
                            <small  class="form-text text-danger">
                            {{ $errors->first('salaryDifference') }} </small>
                            @endif
                        </div>

                        <div class="form-group form-group submit-section col-12">
                            <button type="submit" class="btn btn-success submit-btn float-right">Update</button>
                            <a href="/salary-adjustment"><button style="margin-right:10px;" type="button" class="text-white btn btn-warning submit-btn float-right"><i class="la la-arrow-left"></i>Back</button></a>
                        </div>

                </div>
                
            <form>
            {{-- </div> --}}

    </div>
</div>
@push('page-scripts')
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="{{ asset('/assets/js/salary-adjustment.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@endpush
@endsection