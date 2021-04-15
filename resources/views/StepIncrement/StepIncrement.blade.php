@extends('layouts.app')
@section('title', 'Step Increment')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

@endprepend
@section('content')
<div class="kanban-board card mb-0">
    <form action="" method="POST" id="formStepIncrement">
    @csrf
    <div class="row">

        <div class="col-12">
            <div class="alert alert-secondary text-center font-weight-bold" role="alert">Add Step Increment</div>
        </div>

        <div class="card-body">

            <div class="form-group col-12 col-lg-11">
                <label>Date:</label>
                <input class="form-control" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" id="dateIncrement" name="dateStepIncrement" type="date">
            </div>

            <div class="form-group col-12 col-lg-11">
                <input class="form-control"  id="employeeId" name="employeeID" type="hidden" readonly>
            </div>
            
            <div class="form-group col-12 col-lg-11">
                <label>Employee Name:</label>
                <select class="form-control selectpicker" value="" data-live-search="true" name="employeeName" id="employeeName">
                    <option>Search name here</option>
                    @foreach($employee as $employees)
                    <option data-plantilla="{{ $employees->plantilla }}" value="{{ $employees->employee_id }}">{{ $employees->lastname }}, {{ $employees->firstname }} {{ $employees->middlename }}</option>
                    @endforeach
                  </select>
                  <div id="employeeName-error-message" class="text-danger">
                  </div>
            </div>

            <div class="form-group">
            <input type="hidden" name="plantillaID" id="plantillaId" class="">
            </div>

            <div class="form-group col-12 col-lg-11">
                <input class="form-control d-none" value="" id="positionId" name="positionID" type="text" readonly>
            </div>

            <div class="form-group col-12 col-lg-11">
                <label>Position:</label>
                <input class="form-control" value="" id="positionName" name="positionName" type="text" readonly>
            </div>

            <div class="form-group col-12 col-lg-11">
                <label>Item No:</label>
                <input class="form-control" value="" id="itemNo" name="itemNoFrom" type="text" readonly>
            </div>

            <div class="form-group col-12 col-lg-11">
                <label>Date of Last Appointment:</label>
                <input class="form-control" value="" id="lastAppointment" name="datePromotion" type="text" readonly>
            </div>
            
            <div class="form-row col-12">
                <div class="form-group col-6 col-lg-6">
                    <label>Salary Grade:</label>
                    <input class="form-control" value="" id="salaryGrade" name="sgNoFrom" type="text" readonly>                    
                </div>
                
                <div class="form-group col-6 col-lg-5">
                    <label>Step:</label>
                    <input class="form-control" value="" id="stepNo" name="stepNoFrom" type="text" readonly>                
                </div>
            </div>
            
            <div class="form-group col-12 col-lg-11">
                <label>Amount:</label>
                <input class="form-control" value="" id="amount" name="amountFrom" type="text" readonly>
            </div>
        </div>

        {{-- FORM THAT HAS TO BE INPUT --}}
        <!-- <div class="step-increment"> -->
        <div class="card-body">        
            <div class="form-group col-12 col-lg-12">
                <label>Salary Grade:</label>
                <select id="sgNo2" name="sgNo2" value="{{ old('sgNo2') }}" class="select floating {{ $errors->has('sgNo2')  ? 'is-invalid' : ''}}">
                    <option>Please select</option>
                    @foreach (range(1, 35) as $salarygrade)
                      <option value="{{ $salarygrade }}">{{ $salarygrade }}</option>
                    @endforeach
                 </select>
                 <div id="sgNo2-error-message" class="text-danger">
                 </div>
            </div>

            <div class="form-group col-12 col-lg-12">
                <label>Step:</label>
                <select name="stepNo2" id="stepNo2" value="{{ old('stepNo2') }}" class="select floating {{ $errors->has('stepNo2')  ? 'is-invalid' : ''}}">
                    <option>Please select</option>
                    @foreach (range(1, 8) as $step)
                      <option value="{{ $step }}">{{ $step }}</option>
                    @endforeach
                 </select>
                 <div id="stepNo2-error-message" class="text-danger">
                </div>
            </div>
            
            <div class="form-group col-12 col-lg-12">
                <label>Amount:</label>
                <input class="form-control" value="" id="amount2" name="amount2" type="text" placeholder="Please enter the amount">
                <div id="amount2-error-message" class="text-danger">
                </div>
            </div>

            <div class="form-group col-12 col-lg-12">
                <label>Monthly Difference:</label>
                <input class="form-control" value="" id="monthlyDifference" name="monthlyDifference" type="text" readonly>
            </div>

            <div class="form-group col-12 col-lg-12" id="buttons">
                <button type="button" id="btnCancel" class="form-control col-5 btn btn-warning float-right">Cancel</button>
                <button type="submit" style="margin-right:10px" id="btnSave"  class="form-control col-5 float-right btn btn-success mb-5">Save</button>
            </div>
        </div>
    <form>
    </div>
</div>
@push('page-scripts')
<script src="{{ asset('/assets/js/custom.js') }}"></script>
@endpush
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
(function() {
    let isSuccess = "{{ Session::get('success') }}";
    if(isSuccess) {
        swal("Good job!", "Successfully add new step increment.", "success");
    }
})();
</script>
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
                $('#positionName').val(plantilla.position.position_name);
                $('#positionId').val(plantilla.position.position_id);                
                $('#itemNo').val(plantilla.item_no);
                $('#lastAppointment').val(plantilla.date_last_promotion);
                $('#salaryGrade').val(plantilla.sg_no);
                $('#stepNo').val(plantilla.step_no);
                $('#amount').val(plantilla.salary_amount);
            } else {
                console.log("Hello World");                
                $('#positionName').val('');
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

    <script>
        $(document).ready(function() {
            $('#btnSave').click(function (e) {
                e.preventDefault()
                
                let employeeName = $('#employeeName').val(); 
                let sgNo = $('#sgNo2').val();
                let stepNo = $('#stepNo2').val();
                let amount = $('#amount2').val();
                let errors = {};
                let filteredError = "";
             
                if( amount == "" ){
                    $('#amount2-error-message').html('');
                    $('#amount2-error-message').append(`<span class="text-danger"> The amount value is required. </span>`);
                    errors.amount = true;
                }else {
                    $('#amount2-error-message').html('');
                    errors.amount = false;
                }

                if( employeeName == "" || employeeName.toLowerCase() == 'search name here' ){
                    $('#employeeName-error-message').html('');
                    $('#employeeName-error-message').append(`<span class="text-danger"> Employee name is required. </span>`);
                    errors.employee = true;
                }else {
                    $('#employeeName-error-message').html('');
                    errors.employee = false;
                }

                if( sgNo == "" || sgNo.toLowerCase() == 'please select' ){
                    $('#sgNo2-error-message').html('');
                    $('#sgNo2-error-message').append(`<span> The salary grade is required. </span>`);
                    errors.sgNo = true;
                }else {
                    $('#sgNo2-error-message').html('');
                    errors.sgNo = false;
                }

                if( stepNo == "" || stepNo.toLowerCase() == 'please select' ){
                    $('#stepNo2-error-message').html('');
                    $('#stepNo2-error-message').append(`<span> The step no. is required. </span>`);
                    errors.stepNo = true;
                } else {
                    $('#stepNo2-error-message').html('');
                    errors.stepNo = false;
                }

                
                filteredError = Object.values(errors).filter((error) => error);

                // Check if the filtered error array variable has value or not.
                // if the length of this array is 0 this means that there is no error
                // or all fields that required is filled by the user.                
                if(filteredError.length === 0) {
                    $('#formStepIncrement').submit();
                }


            })  

            $('#btnCancel').click(function (e) {
                location.reload();
            })
        });         


    </script>
    

@endsection