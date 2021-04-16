// display salary grade

    $(function() {
        $('#salaryAdjustment').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,  
            retrieve: true,
            ajax: '/salary-adjustment-list',
            columns: [
                    { data: 'date_adjustment', name: 'date_adjustment' },
                    { data: 'employee', name: 'employee.firstname' ,searchable: true, sortable : false},
                    { data: 'sg_no', name: 'sg_no' },
                    { data: 'step_no', name: 'step_no' },
                    { data: 'salary_previous', name: 'salary_previous' },
                    { data: 'salary_new', name: 'salary_new' },
                    { data: 'salary_diff', name: 'salary_diff' },
                    { data: 'action', name: 'action' }
            ]
        });
    });

// number only
    $(function(){
        $("input[id='salaryNew']").on('input', function (e) {
        $(this).val($(this).val().replace(/[^0-9.]/g, ''));
        });
    });
    $(function(){
        $("input[id='itemNo']").on('input', function (e) {
        $(this).val($(this).val().replace(/[^0-9.]/g, ''));
        });
    });
// get value of employees sg, sn, sp
$(document).ready(function() {
    $('#employeeName').change(function (e) {
            let employeeID = e.target.value;
            let plantilla = $($( "#employeeName option:selected" )[0]).attr('data-plantilla');
            console.log(plantilla);
            if(plantilla) {
                plantilla = JSON.parse(plantilla);
                $('#employeeId').val(plantilla.employee_id);
                $('#positionName').val(plantilla.position.position_name);
                $('#positionId').val(plantilla.position.position_id);                
                $('#itemNo').val(plantilla.item_no);
                $('#salaryGrade').val(plantilla.sg_no);     
                $('#stepNo').val(plantilla.step_no);
                $('#salaryPrevious').val(plantilla.salary_amount);
            } else {
                $('#positionName').val('');
                $('#itemNo').val('');
                $('#salaryGrade').val('');
                $('#stepNo').val('');
                $('#salaryPrevious').val('');
            }
        });
    });

    // code for show add form
    $(document).ready(function(){
        $("#addbutton").click(function(){
            $("#add").attr("class", "page-header");
            $("#table").attr("class", "page-header d-none");
        });
        });
        // {{-- code for show table --}}
            $(document).ready(function(){
            $("#cancelbutton").click(function(){
                $("#add").attr("class", "page-header d-none");
                $("#table").attr("class", "page-header");
            });
            });


            function reset() {
                $('#employeeName').val('Nothing Select').trigger('change');
                $('input').val('');
              }


            $(document).keyup(function() {
            var salaryPrevious = parseFloat($('#salaryPrevious').val());
            var salaryNew = parseFloat($('#salaryNew').val());
            let total = salaryNew - salaryPrevious;
            $('#salaryDifference').val(total.toFixed(2));
        });

//// add salary adjustment
$(document).ready(function () {
    $('#salaryAdjustmentForm').submit(function (e) {
        e.preventDefault();
        let data = $(this).serialize();
        $.ajax({
            type: "POST",
            url: '/salary-adjustment',
            data : data,
            success: function (response) {
                if(response.success){
                    $('input').val('');
                    $('#employeeName').val('Please Select').trigger('change');
                    const errorClass = ["#date-adjustment-error-message","employee-error-message","#item-no-error-message","#position-error-message","#salary-grade-error-message","#step-no-error-message","#salary-previous-error-message","#salary-new-error-message","#salary-difference-error-message"];
                    $.each(errorClass, function(index , value) {
                        $(`${value}`).removeClass('is-invalid');
                        });
                    const errorMessage = ["#date-adjustment-error-message","employee-error-message","#item-no-error-message","#position-error-message","#salary-grade-error-message","#step-no-error-message","#salary-previous-error-message","#salary-new-error-message","#salary-difference-error-message"];
                    $.each(errorMessage, function(index , value) {
                        $(`${value}`).html('');
                        });
                    $('#salaryAdjustment').DataTable().ajax.reload();
                    swal("Sucessfully Added!", "", "success");
                }
        },
            error: function (response) {
                    if( response.status === 422 ) {
                        let errors = response.responseJSON.errors;
                        console.log(errors)
                        if(errors.hasOwnProperty('dateAdjustment')) {
                            $('#dateAdjustment').addClass('is-invalid');
                            $('#date-adjustment-error-message').html('');
                            $('#date-adjustment-error-message').append(`<span>${errors.dateAdjustment[0]}</span>`);
                        }else{
                            $('#dateAdjustment').removeClass('is-invalid');
                            $('#date-adjustment-error-message').html('');
                        }
                        if(errors.hasOwnProperty('employeeName')) {
                            $('#employeeName').addClass('is-invalid');
                            $('#employee-error-message').html('');
                            $('#employee-error-message').append(`<span>${errors.employeeName[0]}</span>`);
                        }else{
                            $('#employeeName').removeClass('is-invalid');
                            $('#employee-error-message').html('');
                        }
                        if(errors.hasOwnProperty('itemNo')) {
                            $('#itemNo').addClass('is-invalid');
                            $('#item-no-error-message').html('');
                            $('#item-no-error-message').append(`<span>${errors.itemNo[0]}</span>`);
                        }else{
                            $('#itemNo').removeClass('is-invalid');
                            $('#item-no-error-message').html('');
                        }
                        if(errors.hasOwnProperty('positionId')) {
                            $('#positionName').addClass('is-invalid');
                            $('#position-error-message').html('');
                            $('#position-error-message').append(`<span>${errors.positionId[0]}</span>`);
                        }else{
                            $('#position').removeClass('is-invalid');
                            $('#position-error-message').html('');
                        }
                        if(errors.hasOwnProperty('salaryGrade')) {
                            $('#salaryGrade').addClass('is-invalid');
                            $('#salary-grade-error-message').html('');
                            $('#salary-grade-error-message').append(`<span>${errors.salaryGrade[0]}</span>`);
                        }else{
                            $('#salaryGrade').removeClass('is-invalid');
                            $('#salary-grade-error-message').html('');
                        }
                        if(errors.hasOwnProperty('stepNo')) {
                            $('#stepNo').addClass('is-invalid');
                            $('#step-no-error-message').html('');
                            $('#step-no-error-message').append(`<span>${errors.stepNo[0]}</span>`);
                        }else{
                            $('#stepNo').removeClass('is-invalid');
                            $('#step-no-error-message').html('');
                        }
                        if(errors.hasOwnProperty('salaryPrevious')) {
                            $('#salaryPrevious').addClass('is-invalid');
                            $('#salary-previous-error-message').html('');
                            $('#salary-previous-error-message').append(`<span>${errors.salaryPrevious[0]}</span>`);
                        }else{
                            $('#salaryPrevious').removeClass('is-invalid');
                            $('#salary-previous-error-message').html('');
                        }
                        if(errors.hasOwnProperty('salaryNew')) {
                            $('#salaryNew').addClass('is-invalid');
                            $('#salary-new-error-message').html('');
                            $('#salary-new-error-message').append(`<span>${errors.salaryNew[0]}</span>`);
                        }else{
                            $('#salaryNew').removeClass('is-invalid');
                            $('#salary-new-error-message').html('');
                        }
                        if(errors.hasOwnProperty('salaryDifference')) {
                            $('#salaryDifference').addClass('is-invalid');
                            $('#salary-difference-error-message').html('');
                            $('#salary-difference-error-message').append(`<span>${errors.salaryDifference[0]}</span>`);
                        }else{
                            $('#salaryDifference').removeClass('is-invalid');
                            $('#salary-difference-error-message').html('');
                        }
                         // Create an parent element
                         let parentElement = document.createElement('ul');
                         let errorss = response.responseJSON.errors;
                        $.each( errorss, function( key, value ) {
                            let errorMessage = document.createElement('li');
                            let [error] = value;
                            errorMessage.innerHTML = error;
                            parentElement.appendChild(errorMessage);
                        });
                        swal({
                            title: "The given data was invalid!",
                            icon: "error",
                            content: parentElement,
                        });
                    }
            }
        });
    });
});