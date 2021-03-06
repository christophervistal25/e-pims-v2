$(document).ready(function () {
    let errorMessage = [
        "#position-code-error-message",
        "#position-name-error-message",
        "#salary-grade-no-error-message",
        "#position-short-name-error-message",
    ];
    let errorClass = [
        "#positionCode",
        "#positionName",
        ".salaryGradeNo .dropdown",
        "#positionShortName",
    ];
    let removeValue = ["#positionName", "#positionShortName"];
    // code for show add form
    $("#addButton").click(function () {
        $("#add").attr("class", "page-header");
        $("#table").attr("class", "page-header d-none");
    });
    // code for show table
    $("#showListPosition").click(function () {
        $("#add").attr("class", "page-header d-none");
        $("#table").attr("class", "page-header");
    });

    // cancel
    $("#cancelButton").click(function () {
        $("#add").attr("class", "page-header d-none");
        $("#table").attr("class", "page-header");
        $("#salaryGradeNo").val("Please Select").trigger("change");
        $.each(removeValue, function (index, value) {
            $(`${value}`).val("");
        });
        $.each(errorClass, function (index, value) {
            $(`${value}`).removeClass("is-invalid");
        });
        $.each(errorMessage, function (index, value) {
            $(`${value}`).html("");
        });
    });

    //display list of position
    $("#maintenancePosition").DataTable({
        pagingType: "full_numbers",
        serverSide: true,
        ajax: "/maintenance-position-list",
        language: {
            processing:
                '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> ',
        },
        columns: [
            { className: "text-center", data: "PosCode", name: "PosCode" },
            { data: "Description", name: "Description" },
            { className: "text-center", data: "sg_no", name: "sg_no" },
            {
                className: "text-center",
                data: "position_short_name",
                name: "position_short_name",
            },
            {
                data: "action",
                name: "action",
                className: "text-center",
                searchable: false,
                sortable: false,
            },
        ],
    });
    // add new position
    $("#maintenancePositionForm").submit(function (e) {
        e.preventDefault();
        let data = $(this).serialize();
        let positionCode = parseInt($("#positionCode").val()) + 1;
        $("#saveBtn").attr("disabled", true);
        $("#loading").removeClass("d-none");
        $("#saving").html("Saving . . .");
        $.ajax({
            type: "POST",
            url: "/maintenance-position",
            data: data,
            success: function (response) {
                if (response.success) {
                    $("#salaryGradeNo").val("Please Select").trigger("change");
                    $("input").val("");
                    $.each(errorClass, function (index, value) {
                        $(`${value}`).removeClass("is-invalid");
                    });
                    $.each(errorMessage, function (index, value) {
                        $(`${value}`).html("");
                    });
                    $("#maintenancePosition").DataTable().ajax.reload();
                    swal("Sucessfully Added!", "", "success");
                    $("#saveBtn").attr("disabled", false);
                    $("#loading").addClass("d-none");
                    $("#saving").html("Save");
                    $("#positionCode").val(positionCode);
                }
            },
            error: function (response) {
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
                        $(".salaryGradeNo .dropdown").addClass("is-invalid");
                        $("#salary-grade-no-error-message").html("");
                        $("#salary-grade-no-error-message").append(
                            `<span>${errors.salaryGradeNo[0]}</span>`
                        );
                    } else {
                        $(".salaryGradeNo .dropdown").removeClass("is-invalid");
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
                    $("#saving").html("Save");
                }
            },
        });
    });
    //remove error if put value
    $("#positionCode").keyup(function () {
        $("#positionCode").removeClass("is-invalid");
        $("#position-code-error-message").html("");
    });
    $("#positionName").keyup(function () {
        $("#positionName").removeClass("is-invalid");
        $("#position-name-error-message").html("");
    });
    $("#salaryGradeNo").change(function () {
        $(".salaryGradeNo .dropdown").removeClass("is-invalid");
        $("#salary-grade-no-error-message").html("");
    });
    $("#positionShortName").keyup(function () {
        $("#positionShortName").removeClass("is-invalid");
        $("#position-short-name-error-message").html("");
    });
});
