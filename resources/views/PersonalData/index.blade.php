@extends('layouts.app')
@section('title', 'Generate PDS')
@prepend('page-css')
<script src="{{ asset('/js/app.js') }}" defer></script>
@endprepend
@section('content')
    <employee-records></employee-records>
@endsection
