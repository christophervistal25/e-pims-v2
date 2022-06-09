$(document).ready(function () {
    // code for show add form
    $("#btnCreatePlantillaSchedule").click(function () {
        $("#officePlantillaList").trigger("change");

        $("#add").attr("class", "page-header");
        $("#table").attr("class", "page-header d-none");
    });
    // code for show table
    $("#cancelButton").click(function () {
        $("#add").attr("class", "page-header d-none");
        $("#table").attr("class", "page-header");
    });

    // save all ids and save
    $("#btnPostPlantillaSchedule").click(function () {
        let coveredYear = parseInt($("#currentYear").val()) + 1;

        $("#btnPostPlantillaSchedule").attr("disabled", true);

        $("#loading").removeClass("d-none");

        document.getElementById("post").innerHTML = "Posting . . .";

        let ids = [];
        $(".present_element").each(function (key, element) {
            if (element.getAttribute("data-id")) {
                ids.push($(element).attr("data-id"));
            }
        });

        ids = [...new Set(ids)];

        if (ids.length === 0) {
            swal({
                title: "",
                text: "No data available on table",
                icon: "warning",
                buttons: false,
                timer: 5000,
            });
            $("#btnPostPlantillaSchedule").attr("disabled", false);
            $("#loading").addClass("d-none");
            $("#post").text("Post");
        } else {
            swal({
                title: "Are you sure you?",
                text: "Once posted, you will not be able to undo the process!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willPost) => {
                if (willPost) {
                    $.ajax({
                        type: "POST",
                        url: `/plantilla-of-schedule-store`,
                        data: {
                            ids: ids,
                            coveredYear: coveredYear,
                        },
                        success: function (response) {
                            if (response.success) {
                                ids = [];

                                swal({
                                    icon: "success",
                                    title: "",
                                    text: "Plantilla schedule added successfully",
                                });

                                $("#plantillaList").DataTable().ajax.reload();

                                $("#plantillaOfSchedule")
                                    .DataTable()
                                    .ajax.reload();

                                $("#btnPostPlantillaSchedule").removeAttr(
                                    "disabled"
                                );

                                $("#loading").addClass("d-none");
                                $("#post").text("Post");

                                $("#yearFilter").prepend(
                                    "<option value=" +
                                        coveredYear +
                                        ">" +
                                        coveredYear +
                                        "</option>"
                                );

                                $("#yearFilter").selectpicker("refresh");
                            }
                        },
                        error: function (response) {},
                    });
                } else {
                    $("#btnCreatePlantillaSchedule").removeAttr("disabled");
                    $("#loading").addClass("d-none");
                    $("#post").text("Post");
                }
            });
        }
    });

    let plantillaScheduleTable = $("#plantillaOfSchedule").DataTable({
        processing: true,
        serverSide: true,
        destroy: true,
        retrieve: true,
        pagingType: "full_numbers",
        stateSave: true,
        language: {
            processing:
                '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> ',
        },
        ajax: {
            url: `/plantilla-of-schedule-list/*/*`,
        },
        columns: [
            {
                data: "employee.fullname",
                name: "employee.fullname",
                searchable: true,
                sortable: false,
                visible: true,
            },
            {
                data: "plantilla_positions.old_position_name",
                name: "plantilla_positions.old_position_name",
                searchable: true,
                sortable: false,
                visible: true,
            },
            {
                data: "office.office_name",
                name: "office.office_name",
                searchable: true,
                sortable: false,
                visible: true,
            },
            { data: "item_no", name: "item_no" },
            { data: "status", name: "status", sortable: false },
            { data: "year", name: "year", sortable: false },
            {
                data: "action",
                name: "action",
                searchable: false,
                sortable: false,
            },
        ],
    });

    let createPlantillaScheduleTable = $("#plantillaList").DataTable({
        processing: true,
        serverSide: true,
        destroy: true,
        retrieve: true,
        pagingType: "full_numbers",
        stateSave: true,
        language: {
            processing:
                '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> ',
        },
        ajax: {
            url: `/plantilla-of-schedule-list/*/${$("#currentYear").val()}`,
        },
        columns: [
            {
                data: "employee.fullname",
                name: "employee.fullname",
                searchable: true,
                sortable: false,
                visible: true,
            },
            {
                data: "plantilla_positions.old_position_name",
                name: "plantilla_positions.old_position_name",
                searchable: true,
                sortable: false,
                visible: true,
            },
            {
                data: "office.office_name",
                name: "office.office_name",
                searchable: true,
                sortable: false,
                visible: true,
            },
            { data: "item_no", name: "item_no" },
            { data: "status", name: "status", sortable: false },
            { data: "year", name: "year", sortable: false },
            {
                data: "action",
                name: "action",
                searchable: false,
                sortable: false,
            },
        ],
    });

    $("#officeCode").change(function () {
        let selectedOffice = $(this).val();
        let selectedYear = $("#yearFilter").val();
        $("#officePlantillaList").val(selectedOffice).trigger("change");
        plantillaScheduleTable.ajax
            .url(
                `plantilla-of-schedule-list/${selectedOffice || "*"}/${
                    selectedYear || "*"
                }`
            )
            .load();
    });

    $("#yearFilter").change(function () {
        let selectedOffice = $("#officeCode").val();
        let selectedYear = $(this).val();
        plantillaScheduleTable.ajax
            .url(
                `plantilla-of-schedule-list/${selectedOffice || "*"}/${
                    selectedYear || "*"
                }`
            )
            .load();
    });

    $("#officePlantillaList").change(function () {
        let selectedOffice = $(this).val();
        let currentYear = $("#currentYear").val();
        createPlantillaScheduleTable.ajax
            .url(
                `plantilla-of-schedule-list/${selectedOffice || "*"}/${
                    currentYear || "*"
                }`
            )
            .load();
    });
});
