@extends('accounts.employee.layouts.app')
@section('title', 'Your Dashboard')
@prepend('meta-data')
<meta name="on-going--today" content="{{ $onGoingToday }}">
<meta name="on-going--tomorrow" content="{{ $onGoingTomorrow }}">
<meta name="on-going--seven--days" content="{{ $onGoingNextSevenDays }}">
@endprepend
@prepend('page-css')
<link rel="stylesheet"
    href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />
<style>
    .cursor-pointer {
        cursor: pointer;
    }

</style>
@endprepend
@section('content')
<div class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="welcome-box">
                <div class="welcome-img e-avatar">
                    <img alt="" src="/storage/employee_images/{{ $user->profile }}">
                </div>
                <div class="welcome-det">
                    <h3>Welcome, {{ $user->fullname }}</h3>
                    <p>{{ Carbon\Carbon::now()->format('l jS \of F Y') }}</p>
                </div>
            </div>
        </div>
    </div>

    <h1 class="dash-sec-title">YOUR LEAVE</h1>

    <div class="row">
        <div class="col-lg-12">
            @if(Session::has('message'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget shadow-none">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-bus"></i></span>
                    <div class="dash-widget-info">
                        <h3>{{ $vacationLeave['vacation_leave_earned'] }}</h3>
                        <span class='text-uppercase font-weight-medium'>vacation</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget shadow-none">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-thermometer-half"></i></span>
                    <div class="dash-widget-info">
                        <h3>{{ $sickLeave['sick_leave_earned'] }}</h3>
                        <span class='text-uppercase font-weight-medium'>sick</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget shadow-none">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-asterisk"></i></span>
                    <div class="dash-widget-info">
                        <h3>5</h3>
                        <span class='text-uppercase font-weight-medium'>mandatory</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget shadow-none">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-plus"></i></span>
                    <div class="dash-widget-info">
                        <h3>{{ (float) $vacationLeave['vacation_leave_earned'] + $sickLeave['sick_leave_earned'] }}</h3>
                        <span class='text-uppercase font-weight-medium'>vacation and sick total</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-8">
            <section class="dash-section">
                <h1 class="dash-sec-title">Today</h1>
                <div class="dash-sec-content cursor-pointer" id="widget--today--leave">
                    <div class="dash-info-list">
                        <div class="dash-card">
                            <div class="dash-card-container">
                                <div class="dash-card-icon">
                                    <i class="fa fa-suitcase text-primary"></i>
                                </div>
                                <div class="dash-card-content">
                                    @empty($onGoingToday->count())
                                    <p class='text-sm text-danger text-uppercase font-weight-bold'>no on-going leave for
                                        today</p>
                                    @else
                                    @if($onGoingToday->count() <= 2) <p class='text-sm'>
                                        {{ $onGoingToday->implode('employee.fullname', ', ') }}</p>
                                        @elseif($onGoingToday->count() >= 3)
                                        <p class='text-sm'>
                                            <strong>{{ $onGoingToday->first()->employee->fullname  }}</strong> ,
                                            <strong>{{ $onGoingToday->get(1)->employee->fullname  }}</strong>
                                            and <strong>{{ $onGoingToday->count() - 2 }}</strong> more.
                                        </p>
                                        @endif
                                        @endempty
                                </div>
                                <div class="dash-card-avatars">
                                    @foreach($onGoingToday as $today)
                                    @if($today->employee)
                                    <div class="e-avatar">
                                        <img src="/storage/employee_images/{{ $user->profile }}"
                                            alt="">
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
            </section>
            <section class="dash-section">
                <h1 class="dash-sec-title">Tomorrow</h1>
                <div class="dash-sec-content cursor-pointer" id="widget--tomorrow--leave">
                    <div class="dash-info-list">
                        <div class="dash-card">
                            <div class="dash-card-container">
                                <div class="dash-card-icon">
                                    <i class="fa fa-suitcase text-primary"></i>
                                </div>
                                <div class="dash-card-content">
                                    @empty($onGoingTomorrow->count())
                                    <p class='text-sm text-danger text-uppercase font-weight-bold'>no on-going leave for
                                        tomorrow</p>
                                    @else
                                    @if($onGoingTomorrow->count() <= 2) <p class='text-sm'>
                                        {{ $onGoingTomorrow->implode('employee.fullname', ', ') }}</p>
                                        @elseif($onGoingTomorrow->count() >= 3)
                                        <p class='text-sm'>
                                            <strong>{{ $onGoingTomorrow->first()->employee->fullname  }}</strong> ,
                                            <strong>{{ $onGoingTomorrow->get(1)->employee->fullname  }}</strong>
                                            and <strong>{{ $onGoingTomorrow->count() - 2 }}</strong> more.
                                        </p>
                                        @endif
                                        @endempty
                                </div>
                                <div class="dash-card-avatars">
                                    @foreach($onGoingTomorrow as $tomorrrow)
                                    @if($tomorrrow->employee)
                                    <div class="e-avatar">
                                        <img src="/storage/employee_images/{{ $tomorrrow->employee }}"
                                            alt="">
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="dash-section">
                <h1 class="dash-sec-title">Next seven days</h1>
                <div class="dash-sec-content cursor-pointer" id="widget--next--seven--days--leave">
                    <div class="dash-info-list">
                        <div class="dash-card">
                            <div class="dash-card-container">
                                <div class="dash-card-icon">
                                    <i class="fa fa-suitcase text-primary"></i>
                                </div>
                                <div class="dash-card-content">
                                    @empty($onGoingNextSevenDays->count())
                                    <p class='text-sm text-danger text-uppercase font-weight-bold'>no on-going leave for
                                        the next seven days</p>
                                    @else
                                    @if($onGoingNextSevenDays->count() <= 2) <p class='text-sm'>
                                        {{ $onGoingNextSevenDays->implode('employee.fullname', ', ') }}</p>
                                        @elseif($onGoingNextSevenDays->count() >= 3)
                                        <p class='text-sm'>
                                            <strong>{{ $onGoingNextSevenDays->first()->employee->fullname  }}</strong> ,
                                            <strong>{{ $onGoingNextSevenDays->get(1)->employee->fullname  }}</strong>
                                            and <strong>{{ $onGoingNextSevenDays->count() - 2 }}</strong> more.
                                        </p>
                                        @endif
                                        @endempty
                                </div>
                                <div class="dash-card-avatars">
                                    @foreach($onGoingNextSevenDays as $nextSevenDays)
                                    @if($nextSevenDays->employee)
                                    <div class="e-avatar">
                                        <img src="/storage/employee_images/{{ $nextSevenDays->employee }}"
                                            alt="">
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="dash-sidebar">
                <section>
                    <h1 class="dash-sec-title">Holidays for this {{ date('F', time()) }}</h5>
                    @forelse($holidays as $holiday)
                    <div class="card">
                        <div class="card-body text-center">
                            <p class="text-dark mb-0 font-weight-medium">{{ $holiday->dateString }} -
                                {{  $holiday->name }}</p>
                        </div>
                    </div>
                    @empty
                    <div class="card">
                        <div class="card-body text-center">
                            <p class="text-dark mb-0 text-danger">No holidays for this {{ date('F', time()) }}</p>
                        </div>
                    </div>
                    @endforelse
                </section>
            </div>
        </div>

        
        <p class="fw-medium dash-sec-title mb-1">PENDING LEAVE APPLICATIONS</p>
            <div class="col-lg-12 bg-white">
            <table class='table table-bordered mt-2 bg-white'>
                <thead>
                    <tr>
                        <th class="align-middle text-center text-uppercase" rowspan="2">Recommending Approval
                        </th>
                        <th class="align-middle text-center font-weight-medium text-uppercase" rowspan="2">Approved By</th>
                        <th class="align-middle text-center font-weight-medium text-uppercase" rowspan="2">Leave</th>
                        <th class="align-middle text-center font-weight-medium text-uppercase" rowspan="2">Incase of.</th>
                        <th class="align-middle text-center font-weight-medium text-uppercase" rowspan="2">Commutation</th>
                        <th class="align-middle text-center font-weight-medium text-uppercase" rowspan="2">Status</th>
                        <th class="align-middle text-center font-weight-medium text-uppercase" rowspan="1" colspan="4">Date</th>
                        <th class="align-middle text-center font-weight-medium text-uppercase" rowspan="2">No. of Days</th>
                    <tr>
                        <td class="align-middle text-center font-weight-medium text-uppercase">Applied</td>
                        <td class="align-middle text-center font-weight-medium text-uppercase">Approved</td>
                        <td class="align-middle text-center font-weight-medium text-uppercase">FROM</td>
                        <td class="align-middle text-center font-weight-medium text-uppercase">TO</td>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    @forelse($leaveApplications as $application)
                    <tr>
                        <td class='text-center font-weight-bold'>{{ $application->recommending_approval }}</td>
                        <td class='text-center font-weight-bold'>{{ $application->approved_by }}</td>
                        <td class='text-center font-weight-medium'>{{ $application->type->name }}</td>
                        <td class='text-uppercase text-center'>{{ str_replace('_', ' ', $application->incase_of) }}</td>
                        <td class='text-center'>{{ $application->commutation }}</td>
                        <td class='text-center'>
                            @if($application->approved_status === 'pending')
                            <span class="badge badge-info text-uppercase">{{  $application->approved_status }}</span>
                            @elseif($application->approved_status === 'approved')
                            <span class="badge badge-success text-uppercase">{{  $application->approved_status }}</span>
                            @elseif($application->approved_status === 'reject')
                            <span class="badge badge-danger text-uppercase">{{  $application->approved_status }}</span>
                            @elseif($application->approved_status === 'on-going')
                            <span class="badge badge-primary text-uppercase">{{  $application->approved_status }}</span>
                            @elseif($application->approved_status === 'enjoyed')
                            <span
                                class="badge badge-purple text-uppercase text-white">{{  $application->approved_status }}</span>
                            @endif
                        </td>
                        <td class='text-center'>{{ $application->date_applied->format('F d, Y h:i A') }}</td>
                        <td>{{ $application->date_approved?->format('F d, Y h:i A') }}</td>
                        <td class='text-center'>{{ $application->date_from->format('F d, Y') }}</td>
                        <td class='text-center'>{{ $application->date_to->format('F d, Y') }}</td>
                        <td class='text-center font-weight-bold'>{{ $application->no_of_days }}</td>
                        <td class='text-sm'>
                            <button data-source="{{ $application->id }}" class='btn btn-primary btn-sm btn-rounded shadow btnPrintLeaveApplicationFilling'
                            >
                                <i class='la la-print' style="pointer-events:none;"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="11" class='text-center'>
                            <i class='fa fa-warning fa-2x text-danger'></i>
                            <h6 class="display-5 text-uppercase">no available data</h6>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- VIEW ON-GOING LEAVES MODAL --}}
<div class="modal fade" id="onGoingEmployeeLeavesModal" tabindex="-1" role="dialog"
    aria-labelledby="onGoingEmployeeLeavesModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="onGoingEmployeeLeavesModalTitle">ON-GOING</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="content">
                <div id="accordion">

                </div>
            </div>
        </div>
    </div>
    {{-- END OF ON-GOING LEAVES MODAL --}}
</div>
@push('page-scripts')
<script src="{{ asset('/assets/js/moment.min.js') }}"></script>
<script>
    $('#onGoingEmployeeLeavesModal').modal({
        backdrop: 'static',
        keyboard: false,
        show: false
    });

    $('#widget--today--leave').click(function (e) {
        let onGoingForToday = JSON.parse($('meta[name="on-going--today"]').attr('content'));

        if (onGoingForToday.length === 0) {
            return;
        }

        $('#onGoingEmployeeLeavesModalTitle').text('ON-GOING FOR TODAY');

        $('#onGoingEmployeeLeavesModal').modal('toggle');

        $('#accordion').html('');

        onGoingForToday.map((record) => {
            {{-- $('#accordion').append(`
                <div class="card m-0 shadow-none rounded-0">
                        <div class="card-header" id="heading--${record.employee.employee_id}">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse--${record.employee.employee_id}" aria-expanded="true"
                                    aria-controls="collapse--${record.employee.employee_id}">
                                    ${record.employee.fullname}
                                </button>
                            </h5>
                        </div>

                        <div id="collapse--${record.employee.employee_id}" class="collapse" aria-labelledby="heading--${record.employee.employee_id}" data-parent="#accordion">
                            <div class="card-body">
                                <div class='row'>
                                    <div class='col-lg-12 text-right'>
                                        <label class="form-group has-float-label">
                                            <input 
                                                type="text"
                                                class="form-control" 
                                                readonly
                                                value="${record.type.name}">
                                                <span><strong>LEAVE TYPE</strong></span>
                                        </label>
                                    </div>

                                    <div class='col-lg-12 text-right'>
                                        <label class="form-group has-float-label">
                                            <input 
                                                type="text"
                                                class="form-control" 
                                                readonly
                                                value="${moment(record.date_from).format('LL')} - ${moment(record.date_to).format('LL')}">
                                                <span><strong>LEAVE PERIOD</strong></span>
                                        </label>
                                    </div>

                                    <div class='col-lg-12 text-right'>
                                        <label class="form-group has-float-label">
                                            <input 
                                                type="text"
                                                class="form-control" 
                                                readonly
                                                value="${record.no_of_days}">
                                                <span><strong>NO. OF DAYS</strong></span>
                                        </label>
                                    </div>
                                    
                                    <div class='col-lg-12 text-right'>
                                        <label class="form-group has-float-label">
                                            <input 
                                                type="text"
                                                class="form-control" 
                                                readonly
                                                value="${record.employee.information.office.office_name}">
                                                <span><strong>OFFICE</strong></span>
                                        </label>
                                    </div>

                                    <div class='col-lg-12 text-right'>
                                        <label class="form-group has-float-label">
                                            <input 
                                                type="text"
                                                class="form-control" 
                                                readonly
                                                value="${record.employee.information.position.position_name}">
                                                <span><strong>POSITION</strong></span>
                                        </label>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
            `);
        }); --}}

    });

    $('#widget--tomorrow--leave').click(function (e) {
        let onGoingForTomorrow = JSON.parse($('meta[name="on-going--tomorrow"]').attr('content'));

        if (onGoingForTomorrow.length === 0) {
            return;
        }

        $('#onGoingEmployeeLeavesModalTitle').text('ON-GOING FOR TOMORROW');

        $('#onGoingEmployeeLeavesModal').modal('toggle');

        $('#accordion').html('');

        onGoingForTomorrow.map((record) => {
            $('#accordion').append(`
                <div class="card m-0 shadow-none rounded-0">
                        <div class="card-header" id="heading--${record.employee.employee_id}">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse--${record.employee.employee_id}" aria-expanded="true"
                                    aria-controls="collapse--${record.employee.employee_id}">
                                    ${record.employee.fullname}
                                </button>
                            </h5>
                        </div>

                        <div id="collapse--${record.employee.employee_id}" class="collapse" aria-labelledby="heading--${record.employee.employee_id}" data-parent="#accordion">
                            <div class="card-body">
                                <div class='row'>
                                    <div class='col-lg-12 text-right'>
                                        <label class="form-group has-float-label">
                                            <input 
                                                type="text"
                                                class="form-control" 
                                                readonly
                                                value="${record.type.name}">
                                                <span><strong>LEAVE TYPE</strong></span>
                                        </label>
                                    </div>

                                    <div class='col-lg-12 text-right'>
                                        <label class="form-group has-float-label">
                                            <input 
                                                type="text"
                                                class="form-control" 
                                                readonly
                                                value="${moment(record.date_from).format('LL')} - ${moment(record.date_to).format('LL')}">
                                                <span><strong>LEAVE PERIOD</strong></span>
                                        </label>
                                    </div>

                                    <div class='col-lg-12 text-right'>
                                        <label class="form-group has-float-label">
                                            <input 
                                                type="text"
                                                class="form-control" 
                                                readonly
                                                value="${record.no_of_days}">
                                                <span><strong>NO. OF DAYS</strong></span>
                                        </label>
                                    </div>
                                    
                                    <div class='col-lg-12 text-right'>
                                        <label class="form-group has-float-label">
                                            <input 
                                                type="text"
                                                class="form-control" 
                                                readonly
                                                value="${record.employee.information.office.office_name}">
                                                <span><strong>OFFICE</strong></span>
                                        </label>
                                    </div>

                                    <div class='col-lg-12 text-right'>
                                        <label class="form-group has-float-label">
                                            <input 
                                                type="text"
                                                class="form-control" 
                                                readonly
                                                value="${record.employee.information.position.position_name}">
                                                <span><strong>POSITION</strong></span>
                                        </label>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
            `);
        });
    });

    $('#widget--next--seven--days--leave').click(function (e) {
        let onGoingForNextSevenDays = JSON.parse($('meta[name="on-going--seven--days"]').attr('content'));

        if (onGoingForNextSevenDays.length === 0) {
            return;
        }

        $('#onGoingEmployeeLeavesModalTitle').text('ON-GOING FOR NEXT SEVEN DAYS');

        $('#onGoingEmployeeLeavesModal').modal('toggle');

        $('#accordion').html('');

        onGoingForNextSevenDays.map((record) => {
            $('#accordion').append(`
                <div class="card m-0 shadow-none rounded-0">
                        <div class="card-header" id="heading--${record.employee.employee_id}">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse--${record.employee.employee_id}" aria-expanded="true"
                                    aria-controls="collapse--${record.employee.employee_id}">
                                    ${record.employee.fullname}
                                </button>
                            </h5>
                        </div>

                        <div id="collapse--${record.employee.employee_id}" class="collapse" aria-labelledby="heading--${record.employee.employee_id}" data-parent="#accordion">
                            <div class="card-body">
                                <div class='row'>
                                    <div class='col-lg-12 text-right'>
                                        <label class="form-group has-float-label">
                                            <input 
                                                type="text"
                                                class="form-control" 
                                                readonly
                                                value="${record.type.name}">
                                                <span><strong>LEAVE TYPE</strong></span>
                                        </label>
                                    </div>

                                    <div class='col-lg-12 text-right'>
                                        <label class="form-group has-float-label">
                                            <input 
                                                type="text"
                                                class="form-control" 
                                                readonly
                                                value="${moment(record.date_from).format('LL')} - ${moment(record.date_to).format('LL')}">
                                                <span><strong>LEAVE PERIOD</strong></span>
                                        </label>
                                    </div>

                                    <div class='col-lg-12 text-right'>
                                        <label class="form-group has-float-label">
                                            <input 
                                                type="text"
                                                class="form-control" 
                                                readonly
                                                value="${record.no_of_days}">
                                                <span><strong>NO. OF DAYS</strong></span>
                                        </label>
                                    </div>
                                    
                                    <div class='col-lg-12 text-right'>
                                        <label class="form-group has-float-label">
                                            <input 
                                                type="text"
                                                class="form-control" 
                                                readonly
                                                value="${record.employee.information.office.office_name}">
                                                <span><strong>OFFICE</strong></span>
                                        </label>
                                    </div>

                                    <div class='col-lg-12 text-right'>
                                        <label class="form-group has-float-label">
                                            <input 
                                                type="text"
                                                class="form-control" 
                                                readonly
                                                value="${record.employee.information.position.position_name}">
                                                <span><strong>POSITION</strong></span>
                                        </label>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
            `);
        });

    });
    
    $(document).on('click', '.btnPrintLeaveApplicationFilling', function (e) {
        let applicationID = $(e.target).attr('data-source');
        $.ajax({
            url : `/employee-leave-application-print/${applicationID}`,
            success : function (response) {
                let FULLNAME = "{{ $user->fullname }}";
                socket.emit('preview_application_filling_form', { arguments : `${FULLNAME}|REQUEST_APPLICATION_FILLING_FORM`});
            }
        });
    })
</script>
@endpush
@endsection
