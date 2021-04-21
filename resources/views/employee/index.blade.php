@extends('layouts.app-vue')
@section('title', 'Employee Records')
@prepend('page-css')
<script src="{{ asset('/js/app.js') }}" defer></script>
@endprepend
@section('content')
    <employee></employee>
@push('page-scripts')
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
@endpush
@endsection
