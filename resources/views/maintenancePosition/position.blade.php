@extends('layouts.app')
@section('title', 'Maintenance Position')
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
<div class="kanban-board card shadow mb-0">
    <div class="card-body">
        <div id="add" class="page-header {{  count($errors->all())  !== 0 ?  '' : 'd-none' }}">
            <div style='padding-bottom:50px;margin-right:-15px;' class="col-auto ml-auto">
                <button id="cancelbutton" class="btn btn-primary submit-btn float-right shadow"><i
                        class="fa fa-list"></i> Position List</button>
            </div>
            <form action="/plantilla-of-position" method="post" id="maintenancePositionForm">
                @csrf
                    <div class="alert alert-secondary text-center font-weight-bold" role="alert">ADD NEW POSITION</div>
                <div class="container">
                    <div class="row justify-content-center align-items-center">

                        <div class="form-group col-12 col-md-6 col-lg-7">
                            <label class="has-float-label mb-0">
                            <input value="{{ old('positionCode') ?? $lastId->position_code + 1}}"
                                class="form-control {{ $errors->has('positionCode')  ? 'is-invalid' : ''}}" name="positionCode"
                                id="positionCode" type="text" placeholder="" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span class="font-weight-bold">Position Code<span class="text-danger">*</span></span>
                            </label>
                            <div id='position-code-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-md-6 col-lg-7">
                            <label class="has-float-label mb-0">
                            <input value="{{ old('positionName') }}"
                                class="form-control {{ $errors->has('positionName')  ? 'is-invalid' : ''}}" name="positionName"
                                id="positionName" type="text" placeholder="" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span class="font-weight-bold">Position Name<span class="text-danger">*</span></span>
                            </label>
                            <div id='position-name-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="form-group col-10 col-lg-7">
                            <label class="has-float-label mb-0">
                            <select value=""
                                class="form-control selectpicker  {{ $errors->has('salaryGradeNo')  ? 'is-invalid' : ''}}"
                                name="salaryGradeNo" data-live-search="true" id="salaryGradeNo" data-size="4"
                                data-width="100%" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <option></option>
                                @foreach (range(1, 8) as $step_no)
                                <option {{ old('stepNo') == $step_no ? 'selected' : '' }} value="{{ $step_no}}">{{ $step_no}}</option>
                                @endforeach
                            </select>
                            <span class="font-weight-bold">Salary Grade<span class="text-danger">*</span></span>
                        </label>
                            <div id='salary-grade-no-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-7">
                            <label class="has-float-label mb-0">
                            <input value="{{ old('positionShortName') }}"
                                class="form-control {{ $errors->has('positionShortName')  ? 'is-invalid' : ''}}"
                                name="positionShortName" id="positionShortName" type="text" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span class="font-weight-bold">Position Short Name<span class="text-danger">*</span></span>
                            </label>
                            <div id='position-short-name-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="form-group form-group submit-section col-12">
                            <button id="saveBtn" class="btn btn-success submit-btn float-right shadow" type="submit">
                                <span id="loading" class="spinner-border spinner-border-sm d-none" role="status"
                                    aria-hidden="false"></span>
                                <i class="fas fa-save"></i> Save
                            </button>
                            <button style="margin-right:10px;" type="button" id="cancelbutton1" onclick="myFunction()"
                                class="text-white btn btn-warning submit-btn float-right shadow"><i
                                    class="fas fa-ban"></i> Cancel</button>
                        </div>
                    </div>
                </div>
        </form>
        </div>

        <div id="table" class="page-header {{  count($errors->all()) == 0 ? '' : 'd-none' }}">
            <div class="row">
            <div class="col-5 mb-2">
            </div>
                <div class="col-7 float-right mb-2">
                    <button id="addbutton" class="btn btn-primary submit-btn float-right"><i class="fa fa-plus"></i> Add
                        New Position</button>
                </div>
            </div>

            <div class="table" style="overflow-x:auto;">
                <table class="table table-bordered text-center" id="maintenancePosition" style="width:100%;">
                    <thead>
                        <tr>
                            <td scope="col" class="text-center font-weight-bold">Position Name</td>
                            <td scope="col" class="text-center font-weight-bold">Salary Grade</td>
                            <td scope="col" class="text-center font-weight-bold">Position Short Name</td>
                            <td scope="col" class="text-center font-weight-bold">Action</td>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="result">
            </div>
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

    $(document).on("click", ".delete", function () {
        let $ele = $(this).parent().parent();
        let id = $(this).attr("value");;
        let url = /maintenance-position/;
        let dltUrl = url + id;
        swal({
                title: "Are you sure you want to delete?",
                text: "Once deleted, you will not be able to recover this record!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: dltUrl,
                        type: "DELETE",
                        cache: false,
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (dataResult) {
                            var dataResult = JSON.parse(dataResult);
                            if (dataResult.statusCode == 200) {
                                $('#maintenancePosition').DataTable().ajax.reload();
                                swal("Successfully Deleted!", "", "success");
                            }
                        }
                    });
                } else {
                    swal("Cancel!", "", "error");
                }
            });
    });

</script>
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('/assets/js/maintenance-position.js') }}"></script>
@endpush
@endsection
