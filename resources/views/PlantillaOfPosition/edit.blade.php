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
            <form action="{{ route('plantilla-of-position.update', $plantillaofposition->pp_id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">


                    <div class="col-12">
                        <div class="alert alert-secondary text-center font-weight-bold" role="alert">Edit Position</div>
                    </div>
                    <div class="container">
                        <div class="row justify-content-center align-items-center">

                            <div class="form-group col-12 col-lg-6">
                                <label>Position<span class="text-danger">*</span></label>
                                <select name="positionTitle" value="" class="select floating {{ $errors->has('positionTitle')  ? 'is-invalid' : ''}}"
                                    id="positionTitle" disabled>
                                    @foreach($position as $positions)
                                    <option {{ $plantillaofposition->position_id == $positions->position_id ? 'selected' : '?? $plantillaofposition->position_id' }} value="{{ $positions->position_id}}">{{ $positions->position_name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('positionTitle'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('positionTitle') }} </small>
                                @endif
                            </div>


                            <div class="form-group col-12 col-md-6 col-lg-6">
                                <label>Item No</label>
                                <input value="{{ old('itemNo') ??  $plantillaofposition->item_no}}"
                                    class="form-control {{ $errors->has('itemNo')  ? 'is-invalid' : ''}}"
                                    name="itemNo" id="itemNo" type="text" placeholder="Input Position Name">
                                    @if($errors->has('itemNo'))
                                    <small class="form-text text-danger">
                                        {{ $errors->first('itemNo') }} </small>
                                    @endif
                            </div>

                            <div class="form-group col-12 col-md-6 col-lg-6">
                                <label>Salary Grade<span class="text-danger">*</span></label>
                                <select value=""
                                    class="form-control selectpicker  {{ $errors->has('salaryGrade')  ? 'is-invalid' : ''}}"
                                    name="salaryGrade" data-live-search="true" id="salaryGrade" data-size="4" data-width="100%">
                                    <option></option>
                                    @foreach (range(1 , 33) as $salarygrades)
                                    <option
                                    {{ $plantillaofposition->sg_no == $salarygrades ? 'selected' : '?? $plantillaofposition->sg_no' }}
                                    value="{{ $salarygrades}}">{{ $salarygrades}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('salaryGrade'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('salaryGrade') }} </small>
                                @endif
                            </div>



                            <div class="form-group col-12 col-lg-6">
                                <label>Office<span class="text-danger">*</span></label>
                                <select value=""
                                    class="form-control selectpicker  {{ $errors->has('officeCode')  ? 'is-invalid' : ''}}"
                                    name="officeCode" data-live-search="true" id="officeCode" data-size="4" data-width="100%">
                                    <option></option>
                                    @foreach($office as $offices)
                                    <option
                                    {{ $plantillaofposition->office_code == $offices->office_code ? 'selected' : '' }}
                                        value="{{ $offices->office_code}}">{{ $offices->office_name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('officeCode'))
                                <small class="form-text text-danger">
                                    {{ $errors->first('officeCode') }} </small>
                                @endif
                            </div>



                            <div class="form-group col-12 col-md-6 col-lg-6">
                                <label>Old Position Name<span class="text-danger">*</span></label>
                                <input
                                    value="{{ old('positionOldName') ?? $plantillaofposition->old_position_name }}"
                                    class="form-control {{ $errors->has('positionOldName')  ? 'is-invalid' : ''}}"
                                    name="positionOldName" id="positionOldName" type="text"
                                    placeholder="">
                                    @if($errors->has('positionOldName'))
                                    <small class="form-text text-danger">
                                        {{ $errors->first('positionOldName') }} </small>
                                    @endif
                            </div>

                            <div class="form-group form-group submit-section col-12">
                                <button id="saveBtn" class="btn btn-success submit-btn float-right" type="submit">
                                    <span id="loading" class="spinner-border spinner-border-sm d-none" role="status"
                                        aria-hidden="false"></span>
                                    <i class="fas fa-save"></i> Save
                                </button>
                                <a href="/plantilla-of-position"><button style="margin-right:10px;" type="button"
                                        class="text-white btn btn-warning submit-btn float-right"><i class="fas fa-arrow-left"></i> Back</button></a>
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
