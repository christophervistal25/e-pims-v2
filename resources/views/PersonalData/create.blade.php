@extends('layouts.app-vue')
@section('title', 'Create Personal Data Sheet')
@prepend('page-css')
<script src="{{ asset('/js/app.js') }}" defer></script>
<link rel="stylesheet" href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css"/>
<style>
        body {
            font-family: 'Poppins', sans-serif;
        }

    </style>
@endprepend
@section('content')
    <personal-data-sheet></personal-data-sheet>
@push('page-scripts')
@endpush
@endsection
