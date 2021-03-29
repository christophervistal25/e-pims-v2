
        $(function() {
            $('#plantilla').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/plantilla-list',
        columns: [
                { data: 'plantilla_id', name: 'plantilla_id' },
                { data: 'old_item_no', name: 'old_item_no' },
                { data: 'new_item_no', name: 'new_item_no' },
                { data: 'position_title', name: 'position_title' },
                { data: 'employee_id', name: 'employee_id' },
                { data: 'office_code', name: 'office_code' },
                { data: 'status', name: 'status' },
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
    
            
