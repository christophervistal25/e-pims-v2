@extends('layouts.app')
@section('title', 'Salary Grade')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('/assets/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
<link rel="stylesheet" href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.1.0/css/fixedColumns.dataTables.min.css" />
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
<div class="content">
     <div id="message" class="page-header {{  count($errors->all())  !== 0 ?  'd-none' : '' }}">
          @include('SalaryGrade.add-ons.success')
     </div>
     <div class="kanban-board card shadow-none">
          <div class="card-body">

               <div id="add" class="page-header {{  count($errors->all())  !== 0 ?  '' : 'd-none' }}">
                    <div style='padding-bottom:50px;margin-right:9px;' >
                         <button id="showList" class="btn btn-primarys submit-btn float-right shadow"><i class="fa fa-list"></i>
                              Salary Grade List
                         </button>
                    </div>
                    <div class="alert alert-secondary text-center font-weight-bold" role="alert">ADD NEW SALARY GRADE
                    </div>
                    <form action="" method="POST" id="salaryGradeForm">
                         @csrf

                         <div class="form-group col-12 col-lg-4">
                              <label class="has-float-label sgNo mb-0">
                                   <select value="" class="form-control selectpicker  {{ $errors->has('sgNo')  ? 'is-invalid' : ''}}" name="sgNo" data-live-search="true" id="sgNo" data-size="4" data-width="100%" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                        <option></option>
                                        @foreach (range(1, 33) as $salarygrade)
                                        <option {{ old('sgNo') == $salarygrade ? 'selected' : '' }} value="{{ $salarygrade }}">
                                             {{ $salarygrade }}</option>
                                        @endforeach
                                   </select>
                                   <span class="font-weight-bold">SALARY GRADE<span class="text-danger">*</span></span>
                              </label>
                              <div id='salary-grade-error-message' class='text-danger text-sm'>
                              </div>
                         </div>

                         <div class="row">
                              <div class="col-12 col-md-4">
                                   <div class="form-group input-group col-12 mb-0 mt-2">
                                        <span class="input-group-text">&#8369;</span>
                                        <label class="has-float-label" for="sgStep1">
                                             <input class="form-control text-right" value="{{ old('sgStep1') }}" id="sgStep1" name="sgStep1" type="text" maxlength="12" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                             <span class="font-weight-bold">Step 1 <span class="text-danger">*</span></span>
                                        </label>
                                   </div>
                                   <div id='salary-grade1-error-message' class='text-danger text-sm text-center'>
                                   </div>
                              </div>


                              <div class="col-12 col-md-4">
                                   <div class="form-group input-group col-12 mb-0 mt-2">
                                        <span class="input-group-text">&#8369;</span>
                                        <label class="has-float-label" for="sgStep2">
                                             <input class="form-control text-right" value="{{ old('sgStep2') }}" id="sgStep2" name="sgStep2" type="text" maxlength="12" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                             <span class="font-weight-bold">Step 2 <span class="text-danger">*</span></span>
                                        </label>
                                   </div>
                                   <div id='salary-grade2-error-message' class='text-danger text-sm text-center'>
                                   </div>
                              </div>

                              <div class="col-12 col-md-4">
                                   <div class="form-group input-group col-12 mb-0 mt-2">
                                        <span class="input-group-text">&#8369;</span>
                                        <label class="has-float-label" for="sgStep3">
                                             <input class="form-control text-right" value="{{ old('sgStep3') }}" id="sgStep3" name="sgStep3" type="text" maxlength="12" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                             <span class="font-weight-bold">Step 3 <span class="text-danger">*</span></span>
                                        </label>
                                   </div>
                                   <div id='salary-grade3-error-message' class='text-danger text-sm text-center'>
                                   </div>
                              </div>

                              <div class="col-12 col-md-4">
                                   <div class="form-group input-group col-12 mb-0 mt-3">
                                        <span class="input-group-text">&#8369;</span>
                                        <label class="has-float-label" for="sgStep4">
                                             <input style="outline: none; box-shadow: 0px 0px 0px transparent;" class="form-control text-right {{ $errors->has('sgStep4')  ? 'is-invalid' : ''}}" value="{{ old('sgStep4') }}" id="sgStep4" name="sgStep4" type="text" maxlength="12">
                                             <span class="font-weight-bold">Step 4 <span class="text-danger">*</span></span>
                                        </label>
                                   </div>
                                   <div id='salary-grade4-error-message' class='text-danger text-center text-sm'>
                                   </div>
                              </div>

                              <div class="col-12 col-md-4">
                                   <div class="form-group input-group col-12 mb-0 mt-3">
                                        <span class="input-group-text">&#8369;</span>
                                        <label class="has-float-label" for="sgStep5">
                                             <input class="form-control text-right" value="{{ old('sgStep5') }}" id="sgStep5" name="sgStep5" type="text" maxlength="12" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                             <span class="font-weight-bold">Step 5 <span class="text-danger">*</span></span>
                                        </label>
                                   </div>
                                   <div id='salary-grade5-error-message' class='text-danger text-center text-sm'>
                                   </div>
                              </div>

                              <div class="col-12 col-md-4">
                                   <div class="form-group input-group col-12 mb-0 mt-3">
                                        <span class="input-group-text">&#8369;</span>
                                        <label class="has-float-label" for="sgStep6">
                                             <input class="form-control text-right" value="{{ old('sgStep6') }}" id="sgStep6" name="sgStep6" style="outline: none; box-shadow: 0px 0px 0px transparent;" type="text" maxlength="12">
                                             <span class="font-weight-bold">Step 6 <span class="text-danger">*</span></span>
                                        </label>
                                   </div>
                                   <div id='salary-grade6-error-message' class='text-danger text-center text-sm'>
                                   </div>
                              </div>

                              <div class="col-12 col-md-4">
                                   <div class="form-group input-group col-12 mb-0 mt-3">
                                        <span class="input-group-text">&#8369;</span>
                                        <label class="has-float-label" for="sgStep7">
                                             <input class="form-control text-right" value="{{ old('sgStep7') }}" id="sgStep7" style="outline: none; box-shadow: 0px 0px 0px transparent;" name="sgStep7" type="text" maxlength="12">
                                             <span class="font-weight-bold">Step 7 <span class="text-danger">*</span></span>
                                        </label>
                                   </div>
                                   <div id='salary-grade7-error-message' class='text-danger text-sm text-center'>
                                   </div>
                              </div>

                              <div class="col-12 col-md-4">
                                   <div class="form-group input-group col-12 mb-0 mt-3">
                                        <span class="input-group-text">&#8369;</span>
                                        <label class="has-float-label">
                                             <span class="font-weight-bold">Step 8 <span class="text-danger">*</span></span>
                                             <input class="form-control text-right" value="{{ old('sgStep8') }}" id="sgStep8" style="outline: none; box-shadow: 0px 0px 0px transparent;" name="sgStep8" type="text" maxlength="12">
                                        </label>
                                   </div>
                                   <div id='salary-grade8-error-message' class='text-danger text-sm text-center'>
                                   </div>
                              </div>
                         </div>

                         <div class="form-group col-12 col-lg-4 mt-4">
                              <label class="has-float-label sgYear mb-0">
                                   <select value="" class="form-control selectpicker  {{ $errors->has('sgYear')  ? 'is-invalid' : ''}}" name="sgYear" data-live-search="true" id="sgYear" data-size="4" data-width="100%" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                        <option></option>
                                        {{ $year2 = date("Y",strtotime("-1 year")) }}
                                        <option {{ old('sgYear') == $year2 ? 'selected' : '' }} value={{ $year2 }}>{{ $year2 }}
                                        </option>
                                        {{ $year3 = date("Y",strtotime("-0 year")) }}
                                        <option {{ old('sgYear') == $year3 ? 'selected' : '' }} value={{ $year3 }}>{{ $year3 }}
                                        </option>
                                        @foreach (range(1, 5) as $year)
                                        {{ $year1 = date("Y",strtotime("$year year")) }}
                                        <option {{ old('sgYear') == $year1 ? 'selected' : '' }} value={{ $year1 }}>{{ $year1 }}
                                        </option>
                                        @endforeach
                                   </select>
                                   <span class="font-weight-bold">SALARY YEAR<span class="text-danger">*</span></span>
                              </label>
                              <div id='salary-grade-year-error-message' class='text-danger text-sm'>
                              </div>
                         </div>

                         <div class="form-group submit-section col-12">
                              <button id="saveBtn" class="btn btn-primarys submit-btn float-right shadow" type="submit"><span id="loading" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="false"></span> <i class="fas fa-save"></i>
                                   <b id="saving">Save</b>
                              </button>
                              <button style="margin-right:10px;" type="button" id="cancelButton" class="btn text-white btn-danger submit-btn float-right shadow"><i class="fas fa-ban"></i> Cancel
                              </button>
                         </div>

                    </form>
               </div>
               <div id="table" class="page-header {{  count($errors->all()) == 0 ? '' : 'd-none' }}">
                    <div style="padding-bottom:10px;" class="row align-items-right">
                         <div class="col">
                              <div class="row">
                                   <div class="col-5">

                                    <select value="" data-style="btn-primarys text-white" id="filter_year" onchange="filter_year();" class="form-control form-control-xs selectpicker {{ $errors->has('employeeOffice')  ? 'is-invalid' : ''}}"
                                        name="employeeOffice" data-live-search="true" id="employeeOffice" data-size="5">
                                        @foreach (range(5, 1) as $year)
                                        {{ $year1 = date("Y",strtotime("+$year year")) }}
                                        <option value={{ $year1 }}>{{ $year1 }}</option>
                                        @endforeach
                                        {{ $date = date("Y") }}
                                        <option selected value={{ $date }}>{{ $date }}</option>
                                        @foreach (range(1, 6) as $year)
                                        {{ $year2 = date("Y",strtotime("-$year year")) }}
                                        <option value={{ $year2 }}>{{ $year2 }}</option>
                                        @endforeach
                                        </select>
                                   </div>
                              </div>
                         </div>
                         <div class="col-auto float-right ml-auto">
                              <button id="addButton" class="btn btn-primarys submit-btn float-right mx-2"><i class="fa fa-plus"></i>
                                   Add Salary Grade
                              </button>
                              <button id="btnPrintSalaryGrade" class="btn btn-info submit-btn float-right"><i class="fa fa-print"></i>
                                   Print Salary Grade
                              </button>
                         </div>
                    </div>
                    <div class="table">
                         <table width="100%" cellspacing="0" class="table table-bordered table-hover text-center" id="salaryGradeTable">
                              <thead>
                                   <tr>
                                        <td style="width:3%;" class="text-center">
                                             Salary Grade
                                        </td>
                                        <td scope="col" class="text-center">Step 1</td>
                                        <td scope="col" class="text-center">Step 2</td>
                                        <td scope="col" class="text-center">Step 3</td>
                                        <td scope="col" class="text-center">Step 4</td>
                                        <td scope="col" class="text-center">Step 5</td>
                                        <td scope="col" class="text-center">Step 6</td>
                                        <td scope="col" class="text-center">Step 7</td>
                                        <td scope="col" class="text-center">Step 8</td>
                                        <td scope="col" class="text-center">Base Year</td>
                                        <td scope="col" class="text-center">Action</td>
                                   </tr>
                              </thead>
                         </table>
                    </div>
               </div>
          </div>
     </div>
</div>

@push('page-scripts')
<script src="{{ asset('/assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="{{ asset('/assets/js/dataTables.bootstrap4.min.js') }}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script> --}}
<script src="https://cdn.datatables.net/fixedcolumns/4.1.0/js/dataTables.fixedColumns.min.js"></script>
<script src="{{ asset('/assets/js/salary-grade.js') }}"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/sorting/currency.js"></script>
<script>
     $('#btnPrintSalaryGrade').click(function() {
          let selectedCurrentYear = $('#filter_year').val();
          window.open(`prints/salary-grade/${selectedCurrentYear}`);
     });

</script>
@endpush
@endsection
