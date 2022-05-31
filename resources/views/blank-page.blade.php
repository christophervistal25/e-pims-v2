﻿@extends('layouts.app')
@section('title', 'Dashboard')
@prepend('page-css')
<link rel="stylesheet" href="assets/plugins/morris/morris.css">
<style>
     .btn-primary {
          background: #ff9b44 !important;
          border-color: #ff9b44 !important;
     }

     .bg-primary {
          background: #ff9b44 !important;
     }

    #notification {
        position: sticky;
        width: 100%;
        height: 300px;
        overflow-x: scroll;
        white-space: nowrap;
    }   

</style>
@endprepend
@section('content')
<div class="card d-block" data-notif="" id="notification">
    <div class="alert alert-warning" id="header-warning">
        These are the names of employees that have an upcoming step-increment. To see more details, cliick the button below.
        <i class="fas fa-close text-danger float-right pr-2 mt-2" id="closeIcon"></i>
    </div>
    

    <h1 class="p-4" id="employees">Employee Names</h1>

    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus nemo autem nam ea blanditiis unde quo voluptas eum a natus! Eligendi suscipit ducimus iste dignissimos harum. Dolores et, consequuntur aperiam perspiciatis fugit eligendi deleniti provident debitis incidunt quod minus quibusdam voluptates molestias minima non, omnis molestiae a, officiis suscipit? Cum, fugit debitis nobis minus aperiam quod ad ducimus eum sapiente fugiat! Molestias laboriosam, reprehenderit libero quo fuga officia! Non magni tempore est aspernatur aliquid delectus illo, incidunt ratione esse! Sit repellat excepturi nihil! Dolorem aspernatur, molestiae ratione in, dolores, aperiam architecto dolor eligendi culpa pariatur quam voluptas maxime accusantium distinctio.</p>
  

    <div class="col-lg-12 text-center">
        <a href="/" class="btn btn-primary col-lg-12"><i class="fas fa-list">&nbsp; See More</i></a>
    </div>
</div>

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
                              <div class="progress-bar bg-primary" role="progressbar" style="width: {{ intval($no_of_jobOrder)/intval($allEmployees) * 100 }}%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
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
                              <div class="progress-bar bg-primary" role="progressbar" style="width: {{ intval($no_of_regular)/intval($allEmployees) * 100 }}%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
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
                                   <span class="text-success">{{ round(intval($no_of_promoted) / intval($allEmployees) * 100, 2) }}%</span>
                              </div>
                         </div>
                         <h3 class="mb-3">{{ $no_of_promoted }}</h3>
                         <div class="progress mb-2" style="height: 5px;">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: {{ intval($no_of_promoted)/intval($allEmployees) * 100 }}%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
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
                              <div class="progress-bar bg-primary" role="progressbar" style="width: {{ intval($no_of_active)/intval($allEmployees) * 100 }}%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                         </div>
                         <p class="mb-0">Inactive Employees {{ $no_of_inactive }}<span class="text-muted"></span></p>
                    </div>
               </div>
          </div>
     </div>
</div>


<div class="row">
     @if($promotionInSixMonths->count() !== 0)
     <div class="col-lg-12">
          <div class="card d-block rounded-0" id="notification">
               <div class="alert alert-warning rounded-0">
                    These are the names of employees that have an upcoming step-increment. To see more details, click the button below.
               </div>

               <div class="p-4">
                    @foreach($promotionInSixMonths as $employee)
                    <div class="leave-info-box">
                         <div class="media align-items-center">
                              <img class="img-fluid w-25" src="/storage/employee_images/no_image.png">
                              <div class="media-body">
                                   <div class="my-0 h6">{{ $employee->fullname }}</div>
                                   <div class="my-0 font-weight-medium">{{ $employee->position->Description }}</div>
                                   <div class="my-0 font-weight-medium">Office Charging : <strong>{{ $employee->office_charging->Description }}</strong></div>
                                   <div class="my-0 font-weight-medium">Office Assignment : {{ $employee->office_assignment->Description }}</div>
                                   <div class="my-0 font-weight-medium">First day of service : <strong>{{ date('l F d, Y', strtotime($employee->first_day_of_service)) }}</strong>
                                        <div class="my-0 font-weight-medium">Next Increment : <strong>{{ date('l F d, Y', strtotime($employee->first_day_of_service->addYears(3))) }}</strong>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         @endforeach
                    </div>

                    @if($promotionInSixMonths->count() >= 2)
                    <div class="col-lg-12">
                         <a href="{{ route('promotion.see-more') }}" class="btn btn-primary btn-sm col-lg-12">
                              <i class="fas fa-list"></i> &nbsp; See More {{ $promotionInSixMonths->count() - 1 }}
                         </a>
                    </div>
                    @endif
               </div>
          </div>

     </div>
     @endif
     <div class="row">

          <div class="col-md-12 col-lg-12 col-xl-4 d-flex">
               <div class="card flex-fill">
                    <div class="card-header">
                         Today's Birthdays <span class="badge bg-inverse-primary ml-2">{{ $today->count() }}
                    </div>
                    <div class="card-body">
                         @foreach($today as $key => $employee)
                         <div class="leave-info-box">
                              <div class="media align-items-center">
                                   <img class="img-fluid w-25" src="/storage/employee_images/no_image.png">
                                   <div class="media-body">
                                        <div class="my-0 h6">{{ $employee->fullname }}</div>
                                        <div class="my-0 font-weight-medium">{{ $employee->position?->position_name }}</div>
                                        <div class="my-0 font-weight-medium">{{ $employee->office?->office_short_name }}</div>
                                        <div class="my-0 font-weight-medium">{{ date('l F d, Y', strtotime($employee->Birthdate)) }}
                                        </div>
                                   </div>
                              </div>
                         </div>
                         @if($key === 3)
                         {{-- {{  $today->count() - 4 }} --}}
                         <a href="{{ route('employees-birthday.index') }}" class='btn btn-primary btn-block h6'>View</a>
                         @break
                         @endif
                         @endforeach
                    </div>
               </div>
          </div>


          <div class="col-md-12 col-lg-12 col-xl-4 d-flex">
               <div class="card flex-fill">
                    <div class="card-header">
                         Tomorrow Birthdays <span class="badge bg-inverse-primary ml-2">{{ $today->count() }}
                    </div>
                    <div class="card-body">
                         @foreach($tomorrow as $key => $employee)
                         <div class="leave-info-box">
                              <div class="media align-items-center">
                                   <img class="img-fluid w-25" src="/storage/employee_images/no_image.png">
                                   <div class="media-body">
                                        <div class="my-0 h6">{{ $employee->fullname }}</div>
                                        <div class="my-0 font-weight-medium">{{ $employee->position?->position_name }}</div>
                                        <div class="my-0 font-weight-medium">{{ $employee->office?->office_short_name }}</div>
                                        <div class="my-0 font-weight-medium">{{ date('l F d, Y', strtotime($employee->Birthdate)) }}
                                        </div>
                                   </div>
                              </div>
                         </div>
                         @if($key === 3)
                         {{-- {{  $tomorrow->count() - 4 }} --}}
                         <a href="{{ route('employees-birthday.index') }}" class='btn btn-primary btn-block h6'>View</a>
                         @break
                         @endif
                         @endforeach
                    </div>
               </div>
          </div>


          <div class="col-md-12 col-lg-12 col-xl-4 d-flex">
               <div class="card flex-fill">
                    <div class="card-header">One week before Birthdays <span class="badge bg-inverse-primary ml-2">{{ $oneWeekBeforeBirthdays->count() }}</div>
                    <div class="card-body">

                         @foreach($oneWeekBeforeBirthdays as $key => $employee)
                         <div class="leave-info-box">
                              <div class="media align-items-center">
                                   <img class="img-fluid w-25" src="/storage/employee_images/no_image.png">
                                   <div class="media-body">
                                        <div class="my-0 h6">{{ $employee->fullname }}</div>
                                        <div class="my-0 font-weight-medium">{{ $employee->position?->position_name }}</div>
                                        <div class="my-0 font-weight-medium">{{ $employee->office?->office_name }}</div>
                                        <div class="my-0 font-weight-medium">{{ date('l F d, Y', strtotime($employee->Birthdate)) }}
                                        </div>
                                   </div>
                              </div>
                         </div>
                         @if($key === 3)
                         {{-- {{ $oneWeekBeforeBirthdays->count() - 4  }} --}}
                         <a href="{{ route('employees-birthday.index') }}" class='btn btn-primary btn-block h6'>View</a>
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

<<<<<<< HEAD

<script>
  
    $('#closeIcon').on('click', function() {
        $('#notification').fadeOut(1000, function() {
            $('#notification').remove();
        });
    })
=======
     <script src="/assets/plugins/morris/morris.min.js"></script>
     <script src="/assets/plugins/raphael/raphael.min.js"></script>

     {{-- Charts --}}
     <script>
          $('#closeIcon').on('click', function() {
                         $('#notification').fadeOut(1000, function() {
                                   $('#notification').remove();
                              }
                         });
>>>>>>> 4726173be1a3c44c3a51c8df5d3525f3cd9de2c3

     </script>


     @endpush
     @endsection
