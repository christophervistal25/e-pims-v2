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
                              <th class='font-weight-bold'>OLD POSITION</th>
                              <th>NEW POSITION</th>
                              <th>SALARY GRADE</th>
                              <th>STEP</th>
                              <th>SALARY GRADE YEAR</th>
                              <th class='font-weight-bold'>ACTIONS</th>
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
            { data: "promotion_date", name: "promotion_date", className : 'text-center align-middle font-weight-bold' },
            { data: "employee", name: "employee", className : 'align-middle font-weight-bold' },
            { data: "old_plantilla_position", name: "old_plantilla_position", className : 'align-middle' },
            { data: "new_plantilla_position", name: "new_plantilla_position", className : 'align-middle font-weight-bold' },
            { data: "sg_no", name: "sg_no", className : 'text-center align-middle font-weight-bold' },
            { data: "step_no", name: "step_no", className : 'text-center align-middle font-weight-bold' },
            { data: "sg_year", name: "sg_year", className : 'text-center align-middle font-weight-bold' },
            { 
                  data: "promotion_id",
                  name: "promotion_id",
                  className : 'text-center',
                  render : function (id, _, _, _) {
                        return `
                              <a class='btn btn-success shadow mr-2' href="/promotion/${id}/edit">
                                    <i class="las la-user-edit"></i>
                              </a>

                              <button class='btn btn-danger shadow btn-delete-promotion' data-promotion-id="${id}">
                                    <i class="las la-trash" style="pointer-events:none;"></i>
                              </button>
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
