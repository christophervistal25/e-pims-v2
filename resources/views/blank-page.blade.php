@extends('layouts.app')
@section('title', 'Welcome Admin!')
@prepend('page-css')
{{-- CSS HERE --}}
<link rel="stylesheet" href="assets/plugins/morris/morris.css">
<style>
    .btn-primary {
        background : #ff9b44 !important;
        border-color : #ff9b44 !important;
    }

    .bg-primary {
        background : #ff9b44 !important;
    }
</style>
@endprepend

@prepend('meta-data')
<meta name="yearlyJo" content="{{ json_encode($yearlyJo) }}">
<meta name="yearlyRegular" content="{{ json_encode($yearlyReg) }}">
@endprepend
@section('content')
<div class="row">
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="card-body">
                <span class="dash-widget-icon"><i class="la la-list"></i></span>
                <div class="dash-widget-info">
                    <h3>{{ $on_going_leave }}</h3>
                    <h5><a href="#" class="badge badge-pill badge-light">Leaves Today</a></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="card-body">
                <span class="dash-widget-icon"><i class="la la-bookmark"></i></span>
                <div class="dash-widget-info">
                    <h3>{{ $plantillas }}</h3>
                    <h5><a href="#" class="badge badge-pill badge-light">New Plantillas</a></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="card-body">
                <span class="dash-widget-icon"><i class="fas fa-user-tie"></i></span>
                <div class="dash-widget-info">
                    <h3>{{ $eligible }}</h3>
                    <h5><a href="#" class="badge badge-pill badge-light">Employees with Eligibility</a></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="card-body">
                <span class="dash-widget-icon"><i class="fa fa-users"></i></span>
                <div class="dash-widget-info">
                    <h3>{{ $allEmployees }}</h3>
                    <h5><a href="#" class="badge badge-pill badge-light">Employees</a></h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-group m-b-30">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <span class="d-block">No. of Job Orders (Current)</span>
                        </div>
                        <div>
                            <span class="text-success">{{ round(intval($no_of_jobOrder)/intval($allEmployees) * 100, 2) }}%</span>
                        </div>
                    </div>
                    <h3 class="mb-3">{{ $no_of_jobOrder }}</h3>
                    <div class="progress mb-2" style="height: 5px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{ intval($no_of_jobOrder)/intval($allEmployees) * 100 }}%;" aria-valuenow="40"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0">Overall Employees {{ $allEmployees }}</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <span class="d-block">No. of Regular Employees (Current)</span>
                        </div>
                        <div>
                            <span class="text-success">{{ round(intval($no_of_regular)/intval($allEmployees) * 100, 2) }}%</span>
                        </div>
                    </div>
                    <h3 class="mb-3">{{ $no_of_regular }}</h3>
                    <div class="progress mb-2" style="height: 5px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{ intval($no_of_regular)/intval($allEmployees) * 100 }}%;" aria-valuenow="40"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0">Overall Employees {{ $allEmployees }}</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <span class="d-block">No. of Employees Promoted this year</span>
                        </div>
                        <div>
                            <span class="text-success">{{ round(intval($no_of_promoted)/intval($allEmployees) * 100, 2) }}%</span>
                        </div>
                    </div>
                    <h3 class="mb-3">{{ $no_of_promoted }}</h3>
                    <div class="progress mb-2" style="height: 5px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{ intval($no_of_promoted)/intval($allEmployees) * 100 }}%;" aria-valuenow="40"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0">Previous Year {{ $no_of_promoted_prev }}<span class="text-muted"></span></p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <span class="d-block">No. of Active Employees</span>
                        </div>
                        <div>
                            <span class="text-success">{{ round(intval($no_of_active)/intval($allEmployees) * 100, 2) }}%</span>
                        </div>
                    </div>
                    <h3 class="mb-3">{{ $no_of_active }}</h3>
                    <div class="progress mb-2" style="height: 5px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{ intval($no_of_active)/intval($allEmployees) * 100 }}%;" aria-valuenow="40"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0">Inactive Employees {{ $no_of_inactive }}<span class="text-muted"></span></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Bar Chart</div>
                <div id="bar-charts"></div>
            </div>
        </div>

    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Line Chart</div>
                <div id="line-charts"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-4 d-flex">
        <div class="card flex-fill">
            <div class="card-body">
                <h4 class="card-title">Today's Birthdays <span
                        class="badge bg-inverse-primary ml-2">{{  $today->count() }}</h4>
                @foreach($today as $key => $employee)
                    <div class="leave-info-box">
                        <div class="media align-items-center">
                            <img class="avatar" src="/storage/employee_images/{{ is_null($employee->information) ? 'no_image.png' : $employee->information->photo }}">
                            <div class="media-body">
                                <div class="text-sm my-0 font-weight-medium">{{ $employee->fullname }}</div>
                                <div class="text-xs my-0 text-muted">{{ is_null($employee->information) ? 'N/A' : $employee->information->position->position_name }}</div>
                                <div class="text-xs my-0 text-muted">{{ is_null($employee->information) ? 'N/A' : $employee->information->office->office_short_name }}</div>
                            </div>
                        </div>
                        <div class="row align-items-center mt-3">
                            <div class="col-6">
                                <h6 class="mb-0">{{ Carbon\Carbon::parse($employee->date_birth)->format('l jS F Y') }}</h6>
                            </div>
                        </div>
                    </div>
                    @if($key === 3)
                        <a href="{{ route('employees-birthday.index') }}" class='btn btn-primary btn-block'>View more {{  $today->count() - 4 }}</a>
                        @break
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-12 col-xl-4 d-flex">
        <div class="card flex-fill">
            <div class="card-body">
                <h4 class="card-title">Tomorrow Birthdays <span
                        class="badge bg-inverse-primary ml-2">{{  $tomorrow->count() }}</h4>
                @foreach($tomorrow as $key => $employee)
                    <div class="leave-info-box">
                        <div class="media align-items-center">
                            <img class="avatar" src="/storage/employee_images/{{ is_null($employee->information) ? 'no_image.png' : $employee->information->photo }}">
                            <div class="media-body">
                                <div class="text-sm my-0 font-weight-medium">{{ $employee->fullname }}</div>
                                <div class="text-xs my-0 text-muted">{{ is_null($employee->information) ? 'N/A' : $employee->information->position->position_name }}</div>
                                <div class="text-xs my-0 text-muted">{{ is_null($employee->information) ? 'N/A' : $employee->information->office->office_short_name }}</div>
                            </div>
                        </div>
                        <div class="row align-items-center mt-3">
                            <div class="col-6">
                                <h6 class="mb-0">{{  Carbon\Carbon::parse($employee->date_birth)->format('l jS F Y') }}</h6>
                            </div>
                        </div>
                    </div>
                    @if($key === 3)
                        <a href="{{ route('employees-birthday.index') }}" class='btn btn-primary btn-block'>View more</a>
                        @break
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-12 col-xl-4 d-flex">
        <div class="card flex-fill">
            <div class="card-body">
                <h4 class="card-title">One week before birthdays <span
                        class="badge bg-inverse-primary ml-2">{{  $oneWeekBeforeBirthdays->count() }}</h4>
                @foreach($oneWeekBeforeBirthdays as $key => $employee)
                    <div class="leave-info-box">
                        <div class="media align-items-center">
                            <img class="avatar" src="/storage/employee_images/{{ is_null($employee->information) ? 'no_image.png' : $employee->information->photo }}">
                            <div class="media-body">
                                <div class="text-sm my-0 font-weight-medium">{{ $employee->fullname }}</div>
                                <div class="text-xs my-0 text-muted">{{ is_null($employee->information) ? 'N/A' : $employee->information->position->position_name }}</div>
                                <div class="text-xs my-0 text-muted">{{ is_null($employee->information) ? 'N/A' : $employee->information->office->office_name }}</div>
                            </div>
                        </div>
                        <div class="row align-items-center mt-3">
                            <div class="col-6">
                                <h6 class="mb-0">{{  Carbon\Carbon::parse($employee->date_birth)->format('l jS F Y') }}</h6>
                            </div>
                        </div>
                    </div>
                    @if($key === 3)
                        <a href="{{ route('employees-birthday.index') }}" class='btn btn-primary btn-block'>View more {{ $oneWeekBeforeBirthdays->count() - 4  }}</a>
                        @break
                    @endif
                @endforeach

            </div>
        </div>
    </div>
</div>

@push('page-scripts')
{{-- JS SCRIPTS HERE --}}
<script src="/assets/js/popper.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>

<script src="/assets/js/jquery.slimscroll.min.js"></script>

<script src="/assets/plugins/morris/morris.min.js"></script>
<script src="/assets/plugins/raphael/raphael.min.js"></script>

{{-- Charts --}}
<script>
    $(document).ready(function() {
        let yearlyJo = JSON.parse($('meta[name="yearlyJo"]').attr('content'));
        let yearlyRegular = JSON.parse($('meta[name="yearlyRegular"]').attr('content'));

        let data = [];

        Object.keys(yearlyJo).map((year, index) => {
            data.push({
                y : year, 
                a : yearlyJo[year],
                b :  yearlyRegular[year]
            });
        });

        // Bar Chart
        
        Morris.Bar({
            element: 'bar-charts',
            data: data,
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['No. of Employees(Job Order)', 'No. of Employees(Regular)'],
            lineColors: ['#ff9b44','#fc6075'],
            lineWidth: '3px',
            barColors: ['#ff9b44','#fc6075'],
            resize: true,
            redraw: true
        });
        
        // Line Chart
        
        Morris.Line({
            element: 'line-charts',
            data: data,
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['Total Sales', 'Total Revenue'],
            lineColors: ['#ff9b44','#fc6075'],
            lineWidth: '3px',
            resize: true,
            redraw: true
        });
            
    });
</script>
@endpush
@endsection
