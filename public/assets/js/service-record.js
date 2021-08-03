// display records
$(function() {
    let table = $("#serviceRecords").DataTable({
        // processing: true,
        serverSide: true,
        destroy: true,
        retrieve: true,
        paging: false,
        info: false,
        bFilter: false,
        pagingType: "full_numbers",
        language: {
            processing:
                '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
        },
        ajax: {
            url: "/service-records-list",
            data: function(d) {
                d.employeeName = $("#employeeName").val();
            }
        },
        columns: [
            { data: "employee_id", name: "employee_id", visible: false },
            {
                data: "service_from_date",
                name: "service_from_date",
                visible: false
            },
            {
                data: "service_to_date",
                name: "service_to_date",
                visible: false
            },
            { data: "position_name", name: "position_name", visible: false },
            { data: "status", name: "status", visible: false },
            { data: "salary", name: "salary", visible: false },
            { data: "office_name", name: "office_name", visible: false },
            {
                data: "leave_without_pay",
                name: "leave_without_pay",
                visible: false
            },
            {
                data: "separation_date",
                name: "separation_date",
                visible: false
            },
            {
                data: "separation_cause",
                name: "separation_cause",
                visible: false
            },
            { data: "action", name: "action", visible: false }
        ]
    });
    $("#employeeName").change(function(e) {
        $("input, textarea").val("");
        $("#positionTitle")
            .val("Please Select")
            .trigger("change");
        $("#officeCode")
            .val("Please Select")
            .trigger("change");
        $("#status")
            .val("Please Select")
            .trigger("change");
        const errorClass = [
            "#fromDate",
            "#toDate",
            ".positionTitle .dropdown",
            ".statuss .dropdown",
            "#salary",
            ".officeCode .dropdown",
            "#leavePay",
            "#date",
            "#cause"
        ];
        $.each(errorClass, function(index, value) {
            $(`${value}`).removeClass("is-invalid");
        });
        const errorMessage = [
            "#from-date-error-message",
            "#to-date-error-message",
            "#position-title-error-message",
            "#status-error-message",
            "#salary-error-message",
            "#office-error-message",
            "#leave-pay-error-message",
            "#date-error-message",
            "#cause-error-message"
        ];
        $.each(errorMessage, function(index, value) {
            $(`${value}`).html("");
        });

        if (e.target.value == "" || e.target.value == "") {
            table.destroy();
            table = $("#serviceRecords").DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                retrieve: true,
                paging: false,
                info: false,
                bFilter: false,
                pagingType: "full_numbers",
                language: {
                    processing:
                        '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
                },
                ajax: {
                    url: "/service-records-list",
                    data: function(d) {
                        d.employeeName = $("#employeeName").val();
                    }
                },
                columns: [
                    {
                        data: "employee_id",
                        name: "employee_id",
                        visible: false
                    },
                    {
                        data: "service_from_date",
                        name: "service_from_date",
                        visible: false
                    },
                    {
                        data: "service_to_date",
                        name: "service_to_date",
                        visible: false
                    },
                    {
                        data: "position_name",
                        name: "position_name",
                        visible: false
                    },
                    { data: "status", name: "status", visible: false },
                    { data: "salary", name: "salary", visible: false },
                    {
                        data: "office_name",
                        name: "office_name",
                        visible: false
                    },
                    {
                        data: "leave_without_pay",
                        name: "leave_without_pay",
                        visible: false
                    },
                    {
                        data: "separation_date",
                        name: "separation_date",
                        visible: false
                    },
                    {
                        data: "separation_cause",
                        name: "separation_cause",
                        visible: false
                    },
                    { data: "action", name: "action", visible: false }
                ]
            });
        } else {
            table.destroy();
            table = $("#serviceRecords").DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                retrieve: true,
                pagingType: "full_numbers",
                language: {
                    processing:
                        '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
                },
                ajax: {
                    url: `/api/employee/service/records/${e.target.value}`,
                    data: function(d) {
                        d.employeeName = $("#employeeName").val();
                    }
                },
                columns: [
                    {
                        data: "employee_id",
                        name: "employee_id",
                        visible: false
                    },
                    { data: "service_from_date", name: "service_from_date" },
                    { data: "service_to_date", name: "service_to_date" },
                    { data: "position_name", name: "position_name" },
                    { data: "status", name: "status" },
                    {
                        data: "salary",
                        name: "salary",
                        render: $.fn.dataTable.render.number(",", ".", 2)
                    },
                    { data: "office_name", name: "office_name" },
                    { data: "leave_without_pay", name: "leave_without_pay" },
                    { data: "separation_date", name: "separation_date" },
                    {
                        data: "separation_cause",
                        name: "separation_cause"
                    },
                    { data: "action", name: "action" }
                ]
            });
            let count = 1;
            let interval = setInterval(printStatus, 1000);
            function printStatus() {
                let table_data = $("#serviceRecords > tbody > tr > td").text();
                if (table_data == "No data available in table") {
                    document
                        .getElementById("printPreview")
                        .setAttribute("style", "visibility:hidden;");
                    document
                        .getElementById("printPreviewA")
                        .removeAttribute("href");
                    document
                        .getElementById("printPreview")
                        .setAttribute("disabled", true);
                } else {
                    document
                        .getElementById("printPreview")
                        .setAttribute("style", "visibility:visible;");
                    document
                        .getElementById("printPreview")
                        .removeAttribute("disabled");
                }
                if (count >= 20) {
                    clearInterval(interval);
                }
                count++;
            }
        }
    });
});

// code for show add form
$(document).ready(function() {
    $("#addbutton").click(function() {
        $("#add").attr("class", "page-header");
        $("#table").attr("class", "page-header d-none");
    });
});
////confirmation in delete
function myFunction() {
    if (!confirm("Are You Sure to delete this")) event.preventDefault();
}
// {{-- code for show table --}}
$(document).ready(function() {
    $("#cancelbutton").click(function() {
        $("#add").attr("class", "page-header d-none");
        $("#table").attr("class", "page-header");
    });
});
////disable button
function ValidateDropDown(dd) {
    var input = document.getElementById("addbutton");
    if (dd.value == "") input.disabled = true;
    else input.disabled = false;
    if (dd.value == "") {
        document.getElementById("line").style.visibility = "visible";
        document
            .getElementById("printPreview")
            .setAttribute("style", "visibility:hidden;");
        document.getElementById("printPreviewA").removeAttribute("href");
        document.getElementById("printPreview").setAttribute("disabled", true);
    } else {
        document
            .getElementById("printPreviewA")
            .setAttribute("href", "print-service-records/" + dd.value);
        document.getElementById("line").style.visibility = "hidden";
    }
    $("input, textarea").val("");
    const select = ["#positionTitle", "#status", "#officeCode"];
    $.each(select, function(index, value) {
        $(`${value}`)
            .val("Please Select")
            .trigger("change");
    });
}

// get value namesss
$(document).ready(function() {
    $("#employeeName").change(function(e) {
        let employeeID = e.target.value;
        let plantilla = $($("#employeeName option:selected")[0]).attr(
            "data-plantilla"
        );
        if (plantilla) {
            plantilla = JSON.parse(plantilla);
            document.getElementById("employeeTitleName").innerHTML =
                plantilla.firstname +
                " " +
                plantilla.middlename +
                ". " +
                plantilla.lastname;
            $("#employeeId").val(plantilla.employee_id);
        } else {
            $("#employeeId").val("");
        }
    });
});
//// add salary adjustment
$(document).ready(function() {
    $("#serviceRecordForm").submit(function(e) {
        e.preventDefault();
        let data = $(this).serialize();
        $("#saveBtn").attr("disabled", true);
        $("#loading").removeClass("d-none");
        $.ajax({
            type: "POST",
            url: "/service-records",
            data: data,
            success: function(response) {
                if (response.success) {
                    $("input, textarea").val("");
                    $("#positionTitle")
                        .val("Please Select")
                        .trigger("change");
                    $("#officeCode")
                        .val("Please Select")
                        .trigger("change");
                    $("#status")
                        .val("Please Select")
                        .trigger("change");
                    const errorClass = [
                        "#fromDate",
                        "#toDate",
                        ".positionTitle .dropdown",
                        ".statuss .dropdown",
                        "#salary",
                        ".officeCode .dropdown",
                        "#leavePay",
                        "#date",
                        "#cause"
                    ];
                    $.each(errorClass, function(index, value) {
                        $(`${value}`).removeClass("is-invalid");
                    });
                    const errorMessage = [
                        "#from-date-error-message",
                        "#to-date-error-message",
                        "#position-title-error-message",
                        "#status-error-message",
                        "#salary-error-message",
                        "#office-error-message",
                        "#leave-pay-error-message",
                        "#date-error-message",
                        "#cause-error-message"
                    ];
                    $.each(errorMessage, function(index, value) {
                        $(`${value}`).html("");
                    });
                    $("#serviceRecords")
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
                    if (errors.hasOwnProperty("fromDate")) {
                        $("#fromDate").addClass("is-invalid");
                        $("#from-date-error-message").html("");
                        $("#from-date-error-message").append(
                            `<span>${errors.fromDate[0]}</span>`
                        );
                    } else {
                        $("#fromDate").removeClass("is-invalid");
                        $("#from-date-error-message").html("");
                    }
                    if (errors.hasOwnProperty("toDate")) {
                        $("#toDate").addClass("is-invalid");
                        $("#to-date-error-message").html("");
                        $("#to-date-error-message").append(
                            `<span>${errors.toDate[0]}</span>`
                        );
                    } else {
                        $("#toDate").removeClass("is-invalid");
                        $("#to-date-error-message").html("");
                    }
                    if (errors.hasOwnProperty("positionTitle")) {
                        $(".positionTitle .dropdown").addClass("is-invalid");
                        $("#position-title-error-message").html("");
                        $("#position-title-error-message").append(
                            `<span>${errors.positionTitle[0]}</span>`
                        );
                    } else {
                        $(".positionTitle .dropdown").removeClass("is-invalid");
                        $("#position-title-error-message").html("");
                    }
                    if (errors.hasOwnProperty("status")) {
                        $(".statuss .dropdown").addClass("is-invalid");
                        $("#status-error-message").html("");
                        $("#status-error-message").append(
                            `<span>${errors.status[0]}</span>`
                        );
                    } else {
                        $(".statuss .dropdown").removeClass("is-invalid");
                        $("#status-error-message").html("");
                    }
                    if (errors.hasOwnProperty("salary")) {
                        $("#salary").addClass("is-invalid");
                        $("#salary-error-message").html("");
                        $("#salary-error-message").append(
                            `<span>${errors.salary[0]}</span>`
                        );
                    } else {
                        $("#salary").removeClass("is-invalid");
                        $("#salary-error-message").html("");
                    }
                    if (errors.hasOwnProperty("officeCode")) {
                        $(".officeCode .dropdown").addClass("is-invalid");
                        $("#office-error-message").html("");
                        $("#office-error-message").append(
                            `<span>${errors.officeCode[0]}</span>`
                        );
                    } else {
                        $(".officeCode .dropdown").removeClass("is-invalid");
                        $("#office-error-message").html("");
                    }
                    if (errors.hasOwnProperty("leavePay")) {
                        $("#leavePay").addClass("is-invalid");
                        $("#leave-pay-error-message").html("");
                        $("#leave-pay-error-message").append(
                            `<span>${errors.leavePay[0]}</span>`
                        );
                    } else {
                        $("#leavePay").removeClass("is-invalid");
                        $("#leave-pay-error-message").html("");
                    }
                    if (errors.hasOwnProperty("date")) {
                        $("#date").addClass("is-invalid");
                        $("#date-error-message").html("");
                        $("#date-error-message").append(
                            `<span>${errors.date[0]}</span>`
                        );
                    } else {
                        $("#date").removeClass("is-invalid");
                        $("#date-error-message").html("");
                    }
                    if (errors.hasOwnProperty("cause")) {
                        $("#cause").addClass("is-invalid");
                        $("#cause-error-message").html("");
                        $("#cause-error-message").append(
                            `<span>${errors.cause[0]}</span>`
                        );
                    } else {
                        $("#cause").removeClass("is-invalid");
                        $("#cause-error-message").html("");
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

$(document).ready(function() {
    $("#cancelbutton1").click(function() {
        $("#add").attr("class", "page-header d-none");
        $("#table").attr("class", "page-header");
    });
});
function myFunction() {
    $("input, textarea").val("");
    $("#positionTitle")
        .val("Please Select")
        .trigger("change");
    $("#officeCode")
        .val("Please Select")
        .trigger("change");
    $("#status")
        .val("Please Select")
        .trigger("change");
    const errorClass = [
        "#fromDate",
        "#toDate",
        ".positionTitle .dropdown",
        ".statuss .dropdown",
        "#salary",
        ".officeCode .dropdown",
        "#leavePay",
        "#date",
        "#cause"
    ];
    $.each(errorClass, function(index, value) {
        $(`${value}`).removeClass("is-invalid");
    });
    const errorMessage = [
        "#from-date-error-message",
        "#to-date-error-message",
        "#position-title-error-message",
        "#status-error-message",
        "#salary-error-message",
        "#office-error-message",
        "#leave-pay-error-message",
        "#date-error-message",
        "#cause-error-message"
    ];
    $.each(errorMessage, function(index, value) {
        $(`${value}`).html("");
    });
}
