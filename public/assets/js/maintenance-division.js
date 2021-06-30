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
        $("#officeCode")
            .val("Please Select")
            .trigger("change");
        $("input").val("");
        const errorClass = ["#divisionName", "#officeCode"];
        $.each(errorClass, function(index, value) {
            $(`${value}`).removeClass("is-invalid");
        });
        const errorMessage = [
            "#division-name-error-message",
            "#office-code-error-message"
        ];
        $.each(errorMessage, function(index, value) {
            $(`${value}`).html("");
        });
    });
});

$(function() {
    let table = $("#maintenanceDivision").DataTable({
        processing: true,
        serverSide: true,
        retrieve: true,
        ajax: "/maintenance-division-list",
        columns: [
            { data: "division_name", name: "division_name" },
            { data: "offices", name: "offices" },
            {
                data: "action",
                name: "action",
                searchable: false,
                sortable: false
            }
        ]
    });

    $("#maintenanceDivisionOffice").change(function(e) {
        if (e.target.value == "" || e.target.value == "") {
            table.destroy();
            table = $("#maintenanceDivision").DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                retrieve: true,
                ajax: "/maintenance-division-list",
                columns: [
                    { data: "division_name", name: "division_name" },
                    { data: "offices", name: "offices" },
                    {
                        data: "action",
                        name: "action",
                        searchable: false,
                        sortable: false
                    }
                ]
            });
        } else {
            table.destroy();
            table = $("#maintenanceDivision").DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                retrieve: true,
                ajax: {
                    url: `/api/maintenance/division/${e.target.value}`
                },
                columns: [
                    { data: "division_name", name: "division_name" },
                    { data: "offices", name: "offices" },
                    {
                        data: "action",
                        name: "action",
                        searchable: false,
                        sortable: false
                    }
                ]
            });
        }
    });
});

//// add division
$(document).ready(function() {
    $("#maintenanceDivisionForm").submit(function(e) {
        e.preventDefault();
        let data = $(this).serialize();
        $("#saveBtn").attr("disabled", true);
        $("#loading").removeClass("d-none");
        $.ajax({
            type: "POST",
            url: "/maintenance-division",
            data: data,
            success: function(response) {
                if (response.success) {
                    $("#officeCode")
                        .val("Please Select")
                        .trigger("change");
                    $("input").val("");
                    const errorClass = ["#divisionName", "#officeCode"];
                    $.each(errorClass, function(index, value) {
                        $(`${value}`).removeClass("is-invalid");
                    });
                    const errorMessage = [
                        "#division-name-error-message",
                        "#office-code-error-message"
                    ];
                    $.each(errorMessage, function(index, value) {
                        $(`${value}`).html("");
                    });
                    $("#maintenanceDivision")
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
                    if (errors.hasOwnProperty("divisionName")) {
                        $("#divisionName").addClass("is-invalid");
                        $("#division-name-error-message").html("");
                        $("#division-name-error-message").append(
                            `<span>${errors.divisionName[0]}</span>`
                        );
                    } else {
                        $("#divisionName").removeClass("is-invalid");
                        $("#division-name-error-message").html("");
                    }
                    if (errors.hasOwnProperty("officeCode")) {
                        $("#officeCode").addClass("is-invalid");
                        $("#office-code-error-message").html("");
                        $("#office-code-error-message").append(
                            `<span>${errors.officeCode[0]}</span>`
                        );
                    } else {
                        $("#officeCode").removeClass("is-invalid");
                        $("#office-code-error-message").html("");
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
