@extends('layouts.app')
@section('title', 'Step Increment')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endprepend
@section('content')
<div class="kanban-board card mb-0">
    <form action="" method="POST">
    @csrf
    <div class="card-body">
        <div class="row">
            {{-- <div class="form-group col-6 col-lg-2">
                <label>Id:</label>
                <input class="form-control" value="" id="" name="" type="text" readonly>
            </div> --}}
            <div class="form-group col-6 col-lg-3">
                <label>Date:</label>
                <input class="form-control" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" id="dateIncrement" name="dateStepIncrement" type="date">
            </div>
            <div class="form-group col-6 col-lg-3">
                <label>Employee Id:</label>
                <input class="form-control" value="" id="employeeId" name="" type="text" readonly>
            </div>
            <div class="form-group col-6 col-lg-6">
                <label>Employee Name:</label>
                <select class="form-control selectpicker" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" data-live-search="true" name="employeeName" id="employeeName">
                    <option>Search Name Here</option>
                    @foreach($employee as $employees)
                    <option data-plantilla="{{ $employees->plantilla }}" value="{{ $employees->employee_id }}">{{ $employees->lastname }}, {{ $employees->firstname }} {{ $employees->middlename }}</option>
                    @endforeach
                  </select>
            </div>
            <div class="form-group">
            <input type="hidden" name="plantillaId" id="plantillaId" class="">
            </div>
            <div class="form-group col-6 col-lg-4">
                <label>Position:</label>
                <input class="form-control" value="" id="position" name="" type="text" readonly>
            </div>
            <div class="form-group col-6 col-lg-2">
                <label>Item No:</label>
                <input class="form-control" value="" id="itemNo" name="" type="text" readonly>
            </div>
            <div class="form-group col-6 col-lg-3">
                <label>Date of Last Appointment:</label>
                <input class="form-control" value="" id="lastAppointment" name="datePromotion" type="date" readonly>
            </div>
            <div class="form-group col-6 col-lg-2">
                <label>Salary Grade:</label>
                <input class="form-control" value="" id="salaryGrade" name="sgNo" type="text" readonly>
            </div>
            <div class="form-group col-6 col-lg-2">
                <label>Step:</label>
                <input class="form-control" value="" id="stepNo" name="stepNo" type="text" readonly>
            </div>
            <div class="form-group col-6 col-lg-2">
                <label>Salary Grade Year:</label>
                <input class="form-control" value="" id="sgYear" name="sgYear" type="text" readonly>
            </div>
            <div class="form-group col-6 col-lg-3">
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
                <select name="sg_no2" value="{{ old('sgNo2') }}" class="select floating {{ $errors->has('sg_no2')  ? 'is-invalid' : ''}}">
                    @foreach (range(1, 35) as $salarygrade)
                      <option value="{{ $salarygrade }}">{{ $salarygrade }}</option>
                    @endforeach
                 </select>
            </div>
            <div class="form-group col-6 col-lg-2">
                <label>Step:</label>
                <select name="stepNo2" value="{{ old('stepNo2') }}" class="select floating {{ $errors->has('stepNo2')  ? 'is-invalid' : ''}}">
                    @foreach (range(1, 8) as $step)
                      <option value="{{ $step }}">{{ $step }}</option>
                    @endforeach
                 </select>
            </div>
            <div class="form-group col-6 col-lg-2">
                <label>Salary Grade Year:</label>
                <select class="select floating" id="sgYear2" name="sgYear2">
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
            <div class="form-group col-6 col-lg-3">
                <label>Amount:</label>
                <input class="form-control" value="" id="amount2" name="amount2" type="text" required>
            </div>
            <div class="form-group col-6 col-lg-4">
                <label>Monthly Difference:</label>
                <input class="form-control" value="" id="monthlyDifference" name="monthlyDifference" type="text" readonly>
            </div>
            <div class="form-group col-12 col-lg-12 ">
               <button type="submit" id="cancelBtn" class="btn btn-secondary float-right">Cancel</button>
              <button type="submit" style="margin-right:10px"  class="float-right btn btn-success">Save & Print</button>
            </div>
        </div>
    </div>
    <form>
</div>
@push('page-scripts')
<script src="{{ asset('/assets/js/custom.js') }}"></script>
@endpush

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

	<script>
        console.log($)
        $('#employeeName').change(function (e) {
            let employeeID = e.target.value;
            let plantilla = JSON.parse($($( "#employeeName option:selected" )[0]).attr('data-plantilla'));

            $('#employeeId').val(plantilla.employee_id);
            $('#plantillaId').val(plantilla.plantilla_id);
            $('#position').val(plantilla.position_title);
            $('#itemNo').val(plantilla.new_item_no);
            $('#lastAppointment').val(plantilla.date_last_promotion);
            $('#salaryGrade').val(plantilla.current_salary_grade);
            $('#stepNo').val(plantilla.csc_current_step_no);
            $('#amount').val(plantilla.csc_current_amount);
            $('#sgYear').val(plantilla.csc_current_sg_year);
        });

    </script>

    <script>

    $(document).keyup(function() {
        var amount = parseFloat($('#amount').val());
        var amount2 = parseFloat($('#amount2').val());
        $('#monthlyDifference').val((( amount - amount2) || ''));
    });

    </script>

@endsection