@extends('layouts.app')
@section('title', 'Edit Maintenance Section')
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
            <form action="{{ route('maintenance-section.update', $section->section_id) }}" method="post"
                id="maintenanceSectionEditForm">
                @csrf
                @method('PUT')
                <div class="alert alert-secondary text-center font-weight-bold" role="alert">EDIT SECTION</div>
                <div class="container">
                    <div class="row justify-content-center align-items-center">

                        <div class="form-group col-12 col-md-6 col-lg-7">
                            <label class="has-float-label mb-0">
                                <input value="{{ old('sectionName') ?? $section->section_name }}"
                                class="form-control {{ $errors->has('sectionName')  ? 'is-invalid' : ''}}"
                                    name="sectionName" id="sectionName" type="text" placeholder=""
                                    style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span class="font-weight-bold">Section Name<span class="text-danger">*</span></span>
                            </label>
                            <div id='section-name-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="form-group col-10 col-lg-7">
                            <label class="has-float-label mb-0">
                                <select value=""
                                    class="form-control selectpicker  {{ $errors->has('divisionId')  ? 'is-invalid' : ''}}"
                                    name="divisionId" data-live-search="true" id="divisionId" data-size="4"
                                    data-width="100%" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <option></option>
                                    @foreach($division as $divisions)
                                    <option {{ $section->division_id == $divisions->division_id ? 'selected' : '' }}
                                        value="{{ $divisions->division_id }}">
                                        {{ $divisions->division_name }}</option>
                                    @endforeach
                                </select>
                                <span class="font-weight-bold">Office<span class="text-danger">*</span></span>
                            </label>
                            <div id='division-id-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="form-group form-group submit-section col-12">
                            <button type="submit" class="btn btn-success text-white submit-btn float-right shadow"><i
                                    class="fas fa-check"></i> Update</button>
                            <a href="/maintenance-section"><button style="margin-right:10px;" type="button"
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
<script src="{{ asset('/assets/js/maintenance-section.js') }}"></script>
@endpush
@endsection
