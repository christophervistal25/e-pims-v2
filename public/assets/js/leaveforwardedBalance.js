//PAGE ON LOAD
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }   
});
$( document ).ready(function() {
    $('#asOf').val(dateNow());
});

const leaveInputs = [
    "vlEarned",
    "slEarned",
    "vlEnjoyed",
    "slEnjoyed",
];

$.each(leaveInputs, function(index, value) {
    $(`#${value}`).keyup( function (e) {
        let vlEarned = e.target.value;
        if(vlEarned == ""){
            //nothing happens
        }else{
            $(`.${value}`).removeClass("is-invalid");
            $(`.${value}`).addClass("is-valid");
            $(`#${value}-error-message`).html("");
        }
    });
});

let vlEarned = document.querySelector('#vlEarned');
let vlEnjoyed = document.querySelector('#vlEnjoyed');
let vlBalance = document.querySelector('#vlBalance');
let slEarned = document.querySelector('#slEarned');
let slEnjoyed = document.querySelector('#slEnjoyed');
let slBalance = document.querySelector('#slBalance');   
let total_lb = document.querySelector('#total_lb');

let update_vlEarned = document.querySelector('#update_vlEarned');
let update_vlEnjoyed = document.querySelector('#update_vlEnjoyed');
let update_vlBalance = document.querySelector('#update_vlBalance');
let update_slEarned = document.querySelector('#update_slEarned');
let update_slEnjoyed = document.querySelector('#update_slEnjoyed');
let update_slBalance = document.querySelector('#update_slBalance');   
let update_total_lb = document.querySelector('#update_total_lb');

vlBalance.value = 0;
slBalance.value = 0;
total_lb.value = 0;

update_vlBalance.value = 0;
update_slBalance.value = 0;
update_total_lb.value = 0;

vlEarned.addEventListener("keyup", function(){
    vlBalance.value = parseFloat(vlEarned.value) - parseFloat(vlEnjoyed.value);
    slBalance.value = parseFloat(slEarned.value) - parseFloat(slEnjoyed.value);
    total_lb.value = (parseFloat(vlBalance.value) + parseFloat(slBalance.value)).toFixed(3);
})

vlEnjoyed.addEventListener("keyup", function(){
    vlBalance.value = parseFloat(vlEarned.value) - parseFloat(vlEnjoyed.value);
    slBalance.value = parseFloat(slEarned.value) - parseFloat(slEnjoyed.value);
    total_lb.value = ( (parseFloat(vlBalance.value) ) + (parseFloat(slBalance.value))).toFixed(3);
})

slEarned.addEventListener("keyup", function(){
    vlBalance.value = parseFloat(vlEarned.value) - parseFloat(vlEnjoyed.value);
    slBalance.value = parseFloat(slEarned.value) - parseFloat(slEnjoyed.value);
    total_lb.value = (parseFloat(vlBalance.value) + parseFloat(slBalance.value)).toFixed(3);
})

slEnjoyed.addEventListener("keyup", function(){
    vlBalance.value = parseFloat(vlEarned.value) - parseFloat(vlEnjoyed.value);
    slBalance.value = parseFloat(slEarned.value) - parseFloat(slEnjoyed.value);
    total_lb.value = ( (parseFloat(vlBalance.value)) + (parseFloat(slBalance.value))).toFixed(3);
})

update_vlEarned.addEventListener("keyup", function(){
    update_vlBalance.value = parseFloat(update_vlEarned.value) - parseFloat(update_vlEnjoyed.value);
    update_slBalance.value = parseFloat(update_slEarned.value) - parseFloat(update_slEnjoyed.value);
    update_total_lb.value = (parseFloat(update_vlBalance.value) + parseFloat(update_slBalance.value)).toFixed(3);
})

update_vlEnjoyed.addEventListener("keyup", function(){
    update_vlBalance.value = parseFloat(update_vlEarned.value) - parseFloat(update_vlEnjoyed.value);
    update_slBalance.value = parseFloat(update_slEarned.value) - parseFloat(update_slEnjoyed.value);
    update_total_lb.value = (parseFloat(update_vlBalance.value) + parseFloat(update_slBalance.value)).toFixed(3);
})

update_slEarned.addEventListener("keyup", function(){
    update_vlBalance.value = parseFloat(update_vlEarned.value) - parseFloat(update_vlEnjoyed.value);
    update_slBalance.value = parseFloat(update_slEarned.value) - parseFloat(update_slEnjoyed.value);
    update_total_lb.value = (parseFloat(update_vlBalance.value) + parseFloat(update_slBalance.value)).toFixed(3);
})

update_slEnjoyed.addEventListener("keyup", function(){
    update_vlBalance.value = parseFloat(update_vlEarned.value) - parseFloat(update_vlEnjoyed.value);
    update_slBalance.value = parseFloat(update_slEarned.value) - parseFloat(update_slEnjoyed.value);
    update_total_lb.value = (parseFloat(update_vlBalance.value) + parseFloat(update_slBalance.value)).toFixed(3);
})


// SHOWS THE DATA VALUE IN INPUT INCLUDING THE PHOTO OF THE EMPLOYEE
$('#employeeName').change( function (e) {
    let employeeID = e.target.value;
    let [selectedItem] = $("#employeeName option:selected");

    let employeeOffice = selectedItem.getAttribute('data-office') || '';
    let employeePosition = selectedItem.getAttribute('data-position') || '';
    let photo = selectedItem.getAttribute('data-photo') || '';
    let employeeId = selectedItem.getAttribute('data-employeeId') || '';

    $('#office').val(employeeOffice);
    $('#position').val(employeePosition);
    if (employeeID == ''){
        $('#empPhoto').attr('src','/storage/employee_images/no_image.png');
    }else{
        $('.employeeName').removeClass("is-invalid");
        $('.employeeName').addClass("is-valid");
        $("#employeeName-error-message").html("");
        $('#empPhoto').attr('src','/storage/employee_images/'+photo);
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
                    "employeeName",
                    "vlEarned",
 
                    "slEarned",
                    "vlEnjoyed",
                    "slEnjoyed",
                    "asOf"
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

    let employeeID = $('#empID').val();

    let data = $('#editForwardedBalance').serialize();
    $.ajax({
        url : `/employee/leave-forwarded-balance/${employeeID}`,
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
                    "update_vlEarned",
                    "update_slEarned",
                    "update_vlEnjoyed",
                    "update_slEnjoyed",
                    "update_asOf"
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
    let employeeName = '';
    $('#employeeName').val(employeeName).trigger('change');
    $('#forwardedBalanceTable').addClass('d-none');
    $('#forwardedBalanceCard').removeClass('d-none'); 
    $('#employeeName-error-message, #asOf-error-message, #vlEarned-error-message').html('');
    $('#slEarned-error-message, #vlEnjoyed-error-message, #slEnjoyed-error-message').html('');
    $('#asOf, #vlEarned, #vlEnjoyed, #slEarned, #slEnjoyed, .employeeName').removeClass('is-invalid');
    $('#asOf, #vlEarned, #vlEnjoyed, #slEarned, #slEnjoyed, .employeeName').removeClass('is-valid');
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
    $('#empID').val(leaveID);

    // Ajax request for fetching leave type data.
    $.ajax({
        url : `/employee/leave-forwarded-balance/${leaveID}/edit`,
        success : function (leave) {
            // Collect data of form fields.
            console.log(leave.employee_information);
            $('#update_empPhoto').attr('src','/storage/employee_images/logo.png');
            $('#update_employeeName').val(`${leave.employee_information.LastName}, ${leave.employee_information.FirstName} ${leave.employee_information.MiddleName} ${leave.employee_information.Suffix}`);
            $('#update_office').val(leave.employee_information.OfficeDescription);
            $('#update_position').val(leave.employee_information.position_name);
            
            leave.leaveRecord.forEach(function(data){
                $('#update_asOf').val(data.fb_as_of);
                if(data.leave_type_id == 2){
                    $('#update_vlEarned').val(data.earned);
                    $('#update_vlEnjoyed').val(data.used);
                    vlBalanceVal = parseFloat(data.earned - data.used).toFixed(3);
                    $('#update_vlBalance').val(vlBalanceVal);
                }else{
                    $('#update_slEarned').val(data.earned);
                    $('#update_slEnjoyed').val(data.used);
                    slBalanceVal = parseFloat(data.earned - data.used).toFixed(3);
                    $('#update_slBalance').val(slBalanceVal);
                }
                
            })
                $('#update_total_lb').val((parseFloat(vlBalanceVal) + parseFloat(slBalanceVal)).toFixed(3));
        },
    });
});

$(document).on('click', '#update_btnDelete', function () {
    let leaveID = $('#empID').val();
    let fbAsOF = $('#update_asOf').val();
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
                    data: { fb_as_of : fbAsOF },
                    method : 'POST',
                    success : function (response) {
                            swal("Good job!", "Successfully delete a leave record.", "success", {closeOnClickOutside: false}).then((isClicked) => {
                            if(isClicked) {
                                $('#update_btnBack').trigger('click');
                                $('#forwarded-balance-table').DataTable().ajax.reload();
                            }
                        })
                    }
                });
            }
        });
});

$(document).on('click', '.delete__leave__type', function () {
    let leaveID = $(this).attr('data-id');
    let fbAsOF = $(this).attr('data-as-of-date');
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
                    data: { fb_as_of : fbAsOF },
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