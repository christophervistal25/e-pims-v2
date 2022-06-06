const ACTIVE_STATUS_INDEX = 9;
const OFFICE_INDEX = 6;
const ACTIVE = 1;
const FORM_VALIDATION_ERROR = 422;

$("#showEmployee").hide();
$("#showAddEmployee").hide();
$(".select2").select2();
$(".office_charging").select2();
$(".office_assignment").select2();

let table = $("#employees-table").DataTable({
    ajax: "/api/employee/list",
    serverSide: true,
    processing: true,
    destroy: true,
    order: [[1, "asc"]],
    language: {
        processing:
            '<i class="text-primary fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span>',
    },
    initComplete: function () {},
    columns: [
        {
            name: "Employee_id",
            class: "align-middle text-center",
        },
        {
            name: "LastName",
            class: "align-middle text-truncate",
        },
        {
            name: "FirstName",
            class: "align-middle text-truncate",
        },
        {
            name: "MiddleName",
            class: "align-middle text-truncate",
        },
        {
            name: "Suffix",
            class: "align-middle text-center",
        },
        {
            name: "position.position_short_name",
            class: "align-middle text-uppercase text-sm text-truncate",
            orderable: false,
            searchable: false,
        },
        {
            name: "office_charging.office_name",
            defaultContent: "",
            class: "align-middle text-uppercase",
            orderable: false,
            searchable: false,
        },
        {
            name: "office_assignment.Description",
            class: "align-middle text-uppercase",
            orderable: false,
            searchable: false,
        },
        {
            name: "Work_Status",
            class: "align-middle text-center text-truncate",
            orderable: false,
        },
        {
            name: "isActive",
            class: "align-middle text-center text-truncate",
            orderable: false,
            render: function (rawData, _, data, row) {
                if (data[ACTIVE_STATUS_INDEX] == ACTIVE) {
                    return `<span class="badge badge-primary text-uppercase">Active</span>`;
                } else {
                    return `<span class="badge badge-danger text-uppercase">In-active</span>`;
                }
            },
        },
        {
            name: "Employee_id",
            class: "align-middle text-center text-truncate",
            orderable: false,
            defaultContent: "",
            render: function () {
                return ``;
            },
        },
        {
            name: "action",
            class: "text-truncate align-middle",
            searchable: false,
            orderable: false,
        },
    ],
});

$(document).on("focus", ".dataTables_filter input", function () {
    $(this)
        .unbind()
        .bind("keyup", function (e) {
            if (e.keyCode === 13) {
                table.search(this.value).draw();
            } else if (e.keyCode === 8 && !this.value) {
                table.search("").draw();
            }
        });
});

$(document).on("click", ".btn-edit-employee", function () {
    $('#addEmployeeForm').children().each(function (index, element) {
        $(element).find('input').each(function (index, e) {
            let nameAttribute = $(e).attr('name');
            $(`input[name="${nameAttribute}"]`).removeClass('is-invalid');
            $(`#edit-${nameAttribute}-error`).text('');
        });

        $(element).find('select').each(function (index, e) {
            let nameAttribute = $(e).attr('name');
            $(`select[name="${nameAttribute}"]`).removeClass('is-invalid');
            $(`#edit-${nameAttribute}-error`).text('');
        });

        $(element).find('textarea').each(function (index, e) {
            let nameAttribute = $(e).attr('name');
            $(`textarea[name="${nameAttribute}"]`).removeClass('is-invalid');
            $(`#edit-${nameAttribute}-error`).text('');
        });
    });

    $("#loader-wrapper, #loader").show();
    const employeeID = $(this).attr("data-employee-id");
    let position = "";

    $("#showEmployee").fadeIn().show();

    $("#employees-data-table").fadeOut().hide();

    $.ajax({
        url: "/api/offices",
        success: function (response) {
            $("#office_charging").children().remove();
            $("#office_assignment").children().remove();

            response.office.forEach((office) => {
                $("#office_charging").append(`
                        <option value="${office.OfficeCode}">${office.Description}</option>
                    `);
            });

            response.office2.forEach((office) => {
                $("#office_assignment").append(`
                        <option value="${office.OfficeCode2}">${office.Description}</option>
                    `);
            });
        },
    });

    $.ajax({
        url: `/api/employee/find/${employeeID}`,
        success: function (employee) {
            position = employee.position?.Description || employee.Work_Status;
            $("#employeeID").val(employee.Employee_id);
            $("#lastname").val(employee.LastName);
            $("#firstname").val(employee.FirstName);
            $("#middlename").val(employee.MiddleName);
            $("#suffix").val(employee.Suffix);
            $("#birthdate").val(employee.Birthdate);
            $("#birthplace").val(employee.BirthPlace);
            $("#gender").val(employee.Gender?.toUpperCase());
            $("#civil_status").val(employee.CivilStatus?.toUpperCase());
            $("#address").val(employee.Address);
            $("#contact_no").val(employee.ContactNumber);
            $("#active_status").val(employee.isActive);
            $("#office_charging").val(employee.OfficeCode);
            $("#office_assignment").val(employee.OfficeCode2);
            $("#status").val(employee.Work_Status);
            $("#salary_grade").val(employee.sg_no);
            $("#step_increment").val(employee.step);
            $("#salary_rate").val(employee.salary_rate);
            $("#philHealthNo").val(employee.philhealth_no);
            $("#pagIbigNo").val(employee.pagibig_no);
            $("#tinNo").val(employee.tin_no);
            $("#gsisNo").val(employee.gsis_no);
            $("#dbpCardNumber").val(employee.dbp_account_no);
            $("#lbpCardNumber").val(employee.lbp_account_no);
            $("#btnUpdateEmployee").attr(
                "data-employee-id",
                employee.Employee_id
            );
        },
    }).done(function () {
        let AJAX_SELECT_CONFIGURATION = {
            placeholder: `${position}`,
            ajax: {
                url: "/api/position/lookup",
                dataType: "json",
                delay: 250,
                quietMills: 50,
                data: function (params) {
                    return {
                        search: params.term,
                    };
                },
                processResults: function (data, params) {
                    var positions = [];
                    data.forEach((value) => {
                        positions.push(value);
                    });

                    return {
                        results: $.map(positions, function (item) {
                            return {
                                text: `${item.Description.toUpperCase()}`,
                                id: item.PosCode,
                            };
                        }),
                    };
                },
                cache: true,
            },
            minimumInputLength: 2,
        };

        $("#position").select2(AJAX_SELECT_CONFIGURATION);
        $("#loader-wrapper, #loader").fadeOut();
    });
});

$("#btn-back").click(function () {
    $("#showEmployee").fadeOut().hide();

    $("#employees-data-table").fadeIn().show();
});

$("#btn-add-back").click(function () {
    $("#showAddEmployee").fadeOut().hide();

    $("#employees-data-table").fadeIn().show();
});

$("#officeChargingSelect").change(function (e) {
    let charging = e.target.value;
    let assignment = $("#officeAssignmentSelect").val();
    let status = $("#employeeStatus").val();
    let active = $("#activeStatus").val();
    table.ajax
        .url(`/api/employee/list/${charging}/${assignment}/${status}/${active}`)
        .load();
});

$("#officeAssignmentSelect").change(function (e) {
    let charging = $("#officeChargingSelect").val();
    let assignment = e.target.value;
    let status = $("#employeeStatus").val();
    let active = $("#activeStatus").val();
    table.ajax
        .url(`/api/employee/list/${charging}/${assignment}/${status}/${active}`)
        .load();
});

$("#employeeStatus").change(function (e) {
    let charging = $("#officeChargingSelect").val();
    let assignment = $("#officeAssignmentSelect").val();
    let status = e.target.value;
    let active = $("#activeStatus").val();
    table.ajax
        .url(`/api/employee/list/${charging}/${assignment}/${status}/${active}`)
        .load();
});

$("#activeStatus").change(function (e) {
    let charging = $("#officeChargingSelect").val();
    let assignment = $("#officeAssignmentSelect").val();
    let status = $("#employeeStatus").val();
    let active = e.target.value;
    table.ajax
        .url(`/api/employee/list/${charging}/${assignment}/${status}/${active}`)
        .load();
});

$("#btnUpdateEmployee").click(function (e) {
    e.preventDefault();
    let employeeID = $(this).attr("data-employee-id");
    let data = $("#updateEmployeeForm").serialize();

    $(this).attr("disabled", true);
    $("#btnUpdateSpinner").removeClass("d-none");

    $.ajax({
        url: `/api/employee/${employeeID}/update`,
        method: "PUT",
        data,
        success: function (response) {
            $("#btnUpdateEmployee").removeAttr("disabled");
            $("#btnUpdateSpinner").addClass("d-none");
            swal({
                text: "You successfully update employee information",
                icon: "success",
                buttons: false,
                timer: 1500,
            });
            table.ajax.reload(null, false);
        },
        error: function (response) {
            $("#btnUpdateEmployee").removeAttr("disabled");
            $("#btnUpdateSpinner").addClass("d-none");
            if (response.status === FORM_VALIDATION_ERROR) {
                for (const [field, error] of Object.entries(
                    response.responseJSON.errors
                )) {
                    $(`[name='${field}']`).addClass("is-invalid");
                    $(`#edit-${field}-error`).text(error);
                }
            }
        },
    });
});

$("#addNewEmployee").click(function () {
    $('#addEmployeeForm').children().each(function (index, element) {
        $(element).find('input').each(function (index, e) {
            let nameAttribute = $(e).attr('name');
            $(`#${nameAttribute}-error`).text('');
            $(e).removeClass('is-invalid');
        });

        $(element).find('select').each(function (index, e) {
            let nameAttribute = $(e).attr('name');
            $(`#${nameAttribute}-error`).text('');
            $(e).removeClass('is-invalid');
        });

        $(element).find('textarea').each(function (index, e) {
            let nameAttribute = $(e).attr('name');
            $(`#${nameAttribute}-error`).text('');
            $(e).removeClass('is-invalid');
        });
    });

    $("#loader-wrapper, #loader").show();

    $("#employees-data-table").fadeOut().hide();

    $.ajax({
        url: "/api/offices",
        success: function (response) {
            $("#add_form_office_charging").children().remove();

            $("#add_form_office_assignment").children().remove();

            $("#add_form_office_charging").append(`
                <option value="">-</option>
            `);

            $("#add_form_office_assignment").append(`
                <option value="">-</option>
            `);

            response.office.forEach((office) => {
                $("#add_form_office_charging").append(`
                    <option value="${office.OfficeCode}">${office.Description}</option>
                `);
            });

            response.office2.forEach((office) => {
                $("#add_form_office_assignment").append(`
                    <option value="${office.OfficeCode2}">${office.Description}</option>
                `);
            });
        },
    });

    let AJAX_SELECT_CONFIGURATION = {
        placeholder: `Search Position`,
        ajax: {
            url: "/api/position/lookup",
            dataType: "json",
            delay: 250,
            quietMills: 50,
            data: function (params) {
                return {
                    search: params.term,
                };
            },
            processResults: function (data, params) {
                var positions = [];
                data.forEach((value) => {
                    positions.push(value);
                });

                return {
                    results: $.map(positions, function (item) {
                        return {
                            text: `${item.Description.toUpperCase()}`,
                            id: item.PosCode,
                        };
                    }),
                };
            },
            cache: true,
        },
        minimumInputLength: 2,
    };

    $("#add_form_position").select2(AJAX_SELECT_CONFIGURATION);

    $("#showAddEmployee").fadeIn().show();
    $("#loader-wrapper, #loader").hide();
});

$("#submitNewEmployee").click(function (e) {
    e.preventDefault();
    let data = $("#addEmployeeForm").serialize();
    $('[name="*"]').each(function (index, element) {
        console.log(element);
    });

    $.ajax({
        url: "/api/employee/store",
        method: "POST",
        data: data,
        success: function (response) {},
        error: function (response) {
            $("#btnUpdateEmployee").removeAttr("disabled");
            $("#btnUpdateSpinner").addClass("d-none");
            if (response.status === FORM_VALIDATION_ERROR) {
                for (const [field, error] of Object.entries(
                    response.responseJSON.errors
                )) {
                    $(`[name='${field}']`).addClass("is-invalid");
                    $(`#${field}-error`).text(error.join(", "));
                }
            }
        },
    });
});

let downloadID = 0;
$(document).on("click", ".btn-download-pds", function () {
    downloadID = $(this).attr("data-id");
    $("#downloadPDSModal").modal("toggle");
});

$("#downloadPdf").click(function () {
    $(this).attr("data-id", downloadID);
    $.ajax({
        url: `/api/personal-data-sheet/download/${downloadID}`,
        success: function (response) {
            if (response.success) {
                socket.emit("PRINT_PDF", {
                    fileName: `${downloadID}-E-PDS`,
                    id: downloadID,
                });
            }
        },
    });

    socket.on(`PUBLISH_DONE_${downloadID}`, (data) => {
        window.open(`/api/personal-data-sheet/download/pdf/${data.fileName}`);
        $("#downloadPDSModal").modal("toggle");
    });
});

$("#downloadExcel").click(function () {
    window.open(`/api/personal-data-sheet/download/excel/${downloadID}`);
});
