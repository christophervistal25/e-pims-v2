// display salary grade
// $(function() {
// var table = $("#salaryAdjustmentPerOffice").DataTable({
//     processing: true,
//     bPaginate: false,
//     bLengthChange: false,
//     bInfo: false,
//     serverSide: true,
//     destroy: true,
//     retrieve: true,
//     aoColumnDefs: [
//         {
//             orderable: false,
//             aTargets: [0]
//         }
//     ],
//     order: [[1, "asc"]],
//     ajax: "/salary-adjustment-per-office-list",
//     columns: [
//         {
//             data: "checkbox",
//             name: "checkbox",
//             searchable: false,
//             orderable: false,
//             sortable: false
//         },
//         { data: "employee", name: "employee" },
//         { data: "sg_no", name: "sg_no" },
//         { data: "step_no", name: "step_no" },
//         { data: "salary_previous", name: "salary_previous" },
//         { data: "salary_new", name: "salary_new" },
//         { data: "salary_diff", name: "salary_diff" },
//         { data: "plantilla", name: "plantilla.office_code" },
//         { data: "action", name: "action" }
//     ]
// });

//     $("#selectAll").click(function() {
//         // Get all rows with search applied
//         var rows = table.rows({ search: "applied" }).nodes();
//         // Check/uncheck checkboxes for all rows in the table
//         $('input[type="checkbox"]', rows).prop("checked", this.checked);
//     });

//     // Handle click on checkbox to set state of "Select all" control
//     $("#salaryAdjustmentPerOffice tbody").on(
//         "change",
//         'input[type="checkbox"]',
//         function() {
//             // If checkbox is not checked
//             if (!this.checked) {
//                 var el = $("#selectAll").get(0);
//                 // If "Select all" control is checked and has 'indeterminate' property
//                 if (el && el.checked && "indeterminate" in el) {
//                     // Set visual state of "Select all" control
//                     // as 'indeterminate'
//                     el.indeterminate = true;
//                 }
//             }
//         }
//     );
// });

$(function() {
    let table = $("#salaryAdjustmentPerOffice").DataTable({
        // processing: true,
        serverSide: true,
        destroy: true,
        retrieve: true,
        paging: false,
        info: false,
        bFilter: false,
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
            { data: "plantilla", name: "plantilla", visible: false },
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
                    },
                    { data: "employee", name: "employee" },
                    { data: "sg_no", name: "sg_no" },
                    { data: "step_no", name: "step_no" },
                    { data: "salary_previous", name: "salary_previous" },
                    { data: "salary_new", name: "salary_new" },
                    { data: "salary_diff", name: "salary_diff" },
                    { data: "plantilla", name: "plantilla.office_code" },
                    { data: "action", name: "action" }
                ]
            });
        } else {
            table.destroy();
            table = $("#salaryAdjustmentPerOffice").DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                retrieve: true,
                ajax: {
                    url: `/api/office/salary/adjustment/${e.target.value}`,
                    data: function(d) {
                        d.employeeName = $("#employeeName").val();
                    }
                },
                columns: [
                    {
                        data: "employee_id",
                        name: "employee_id",
                        visible: false
                    },
                    { data: "service_from_date", name: "service_from_date" },
                    { data: "service_to_date", name: "service_to_date" },
                    { data: "position", name: "position" },
                    { data: "status", name: "status" },
                    { data: "salary", name: "salary" },
                    { data: "office", name: "office" },
                    { data: "leave_without_pay", name: "leave_without_pay" },
                    { data: "separation_date", name: "separation_date" },
                    { data: "separation_cause", name: "separation_cause" },
                    { data: "action", name: "action" }
                ]
            });
        }
    });
});
