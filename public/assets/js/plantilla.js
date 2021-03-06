$(document).ready(function () {
    let select = [
        "#positionTitle",
        "#employeeName",
        "#officeCode",
        "#divisionId",
    ];

    let inputs = [
        "#oldItemNo",
        "#itemNo",
        "#currentSalarygrade",
        "#currentSalaryamount",
        "#employeeID",
        "#originalAppointment",
        "#lastPromotion",
    ];

    let errorClass = [
        "#oldItemNo",
        ".positionTitle",
        "#originalAppointment",
        "#lastPromotion",
        ".status",
        ".areaCode",
        ".areaType",
        ".areaLevel",
        ".employeeName",
        ".stepNo",
        "#currentSalaryamount",
        ".officeCode",
        ".divisionId",
    ];

    let errorMessage = [
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
        "#division-error-message",
    ];

    // filter list office
    let selectedOffice = $("#employeeOffice").val();
    let selectedYear = $("#currentYear").val();

    let PlantillaTable = $("#plantilla").DataTable({
        processing: true,
        serverSide: true,
        pagingType: "full_numbers",
        stateSave: true,
        language: {
            processing:
                '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> ',
        },
        ajax: `/plantilla-list/${selectedOffice}/${selectedYear}`,
        columns: [
            {
                data: "fullname",
                name: "fullname",
                searchable: true,
                visible: true,
            },
            {
                data: "Description",
                name: "Description",
                searchable: true,
                sortable: false,
                visible: true,
            },
            {
                data: "office_name",
                name: "office_name",
                searchable: true,
                visible: true,
            },
            { data: "item_no", name: "item_no" },
            { data: "status", name: "status", sortable: false },
            { data: "year", name: "year", sortable: false },
            {
                data: "action",
                name: "action",
                searchable: false,
                sortable: false,
            },
        ],
    });

    $("#employeeOffice,#currentYear").change(function (e) {
        let selectedOffices = $("#employeeOffice").val();
        let selectedYears = $("#currentYear").val();

        PlantillaTable.ajax
            .url(`/plantilla-list/${selectedOffices}/${selectedYears}`)
            .load();
    });

    // code for show add form
    $("#addButton").click(function () {
        $("#add").attr("class", "page-header");
        $("#table").attr("class", "page-header d-none");
    });

    // code for show table
    $("#displayListPlantilla").click(function () {
        $("#add").attr("class", "page-header d-none");
        $("#table").attr("class", "page-header");
    });

    // Number only
    $("input[id='oldItemNo']").on("input", function (e) {
        $(this).val(
            $(this)
                .val()
                .replace(/[^0-9.]/g, "")
        );
    });

    // display emp id
    $("#employeeName").change(function (e) {
        let employeeID = e.target.value;
        let plantilla = $($("#employeeName option:selected")[0]).attr("data-plantilla");
        $("#employeeID").val(plantilla);
    });

    $("#cancelButton").click(function () {
        $("#add").attr("class", "page-header d-none");

        $("#table").attr("class", "page-header");
        $.each(inputs, function (index, value) {
            $(`${value}`).val("");
        });

        $.each(select, function (index, value) {
            $(`${value}`).val("Please Select").trigger("change");
        });

        $.each(errorClass, function (index, value) {
            $(`${value}`).removeClass("is-invalid");
        });

        $.each(errorMessage, function (index, value) {
            $(`${value}`).html("");
        });

    });

    // Display the value of positin and division per office selected
    $("#positionTitle").change(function () {
        let positionTitle = $("#positionTitle").val();

        let currentStepno = $("#currentStepno").val();
        let currentSgyear = $("#currentSgyear").val();

        $.ajax({
            url: `/api/positionSalaryGrade/${positionTitle}/${currentSgyear}`,
            success: (response) => {
                if (response == "") {
                    $("#currentSalarygrade").val("");
                    $("#itemNo").val("");
                    $("#currentSalaryamount").val("");
                } else {
                    let currentSalaryGrade = response.salary_grade[0].sg_no;
                    $("#currentSalarygrade").val(currentSalaryGrade);
                    let currentItemNo = response.item_no;
                    $("#itemNo").val(currentItemNo);
                    let currentSalaryAmount =response.salary_grade[0]["sg_step" + currentStepno];

                    $("#currentSalaryamount").val(currentSalaryAmount);
                }

            },
        });
    });
    // filter position by office
    $("#officeCode").change(function (e) {
        //plantillaPositionMetaData
        $("#currentSalarygrade").val("");
        $("#itemNo").val("");
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
            function (position) {
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
            let positionIdFilter = positionOptionAll.filter(function (
                position
            ) {
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
            function (Division) {
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
            let divisionIdFilter = divisionOptionAll.filter(function (
                Division
            ) {
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
    // generate amount
    $("#currentStepno").change(function () {
        let currentSalarygrade = $("#currentSalarygrade").val();
        let currentStepno = $("#currentStepno").val();
        let currentSgyear = $("#currentSgyear").val();
        $.ajax({
            url: `/api/salarySteplist/${currentSalarygrade}/${currentStepno}/${currentSgyear}`,
            success: (response) => {
                if (response == "") {
                    $("#currentSalaryamount").val("No Data");
                } else {
                    let currentSalaryAmount =
                        response["sg_step" + currentStepno];
                    $("#currentSalaryamount").val(currentSalaryAmount);
                }
            },
        });
    });

    // add new plantilla
    $("#plantillaForm").submit(function (e) {
        e.preventDefault();
        let empIds = $("#employeeName").val();
        let positionIds = $("#positionTitle").val();
        let data = $(this).serialize();
        $("#saveBtn").attr("disabled", true);
        $("#loading").removeClass("d-none");
        $("#saving").html("Saving . . .");
        $.ajax({
            type: "POST",
            url: "/plantilla-of-personnel",
            data: data,
            success: function (response) {
                if (response.success) {
                    $("#employeeName")
                        .find('[value="' + empIds + '"]')
                        .remove();
                    $("#employeeName").selectpicker("refresh");
                    $.each(inputs, function (index, value) {
                        $(`${value}`).val("");
                    });
                    $("#positionTitle")
                        .find('[value="' + positionIds + '"]')
                        .remove();
                    $("#positionTitle").selectpicker("refresh");
                    $.each(select, function (index, value) {
                        $(`${value}`).val("Please Select").trigger("change");
                    });
                    $.each(errorClass, function (index, value) {
                        $(`${value}`).removeClass("is-invalid");
                    });
                    $.each(errorMessage, function (index, value) {
                        $(`${value}`).html("");
                    });
                    $("#plantilla").DataTable().ajax.reload();
                    swal({
                        title: "",
                        text: "Plantilla of Personnel has been added",
                        icon: "success",
                        buttons : false,
                        timer : 5000,
                    });
                    $("#saveBtn").attr("disabled", false);
                    $("#loading").addClass("d-none");
                    $("#saving").html("Save");
                    document.getElementById("saving").innerHTML = "Save";
                    $(document).ready(function () {
                        $("#plantillaPositionMetaData").load(
                            "#plantillaPositionMetaData > #plantillaPositionMetaData"
                        );
                        $("#positionMetaData").load(
                            "#positionMetaData > #positionMetaData"
                        );
                    });
                }
            },
            error: function (response) {
                if (response.status === 422) {
                    let errors = response.responseJSON.errors;
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
                        $(".positionTitle").addClass("is-invalid");
                        $("#position-title-error-message").html("");
                        $("#position-title-error-message").append(
                            `<span>${errors.positionTitle[0]}</span>`
                        );
                    } else {
                        $(".positionTitle").removeClass("is-invalid");
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
                        $(".status").addClass("is-invalid");
                        $("#status-error-message").html("");
                        $("#status-error-message").append(
                            `<span>${errors.status[0]}</span>`
                        );
                    } else {
                        $(".status").removeClass("is-invalid");
                        $("#status-error-message").html("");
                    }
                    if (errors.hasOwnProperty("areaCode")) {
                        $(".areaCode").addClass("is-invalid");
                        $("#area-code-error-message").html("");
                        $("#area-code-error-message").append(
                            `<span>${errors.areaCode[0]}</span>`
                        );
                    } else {
                        $(".areaCode").removeClass("is-invalid");
                        $("#area-code-error-message").html("");
                    }
                    if (errors.hasOwnProperty("areaType")) {
                        $(".areaType").addClass("is-invalid");
                        $("#area-type-error-message").html("");
                        $("#area-type-error-message").append(
                            `<span>${errors.areaType[0]}</span>`
                        );
                    } else {
                        $(".areaType").removeClass("is-invalid");
                        $("#area-type-error-message").html("");
                    }
                    if (errors.hasOwnProperty("areaLevel")) {
                        $(".areaLevel").addClass("is-invalid");
                        $("#area-level-error-message").html("");
                        $("#area-level-error-message").append(
                            `<span>${errors.areaLevel[0]}</span>`
                        );
                    } else {
                        $(".areaLevel").removeClass("is-invalid");
                        $("#area-level-error-message").html("");
                    }
                    if (errors.hasOwnProperty("employeeName")) {
                        $(".employeeName").addClass("is-invalid");
                        $("#employee-name-error-message").html("");
                        $("#employee-name-error-message").append(
                            `<span>${errors.employeeName[0]}</span>`
                        );
                    } else {
                        $(".employeeName").removeClass("is-invalid");
                        $("#employee-name-error-message").html("");
                    }
                    if (errors.hasOwnProperty("stepNo")) {
                        $(".stepNo").addClass("is-invalid");
                        $("#steps-error-message").html("");
                        $("#steps-error-message").append(
                            `<span>${errors.stepNo[0]}</span>`
                        );
                    } else {
                        $(".stepNo").removeClass("is-invalid");
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
                        $(".officeCode").addClass("is-invalid");
                        $("#office-error-message").html("");
                        $("#office-error-message").append(
                            `<span>${errors.officeCode[0]}</span>`
                        );
                    } else {
                        $(".officeCode").removeClass("is-invalid");
                        $("#office-error-message").html("");
                    }
                    if (errors.hasOwnProperty("divisionId")) {
                        $(".divisionId").addClass("is-invalid");
                        $("#division-error-message").html("");
                        $("#division-error-message").append(
                            `<span>${errors.divisionId[0]}</span>`
                        );
                    } else {
                        $(".divisionId").removeClass("is-invalid");
                        $("#division-error-message").html("");
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
});

$("#employeeName").change(function () {
    $("#employee-name-error-message").html("");
    $(".employeeName").removeClass("is-invalid");
});
$("#officeCode").change(function () {
    $("#office-error-message").html("");
    $(".officeCode").removeClass("is-invalid");
});
$("#divisionId").change(function () {
    $("#division-error-message").html("");
    $(".divisionId").removeClass("is-invalid");
});
$("#positionTitle").change(function () {
    $("#position-title-error-message").html("");
    $(".positionTitle").removeClass("is-invalid");
});
$("#status").change(function () {
    $("#status-error-message").html("");
    $(".status").removeClass("is-invalid");
});
$("#currentStepno").change(function () {
    $("#steps-error-message").html("");
    $(".stepNo").removeClass("is-invalid");
});
$("#originalAppointment").change(function () {
    $("#original-appointment-error-message").html("");
    $("#originalAppointment").removeClass("is-invalid");
});
$("#lastPromotion").change(function () {
    $("#last-promotion-error-message").html("");
    $("#lastPromotion").removeClass("is-invalid");
});
$("#areaCode").change(function () {
    $("#area-code-error-message").html("");
    $(".areaCode").removeClass("is-invalid");
});
$("#areaType").change(function () {
    $("#area-type-error-message").html("");
    $(".areaType").removeClass("is-invalid");
});
$("#areaType").change(function () {
    $("#area-level-error-message").html("");
    $(".areaLevel").removeClass("is-invalid");
});

// edit page
$("#plantillaEditForm").submit(function (e) {
    e.preventDefault();
    let plantillaId = $("#plantillaId").val();
    let data = $(this).serialize();
    $("#plantillaUpdate").attr("disabled", true);
    $("#loading").removeClass("d-none");
    $("#saving").html("Updating . . .");
    $.ajax({
        type: "PUT",
        url: `/plantilla-of-personnel/${plantillaId}`,
        data: data,
        success: function (response) {
            if (response.success) {
                swal({
                    title : '',
                    text: "Successfully updated!",
                    icon: "success",
                    buttons : false,
                    timer : 5000,
                });

                $("#plantillaUpdate").attr("disabled", false);
                $("#loading").addClass("d-none");
                document.getElementById("saving").innerHTML = "Update";
                $("#saving").html("Update");
                $.each(select, function (index, value) {
                    $(`${value}`).val("Please Select").trigger("change");
                });
                $.each(errorClass, function (index, value) {
                    $(`${value}`).removeClass("is-invalid");
                });
                $.each(errorMessage, function (index, value) {
                    $(`${value}`).html("");
                });
            }
        },
        error: function (response) {
            if (response.status === 422) {
                let errors = response.responseJSON.errors;
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
                    $(".positionTitle").addClass("is-invalid");
                    $("#position-title-error-message").html("");
                    $("#position-title-error-message").append(
                        `<span>${errors.positionTitle[0]}</span>`
                    );
                } else {
                    $(".positionTitle").removeClass("is-invalid");
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
                    $(".status").addClass("is-invalid");
                    $("#status-error-message").html("");
                    $("#status-error-message").append(
                        `<span>${errors.status[0]}</span>`
                    );
                } else {
                    $(".status").removeClass("is-invalid");
                    $("#status-error-message").html("");
                }
                if (errors.hasOwnProperty("areaCode")) {
                    $(".areaCode").addClass("is-invalid");
                    $("#area-code-error-message").html("");
                    $("#area-code-error-message").append(
                        `<span>${errors.areaCode[0]}</span>`
                    );
                } else {
                    $(".areaCode").removeClass("is-invalid");
                    $("#area-code-error-message").html("");
                }
                if (errors.hasOwnProperty("areaType")) {
                    $(".areaType").addClass("is-invalid");
                    $("#area-type-error-message").html("");
                    $("#area-type-error-message").append(
                        `<span>${errors.areaType[0]}</span>`
                    );
                } else {
                    $(".areaType").removeClass("is-invalid");
                    $("#area-type-error-message").html("");
                }
                if (errors.hasOwnProperty("areaLevel")) {
                    $(".areaLevel").addClass("is-invalid");
                    $("#area-level-error-message").html("");
                    $("#area-level-error-message").append(
                        `<span>${errors.areaLevel[0]}</span>`
                    );
                } else {
                    $(".areaLevel").removeClass("is-invalid");
                    $("#area-level-error-message").html("");
                }
                if (errors.hasOwnProperty("employeeName")) {
                    $(".employeeName").addClass("is-invalid");
                    $("#employee-name-error-message").html("");
                    $("#employee-name-error-message").append(
                        `<span>${errors.employeeName[0]}</span>`
                    );
                } else {
                    $(".employeeName").removeClass("is-invalid");
                    $("#employee-name-error-message").html("");
                }
                if (errors.hasOwnProperty("stepNo")) {
                    $(".stepNo").addClass("is-invalid");
                    $("#steps-error-message").html("");
                    $("#steps-error-message").append(
                        `<span>${errors.stepNo[0]}</span>`
                    );
                } else {
                    $(".stepNo").removeClass("is-invalid");
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
                    $(".officeCode").addClass("is-invalid");
                    $("#office-error-message").html("");
                    $("#office-error-message").append(
                        `<span>${errors.officeCode[0]}</span>`
                    );
                } else {
                    $(".officeCode").removeClass("is-invalid");
                    $("#office-error-message").html("");
                }
                if (errors.hasOwnProperty("divisionId")) {
                    $(".divisionId").addClass("is-invalid");
                    $("#division-error-message").html("");
                    $("#division-error-message").append(
                        `<span>${errors.divisionId[0]}</span>`
                    );
                } else {
                    $(".divisionId").removeClass("is-invalid");
                    $("#division-error-message").html("");
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
                $("#plantillaUpdate").attr("disabled", false);
                $("#loading").addClass("d-none");
                $("#saving").html("Update");
            }
        },
    });
});
