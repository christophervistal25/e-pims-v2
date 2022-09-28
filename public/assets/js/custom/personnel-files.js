// Ajax setup for CSRF token
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

let fileID = 0;
let selectedFiles = [];

// Check if #addFileSection has data-has-old-values != 0
if ($('#addFileSection').data('has-old-values') != 0) {
    $('#addFileSection').fadeIn(500).removeClass('d-none');
    $('#employeesTableSection').fadeOut(500).addClass('d-none');
} else {
    $('#addFileSection').fadeOut(500).addClass('d-none');
    $('#employeesTableSection').fadeIn(500).removeClass('d-none');
}

// Datatables serer-side for personnel file
$(document).ready(function () {
    let isFirst = true;
    let isFirstRender = true;

    $('#tablePersonnelFile').DataTable({
        processing: true,
        serverSide: true,
        ordering: false,
        retrieve: true,
        language: {
            processing:
                '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> ',
        },
        ajax: {
            url: "/api/personnel-file/list",
        },
        fnDrawCallback: function ( oSettings ) {
            $(oSettings.nTHead).hide();
            if(isFirstRender) {
                $('#tablePersonnelFile_wrapper').children().first().remove();
                isFirstRender = false;
            }
        },
        columns: [{
                data: 'name',
                name: 'name',
                className: 'cursor-pointer file-record',
                render: function (data, _, row, _) {
                    return `<span class='text-uppercase text-sm' data-file-id="${row.id}" style='pointer-events:none;'>${data}</span>`;
                }
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
            }
        ],
        scrollX: true,
        scrollY: '63vh',
        scrollCollapse: true,
        paging: false,
        bInfo: false,
        bFilter: false,
    });

    // Datatables for employees
    let tableEmployees = $('#employeesTable').DataTable({
        processing: true,
        serverSide: true,
        ordering: false,
        ajax: {
            url: "/api/employees-for-personnel-files",
        },
        fnDrawCallback: function ( oSettings ) {
            // $(oSettings.nTHead).hide();
            if(isFirst) {
                $('#employeesTable_wrapper').children().first().remove();
                isFirst = false;
            }
        },
        columns: [{
                data: 'image',
                name: 'image',
                className: 'text-center',
            },
            {
                data: 'fullname',
                name: 'fullname',
                className: 'align-middle',
            },
            {
                data: 'action',
                name: 'action',
                className: 'align-middle text-center',
                orderable: false,
            }
        ],
        scrollX: true,
        scrollY: '58vh',
        scrollCollapse: true,
        bLengthChange: false,
    });

    $('#searchEmployee').keyup(function () {
        tableEmployees.search($(this).val()).draw();
    });
});

// Generate click listener for viewing personnel file
$(document).on('click', '.btn-view-file', function () {
    // Change the content of this button to spinner
    $(this).html(`<i class="fas fa-spinner fa-spin"></i>`);

    $('.file-timestamp, .filesize, .filename').text('');
    let id = $(this).attr('data-id');
    // Before displaying the modal fetch first the employee personal files
    $.ajax({
        url: `/api/personnel-file/${id}`,
        success: function (response) {
            $('#modalViewFileTitle').text(`${response.fullname} FILES`);
            $('#modalViewFile').modal('show');
            $('#dynamic-content-of-files').html(``);
            // Check if file_records has data
            if (response.file_records.length !== 0) {
                $('#no-available-files').hide();
                $('#files-content').show();
                response.file_records.forEach((file) => {
                    let {file_details} = file;
                    $('#dynamic-content-of-files').append(`
                        <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                            <div class="card card-file">
                                <div class="card-file-thumb">
                                    <i class="fa fa-file-pdf-o text-danger"></i>
                                </div>
                                <div class="card-body">
                                    <h6 class='text-uppercase' class='filename'>
                                        <a href="#">${file_details.name}</a>
                                    </h6>
                                    <span class='filesize'>${file.file_size}</span>
                                </div>
                                <div class="card-footer" class='file-timestamp'>${file.created_at}</div>
                                <a class='btn btn-sm btn-primary mt-2 btn-download-file' href="/download-personnel-file/${file.file}">
                                    <i class="fa fa-download"></i>
                                    Download
                                </a>
                            </div>
                        </div>
                    `);
                });
            } else {
                // Display the no availables file
                $('#files-content').hide();
                $('#no-available-files').show();
            }
        }
    });
});


$('#modalViewFile').on('hide.bs.modal', function () {
    // Change the content of btn-view back to view
    $('.btn-view-file').html(`<i class='la la-eye'></i>`);
});


// Generate on click listener for add new file button
$('#btnAddNewFile').click(function () {
    // Reset the form
    $('#formAddNewFile')[0].reset();
    // Show modal
    $('#modalAddNewFile').modal('show');
});

// Generate on click listener for submit new file button with ajax request to api
$('#btnSubmitNewFile').click(function () {
    // Get form data
    var formData = $('#formAddNewFile').serialize();
    // Send ajax request
    $.ajax({
        url: '/api/personnel-file/store',
        type: 'POST',
        data: formData,
        success: function (response) {
            if (response.success) {
                $('#formAddNewFile')[0].reset();

                // Display success message using sweetalert
                swal({
                    title: "Success",
                    text: "File added successfully",
                    icon: "success",
                    buttons: false,
                    timer: 5000,
                });

                // Reload datatable
                $('#tablePersonnelFile').DataTable().ajax.reload(null, false);

                // Set focus to file name input
                $('#file').focus();
            }
        },
        error: function (response) {
            if (response.status == 422) {
                // Add class is-invalid to the input
                $('#file').addClass('is-invalid');
                // Clear the span error message first
                $('#file').next().text('');
                $('#file').after(`<span class='text-danger'>${response.responseJSON.error['name'][0]}</span>`);
            }
        }
    });
});

// Set a click event for edit button
$(document).on('click', '.btn-edit-file', function () {
    // Change the content of this button to spinner
    $(this).html('<i class="la la-spinner la-spin"></i>');

    // Get the id of file
    fileID = $(this).attr('data-id');

    // Get the name of file
    let name = $(this).attr('data-name');

    // Display edit file modal
    $('#modalEditFile').modal('toggle');

    // Set the value of name to file
    $('#edit_file').val(name);
});

// Modal hidden event for edit file modal
$('#modalEditFile').on('hide.bs.modal', function () {
    // Set the content of all edit button to pen icon
    $('.btn-edit-file').html('<i class="la la-pencil"></i>');
});

// Generate on click listener for submit edit file button with ajax request to api
$('#btnUpdateFile').click(function () {
    // Check if fileID is not equal to zero
    if (fileID != 0) {
        // Get form data
        var formData = $('#formEditFile').serialize();
        // Send ajax request
        $.ajax({
            url: `/api/personnel-file/${fileID}/update`,
            type: 'PUT',
            data: formData,
            success: function (response) {
                if (response.success) {
                    // Hide modal
                    $('#modalEditFile').modal('hide');
                    $('#tablePersonnelFile').DataTable().ajax.reload();
                }
            },
            error: function (data) {}
        });
    }

});



$(document).on('click', '.btn-add-file', function () {
    // Set the addFileSectionTitle to full name of employee
    $('#addFileSectionTitle').text(`Add file for ${$(this).attr('data-fullname')}`);
    // Get the employee ID of selected employee
    let id = $(this).attr('data-id');

    // add employee id into form action of formAddFile
    $('#formAddFile').attr('action', `/employee-personnel-file/${id}`);

    // Add the d-none class of employees table section
    $('#employeesTableSection').fadeOut(500).addClass('d-none');

    $('#addFileSection').fadeIn(500).removeClass('d-none');
});


// Set click listener to btnBack button
$('#btnBack').click(function () {
    // Add the d-none class of employees table section
    $('#employeesTableSection').fadeIn(500).removeClass('d-none');

    $('#addFileSection').fadeOut(500).addClass('d-none');

    // Remove all dynamic added elements
    $('#add-file-dynamic-content').html('');

    // Remove class bg-primary class in table cell of personnelFiles table
    $('#tablePersonnelFile tbody tr').each(function (_, element) {
        // Get element with attribute data-clicked=1
        let elementWithDataClicked = $(element).attr('data-clicked');
        if (elementWithDataClicked == 1) {
            // Remove class bg-primary class in table cell of personnelFiles table
            $(element).removeClass('bg-primary').removeAttr('data-clicked').removeClass('text-white').removeClass('font-weight-bold');
        }
    });
});

// Generate click for each click of tablePersonnelFile row
$(document).on('click', '#tablePersonnelFile tbody tr', function (e) {
    // Get the class list of clicked element
    let classList = e.target.classList;
    let fileType = e.target.innerText;
    // Get the data-file-id from the children span
    let fileID = $(e.target).children('span').attr('data-file-id');

    if (Array.from(classList).includes('file-record')) {
        if (!selectedFiles.includes(fileType)) {
            // Check if addFileSection doesn't have d-none class
            if (!$('#addFileSection').hasClass('d-none')) {
                $(this).addClass('bg-primary').addClass('text-white').addClass('font-weight-bold').attr('data-clicked', 1).attr('data-file-type', fileType);
                // Append record in add-file-dynamic-content
                $('#add-file-dynamic-content').append(`
                            <div class='border col-lg-12 row mt-3' data-parent='${fileType}'>
                                <div class='col-lg-12 text-right float-right p-0 m-0'>
                                    <button class='btn btn-danger btn-sm rounded-circle btn-remove-attachment shadow' data-file-type="${fileType}">
                                        <i class="las la-minus"></i>
                                    </button>
                                </div>
                                <div class="col-lg-4 mb-0">
                                    <div class="form-group mb-0">
                                        <label>Name</label>
                                        <input type="text" name="names[]" class='form-control' value="${fileType}" readonly>
                                        <input type="hidden" name="ids[]" class='form-control' value="${fileID}" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-0">
                                    <div class="form-group mb-0">
                                        <label>Date</label>
                                        <input type="date" name="dates[]" class='form-control' value="{{ date('Y-m-d') }}">
                                    </div>
                                </div>

                                <div class="col-lg-4 mt-0">
                                    <div class="form-group mt-0">
                                        <label>Attachment</label>
                                        <input type="file" name="attachments[]" class='form-control'>
                                    </div>
                                </div>
                            </div>
                `).fadeIn(500);
                selectedFiles.push(fileType);
            } else {

                // Create an p element with message
                let p = document.createElement('p');
                p.innerText = 'Please select an employee first before adding file record';

                // Add class text-dark to p element
                p.classList.add('text-dark');

                swal({
                    title: "",
                    content: p,
                    icon: "error",
                    buttons: false,
                    timer: 5000,
                });

            }
        } else {
            // Get the table cell by attribute data-file-type
            let element = $('#tablePersonnelFile tbody tr[data-file-type="' + fileType + '"]');
            $(element).removeClass('bg-primary').removeAttr('data-clicked').removeClass('text-white').removeClass('font-weight-bold');

            // Remove the selected filetype in selectedFiles array
            selectedFiles.splice(selectedFiles.indexOf(fileType), 1);

            // Remove the dynamic added element
            $('#add-file-dynamic-content').find('div[data-parent="' + fileType + '"]').remove();
        }
    }
});

$(document).on('click', '.btn-remove-attachment', function () {
    // Get the file type of this button
    let fileType = $(this).attr('data-file-type');

    // Remove the parent element of this button
    $(this).parent().parent().remove();

    // Remove the class bg-primary class in table cell of personnelFiles table if data-clicked=1
    $('#tablePersonnelFile tbody tr').each(function (index, element) {
        // Get element with attribute data-clicked=1
        let elementWithDataClicked = $(element).attr('data-clicked');
        if (elementWithDataClicked == 1) {
            // Remove class bg-primary class in table cell of personnelFiles table
            if (fileType == $(element).attr('data-file-type')) {
                $(element).removeClass('bg-primary').removeAttr('data-clicked').removeClass('text-white').removeClass('font-weight-bold');
                selectedFiles.splice(selectedFiles.indexOf(fileType), 1);
            }
        }
    });
});
