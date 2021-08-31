const FIVE_DAYS_ADVANCE     = moment().add(5, 'days').format('YYYY-MM-DD');

$('#inCaseOf').attr('disabled', true);

$('#startDate, #endDate').attr('disabled', true);

let endDateMustBeAfterStart = () => {
    let startPeriod = moment($('#startDate').val());
    let endPeriod = moment($('#endDate').val());

    $('#end_date_before_error').remove();
    $('#endDate').removeClass('is-invalid');

    if(endPeriod.isBefore(startPeriod, 'day')) {
        // Display error message.
        $('#formErrors').removeClass('d-none').prepend(`<span id='end_date_before_error'>- END DATE must be after START DATE<br></span>`);
        $('#endDate').addClass('is-invalid');
    } else {
        if($('#formErrors').children().length === 0) {
            $('#formErrors').addClass('d-none');
        }
    }
};

let startDateMustBeFiveAdvancedFiveDays = () => {
    let startPeriod = moment($('#startDate').val());
    if(startPeriod.isBefore(FIVE_DAYS_ADVANCE, 'day')) {
        // Display error message.
        $('#formErrors').removeClass('d-none').prepend(`<span id='start_date_advanced_error'>- Filling of leave must be 5 days advanced from the current date<br></span>`);
        $('#startDate').addClass('is-invalid');
        $('#endDate').attr('disabled', true);
    } else {
        if($('#formErrors').children().length === 0) {
            $('#formErrors').addClass('d-none');
            $('#endDate').attr('disabled', false);
        }
    }
};

const isDateWeekend = (date, callback, fail) => {
    date.format('dddd').toLowerCase() === 'saturday' || date.format('dddd').toLowerCase() === 'sunday' ? callback() : fail();
};


$('#typeOfLeave').change(function () {
    $('#inCaseOf').attr('disabled', false);
    
    $('#startDate').attr('disabled', false);
});

$('#startDate').change(function () {
    let startPeriod = moment($('#startDate').val());
    
    $('#endDate').attr('disabled', false);
    
    $('#start_date_advanced_error').remove();
    $('#startDate').removeClass('is-invalid');
    
    endDateMustBeAfterStart();
    startDateMustBeFiveAdvancedFiveDays();

    $("#start_date_weekend_error").remove();
    
    isDateWeekend(startPeriod,  function() { // callback
        $('#formErrors').removeClass('d-none').prepend(`<span id='start_date_weekend_error'>- You can't select weekend for starting date of your leave application.<br></span>`);
        $('#startDate').addClass('is-invalid');
        $('#endDate').attr('disabled', true);
    }, function () { // fallback
        if($('#formErrors').children().length === 0) {
            $('#formErrors').addClass('d-none');
            $('#endDate').attr('disabled', false);
        }
    });
});

$('#endDate').change(function () {
    let endPeriod = moment($('#endDate').val());
    
    endDateMustBeAfterStart();

    $('#end_date_weekend_error').remove();
    
    isDateWeekend(endPeriod,  function() {
        $('#formErrors').removeClass('d-none').prepend(`<span id='end_date_weekend_error'>- You can't select weekend for end date of your leave application.<br></span>`);
        $('#endDate').addClass('is-invalid');
    }, function () {
        if($('#formErrors').children().length === 0) {
            $('#formErrors').addClass('d-none');
            $('#end_date_weekend_error').remove();
        }
    });
});



