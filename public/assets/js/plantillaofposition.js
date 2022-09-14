$(document).ready(function () {
    let valueE = ["#itemNo", "#positionOldName"];
    let errorClass = [
        ".positionTitle .dropdown",
        "#itemNo",
        ".salaryGrade .dropdown",
        ".officeCode .dropdown",
        ".areaCode .dropdown",
        ".areaType .dropdown",
        ".areaLevel .dropdown",
        "#positionOldName",
    ];
    let errorMessage = [
        "#position-title-error-message",
        "#item-error-message",
        "#salary-grade-error-message",
        "#office-error-message",
        "#old-position-name-error-message",
        "#area-code-error-message",
        "#area-type-error-message",
        "#area-level-error-message",
    ];
    let select = [
        "#positionTitle",
        "#salaryGrade",
        "#officeCode",
        "#areaLevel",
    ];
    // code for show add form
    $("#addButton").click(function () {
        $("#add").attr("class", "page-header");
        $("#table").attr("class", "page-header d-none");
    });
    // code for show table
    $("#showListPlantillaPosition").click(function () {
        $("#add").attr("class", "page-header d-none");
        $("#table").attr("class", "page-header");
    });
    // cancel button
    $("#cancelButton").click(function () {
        $("#add").attr("class", "page-header d-none");
        $("#table").attr("class", "page-header");
        $.each(valueE, function (index, value) {
            $(`${value}`).val("");
        });
        $("#positionTitle,#addSalaryGrade,#officeCode", "#areaLevel")
            .val("Please Select")
            .trigger("change");
        $.each(errorClass, function (index, value) {
            $(`${value}`).removeClass("is-invalid");
        });
        $.each(errorMessage, function (index, value) {
            $(`${value}`).html("");
        });
    });

    // add new plantilla of position
    $("#plantillaOfPositionForm").submit(function (e) {
        e.preventDefault();
        let data = $(this).serialize();
        $("#saveBtn").attr("disabled", true);
        $("#loading").removeClass("d-none");
        $("#saving").html("Saving . . .");
        $.ajax({
            type: "POST",
            url: "/plantilla-of-position",
            data: data,
            success: function (response) {
                if (response.success) {
                    $.each(valueE, function (index, value) {
                        $(`${value}`).val("");
                    });
                    $.each(errorClass, function (index, value) {
                        $(`${value}`).removeClass("is-invalid");
                    });
                    $.each(errorMessage, function (index, value) {
                        $(`${value}`).html("");
                    });

                    $("#positionTitle,#officeCode,#salaryGrade,#areaLevel")
                        .val("Please Select")
                        .selectpicker("refresh");
                    $("#plantillaofposition").DataTable().ajax.reload();
                    swal("Added Successfully!", "", "success");
                    $("#saveBtn").attr("disabled", false);
                    $("#loading").addClass("d-none");
                    document.getElementById("saving").innerHTML = "Save";
                    $("#saving").html("Save");
                }
            },
            error: function (response) {
                if (response.status === 422) {
                    let errors = response.responseJSON.errors;
                    if (errors.hasOwnProperty("positionTitle")) {
                        $(".positionTitle .dropdown").addClass("is-invalid");
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
                        $(".salaryGrade .dropdown").addClass("is-invalid");
                        $("#salary-grade-error-message").html("");
                        $("#salary-grade-error-message").append(
                            `<span>${errors.salaryGrade[0]}</span>`
                        );
                    } else {
                        $("#salaryGrade").removeClass("is-invalid");
                        $("#salary-grade-error-message").html("");
                    }
                    if (errors.hasOwnProperty("officeCode")) {
                        $(".officeCode .dropdown").addClass("is-invalid");
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
                        $(".areaLevel .dropdown").addClass("is-invalid");
                        $("#area-level-error-message").html("");
                        $("#area-level-error-message").append(
                            `<span>${errors.areaLevel[0]}</span>`
                        );
                    } else {
                        $(".areaLevel .dropdown").removeClass("is-invalid");
                        $("#area-level-error-message").html("");
                    }
                    if (errors.hasOwnProperty("sectionId")) {
                        $(".sectionId .dropdown").addClass("is-invalid");
                        $("#section-error-message").html("");
                        $("#section-error-message").append(
                            `<span>${errors.sectionId[0]}</span>`
                        );
                    } else {
                        $(".sectionId .dropdown").removeClass("is-invalid");
                        $("#section-error-message").html("");
                    }
                    if (errors.hasOwnProperty("divisionId")) {
                        $(".divisionId .dropdown").addClass("is-invalid");
                        $("#division-error-message").html("");
                        $("#division-error-message").append(
                            `<span>${errors.divisionId[0]}</span>`
                        );
                    } else {
                        $(".divisionId .dropdown").removeClass("is-invalid");
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
                        buttons: false,
                        timer: 5000,
                        content: parentElement,
                    });
                    $("#saveBtn").attr("disabled", false);
                    $("#loading").addClass("d-none");
                    $("#saving").html("Save");
                }
            },
        });
    });

    // filter position and division by office
    $("#officeCode").change(function (e) {
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
            //filter all division data//
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
        //Remove all option in #sectionId//
        function removeOptionsSection(selectSection) {
            var ii,
                L = selectSection.options.length - 1;
            for (ii = L; ii >= 0; ii--) {
                selectSection.remove(ii);
            }
        }
        removeOptionsSection(document.getElementById("sectionId"));
        $("#sectionId").selectpicker("refresh");
    });
    // filter section by division
    $("#divisionId").change(function (e) {
        //sectionMetaData
        if (document.querySelectorAll('[id="sectionMetaData"]')[1] == null) {
            var sectionMetaData = document
                .querySelectorAll('[id="sectionMetaData"]')[0]
                .content.replaceAll("|", '"');
        } else {
            var sectionMetaData = document
                .querySelectorAll('[id="sectionMetaData"]')[1]
                .content.replaceAll("|", '"');
        }
        var sectionMetaDataRemoveLast =
            "[" +
            sectionMetaData.substring(0, sectionMetaData.length - 2) +
            "]";
        let sectionDivisionIdOptionAll = JSON.parse(sectionMetaDataRemoveLast);
        if (document.querySelectorAll('[id="sectionMetaData"]')[1] == null) {
            var metaDataSection = document
                .querySelectorAll('[id="sectionMetaData"]')[0]
                .content.replaceAll("|", '"');
        } else {
            var metaDataSection = document
                .querySelectorAll('[id="sectionMetaData"]')[1]
                .content.replaceAll("|", '"');
        }
        var metaDataSectionRemoveLast =
            "[" +
            metaDataSection.substring(0, metaDataSection.length - 2) +
            "]";
        let sectionOptionAll = JSON.parse(metaDataSectionRemoveLast);
        let divisionId2 = e.target.value;
        //filter all section data in plantilla//
        let plantillaSectionFilter = sectionDivisionIdOptionAll.filter(
            function (Section) {
                return Section.divisionId == divisionId2;
            }
        );
        //Remove all option in #sectionId//
        function removeOptionsSection(selectSection) {
            var ii,
                L = selectSection.options.length - 1;
            for (ii = L; ii >= 0; ii--) {
                selectSection.remove(ii);
            }
        }
        removeOptionsSection(document.getElementById("sectionId"));
        //add section data based in what you select in #divisionId//
        var i,
            plantillaLengthSectionId = plantillaSectionFilter.length;
        $("#sectionId").append("<option></option>");
        for (i = 0; i < plantillaLengthSectionId; i++) {
            var plantillaSectionFilter_final = plantillaSectionFilter[i];
            //filter all division data//
            let sectionIdFilter = sectionOptionAll.filter(function (Section) {
                return (
                    Section.divisionId ==
                    plantillaSectionFilter_final.divisionId
                );
            });
            $("#sectionId").append(
                '<option value="' +
                    sectionIdFilter[i].sectionId +
                    '">' +
                    sectionIdFilter[i].sectionName +
                    "</option>"
            );
        }
        $("#sectionId").selectpicker("refresh");
    });

    // get value of employees sg, sn, sp
    $("#positionTitle").change(function (e) {
        let position = $($("#positionTitle option:selected")[0]).attr(
            "data-position"
        );
        if (position != "") {
            position = JSON.parse(position);
            $("#salaryGrade").val(position.sg_no).change();
        } else {
            $("#salaryGrade").val("").change();
        }
    });

    // display plantilla of position
    let selectedOffice = $("#employeeOffice").val();
    let PlantillaPositiontable = $("#plantillaofposition").DataTable({
        processing: true,
        pagingType: "full_numbers",
        destroy: true,
        retrieve: true,
        columnDefs: [{ width: "10%", targets: 5 }],
        language: {
            processing:
                '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> ',
        },
        ajax: `/plantilla-of-position-list/${selectedOffice}`,
        columns: [
            { data: "item_no", name: "item_no" },
            {
                data: "Description",
                name: "Description",
            },
            {
                data: "sg_no",
                name: "sg_no",
            },
            { data: "office_name", searchable: false, name: "office_name" },
            // { data: "division_name", searchable: false, name: "division_name" },
            // { data: "section_name", searchable: false, name: "section_name" },
            { data: "old_position_name", name: "old_position_name" },
            {
                data: "action",
                name: "action",
                searchable: false,
                sortable: false,
            },
        ],
    });
    //filter office
    $("#employeeOffice").change(function (e) {
        let selectedOffice = $("#employeeOffice").val();
        PlantillaPositiontable.ajax
            .url(`/plantilla-of-position-list/${selectedOffice}`)
            .load();
    });

    // start add new position modal
    $("#btnPosition").click(function (e) {
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
                    addPositionShortName: addPositionShortName,
                },
                success: function (response) {
                    if (response.success) {
                        $(".modal").each(function () {
                            $(this).modal("hide");
                        });
                        swal({
                            title: "",
                            text: "Position has been added successfully!",
                            icon: "success",
                            timer: 5000,
                            buttons: false,
                        });
                        $('input[type="text"],select').val("");
                        $("#addSalaryGrade")
                            .val("Please Select")
                            .trigger("change");
                        $("#positionTitle").append(
                            "<option value=" +
                                response.PosCode +
                                ">" +
                                addPositionName +
                                "</option>"
                        );

                        const errorClass = [
                            "#addPositionCode",
                            "#addPositionName",
                            "#addSalaryGrade",
                            "#addPositionShortName",
                        ];
                        $.each(errorClass, function (index, value) {
                            $(`${value}`).removeClass("is-invalid");
                        });
                        const errorMessage = [
                            "#add-position-code-error-message",
                            "#add-position-name-error-message",
                            "#add-salary-grade-error-message",
                            "#add-position-short-name-error-message",
                        ];
                        $.each(errorMessage, function (index, value) {
                            $(`${value}`).html("");
                        });
                        $("#positionTitle").selectpicker("refresh");
                    }
                },
                error: function (response) {
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
                        $.each(errors, function (key, value) {
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
                    }
                },
            });
        } else {
            swal("Please Input Data", "", "warning");
        }
    });

    // end add new position modal

    $("#itemNo").keyup(function () {
        $("#item-error-message").html("");
        $("#itemNo").removeClass("is-invalid");
    });

    $("#salaryGrade").change(function () {
        $("#salary-grade-error-message").html("");
        $(".salaryGrade .dropdown").removeClass("is-invalid");
    });
    $("#positionTitle").change(function () {
        $("#position-title-error-message").html("");
        $(".positionTitle .dropdown").removeClass("is-invalid");
        $("#salary-grade-error-message").html("");
        $(".salaryGrade .dropdown").removeClass("is-invalid");
    });
    $("#officeCode").change(function () {
        $("#office-error-message").html("");
        $(".officeCode .dropdown").removeClass("is-invalid");
    });
});
