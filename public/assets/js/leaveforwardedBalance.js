//PAGE ON LOAD
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
$(document).ready(function () {
    $("#date_forwarded").val(dateNow());
});

// const leaveInputs = [
//     "vl_earned",
//     "sl_earned",
//     "vl_used",
//     "sl_used",
// ];

// $.each(leaveInputs, function(index, value) {
//     $(`#${value}`).keyup( function (e) {
//         let vl_earned = e.target.value;
//         if(vl_earned == ""){
//             //nothing happens
//         }else{
//             $(`.${value}`).removeClass("is-invalid");
//             $(`.${value}`).addClass("is-valid");
//             $(`#${value}-error-message`).html("");
//         }
//     });
// });

let vl_balance = document.querySelector("#vl_balance");
let sl_balance = document.querySelector("#sl_balance");

let update_vl_balance = document.querySelector("#update_vl_balance");
let update_sl_balance = document.querySelector("#update_sl_balance");

// SHOWS THE DATA VALUE IN INPUT INCLUDING THE PHOTO OF THE EMPLOYEE
$("#Employee_id").change(function (e) {
    let employeeID = e.target.value;
    let [selectedItem] = $("#Employee_id option:selected");

    let employeeOffice = selectedItem.getAttribute("data-office") || "";
    let employeePosition = selectedItem.getAttribute("data-position") || "";
    let photo = selectedItem.getAttribute("data-photo") || "";
    let employeeId = selectedItem.getAttribute("data-employeeId") || "";

    $("#office").val(employeeOffice);
    $("#position").val(employeePosition);
    if (employeeID == "") {
        $("#empPhoto").attr("src", "/assets/img/profiles/no_image.png");
    } else {
        $(".Employee_id").removeClass("is-invalid");
        $(".Employee_id").addClass("is-valid");
        $("#Employee_id-error-message").html("");
        $("#empPhoto").attr("src", `/assets/img/profiles/${employeeID}.jpg`);
    }
    $("#employeeId").val(employeeId);
});

$("#btnSave").click((e) => {
    e.preventDefault();
    let data = $("#forwardedBalance").serialize();

    $.ajax({
        url: "/employee/leave-forwarded-balance",
        method: "POST",
        data: data,
        success: function (response) {
            if (response.success) {
                swal("", "Successfully added!", "success", {
                    closeOnClickOutside: false,
                    timer: 1000,
                    button: false,
                });
                $("#btnBack").trigger("click");
                $("#forwarded-balance-table").DataTable().ajax.reload();
            }
        },
        error: function (response) {
            if (response.status === 422) {
                let errors = response.responseJSON.errors;
                const inputNames = [
                    "Employee_id",
                    "date_forwarded",
                    "vl_balance",
                    "sl_balance",
                    // "vawc_balance",
                    // "adopt_balance",
                    // "mandatory_balance",
                    // "maternity_balance",
                    // "paternity_balance",
                    // "soloparent_balance",
                    // "emergency_balance",
                    // "slb_balance",
                    // "study_balance",
                    // "spl_balance",
                    // "rehab_balance",
                ];
                $.each(inputNames, function (index, value) {
                    if (errors.hasOwnProperty(value)) {
                        $(`.${value}`).addClass("is-invalid");
                        $(`#${value}-error-message`).html("");
                        $(`#${value}-error-message`).append(
                            `${errors[value][0]}`
                        );
                    } else {
                        $(`.${value}`).removeClass("is-invalid");
                        $(`#${value}-error-message`).html("");
                    }
                });
            }
        },
    });
});

$(document).on("click", "#btnUpdate", function (e) {
    e.preventDefault();
    leaveID = $(this).attr("data-id");

    let data = $("#forwardedBalance").serialize();
    $.ajax({
        url: `/employee/leave-forwarded-balance/${leaveID}`,
        method: "PUT",
        data: data,
        success: function (response) {
            if (response.success) {
                swal("", "Successfully updated!", "success", {
                    closeOnClickOutside: false,
                    timer: 1000,
                    button: false,
                });
                $("#btnBack").trigger("click");
                $("#forwarded-balance-table").DataTable().ajax.reload();
            }
        },
        error: function (response) {
            if (response.status === 422) {
                let errors = response.responseJSON.errors;
                const inputNames = [
                    "date_forwarded",
                    "vl_balance",
                    "sl_balance",
                    // "vawc_balance",
                    // "adopt_balance",
                    // "mandatory_balance",
                    // "maternity_balance",
                    // "paternity_balance",
                    // "soloparent_balance",
                    // "emergency_balance",
                    // "slb_balance",
                    // "study_balance",
                    // "spl_balance",
                    // "rehab_balance",
                ];
                $.each(inputNames, function (index, value) {
                    if (errors.hasOwnProperty(value)) {
                        $(`.${value}`).addClass("is-invalid");
                        $(`#${value}-error-message`).html("");
                        $(`#${value}-error-message`).append(
                            `${errors[value][0]}`
                        );
                    } else {
                        $(`.${value}`).removeClass("is-invalid");
                        $(`#${value}-error-message`).html("");
                    }
                });
            }
        },
    });
});

// TRANSITION OF FORM TO TABLE
$("#addBtn").click(() => {
    let Employee_id = "";
    $("#Employee_id")
        .val(Employee_id)
        .trigger("change")
        .prop("disabled", false);
    $("#forwardedBalanceTable, #btnUpdate, #update_btnDelete").addClass(
        "d-none"
    );
    $("#forwardedBalanceCard, #btnSave").removeClass("d-none");
    $(
        "#Employee_id-error-message, #date_forwarded-error-message, #vl_earned-error-message"
    ).html("");
    $(
        "#sl_earned-error-message, #vl_used-error-message, #sl_used-error-message"
    ).html("");
    $("#date_forwarded, #vl_balance, #sl_balance, .Employee_id").removeClass(
        "is-invalid"
    );
    $("#date_forwarded, #vl_balance, #sl_balance, .Employee_id").removeClass(
        "is-valid"
    );
    $("#vl_balance, #sl_balance").val("");
});

$("#btnBack").click(() => {
    $("#forwardedBalanceTable").removeClass("d-none");
    $("#forwardedBalanceCard").addClass("d-none");
});

$(document).on("click", ".edit__leave__type", function () {
    leaveID = $(this).attr("data-id");
    $("#forwardedBalanceTable").addClass("d-none");
    $("#forwardedBalanceCard").removeClass("d-none");
    $("#btnViewTableContainer").removeClass("d-none");
    $("#btnSave").addClass("d-none");
    $("#btnUpdate").removeClass("d-none");
    $("#update_btnDelete").removeClass("d-none");
    $("#update_btnDelete").attr("data-id", leaveID);
    $("#btnUpdate").attr("data-id", leaveID);

    $("#leaveID").val(leaveID);

    // Ajax request for fetching leave type data.
    $.ajax({
        url: `/employee/leave-forwarded-balance/${leaveID}/edit`,
        success: function (leave) {
            // Collect data of form fields.
            $("#empPhoto").attr("src", "/storage/employee_images/sdslogo.jpg");
            $("#Employee_id")
                .val(leave.leaveRecord.Employee_id)
                .trigger("change");
            $("#Employee_id").prop("disabled", true);
            $("#vl_balance").val(leave.leaveRecord.vl_balance);
            $("#sl_balance").val(leave.leaveRecord.sl_balance);
            $("#vawc_balance").val(leave.leaveRecord.vawc_balance);
            $("#adopt_balance").val(leave.leaveRecord.adopt_balance);
            $("#mandatory_balance").val(leave.leaveRecord.mandatory_balance);
            $("#maternity_balance").val(leave.leaveRecord.maternity_balance);
            $("#paternity_balance").val(leave.leaveRecord.paternity_balance);
            $("#soloparent_balance").val(leave.leaveRecord.soloparent_balance);
            $("#emergency_balance").val(leave.leaveRecord.emergency_balance);
            $("#slb_balance").val(leave.leaveRecord.slb_balance);
            $("#study_balance").val(leave.leaveRecord.study_balance);
            $("#spl_balance").val(leave.leaveRecord.spl_balance);
            $("#rehab_balance").val(leave.leaveRecord.rehab_balance);
            $("#date_forwarded").val(
                formatDate(leave.leaveRecord.date_forwarded)
            );
        },
    });
});

$(document).on("click", "#update_btnDelete", function () {
    let leaveID = $(this).attr("data-id");

    swal({
        text: "Are you sure you want to delete this?",
        icon: "warning",
        buttons: ["No", "Yes"],
        dangerMode: true,
        closeOnClickOutside: false,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: `/employee/leave-forwarded-balance/${leaveID}`,
                method: "POST",
                success: function (response) {
                    swal(
                        "",
                        "Successfully deleted a leave record.",
                        "success",
                        {
                            closeOnClickOutside: false,
                            timer: 1000,
                            button: false,
                        }
                    );
                    $("#btnBack").trigger("click");
                    $("#forwarded-balance-table").DataTable().ajax.reload();
                },
                error: function (response) {
                    console.log(response);
                },
            });
        }
    });
});

$(document).on("click", ".delete__leave__type", function () {
    let leaveID = $(this).attr("data-id");

    swal({
        text: "Are you sure you want to delete this?",
        icon: "warning",
        buttons: ["No", "Yes"],
        dangerMode: true,
        closeOnClickOutside: false,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: `/employee/leave-forwarded-balance/${leaveID}`,
                method: "POST",
                success: function (response) {
                    swal("", "Successfully delete a leave record.", "success", {
                        closeOnClickOutside: false,
                        timer: 1000,
                        button: false,
                    });
                    $("#forwarded-balance-table").DataTable().ajax.reload();
                },
                error: function (response) {
                    console.log(response);
                },
            });
        }
    });
});

//Function to get Current date
function dateNow() {
    var d = new Date(),
        month = "" + (d.getMonth() + 1),
        day = "" + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = "0" + month;
    if (day.length < 2) day = "0" + day;

    return [year, month, day].join("-");
}

function formatDate(date) {
    var d = new Date(date),
        month = "" + (d.getMonth() + 1),
        day = "" + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = "0" + month;
    if (day.length < 2) day = "0" + day;

    return [year, month, day].join("-");
}
