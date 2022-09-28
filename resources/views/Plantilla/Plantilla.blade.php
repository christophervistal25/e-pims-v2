@extends('layouts.app')
@section('title', 'PLANTILLA OF PERSONNEL')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('/assets/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<script src="https://use.fontawesome.com/78c056906b.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
     .swal-content ul {
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

     .btn-primarys {
          background-color: #FF9B44;
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

    .page-item.active .page-link:hover {
        background-color: #FF8544 !important;
        border: 1px solid #FF8544;
    }

</style>
@endprepend

@prepend('meta-data')
<meta id="plantillaPositionMetaData" content="@foreach($plantillaPosition as $plantillaPositions){ |officeCode|:|{{ $plantillaPositions->office_code }}|, |positionId|:|{{ $plantillaPositions->PosCode }}|, |ppId|:|{{ $plantillaPositions->pp_id }}|, |item_no|:|{{ $plantillaPositions->item_no }}|}, @endforeach">
<meta id="positionMetaData" content="@foreach($position as $positions){ |positionId|:|{{ $positions->PosCode }}|, |positionName|:|{{ $positions->Description }}|}, @endforeach">
@endprepend
@section('content')
<div class="kanban-board card shadow mb-0">
    <div class="card-body">
        <div id="add" class="page-header {{  count($errors->all())  !== 0 ?  '' : 'd-none' }}">
            <div style='padding-bottom:50px;'>
                <button id="displayListPlantilla" class="btn btn-primarys submit-btn float-right shadow"><i class="fa fa-list"></i>
                Personnel List</button>
            </div>
            <div class="alert alert-secondary font-weight-bold text-center">ADD NEW PLANTILLA OF PERSONNEL</div>
                <form action="/plantilla" method="post" id="plantillaForm">
                    @csrf
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="row">
                            <div class="form-group col-12 col-lg-10">
                                <label>Employee Name</label>
                                <select value="" class="form-control employeeName selectpicker" name="employeeName" data-live-search="true" id="employeeName" data-size="5">
                                    <option></option>
                                    @foreach($employee as $employees)
                                    <option data-plantilla="{{ $employees->Employee_id }}" {{ old('employeeName') == $employees->Employee_id ? 'selected' : '' }} value="{{ $employees->Employee_id }}"> {{ $employees->fullname }}</option>
                                    @endforeach
                                </select>
                                <div id='employee-name-error-message' class='text-danger text-sm'>
                                </div>
                            </div>

                            <div class="form-group col-12 col-lg-2">
                                <label>Employee ID</label>
                                <input value="{{ old('employeeID') }}" class="form-control" name="employeeID" id="employeeID" type="text" readonly>
                            </div>

                            <div class="form-group col-12 col-lg-6">
                                <label>Office<span class="text-danger">*</span></label>
                                <select value="" class="form-control officeCode selectpicker" name="officeCode" data-live-search="true" id="officeCode" data-size="5">
                                    <option></option>
                                    @foreach($office as $offices)
                                    <option {{ old('officeCode') == $offices->office_code ? 'selected' : '' }} value="{{ $offices->office_code }}">
                                            {{ $offices->office_name }}</option>
                                    @endforeach
                                </select>
                                <div id='office-error-message' class='text-danger text-sm'>
                                </div>
                            </div>

                            <div class="form-group col-12 col-lg-6">
                                <label>Position<span class="text-danger">*</span></label>
                                <select value="" class="form-control positionTitle selectpicker" name="positionTitle" data-live-search="true" id="positionTitle" data-size="5" data-width="100%">
                                    <option></option>
                                </select>
                                <div id='position-title-error-message' class='text-danger text-sm'>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="d-flex justify-content-center">
                                <img src="{{
                                    asset('/assets/img/placeholder.jpg')
                                }}" width="200px" height="180px" id="employeeImage" class="border img-responsive border-default float-right rounded cursor-pointer d-md-none d-lg-block" height="360px" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                            <div class="form-group col-12 col-lg-4">
                                <label>Division</label>
                                <input value="{{ old('divisionId') }}" class="form-control" name="divisionId" id="divisionId" type="text" placeholder="" readonly>
                                <div id='division-error-message' class='text-danger text-sm'>
                                </div>
                        </div>

                        <div class="form-group col-12 col-lg-4">
                            <label>Section</label>
                            <input value="{{ old('sectionId') }}" class="form-control" name="sectionId" id="sectionId" type="text" placeholder="" readonly>
                            <div id='section-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-4">
                            <label>Status<span class="text-danger">*</span></label>
                            <select value=""
                                class="form-control status selectpicker"
                                name="status" data-live-search="true" id="status" data-size="5" data-width="100%">
                                <option></option>
                                @foreach(range(0, 6) as $statuses)
                                @if($status[$statuses] == 'Permanent')
                                <option value="{{ $status[$statuses]}}" selected>{{ $status[$statuses] }}</option>
                                @else
                                <option value="{{ $status[$statuses]}}">{{ $status[$statuses] }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div id='status-error-message' class='text-danger text-sm'>
                            </div>
                        </div>


                        <div class="form-group col-12 col-lg-6">
                            <label>Item No</label>
                            <input value="{{ old('itemNo') }}" class="form-control {{ $errors->has('itemNo')  ? 'is-invalid' : ''}}" name="itemNo" id="itemNo" type="text" placeholder="" readonly>
                            <div id='item-no-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-6">
                            <label>Old Item No</label>
                            <input value="{{ old('oldItemNo') }}" class="form-control" name="oldItemNo" id="oldItemNo" type="text" placeholder="(optional)">
                            <div id='old_item-no-error-message' class='text-danger'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-3">
                            <label>Current Salary Grade Year</label>
                            <input value="{{ old('currentSgyear') ?? now()->year }}" class="form-control" name="currentSgyear" id="currentSgyear" type="text" readonly>
                            <div id='year-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-2">
                            <label> Salary Grade</label>
                            <input value="{{ old('salaryGrade') }}" class="form-control" name="salaryGrade" id="currentSalarygrade" type="text" readonly>
                            <div id='salary-grade-error-message' class='text-danger text-sm'>
                            </div>
                        </div>


                        <div class="form-group col-12 col-lg-2">
                            <label>Step<span class="text-danger">*</span></label>
                                <select value="" class="form-control stepNo selectpicker" name="stepNo" data-live-search="true" id="currentStepno" data-size="5" data-width="100%">
                                    <option></option>
                                    @foreach(range(1, 8) as $step_no)
                                        @if($step_no == '1')
                                        <option value="{{ $step_no}}" selected>{{ $step_no}}</option>
                                        @else
                                        <option value="{{ $step_no}}">{{ $step_no}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            <div id='steps-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-2">
                            <label>Salary Amount<span class="text-danger">*</span></label>
                                <input value="{{ old('salaryAmount') }}" class="form-control" name="salaryAmount" id="salaryAmount" type="text">
                                <div id='salary-amount-error-message' class='text-danger text-sm'></div>
                        </div>

                        <div class="form-group col-12 col-lg-3">
                            <label>(Yearly)<span class="text-danger">*</span></label>
                            <input value="{{ old('salaryAmountYearly') }}" class="form-control" name="salaryAmountYearly" id="salaryAmountYearly" type="text" placeholder="">
                            <div id='salaryAmountYearly-no-error-message' class='text-danger'></div>
                        </div>

                        <div class="form-group col-12 col-lg-3">
                        <label>Previous Salary Grade</label>
                            <select value="" class="form-control salaryGradePrevious selectpicker" name="salaryGradePrevious" data-live-search="true" id="salaryGradePrevious" data-size="5" data-width="100%">
                                <option></option>
                                @foreach(range(1, 33) as $sal_grade)
                                    @if($sal_grade == '')
                                        <option value="{{ $sal_grade }}" >{{ $sal_grade }}</option>
                                        @else
                                        <option value="{{ $sal_grade }}">{{ $sal_grade }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div id='salary-grade-previous-error-message' class='text-danger text-sm'>
                            </div>
                        </div>


                        <div class="form-group col-12 col-lg-3">
                            <label>Previous Step</label>
                            <select class="form-control stepNoPrevious selectpicker" name="stepNoPrevious" data-live-search="true" id="stepNoPrevious" data-size="5" data-width="100%">
                                <option></option>
                                @foreach(range(1,8) as $step_no)
                                @if($step_no == '')
                                <option value="{{ $step_no}}" selected>{{ $step_no}}</option>
                                @else
                                <option value="{{ $step_no}}">{{ $step_no}}</option>
                                @endif
                                @endforeach
                            </select>
                            <div id='steps-previous-error-message' class='text-danger text-sm'>
                            </div>
                        </div>


                        <div class="form-group col-12 col-lg-3">
                            <label>Salary Authorized</label>
                            <input value="{{ old('salaryAuthorized') }}" class="form-control" name="salaryAuthorized" id="salaryAuthorized" type="text" placeholder="">
                            <div id='salaryAuthorized-no-error-message' class='text-danger'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-3">
                            <label>(Yearly)</label>
                            <input value="{{ old('salaryAmountPreviousYearly') }}" class="form-control" name="salaryAmountPreviousYearly" id="salaryAmountPreviousYearly" type="text" placeholder="">
                            <div id='salaryAmountPreviousYearly-no-error-message' class='text-danger'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-4">
                            <label>Original Appointment</label>
                            <input value="{{ old('originalAppointment') }}" class="form-control" name="originalAppointment" type="date" id="originalAppointment">
                            <div id='original-appointment-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-4">
                            <label>Last Promotion</label>
                            <input value="{{ old('lastPromotion') }}" class="form-control" name="lastPromotion" type="date" id="lastPromotion">
                            <div id='last-promotion-error-message' class='text-danger text-sm'>
                            </div>
                        </div>

                        <div class="form-group col-12 col-lg-4">
                            <label>Last Step Increment</label>
                            <input value="{{ old('lastStepIncrement') }}" class="form-control" name="lastStepIncrement" type="date" id="lastStepIncrement">
                            <div id='last-step-increment-error-message' class='text-danger text-sm'></div>
                        </div>

                        <div class="form-group col-12 col-lg-4">
                            <label>Area Code</label>
                            <input class="form-control" name="areaCode" id="areaCode" type="text" placeholder="" readonly>
                        </div>

                        <div class="form-group col-12 col-lg-4">
                            <label>Area Type</label>
                            <input class="form-control" name="areaType" id="areaType" type="text" placeholder="" readonly>
                        </div>

                        <div class="form-group col-12 col-lg-4">
                            <label>Area Level</label>
                            <input class="form-control" name="areaLevel" id="areaLevel" type="text" placeholder="" readonly>
                        </div>

                        <div class="form-group form-group submit-section col-12">
                            <button id="saveBtn" class="btn btn-primarys submit-btn float-right shadow" type="submit">
                                <span id="loading" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="false"></span>
                                <i class="fas fa-save"></i> <b id="saving">Save</b>
                            </button>
                            <button style="margin-right:10px;" type="button" id="cancelButton" class="text-white btn btn-danger submit-btn float-right shadow"><i class="fas fa-ban"></i> Cancel</button>
                        </div>
                    </div>
                </form>
            </div>


            <div id="table" class="page-header {{  count($errors->all()) == 0 ? '' : 'd-none' }}">

                <div class="row">
                    <div class="col-5 mb-2">
                        <select value="" data-style="btn-primarys text-white" class="form-control form-control-xs selectpicker {{ $errors->has('employeeOffice')  ? 'is-invalid' : ''}}" name="employeeOffice" data-live-search="true" id="employeeOffice" data-size="5">
                            <option value="*">All</option>
                            @foreach($office as $offices){
                            <option {{ '0001' == $offices->office_code ? 'selected' : '' }} value="{{ $offices->office_code }}">{{ $offices->office_name }}</option>
                            }
                            @endforeach
                        </select>
                    </div>

                    <div class="col-2 mb-2">
                        <select value="" data-style="btn-primarys text-white" class="form-control form-control-xs selectpicker {{ $errors->has('employeeOffice')  ? 'is-invalid' : ''}}" name="currentYear" data-live-search="true" id="currentYear" data-size="5">
                            <option value="{{ Carbon\Carbon::now()->format('Y') }}">{{ Carbon\Carbon::now()->format('Y') }}</option>
                            @foreach($year as $years){
                                <option value="{{ $years->year }}">{{ $years->year }}</option>
                            }
                            @endforeach
                        </select>
                    </div>

                    <div class="col-5 float-right mb-10">
                        <button id="addButton" class="btn btn-primarys submit-btn float-right"><i class="fa fa-plus"></i> Add
                        Plantilla of Personnel</button>
                    </div>
                </div>

                <div class="table">
                    <table class="table table-bordered table-hover text-center" id="plantilla" style="width:100%;">
                        <thead>
                            <tr>
                                <td scope="col" class="text-center">Item No</td>
                                <td scope="col" class="text-center">Image</td>
                                <td scope="col" class="text-center">Employee Name</td>
                                <td scope="col" class="text-center">Position Title</td>
                                <td scope="col" class="text-center">Office</td>
                                <td scope="col" class="text-center">SG / Step</td>
                                <td scope="col" class="text-center">Year</td>
                                <td scope="col" class="text-center">Action</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            <div class="result">
        </div>
    </div>
</div>
</div>
@include('Plantilla.add-ons.plantillamodal')
@push('page-scripts')
<script>
     $.ajaxSetup({
          headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
     });

</script>
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="{{ asset('/assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/assets/js/plantilla.js') }}"></script>
@endpush
@endsection
