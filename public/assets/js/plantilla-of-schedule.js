$(function() {
    let table = $("#plantillaList").DataTable({
        processing: true,
        serverSide: true,
        ajax: "/plantilla-of-schedule-list",
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
            { data: "year", name: "year", sortable: false },
            {
                data: "action",
                name: "action",
                searchable: false,
                sortable: false
            }
        ],
        rowId: "plantilla_id",
        select: {
            style: "multi"
        }
    });

    $("#officePlantillaList").change(function(e) {
        if (e.target.value == "" || e.target.value == "") {
            table.destroy();
            table = $("#plantillaList").DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                retrieve: true,
                ajax: {
                    url: "/plantilla-of-schedule-list"
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
                    { data: "year", name: "year", sortable: false },
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
            table = $("#plantillaList").DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                retrieve: true,
                ajax: {
                    url: `/api/plantilla/list/${e.target.value}`
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
                    { data: "year", name: "year", sortable: false },
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
        //filter all position data in plantilla Schedule//
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
$(function() {
    let table = $("#plantillaOfSchedule").DataTable({
        processing: true,
        serverSide: true,
        ajax: "/plantilla-of-schedule-adjustedlist",
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
            { data: "year", name: "year", sortable: false },
            {
                data: "action",
                name: "action",
                searchable: false,
                sortable: false
            }
        ]
    });

    $("#officeCode").change(function(e) {
        if (e.target.value == "" || e.target.value == "") {
            table.destroy();
            table = $("#plantillaOfSchedule").DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                retrieve: true,
                ajax: {
                    url: "/plantilla-of-schedule-adjustedlist"
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
                    { data: "year", name: "year", sortable: false },
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
            table = $("#plantillaOfSchedule").DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                retrieve: true,
                ajax: {
                    url: `/api/plantilla/schedule/${e.target.value}`
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
                    { data: "year", name: "year", sortable: false },
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
//get all ids

function LockDepot() {
    let coveredYear = document.querySelector("#year").value;
    $("#saveBtn").attr("disabled", true);
    $("#loading").removeClass("d-none");
    let ids = [];
    $(".id__holder").each(function(key, element) {
        if (element.getAttribute("data-id")) {
            ids.push($(element).attr("data-id"));
        }
    });
    if (ids == "") {
        swal("No Data Available on Table", "", "error");
        $("#saveBtn").attr("disabled", false);
        $("#loading").addClass("d-none");
    } else {
        swal({
            title: "Are you sure you want to Post?",
            text: "Once posted, you will not be able to undo the process!",
            icon: "warning",
            buttons: true,
            dangerMode: true
        }).then(willPost => {
            if (willPost) {
                $.ajax({
                    type: "POST",
                    url: `/api/plantilla/schedule/adjust`,
                    data: {
                        ids: ids.toString(),
                        coveredYear: coveredYear
                    },
                    success: function(response) {
                        if (response.success) {
                            swal(
                                "Plantilla Schedule Added Successfully",
                                "",
                                "success"
                            );
                            $("#plantillaList")
                                .DataTable()
                                .ajax.reload();
                            $("#plantillaOfSchedule")
                                .DataTable()
                                .ajax.reload();
                            $("#saveBtn").attr("disabled", false);
                            $("#loading").addClass("d-none");
                            ids = [];
                        }
                    },
                    error: function(response) {}
                });
            } else {
                swal("Cancel!", "", "error");
                $("#saveBtn").attr("disabled", false);
                $("#loading").addClass("d-none");
            }
        });
    }
}
