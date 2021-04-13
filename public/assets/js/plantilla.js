
        $(function() {
            $('#plantilla').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/plantilla-list',
        columns: [
                { data: 'plantilla_id', name: 'plantilla_id' },
                { data: 'item_no', name: 'item_no' },
                { data: 'positions', name: 'positions.position_name', searchable: true, sortable : false, visible:true  },
                { data: 'employee', name: 'employee.firstname', searchable: true, sortable : false, visible:true },
                { data: 'office', name: 'office.office_short_name', searchable: true, sortable : false, visible:true },
                { data: 'status', name: 'status', sortable : false,},
                {data: 'action', name: 'action', searchable: false, sortable : false,},
        ]
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
        // {{-- code for getting emp id from name --}}
        // var select = document.getElementById('employee_name');
        // var input = document.getElementById('employee_id');
        // select.onchange = function() {
        //     input.value = select.value;
        // }
        // {{-- code for number only --}}
            $(function(){
                $("input[id='oldItemNo']").on('input', function (e) {
                $(this).val($(this).val().replace(/[^0-9.]/g, ''));
                });
            });
            $(function(){
                $("input[id='itemNo']").on('input', function (e) {
                $(this).val($(this).val().replace(/[^0-9.]/g, ''));
                });
            });
////////////////////////////// position display salary grade
            $(document).ready(function() {
                $("#positionTitle").change(function(){
                let positionTitle = $('#positionTitle').val();
                let currentStepno = $('#currentStepno').val();
                        $.ajax({
                            url: `/api/positionSalaryGrade/${positionTitle}`,
                            success:(response) => {
                                    let currentSalaryGrade = response.salary_grade.sg_no;
                                    $('#currentSalarygrade').val(currentSalaryGrade);
                                    let currentSalaryAmount = response.salary_grade['sg_step' + currentStepno];
                                    $('#currentSalaryamount').val(currentSalaryAmount);
                            }
                    });
                });
            });

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                $(document).ready(function() {
                    $("#currentSalarygrade").change(function(){
                    let currentSalarygrade = $('#currentSalarygrade').val();
                    let currentStepno = $('#currentStepno').val();
                    let currentSgyear = $('#currentSgyear').val();
                        $.ajax({
                            url: `/api/salarySteplist/${currentSalarygrade}/${currentStepno}/${currentSgyear}`,
                                success:(response) => {
                                    if(response == ''){
                                        $('#currentSalaryamount').val('No Data');
                                    }else{
                                        let currentSalaryAmount = response['sg_step' + currentStepno];
                                        $('#currentSalaryamount').val(currentSalaryAmount);
                                    }
                                }
                        });
                    });
                    $("#currentStepno").change(function(){
                        let currentSalarygrade = $('#currentSalarygrade').val();
                        let currentStepno = $('#currentStepno').val();
                        let currentSgyear = $('#currentSgyear').val();
                            $.ajax({
                                url: `/api/salarySteplist/${currentSalarygrade}/${currentStepno}/${currentSgyear}`, 
                                    success:(response) => {
                                        if(response == ''){
                                            $('#currentSalaryamount').val('No Data');
                                        }else{
                                            let currentSalaryAmount = response['sg_step' + currentStepno];
                                            console.log(response);
                                            $('#currentSalaryamount').val(currentSalaryAmount);
                                        }
                                    }
                            });
                        });
                        $("#currentSgyear").change(function(){
                            let currentSalarygrade = $('#currentSalarygrade').val();
                            let currentStepno = $('#currentStepno').val();
                            let currentSgyear = $('#currentSgyear').val();
                                $.ajax({
                                    url: `/api/salarySteplist/${currentSalarygrade}/${currentStepno}/${currentSgyear}`, 
                                        success:(response) => {
                                            if(response == ''){
                                                $('#currentSalaryamount').val('No Data');
                                            }else{
                                                let currentSalaryAmount = response['sg_step' + currentStepno];
                                                $('#currentSalaryamount').val(currentSalaryAmount);
                                            }
                                        }
                                });
                            });
                });
            // $(document).ready(function() {
            //     /////////////////////////////////////////////////////////////////////////////////////////////////////////
            //     $("#dbmPreviousSgno").change(function(){
            //     let dbmPreviousSg = $('#dbmPreviousSgno').val();
            //     let dbmPreviousStep = $('#dbmPreviousStepno').val();
            //     let dbmPreviousSgyear = $('#dbmPreviousSgyear').val();
            //         $.ajax({
            //             url: `/api/dbmPrevious/${dbmPreviousSg}/${dbmPreviousStep}/${dbmPreviousSgyear}`, 
            //             success:(response) => {
            //                 if(response == ''){ 
            //                     $('#dbmPreviousAmount').val('No Data');
            //                 }else{
            //                     var currentSalaryAmount = response['sg_step' + dbmPreviousStep];
            //                     $('#dbmPreviousAmount').val(currentSalaryAmount);
            //                 }
            //             }
            //         });
            //     });
            //     $("#dbmPreviousStepno").change(function(){
            //     let dbmPreviousSg = $('#dbmPreviousSgno').val();
            //     let dbmPreviousStep = $('#dbmPreviousStepno').val();
            //     let dbmPreviousSgyear = $('#dbmPreviousSgyear').val();
            //         $.ajax({
            //             url: `/api/dbmPrevious/${dbmPreviousSg}/${dbmPreviousStep}/${dbmPreviousSgyear}`, 
            //             success:(response) => {
            //                 if(response == ''){ 
            //                     $('#dbmPreviousAmount').val('No Data');
            //                 }else{
            //                     var currentSalaryAmount = response['sg_step' + dbmPreviousStep];
            //                     $('#dbmPreviousAmount').val(currentSalaryAmount);
            //                 }
            //             }
            //         });
            //     });
            //     $("#dbmPreviousSgyear").change(function(){
            //     let dbmPreviousSg = $('#dbmPreviousSgno').val();
            //     let dbmPreviousStep = $('#dbmPreviousStepno').val();
            //     let dbmPreviousSgyear = $('#dbmPreviousSgyear').val();
            //         $.ajax({
            //             url: `/api/dbmPrevious/${dbmPreviousSg}/${dbmPreviousStep}/${dbmPreviousSgyear}`, 
            //             success:(response) => {
            //                 if(response == ''){
            //                     $('#dbmPreviousAmount').val('No Data');
            //                 } else {
            //                     let currentSalaryAmount = response['sg_step' + dbmPreviousStep];
            //                     $('#dbmPreviousAmount').val(currentSalaryAmount);
            //                 }
            //             }
            //         });
            //     });
            //     /////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //     $("#dbmCurrentSgno").change(function(){
            //         let dbmCurrentSg = $('#dbmCurrentSgno').val();
            //         let dbmCurrentStep = $('#dbmCurrentStepno').val();
            //         let dbmCurrentSgyear = $('#dbmCurrentSgyear').val();
            //             $.ajax({
            //                 url: `/api/dbmCurrent/${dbmCurrentSg}/${dbmCurrentStep}/${dbmCurrentSgyear}`, 
            //                 success:(response) => {
            //                     if(response == ''){
            //                         $('#dbmCurrentAmount').val('No Data');
            //                     } else {
            //                         let currentSalaryAmount = response['sg_step' + dbmCurrentStep];
            //                         $('#dbmCurrentAmount').val(currentSalaryAmount);
            //                     }
            //                 }
            //             });
            //         });
            //         $("#dbmCurrentStepno").change(function(){
            //             let dbmCurrentSg = $('#dbmCurrentSgno').val();
            //             let dbmCurrentStep = $('#dbmCurrentStepno').val();
            //             let dbmCurrentSgyear = $('#dbmCurrentSgyear').val();
            //                 $.ajax({
            //                     url: `/api/dbmCurrent/${dbmCurrentSg}/${dbmCurrentStep}/${dbmCurrentSgyear}`, 
            //                     success:(response) => {
            //                         if(response == ''){
            //                             $('#dbmCurrentAmount').val('No Data');
            //                         } else {
            //                             let currentSalaryAmount = response['sg_step' + dbmCurrentStep];
            //                             $('#dbmCurrentAmount').val(currentSalaryAmount);
            //                         }
            //                     }
            //                 });
            //             });
            //             $("#dbmCurrentSgyear").change(function(){
            //                 let dbmCurrentSg = $('#dbmCurrentSgno').val();
            //                 let dbmCurrentStep = $('#dbmCurrentStepno').val();
            //                 let dbmCurrentSgyear = $('#dbmCurrentSgyear').val();
            //                     $.ajax({
            //                         url: `/api/dbmCurrent/${dbmCurrentSg}/${dbmCurrentStep}/${dbmCurrentSgyear}`, 
            //                         success:(response) => {
            //                             if(response == ''){
            //                                 $('#dbmCurrentAmount').val('No Data');
            //                             } else {
            //                                 let currentSalaryAmount = response['sg_step' + dbmCurrentStep];
            //                                 $('#dbmCurrentAmount').val(currentSalaryAmount);
            //                             }
            //                         }
            //                     });
            //                 });
            //     /////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //     $("#cscPreviousSgno").change(function(){
            //         let cscPreviousSg = $('#cscPreviousSgno').val();
            //         let cscPreviousStep = $('#cscPreviousStepno').val();
            //         let cscPreviousSgyear = $('#cscPreviousSgyear').val();
            //             $.ajax({
            //                 url: `/api/cscPrevious/${cscPreviousSg}/${cscPreviousStep}/${cscPreviousSgyear}`, 
            //                 success:(response) => {
            //                     if(response == ''){
            //                         $('#cscPreviousAmount').val('No Data');
            //                     } else {
            //                         let currentSalaryAmount = response['sg_step' + cscPreviousStep];
            //                         $('#cscPreviousAmount').val(currentSalaryAmount);
            //                     }
            //                 }
            //             });
            //         });
            //         $("#cscPreviousStepno").change(function(){
            //             let cscPreviousSg = $('#cscPreviousSgno').val();
            //             let cscPreviousStep = $('#cscPreviousStepno').val();
            //             let cscPreviousSgyear = $('#cscPreviousSgyear').val();
            //                 $.ajax({
            //                     url: `/api/cscPrevious/${cscPreviousSg}/${cscPreviousStep}/${cscPreviousSgyear}`, 
            //                     success:(response) => {
            //                         if(response == ''){
            //                             $('#cscPreviousAmount').val('No Data');
            //                         } else {
            //                             let currentSalaryAmount = response['sg_step' + cscPreviousStep];
            //                             $('#cscPreviousAmount').val(currentSalaryAmount);
            //                         }
            //                     }
            //                 });
            //             });
            //             $("#cscPreviousSgyear").change(function(){
            //                 let cscPreviousSg = $('#cscPreviousSgno').val();
            //                 let cscPreviousStep = $('#cscPreviousStepno').val();
            //                 let cscPreviousSgyear = $('#cscPreviousSgyear').val();
            //                     $.ajax({
            //                         url: `/api/cscPrevious/${cscPreviousSg}/${cscPreviousStep}/${cscPreviousSgyear}`, 
            //                         success:(response) => {
            //                             if(response == ''){
            //                                 $('#cscPreviousAmount').val('No Data');
            //                             } else {
            //                                 let currentSalaryAmount = response['sg_step' + cscPreviousStep];
            //                                 $('#cscPreviousAmount').val(currentSalaryAmount);
            //                             }
            //                         }
            //                     });
            //                 });
            //     /////////////////////////////////////////////////////////////////////////////////////////////////
            //     });

/////////add position function
                $(document).ready(function () {
                    $('#btnPosition').click(function (response) {
                    let name = $('#positionName').val();
                    if(name!=""){
                    $.ajax({
                        type: "POST",
                        url: '/api/addPosition',
                        data: { 
                            "positionName": name 
                            },
                       
                        success: function (response) {
                        if(response.success){
                            $('.modal').each(function(){
                                    $(this).modal('hide');
                                });
                            swal("Sucessfully Added!", "", "success");
                            document.getElementById('positionName').value = '';
                            $("#positionTitle").append('<option value='+ response.position_id + '>'+ name + '</option>');
                            $('#positionTitle').selectpicker('refresh');
                            }
                        },
                        error: function (response) {
                                if( response.status === 422 ) {
                                    swal("The position name has already been taken", "", "error");
                                }
                            }
                        });
                    }else{
                        swal("Please Input Position Name!", "", "warning");
                        }
            });
});

//// add new plantilla
$(document).ready(function () {
    $('#plantillaForm').submit(function (e) {
        e.preventDefault();
        let data = $(this).serialize();
        $.ajax({
            type: "POST",
            url: '/plantilla',
            data : data,
            success: function (response) {
                if(response.success){
                    location.reload();
                    // $("#positionTitle")[0].selectedIndex = 0
                    swal("Sucessfully Added!", "", "success");
                }
        },
            error: function (response) {
                    if( response.status === 422 ) {
                        let errors = response.responseJSON.errors;
                        console.log(errors)
                        if(errors.hasOwnProperty('itemNo')) {
                            $('#itemNo').addClass('is-invalid');
                            $('#item-no-error-message').html('');
                            $('#item-no-error-message').append(`<span>${errors.itemNo[0]}</span>`);
                        }
                        if(errors.hasOwnProperty('oldItemNo')) {
                            $('#oldItemNo').addClass('is-invalid');
                            $('#old_item-no-error-message').html('');
                            $('#old_item-no-error-message').append(`<span>${errors.oldItemNo[0]}</span>`);
                        }
                        if(errors.hasOwnProperty('positionTitle')) {
                            $('#positionTitle').addClass('is-invalid');
                            $('#position-title-error-message').html('');
                            $('#position-title-error-message').append(`<span>${errors.positionTitle[0]}</span>`);
                        }
                        if(errors.hasOwnProperty('originalAppointment')) {
                            $('#originalAppointment').addClass('is-invalid');
                            $('#original-appointment-error-message').html('');
                            $('#original-appointment-error-message').append(`<span>${errors.originalAppointment[0]}</span>`);
                        }
                        if(errors.hasOwnProperty('lastPromotion')) {
                            $('#lastPromotion').addClass('is-invalid');
                            $('#last-promotion-error-message').html('');
                            $('#last-promotion-error-message').append(`<span>${errors.lastPromotion[0]}</span>`);
                        }
                        if(errors.hasOwnProperty('status')) {
                            $('#status').addClass('is-invalid');
                            $('#status-error-message').html('');
                            $('#status-error-message').append(`<span>${errors.status[0]}</span>`);
                        }
                        if(errors.hasOwnProperty('areaCode')) {
                            $('#areaCode').addClass('is-invalid');
                            $('#area-code-error-message').html('');
                            $('#area-code-error-message').append(`<span>${errors.areaCode[0]}</span>`);
                        }
                        if(errors.hasOwnProperty('areaType')) {
                            $('#areaType').addClass('is-invalid');
                            $('#area-type-error-message').html('');
                            $('#area-type-error-message').append(`<span>${errors.areaType[0]}</span>`);
                        }
                        if(errors.hasOwnProperty('areaLevel')) {
                            $('#areaLevel').addClass('is-invalid');
                            $('#area-level-error-message').html('');
                            $('#area-level-error-message').append(`<span>${errors.areaLevel[0]}</span>`);
                        }
                        if(errors.hasOwnProperty('employeeName')) {
                            $('#employeeName').addClass('is-invalid');
                            $('#employee-name-error-message').html('');
                            $('#employee-name-error-message').append(`<span>${errors.employeeName[0]}</span>`);
                        }
                        if(errors.hasOwnProperty('salaryGrade')) {
                            $('#salaryGrade').addClass('is-invalid');
                            $('#salary-grade-error-message').html('');
                            $('#salary-grade-error-message').append(`<span>${errors.salaryGrade[0]}</span>`);
                        }
                        if(errors.hasOwnProperty('stepNo')) {
                            $('#stepNo').addClass('is-invalid');
                            $('#steps-error-message').html('');
                            $('#steps-error-message').append(`<span>${errors.stepNo[0]}</span>`);
                        }
                        if(errors.hasOwnProperty('currentSalaryamount')) {
                            $('#currentSalaryamount').addClass('is-invalid');
                            $('#salary-amount-error-message').html('');
                            $('#salary-amount-error-message').append(`<span>${errors.salaryAmount[0]}</span>`);
                        }
                        if(errors.hasOwnProperty('officeCode')) {
                            $('#officeCode').addClass('is-invalid');
                            $('#office-error-message').html('');
                            $('#office-error-message').append(`<span>${errors.officeCode[0]}</span>`);
                        }
                        if(errors.hasOwnProperty('divisionId')) {
                            $('#divisionId').addClass('is-invalid');
                            $('#division-error-message').html('');
                            $('#division-error-message').append(`<span>${errors.divisionId[0]}</span>`);
                        }
                        // swal("Oops...", response.responseText, "error");
                        swal("Error saving", '', "error");
                    }
            }
        });
    });
});
