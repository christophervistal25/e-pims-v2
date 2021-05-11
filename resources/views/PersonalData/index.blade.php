@extends('layouts.app-vue')
@section('title', 'PERSONAL DATA SHEET')
@prepend('page-css')
<script src="{{ asset('/js/app.js') }}" defer></script>
@endprepend
@section('content')
    <employee-pds-table/>
@push('page-scripts')
<script src="{{ asset('/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
@endpush
@endsection
