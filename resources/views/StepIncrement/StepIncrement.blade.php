@extends('layouts.app')
@section('title', 'Step Increment')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endprepend
@section('content')
<div class="kanban-board card mb-0">
    <form action="" method="POST">
    @csrf
    <div class="row">
        <div class="card-body">            
            <div class="form-group col-12 col-lg-11">
                <label>Date:</label>
                <input class="form-control" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" id="dateIncrement" name="dateStepIncrement" type="date">
            </div>
            <div class="form-group col-12 col-lg-11">
                <input class="form-control d-none" value="" id="employeeId" name="employeeId" type="text" readonly>
            </div>
            <div class="form-group col-12 col-lg-11">
                <label>Employee Name:</label>
                <select class="form-control selectpicker" value="" data-live-search="true" name="employeeName" id="employeeName">
                    <option>Search Name Here</option>
                    @foreach($employee as $employees)
                    <option data-plantilla="{{ $employees->plantilla }}" value="{{ $employees->employee_id }}">{{ $employees->lastname }}, {{ $employees->firstname }} {{ $employees->middlename }}</option>
                    @endforeach
                  </select>
            </div>
            <div class="form-group">
            <input type="hidden" name="plantillaId" id="plantillaId" class="">
            </div>
            <div class="form-group col-12 col-lg-11">
                <input class="form-control d-none" value="" id="position_id" name="position_id" type="text" readonly>
            </div>
            <div class="form-group col-12 col-lg-11">
                <label>Position:</label>
                <input class="form-control" value="" id="position" name="" type="text" readonly>
            </div>
            <div class="form-group col-12 col-lg-11">
                <label>Item No:</label>
                <input class="form-control" value="" id="itemNo" name="item_no" type="text" readonly>
            </div>
            <div class="form-group col-12 col-lg-11">
                <label>Date of Last Appointment:</label>
                <input class="form-control" value="" id="lastAppointment" name="datePromotion" type="text" readonly>
            </div>
            <!-- <div class="form-group col-12 col-lg-11">
                <input class="form-control d-none" value="" id="salaryGrade" name="sgNo" type="text" readonly>
            </div> -->
            
            <div class="form-row col-12">
                <div class="form-group col-6 col-lg-6">
                    <label>Salary Grade:</label>
                    <input class="form-control" value="" id="salaryGrade" name="sgNo" type="text" readonly>                    
                </div>
                <div class="form-group col-6 col-lg-5">
                    <label>Step:</label>
                    <input class="form-control" value="" id="stepNo" name="stepNo" type="text" readonly>                
                </div>
            </div>
            

            
            <div class="form-group col-12 col-lg-11">
                <label>Amount:</label>
                <input class="form-control" value="" id="amount" name="amount" type="text" readonly>
            </div>
        </div>

        <!-- <div class="step-increment"> -->
        <div class="card-body">        
            <div class="form-group col-12 col-lg-12">
                <label>Salary Grade:</label>
                <select name="sg_no2" value="{{ old('sgNo2') }}" class="select floating {{ $errors->has('sg_no2')  ? 'is-invalid' : ''}}">
                    @foreach (range(1, 35) as $salarygrade)
                      <option value="{{ $salarygrade }}">{{ $salarygrade }}</option>
                    @endforeach
                 </select>
            </div>
            <div class="form-group col-12 col-lg-12">
                <label>Step:</label>
                <select name="stepNo2" value="{{ old('stepNo2') }}" class="select floating {{ $errors->has('stepNo2')  ? 'is-invalid' : ''}}">
                    @foreach (range(1, 8) as $step)
                      <option value="{{ $step }}">{{ $step }}</option>
                    @endforeach
                 </select>
            </div>
            
            <div class="form-group col-12 col-lg-12">
                <label>Amount:</label>
                <input class="form-control" value="" id="amount2" name="amount2" type="text" required>
            </div>
            <div class="form-group col-12 col-lg-12">
                <label>Monthly Difference:</label>
                <input class="form-control" value="" id="monthlyDifference" name="monthlyDifference" type="text" readonly>
            </div>
            <div class="form-group col-12 col-lg-12" id="buttons">
                <button type="submit" id="cancelBtn" class="btn btn-warning float-right">Cancel</button>
                <button type="submit" style="margin-right:10px"  class="float-right btn btn-success mb-5">Save & Print</button>
            </div>
        </div>
        <!-- </div> -->
    <form>
    </div>
</div>
@push('page-scripts')
<script src="{{ asset('/assets/js/custom.js') }}"></script>
@endpush

<script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>

    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>


	<script>
        $('#employeeName').change(function (e) {
            let employeeID = e.target.value;
            let plantilla = $($( "#employeeName option:selected" )[0]).attr('data-plantilla');
            if(plantilla) {
                plantilla = JSON.parse(plantilla);
                $('#employeeId').val(plantilla.employee_id);
                $('#plantillaId').val(plantilla.plantilla_id);
                $('#position').val(plantilla.position.position_name);
                $('#position_id').val(plantilla.position_id);                
                $('#itemNo').val(plantilla.item_no);
                $('#lastAppointment').val(plantilla.date_last_promotion);
                $('#salaryGrade').val(plantilla.sg_no);
                $('#stepNo').val(plantilla.step_no);
                $('#amount').val(plantilla.salary_amount);
            } else {                
                $('#position').val('');
                $('#itemNo').val('');
                $('#lastAppointment').val('');
                $('#salaryGrade').val('');
                $('#stepNo').val('');
                $('#amount').val('');
            }
            
            
        });

    </script>

    <script>

        $(document).keyup(function() {
            var amount = parseFloat($('#amount').val());
            var amount2 = parseFloat($('#amount2').val());
            $('#monthlyDifference').val((( amount2 - amount) || ''));
        });

    </script>
    

@endsection