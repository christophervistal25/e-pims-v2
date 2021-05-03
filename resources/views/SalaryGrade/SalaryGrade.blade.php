@extends('layouts.app')
@section('title', 'Salary Grade')
@prepend('page-css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
@endprepend
@section('content')
<div class="content">
        <div id="message" class="page-header {{  count($errors->all())  !== 0 ?  'd-none' : '' }}">
            @include('SalaryGrade.add-ons.success')
        </div>
    <div class="kanban-board card mb-0">
        <div class="card-body">
            <div id="add" class="page-header {{  count($errors->all())  !== 0 ?  '' : 'd-none' }}">
                <div class="alert alert-secondary text-center font-weight-bold" role="alert" >Add New Salary Grade</div>
                    <form action="" method="POST" id="salaryGradeForm">
                        @csrf
                        <div class="row">

                            <div class="form-group col-12 col-lg-4">
                                <label>Salary Grade <span class="text-danger">*</span></label>
                                    <select name="sgNo" value="{{ old('sgNo') }}" class="select floating" id="sgNo">
                                        <option selected>Please Select</option>s
                                        @foreach (range(1, 33) as $salarygrade)
                                            <option {{ old('sgNo') == $salarygrade ? 'selected' : '' }} value="{{ $salarygrade }}">{{ $salarygrade }}</option>
                                        @endforeach
                                    </select>
                                    <div id='salary-grade-error-message' class='text-danger'>
                                    </div>
                            </div>

                            <div class="form-group col-12 col-lg-4">
                                <label>Step 1 <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">&#8369;</span>
                                    </div>
                                    <input class="form-control text-right"    value="{{ old('sgStep1') }}" id="sgStep1" name="sgStep1" type="text" maxlength="12">
                                    </div>
                                    <div id='salary-grade1-error-message' class='text-danger'>
                                    </div>
                            </div>

                            <div class="form-group col-12 col-lg-4">
                                <label>Step 2 <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">&#8369;</span>
                                    </div>
                                    <input class="form-control text-right" value="{{ old('sgStep2') }}" id="sgStep2" name="sgStep2" type="text" maxlength="12">
                                </div>
                                <div id='salary-grade2-error-message' class='text-danger'>
                                </div>
                            </div>

                            <div class="form-group col-12 col-lg-4">
                                <label>Step 3 <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">&#8369;</span>
                                    </div>
                                    <input class="form-control text-right" value="{{ old('sgStep3') }}" id="sgStep3" name="sgStep3" type="text" maxlength="12">
                                </div>
                                <div id='salary-grade3-error-message' class='text-danger'>
                                </div>
                            </div>

                            <div class="form-group col-12 col-lg-4">
                                <label>Step 4 <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">&#8369;</span>
                                    </div>
                                    <input class="form-control text-right {{ $errors->has('sgStep4')  ? 'is-invalid' : ''}}" value="{{ old('sgStep4') }}" id="sgStep4" name="sgStep4" type="text" maxlength="12">
                                </div>
                                <div id='salary-grade4-error-message' class='text-danger'>
                                </div>
                            </div>

                            <div class="form-group col-12 col-lg-4">
                                <label>Step 5 <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">&#8369;</span>
                                    </div>
                                    <input class="form-control text-right" value="{{ old('sgStep5') }}" id="sgStep5" name="sgStep5" type="text" maxlength="12">
                                </div>
                                <div id='salary-grade5-error-message' class='text-danger'>
                                </div>
                            </div>

                            <div class="form-group col-12 col-lg-4">
                                <label>Step 6 <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">&#8369;</span>
                                    </div>
                                    <input class="form-control text-right" value="{{ old('sgStep6') }}" id="sgStep6" name="sgStep6" type="text" maxlength="12">
                                </div>
                                <div id='salary-grade6-error-message' class='text-danger'>
                                </div>
                            </div>

                            <div class="form-group col-12 col-lg-4">
                                <label>Step 7 <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">&#8369;</span>
                                    </div>
                                    <input class="form-control text-right" value="{{ old('sgStep7') }}" id="sgStep7" name="sgStep7" type="text" maxlength="12">
                                </div>
                                <div id='salary-grade7-error-message' class='text-danger'>
                                </div>
                            </div>

                            <div class="form-group col-12 col-lg-4">
                                <label>Step 8 <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">&#8369;</span>
                                    </div>
                                <input class="form-control text-right" value="{{ old('sgStep8') }}" id="sgStep8" name="sgStep8" type="text" maxlength="12">
                                </div>
                                <div id='salary-grade8-error-message' class='text-danger'>
                                </div>
                            </div>

                            <div class="form-group col-12 col-lg-4">
                                <label>Salary Grade Year <span class="text-danger">*</span></label>
                                <select id="sgYear" name="sgYear" value="{{ old('sgYear') }}" class="select floating">
                                    <option>Please Select</option>
                                    {{ $year2 = date("Y",strtotime("-1 year")) }}
                                    <option {{ old('sgYear') == $year2 ? 'selected' : '' }} value={{ $year2 }}>{{ $year2 }}</option>
                                    {{ $year3 = date("Y",strtotime("-0 year")) }}
                                    <option {{ old('sgYear') == $year3 ? 'selected' : '' }} value={{ $year3 }}>{{ $year3 }}</option>
                                    @foreach (range(1, 5) as $year)
                                    {{ $year1 = date("Y",strtotime("$year year")) }}
                                    <option {{ old('sgYear') == $year1 ? 'selected' : '' }} value={{ $year1 }}>{{ $year1 }}</option>
                                    @endforeach
                                </select>
                                <div id='salary-grade-year-error-message' class='text-danger'>
                                </div>
                            </div>

                            <div class="form-group submit-section col-12">
                                <button id="saveBtn" class="btn btn-success submit-btn float-right" type="submit">
                                    <span id="loading" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="false"></span>
                                    Save
                                  </button>
                                <button style="margin-right:10px;" type="button" id="cancelbutton" class="btn text-white btn-warning submit-btn float-right">Cancel</button>
                            </div>

                    </div>
            </form>
    </div>
    <div id="table" class="page-header {{  count($errors->all()) == 0 ? '' : 'd-none' }}">
        <div style="padding-bottom:10px;" class="row align-items-right">
            <div class="col">
                <div class="row">
                    <div class="form-group form-focus select-focus col-5">
                        <select class="select floating" id="filter_year" onchange="filter_year();">
                            @foreach (range(5, 1) as $year)
                            {{ $year1 = date("Y",strtotime("+$year year")) }}
                            <option value={{ $year1 }}>{{ $year1 }}</option>
                            @endforeach
                            {{ $date = date("Y") }}
                            <option selected value={{ $date }}>{{ $date }}</option>
                                @foreach (range(1, 5) as $year)
                                {{ $year2 = date("Y",strtotime("-$year year")) }}
                                <option value={{ $year2 }}>{{ $year2 }}</option>
                            @endforeach
                        </select>
                        <label style="padding-left:10px;" class="focus-label">Select Year</label>
                    </div>
                </div>
            </div>
            <div class="col-auto float-right ml-auto">
                <button id="addbutton" class="btn btn-primary submit-btn float-right"><i class="fa fa-plus"></i> Add Salary Grade</button>
            </div>
        </div>
        <div class="table" style="overflow-x:auto;">
        <table width="100%" cellspacing="0" class="table table-bordered text-center" id="myTable">
            <thead>
              <tr>
                <td style="width:10px; important: !;" scope="col" class="text-center font-weight-bold">Salary Grade</td>
                <td scope="col" class="text-center font-weight-bold">Step 1</td>
                <td scope="col" class="text-center font-weight-bold">Step 2</td>
                <td scope="col" class="text-center font-weight-bold">Step 3</td>
                <td scope="col" class="text-center font-weight-bold">Step 4</td>
                <td scope="col" class="text-center font-weight-bold">Step 5</td>
                <td scope="col" class="text-center font-weight-bold">Step 6</td>
                <td scope="col" class="text-center font-weight-bold">Step 7</td>
                <td scope="col" class="text-center font-weight-bold">Step 8</td>
                <td scope="col" class="text-center font-weight-bold">Salary Grade Base Year</td>
                <td scope="col" class="text-center font-weight-bold">Action</td>
              </tr>
            </thead>
          </table>
        </div>
    </div>
</div>
    </div>
</div>

@push('page-scripts')
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
<script src="{{ asset('/assets/js/salary-grade.js') }}"></script>
@endpush
@endsection
