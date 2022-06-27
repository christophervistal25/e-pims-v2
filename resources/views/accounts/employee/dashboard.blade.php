@extends('accounts.employee.layouts.app')
@section('title', 'Dashboard')
@prepend('page-css')
<link rel="stylesheet" href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />
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

      <button class='btn btn-primary btn-block mb-3 rounded-0' id='btnDownloadPDS'>DOWNLOAD PERSONAL DATA SHEET</button>

      <h1 class="dash-sec-title">LEAVE CREDITS</h1>

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
                                    <h3>{{ $balances->sum('vl_earned') - $balances->sum('vl_used') }}</h3>
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
                                    <h3>{{ $balances->sum('sl_earned') - $balances->sum('sl_used') }}</h3>
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
                                    <h3>{{ (float) ($balances->sum('vl_earned') - $balances->sum('vl_used'))  + ($balances->sum('sl_earned') - $balances->sum('sl_used')) }}</h3>
                                    <span class='text-uppercase font-weight-medium'>vacation and sick total</span>
                              </div>
                        </div>
                  </div>
            </div>
            <div class="col-lg-8 col-md-8">
                  <section class="dash-section">
                        <h1 class="dash-sec-title">ON-GOING LEAVE</h1>
                        <div class="dash-sec-content cursor-pointer" id="widget--today--leave">
                              <div class="dash-info-list">
                                    <div class="dash-card">
                                          <div class="dash-card-container">
                                                <div class="dash-card-icon">
                                                      <i class="fa fa-suitcase text-primary"></i>
                                                </div>
                                                <div class="dash-card-content">
                                                      @empty($onGoingLeaves->count())
                                                      <p class='text-sm text-danger text-uppercase font-weight-bold'>no on-going leave/s</p>
                                                      @else
                                                      @if($onGoingLeaves->count() <= 2) <p class='text-sm'>
                                                            {{ $onGoingLeaves->implode('employee.fullname', ', ') }}</p>
                                                            @elseif($onGoingLeaves->count() >= 3)
                                                            <p class='text-sm'>
                                                                  <strong>{{ $onGoingLeaves->first()->employee->fullname  }}</strong> ,
                                                                  <strong>{{ $onGoingLeaves->get(1)->employee->fullname  }}</strong>
                                                                  and <strong>{{ $onGoingLeaves->count() - 2 }}</strong> more.
                                                            </p>
                                                            @endif
                                                            @endempty
                                                </div>
                                                <div class="dash-card-avatars">
                                                      @foreach($onGoingLeaves as $today)
                                                      @if($today->employee)
                                                      <div class="e-avatar">
                                                            <img src="/storage/employee_images/{{ $user->profile }}" alt="">
                                                      </div>
                                                      @endif
                                                      @endforeach
                                                </div>
                                          </div>
                                          </a>
                                    </div>
                              </div>
                  </section>
            </div>
            <div class="col-lg-4 col-md-4">
                  <div class="dash-sidebar">
                        <section>
                              <h1 class="dash-sec-title">Holidays for the month of {{ date('F', time()) }}</h5>
                                    @forelse($holidays as $holiday)
                                    <div class="card">
                                          <div class="card-body text-center">
                                                <p class="text-dark mb-0 font-weight-medium">{{ $holiday->dateString }} -
                                                      {{ $holiday->name }}</p>
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
            <div class="col-lg-12">
                  <table class='table table-bordered mt-2 bg-white'>
                        <thead>
                              <tr>
                                    <th class="align-middle text-center font-weight-bold text-uppercase" rowspan="2">Leave</th>
                                    <th class="align-middle text-center font-weight-bold text-uppercase" rowspan="2">Incase of.</th>
                                    <th class="align-middle text-center font-weight-bold text-uppercase" rowspan="2">Commutation</th>
                                    <th class="align-middle text-center font-weight-bold text-uppercase" rowspan="2">Status</th>
                                    <th class="align-middle text-center font-weight-bold text-uppercase" rowspan="1" colspan="4">Date</th>
                                    <th class="align-middle text-center font-weight-bold text-uppercase" rowspan="2">No. of Days</th>
                              <tr>
                                    <td class="align-middle text-center font-weight-bold text-uppercase">Filling</td>
                                    <td class="align-middle text-center font-weight-bold text-uppercase">Approved</td>
                                    <td class="align-middle text-center font-weight-bold text-uppercase">FROM</td>
                                    <td class="align-middle text-center font-weight-bold text-uppercase">TO</td>
                              </tr>
                              </tr>
                        </thead>
                        <tbody>
                              @forelse($leaveApplications as $application)
                              <tr>
                                    <td class='text-center font-weight-medium'>{{ $application->type->description }}</td>
                                    <td class='text-uppercase text-center'>{{ str_replace('_', ' ', $application->incase_of) }}</td>
                                    <td class='text-center'>{{ $application->commutation == 0 ? 'Not Requested' : 'Requested' }}</td>
                                    <td class='text-center'>
                                          <span @class([ 'text-uppercase' , 'badge badge-info'=> $application->status === 'pending',
                                                'badge badge-success' => $application->status === 'approved',
                                                'badge badge-danger' => $application->status === 'reject',
                                                'badge badge-primary' => $application->status === 'on-going',
                                                'badge badge-purple' => $application->status === 'enjoyed',
                                                ])>
                                                {{ $application->status }}
                                          </span>
                                    </td>
                                    <td class='text-center'>{{ $application->date_applied->format('F d, Y h:i A') }}</td>
                                    <td class='text-center'>{{ $application->date_approved?->format('F d, Y h:i A') }}</td>
                                    <td class='text-center'>{{ $application->date_from->format('F d, Y') }}</td>
                                    <td class='text-center'>{{ $application->date_to->format('F d, Y') }}</td>
                                    <td class='text-center font-weight-bold'>{{ $application->no_of_days }}</td>
                                    <td class='text-sm text-center'>
                                          <button data-source="{{ $application->application_id }}" class='btn btn-primary btn-sm btn-rounded shadow btnPrintLeaveApplicationFilling'>
                                                <i class='la la-print' style="pointer-events:none;"></i>
                                          </button>
                                    </td>
                              </tr>
                              @empty
                              <tr>
                                    <td colspan="9" class='text-center'>
                                          <i class='fa fa-warning text-danger'></i>
                                          <h6 class="text-uppercase">No data available</h6>
                                    </td>
                              </tr>
                              @endforelse
                        </tbody>
                  </table>
            </div>
      </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id='selectFilExportModal' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase" id="exampleModalLabel">CHOOSE A FILE TYPE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 p-2" id='download-in-excel' style='cursor:pointer;'>
                        <img class='img-fluid w-25' src="{{ asset('/assets/img/xls.png') }}" alt="">
                        <span class='font-weight-medium'>DOWNLOAD IN EXCEL FORMAT</span>
                    </div>
                    <div class="col-lg-6 p-2" id='download-in-pdf' style='cursor:pointer;'>
                        <img class='img-fluid w-25' src="{{ asset('/assets/img/pdf.png') }}" alt="">
                        <span class='font-weight-medium'>DOWNLOAD IN PDF FORMAT</span>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                  <button class='btn btn-block btn-primary' id='btn-download-status'>
                        <div class="spinner-border text-light" role="status"></div>
                  </button>
            </div>
        </div>
    </div>
</div>
@push('page-scripts')
<script src="{{ asset('/assets/js/moment.min.js') }}"></script>
<script src="https://cdn.socket.io/3.1.1/socket.io.min.js" integrity="sha384-gDaozqUvc4HTgo8iZjwth73C6dDDeOJsAgpxBcMpZYztUfjHXpzrpdrHRdVp8ySO" crossorigin="anonymous"></script>
<script>
      const EMPLOYEE_ID = "{{ Auth::user()->Employee_id }}";
      conectionString = "{{ env('MIX_SOCKET_IP') }}";
      socket = io.connect(conectionString);

      $('#btn-download-status').hide();

      $(document).on('click', '.btnPrintLeaveApplicationFilling', function() {
            let id = $(this).attr('data-source');
            window.open(`/print-leave-application/${id}`);
      })

      $('#btnDownloadPDS').click(function () {
            $('#selectFilExportModal').modal('toggle');
      });

      $('#download-in-excel').click(function () {
            $('#btn-download-status').fadeIn();
            window.open(`/prints/download-personal-data-sheet-excel/${EMPLOYEE_ID}`);
            $('#btn-download-status').fadeOut();
            $('#selectFilExportModal').modal('toggle');
      });

      $('#download-in-pdf').click(function () {
            $('#btn-download-status').fadeIn();
            $.ajax({
                  url : `/prints/download-personal-data-sheet/generate/${EMPLOYEE_ID}`,
                  method : 'POST',
                  success : function (response) {
                        if(response.success) {
                              socket.emit('PRINT_PDF', {
                                    id : EMPLOYEE_ID,
                                    fileName : response.filename,
                              });
                        }
                  }
            });
      });

      socket.on(`PUBLISH_DONE_${EMPLOYEE_ID}`, function () {
            $('#btn-download-status').fadeOut();
            window.open(`/prints/download-personal-data-sheet-pdf/${EMPLOYEE_ID}-E-PDS`);
            $('#selectFilExportModal').modal('toggle');
      });
</script>
@endpush
@endsection
