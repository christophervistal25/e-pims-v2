$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});




let holidayID = null;
    
    const DATE_COLUMN = 1;
    const TYPE_COLUMN = 2;
    const ACTION_COLUMN = 3;

    const VALIDATION_ERROR = 422;

    let table = $('#holidays-table').DataTable({
        serverSide: true,
        stateSave: true,
        ajax: `/holiday/list`,
        processing: true,
        language: {
                    processing: '<i class="text-primary fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> ',
        },
        pagingType: "full_numbers",
        columnDefs : [{
            "targets": '_all',
            "createdCell": function (td, cellData, rowData, row, col) {
                $(td).css('padding', '15px 25px');
                if (col === TYPE_COLUMN) {
                    if (cellData === 'SPECIAL NON-WORKING') {
                        $(td).html('')
                            .html(
                                `<center><span class='badge badge-success'>${cellData}</span></center>`
                                );
                    } else if (cellData === 'SPECIAL WORKING') {
                        $(td).html('')
                            .html(
                                `<center><span class='badge badge-info'>${cellData}</span></center>`
                                );
                    } else {
                        $(td).html('')
                            .html(
                                `<center><span class='badge badge-primary'>${cellData}</span></center>`
                                );
                    }
                } else if (col === ACTION_COLUMN) {
                    $(td).html('')
                        .append(`
                            <center>
                                    <button class="btn btn-sm shadow btn-success rounded-circle holiday__edit" 
                                            data-id="${rowData.id}" 
                                            data-name="${rowData.name}" 
                                            data-date="${rowData.date}" 
                                            data-type="${rowData.type}">
                                            <i class="la la-pencil"></i>
                                    </button>
                                    <button class="ml-1 btn btn-sm shadow btn-danger rounded-circle holiday__delete" data-id="${rowData.id}" >
                                        <i class="la la-trash"></i>
                                    </button>
                                </center>
                        `);
                }
            }
        }],
        columns: [{
                data: "name",
                name: "name"
            },
            {
                className: "text-center",
                data: "date_string",
                name: "date"
            },
            {
                data: "type",
                type: "type"
            },
            {
                orderable: false,
                defaultContent: ''
            }
        ],
    });

    $('#btnHolidaySave').click(function (e) {
        let nameField = $('#holidayName');
        let dateField = $('#holidayDate');
        let typeField = $("#holidayType");

        // Display spinner
        $('#save-spinner').removeClass('d-none');

        // Clear failed form validation styles.
        nameField.removeClass('is-invalid');
        dateField.removeClass('is-invalid');
        typeField.removeClass('is-invalid');

        $('#name-error').text('');
        $('#date-error').text('');
        $('#type-error').text('');


        $.ajax({
            url: `/holiday`,
            data: {
                name: nameField.val(),
                date: dateField.val(),
                type: typeField.val()
            },
            method: 'POST',
            success: function (response) {
                if (response.success) {
                    table.draw();
                    swal("Good job!", "Sucessfully add new holiday.", "success");
                    $('#save-spinner').addClass('d-none');
                    $('#addNewHolidayModal').modal('toggle');
                }
                window.location.reload();
            },
            error: function (response) {
                $('#save-spinner').addClass('d-none');
                if (response.status === VALIDATION_ERROR) {
                    Object.keys(response.responseJSON.errors).map((field) => {
                        $(`#${field}-error`).text(
                            `${response.responseJSON.errors[field][0]}`);
                        // Capitalize field
                        let capitalizedField = field.charAt(0).toUpperCase() + field.slice(
                            1);
                        $(`#holiday${capitalizedField}`).addClass('is-invalid');
                    });
                }
            }
        });
    });

    $(document).on('click', '.holiday__edit', function (e) {
        holidayID = $(this).attr('data-id');
        let name = $(this).attr('data-name');
        let date = $(this).attr('data-date');
        let type = $(this).attr('data-type');

        
        $('#editHolidayName').val(name);  
        $('#editHolidayDate').val(date);  
        $('#editHolidayType').val(type);  
        
        $('#editHolidayModal').modal('toggle');
    });

    $('#btnHolidayUpdate').click(function () {
        let editHolidayField = $('#editHolidayName');  
        let editHolidayDate = $('#editHolidayDate');  
        let editHolidayType = $('#editHolidayType');

        $('#update-spinner').removeClass('d-none');

        // Clear failed form validation styles.
        editHolidayField.removeClass('is-invalid');
        editHolidayDate.removeClass('is-invalid');
        editHolidayType.removeClass('is-invalid');

        $('#edit-name-error').text('');
        $('#edit-date-error').text('');
        $('#edit-type-error').text('');
        

        $.ajax({
            url : `/holiday/${holidayID}`,
            data : {name : editHolidayField.val() , date : editHolidayDate.val(), type : editHolidayType.val() },
            method : 'PUT',
            success : function (response) {
                $('#update-spinner').addClass('d-none');
                swal("Good Job!", "Successfully update a holiday", "success");
                $('#editHolidayModal').modal('toggle');
                table.draw();
                window.location.reload();
            },
            error: function (response) {
                $('#update-spinner').addClass('d-none');
                if (response.status === VALIDATION_ERROR) {
                    Object.keys(response.responseJSON.errors).map((field) => {
                        $(`#edit-${field}-error`).text(
                            `${response.responseJSON.errors[field][0]}`);
                        // Capitalize field
                        let capitalizedField = field.charAt(0).toUpperCase() + field.slice(
                            1);
                        $(`#editHoliday${capitalizedField}`).addClass('is-invalid');
                    });
                }
            }
        });
    });

    $(document).on('click', '.holiday__delete', function (e) {
        let id = $(this).attr('data-id');
        swal({
                title: "Are you sure?",
                text : "You are about to delete a holiday record",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url : `/holiday/${id}`,
                        method : 'DELETE',
                        success : function (response) {
                            if(response.success) {
                                table.draw();
                                swal("Good Job!", "Successfully delete a holiday", "success");
                            }
                        
                            window.location.reload();
                        },
                    });
                } 
            });
        
    });



    // CALENDAR HOLIDAYS FUNCTION //
    let cardBody = document.querySelector('#cardBody');
    let calendarBtn = document.querySelector('#calendarBtn');
    let tableParentContainer = document.querySelector('#table__parent__container');

    calendarBtn.addEventListener('click', (e) => {
        e.preventDefault();
        
        let button = e.target;


        if(button.getAttribute('data-view') === 'calendar') {
            tableParentContainer.classList.add('d-none');
            button.innerHTML = `<i class="fa fa-table"></i> View Table`;
            button.setAttribute('data-view', 'table');
            $('#calendar__container').show();
            calendar.render();

        } else {
            tableParentContainer.classList.remove('d-none');
            button.innerHTML = `<i class="far fa-calendar-alt float-start"></i> View Calendar`;
            button.setAttribute('data-view', 'calendar');
            $('#calendar__container').hide();
            calendar.render();

        }

    })




        let calendarElement = document.querySelector('#calendar');
        let nameField = $('#holidayName');
        let dateField = $('#holidayDate');
        let typeField = $("#holidayType");
    
        let calendar = new FullCalendar.Calendar(calendarElement, {
            initialView: 'dayGridMonth',
            events: 'holiday/attribute',
            dateClick: function(info) {
            
                if(info.dayEl.querySelector('.fc-event-title')) {
                    $.ajax({
                        url : `/holiday-by-date/${info.dateStr}`,
                        success : function (response) {
                            // Append the button edit and trigger the click event to display the edit modal for holioday.
                            $('#cardBody').prepend(`
                                <button class="holiday__edit d-none" id="custom-button-${response.id}"  data-id="${response.id}" 
                                        data-name="${response.name}" 
                                        data-date="${response.date}" 
                                        data-type="${response.type}"
                                        >test</button> 
                            `);

                            $(`#custom-button-${response.id}`).trigger('click');

                        }
                    });
                } else {
                    let holidayDate = document.querySelector('#holidayDate');
                    $('#addNewHolidayModal').modal('toggle');
                    holidayDate.value = moment(info.dateStr).format('YYYY-MM-DD');
                }
            
            },
        });
        calendar.render();

        $('#calendar__container').hide();