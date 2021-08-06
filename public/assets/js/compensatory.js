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
        $('.year_filter').removeClass('d-none');
        $('.forfeited').removeClass('d-none');

        $('#office').val(employeeOffice);
        $('#position').val(employeePosition);
        if(photo == ''){
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
                        '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
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
                        $('#btnEarn').prop('disabled', false);
                        $('#btnAvail').prop('disabled', false);
                    }else{
                        if($('#year_filter').val() < curYear){
                            $('#forfeited').prop('disabled', true);
                            $('#btnEarn').prop('disabled', true);
                            $('#btnAvail').prop('disabled', true);
                        }else{
                            $('#forfeited').prop('disabled', false);
                            $('#btnEarn').prop('disabled', false);
                            $('#btnAvail').prop('disabled', false);
                        }
                    }
                }
            }); 
            $('#selectEmployee').addClass('d-none');
            forfeited(empID, year_filter);
        }
        
    });
});

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
                $('#btnEarn').prop('disabled', true);
                $('#btnAvail').prop('disabled', true);
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
    let curYear = getYear(new Date());
    $('#employeeName').val(employeeID).trigger('change');
    $('#compensatoryleavesTable').addClass('d-none');
    $('#selectEmployee').removeClass('d-none');
    $('#compensatoryLeaveCard').removeClass('d-none'); 
    $('#totalComBal').val('0');
    $('.year_filter').addClass('d-none');
    $('.forfeited').addClass('d-none');
    $('#year_filter').val(curYear);
});

$(document).on('click', '.btn__edit__view__compensatory', function (e) {
    let curYear = getYear(new Date());
    let employeeID = $(this).attr('data-id');
    if(employeeID) {
        $('#employeeName').val(employeeID).trigger('change');
        $('#compensatoryleavesTable').addClass('d-none');
        $('#compensatoryLeaveCard').removeClass('d-none'); 
        $('#year_filter').val(curYear);
    }
});

$('#editCompensatoryLeave').on('hidden.bs.modal', function () {
    $('#editCompensatoryLeaveForm').trigger('reset');
    $('#edit_overtimeType__error__element').html('');
    $('#edit_hours_rendered__error__element').html('');
    $('#edit_availed__error__element').html('');
    $('#edit_remarks__error__element').html('');
})

$('#addCompensatoryLeave').on('hidden.bs.modal', function () {
    $('#addCompensatoryLeaveForm').trigger('reset');
    $('#overtimeType__error__element').html('');
    $('#dateEarned__error__element').html('');
    $('#hours_rendered__error__element').html('');
    $('#availed__error__element').html('');
    $('#remarks__error__element').html('');
})

//Save Earned Compensatory Leave
$('#btnSaveEarned').click( (e)=> {
    e.preventDefault();

    let employee_id = $('#employee_id').val();
    let overtimeType = $('#overtime_type').val();
    let dateEarned = $('#date_added').val();
    let hours_rendered = $('#hours_rendered').val();
    let remarks = $('#remarks').val();
    let errors = {};
    let filteredError = "";
    
    let todayDate = new Date().toISOString().slice(0, 10);;
    let newDateEarned = new Date(dateEarned);
    let newTodayDate = new Date(todayDate);
    let shouldSkip = false;

    //overtimeType required
    if (overtimeType === "") {
        $('#overtimeType__error__element').html('');
        $('#overtimeType__error__element').append(`<span> <small> This field is required. </small> </span>`);
        errors.overtimeType = true;
    } else {
        $('#overtimeType__error__element').html('');
        errors.overtimeType = false;
    }

    //Date Errors 
    let table = $('#compensatory-leave-table').DataTable();
    if ( ! table.data().count() ){
        if (newDateEarned.getTime() > newTodayDate.getTime()) {
            $('#dateEarned__error__element').html('');
            $('#dateEarned__error__element').append(`<span> <small> Date should not be greater than today. </small> </span>`);
            errors.dateEarned = true;
        } else if (dateEarned === "") {
            $('#dateEarned__error__element').html('');
            $('#dateEarned__error__element').append(`<span> <small> Please select a date. </small> </span>`);
            errors.dateEarned = true;
        } else {
            $('#dateEarned__error__element').html('');
            errors.dateEarned = false;
        }
    }else{
        let x = table.rows( function (idx, data, node) {
            let date = table.cell(idx, 0).data();
            let earn = table.cell(idx, 1).data();
            let arr = [date];
            if (earn > 0){
                jQuery.each( arr, function( i, val ) {
                    let tDateEarned = new Date(val);
                    if (shouldSkip) {
                        return;
                    }
                    if (newDateEarned.getTime() > newTodayDate.getTime()) {
                        $('#dateEarned__error__element').html('');
                        $('#dateEarned__error__element').append(`<span> <small> Date should not be greater than today. </small> </span>`);
                        errors.dateEarned = true;
                    } else if (dateEarned === "") {
                        $('#dateEarned__error__element').html('');
                        $('#dateEarned__error__element').append(`<span> <small> Please select a date. </small> </span>`);
                        errors.dateEarned = true;
                        shouldSkip = true;
                        return;
                    } else if (newDateEarned.getMonth() === tDateEarned.getMonth() && newDateEarned.getFullYear() === tDateEarned.getFullYear()) {
                        $('#dateEarned__error__element').html('');
                        $('#dateEarned__error__element').append(`<span> <small> Compensatory is given monthly. </small> </span>`);
                        errors.dateEarned = true;
                        shouldSkip = true;
                        return;
                    } else {
                        $('#dateEarned__error__element').html('');
                        errors.dateEarned = false;
                    }
                });
            }else{
                jQuery.each( arr, function( i, val ) {
                    let lastDateAvailed = new Date(val);
                    if (shouldSkip) {
                        return;
                    }
                    if (newDateEarned.getTime() <= lastDateAvailed.getTime()) {
                        $('#dateEarned__error__element').html('');
                        $('#dateEarned__error__element').append(`<span> <small> Date should be greater than the last record. </small> </span>`);
                        errors.dateEarned = true;
                    } else {
                        $('#dateEarned__error__element').html('');
                        errors.dateEarned = false;
                    }
                });
            }
        }); 
    }
        
    //Hours Rendered required
    if (hours_rendered === "" || hours_rendered === "0" )  {
        $('#hours_rendered__error__element').html('');
        $('#hours_rendered__error__element').append(`<span> <small> This field should not be 0. </small> </span>`);
        errors.hours_rendered = true;
    } else {
        $('#hours_rendered__error__element').html('');
        errors.hours_rendered = false;
    }

    //Remarks required
    if (remarks === "" || remarks === "")  {
        $('#remarks__error__element').html('');
        $('#remarks__error__element').append(`<span> <small> This field is required. </small> </span>`);
        errors.remarks = true;
    } else {
        $('#remarks__error__element').html('');
        errors.remarks = false;
    }

    filteredError = Object.values(errors).filter((error) => error);
    // Check if the filtered error array variable has value or not.
    // if the length of this array is 0 this means that there is no error
    // or all fields that required is filled by the user.
    if (filteredError.length === 0) {
        $('#save-spinner').removeClass('d-none');
        let data = $('#addCompensatoryLeaveForm').serialize();
        $.ajax({
            url : '/employee/compensatory-build-up',
            method : 'POST',
            data : data,
            success : function (response) {
                if(response.success){
                    $('#save-spinner').addClass('d-none');
                    swal("Good job!", "Successfully added!", "success").then((isClicked) => {
                        if(isClicked) {
                            $('#addCompensatoryLeave').modal('toggle');
                            $('#employeeName').val(employee_id).trigger('change');
                            $('#compensatoryleaves').DataTable().ajax.reload();
                        }
                    })
                }
            },
        });
        
    }
});
//END OF SAVED earned NEW DATA

//Save AVAILED Compensatory Leave
$('#btnSaveAvailed').click( (e)=> {
    e.preventDefault();

    let totalComBal = $('#totalComBal').val();
    let employee_id = $('#employee_id').val();
    let dateEarned = $('#date_added').val();
    let comAvailed = $('#availed').val();
    let remarks = $('#remarks').val();
    let errors = {};
    let filteredError = "";

    let newDateEarned = new Date(dateEarned);
    let shouldSkip = false;

    //Date Errors 
    let table = $('#compensatory-leave-table').DataTable();
    let x = table.rows( function (idx, data, node) {
        let date = table.cell(idx, 0).data();
        let arr = [date];
        jQuery.each( arr, function( i, val ) {
            let lastDateAvailed = new Date(val);
            console.log(lastDateAvailed);
            if (shouldSkip) {
                return;
            }
            if (newDateEarned.getTime() <= lastDateAvailed.getTime()) {
                $('#dateEarned__error__element').html('');
                $('#dateEarned__error__element').append(`<span> <small> Date should be greater than the last record. </small> </span>`);
                errors.dateEarned = true;
            } else if (dateEarned === "") {
                $('#dateEarned__error__element').html('');
                $('#dateEarned__error__element').append(`<span> <small> Please select a date. </small> </span>`);
                errors.dateEarned = true;
                shouldSkip = true;
                return;
            } else {
                $('#dateEarned__error__element').html('');
                errors.dateEarned = false;
            }
        });
    }); 


    //Availed Insufficient
    if (comAvailed === "" || comAvailed === "0" )  {
        $('#availed__error__element').html('');
        $('#availed__error__element').append(`<span> <small> This field should not be 0. </small> </span>`);
        errors.availed = true;
    } else if (parseFloat(comAvailed) > parseFloat(totalComBal)){
        $('#availed__error__element').html('');
        $('#availed__error__element').append(`<span> <small> Insufficient balance! </small> </span>`);
        errors.availed = true;
    } else {
        $('#availed__error__element').html('');
        errors.availed = false;
    }

    //Remarks required
    if (remarks === "" || remarks === "")  {
        $('#remarks__error__element').html('');
        $('#hremarks__error__element').append(`<span> <small> This field is required. </small> </span>`);
        errors.remarks = true;
    } else {
        $('#remarks__error__element').html('');
        errors.remarks = false;
    }

    filteredError = Object.values(errors).filter((error) => error);
    // Check if the filtered error array variable has value or not.
    // if the length of this array is 0 this means that there is no error
    // or all fields that required is filled by the user.
    if (filteredError.length === 0) {
        $('#save-spinner').removeClass('d-none');
        let data = $('#addCompensatoryLeaveForm').serialize();
        $.ajax({
            url : '/employee/compensatory-build-up',
            method : 'POST',
            data : data,
            success : function (response) {
                if(response.success){
                    $('#save-spinner').addClass('d-none');
                    swal("Good job!", "Successfully added!", "success").then((isClicked) => {
                        if(isClicked) {
                            $('#addCompensatoryLeave').modal('toggle');
                            $('#employeeName').val(employee_id).trigger('change');
                            $('#compensatoryleaves').DataTable().ajax.reload();
                        }
                    })
                }
            },
        });
        
    }
});
//END OF SAVED availed NEW DATA

//UPDATE Earned Compensatory Leave
$(document).on('click', '.btnEdit__earned__compensatory', function () {
    compensatoryID = $(this).attr('data-id');
    $('#editCompensatoryLeave').modal('toggle');
    $('.edit_overtime_type').removeClass('d-none');
    $('.edit_hours_rendered').removeClass('d-none');
    $('.edit_earned').removeClass('d-none');
    $('.edit_availed').addClass('d-none');
    $('.edit_date-span').html(`Date Earned <span class='text-danger'>*</span>`);
    $('.modal-title').html(`View/Edit Earned Compensatory Leave`);
    $('#btnUpdateEarned').removeClass('d-none');
    $('#btnUpdateAvailed').addClass('d-none');
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

    let table = $('#compensatory-leave-table').DataTable();

    let x = table.rows( function (idx, data, node) {
        let date = table.cell(idx, 0).data();
        let earn = table.cell(idx, 1).data();
        if (earn > 0){
            let arr = [date];
            jQuery.each( arr, function( i, val ) {
                let tDateEarned = new Date(val);
                console.log(tDateEarned);
            });
        }
    });

    let comID = $('#edit_id').val();
    let employee_id = $('#edit_employee_id').val();
    let overtimeType = $('#edit_overtime_type').val();
    let hours_rendered = $('#edit_hours_rendered').val();
    let remarks = $('#edit_remarks').val();
    let errors = {};
    let filteredError = "";

    //overtimeType required
    if (overtimeType === "") {
        $('#edit_overtimeType__error__element').html('');
        $('#edit_overtimeType__error__element').append(`<span> <small> This field is required. </small> </span>`);
        errors.overtimeType = true;
    } else {
        $('#edit_overtimeType__error__element').html('');
        errors.overtimeType = false;
    }
        
    //Hours Rendered required
    if (hours_rendered === "" || hours_rendered === "0" )  {
        $('#edit_hours_rendered__error__element').html('');
        $('#edit_hours_rendered__error__element').append(`<span> <small> This field should not be 0. </small> </span>`);
        errors.hours_rendered = true;
    } else {
        $('#edit_hours_rendered__error__element').html('');
        errors.hours_rendered = false;
    }

    //Remarks required
    if (remarks === "" || remarks === "")  {
        $('#edit_remarks__error__element').html('');
        $('#edit_remarks__error__element').append(`<span> <small> This field is required. </small> </span>`);
        errors.remarks = true;
    } else {
        $('#edit_remarks__error__element').html('');
        errors.remarks = false;
    }

    filteredError = Object.values(errors).filter((error) => error);
    // Check if the filtered error array variable has value or not.
    // if the length of this array is 0 this means that there is no error
    // or all fields that required is filled by the user.
    if (filteredError.length === 0) {
        $('#save-spinner').removeClass('d-none');
        let data = $('#editCompensatoryLeaveForm').serialize();
        $.ajax({
            url : `/employee/compensatory-build-up/${comID}`,
            method : 'PUT',
            data : data,
            success : function (response) {
                if(response.success){
                    $('#save-spinner').addClass('d-none');
                    swal("Good job!", "Successfully added!", "success").then((isClicked) => {
                        if(isClicked) {
                            $('#editCompensatoryLeave').modal('toggle');
                            $('#employeeName').val(employee_id).trigger('change');
                            $('#compensatoryleaves').DataTable().ajax.reload();
                        }
                    })
                }
            },
        });
    }
});
//END OF UPDATE earned COMPENSATORY

//UPDATE availed Compensatory Leave
$(document).on('click', '.btnEdit__availed__compensatory', function () {
    compensatoryID = $(this).attr('data-id');
    $('#editCompensatoryLeave').modal('toggle');
    $('.edit_overtime_type').addClass('d-none');
    $('.edit_hours_rendered').addClass('d-none');
    $('.edit_earned').addClass('d-none');
    $('.edit_availed').removeClass('d-none');
    $('.edit_date-span').html(`Date Availed <span class='text-danger'>*</span>`);
    $('.modal-title').html(`View/Edit Availed Compensatory Leave`);
    $('#btnUpdateEarned').addClass('d-none');
    $('#btnUpdateAvailed').removeClass('d-none');
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

$('#btnUpdateAvailed').click( (e)=> {
    e.preventDefault();

    let comID = $('#edit_id').val();
    let employee_id = $('#edit_employee_id').val();
    let availed = $('#edit_availed').val();
    let remarks = $('#edit_remarks').val();
    let totalearned = $('#totalearned').text();
    let errors = {};
    let filteredError = "";
    
    //Availed required
    if (availed === "" || availed === "0" )  {
        $('#edit_hours_availed__error__element').html('');
        $('#edit_hours_availed__error__element').append(`<span> <small> This field should not be 0. </small> </span>`);
        errors.availed = true;
    } else if (parseFloat(availed) > parseFloat(totalearned)){
        $('#edit_availed__error__element').html('');
        $('#edit_availed__error__element').append(`<span> <small> Insufficient balance! </small> </span>`);
        errors.availed = true;
    }else {
        $('#edit_availed__error__element').html('');
        errors.availed = false;
    }

    //Remarks required
    if (remarks === "" || remarks === "")  {
        $('#edit_remarks__error__element').html('');
        $('#edit_remarks__error__element').append(`<span> <small> This field is required. </small> </span>`);
        errors.remarks = true;
    } else {
        $('#edit_remarks__error__element').html('');
        errors.remarks = false;
    }


    filteredError = Object.values(errors).filter((error) => error);
    // Check if the filtered error array variable has value or not.
    // if the length of this array is 0 this means that there is no error
    // or all fields that required is filled by the user.
    if (filteredError.length === 0) {
        $('#save-spinner').removeClass('d-none');
        let data = $('#editCompensatoryLeaveForm').serialize();
        $.ajax({
            url : `/employee/compensatory-build-up/${comID}`,
            method : 'PUT',
            data : data,
            success : function (response) {
                if(response.success){
                    $('#save-spinner').addClass('d-none');
                    swal("Good job!", "Successfully added!", "success").then((isClicked) => {
                        if(isClicked) {
                            $('#editCompensatoryLeave').modal('toggle');
                            $('#employeeName').val(employee_id).trigger('change');
                            $('#compensatoryleaves').DataTable().ajax.reload();
                        }
                    })
                }
            },
        });
    }
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
    }).then((willDelete) => {
        if(willDelete) {
            $.ajax({
                url : `/employee/compensatory-build-up/${employeeID}`,
                data: { delete_All : deleteAll },
                method : 'DELETE',
                success : function (response) {
                        swal("Good job!", "Successfully deleted all compensatory leave records.", "success").then((isClicked) => {
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
        }).then((willDelete) => {
            if(willDelete) {
                $.ajax({
                    url : `/employee/compensatory-build-up/${compensatoryID}`,
                    data: { delete_All : deleteAll },
                    method : 'DELETE',
                    success : function (response) {
                            swal("Good job!", "Successfully deleted compensatory leave record.", "success").then((isClicked) => {
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

$('#btnBack').click( ()=> {
    $('#compensatoryleavesTable').removeClass('d-none');
    $('#compensatoryLeaveCard').addClass('d-none'); 
});

$('#btnEarn').click( ()=> {
    let employeeID = $('#employeeName').val();
    if(employeeID == ''){
        swal("Please select an employee!", "", "warning");
    }else{
        $('#employee_id').val(employeeID);
        $('#addCompensatoryLeave').modal('toggle');
        $('.overtime_type').removeClass('d-none');
        $('.hours_rendered').removeClass('d-none');
        $('#hours_rendered').val('0');
        $('.earned').removeClass('d-none');
        $('#earned').val('0');
        $('.availed').addClass('d-none');
        $('.date-span').html(`Date Earned <span class='text-danger'>*</span>`);
        $('.modal-title').html(`Add Earned Compensatory Leave`);
        $('#btnSaveEarned').removeClass('d-none');
        $('#btnSaveAvailed').addClass('d-none');
    }
    
});

$('#btnAvail').click( ()=> {
    let employeeID = $('#employeeName').val();
    let totalComBal = $('#totalComBal').val();
    if(employeeID == ''){
        swal("Please select an employee!", "", "warning");
    } else if(totalComBal == 0){
            swal("", "Balance should greater than 0.", "info");
    } else{ 
        $('#employee_id').val(employeeID);
        $('#addCompensatoryLeave').modal('toggle');
        $('.overtime_type').addClass('d-none');
        $('.hours_rendered').addClass('d-none');
        $('.earned').addClass('d-none');
        $('#availed').val('0');
        $('.availed').removeClass('d-none');
        $('.date-span').html(`Date Availed <span class='text-danger'>*</span>`);
        $('.modal-title').html(`Add Availed Compensatory Leave`);
        $('#btnSaveEarned').addClass('d-none');
        $('#btnSaveAvailed').removeClass('d-none');
    }
});

$('#forfeited').change(function() {
    let employeeID = $('#employeeName').val();
    let yearFilter = year_filter.value;
    let forfeit = $('#forfeited').prop('checked');
    console.log(forfeit);
    if(this.checked) {
        swal({
            title: "Are you sure?",
            text : yearFilter + ` earned compensatory leave will be forfeited.`,
            icon: "warning",
            buttons: true,
            dangerMode: true,
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
                                swal("", "Earned Compensatory has been forfeited.", "success").then((isClicked) => {
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
                    swal("", "Changes Saved.", "success").then((isClicked) => {
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