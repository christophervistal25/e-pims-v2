$(document).ready(function() {
    // code for show add form
    $("#addbutton").click(function() {
        $("#add").attr("class", "page-header");
        $("#table").attr("class", "page-header d-none");
    });
    // code for show table
    $("#cancelbutton").click(function() {
        $("#add").attr("class", "page-header d-none");
        $("#table").attr("class", "page-header");
    });
    // save all ids and save
    $("#saveBtn").click(function() {
        let coveredYear = document.querySelector("#year").value;
        let coveredYearSaved = document.querySelector("#year").value - 1;
        $("#saveBtn").attr("disabled", true);
        $("#loading").removeClass("d-none");
        document.getElementById("post").innerHTML = "Posting . . .";
        let ids = [];
        $(".id__holder").each(function(key, element) {
            if (element.getAttribute("data-id")) {
                ids.push($(element).attr("data-id"));
            }
        });
        if (ids == "") {
            swal("No Data Available on Table", "", "warning");
            $("#saveBtn").attr("disabled", false);
            $("#loading").addClass("d-none");
            document.getElementById("post").innerHTML = "Post";
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
                                document.getElementById("post").innerHTML =
                                    "Post";
                                ids = [];
                                $("#yearFilter").append(
                                    "<option value=" +
                                        coveredYearSaved +
                                        ">" +
                                        coveredYearSaved +
                                        "</option>"
                                );
                                $("#yearFilter").selectpicker("refresh");
                            }
                        },
                        error: function(response) {}
                    });
                } else {
                    swal("Cancelled", "", "error");
                    $("#saveBtn").attr("disabled", false);
                    $("#loading").addClass("d-none");
                    document.getElementById("post").innerHTML = "Post";
                }
            });
        }
    });
    // list to create personnel of schedule
    let table = $("#plantillaList").DataTable({
        processing: true,
        serverSide: true,
        pagingType: "full_numbers",
        stateSave: true,
        language: {
            processing:
                '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
        },
        ajax: "/plantilla-of-schedule-list",
        columns: [
            {
                data: "fullname",
                name: "fullname",
                searchable: true,
                sortable: false,
                visible: true
            },
            {
                data: "position_name",
                name: "position_name",
                searchable: true,
                sortable: false,
                visible: true
            },
            {
                data: "office_name",
                name: "office_name",
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
        if (e.target.value == "") {
            table.destroy();
            table = $("#plantillaList").DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                retrieve: true,
                pagingType: "full_numbers",
                stateSave: true,
                language: {
                    processing:
                        '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
                },
                ajax: {
                    url: "/plantilla-of-schedule-list"
                },
                columns: [
                    {
                        data: "fullname",
                        name: "fullname",
                        searchable: true,
                        sortable: false,
                        visible: true
                    },
                    {
                        data: "position_name",
                        name: "position_name",
                        searchable: true,
                        sortable: false,
                        visible: true
                    },
                    {
                        data: "office_name",
                        name: "office_name",
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
                pagingType: "full_numbers",
                stateSave: true,
                language: {
                    processing:
                        '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
                },
                ajax: {
                    url: `/api/plantilla/list/${e.target.value}`
                },
                columns: [
                    {
                        data: "fullname",
                        name: "fullname",
                        searchable: true,
                        sortable: false,
                        visible: true
                    },
                    {
                        data: "position_name",
                        name: "position_name",
                        searchable: true,
                        sortable: false,
                        visible: true
                    },
                    {
                        data: "office_name",
                        name: "office_name",
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
    // dispaly list of adjusted personnel schedule
    let yearFilter = document.querySelector("#year").value - 1;
    let tableadjusted = $("#plantillaOfSchedule").DataTable({
        processing: true,
        serverSide: true,
        pagingType: "full_numbers",
        stateSave: true,
        language: {
            processing:
                '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
        },
        ajax: `/plantilla-of-schedule-adjustedlist/${yearFilter}`,
        columns: [
            {
                data: "fullname",
                name: "fullname",
                searchable: true,
                sortable: false,
                visible: true
            },
            {
                data: "position_name",
                name: "position_name",
                searchable: true,
                sortable: false,
                visible: true
            },
            {
                data: "office_name",
                name: "office_name",
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
        let yearFilter = document.querySelector("#yearFilter").value - 1;
        if (e.target.value == "") {
            tableadjusted.destroy();
            tableadjusted = $("#plantillaOfSchedule").DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                retrieve: true,
                pagingType: "full_numbers",
                stateSave: true,
                language: {
                    processing:
                        '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
                },
                ajax: {
                    url: `/plantilla-of-schedule-adjustedlist/${yearFilter}`
                },
                columns: [
                    {
                        data: "fullname",
                        name: "fullname",
                        searchable: true,
                        sortable: false,
                        visible: true
                    },
                    {
                        data: "position_name",
                        name: "position_name",
                        searchable: true,
                        sortable: false,
                        visible: true
                    },
                    {
                        data: "office_name",
                        name: "office_name",
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
            tableadjusted.destroy();
            let yearFilter = $("#yearFilter").val();
            tableadjusted = $("#plantillaOfSchedule").DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                retrieve: true,
                pagingType: "full_numbers",
                stateSave: true,
                initComplete : function (settings, json) {
                    let table_data = json['recordsTotal'];
                    let printPreview = document.getElementById("printPreview");
                    let printPreviewA = document.getElementById("printPreviewA");
                    printPreviewA
                        .setAttribute(
                            "href",
                            "print-plantilla-of-schedule/" + e.target.value
                        );
                    if (
                        table_data == "0" || e.target.value == "All"
                    ) {
                        printPreview
                            .setAttribute("style", "visibility:hidden;");
                        printPreviewA
                            .removeAttribute("href");
                        printPreview
                            .setAttribute("disabled", true);
                    } else {
                        printPreview
                            .setAttribute("style", "visibility:visible;");
                        printPreview
                            .removeAttribute("disabled");
                    }
                },
                language: {
                    processing:
                        '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
                },
                ajax: {
                    url: `/api/plantilla/schedule/${e.target.value}/${yearFilter}`
                },
                columns: [
                    {
                        data: "fullname",
                        name: "fullname",
                        searchable: true,
                        sortable: false,
                        visible: true
                    },
                    {
                        data: "position_name",
                        name: "position_name",
                        searchable: true,
                        sortable: false,
                        visible: true
                    },
                    {
                        data: "office_name",
                        name: "office_name",
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

    $("#yearFilter").change(function(e) {
        if (e.target.value == "") {
            tableadjusted.destroy();
            tableadjusted = $("#plantillaOfSchedule").DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                retrieve: true,
                pagingType: "full_numbers",
                stateSave: true,
                language: {
                    processing:
                        '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
                },
                ajax: {
                    url: "/plantilla-of-schedule-adjustedlist"
                },
                columns: [
                    {
                        data: "fullname",
                        name: "fullname",
                        searchable: true,
                        sortable: false,
                        visible: true
                    },
                    {
                        data: "position_name",
                        name: "position_name",
                        searchable: true,
                        sortable: false,
                        visible: true
                    },
                    {
                        data: "office_name",
                        name: "office_name",
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
            tableadjusted.destroy();
            let officeCode = $("#officeCode").val();
            tableadjusted = $("#plantillaOfSchedule").DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                retrieve: true,
                pagingType: "full_numbers",
                stateSave: true,
                language: {
                    processing:
                        '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
                },
                ajax: {
                    url: `/api/plantilla/schedule/${officeCode}/${e.target.value}`
                },
                columns: [
                    {
                        data: "fullname",
                        name: "fullname",
                        searchable: true,
                        sortable: false,
                        visible: true
                    },
                    {
                        data: "position_name",
                        name: "position_name",
                        searchable: true,
                        sortable: false,
                        visible: true
                    },
                    {
                        data: "office_name",
                        name: "office_name",
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
