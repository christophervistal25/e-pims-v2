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
    let divisionTable = $("#maintenanceDivision").DataTable({
        pagingType: "full_numbers",
        serverSide: true,
        stateSave: true,
        processing: true,
        language: {
            processing:
                '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> ',
        },
        ajax: "/maintenance-division-list/0001",
        columns: [
            { data: "division_id", name: "division_id" },
            { data: "division_name", name: "division_name" },
            { data: "offices", name: "offices" },
            {
                data: "action",
                name: "action",
                className: "text-center",
                searchable: false,
                sortable: false,
            },
        ],
    });

    $("#maintenanceDivisionOffice").change(function (e) {
        let maintenanceDivisionOffice = $("#maintenanceDivisionOffice").val();
        divisionTable.ajax
            .url(`/maintenance-division-list/${maintenanceDivisionOffice}`)
            .load();
    });

    // $("#maintenanceDivisionOffice").change(function (e) {
    //     if (e.target.value == "") {
    //         table.destroy();
    //         table = $("#maintenanceDivision").DataTable({
    //             pagingType: "full_numbers",
    //             serverSide: true,
    //             stateSave: true,
    //             processing: true,
    //             language: {
    //                 processing:
    //                     '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> ',
    //             },
    //             ajax: "/maintenance-division-list",
    //             columns: [
    //                 { data: "offices", name: "offices" },
    //                 { data: "division_name", name: "division_name" },
    //                 {
    //                     data: "action",
    //                     name: "action",
    //                     searchable: false,
    //                     sortable: false,
    //                 },
    //             ],
    //         });
    //     } else {
    //         table.destroy();
    //         table = $("#maintenanceDivision").DataTable({
    //             pagingType: "full_numbers",
    //             serverSide: true,
    //             stateSave: true,
    //             processing: true,
    //             language: {
    //                 processing:
    //                     '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> ',
    //             },
    //             ajax: {
    //                 url: `/api/maintenance/division/${e.target.value}`,
    //             },
    //             columns: [
    //                 { data: "division_name", name: "division_name" },
    //                 { data: "offices", name: "offices" },
    //                 {
    //                     data: "action",
    //                     name: "action",
    //                     searchable: false,
    //                     sortable: false,
    //                 },
    //             ],
    //         });
    //     }
    // });

    // add new division
    $("#maintenanceDivisionForm").submit(function (e) {
        e.preventDefault();
        let data = $(this).serialize();
        $("#saveBtn").attr("disabled", true);
        $("#loading").removeClass("d-none");

        $.ajax({
            type: "POST",
            url: "/maintenance-division",
            data: data,
            success: function (response) {
                if (response.success) {
                    // $("#officeCode").val("Please Select").trigger("change");

                    $("input").val("");

                    const errorClass = [
                        "#divisionName",
                        ".officeCode .dropdown",
                    ];

                    $.each(errorClass, function (index, value) {
                        $(`${value}`).removeClass("is-invalid");
                    });

                    const errorMessage = [
                        "#division-name-error-message",
                        "#office-code-error-message",
                    ];

                    $.each(errorMessage, function (index, value) {
                        $(`${value}`).html("");
                    });

                    $("#maintenanceDivision").DataTable().ajax.reload();

                    swal({
                        title: "",
                        text: "Division successfully add",
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
