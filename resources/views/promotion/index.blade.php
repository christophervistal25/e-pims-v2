@extends('layouts.app')
@section('title', 'Promotions')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('/assets/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<script src="https://use.fontawesome.com/78c056906b.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
      .btn-primarys {
            background-color: #FF9B44;
            color: white;
      }

      .btn-primarys:hover {
            background-color: #FF8544;
            color: white;
      }

</style>
@endprepend
@section('content')
<div class="clearfix"></div>
<div class="row">
      <div class="col-5 mb-2">
            <select value="" data-style="btn-primarys text-white" class="form-control form-control-xs selectpicker {{ $errors->has('employeeOffice')  ? 'is-invalid' : ''}}" name="employeeOffice" data-live-search="true" id="employeeOffice" data-size="5">
                  <option value="*">All</option>
                  @foreach($offices as $office)
                  <option value="{{ $office->office_code }}">{{ $office->office_name }}</option>
                  @endforeach
            </select>
      </div>

      <div class="col-2 mb-2">
            <select data-style="btn-primarys text-white" class="form-control form-control-xs selectpicker" name="currentYear" data-live-search="true" id="currentYear" data-size="5">
                  <option value="*">All</option>
                  @foreach(range($minYear, $maxYear) as $year)
                  <option value="{{ $year }}">{{ $year }}</option>
                  @endforeach
            </select>
      </div>

      <div class="col-5 float-right mb-10">
            <a href="{{ route('promotion.create') }}" class="btn btn-primarys submit-btn float-right">
                  <i class="fas fa-plus-circle"></i>
                  New Promotion
            </a>
      </div>
</div>
<div class="card rounded-0">
      <div class="card-body">
            <table class='table table-bordered table-hover'>
                  <thead>
                        <tr>
                              <th>PROMOTION DATE</th>
                              <th>EMPLOYEE</th>
                              <th>OLD POSITION</th>
                              <th>SALARY GRADE</th>
                              <th>STEP</th>
                              <th>SALARY GRADE YEAR</th>
                              <th>NEW POSITION</th>
                              <th>ACTIONS</th>
                        </tr>
                  </thead>
            </table>
      </div>
</div>
@push('page-scripts')
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="{{ asset('/assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/js/dataTables.bootstrap4.min.js') }}"></script>
@endpush
@endsection
