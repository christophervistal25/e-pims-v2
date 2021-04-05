@extends('layouts.app')
@section('title', 'List of Employees')
@prepend('page-css')
<!-- Datatable CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
@endprepend
@section('content')
    <employee-records></employee-records>
@push('page-scripts')
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
@endpush
@endsection
