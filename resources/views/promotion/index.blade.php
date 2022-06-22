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
            <select data-style="btn-primarys text-white" class="form-control form-control-xs selectpicker" name="office" data-live-search="true" id="office" data-size="5">
                  <option value="*">All</option>
                  @foreach($offices as $office)
                  <option value="{{ $office->office_code }}">{{ $office->office_name }}</option>
                  @endforeach
            </select>
      </div>

      <div class="col-2 mb-2">
            <select data-style="btn-primarys text-white" class="form-control form-control-xs selectpicker" name="currentYear" data-live-search="true" id="year" data-size="5">
                  <option value="*">All</option>
                  @foreach($rangeYear as $year)
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
            <table class='table table-bordered table-hover' id="promotionTable">
                  <thead>
                        <tr>
                              <th>PROMOTION DATE</th>
                               <th>EMPLOYEE</th>
                              <th>OLD POSITION</th>
                              <th>NEW POSITION</th>
                              <th>SALARY GRADE</th>
                              <th>STEP</th>
                              <th>SALARY GRADE YEAR</th>
                              {{--<th>ACTIONS</th> --}}
                        </tr>
                  </thead>
            </table>
      </div>
</div>
@push('page-scripts')
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="{{ asset('/assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
      let table = $("#promotionTable").DataTable({
        processing: true,
        destroy: true,
        retrieve: true,
        pagingType: "full_numbers",
        language: {
            processing:
                '<i style="color:#FF9B44" i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> ',
        },
        ajax: `/promotion/list/*/*`,
        columns: [
            { data: "promotion_date", name: "promotion_date", className : 'text-center' },
            { data: "employee", name: "employee" },
            { data: "old_plantilla_position", name: "old_plantilla_position" },
            { data: "new_plantilla_position", name: "new_plantilla_position" },
            { data: "sg_no", name: "sg_no", className : 'text-center' },
            { data: "step_no", name: "step_no", className : 'text-center' },
            { data: "sg_year", name: "sg_year", className : 'text-center' },
        ],
    });

    $('#office').change(function () {
            let selectedOffice = $(this).val();
            let selectedYear = $('#year').val();
            table.ajax.url(`/promotion/list/${selectedOffice}/${selectedYear}`).load();
    });

    $('#year').change(function () {
            let selectedOffice = $('#office').val();
            let selectedYear = $(this).val();
            table.ajax.url(`/promotion/list/${selectedOffice}/${selectedYear}`).load();
    });
</script>
@endpush
@endsection
