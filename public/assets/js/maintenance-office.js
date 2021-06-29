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
    $("#maintenanceOffice").DataTable({
        processing: true,
        serverSide: true,
        retrieve: true,
        columnDefs: [{ width: "10%", targets: 7 }],
        ajax: "/maintenance-office-list",
        columns: [
            { data: "office_code", name: "office_code" },
            { data: "office_name", name: "office_name" },
            { data: "office_short_name", name: "office_short_name" },
            { data: "office_address", name: "office_address" },
            { data: "office_short_address", name: "office_short_address" },
            { data: "office_head", name: "office_head" },
            { data: "position_name", name: "position_name" },
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
    $("#maintenanceOfficeForm").submit(function(e) {
        e.preventDefault();
        let data = $(this).serialize();
        $("#saveBtn").attr("disabled", true);
        $("#loading").removeClass("d-none");
        $.ajax({
            type: "POST",
            url: "/maintenance-office",
            data: data,
            success: function(response) {
                if (response.success) {
                    $("input").val("");
                    const errorClass = [
                        "#officeCode",
                        "#officeName",
                        "#officeShortName",
                        "#officeHead",
                        "#positionName"
                    ];
                    $.each(errorClass, function(index, value) {
                        $(`${value}`).removeClass("is-invalid");
                    });
                    const errorMessage = [
                        "#office-code-error-message",
                        "#office-name-error-message",
                        "#office-short-name-error-message",
                        "#office-address-error-messagee",
                        "#office-short-address-error-message",
                        "#office-head-error-message",
                        "#position-name-error-message"
                    ];
                    $.each(errorMessage, function(index, value) {
                        $(`${value}`).html("");
                    });
                    $("#maintenanceOffice")
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
                    if (errors.hasOwnProperty("officeName")) {
                        $("#officeName").addClass("is-invalid");
                        $("#office-name-error-message").html("");
                        $("#office-name-error-message").append(
                            `<span>${errors.officeName[0]}</span>`
                        );
                    } else {
                        $("#officeName").removeClass("is-invalid");
                        $("#office-name-error-message").html("");
                    }
                    if (errors.hasOwnProperty("officeShortName")) {
                        $("#officeShortName").addClass("is-invalid");
                        $("#office-short-name-error-message").html("");
                        $("#office-short-name-error-message").append(
                            `<span>${errors.officeShortName[0]}</span>`
                        );
                    } else {
                        $("#officeShortName").removeClass("is-invalid");
                        $("#office-short-name-error-message").html("");
                    }
                    if (errors.hasOwnProperty("officeAddress")) {
                        $("#officeAddress").addClass("is-invalid");
                        $("#office-address-error-message").html("");
                        $("#office-address-error-message").append(
                            `<span>${errors.officeAddress[0]}</span>`
                        );
                    } else {
                        $("#officeAddress").removeClass("is-invalid");
                        $("#office-address-error-message").html("");
                    }
                    if (errors.hasOwnProperty("officeShortAddress")) {
                        $("#officeShortAddress").addClass("is-invalid");
                        $("#office-short-address-error-message").html("");
                        $("#office-short-address-error-message").append(
                            `<span>${errors.officeShortAddress[0]}</span>`
                        );
                    } else {
                        $("#officeShortAddress").removeClass("is-invalid");
                        $("#office-short-address-error-message").html("");
                    }

                    if (errors.hasOwnProperty("officeHead")) {
                        $("#officeHead").addClass("is-invalid");
                        $("#office-head-error-message").html("");
                        $("#office-head-error-message").append(
                            `<span>${errors.officeHead[0]}</span>`
                        );
                    } else {
                        $("#officeHead").removeClass("is-invalid");
                        $("#office-head-error-message").html("");
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
