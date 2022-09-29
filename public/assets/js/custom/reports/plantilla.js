$('#create-report-form-wrapper').hide();
const clearErrorMessage = (parent, target) => $('#generateReportForm').children().find(parent).each((_, element) => $(element).parent().find(target).remove());
const removeIsInvalidClass = (parent) => $('#generateReportForm').children().find(parent).removeClass('is-invalid');


let year = $('#year').val();
let type = "*";
let table = $('#reports-table').DataTable({
    ajax: `/plantilla-report-history-list/${year}/${type}`,
    serverSide: true,
    processing: true,
    saveState: true,
    destroy: true,
    language: {
        processing: '<i class="text-primary fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span>'
    },
    columns: [{
            class: 'text-center align-middle',
            name: 'Id',
            data: 'Id',
        },
        {
            class: 'text-center align-middle',
            name: 'Year',
            data: 'Year',
        },
        {
            class: 'align-middle',
            name: 'Description',
            data: 'Description',
        },
        {
            class: 'text-center align-middle',
            name: 'Asof_date',
            data: 'Asof_date',
        },
        {
            class: 'text-center align-middle',
            name: 'Plantilla_type',
            data: 'Plantilla_type',
        },
        {
            class: 'text-center align-middle',
            name: 'Id',
            data: 'Id',
            render: function (Id, _, row) {
                return `
                    <a class="btn btn-primary" href="/plantilla-report/show/${Id}" id="item__${Id}" >
                        <i class="fas fa-eye"></i>
                    </a>
                    <button class="btn btn-danger btn__remove__report  mx-2 " data-id="${Id}">
                        <i class="fas fa-trash"></i>
                    </button>

                    <button class="btn btn-success btn__export" data-id="${Id}" data-year="${row.Year}" data-type="${row.Plantilla_type}">
                        <i class="las la-file-excel"></i>
                    </button>
                `;
            }
        },

    ]
});

$('#selectedType').change(function () {
    let year = $('#year').val();
    let type = $(this).val();
    table.ajax.url(`/plantilla-report-history-list/${year}/${type}`).load();
});

$('#year').change(function () {
    let year = $(this).val();
    let type = $('#selectedType').val();
    table.ajax.url(`/plantilla-report-history-list/${year}/${type}`).load();
});

$('#back').click(function (e) {
    e.preventDefault();
    $('#create-report-form-wrapper').fadeOut(300);
    setTimeout(() => $('#report-wrapper').show().fadeIn(300), 350);
});

$(document).on('click', '.btn__export', function () {
    let id = $(this).attr('data-id');
    let type = $(this).attr('data-type');

    let messageElement = document.createElement('p');

    messageElement.innerHTML = `<center>Please wait while building your downloads, this might take a while</center>`;

    swal({
        title : '',
        content : messageElement,
        icon : 'info',
        buttons : false,
    });

    $.post({
        url: `/export/${id}/${type}`,
        success: function (response) {
            if (response.success) {
                swal.close();
                window.open(`download/plantilla-generated-report/${response.fileName}`);
                $('#btnExport').html(`
                    <i class="las la-file-excel"></i>
                    CSC - EXPORT XLS
                `);
            }
        }
    });
});

$('#btnGenerate').click(function () {
    let year = $('#year').val();
    let description = $('#description').val();
    let asOfDate = $('#asOfDate').val();
    let plantillaType = $('#selectedType').val();

    if(year === '*' || plantillaType === '*') {
        swal({
            title : '',
            icon : 'error',
            text : 'Please select a type or year first',
            buttons : false,
            timer : 5000,
        })

        return;
    }
    // Checkpoint before display the form.
    $.post({
        url: '/plantilla-report-history-checkpoint',
        data: {
            year,
            description,
            asOfDate,
            plantillaType
        },
        success: function (response) {
            if (!response.exists) {
                $('#report-wrapper').fadeOut(300);
                setTimeout(() => $('#create-report-form-wrapper').show().fadeIn(300), 350);

                // Initialize values for form
                let year = $('#year').val();
                let type = $('#selectedType').val();

                $('#selectedYear').val(year);
                $('#description').val(`${type} PLANTILLA ${year}`);
                $('#type').val(type);
            } else {
                let messageElement = document.createElement('p');
                messageElement.innerHTML = `${year} - ${$('#selectedType').val()} PLANTILLA already exists`;
                $(messageElement).addClass('text-center');

                swal({
                    title: '',
                    content: messageElement,
                    icon: 'warning',
                    button: false,
                    timer: 5000,
                });

                $('tr').removeClass('bg-warning').css({
                    transition: 'background 200ms ease-in-out',
                });

                $(`#item__${response.report.Id}`).parent().parent().addClass('bg-warning').fadeOut(200).fadeIn(200).fadeOut(200).fadeIn(200);
            }
        }
    });

});

$('#formBtnGenerate').click(function (e) {
    e.preventDefault();
    // Change the content of this button to a spinner
    $(this).html('<i class="fas fa-spinner fa-spin"></i>');

    let year = $('#year').val();
    let description = $('#description').val();
    let asOfDate = $('#asOfDate').val();
    let plantillaType = $('#type').val();


    clearErrorMessage('input', 'span');
    clearErrorMessage('textarea', 'span');
    removeIsInvalidClass('input');
    removeIsInvalidClass('textarea');



    $.post({
        url: '/plantilla-report-history-generate',
        data: {
            year,
            description,
            asOfDate,
            plantillaType
        },
        success: function (response) {
            if (response.success) {
                $('#formBtnGenerate').html('<i class="las la-folder-plus"></i> Generate');
                swal({
                    title: '',
                    text: `Successfullye generate a ${plantillaType}  report`,
                    icon: 'success',
                    buttons: false,
                    timer: 5000,
                });
                table.ajax.reload();
                $('#create-report-form-wrapper').fadeOut(300);
                setTimeout(() => $('#report-wrapper').show().fadeIn(300), 350);
            }
        },
        error: function (response) {
            if (response.status === 422) {
                $('#formBtnGenerate').html('<i class="las la-folder-plus"></i> Generate');
                Object.keys(response.responseJSON.errors).map((key) => {
                    let [errorMessage] = response.responseJSON.errors[key];
                    let element = `#${key}`;
                    $(element).addClass('is-invalid').parent().append(`
                        <span class="text-danger">${errorMessage}</span>
                    `);
                });
            }
        }
    });
});

$(document).on('click', '.btn__remove__report', async function () {
    let id = $(this).attr('data-id');
    let confirmation = await swal({
        icon: 'warning',
        text: 'Are you sure you want to delete this report?',
        title: '',
        dangerMode: true,
        buttons: ["No", "Yes"]
    });

    if (confirmation) {
        $.ajax({
            url: `/plantilla-report-history-remove/${id}`,
            method: 'DELETE',
            success: function (response) {
                if (response.success) {
                    table.ajax.reload();
                }
            },
        });
    }

});
