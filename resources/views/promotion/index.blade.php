@extends('layouts.app')
@section('title', 'Promotions')
@prepend('page-css')
<style>
      .btn-primarys {
            background-color: #FF9B44;
            color: white;
      }

      .btn-primarys:hover {
            background-color: #FF8544;
            color: white;
      }

</style>
@endprepend
@section('content')
<button class='btn btn-primarys shadow float-right mb-3'>
      <i class='fas fa-plus-circle'></i>
      New Promotion
</button>
<div class="clearfix"></div>
<div class="card">
      <div class="card-body">

      </div>
</div>
@push('page-scripts')
@endpush
@endsection
