@extends('layouts.app')
@section('title', 'Create Personal Data Sheet')
@prepend('page-css')
<style>

    .checkbox-parent {
        transition: background 300ms;
    }
    .checkbox-parent:hover {
        background :#EAEAEA;
    }
</style>
@endprepend
@section('content')

<div class="card">
    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-solid nav-justified">
            <li class="nav-item"><a class="nav-link active" href="#c1-tab" data-toggle="tab">C1</a></li>
            <li class="nav-item"><a class="nav-link" href="#c2-tab" data-toggle="tab">C2</a></li>
            <li class="nav-item"><a class="nav-link" href="#c3-tab" data-toggle="tab">C3</a></li>
            <li class="nav-item"><a class="nav-link " href="#c4-tab" data-toggle="tab">C4</a></li>
        </ul>
        <div class="tab-content">
            {{-- BEGIN OF C1 --}}
            <div class="tab-pane show active" id="c1-tab">
               @include('PersonalData.sections.C1')
            </div>
            {{-- END OF C1 --}}
            <div class="tab-pane" id="c2-tab">
                @include('PersonalData.sections.C2')
            </div>
            <div class="tab-pane" id="c3-tab">
                @include('PersonalData.sections.C3')
            </div>
            <div class="tab-pane" id="c4-tab">
                @include('PersonalData.sections.C4')
            </div>
        </div>
    </div>
</div>


@push('page-scripts')
<script src="/assets/js/custom/personaldatasheet/countries.js"></script>
<script src="/assets/js/custom/personaldatasheet/create-person-data.js"></script>
<script src="/assets/js/custom/personaldatasheet/same-address.js"></script>
@endpush
@endsection
