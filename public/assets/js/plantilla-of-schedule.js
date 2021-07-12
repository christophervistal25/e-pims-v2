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
        ]
    });

    $("#employeeOffice").change(function(e) {
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

    // $("#employeeOffice").change(function(e) {
    //     if (e.target.value == "" || e.target.value == "") {
    //         table.destroy();
    //         table = $("#plantillaList").DataTable({
    //             processing: true,
    //             serverSide: true,
    //             destroy: true,
    //             retrieve: true,
    //             ajax: {
    //                 url: "/plantilla-of-schedule-list"
    //             },
    //             columns: [
    //                 {
    //                     data: "employee",
    //                     name: "employee.firstname",
    //                     searchable: true,
    //                     sortable: false,
    //                     visible: true
    //                 },
    //                 {
    //                     data: "plantillaPosition",
    //                     name: "plantillaPosition",
    //                     searchable: true,
    //                     sortable: false,
    //                     visible: true
    //                 },
    //                 {
    //                     data: "office",
    //                     name: "office.office_short_name",
    //                     searchable: true,
    //                     sortable: false,
    //                     visible: true
    //                 },
    //                 { data: "item_no", name: "item_no" },
    //                 { data: "status", name: "status", sortable: false },
    //                 {
    //                     data: "action",
    //                     name: "action",
    //                     searchable: false,
    //                     sortable: false
    //                 }
    //             ]
    //         });
    //     } else {
    //         table.destroy();
    //         table = $("#plantillaList").DataTable({
    //             processing: true,
    //             serverSide: true,
    //             destroy: true,
    //             retrieve: true,
    //             ajax: {
    //                 url: `/api/plantilla/schedule/${e.target.value}`
    //             },
    //             columns: [
    //                 {
    //                     data: "employee",
    //                     name: "employee.firstname",
    //                     searchable: true,
    //                     sortable: false,
    //                     visible: true
    //                 },
    //                 {
    //                     data: "plantillaPosition",
    //                     name: "plantillaPosition",
    //                     searchable: true,
    //                     sortable: false,
    //                     visible: true
    //                 },
    //                 {
    //                     data: "office",
    //                     name: "office.office_short_name",
    //                     searchable: true,
    //                     sortable: false,
    //                     visible: true
    //                 },
    //                 { data: "item_no", name: "item_no" },
    //                 { data: "status", name: "status", sortable: false },
    //                 {
    //                     data: "action",
    //                     name: "action",
    //                     searchable: false,
    //                     sortable: false
    //                 }
    //             ]
    //         });
    //     }
    // });
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
