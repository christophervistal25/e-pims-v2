@extends('layouts.app')
@section('title', 'Service Records')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />
@prepend('page-css')
{{-- <script src="{{ asset('/js/app.js') }}" defer></script> --}}
@endprepend
<style>
     .swal-content ul {
          list-style-type: none;
     }

     #line {
          border-bottom: 2px solid #DEE2E6;
          padding-bottom: 15px;
     }

     .btn-primarys {
          background-color: #FF9B44;
          color: white;
     }

     .btn-primarys:hover {
          background-color: #FF8544;
          color: white;
     }

     .page-item.active .page-link {
          background-color: #FF9B44 !important;
          border: 1px solid #FF9B44;
     }

     .page-item.active .page-link:hover {
          background-color: #FF8544 !important;
          border: 1px solid #FF8544;
     }

     .swal-content ul {
          list-style-type: none;
          padding: 0;
     }

     table.dataTable.no-footer {
          border: 1px solid #dee2e6;
     }

     table.dataTable thead th,
     table.dataTable thead td {
          padding: 15px 25px;
          border-bottom: 1px solid #dee2e6;
     }

     table.dataTable {
          border-collapse: collapse;
     }

</style>
@endprepend
@section('content')
<div class="clearfix"></div>
<div class="kanban-board card shadow mb-0">
     <div class="card-body">
          <div id="add" class="page-header  {{  count($errors->all())  !== 0 ?  '' : 'd-none' }}">

               <div style='padding-bottom:50px;margin-right:-15px;' class="col-auto ml-auto">
                    <button id="cancelbutton" class="btn btn-primarys submit-btn float-right"><i class="fa fa-list"></i>
                         Service Records List</button>
               </div>

               <form action="/service-records" method="post" id="serviceRecordForm">
                    @csrf
                    <div class="row">

                         <div class="col-12">
                              <div class="alert alert-secondary text-center font-weight-bold" role="alert">
                                   <a id="employeeTitleName"></a>
                              </div>
                         </div>
                         <div class="form-group col-12 col-lg-12 d-none">
                              <label>Employee_id<span class="text-danger">*</span></label>
                              <input class="form-control" value="" name="employeeId" id="employeeId" type="text" readonly>
                         </div>

                         <div class="form-group col-12 col-lg-6">
                              <label class="has-float-label mb-0">
                                   <input class="form-control" value="" name="fromDate" id="fromDate" type="date" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                   <span class="font-weight-bold">FROM<span class="text-danger">*</span></span>
                              </label>
                              <div id='from-date-error-message' class='text-danger text-sm'>
                              </div>
                         </div>

                         <div class="form-group col-12 col-lg-6">
                              <label class="has-float-label mb-0">
                                   <input class="form-control" value="" name="toDate" id="toDate" type="date" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                   <span class="font-weight-bold">TO<span class="text-danger">*</span></span>
                              </label>
                              <div id='to-date-error-message' class='text-danger text-sm'>
                              </div>
                         </div>

                         <div class="form-group col-12 col-lg-4">
                              <label class="has-float-label mb-0">
                                   <input value="{{ old('salary') }}" class="form-control {{ $errors->has('salary')  ? 'is-invalid' : ''}}" name="salary" id="salary" type="text" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                   <span class="font-weight-bold">SALARY<span class="text-danger">*</span></span>
                              </label>
                              <div id='salary-error-message' class='text-danger text-sm'>
                              </div>
                         </div>

                         <div class="form-group col-12 col-lg-4">
                              <label class="has-float-label mb-0">
                                   <input value="{{ old('leavePay') }}" class="form-control {{ $errors->has('leavePay')  ? 'is-invalid' : ''}}" name="leavePay" id="leavePay" type="text" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                   <span class="font-weight-bold">LEAVE WITHOUT PAY<span class="text-danger">*</span></span>
                              </label>
                              <div id='leave-pay-error-message' class='text-danger text-sm'>
                              </div>
                         </div>

                         <div class="form-group col-12 col-lg-4">
                              <label class="has-float-label mb-0">
                                   <input class="form-control" value="" name="date" id="date" type="date" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                   <span class="font-weight-bold">DATE<span class="text-danger">*</span></span>
                              </label>
                              <div id='date-error-message' class='text-danger text-sm'>
                              </div>
                         </div>

                         <div class="form-group col-12 col-lg-4">
                              <label class="has-float-label mb-0 statuss">
                                   <select value="" class="form-control selectpicker  {{ $errors->has('status')  ? 'is-invalid' : ''}}" name="status" data-live-search="true" id="status" data-size="4" data-width="100%" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                        <option></option>
                                        @foreach(range(0, 9) as $statuses)
                                        @if($status[$statuses] == old('status'))
                                        <option value="{{ $status[$statuses]}}" selected>{{ $status[$statuses] }}</option>
                                        @else
                                        <option value="{{ $status[$statuses]}}">{{ $status[$statuses] }}</option>
                                        @endif
                                        @endforeach
                                   </select>
                                   <span class="font-weight-bold">STATUS<span class="text-danger">*</span></span>
                              </label>
                              <div id='status-error-message' class='text-danger text-sm'>
                              </div>
                         </div>

                         <div class="form-group col-12 col-lg-4">
                              <label class="has-float-label mb-0 positionTitle">
                                   <select value="" class="form-control selectpicker  {{ $errors->has('positionTitle')  ? 'is-invalid' : ''}}" name="positionTitle" data-live-search="true" id="positionTitle" data-size="5" data-width="100%">
                                        <option></option>
                                        @foreach($position as $positions)
                                        <option style="width:350px;" {{ old('positionTitle') == $positions->PosCode ? 'selected' : '' }} value="{{ $positions->PosCode }}">{{ $positions->Description }}</option>
                                        @endforeach
                                   </select>
                                   <span class="font-weight-bold">POSITION<span class="text-danger">*</span></span>
                              </label>
                              <div id='position-title-error-message' class='text-danger text-sm'>
                              </div>
                         </div>


                         <div class="form-group col-12 col-lg-4">
                              <label class="has-float-label mb-0 officeCode">
                                   <select value="" class="form-control selectpicker  {{ $errors->has('officeCode')  ? 'is-invalid' : ''}}" name="officeCode" data-live-search="true" id="officeCode" data-size="4" data-width="100%" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                        <option></option>
                                        @foreach($office as $offices)
                                             <option style="width:350px;" {{ old('officeCode') == $offices->office_code ? 'selected' : '' }} value="{{ $offices->office_code}}">{{ $offices->office_name }}</option>
                                        @endforeach
                                   </select>
                                   <span class="font-weight-bold">OFFICE<span class="text-danger">*</span></span>
                              </label>
                              <div id='office-error-message' class='text-danger text-sm'>
                              </div>
                         </div>

                         <div class="form-group col-12 col-lg-6">
                              <label class="has-float-label mb-0">
                                   <textarea value="{{ old('cause') }}" class="form-control {{ $errors->has('cause')  ? 'is-invalid' : ''}}" name="cause" id="cause" type="text" style="outline: none; box-shadow: 0px 0px 0px transparent;" role="3"></textarea>
                                   <span class="font-weight-bold">CAUSE<span class="text-danger">*</span></span>
                              </label>
                              <div id='cause-error-message' class='text-danger text-sm'>
                              </div>
                         </div>


                         <div class="form-group form-group submit-section col-12">
                              <button id="saveBtn" class="btn btn-primarys submit-btn float-right" type="submit">
                                   <span id="loading" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="false"></span> <i class="fas fa-save"></i>
                                   <b id="saving">Save</b>
                              </button>
                              <button style="margin-right:10px;" type="button" onclick="myFunction()" id="cancelbutton1" class="text-white btn btn-danger submit-btn float-right"><i class="fas fa-ban"></i>
                                   Cancel</button>
                              {{-- onclick="reset()" --}}
                         </div>

                    </div>

                    <form>
          </div>
          <div id="table" class="page-header {{  count($errors->all()) == 0 ? '' : 'd-none' }}">
               <div class="row">
                    <div class="col-6 mb-2">
                         <select data-style="btn-primarys text-white selectpicker" class="form-control form-control-xs selectpicker  {{ $errors->has('employeeName')  ? 'is-invalid' : ''}}" name="employeeName" data-live-search="true" id="employeeName" data-size="5">
                              <option>Nothing Selected</option>
                              @foreach($plantillas as $plantilla)
                              <option data-plantilla="{{ $plantilla->employee }}" value="{{ $plantilla->employee_id }}">
                                   {{ $plantilla->employee->fullname }}
                              </option>
                              @endforeach
                         </select>
                    </div>
                    <div class="col-6 mb-2">
                         <div class="float-right">
                              <button class="btn btn-secondary text-white mr-3" id="printPreview" disabled="true" type="button">
                                   <i class="la la-print"></i>&nbsp; Download Service Record
                              </button>
                              <button id="addbutton" disabled type="button" class="btn btn-primarys float-right">
                                   <i class="fa fa-plus"></i> Add Service Records
                              </button>
                         </div>
                    </div>
               </div>

               <div class="table" style="overflow-x:auto;">
                    <table class="table table-bordered table-hover text-center" id="serviceRecords" style="width:100%;">
                         <thead>
                              <tr>
                                   <th class="font-weight-bold align-middle text-center" rowspan="2">Emp Id</th>
                                   <th class="font-weight-bold align-middle text-center" rowspan="1 " colspan="2">Service
                                        Records<br><small>(Inclusive dates)</small></th>
                                   <th class="font-weight-bold align-middle text-center" rowspan="1" colspan="3">Records of
                                        Appointment</th>
                                   <th class="font-weight-bold align-middle text-center" rowspan="1 " colspan="2"></th>
                                   <th class="font-weight-bold align-middle text-center" rowspan="1" colspan="2"></th>
                                   <th class="font-weight-bold align-middle text-center" rowspan="2">Option</th>

                              <tr>
                                   <td class="font-weight-bold align-middle text-center">From</td>
                                   <td class="font-weight-bold align-middle text-center">To</td>
                                   <td class="font-weight-bold align-middle text-center">Designation</td>
                                   <td class="font-weight-bold align-middle text-center">Status</td>
                                   <td class="font-weight-bold align-middle text-center">Salary</td>
                                   <td class="font-weight-bold align-middle text-center">Station/Place of Assignment</td>
                                   <td class="font-weight-bold align-middle text-center">Leave w/o Pay</td>
                                   <td class="font-weight-bold align-middle text-center">Separation Date</td>
                                   <td class="font-weight-bold align-middle text-center">Cause</td>
                              </tr>
                              </tr>
                         </thead>
                         <tbody>
                         </tbody>
                    </table>
               </div>
          </div>

     </div>
</div>
<div class="modal fade" id="downloadPDSModal" tabindex="-1" role="dialog" aria-labelledby="downloadPDSModalTitle" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="downloadPDSModalLongTitle">
                         <h4 class='font-weight-normal'>SELECT FILE FORMAT</h4>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>
               <div class="modal-body">
                    <div class="row">
                         <div class="col-lg-6 text-center hoverable" style="cursor:pointer;" id="downloadPdf">
                              <img src="{{ asset('assets/img/pdf.png') }}" class='w-50 img-fluid' alt="">
                              <br>
                              <h5 class='mt-2'>
                                   PDF FORMAT
                              </h5>
                         </div>
                         <div class="col-lg-6 text-center hoverable" style="cursor:pointer;" id="downloadExcel">
                              <img src="{{ asset('assets/img/xls.png') }}" class='w-50 img-fluid' alt="">
                              <br>
                              <h5 class='mt-2'>
                                   EXCEL FORMAT
                              </h5>
                         </div>
                    </div>
               </div>
               <div class="modal-footer">
                    <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
               </div>
          </div>
     </div>
</div>
@push('page-scripts')
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="{{ asset('/assets/js/service-record.js') }}"></script>
<script src="{{ asset('/assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
     $.ajaxSetup({
          headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
     });
     $(document).on("click", ".delete", function() {
          let $ele = $(this).parent().parent();
          let id = $(this).attr("value");
          let url = /service-records/;
          let dltUrl = url + id;
          swal({
                    title: "Are you sure you want to delete?"
                    , text: "Once deleted, you will not be able to recover this record!"
                    , icon: "warning"
                    , buttons: true
                    , dangerMode: true
               , })
               .then((willDelete) => {
                    if (willDelete) {
                         $.ajax({
                              url: dltUrl
                              , type: "DELETE"
                              , cache: false
                              , data: {
                                   _token: '{{ csrf_token() }}'
                              }
                              , success: function(dataResult) {
                                   var dataResult = JSON.parse(dataResult);
                                   if (dataResult.statusCode == 200) {
                                        $('#serviceRecords').DataTable().ajax.reload();
                                        swal("Successfully Deleted!", "", "success");
                                   }
                              }
                         });
                    } else {
                         swal("Cancelled", "", "error");
                    }
               });
     });

</script>
@endpush
@endsection
