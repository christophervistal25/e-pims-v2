@extends('layouts.app-vue')
@section('title', 'Personal Data Sheet')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('css/bootstrap-float-label.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
@endprepend
@section('content')
<personal-data-sheet :id="{{ $employeeID }}"></personal-data-sheet>
@endsection
