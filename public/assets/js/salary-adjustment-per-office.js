$(function() {
    let table = $("#salaryAdjustmentPerOffice").DataTable({
        // processing: true,
        serverSide: true,
        destroy: true,
        retrieve: true,
        paging: false,
        info: false,
        bFilter: false,
        aoColumnDefs: [
            {
                orderable: false,
                className: "d-none",
                aTargets: [0],
                width: "5%",
                targets: 0
            }
        ],
        order: [[1, "asc"]],
        ajax: {
            url: "/salary-adjustment-per-office-list",
            data: function(d) {
                d.employeeOffice = $("#employeeOffice").val();
            }
        },
        columns: [
            {
                data: "checkbox",
                name: "checkbox",
                searchable: false,
                orderable: false,
                sortable: false
                // visible: false
            },
            { data: "employee", name: "employee", visible: false },
            {
                data: "plantilla",
                name: "plantilla.office_code",
                visible: false
            },
            { data: "sg_no", name: "sg_no", visible: false },
            { data: "step_no", name: "step_no", visible: false },
            {
                data: "salary_previous",
                name: "salary_previous",
                visible: false
            },
            { data: "salary_new", name: "salary_new", visible: false },
            { data: "salary_diff", name: "salary_diff", visible: false },
            { data: "action", name: "action", visible: false }
        ]
    });
    $("#employeeOffice").change(function(e) {
        if (e.target.value == "" || e.target.value == "") {
            table.destroy();
            table = $("#salaryAdjustmentPerOffice").DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                retrieve: true,
                paging: false,
                info: false,
                bFilter: false,
                aoColumnDefs: [
                    {
                        orderable: false,
                        className: "",
                        aTargets: [0],
                        width: "5%",
                        targets: 0
                    }
                ],
                order: [[1, "asc"]],
                ajax: {
                    url: "/salary-adjustment-per-office-list",
                    data: function(d) {
                        d.employeeOffice = $("#employeeOffice").val();
                    }
                },
                columns: [
                    {
                        data: "checkbox",
                        name: "checkbox",
                        searchable: false,
                        orderable: false,
                        sortable: false,
                        visible: false
                    },
                    { data: "employee", name: "employee", visible: false },
                    {
                        data: "plantilla",
                        name: "plantilla.office_code",
                        visible: false
                    },
                    { data: "sg_no", name: "sg_no", visible: false },
                    { data: "step_no", name: "step_no", visible: false },
                    {
                        data: "salary_previous",
                        name: "salary_previous",
                        visible: false
                    },
                    { data: "salary_new", name: "salary_new", visible: false },
                    {
                        data: "salary_diff",
                        name: "salary_diff",
                        visible: false
                    },
                    { data: "action", name: "action", visible: false }
                ]
            });
        } else {
            table.destroy();
            table = $("#salaryAdjustmentPerOffice").DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                retrieve: true,
                aoColumnDefs: [
                    {
                        orderable: false,
                        className: "",
                        aTargets: [0],
                        width: "5%",
                        targets: 0
                    }
                ],
                ajax: {
                    url: `/api/office/salary/adjustment/peroffice/${e.target.value}`,
                    data: function(d) {
                        d.employeeName = $("#employeeOffice").val();
                    }
                },
                columns: [
                    {
                        data: "checkbox",
                        name: "checkbox",
                        searchable: false,
                        orderable: false,
                        sortable: false
                    },
                    { data: "employee", name: "employee", visible: true },
                    {
                        data: "plantilla",
                        name: "plantilla.office_code",
                        visible: false
                    },
                    { data: "sg_no", name: "sg_no", visible: true },
                    { data: "step_no", name: "step_no", visible: true },
                    {
                        data: "salary_previous",
                        name: "salary_previous",
                        visible: true
                    },
                    { data: "salary_new", name: "salary_new", visible: true },
                    { data: "salary_diff", name: "salary_diff", visible: true },
                    { data: "action", name: "action", visible: true }
                ]
            });
        }
    });
    $("#selectAll").click(function() {
        // Get all rows with search applied
        var rows = table.rows({ search: "applied" }).nodes();
        // Check/uncheck checkboxes for all rows in the table
        $('input[type="checkbox"]', rows).prop("checked", this.checked);
    });

    // Handle click on checkbox to set state of "Select all" control
    $("#salaryAdjustmentPerOffice tbody").on(
        "change",
        'input[type="checkbox"]',
        function() {
            // If checkbox is not checked
            if (!this.checked) {
                var el = $("#selectAll").get(0);
                // If "Select all" control is checked and has 'indeterminate' property
                if (el && el.checked && "indeterminate" in el) {
                    // Set visual state of "Select all" control
                    // as 'indeterminate'
                    el.indeterminate = true;
                }
            }
        }
    );
});

function ValidateDropDown(dd) {
    if (dd.value == "") {
        document.getElementById("line").style.visibility = "visible";
    } else {
        document.getElementById("line").style.visibility = "hidden";
    }
}

function ValidateDropDown(dd) {
    $("#sample").removeClass("d-none");
}
