@extends('layouts.app')
@section('title', 'Promotions')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link rel="stylesheet" href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
<link rel="stylesheet" href="/assets/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/assets/css/style.css">
@endprepend
@section('content')
<style>
     #hover:hover {
          background: #eff0f3;
          padding: 2px;
     }
</style>
<div class="content container-fluid">
     <div class="kanban-board card shadow mb-0">
          <div class="card-body">

               <div class="row">
                    @foreach($promotionInSixMonths as $employees)
                    <div class="col-lg-6">
                         <div class="leave-info-box">
                              <div class="btn-group dropleft float-right">
                                   {{-- <i class="fa-solid fa-ellipsis-vertical float-right" data-key="edit" id="edit"></i> --}}
                                   <a type="button" class="btn dropdown-toogle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical float-right" title="Edit"></i></a>
                                  
                                   <div class="dropdown-menu">
                                        <div id="hover">
                                             <a href="/step-increment" class="text-dark ml-4 h-2"><i class="fas fa-eye"></i>&nbsp; View Step</a>
                                        </div>
                                        <div class="mt-2" id="hover">
                                             <a href="/" class="text-dark ml-4 h-2"><i class="fas fa-pencil"></i>&nbsp; Edit</a>
                                        </div>
                                   </div>
                              </div>
                              <br>
                         <div class="media align-items-center">
                              {{-- <img class="img-fluid w-25 mr-4" src="/storage/employee_images/no_image.png"> --}}
                              <img class="img-fluid w-25 mr-2" src="{{ asset('/assets/img/luna.jpg') }}" style="height: 200px">
                            
                              <div class="media-body">
                                   <div class="my-0 font-weight-bold h3">{{ $employees->fullname }}</div>
                                   <div class="my-0 font-weight-medium">{{ $employees->position->Description }}</div>
                                   <div class="my-0 font-weight-medium">Office Charging : <strong>{{ $employees->office_charging->Description }}</strong></div>
                                   <div class="my-0 font-weight-medium">Office Assignment : {{ $employees->office_assignment->Description }}</div>
                                   <div class="my-0 font-weight-medium">First day of service : <strong>{{ date('l F d, Y', strtotime($employees->first_day_of_service)) }}</strong>
                                        <div class="my-0 font-weight-medium">Next Increment : <strong>{{ date('l F d, Y', strtotime($employees->first_day_of_service->addYears(3))) }}</strong>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         </div>
                    </div>
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


     @endpush


@endsection
