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

function myFunction() {
    const valueE = ["#itemNo", "#positionOldName"];
    $.each(valueE, function(index, value) {
        $(`${value}`).val("");
    });
    $("#positionTitle,#salaryGrade,#officeCode")
        .val("Please Select")
        .trigger("change");
    const errorClass = [
        "#positionTitle",
        "#itemNo",
        "#salaryGrade",
        "#officeCode",
        "#positionOldName"
    ];
    $.each(errorClass, function(index, value) {
        $(`${value}`).removeClass("is-invalid");
    });
    const errorMessage = [
        "#position-title-error-message",
        "#item-error-message",
        "#salary-grade-error-message",
        "#office-error-message",
        "#old-position-name-error-message"
    ];
    $.each(errorMessage, function(index, value) {
        $(`${value}`).html("");
    });
}

//// add new position
$(document).ready(function() {
    $("#plantillaOfPositionForm").submit(function(e) {
        e.preventDefault();
        let data = $(this).serialize();
        $("#saveBtn").attr("disabled", true);
        $("#loading").removeClass("d-none");
        $.ajax({
            type: "POST",
            url: "/plantilla-of-position",
            data: data,
            success: function(response) {
                if (response.success) {
                    const valueE = ["#itemNo", "#positionOldName"];
                    $.each(valueE, function(index, value) {
                        $(`${value}`).val("");
                    });
                    const select = [
                        "#positionTitle",
                        "#salaryGrade",
                        "#officeCode"
                    ];
                    $.each(select, function(index, value) {
                        $(`${value}`)
                            .val("Please Select")
                            .trigger("change");
                    });
                    const errorClass = [
                        "#positionTitle",
                        "#itemNo",
                        "#salaryGrade",
                        "#officeCode",
                        "#positionOldName"
                    ];
                    $.each(errorClass, function(index, value) {
                        $(`${value}`).removeClass("is-invalid");
                    });
                    const errorMessage = [
                        "#position-title-error-message",
                        "#item-error-message",
                        "#salary-grade-error-message",
                        "#office-error-message",
                        "#old-position-name-error-message"
                    ];
                    $.each(errorMessage, function(index, value) {
                        $(`${value}`).html("");
                    });
                    $("#plantillaofposition")
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
                    if (errors.hasOwnProperty("positionTitle")) {
                        $("#positionTitle").addClass("is-invalid");
                        $("#position-title-error-message").html("");
                        $("#position-title-error-message").append(
                            `<span>${errors.positionTitle[0]}</span>`
                        );
                    } else {
                        $("#positionTitle").removeClass("is-invalid");
                        $("#position-title-error-message").html("");
                    }
                    if (errors.hasOwnProperty("itemNo")) {
                        $("#itemNo").addClass("is-invalid");
                        $("#item-error-message").html("");
                        $("#item-error-message").append(
                            `<span>${errors.itemNo[0]}</span>`
                        );
                    } else {
                        $("#itemNo").removeClass("is-invalid");
                        $("#item-error-message").html("");
                    }
                    if (errors.hasOwnProperty("salaryGrade")) {
                        $("#salaryGrade").addClass("is-invalid");
                        $("#salary-grade-error-message").html("");
                        $("#salary-grade-error-message").append(
                            `<span>${errors.salaryGrade[0]}</span>`
                        );
                    } else {
                        $("#salaryGrade").removeClass("is-invalid");
                        $("#salary-grade-error-message").html("");
                    }
                    if (errors.hasOwnProperty("officeCode")) {
                        $("#officeCode").addClass("is-invalid");
                        $("#office-error-message").html("");
                        $("#office-error-message").append(
                            `<span>${errors.officeCode[0]}</span>`
                        );
                    } else {
                        $("#officeCode").removeClass("is-invalid");
                        $("#office-error-message").html("");
                    }
                    if (errors.hasOwnProperty("positionOldName")) {
                        $("#positionOldName").addClass("is-invalid");
                        $("#old-position-name-error-message").html("");
                        $("#old-position-name-error-message").append(
                            `<span>${errors.positionOldName[0]}</span>`
                        );
                    } else {
                        $("#positionOldName").removeClass("is-invalid");
                        $("#old-position-name-error-message").html("");
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

// get value of employees sg, sn, sp
$(document).ready(function() {
    $("#positionTitle").change(function(e) {
        let employeeID = e.target.value;
        let position = $($("#positionTitle option:selected")[0]).attr(
            "data-position"
        );
        console.log(position);
        if (position) {
            position = JSON.parse(position);
            $("#salaryGrade")
                .val(position.sg_no)
                .change();
        } else {
            $("#salaryGrade")
                .val("")
                .change();
        }
    });
});

// display position
$(function() {
    let table = $("#plantillaofposition").DataTable({
        processing: true,
        pagingType: "full_numbers",
        stateSave: true,
        serverSide: true,
        destroy: true,
        retrieve: true,
        columnDefs: [{ width: "10%", targets: 5 }],
        language: {
            processing:
                '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
        },
        ajax: "/plantilla-of-position-list",
        columns: [
            {
                data: "position_name",
                name: "position_name"
            },
            { data: "item_no", name: "item_no" },
            {
                data: "sg_no",
                name: "sg_no"
            },
            { data: "office_name", name: "office_name" },
            { data: "old_position_name", name: "old_position_name" },
            { data: "year", name: "year" },
            {
                data: "action",
                name: "action",
                searchable: false,
                sortable: false
            }
        ]
    });

    $("#employeeOffice").change(function(e) {
        console.log(e.target.value);
        if (e.target.value == "" || e.target.value == "") {
            table.destroy();
            table = $("#plantillaofposition").DataTable({
                processing: true,
                serverSide: true,
                pagingType: "full_numbers",
                stateSave: true,
                columnDefs: [{ width: "10%", targets: 5 }],
                destroy: true,
                retrieve: true,
                language: {
                    processing:
                        '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
                },
                ajax: {
                    url: "/plantilla-of-position-list"
                },
                columns: [
                    {
                        data: "position_name",
                        name: "position_name"
                    },
                    { data: "item_no", name: "item_no" },
                    {
                        data: "sg_no",
                        name: "sg_no"
                    },
                    { data: "office_name", name: "office_name" },
                    { data: "old_position_name", name: "old_position_name" },
                    { data: "year", name: "year" },
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
            table = $("#plantillaofposition").DataTable({
                processing: true,
                serverSide: true,
                pagingType: "full_numbers",
                stateSave: true,
                columnDefs: [{ width: "10%", targets: 5 }],
                destroy: true,
                retrieve: true,
                language: {
                    processing:
                        '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
                },
                ajax: {
                    url: `/api/plantilla/position/${e.target.value}`
                },
                columns: [
                    {
                        data: "position_name",
                        name: "position_name"
                    },
                    { data: "item_no", name: "item_no" },
                    {
                        data: "sg_no",
                        name: "sg_no"
                    },
                    { data: "office_name", name: "office_name" },
                    { data: "old_position_name", name: "old_position_name" },
                    { data: "year", name: "year" },
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

/////////add position function
$(document).ready(function() {
    $("#btnPosition").click(function(response) {
        let addPositionCode = $("#addPositionCode").val();
        let addPositionName = $("#addPositionName").val();
        let addSalaryGrade = $("#addSalaryGrade").val();
        let addPositionShortName = $("#addPositionShortName").val();
        if (
            (addPositionCode != "",
            addPositionName != "",
            addSalaryGrade != "",
            addPositionShortName != "")
        ) {
            $.ajax({
                type: "POST",
                url: "/api/addPosition",
                data: {
                    addPositionCode: addPositionCode,
                    addPositionName: addPositionName,
                    addSalaryGrade: addSalaryGrade,
                    addPositionShortName: addPositionShortName
                },
                success: function(response) {
                    if (response.success) {
                        $(".modal").each(function() {
                            $(this).modal("hide");
                        });
                        swal("Sucessfully Added!", "", "success");
                        $('input[type="text"],select').val("");
                        $("#addSalaryGrade")
                            .val("Please Select")
                            .trigger("change");

                        $("#positionTitle").append(
                            "<option value=" +
                                response.position_id +
                                ">" +
                                addPositionName +
                                "</option>"
                        );
                        const errorClass = [
                            "#addPositionCode",
                            "#addPositionName",
                            "#addSalaryGrade",
                            "#addPositionShortName"
                        ];
                        $.each(errorClass, function(index, value) {
                            $(`${value}`).removeClass("is-invalid");
                        });
                        const errorMessage = [
                            "#add-position-code-error-message",
                            "#add-position-name-error-message",
                            "#add-salary-grade-error-message",
                            "#add-position-short-name-error-message"
                        ];
                        $.each(errorMessage, function(index, value) {
                            $(`${value}`).html("");
                        });
                        $("#positionTitle").selectpicker("refresh");
                    }
                },
                error: function(response) {
                    if (response.status === 422) {
                        // Create an parent element
                        let parentElement = document.createElement("ul");
                        let errors = response.responseJSON.errors;

                        if (errors.hasOwnProperty("addPositionCode")) {
                            $("#addPositionCode").addClass("is-invalid");
                            $("#add-position-code-error-message").html("");
                            $("#add-position-code-error-message").append(
                                `<span>${errors.addPositionCode[0]}</span>`
                            );
                        } else {
                            $("#addPositionCode").removeClass("is-invalid");
                            $("#add-position-code-error-message").html("");
                        }
                        if (errors.hasOwnProperty("addPositionName")) {
                            $("#addPositionName").addClass("is-invalid");
                            $("#add-position-name-error-message").html("");
                            $("#add-position-name-error-message").append(
                                `<span>${errors.addPositionName[0]}</span>`
                            );
                        } else {
                            $("#addPositionName").removeClass("is-invalid");
                            $("#add-position-name-error-message").html("");
                        }
                        if (errors.hasOwnProperty("addSalaryGrade")) {
                            $("#addSalaryGrade").addClass("is-invalid");
                            $("#add-salary-grade-error-message").html("");
                            $("#add-salary-grade-error-message").append(
                                `<span>${errors.addSalaryGrade[0]}</span>`
                            );
                        } else {
                            $("#addSalaryGrade").removeClass("is-invalid");
                            $("#add-salary-grade-error-message").html("");
                        }
                        if (errors.hasOwnProperty("addPositionShortName")) {
                            $("#addPositionShortName").addClass("is-invalid");
                            $("#add-position-short-name-error-message").html(
                                ""
                            );
                            $("#add-position-short-name-error-message").append(
                                `<span>${errors.addPositionShortName[0]}</span>`
                            );
                        } else {
                            $("#addPositionShortName").removeClass(
                                "is-invalid"
                            );
                            $("#add-position-short-name-error-message").html(
                                ""
                            );
                        }

                        $.each(errors, function(key, value) {
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
                    }
                }
            });
        } else {
            swal("Please Input Data", "", "warning");
        }
    });
});
