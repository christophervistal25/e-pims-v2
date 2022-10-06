$(document).ready(function () {
    let errorMessage = [
        "#office-code-error-message",
        "#office-name-error-message",
        "#office-short-name-error-message",
        "#office-address-error-messagee",
        "#office-short-address-error-message",
        "#office-head-error-message",
        "#position-name-error-message",
    ];

    let errorClass = [
        "#officeCode",
        "#officeName",
        "#officeShortName",
        "#officeHead",
        "#positionName",
    ];

    // code for number only
    $("#officeCode").on("input", function (e) {
        $(this).val(
            $(this)
                .val()
                .replace(/[^0-9.]/g, "")
        );
    });

    // code for show add form
    $("#addButton").click(function () {
        $("#add").attr("class", "page-header");
        $("#table").attr("class", "page-header d-none");
    });

    // code for show table
    $("#showListOffice").click(function () {
        $("#add").attr("class", "page-header d-none");
        $("#table").attr("class", "page-header");
    });
    // cancel
    $("#cancelButton").click(function () {
        $("input").val("");
        $.each(errorClass, function (index, value) {
            $(`${value}`).removeClass("is-invalid");
        });
        $.each(errorMessage, function (index, value) {
            $(`${value}`).html("");
        });
        $("#add").attr("class", "page-header d-none");
        $("#table").attr("class", "page-header");
    });
    //show list of office
    $("#maintenanceOffice").DataTable({
        pagingType: "full_numbers",
        stateSave: true,
        processing: true,
        serverSide: true,
        retrieve: true,
        // columnDefs: [{ width: "10%", targets: 7 }],
        language: {
            processing:
                '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> ',
        },
        ajax: "/maintenance-office-list",
        columns: [
            {
                data: "office_code",
                name: "office_code",
                class: "h6 align-middle",
            },
            {
                data: "office_name",
                name: "office_name",
                class: "text-left h6 align-middle",
            },
            {
                data: "office_head",
                name: "office_head",
                class: "text-left h6 align-middle",
            },
            {
                data: "office_short_name",
                name: "office_short_name",
                class: "align-middle",
            },
            {
                data: "position_name",
                name: "position_name",
                class: "text-left align-middle",
            },
            {
                class: "text-center align-middle",
                defaultContent: "",
            },
            {
                className: 'text-truncate',
                data: "action",
                name: "action",
                searchable: false,
                sortable: false,
            },
        ],
    });

    // add new office
    $("#maintenanceOfficeForm").submit(function (e) {
        e.preventDefault();
        let data = $(this).serialize();
        $("#saveBtn").attr("disabled", true);
        $("#loading").removeClass("d-none");
        $("#saving").html("Saving . . .");

        $.ajax({
            type: "POST",
            url: "/maintenance-office",
            data: data,
            success: function (response) {
                if (response.success) {
                    $("input").val("");

                    $.each(errorClass, function (index, value) {
                        $(`${value}`).removeClass("is-invalid");
                    });
                    $.each(errorMessage, function (index, value) {
                        $(`${value}`).html("");
                    });
                    $("#maintenanceOffice").DataTable().ajax.reload();

                    swal({
                        title: "",
                        text: "Successfully added!",
                        icon: "success",
                        buttons : false,
                        timer :5000,
                    });

                    $("#saveBtn").attr("disabled", false);
                    $("#loading").addClass("d-none");
                    $("#saving").html("Save");
                }
            },
            error: function (response) {
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
                        $("#office-name-error-message")
                            .html("")
                            .append(`<span>${errors.officeName[0]}</span>`);
                    } else {
                        $("#officeName").removeClass("is-invalid");
                        $("#office-name-error-message").html("");
                    }
                    if (errors.hasOwnProperty("officeShortName")) {
                        $("#officeShortName").addClass("is-invalid");
                        $("#office-short-name-error-message")
                            .html("")
                            .append(
                                `<span>${errors.officeShortName[0]}</span>`
                            );
                    } else {
                        $("#officeShortName").removeClass("is-invalid");
                        $("#office-short-name-error-message").html("");
                    }
                    if (errors.hasOwnProperty("officeAddress")) {
                        $("#officeAddress").addClass("is-invalid");
                        $("#office-address-error-message")
                            .html("")
                            .append(`<span>${errors.officeAddress[0]}</span>`);
                    } else {
                        $("#officeAddress").removeClass("is-invalid");
                        $("#office-address-error-message").html("");
                    }
                    if (errors.hasOwnProperty("officeShortAddress")) {
                        $("#officeShortAddress").addClass("is-invalid");
                        $("#office-short-address-error-message")
                            .html("")
                            .append(
                                `<span>${errors.officeShortAddress[0]}</span>`
                            );
                    } else {
                        $("#officeShortAddress").removeClass("is-invalid");
                        $("#office-short-address-error-message").html("");
                    }

                    if (errors.hasOwnProperty("officeHead")) {
                        $("#officeHead").addClass("is-invalid");
                        $("#office-head-error-message")
                            .html("")
                            .append(`<span>${errors.officeHead[0]}</span>`);
                    } else {
                        $("#officeHead").removeClass("is-invalid");
                        $("#office-head-error-message").html("");
                    }

                    if (errors.hasOwnProperty("positionName")) {
                        $("#positionName").addClass("is-invalid");
                        $("#position-name-error-message")
                            .html("")
                            .append(`<span>${errors.positionName[0]}</span>`);
                    } else {
                        $("#positionName").removeClass("is-invalid");
                        $("#position-name-error-message").html("");
                    }

                    if (errors.hasOwnProperty("departmentCode")) {
                        $("#departmentCode").addClass("is-invalid");
                        $("#department-code-error-message")
                            .html("")
                            .append(`<span>${errors.departmentCode[0]}</span>`);
                    } else {
                        $("#departmentCode").removeClass("is-invalid");
                        $("#department-code-error-message").html("");
                    }

                    // Create an parent element
                    let parentElement = document.createElement("ul");
                    let errorss = response.responseJSON.errors;
                    $.each(errorss, function (key, value) {
                        let errorMessage = document.createElement("li");
                        let [error] = value;
                        errorMessage.innerHTML = error;
                        parentElement.appendChild(errorMessage);
                    });

                    let title = document.createElement("h4");
                    title.innerText = "The given data is invalid!";
                    title.innerHTML += "<hr>";
                    parentElement.prepend(title);

                    swal({
                        icon: "error",
                        content: parentElement,
                        buttons: false,
                    });
                    $("#saveBtn").attr("disabled", false);
                    $("#loading").addClass("d-none");
                    $("#saving").html("Save");
                }
            },
        });
    });
    $("#officeCode").keyup(function () {
        $("#officeCode").removeClass("is-invalid");
        $("#office-code-error-message").html("");
    });
    $("#officeName").keyup(function () {
        $("#officeName").removeClass("is-invalid");
        $("#office-name-error-message").html("");
    });
    $("#officeShortName").keyup(function () {
        $("#officeShortName").removeClass("is-invalid");
        $("#office-short-name-error-message").html("");
    });
    $("#officeHead").keyup(function () {
        $("#officeHead").removeClass("is-invalid");
        $("#office-head-error-message").html("");
    });
    $("#positionName").keyup(function () {
        $("#positionName").removeClass("is-invalid");
        $("#position-name-error-message").html("");
    });
});
