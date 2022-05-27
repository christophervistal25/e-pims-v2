@extends('layouts.app-vue')
@section('content')
<div id="emp__profile">
     <div class="clearfix"></div>
     <div class="card mb-0 rounded-0 shadow-none">
          <view-information-summary :id_number="{{ $idNumber }}"></view-information-summary>
     </div>
</div>
@endsection
