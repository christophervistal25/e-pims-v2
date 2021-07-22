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
                    <img alt="" src="/storage/employee_images/{{ $user->employee->information->photo }}">
                </div>
                <div class="welcome-det">
                    <h3>Welcome, {{ Auth::user()->employee->fullname }}</h3>
                    <p>{{ Carbon\Carbon::now()->format('l jS \of F Y') }}</p>
                </div>
            </div>
        </div>
    </div>
    <h1 class="dash-sec-title">YOUR LEAVE</h1>

    <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-bus"></i></span>
                    <div class="dash-widget-info">
                        <h3>{{ $vacationLeave['vacation_leave_earned'] }}</h3>
                        <span class='text-uppercase font-medium'>vacation</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-thermometer-half"></i></span>
                    <div class="dash-widget-info">
                        <h3>{{ $sickLeave['sick_leave_earned'] }}</h3>
                        <span class='text-uppercase font-medium'>sick</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-asterisk"></i></span>
                    <div class="dash-widget-info">
                        <h3>5</h3>
                        <span class='text-uppercase font-medium'>mandatory</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
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
                <div class="dash-sec-content" id="widget--today--leave">
                    <div class="dash-info-list">
                        <div  class="dash-card">
                            <div class="dash-card-container">
                                <div class="dash-card-icon">
                                    <i class="fa fa-suitcase text-primary"></i>
                                </div>
                                <div class="dash-card-content">
                                    @empty($onGoingToday->count())
                                    <p class='text-sm text-danger text-uppercase font-weight-bold'>no on-going leave for today</p>
                                    @else
                                        @if($onGoingToday->count() <= 2)
                                            <p class='text-sm'>{{ $onGoingToday->implode('employee.fullname', ', ') }}</p>
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
                                            @if($today->employee->information)
                                                <div class="e-avatar">
                                                    <img src="/storage/employee_images/{{ $today->employee->information->photo }}" alt="">
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
                                            <p class='text-sm text-danger text-uppercase font-weight-bold'>no on-going leave for tomorrow</p>
                                            @else
                                            @if($onGoingTomorrow->count() <= 2)
                                                    <p class='text-sm'>{{ $onGoingTomorrow->implode('employee.fullname', ', ') }}</p>
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
                                            @if($tomorrrow->employee->information)
                                                <div class="e-avatar">
                                                    <img src="/storage/employee_images/{{ $tomorrrow->employee->information->photo }}" alt="">
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
                                        <p class='text-sm text-danger text-uppercase font-weight-bold'>no on-going leave for tomorrow</p>
                                    @else
                                    @if($onGoingNextSevenDays->count() <= 2)
                                            <p class='text-sm'>{{ $onGoingNextSevenDays->implode('employee.fullname', ', ') }}</p>
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
                                            @if($nextSevenDays->employee->information)
                                                <div class="e-avatar">
                                                    <img src="/storage/employee_images/{{ $nextSevenDays->employee->information->photo }}" alt="">
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
                    <h5 class="dash-title">Upcoming Holiday</h5>
                    @forelse($holidays as $holiday)
                    <div class="card">
                        <div class="card-body text-center">
                            <p class="holiday-title mb-0 font-weight-medium">{{  $holiday->dateString }} - {{  $holiday->name }}</p>
                        </div>
                    </div>
                    @empty
                    <div class="card">
                        <div class="card-body text-center">
                            <p class="holiday-title mb-0 text-danger">No holidays for this month</p>
                        </div>
                    </div>
                    @endforelse
                </section>
            </div>
        </div>

        <h1 class="dash-sec-title">LEAVE APPLICATIONS</h1>
        <div class="col-lg-12 bg-white">
            <table class='table table-bordered mt-3 bg-white'>
                <thead>
                    <tr>
                        <th class="align-middle text-center" rowspan="2">Recommending Approval
                        </th>
                        <th class="align-middle text-center font-weight-medium" rowspan="2">Approved By</th>
                        <th class="align-middle text-center font-weight-medium" rowspan="2">Leave</th>
                        <th class="align-middle text-center font-weight-medium" rowspan="2">Incase of.</th>
                        <th class="align-middle text-center font-weight-medium" rowspan="2">Commutation</th>
                        <th class="align-middle text-center font-weight-medium" rowspan="2">Status</th>
                        <th class="align-middle text-center font-weight-medium" rowspan="1" colspan="4">Date</th>
                        <th class="align-middle text-center font-weight-medium" rowspan="2">No. of Days</th>
                    <tr>
                        <td class="align-middle text-center font-weight-medium">Applied</td>
                        <td class="align-middle text-center font-weight-medium">Approved</td>
                        <td class="align-middle text-center font-weight-medium">FROM</td>
                        <td class="align-middle text-center font-weight-medium">TO</td>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leaveApplications as $application)
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
                        <td class='text-center'>{{ $application->date_applied }}</td>
                        <td>{{ $application->date_approved }}</td>
                        <td class='text-center'>{{ $application->date_from }}</td>
                        <td class='text-center'>{{ $application->date_to }}</td>
                        <td class='text-center font-weight-bold'>{{ $application->no_of_days }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

    {{-- VIEW ON-GOING LEAVES MODAL --}}
    <div class="modal fade" id="onGoingEmployeeLeavesModal" tabindex="-1" role="dialog" aria-labelledby="onGoingEmployeeLeavesModalTitle" aria-hidden="true">
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
<script>
    $('#onGoingEmployeeLeavesModal').modal({backdrop: 'static', keyboard: false, show : false});

    $('#widget--today--leave').click(function () {
        let onGoingForToday = JSON.parse($('meta[name="on-going--today"]').attr('content'));

        $('#onGoingEmployeeLeavesModalTitle').text('ON-GOING FOR TODAY');

        $('#onGoingEmployeeLeavesModal').modal('toggle');
        
        $('#accordion').html('');

        onGoingForToday.map((record) => {
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
                                                value="${record.date_from} - ${record.date_to}">
                                                <span><strong>LEAVE PERIOD</strong></span>
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
                                                <span><strong>OFFICE</strong></span>
                                        </label>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
            `);
        });

    });

    $('#widget--tomorrow--leave').click(function () {
        let onGoingForTomorrow = JSON.parse($('meta[name="on-going--tomorrow"]').attr('content'));

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
                                                value="${record.date_from} - ${record.date_to}">
                                                <span><strong>LEAVE PERIOD</strong></span>
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
                                                <span><strong>OFFICE</strong></span>
                                        </label>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
            `);
        });
    });

    $('#widget--next--seven--days--leave').click(function () {
        let onGoingForNextSevenDays = JSON.parse($('meta[name="on-going--seven--days"]').attr('content'));

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
                                                value="${record.date_from} - ${record.date_to}">
                                                <span><strong>LEAVE PERIOD</strong></span>
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
                                                <span><strong>OFFICE</strong></span>
                                        </label>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
            `);
        });

    });
</script>
@endpush
@endsection
