@extends('layouts.app')
@section('title', 'SERVICE RECORDS')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<link rel="stylesheet"
    href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />
@prepend('page-css')
<script src="{{ asset('/js/app.js') }}" defer></script>
@endprepend
<style>
    .swal-content ul {
        list-style-type: none;
    }

    #line {
        border-bottom: 1px solid black;
        padding-bottom: 15px;
    }

</style>
@endprepend
@section('content')
@include('ServiceRecords.add-ons.success')
<div class="kanban-board card shadow mb-0">
    <div class="card-body">
        <div id="add" class="page-header">

            <form action="{{ route('service-records.update', $service_record->id) }}" method="post"
                id="serviceRecordUpdateForm">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="col-12">
                        <div class="alert alert-secondary text-center font-weight-bold" role="alert">
                            EDIT SERVICE RECORDS
                        </div>
                    </div>
                    <div class="form-group col-12 col-lg-12 d-none">
                        <label>Employee_id<span class="text-danger">*</span></label>
                        <input class="form-control" value="{{ $service_record->employee_id }}" name="employeeId"
                            id="employeeId" type="text" readonly>
                    </div>

                    <div class="form-group col-12 col-lg-12 ">
                        <label class="has-float-label mb-0">
                            <input type="text" class='form-control form-control-xs' value="{{ $service_record->employee->fullname }}" readonly>
                            <span class="font-weight-bold">EMPLOYEE NAME</span>
                        </label>
                    </div>


                    <div class="form-group col-12 col-lg-6">
                        <label class="has-float-label mb-0">
                            <input class="form-control {{ $errors->has('fromDate')  ? 'is-invalid' : ''}}" value="{{ $service_record->service_from_date }}" name="fromDate"
                                id="fromDate" type="date" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span class="font-weight-bold">FROM<span class="text-danger">*</span></span>
                        </label>
                        @if($errors->has('fromDate'))
                            <small class="form-text text-danger">
                                {{ $errors->first('fromDate') }} </small>
                            @endif
                    </div>

                    <div class="form-group col-12 col-lg-6">
                        <label class="has-float-label mb-0">
                            <input class="form-control {{ $errors->has('toDate')  ? 'is-invalid' : ''}}" value="{{ $service_record->service_to_date }}" name="toDate"
                                id="toDate" type="date" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span class="font-weight-bold">TO<span class="text-danger">*</span></span>
                        </label>
                        @if($errors->has('toDate'))
                        <small class="form-text text-danger">
                            {{ $errors->first('toDate') }} </small>
                        @endif
                    </div>

                    <div class="form-group col-12 col-lg-4">
                        <label class="has-float-label mb-0">
                            <input value="{{ $service_record->salary ?? old('salary') }}"
                                class="form-control {{ $errors->has('salary')  ? 'is-invalid' : ''}}" name="salary"
                                id="salary" type="text" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span class="font-weight-bold">SALARY<span class="text-danger">*</span></span>
                        </label>
                        @if($errors->has('salary'))
                        <small class="form-text text-danger">
                            {{ $errors->first('salary') }} </small>
                        @endif
                    </div>

                    <div class="form-group col-12 col-lg-4">
                        <label class="has-float-label mb-0">
                            <input value="{{ $service_record->leave_without_pay ?? old('leavePay') ?? 0 }}"
                                class="form-control {{ $errors->has('leavePay')  ? 'is-invalid' : ''}}" name="leavePay"
                                id="leavePay" type="text" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span class="font-weight-bold">LEAVE WITHOUT PAY<span class="text-danger">*</span></span>
                        </label>
                        @if($errors->has('leavePay'))
                        <small class="form-text text-danger">
                            {{ $errors->first('leavePay') }} </small>
                        @endif
                    </div>

                    <div class="form-group col-12 col-lg-4">
                        <label class="has-float-label mb-0">
                            <input class="form-control {{ $errors->has('date')  ? 'is-invalid' : ''}}" value="{{ $service_record->separation_date ?? date('Y-m-d') }}" name="date"
                                id="date" type="date" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span class="font-weight-bold">DATE<span class="text-danger">*</span></span>
                        </label>
                        @if($errors->has('date'))
                        <small class="form-text text-danger">
                            {{ $errors->first('date') }} </small>
                        @endif
                    </div>



                    <div class="form-group col-12 col-lg-4">
                        <label class="has-float-label mb-0">
                        <select value=""
                            class="form-control selectpicker  {{ $errors->has('status')  ? 'is-invalid' : ''}}"
                            name="status" data-live-search="true" id="status" data-width="100%" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <option></option>
                            @foreach($statuses as $status)
                                <option value="{{ $status }}" {{ Str::upper($status) === Str::upper($service_record->status) }}>{{ $status }}</option>
                            @endforeach
                        </select>
                        <span class="font-weight-bold">STATUS<span class="text-danger">*</span></span>
                    </label>
                    @if($errors->has('status'))
                    <small class="form-text text-danger">
                        {{ $errors->first('status') }} </small>
                    @endif
                    </div>


                    <div class="form-group col-12 col-lg-4">
                        <label class="has-float-label mb-0">
                        <select value=""
                            class="form-control selectpicker  {{ $errors->has('positionTitle')  ? 'is-invalid' : ''}}"
                            name="positionTitle" data-live-search="true" id="positionTitle" data-size="5"
                            data-width="100%">
                            <option></option>
                            @foreach($positions as $position)
                            <option style="width:350px;" value="{{ $position->PosCode }}">{{ $position->Description }}</option>
                            @endforeach
                        </select>
                        <span class="font-weight-bold">POSITION<span class="text-danger">*</span></span>
                    </label>
                    @if($errors->has('positionTitle'))
                    <small class="form-text text-danger">
                        {{ $errors->first('positionTitle') }} </small>
                    @endif
                    </div>

                    <div class="form-group col-12 col-lg-4">
                        <label class="has-float-label mb-0">
                        <select value=""
                            class="form-control selectpicker  {{ $errors->has('officeCode')  ? 'is-invalid' : ''}}"
                            name="officeCode" data-live-search="true" id="officeCode" data-size="4"
                            data-width="100%" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <option></option>
                            @foreach($office as $offices)
                            <option style="width:350px;" {{ $service_record->office_code == $offices->office_code ? 'selected' : '' }}
                                value="{{ $offices->office_code}}">{{ $offices->office_name }}</option>
                            @endforeach
                        </select>
                        <span class="font-weight-bold">OFFICE<span class="text-danger">*</span></span>
                    </label>
                    @if($errors->has('officeCode'))
                    <small class="form-text text-danger">
                        {{ $errors->first('officeCode') }} </small>
                    @endif
                    </div>

                    <div class="form-group col-12 col-lg-6">
                        <label class="has-float-label mb-0">
                            <textarea value=""
                                class="form-control {{ $errors->has('cause')  ? 'is-invalid' : ''}}" name="cause"
                                id="cause" type="text" style="outline: none; box-shadow: 0px 0px 0px transparent;"
                                rows="3">{{ $service_record->separation_cause ?? old('cause') ?? 'N/A' }}</textarea>
                            <span class="font-weight-bold">CAUSE<span class="text-danger">*</span></span>
                        </label>
                        @if($errors->has('cause'))
                            <small class="form-text text-danger">
                                {{ $errors->first('cause') }} </small>
                            @endif
                    </div>

                    <div class="form-group form-group submit-section col-12">
                        <button type="submit" class="btn btn-success text-white submit-btn float-right"><i
                                class="fas fa-check"></i> Update</button>
                        <a href="{{ route('service-records.index') }}"><button style="margin-right:10px;" type="button"
                                class="text-white btn btn-warning submit-btn float-right"><i
                                    class="fas fa-arrow-left"></i> Back</button></a>
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
    const SERVICE_RECORD_POSITION = "{{ $service_record->PosCode }}";
    const SERVICE_RECORD_OFFICE = "{{ $service_record->office_code }}";
    const SERVICE_RECORD_STATUS = "{{ $service_record->status }}";

    $('#positionTitle').val(SERVICE_RECORD_POSITION).selectpicker('refresh');
    $('#officeCode').val(SERVICE_RECORD_OFFICE).selectpicker('refresh');
    $('#status').val(SERVICE_RECORD_STATUS).selectpicker('refresh');
</script>
@endpush
@endsection
