@extends('layouts.app')
@section('title', 'View Promotion')
@prepend('page-css')
<link rel="stylesheet" href="/assets/css/style.css" />
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
    .btn-primarys {
        background-color: #FF9B44;
        color: white;
    }

    .btn-primarys:hover {
        background-color: #FF8544;
        color: white;
    }

</style>
@endprepend
@section('content')
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
  {{ Session::get('success') }}
</div>
@endif
<div class="card rounded-0 shadow-none">
    <div class="card-body">
        <form action="{{ route('promotion.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-10">
                    <label class='text-uppercase h6'>Employee Name</label>
                    <input type="text" class="form-control" value="{{ $details?->plantillas?->Employee?->fullname }}" readonly>
                </div>

                <div class="col-lg-2">
                    <label class='text-uppercase h6'>Employee ID</label>
                    <input type="text" id="employeeID" class='form-control' readonly value="{{ $details?->plantillas->employee_id }}">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <label class='text-uppercase h6'>Office</label>
                    <input type="text" class="form-control" readonly value="{{ $details?->office->office_name }}">
                </div>
                <div class="col-lg-6">
                    <label class='text-uppercase h6'>Position</label>
                    <input type="text" class="form-control" value="{{ $details?->position->Description }}" readonly>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-3">
                    <label class='text-uppercase h6'>Division</label>
                    <input type="text" id="division" class="form-control form-control-xs border" name="division"  value="{{ $details?->division?->division_name }}" readonly>
                </div>

                <div class="col-lg-3">
                    <label class='text-uppercase h6'>Section</label>
                    <input class="form-control form-control-xs border" value="{{ $details?->section?->section_name }}" name="section" id="section" readonly />
                </div>

                <div class="col-lg-6">
                    <label class='text-uppercase h6'>Status</label>
                    <input class="form-control form-control-xs" value="{{ $details?->plantillas?->status }}" name="status" id="status" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <label class='text-uppercase h6'>Item No</label>
                    <input type="text" class='form-control form-control-xs' value="{{ $details->item_no }}" name="item_no" id="item_no" readonly>
                </div>

                <div class="col-lg-6">
                    <label class='text-uppercase h6'>Current Item No</label>
                    <div class="input-group mb-3">
                        <input type="text" class='form-control form-control-xs' value="{{ $details->plantillas->old_item_no }}" name="old_item_no" id="old_item_no"
                            readonly>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-lg-3">
                    <label class='text-uppercase h6'>Current Salary Grade Year</label>
                    <input type="text" class='form-control form-control-xs ' name="current_salary_grade_year"
                        id="current_salary_grade_year" readonly value="{{ $details?->plantillas?->year }}">
                </div>

                <div class="col-lg-3">
                    <label class='text-uppercase h6'>Salary Grade</label>
                    <input type="text" class='form-control form-control-xs' value="{{ $details?->plantillas?->sg_no }}" name="salary_grade" id="salary_grade"
                        readonly>
                </div>

                <div class="col-lg-3">
                    <label class='text-uppercase h6'>Steps</label>
                    <input class='form-control form-control-xs' value="{{ $details?->plantillas?->step_no }}" name="step" id="step" readonly>
                </div>

                <div class="col-lg-3">
                    <label class='text-uppercase h6'>Salary Amount</label>
                    <input type="text" class='form-control form-control-xs' value="{{ $details?->plantillas?->salary_amount }}" name="salary_amount" id="salary_amount"
                        readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <label class='text-uppercase h6'>Original Appointment</label>
                    <input type="date" id="original_appointment" class='form-control form-control-xs' readonly value="{{ $details?->plantillas?->date_original_appointment }}" name="original_appointment">
                </div>

                <div class="col-lg-6">
                    <label class='text-uppercase h6'>Last Promotion</label>
                    <input type="date" class='form-control form-control-xs' readonly name="last_promotion" id="last_promotion" value="{{ $details?->plantillas?->date_last_promotion }}">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <label class='text-uppercase h6'>Area Code</label>
                    <input type="text" class="form-control" name="area_code" id="area_code" readonly value="{{ $details?->areaCode?->area_code_id . ' - ' . $details?->areaCode?->description }}">
                </div>

                <div class="col-lg-4">
                    <label class='text-uppercase h6'>Area Type</label>
                    <input type="text" class="form-control" name="area_type" id="area_type" readonly value="{{ $details?->areaType?->area_type_id . '-' . $details?->areaType?->description }}">
                </div>

                <div class="col-lg-4">
                    <label class='text-uppercase h6'>Area level</label>
                    <input type="text" class="form-control" name="area_level" id="area_level" readonly value="{{ $details?->areaLevel?->area_level_id . '-' . $details?->areaLevel?->description }}">
                </div>
            </div>
        </form>
    </div>
</div>
@push('page-scripts')
<script src="{{ asset('/assets/js/custom.js') }}"></script>
@endpush
@endsection