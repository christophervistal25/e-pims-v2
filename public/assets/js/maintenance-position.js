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
    $("#maintenancePosition").DataTable({
        processing: true,
        serverSide: true,
        retrieve: true,
        ajax: "/maintenance-position-list",
        columns: [
            { data: "position_name", name: "position_name" },
            { data: "sg_no", name: "sg_no" },
            { data: "position_short_name", name: "position_short_name" },
            {
                data: "action",
                name: "action",
                searchable: false,
                sortable: false
            }
        ]
    });
});
