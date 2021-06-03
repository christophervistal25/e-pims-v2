@extends('layouts.app-vue')
@section('title', 'Create PDS for ' . $employee->lastname . ', ' . $employee->firstname . ' ' . $employee->middlename . ' ' . $employee->extension)
@prepend('page-css')
<script src="{{ asset('/js/app.js') }}" defer></script>
<link rel="stylesheet" href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css"/>
<style>
    #pds__container {
        font-family: 'Poppins', sans-serif;
    }
</style>
@endprepend
@section('content')
    <div id='pds__container'>
        <create-with-existing-employee :employee="{{ $employee }}"></create-with-existing-employee>
    </div>
@push('page-scripts')
@endpush
@endsection
