@extends('layouts.app')
@section('title', 'Create PDS for ' . $employee->lastname . ', ' . $employee->firstname . ' ' . $employee->middlename . ' ' . $employee->extension)
@prepend('page-css')
<script src="{{ asset('/js/app.js') }}" defer></script>
@endprepend
@section('content')
    <personal-data-sheet-with-employee :employee="{{ $employee }}"></personal-data-sheet-with-employee>
@push('page-scripts')
@endpush
@endsection
