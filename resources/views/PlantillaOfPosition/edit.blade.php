@extends('layouts.app')
@section('title', 'Edit Plantilla Of Position')
@prepend('page-css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
    .swal-content ul {
        list-style-type: none;
        padding: 0;
    }

</style>
@endprepend
@section('content')
@include('PlantillaOfPosition.add-ons.success')
<div class="kanban-board card mb-0">
    <div class="card-body">
        <div id="add" class="page-header {{  count($errors->all())  !== 0 ?  '' : '' }}">
            <form action="{{ route('plantilla-of-position.update', $plantillaofposition->position_id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="col-12">
                        <div class="alert alert-secondary text-center font-weight-bold" role="alert">Edit Position</div>
                    </div>
                    <div class="container">
                        <div class="row justify-content-center align-items-center">
                            <div class="form-group col-12 col-md-6 col-lg-6">
                                <label>Position Code<span class="text-danger">*</span></label>
                                <input value="{{ old('positionCode')  ?? $plantillaofposition->position_code }}"
                                    class="form-control {{ $errors->has('positionCode')  ? 'is-invalid' : ''}}"
                                    name="positionCode" id="positionCode" type="text" placeholder="Input Position Code">
                                <div id='position-code-error-message' class='text-danger'>
                                </div>
                            </div>
                            <div class="form-group col-12 col-md-6 col-lg-6">
                                <label>Salary Grade<span class="text-danger">*</span></label>
                                <select name="salaryGrade" value=""
                                    class="select floating {{ $errors->has('salaryGrade')  ? 'is-invalid' : ''}}"
                                    id="salaryGrade">
                                    <option>Please Select</option>
                                    @foreach (range(1 , 33) as $salarygrades)
                                    <option
                                        {{ $plantillaofposition->sg_no == $salarygrades ? 'selected' : '?? $plantillaofposition->sg_no' }}
                                        value="{{ $salarygrades}}">{{ $salarygrades}}</option>
                                    @endforeach
                                </select>
                                <div id='salary-grade-error-message' class='text-danger'>
                                </div>
                            </div>

                            <div class="form-group col-12 col-md-6 col-lg-6">
                                <label>Position Name</label>
                                <input value="{{ old('positionName')  ?? $plantillaofposition->position_name }}"
                                    class="form-control {{ $errors->has('positionName')  ? 'is-invalid' : ''}}"
                                    name="positionName" id="positionName" type="text" placeholder="Input Position Name">
                                <div id='position-name-no-error-message' class='text-danger'>
                                </div>
                            </div>

                            

                            <div class="form-group col-12 col-md-6 col-lg-6">
                                <label>Position Short Name<span class="text-danger">*</span></label>
                                <input
                                    value="{{ old('positionNameShortname') ?? $plantillaofposition->position_short_name }}"
                                    class="form-control {{ $errors->has('positionNameShortname')  ? 'is-invalid' : ''}}"
                                    name="positionNameShortname" id="positionNameShortname" type="text"
                                    placeholder="Input Position Name">
                                <div id='position-short-name-no-error-message' class='text-danger'>
                                </div>
                            </div>

                            <div class="form-group form-group submit-section col-12">
                                <button id="saveBtn" class="btn btn-success submit-btn float-right" type="submit">
                                    <span id="loading" class="spinner-border spinner-border-sm d-none" role="status"
                                        aria-hidden="false"></span>
                                    <i class="fas fa-save"></i> Save
                                </button>
                                <a href="/plantilla-of-position"><button style="margin-right:10px;" type="button"
                                        class="text-white btn btn-warning submit-btn float-right"><i
                                            class="la la-arrow-left"></i> Back</button></a>
                            </div>
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
<script src="{{ asset('/assets/js/plantillaofposition.js') }}"></script>
@endpush
@endsection
