$(function() {
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
        if (e.target.value == "" || e.target.value == "") {
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
});
$(function() {
    let yearFilter = document.querySelector("#year").value - 1;
    let table = $("#plantillaOfSchedule").DataTable({
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
        if (e.target.value == "" || e.target.value == "") {
            table.destroy();
            table = $("#plantillaOfSchedule").DataTable({
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
            document
                .getElementById("printPreviewA")
                .setAttribute(
                    "href",
                    "print-plantilla-of-schedule/" + e.target.value
                );
            table.destroy();
            let yearFilter = $("#yearFilter").val();
            table = $("#plantillaOfSchedule").DataTable({
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
        let count = 1;
        let interval = setInterval(printStatus, 1000);
        function printStatus() {
            let table_data = $("#plantillaOfSchedule > tbody > tr > td").text();
            if (
                table_data == "No data available in table" ||
                table_data == ""
            ) {
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
    });

    $("#yearFilter").change(function(e) {
        if (e.target.value == "" || e.target.value == "") {
            table.destroy();
            table = $("#plantillaOfSchedule").DataTable({
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
            table.destroy();
            let officeCode = $("#officeCode").val();
            table = $("#plantillaOfSchedule").DataTable({
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
                            document.getElementById("post").innerHTML = "Post";
                            ids = [];
                            $("#yearFilter").append(
                                "<option value=" +
                                    coveredYear +
                                    ">" +
                                    coveredYear +
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
}
