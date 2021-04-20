@extends('layouts.app')
@section('title', 'Create PDS for ' . $employee->lastname . ', ' . $employee->firstname . ' ' . $employee->middlename . ' ' . $employee->extension)
@prepend('page-css')
<script src="{{ asset('/js/app.js') }}" defer></script>
@endprepend
@section('content')
    <exists-personal-information :employee="{{ $employee }}"></exists-personal-information>
@push('page-scripts')
@endpush
@endsection
