@extends('layouts.app')
@section('title', 'Create Personal Data Sheet')
@prepend('page-css')
{{-- CSS HERE --}}
@endprepend
@section('content')

<div class="card">
    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-solid nav-justified">
            <li class="nav-item"><a class="nav-link active" href="#c1-tab" data-toggle="tab">C1</a></li>
            <li class="nav-item"><a class="nav-link" href="#c2-tab" data-toggle="tab">C2</a></li>
            <li class="nav-item"><a class="nav-link" href="#c3-tab" data-toggle="tab">C3</a></li>
            <li class="nav-item"><a class="nav-link" href="#c4-tab" data-toggle="tab">C4</a></li>
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
            <div class="tab-pane show active" id="c3-tab">
                @include('PersonalData.sections.C3')
            </div>
            <div class="tab-pane" id="c4-tab">
                @include('PersonalData.sections.C4')
            </div>
        </div>
    </div>
</div>

@push('page-scripts')
<script>
    let civilServiceDynamicRowIndex           = 0;
    let workExperienceDynamicRowIndex         = 0;
    let voluntaryDynamicRowIndex              = 0;
    let learningAndDevelopmentDynamicRowIndex = 0;
    let otherInformationDynamicRowIndex = 0;

    // This will add new table row for civil service in C2 TAB
    $('#btnAddNewFieldCivilServiceRow').click((e) => {
        civilServiceDynamicRowIndex++;
        let rowID = `row-cilvil-service-${civilServiceDynamicRowIndex}`;
        $('#dynamic-row-civil-service-data').append(`
            <tr id='${rowID}'>
                <th scope="row">
                    <input type="text" class="form-control rounded-0 border-0" placeholder="Input here...">
                </th>
                <td>
                    <input type="number" class="form-control rounded-0 border-0" placeholder="e.g. 91.2">
                </td>
                <td>
                    <input type="date" class="form-control rounded-0 border-0" placeholder="Input">
                </td>
                <td>
                    <input type="text" class="form-control rounded-0 border-0" placeholder="e.g Tandag">
                </td>

                <td>
                    <input type="text" class="form-control rounded-0 border-0" placeholder="e.g. 2015">
                </td>
                <td>
                    <input type="text" class="form-control rounded-0 border-0" placeholder="e.g. 2016">
                </td>
                <td class='align-middle'>
                    <button class="btn btn-sm rounded-pill btn-danger align-middle text-center" data-target="${rowID}">
                        <i class='fa fa-times' style="pointer-events :none;"></i>
                    </button>
                </td>
            </tr>
        `);
    });


    // Add new table row for work experience in C2 TAB
    $('#btnAddNewWorkExperienceRow').click((e) => {
        workExperienceDynamicRowIndex++;
        let rowID = `row-work-experience-${workExperienceDynamicRowIndex}`
        $('#dynamic-row-work-experience-data').append(`
            <tr id="${rowID}">
                <th scope="row">
                    <input type="date" class="form-control rounded-0 border-0" placeholder="FROM">
                </th>
                <td>
                    <input type="date" class="form-control rounded-0 border-0" placeholder="TO">
                </td>
                <td>
                    <input type="text" class="form-control rounded-0 border-0" placeholder="Input">
                </td>
                <td>
                    <input type="text" class="form-control rounded-0 border-0" placeholder="e.g Tandag">
                </td>

                <td>
                    <input type="text" class="form-control rounded-0 border-0" placeholder="">
                </td>
                <td>
                    <input type="text" class="form-control rounded-0 border-0" placeholder="">
                </td>
                <td>
                    <input type="text" class="form-control rounded-0 border-0" placeholder="">
                </td>
                <td>
                    <input type="text" class="form-control rounded-0 border-0" placeholder="">
                </td>
                <td class='align-middle'>
                    <button class="btn btn-sm rounded-pill btn-danger align-middle text-center" data-target="${rowID}">
                        <i class='fa fa-times' style="pointer-events :none;"></i>
                    </button>
                </td>
            </tr>
        `);
    });

    // Add new table row for voluntary in C3 tab
    $('#btnAddNewFieldVoluntaryRow').click((e) => {
        voluntaryDynamicRowIndex++;
        let rowID = `row-voluntary-${voluntaryDynamicRowIndex}`;
        $( "#dynamic-row-voluntary-data" ).append(`
            <tr id="${rowID}">
                <th scope="row">
                    <input type="text" class="form-control rounded-0 border-0" placeholder="NAME">
                </th>
                <td>
                    <input type="date" class="form-control rounded-0 border-0" placeholder="">
                </td>
                <td>
                    <input type="date" class="form-control rounded-0 border-0" placeholder="TO">
                </td>
                <td>
                    <input type="numbe" class="form-control rounded-0 border-0" placeholder="Hours">
                </td>
                <td>
                    <input type="text" class="form-control rounded-0 border-0" placeholder="Position">
                </td>
                <td class='align-middle'>
                    <button class="btn btn-sm rounded-pill btn-danger align-middle text-center" data-target="${rowID}">
                        <i class='fa fa-times' style="pointer-events :none;"></i>
                    </button>
                </td>
            </tr>
        `);
    });

     // Add new table row for learning and development in C3 tab
    $('#btnAddNewFieldLearningAndDevelopmentRow').click((e) => {
        learningAndDevelopmentDynamicRowIndex++;
        let rowID = `row-learning-and-development-${learningAndDevelopmentDynamicRowIndex}`;
        $('#dynamic-row-learning-and-development-data').append(`
            <tr id="${rowID}">
                <td>
                    <input type="text" class="form-control rounded-0 border-0" placeholder="NAME">
                </td>
                <td>
                    <input type="date" class="form-control rounded-0 border-0" placeholder="FROM">
                </td>
                <td>
                    <input type="date" class="form-control rounded-0 border-0" placeholder="TO">
                </td>
                <td>
                    <input type="number" class="form-control rounded-0 border-0" placeholder="Hours">
                </td>
                <td>
                    <input type="text" class="form-control rounded-0 border-0" placeholder="">
                </td>
                <td>
                <input type="text" class="form-control rounded-0 border-0" placeholder="">
                </td>
                <td>
                    <button class="btn btn-sm rounded-pill btn-danger align-middle text-center" data-target="${rowID}">
                        <i class='fa fa-times' style="pointer-events :none;"></i>
                    </button>
                </td>
            </tr>
        `);
    });

    $('#btnAddNewFieldOtherInformation').click((e) => {
        otherInformationDynamicRowIndex++;
        let rowID = `row-other-information-${otherInformationDynamicRowIndex}`;
        $('#dynamic-row-other-information-data').append(`
            <tr id="${rowID}">
                <td>
                    <input type="text" class="form-control rounded-0 border-0" placeholder="Input">
                </td>
                <td>
                    <input type="text" class="form-control rounded-0 border-0" placeholder="Input">
                </td>
                <td>
                    <input type="text" class="form-control rounded-0 border-0" placeholder="Input">
                </td>
                <td>
                    <button class="btn btn-sm rounded-pill btn-danger align-middle text-center" data-target="${rowID}">
                        <i class='fa fa-times' style="pointer-events :none;"></i>
                    </button>
                </td>
            </tr>
        `);
    });

    // Capture the click event inside of DOM
    $(document).on( "click", (e) => {
        let button = e.target;
        // Get the data target of button
        let target = $(button).attr('data-target');

        // Check if data target has value
        if(target) {
            // Remove the row.
            $(`#${target}`).remove();
        }
    });


</script>
@endpush
@endsection
