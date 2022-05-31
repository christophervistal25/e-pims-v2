@extends('layouts.app')
@section('title', 'Promotions')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link rel="stylesheet" href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />
<link rel="stylesheet" href="/assets/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/assets/css/style.css">
@endprepend
@section('content')
<div class="content container-fluid">
     <div class="kanban-board card shadow mb-0">
          <div class="card-body">

          </div>
     </div>
</div>
@endsection
