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
