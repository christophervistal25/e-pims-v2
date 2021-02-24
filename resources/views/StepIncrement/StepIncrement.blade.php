@extends('layouts.app')
@section('title', 'Step Increment')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endprepend
@section('content')
<div class="kanban-board card mb-0">
    <div class="card-body">
        <div class="row">
            {{-- <div class="form-group col-6 col-lg-2">
                <label>Id:</label>
                <input class="form-control" value="" id="" name="" type="text" readonly> --}}
            </div>
            <div class="form-group col-6 col-lg-3">
                <label>Date:</label>
                <input class="form-control" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" id="date_increment" name="date_step_increment" type="date">
            </div>
            <div class="form-group col-6 col-lg-2">
                <label>Employee Id:</label>
                <input class="form-control" value="" id="employee_id" name="" type="text" readonly>
            </div>
            <div class="form-group col-6 col-lg-5">
                <label>Employee Name:</label>
                <select class="form-control selectpicker" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" data-live-search="true" id="state_list">
                    <option>Search Name Here</option>
                    <option>Hot Dog, Fries and a Soda</option>
                    <option>Burger, Shake and a Smile</option>
                    <option>Sugar, Spice and all things nice</option>
                  </select>
            </div>
            <div class="form-group">
            <input type="hidden" name="plantilla_id" id="plantilla_id" class="">
            </div>
            <div class="form-group col-6 col-lg-4">
                <label>Position:</label>
                <input class="form-control" value="" id="position" name="" type="text" readonly>
            </div>
            <div class="form-group col-6 col-lg-2">
                <label>Item No:</label>
                <input class="form-control" value="" id="item_no" name="" type="text" readonly>
            </div>
            <div class="form-group col-6 col-lg-3">
                <label>Date of Last Appointment:</label>
                <input class="form-control" value="" id="last_appoinment" name="date_last_promotion" type="date" readonly>
            </div>
            <div class="form-group col-6 col-lg-3">
                <label>Salary Grade:</label>
                <input class="form-control" value="" id="salary_grade" name="sg_no" type="text" readonly>
            </div>
            <div class="form-group col-6 col-lg-4">
                <label>Step:</label>
                <input class="form-control" value="" id="step_no" name="step_no" type="text" readonly>
            </div>
            <div class="form-group col-6 col-lg-4">
                <label>Salary Grade Year:</label>
                <input class="form-control" value="" id="sg_year" name="sg_year" type="date" readonly>
            </div>
            <div class="form-group col-6 col-lg-4">
                <label>Amount:</label>
                <input class="form-control" value="" id="amount" name="amount" type="text" readonly>
            </div>
        </div>
        <div class="row step-increment">
            <div class="form-group col-12 col-12">
                <label style="padding-top: 10px;">To:</label>
            </div>
            <div class="form-group col-6 col-lg-2">
                <label>Salary Grade:</label>
                <select name="salary_grade_no" value="{{ old('salary_grade_no') }}" class="select floating {{ $errors->has('salary_grade_no')  ? 'is-invalid' : ''}}">
                    @foreach (range(1, 35) as $salarygrade)
                      <option value="{{ $salarygrade }}">{{ $salarygrade }}</option>
                    @endforeach
                 </select>
            </div>
            <div class="form-group col-6 col-lg-2">
                <label>Step:</label>
                <select name="salary_grade_no" value="{{ old('salary_grade_no') }}" class="select floating {{ $errors->has('salary_grade_no')  ? 'is-invalid' : ''}}">
                    @foreach (range(1, 8) as $step)
                      <option value="{{ $step }}">{{ $step }}</option>
                    @endforeach
                 </select>
            </div>
            <div class="form-group col-6 col-lg-2">
                <label>Salary Grade Year:</label>
                <select class="select floating">
                    @foreach (range(5, 1) as $year)
                    {{ $year1 = date("Y",strtotime("+$year year")) }}
                    <option value={{ $year1 }}>{{ $year1 }}</option>
                    @endforeach
                    {{ $date = date("Y") }}
                    <option selected value={{ $date }}>{{ $date }}</option>
                        @foreach (range(1, 5) as $year)
                        {{ $year2 = date("Y",strtotime("-$year year")) }}
                        <option value={{ $year2 }}>{{ $year2 }}</option>
                    @endforeach 
                </select>
            </div>
            <div class="form-group col-6 col-lg-2">
                <label>Salary:</label>
                <input class="form-control" value="" id="" name="salary" type="text">
            </div>
            <div class="form-group col-6 col-lg-4">
                <label>Monthly Difference:</label>
                <input class="form-control" value="" id="" name="monthly_difference" type="text">
            </div>
            <div class="form-group col-12 col-lg-12 ">
               <button type="submit" class="btn btn-secondary float-right">Cancel</button>
              <button type="submit" style="margin-right:10px"  class="float-right btn btn-success">Save & Print</button>
            </div>
        </div>
    </div>
</div>
@push('page-scripts')
<script src="{{ asset('/assets/js/custom.js') }}"></script>
@endpush

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script>
    console.log($)
    $('')

</script>

@endsection