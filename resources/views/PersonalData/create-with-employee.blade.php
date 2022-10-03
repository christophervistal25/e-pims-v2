@extends('layouts.app-vue')
@section('title', 'EDIT PDS OF  ' . $employee->lastname . ', ' . $employee->firstname . ' ' . $employee->middlename . ' ' . $employee->extension)
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script src="{{ asset('/js/app.js') }}" defer></script>
<link rel="stylesheet" href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css"/>
@endprepend
@section('content')
    <div id='pds__container'>
        <create-with-existing-employee :employee="{{ $employee }}"></create-with-existing-employee>
    </div>
@push('page-scripts')
<script>
        function exitConfirmation() {
            return 'Are you sure to leave this page?';
        }
    </script>
@endpush
@endsection
