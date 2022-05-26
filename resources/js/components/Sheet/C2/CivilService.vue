<template>
    <div>
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 p-2">IV. CIVIL SERVICE ELIGIBILITY</h5>
            </div>

            <div class="collapse show" id="civilService">
                <div class="card-body">
                    <p>
                        Indicate <strong>N/A </strong>or
                        <strong>LEAVE BLANK</strong> if not applicable
                    </p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr class="text-center jumbotron">
                                <td rowspan="2">&nbsp;</td>
                                <td rowspan="2" class="align-middle text-sm">
                                    27. CAREER SERVICE/ RA 1080 (BOARD/ BAR)
                                    UNDER SPECIAL LAWS/ CES/ CSEE BARANGAY
                                    ELIGIBILITY / DRIVER'S LICENSE
                                </td>
                                <td rowspan="2" class="align-middle text-sm">
                                    RATING
                                    <span class="text-secondary"
                                        >(If Applicable)</span
                                    >
                                </td>
                                <td rowspan="2" class="align-middle text-sm">
                                    DATE OF EXAMINATION / CONFERMENT
                                </td>
                                <td rowspan="2" class="align-middle text-sm">
                                    PLACE OF EXAMINATION / CONFERMENT
                                </td>
                                <td
                                    colspan="2"
                                    scope="colgroup"
                                    class="text-sm"
                                >
                                    LICENSE
                                    <span class="text-secondary"
                                        >(If Applicable)</span
                                    >
                                </td>
                                <td rowspan="2" class="pl-4 pr-4 align-middle">
                                    <div v-if="civilService.length === 0">
                                        <button
                                            class="btn btn-primary rounded-circle font-weight-bold mt-1 shadow"
                                            @click="addNewFieldCivilServiceRow"
                                        >
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="jumbotron">
                                <td scope="col" class="text-center text-sm">
                                    License Number
                                </td>
                                <td scope="col" class="text-center text-sm">
                                    Date of Validity
                                </td>
                            </tr>

                            <tbody>
                                <tr
                                    v-for="(civil, index) in civilService"
                                    :key="index"
                                >
                                    <td
                                        v-if="rowErrors.includes(`${index}.`)"
                                        @click="
                                            rowErrors.includes(`${index}.`) &&
                                                displayRowErrorMessage(index)
                                        "
                                        class="align-middle text-center"
                                        :style="
                                            rowErrors.includes(`${index}.`)
                                                ? 'cursor:pointer'
                                                : ''
                                        "
                                        :class="
                                            rowErrors.includes(`${index}.`)
                                                ? 'bg-danger text-white'
                                                : ''
                                        "
                                    >
                                        <i
                                            class="fa fa-exclamation-triangle"
                                            aria-hidden="true"
                                        ></i>
                                    </td>
                                    <td v-else class="text-center align-middle">
                                        {{ index + 1 }}
                                    </td>
                                    <td scope="row">
                                        <input
                                            type="text"
                                            class="form-control rounded-0 border-0"
                                            placeholder="Input here..."
                                            v-model="civil.career_service"
                                            :class="
                                                errors.hasOwnProperty(
                                                    `${index}.career_service`
                                                )
                                                    ? 'border is-invalid'
                                                    : ''
                                            "
                                            style="text-transform: uppercase"
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="text"
                                            class="form-control rounded-0 border-0"
                                            placeholder="e.g. 91.2%"
                                            :class="
                                                errors.hasOwnProperty(
                                                    `${index}.rating`
                                                )
                                                    ? 'border is-invalid'
                                                    : ''
                                            "
                                            v-model="civil.rating"
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="date"
                                            class="form-control rounded-0 border-0"
                                            :class="
                                                errors.hasOwnProperty(
                                                    `${index}.date_of_examination`
                                                )
                                                    ? 'border is-invalid'
                                                    : ''
                                            "
                                            placeholder="Input"
                                            v-model="civil.date_of_examination"
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="text"
                                            class="form-control rounded-0 border-0"
                                            placeholder="e.g Tandag"
                                            :class="
                                                errors.hasOwnProperty(
                                                    `${index}.place_of_examination`
                                                )
                                                    ? 'border is-invalid'
                                                    : ''
                                            "
                                            v-model="civil.place_of_examination"
                                            style="text-transform: uppercase"
                                        />
                                    </td>

                                    <td>
                                        <input
                                            type="license_number"
                                            class="form-control rounded-0 border-0"
                                            v-model="civil.license_number"
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="date"
                                            class="form-control rounded-0 border-0"
                                            placeholder="e.g. 2016"
                                            v-model="civil.date_of_validitiy"
                                        />
                                    </td>
                                    <td class="jumbotron">
                                        <button
                                            @click="removeField(index)"
                                            class="btn btn-danger font-weight-bold mt-1 rounded-circle shadow"
                                        >
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <button
                                            v-if="
                                                index == civilService.length - 1
                                            "
                                            class="btn btn-primary rounded-circle font-weight-bold mt-1 shadow"
                                            @click="addNewFieldCivilServiceRow"
                                        >
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="float-right mb-3">
                        <button
                            class="btn btn-primary shadow"
                            :class="
                                Object.keys(errors).length != 0
                                    ? 'btn-danger'
                                    : 'btn-success'
                            "
                            @click="submitCivilService"
                            :disabled="isLoading"
                        >
                            <i class="la la-pencil"></i>
                            UPDATE
                            <div
                                class="spinner-border spinner-border-sm mb-1"
                                v-show="isLoading"
                                role="status"
                            >
                                <span class="sr-only">Loading...</span>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        employeeID: {
            required: true,
        },
    },
    data() {
        return {
            isLoading: false,
            civilService: [
                {
                    place_of_examination: "",
                    date_of_examination: "",
                    rating: "",
                    career_service: "",
                    license_number: "",
                    date_of_validitiy: "",
                },
            ],
            errors: {},
            rowErrors: "",
        };
    },
    methods: {
        addNewFieldCivilServiceRow() {
            this.civilService.push({
                place_of_examination: "",
                date_of_examination: "",
                rating: "",
                career_service: "",
                license_number: "",
                date_of_validitiy: "",
            });
        },
        submitCivilService() {
            this.isLoading = true;
            window.axios
                .post(
                    `/api/personal-data-sheet/civil-service-eligibility/update/${this.employeeID}`,
                    this.civilService
                )
                .then((response) => {
                    this.isLoading = false;
                    this.errors = {};
                    this.rowErrors = "";
                    if (response.status === 200) {
                        swal({
                            icon: "success",
                            text: "Successfully store all your inputs in civil service eligibility",
                            buttons: false,
                            timer: 5000,
                        });
                    }
                })
                .catch((error) => {
                    this.isLoading = false;
                    this.errors = {};
                    // Check the error status code.
                    if (error.response.status === 422) {
                        Object.keys(error.response.data.errors).map((field) => {
                            let [fieldMessage] =
                                error.response.data.errors[field];
                            this.errors[field] = fieldMessage;
                        });
                        /* Merge all errors with join method for easily checking if an index of dynamic row is present or has error.*/
                        this.rowErrors = Object.keys(this.errors).join(",");
                    }
                });
        },
        removeField(index) {
            swal({
                icon: "warning",
                text: "Are you sure you want to remove this record?",
                dangerMode: true,
                buttons: ["No", "Yes"],
            }).then((isClicked) => {
                if (isClicked) {
                    this.civilService.splice(index, 1);
                }
            });
        },
        displayRowErrorMessage(index) {
            let parentElement = document.createElement("ul");

            for (let [field, error] of Object.entries(this.errors)) {
                if (field.includes(`${index}.`)) {
                    let errorElement = document.createElement("p");
                    let horizontalLine = document.createElement("hr");
                    errorElement.innerHTML = error;
                    parentElement.appendChild(errorElement);
                    parentElement.appendChild(horizontalLine);
                }
            }

            swal({
                content: parentElement,
                icon: "error",
                dangerMode: true,
                buttons: false,
                timer: 5000,
            });
        },
    },
    created() {
        window
            .axios(
                `/api/personal-data-sheet/civil-service-eligibility/fetch/${this.employeeID}`
            )
            .then((response) => {
                if (response.data.length !== 0) {
                    this.civilService = response.data;
                }
            });
    },
};
</script>
