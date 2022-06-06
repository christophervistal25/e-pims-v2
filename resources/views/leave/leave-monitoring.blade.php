@extends('layouts.app')
@section('title', 'Leave Monitoring Index')
@prepend('page-css')
{{-- <script src="{{ asset('/js/app.js') }}" defer></script> --}}
<link rel="stylesheet" href="/assets/css/custom.css" />
<link rel="stylesheet" href="/assets/css/bootstrap-float-label.min.css" />
<link rel="stylesheet" href="/assets/css/line-awesome.min.css">
<link rel="stylesheet" href="/assets/css/style.css">
<link rel="stylesheet" href="/assets/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/assets/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="https://unpkg.com/simplebar@latest/dist/simplebar.css" />
<style>
     /* Chrome, Safari, Edge, Opera */
     input::-webkit-outer-spin-button,
     input::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;
     }

     /* Firefox */
     input[type=number] {
          -moz-appearance: textfield;
     }

     .modal-header {
          background: rgb(255, 190, 36);
          background: linear-gradient(90deg, rgba(255, 190, 36, 1) 0%, rgba(255, 126, 5, 1) 75%, rgba(255, 72, 0, 1) 100%);
     }

     .swal-text {
          text-align: center;
     }

     table {
          border: 1px solid black;
          font-size: 14px;
          margin: 10px 0;
          position: relative;
     }

     thead tr th {
          background-color: white;
          position: sticky;
          top: -2px;
     }

     thead {
          border: 1px solid black;
          line-height: 1.25;
          overflow: hidden;
     }


     .table {
          border-collapse: collapse;
     }

     .sticky-table thead th {
          position: -webkit-sticky;
          position: sticky;
          top: 0;
          z-index: 2;
          box-shadow: inset 0 -2px 0 gray;
     }

     .material-icons.md-18 {
          font-size: 18px;
     }

     .material-icons.md-24 {
          font-size: 24px;
     }

     .material-icons.md-36 {
          font-size: 36px;
     }

     .material-icons.md-48 {
          font-size: 48px;
     }

</style>
@endprepend
@section('content')
<div class="row">
     <div class="d-flex col-lg-3">
          <div class="flex-fill">
               <div class="card h-100">
                    <div class="card-body pb-0">
                         <div class="row">
                              <div class="col-lg-12 text-center">
                                   <img class="mb-3 rounded-circle img-thumbnail" id="empPhoto" src="/storage/employee_images/no_image.png" width="50%" />
                              </div>
                         </div>
                         <div class="row">
                              <div class="col-lg-12">
                                   <label for="empName" class="form-group has-float-label bg-light">
                                        <select class="form-control selectpicker" data-live-search="true" name="employeeName" id="employeeName" data-size="6" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                             <option value="">Search name here</option>
                                             @foreach($employees as $employee)
                                             <option data-office="{{ $employee->office_charging->Description }}" data-position="{{ $employee?->position?->Description }}" data-employeeId="{{ $employee->Employee_id }}" value="{{ $employee->Employee_id }}">{{ $employee->LastName }},
                                                  {{ $employee->FirstName }} {{ $employee->MiddleName }} </option>
                                             @endforeach
                                        </select>
                                        <span><strong>EMPLOYEE NAME</strong></span>
                                   </label>

                                   <label for="office" class="form-group has-float-label">
                                        <input type="text" name="office" id="office" class="form-control bg-light" style="outline: none; box-shadow: 0px 0px 0px transparent;" readonly>
                                        <span class="font-weight-bold">OFFICE</span>
                                   </label>
                                   <label for="position" class="form-group has-float-label">
                                        <input type="text" name="position" id="position" class="form-control bg-light" style="outline: none; box-shadow: 0px 0px 0px transparent;" readonly>
                                        <span class="font-weight-bold">POSITION</span>
                                   </label>
                              </div>
                         </div>
                         <div class="row">
                              <div class="col-lg-12">
                                   <hr class="mt-1 bg-secondary">
                                   <div class="alert alert-dark text-center">
                                        <strong>LEAVE BALANCES</strong>
                                   </div>
                                   <div class="row">
                                        <div class="col-lg-12">
                                             <label for="vlBal" class="form-group has-float-label">
                                                  <input type="text" class="form-control text-right text-secondary font-weight-bold bg-light" id="vlBal" style="outline: none; box-shadow: 0px 0px 0px transparent; font-size: 20px" readonly>
                                                  <span><strong>VL BALANCE</strong></span>
                                             </label>
                                        </div>
                                   </div>
                                   <div class="row">
                                        <div class="col-lg-12">
                                             <label for="slBal" class="form-group has-float-label">
                                                  <input type="text" class="form-control text-right text-secondary font-weight-bold bg-light" id="slBal" style="outline: none; box-shadow: 0px 0px 0px transparent; font-size: 20px" readonly>
                                                  <span><strong>SL BALANCE</strong></span>
                                             </label>
                                        </div>
                                   </div>
                                   <hr class="mt-0">
                                   <div class="row">
                                        <div class="col-lg-12">
                                             <label for="totalBalance" class="form-group has-float-label">
                                                  <input type="text" class="form-control text-center text-primary font-weight-bold bg-light" id="totalBalance" style="outline: none; box-shadow: 0px 0px 0px transparent; height: 100px; font-size: 75px" readonly>
                                                  <span><strong>TOTAL LEAVE BALANCE</strong></span>
                                             </label>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <div class="d-flex col-lg-9">
          <div class="flex-fill">
               <div class="card h-100">
                    <div class="card-body">
                         <div class="alert alert-warning text-center">
                              <strong>LEAVE MONITORING INDEX</strong>
                         </div>
                         <div class="row">
                              <div class="col-lg-4">
                                   <label for="yearFilter" class="form-group has-float-label yearFilter">
                                        <select class="form-control selectpicker" name="yearFilter" type="text" id="yearFilter" data-size="4" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                             <option>All</option>
                                             <option value="2021">2021</option>
                                             <option value="2020">2020</option>
                                             <option value="2019">2019</option>
                                        </select>
                                        <span><strong>Filter Year</strong></span>
                                   </label>
                              </div>
                              <div class="col-lg-4">
                              </div>
                              <div class="col-lg-1">

                              </div>
                              <div class="col-lg-3">
                                   <button title="Add Undertime" type="button" class="btn btn-primary btn-block text-white shadow" id="btnUndertime">
                                        Add Late or Undertime
                                   </button>
                              </div>
                         </div>
                         <div class="table-responsive" data-simplebar data-simplebar-lg style="height: 55vh;">
                              <table class="table table-bordered text-center mt-2 sticky-table" width="100%" id="leave_card">
                                   <thead>
                                        <tr>
                                             <th class="font-weight-bold align-middle text-center" rowspan="2" width="27%">Period
                                             </th>
                                             <th class="font-weight-bold align-middle text-center" rowspan="2" width="9%">Particular
                                             </th>
                                             <th class="font-weight-bold align-middle text-center" colspan="4">VACATION LEAVE</th>
                                             <th class="font-weight-bold align-middle text-center" colspan="4">SICK LEAVE</th>
                                             <th class="font-weight-bold align-middle text-center" rowspan="2" width="8%">Bal</th>
                                             <th class="font-weight-bold align-middle text-center" rowspan="2" width="8%">View
                                                  Details</th>
                                        </tr>
                                        <tr>
                                             <th class="align-middle text-center text-xs" width="6%">Earned</th>
                                             <th class="align-middle text-center text-xs" width="6%">WP</th>
                                             <th class="align-middle text-center text-xs" width="6%">Balance</th>
                                             <th class="align-middle text-center text-xs" width="6%">WOP</th>
                                             <th class="align-middle text-center text-xs" width="6%">Earned</th>
                                             <th class="align-middle text-center text-xs" width="6%">WP</th>
                                             <th class="align-middle text-center text-xs" width="6%">Balance</th>
                                             <th class="align-middle text-center text-xs" width="6%">WOP</th>
                                        </tr>
                                   </thead>
                                   <tbody>

                                   </tbody>
                                   <tfoot>
                                        <td colspan="12" class="text-center text-sm bg-light">
                                             &nbsp;
                                        </td>
                                   </tfoot>
                              </table>
                         </div>
                         <!-- ADD LATE OR UNDERTIME MODAL -->
                         <div class="modal rounded-0 fade" id="addUndertime" data-keyboard="false" data-backdrop="static">
                              <div class="modal-dialog modal-md modal-dialog-centered">
                                   <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                             <h4 class="modal-title text-capitalize">Add Late or Undertime</h4>
                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                             <form id="addUndertimeForm" method="POST">
                                                  <div class="row">
                                                       <div class="col-lg-12">
                                                            <div class="form-group">
                                                                 <input type="hidden" class='form-control' name="employee_id" id="employee_id">
                                                                 <input type="hidden" class='form-control' name="undertime_id" id="undertime_id">
                                                            </div>
                                                            <div class='alert alert-danger d-none' id="equivalent-error-message"></div>
                                                       </div>
                                                  </div>

                                                  <div class="row">
                                                       <div class="col-lg-12 mt-0">
                                                            <label for="hours" class="h4">
                                                                 LATE:
                                                            </label>
                                                       </div>
                                                       <div class="col-lg-6">
                                                            <label for="hoursLate" class="form-group has-float-label hoursLate">
                                                                 <input type="number" name="hoursLate" id="hoursLate" class="form-control hoursLate" value="0" style="outline: none; box-shadow: 0px 0px 0px transparent; height: 75px; font-size:50px; font-family:Century Gothic; text-align:left; ">
                                                                 <span class="font-weight-bold">Hours </span>
                                                                 <div class='text-danger' id="hoursLate-error-message"></div>
                                                            </label>
                                                       </div>
                                                       <div class="col-lg-6">
                                                            <label for="minsLate" class="form-group has-float-label minsLate">
                                                                 <input type="number" name="minsLate" id="minsLate" class="form-control minsLate" value="0" style="outline: none; box-shadow: 0px 0px 0px transparent; height: 75px; font-size:50px; font-family:Century Gothic; text-align:left; ">
                                                                 <span class="font-weight-bold">Minutes </span>
                                                                 <div class='text-danger' id="minsLate-error-message"></div>
                                                            </label>
                                                       </div>
                                                  </div>

                                                  <div class="row">
                                                       <div class="col-lg-12">
                                                            <label for="hours" class="h4">
                                                                 UNDERTIME:
                                                            </label>
                                                       </div>
                                                       <div class="col-lg-6">
                                                            <label for="hoursUndertime" class="form-group has-float-label hoursUndertime">
                                                                 <input type="number" name="hoursUndertime" id="hoursUndertime" class="form-control hoursUndertime" value="0" style="outline: none; box-shadow: 0px 0px 0px transparent; height: 75px; font-size:50px; font-family:Century Gothic; text-align:left; ">
                                                                 <span class="font-weight-bold">Hours </span>
                                                                 <div class='text-danger' id="hoursUndertime-error-message"></div>
                                                            </label>
                                                       </div>
                                                       <div class="col-lg-6">
                                                            <label for="minsUndertime" class="form-group has-float-label minsUndertime">
                                                                 <input type="number" name="minsUndertime" id="minsUndertime" class="form-control minsUndertime" value="0" style="outline: none; box-shadow: 0px 0px 0px transparent; height: 75px; font-size:50px; font-family:Century Gothic; text-align:left; ">
                                                                 <span class="font-weight-bold">Minutes </span>
                                                                 <div class='text-danger' id="minsUndertime-error-message"></div>
                                                            </label>
                                                       </div>
                                                  </div>
                                                  <hr class="bg-primary mb-4 mt-1 pt-1">
                                                  <div class="row">
                                                       <div class="col-lg-6">
                                                            <label for="date_added" class="form-group has-float-label">
                                                                 <input type="month" name="date_added" id="date_added" class="form-control date_added" style="outline: none; box-shadow: 0px 0px 0px transparent; height: 75px; font-size:20px; font-family:Century Gothic; text-align:left; ">
                                                                 <span class="font-weight-bold date-span"></span>
                                                                 <div class='text-danger' id="date_added-error-message"></div>
                                                                 <span class="font-weight-bold">DATE <span class='text-danger'>*</span></span>
                                                            </label>
                                                       </div>
                                                       <div class="col-lg-6">
                                                            <label for="equivalent" class="form-group has-float-label equivalent">
                                                                 <input type="number" name="equivalent" id="equivalent" class="form-control equivalent" value="0" style="outline: none; box-shadow: 0px 0px 0px transparent; height: 75px; font-size:50px; font-family:Century Gothic; text-align:left; " readonly>
                                                                 <span class="font-weight-bold"> EQUIVALENT LEAVE </span>
                                                            </label>
                                                       </div>
                                                  </div>

                                        </div>
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                             <button type="button" class="btn btn-primary shadow" id="btnAddUndertime">
                                                  <div class="spinner-border spinner-border-sm text-light d-none" id="save-spinner" role="status">
                                                       <span class="sr-only">Loading...</span>
                                                  </div>
                                                  Add
                                             </button>
                                             <button type="button" class="btn btn-primary shadow d-none" id="btnUpdateUndertime">
                                                  <div class="spinner-border spinner-border-sm text-light d-none" id="save-spinner" role="status">
                                                       <span class="sr-only">Loading...</span>
                                                  </div>
                                                  Save Changes
                                             </button>
                                             </form>
                                             <button type="button" class="btn btn-danger shadow" data-dismiss="modal">Close</button>
                                        </div>

                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>

@push('page-scripts')
<script src="/assets/js/jquery.dataTables.min.js"></script>
<script src="/assets/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="/assets/js/sweetalert.min.js"></script>
<script src="/assets/js/leaveMonitoring.js"></script>
<script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script>
<script>
     $.ajaxSetup({
          headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
     });

     var tableHeaderTop = document.querySelector('.sticky-table thead').getBoundingClientRect().top;
     var ths = document.querySelectorAll('.sticky-table thead th')

     for (var i = 0; i < ths.length; i++) {
          var th = ths[i];
          th.style.top = th.getBoundingClientRect().top - tableHeaderTop + "px";
     }

</script>
@endpush
@endsection
