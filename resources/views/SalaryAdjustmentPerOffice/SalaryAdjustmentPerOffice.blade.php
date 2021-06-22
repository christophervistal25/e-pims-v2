@extends('layouts.app')
@section('title', 'Salary Adjustment Per Office')
@prepend('page-css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
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
                <button id="cancelbutton" class="btn submit-btn btn-primary float-right"><i class="fa fa-list"></i> Salary Adjustment List</button>
            </div>
            <div class="row">
            <div class="col-12">
                <div class="alert alert-secondary text-center font-weight-bold" role="alert" >
                        <div class="row">
                            <div class="col-12 col-md-9">
                        <p class="float-center" id="officeAdjustment"></p>
                        </div>
                            <div class="col-12 col-md-3">
                            <input type="text" id="year" class="form-control d-none" value="{{ Carbon\Carbon::now()->year }}" name="year" readonly>
                            <input class="form-control" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" name="dateAdjustment" id="dateAdjustment" type="date">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
            <form id="frm-example" action="" method="" id="salaryAdjustmentPerOfficeNotSelected">
            @csrf
            <table class="table table-bordered text-center" id="salaryAdjustmentPerOfficeList" style="width:100%;">
                <thead>
                <tr>
                    <td style="margin-top:10px;" scope="col" class="text-center font-weight-bold"><input style='transform:scale(1.3); margin-top:18px;' name="selectAll" value="selectAll" id="selectAll" type="checkbox" /></td>
                    <td scope="col" class="text-center font-weight-bold">Employee Name</td>
                    <td scope="col" class="text-center font-weight-bold d-none">Office Code</td>
                    <td scope="col" class="text-center font-weight-bold">Position</td>
                    <td scope="col" class="text-center font-weight-bold">Salary Grade</td>
                    <td scope="col" class="text-center font-weight-bold">Step Number</td>
                    <td scope="col" class="text-center font-weight-bold">Current Salary</td>
                </tr>
                </thead>
            </table>
            </form>

            <button style="margin-top:10px;" id="saveBtn" class="btn btn-success submit-btn float-right" onclick="LockDepot()" type="submit">
                <span id="loading" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="false"></span>
                Submit
            </button>


        </div>
        </div>
        </div>
        </div>

        <div id="table" class="page-header ">
            <div class="row">
                <div style="padding-left:35px;" class="col-5 mb-2">
                    <select value="" data-style="btn-primary text-white" class="form-control form-control-xs selectpicker {{ $errors->has('employeeOffice')  ? 'is-invalid' : ''}}"
                        name="employeeOffice" data-live-search="true" id="employeeOffice" data-size="5" onchange="ValidateDropDown(this)">
                        <option></option>
                        @foreach($plantilla as $plantillas)
                        <option data-plantilla="{{ $plantillas->office->office_name }}" value="{{ $plantillas->office->office_code }}">{{ $plantillas->office->office_name }}</option>
                        @endforeach
                        </select>
            </div>

            <div class="col-7 mb-2">
                    <div style="padding-right:20px;" class="float-right">
                        <button id="addbutton" class="btn btn-primary float-right" disabled><i class="fa fa-plus"></i> Adjust Salary</button>
                    </div>
                </div>
            </div>
            <div style="padding-left:20px; padding-right:20px;" class="table" style="overflow-x:auto;">
                <table class="table table-bordered text-center" id="salaryAdjustmentPerOffice"  style="width:100%;">
                    <thead>
                    <tr>
                        <td scope="col" class="text-center font-weight-bold">Employee Name</td>
                        <td scope="col" class="text-center font-weight-bold d-none">Office</td>
                        <td scope="col" class="text-center font-weight-bold">Adjustment Date</td>
                        <td scope="col" class="text-center font-weight-bold">Salary Grade</td>
                        <td scope="col" class="text-center font-weight-bold">Step Number</td>
                        <td scope="col" class="text-center font-weight-bold">Previous Salary</td>
                        <td scope="col" class="text-center font-weight-bold">New Salary</td>
                        <td scope="col" class="text-center font-weight-bold">Salary Difference</td>
                        <td scope="col" class="text-center font-weight-bold">Action</td>
                    </tr>
                    </thead>
                </table>
                <p style="visibility: visible;" id="line" class="text-center">No data available in table</p>
            </div>
        </div>

    </div>
</div>
@push('page-scripts')
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="{{ asset('/assets/js/salary-adjustment-per-office.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
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
