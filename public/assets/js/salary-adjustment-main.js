


$(document).ready(function () {


    $("#cancelButton").click(function () {
        $("#add").attr("class", "page-header d-none");
        $("#table").attr("class", "page-header");
    });


        // filter list office
        let selectedOffice = localStorage.getItem('SELECTED_OFFICE') || '*';
        if(selectedOffice !== '0001') {
            $('#office').val(localStorage.getItem('SELECTED_OFFICE')).trigger('refresh');
        }
            salaryAdjustment = $(
                "#salaryAdjustment"
            ).DataTable({
                processing: true,
                destroy: true,
                pageLength: 50,
                retrieve: true,
                pagingType: "full_numbers",
                language: {
                    processing:
                        '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> ',
                },
                ajax: {
                    url: `/salary-adjustment-main/list/all/${selectedOffice}/`,
                },
                columns: [
                    {
                        data: "fullname",
                        name: "fullname",
                    },

                    {
                        data: "office",
                        name: "office",
                    },
                    {
                        data: "position",
                        name: "position",
                    },
                    {
                        data: "sg_no",
                        name: "sg_no",
                    },
                    {
                        data: "step_no",
                        name: "step_no",
                    },
                    {
                        data: "salary_amount_previous",
                        name: "salary_amount_previous",
                        render: $.fn.dataTable.render.number(",", ".", 2),
                    },
                    {
                        data: "salary_amount",
                        name: "salary_amount",
                        render: $.fn.dataTable.render.number(",", ".", 2),
                    },
                    {
                        data: "salary_difference",
                        name: "salary_difference",
                        render: $.fn.dataTable.render.number(",", ".", 2),
                    },
                ],
            });



    $("#office,#yearAdjustment").change(function (e) {
        let selectedOffices = $("#office").val();
        localStorage.setItem('SELECTED_OFFICE', selectedOffices);
        salaryAdjustment.ajax
            .url(`/salary-adjustment-main/list/all/${selectedOffices}`)
            .load();
    });


    $("#adjustSalaryBtn").click(function () {
        // let id = $(this).attr("value");
        let url = /salary-adjustment-main-adjust-employees/;
        // let dltUrl = url;
        swal({
                title: "Are you sure you want to adjust all salary of employees?",
                icon: "warning",
                buttons: true,
                dangerMode: true
            , })
            .then((willAdjust) => {
                if (willAdjust) {
                    let dateAdjustment = $('#dateAdjustment').val();
                    let remarks = $('#remarks').val();
                    let office = $('#office').val();
                    $('#exampleModal').modal('hide');
                    swal("Please Wait!", " ", "warning", {
                        button: false,
                      });
                        $.ajax({
                            url: url,
                            type: "POST",
                            cache: false,
                            data: {
                                _token: '{{ csrf_token() }}',
                                dateAdjustment: dateAdjustment,
                                remarks: remarks,
                                office: office,
                            },
                            success: function(response) {
                                function delayFunc() {
                                    swal.close()
                                    swal("Successfully adjust salary!", "", "success");
                                    $("#salaryAdjustment").DataTable().ajax.reload();
                                 }
                                 setTimeout(delayFunc,20000);
                            }
                        });
                } else {
                        swal("Cancelled", "", "error");
                }
            });
    });







    // $("#saveBtn").click(function () {
    //     let date = $("#dateAdjustment").val();
    //     let currentYear = $("#year").val();
    //     let remarks = $("#remarks").val();
    //     let selectedRecordIDS = [];
    //     $("#saveBtn").attr("disabled", true);
    //     $("#loading").removeClass("d-none");
    //     $("#saving").html("Saving . . . ");
    //     $(".not-select-checkbox").each(function (index, element) {
    //         if (element.checked == true) {
    //             selectedRecordIDS.push(element.value);
    //         }
    //     });
    //     if (selectedRecordIDS.length == 0) {
    //         swal("Please Select Employee", "", "error");
    //         $("#saveBtn").attr("disabled", false);
    //         $("#loading").addClass("d-none");
    //         $("#saving").html("Save");
    //     } else {
    //         $.ajax({
    //             type: "POST",
    //             url: `/api/salary-adjustment-per-office/AddData`,
    //             data: {
    //                 ids: selectedRecordIDS.toString(),
    //                 date: date,
    //                 year: currentYear,
    //                 remarks: remarks,
    //             },
    //             success: function (response) {
    //                 if (response.success) {
    //                     swal("Successfully Added!", "", "success");
    //                     salaryAdjustmentPerOfficeSelected.ajax.reload();
    //                     salaryAdjustmentPerOfficeNotSelected.ajax.reload();
    //                     $("#saveBtn").attr("disabled", false);
    //                     $("#loading").addClass("d-none");
    //                     $("#saving").html("Save");
    //                     $("#selectAll").prop("checked", false);
    //                     $("#remarks").val("");
    //                 }
    //             },
    //         });
    //     }
    // });


});
