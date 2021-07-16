// code for show add form
$(document).ready(function() {
    $("#addbutton").click(function() {
        $("#add").attr("class", "page-header");
        $("#table").attr("class", "page-header d-none");
    });
});
// {{-- code for show table --}}
$(document).ready(function() {
    $("#cancelbutton").click(function() {
        $("#add").attr("class", "page-header d-none");
        $("#table").attr("class", "page-header");
    });
});
$(document).ready(function() {
    $("#cancelbutton1").click(function() {
        $("#add").attr("class", "page-header d-none");
        $("#table").attr("class", "page-header");
    });
});

$(function() {
    $("#maintenancePosition").DataTable({
        processing: true,
        pagingType: "full_numbers",
        stateSave: true,
        serverSide: true,
        retrieve: true,
        ajax: "/maintenance-position-list",
        language: {
            processing:
                '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
        },
        columns: [
            { data: "position_name", name: "position_name" },
            { data: "sg_no", name: "sg_no" },
            { data: "position_short_name", name: "position_short_name" },
            {
                data: "action",
                name: "action",
                searchable: false,
                sortable: false
            }
        ]
    });
});

//// add position
$(document).ready(function() {
    $("#maintenancePositionForm").submit(function(e) {
        e.preventDefault();
        let data = $(this).serialize();
        $("#saveBtn").attr("disabled", true);
        $("#loading").removeClass("d-none");
        $.ajax({
            type: "POST",
            url: "/maintenance-position",
            data: data,
            success: function(response) {
                if (response.success) {
                    $("#salaryGradeNo")
                        .val("Please Select")
                        .trigger("change");
                    $("input").val("");
                    const errorClass = [
                        "#positionCode",
                        "#positionName",
                        "#salaryGradeNo",
                        "#positionShortName"
                    ];
                    $.each(errorClass, function(index, value) {
                        $(`${value}`).removeClass("is-invalid");
                    });
                    const errorMessage = [
                        "#position-code-error-message",
                        "#position-name-error-message",
                        "#salary-grade-no-error-message",
                        "#position-short-name-error-message"
                    ];
                    $.each(errorMessage, function(index, value) {
                        $(`${value}`).html("");
                    });
                    $("#maintenancePosition")
                        .DataTable()
                        .ajax.reload();
                    swal("Sucessfully Added!", "", "success");
                    $("#saveBtn").attr("disabled", false);
                    $("#loading").addClass("d-none");
                }
            },
            error: function(response) {
                if (response.status === 422) {
                    let errors = response.responseJSON.errors;
                    if (errors.hasOwnProperty("positionCode")) {
                        $("#positionCode").addClass("is-invalid");
                        $("#position-code-error-message").html("");
                        $("#position-code-error-message").append(
                            `<span>${errors.positionCode[0]}</span>`
                        );
                    } else {
                        $("#positionCode").removeClass("is-invalid");
                        $("#position-code-error-message").html("");
                    }
                    if (errors.hasOwnProperty("positionName")) {
                        $("#positionName").addClass("is-invalid");
                        $("#position-name-error-message").html("");
                        $("#position-name-error-message").append(
                            `<span>${errors.positionName[0]}</span>`
                        );
                    } else {
                        $("#positionName").removeClass("is-invalid");
                        $("#position-name-error-message").html("");
                    }
                    if (errors.hasOwnProperty("salaryGradeNo")) {
                        $("#salaryGradeNo").addClass("is-invalid");
                        $("#salary-grade-no-error-message").html("");
                        $("#salary-grade-no-error-message").append(
                            `<span>${errors.salaryGradeNo[0]}</span>`
                        );
                    } else {
                        $("#salaryGradeNo").removeClass("is-invalid");
                        $("#salary-grade-no-error-message").html("");
                    }
                    if (errors.hasOwnProperty("positionShortName")) {
                        $("#positionShortName").addClass("is-invalid");
                        $("#position-short-name-error-message").html("");
                        $("#position-short-name-error-message").append(
                            `<span>${errors.positionShortName[0]}</span>`
                        );
                    } else {
                        $("#positionShortName").removeClass("is-invalid");
                        $("#position-short-name-error-message").html("");
                    }
                    // Create an parent element
                    let parentElement = document.createElement("ul");
                    let errorss = response.responseJSON.errors;
                    $.each(errorss, function(key, value) {
                        let errorMessage = document.createElement("li");
                        let [error] = value;
                        errorMessage.innerHTML = error;
                        parentElement.appendChild(errorMessage);
                    });
                    swal({
                        title: "The given data was invalid!",
                        icon: "error",
                        content: parentElement
                    });
                    $("#saveBtn").attr("disabled", false);
                    $("#loading").addClass("d-none");
                }
            }
        });
    });
});
