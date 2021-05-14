@extends('layouts.app')
@section('title', 'Edit Step Increment')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"> --}}
 <script src="{{ asset('js/app.js') }}" defer></script>
@endprepend
@section('content')
    @foreach($errors->all() as $error)
        {{ $error }}
    @endforeach
    {{-- VIEW TABLE BUTTON IN FORM --}}
    <div class="float-right mr-3 mb-2" id='btnViewTableContainer'>
        <a href="{{ route('print-increment', $stepIncrement->id) }}" class="btn btn-secondary"><i class="la la-print"></i>&nbsp; Print Preview</a>
        <a href="/step-increment" class="btn btn-info"><i class="la la-list"></i>&nbsp; View List </a>
    </div>
    <div class="clearfix"></div>

    {{-- FORM AND TABLE --}}
    <div class="content container-fluid">
        <div class="kanban-board card mb-0">
            <div class="card-body">
                <form action="{{ route('step-increment.update', $stepIncrement->id ) }}" method="POST" id="formStepIncrement">
                @csrf
                @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-secondary text-center font-weight-bold" role="alert">Edit Step Increment</div>
                        </div>
                        <div class="card-body">
                            <div class="form-group col-12 col-lg-11">
                                <label>Date:</label>
                                <input class="form-control" value="{{ old('dateStepIncrement') ?? $stepIncrement->date_step_increment }}" id="dateIncrement" name="dateStepIncrement" type="date">
                            </div>

                            <div class="form-group col-12 col-lg-11">
                                <input class="form-control" value="{{ $stepIncrement->employee_id }}" id="employeeId" name="employeeID" type="hidden" readonly>
                            </div>
                            
                            <div class="form-group col-12 col-lg-11">
                                <label>Employee Name:</label>
                                <input type="text" name="employeeName" class="form-control" value="{{ old('employeeName') ?? $employee->lastname }}, {{ old('employeeName') ?? $employee->firstname }} {{ old('employeeName') ?? $employee->middlename }}" readonly>
                                <div id="employeeName-error-message" class="text-danger">
                                </div>
                            </div>

                            <div class="form-group col-12 col-lg-11">
                                <input class="form-control" value="{{ $position->position_id }}" id="positionID" name="positionID" type="hidden" readonly>
                            </div>

                            <div class="form-group col-12 col-lg-11">
                                <label>Position:</label>
                                <input class="form-control" value="{{ old('positionName') ?? $position->position_name }}" id="positionName" name="positionName" type="text" readonly>
                            </div>

                            <div class="form-group col-12 col-lg-11">
                                <label>Item No:</label>
                                <input class="form-control" value="{{ old('itemNo') ?? $stepIncrement->item_no }}" id="itemNo" name="itemNoFrom" type="text" readonly>
                            </div>

                            <div class="form-group col-12 col-lg-11">
                                <label>Date of Last Appointment:</label>
                                <input class="form-control" value="{{ old('datePromotion') ?? $stepIncrement->date_latest_appointment }}" id="lastAppointment" name="datePromotion" type="text" readonly>
                            </div>
                            
                            <div class="form-row col-12">
                                <div class="form-group col-6 col-lg-6">
                                    <label>Salary Grade:</label>
                                    <input class="form-control" value="{{ old('sgNoFrom') ?? $stepIncrement->sg_no_from }}" id="salaryGrade" name="sgNoFrom" type="text" readonly>                    
                                </div>
                                
                                <div class="form-group col-6 col-lg-5 ml-2">
                                    <label>Step:</label>
                                    <input class="form-control" value="{{ old('stepNoFrom') ?? $stepIncrement->step_no_from }}" id="stepNo" name="stepNoFrom" type="text" readonly>                
                                </div>
                            </div>
                            
                            <div class="form-group col-12 col-lg-11">
                                <label>Amount:</label>
                                <input class="form-control" value="{{ old('amountFrom') ?? $stepIncrement->salary_amount_from }}" id="amount" name="amountFrom" type="text" readonly>
                            </div>
                        </div>

                        {{-- FORM THAT HAS TO BE INPUT --}}
                        <!-- <div class="step-increment"> -->
                        <div class="card-body">        
                            <div class="form-group col-12 col-lg-12">
                                <label>Salary Grade:</label>
                                <input type="text" class="form-control" value="{{ old('sgNo2') ?? $stepIncrement->sg_no_to }}" name="sgNo2" id="sgNo2" readonly>
                                <div id="sgNo2-error-message" class="text-danger">
                                </div>
                            </div>

                            <div class="form-group col-12 col-lg-12">
                                <label>Step:</label>
                                <select name="stepNo2" id="stepNo2" value="" class="form-control floating">
                                @if(old('stepNo2'))
                                    @foreach(range($stepIncrement->step_no_from + 1, 8) as $step)
                                        <option {{ old('stepNo2') == $stepIncrement->step_no_to ? 'selected' : '' }} value="{{ $step }}">{{ $step }}</option>
                                    @endforeach
                                    @else
                                    @foreach(range($stepIncrement->step_no_from + 1, 8) as $step)
                                        <option {{ $step == $stepIncrement->step_no_to ? 'selected' : '' }} value="{{ $step }}">{{ $step }}</option>
                                    @endforeach
                                @endif
                                
                                    
                                </select>
                                <div id="stepNo2-error-message" class="text-danger">
                                </div>
                            </div>
                            
                            <div class="form-group col-12 col-lg-12">
                                <label>Amount:</label>
                                <input class="form-control" value="{{ old('amount2') ?? $stepIncrement->salary_amount_to }}" id="amount2" name="amount2" type="text" readonly>
                                <div id="amount2-error-message" class="text-danger">
                                </div>
                            </div>

                            <div class="form-group col-12 col-lg-12">
                                <label>Monthly Difference:</label>
                                <input class="form-control" value="{{ old('monthlyDifference') ?? $stepIncrement->salary_diff }}" id="monthlyDifference" name="monthlyDifference" type="text" readonly>
                            </div>

                            <div class="form-group col-12 col-lg-12" id="buttons">
                                {{-- <a href="/step-increment" type="button" id="btnCancel" class="form-control col-5 btn btn-warning float-right">Back</a> --}}
                                <button type="submit" id="btnUpdate" class="form-control col-12 float-right btn btn-success mb-3">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('page-scripts')
    <script src="{{ asset('/assets/js/custom.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
    (function() {
        let isSuccess = "{{ Session::get('success') }}";
        if(isSuccess) {
            swal("Good Job!", "You successfully update.", "success");
        } 
    })();

        $(document).ready(function(e) {
                $('#stepNo2').change(function (e) {
                    let selectedSetep = e.target.value;
                    $.ajax({
                        url : `/api/step/${$('#sgNo2').val()}/${selectedSetep}`,
                        success : function (response) {
                            $('#amount2').val(`${response['sg_step' + selectedSetep]}`)
                            var amount = parseFloat($('#amount').val());
                            var amount2 = parseFloat($('#amount2').val());
                            var amountDifference = parseFloat((( amount2 - amount) || ''));
                            $('#monthlyDifference').val(amountDifference);
                        }
                    });
                });

            $('#btnCancel').click(function (e) {
                location.reload();
            })


        });
    </script>

    @endpush
    
    @endsection