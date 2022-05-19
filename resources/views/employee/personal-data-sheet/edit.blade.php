@extends('layouts.app-vue')
@prepend('page-css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/tonystar/bootstrap-float-label@v4.0.2/bootstrap-float-label.min.css" />
<link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
@endprepend
@section('content')
<personal-data-sheet :id="{{ $employeeID }}"></personal-data-sheet>
@endsection
