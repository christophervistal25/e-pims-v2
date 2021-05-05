@extends('layouts.app')
@section('title', 'Service Records')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@prepend('page-css')
<script src="{{ asset('/js/app.js') }}" defer></script>
@endprepend
<style>
    .swal-content ul{
    list-style-type: none;
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
           
            <form action="/service-records" method="post" id="serviceRecordForm">
                @csrf
                    <div class="row">

                        <div class="col-12">
                            <div class="alert alert-secondary text-center font-weight-bold" role="alert" >
                                <p id="employeeTitleName"></p>
                                Service Records
                            </div>
                        </div>
                        <div class="form-group col-12 col-lg-12 d-none">
                            <label>Employee_id<span class="text-danger">*</span></label>
                            <input class="form-control" value="" name="employeeId" id="employeeId" type="text" readonly>
                        </div>

                        <div class="form-group col-12 col-lg-3">
                            <label>From<span class="text-danger">*</span></label>
                            <input class="form-control" value="" name="fromDate" id="fromDate" type="date">
                            <div id='from-date-error-message' class='text-danger'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-3">
                            <label>To<span class="text-danger">*</span></label>
                            <input class="form-control" value="" name="toDate" id="toDate" type="date">
                            <div id='to-date-error-message' class='text-danger'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-3">
                            <label>Position<span class="text-danger">*</span></label>
                            <select value=""  class="form-control selectpicker  {{ $errors->has('positionTitle')  ? 'is-invalid' : ''}}" 
                            name="positionTitle" data-live-search="true" id="positionTitle" data-size="5" data-width="100%">
                            <option></option>
                            @foreach($position as $positions)
                                <option style="width:350px;" {{ old('positionTitle') == $positions->position_id ? 'selected' : '' }} value="{{ $positions->position_id}}">{{ $positions->position_name }}</option>
                            @endforeach
                            </select>
                            <div id='position-title-error-message' class='text-danger'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-3">
                            <label>Status <span class="text-danger">*</span></label>
                            <select value="" name="status" class="select {{ $errors->has('status')  ? 'is-invalid' : ''}}" id="status">
                                @foreach(range(0, 10) as $statuses)
                                    @if($status[$statuses] == old('status'))
                                        <option value="{{ $status[$statuses]}}" selected>{{ $status[$statuses] }}</option>
                                    @else
                                        <option value="{{ $status[$statuses]}}">{{ $status[$statuses] }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div id='status-error-message' class='text-danger'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-3">
                            <label>Salary<span class="text-danger">*</span></label>
                            <input value="{{ old('salary') }}" class="form-control {{ $errors->has('salary')  ? 'is-invalid' : ''}}" name="salary" id="salary" type="text">
                            <div id='salary-error-message' class='text-danger'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-3">
                            <label>Office<span class="text-danger">*</span></label>
                            <select value="" name="officeCode" class="select {{ $errors->has('officeCode')  ? 'is-invalid' : ''}}" id="officeCode">
                                <option>Please Select</option>
                                @foreach($office as $offices)
                                <option {{ old('officeCode') == $offices->office_code ? 'selected' : '' }} value="{{ $offices->office_code}}">{{ $offices->office_name }}</option>
                                @endforeach
                            </select>
                            <div id='office-error-message' class='text-danger'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-3">
                            <label>Leave w/o Pay<span class="text-danger">*</span></label>
                            <input value="{{ old('leavePay') }}" class="form-control {{ $errors->has('leavePay')  ? 'is-invalid' : ''}}" name="leavePay" id="leavePay" type="text">
                            <div id='leave-pay-error-message' class='text-danger'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-3">
                            <label>Date<span class="text-danger">*</span></label>
                            <input class="form-control" value="" name="date" id="date" type="date">
                            <div id='date-error-message' class='text-danger'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-12">
                            <label>Cause<span class="text-danger">*</span></label>
                            <input value="{{ old('cause') }}" class="form-control {{ $errors->has('cause')  ? 'is-invalid' : ''}}" name="cause" id="cause" type="text">
                            <div id='cause-error-message' class='text-danger'>
                            </div>
                        </div>

                        <div class="form-group form-group submit-section col-12">
                            <button id="saveBtn" class="btn btn-success submit-btn float-right" type="submit">
                                <span id="loading" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="false"></span>
                                Save
                            </button>
                            <button style="margin-right:10px;" type="button" id="cancelbutton" class="text-white btn btn-warning submit-btn float-right" >Cancel</button>
                            {{-- onclick="reset()" --}}
                        </div>

                </div>
                
            <form>
        </div>

        <div id="table" class="page-header {{  count($errors->all()) == 0 ? '' : 'd-none' }}">
            <div class="row">
                <div class="col-6 mb-2">
                    <select value="" data-style="btn-primary text-white" class="form-control form-control-xs selectpicker {{ $errors->has('employeeName')  ? 'is-invalid' : ''}}" 
                        name="employeeName" data-live-search="true" id="employeeName" data-size="5" onchange="ValidateDropDown(this)">
                        <option></option>
                        @foreach($plantilla as $plantillas)
                        <option data-plantilla="{{ $plantillas->employee }}" value="{{ $plantillas->employee_id }}">{{ $plantillas->employee->lastname }}, {{ $plantillas->employee->firstname }} {{ $plantillas->employee->middlename }}</option>
                        @endforeach
                        </select>
            </div>
            <div class="col-6 mb-2">
                    <div class="float-right">
                        <button id="addbutton" class="btn btn-primary float-right" disabled><i class="fa fa-plus"></i> Add Service Records</button>
                    </div>
                </div>
            </div>
        
            <div class="table" style="overflow-x:auto;">
                <table class="table table-bordered text-center" id="serviceRecords"  style="width:100%;">
                    <thead>
                        <tr>
                            <th class="font-weight-bold align-middle text-center" rowspan="2">Emp Id</th>
                            <th class="font-weight-bold align-middle text-center" rowspan="1 "colspan="2">Service Records<br><small>(Inclusive dates)</small></th>
                            <th class="font-weight-bold align-middle text-center" rowspan="1" colspan="3">Records of Appointment</th>
                            <th class="font-weight-bold align-middle text-center" rowspan="1 "colspan="2">From</th>
                            <th class="font-weight-bold align-middle text-center" rowspan="1" colspan="2">To</th>
                            <th class="font-weight-bold align-middle text-center" rowspan="2">Option</th>
                            
                            <tr>
                            <td class="font-weight-bold align-middle text-center">From</td>
                            <td class="font-weight-bold align-middle text-center">To</td>
                            <td class="font-weight-bold align-middle text-center">Designation</td>
                            <td class="font-weight-bold align-middle text-center">Status</td>
                            <td class="font-weight-bold align-middle text-center">Salary</td>
                            <td class="font-weight-bold align-middle text-center">Station/Place of Assignment</td>
                            <td class="font-weight-bold align-middle text-center">Leave w/o Pay</td>
                            <td class="font-weight-bold align-middle text-center">Date</td>
                            <td class="font-weight-bold align-middle text-center">Cause</td>
                            </tr>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                </table>
                <p style="visibility: visible;" id="line" class="text-center">No data available in table</p>
            </div>
        </div>

    </div>
</div>
@push('page-scripts')
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="{{ asset('/assets/js/service-record.js') }}"></script>
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
        let url = /service-records/;
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
                    $('#serviceRecords').DataTable().ajax.reload();
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