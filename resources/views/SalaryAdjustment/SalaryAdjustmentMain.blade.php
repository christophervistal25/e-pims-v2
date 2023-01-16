@extends('layouts.app')
@section('title', 'Salary Adjustment')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('/assets/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/css/bootstrap-float-label.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@prepend('page-css')
<script src="{{ asset('/js/app.js') }}" defer></script>
@endprepend
<style>
     .swal-content ul {
          list-style-type: none;
          padding: 0;
     }

     #line {
          border-bottom: 2px solid #DEE2E6;
          padding-bottom: 15px;
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
<div class="kanban-board card mb-0">

     <div id="table" class="page-header ">
          <div class="row pt-3">
               <div style="padding-left:35px;" class="col-5 mb-2">
                    <select data-style="btn-primarys text-white selectpicker" name="office" data-live-search="true" id="office" data-size="5"
                         @class([
                              'form-control',
                              'form-control-xs',
                              'selectpicker',
                              'is-invalid'=> $errors->has('office'),
                         ])>
                         <option value="*">All</option>
                         @foreach($plantillaOffices as $plantilla)
                              <option data-plantilla="{{ $plantilla->office->office_name }}" value="{{ $plantilla->office->office_code }}">{{ $plantilla->office->office_name }}</option>
                         @endforeach
                    </select>
               </div>
               <div class="col-2 mb-2">
                    <input style="font-weight:bold;" id="year" type="text" class="form-control text-center" value="{{ \Carbon\Carbon::now()->year }}" readonly>
               </div>

               <div class="col-5 mb-2">
                    <div style="padding-right:20px;" class="float-right">
                        <button id="addButton" class="btn btn-primarys float-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-refresh"></i> Adjust Salary</button>
                    </div>
                </div>

          </div>

          <div style="padding-left:20px; padding-right:20px;" class="table" style="overflow-x:auto;">
               <table class="table table-bordered table-hover text-center" id="salaryAdjustment" style="width:100%;">
                    <thead>
                         <tr>
                              <td scope="col" class="text-center">Employee Name</td>
                              <td scope="col" class="text-center">Office</td>
                              <td scope="col" class="text-center">Position</td>
                              <td scope="col" class="text-center">Salary Grade</td>
                              <td scope="col" class="text-center">Step Number</td>
                              <td scope="col" class="text-center">Previous Salary </td>
                              <td scope="col" class="text-center">New Salary </td>
                              <td scope="col" class="text-center">Salary Difference</td>
                         </tr>
                    </thead>
               </table>
          </div>
     </div>



     {{-- modal --}}
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Adjust Salary</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    <div class="col-12 col-md-12 col-lg-12 mt-2">
                         <input class="form-control" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" name="dateAdjustment" id="dateAdjustment" type="date">
                    </div>

                    <div class="form-group col-12 col-md-12 col-lg-12 mt-2">
                         <label class="has-float-label mb-0">
                              <input value="{{ old('remarks') }}" class="form-control {{ $errors->has('remarks')  ? 'is-invalid' : ''}}" name="remarks" id="remarks" type="text" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                              <span class="font-weight-bold">REMARKS</span>
                         </label>
                    </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
              <button type="button" id="adjustSalaryBtn" class="btn btn-primary text-white">Adjust</button>
            </div>
          </div>
        </div>
      </div>

</div>
</div>
@push('page-scripts')
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="{{ asset('/assets/js/salary-adjustment-main.js') }}"></script>
<script src="{{ asset('/assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
     $.ajaxSetup({
          headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
     });
     $(document).on("click", ".delete", function() {

        });

</script>
@endpush
@endsection
