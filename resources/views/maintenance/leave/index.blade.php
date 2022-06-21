@extends('layouts.app')
@section('title', 'Leave Types')
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
            <button type="button" class="btn btn-primary text-white text-capitalize" data-toggle="modal"
                data-target="#addLeaveTypeModal">
                <i class='la la-plus'></i>
                add new leave type
            </button>
            <a href="{{ route('leaveIncrement.index') }}" title="Leave Increments Settings" type="button"
                class="btn btn-outline-dark">
                <i class='la la-cog la-lg'></i>
            </a>
        </div>
        <div class="clearfix"></div>
        <div class="table-responsive">
            <table class='table table-bordered table-hover' id='leave-types-table' width="100%">
                <thead>
                    <tr class='bg-light'>
                        <th class='text-uppercase'>Code</th>
                        <th class='text-uppercase'>Leave</th>
                        <th class='text-uppercase'>Description</th>
                        <th class='text-truncate'>Convertable to cash</th>
                        <th class='text-uppercase'>Applicable Gender</th>
                        <th class='text-center text-uppercase'>Actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
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
                        <div class="col-lg-12">
                              <label for="">Name <span class='text-danger'>*</span></label>
                              <input type="text" class='form-control' name="name">
                              <span class='text-danger' id="name__error__element"></span>
                        </div>

                        <div class="col-lg-12">
                              <label for="">Code <span class='text-danger'>*</span></label>
                              <input type="text" class='form-control' name="code">
                              <span class='text-danger' id="code_error_element"></span>
                        </div>

                        <div class="col-lg-12">
                              <label for="">Description</label>
                              <textarea name="description" class="form-control" cols="30" rows="5"></textarea>
                        </div>

                        <div class="col-lg-12">
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

                        <div class="col-lg-6 offset-6 text-right">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="convertible_to_cash"
                                    id="convertableToCashCheckbox">
                                <label class="form-check-label" for="convertableToCashCheckbox"> &nbsp; Convertable to
                                    cash</label>
                            </div>
                        </div>
                        
                    </div>

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary shadow text-white">
                    <div class="spinner-border spinner-border-sm text-light d-none" id="save-spinner" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    Save
                </button>
                </form>
                <button type="button" class="btn btn-danger shadow text-white" data-dismiss="modal">Close</button>
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
                        <div class="col-lg-12">
                            <label for="">Name
                                <span class='text-danger'>*</span>
                            </label>
                            <input type="text" class='form-control' name="edit_name" id="edit_name">
                            <span class='text-danger' id="name__error__element__edit"></span>
                        </div>

                        <div class="col-lg-12">
                            <label for="">Description</label>
                            <textarea name="edit_description" id="edit_description" class="form-control" cols="30"
                                rows="5"></textarea>
                        </div>

                        <div class="col-lg-12">
                            <label>Applicable Gender <span class='text-danger'>*</span></label>
                            <select id="edit_applicable_gender" name="edit_applicable_gender" class="form-control">
                                <option value="female">Female</option>
                                <option value="male">Male</option>
                                <option value="female/male">Female/Male</option>
                            </select>
                            <span class='text-danger' id="applicable_gender__error__element__edit"></span>
                        </div>

                        <div class="col-lg-6 offset-6 text-right">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="edit_convertible_to_cash"
                                    id="editConvertableToCash">
                                <label class="form-check-label" for="editConvertableToCash"> &nbsp; Convertable to
                                    cash</label>
                            </div>
                        </div>

                    </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-success text-white shadow">
                    <div class="spinner-border spinner-border-sm text-light d-none" id="update-spinner" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    Update
                </button>
                </form>
                <button type="button" class="btn btn-danger text-white shadow" data-dismiss="modal">Close</button>
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
    const EDITABLE_COLUMN = 6;
    const ACTION_COLUMN = 7;
    const VALIDATION_ERROR = 422;
    let leaveID = null;

    const FORM_ELEMENTS = ['name', 'days_period', 'applicable_gender'];

    let table = $('#leave-types-table').DataTable({
        ajax: `/maintenance/leave/list`,
        serverSide: true,
        processing: true,
        language: {
            processing: '<i class="text-primary fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
        },
        columns: [{
                className: 'text-truncate align-middle',
                data: "leave_type_id",
                name: "leave_type_id"
            },
            {
                className: "text-truncate align-middle",
                data: "description",
                name: "description"
            },
            {
                className: 'text-truncate align-middle',
                data: "description2",
                name: "description2",
                render: function (a, x, data, row) {
                    let {
                        description2
                    } = data;
                    let description = description2 && description2.substr(0, 50);
                    return `${description || ''} `;
                },
            },
            {
                className: 'text-center align-middle',
                data: "convertible_to_cash",
                name: "convertible_to_cash",
                render: function (rawData, _, row, data) {
                    if (rawData == 1) {
                        return `<i class='la la-check font-weight-bold text-success'></i>`;
                    } else {
                        return `<i class='la la-times font-weight-bold text-danger'></i>`;
                    }
                }
            },
            {
                className: 'align-middle text-uppercase',
                data: "applicable_gender",
                name: "applicable_gender"
            },
            {
                className: 'text-center align-middle',
                defaultContent: '',
                data: "leave_type_id",
                name: "leave_type_id",
                orderable: false,
                render: function (code, _, row, data) {
                    return `
                              <button class='btn btn-success btn-sm rounded-circle shadow edit__leave__type' data-id="${code}">
                                    <i class='la la-pencil'></i>
                              </button>

                               <button class='btn btn-danger btn-sm rounded-circle shadow delete__leave__type' data-id="${code}">
                                    <i class='la la-trash'></i>
                              </button>
                        `;
                }
            },
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
            url: '/maintenance/leave',
            method: 'POST',
            data: formData,
            success: function (response) {

                // Hide the spinner in submit button
                $('#save-spinner').addClass('d-none');

                if (response.success) {
                    table.draw();
                    swal({
                        text : 'You successfully add new leave',
                        icon : 'success',
                        buttons :false,
                        timer :5000,
                    });
                    $('#addLeaveTypeModal').modal('toggle');
                }
            },
            error: function (response) {
                // Hide the spinner in submit button
                $('#save-spinner').addClass('d-none');

                if (response.status === VALIDATION_ERROR) {
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

        // Ajax request for fetching leave type data.
        $.ajax({
            url: `/maintenance/leave/${leaveID}/edit`,
            success: function (leave) {
                // Collect data of form fields.
                $('#edit_code').val(leave.leave_type_id);
                $('#edit_name').val(leave.description);
                $('#edit_description').val(leave.description2);
                $('#edit_applicable_gender').val(leave.applicable_gender);
                
                if (leave.convertible_to_cash == 1) {
                    $('#editConvertableToCash').attr('checked', true);
                } else {
                    $('#editConvertableToCash').removeAttr('checked');
                }
            },
        });
    });

    $('#editLeaveTypeForm').submit(function (e) {
        e.preventDefault();

        // Display the spinner
        $('#update-spinner').removeClass('d-none');

        // Collect data of form fields.
        let data = $('#editLeaveTypeForm').serialize();

        $.ajax({
            url: `/maintenance/leave/${leaveID}`,
            method: 'PUT',
            data: data,
            success: function (response) {
                $('#update-spinner').addClass('d-none');
                if (response.success) {
                    table.ajax.reload(null, false);
                    swal("Good Job!", "Successfully update a leave type.", "success");
                    $('#editLeaveTypeModal').modal('toggle');
                }
            },
            error: function (response) {
                $('#update-spinner').addClass('d-none');
                if (response.status === VALIDATION_ERROR) {
                    Object.keys(response.responseJSON.errors).forEach((field, key) => {
                        $(`#${field.replace('edit_', '')}__error__element__edit`).text(
                            response.responseJSON.errors[field][0]);
                    });
                }
            }
        });

    });

    $(document).on('click', '.delete__leave__type', function () {
        leaveID = $(this).attr('data-id');
        swal({
            title: "Are you sure?",
            text: "You are about to delete a leave type record",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: `/maintenance/leave/${leaveID}`,
                    method: 'DELETE',
                    success: function (response) {
                        table.ajax.reload(null, false);
                        swal({
                              text : 'You successfully delete a leave',
                              icon : 'success',
                              buttons : false,
                              timer : 5000,
                        });
                    }
                });
            }
        });
    });

</script>
@endpush
@endsection
