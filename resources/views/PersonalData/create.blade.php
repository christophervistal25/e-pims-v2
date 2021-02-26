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
            <li class="nav-item"><a class="nav-link" href="#c1-tab" data-toggle="tab">C1</a></li>
            <li class="nav-item"><a class="nav-link" href="#c2-tab" data-toggle="tab">C2</a></li>
            <li class="nav-item"><a class="nav-link" href="#c3-tab" data-toggle="tab">C3</a></li>
            <li class="nav-item"><a class="nav-link active" href="#c4-tab" data-toggle="tab">C4</a></li>
        </ul>
        <div class="tab-content">
            {{-- BEGIN OF C1 --}}
            <div class="tab-pane" id="c1-tab">
                {{-- BEGIN OF ACCORDION FOR C1 --}}
                <div id="accordion">
                    <div class="card">
                      <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                          <button class="btn btn-link" data-toggle="collapse" data-target="#personalInformation" aria-expanded="true" aria-controls="personalInformation">
                            PERSONAL INFORMATION
                          </button>
                        </h5>
                      </div>

                      <div id="personalInformation" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                          Personal Information
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#workExperience" aria-expanded="false" aria-controls="workExperience">
                            FAMILY BACKGROUND
                          </button>
                        </h5>
                      </div>
                      <div id="workExperience" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            Family Background
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#educationalBackground" aria-expanded="false" aria-controls="educationalBackground">
                            EDUCATIONAL BACKGROUND
                          </button>
                        </h5>
                      </div>
                      <div id="educationalBackground" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            Educational Background
                        </div>
                      </div>
                    </div>
                  </div>
                {{-- END OF ACCORDION FOR C1 --}}
            </div>
            {{-- END OF C1 --}}
            <div class="tab-pane" id="c2-tab">
                @include('PersonalData.sections.C2')
            </div>
            <div class="tab-pane" id="c3-tab">
                @include('PersonalData.sections.C3')
            </div>
            <div class="tab-pane show active" id="c4-tab">
                @include('PersonalData.sections.C4')
            </div>
        </div>
    </div>
</div>

@push('page-scripts')
<script src="/assets/js/custom/create-person-data.js"></script>
@endpush
@endsection
