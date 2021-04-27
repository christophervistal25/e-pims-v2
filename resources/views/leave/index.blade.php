@extends('layouts.app-vue')
@section('title', 'Leave Application')
@prepend('page-css')
<script src="{{ asset('/js/app.js') }}" defer></script>
@endprepend
@section('content')
    <div class="row">
        <div class="col-lg-3 d-none">
            <leave-search></leave-search>
        </div>
        <div class="col-lg-12">
            <leave-content></leave-content>
        </div>
    </div>
@push('page-scripts')
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
@endpush
@endsection
