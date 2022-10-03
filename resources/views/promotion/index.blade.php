@extends('layouts.app')
@section('title', 'Promotions')
@prepend('page-css')
{{-- <script src="https://use.fontawesome.com/78c056906b.js"></script> --}}
<link rel="stylesheet" href="/assets/css/style.css" />
<link rel="stylesheet" href="{{ asset('/assets/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<script src="{{ asset("js/sweetalert.min.js") }}"></script>
<script src="{{ asset("js/78c056906b.js") }}"></script>
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
                  <option selected value="*">All</option>
                  @foreach(range(date('Y') - 5, date('Y') + 1) as $year)
                    <option value="{{ $year }}">{{ $year }}</option>
                  @endforeach
            </select>
      </div>

      <div class="col-5 float-right mb-10">
            <a href="{{ route('promotion.create') }}" class="btn btn-primarys float-right">
                  <i class="fas fa-plus-circle"></i>
                  New Promotion
            </a>
      </div>
</div>
<div class="card rounded-0 shadow-none border-0">
      <div class="card-body">
            <table class='table table-bordered table-hover' id="promotionTable">
                  <thead>
                        <tr class="bg-light font-weight-medium">
                              <th>Promotion Date</th>
                              <th>Employee</th>
                              <th>Office</th>
                              <th>Old Position</th>
                              <th>New Position</th>
                              <th>SG / Step</th>
                              <th>Salary Grade Year</th>
                              <th>Actions</th>
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
            { data: "promotion_date", name: "promotion_date", className : 'text-center align-middle' },
            { data: "employee", name: "employee", className : 'align-middle' },
            { data: "office", name: "office", className : 'align-middle' },
            { data: "old_plantilla_position", name: "old_plantilla_position", className : 'align-middle' },
            { data: "new_plantilla_position", name: "new_plantilla_position", className : 'align-middle' },
            {
                className : 'text-center align-middle',
                data: "sg_no",
                name: "sg_no",
                render : function(_,_, row) {
                    return `<span class="text-center">${row.sg_no} / ${row.step_no}</span>`;
                }
            },
            { data: "sg_year", name: "sg_year", className : 'text-center align-middle' },
            {
                  data: "promotion_id",
                  name: "promotion_id",
                  className : 'text-center',
                  render : function (id, _, data, _) {
                        return `
                              <a class='btn btn-info mr-2' href="/promotion/${data.promotion_id}">
                                    <i class="las la-id-card la-lg"></i>
                              </a>
                        `;
                  }
            },
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
    let input = document.createElement('input');
    $(input).addClass('swal-content__input').attr('type', 'password');


    let authenticationGuard = () => swal("Please enter your password: ", { content: input });

    $(document).on('click', '.btn-delete-promotion', function () {
            let id = $(this).attr('data-promotion-id');
            swal({
                  title : '',
                  text : 'Are you sure you want to delete?',
                  icon : 'warning',
                  dangerMode : true,
                  buttons : ["No", "Yes"],
                  timer : 5000,
            }).then((confirmed) => {
                  if(confirmed) {
                        $.ajax({
                              url : `/promotion/${id}/delete`,
                              method : 'DELETE',
                              success : function (response) {
                                    if(response.success) {
                                          table.ajax.reload();

                                          swal({
                                                title : '',
                                                text : 'You successfully remove a promotion',
                                                icon : 'success',
                                                buttons : false,
                                                timer : 5000,
                                          });
                                    }
                              }
                        });
                  }
            });
    });
</script>
@endpush
@endsection
