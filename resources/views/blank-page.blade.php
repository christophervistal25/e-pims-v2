﻿@extends('layouts.app')
@section('title', 'Employee')
@prepend('page-css')
{{-- CSS HERE --}}
@endprepend
@section('content')
<h1>Hello , World</h1>
@push('page-scripts')
{{-- JS SCRIPTS HERE --}}
@endpush
@endsection
