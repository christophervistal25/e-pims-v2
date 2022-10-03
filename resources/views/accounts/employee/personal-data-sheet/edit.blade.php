@extends('accounts.employee.layouts.app-vue')
@section('title', 'Your Personal Data Sheet')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('/css/bootstrap-float-label.min.css') }}" />
@endprepend
@section('content')
<personal-data-sheet :id="{{ $employeeID }}"></personal-data-sheet>
@endsection
