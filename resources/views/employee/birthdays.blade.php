@extends('layouts.app')
@section('title', 'Employees birthday')
@prepend('page-css')
{{-- CSS HERE --}}
<link rel="stylesheet" href="assets/plugins/morris/morris.css">">
<style>
    .btn-primary {
        background: #ff9b44 !important;
        border-color: #ff9b44 !important;
    }

    .bg-primary {
        background: #ff9b44 !important;
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
            <input type="date" id="toDate" class="form-control" value="{{  $currentDatePlusOneWeek->format('Y-m-d') }}">
            <span class='text-danger text-sm' id="toDateErrorMessage"></span>
        </div>
    </div>
    <div class="col-sm-6 col-md-2">
            <p></p>
            <button href="#" id="searchBirthRange" class="mt-4 btn btn-sm btn-block btn-primary"><i class="fa fa-search-plus"></i>&nbsp;&nbsp; Search</button>
        </div>
    </div>
</div>

<div class="row" id="employeesBirthdateContainer">
    @foreach($birthdates as $employee)
    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
        <div class="profile-widget">
            <div class="profile-img">
                <img class="avatar" alt="" src="/storage/employee_images/{{ $employee->information ? $employee->information->photo : 'no_image.png' }}">
            </div>
            <h4 class="user-name m-t-10 mb-0 text-ellipsis">{{ $employee->fullname  }}</h4>
            <h5 class="user-name m-t-10 mb-0 text-ellipsis">{{ $employee->information ? $employee->information->office->office_short_name : '' }}</h5>
            <div class="small text-muted">{{ $employee->information ? $employee->information->position->position_name : '' }}</div>
            <a href="javascript:;" class="btn btn-primary btn-block btn-sm m-t-10">{{ Carbon\Carbon::parse($employee->date_birth)->format('l jS F Y') }}</a>
        </div>
    </div>
    @endforeach
</div>

@push('page-scripts')
<script>
    $(document).ready(function () {
        const VALIDATION_ERROR = 422;

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
                url : `/employees-birthdays/${fromDate}/${toDate}`,
                success : function (birthdates) {
                    $('#fromDate').removeClass('is-invalid');
                    $('#toDate').val('is-invalid');
                    
                    // Response data is not empty.
                    $('#searchBirthRange').removeAttr('disabled');
                    $('#employeesBirthdateContainer').css('opacity', 1);
                    if(birthdates.length !== 0) {
                        // Clear the parent container
                        $('#employeesBirthdateContainer').html('');
                        Object.values(birthdates).map((employee) => {
                            $('#employeesBirthdateContainer').append(`
                                <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                                    <div class="profile-widget">
                                        <div class="profile-img">
                                            <img class="avatar" alt="" src="/storage/employee_images/${employee.information ? employee.information.photo : 'no_image.png'}">
                                        </div>
                                        <h4 class="user-name m-t-10 mb-0 text-ellipsis">${employee.fullname}</h4>
                                        <h5 class="user-name m-t-10 mb-0 text-ellipsis">${(employee.information && employee.information.office ? employee.information.office.office_short_name : '')}</h5>
                                        <div class="small text-muted">${(employee.information && employee.information.position) ? employee.information.position.position_name : '' }</div>
                                        <a href="javascript:;" class="btn btn-primary btn-block btn-sm m-t-10">${moment(employee.date_birth).format('dddd Do of MMMM')}</a>
                                    </div>
                                </div>
                            `);
                        });
                    } else {
                        $('#employeesBirthdateContainer').html('');
                        $('#employeesBirthdateContainer').css('opacity', 1);
                    }
                },
                error : function (response) {
                    $('#searchBirthRange').removeAttr('disabled');
                    if(response.status === VALIDATION_ERROR) {
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
