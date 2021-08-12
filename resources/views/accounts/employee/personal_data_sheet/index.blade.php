@extends('accounts.employee.layouts.app-vue')
@section('title', 'YOUR PERSONAL DATA SHEET')
@prepend('page-css')
<script src="{{ asset('/js/app.js') }}" defer></script>

<style>
</style>
@endprepend
@section('content')
<div id="emp__profile">

    <div class="mb-3 float-right">
        {{-- <a href="#" class="btn btn-primary border-0 text-uppercase shadow-sm" style="background : #ff9b44;">
            <i class='la la-download'></i>
            Download
        </a> --}}
        <a href="{{ route('employee.personal-data-sheet.edit') }}" class="btn btn-success border-0 text-uppercase shadow-sm">
            <i class='la la-pencil'></i>
            Request Edit
        </a>
    </div>
    <div class="clearfix"></div>

    <div class="card mb-0 rounded-0 shadow-none">
        <view-information-summary :employee="{{ $employee }}"></view-information-summary>
    </div>
    <div class="row">
        <div class="col-md-6 d-flex">
            <div class="
                card
                profile-box
                flex-fill
                rounded-0 rounded-bottom
                border-top-0
            ">
                <view-personal-information :employee="{{ $employee }}"></view-personal-information>
            </div>
        </div>
        <div class="col-md-6 d-flex">
            <div class="
                card
                profile-box
                flex-fill
                rounded-0 rounded-bottom
                border-top-0
            ">
                <view-person-address :employee="{{ $employee }}"></view-person-address>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 d-flex">
            <div class="card profile-box flex-fill">
                <view-government-accounts :employee="{{ $employee }}"></view-government-accounts>
            </div>
        </div>
        <div class="col-md-6 d-flex">
            <div class="card profile-box flex-fill">
                <view-family-background :employee="{{ $employee }}"></view-family-background>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 d-flex">
            <div class="card profile-box flex-fill">
                <view-educational-background :employee="{{ $employee }}"></view-educational-background>
            </div>
        </div>
        <div class="col-md-6 d-flex">
            <div class="card profile-box flex-fill">
                <view-work-experience :employee="{{ $employee }}"></view-work-experience>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 d-flex">
            <div class="card profile-box flex-fill">
                <view-civil-service :employee="{{ $employee }}"></view-civil-service>
            </div>
        </div>

        <div class="col-md-6 d-flex">
            <div class="card profile-box flex-fill">
                <view-voluntary-work :employee="{{ $employee }}"></view-voluntary-work>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 d-flex">
            <div class="card profile-box flex-fill">
                <view-learning-and-development :employee="{{ $employee }}"></view-learning-and-development>
            </div>
        </div>

        <div class="col-md-6 d-flex">
            <div class="card profile-box flex-fill">
                <view-other-information :employee="{{ $employee }}"></view-other-information>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 d-flex">
            <div class="card profile-box flex-fill">
                <view-references :employee="{{ $employee }}"></view-references>
            </div>
        </div>
        <div class="col-md-6 d-flex">
            <div class="card profile-box flex-fill">
                <view-government-issued-id :employee="{{ $employee }}"></view-government-issued-id>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <view-relevant-queries :employee="{{ $employee }}"></view-relevant-queries>
        </div>
    </div>
</div>
@endsection
