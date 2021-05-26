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
    $("#salaryGrade")
        .val("Please Select")
        .trigger("change");
    const errorClass = [
        "#positionCode",
        "#positionName",
        "#salaryGrade",
        "#positionNameShortname"
    ];
    $.each(errorClass, function(index, value) {
        $(`${value}`).removeClass("is-invalid");
    });
    const errorMessage = [
        "#position-code-error-message",
        "#position-name-no-error-message",
        "#salary-grade-error-message",
        "#position-short-name-no-error-message"
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
                    const select = ["#salaryGrade"];
                    $.each(select, function(index, value) {
                        $(`${value}`)
                            .val("Please Select")
                            .trigger("change");
                    });
                    const errorClass = [
                        "#positionCode",
                        "#positionName",
                        "#salaryGrade",
                        "#positionNameShortname"
                    ];
                    $.each(errorClass, function(index, value) {
                        $(`${value}`).removeClass("is-invalid");
                    });
                    const errorMessage = [
                        "#position-code-error-message",
                        "#position-name-no-error-message",
                        "#salary-grade-error-message",
                        "#position-short-name-no-error-message"
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
                        $("#position-name-no-error-message").html("");
                        $("#position-name-no-error-message").append(
                            `<span>${errors.positionName[0]}</span>`
                        );
                    } else {
                        $("#positionName").removeClass("is-invalid");
                        $("#position-name-no-error-message").html("");
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
                    if (errors.hasOwnProperty("positionNameShortname")) {
                        $("#positionNameShortname").addClass("is-invalid");
                        $("#position-short-name-no-error-message").html("");
                        $("#position-short-name-no-error-message").append(
                            `<span>${errors.positionNameShortname[0]}</span>`
                        );
                    } else {
                        $("#positionNameShortname").removeClass("is-invalid");
                        $("#position-short-name-no-error-message").html("");
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
            { data: "position_code", name: "position_code" },
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
