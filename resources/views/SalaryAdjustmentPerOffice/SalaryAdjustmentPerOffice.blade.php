@extends('layouts.app')
@section('title', 'Salary Adjustment Per Office')
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
#line {
        border-bottom: 2px solid #DEE2E6;
        padding-bottom:15px;
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
</style>
@endprepend
@section('content')
<div class="kanban-board card mb-0">
    <div class="card-body">
        <div id="add" class="page-header  {{  count($errors->all())  !== 0 ?  '' : 'd-none' }}">

            <div style='padding-top:20px; padding-bottom:50px;margin-right:-15px;' class="col-auto ml-auto">
                <button id="cancelButton" class="btn submit-btn btn-primarys float-right"><i class="fa fa-list"></i> Salary Adjustment List</button>
            </div>
            <div class="row">
            <div class="col-12">
                <div class="alert alert-secondary text-center font-weight-bold" role="alert" >
                        <div class="row">
                            <div class="col-12 col-md-12">
                            <p class="float-center" id="officeAdjustment"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
            <form id="frm-example" action="" method="" id="salaryAdjustmentPerOfficeNotSelected">
            @csrf
            <table class="table table-bordered table-hover text-center" id="salaryAdjustmentPerOfficeList" style="width:100%;">
                <thead>
                <tr>
                    <td style="margin-top:10px;" scope="col" class="text-center font-weight-bold"><input style='transform:scale(1.3); margin-top:18px;' name="selectAll" value="selectAll" id="selectAll" type="checkbox" /></td>
                    <td scope="col" class="text-center">Employee Name</td>
                    <td scope="col" class="text-center d-none">Office Code</td>
                    <td scope="col" class="text-center">Position</td>
                    <td scope="col" class="text-center">Salary Grade</td>
                    <td scope="col" class="text-center">Step Number</td>
                    <td scope="col" class="text-center">Current Salary</td>
                </tr>
                </thead>
            </table>
            </form>

            <div class="row">
            <div class="col-12 col-md-6 col-lg-6 mt-2">
                <input type="text" id="year" class="form-control d-none" value="{{ Carbon\Carbon::now()->year }}" name="year" readonly>
                <input class="form-control" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" name="dateAdjustment" id="dateAdjustment" type="date">
            </div>

            <div class="form-group col-12 col-md-6 col-lg-6 mt-2">
                <label class="has-float-label mb-0">
                <input value="{{ old('remarks') }}"
                    class="form-control {{ $errors->has('remarks')  ? 'is-invalid' : ''}}"
                    name="remarks" id="remarks" type="text" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                    <span class="font-weight-bold">REMARKS</span>
                </label>
            </div>
        </div>

            <button style="margin-top:10px;" id="saveBtn" class="btn btn-primarys submit-btn float-right" type="submit">
                <span id="loading" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="false"></span>
                <b id="saving">Submit</b>
            </button>


        </div>
        </div>
        </div>
        </div>

        <div id="table" class="page-header ">
            <div class="row">
                <div style="padding-left:35px;" class="col-5 mb-2">
                    <select value="" data-style="btn-primarys text-white" class="form-control form-control-xs selectpicker {{ $errors->has('employeeOffice')  ? 'is-invalid' : ''}}"
                        name="employeeOffice" data-live-search="true" id="employeeOffice" data-size="5" onchange="ValidateDropDown(this)">
                        <option></option>
                        @foreach($plantilla as $plantillas)
                        <option data-plantilla="{{ $plantillas->office->office_name }}" value="{{ $plantillas->office->office_code }}">{{ $plantillas->office->office_name }}</option>
                        @endforeach
                        </select>
            </div>
            <div class="col-2 mb-2">
                <select value="" data-style="btn-primarys text-white"
                        class="form-control form-control-xs selectpicker yearAdjustment"
                        name="yearAdjustment" data-live-search="true" id="yearAdjustment" data-size="5">
                            <option value={{ Carbon\Carbon::now()->format('Y') }}>{{ Carbon\Carbon::now()->format('Y') }}</option>
                            @foreach ($dates as $date)
                            <option value={{ $date }}>{{ $date }}</option>
                            @endforeach
                    </select>
            </div>

            <div class="col-5 mb-2">
                    <div style="padding-right:20px;" class="float-right">
                        <button id="addButton" class="btn btn-primarys float-right" disabled><i class="fa fa-plus"></i> Adjust Salary</button>
                    </div>
                </div>
            </div>
            <div style="padding-left:20px; padding-right:20px;" class="table" style="overflow-x:auto;">
                <table class="table table-bordered table-hover text-center" id="salaryAdjustmentPerOffice"  style="width:100%;">
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
<script src="{{ asset('/assets/js/salary-adjustment-per-office.js') }}"></script>
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
                swal("Cancelled", "", "error");
            }
            });
	});
</script>
@endpush
@endsection
