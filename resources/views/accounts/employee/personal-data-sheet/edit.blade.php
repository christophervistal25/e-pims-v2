@extends('accounts.employee.layouts.app-vue')
@section('title', 'Your Personal Data Sheet')
@prepend('page-css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/tonystar/bootstrap-float-label@v4.0.2/bootstrap-float-label.min.css" />
@endprepend
@section('content')
<personal-data-sheet :id="{{ $employeeID }}"></personal-data-sheet>
@endsection
