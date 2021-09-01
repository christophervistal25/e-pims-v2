$(function() {
    let table = $('#compensatory-leave-table').DataTable({
                ordering: false,
                paging: false,
                info: false,
                searching: true,
                language: {
                    processing:
                        '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
                }
    });

    $("#year_filter").change(function() {
        let empID = $("#employeeName").val();
        $('#employeeName').val(empID).trigger('change');
    });

    $("#employeeName").change(function(e) {
        let empID = e.target.value;
        let year_filter = $('#year_filter').val();
        let [selectedItem] = $("#employeeName option:selected");
        dates = [];

        let employeeOffice = selectedItem.getAttribute('data-office') || '';
        let employeePosition = selectedItem.getAttribute('data-position') || '';
        let photo = selectedItem.getAttribute('data-photo') || '';
        let employeeId = selectedItem.getAttribute('data-employeeId') || '';
        $('.year_filter, .forfeited').removeClass('d-none');
    
        $('#office').val(employeeOffice);
        $('#position').val(employeePosition);
        if(empID == ''){
            $('#empPhoto').attr('src','/storage/employee_images/no-image.png');
        }else{
            $('#empPhoto').attr('src','/storage/employee_images/'+photo);
        }
        $('#employeeId').val(employeeId);

        if (empID === "") {
            table.destroy();
            table = $('#compensatory-leave-table').DataTable({
                processing: true,
                ordering: false,
                paging: false,
                info: false,
                searching: false,
                language: {
                    processing:
                        '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
                },
                ajax: `/employee/leave/compensatory-build-up`,
                columns: [
                    { data: "date_added", name: "date_added", visible: false},
                    { data: "earned", name: "earned", visible: false },
                    { data: "availed", name: "availed", visible: false },
                    {
                        data: "action",
                        name: "action",
                        searchable: false,
                        sortable: false,
                        visible: false 
                    }
                ]
            });
            $('#totalComBal').val('0');
            $('#selectEmployee').removeClass('d-none');
        } else {
            table.destroy();
            table = $('#compensatory-leave-table').DataTable({
                processing: true,
                serverSide: true,
                ordering: false,
                paging: false,
                info: false,
                searching: false,
                select: 'multi',
                language: {
                    processing:
                        '<i style="color:#FF9B44" class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
                },
                ajax: {
                    url: `/employee/leave/compensatory-build-up/${empID}/${year_filter}`
                },  
                columns: [
                    { 
                        data: "date_added", name: "date_added", className:"date_added_cell",
                    },
                    { data: "earned", name: "earned",
                        render : function (data, type, row) {
                            if (row.earned == 0 ) {
                                return '-';
                            } else {
                                return row.earned;
                            }
                        }
                    },
                    { data: "availed", name: "availed", 
                        render : function (data, type, row) {
                            if (row.availed == 0 ) {
                                return '-';
                            } else {
                                return row.availed;
                            }
                        }
                    },
                    {
                        data: "action",
                        name: "action",
                        searchable: false,
                        sortable: false
                    }
                ],
                "footerCallback": function ( row, data, start, end, display ) {
                    var api = this.api(), data;
                        
                    var totalEarned = api
                            .column( 1 )
                            .data()
                            .reduce( function (a, b) {
                                return parseFloat(a) + parseFloat(b);
                            }, 0 );
                            
                    var totalAvailed = api
                            .column( 2 )
                            .data()
                            .reduce( function (a, b) {
                                return parseFloat(a) + parseFloat(b);
                            }, 0 );
                    var totalComBal = totalEarned - totalAvailed;
                    // Update footer by showing the total with the reference of the column index 
                    $( api.column( 0 ).footer() ).html('Total');
                    $( api.column( 1 ).footer() ).html(totalEarned);
                    $( api.column( 2 ).footer() ).html(totalAvailed);
                    $('#totalComBal').val(totalComBal);
                    let curYear = getYear(new Date());  
                    if(totalEarned == 0 && totalAvailed == 0){
                        $('#forfeited').prop('disabled', true);
                        $('#btnEarn, #btnAvail').prop('disabled', false);
                    }else{
                        if($('#year_filter').val() < curYear){
                            $('#forfeited, #btnEarn, #btnAvail').prop('disabled', true);
                        }else{
                            $('#forfeited, #btnEarn, #btnAvail').prop('disabled', false);
                        }
                    }
                }
            }); 
            $('#selectEmployee').addClass('d-none');
            forfeited(empID, year_filter);
        }
        
    });
});

let selectedDate = null;

function forfeited(id, year){
    $.ajax({
        url: 'leave/compensatory-build-up/forfeited/' + id + '/' + year,
        type: 'get',
        dataType: 'json',
        success: function(response){
            
            if(response['data'] == 0){
                $('#forfeited').prop('checked', false);
            }else{
                $('#forfeited').prop('checked', true);
                $('#btnEarn, #btnAvail').prop('disabled', true);
            }
        }
    });
}

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
}

function getYear(date) {
    var d = new Date(date),
        year = d.getFullYear();

    return year;
}

//MODAL FUNCTIONS
let overtimeType = document.querySelector('#overtime_type');
let hours_rendered = document.querySelector('#hours_rendered');
let comEarned = document.querySelector('#earned');

let edit_overtimeType = document.querySelector('#edit_overtime_type');
let edit_hours_rendered = document.querySelector('#edit_hours_rendered');
let edit_comEarned = document.querySelector('#edit_earned');
let year_filter = document.querySelector('#year_filter');

                
overtimeType.addEventListener("change", function(){
    if(overtimeType.value == "weekdays"){
        comEarned.value = (parseFloat(hours_rendered.value) * 1.0).toFixed(3);
    }else{
        comEarned.value = (parseFloat(hours_rendered.value) * 1.5).toFixed(3);
    }
})

hours_rendered.addEventListener("keyup", function(){
    if(overtimeType.value == "weekdays"){
        comEarned.value = (parseFloat(hours_rendered.value) * 1.0).toFixed(3);
    }else{
        comEarned.value = (parseFloat(hours_rendered.value) * 1.5).toFixed(3);
    }
});

edit_overtimeType.addEventListener("change", function(){
    if(edit_overtimeType.value == "weekdays"){
        edit_comEarned.value = (parseFloat(edit_hours_rendered.value) * 1.0).toFixed(3);
    }else{
        edit_comEarned.value = (parseFloat(edit_hours_rendered.value) * 1.5).toFixed(3);
    }
})

edit_hours_rendered.addEventListener("keyup", function(){
    if(edit_overtimeType.value == "weekdays"){
        edit_comEarned.value = (parseFloat(edit_hours_rendered.value) * 1.0).toFixed(3);
    }else{
        edit_comEarned.value = (parseFloat(edit_hours_rendered.value) * 1.5).toFixed(3);
    }
});

// TRANSITION OF FORM TO TABLE
$('#addBtn').click( ()=> {
    let employeeID = '';
    $('#employeeName').val(employeeID).trigger('change');
    $('#compensatoryleavesTable, .year_filter, .forfeited').addClass('d-none');
    $('#selectEmployee, #compensatoryLeaveCard').removeClass('d-none');
    $('#totalComBal').val('0');
});

$(document).on('click', '.btn__edit__view__compensatory', function (e) {
    let employeeID = $(this).attr('data-id');
    if(employeeID) {
        $('#employeeName').val(employeeID).trigger('change');
        $('#compensatoryleavesTable').addClass('d-none');
        $('#compensatoryLeaveCard').removeClass('d-none'); 
    }
});

$('#editCompensatoryLeave').on('hidden.bs.modal', function () {
    $('#editCompensatoryLeaveForm').trigger('reset');
    $('#edit_hours_rendered-error-message, #edit_availed-error-message, #edit_remarks-error-message').html('');
    $('.edit_hours_rendered, .edit_availed, .edit_remarks').removeClass('is-invalid');
})

$('#addCompensatoryLeave').on('hidden.bs.modal', function () {
    $('#addCompensatoryLeaveForm').trigger('reset');
    $(`.hours_rendered, .availed, .date_added, .remarks`).removeClass('is-invalid');
    $(`#hours_rendered-error-message, #availed-error-message, #date_added-error-message, #remarks-error-message`).html("");
})

$('#btnBack').click( ()=> {
    $('#compensatoryleavesTable').removeClass('d-none');
    $('#compensatoryLeaveCard').addClass('d-none'); 
});

$('#btnEarn').click( ()=> {
    let employeeID = $('#employeeName').val();
    if(employeeID == ''){
        swal("Please select an employee!", "", "warning", {closeOnClickOutside: false});
    }else{
        $('#employee_id').val(employeeID);
        $('#addCompensatoryLeave').modal('toggle');
        $('.overtime_type, .hours_rendered, .earned, #btnSaveEarned').removeClass('d-none');
        $('#hours_rendered, #earned').val('0');
        $('.availed, #btnSaveAvailed').addClass('d-none');
        $('.date-span').html(`Date Earned <span class='text-danger'>*</span>`);
        $('.modal-title').html(`Add Earned Compensatory Leave`);
        $('#action').val('earn');
    }
    
});

$('#btnAvail').click( ()=> {
    let employeeID = $('#employeeName').val();
    let totalComBal = $('#totalComBal').val();
    if(employeeID == ''){
        swal("Please select an employee!", "", "warning", {closeOnClickOutside: false});
    } else if(totalComBal == 0){
            swal("", "Balance should greater than 0.", "info");
    } else{ 
        $('#employee_id').val(employeeID);
        $('#totalComBalance').val(totalComBal);
        $('#addCompensatoryLeave').modal('toggle');
        $('.overtime_type, .hours_rendered, .earned, #btnSaveEarned').addClass('d-none');
        $('#availed').val('0');
        $('.availed, #btnSaveAvailed').removeClass('d-none');
        $('.date-span').html(`Date Availed <span class='text-danger'>*</span>`);
        $('.modal-title').html(`Add Availed Compensatory Leave`);
        $('#action').val('avail');
    }
});

//Save Earned Compensatory Leave
$('#btnSaveEarned').click( (e)=> {
    e.preventDefault();
    let employee_id = $('#employee_id').val();
    let table = $('#compensatory-leave-table').DataTable();

    let x = table.rows( function (idx, data, node) {
        let date = table.cell(idx, 0).data();
        let earn = table.cell(idx, 1).data();
        let arr = [date];
        if (earn > 0){
            jQuery.each( arr, function( i, val ) {
                let tDateEarned = new Date(val);
                selectedDate = `${tDateEarned.getFullYear()}-${tDateEarned.getMonth()+1}-${tDateEarned.getDate()}`;
            });
        }
    }); 

    $('#save-spinner').removeClass('d-none');
    let data = $('#addCompensatoryLeaveForm').serialize();
    data = data.concat(`&selected_date=${selectedDate}`);
    $.ajax({
        url : '/employee/compensatory-build-up',
        method : 'POST',
        data : data,
        success : function (response) {
            if(response.success){
                let comtable = $('#compensatoryleaves').DataTable();
                if(comtable.rows().count() <= 0){
                    $('#save-spinner').addClass('d-none');
                    swal("Good job!", "Successfully added!", "success", {closeOnClickOutside: false}).then((isClicked) => {
                        if(isClicked) {
                            location.reload();
                        }
                    })
                }else{
                    $('#save-spinner').addClass('d-none');
                    swal("Good job!", "Successfully added!", "success", {closeOnClickOutside: false}).then((isClicked) => {
                        if(isClicked) {
                            $('#addCompensatoryLeave').modal('toggle');
                            $('#employeeName').val(employee_id).trigger('change');
                            $('#compensatoryleaves').DataTable().ajax.reload();
                        }
                    })
                }
                
            }
        },
        error: function(response) {
            if (response.status === 422) {
                let errors = response.responseJSON.errors;
                const inputNames = [
                    "overtime_type",
                    "hours_rendered",
                    "date_added",
                    "remarks"
                ];
                $.each(inputNames, function(index, value) {
                    if (errors.hasOwnProperty(value)) {
                        $(`.${value}`).addClass('is-invalid');
                        $(`#${value}-error-message`).html("");
                        $(`#${value}-error-message`).append(
                            `${errors[value][0]}`
                        );
                    } else {
                        $(`.${value}`).removeClass("is-invalid");
                        $(`#${value}-error-message`).html("");
                    }
                });
            }
        }
    });
});
//END OF SAVED earned NEW DATA

//Save AVAILED Compensatory Leave
$('#btnSaveAvailed').click( (e)=> {
    e.preventDefault();

    let employee_id = $('#employee_id').val();
    let table = $('#compensatory-leave-table').DataTable();

    let x = table.rows( function (idx, data, node) {
        let date = table.cell(idx, 0).data();
        let earn = table.cell(idx, 1).data();
        let arr = [date];
        if (earn > 0){
            jQuery.each( arr, function( i, val ) {
                let tDateEarned = new Date(val);
                selectedDate = `${tDateEarned.getFullYear()}-${tDateEarned.getMonth()+1}-${tDateEarned.getDate()}`;
            });
        }
    }); 

    $('#save-spinner').removeClass('d-none');
    let data = $('#addCompensatoryLeaveForm').serialize();
    data = data.concat(`&selected_date=${selectedDate}`);
    $.ajax({
        url : '/employee/compensatory-build-up',
        method : 'POST',
        data : data,
        success : function (response) {
            if(response.success){
                $('#save-spinner').addClass('d-none');
                swal("Good job!", "Successfully added!", "success", {closeOnClickOutside: false}).then((isClicked) => {
                    if(isClicked) {
                        $('#addCompensatoryLeave').modal('toggle');
                        $('#employeeName').val(employee_id).trigger('change');
                        $('#compensatoryleaves').DataTable().ajax.reload();
                    }
                })
            }
        },
        error: function(response) {
            if (response.status === 422) {
                let errors = response.responseJSON.errors;
                const inputNames = [
                    "availed",
                    "date_added",
                    "remarks"
                ];
                $.each(inputNames, function(index, value) {
                    if (errors.hasOwnProperty(value)) {
                        $(`.${value}`).addClass('is-invalid');
                        $(`#${value}-error-message`).html("");
                        $(`#${value}-error-message`).append(
                            `${errors[value][0]}`
                        );
                    } else {
                        $(`.${value}`).removeClass("is-invalid");
                        $(`#${value}-error-message`).html("");
                    }
                });
            }
        }
    });
});
//END OF SAVED availed NEW DATA

//UPDATE Earned Compensatory Leave
$(document).on('click', '.btnEdit__earned__compensatory', function () {
    compensatoryID = $(this).attr('data-id');
    $('#editCompensatoryLeave').modal('toggle');
    $('.edit_overtime_type, .edit_hours_rendered, .edit_earned, #btnUpdateEarned').removeClass('d-none');
    $('.edit_availed, #btnUpdateAvailed').addClass('d-none');
    $('.edit_date-span').html(`Date Earned <span class='text-danger'>*</span>`);
    $('.modal-title').html(`View/Edit Earned Compensatory Leave`);
    $('#edit_action').val('earn');
    // Ajax request for fetching leave type data.
    $.ajax({
        url : `/employee/compensatory-build-up/${compensatoryID}/edit`,
        success : function (comRecord) {
            //format date_added to string
            let date_added = formatDate(comRecord.date_added);
            // Collect data of form fields.
            $("#edit_id").val(comRecord.id);
            $("#edit_employee_id").val(comRecord.employee_id);
            $('#edit_overtime_type').val(comRecord.overtime_type);
            $('#edit_date_added').val(date_added);
            $('#edit_hours_rendered').val(comRecord.hours_rendered);
            $('#edit_earned').val(comRecord.earned);
            $('#edit_availed').val(comRecord.availed);
            $('#edit_remarks').val(comRecord.remarks);
        },
    });
});

$('#btnUpdateEarned').click( (e)=> {
    e.preventDefault();

    let comID = $('#edit_id').val();
    let employee_id = $('#edit_employee_id').val();

    $('#save-spinner').removeClass('d-none');
    let data = $('#editCompensatoryLeaveForm').serialize();
    $.ajax({
        url : `/employee/compensatory-build-up/${comID}`,
        method : 'PUT',
        data : data,
        success : function (response) {
            if(response.success){
                $('#save-spinner').addClass('d-none');
                swal("Good job!", "Successfully added!", "success", {closeOnClickOutside: false}).then((isClicked) => {
                    if(isClicked) {
                        $('#editCompensatoryLeave').modal('toggle');
                        $('#employeeName').val(employee_id).trigger('change');
                        $('#compensatoryleaves').DataTable().ajax.reload();
                    }
                })
            }
        },
        error: function(response) {
            if (response.status === 422) {
                let errors = response.responseJSON.errors;
                const inputNames = [
                    "edit_overtime_type",
                    "edit_hours_rendered",
                    "edit_remarks"
                ];
                $.each(inputNames, function(index, value) {
                    if (errors.hasOwnProperty(value)) {
                        $(`.${value}`).addClass('is-invalid');
                        $(`#${value}-error-message`).html("");
                        $(`#${value}-error-message`).append(
                            `${errors[value][0]}`
                        );
                    } else {
                        $(`.${value}`).removeClass("is-invalid");
                        $(`#${value}-error-message`).html("");
                    }
                });
            }
        }
        
    });
});
//END OF UPDATE earned COMPENSATORY

//UPDATE availed Compensatory Leave
$(document).on('click', '.btnEdit__availed__compensatory', function () {
    compensatoryID = $(this).attr('data-id');
    let totalComBal = $('#totalComBal').val();
    $('#editCompensatoryLeave').modal('toggle');
    $('.edit_overtime_type, .edit_hours_rendered, .edit_earned, #btnUpdateEarned').addClass('d-none');
    $('.edit_availed, #btnUpdateAvailed').removeClass('d-none');
    $('.edit_date-span').html(`Date Availed <span class='text-danger'>*</span>`);
    $('.modal-title').html(`View/Edit Availed Compensatory Leave`);
    $('#edit_action').val('avail');
    // Ajax request for fetching leave type data.
    $.ajax({
        url : `/employee/compensatory-build-up/${compensatoryID}/edit`,
        success : function (comRecord) {
            //format date_added to string
            let date_added = formatDate(comRecord.date_added);
            // Collect data of form fields.
            $("#edit_id").val(comRecord.id);
            $("#edit_employee_id").val(comRecord.employee_id);
            $('#edit_overtime_type').val(comRecord.overtime_type);
            $('#edit_date_added').val(date_added);
            $('#edit_hours_rendered').val(comRecord.hours_rendered);
            $('#edit_earned').val(comRecord.earned);
            $('#edit_availed').val(comRecord.availed);
            $('#edit_totalComBalance').val(totalComBal);
            $('#prev_availment').val(comRecord.availed);
            $('#edit_remarks').val(comRecord.remarks);
        },
    });
});

$('#btnUpdateAvailed').click( (e)=> {
    e.preventDefault();

    let comID = $('#edit_id').val();
    let employee_id = $('#edit_employee_id').val();
    $('#save-spinner').removeClass('d-none');
    let data = $('#editCompensatoryLeaveForm').serialize();
    $.ajax({
        url : `/employee/compensatory-build-up/${comID}`,
        method : 'PUT',
        data : data,
        success : function (response) {
            if(response.success){
                $('#save-spinner').addClass('d-none');
                swal("Good job!", "Successfully added!", "success", {closeOnClickOutside: false}).then((isClicked) => {
                    if(isClicked) {
                        $('#editCompensatoryLeave').modal('toggle');
                        $('#employeeName').val(employee_id).trigger('change');
                        $('#compensatoryleaves').DataTable().ajax.reload();
                    }
                })
            }
        },
        error: function(response) {
            if (response.status === 422) {
                let errors = response.responseJSON.errors;
                const inputNames = [
                    "edit_availed",
                    "edit_remarks"
                ];
                $.each(inputNames, function(index, value) {
                    if (errors.hasOwnProperty(value)) {
                        $(`.${value}`).addClass('is-invalid');
                        $(`#${value}-error-message`).html("");
                        $(`#${value}-error-message`).append(
                            `${errors[value][0]}`
                        );
                    } else {
                        $(`.${value}`).removeClass("is-invalid");
                        $(`#${value}-error-message`).html("");
                    }
                });
            }
        }
    });
});
//END OF UPDATE availed COMPENSATORY

$(document).on('click', '.delete__allcompensatory__type', function () {
    employeeID = $(this).attr('data-id');
    let deleteAll = 1;
swal({
    title: "Are you sure?",
    text : "You are about to delete all compensatory leave of this employee.",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    closeOnClickOutside: false,
    }).then((willDelete) => {
        if(willDelete) {
            $.ajax({
                url : `/employee/compensatory-build-up/${employeeID}`,
                data: { delete_All : deleteAll },
                method : 'POST',
                success : function (response) {
                        swal("Good job!", "Successfully deleted all compensatory leave records.", "success", {closeOnClickOutside: false}).then((isClicked) => {
                        if(isClicked) {
                            $('#compensatoryleaves').DataTable().ajax.reload();
                        }
                    })
                }
            });
        }
    });
});

$(document).on('click', '.delete__compensatory', function () {
    compensatoryID = $(this).attr('data-id');
    let employeeID = $("#employeeName").val();
    let deleteAll = 0;
    swal({
        title: "Are you sure?",
        text : "You are about to delete compensatory leave of this employee.",
        icon: "warning",
        buttons: true,  
        dangerMode: true,
        closeOnClickOutside: false,
        }).then((willDelete) => {
            if(willDelete) {
                $.ajax({
                    url : `/employee/compensatory-build-up/${compensatoryID}`,
                    data: { delete_All : deleteAll },
                    method : 'POST',
                    success : function (response) {
                            swal("Good job!", "Successfully deleted compensatory leave record.", "success", {closeOnClickOutside: false}).then((isClicked) => {
                            if(isClicked) {
                                $('#employeeName').val(employeeID).trigger('change');
                                $('#compensatoryleaves').DataTable().ajax.reload(); 
                            }
                        })
                    }
                });
            }
        });
});

$('#forfeited').change(function() {
    let employeeID = $('#employeeName').val();
    let yearFilter = year_filter.value;
    let forfeit = $('#forfeited').prop('checked');
    if(this.checked) {
        swal({
            title: "Are you sure?",
            text : yearFilter + ` earned compensatory leave will be forfeited.`,
            icon: "warning",
            buttons: true,
            dangerMode: true,
            closeOnClickOutside: false,
            }).then((willForfeit) => {
                if(willForfeit) {
                    isChecked = 1;
                    $.ajax({
                        url : `/employee/leave/compensatory-build-up/updateForfeited/${employeeID}/${yearFilter}`,
                        method : 'GET',
                        data : {'isChecked': isChecked},
                        success : function (response) {
                            if(response.success){
                                $('#save-spinner').addClass('d-none');
                                swal("", "Earned Compensatory has been forfeited.", "success", {closeOnClickOutside: false}).then((isClicked) => {
                                    if(isClicked) {
                                        $('#employeeName').val(employeeID).trigger('change');
                                        $('#compensatoryleaves').DataTable().ajax.reload();
                                    }
                                })
                            }
                        },
                    });
                }else{  
                    this.checked = false;
                }
            });
    }else{
        isChecked = 0;
        $.ajax({
            url : `/employee/leave/compensatory-build-up/updateForfeited/${employeeID}/${yearFilter}`,
            method : 'GET',
            data : {'isChecked': isChecked},
            success : function (response) {
                if(response.success){
                    $('#save-spinner').addClass('d-none');
                    swal("", "Changes Saved.", "success", {closeOnClickOutside: false}).then((isClicked) => {
                        if(isClicked) {
                            $('#employeeName').val(employeeID).trigger('change');
                            $('#compensatoryleaves').DataTable().ajax.reload();
                        }
                    })
                }
            },
        });
    }   
});   