    let civilServiceDynamicRowIndex           = 0;
    let workExperienceDynamicRowIndex         = 0;
    let voluntaryDynamicRowIndex              = 0;
    let learningAndDevelopmentDynamicRowIndex = 0;
    let otherInformationDynamicRowIndex       = 0;
    let referencesDynamicRowIndex             = 0;
    let spouseDynamicRowIndex                 = 0;

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

    $('#btnAddNewReferenceField').click((e) => {
        referencesDynamicRowIndex++;
        let rowID = `row-reference-${referencesDynamicRowIndex}`;
        $('#dynamic-row-references-data').append(`
            <tr id="${rowID}">
                <td>
                <input type="text" class="form-control rounded-0 border-0" placeholder="NAME">
                </td>
                <td>
                    <input type="text" class="form-control rounded-0 border-0" placeholder="ADDRESS">
                </td>
                <td>
                    <input type="text" class="form-control rounded-0 border-0" placeholder="TEL. NO">
                </td>
                <td class='text-center align-middle'>
                    <button class="btn btn-sm rounded-pill btn-danger align-middle text-center" data-target="${rowID}">
                        <i class='fa fa-times' style="pointer-events :none;"></i>
                    </button>
                </td>
            </tr>
        `);
    });

    // Function for generating new spouse field in spouse family background section. 
    
    $('#generateNewSpouseField').click((e) => {
        spouseDynamicRowIndex++;
        let rowID = `dynamic-row-spouse-${spouseDynamicRowIndex}`;
        $('#dynamic-row-for-spouse').append(`
        <div class='row pl-3 pr-3' id='${rowID}'>
            <div class="form-group col-lg-6">
                    <label for="stelno">NAME OF CHILDREN</label>
					<input type="text" class="form-control" id="stelno" placeholder="Enter Name of Children">
            </div>
            <div class="form-group col-lg-5">
                <label for="stelno">DATE OF BIRTH</label>
                <input type="date" class="form-control" id="stelno" placeholder="Enter Spouse's Business Address">
            </div>

            <div class="col-lg-1">
                <button class="btn btn-danger rounded-circle btn-sm mt-4" data-target="${rowID}">
                    <i class="fa fa-times" style='pointer-events:none;'></i>
                </button>
            </div>
        </div>
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

    // Function for clicking table cell with checkbox child element.
    $('td').click((e) => {
        let CHECKBOX_INDEX = 0;

        // Get the element
        let clickedCell = $(e.target);
        // Check if clicked element has class attribute checkbox-parent.
        if($(clickedCell).attr('class').includes('checkbox-parent')) {
            let checkboxElement = $(clickedCell).find('input')[CHECKBOX_INDEX];
            if($(checkboxElement).is(':checked')) {
                $(checkboxElement).prop('checked', false)
            } else {
                $(checkboxElement).prop('checked', true)
            }
        }

    });

