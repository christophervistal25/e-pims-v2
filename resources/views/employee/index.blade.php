@extends('layouts.app')
@section('title', 'Employee Records')
@prepend('page-css')
<!-- Datatable CSS -->
@endprepend
@section('minisidebar', true)
@section('content')
    <employee></employee>
@push('page-scripts')
@endpush
@endsection
