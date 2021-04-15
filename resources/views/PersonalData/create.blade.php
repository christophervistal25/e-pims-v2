@extends('layouts.app')
@section('title', 'Create Personal Data Sheet')
@prepend('page-css')
<script src="{{ asset('/js/app.js') }}" defer></script>
@endprepend
@section('content')
    <personal-data-sheet></personal-data-sheet>
@push('page-scripts')
@endpush
@endsection
