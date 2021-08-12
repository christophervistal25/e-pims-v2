@extends('accounts.employee.layouts.app-vue')
@section('title', 'EDIT YOUR PERSONAL DATA SHEET')
@prepend('page-css')
<script src="{{ asset('/js/app.js') }}" defer></script>
<link rel="stylesheet" href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css"/>
<style>
</style>
@endprepend
@section('content')
    <div>
        <create-with-existing-employee :employee="{{ $employee }}"></create-with-existing-employee>
    </div>
@endsection
