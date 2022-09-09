$(document).ready(function () {
    let errorMessage = [
        "#division-name-error-message",
        "#office-code-error-message",
    ];

    let errorClass = ["#divisionName", ".officeCode .dropdown"];

    // code for show add form
    $("#addButton").click(function () {
        $("#add").attr("class", "page-header");
        $("#table").attr("class", "page-header d-none");
    });

    // code for show table
    $("#showListDivision").click(function () {
        $("#add").attr("class", "page-header d-none");
        $("#table").attr("class", "page-header");
    });

    // cancel
    $("#cancelButton").click(function () {
        $("#add").attr("class", "page-header d-none");
        $("#table").attr("class", "page-header");

        $("#officeCode").val("Please Select").trigger("change");

        $("input").val("");

        $.each(errorClass, function (index, value) {
            $(`${value}`).removeClass("is-invalid");
        });

        $.each(errorMessage, function (index, value) {
            $(`${value}`).html("");
        });
    });

    //show list of division
    let sectionTable = $("#maintenanceSection").DataTable({
        pagingType: "full_numbers",
        serverSide: true,
        stateSave: true,
        processing: true,
        language: {
            processing:
                '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> ',
        },
        ajax: "/maintenance-section-list/0001",
        columns: [
            { data: "section_id", name: "section_id" },
            { data: "section_name", name: "section_name" },
            { data: "division_name", name: "division_name" },
            { data: "office_name", name: "office_name" },
            {
                data: "action",
                name: "action",
                className: "text-center",
                searchable: false,
                sortable: false,
            },
        ],
    });

    $("#maintenanceSectionOffice").change(function (e) {
        let maintenanceSectionOffice = $("#maintenanceSectionOffice").val();
        sectionTable.ajax
            .url(`/maintenance-section-list/${maintenanceSectionOffice}`)
            .load();
    });

    // add new division
    $("#maintenanceSectionForm").submit(function (e) {
        e.preventDefault();
        let data = $(this).serialize();
        $("#saveBtn").attr("disabled", true);
        $("#loading").removeClass("d-none");
        $.ajax({
            type: "POST",
            url: "/maintenance-section",
            data: data,
            success: function (response) {
                if (response.success) {
                    // $("#divisionCode").val("Please Select").trigger("change");
                    $("input").val("");
                    const errorClass = [
                        "#sectionName",
                        ".divisionCode .dropdown .officeCode",
                    ];
                    $.each(errorClass, function (index, value) {
                        $(`${value}`).removeClass("is-invalid");
                    });
                    const errorMessage = [
                        "#section-name-error-message",
                        "#division-id-error-message",
                        "#office-code-error-message",
                    ];
                    $.each(errorMessage, function (index, value) {
                        $(`${value}`).html("");
                    });
                    $("#maintenanceSection").DataTable().ajax.reload();
                    swal({
                        title: "",
                        text: "Section successfully add",
                        icon: "success",
                        timer: 5000,
                        buttons: false,
                    });
                    $("#saveBtn").attr("disabled", false);
                    $("#loading").addClass("d-none");
                }
            },
            error: function (response) {
                if (response.status === 422) {
                    let errors = response.responseJSON.errors;
                    if (errors.hasOwnProperty("sectionName")) {
                        $("#sectionName").addClass("is-invalid");
                        $("#section-name-error-message").html("");
                        $("#section-name-error-message").append(
                            `<span>${errors.sectionName[0]}</span>`
                        );
                    } else {
                        $("#sectionName").removeClass("is-invalid");
                        $("#section-name-error-message").html("");
                    }
                    if (errors.hasOwnProperty("divisionCode")) {
                        $(".divisionCode .dropdown").addClass("is-invalid");
                        $("#division-id-error-message").html("");
                        $("#division-id-error-message").append(
                            `<span>${errors.divisionCode[0]}</span>`
                        );
                    } else {
                        $(".divisionCode .dropdown").removeClass("is-invalid");
                        $("#division-id-error-message").html("");
                    }
                    if (errors.hasOwnProperty("officeCode")) {
                        $(".officeCode .dropdown").addClass("is-invalid");
                        $("#office-code-error-message").html("");
                        $("#office-code-error-message").append(
                            `<span>${errors.officeCode[0]}</span>`
                        );
                    } else {
                        $(".officeCode .dropdown").removeClass("is-invalid");
                        $("#office-code-error-message").html("");
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
                    swal({
                        title: "The given data was invalid!",
                        icon: "error",
                        content: parentElement,
                    });
                    $("#saveBtn").attr("disabled", false);
                    $("#loading").addClass("d-none");
                }
            },
        });
    });
});
