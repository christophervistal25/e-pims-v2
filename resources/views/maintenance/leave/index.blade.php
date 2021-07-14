@extends('layouts.app')
@section('title', 'LEAVE TYPES')
@prepend('page-css')
<link rel="stylesheet" href="/assets/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/assets/css/style.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
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

</style>
@endprepend
@section('content')
<div class="card">
    <div class="card-body">
        <div class="float-right mb-2">
            <button type="button" class="btn btn-primary shadow text-capitalize" data-toggle="modal" data-target="#addLeaveTypeModal">
                <i class='la la-plus'></i>
                add new leave type
            </button>
        </div>
        <div class="clearfix"></div>
        <table class='table table-bordered table-hover ' id='leave-types-table' width="100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Code</th>
                    {{-- <th>Description</th> --}}
                    <th class='text-truncate'>Days Period</th>
                    <th class='text-truncate'>Convertable to cash</th>
                    <th class='text-truncate'>Applicable Gender</th>
                    <th class='text-truncate'>Required Service Rendered</th>
                    <th>Editable</th>
                    <th class='text-center'>Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<!-- ADD LEAVE TYPE MODAL -->
<div class="modal rounded-0 fade" id="addLeaveTypeModal" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-capitalize">add new leave type</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="addLeaveTypeForm" method="POST">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Name 
                                <span class='text-danger'>*</span>
                            </label>
                            <input type="text" class='form-control' name="name">
                            <span class='text-danger' id="name__error__element"></span>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Code</label>
                            <input type="text" class='form-control' name="code">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Days Period
                                <span class='text-danger'>*</span>
                            </label>
                            <input type="number" class="form-control" name="days_period">
                            <span class='text-danger' id="days_period__error__element"></span>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Applicable Gender <span class='text-danger'>*</span></label>
                            <select name="applicable_gender" class="form-control">
                                <option value="female">Female</option>
                                <option value="male">Male</option>
                                <option value="female/male">Female/Male</option>
                            </select>
                            <span class='text-danger' id="applicable_gender__error__element"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Required Service Rendered (Days)
                                <span class='text-danger'>*</span>
                            </label>
                            <input type="number" class="form-control" name="required_rendered_service">
                            <span class='text-danger' id="required_rendered_service__error__element"></span>
                        </div>
                    </div>

                    <div class="col-lg-6 offset-6 text-right">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="editable" type="checkbox" id="editableCheckbox">
                            <label class="form-check-label" for="editableCheckbox"> &nbsp; Editable</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="convertible_to_cash" id="convertableToCashCheckbox">
                            <label class="form-check-label" for="convertableToCashCheckbox"> &nbsp; Convertable to cash</label>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary shadow">
                    <div class="spinner-border spinner-border-sm text-light d-none" id="save-spinner" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    Save
                </button>
            </form>
                <button type="button" class="btn btn-danger shadow" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>



<!-- EDIT LEAVE TYPE MODAL -->
<div class="modal rounded-0 fade" id="editLeaveTypeModal" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-capitalize">edit leave type</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="editLeaveTypeForm" method="POST">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Name 
                                <span class='text-danger'>*</span>
                            </label>
                            <input type="text" class='form-control' name="edit_name">
                            <span class='text-danger' id="name__error__element__edit"></span>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Code</label>
                            <input type="text" class='form-control' name="edit_code">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="edit_description" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Days Period
                                <span class='text-danger'>*</span>
                            </label>
                            <input type="number" class="form-control" name="edit_days_period">
                            <span class='text-danger' id="days_period__error__element__edit"></span>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Applicable Gender <span class='text-danger'>*</span></label>
                            <select name="applicable_gender" class="form-control">
                                <option value="female">Female</option>
                                <option value="male">Male</option>
                                <option value="female/male">Female/Male</option>
                            </select>
                            <span class='text-danger' id="applicable_gender__error__element"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Required Service Rendered (Days)
                                <span class='text-danger'>*</span>
                            </label>
                            <input type="number" class="form-control" name="edit_required_rendered_service">
                            <span class='text-danger' id="required_rendered_service__error__element__edit"></span>
                        </div>
                    </div>

                    <div class="col-lg-6 offset-6 text-right">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="edit_editable" type="checkbox" id="editEditableCheckbox">
                            <label class="form-check-label" for="editEditableCheckbox"> &nbsp; Editable</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="edit_convertible_to_cash" id="editConvertableToCashCheckbox">
                            <label class="form-check-label" for="editConvertableToCashCheckbox"> &nbsp; Convertable to cash</label>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-success shadow">
                    <div class="spinner-border spinner-border-sm text-light d-none" id="update-spinner" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    Update
                </button>
            </form>
                <button type="button" class="btn btn-danger shadow" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>


@push('page-scripts')
<script src="/assets/js/jquery.dataTables.min.js"></script>
<script src="/assets/js/dataTables.bootstrap4.min.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>

<script>
    const CONVERTABLE_COLUMN = 3;
    const EDITABLE_COLUMN    = 6;
    const ACTION_COLUMN      = 7;
    const VALIDATION_ERROR   = 422;
    let   leaveID            = null;

    const FORM_ELEMENTS = ['name', 'days_period', 'required_rendered_service', 'applicable_gender'];

    let table = $('#leave-types-table').DataTable({
        ajax: `/maintenance/leave/list`,
        pagingType: "full_numbers",
        serverSide : true,
        stateSave: true,
        processing : true,
        language: {
                processing: '<i class="text-primary fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> ',
        },
        "columnDefs": [{
            "targets": '_all',
            "createdCell": function (td, cellData, rowData, row, col) {
                if (col === CONVERTABLE_COLUMN) {
                    if (cellData === 'yes') {
                        $(td).html('').html(`<i class='la la-check font-weight-bold text-success'></i>`)
                    }  else {
                        $(td).html('').html(`<i class='la la-times font-weight-bold text-danger'></i>`)
                    }
                } else if(col === EDITABLE_COLUMN) {
                    if (cellData === 'yes') {
                        $(td).html('').html(`<i class='la la-check font-weight-bold text-success'></i>`)
                    }  else {
                        $(td).html('').html(`<i class='la la-times font-weight-bold text-danger'></i>`)
                    }
                } else if(col === ACTION_COLUMN) {
                    if (rowData.editable === 'yes') {
                        $(td).html('').html(`
                            <button class='btn btn-success btn-sm rounded-circle shadow edit__leave__type' data-id="${rowData.id}">
                                <i class='la la-pencil'></i>
                            </button>

                            <button class='btn btn-danger btn-sm rounded-circle shadow delete__leave__type' data-id="${rowData.id}">
                                <i class='la la-trash'></i>
                            </button>
                        `)
                    } else {
                        $(td).html('').html(`
                            <button class='btn btn-danger btn-sm rounded-circle shadow delete__leave__type' data-id="${rowData.id}">
                                <i class='la la-trash'></i>
                            </button>
                        `)
                    }
                }
            }
        }],
        columns: [{
                className: "text-truncate align-middle",
                data: "name",
                name: "name"
            },
            {
                className : 'text-truncate align-middle text-center',
                data: "code",
                name: "code"
            },
            {
                className : 'text-center align-middle',
                data: "days_period",
                name: "days_period"
            },
            {
                className : 'text-center align-middle',
                data: "convertible_to_cash",
                name: "convertible_to_cash"
            },
            {
                className : 'text-center text-capitalize align-middle',
                data: "applicable_gender",
                name: "applicable_gender"
            },
            {
                className : 'text-center align-middle',
                data: "required_rendered_service",
                name: "required_rendered_service"
            },
            {
                className : 'text-center align-middle',
                data: "editable",
                name: "editable"
            },
            {
                className : 'text-center align-middle',
                defaultContent : '',
                orderable : false,
            }
        ],
    });

    $('#addLeaveTypeForm').submit(function (e) {
        e.preventDefault();

        // Clear error message & error class of each element that required.
        FORM_ELEMENTS.forEach((elementName) => {
            $(`#${elementName}__error__element`).text('');
            $(`input[name=${elementName}]`).removeClass('is-invalid');
        });

        // Show the spinner in submit button
        $('#save-spinner').removeClass('d-none');
        
        // Collect all form field values.
        let formData = $(this).serialize();

        $.ajax({
            url : '/maintenance/leave',
            method : 'POST',
            data : formData,
            success : function (response) {

                // Hide the spinner in submit button
                $('#save-spinner').addClass('d-none');

                if(response.success) {
                    table.draw();
                    swal("Good Job!", "Successfully add new leave type.", "success");
                    $('#addLeaveTypeModal').modal('toggle');
                }
            },
            error : function (response) {
                // Hide the spinner in submit button
                $('#save-spinner').addClass('d-none');

                if(response.status === VALIDATION_ERROR) {
                    Object.keys(response.responseJSON.errors).forEach((field) => {
                        // Display error message for validated field.
                        $(`#${field}__error__element`).text(response.responseJSON.errors[field][0]);

                        // Add class is-invalid for fields.
                        $(`input[name=${field}]`).addClass('is-invalid');
                    });
                }
            },
        });
    });

    $(document).on('click', '.edit__leave__type', function () {
        leaveID = $(this).attr('data-id');
        // Show the edit leave type modal
        $('#editLeaveTypeModal').modal('toggle');

        // Assign values.
        
    });

    $('#editLeaveTypeForm').submit(function (e) {
        e.preventDefault();
        
        // Collect data of form fields.
        let data = $('#editLeaveTypeForm').serialize();

        alert(data);
    });

    $(document).on('click', '.delete__leave__type', function () {
        leaveID = $(this).attr('data-id');
        alert(leaveID);
        // Get the ID.
    });

</script>
@endpush
@endsection
