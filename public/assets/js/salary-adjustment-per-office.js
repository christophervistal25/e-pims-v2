function ValidateDropDown(dropDown) {
    let input = document.querySelector("#addButton");
    let line = document.querySelector("#line");

    input.disabled = !dropDown.value;
    line.visibility = !dropDown.value;
}

$(document).ready(function () {
    $("#employeeOffice").change(function (e) {
        const FIRST_ELEMENT_OF_SELECT = 0;
        let year = $("#yearAdjustment").val();
        let office = $("#employeeOffice").val();

        let plantilla = $("#employeeOffice option:selected")[
            FIRST_ELEMENT_OF_SELECT
        ].getAttribute("data-plantilla");
        $("#officeAdjustment").html(plantilla || "");

        if (employeeOffice) {
            salaryAdjustmentPerOfficeSelected = $(
                "#salaryAdjustmentPerOffice"
            ).DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                retrieve: true,
                pagingType: "full_numbers",
                language: {
                    processing:
                        '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> ',
                },
                ajax: {
                    url: `/api/salary-adjustment-per-office/plantilla-with-adjustment/${office}/${year}`,
                },
                columns: [
                    {
                        data: "date_adjustment",
                        name: "date_adjustment",
                        render: function (_, _, row) {
                            let [adjustment] = row.salary_adjustment;
                            return adjustment.date_adjustment;
                        },
                    },
                    {
                        data: "office_code",
                        name: "office_code",
                        visible: false,
                    },
                    {
                        data: "fullname",
                        name: "fullname",
                        render: function (_, _, row) {
                            return row.employee.fullname;
                        },
                    },
                    {
                        data: "sg_no",
                        name: "sg_no",
                        render: function (_, _, row) {
                            let [adjustment] = row.salary_adjustment;
                            return adjustment.sg_no;
                        },
                    },
                    {
                        data: "step_no",
                        name: "step_no",
                        render: function (_, _, row) {
                            let [adjustment] = row.salary_adjustment;
                            return adjustment.step_no;
                        },
                    },
                    {
                        data: "salary_previous",
                        name: "salary_previous",
                        render: function (_, _, row) {
                            let [adjustment] = row.salary_adjustment;
                            return adjustment.salary_previous;
                        },
                    },
                    {
                        data: "salary_new",
                        name: "salary_new",
                        render: function (_, _, row) {
                            let [adjustment] = row.salary_adjustment;
                            return adjustment.salary_new;
                        },
                    },
                    {
                        data: "salary_diff",
                        name: "salary_diff",
                        render: function (_, _, row) {
                            let [adjustment] = row.salary_adjustment;
                            return adjustment.salary_diff;
                        },
                    },
                ],
            });
        }
    });

    $("#addButton").click(function () {
        let year = $("#yearAdjustment").val();
        let office = $("#employeeOffice").val();

        $("#add").attr("class", "page-header");
        $("#table").attr("class", "page-header d-none");
        salaryAdjustmentPerOfficeNotSelected = $(
            "#salaryAdjustmentPerOfficeList"
        ).DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            retrieve: true,
            pagingType: "full_numbers",
            language: {
                processing:
                    '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> ',
            },
            ajax: {
                url: `/api/salary-adjustment-per-office/plantilla-without-adjustment/${office}/${year}`,
            },
            columns: [
                {
                    data: "checkbox",
                    name: "checkbox",
                    searchable: false,
                    orderable: false,
                    sortable: false,
                },
                {
                    data: "fullname",
                    name: "fullname",
                    visible: true,
                    render: function (_, _, row) {
                        return row.employee.fullname;
                    },
                },
                {
                    data: "office.office_code",
                    name: "office.office_code",
                    visible: false,
                },
                {
                    data: "plantilla.pp_id",
                    name: "position_name",
                    render: function (_, _, row) {
                        let { plantilla_positions } = row;
                        return plantilla_positions.position.Description;
                    },
                },
                {
                    data: "sg_no",
                    name: "sg_no",
                },
                {
                    data: "step_no",
                    name: "step_no",
                },
                {
                    data: "salary_amount",
                    name: "salary_amount",
                    visible: true,
                    render: $.fn.dataTable.render.number(",", ".", 2),
                },
            ],
        });
    });

    $("#cancelButton").click(function () {
        $("#add").attr("class", "page-header d-none");
        $("#table").attr("class", "page-header");
    });

    $("#selectAll").click(function (e) {
        // Get all rows with search applied
        let rows = salaryAdjustmentPerOfficeNotSelected
            .rows({ search: "applied" })
            .nodes();
        // Check/uncheck checkboxes for all rows in the table
        $('input[type="checkbox"]', rows).prop("checked", this.checked);
    });

    $("#saveBtn").click(function () {
        let date = $("#dateAdjustment").val();
        let currentYear = $("#year").val();
        let remarks = $("#remarks").val();
        let selectedRecordIDS = [];

        $("#saveBtn").attr("disabled", true);
        $("#loading").removeClass("d-none");
        $("#saving").html("Saving . . . ");

        $(".not-select-checkbox").each(function (index, element) {
            if (element.checked == true) {
                selectedRecordIDS.push(element.value);
            }
        });

        if (selectedRecordIDS.length == 0) {
            swal("Please Select Employee", "", "error");
            $("#saveBtn").attr("disabled", false);
            $("#loading").addClass("d-none");
            $("#saving").html("Save");
        } else {
            $.ajax({
                type: "POST",
                url: `/api/salary-adjustment-per-office/AddData`,
                data: {
                    ids: selectedRecordIDS.toString(),
                    date: date,
                    year: currentYear,
                    remarks: remarks,
                },
                success: function (response) {
                    if (response.success) {
                        swal("Successfully Added!", "", "success");
                        salaryAdjustmentPerOfficeSelected.ajax.reload();
                        salaryAdjustmentPerOfficeNotSelected.ajax.reload();
                        $("#saveBtn").attr("disabled", false);
                        $("#loading").addClass("d-none");
                        $("#saving").html("Save");
                        $("#selectAll").prop("checked", false);
                        $("#remarks").val("");
                    }
                },
            });
        }
    });
});
