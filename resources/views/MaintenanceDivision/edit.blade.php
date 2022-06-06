@extends('layouts.app')
@section('title', 'Edit Maintenance Division')
@prepend('page-css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link rel="stylesheet"
    href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />
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
            <form action="{{ route('maintenance-division.update', $division->division_id) }}" method="post"
                id="maintenanceDivisionEditForm">
                @csrf
                @method('PUT')
                <div class="alert alert-secondary text-center font-weight-bold" role="alert">EDIT DIVISION</div>
                <div class="container">
                    <div class="row justify-content-center align-items-center">

                        <div class="form-group col-12 col-md-6 col-lg-7">
                            <label class="has-float-label mb-0">
                                <input value="{{ old('divisionName') ?? $division->division_name }}"
                                    class="form-control {{ $errors->has('divisionName')  ? 'is-invalid' : ''}}"
                                    name="divisionName" id="divisionName" type="text" placeholder=""
                                    style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span class="font-weight-bold">Division Name<span class="text-danger">*</span></span>
                            </label>
                            <div id='division-name-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="form-group col-10 col-lg-7">
                            <label class="has-float-label mb-0">
                                <select value=""
                                    class="form-control selectpicker  {{ $errors->has('officeCode')  ? 'is-invalid' : ''}}"
                                    name="officeCode" data-live-search="true" id="officeCode" data-size="4"
                                    data-width="100%" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <option></option>
                                    @foreach($offices as $office)
                                    <option {{ $division->office_code == $office->office_code ? 'selected' : '' }}
                                        value="{{ $office->office_code }}">
                                        {{ $office->office_name }}</option>
                                    @endforeach
                                </select>
                                <span class="font-weight-bold">Office<span class="text-danger">*</span></span>
                            </label>
                            <div id='office-code-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="form-group form-group submit-section col-12">
                            <button type="submit" class="btn btn-success text-white submit-btn float-right shadow"><i
                                    class="fas fa-check"></i> Update</button>
                            <a href="/maintenance-division"><button style="margin-right:10px;" type="button"
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
<script src="{{ asset('/assets/js/maintenance-division.js') }}"></script>
@endpush
@endsection
