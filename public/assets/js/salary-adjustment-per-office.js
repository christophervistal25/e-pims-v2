$(function() {
    let table = $("#salaryAdjustmentPerOffice").DataTable({
        processing: true,
        serverSide: true,
        destroy: true,
        retrieve: true,
        paging: false,
        info: false,
        bFilter: false,
        pagingType: "full_numbers",
        language: {
            processing:
                '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
        },
        ajax: {
            url: "/salary-adjustment-per-office-list"
        },
        columns: [
            {
                data: "date_adjustment",
                name: "date_adjustment",
                visible: false
            },
            {
                data: "office_code",
                name: "office_code",
                visible: false
            },
            { data: "fullname", name: "fullname", visible: false },
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
        let filterYear = document.querySelector("#yearAdjustment").value;
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
                pagingType: "full_numbers",
                language: {
                    processing:
                        '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
                },
                ajax: {
                    url: "/salary-adjustment-per-office-list"
                },
                columns: [
                    {
                        data: "date_adjustment",
                        name: "date_adjustment",
                        visible: false
                    },
                    {
                        data: "office_code",
                        name: "office_code",
                        visible: false
                    },
                    { data: "fullname", name: "fullname", visible: false },
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
                        visible: false
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
                pagingType: "full_numbers",
                language: {
                    processing:
                        '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
                },
                ajax: {
                    url: `/api/office/salary/adjustment/peroffice/${e.target.value}/${filterYear}`
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
        }
    });

    $("#yearAdjustment").change(function(e) {
        let officeCode = document.querySelector("#employeeOffice").value;
        if (officeCode == "" || officeCode == "") {
            swal("Please Select Office", "", "error");
        } else {
            table.destroy();
            table = $("#salaryAdjustmentPerOffice").DataTable({
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
                    url: `/api/office/salary/adjustment/peroffice/${officeCode}/${e.target.value}`
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
        pagingType: "full_numbers",
        language: {
            processing:
                '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
        },
        ajax: {
            url: "/salary-adjustment-per-office-not-selected-list"
        },
        columns: [
            {
                data: "checkbox",
                name: "checkbox",
                searchable: false,
                orderable: false,
                sortable: false
            },
            { data: "fullname", name: "fullname", visible: false },
            { data: "office_code", name: "office_code", visible: false },
            {
                data: "position_name",
                name: "position_name",
                visible: false
            },
            { data: "sg_no", name: "sg_no", visible: false },
            { data: "step_no", name: "step_no", visible: false },
            {
                data: "salary_amount",
                name: "salary_amount",
                visible: false,
                render: $.fn.dataTable.render.number(",", ".", 2)
            }
        ]
    });
    $("#employeeOffice").change(function(e) {
        document.getElementById("selectAll").checked = false;
        if (e.target.value == "" || e.target.value == "") {
            table.destroy();
            table = $("#salaryAdjustmentPerOfficeList").DataTable({
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
                    url: "/salary-adjustment-per-office-not-selected-list"
                },
                columns: [
                    {
                        data: "checkbox",
                        name: "checkbox",
                        searchable: false,
                        orderable: false,
                        sortable: false,
                        ordering: false
                    },
                    { data: "fullname", name: "fullname", visible: true },
                    {
                        data: "office_code",
                        name: "office_code",
                        visible: false
                    },
                    {
                        data: "position_name",
                        name: "position_name",
                        visible: true
                    },
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
        } else {
            table.destroy();
            table = $("#salaryAdjustmentPerOfficeList").DataTable({
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
                    url: `/api/office/salary/adjustment/peroffice/notselected/${e.target.value}/query`
                },
                columns: [
                    {
                        data: "checkbox",
                        name: "checkbox",
                        searchable: false,
                        orderable: false,
                        sortable: false
                    },
                    { data: "fullname", name: "fullname", visible: true },
                    {
                        data: "office_code",
                        name: "office_code",
                        visible: false
                    },
                    {
                        data: "position_name",
                        name: "position_name",
                        visible: true
                    },
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
        }
    });
    $("#selectAll").click(function() {
        // Get all rows with search applied
        var rows = table.rows({ search: "applied" }).nodes();
        // Check/uncheck checkboxes for all rows in the table
        $('input[type="checkbox"]', rows).prop("checked", this.checked);
    });
});

function LockDepot() {
    let date = document.querySelector("#dateAdjustment").value;
    let currentYear = document.querySelector("#year").value;
    let remarks = document.querySelector("#remarks").value;
    $("#saveBtn").attr("disabled", true);
    $("#loading").removeClass("d-none");
    document.getElementById("saving").innerHTML = "Saving . . .";
    if (selectedItemInAdjustmentPerOffice == "") {
        swal("Please Select Employee", "", "error");
        $("#saveBtn").attr("disabled", false);
        $("#loading").addClass("d-none");
        document.getElementById("saving").innerHTML = "Save";
    } else {
        $.ajax({
            type: "POST",
            url: `/api/salary-adjustment-per-office`,
            data: {
                ids: selectedItemInAdjustmentPerOffice.toString(),
                date: date,
                year: currentYear,
                remarks: remarks
            },
            success: function(response) {
                if (response.success) {
                    swal("Sucessfully Added!", "", "success");
                    $("#salaryAdjustmentPerOfficeList")
                        .DataTable()
                        .ajax.reload();
                    $("#salaryAdjustmentPerOffice")
                        .DataTable()
                        .ajax.reload();
                    $("#saveBtn").attr("disabled", false);
                    $("#loading").addClass("d-none");
                    document.getElementById("saving").innerHTML = "Save";
                    $("#selectAll").prop("checked", false);
                    $("#remarks").val("");
                    selectedItemInAdjustmentPerOffice = [];
                }
            },
            error: function(response) {}
        });
    }
}

let selectedItemInAdjustmentPerOffice = [];
$(document).on("change", 'input[type="checkbox"]', function(e) {
    let id = $(this).val();
    let index = selectedItemInAdjustmentPerOffice.indexOf(id);
    if (e.target.value !== "selectAll") {
        if (!selectedItemInAdjustmentPerOffice.includes(e.target.value)) {
            selectedItemInAdjustmentPerOffice.push(e.target.value);
        } else {
            if (index > -1) {
                selectedItemInAdjustmentPerOffice.splice(index, 1);
            }
            $(this).parent().val = "";
        }
    } else {
        let count =
            document.querySelectorAll('input[type="checkbox"]').length - 1;
        for (let check = 1; check <= count; check++) {
            selectedItemInAdjustmentPerOffice.push(
                document.querySelectorAll('input[type="checkbox"]')[check].value
            );
        }
    }
});
