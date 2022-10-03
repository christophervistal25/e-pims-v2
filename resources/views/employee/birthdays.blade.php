@extends('layouts.app')
@section('title', 'Employees Birthday')
@prepend('page-css')
<link rel="stylesheet" href="/assets/css/style.css" />
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .btn-primary {
        background: #ff9b44 !important;
        border-color: #ff9b44 !important;
    }


    #employeesBirthdateContainer {
        overflow-y: 'hidden';
    }

</style>
@endprepend
@section('content')
<div class="row filter-row">
    <div class="col-sm-6 col-md-5">
        <label class="h5">Start Date</label>
        <div class="form-group">
            <input type="date" id="fromDate" class="form-control" value="{{  $currentDate->format('Y-m-d') }}">
            <span class='text-danger text-sm' id="fromDateErrorMessage"></span>
        </div>
    </div>
    <div class="col-sm-6 col-md-5">
        <label class="h5">End Date</label>
        <div class="form-group">
            <input type="date" id="toDate" class="form-control" value="{{ $currentDate->format('Y-m-d') }}">
            <span class='text-danger text-sm' id="toDateErrorMessage"></span>
        </div>
    </div>
    <div class="col-sm-6 col-md-2">
        <p></p>
        <button id="searchBirthRange" class="mt-4 btn btn-sm btn-block btn-primary h5"><i class="fa fa-search-plus"></i>&nbsp;&nbsp; Search</button>
    </div>
</div>
</div>

<div class="row p-3" id="employeesBirthdateContainer">
</div>

@push('page-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('/assets/js/custom/birthdays.js') }}"></script>
@endpush
@endsection
