@extends('layouts.app')
@section('title', 'SALARY ADJUSTMENT INDIVIDUAL')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('/assets/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@prepend('page-css')
<script src="{{ asset('/js/app.js') }}" defer></script>
@endprepend
<style>
    .swal-content ul {
        list-style-type: none;
        padding: 0;
    }

 .swal-content ul {
        list-style-type: none;
        padding: 0;
    }
    table.dataTable.no-footer {
        border: 1px solid #dee2e6;
    }
    table.dataTable thead th,
    table.dataTable thead td {
        padding: 15px 25px;
        border-bottom: 1px solid #dee2e6;
    }
    table.dataTable {
        border-collapse: collapse;
    }
    .btn-primarys{
        background-color:#FF9B44;
        color: white;
    }
    .btn-primarys:hover {
    background-color: #FF8544;
    color: white;
    }
    .page-item.active .page-link {
    background-color: #FF9B44 !important;
    border: 1px solid #FF9B44;
}
.page-item.active .page-link:hover{
    background-color: #FF8544 !important;
    border: 1px solid #FF8544;
}
</style>
@endprepend
@section('content')
<div class="kanban-board card mb-0">
    <div class="card-body">
        <div id="add" class="page-header  {{  count($errors->all())  !== 0 ?  '' : 'd-none' }}">
            <div style='padding-bottom:50px'>
                <button id="cancelbutton" class="btn btn-primarys submit-btn float-right shadow"><i
                        class="fa fa-list"></i>
                    Salary Adjusment List</button>
            </div>

            <form action="/salary-adjustment" method="post" id="salaryAdjustmentForm">
                @csrf
                <div class="row">

                    <div class="col-12">
                        <div class="alert alert-secondary text-center font-weight-bold" role="alert">SALARY ADJUSTMENT
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-3">
                        <label for="dateAdjustment" class="has-float-label">
                            <input class="form-control" value="{{ Carbon\Carbon::now()->toDateString() }}"
                                name="dateAdjustment" id="dateAdjustment" type="date"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span class="font-weight-bold">DATE ADJUSTMENT<span class="text-danger">*</span></span>
                        </label>
                        <div id='date-adjustment-error-message' class='text-danger'>
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-3">
                        <label class="has-float-label mb-0 employeeName" for="employeeName">
                            <select value=""
                                class="form-control form-control-xs selectpicker"
                                name="employeeName" data-live-search="true" id="employeeName" data-size="5"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;" onchange="clickme()">
                                <option></option>
                                @foreach($employee as $employees)
                                <option data-plantilla="{{ $employees }}"
                                    value="{{ $employees->employee->Employee_id }}">
                                    {{ $employees->employee->LastName }}, {{ $employees->employee->FirstName }}
                                    {{ $employees->employee->MiddleName }}</option>
                                @endforeach
                            </select>
                            <span class="font-weight-bold">EMPLOYEE NAME<span class="text-danger">*</span></span>
                        </label>
                        <div id='employee-error-message' class='text-danger text-sm'>
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-3 d-none">
                        <input class="form-control" value="" name="employeeId" id="employeeId" type="text"
                            placeholder="Input item No.">
                    </div>

                    <div class="form-group col-12 col-lg-2">
                        <label class="has-float-label mb-0" for="itemNo">
                            <input class="form-control" value="" name="itemNo" id="itemNo" type="text" placeholder=""
                                readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span class="font-weight-bold">ITEM NO<span class="text-danger">*</span></span>
                        </label>
                        <div id='item-no-error-message' class='text-danger text-sm'>
                        </div>
                    </div>

                    <div class="form-group col-2 mt-2 d-none">
                        <input class="form-control " value="" id="positionId" name="positionId" type="text" readonly>
                    </div>

                    <div class="form-group col-12 mt-2 d-none">
                        <input class="form-control " value="" id="officeCode" name="officeCode" type="text" readonly>
                    </div>

                    <div class="form-group col-12 mt-2 d-none">
                        <input class="form-control " value="" id="status" name="status" type="text" readonly>
                    </div>

                    <div class="form-group col-12 col-lg-4">
                        <label class="has-float-label mb-0" for="positionName">
                            <input class="form-control" value="" name="positionName" id="positionName" type="text"
                                readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span class="font-weight-bold">POSITION<span class="text-danger">*</span></span>
                        </label>
                        <div id='position-error-message' class='text-danger text-sm'>
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-3 mt-2">
                        <label class="has-float-label mb-0" for="salaryGrade">
                            <input class="form-control" value="" name="salaryGrade" id="salaryGrade" type="text"
                                readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span class="font-weight-bold">SALARY GRADE<span class="text-danger">*</span></span>
                        </label>
                        <div id='salary-grade-error-message' class='text-danger text-sm'>
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-3 mt-2">
                        <label class="has-float-label mb-0" for="stepNo">
                            <input class="form-control" value="" name="stepNo" id="stepNo" type="text" readonly
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span class="font-weight-bold">STEP NO<span class="text-danger">*</span></span>
                        </label>
                        <div id='step-no-error-message' class='text-danger text-sm'>
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-3 mt-2">
                        <label class="has-float-label mb-0">
                            <input class="form-control" value="" name="previousYear" id="previousYear" type="text"
                            readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                        <span class="font-weight-bold">PREVIOUS YEAR</span>
                    </label>
                        <div id='previous-year-error-message' class='text-danger text-sm'>
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-3 mt-2">
                        <label class="has-float-label mb-0">
                            <input class="form-control" value="{{ Carbon\Carbon::now()->format('Y') }}" name="currentSgyear" id="currentSgyear" type="text"
                            readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                        <span class="font-weight-bold">CURRENT YEAR</span>
                    </label>
                        <div id='previous-year-error-message' class='text-danger text-sm'>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group input-group mb-0 mt-3">
                            <span class="input-group-text">&#8369;</span>
                            <label class="has-float-label">
                                <input class="form-control" value="" name="salaryPrevious" id="salaryPrevious"
                                    type="text" readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span class="font-weight-bold">SALARY PREVIOUS<span class="text-danger">*</span></span>
                            </label>
                        </div>
                        <div id='salary-previous-error-message' class='text-danger text-sm text-center'>
                            </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group input-group mb-0 mt-3">
                            <span class="input-group-text">&#8369;</span>
                            <label class="has-float-label">
                                <input class="form-control" value="" name="salaryNew" id="salaryNew" type="text"
                                    placeholder="" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <span class="font-weight-bold">SALARY NEW<span class="text-danger">*</span></span>
                                </label>
                        </div>
                        <div id='salary-new-error-message' class='text-danger text-sm text-center'>
                            </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group input-group mb-0 mt-3">
                            <span class="input-group-text">&#8369;</span>
                        <label class="has-float-label">
                            <input class="form-control" value="" name="salaryDifference" id="salaryDifference"
                                type="text" readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span class="font-weight-bold">SALARY DIFFERENCE<span class="text-danger">*</span></span>
                        </label>
                    </div>
                    <div id='salary-difference-error-message' class='text-danger text-sm text-center'>
                        </div>
                    </div>

                    <div class="form-group col-12 col-lg-12 mt-4">
                        <label class="has-float-label mb-0">
                        <input value="{{ old('remarks') }}"
                            class="form-control {{ $errors->has('remarks')  ? 'is-invalid' : ''}}"
                            name="remarks" id="remarks" type="text" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span class="font-weight-bold">REMARKS</span>
                        </label>
                    </div>

                    <div class="form-group form-group submit-section col-12">
                        <button id="saveBtn" class="btn btn-primarys submit-btn float-right shadow" type="submit">
                            <span id="loading" class="spinner-border spinner-border-sm d-none" role="status"
                                aria-hidden="false"></span> <i class="fas fa-save"></i>
                            <b id="saving">Save</b>
                        </button>
                        <button style="margin-right:10px;" type="button" onclick="myFunction()" id="cancelbutton1"
                            class="text-white btn btn-danger submit-btn float-right shadow"><i class="fas fa-ban"></i> Cancel</button>
                    </div>

                </div>

                <form>
        </div>

        <div id="table" class="page-header {{  count($errors->all()) == 0 ? '' : 'd-none' }}">

            <div class="row">
                <div class="col-3 mb-2">
                    <select value="" data-style="btn-primarys text-white"
                        class="form-control form-control-xs selectpicker yearAdjustment {{ $errors->has('yearAdjustment')  ? 'is-invalid' : ''}}"
                        name="yearAdjustment" data-live-search="true" id="yearAdjustment" data-size="5">
                            <option value="{{ Carbon\Carbon::now()->format('Y') }}">{{ Carbon\Carbon::now()->format('Y') }}</option>
                            @foreach ($dates as $date)
                            <option value={{ $date }}>{{ $date }}</option>
                            @endforeach
                    </select>
                </div>
                <div class="col-9 mb-2">
                    <div class="float-right">
                        <button id="addbutton" class="btn btn-primarys submit-btn float-right shadow"><i
                                class="fa fa-plus"></i>
                            Add Salary Adjustment</button>
                    </div>
                </div>
            </div>

            <div class="table">
                <table class="table table-bordered table-hover text-center" id="salaryAdjustment" style="width:100%;">
                    <thead>
                        <tr>
                            <td scope="col" class="text-center">Adjustment Date</td>
                            <td scope="col" class="text-center">Employee Name</td>
                            <td scope="col" class="text-center">Salary Grade</td>
                            <td scope="col" class="text-center">Step Number</td>
                            <td scope="col" class="text-center">Previous Salary</td>
                            <td scope="col" class="text-center">New Salary</td>
                            <td scope="col" class="text-center">Salary Difference</td>
                            <td scope="col" class="text-center">Action</td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

    </div>
</div>
@push('page-scripts')
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="{{ asset('/assets/js/salary-adjustment.js') }}"></script>
<script src="{{ asset('/assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on("click", ".delete", function () {
        let $ele = $(this).parent().parent();
        let id = $(this).attr("value");;
        let url = /salary-adjustment/;
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
                                swal("Successfully Deleted!", "", "success");
                                // $('#salaryAdjustment').DataTable().ajax.reload();
                                 location.reload();
                            }
                        }
                    });
                } else {
                    swal("Cancelled", "", "error");
                }
            });
    });

</script>
@endpush
@endsection
