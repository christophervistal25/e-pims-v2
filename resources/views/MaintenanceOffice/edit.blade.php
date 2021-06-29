@extends('layouts.app')
@section('title', 'Edit Maintenance Office')
@prepend('page-css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link rel="stylesheet" href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css"/>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
    .swal-content ul {
        list-style-type: none;
        padding: 0;
    }

</style>
@endprepend
@section('content')
@include('Plantilla.add-ons.success')
<div class="kanban-board card shadow mb-0">
    <div class="card-body">
        <div id="add" class="page-header">
            <form action="{{ route('maintenance-office.update', $office->office_code) }}" method="post" id="maintenanceOfficeEditForm">
                @csrf
                @method('PUT')
                    <div class="alert alert-secondary text-center font-weight-bold" role="alert">EDIT OFFICE</div>
                <div class="container">
                    <div class="row justify-content-center align-items-center">

                        <div class="form-group col-12 col-md-6 col-lg-7">
                            <label class="has-float-label mb-0">
                            <input value="{{ old('officeCode') ?? $office->office_code }}"
                                class="form-control {{ $errors->has('officeCode')  ? 'is-invalid' : ''}}" name="officeCode"
                                id="officeCode" type="number" placeholder="" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span class="font-weight-bold">Office Code<span class="text-danger">*</span></span>
                            </label>
                            <div id='office-code-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-md-6 col-lg-7">
                            <label class="has-float-label mb-0">
                            <input value="{{ old('officeName') ?? $office->office_name }}"
                                class="form-control {{ $errors->has('officeName')  ? 'is-invalid' : ''}}" name="officeName"
                                id="officeName" type="text" placeholder="" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span class="font-weight-bold">Office Name<span class="text-danger">*</span></span>
                            </label>
                            <div id='office-name-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-7">
                            <label class="has-float-label mb-0">
                            <input value="{{ old('officeShortName') ?? $office->office_short_name }}"
                                class="form-control {{ $errors->has('officeShortName')  ? 'is-invalid' : ''}}"
                                name="officeShortName" id="officeShortName" type="text" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span class="font-weight-bold">Office Short Name<span class="text-danger">*</span></span>
                            </label>
                            <div id='office-short-name-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-7">
                            <label class="has-float-label mb-0">
                            <input value="{{ old('officeAddress') ?? $office->office_address }}"
                                class="form-control {{ $errors->has('officeAddress')  ? 'is-invalid' : ''}}"
                                name="officeAddress" id="officeAddress" type="text" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span class="font-weight-bold">Office Address<span class="text-danger">*</span></span>
                            </label>
                            <div id='office-address-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-7">
                            <label class="has-float-label mb-0">
                            <input value="{{ old('officeShortAddress') ?? $office->office_short_address }}"
                                class="form-control {{ $errors->has('officeShortAddress')  ? 'is-invalid' : ''}}"
                                name="officeShortAddress" id="officeShortAddress" type="text" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span class="font-weight-bold">Office Short Address<span class="text-danger">*</span></span>
                            </label>
                            <div id='office-short-address-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-7">
                            <label class="has-float-label mb-0">
                            <input value="{{ old('officeHead') ?? $office->office_head }}"
                                class="form-control {{ $errors->has('officeHead')  ? 'is-invalid' : ''}}"
                                name="officeHead" id="officeHead" type="text" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span class="font-weight-bold">Office Head<span class="text-danger">*</span></span>
                            </label>
                            <div id='office-head-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-7">
                            <label class="has-float-label mb-0">
                            <input value="{{ old('positionName') ?? $office->position_name }}"
                                class="form-control {{ $errors->has('positionName')  ? 'is-invalid' : ''}}"
                                name="positionName" id="positionName" type="text" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span class="font-weight-bold">Position Name<span class="text-danger">*</span></span>
                            </label>
                            <div id='position-name-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="form-group form-group submit-section col-12">
                            <button type="submit" class="btn btn-success submit-btn float-right shadow"><i
                                class="fas fa-check"></i> Update</button>
                        <a href="/maintenance-office"><button style="margin-right:10px;" type="button"
                                class="text-white btn btn-warning submit-btn float-right shadow"><i
                                class="fas fa-arrow-left"></i> Back</button>
                        </div>
                    </div>
                </div>
        </form>
        </div>
    </div>
</div>
@push('page-scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('/assets/js/maintenance-office.js') }}"></script>
@endpush
@endsection
