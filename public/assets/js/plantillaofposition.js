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
    $("input").val("");
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
        // let empIds = $("#employeeName").val();
        let data = $(this).serialize();
        console.log(data);
        $("#saveBtn").attr("disabled", true);
        $("#loading").removeClass("d-none");
        $.ajax({
            type: "POST",
            url: "/plantilla-of-position",
            data: data,
            success: function(response) {
                if (response.success) {
                    $("input").val("");
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

$(function() {
    $("#plantillaofposition").DataTable({
        processing: true,
        serverSide: true,
        columnDefs: [{ width: "10%", targets: 4 }],
        ajax: "/plantilla-of-position-list",
        columns: [
            { data: "position", name: "position" },
            { data: "item_no", name: "item_no" },
            { data: "sg_no", name: "sg_no" },
            { data: "office", name: "office" },
            { data: "old_position_name", name: "old_position_name" },
            {
                data: "action",
                name: "action",
                searchable: false,
                sortable: false
            }
        ]
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
