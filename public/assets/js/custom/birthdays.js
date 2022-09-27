// Helper function for query string
(function ($) {
    $.QueryString = (function (paramsArray) {
        let params = {};

        for (let i = 0; i < paramsArray.length; ++i) {
            let param = paramsArray[i]
                .split('=', 2);

            if (param.length !== 2)
                continue;

            params[param[0]] = decodeURIComponent(param[1].replace(/\+/g, " "));
        }
        return params;
    })(window.location.search.substr(1).split('&'))
})(jQuery);

const VALIDATION_ERROR = 422;
let {
    from,
    to
} = $.QueryString;

let currentYear = new Date().getFullYear();

$('#fromDate').val(`${currentYear}-${from}`);
$('#toDate').val(`${currentYear}-${to}`);

// Automatic trigger the search button with 500ms delayed
if (from) {
    setTimeout(() => {
        $('#searchBirthRange').trigger('click');
    }, 500);
}


$('#searchBirthRange').click(function () {
    $(this).attr('disabled', true);

    let fromDate = $('#fromDate').val();
    let toDate = $('#toDate').val();

    $('#employeesBirthdateContainer').css('opacity', 0.6);

    // Display Loader.
    $('#employeesBirthdateContainer').append(`
                <div id="birthdate__loader" style="position:absolute; left : 48%; right : 48%; z-index : 9999;">
                    <div class="loader-ellips">
                        <span class="loader-ellips__dot"></span>
                        <span class="loader-ellips__dot"></span>
                        <span class="loader-ellips__dot"></span>
                        <span class="loader-ellips__dot"></span>
                    </div>
                </div>
            `);

    $.ajax({
        url: `/employees-birthdays/${fromDate}/${toDate}`,
        success: function (birthdates) {
            $('#fromDate').removeClass('is-invalid');
            $('#toDate').removeClass('is-invalid');

            // Response data is not empty.
            $('#searchBirthRange').removeAttr('disabled');
            $('#employeesBirthdateContainer').css('opacity', 1);

            if (birthdates.length !== 0) {
                // Clear the parent container
                $('#employeesBirthdateContainer').html('');

                Object.values(birthdates).map((employee) => {
                    $('#employeesBirthdateContainer').append(`
                                <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3 rounded-0 shadow-none">
                                    <div class="card-header bg-primary border-0"></div>
                                    <div class="profile-widget border-0 rounded-0 shadow-none">
                                        <div class="profile-img">
                                            <a href="/assets/img/profiles/${employee.Employee_id}.jpg" data-lightbox='image-1' data-title="${employee.LastName}">
                                                <img class='img-fluid rounded-circle border' alt="No Image" src="/assets/img/thumbnail/${employee.Employee_id}.jpg">
                                            </a>
                                        </div>
                                        <div class="dropdown profile-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <i class="material-icons">more_vert</i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(24px, 32px, 0px);">
                                                <a class="dropdown-item" target="_blank" href='/birthday-card/${employee.Employee_id}-${employee.FirstName} ${employee.MiddleName.substr(0, 1)}. ${employee.LastName} ${employee.Suffix}'>
                                                    <i class="las la-image m-r-5"></i> Generate Greetng Card
                                                </a>
                                                <a class="dropdown-item" target="_blank" href='/birthday-card-2/${employee.Employee_id}-${employee.FirstName} ${employee.MiddleName.substr(0, 1)}. ${employee.LastName} ${employee.Suffix}'>
                                                    <i class="las la-image m-r-5"></i> Generate Greetng Card 2
                                                </a>
                                            </div>
                                        </div>
                                            <br>
                                            <span class='mt-5'>
                                                ${employee.Employee_id}
                                            </span>
                                            <br>
                                            <span class='font-weight-bold'>${employee.LastName}, ${employee.FirstName} ${employee.MiddleName.substr(0, 1)}. ${employee.Suffix || ''}</span>
                                            <br>
                                            ${employee.Position_Description || '-'}
                                            <br>
                                            ${employee.Description}
                                            <hr>
                                            <span class='mt-5'>
                                                <strong>${employee.age_ordinal}</strong>
                                                Birthday on
                                                <strong>${moment(employee.BirthDate).format('MMMM DD, YYYY')}</strong>
                                            </span>
                                    </div>
                                </div>
                            `);
                });
            } else {
                $('#employeesBirthdateContainer').html('');
                $('#employeesBirthdateContainer').css('opacity', 1);
            }
        },
        error: function (response) {
            $('#searchBirthRange').removeAttr('disabled');
            if (response.status === VALIDATION_ERROR) {
                const FIRST_ERROR = 0;

                $('#birthdate__loader').remove();

                $('#employeesBirthdateContainer').css('opacity', 1);

                // Add red border to both fields.
                $('#fromDate').addClass('is-invalid');
                $('#toDate').addClass('is-invalid');

                // Display Error message.
                $('#fromDateErrorMessage').text(response.responseJSON.errors['from'][FIRST_ERROR]);
                $('#toDateErrorMessage').text(response.responseJSON.errors['to'][FIRST_ERROR]);
            }
        }
    });

});
