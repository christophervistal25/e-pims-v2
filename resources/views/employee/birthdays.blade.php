@extends('layouts.app')
@section('title', 'Employees Birthday')
@prepend('page-css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

{{-- CSS HERE --}}
<style>
    .btn-primary {
        background: #ff9b44 !important;
        border-color: #ff9b44 !important;
    }

    .bg-primary {
        background: #ff9b44 !important;
    }

    #employeesBirthdateContainer {
        overflow-y: 'hidden';
    }

</style>
@endprepend
@section('content')
<div class="row filter-row">
    <div class="col-sm-6 col-md-5">
        <label class="">Start Date</label>
        <div class="form-group">
            <input type="date" id="fromDate" class="form-control" value="{{  $currentDate->format('Y-m-d') }}">
            <span class='text-danger text-sm' id="fromDateErrorMessage"></span>
        </div>
    </div>
    <div class="col-sm-6 col-md-5">
        <label class="">End Date</label>
        <div class="form-group">
            <input type="date" id="toDate" class="form-control" value="{{ $currentDate->format('Y-m-d') }}">
            <span class='text-danger text-sm' id="toDateErrorMessage"></span>
        </div>
    </div>
    <div class="col-sm-6 col-md-2">
        <p></p>
        <button href="#" id="searchBirthRange" class="mt-4 btn btn-sm btn-block btn-primary"><i class="fa fa-search-plus"></i>&nbsp;&nbsp; Search</button>
    </div>
</div>
</div>

<div class="row p-3" id="employeesBirthdateContainer">
</div>

@push('page-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    (function($) {
        $.QueryString = (function(paramsArray) {
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

    $(document).ready(function() {
        const VALIDATION_ERROR = 422;
        let {
            from
            , to
        } = $.QueryString;
        let currentYear = new Date().getFullYear();
        $('#fromDate').val(`${currentYear}-${from}`);
        $('#toDate').val(`${currentYear}-${to}`);
        if (from) {
            setTimeout(() => {
                $('#searchBirthRange').trigger('click');
            }, 1000);
        }


        $('#searchBirthRange').click(function() {
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
                url: `/employees-birthdays/${fromDate}/${toDate}`
                , success: function(birthdates) {
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
                                <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3 shadow-none">
                                    <div class="profile-widget rounded-0">
                                        <div class="profile-img">
                                            <a href="/assets/img/profiles/${employee.Employee_id}.jpg" data-lightbox='image-1' data-title="${employee.LastName}">
                                                <img class='img-fluid rounded-circle shadow-sm' alt="No Image" src="/assets/img/thumbnail/${employee.Employee_id}.jpg">
                                            </a>
                                        </div>
                                        <p class="user-name text-ellipsis">
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
                                            <span class='font-weight-bold'>${employee.age_ordinal} Birthday on ${moment(employee.BirthDate).format('MMMM DD, YYYY')}</span>
                                        </p>

                                        <a target="_blank" class='btn btn-success btn-block mt-2' href='/birthday-card/${employee.Employee_id}-${employee.FirstName} ${employee.MiddleName.substr(0, 1)}. ${employee.LastName} ${employee.Suffix}'>Generate Greating Card</a>

                                        <a target="_blank" class='btn btn-success btn-block mt-2' href='/birthday-card-2/${employee.Employee_id}-${employee.FirstName} ${employee.MiddleName.substr(0, 1)}. ${employee.LastName} ${employee.Suffix}'>Generate Greating Card 2</a>

                                    </div>
                                </div>
                            `);
                        });
                    } else {
                        $('#employeesBirthdateContainer').html('');
                        $('#employeesBirthdateContainer').css('opacity', 1);
                    }
                }
                , error: function(response) {
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
    });

</script>
@endpush
@endsection
