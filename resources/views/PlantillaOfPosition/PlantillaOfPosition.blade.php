@extends('layouts.app')
@section('title', 'Plantilla Of Position')
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
            <form action="/plantilla-of-position" method="post" id="plantillaOfPositionForm">
                @csrf
                    <div class="alert alert-secondary text-center font-weight-bold" role="alert">ADD NEW POSITION</div>


                <div class="container">
                    <div class="row justify-content-center align-items-center">

                        <div class="form-group col-12 col-md-6 col-lg-7">
                            <label class="has-float-label mb-0">
                            <input value="{{ old('itemNo') }}"
                                class="form-control {{ $errors->has('itemNo')  ? 'is-invalid' : ''}}" name="itemNo"
                                id="itemNo" type="number" placeholder="" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span class="font-weight-bold">ITEM NO.<span class="text-danger">*</span></span>
                            </label>
                            <div id='item-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="form-group col-10 col-lg-6">
                            <label class="has-float-label mb-0">
                            <select value=""
                                class="form-control selectpicker  {{ $errors->has('positionTitle')  ? 'is-invalid' : ''}}"
                                name="positionTitle" data-live-search="true" id="positionTitle" data-size="4"
                                data-width="100%" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <option></option>
                                @foreach($position as $positions)
                                <option data-position="{{ $positions }}" style="width:350px;"
                                    {{ old('positionTitle') == $positions->position_id ? 'selected' : '' }}
                                    value="{{ $positions->position_id}}">{{ $positions->position_name }}</option>
                                @endforeach
                            </select>
                            <span class="font-weight-bold">POSITION<span class="text-danger">*</span></span>
                        </label>
                            <div id='position-title-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="form-group">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            <i class="fa fa-list"></i>
                          </button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Add New Position</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">

                                    <div class="form-group col-12 col-md-6 col-lg-12">
                                        <label class="has-float-label mb-0">
                                        <input value="{{ old('addPositionCode') }}"
                                            class="form-control {{ $errors->has('addPositionCode')  ? 'is-invalid' : ''}}" name="addPositionCode"
                                            id="addPositionCode" type="text" placeholder="" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                            <span class="font-weight-bold">Position Code<span class="text-danger">*</span></span>
                                        </label>
                                        <div id='add-position-code-error-message' class='text-danger text-sm'>
                                        </div>
                                    </div>

                                    <div class="form-group col-12 col-md-6 col-lg-12">
                                        <label class="has-float-label mb-0">
                                        <input value="{{ old('addPositionName') }}"
                                            class="form-control {{ $errors->has('addPositionName')  ? 'is-invalid' : ''}}" name="addPositionName"
                                            id="addPositionName" type="text" placeholder="" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                            <span class="font-weight-bold">Position Name<span class="text-danger">*</span></span>
                                        </label>
                                        <div id='add-position-name-error-message' class='text-danger text-sm'>
                                        </div>
                                    </div>

                                    <div class="form-group col-12 col-md-6 col-lg-12">
                                        <label class="has-float-label mb-0">
                                        <select value=""
                                            class="form-control selectpicker  {{ $errors->has('addSalaryGrade')  ? 'is-invalid' : ''}}"
                                            name="addSalaryGrade" data-live-search="true" id="addSalaryGrade" data-size="4"
                                            data-width="100%" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                            <option></option>
                                            @foreach (range(1 , 33) as $salarygrades)
                                                <option {{ old('addSalaryGrade') == $salarygrades ? 'selected' : '' }} value="{{ $salarygrades}}">
                                                    {{ $salarygrades}}</option>
                                            @endforeach
                                        </select>
                                        <span class="font-weight-bold">SALARY GRADE<span class="text-danger">*</span></span>
                                    </label>
                                        <div id='add-salary-grade-error-message' class='text-danger text-sm'>
                                        </div>
                                    </div>

                                    <div class="form-group col-12 col-md-6 col-lg-12">
                                        <label class="has-float-label mb-0">
                                        <input value="{{ old('addPositionShortName') }}"
                                            class="form-control {{ $errors->has('addPositionShortName')  ? 'is-invalid' : ''}}" name="addPositionShortName"
                                            id="addPositionShortName" type="text" placeholder="" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                            <span class="font-weight-bold">Position Short Name<span class="text-danger">*</span></span>
                                        </label>
                                        <div id='add-position-short-name-error-message' class='text-danger text-sm'>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="btnPosition" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-7">
                            <label class="has-float-label mb-0">
                            <input value="{{ old('positionOldName') }}"
                                class="form-control {{ $errors->has('positionOldName')  ? 'is-invalid' : ''}}"
                                name="positionOldName" id="positionOldName" type="text" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span class="font-weight-bold">OLD POSITION NAME<span class="text-danger">*</span></span>
                            </label>
                            <div id='old-position-name-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-md-6 col-lg-7">
                            <label class="has-float-label mb-0">
                            <select value=""
                                class="form-control selectpicker  {{ $errors->has('salaryGrade')  ? 'is-invalid' : ''}}"
                                name="salaryGrade" data-live-search="true" id="salaryGrade" data-size="4"
                                data-width="100%" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <option></option>
                                @foreach (range(1 , 33) as $salarygrades)
                                    <option {{ old('salaryGrade') == $salarygrades ? 'selected' : '' }} value="{{ $salarygrades}}">
                                        {{ $salarygrades}}</option>
                                @endforeach
                            </select>
                            <span class="font-weight-bold">SALARY GRADE<span class="text-danger">*</span></span>
                        </label>
                            <div id='salary-grade-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-7">
                            <label class="has-float-label mb-0">
                            <select value=""
                                class="form-control selectpicker  {{ $errors->has('officeCode')  ? 'is-invalid' : ''}}"
                                name="officeCode" data-live-search="true" id="officeCode" data-size="4"
                                data-width="100%" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <option></option>
                                @foreach($office as $offices)
                                    <option {{ old('officeCode') == $offices->office_code ? 'selected' : '' }} value="{{ $offices->office_code}}">
                                        {{ $offices->office_name }}</option>
                                @endforeach
                            </select>
                            <span class="font-weight-bold">OFFICE<span class="text-danger">*</span></span>
                        </label>
                            <div id='office-error-message' class='text-danger text-sm'>
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
                <select value="" data-style="btn-primary text-white" class="form-control form-control-xs selectpicker {{ $errors->has('employeeOffice')  ? 'is-invalid' : ''}}"
                    name="employeeOffice" data-live-search="true" id="employeeOffice" data-size="5">
                    <option value="">All</option>
                    @foreach($office as $offices){
                        <option value="{{ $offices->office_code }}">{{ $offices->office_name }}</option>
                    }
                    @endforeach
                    </select>
            </div>

                <div class="col-7 float-right mb-10">
                    <button id="addbutton" class="btn btn-primary submit-btn float-right"><i class="fa fa-plus"></i> Add
                        New Position</button>
                </div>
        </div>


            <div class="table" style="overflow-x:auto;">
                <table class="table table-bordered text-center" id="plantillaofposition" style="width:100%;">
                    <thead>
                        <tr>
                            <td scope="col" class="text-center font-weight-bold">Position Name</td>
                            <td scope="col" class="text-center font-weight-bold">Item No</td>
                            <td scope="col" class="text-center font-weight-bold">Salary Grade</td>
                            <td scope="col" class="text-center font-weight-bold">Office</td>
                            <td scope="col" class="text-center font-weight-bold">Old Position Name</td>
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
        let url = /plantilla-of-position/;
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
                                $('#plantillaofposition').DataTable().ajax.reload();
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
<script src="{{ asset('/assets/js/plantillaofposition.js') }}"></script>
@endpush
@endsection
