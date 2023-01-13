$(document).ready(function () {
    $("#employeeOffice,#yearAdjustment").change(function (e) {
        let year = $("#yearAdjustment").val();
        let office = $("#employeeOffice").val();
        $("#salaryAdjustmentPerOffice").DataTable().destroy();
        if (office) {
            $("#addButton").prop("disabled", false);
            salaryAdjustmentPerOfficeSelected = $(
                "#salaryAdjustmentPerOffice"
            ).DataTable({
                processing: true,
                destroy: true,
                retrieve: true,
                pagingType: "full_numbers",
                language: {
                    processing:
                        '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> ',
                },
                ajax: {
                    url: `/salaryadjustment-report-with-office/${office}/${year}`,
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
            $("#printButton").prop("disabled", false);
        } else {
            $("#salaryAdjustmentPerOffice").DataTable().clear();
            $("#salaryAdjustmentPerOffice").DataTable().destroy();
            $("#printButton").prop("disabled", true);
        }
    });

    $("#printButton").click(function () {
        let year = $("#yearAdjustment").val();
        let office = $("#employeeOffice").val();
        window.open(`print-adjustment-report/${office}/${year}/previewed`, "_blank");
    });
});
