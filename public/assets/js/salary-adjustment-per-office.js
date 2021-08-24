function ValidateDropDown(dropDown) {
    let input = document.querySelector("#addButton");
    let line = document.querySelector("#line");

    input.disabled = !dropDown.value;
    line.visibility = !dropDown.value;
}

$(document).ready(function() {
    // Initialization of Datatables to display "No data available in table".
    let salaryAdjustmentPerOfficeSelected = $(
        "#salaryAdjustmentPerOffice"
    ).DataTable();
    let salaryAdjustmentPerOfficeNotSelected = $(
        "#salaryAdjustmentPerOfficeList"
    ).DataTable();

    $("#employeeOffice").change(function(e) {
        let filterYear = $("#yearAdjustment").val();
        let employeeOffice = $("#employeeOffice").val();
        const FIRST_ELEMENT_OF_SELECT = 0;
        let plantilla = $("#employeeOffice option:selected")[
            FIRST_ELEMENT_OF_SELECT
        ].getAttribute("data-plantilla");
        $("#officeAdjustment").html(plantilla || "");

        if (employeeOffice) {
            salaryAdjustmentPerOfficeSelected.destroy();
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
                        '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
                },
                ajax: {
                    url: `/api/office/salary/adjustment/peroffice/${employeeOffice}/${filterYear}`
                },
                columns: [
                    {
                        data: "date_adjustment",
                        name: "date_adjustment",
                        visible: true
                    },
                    {
                        data: "office_code",
                        name: "office_code",
                        visible: false
                    },
                    { data: "fullname", name: "fullname", visible: true },
                    { data: "sg_no", name: "sg_no", visible: true },
                    { data: "step_no", name: "step_no", visible: true },
                    {
                        data: "salary_previous",
                        name: "salary_previous",
                        visible: true,
                        render: $.fn.dataTable.render.number(",", ".", 2)
                    },
                    {
                        data: "salary_new",
                        name: "salary_new",
                        visible: true,
                        render: $.fn.dataTable.render.number(",", ".", 2)
                    },
                    {
                        data: "salary_diff",
                        name: "salary_diff",
                        visible: true,
                        render: $.fn.dataTable.render.number(",", ".", 2)
                    },
                    { data: "action", name: "action", visible: true }
                ]
            });

            // Salary adjustment list (NOT SELECTED)
            salaryAdjustmentPerOfficeNotSelected.destroy();
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
                        '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
                },
                ajax: {
                    url: `/api/office/salary/adjustment/peroffice/notselected/${employeeOffice}/query`
                },
                columns: [
                    {
                        data: "checkbox",
                        name: "checkbox",
                        searchable: false,
                        orderable: false,
                        sortable: false
                    },
                    {
                        data: "fullname",
                        name: "fullname",
                        visible: true
                    },
                    {
                        data: "plantilla.office_code",
                        name: "office_code",
                        visible: false
                    },
                    {
                        data:
                            "plantilla.plantilla_position.position.position_name",
                        name: "position_name",
                        defaultContent: ""
                    },
                    {
                        data: "plantilla.sg_no",
                        name: "sg_no"
                    },
                    {
                        data: "plantilla.step_no",
                        name: "step_no"
                    },
                    {
                        data: "plantilla.salary_amount",
                        name: "salary_amount",
                        visible: true,
                        render: $.fn.dataTable.render.number(",", ".", 2)
                    }
                ]
            });
        } else {
            // Clear the data
        }
    });

    $("#addButton").click(function() {
        $("#add").attr("class", "page-header");
        $("#table").attr("class", "page-header d-none");
    });

    $("#cancelButton").click(function() {
        $("#add").attr("class", "page-header d-none");
        $("#table").attr("class", "page-header");
    });

    $("#selectAll").click(function(e) {
        // Get all rows with search applied
        let rows = salaryAdjustmentPerOfficeNotSelected
            .rows({ search: "applied" })
            .nodes();
        // Check/uncheck checkboxes for all rows in the table
        $('input[type="checkbox"]', rows).prop("checked", this.checked);
    });

    $("#saveBtn").click(function() {
        let date = $("#dateAdjustment").val();
        let currentYear = $("#year").val();
        let remarks = $("#remarks").val();
        let selectedRecordIDS = [];

        $("#saveBtn").attr("disabled", true);
        $("#loading").removeClass("d-none");
        $("#saving").html("Saving . . . ");

        $(".not-select-checkbox").each(function(index, element) {
            if (element.checked == true) {
                selectedRecordIDS.push(element.value);
            }
        });

        if (selectedRecordIDS.length < 0) {
            swal("Please Select Employee", "", "error");
            $("#saveBtn").attr("disabled", false);
            $("#loading").removeClass("d-none");
            $("#saving").html("Save");
        } else {
            $.ajax({
                type: "POST",
                url: `/api/salary-adjustment-per-office`,
                data: {
                    ids: selectedRecordIDS.toString(),
                    date: date,
                    year: currentYear,
                    remarks: remarks
                },
                success: function(response) {
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
                }
            });
        }
    });
});
