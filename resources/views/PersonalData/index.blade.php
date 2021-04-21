@extends('layouts.app-vue')
@section('title', 'Generate PDS')
@prepend('page-css')
<script src="{{ asset('/js/app.js') }}" defer></script>
@endprepend
@section('content')
    <employee-records></employee-records>
@push('page-scripts')
<script src="{{ asset('/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
@endpush
@endsection
