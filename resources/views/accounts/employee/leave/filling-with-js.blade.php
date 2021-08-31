<script>
    const ROUTE                 = "{{ route('employee.leave.application.filling.submit') }}";
    const SPACE_EXPRESSION      = new RegExp(/\s^/, 'gi');
    const VACATION_LEAVE_EARNED = "{{ $vacationLeaveEarned }}";
    const SICK_LEAVE_EARNED     = "{{ $sickLeaveEarned }}";
    const vacationLeaveIncaseOf = ['WITHIN THE PHILIPPINES', 'ABROAD'];
    const sickLeaveIncaseOf     = ['IN HOSPITAL', 'OUT PATIENT'];
    const FIVE_DAYS_ADVANCE     = moment().add(5, 'days').format('YYYY-MM-DD');

    const LEAVE_TYPES = new Map([]);
    let hasError      = [];
    let errors        = [];


    let types = $('meta[name="leave-types"]').attr('content');

    JSON.parse(types).forEach((type) => LEAVE_TYPES.set(type.name.replace(/\s+/gi, '_'), type.code_number));

    // Initialize defualt value and class for some elements.
    $('#inCaseOf').children().remove();
    $('#earnedLess').val(0);
    $('#earnedRemaining').val(0);
    $('#inCaseOfContainer').addClass('d-none');

    let getSelectedLeaveTypeData = (types, selectedType) => {
        let [type] = JSON.parse(types).filter((type) => type.code_number.toString() === selectedType.toString());
        return type;
    };

    let renderErrorMessage = (errors) => {
        $('#formErrors').children().remove();
        errors.forEach((error, index) => {
            for (key in error) {
                $('#formErrors').append(`<span>${errors[index][key]}</span><br>`);
            }
        });

    };

    // When user select a type of leave.
    $('#typeOfLeave').change(function (e) {
        let selectedType = $(this).val();

        let type = getSelectedLeaveTypeData(types, selectedType);

        // Initialize value of Incase of.
        let incaseOf = [];
        switch (type.code_number) {
            case LEAVE_TYPES.get('MANDATORY_LEAVE'):
                    $('#inCaseOfContainer').addClass('d-none');
                    $('#withPay, #withoutPay').attr('disabled', true);
                break;

            case LEAVE_TYPES.get('VACATION_LEAVE'):
                    incaseOf = vacationLeaveIncaseOf;
                    $('#inCaseOfContainer').removeClass('d-none');
                break;

            case LEAVE_TYPES.get('SICK_LEAVE'):
                    incaseOf = sickLeaveIncaseOf;
                    $('#inCaseOfContainer').removeClass('d-none');
                    $('#withPay, #withoutPay').attr('disabled', false);
                break;
        }

        // Remove options of in case of select element
        $('#inCaseOf').children().remove();
        
        // Dynamically insert value for incase of.
        incaseOf.map((data) => $('#inCaseOf').append(`<option value="${data}">${data}</option>`));

        // Temporarily remove the is-invalid class/red border of leave child & parent elements.
        $('.type-of-leave').removeClass('is-invalid');

        // Trigger change if start and end date has value this will execute some events listening to CHANGE.
        if($('#startDate, #endDate').val().length !== 0) {
            $('#startDate, #endDate').trigger('change');
        }

    });

    $('#startDate').change(function () {
        let startDate         = $('#startDate').val();
        let endDate           = $("#endDate").val();
        let selectedLeaveType = $('#typeOfLeave').val();
        let points            = 0;

        errors = [];

        if(!selectedLeaveType) {
            $('.type-of-leave').addClass('is-invalid');
            errors.push({ leave_type : 'Please select leave type'});
        } else {
            delete errors['leave_type'];
        }

        if(moment(startDate).isBefore(FIVE_DAYS_ADVANCE, 'day')) {
            $('#startDate').addClass('is-invalid');
            errors.push({ start_date_before : 'Start date must be 5 days' });
        }  else if(moment(startDate).isAfter(endDate)) {
            errors.push({ start_date_after : 'Start date must not be greater than End date.' });
            $('#startDate').addClass('is-invalid'); 
        } else {
            delete errors['start_date_before'];
            delete errors['start_date_after'];

            $('#startDate').removeClass('is-invalid')
                                .addClass('is-valid');
        }
        
        if(errors.length === 0) {
            let type = getSelectedLeaveTypeData(types, selectedLeaveType);

            switch (type.code_number) {
                case LEAVE_TYPES.get('MANDATORY_LEAVE'):
                    points = 5;
                    break;

                case LEAVE_TYPES.get('VACATION_LEAVE'):
                    points = VACATION_LEAVE_EARNED;
                    break;

                case LEAVE_TYPES.get('SICK_LEAVE'):
                    points = SICK_LEAVE_EARNED;
                    break;
            }

            // Calculate no. of days ask for leave.
            let NO_OF_DAYS = moment(endDate).diff(startDate, 'days');

            $('#noOfDays').val(NO_OF_DAYS);

            if(NO_OF_DAYS >= 1) {
                $('#earnedLess').val(NO_OF_DAYS);
                $('#earnedRemaining').val(points - NO_OF_DAYS);
            } else {
                $('#earnedLess').val('');
                $('#earnedRemaining').val('');
            }
        } else {
            renderErrorMessage(errors);
        }

    });

    $('#endDate').change(function () {
        let startDate         = $('#startDate').val();
        let endDate           = $('#endDate').val();
        let selectedLeaveType = $('#typeOfLeave').val();
        let points            = 0;

        errors = [];

        if(!selectedLeaveType) {
            errors.push({ leave_type : 'Please select leave type'});
            $('.type-of-leave').addClass('is-invalid');
        } else {
            delete errors['leave_type'];
        }

        if(moment(endDate).isBefore(startDate, 'day')) {
            $('#endDate').addClass('is-invalid');
            errors.push({ end_date_advanced : 'End date need to be advance atleast 5 days' });
        } else {
            delete errors['end_date_before'];
            delete errors['end_date_advanced'];

            $('#endDate').removeClass('is-invalid')
                                .addClass('is-valid');
        }

        if(errors.length === 0) {
            let type = getSelectedLeaveTypeData(types, selectedLeaveType);

            switch (type.code_number) {
                case LEAVE_TYPES.get('MANDATORY_LEAVE'):
                    points = 5;
                    break;

                case LEAVE_TYPES.get('VACATION_LEAVE'):
                    points = VACATION_LEAVE_EARNED;
                    break;

                case LEAVE_TYPES.get('SICK_LEAVE'):
                    points = SICK_LEAVE_EARNED;
                    break;
            }

            // Calculate no. of days ask for leave.
            let NO_OF_DAYS = moment(endDate).diff(startDate, 'days');

            $('#noOfDays').val(NO_OF_DAYS);

            if(NO_OF_DAYS >= 1) {
                $('#earnedLess').val(NO_OF_DAYS);
                $('#earnedRemaining').val(points - NO_OF_DAYS);
            } else {
                $('#earnedLess').val('');
                $('#earnedRemaining').val('');
            }
        } else {
            renderErrorMessage(errors);
        }
    });

    $('#apply--for--leave--form').submit(function (e) {
        e.preventDefault();
        $('#apply-spinner').removeClass('d-none');
        $('#apply-button-icon').addClass('d-none');
        let data = {
            dateApply: $('#dateApply').val(),
            typeOfLeave: $('#typeOfLeave').val(),
            inCaseOf: $('#inCaseOf').val(),
            noOfDays: $("#noOfDays").val(),
            startDate: $('#startDate').val(),
            endDate: $('#endDate').val(),
            earned: $('#earned').val(),
            earnedLess: $('#earnedLess').val(),
            earnedRemaining: $('#earnedRemaining').val(),
            commutation: $('#commutation').val(),
            recommendingApproval: $('#recommendingApproval').val(),
            approvedBy: $('#approvedBy').val(),
        };

        $.ajax({
            url: ROUTE,
            method: 'POST',
            data: data,
            success: function (response) {
                $('#apply-spinner').addClass('d-none');
                $('#apply-button-icon').removeClass('d-none');
                if (response.success) {
                    swal({
                        title: "Good Job!",
                        text: "Your leave application successfully submit plesae wait for the approval.",
                        icon: "success",
                        timer: 5000
                    });

                    data.fullname = response.fullname;

                    socket.emit(`submit_application_for_leave`, data);
                }
            },
            error: function (response) {
                $('#apply-spinner').addClass('d-none');
                $('#apply-button-icon').removeClass('d-none');

                if (response.status == 422) {
                    Object.keys(response.responseJSON.errors).map((fieldID) => {
                        let [message] = response.responseJSON.errors[fieldID];

                        if (fieldID.includes('typeOf')) {
                            // Select field with select picker.
                            $('button[data-id="typeOfLeave"]').addClass(
                                'border border-danger');
                        } else {
                            $(`#${fieldID}`).addClass('is-invalid');
                        }
                    });
                } else if (response.status == 423) {
                    swal('Oops!', response.responseJSON.message, 'error');
                } else if(response.status === 424) {
                    swal('Oops!', response.responseJSON.message, 'error');
                }
            }
        });

    });