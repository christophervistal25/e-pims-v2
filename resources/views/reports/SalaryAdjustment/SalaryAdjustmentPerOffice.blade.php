@extends('layouts.app')
@section('title', 'Salary Adjustment Repots')
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
          <div class="row">
               <div class="col-5 mb-2 mt-2">
                    <select data-style="btn-primarys text-white selectpicker" name="employeeOffice" data-live-search="true" id="employeeOffice" data-size="5"
                         @class([
                              'form-control',
                              'ml-3',
                              'form-control-xs',
                              'selectpicker',
                              'is-invalid'=> $errors->has('employeeOffice'),
                         ])>
                         <option></option>
                         <option value="*">All</option>
                         @foreach($plantillaOffices as $plantilla)
                              <option data-plantilla="{{ $plantilla->office->office_name }}" value="{{ $plantilla->office->office_code }}">{{ $plantilla->office->office_name }}</option>
                         @endforeach
                    </select>
               </div>
               <div class="col-2 mb-2 mt-2">
                    <select value="" data-style="btn-primarys text-white" class="ml-3 form-control form-control-xs selectpicker yearAdjustment" name="yearAdjustment" data-live-search="true" id="yearAdjustment" data-size="5">
                         <option value={{ date('Y') }}>{{ date('Y') }}</option>
                         @foreach ($dates as $date)
                         <option value={{ $date }}>{{ $date }}</option>
                         @endforeach
                    </select>
               </div>

               <div class="col-5 mb-2 mt-2">
                    <div style="padding-right:20px;" class="float-right">
                         <button id="printListButton" class="printButton btn btn-primary float-right" disabled><i class="fa fa-print"></i> Reports By List</button>
                    </div>
                    <div style="padding-right:20px;" class="float-right">
                         <button id="printIndividualButton" class="printButton btn btn-primary float-right" disabled><i class="fa fa-print"></i> Reports By Individual</button>
                    </div>
               </div>
          </div>
          <div style="padding-left:20px; padding-right:20px;" class="table" style="overflow-x:auto;">
               <table class="table table-bordered table-hover text-center" id="salaryAdjustmentPerOffice" style="width:100%;">
                    <thead>
                         <tr>
                              <td scope="col" class="text-center">Adjustment Date</td>
                              <td scope="col" class="text-center d-none">Office</td>
                              <td scope="col" class="text-center">Employee Name</td>
                              <td scope="col" class="text-center">Salary Grade</td>
                              <td scope="col" class="text-center">Step Number</td>
                              <td scope="col" class="text-center">Previous Salary</td>
                              <td scope="col" class="text-center">New Salary</td>
                              <td scope="col" class="text-center">Salary Difference</td>
                              <td scope="col" class="text-center">Action</td>
                         </tr>
                    </thead>
               </table>
          </div>
     </div>

</div>
</div>
@push('page-scripts')
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="{{ asset('/assets/js/salary-adjustment-per-office-report.js') }}"></script>
<script src="{{ asset('/assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
</script>
@endpush
@endsection
