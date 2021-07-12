$(function() {
    let table = $("#plantilla").DataTable({
        processing: true,
        serverSide: true,
        ajax: "/plantilla-list",
        columns: [
            {
                data: "employee",
                name: "employee.firstname",
                searchable: true,
                sortable: false,
                visible: true
            },
            {
                data: "plantillaPosition",
                name: "plantillaPosition",
                searchable: true,
                sortable: false,
                visible: true
            },
            {
                data: "office",
                name: "office.office_short_name",
                searchable: true,
                sortable: false,
                visible: true
            },
            { data: "item_no", name: "item_no" },
            { data: "status", name: "status", sortable: false },
            {
                data: "action",
                name: "action",
                searchable: false,
                sortable: false
            }
        ]
    });

    $("#employeeOffice").change(function(e) {
        if (e.target.value == "" || e.target.value == "") {
            table.destroy();
            table = $("#plantilla").DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                retrieve: true,
                ajax: {
                    url: "/plantilla-list"
                },
                columns: [
                    {
                        data: "employee",
                        name: "employee.firstname",
                        searchable: true,
                        sortable: false,
                        visible: true
                    },
                    {
                        data: "plantillaPosition",
                        name: "plantillaPosition",
                        searchable: true,
                        sortable: false,
                        visible: true
                    },
                    {
                        data: "office",
                        name: "office.office_short_name",
                        searchable: true,
                        sortable: false,
                        visible: true
                    },
                    { data: "item_no", name: "item_no" },
                    { data: "status", name: "status", sortable: false },
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
            table = $("#plantilla").DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                retrieve: true,
                ajax: {
                    url: `/api/plantilla/personnel/${e.target.value}`
                },
                columns: [
                    {
                        data: "employee",
                        name: "employee.firstname",
                        searchable: true,
                        sortable: false,
                        visible: true
                    },
                    {
                        data: "plantillaPosition",
                        name: "plantillaPosition",
                        searchable: true,
                        sortable: false,
                        visible: true
                    },
                    {
                        data: "office",
                        name: "office.office_short_name",
                        searchable: true,
                        sortable: false,
                        visible: true
                    },
                    { data: "item_no", name: "item_no" },
                    { data: "status", name: "status", sortable: false },
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
// code for show add form
// $(document).ready(function() {
//     $("#addbutton").click(function() {
//         $("#add").attr("class", "page-header");
//         $("#table").attr("class", "page-header d-none");
//     });
// });
// {{-- code for show table --}}
// $(document).ready(function() {
//     $("#cancelbutton").click(function() {
//         $("#add").attr("class", "page-header d-none");
//         $("#table").attr("class", "page-header");
//     });
// });
// {{-- code for number only --}}
$(function() {
    $("input[id='oldItemNo']").on("input", function(e) {
        $(this).val(
            $(this)
                .val()
                .replace(/[^0-9.]/g, "")
        );
    });
});
$(function() {
    $("input[id='itemNo']").on("input", function(e) {
        $(this).val(
            $(this)
                .val()
                .replace(/[^0-9.]/g, "")
        );
    });
});
//  position display salary grade
$(document).ready(function() {
    $("#positionTitle").change(function() {
        let positionTitle = $("#positionTitle").val();
        let currentStepno = $("#currentStepno").val();
        $.ajax({
            url: `/api/positionSalaryGrade/${positionTitle}`,
            success: response => {
                if (response == "") {
                    $("#currentSalarygrade").val("");
                    $("#itemNo").val("");
                    $("#currentSalaryamount").val("");
                } else {
                    let currentSalaryGrade = response.salary_grade.sg_no;
                    $("#currentSalarygrade").val(currentSalaryGrade);
                    let currentItemNo = response.item_no;
                    $("#itemNo").val(currentItemNo);
                    let currentSalaryAmount =
                        response.salary_grade["sg_step" + currentStepno];
                    $("#currentSalaryamount").val(currentSalaryAmount);
                }
            }
        });
    });
});
//  filter position by office
$(document).ready(function() {
    $("#officeCode").change(function(e) {
        //plantillaPositionMetaData
        if (
            document.querySelectorAll('[id="plantillaPositionMetaData"]')[1] ==
            null
        ) {
            var plantillaMetaData = document
                .querySelectorAll('[id="plantillaPositionMetaData"]')[0]
                .content.replaceAll("|", '"');
        } else {
            var plantillaMetaData = document
                .querySelectorAll('[id="plantillaPositionMetaData"]')[1]
                .content.replaceAll("|", '"');
        }
        var plantillaMetaDataRemoveLast =
            "[" +
            plantillaMetaData.substring(0, plantillaMetaData.length - 2) +
            "]";
        let plantillaPositionOptionAll = JSON.parse(
            plantillaMetaDataRemoveLast
        );
        //positionMetaData
        if (document.querySelectorAll('[id="positionMetaData"]')[1] == null) {
            var metaData = document
                .querySelectorAll('[id="positionMetaData"]')[0]
                .content.replaceAll("|", '"');
        } else {
            var metaData = document
                .querySelectorAll('[id="positionMetaData"]')[1]
                .content.replaceAll("|", '"');
        }
        var metaDataRemoveLast =
            "[" + metaData.substring(0, metaData.length - 2) + "]";
        let positionOptionAll = JSON.parse(metaDataRemoveLast);
        let officeCode = e.target.value;
        //filter all position data in plantilla//
        let plantillaPositionIdFilter = plantillaPositionOptionAll.filter(
            function(position) {
                return position.officeCode == officeCode;
            }
        );
        //Remove all option in #positionTitle//
        function removeOptionsPosition(selectPosition) {
            var ii,
                L = selectPosition.options.length - 1;
            for (ii = L; ii >= 0; ii--) {
                selectPosition.remove(ii);
            }
        }
        removeOptionsPosition(document.getElementById("positionTitle"));
        //add position data based in what you select in #officeCode//
        var i,
            plantillaLengthPositionId = plantillaPositionIdFilter.length;
        $("#positionTitle").append("<option></option>");
        for (i = 0; i < plantillaLengthPositionId; i++) {
            var plantillaPositionIdFilter_final = plantillaPositionIdFilter[i];
            //filter all position data//
            let positionIdFilter = positionOptionAll.filter(function(position) {
                return (
                    position.positionId ==
                    plantillaPositionIdFilter_final.positionId
                );
            });
            $("#positionTitle").append(
                '<option value="' +
                    plantillaPositionIdFilter_final.ppId +
                    '">' +
                    positionIdFilter[0].positionName +
                    "</option>"
            );
        }
        $("#positionTitle").selectpicker("refresh");

        //divisionMetaData
        if (document.querySelectorAll('[id="divisionMetaData"]')[1] == null) {
            var divisionMetaData = document
                .querySelectorAll('[id="divisionMetaData"]')[0]
                .content.replaceAll("|", '"');
        } else {
            var divisionMetaData = document
                .querySelectorAll('[id="divisionMetaData"]')[1]
                .content.replaceAll("|", '"');
        }
        var divisionMetaDataRemoveLast =
            "[" +
            divisionMetaData.substring(0, divisionMetaData.length - 2) +
            "]";
        let divisionOfficeCodeOptionAll = JSON.parse(
            divisionMetaDataRemoveLast
        );

        if (document.querySelectorAll('[id="divisionMetaData"]')[1] == null) {
            var metaDataDivision = document
                .querySelectorAll('[id="divisionMetaData"]')[0]
                .content.replaceAll("|", '"');
        } else {
            var metaDataDivision = document
                .querySelectorAll('[id="divisionMetaData"]')[1]
                .content.replaceAll("|", '"');
        }
        var metaDataDivisionRemoveLast =
            "[" +
            metaDataDivision.substring(0, metaDataDivision.length - 2) +
            "]";
        let divisionOptionAll = JSON.parse(metaDataDivisionRemoveLast);
        let officeCode2 = e.target.value;
        //filter all division data in plantilla//
        let plantillaDivisionFilter = divisionOfficeCodeOptionAll.filter(
            function(Division) {
                return Division.officeCode == officeCode2;
            }
        );
        //Remove all option in #divisionId//
        function removeOptionsDivision(selectDivision) {
            var ii,
                L = selectDivision.options.length - 1;
            for (ii = L; ii >= 0; ii--) {
                selectDivision.remove(ii);
            }
        }
        removeOptionsDivision(document.getElementById("divisionId"));
        //add division data based in what you select in #officeCode//
        var i,
            plantillaLengthDivisionId = plantillaDivisionFilter.length;
        $("#divisionId").append("<option></option>");
        for (i = 0; i < plantillaLengthDivisionId; i++) {
            var plantillaDivisionFilter_final = plantillaDivisionFilter[i];
            //filter all position data//
            let divisionIdFilter = divisionOptionAll.filter(function(Division) {
                return (
                    Division.officeCode ==
                    plantillaDivisionFilter_final.officeCode
                );
            });
            $("#divisionId").append(
                '<option value="' +
                    divisionIdFilter[i].divisionId +
                    '">' +
                    divisionIdFilter[i].divisionName +
                    "</option>"
            );
        }
        $("#divisionId").selectpicker("refresh");
    });
});

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function() {
    $("#currentSalarygrade").change(function() {
        let currentSalarygrade = $("#currentSalarygrade").val();
        let currentStepno = $("#currentStepno").val();
        let currentSgyear = $("#currentSgyear").val();
        $.ajax({
            url: `/api/salarySteplist/${currentSalarygrade}/${currentStepno}/${currentSgyear}`,
            success: response => {
                if (response == "") {
                    $("#currentSalaryamount").val("No Data");
                } else {
                    let currentSalaryAmount =
                        response["sg_step" + currentStepno];
                    $("#currentSalaryamount").val(currentSalaryAmount);
                }
            }
        });
    });
    $("#currentStepno").change(function() {
        let currentSalarygrade = $("#currentSalarygrade").val();
        let currentStepno = $("#currentStepno").val();
        let currentSgyear = $("#currentSgyear").val();
        $.ajax({
            url: `/api/salarySteplist/${currentSalarygrade}/${currentStepno}/${currentSgyear}`,
            success: response => {
                if (response == "") {
                    $("#currentSalaryamount").val("No Data");
                } else {
                    let currentSalaryAmount =
                        response["sg_step" + currentStepno];
                    $("#currentSalaryamount").val(currentSalaryAmount);
                }
            }
        });
    });
    $("#currentSgyear").change(function() {
        let currentSalarygrade = $("#currentSalarygrade").val();
        let currentStepno = $("#currentStepno").val();
        let currentSgyear = $("#currentSgyear").val();
        $.ajax({
            url: `/api/salarySteplist/${currentSalarygrade}/${currentStepno}/${currentSgyear}`,
            success: response => {
                if (response == "") {
                    $("#currentSalaryamount").val("No Data");
                } else {
                    let currentSalaryAmount =
                        response["sg_step" + currentStepno];
                    $("#currentSalaryamount").val(currentSalaryAmount);
                }
            }
        });
    });
});

//// add new plantilla
$(document).ready(function() {
    $("#plantillaForm").submit(function(e) {
        e.preventDefault();
        let empIds = $("#employeeName").val();
        let positionIds = $("#positionTitle").val();
        let data = $(this).serialize();
        $("#saveBtn").attr("disabled", true);
        $("#loading").removeClass("d-none");
        $.ajax({
            type: "POST",
            url: "/plantilla-of-personnel",
            data: data,
            success: function(response) {
                if (response.success) {
                    $("#employeeName")
                        .find('[value="' + empIds + '"]')
                        .remove();
                    $("#employeeName").selectpicker("refresh");

                    $("#positionTitle")
                        .find('[value="' + positionIds + '"]')
                        .remove();
                    $("#positionTitle").selectpicker("refresh");

                    $("input").val("");
                    const select = [
                        "#salaryGrade",
                        "#positionTitle",
                        "#currentStepno",
                        "#employeeName",
                        "#officeCode",
                        "#divisionId",
                        "#status"
                    ];
                    $.each(select, function(index, value) {
                        $(`${value}`)
                            .val("Please Select")
                            .trigger("change");
                    });
                    const errorClass = [
                        "#itemNo",
                        "#oldItemNo",
                        "#positionTitle",
                        "#originalAppointment",
                        "#lastPromotion",
                        "#status",
                        "#areaCode",
                        "#areaType",
                        "#areaLevel",
                        "#employeeName",
                        "#salaryGrade",
                        "#stepNo",
                        "#currentSalaryamount",
                        "#officeCode",
                        "#divisionId"
                    ];
                    $.each(errorClass, function(index, value) {
                        $(`${value}`).removeClass("is-invalid");
                    });
                    const errorMessage = [
                        "#item-no-error-message",
                        "#old_item-no-error-message",
                        "#position-title-error-message",
                        "#original-appointment-error-message",
                        "#last-promotion-error-message",
                        "#status-error-message",
                        "#area-code-error-message",
                        "#area-type-error-message",
                        "#area-level-error-message",
                        "#employee-name-error-message",
                        "#salary-grade-error-message",
                        "#steps-error-message",
                        "#salary-amount-error-message",
                        "#office-error-message",
                        "#division-error-message"
                    ];
                    $.each(errorMessage, function(index, value) {
                        $(`${value}`).html("");
                    });
                    $("#plantilla")
                        .DataTable()
                        .ajax.reload();
                    swal("Sucessfully Added!", "", "success");
                    $("#saveBtn").attr("disabled", false);
                    $("#loading").addClass("d-none");
                    $(document).ready(function() {
                        $("#plantillaPositionMetaData").load(
                            "#plantillaPositionMetaData > #plantillaPositionMetaData"
                        );
                        $("#positionMetaData").load(
                            "#positionMetaData > #positionMetaData"
                        );
                    });
                }
            },
            error: function(response) {
                if (response.status === 422) {
                    let errors = response.responseJSON.errors;
                    if (errors.hasOwnProperty("itemNo")) {
                        $("#itemNo").addClass("is-invalid");
                        $("#item-no-error-message").html("");
                        $("#item-no-error-message").append(
                            `<span>${errors.itemNo[0]}</span>`
                        );
                    } else {
                        $("#itemNo").removeClass("is-invalid");
                        $("#item-no-error-message").html("");
                    }
                    if (errors.hasOwnProperty("oldItemNo")) {
                        $("#oldItemNo").addClass("is-invalid");
                        $("#old_item-no-error-message").html("");
                        $("#old_item-no-error-message").append(
                            `<span>${errors.oldItemNo[0]}</span>`
                        );
                    } else {
                        $("#oldItemNo").removeClass("is-invalid");
                        $("#old_item-no-error-message").html("");
                    }
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
                    if (errors.hasOwnProperty("originalAppointment")) {
                        $("#originalAppointment").addClass("is-invalid");
                        $("#original-appointment-error-message").html("");
                        $("#original-appointment-error-message").append(
                            `<span>${errors.originalAppointment[0]}</span>`
                        );
                    } else {
                        $("#originalAppointment").removeClass("is-invalid");
                        $("#original-appointment-error-message").html("");
                    }
                    if (errors.hasOwnProperty("lastPromotion")) {
                        $("#lastPromotion").addClass("is-invalid");
                        $("#last-promotion-error-message").html("");
                        $("#last-promotion-error-message").append(
                            `<span>${errors.lastPromotion[0]}</span>`
                        );
                    } else {
                        $("#lastPromotion").removeClass("is-invalid");
                        $("#last-promotion-error-message").html("");
                    }
                    if (errors.hasOwnProperty("status")) {
                        $("#status").addClass("is-invalid");
                        $("#status-error-message").html("");
                        $("#status-error-message").append(
                            `<span>${errors.status[0]}</span>`
                        );
                    } else {
                        $("#status").removeClass("is-invalid");
                        $("#status-error-message").html("");
                    }
                    if (errors.hasOwnProperty("areaCode")) {
                        $("#areaCode").addClass("is-invalid");
                        $("#area-code-error-message").html("");
                        $("#area-code-error-message").append(
                            `<span>${errors.areaCode[0]}</span>`
                        );
                    } else {
                        $("#areaCode").removeClass("is-invalid");
                        $("#area-code-error-message").html("");
                    }
                    if (errors.hasOwnProperty("areaType")) {
                        $("#areaType").addClass("is-invalid");
                        $("#area-type-error-message").html("");
                        $("#area-type-error-message").append(
                            `<span>${errors.areaType[0]}</span>`
                        );
                    } else {
                        $("#areaType").removeClass("is-invalid");
                        $("#area-type-error-message").html("");
                    }
                    if (errors.hasOwnProperty("areaLevel")) {
                        $("#areaLevel").addClass("is-invalid");
                        $("#area-level-error-message").html("");
                        $("#area-level-error-message").append(
                            `<span>${errors.areaLevel[0]}</span>`
                        );
                    } else {
                        $("#areaLevel").removeClass("is-invalid");
                        $("#area-level-error-message").html("");
                    }
                    if (errors.hasOwnProperty("employeeName")) {
                        $("#employeeName").addClass("is-invalid");
                        $("#employee-name-error-message").html("");
                        $("#employee-name-error-message").append(
                            `<span>${errors.employeeName[0]}</span>`
                        );
                    } else {
                        $("#employeeName").removeClass("is-invalid");
                        $("#employee-name-error-message").html("");
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
                    if (errors.hasOwnProperty("stepNo")) {
                        $("#stepNo").addClass("is-invalid");
                        $("#steps-error-message").html("");
                        $("#steps-error-message").append(
                            `<span>${errors.stepNo[0]}</span>`
                        );
                    } else {
                        $("#stepNo").removeClass("is-invalid");
                        $("#steps-error-message").html("");
                    }
                    if (errors.hasOwnProperty("currentSalaryamount")) {
                        $("#currentSalaryamount").addClass("is-invalid");
                        $("#salary-amount-error-message").html("");
                        $("#salary-amount-error-message").append(
                            `<span>${errors.salaryAmount[0]}</span>`
                        );
                    } else {
                        $("#currentSalaryamount").removeClass("is-invalid");
                        $("#salary-amount-error-message").html("");
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
                    if (errors.hasOwnProperty("divisionId")) {
                        $("#divisionId").addClass("is-invalid");
                        $("#division-error-message").html("");
                        $("#division-error-message").append(
                            `<span>${errors.divisionId[0]}</span>`
                        );
                    } else {
                        $("#divisionId").removeClass("is-invalid");
                        $("#division-error-message").html("");
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
    $("#employeeName").change(function(e) {
        let employeeID = e.target.value;
        let plantilla = $($("#employeeName option:selected")[0]).attr(
            "data-plantilla"
        );
        $("#employeeID").val(plantilla);
    });
});

$(document).ready(function() {
    $("#cancelbutton1").click(function() {
        $("#add").attr("class", "page-header d-none");
        $("#table").attr("class", "page-header");
    });
});

//reset
function myFunction() {
    $("input").val("");
    const select = [
        "#salaryGrade",
        "#positionTitle",
        "#currentStepno",
        "#employeeName",
        "#officeCode",
        "#divisionId",
        "#status"
    ];
    $.each(select, function(index, value) {
        $(`${value}`)
            .val("Please Select")
            .trigger("change");
    });
    const errorClass = [
        "#itemNo",
        "#oldItemNo",
        "#positionTitle",
        "#originalAppointment",
        "#lastPromotion",
        "#status",
        "#areaCode",
        "#areaType",
        "#areaLevel",
        "#employeeName",
        "#salaryGrade",
        "#stepNo",
        "#currentSalaryamount",
        "#officeCode",
        "#divisionId"
    ];
    $.each(errorClass, function(index, value) {
        $(`${value}`).removeClass("is-invalid");
    });
    const errorMessage = [
        "#item-no-error-message",
        "#old_item-no-error-message",
        "#position-title-error-message",
        "#original-appointment-error-message",
        "#last-promotion-error-message",
        "#status-error-message",
        "#area-code-error-message",
        "#area-type-error-message",
        "#area-level-error-message",
        "#employee-name-error-message",
        "#salary-grade-error-message",
        "#steps-error-message",
        "#salary-amount-error-message",
        "#office-error-message",
        "#division-error-message"
    ];
    $.each(errorMessage, function(index, value) {
        $(`${value}`).html("");
    });
}
