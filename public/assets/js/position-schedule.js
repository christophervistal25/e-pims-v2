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
    // cancel button
    $("#cancelbutton1").click(function() {
        $("#add").attr("class", "page-header d-none");
        $("#table").attr("class", "page-header");
    });
    //get all ids and save all data
    $("#saveBtn").click(function() {
        let currentYear = document.querySelector("#year").value;
        let yearValue = new Date().getFullYear() - 1;
        $("#saveBtn").attr("disabled", true);
        $("#loading").removeClass("d-none");
        $("#post").html("Posting . . .");
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
            $("#post").html("Post");
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
                                $("#positionSchedule")
                                    .DataTable()
                                    .ajax.reload();
                                $("#positionList")
                                    .DataTable()
                                    .ajax.reload();
                                $("#saveBtn").attr("disabled", false);
                                $("#loading").addClass("d-none");
                                $("#post").html("Post");
                                ids = [];
                                $("#yearFilter").append(
                                    "<option value=" +
                                        yearValue +
                                        ">" +
                                        yearValue +
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
                    $("#post").html("Post");
                }
            });
        }
    });
    // position schedule list
    let checker = document.querySelector("#yearFilter").value;
    if (!checker) {
        var yearFilterSelectedOffice = new Date().getFullYear();
    } else {
        var yearFilterSelectedOffice = document.querySelector("#yearFilter")
            .value;
    }
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
        ajax: `/position-schedule-list-adjusted/${yearFilterSelectedOffice}`,
        columns: [
            {
                data: "position_name",
                name: "position_name"
            },
            { data: "item_no", name: "item_no" },
            {
                data: "sg_no",
                name: "sg_no"
            },
            { data: "office_name", name: "office_name" },
            { data: "old_position_name", name: "old_position_name" },
            { data: "year", name: "year" }
        ]
    });

    $("#officeCode").change(function(e) {
        if (e.target.value == "") {
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
                    url: `/position-schedule-list-adjusted/${yearFilterSelectedOffice}`
                },
                columns: [
                    {
                        data: "position_name",
                        name: "position_name"
                    },
                    { data: "item_no", name: "item_no" },
                    {
                        data: "sg_no",
                        name: "sg_no"
                    },
                    { data: "office_name", name: "office_name" },
                    { data: "old_position_name", name: "old_position_name" },
                    { data: "year", name: "year" }
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
                    url: `/api/position/schedule/${e.target.value}/${yearFilterSelectedOffice}`
                },
                columns: [
                    {
                        data: "position_name",
                        name: "position_name"
                    },
                    { data: "item_no", name: "item_no" },
                    {
                        data: "sg_no",
                        name: "sg_no"
                    },
                    { data: "office_name", name: "office_name" },
                    { data: "old_position_name", name: "old_position_name" },
                    { data: "year", name: "year" }
                ]
            });
        }
    });

    $("#yearFilter").change(function(e) {
        let yearFilterSelectedOffice2 = document.querySelector("#officeCode")
            .value;
        if (e.target.value == "") {
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
                    url: `/position-schedule-list-adjusted/${e.target.value}`
                },
                columns: [
                    {
                        data: "position_name",
                        name: "position_name"
                    },
                    { data: "item_no", name: "item_no" },
                    {
                        data: "sg_no",
                        name: "sg_no"
                    },
                    { data: "office_name", name: "office_name" },
                    { data: "old_position_name", name: "old_position_name" },
                    { data: "year", name: "year" }
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
                    url: `/api/position/schedule/${yearFilterSelectedOffice2}/${e.target.value}`
                },
                columns: [
                    {
                        data: "position_name",
                        name: "position_name"
                    },
                    { data: "item_no", name: "item_no" },
                    {
                        data: "sg_no",
                        name: "sg_no"
                    },
                    { data: "office_name", name: "office_name" },
                    { data: "old_position_name", name: "old_position_name" },
                    { data: "year", name: "year" }
                ]
            });
        }
    });
    // list to be adjusted in position schedule
    let tableToBeSelect = $("#positionList").DataTable({
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
            {
                data: "position_name",
                name: "position_name"
            },
            { data: "item_no", name: "item_no" },
            {
                data: "sg_no",
                name: "sg_no"
            },
            { data: "office_name", name: "office_name" },
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
        if (e.target.value == "") {
            tableToBeSelect.destroy();
            tableToBeSelect = $("#positionList").DataTable({
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
                    {
                        data: "position_name",
                        name: "position_name"
                    },
                    { data: "item_no", name: "item_no" },
                    {
                        data: "sg_no",
                        name: "sg_no"
                    },
                    { data: "office_name", name: "office_name" },
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
            tableToBeSelect.destroy();
            tableToBeSelect = $("#positionList").DataTable({
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
                    {
                        data: "position_name",
                        name: "position_name"
                    },
                    { data: "item_no", name: "item_no" },
                    {
                        data: "sg_no",
                        name: "sg_no"
                    },
                    { data: "office_name", name: "office_name" },
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
