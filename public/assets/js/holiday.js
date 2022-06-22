$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

let holidayID = null;

const DATE_COLUMN = 1;
const TYPE_COLUMN = 2;
const ACTION_COLUMN = 3;
const CURRENT_YEAR = new Date().getFullYear();

const VALIDATION_ERROR = 422;

let table = $("#holidays-table").DataTable({
    serverSide: true,
    stateSave: true,
    ajax: `/holiday/list`,
    processing: true,
    language: {
        processing:
            '<i class="text-primary fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> ',
    },
    pagingType: "full_numbers",
    columns: [
        {
            data: "name",
            name: "name",
        },
        {
            className: "",
            data: "date_string",
            name: "date",
        },
        {
            data: "type",
            type: "type",
            render : function (cellData) {
                  if (cellData === "SPECIAL NON-WORKING") {
                        return `<center><span class='badge badge-success'>${cellData}</span></center>`
                    } else if (cellData === "SPECIAL WORKING") {
                        return `<center><span class='badge badge-info'>${cellData}</span></center>`;
                    } else {
                        return `<center><span class='badge badge-primary'>${cellData}</span></center>`;
                    }
            },
        },
        {
            orderable: false,
            defaultContent: "",
            render : function (rawData, _, row, _) {
      
                  return `
                        <center>
                              <button class="btn btn-sm shadow btn-success rounded-circle holiday__edit" 
                                    data-id="${row.id}" 
                                    data-name="${row.name}" 
                                    data-date="${row.date}-${CURRENT_YEAR}" 
                                    data-type="${row.type}">
                                    <i class="la la-pencil"></i>
                              </button>
                              <button class="ml-1 btn btn-sm shadow btn-danger rounded-circle holiday__delete" data-id="${row.id}" >
                              <i class="la la-trash"></i>
                              </button>
                        </center>
                  `;
            }
        },
    ],
});

$("#btnHolidaySave").click(function (e) {
    let nameField = $("#holidayName");
    let dateField = $("#holidayDate");
    let typeField = $("#holidayType");

    // Display spinner
    $("#save-spinner").removeClass("d-none");

    nameField.removeClass("is-invalid");
    dateField.removeClass("is-invalid");
    typeField.removeClass("is-invalid");

    $("#name-error").text("");
    $("#date-error").text("");
    $("#type-error").text("");

    $.ajax({
        url: `/holiday`,
        data: {
            name: nameField.val(),
            date: dateField.val(),
            type: typeField.val(),
        },
        method: "POST",
        success: function (response) {
            if (response.success) {
                table.draw();

                swal({
                        title : 'Awesome',
                        text : 'Successfully add new holiday',
                        icon : 'success',
                        buttons : false,
                        timer : 5000,
                });

                $("#save-spinner").addClass("d-none");
                $("#addNewHolidayModal").modal("toggle");
            }
        },
        error: function (response) {
            $("#save-spinner").addClass("d-none");
            if (response.status === VALIDATION_ERROR) {
                Object.keys(response.responseJSON.errors).map((field) => {
                    $(`#${field}-error`).text(
                        `${response.responseJSON.errors[field][0]}`
                    );

                    /* Capitalizing the first letter of the field. */
                    let capitalizedField = field.charAt(0).toUpperCase() + field.slice(1);
                    
                    $(`#holiday${capitalizedField}`).addClass("is-invalid");
                });
            }
        },
    });
});

$(document).on("click", ".holiday__edit", function (e) {
    holidayID = $(this).attr("data-id");
    let name = $(this).attr("data-name");
    let date = $(this).attr("data-date");
    let type = $(this).attr("data-type");
    let [month, datee, year] = date.split("-");

    $("#editHolidayName").val(name);
    $("#editHolidayDate").val(`${year}-${month}-${datee}`);
    $("#editHolidayType").val(type);

    $("#editHolidayModal").modal("toggle");
});

$("#btnHolidayUpdate").click(function () {
    let editHolidayField = $("#editHolidayName");
    let editHolidayDate = $("#editHolidayDate");
    let editHolidayType = $("#editHolidayType");

    $("#update-spinner").removeClass("d-none");

      /* Removing the class is-invalid from the input fields. */
    editHolidayField.removeClass("is-invalid");
    editHolidayDate.removeClass("is-invalid");
    editHolidayType.removeClass("is-invalid");

    $("#edit-name-error").text("");
    $("#edit-date-error").text("");
    $("#edit-type-error").text("");

    $.ajax({
        url: `/holiday/${holidayID}`,
        data: {
            name: editHolidayField.val(),
            date: editHolidayDate.val(),
            type: editHolidayType.val(),
        },
        method: "PUT",
        success: function (response) {
            $("#update-spinner").addClass("d-none");
            $("#editHolidayModal").modal("toggle");
            table.draw();

            swal({
                  title : 'Awesome',
                  text : 'Successfully updated a holiday',
                  icon : 'success',
                  buttons : false,
                  timer : 5000,
            });
        },
        error: function (response) {
            $("#update-spinner").addClass("d-none");
            if (response.status === VALIDATION_ERROR) {
                Object.keys(response.responseJSON.errors).map((field) => {
                    $(`#edit-${field}-error`).text(
                        `${response.responseJSON.errors[field][0]}`
                    );
                    /* Capitalizing the first letter of the field. */
                    let capitalizedField = field.charAt(0).toUpperCase() + field.slice(1);
                    $(`#editHoliday${capitalizedField}`).addClass("is-invalid");
                });
            }
        },
    });
});

$(document).on("click", ".holiday__delete", function (e) {
    let id = $(this).attr("data-id");
    
    swal({
        title: "Are you sure?",
        text: "You are about to delete a holiday record",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: `/holiday/${id}`,
                method: "DELETE",
                success: function (response) {
                    if (response.success) {
                        table.draw();

                        swal({
                            title: "Awesome!",
                            text: "Successfully deleted a holiday",
                            icon: "success",
                            buttons : false,
                            timer : 5000,
                        });
                    }
                },
            });
        }
    });

});

