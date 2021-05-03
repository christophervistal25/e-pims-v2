@extends('layouts.app-vue')
@section('title', 'Employee Records')
@prepend('page-css')
<script src="{{ asset('/js/app.js') }}" defer></script>
<link rel="stylesheet" href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css"/>
@endprepend
@section('content')
    <employee></employee>
@push('page-scripts')
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
@endpush
@endsection
