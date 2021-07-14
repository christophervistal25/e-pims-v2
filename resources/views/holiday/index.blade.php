@inject('holiday', 'App\Holiday')
@extends('layouts.app')
@section('title', 'Holidays')
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

    .holiday__edit..holiday__delete {
        pointer-events: none;
    }

</style>
@endprepend
@section('content')
<div class="card">
    <div class="card-body">
        <div class="float-right mb-2">
            <button type="button" class="btn btn-primary shadow" data-toggle="modal" data-target="#addNewHolidayModal" >
                <i class='la la-plus'></i>
                Add new holiday
            </button>
        </div>
        <div class="clearfix"></div>
        <table class='table table-bordered table-hover ' id='holidays-table' width="100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Type</th>
                    <th class='text-center'>Actions</th>
                </tr>
            </thead>
            <tbody cellpadding="20"></tbody>
        </table>
    </div>
</div>


<!-- SAVE Modal -->
<div class="modal rounded-0 fade" id="addNewHolidayModal" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add new Holiday</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Enter holiday name</label>
                    <input type="text" class='form-control' id="holidayName">
                    <span id="name-error" class='text-danger'></span>
                </div>

                <div class="form-group">
                    <label for="">Pick date</label>
                    <input type="date" class='form-control' id="holidayDate">
                    <span id="date-error" class='text-danger'></span>
                </div>

                <div class="form-group">
                    <label for="">Holiday Type</label>
                    <select id="holidayType" class='form-control'>
                        @foreach($holiday::TYPES as $type)
                        <option value="{{  $type }}">{{  $type }}</option>
                        @endforeach
                    </select>
                    <span id="type-error" class='text-danger'></span>
                </div>

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary shadow" id="btnHolidaySave">
                    <div class="spinner-border spinner-border-sm text-light d-none" id="save-spinner" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    Save
                </button>
                <button type="button" class="btn btn-danger shadow" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<!-- EDIT Modal -->
<div class="modal rounded-0 fade" id="editHolidayModal" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Holiday</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Enter holiday name</label>
                    <input type="text" class='form-control' id="editHolidayName">
                    <span id="edit-name-error" class='text-danger'></span>
                </div>

                <div class="form-group">
                    <label for="">Pick date</label>
                    <input type="date" class='form-control' id="editHolidayDate">
                    <span id="edit-date-error" class='text-danger'></span>
                </div>

                <div class="form-group">
                    <label for="">Holiday Type</label>
                    <select id="editHolidayType" class='form-control'>
                        @foreach($holiday::TYPES as $type)
                        <option value="{{  $type }}">{{  $type }}</option>
                        @endforeach
                    </select>
                    <span id="edit-type-error" class='text-danger'></span>
                </div>

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success shadow" id="btnHolidayUpdate">
                    <div class="spinner-border spinner-border-sm text-light d-none" id="update-spinner" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    Update
                </button>
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
    let holidayID = null;
    
    const DATE_COLUMN = 1;
    const TYPE_COLUMN = 2;
    const ACTION_COLUMN = 3;

    const VALIDATION_ERROR = 422;

    let table = $('#holidays-table').DataTable({
        serverSide: true,
        stateSave: true,
        ajax: `/holiday/list`,
        processing: true,
        language: {
                    processing: '<i class="text-primary fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> ',
        },
        pagingType: "full_numbers",
        columnDefs : [{
            "targets": '_all',
            "createdCell": function (td, cellData, rowData, row, col) {
                $(td).css('padding', '15px 25px');
                if (col === TYPE_COLUMN) {
                    if (cellData === 'SPECIAL NON-WORKING') {
                        $(td).html('')
                            .html(
                                `<center><span class='badge badge-success'>${cellData}</span></center>`
                                );
                    } else if (cellData === 'SPECIAL WORKING') {
                        $(td).html('')
                            .html(
                                `<center><span class='badge badge-info'>${cellData}</span></center>`
                                );
                    } else {
                        $(td).html('')
                            .html(
                                `<center><span class='badge badge-primary'>${cellData}</span></center>`
                                );
                    }
                } else if (col === ACTION_COLUMN) {
                    $(td).html('')
                        .append(`
                            <center>
                                    <button class="btn btn-sm shadow btn-success rounded-circle holiday__edit" 
                                            data-id="${rowData.id}" 
                                            data-name="${rowData.name}" 
                                            data-date="${rowData.date}" 
                                            data-type="${rowData.type}">
                                            <i class="la la-pencil"></i>
                                    </button>
                                    <button class="ml-1 btn btn-sm shadow btn-danger rounded-circle holiday__delete" data-id="${rowData.id}" >
                                        <i class="la la-trash"></i>
                                    </button>
                                </center>
                        `);
                }
            }
        }],
        columns: [{
                data: "name",
                name: "name"
            },
            {
                className: "text-center",
                data: "date",
                name: "date"
            },
            {
                data: "type",
                type: "type"
            },
            {
                orderable: false,
                defaultContent: ''
            }
        ],
    });

    $('#btnHolidaySave').click(function (e) {
        let nameField = $('#holidayName');
        let dateField = $('#holidayDate');
        let typeField = $("#holidayType");

        // Display spinner
        $('#save-spinner').removeClass('d-none');

        // Clear failed form validation styles.
        nameField.removeClass('is-invalid');
        dateField.removeClass('is-invalid');
        typeField.removeClass('is-invalid');

        $('#name-error').text('');
        $('#date-error').text('');
        $('#type-error').text('');


        $.ajax({
            url: `/holiday`,
            data: {
                name: nameField.val(),
                date: dateField.val(),
                type: typeField.val()
            },
            method: 'POST',
            success: function (response) {
                if (response.success) {
                    table.draw();
                    swal("Good job!", "Sucessfully add new holiday.", "success");
                    $('#save-spinner').addClass('d-none');
                    $('#addNewHolidayModal').modal('toggle');
                }
            },
            error: function (response) {
                $('#save-spinner').addClass('d-none');
                if (response.status === VALIDATION_ERROR) {
                    Object.keys(response.responseJSON.errors).map((field) => {
                        $(`#${field}-error`).text(
                            `${response.responseJSON.errors[field][0]}`);
                        // Capitalize field
                        let capitalizedField = field.charAt(0).toUpperCase() + field.slice(
                            1);
                        $(`#holiday${capitalizedField}`).addClass('is-invalid');
                    });
                }
            }
        });
    });

    $(document).on('click', '.holiday__edit', function (e) {
        holidayID = $(this).attr('data-id');
        let name = $(this).attr('data-name');
        let date = $(this).attr('data-date');
        let type = $(this).attr('data-type');

        
        $('#editHolidayName').val(name);  
        $('#editHolidayDate').val(date);  
        $('#editHolidayType').val(type);  
        
        $('#editHolidayModal').modal('toggle');
    });

    $('#btnHolidayUpdate').click(function () {
        let editHolidayField = $('#editHolidayName');  
        let editHolidayDate = $('#editHolidayDate');  
        let editHolidayType = $('#editHolidayType');

        $('#update-spinner').removeClass('d-none');

        // Clear failed form validation styles.
        editHolidayField.removeClass('is-invalid');
        editHolidayDate.removeClass('is-invalid');
        editHolidayType.removeClass('is-invalid');

        $('#edit-name-error').text('');
        $('#edit-date-error').text('');
        $('#edit-type-error').text('');
        

        $.ajax({
            url : `/holiday/${holidayID}`,
            data : {name : editHolidayField.val() , date : editHolidayDate.val(), type : editHolidayType.val() },
            method : 'PUT',
            success : function (response) {
                $('#update-spinner').addClass('d-none');
                swal("Good Job!", "Successfully update a holiday", "success");
                $('#editHolidayModal').modal('toggle');
                table.draw();
            },
            error: function (response) {
                $('#update-spinner').addClass('d-none');
                if (response.status === VALIDATION_ERROR) {
                    Object.keys(response.responseJSON.errors).map((field) => {
                        $(`#edit-${field}-error`).text(
                            `${response.responseJSON.errors[field][0]}`);
                        // Capitalize field
                        let capitalizedField = field.charAt(0).toUpperCase() + field.slice(
                            1);
                        $(`#editHoliday${capitalizedField}`).addClass('is-invalid');
                    });
                }
            }
        });
    });

    $(document).on('click', '.holiday__delete', function (e) {
        let id = $(this).attr('data-id');
        swal({
                title: "Are you sure?",
                text : "You are about to delete a holiday record",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url : `/holiday/${id}`,
                        method : 'DELETE',
                        success : function (response) {
                            if(response.success) {
                                table.draw();
                                swal("Good Job!", "Successfully delete a holiday", "success");
                            }
                        },
                    });
                } 
            });
        
    });

</script>
@endpush
@endsection
