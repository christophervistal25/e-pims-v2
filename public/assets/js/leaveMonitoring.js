$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//PAGE ON LOAD
$( document ).ready(function() {
    $('.yearFilter, .particularFilter, #btnUndertime').addClass('d-none');
});

//FUNCTION TO FORMAT DATE TO (yyyy-mm)
function formatDateMonthONly(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month].join('-');
}

//SHOW ADD LATE OR UNDERTIME MODAL
$('#btnUndertime').click(() => {
    let employeeID = $('#employeeName').val();

    $('#btnAddUndertime').removeClass('d-none');
    $('#btnUpdateUndertime').addClass('d-none');
    $('#employee_id').val(employeeID);
    $('#addUndertime').modal('toggle');
});

//RESET MODAL IF IT IS CLOSED
$('#addUndertime').on('hidden.bs.modal', function () {
    $('#addUndertimeForm').trigger('reset');
    $('#date_added-error-message, #equivalent-error-message').html('');
    $('#equivalent-error-message').addClass('d-none');
    $('.date_added, .edit_availed, .equivalent').removeClass('is-invalid');
})

    
// SHOWS THE DATA VALUE IN INPUT INCLUDING THE PHOTO OF THE EMPLOYEE AND THE LEAVE RECORDS OF THE EMPLOYEE
$('#employeeName').change(function (e) {
    let empID = e.target.value;
    let [selectedItem] = $("#employeeName option:selected");

    let employeeOffice = selectedItem.getAttribute('data-office') || '';
    let employeePosition = selectedItem.getAttribute('data-position') || '';
    let photo = selectedItem.getAttribute('data-photo') || '';

    $('#office').val(employeeOffice);
    $('#position').val(employeePosition);
    $('table tbody').html('');

    if (empID == '') {
        $('#empPhoto').attr('src', '/storage/employee_images/no_image.png');
    } else {
        $('#empPhoto').attr('src', '/storage/employee_images/' + photo);
    }

    if (empID === "") {
        $('.yearFilter, .particularFilter, #btnUndertime').addClass('d-none');
    } else {
        $.ajax({
            url: `/employee/leave-monitoring/${empID}`,
            method: "GET",
            data: {
                id: empID
            },
            success: function (data) {
                
                $('table tbody').append(data);
                var tr = $('#leave_card tbody tr:last'); 
                let vacBalance =  tr.find("td:eq(4)").html();
                let sickBalance =  tr.find("td:eq(8)").html();
                let totalBalance =  tr.find("td:eq(10)").html();
                let dataFound = $('#data_found').val();
                
                if(dataFound == 0){
                    $('.yearFilter, .particularFilter, #btnUndertime').addClass('d-none');
                    $('#vlBal, #slBal, #totalBalance').val(0);
                }else{
                    $('.yearFilter, .particularFilter, #btnUndertime').removeClass('d-none');
                    $('#vlBal').val(parseFloat(vacBalance).toFixed(3));
                    $('#slBal').val(parseFloat(sickBalance).toFixed(3));
                    $('#totalBalance').val(parseFloat(totalBalance).toFixed(3));
                }
                
            }
        })
    }
});

//COMPUTATION OF LEAVE EQUIVALENT INSIDE MODAL
let hoursLate = document.querySelector('#hoursLate');
let minsLate = document.querySelector('#minsLate');
let hoursUndertime = document.querySelector('#hoursUndertime');
let minsUndertime = document.querySelector('#minsUndertime');
let equivalent = document.querySelector('#equivalent');

hoursLate.addEventListener("keyup", function(){ 
    if (hoursLate.value === '') {
        hoursLate.value = 0;
    }
    equivalent.value =  ((parseFloat(hoursLate.value) * 0.125) + (parseFloat(minsLate.value) * 0.002) 
                        + (parseFloat(hoursUndertime.value) * 0.125) + (parseFloat(minsUndertime.value) * 0.002)).toFixed(3);
});

minsLate.addEventListener("keyup", function(){
    if (minsLate.value === '') {
        minsLate.value = 0;
    }
    equivalent.value =  ((parseFloat(hoursLate.value) * 0.125) + (parseFloat(minsLate.value) * 0.002) 
                        + (parseFloat(hoursUndertime.value) * 0.125) + (parseFloat(minsUndertime.value) * 0.002)).toFixed(3);
});

hoursUndertime.addEventListener("keyup", function(){
    if (hoursUndertime.value === '') {
        hoursUndertime.value = 0;
    }
    equivalent.value =  ((parseFloat(hoursLate.value) * 0.125) + (parseFloat(minsLate.value) * 0.002) 
                        + (parseFloat(hoursUndertime.value) * 0.125) + (parseFloat(minsUndertime.value) * 0.002)).toFixed(3);
});

minsUndertime.addEventListener("keyup", function(){
    if (minsUndertime.value === '') {
        minsUndertime.value = 0;
    }
    equivalent.value =  ((parseFloat(hoursLate.value) * 0.125) + (parseFloat(minsLate.value) * 0.002) 
                        + (parseFloat(hoursUndertime.value) * 0.125) + (parseFloat(minsUndertime.value) * 0.002)).toFixed(3);
});

//ADD LATE OF UNDERTIME OF EACH EMPLOYEE
$('#btnAddUndertime').click( (e)=> {
    e.preventDefault();

    $('#save-spinner').removeClass('d-none');
    
    let employeeID = $('#employeeName').val(); 
    let data = $('#addUndertimeForm').serialize();
    
    $.ajax({
        url : '/employee/late-undertime',
        method : 'POST',
        data : data,
        success : function (response) {
            $('#save-spinner').addClass('d-none');
            if(response.success){
                swal("Good job!", "Successfully added!", "success", {closeOnClickOutside: false}).then((isClicked) => {
                    if(isClicked) {
                        $('#addUndertime').modal('toggle');
                        $('#employeeName').val(employeeID).trigger('change');
                    }
                })
            }
        },
        error: function(response) {
            $('#save-spinner').addClass('d-none');
            if (response.status === 422) {
                let errors = response.responseJSON.errors;

                const inputNames = [
                    "date_added",
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
                
                if (errors.hasOwnProperty('equivalent')) {
                    $(`#equivalent-error-message`).removeClass("d-none");
                    $(`.equivalent`).addClass('is-invalid');
                    $(`#equivalent-error-message`).html("");
                    $(`#equivalent-error-message`).append(
                        `${errors['equivalent'][0]}`
                    );
                } else {
                    $(`#equivalent-error-message`).addClass("d-none");
                    $(`.equivalent`).removeClass('is-invalid');
                    $(`.equivalent`).addClass('is-valid');
                    $(`#equivalent-error-message`).html("");
                }

                
        
            }
        }
    });
});

//UPDATE AND DELETE UNDERTIME
//Delete Undertime
$(document).on('click', '#deleteUndertime', function () {
    let employeeID = $('#employeeName').val();
    undertimeID = $(this).attr('data-id');

    swal({
        title: "Are you sure?",
        text : "You are about to delete this undertime record.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        closeOnClickOutside: false,
        }).then((willDelete) => {
            if(willDelete) {
                $.ajax({
                    url : `/employee/late-undertime/${undertimeID}`,
                    method : 'DELETE',
                    success : function (response) {
                            swal("Good job!", "Successfully deleted undertime record.", "success", {closeOnClickOutside: false}).then((isClicked) => {
                            if(isClicked) {
                                $('#employeeName').val(employeeID).trigger('change');
                            }
                        })
                    }
                });
            }
        });
});

//View undertime Record for editing
$(document).on('click', '#editUndertime', function () {
    undertimeID = $(this).attr('data-id');
    $('#addUndertime').modal('toggle');
    $('#btnAddUndertime').addClass('d-none');
    $('#btnUpdateUndertime').removeClass('d-none');
    $('.modal-title').html(`View/Edit Undertime Record`);
    $('#undertime_id').val(undertimeID);
    // Ajax request for fetching leave type data.
    $.ajax({
        url : `/employee/late-undertime/${undertimeID}/edit`,
        success : function (undertimeRecord) {
            //format date_added to string
            let month_year = formatDateMonthONly(undertimeRecord.month_year);
            $("#hoursLate").val(undertimeRecord.hoursLate);
            $("#minsLate").val(undertimeRecord.minsLate);
            $('#hoursUndertime').val(undertimeRecord.hoursUndertime);
            $('#minsUndertime').val(undertimeRecord.minsUndertime);
            $('#date_added').val(month_year);
            $('#equivalent').val(undertimeRecord.equivalent);

        },
    });
});

//Save Changes of Undertime Record
$('#btnUpdateUndertime').click( (e)=> {
    e.preventDefault();

    $('#save-spinner').removeClass('d-none');
    let undertimeID = $('#undertime_id').val();
    let employeeID = $('#employeeName').val(); 
    let data = $('#addUndertimeForm').serialize();
    
    $.ajax({
        url : `/employee/late-undertime/${undertimeID}`,
        method : 'PUT',
        data : data,
        success : function (response) {
            $('#save-spinner').addClass('d-none');
            if(response.success){
                swal("Good job!", "Successfully added!", "success", {closeOnClickOutside: false}).then((isClicked) => {
                    if(isClicked) {
                        $('#addUndertime').modal('toggle');
                        $('#employeeName').val(employeeID).trigger('change');
                    }
                })
            }
        },
        error: function(response) {
            $('#save-spinner').addClass('d-none');
            if (response.status === 422) {
                let errors = response.responseJSON.errors;

                const inputNames = [
                    "date_added",
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
                
                if (errors.hasOwnProperty('equivalent')) {
                    $(`#equivalent-error-message`).removeClass("d-none");
                    $(`.equivalent`).addClass('is-invalid');
                    $(`#equivalent-error-message`).html("");
                    $(`#equivalent-error-message`).append(
                        `${errors['equivalent'][0]}`
                    );
                } else {
                    $(`#equivalent-error-message`).addClass("d-none");
                    $(`.equivalent`).removeClass('is-invalid');
                    $(`.equivalent`).addClass('is-valid');
                    $(`#equivalent-error-message`).html("");
                }

                
        
            }
        }
    });
});

