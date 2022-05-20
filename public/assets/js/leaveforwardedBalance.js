//PAGE ON LOAD
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }   
});
$( document ).ready(function() {
    $('#date_forwarded').val(dateNow());
});

// const leaveInputs = [
//     "vl_earned",
//     "sl_earned",
//     "vl_used",
//     "sl_used",
// ];

// $.each(leaveInputs, function(index, value) {
//     $(`#${value}`).keyup( function (e) {
//         let vl_earned = e.target.value;
//         if(vl_earned == ""){
//             //nothing happens
//         }else{
//             $(`.${value}`).removeClass("is-invalid");
//             $(`.${value}`).addClass("is-valid");
//             $(`#${value}-error-message`).html("");
//         }
//     });
// });

let vl_earned = document.querySelector('#vl_earned');
let vl_used = document.querySelector('#vl_used');
let vl_balance = document.querySelector('#vl_balance');
let sl_earned = document.querySelector('#sl_earned');
let sl_used = document.querySelector('#sl_used');
let sl_balance = document.querySelector('#sl_balance');   
let total_lb = document.querySelector('#total_lb');

let update_vl_earned = document.querySelector('#update_vl_earned');
let update_vl_used = document.querySelector('#update_vl_used');
let update_vl_balance = document.querySelector('#update_vl_balance');
let update_sl_earned = document.querySelector('#update_sl_earned');
let update_sl_used = document.querySelector('#update_sl_used');
let update_sl_balance = document.querySelector('#update_sl_balance');   
let update_total_lb = document.querySelector('#update_total_lb');

vl_balance.value = 0;
sl_balance.value = 0;
total_lb.value = 0;

update_vl_balance.value = 0;
update_sl_balance.value = 0;
update_total_lb.value = 0;

vl_earned.addEventListener("keyup", function(){
    vl_balance.value = parseFloat(vl_earned.value) - parseFloat(vl_used.value);
    sl_balance.value = parseFloat(sl_earned.value) - parseFloat(sl_used.value);
    total_lb.value = (parseFloat(vl_balance.value) + parseFloat(sl_balance.value)).toFixed(3);
})

vl_used.addEventListener("keyup", function(){
    vl_balance.value = parseFloat(vl_earned.value) - parseFloat(vl_used.value);
    sl_balance.value = parseFloat(sl_earned.value) - parseFloat(sl_used.value);
    total_lb.value = ( (parseFloat(vl_balance.value) ) + (parseFloat(sl_balance.value))).toFixed(3);
})

sl_earned.addEventListener("keyup", function(){
    vl_balance.value = parseFloat(vl_earned.value) - parseFloat(vl_used.value);
    sl_balance.value = parseFloat(sl_earned.value) - parseFloat(sl_used.value);
    total_lb.value = (parseFloat(vl_balance.value) + parseFloat(sl_balance.value)).toFixed(3);
})

sl_used.addEventListener("keyup", function(){
    vl_balance.value = parseFloat(vl_earned.value) - parseFloat(vl_used.value);
    sl_balance.value = parseFloat(sl_earned.value) - parseFloat(sl_used.value);
    total_lb.value = ( (parseFloat(vl_balance.value)) + (parseFloat(sl_balance.value))).toFixed(3);
})

update_vl_earned.addEventListener("keyup", function(){
    update_vl_balance.value = parseFloat(update_vl_earned.value) - parseFloat(update_vl_used.value);
    update_sl_balance.value = parseFloat(update_sl_earned.value) - parseFloat(update_sl_used.value);
    update_total_lb.value = (parseFloat(update_vl_balance.value) + parseFloat(update_sl_balance.value)).toFixed(3);
})

update_vl_used.addEventListener("keyup", function(){
    update_vl_balance.value = parseFloat(update_vl_earned.value) - parseFloat(update_vl_used.value);
    update_sl_balance.value = parseFloat(update_sl_earned.value) - parseFloat(update_sl_used.value);
    update_total_lb.value = (parseFloat(update_vl_balance.value) + parseFloat(update_sl_balance.value)).toFixed(3);
})

update_sl_earned.addEventListener("keyup", function(){
    update_vl_balance.value = parseFloat(update_vl_earned.value) - parseFloat(update_vl_used.value);
    update_sl_balance.value = parseFloat(update_sl_earned.value) - parseFloat(update_sl_used.value);
    update_total_lb.value = (parseFloat(update_vl_balance.value) + parseFloat(update_sl_balance.value)).toFixed(3);
})

update_sl_used.addEventListener("keyup", function(){
    update_vl_balance.value = parseFloat(update_vl_earned.value) - parseFloat(update_vl_used.value);
    update_sl_balance.value = parseFloat(update_sl_earned.value) - parseFloat(update_sl_used.value);
    update_total_lb.value = (parseFloat(update_vl_balance.value) + parseFloat(update_sl_balance.value)).toFixed(3);
})


// SHOWS THE DATA VALUE IN INPUT INCLUDING THE PHOTO OF THE EMPLOYEE
$('#Employee_id').change( function (e) {
    let employeeID = e.target.value;
    let [selectedItem] = $("#Employee_id option:selected");

    let employeeOffice = selectedItem.getAttribute('data-office') || '';
    let employeePosition = selectedItem.getAttribute('data-position') || '';
    let photo = selectedItem.getAttribute('data-photo') || '';
    let employeeId = selectedItem.getAttribute('data-employeeId') || '';

    $('#office').val(employeeOffice);
    $('#position').val(employeePosition);
    if (employeeID == ''){
        $('#empPhoto').attr('src','/storage/employee_images/sdslogo.jpg');
    }else{
        $('.Employee_id').removeClass("is-invalid");
        $('.Employee_id').addClass("is-valid");
        $("#Employee_id-error-message").html("");
        $('#empPhoto').attr('src','/storage/employee_images/sdslogo.jpg');
        // $('#empPhoto').attr('src','/storage/employee_images/'+photo);
    }
    $('#employeeId').val(employeeId);
});

$('#btnSave').click( (e)=> {
    e.preventDefault();
    let data = $('#forwardedBalance').serialize();
    $.ajax({
        url : '/employee/leave-forwarded-balance',
        method : 'POST',
        data : data,
        success : function (response) {
            if(response.success){
                swal("Good job!", "Successfully added!", "success", {closeOnClickOutside: false}).then((isClicked) => {
                    if(isClicked) {
                        $('#btnBack').trigger('click');
                        $('#forwarded-balance-table').DataTable().ajax.reload();
                    }

                })
            }
    },
        error: function(response) {
            if (response.status === 422) {
                let errors = response.responseJSON.errors;
                const inputNames = [
                    "Employee_id",
                    "vl_earned",
                    "sl_used",
                    "sl_earned",
                    "sl_used",
                    "date_forwarded"
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

$('#btnUpdate').click( (e)=> {
    e.preventDefault();

    let leaveID = $('#leaveID').val();

    let data = $('#editForwardedBalance').serialize();
    $.ajax({
        url : `/employee/leave-forwarded-balance/${leaveID}`,
        method : 'PUT',
        data : data,
        success : function (response) {
            if(response.success){
                swal("Good job!", "Successfully updated!", "success", {closeOnClickOutside: false}).then((isClicked) => {
                    if(isClicked) {
                        $('#update_btnBack').trigger('click');
                        $('#forwarded-balance-table').DataTable().ajax.reload();
                    }
                })
            }
        },
        error: function(response) {
            if (response.status === 422) {
                let errors = response.responseJSON.errors;
                const inputNames = [
                    "update_vl_earned",
                    "update_sl_earned",
                    "update_vl_used",
                    "update_sl_used",
                    "update_date_forwarded"
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

    // TRANSITION OF FORM TO TABLE
$('#addBtn').click( ()=> {
    let Employee_id = '';
    $('#Employee_id').val(Employee_id).trigger('change');
    $('#forwardedBalanceTable').addClass('d-none');
    $('#forwardedBalanceCard').removeClass('d-none'); 
    $('#Employee_id-error-message, #date_forwarded-error-message, #vl_earned-error-message').html('');
    $('#sl_earned-error-message, #vl_used-error-message, #sl_used-error-message').html('');
    $('#date_forwarded, #vl_earned, #vl_used, #sl_earned, #sl_used, .Employee_id').removeClass('is-invalid');
    $('#date_forwarded, #vl_earned, #vl_used, #sl_earned, #sl_used, .Employee_id').removeClass('is-valid');
});

$('#btnBack').click( ()=> {
    $('#forwardedBalanceTable').removeClass('d-none');
    $('#forwardedBalanceCard').addClass('d-none'); 
    $('#editForwardedBalanceCard').addClass('d-none'); 
});

$('#update_btnBack').click( ()=> {
    $('#forwardedBalanceTable').removeClass('d-none');
    $('#forwardedBalanceCard').addClass('d-none'); 
    $('#editForwardedBalanceCard').addClass('d-none'); 
});

$(document).on('click', '.edit__leave__type', function () {
    leaveID = $(this).attr('data-id');
    $('#forwardedBalanceTable').addClass('d-none');
    $('#editForwardedBalanceCard').removeClass('d-none'); 
    $('#btnViewTableContainer').removeClass('d-none');
    $('#leaveID').val(leaveID);

    // Ajax request for fetching leave type data.
    $.ajax({
        url : `/employee/leave-forwarded-balance/${leaveID}/edit`,
        success : function (leave) {
            // Collect data of form fields.
            
            $('#update_empPhoto').attr('src','/storage/employee_images/sdslogo.jpg');
            $('#update_employeeName').val(`${leave.employeeFullname}`);
            $('#update_office').val(leave.office);
            $('#update_position').val(leave.position);
            $('#update_Employee_id').val(leave.leaveRecord.Employee_id);
            
            $('#update_date_forwarded').val(formatDate(leave.leaveRecord.date_forwarded));

            $('#update_vl_earned').val(leave.leaveRecord.vl_earned);
            $('#update_vl_used').val(leave.leaveRecord.vl_used);
            vl_balanceVal = parseFloat(leave.leaveRecord.vl_earned - leave.leaveRecord.vl_used).toFixed(3);
            $('#update_vl_balance').val(vl_balanceVal);
        
            $('#update_sl_earned').val(leave.leaveRecord.sl_earned);
            $('#update_sl_used').val(leave.leaveRecord.sl_used);
            sl_balanceVal = parseFloat(leave.leaveRecord.sl_earned - leave.leaveRecord.sl_used).toFixed(3);
            $('#update_sl_balance').val(sl_balanceVal);
            
            $('#update_total_lb').val((parseFloat(vl_balanceVal) + parseFloat(sl_balanceVal)).toFixed(3));
        },
    });
});

$(document).on('click', '#update_btnDelete', function () {
    let leaveID = $(this).attr('data-id');
    
    swal({
        title: "Are you sure?",
        text : "You are about to delete a forwarded leave balance record",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        closeOnClickOutside: false,
        }).then((willDelete) => {
            if(willDelete) {
                $.ajax({
                    url : `/employee/leave-forwarded-balance/${leaveID}`,
                    method : 'POST',
                    success : function (response) {
                            swal("Good job!", "Successfully delete a leave record.", "success", {closeOnClickOutside: false}).then((isClicked) => {
                            if(isClicked) {
                                $('#forwarded-balance-table').DataTable().ajax.reload();
                            }
                        })
                    }, 
                    error : function (response) {
                        console.log(response);
                    }
                });
            }
        });
});

$(document).on('click', '.delete__leave__type', function () {
    let leaveID = $(this).attr('data-id');
    
    swal({
        title: "Are you sure?",
        text : "You are about to delete a forwarded leave balance record",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        closeOnClickOutside: false,
        }).then((willDelete) => {
            if(willDelete) {
                $.ajax({
                    url : `/employee/leave-forwarded-balance/${leaveID}`,
                    method : 'POST',
                    success : function (response) {
                            swal("Good job!", "Successfully delete a leave record.", "success", {closeOnClickOutside: false}).then((isClicked) => {
                            if(isClicked) {
                                $('#forwarded-balance-table').DataTable().ajax.reload();
                            }
                        })
                    }, 
                    error : function (response) {
                        console.log(response);
                    }
                });
            }
        });
});

//Function to get Current date
function dateNow() {
    var d = new Date(),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
}

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return [year, month, day].join('-');
}
