
$(document).ready(function () {
    let select = [
        "#positionTitle",
        "#employeeName",
        "#officeCode",
        "#salaryGradePrevious",
    ];
    let inputs = [
        "#oldItemNo",
        "#itemNo",
        "#currentSalarygrade",
        "#currentSalaryamount",
        "#employeeID",
        "#originalAppointment",
        "#lastPromotion",
        "#lastStepIncrement",
        "#areaCode",
        "#areaType",
        "#areaLevel",
        "#salaryAuthorized",
        "#salaryAmount",
        "#salaryAmountYearly",
        "#salaryAmountPreviousYearly",
        "#divisionId",
        "#sectionId",
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
        "#salaryAuthorized",
        "#salaryAmountYearly",
        "#salaryAmount",
        ".salaryGradePrevious",
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
        "#salaryAuthorized-no-error-message",
        "#salaryAmountYearly-no-error-message",
        "#salary-grade-previous-error-message",
    ];

    // filter list office
    let selectedOffice = localStorage.getItem('SELECTED_OFFICE') || '*';
        if(selectedOffice !== '0001') {
            $('#employeeOffice').val(localStorage.getItem('SELECTED_OFFICE')).trigger('refresh');
        }
    let selectedYear = $("#currentYear").val();

    let PlantillaTable = $("#plantilla").DataTable({
        processing: true,
        serverSide: true,
        pageLength: 100,
        pagingType: "full_numbers",
        language: {
            processing:
                '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> ',
        },
        ajax: `/plantilla-list/${selectedOffice}/${selectedYear}`,
        columns: [
            { data: "item_no", name: "item_no" },
            {
                data: "employee_id",
                name: "employee_id",
                render: function (nRow, _, data, row) {
                    if(data.employee_id == null){
                        return `<img src="/assets/img/province.png" width="55px" height="55px" class="rounded-circle" alt="">`;
                    }else{
                        return `<img src="/assets/img/profiles/${data.employee_id}.jpg" width="55px" height="55px" class="rounded-circle" alt="">`;
                    }
                },
            },
            {
                data: "fullname",
                name: "fullname",
                searchable: true,
                visible: true,
                render : function(rawData, _, data) {
                    if(!data.employee_id) {
                        return `
                            <span class="badge badge-primary text-white">VACANT</span>
                        `;
                    }
                    return `${rawData}`;
                }
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

            { data: "sg_step", name: "sg_step", sortable: false },
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
        localStorage.setItem('SELECTED_OFFICE', selectedOffices);
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
        let plantilla = $($("#employeeName option:selected")[0]).attr(
            "data-plantilla"
        );
        $("#employeeID").val(plantilla);
        if(employeeID == ''){
            $('#employeeImage').attr('src', `/assets/img/placeholder.jpg`)
            $('#employeeId').val('')
        }else{
            $('#employeeImage').attr('src', `/assets/img/profiles/${employeeID}.jpg`)
        }
    });

    $("#employeeNameEdit").change(function (e) {
        let employeeID = e.target.value;
        if(employeeID == ''){
            $('#employeeImage').attr('src', `/assets/img/placeholder.jpg`);
            $('#employeeId').val('');
        }else{
            $('#employeeImage').attr('src', `/assets/img/profiles/${employeeID}.jpg`);
            $("#employeeId").val(employeeID);
        }
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
        let previousSgyear = $("#currentSgyear").val() - 1;
        //get salary grade and amount
        $.ajax({
            url: `/api/positionSalaryGrade/${positionTitle}/${currentSgyear}`,
            success: (response) => {
                if (response == "") {
                    $("#currentSalarygrade").val("");
                    $("#itemNo").val("");
                    $("#salaryAmount").val("");
                    $("#areaCode").val("");
                    $("#areaLevel").val("");
                    $("#areaType").val("");
                    $("#divisionId").val("");
                    $("#sectionId").val("");
                } else {
                    let areaCodeID = response.area_code.area_code_id;
                    let areaCodeDesc = response.area_code.description;
                    $("#areaCode").val(areaCodeID + " - " + areaCodeDesc);
                    let areaLevelID = response.area_level.area_level_id;
                    let areaLevelDesc = response.area_level.description;
                    $("#areaLevel").val(areaLevelID + " - " + areaLevelDesc);
                    let areaTypeID = response.area_type.area_type_id;
                    let areaTypeDesc = response.area_type.description;
                    $("#areaType").val(areaTypeID + " - " + areaTypeDesc);
                    let currentSalaryGrade = response.salary_grade[0].sg_no;
                    $("#currentSalarygrade").val(currentSalaryGrade);
                    let currentItemNo = response.item_no;
                    $("#itemNo").val(currentItemNo);
                    let currentSalaryAmount =
                        response.salary_grade[0]["sg_step" + currentStepno];
                    $("#salaryAmount").val(currentSalaryAmount);
                    $("#salaryAmountYearly").val(
                        parseFloat(currentSalaryAmount * 12).toFixed(2)
                    );
                    if (response.division == null) {
                        $("#divisionId").val("");
                    } else {
                        let division = response.division.division_name;
                        $("#divisionId").val(division);
                    }
                    if (response.section == null) {
                        $("#sectionId").val("");
                    } else {
                        let section = response.section.section_name;
                        $("#sectionId").val(section);
                    }
                }
            },
        });
        // salary authorized
        $.ajax({
            url: `/api/positionSalaryGrade/${positionTitle}/${previousSgyear}`,
            success: (response) => {
                if (response == "") {
                    $("#salaryGradePrevious").val("");
                    $("#StepnoPrevious").val("");
                } else {
                    let previousSalaryGrade = response.salary_grade[0].sg_no;
                    $("#salaryGradePrevious")
                        .val(previousSalaryGrade)
                        .trigger("change");
                    let previousSalaryAmount =
                        response.salary_grade[0]["sg_step" + currentStepno];
                    $("#salaryAuthorized").val(previousSalaryAmount);
                    $("#salaryAmountPreviousYearly").val(
                        parseFloat(previousSalaryAmount * 12).toFixed(2)
                    );
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
                    plantillaPositionIdFilter_final.item_no +
                    "-" +
                    positionIdFilter[0].positionName +
                    "</option>"
            );
        }
        $("#positionTitle").selectpicker("refresh");
    });

    // generate amount current salary
    $("#currentStepno").change(function () {
        let currentSalarygrade = $("#currentSalarygrade").val();
        let currentStepno = $("#currentStepno").val();
        let currentSgyear = $("#currentSgyear").val();
        $.ajax({
            url: `/api/salarySteplist/${currentSalarygrade}/${currentStepno}/${currentSgyear}`,
            success: (response) => {
                if (response == "") {
                    $("#salaryAmount").val("No Data");
                } else {
                    let currentSalaryAmount =
                        response["sg_step" + currentStepno];
                    $("#salaryAmount").val(currentSalaryAmount);
                    $("#salaryAmountYearly").val(
                        parseFloat(currentSalaryAmount * 12).toFixed(2)
                    );
                }
            },
        });
    });

    // get previous salary
    $("#stepNoPrevious, #salaryGradePrevious").change(function () {
        let salaryGradePrevious = $("#salaryGradePrevious").val();
        let stepNoPrevious = $("#stepNoPrevious").val();
        let previousYear = $("#currentSgyear").val() - 1;
        if (this.value == "") {
            $("#stepNoPrevious").val("");
            $("#stepNoPrevious").selectpicker("refresh");
            $("#salaryAmountPreviousYearly").val("");
            $("#salaryAuthorized").val("");
        }
        $.ajax({
            url: `/api/salarySteplist/${salaryGradePrevious}/${stepNoPrevious}/${previousYear}`,
            success: (response) => {
                if (response == "") {
                    $("#salaryAuthorized").val("No Data");
                } else {
                    let previousSalaryAmount =
                        response["sg_step" + stepNoPrevious];
                    $("#salaryAuthorized").val(previousSalaryAmount);
                    $("#salaryAmountPreviousYearly").val(
                        parseFloat(previousSalaryAmount * 12).toFixed(2)
                    );
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
                        buttons: false,
                        timer: 5000,
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
                    if (errors.hasOwnProperty("salaryAmount")) {
                        $("#salaryAmount").addClass("is-invalid");
                        $("#salary-amount-error-message").html("");
                        $("#salary-amount-error-message").append(
                            `<span>${errors.salaryAmount[0]}</span>`
                        );
                    } else {
                        $("#salaryAmount").removeClass("is-invalid");
                        $("#salary-amount-error-message").html("");
                    }
                    if (errors.hasOwnProperty("salaryAmountYearly")) {
                        $("#salaryAmountYearly").addClass("is-invalid");
                        $("#salaryAmountYearly-no-error-message").html("");
                        $("#salaryAmountYearly-no-error-message").append(
                            `<span>${errors.salaryAmountYearly[0]}</span>`
                        );
                    } else {
                        $("#salaryAmountYearly").removeClass("is-invalid");
                        $("#salaryAmountYearly-no-error-message").html("");
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
                    title: "",
                    text: "Successfully updated!",
                    icon: "success",
                    buttons: false,
                    timer: 5000,
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
                if (errors.hasOwnProperty("salaryAuthorized")) {
                    $("#salaryAuthorized").addClass("is-invalid");
                    $("#salaryAuthorized-no-error-message").html("");
                    $("#salaryAuthorized-no-error-message").append(
                        `<span>${errors.salaryAuthorized[0]}</span>`
                    );
                } else {
                    $("#salaryAuthorized").removeClass("is-invalid");
                    $("#salaryAuthorized-no-error-message").html("");
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
                if (errors.hasOwnProperty("salaryAmount")) {
                    $("#salaryAmount").addClass("is-invalid");
                    $("#salary-amount-error-message").html("");
                    $("#salary-amount-error-message").append(
                        `<span>${errors.salaryAmount[0]}</span>`
                    );
                } else {
                    $("#salaryAmount").removeClass("is-invalid");
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

$(document).on("click", ".btnResign", async function () {
    let year = $(this).attr('data-year');
    let id = $(this).attr('data-employee-id');

    let message = document.createElement('p');
    message.innerHTML = `
        <center>
            Are you sure you want to mark this employee as retire and leave this plantilla as vacant?
        </center>
    `;
    let confirmation = await swal({
        title : '',
        content : message,
        icon : 'warning',
        dangerMode : true,
        buttons : ["No", "Yes"],
    });

    if(confirmation) {
        $.post({
            url : '/api/mark-as-vacant',
            data : {
                employee_id : id,
                current_salary_grade_year : year,
            },
            success : function (response) {
                if(response.success) {
                    $('#plantilla').DataTable().ajax.reload(null, false);
                }
            }
        });
    }
});


