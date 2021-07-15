@extends('layouts.app')
@section('title', 'PLANTILLA SCHEDULE')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('/assets/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@prepend('page-css')
<script src="{{ asset('/js/app.js') }}" defer></script>
@endprepend
<style>
    .swal-content ul{
    list-style-type: none;
    padding: 0;
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
    .btn-primarys{
        background-color:#FF9B44;
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
.page-item.active .page-link:hover{
    background-color: #FF8544 !important;
    border: 1px solid #FF8544;
}
#line {
        border-bottom: 1px solid black;
        padding-bottom:15px;
    }
</style>
@endprepend
@section('content')
<div class="kanban-board card mb-0">
    <div class="card-body">
        <div id="add" class="page-header  {{  count($errors->all())  !== 0 ?  '' : 'd-none' }}">
                <div style='padding-top:20px; padding-bottom:50px;margin-right:-15px;' class="col-auto ml-auto">
                    <button id="cancelbutton" class="btn submit-btn btn-primarys float-right"><i class="fa fa-list"></i> Plantilla Schedule List</button>
                </div>
                    <div class="row">

                        <div class="col-12 mb-2">
                            <div class="alert alert-secondary text-center font-weight-bold" role="alert">CREATE PLANTILLA SCHEDULE
                            </div>
                        </div>

                        <div class="form-group col-4 mb-2">
                            <select value="" data-style="btn-primarys text-white" class="form-control form-control-xs selectpicker {{ $errors->has('officePlantillaList')  ? 'is-invalid' : ''}}"
                                name="officePlantillaList" data-live-search="true" id="officePlantillaList" data-size="5">
                                <option value="">All</option>
                                @foreach($office as $offices)
                                <option data-plantilla="{{ $offices->office_name }}" value="{{ $offices->office_code }}">{{ $offices->office_name }}</option>
                                @endforeach
                                </select>
                    </div>

                    <div class="form-group col-4">
                        <label class="has-float-label mb-0">
                        <input value="{{ Carbon\Carbon::now()->format('Y') }}"
                            class="form-control {{ $errors->has('year')  ? 'is-invalid' : ''}}" name="year"
                            id="year" type="text" placeholder="" style="outline: none; box-shadow: 0px 0px 0px transparent;" readonly>
                            <span class="font-weight-bold">CURRENT YEAR<span class="text-danger">*</span></span>
                        </label>
                        <div id='item-error-message' class='text-danger text-sm'>
                        </div>
                    </div>




                    <div class="form-group col-4">
                    <button id="saveBtn" class="btn btn-danger submit-btn float-right" type="submit" onclick="LockDepot()">
                        <span id="loading" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="false"></span>
                        Post
                    </button>
                </div>

                        <div class="col-12">
                        <form id="frm-example" action="" method="" id="">
                        @csrf
                        <table class="table table-bordered text-center" id="plantillaList" style="width:100%;">
                            <thead>
                                <tr>
                                    <td scope="col" class="text-center">Employee Name</td>
                                    <td scope="col" class="text-center">Position Title</td>
                                    <td scope="col" class="text-center">Office</td>
                                    <td scope="col" class="text-center">Item No</td>
                                    <td scope="col" class="text-center">Status</td>
                                    <td scope="col" class="text-center">Year</td>
                                    <td scope="col" class="text-center">Action</td>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        </form>
                    </div>
                </div>
        </div>
    </div>
        <div id="table" class="page-header ">
            <div class="row">
                <div style="padding-left:35px;" class="col-4 mb-2">
                    <select value="" data-style="btn-primarys text-white" class="form-control form-control-xs selectpicker {{ $errors->has('officeCode')  ? 'is-invalid' : ''}}"
                        name="officeCode" data-live-search="true" id="officeCode" data-size="5" >
                        <option value="All">All</option>
                        @foreach($office as $offices)
                        <option data-plantilla="{{ $offices->office_name }}" value="{{ $offices->office_code }}">{{ $offices->office_name }}</option>
                        @endforeach
                        </select>
            </div>
            <div class="col-2 mb-2">
                <select value="" data-style="btn-primarys text-white" class="form-control form-control-xs selectpicker {{ $errors->has('yearFilter')  ? 'is-invalid' : ''}}"
                    name="yearFilter" data-live-search="true" id="yearFilter" data-size="5">
                    <option value="All">All</option>
                    @foreach($PlantillaOfScheduleYear as $PlantillaOfScheduleYears)
                    <option data-plantilla="{{ $PlantillaOfScheduleYears->year }}" value="{{ $PlantillaOfScheduleYears->year }}">{{ $PlantillaOfScheduleYears->year }}</option>
                    @endforeach
                    </select>
        </div>
            <div class="col-6 mb-2">
                    <div style="padding-right:20px;" class="float-right">
                        <button id="addbutton" class="btn btn-primarys float-right" ><i class="fa fa-plus"></i> Create Plantilla Schedule</button>
                    </div>
                </div>
            </div>
            <div style="padding-left:20px; padding-right:20px;" class="table" style="overflow-x:auto;">
                <table class="table table-bordered text-center" id="plantillaOfSchedule" style="width:100%;">
                    <thead>
                        <tr>
                            <td scope="col" class="text-center">Employee Name</td>
                            <td scope="col" class="text-center">Position Title</td>
                            <td scope="col" class="text-center">Office</td>
                            <td scope="col" class="text-center">Item No</td>
                            <td scope="col" class="text-center">Status</td>
                            <td scope="col" class="text-center">Year</td>
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
<script src="{{ asset('/assets/js/plantilla-of-schedule.js') }}"></script>
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
        let id= $(this).attr("value");;
        let url = /salary-adjustment-per-office/;
        let dltUrl = url + id;
            swal({
                title: "Are you sure you want to delete?",
                text: "Once deleted, you will not be able to recover this record!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: dltUrl,
                    type: "DELETE",
                    cache: false,
                    data:{
                        _token:'{{ csrf_token() }}'
			},
			success: function(dataResult){
				var dataResult = JSON.parse(dataResult);
				if(dataResult.statusCode==200){
                    $('#salaryAdjustmentPerOffice').DataTable().ajax.reload();
                    $('#salaryAdjustmentPerOfficeList').DataTable().ajax.reload();
                    swal("Successfully Deleted!", "", "success");
				}
			}
		});
            } else {
                swal("Cancel!", "", "error");
            }
            });
	});
</script>
@endpush
@endsection
