@extends('layouts.app')
@section('title', 'Service Records')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@prepend('page-css')
<script src="{{ asset('/js/app.js') }}" defer></script>
@endprepend
<style>
    .swal-content ul{
    list-style-type: none;
    }
    #line {
        border-bottom: 1px solid black;
        padding-bottom:15px;
    }
</style>
@endprepend
@section('content')
@include('ServiceRecords.add-ons.success')
<div class="kanban-board card mb-0">
    <div class="card-body">
        <div id="add" class="page-header  {{  count($errors->all())  !== 0 ?  'd-none' : '' }}">
           
            <form action="{{ route('service-records.update', $service_record->id) }}" method="post" id="serviceRecordUpdateForm">
                @csrf
                @method('PUT')
                    <div class="row">

                        <div class="col-12">
                            <div class="alert alert-secondary text-center font-weight-bold" role="alert" >
                               Edit Service Records
                            </div>
                        </div>
                        <div class="form-group col-12 col-lg-12 d-none">
                            <label>Employee_id<span class="text-danger">*</span></label>
                            <input class="form-control" value="{{ $service_record->employee_id }}" name="employeeId" id="employeeId" type="text" readonly>
                        </div>

                        <div class="form-group col-12 col-lg-12 ">
                            <label>Employee Name</label>
                            <select class="form-control form-control-xs selectpicker {{ $errors->has('')  ? 'is-invalid' : ''}}" 
                                name="" data-live-search="true" id="" data-size="5" disabled>
                                <option></option>
                                @foreach($plantilla as $plantillas)
                                <option {{ $service_record->employee_id == $plantillas->employee_id ? 'selected' : '' }} value="{{ $plantillas->employee_id }}">{{ $plantillas->employee->lastname }}, {{ $plantillas->employee->firstname }} {{ $plantillas->employee->middlename }}</option>
                                @endforeach
                                </select>
                           
                        </div>


                        <div class="form-group col-12 col-lg-3">
                            <label>From<span class="text-danger">*</span></label>
                            <input class="form-control" value="{{ $service_record->service_from_date }}" name="fromDate" id="fromDate" type="date">
                        </div>

                        <div class="form-group col-12 col-lg-3">
                            <label>To<span class="text-danger">*</span></label>
                            <input class="form-control" value="{{ $service_record->service_to_date }}" name="toDate" id="toDate" type="date">
                        </div>

                        <div class="form-group col-12 col-lg-3">
                            <label>Position<span class="text-danger">*</span></label>
                            <select value=""  class="form-control selectpicker  {{ $errors->has('positionTitle')  ? 'is-invalid' : ''}}" 
                            name="positionTitle" data-live-search="true" id="positionTitle" data-size="5" data-width="100%">
                            <option></option>
                            @foreach($position as $positions)
                                <option style="width:350px;" {{ $service_record->position_id == $positions->position_id ? 'selected' : '' }} value="{{ $positions->position_id}}">{{ $positions->position_name }}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group col-12 col-lg-3">
                            <label>Status <span class="text-danger">*</span></label>
                            <select value="" name="status" class="select {{ $errors->has('status')  ? 'is-invalid' : ''}}" id="status">
                                @foreach(range(0, 10) as $statuses)
                                    @if($status[$statuses] == $service_record->status))
                                        <option value="{{ $status[$statuses]}}" selected>{{ $status[$statuses] }}</option>
                                    @else
                                        <option value="{{ $status[$statuses]}}">{{ $status[$statuses] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-12 col-lg-3">
                            <label>Salary<span class="text-danger">*</span></label>
                            <input value="{{ $service_record->salary ?? old('salary') }}" class="form-control {{ $errors->has('salary')  ? 'is-invalid' : ''}}" name="salary" id="salary" type="text">
                            <div id='salary-error-message' class='text-danger'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-3">
                            <label>Office<span class="text-danger">*</span></label>
                            <select value="" name="officeCode" class="select {{ $errors->has('officeCode')  ? 'is-invalid' : ''}}" id="officeCode">
                                <option>Please Select</option>
                                @foreach($office as $offices)
                                <option {{ $service_record->office_code == $offices->office_code ? 'selected' : '' }} value="{{ $offices->office_code}}">{{ $offices->office_name }}</option>
                                @endforeach
                            </select>
                            <div id='office-error-message' class='text-danger'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-3">
                            <label>Leave w/o Pay<span class="text-danger">*</span></label>
                            <input value="{{ $service_record->leave_without_pay ?? old('leavePay') }}" class="form-control {{ $errors->has('leavePay')  ? 'is-invalid' : ''}}" name="leavePay" id="leavePay" type="text">
                            <div id='leave-pay-error-message' class='text-danger'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-3">
                            <label>Date<span class="text-danger">*</span></label>
                            <input class="form-control" value="{{ $service_record->separation_date }}" name="date" id="date" type="date">
                            <div id='date-error-message' class='text-danger'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-12">
                            <label>Cause<span class="text-danger">*</span></label>
                            <input value="{{ $service_record->separation_cause ?? old('cause') }}" class="form-control {{ $errors->has('cause')  ? 'is-invalid' : ''}}" name="cause" id="cause" type="text">
                            <div id='cause-error-message' class='text-danger'>
                            </div>
                        </div>

                        <div class="form-group form-group submit-section col-12">
                            <button type="submit" class="btn btn-success submit-btn float-right">Update</button>
                            <a href="/service-records"><button style="margin-right:10px;" type="button" class="text-white btn btn-warning submit-btn float-right"><i class="la la-arrow-left"></i>Back</button></a>
                        </div>

                </div>
                
            <form>
        </div>


    </div>
</div>
@push('page-scripts')
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="{{ asset('/assets/js/service-record.js') }}"></script>
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