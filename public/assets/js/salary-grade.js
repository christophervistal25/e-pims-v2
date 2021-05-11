$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

// $("#sgStep1").on("keyup", function() {
//     var n = parseInt(
//         $(this)
//             .val()
//             .replace(/\D/g, ""),
//         10
//     );
//     $(this).val(n.toLocaleString());
// });

let date = new Date();
let year = date.getFullYear();
let myTable = $("#myTable").DataTable({
    processing: true,
    serverSide: true,
    pageLength: 35,
    lengthMenu: [35, 50, 75, 100],
    autoWidth: false,
    ajax: "/salary-grade-list",
    columns: [
        { data: "sg_no", name: "sg_no" },
        {
            data: "sg_step1",
            name: "sg_step1",
            render: $.fn.dataTable.render.number(",", ".", 2)
        },
        {
            data: "sg_step2",
            name: "sg_step2",
            render: $.fn.dataTable.render.number(",", ".", 2)
        },
        {
            data: "sg_step3",
            name: "sg_step3",
            render: $.fn.dataTable.render.number(",", ".", 2)
        },
        {
            data: "sg_step4",
            name: "sg_step4",
            render: $.fn.dataTable.render.number(",", ".", 2)
        },
        {
            data: "sg_step5",
            name: "sg_step5",
            render: $.fn.dataTable.render.number(",", ".", 2)
        },
        {
            data: "sg_step6",
            name: "sg_step6",
            render: $.fn.dataTable.render.number(",", ".", 2)
        },
        {
            data: "sg_step7",
            name: "sg_step7",
            render: $.fn.dataTable.render.number(",", ".", 2)
        },
        {
            data: "sg_step8",
            name: "sg_step8",
            render: $.fn.dataTable.render.number(",", ".", 2)
        },
        { data: "sg_year", name: "sg_year" },
        { data: "action", name: "action" }
    ]
});
myTable.columns(9).search(year);
myTable.draw();
function filter_year() {
    var filter_year = document.getElementById("filter_year").value;
    localStorage.setItem("salary_grade_filter_year", filter_year);
    var ls = localStorage.getItem("salary_grade_filter_year");
    myTable.columns(9).search(ls);
    myTable.draw();
}
// code for number only
$(function() {
    $("input").on("input", function(e) {
        $(this).val(
            $(this)
                .val()
                .replace(/[^0-9.]/g, "")
        );
    });
});
// code for show add form
$(document).ready(function() {
    $("#addbutton").click(function() {
        $("#add").attr("class", "page-header");
        $("#table").attr("class", "page-header d-none");
    });
});
// code for show table
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

$(document).ready(function() {
    $("#addbutton").click(function() {
        $("#message").attr("class", "page-header d-none");
    });
});

//// add new salary grade
$(document).ready(function() {
    $("#salaryGradeForm").submit(function(e) {
        e.preventDefault();
        let data = $(this).serialize();
        console.log(data);
        $("#saveBtn").attr("disabled", true);
        $("#loading").removeClass("d-none");
        $.ajax({
            type: "POST",
            url: "/salary-grade",
            data: data,
            success: function(response) {
                if (response.success) {
                    $("input").val("");
                    const select = ["#sgNo"];
                    $.each(select, function(index, value) {
                        $(`${value}`)
                            .val("Please Select")
                            .trigger("change");
                    });
                    const errorClass = [
                        "#sgNo",
                        "#sgStep1",
                        "#sgStep2",
                        "#sgStep3",
                        "#sgStep4",
                        "#sgStep5",
                        "#sgStep6",
                        "#sgStep7",
                        "#sgStep8",
                        "#sgYear"
                    ];
                    $.each(errorClass, function(index, value) {
                        $(`${value}`).removeClass("is-invalid");
                    });
                    const errorMessage = [
                        "#salary-grade-error-message",
                        "#salary-grade1-error-message",
                        "#salary-grade2-error-message",
                        "#salary-grade3-error-message",
                        "#salary-grade4-error-message",
                        "#salary-grade5-error-message",
                        "#salary-grade6-error-message",
                        "#salary-grade7-error-message",
                        "#salary-grade8-error-message",
                        "#salary-grade-year-error-message"
                    ];
                    $.each(errorMessage, function(index, value) {
                        $(`${value}`).html("");
                    });
                    $("#myTable")
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
                    if (errors.hasOwnProperty("sgNo")) {
                        $("#sgNo").addClass("is-invalid");
                        $("#salary-grade-error-message").html("");
                        $("#salary-grade-error-message").append(
                            `<span>${errors.sgNo[0]}</span>`
                        );
                    } else {
                        $("#sgNo").removeClass("is-invalid");
                        $("#salary-grade-error-message").html("");
                    }
                    if (errors.hasOwnProperty("sgStep1")) {
                        $("#sgStep1").addClass("is-invalid");
                        $("#salary-grade1-error-message").html("");
                        $("#salary-grade1-error-message").append(
                            `<span>${errors.sgStep1[0]}</span>`
                        );
                    } else {
                        $("#sgStep1").removeClass("is-invalid");
                        $("#salary-grade1-error-message").html("");
                    }
                    if (errors.hasOwnProperty("sgStep2")) {
                        $("#sgStep2").addClass("is-invalid");
                        $("#salary-grade2-error-message").html("");
                        $("#salary-grade2-error-message").append(
                            `<span>${errors.sgStep2[0]}</span>`
                        );
                    } else {
                        $("#sgStep2").removeClass("is-invalid");
                        $("#salary-grade2-error-message").html("");
                    }
                    if (errors.hasOwnProperty("sgStep3")) {
                        $("#sgStep3").addClass("is-invalid");
                        $("#salary-grade3-error-message").html("");
                        $("#salary-grade3-error-message").append(
                            `<span>${errors.sgStep3[0]}</span>`
                        );
                    } else {
                        $("#sgStep3").removeClass("is-invalid");
                        $("#salary-grade3-error-message").html("");
                    }
                    if (errors.hasOwnProperty("sgStep4")) {
                        $("#sgStep4").addClass("is-invalid");
                        $("#salary-grade4-error-message").html("");
                        $("#salary-grade4-error-message").append(
                            `<span>${errors.sgStep4[0]}</span>`
                        );
                    } else {
                        $("#sgStep4").removeClass("is-invalid");
                        $("#salary-grade4-error-message").html("");
                    }
                    if (errors.hasOwnProperty("sgStep5")) {
                        $("#sgStep5").addClass("is-invalid");
                        $("#salary-grade5-error-message").html("");
                        $("#salary-grade5-error-message").append(
                            `<span>${errors.sgStep5[0]}</span>`
                        );
                    } else {
                        $("#sgStep5").removeClass("is-invalid");
                        $("#salary-grade5-error-message").html("");
                    }
                    if (errors.hasOwnProperty("sgStep6")) {
                        $("#sgStep6").addClass("is-invalid");
                        $("#salary-grade6-error-message").html("");
                        $("#salary-grade6-error-message").append(
                            `<span>${errors.sgStep6[0]}</span>`
                        );
                    } else {
                        $("#sgStep6").removeClass("is-invalid");
                        $("#salary-grade6-error-message").html("");
                    }
                    if (errors.hasOwnProperty("sgStep7")) {
                        $("#sgStep7").addClass("is-invalid");
                        $("#salary-grade7-error-message").html("");
                        $("#salary-grade7-error-message").append(
                            `<span>${errors.sgStep7[0]}</span>`
                        );
                    } else {
                        $("#sgStep7").removeClass("is-invalid");
                        $("#salary-grade7-error-message").html("");
                    }
                    if (errors.hasOwnProperty("sgStep8")) {
                        $("#sgStep8").addClass("is-invalid");
                        $("#salary-grade8-error-message").html("");
                        $("#salary-grade8-error-message").append(
                            `<span>${errors.sgStep8[0]}</span>`
                        );
                    } else {
                        $("#sgStep8").removeClass("is-invalid");
                        $("#salary-grade8-error-message").html("");
                    }
                    if (errors.hasOwnProperty("sgYear")) {
                        $("#sgYear").addClass("is-invalid");
                        $("#salary-grade-year-error-message").html("");
                        $("#salary-grade-year-error-message").append(
                            `<span>${errors.sgYear[0]}</span>`
                        );
                    } else {
                        $("#sgYear").removeClass("is-invalid");
                        $("#salary-grade-year-error-message").html("");
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
                        title: "The given data is invalid!",
                        type: "error",
                        confirmButtonClass: "btn-primary",
                        confirmButtonText: "Ok"
                    });
                    $("#saveBtn").attr("disabled", false);
                    $("#loading").addClass("d-none");
                }
            }
        });
    });
});
