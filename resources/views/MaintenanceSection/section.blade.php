@extends('layouts.app')
@section('title', 'Section')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('/assets/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link rel="stylesheet" href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
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

</style>
@endprepend
@section('content')
<div class="kanban-board card">
     <div class="card-body">
          <div id="add" class="page-header {{  count($errors->all())  !== 0 ?  '' : 'd-none' }}">
               <div style='padding-bottom:50px;'>
                    <button id="showListDivision" class="btn btn-primarys submit-btn float-right shadow"><i class="fa fa-list"></i> Division List</button>
               </div>
               <form action="" method="" id="maintenanceSectionForm">
                    @csrf
                    <div class="alert alert-secondary text-center font-weight-bold" role="alert">ADD NEW SECTION</div>
                    <div class="container">
                         <div class="row justify-content-center align-items-center">

                            <div class="form-group col-10 col-lg-7">
                                <label class="has-float-label officeCode mb-0">
                                     <select value="" class="form-control selectpicker  {{ $errors->has('officeCode')  ? 'is-invalid' : ''}}" name="officeCode" data-live-search="true" id="officeCode" data-size="4" data-width="100%" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                             <option></option>
                                              @foreach($office as $offices)
                                             <option {{ old('officeCode') == $offices->office_code ? 'selected' : '' }} value="{{ $offices->office_code }}">
                                                 {{ $offices->office_name }}
                                             </option>
                                             @endforeach
                                     </select>
                                     <span class="font-weight-bold">Office<span class="text-danger">*</span></span>
                                </label>
                                <div id='division-id-error-message' class='text-danger text-sm'>
                                </div>
                           </div>

                            <div class="form-group col-10 col-lg-7">
                                <label class="has-float-label divisionCode mb-0">
                                     <select value="" class="form-control selectpicker  {{ $errors->has('divisionCode')  ? 'is-invalid' : ''}}" name="divisionCode" data-live-search="true" id="divisionCode" data-size="4" data-width="100%" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                             <option></option>
                                              @foreach($division as $divisions)
                                             <option {{ old('divisionCode') == $divisions->division_id ? 'selected' : '' }} value="{{ $divisions->division_id }}">
                                                 {{ $divisions->division_name }}
                                             </option>
                                             @endforeach
                                     </select>
                                     <span class="font-weight-bold">Division<span class="text-danger">*</span></span>
                                </label>
                                <div id='division-id-error-message' class='text-danger text-sm'>
                                </div>
                           </div>

                              <div class="form-group col-12 col-md-6 col-lg-7">
                                   <label class="has-float-label mb-0">
                                        <input value="{{ old('sectionName') }}" class="form-control {{ $errors->has('sectionName')  ? 'is-invalid' : ''}}" name="sectionName" id="sectionName" type="text" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                        <span class="font-weight-bold">Section Name<span class="text-danger">*</span></span>
                                   </label>
                                   <div id='section-name-error-message' class='text-danger text-sm'>
                                   </div>
                              </div>



                              <div class="form-group form-group submit-section col-12">
                                   <button id="saveBtn" class="btn btn-primarys submit-btn float-right shadow" type="submit">
                                        <span id="loading" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="false"></span>
                                        <i class="fas fa-save"></i> Save
                                   </button>
                                   <button style="margin-right:10px;" type="button" id="cancelButton" onclick="myFunction()" class="text-white btn btn-danger submit-btn float-right shadow"><i class="fas fa-ban"></i> Cancel</button>
                              </div>
                         </div>
                    </div>
               </form>
          </div>

          <div id="table" class="page-header {{  count($errors->all()) == 0 ? '' : 'd-none' }}">
               <div class="row">
                    <div class="col-8 mb-2">
                        <select value="" data-style="btn-primarys text-white" class="form-control form-control-xs selectpicker {{ $errors->has('employeeOffice')  ? 'is-invalid' : ''}}" name="maintenanceSectionOffice" data-live-search="true" id="maintenanceSectionOffice" data-size="5">
                             <option value="">All</option>
                             @foreach($office as $offices)
                              <option {{ '0001' == $offices->office_code ? 'selected' : '' }} value="{{ $offices->office_code }}">{{ $offices->office_name }}</option>
                              @endforeach
                        </select>
                   </div>
                    <div class="col-4 float-right mb-2">
                         <button id="addButton" class="btn btn-primarys submit-btn float-right"><i class="fa fa-plus"></i>
                              Add
                              New Section</button>
                    </div>
               </div>

               <div class="table">
                    <table class="table table-bordered table-hover" id="maintenanceSection" style="width:100%;">
                         <thead>
                              <tr>
                                  <td scope="col" class="text-truncate">Id</td>
                                  <td scope="col" class="text-truncate">Description</td>
                                  <td scope="col" class="text-truncate">Division</td>
                                  <td scope="col" class="text-truncate">Office</td>
                                   <td scope="col" class="text-truncate">Action</td>
                              </tr>
                         </thead>
                    </table>
               </div>
               <div class="result">
               </div>
          </div>
     </div>
</div>
@push('page-scripts')
<script>
     $.ajaxSetup({
          headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
     });

     $(document).on("click", ".delete", function() {
          let $ele = $(this).parent().parent();
          let id = $(this).attr("value");
          swal({
               title: "Are you sure you want to delete?",
               text: "Once deleted, you will not be able to recover this record!",
               icon: "warning",
               buttons: true,
               dangerMode: true
          }).then((willDelete) => {
               if (willDelete) {
                    $.ajax({
                         url: `/maintenance-section/${id}`,
                         type: "DELETE",
                         cache: false,
                         data: {
                              _token: '{{ csrf_token() }}'
                         }
                         , success: function(dataResult) {
                              var dataResult = JSON.parse(dataResult);
                              if (dataResult.statusCode == 200) {
                                   $('#maintenanceSection').DataTable().ajax.reload();
                                   swal({
                                        title: '',
                                        text: 'Successfully Deleted',
                                        icon: 'success',
                                        buttons: false,
                                        timer: 5000
                                    });
                              }
                         }
                    });
               }
          });
     });

</script>
<script src="{{ asset('/assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="{{ asset('/assets/js/maintenance-section.js') }}"></script>
@endpush
@endsection
