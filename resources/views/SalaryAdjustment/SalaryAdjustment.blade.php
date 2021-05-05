@extends('layouts.app')
@section('title', 'Salary Adjustment')
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
</style>
@endprepend
@section('content')
<div class="kanban-board card mb-0">
    <div class="card-body">
        <div id="add" class="page-header  {{  count($errors->all())  !== 0 ?  '' : 'd-none' }}">
           
            <form action="/salary-adjustment" method="post" id="salaryAdjustmentForm">
                @csrf
                    <div class="row">

                        <div class="col-12">
                            <div class="alert alert-secondary text-center font-weight-bold" role="alert" >Salary Adjustment</div>
                        </div>

                        <div class="form-group col-12 col-lg-4">
                            <label>Date Adjustment<span class="text-danger">*</span></label>
                            <input class="form-control" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" name="dateAdjustment" id="dateAdjustment" type="date">
                            <div id='date-adjustment-error-message' class='text-danger'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-4">
                            <label>Employee Name</label>
                            <select value="" class="form-control form-control-xs selectpicker {{ $errors->has('employeeName')  ? 'is-invalid' : ''}}" 
                            name="employeeName" data-live-search="true" id="employeeName" data-size="5">
                            <option></option>
                            @foreach($employee as $employees)
                            <option data-plantilla="{{ $employees }}" value="{{ $employees->employee->employee_id }}">{{ $employees->employee->lastname }}, {{ $employees->employee->firstname }} {{ $employees->employee->middlename }}</option>
                            @endforeach
                            </select>
                            <div id='employee-error-message' class='text-danger'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-4 d-none">
                            <input class="form-control" value="" name="employeeId" id="employeeId" type="text" placeholder="Input item No.">
                        </div>

                        <div class="form-group col-12 col-lg-4">
                            <label>Item No</label>
                            <input class="form-control" value="" name="itemNo" id="itemNo" type="text" placeholder="" readonly>
                            <div id='item-no-error-message' class='text-danger'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-11 d-none">
                            <input class="form-control " value="" id="positionId" name="positionId" type="text" readonly>
                        </div>

                        <div class="form-group col-12 col-lg-4">
                            <label>Position</label>
                            <input class="form-control" value="" name="positionName" id="positionName" type="text" readonly>
                                <div id='position-error-message' class='text-danger'>
                                </div>
                        </div>

                        <div class="form-group col-12 col-lg-4">
                            <label>Salary Grade</label>
                            <input class="form-control" value="" name="salaryGrade" id="salaryGrade" type="text" readonly>
                            <div id='salary-grade-error-message' class='text-danger'>
                            </div>
                        </div>
                        
                        <div class="form-group col-12 col-lg-4">
                            <label>Step No</label>
                            <input class="form-control" value="" name="stepNo" id="stepNo" type="text" readonly>
                            <div id='step-no-error-message' class='text-danger'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-3 d-none">
                            <label>Current SG Year</label>
                            <select name="currentSgyear" id="currentSgyear" value="" class="select floating">
                                {{ $year3 = date("Y",strtotime("-0 year")) }}
                                <option value={{ $year3 }}>{{ $year3 }}</option>
                            </select>
                            @if($errors->has('currentSgyear'))
                            <small  class="form-text text-danger">
                            {{ $errors->first('currentSgyear') }} </small>
                            @endif
                        </div>

                        <div class="form-group col-12 col-lg-4">
                            <label>Salary Previous<span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">&#8369;</span>
                                </div>
                            <input class="form-control" value="" name="salaryPrevious" id="salaryPrevious" type="text" readonly>
                            </div>
                            <div id='salary-previous-error-message' class='text-danger'>
                            </div>
                        </div>
                        
                        <div class="form-group col-12 col-lg-4">
                        <label>Salary New<span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text">&#8369;</span>
                            </div>
                            <input class="form-control" value="" name="salaryNew" id="salaryNew" type="text" placeholder="">
                            </div>
                            <div id='salary-new-error-message' class='text-danger'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-4">
                            <label>Salary Difference</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text">&#8369;</span>
                                </div>
                            <input class="form-control" value="" name="salaryDifference" id="salaryDifference" type="text" readonly>
                            </div>
                            <div id='salary-difference-error-message' class='text-danger'>
                            </div>
                        </div>

                        <div class="form-group form-group submit-section col-12">
                            <button id="saveBtn" class="btn btn-success submit-btn float-right" type="submit">
                                <span id="loading" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="false"></span>
                                Save
                            </button>
                            <button style="margin-right:10px;" type="button" id="cancelbutton" class="text-white btn btn-warning submit-btn float-right" onclick="reset()">Cancel</button>
                        </div>

                </div>
                
            <form>
        </div>

        <div id="table" class="page-header {{  count($errors->all()) == 0 ? '' : 'd-none' }}">
                <div style="padding-bottom:10px;" class="row align-items-right">
                    <div class="col-auto float-right ml-auto">
                        <button id="addbutton" class="btn btn-primary submit-btn float-right"><i class="fa fa-plus"></i> Add Salary Adjustment</button>
                    </div>
                </div>
            <div class="table" style="overflow-x:auto;">
                <table class="table table-bordered text-center" id="salaryAdjustment"  style="width:100%;">
                    <thead>
                    <tr>
                        <td scope="col" class="text-center font-weight-bold">Date Adjustment</td>
                        <td scope="col" class="text-center font-weight-bold">Employee Name</td>
                        <td scope="col" class="text-center font-weight-bold">Salary Grade</td>
                        <td scope="col" class="text-center font-weight-bold">Step Number</td>
                        <td scope="col" class="text-center font-weight-bold">Salary Previous</td>
                        <td scope="col" class="text-center font-weight-bold">Salary New</td>
                        <td scope="col" class="text-center font-weight-bold">Salary Difference</td>
                        <td scope="col" class="text-center font-weight-bold">Action</td>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>

    </div>
</div>
@push('page-scripts')
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="{{ asset('/assets/js/salary-adjustment.js') }}"></script>
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
        let url = /salary-adjustment/;
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
                    $('#salaryAdjustment').DataTable().ajax.reload();
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