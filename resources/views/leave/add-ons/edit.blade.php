@extends('layouts.app')
@section('title', 'Edit Leave Application Filing')
@prepend('page-css')
<link rel="stylesheet"
    href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endprepend
@prepend('meta-data')
<meta name="holiday-types" content="{{ $types->toJson() }}">
@endprepend
@section('content')

<div class="p-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card ">
                    <div class="card-body">
                        <form method="POST" id="apply__for__leave__form">
                        <div class="alert alert-secondary text-center font-weight-bold">LEAVE APPLICATION FILING</div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6 border border-bottom-0 border-left-0 border-top-0">
                                <h6 class="text-sm text-center">&nbsp;</h6>
                                <label for="date__apply" class="form-group has-float-label">
                                    <input 
                                        type="date" 
                                        name="dateApply" 
                                        id="date__apply"
                                        class="form-control"
                                        value="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                    <span>
                                        <strong>DATE APPLY
                                            <span class="text-danger">*</span>
                                        </strong>
                                    </span>
                                </label>
                                {{-- <label for="controlNo" class="form-group has-float-label">
                            <input type="text" name="controlNo" id="controlNo" class="form-control"
                                style="outline: none; box-shadow: 0px 0px 0px transparent;">
                            <span><strong>CONTROL NO.</strong></span>
                        </label> --}}
                        <label for="type__of__leave" class="form-group has-float-label">
                            <select 
                                class="form-control selectpicker border" 
                                id="type__of__leave"
                                name="selectedLeave"
                                data-live-search="true">
                                <option selected disabled value="">-------------------------</option>
                                @foreach($types->groupBy('category') as $category => $type)
                                <optgroup class="text-uppercase" label="{{ $category }}">
                                    @foreach($type as $t)
                                    <option data-code="{{  $t->code }}" value="{{ $t->id }}">{{ $t->name }}
                                    </option>
                                    @endforeach
                                </optgroup>
                                @endforeach
                            </select>
                            <span>
                                <strong>TYPES OF LEAVE
                                    <span class="text-danger">*</span>
                                </strong>
                            </span>
                        </label>
                        <br>
                        <br>
                        <br>
                                {{-- <label for="typeOthers" class="form-group has-float-label">
                            <input type="text" name="typeOthers" id="typeOthers" class="form-control">
                            <span><strong>IF OTHERS IS SELECTED</strong></span>
                        </label> --}}
                                <label for="incase__of" class="form-group has-float-label">
                                    <select 
                                        class="form-control"
                                        id="incase__of" 
                                        name="inCaseOfLeave"
                                        disabled>
                                    </select>
                                    <span id="in_case_of__label"><strong>IN CASE OF</strong></span>
                                </label>
                                <label for="no__of__days" class="form-group has-float-label">
                                    <input 
                                    type="number" 
                                    class="form-control" 
                                    id="no__of__days" 
                                    name="numberOfDays"
                                    readonly>
                                    <span><strong>NUMBER OF DAYS<span class="text-danger">*</span></strong></span>
                                </label>
                                <hr>
                                {{-- <label for="specify" class="form-group has-float-label">
                                <input type="text" class="form-control" name="specify" id="specify"
                                    style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span><strong>PLEASE SPECIFY:</strong></span>
                            </label> --}}
                                <div class="col-auto p-0">
                                    <label for="start__date" class="form-group has-float-label">
                                        <input 
                                        type="date" 
                                        class="form-control" 
                                        id="start__date" 
                                        name="startDate"
                                        readonly>
                                        <span id="start__date__label"><strong>START DATE</strong></span>
                                    </label>
                                </div>

                                <div class="col-auto p-0">
                                    <label for="end__date" class="form-group has-float-label">
                                        <input 
                                            type="date" 
                                            class="form-control" 
                                            id="end__date" 
                                            name="endDate"
                                            readonly>
                                        <span id="end__date__Label"><strong>END DATE</strong></span>
                                    </label>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-4">
                                        <label for="earned" class="form-group has-float-label">
                                            <input 
                                            type="text"
                                            id="earned"
                                            class="form-control"
                                            name="earned"
                                            readonly>
                                            <span id="earnedLabel"><strong>EARNED</strong></span>
                                        </label>
                                    </div>
                                    <div class="col-4">
                                        <label for="earnedLess" class="form-group has-float-label">
                                            <input 
                                            type="text" 
                                            id="earned__less" 
                                            class="form-control" 
                                            name="earned__less"
                                            readonly>
                                            <span id="earnedLessLabel"><strong>LESS</strong></span>
                                        </label>

                                    </div>
                                    <div class="col-4">
                                        <label for="earnedRemain" class="form-group has-float-label">
                                            <input
                                            type="text"
                                            id="earned__remain"
                                            class="form-control"
                                            name="earnedRemain"
                                            readonly>
                                            <span id="earnedRemainLabel"><strong>REMAINING</strong></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h6 class="text-sm text-center font-weight-medium">LEAVE CREDITS</h6>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="asOf" class="form-group has-float-label">
                                            <input 
                                                type="date" 
                                                id="asOf" 
                                                class="form-control" 
                                                disabled
                                                name="balanceAsOfDate"
                                                value="">
                                            <span><strong>AS OF</strong></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="vacation__leave__earned" class="form-group has-float-label">
                                            <input 
                                                type="number" 
                                                class="form-control" 
                                                id="vacation__leave__earned"
                                                disabled
                                                name="vacationLeaveEarned"
                                                value="">
                                            <span><strong>VL EARNED</strong></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="vacation__leave__used" class="form-group has-float-label">
                                            <input 
                                                type="number" 
                                                class="form-control" 
                                                id="vacation__leave__used"
                                                disabled 
                                                name="vacationLeaveUsed"
                                                value="">
                                            <span><strong>VL USED</strong></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="vacation__leave__balance" class="form-group has-float-label">
                                            <input 
                                                type="number" 
                                                class="form-control" 
                                                id="vacation__leave__balance"
                                                disabled
                                                name="vacationLeaveBalance"
                                                value="">
                                            <span><strong>VL BALANCE</strong></span>
                                        </label>
                                    </div>

                                    <div class="col-lg-12 m-0 p-0">
                                        <hr>
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="sick__leave__earned" class="form-group has-float-label">
                                            <input 
                                                type="number" 
                                                id="sick__leave__earned" 
                                                class="form-control" 
                                                disabled
                                                name="sickLeaveEarned"
                                                value="">
                                            <span><strong>SL EARNED</strong></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="sick__leave__used" class="form-group has-float-label">
                                            <input 
                                                type="number" 
                                                class="form-control" 
                                                id="sick__leave__used" 
                                                disabled
                                                name="sickLeaveUsed"
                                                value="">
                                            <span><strong>SL USED</strong></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="sick__leave__balance" class="form-group has-float-label">
                                            <input 
                                                type="number" 
                                                class="form-control" 
                                                id="sick__leave__balance" 
                                                disabled
                                                name="sickLeaveBalance"
                                                value="">
                                            <span><strong>SL BALANCE</strong></span>
                                        </label>
                                    </div>

                                    <div class="col-lg-12">
                                        <label for="total__balance" class="form-group has-float-label">
                                            <input 
                                                type="number" 
                                                class="form-control" 
                                                id="total__balance" 
                                                disabled 
                                                name="totalBalance"
                                                value="">
                                            <span><strong>TOTAL BALANCE</strong></span>
                                        </label>
                                    </div>

                                    <div class="col-lg-12 p-0 m-0">
                                        <hr>
                                    </div>

                                    <div class="col-lg-12">
                                        <label for="sick__leave__balance" class="form-group has-float-label mt-4">
                                            <input type="number" class="form-control" id="sick__leave__balance" disabled
                                                value="5" name="mandatoryLeaveBalance">
                                            <span><strong>MANDATORY LEAVE</strong></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-lg-12 col-sm-12 pl-0 pt-0">
                            <label for="commutation" class="form-group has-float-label">
                                <select 
                                    class="form-control" 
                                    id="commutation" 
                                    name="communication">
                                    <option readonly selected value="REQUESTED">REQUESTED</option>
                                    <option value="NOT REQUESTED">NOT REQUESTED</option>
                                </select>
                                <span><strong>COMMUTATION<span class="text-danger">*</span></strong></span>
                            </label>
                            <label for="recoApproval" class="form-group has-float-label">
                                <input 
                                    class="form-control" 
                                    name="recommendingApproval" 
                                    id="recommending__approval" 
                                    disabled
                                    value="">
                                <span><strong>RECOMMENDING APPROVAL<span class="text-danger">*</span></strong></span>
                            </label>
                            <label for="approveBy" class="form-group has-float-label">
                                <input 
                                    class="form-control" 
                                    name="approveBy" 
                                    id="approved__by" 
                                    disabled
                                    value="">
                                <span><strong>APPROVED BY<span class="text-danger">*</span></strong></span>
                            </label>
                            
                        </div>
                        <div class="text-right">
                            <button type="submit" class="text-white shadow btn btn-primary" id="btn__apply__for__leave">
                                <i class="la la-user-plus"></i> Apply for Leave
                            </button>
                        </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>


@push('page-scripts')
<script>

</script>
@endpush
@endsection
