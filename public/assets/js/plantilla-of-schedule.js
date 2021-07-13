$(function() {
    let table = $("#plantillaList").DataTable({
        processing: true,
        serverSide: true,
        ajax: "/plantilla-of-schedule-list",
        columns: [
            { data: "plantilla_id", name: "plantilla_id" },
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
                    { data: "plantilla_id", name: "plantilla_id" },
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
                    { data: "plantilla_id", name: "plantilla_id" },
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
    if ((coveredYear == "") | (ids == "")) {
        swal("Please Select Employee", "", "error");
        $("#saveBtn").attr("disabled", false);
        $("#loading").addClass("d-none");
    } else {
        $.ajax({
            type: "POST",
            url: `/api/plantilla/schedule/adjust`,
            data: {
                ids: ids.toString(),
                coveredYear: coveredYear
            },
            success: function(response) {
                if (response.success) {
                    swal("Sucessfully Added!", "", "success");
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
    }
}
