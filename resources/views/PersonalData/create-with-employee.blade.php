@extends('layouts.app-vue')
@section('title', 'Create PDS for ' . $employee->lastname . ', ' . $employee->firstname . ' ' . $employee->middlename . ' ' . $employee->extension)
@prepend('page-css')
<script src="{{ asset('/js/app.js') }}" defer></script>
<link rel="stylesheet" href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css"/>

@endprepend
@section('content')
    <exists-personal-information :employee="{{ $employee }}"></exists-personal-information>
@push('page-scripts')
@endpush
@endsection
