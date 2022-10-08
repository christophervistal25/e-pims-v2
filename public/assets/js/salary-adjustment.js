// display salary adjusmtent
$(function () {
    let currentSgyear = document.getElementById("currentSgyear").value;
    let employeeOffice = $("#employeeOffice").val();
    let SalaryGradeTable = $("#salaryAdjustment").DataTable({
        processing: true,
        destroy: true,
        retrieve: true,
        pagingType: "full_numbers",
        language: {
            processing:
                '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> ',
        },
        ajax: `/salary-adjustment-list/${employeeOffice}/${currentSgyear}`,
        columns: [
            { data: "date_adjustment", name: "date_adjustment" },
            {
                data: "fullname",
                name: "fullname",
                searchable: true,
            },
            { data: "sg_no", name: "sg_no" },
            { data: "step_no", name: "step_no" },
            {
                data: "salary_previous",
                name: "salary_previous",
                render: $.fn.dataTable.render.number(",", ".", 2),
            },
            {
                data: "salary_new",
                name: "salary_new",
                render: $.fn.dataTable.render.number(",", ".", 2),
            },
            {
                data: "salary_diff",
                name: "salary_diff",
                render: $.fn.dataTable.render.number(",", ".", 2),
            },
            {
                className: 'text-truncate',
                data: "action",
                name: "action"
            },
        ],
    });

    $("#employeeOffice,#yearAdjustment").change(function (e) {
        let currentSgyear = $("#yearAdjustment").val();
        let employeeOffice = $("#employeeOffice").val();
        SalaryGradeTable.ajax
            .url(`/salary-adjustment-list/${employeeOffice}/${currentSgyear}`)
            .load();
    });
});

// number only
$(function () {
    $("input[id='salaryNew']").on("input", function (e) {
        $(this).val(
            $(this)
                .val()
                .replace(/[^0-9.]/g, "")
        );
    });
});
$(function () {
    $("input[id='itemNo']").on("input", function (e) {
        $(this).val(
            $(this)
                .val()
                .replace(/[^0-9.]/g, "")
        );
    });
});
// get value of employees sg, sn, sp
$(document).ready(function () {
    $("#employeeName").change(function (e) {
        let employeeID = e.target.value;
        let plantilla = $($("#employeeName option:selected")[0]).attr(
            "data-plantilla"
        );
        if (plantilla) {
            plantilla = JSON.parse(plantilla);
            $("#employeeId").val(plantilla.employee_id);
            $("#positionName").val(
                plantilla.plantilla_positions.position.Description
            );
            $("#status").val(plantilla.status);
            $("#positionId").val(plantilla.pp_id);
            $("#positionCode").val(plantilla.plantilla_positions.PosCode);
            $("#itemNo").val(plantilla.item_no);
            $("#salaryGrade").val(plantilla.sg_no);
            $("#stepNo").val(plantilla.step_no);
            $("#officeCode").val(plantilla.office_code);
            $("#previousYear").val(plantilla.year);
            $("#salaryPrevious").val(plantilla.salary_amount);
        } else {
            $("#positionName").val("");
            $("#itemNo").val("");
            $("#salaryGrade").val("");
            $("#stepNo").val("");
            $("#salaryPrevious").val("");
            $("#salaryNew").val("");
            $("#salaryDifference").val("");
            $("#status").val("");
            $("#previousYear").val("");
            $("#officeCode").val("");
            $("#positionId").val("");
            $("#positionCode").val("");
        }
    });
});

//  position display salary grade
$(document).ready(function () {
    $("#employeeName").change(function () {
        let salaryGrade = $("#salaryGrade").val();
        let stepNo = $("#stepNo").val();
        let currentSgyear = $("#currentSgyear").val();
        $.ajax({
            url: `/api/salaryAdjustment/${salaryGrade}/${stepNo}/${currentSgyear}`,
            success: (response) => {
                if (response == "") {
                    $("#salaryNew").val("");
                } else {
                    let currentSalaryAmount = response["sg_step" + stepNo];
                    $("#salaryNew").val(currentSalaryAmount);
                    var amount = parseFloat($("#salaryPrevious").val());
                    var amount2 = parseFloat($("#salaryNew").val());
                    var amountDifference = amount2 - amount;
                    $("#salaryDifference").val(amountDifference.toFixed(2));
                }
            },
        });
    });
});

// code for show add form
$(document).ready(function () {
    $("#addbutton").click(function () {
        $("#add").attr("class", "page-header");
        $("#table").attr("class", "page-header d-none");
    });
});
// {{-- code for show table --}}
$(document).ready(function () {
    $("#cancelbutton").click(function () {
        $("#add").attr("class", "page-header d-none");
        $("#table").attr("class", "page-header");
    });
});

function reset() {
    $("#employeeName").val("Please Select").trigger("change");
    $("input").val("");
}

//// add salary adjustment
$(document).ready(function () {
    $("#salaryAdjustmentForm").submit(function (e) {
        let empIds = $("#employeeName").val();
        e.preventDefault();
        let data = $(this).serialize();
        $("#saveBtn").attr("disabled", true);
        $("#loading").removeClass("d-none");
        document.getElementById("saving").innerHTML = "Saving . . .";
        $.ajax({
            type: "POST",
            url: "/salary-adjustment",
            data: data,
            success: function (response) {
                if (response.success) {
                    let dateAdjustment = new Date($("#dateAdjustment").val());
                    let year = dateAdjustment.getFullYear();

                    if (
                        !$("#yearAdjustment").find(
                            "option:contains('" + year + "')"
                        ).length
                    ) {
                        $("#yearAdjustment").append(
                            "<option value=" + year + ">" + year + "</option>"
                        );
                        $("#yearAdjustment").selectpicker("refresh");
                    }

                    $("#employeeName")
                        .find('[value="' + empIds + '"]')
                        .remove();
                    $("#employeeName").selectpicker("refresh");
                    let inputId = [
                        "#employeeName",
                        "#employeeId",
                        "#positionCode",
                        "#officeCode",
                        "#positionId",
                        "#status",
                        "#positionName",
                        "#itemNo",
                        "#salaryGrade",
                        "#stepNo",
                        "#previousYear",
                        "#salaryPrevious",
                        "#salaryNew",
                        "#salaryDifference",
                        "#remarks",
                    ];
                    $.each(inputId, function (index, value) {
                        $(`${value}`).val("");
                    });

                    $("#employeeName").val("Please Select").trigger("change");
                    const errorClass = [
                        "#dateAdjustment",
                        ".employeeName  .dropdown",
                        "#itemNo",
                        "#positionName",
                        "#salaryGrade",
                        "#stepNo",
                        "#salaryPrevious",
                        "#salaryNew",
                        "#salaryDifference",
                    ];
                    $.each(errorClass, function (index, value) {
                        $(`${value}`).removeClass("is-invalid");
                    });
                    const errorMessage = [
                        "#date-adjustment-error-message",
                        "#employee-error-message",
                        "#item-no-error-message",
                        "#position-error-message",
                        "#salary-grade-error-message",
                        "#step-no-error-message",
                        "#salary-previous-error-message",
                        "#salary-new-error-message",
                        "#salary-difference-error-message",
                    ];
                    $.each(errorMessage, function (index, value) {
                        $(`${value}`).html("");
                    });
                    $("#salaryAdjustment").DataTable().ajax.reload();
                    swal("Sucessfully Added!", "", "success");
                    $("#saveBtn").attr("disabled", false);
                    $("#loading").addClass("d-none");
                    document.getElementById("saving").innerHTML = "Save";
                }
            },
            error: function (response) {
                if (response.status === 422) {
                    let errors = response.responseJSON.errors;
                    if (errors.hasOwnProperty("employeeName")) {
                        $(".employeeName .dropdown").addClass("is-invalid");
                        $("#employee-error-message").html("");
                        $("#employee-error-message").append(
                            `<span>${errors.employeeName[0]}</span>`
                        );
                    } else {
                        $(".employeeName .dropdown").removeClass("is-invalid");
                        $("#employee-error-message").html("");
                    }
                    if (errors.hasOwnProperty("salaryNew")) {
                        $("#salaryNew").addClass("is-invalid");
                        $("#salary-new-error-message").html("");
                        $("#salary-new-error-message").append(
                            `<span>${errors.salaryNew[0]}</span>`
                        );
                    } else {
                        $("#salaryNew").removeClass("is-invalid");
                        $("#salary-new-error-message").html("");
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
                    document.getElementById("saving").innerHTML = "Save";
                }
            },
        });
    });
});

$(document).ready(function () {
    $("#currentSgyear").change(function () {
        let salaryGrade = $("#salaryGrade").val();
        let stepNo = $("#stepNo").val();
        let currentSgyear = $("#currentSgyear").val();
        $.ajax({
            url: `/api/salaryAdjustment/${salaryGrade}/${stepNo}/${currentSgyear}`,
            success: (response) => {
                if (response == "") {
                    $("#salaryNew").val("");
                } else {
                    let currentSalaryAmount = response["sg_step" + stepNo];
                    $("#salaryNew").val(currentSalaryAmount);

                    var amount = parseFloat($("#salaryPrevious").val());
                    var amount2 = parseFloat($("#salaryNew").val());
                    var amountDifference = amount2 - amount;
                    $("#salaryDifference").val(amountDifference.toFixed(2));
                }
            },
        });
    });
});

$(document).keyup(function () {
    var salaryPrevious = parseFloat($("#salaryPrevious").val());
    var salaryNew = parseFloat($("#salaryNew").val());
    let total = salaryNew - salaryPrevious;
    $("#salaryDifference").val(total.toFixed(2));
});

$(document).ready(function () {
    $("#cancelbutton1").click(function () {
        $("#add").attr("class", "page-header d-none");
        $("#table").attr("class", "page-header");
        let inputId = [
            "#employeeName",
            "#employeeId",
            "#positionCode",
            "#officeCode",
            "#positionId",
            "#status",
            "#positionName",
            "#itemNo",
            "#salaryGrade",
            "#stepNo",
            "#previousYear",
            "#salaryPrevious",
            "#salaryNew",
            "#salaryDifference",
            "#remarks",
        ];
        $.each(inputId, function (index, value) {
            $(`${value}`).val("");
        });
        $("#employeeName").val("Please Select").trigger("change");
        const errorClass = [
            "#dateAdjustment",
            ".employeeName .dropdown",
            "#itemNo",
            "#positionName",
            "#salaryGrade",
            "#stepNo",
            "#salaryPrevious",
            "#salaryNew",
            "#salaryDifference",
        ];
        $.each(errorClass, function (index, value) {
            $(`${value}`).removeClass("is-invalid");
        });
        const errorMessage = [
            "#date-adjustment-error-message",
            "#employee-error-message",
            "#item-no-error-message",
            "#position-error-message",
            "#salary-grade-error-message",
            "#step-no-error-message",
            "#salary-previous-error-message",
            "#salary-new-error-message",
            "#salary-difference-error-message",
        ];
        $.each(errorMessage, function (index, value) {
            $(`${value}`).html("");
        });
    });
});

///reset
function myFunction() {
    const select = [
        "#itemNo",
        "#positionName",
        "#salaryGrade",
        "#stepNo",
        "#salaryPrevious",
        "#salaryNew",
        "#salaryDifference",
    ];
    $.each(select, function (index, value) {
        $(`${value}`).val("");
    });
    $("#employeeName").val("Please Select").trigger("change");
}

function clickme() {
    $("#employee-error-message").html("");
    $(".employeeName .dropdown").removeClass("is-invalid");
    $("#salary-new-error-message").html("");
    $("#salaryNew").removeClass("is-invalid");
}
