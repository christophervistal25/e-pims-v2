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

$(function() {
    $("#maintenanceOffice").DataTable({
        processing: true,
        serverSide: true,
        retrieve: true,
        columnDefs: [{ width: "10%", targets: 7 }],
        ajax: "/maintenance-office-list",
        columns: [
            { data: "office_code", name: "office_code" },
            { data: "office_name", name: "office_name" },
            { data: "office_short_name", name: "office_short_name" },
            { data: "office_address", name: "office_address" },
            { data: "office_short_address", name: "office_short_address" },
            { data: "office_head", name: "office_head" },
            { data: "position_name", name: "position_name" },
            {
                data: "action",
                name: "action",
                searchable: false,
                sortable: false
            }
        ]
    });
});
