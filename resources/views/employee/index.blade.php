@extends('layouts.app')
@section('title', 'Employee Records')
@prepend('page-css')
<script src="{{ asset('/js/app.js') }}" defer></script>
@endprepend
@section('content')
    <employee></employee>
@push('page-scripts')
@endpush
@endsection
