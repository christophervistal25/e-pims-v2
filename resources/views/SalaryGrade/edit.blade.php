@extends('layouts.app')
@section('title', 'Edit Salary Grade')
@prepend('page-css')
{{-- CSS HERE --}}
@endprepend
@section('content')
<div class="content">
        @include('SalaryGrade.add-ons.success')
    <div class="kanban-board card mb-0">
        <div class="card-body">
    <div id="" class="page-header {{  count($errors->all())}}"> 
        
            <div class="alert alert-secondary text-center font-weight-bold" role="alert" >Edit Salary Grade</div>

        <form action="{{ route('salary-grade.update', $salaryGrade->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
            <div class="form-group col-12 col-lg-4">
                <label>Salary Grade <span class="text-danger">*</span></label>
                <select name="sgNo" value="{{ old('sgNo')}}" class="select floating {{ $errors->has('sgNo')  ? 'is-invalid' : ''}}" id="sgNo" disabled>
                    <option selected>Please Select</option>
                   @foreach (range(1, 33) as $salarygrade)
                     <option {{ $salaryGrade->sg_no == $salarygrade ? 'selected' : '' }} value="{{ $salarygrade }}">{{ $salarygrade }}</option>
                   @endforeach
                </select>
                @if($errors->has('sgNo'))
                <small  class="form-text text-danger">
                {{ $errors->first('sgNo') }} </small>
                @endif
            </div>
            <div class="form-group col-12 col-lg-4">
                <label>Step 1 <span class="text-danger">*</span></label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">&#8369;</span>
                    </div>
                    <input class="form-control text-right {{ $errors->has('sgStep1')  ? 'is-invalid' : ''}}" value="{{ old('sgStep1') ?? $salaryGrade->sg_step1 }}" id="sgStep1" name="sgStep1" type="text" maxlength="12">
                    </div>
                    @if($errors->has('sgStep1'))
                    <small  class="form-text text-danger">
                    {{ $errors->first('sgStep1') }} </small>
                    @endif
            </div>
            <div class="form-group col-12 col-lg-4">
                <label>Step 2 <span class="text-danger">*</span></label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">&#8369;</span>
                    </div>
                <input class="form-control text-right {{ $errors->has('sgStep2')  ? 'is-invalid' : ''}}" value="{{ old('sgStep2') ?? $salaryGrade->sg_step2 }}" id="sgStep2" name="sgStep2" type="text" maxlength="12">
                 </div>
                @if($errors->has('sgStep2'))
                <small  class="form-text text-danger">
                {{ $errors->first('sgStep2') }} </small>
                @endif
            </div>
            <div class="form-group col-12 col-lg-4">
                <label>Step 3 <span class="text-danger">*</span></label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">&#8369;</span>
                    </div>
                <input class="form-control text-right {{ $errors->has('sgStep3')  ? 'is-invalid' : ''}}" value="{{ old('sgStep3') ?? $salaryGrade->sg_step3 }}" id="sgStep3" name="sgStep3" type="text" maxlength="12">
                </div>  
                @if($errors->has('sgStep3'))
                <small  class="form-text text-danger">
                {{ $errors->first('sgStep3') }} </small>
                @endif
            </div>
            <div class="form-group col-12 col-lg-4">
                <label>Step 4 <span class="text-danger">*</span></label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">&#8369;</span>
                    </div>
                <input class="form-control text-right {{ $errors->has('sgStep4')  ? 'is-invalid' : ''}}" value="{{ old('sgStep4') ?? $salaryGrade->sg_step4 }}" id="sgStep4" name="sgStep4" type="text" maxlength="12">
                </div>
                @if($errors->has('sgStep4'))
                <small  class="form-text text-danger">
                {{ $errors->first('sgStep4') }} </small>
                @endif
            </div>
            <div class="form-group col-12 col-lg-4">
                <label>Step 5 <span class="text-danger">*</span></label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">&#8369;</span>
                    </div>
                <input class="form-control text-right {{ $errors->has('sgStep5')  ? 'is-invalid' : ''}}" value="{{ old('sgStep5') ?? $salaryGrade->sg_step5 }}" id="sgStep5" name="sgStep5" type="text" maxlength="12">
                </div>
                @if($errors->has('sgStep5'))
                <small  class="form-text text-danger">
                {{ $errors->first('sgStep5') }} </small>
                @endif
            </div>
            <div class="form-group col-12 col-lg-4">
                <label>Step 6 <span class="text-danger">*</span></label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">&#8369;</span>
                    </div>
                <input class="form-control text-right {{ $errors->has('sgStep6')  ? 'is-invalid' : ''}}" value="{{ old('sgStep6') ?? $salaryGrade->sg_step6 }}" id="sgStep6" name="sgStep6" type="text" maxlength="12">
                </div>
                @if($errors->has('sgStep6'))
                <small  class="form-text text-danger">
                {{ $errors->first('sgStep6') }} </small>
                @endif
            </div>
            <div class="form-group col-12 col-lg-4">
                <label>Step 7 <span class="text-danger">*</span></label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">&#8369;</span>
                    </div>
                <input class="form-control text-right {{ $errors->has('sgStep7')  ? 'is-invalid' : ''}}" value="{{ old('sgStep7') ?? $salaryGrade->sg_step7 }}" id="sgStep7" name="sgStep7" type="text" maxlength="12">
                </div>
                @if($errors->has('sgStep7'))
                <small  class="form-text text-danger">
                {{ $errors->first('sgStep7') }} </small>
                @endif
            </div>
            <div class="form-group col-12 col-lg-4">
                <label>Step 8 <span class="text-danger">*</span></label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">&#8369;</span>
                    </div>
                <input class="form-control text-right {{ $errors->has('sgStep8')  ? 'is-invalid' : ''}}" value="{{ old('sgStep8') ?? $salaryGrade->sg_step8 }}" id="sgStep8" name="sgStep8" type="text" maxlength="12">
                 </div>
                @if($errors->has('sgStep8'))
                <small  class="form-text text-danger">
                {{ $errors->first('sgStep8') }} </small>
                @endif
               
            </div>
            <div class="form-group col-12 col-lg-4">
                <label>Salary Grade Year <span class="text-danger">*</span></label>
                <select name="sgYear" value="{{ old('sgYear') }}" class="select floating" disabled>
                    <option>Please Select</option>
                    {{ $year2 = date("Y",strtotime("-1 year")) }}
                    <option {{ $salaryGrade->sg_year == $year2 ? 'selected' : '' }} value={{ $year2 }}>{{ $year2 }}</option>
                    {{ $year3 = date("Y",strtotime("-0 year")) }}
                    <option {{ $salaryGrade->sg_year == $year3 ? 'selected' : '' }} value={{ $year3 }}>{{ $year3 }}</option>
                    @foreach (range(1, 5) as $year)
                    {{ $year1 = date("Y",strtotime("$year year")) }}
                    <option {{ $salaryGrade->sg_year == $year1 ? 'selected' : '' }} value={{ $year1 }}>{{ $year1 }}</option>
                    @endforeach
                </select>
                @if($errors->has('sgYear'))
                <small  class="form-text text-danger">
                {{ $errors->first('sgYear') }} </small>
                @endif
            </div>
            <div class="form-group submit-section col-12">
                <button type="submit" class="btn btn-success submit-btn float-right">Update</button>
               <a href="/salary-grade"><button style="margin-right:10px;" type="button" id="cancelbutton" class="btn btn-warning submit-btn float-right text-white"><i class="la la-arrow-left"></i>Back</button>
            </div>
        </div>
        </form>
    </div>
</div>
</div>
</div>
@push('page-scripts')
@endpush
@endsection