@extends('layouts.app')
@section('title', 'Edit Step Increment')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link rel="stylesheet"
    href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />
<link rel="stylesheet" href="/assets/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/assets/css/style.css">

@endprepend
@section('content')
@foreach($errors->all() as $error)
{{ $error }}
@endforeach
{{-- VIEW TABLE BUTTON IN FORM --}}
<div class="float-right mr-3 mb-2" id='btnViewTableContainer'>
    <a href="{{ route('print-increment', $stepIncrement->id) }}" class="btn btn-info"><i class="fas fa-print"></i>&nbsp;
        Print Preview</a>
    <a href="/step-increment" class="btn btn-primary"><i class="fa fa-list"></i>&nbsp; Personnel List </a>
</div>
<div class="clearfix"></div>

{{-- FORM AND TABLE --}}
<div class="content container-fluid">
    <div class="kanban-board card shadow mb-0">
        <div class="card-body">
            <form action="{{ route('step-increment.update', $stepIncrement->id ) }}" method="POST"
                id="formStepIncrement">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-secondary text-center font-weight-bold" role="alert">EDIT STEP INCREMENT
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group col-12 col-lg-11">
                            <label for="dateIncrement" class="has-float-label">
                                <input class="form-control"
                                    value="{{ old('dateStepIncrement') ?? $stepIncrement->date_step_increment }}"
                                    id="dateIncrement" name="dateStepIncrement" type="date" 
                                    style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span class="font-weight-bold">DATE</span>
                            </label>
                        </div>

                        <input type="hidden" value="{{ $stepIncrement->id }}" id="stepId" name="stepID">

                        <div class="form-group col-12 col-lg-11">
                            <input class="form-control" value="{{ $stepIncrement->employee_id }}" id="employeeId"
                                name="employeeID" type="hidden" readonly>
                        </div>

                        <div class="form-group col-12 col-lg-11">
                            <label class="has-float-label" for="employeeName">
                                <input type="text" name="employeeName" class="form-control" id="employeeName"
                                    value="{{ old('employeeName') ?? $employee->LastName }}, {{ old('employeeName') ?? $employee->FirstName }} {{ old('employeeName') ?? $employee->MiddleName }}"
                                    readonly style="outline: none; box-shadow: 0px 0px 0px ">
                                <span class="font-weight-bold">EMPLOYEE NAME</span>
                            </label>
                            <div id="employeeName-error-message" class="text-danger">
                            </div>
                        </div>

                        {{-- <div class="form-group col-12 col-lg-11">
                            <input class="form-control" value="{{ $position->PosCode }}" id="positionID"
                        name="positionID" type="hidden" readonly>
                    </div> --}}

                    <div class="form-group col-12 col-lg-11">
                        <label class="has-float-label" for="positionName">
                            <input class="form-control" value="{{ old('positionName') ?? $position->Description }}"
                                id="positionName" name="positionName" type="text" readonly
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span class="font-weight-bold">POSITION</span>
                        </label>
                    </div>

                    <div class="form-group col-12 col-lg-11">
                        <label class="has-float-label" for="itemNo">
                            <input class="form-control" value="{{ old('itemNo') ?? $stepIncrement->item_no }}"
                                id="itemNo" name="itemNoFrom" type="text" readonly
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span class="font-weight-bold">ITEM NO</span>
                        </label>
                    </div>

                    <div class="form-group col-12 col-lg-11">
                        <label class="has-float-label" for="lastAppointment">
                            <input class="form-control"
                                value="{{ old('datePromotion') ?? $stepIncrement->last_latest_appointment }}"
                                id="lastAppointment" name="datePromotion" type="text" readonly
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span class="font-weight-bold">DATE OF LAST APPOINTMENT</span>
                        </label>
                    </div>

                    <div class="form-row col-12">
                        <div class="form-group col-6 col-lg-6">
                            <label class="has-float-label" for="salaryGrade">
                                <input class="form-control" value="{{ old('sgNoFrom') ?? $stepIncrement->sg_no_from }}"
                                    id="salaryGrade" name="sgNoFrom" type="text" readonly
                                    style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span class="font-weight-bold">SALARY GRADE</span>
                            </label>
                        </div>

                        <div class="form-group col-6 col-lg-5 ml-2">
                            <label class="has-float-label" for="stepNo">
                                <input class="form-control"
                                    value="{{ old('stepNoFrom') ?? $stepIncrement->step_no_from }}" id="stepNo"
                                    name="stepNoFrom" type="text" readonly
                                    style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span class="font-weight-bold">STEP</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-11">
                        <label class="has-float-label" for="amount">
                            <input class="form-control"
                                value="{{ old('amountFrom') ?? $stepIncrement->salary_amount_from }}" id="amountFrom"
                                name="amountFrom" type="text" readonly
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span class="font-weight-bold">AMOUNT</span>
                        </label>
                    </div>
                </div>

                {{-- FORM THAT HAS TO BE INPUT --}}
                <!-- <div class="step-increment"> -->
                <div class="card-body">
                    <div class="form-group col-12 col-lg-12">
                        <label class="has-float-label" for="sgNo2">
                            <input type="text" class="form-control"
                                value="{{ old('sgNo2') ?? $stepIncrement->sg_no_to }}" name="sgNo2" id="sgNo2" readonly
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span class="font-weight-bold">SALARY GRADE</span>
                        </label>
                        <div id="sgNo2-error-message" class="text-danger">
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-12">
                        <label class="has-float-label" for="stepNo2">
                            <select name="stepNo2" id="stepNo2" value="" class="form-control floating"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                @if(old('stepNo2'))
                                @foreach(range($stepIncrement->step_no_from + 1, 8) as $step)
                                <option {{ old('stepNo2') == $stepIncrement->step_no_to ? 'selected' : '' }}
                                    value="{{ $step }}">{{ $step }}</option>
                                @endforeach
                                @else
                                @foreach(range($stepIncrement->step_no_from + 1, 8) as $step)
                                <option {{ $step == $stepIncrement->step_no_to ? 'selected' : '' }} value="{{ $step }}">
                                    {{ $step }}</option>
                                @endforeach
                                @endif
                            </select>
                            <span class="font-weight-bold">STEP</span>
                        </label>
                        <div id="stepNo2-error-message" class="text-danger">
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-12">
                        <label class="has-float-label" for="amount2">
                            <input class="form-control" value="{{ old('amount2') ?? $stepIncrement->salary_amount_to }}"
                                id="amountTo" name="amount2" type="text" readonly
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span class="font-weight-bold">AMOUNT</span>
                        </label>
                        <div id="amount2-error-message" class="text-danger">
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-12 mb-0">
                        <label class="has-float-label" for="monthlyDifference">
                            <input class="form-control"
                                value="{{ old('monthlyDifference') ?? $stepIncrement->salary_diff }}"
                                id="monthlyDifference" name="monthlyDifference" type="text" readonly
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span class="font-weight-bold">MONTHLY DIFFERENCE</span>
                        </label>
                    </div>
                    <div class="text-center">
                        <button type="submit" id="btnUpdate" class="col-6 text-white btn btn-sm btn-success shadow">
                            <i class="fas fa-save"></i> Save Changes
                        </button>
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


{{-- Javascript Function --}}
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // GET THE VALUE OF INPUT //

    $(document).ready((e) => {

        $('#stepNo2').change((e) => {
            let valueSelected = e.target.value;
            $.ajax({
                url: `/api/step/${$('#sgNo2').val()}/${valueSelected}`,
                success: function (response) {

                    $('#stepNo2').append(`<option value='${valueSelected}'>${valueSelected}</option>`);

                    
                    $('#amountTo').val(`${response['sg_step' + valueSelected]}`)
                    var amountFrom = parseFloat($('#amountFrom').val());
                    var amountTo = parseFloat($('#amountTo').val());
                    var amountDifference = parseFloat(((amountTo - amountFrom) || ''));
                    $('#monthlyDifference').val(amountDifference);
                }
            });
        });

    });


    $('#btnUpdate').on('click', function (e) {
        e.preventDefault()


        $.ajax({
            url: `/api/step-increment/update/${stepId}`,
            type: "POST",
            data: $('#formStepIncrement').serialize(),

            success: function (response) {

            }
        });

        swal("Good Job!", "You have successfully updated the data.", "success");

    });

</script>
@endpush

@endsection
