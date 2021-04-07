
        $(function() {
            $('#plantilla').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/plantilla-list',
        columns: [
                { data: 'plantilla_id', name: 'plantilla_id' },
                { data: 'item_no', name: 'item_no' },
                { data: 'positions', name: 'positions' },
                { data: 'employee', name: 'employee' },
                { data: 'office', name: 'office' },
                { data: 'status', name: 'status' },
                {data: 'action', name: 'action'},
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
                $("input[id='num-only']").on('input', function (e) {
                $(this).val($(this).val().replace(/[^0-9.]/g, ''));
                });
            });

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                $(document).ready(function() {
                    $("#currentSalarygrade").change(function(){
                    let currentSalarygrade = $('#currentSalarygrade').val();
                    let currentStepno = $('#currentStepno').val();
                    let currentSgyear = $('#currentSgyear').val();
                    console.log(currentSalarygrade);
                    console.log(currentStepno);
                    console.log(currentSgyear);
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



                
   
            $(document).ready(function() {
                /////////////////////////////////////////////////////////////////////////////////////////////////////////
                $("#dbmPreviousSgno").change(function(){
                let dbmPreviousSg = $('#dbmPreviousSgno').val();
                let dbmPreviousStep = $('#dbmPreviousStepno').val();
                let dbmPreviousSgyear = $('#dbmPreviousSgyear').val();
                    $.ajax({
                        url: `/api/dbmPrevious/${dbmPreviousSg}/${dbmPreviousStep}/${dbmPreviousSgyear}`, 
                        success:(response) => {
                            if(response == ''){ 
                                $('#dbmPreviousAmount').val('No Data');
                            }else{
                                var currentSalaryAmount = response['sg_step' + dbmPreviousStep];
                                $('#dbmPreviousAmount').val(currentSalaryAmount);
                            }
                           
                        }
                    });
                });
                $("#dbmPreviousStepno").change(function(){
                let dbmPreviousSg = $('#dbmPreviousSgno').val();
                let dbmPreviousStep = $('#dbmPreviousStepno').val();
                let dbmPreviousSgyear = $('#dbmPreviousSgyear').val();
                    $.ajax({
                        url: `/api/dbmPrevious/${dbmPreviousSg}/${dbmPreviousStep}/${dbmPreviousSgyear}`, 
                        success:(response) => {
                            if(response == ''){ 
                                $('#dbmPreviousAmount').val('No Data');
                            }else{
                                var currentSalaryAmount = response['sg_step' + dbmPreviousStep];
                                $('#dbmPreviousAmount').val(currentSalaryAmount);
                            }
                        }
                    });
                });
                $("#dbmPreviousSgyear").change(function(){
                let dbmPreviousSg = $('#dbmPreviousSgno').val();
                let dbmPreviousStep = $('#dbmPreviousStepno').val();
                let dbmPreviousSgyear = $('#dbmPreviousSgyear').val();
                    $.ajax({
                        url: `/api/dbmPrevious/${dbmPreviousSg}/${dbmPreviousStep}/${dbmPreviousSgyear}`, 
                        success:(response) => {
                            if(response == ''){
                                $('#dbmPreviousAmount').val('No Data');
                            } else {
                                let currentSalaryAmount = response['sg_step' + dbmPreviousStep];
                                $('#dbmPreviousAmount').val(currentSalaryAmount);
                            }
                        }
                    });
                });
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////
                $("#dbmCurrentSgno").change(function(){
                    let dbmCurrentSg = $('#dbmCurrentSgno').val();
                    let dbmCurrentStep = $('#dbmCurrentStepno').val();
                    let dbmCurrentSgyear = $('#dbmCurrentSgyear').val();
                        $.ajax({
                            url: `/api/dbmCurrent/${dbmCurrentSg}/${dbmCurrentStep}/${dbmCurrentSgyear}`, 
                            success:(response) => {
                                if(response == ''){
                                    $('#dbmCurrentAmount').val('No Data');
                                } else {
                                    let currentSalaryAmount = response['sg_step' + dbmCurrentStep];
                                    $('#dbmCurrentAmount').val(currentSalaryAmount);
                                }
                            }
                        });
                    });
                    $("#dbmCurrentStepno").change(function(){
                        let dbmCurrentSg = $('#dbmCurrentSgno').val();
                        let dbmCurrentStep = $('#dbmCurrentStepno').val();
                        let dbmCurrentSgyear = $('#dbmCurrentSgyear').val();
                            $.ajax({
                                url: `/api/dbmCurrent/${dbmCurrentSg}/${dbmCurrentStep}/${dbmCurrentSgyear}`, 
                                success:(response) => {
                                    if(response == ''){
                                        $('#dbmCurrentAmount').val('No Data');
                                    } else {
                                        let currentSalaryAmount = response['sg_step' + dbmCurrentStep];
                                        $('#dbmCurrentAmount').val(currentSalaryAmount);
                                    }
                                }
                            });
                        });
                        $("#dbmCurrentSgyear").change(function(){
                            let dbmCurrentSg = $('#dbmCurrentSgno').val();
                            let dbmCurrentStep = $('#dbmCurrentStepno').val();
                            let dbmCurrentSgyear = $('#dbmCurrentSgyear').val();
                                $.ajax({
                                    url: `/api/dbmCurrent/${dbmCurrentSg}/${dbmCurrentStep}/${dbmCurrentSgyear}`, 
                                    success:(response) => {
                                        if(response == ''){
                                            $('#dbmCurrentAmount').val('No Data');
                                        } else {
                                            let currentSalaryAmount = response['sg_step' + dbmCurrentStep];
                                            $('#dbmCurrentAmount').val(currentSalaryAmount);
                                        }
                                    }
                                });
                            });
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////
                $("#cscPreviousSgno").change(function(){
                    let cscPreviousSg = $('#cscPreviousSgno').val();
                    let cscPreviousStep = $('#cscPreviousStepno').val();
                    let cscPreviousSgyear = $('#cscPreviousSgyear').val();
                        $.ajax({
                            url: `/api/cscPrevious/${cscPreviousSg}/${cscPreviousStep}/${cscPreviousSgyear}`, 
                            success:(response) => {
                                if(response == ''){
                                    $('#cscPreviousAmount').val('No Data');
                                } else {
                                    let currentSalaryAmount = response['sg_step' + cscPreviousStep];
                                    $('#cscPreviousAmount').val(currentSalaryAmount);
                                }
                            }
                        });
                    });
                    $("#cscPreviousStepno").change(function(){
                        let cscPreviousSg = $('#cscPreviousSgno').val();
                        let cscPreviousStep = $('#cscPreviousStepno').val();
                        let cscPreviousSgyear = $('#cscPreviousSgyear').val();
                            $.ajax({
                                url: `/api/cscPrevious/${cscPreviousSg}/${cscPreviousStep}/${cscPreviousSgyear}`, 
                                success:(response) => {
                                    if(response == ''){
                                        $('#cscPreviousAmount').val('No Data');
                                    } else {
                                        let currentSalaryAmount = response['sg_step' + cscPreviousStep];
                                        $('#cscPreviousAmount').val(currentSalaryAmount);
                                    }
                                }
                            });
                        });
                        $("#cscPreviousSgyear").change(function(){
                            let cscPreviousSg = $('#cscPreviousSgno').val();
                            let cscPreviousStep = $('#cscPreviousStepno').val();
                            let cscPreviousSgyear = $('#cscPreviousSgyear').val();
                                $.ajax({
                                    url: `/api/cscPrevious/${cscPreviousSg}/${cscPreviousStep}/${cscPreviousSgyear}`, 
                                    success:(response) => {
                                        if(response == ''){
                                            $('#cscPreviousAmount').val('No Data');
                                        } else {
                                            let currentSalaryAmount = response['sg_step' + cscPreviousStep];
                                            $('#cscPreviousAmount').val(currentSalaryAmount);
                                        }
                                    }
                                });
                            });
                /////////////////////////////////////////////////////////////////////////////////////////////////
                });

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
                            $("#positionTitle").append('<option value='+ name + '>'+ name + '</option>');
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
                    swal("Sucessfully Added!", "", "success");
                }
        },
            error: function (response) {
                console.log(response);
                    if( response.status === 422 ) {
                        // swal("Oops...", response.responseText, "error");
                        swal("Error saving", '', "error");
                    }
            }
        });
    });
});
