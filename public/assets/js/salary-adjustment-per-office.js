$(function() {
    let table = $("#salaryAdjustmentPerOffice").DataTable({
        processing: true,
        serverSide: true,
        destroy: true,
        retrieve: true,
        paging: false,
        info: false,
        bFilter: false,
        ajax: {
            url: "/salary-adjustment-per-office-list"
        },
        columns: [
            { data: "employee", name: "employee", visible: false },
            {
                data: "plantilla",
                name: "plantilla.office_code",
                visible: false
            },
            {
                data: "date_adjustment",
                name: "date_adjustment",
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
                ajax: {
                    url: "/salary-adjustment-per-office-list"
                },
                columns: [
                    { data: "employee", name: "employee", visible: false },
                    {
                        data: "plantilla",
                        name: "plantilla.office_code",
                        visible: false
                    },
                    {
                        data: "date_adjustment",
                        name: "date_adjustment",
                        visible: false
                    },
                    { data: "sg_no", name: "sg_no", visible: false },
                    { data: "step_no", name: "step_no", visible: false },
                    {
                        data: "salary_previous",
                        name: "salary_previous",
                        visible: false,
                        render: $.fn.dataTable.render.number(",", ".", 2)
                    },
                    {
                        data: "salary_new",
                        name: "salary_new",
                        visible: false,
                        render: $.fn.dataTable.render.number(",", ".", 2)
                    },
                    {
                        data: "salary_diff",
                        name: "salary_diff",
                        visible: false
                    },
                    {
                        data: "action",
                        name: "action",
                        visible: false,
                        render: $.fn.dataTable.render.number(",", ".", 2)
                    }
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
                    url: `/api/office/salary/adjustment/peroffice/${e.target.value}`
                },
                columns: [
                    { data: "employee", name: "employee", visible: true },
                    {
                        data: "plantilla",
                        name: "plantilla.office_code",
                        visible: false
                    },
                    {
                        data: "date_adjustment",
                        name: "date_adjustment",
                        visible: true
                    },
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
        }
    });
});

function ValidateDropDown(dd) {
    // $("#sample").removeClass("d-none");
    //disable button
    var input = document.getElementById("addbutton");
    if (dd.value == "") {
        input.disabled = true;
    } else {
        input.disabled = false;
    }
    //hide line
    if (dd.value == "") {
        document.getElementById("line").style.visibility = "visible";
    } else {
        document.getElementById("line").style.visibility = "hidden";
    }
}

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

// get value office
$(document).ready(function() {
    $("#employeeOffice").change(function(e) {
        let office = e.target.value;
        let plantilla = $($("#employeeOffice option:selected")[0]).attr(
            "data-plantilla"
        );
        if (plantilla) {
            console.log(plantilla);
            document.getElementById("officeAdjustment").innerHTML = plantilla;
        } else {
            $("#officeAdjustment").text("");
        }
    });
});

$(function() {
    let table = $("#salaryAdjustmentPerOfficeList").DataTable({
        processing: true,
        serverSide: true,
        destroy: true,
        retrieve: true,
        ajax: {
            url: "/salary-adjustment-per-office-not-selected-list"
        },
        columns: [
            { data: "employee", name: "employee", visible: true },
            { data: "position", name: "position", visible: true },
            { data: "sg_no", name: "sg_no", visible: true },
            { data: "step_no", name: "step_no", visible: true },
            {
                data: "salary_amount",
                name: "salary_amount",
                visible: true,
                render: $.fn.dataTable.render.number(",", ".", 2)
            }
        ]
    });
});
