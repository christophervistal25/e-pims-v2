@extends('layouts.app')
@section('title', 'Welcome User')
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
@section('content')
<div class="col-lg-12">
    <div class="card-group m-b-30">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <span class="d-block">New Employees</span>
                    </div>
                    <div>
                        <span class="text-success">+10%</span>
                    </div>
                </div>
                <h3 class="mb-3">10</h3>
                <div class="progress mb-2" style="height: 5px;">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mb-0">Overall Employees 218</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <span class="d-block">Earnings</span>
                    </div>
                    <div>
                        <span class="text-success">+12.5%</span>
                    </div>
                </div>
                <h3 class="mb-3">$1,42,300</h3>
                <div class="progress mb-2" style="height: 5px;">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mb-0">Previous Month <span class="text-muted">$1,15,852</span></p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <span class="d-block">Expenses</span>
                    </div>
                    <div>
                        <span class="text-danger">-2.8%</span>
                    </div>
                </div>
                <h3 class="mb-3">$8,500</h3>
                <div class="progress mb-2" style="height: 5px;">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mb-0">Previous Month <span class="text-muted">$7,500</span></p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <span class="d-block">Profit</span>
                    </div>
                    <div>
                        <span class="text-danger">-75%</span>
                    </div>
                </div>
                <h3 class="mb-3">$1,12,000</h3>
                <div class="progress mb-2" style="height: 5px;">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mb-0">Previous Month <span class="text-muted">$1,42,000</span></p>
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
<script src="/assets/js/chart.js"></script>
@endpush
@endsection
