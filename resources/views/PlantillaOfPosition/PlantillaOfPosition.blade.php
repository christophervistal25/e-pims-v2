@extends('layouts.app')
@section('title', 'Plantilla Of Position')
@prepend('page-css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
    .swal-content ul{
    list-style-type: none;
    padding: 0;
}
</style>
@endprepend
@section('content')
<div class="kanban-board card mb-0">
    <div class="card-body">
        <div id="add" class="page-header {{  count($errors->all())  !== 0 ?  '' : 'd-none' }}">
            <div style='padding-bottom:50px;margin-right:-15px;' class="col-auto ml-auto">
                <button id="cancelbutton" class="btn btn-primary submit-btn float-right"><i class="fa fa-list"></i> Position List</button>
            </div>
            <form action="/plantilla-of-position" method="post" id="plantillaOfPositionForm">
                @csrf
                <div class="row">

                <div class="col-12">
                    <div class="alert alert-secondary text-center font-weight-bold" role="alert" >Add New Position</div>
                </div>

                <div class="form-group col-12 col-md-6 col-lg-3">
                    <label>Position Code<span class="text-danger">*</span></label>
                    <input value="{{ old('positionCode') }}" class="form-control {{ $errors->has('positionCode')  ? 'is-invalid' : ''}}" name="positionCode" id="positionCode" type="text" placeholder="Input Position Code">
                    <div id='position-code-error-message' class='text-danger'>
                    </div>
                </div>

                <div class="form-group col-12 col-md-6 col-lg-3">
                    <label>Position Name</label>
                    <input value="{{ old('positionName') }}" class="form-control {{ $errors->has('positionName')  ? 'is-invalid' : ''}}" name="positionName" id="positionName" type="text" placeholder="Input Position Name">
                    <div id='position-name-no-error-message' class='text-danger'>
                    </div>
                </div>

                    <div class="form-group col-12 col-md-6 col-lg-3">
                        <label>Salary Grade<span class="text-danger">*</span></label>
                                <select name="salaryGrade" value="" class="select floating {{ $errors->has('salaryGrade')  ? 'is-invalid' : ''}}" id="salaryGrade">
                                        <option>Please Select</option>
                                        @foreach (range(1 , 33) as $salarygrades)
                                            <option {{ old('salaryGrade') == $salarygrades ? 'selected' : '' }} value="{{ $salarygrades}}">{{ $salarygrades}}</option>
                                        @endforeach
                                </select>
                            <div id='salary-grade-error-message' class='text-danger'>
                            </div>
                    </div>

                <div class="form-group col-12 col-md-6 col-lg-3">
                    <label>Position Short Name<span class="text-danger">*</span></label>
                    <input value="{{ old('positionNameShortname') }}" class="form-control {{ $errors->has('positionNameShortname')  ? 'is-invalid' : ''}}" name="positionNameShortname" id="positionNameShortname" type="text" placeholder="Input Position Name">
                    <div id='position-short-name-no-error-message' class='text-danger'>
                    </div>
                </div>

                <div class="form-group form-group submit-section col-12">
                    <button id="saveBtn" class="btn btn-success submit-btn float-right" type="submit">
                        <span id="loading" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="false"></span>
                        Save
                    </button>
                    <button style="margin-right:10px;" type="button" id="cancelbutton1" class="text-white btn btn-warning submit-btn float-right">Cancel</button>
                </div>
            </div>
            </form>
        </div>
    <div id="table" class="page-header {{  count($errors->all()) == 0 ? '' : 'd-none' }}">
    <div style="padding-bottom:10px;" class="row align-items-right">
        <div class="col-auto float-right ml-auto">
            <button id="addbutton" class="btn btn-primary submit-btn float-right"><i class="fa fa-plus"></i> Add New Position</button>
        </div>
    </div>
    <div class="table" style="overflow-x:auto;">
        <table class="table table-bordered text-center" id="plantillaofposition"  style="width:100%;">
            <thead>
            <tr>
                <td scope="col" class="text-center font-weight-bold">Position Code</td>
                <td scope="col" class="text-center font-weight-bold">Position Name</td>
                <td scope="col" class="text-center font-weight-bold">Salary Grade</td>
                <td scope="col" class="text-center font-weight-bold">Position Short Name</td>
                <td scope="col" class="text-center font-weight-bold">Action</td>
            </tr>
        </thead>
    </table>
    </div>
    <div class="result">
    </div>
</div>
    </div>
</div>
@push('page-scripts')
<script>
$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$(document).on("click", ".delete", function() {
        let $ele = $(this).parent().parent();
        let id= $(this).attr("value");;
        let url = /plantilla-of-position/;
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
                    $('#plantillaofposition').DataTable().ajax.reload();
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
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('/assets/js/plantillaofposition.js') }}"></script>
@endpush
@endsection
