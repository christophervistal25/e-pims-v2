@extends('layouts.app')
@section('title', 'Salary Adjustment')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endprepend
@section('content')
<div class="kanban-board card mb-0">
    <form action="" method="">
    @csrf
        <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-secondary text-center font-weight-bold" role="alert" >Salary Adjustment</div>
                    </div>

                    <div class="form-group col-12 col-lg-4">
                        <label>Date Adjustment<span class="text-danger">*</span></label>
                        <input class="form-control" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" name="dateAdjustment" id="dateAdjustment" type="date">
                    </div>

                    <div class="form-group col-12 col-lg-4">
                        <label>Employee Name<span class="text-danger">*</span></label>
                        <select value="" class="form-control form-control-xs selectpicker {{ $errors->has('employeeName')  ? 'is-invalid' : ''}}" 
                        name="employeeName" data-live-search="true" id="employeeName" data-size="5">
                        <option></option>
                        @foreach($employee as $employees)
                        <option {{ old('employeeName') == $employees->employee_id ? 'selected' : '' }} value="{{ $employees->employee_id }}"> {{ $employees->firstname }} {{ $employees->middlename }} {{ $employees->lastname }}</option> --}}
                   @endforeach
                        </select>
                    </div>

                    <div class="form-group col-12 col-lg-4">
                        <label>Item No<span class="text-danger">*</span></label>
                        <input class="form-control" value="" name="itemNo" id="itemNo" type="text" placeholder="Input item No.">
                    </div>

                    <div class="form-group col-12 col-lg-4">
                        <label>Position<span class="text-danger">*</span></label>
                        {{-- <input class="form-control" value="" name="position" id="position" type="text" readonly> --}}
                        <select value=""  class="form-control selectpicker" 
                            name="position" id="position" data-size="5" data-width="100%">
                            <option></option>
                            @foreach($position as $positions)
                                <option style="width:350px;" {{ old('positionTitle') == $positions->position_id ? 'selected' : '' }} value="{{ $positions->position_id}}">{{ $positions->position_name }}</option>
                            @endforeach
                            </select>
                    </div>

                    <div class="form-group col-12 col-lg-4">
                        <label>Salary Grade<span class="text-danger">*</span></label>
                        <input class="form-control" value="" name="salaryGrade" id="salaryGrade" type="text" readonly>
                    </div>
                    
                    <div class="form-group col-12 col-lg-4">
                        <label>Step No<span class="text-danger">*</span></label>
                        <input class="form-control" value="" name="stepNo" id="stepNo" type="text" readonly>
                    </div>

                    <div class="form-group col-12 col-lg-3 d-none">
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

                    <div class="form-group col-12 col-lg-4">
                        <label>Salary Previous<span class="text-danger">*</span></label>
                        <input class="form-control" value="" name="salaryPrevious" id="salaryPrevious" type="text" readonly>
                    </div>

                    <div class="form-group col-12 col-lg-4">
                        <label>Salary New<span class="text-danger">*</span></label>
                        <input class="form-control" value="" name="salaryNew" id="salaryNew" type="text" placeholder="Input Salary New" onkeyup="myFunction()">
                    </div>

                    <div class="form-group col-12 col-lg-4">
                        <label>Salary Difference<span class="text-danger">*</span></label>
                        <input class="form-control" value="" name="salaryDifference" id="salaryDifference" type="text" readonly>
                    </div>

                    <div class="form-group form-group submit-section col-12">
                        <button type="submit" id="save" class="btn btn-success submit-btn float-right">Save</button>
                        <button style="margin-right:10px;" type="button" id="cancelbutton" class="text-white btn btn-warning submit-btn float-right">Cancel</button>
                    </div>

            </div>
        </div>
    <form>
</div>
@push('page-scripts')
<script src="{{ asset('/assets/js/custom.js') }}"></script>
{{-- scripts --}}
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
                $("#employeeName").change(function(){
                let employeeName = $('#employeeName').val();
                console.log(employeeName);
                        $.ajax({
                            url: `/api/salaryAdjustment/${employeeName}`,
                            success:(response) => {
                                    let position = response.plantilla.position_id;
                                    $('#position').val(position);
                                    let salaryGrade = response.plantilla.sg_no;
                                    $('#salaryGrade').val(salaryGrade);
                                    let stepNo = response.plantilla.step_no;
                                    $('#stepNo').val(stepNo);
                                    let salaryPrevious = response.plantilla.salary_amount;
                                    $('#salaryPrevious').val(salaryPrevious);
                            }
                    });
                });
            });

            // $(document).ready(function() {
            //     $("#itemNo").keyup(function(){
            //     let salaryGrade = $('#salaryGrade').val();
            //     let stepNo = $('#stepNo').val();
            //     let currentSgyear = $('#currentSgyear').val();
            //             $.ajax({
            //                 url: `/api/salaryAdjustmentnew/${salaryGrade}/${stepNo}/${currentSgyear}`,
            //                 success:(response) => {
            //                     console.log(response);
            //                     let salaryNew = response['sg_step' + stepNo];
            //                     //     let position = response.plantilla.position_id;
            //                         $('#salaryNew').val(salaryNew);
            //                 }
            //         });
            //     });
            // });

            $(document).keyup(function() {
            var salaryPrevious = parseFloat($('#salaryPrevious').val());
            var salaryNew = parseFloat($('#salaryNew').val());
            let total = salaryNew - salaryPrevious;
            $('#salaryDifference').val(total.toLocaleString());
        });
</script>


@endpush
@endsection