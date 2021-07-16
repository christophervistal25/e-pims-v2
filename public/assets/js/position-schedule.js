// display position
$(function() {
    let table = $("#positionList").DataTable({
        processing: true,
        pagingType: "full_numbers",
        stateSave: true,
        serverSide: true,
        destroy: true,
        retrieve: true,
        columnDefs: [{ width: "10%", targets: 5 }],
        language: {
            processing:
                '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
        },
        ajax: "/position-schedule-list",
        columns: [
            { data: "position", name: "position" },
            { data: "item_no", name: "item_no" },
            { data: "sg_no", name: "sg_no" },
            { data: "office", name: "office" },
            { data: "old_position_name", name: "old_position_name" },
            { data: "year", name: "year" },
            {
                data: "action",
                name: "action",
                searchable: false,
                sortable: false
            }
        ]
    });

    $("#officeScheduleList").change(function(e) {
        console.log(e.target.value);
        if (e.target.value == "" || e.target.value == "") {
            table.destroy();
            table = $("#positionList").DataTable({
                processing: true,
                serverSide: true,
                pagingType: "full_numbers",
                stateSave: true,
                columnDefs: [{ width: "10%", targets: 5 }],
                destroy: true,
                retrieve: true,
                language: {
                    processing:
                        '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
                },
                ajax: {
                    url: "/position-schedule-list"
                },
                columns: [
                    { data: "position", name: "position" },
                    { data: "item_no", name: "item_no" },
                    { data: "sg_no", name: "sg_no" },
                    { data: "office", name: "office" },
                    { data: "old_position_name", name: "old_position_name" },
                    { data: "year", name: "year" },
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
            table = $("#positionList").DataTable({
                processing: true,
                serverSide: true,
                pagingType: "full_numbers",
                stateSave: true,
                columnDefs: [{ width: "10%", targets: 5 }],
                destroy: true,
                retrieve: true,
                language: {
                    processing:
                        '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
                },
                ajax: {
                    url: `/api/plantilla/position/schedule/${e.target.value}`
                },
                columns: [
                    { data: "position", name: "position" },
                    { data: "item_no", name: "item_no" },
                    { data: "sg_no", name: "sg_no" },
                    { data: "office", name: "office" },
                    { data: "old_position_name", name: "old_position_name" },
                    { data: "year", name: "year" },
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
    let table = $("#positionSchedule").DataTable({
        processing: true,
        pagingType: "full_numbers",
        serverSide: true,
        destroy: true,
        retrieve: true,
        columnDefs: [{ width: "10%", targets: 5 }],
        language: {
            processing:
                '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
        },
        ajax: "/position-schedule-list-adjusted",
        columns: [
            { data: "position", name: "position" },
            { data: "item_no", name: "item_no" },
            { data: "sg_no", name: "sg_no" },
            { data: "office", name: "office" },
            { data: "old_position_name", name: "old_position_name" },
            { data: "year", name: "year" },
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
            table = $("#positionSchedule").DataTable({
                processing: true,
                serverSide: true,
                pagingType: "full_numbers",
                columnDefs: [{ width: "10%", targets: 5 }],
                destroy: true,
                retrieve: true,
                language: {
                    processing:
                        '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
                },
                ajax: {
                    url: "/position-schedule-list-adjusted"
                },
                columns: [
                    { data: "position", name: "position" },
                    { data: "item_no", name: "item_no" },
                    { data: "sg_no", name: "sg_no" },
                    { data: "office", name: "office" },
                    { data: "old_position_name", name: "old_position_name" },
                    { data: "year", name: "year" },
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
            table = $("#positionSchedule").DataTable({
                processing: true,
                serverSide: true,
                pagingType: "full_numbers",
                columnDefs: [{ width: "10%", targets: 5 }],
                destroy: true,
                retrieve: true,
                language: {
                    processing:
                        '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
                },
                ajax: {
                    url: `/api/position/schedule/${e.target.value}`
                },
                columns: [
                    { data: "position", name: "position" },
                    { data: "item_no", name: "item_no" },
                    { data: "sg_no", name: "sg_no" },
                    { data: "office", name: "office" },
                    { data: "old_position_name", name: "old_position_name" },
                    { data: "year", name: "year" },
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
$(document).ready(function() {
    $("#cancelbutton1").click(function() {
        $("#add").attr("class", "page-header d-none");
        $("#table").attr("class", "page-header");
    });
});

//get all ids
function LockDepot() {
    let currentYear = document.querySelector("#year").value;
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
                    url: `/api/position/schedule/adjust`,
                    data: {
                        ids: ids.toString(),
                        currentYear: currentYear
                    },
                    success: function(response) {
                        if (response.success) {
                            swal(
                                "Position Schedule Added Successfully",
                                "",
                                "success"
                            );
                            $("#positionList")
                                .DataTable()
                                .ajax.reload();
                            $("#positionSchedule")
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
