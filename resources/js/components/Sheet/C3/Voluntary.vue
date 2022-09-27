<template>
    <div class="card">
        <div class="card-header">
            <h5 class="p-2 mb-0">
                VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT /
                PEOPLE / VOLUNTARY ORGANIZATION/S
            </h5>
        </div>

        <div class="collapse show" id="voluntary">
            <div class="card-body">
                <p>Indicate <strong>N/A </strong>if not applicable</p>
                <table class="table table-bordered">
                    <tr class="text-center" style="background: #eaeaea">
                        <td></td>
                        <td
                            rowspan="2"
                            class="align-middle text-sm"
                            scope="colgroup"
                        >
                            NAME & ADDRESS OF ORGANIZATION (Write in full)
                        </td>
                        <td
                            colspan="2"
                            class="align-middle text-sm"
                            scope="colgroup"
                        >
                            INCLUSIVE DATES (mm/dd/yyyy)
                        </td>
                        <td
                            rowspan="2"
                            class="align-middle text-sm"
                            scope="colgroup"
                        >
                            NUMBER OF HOURS
                        </td>
                        <td
                            rowspan="2"
                            class="align-middle text-sm"
                            scope="colgroup"
                        >
                            POSITION / NATURE OF WORK
                        </td>
                        <td rowspan="2" class="align-middle text-sm">
                            <button
                                v-if="voluntaryWorkExperience.length === 0"
                                class="btn btn-primary rounded-circle shadow mt-1"
                                @click="addNewFieldVoluntary"
                            >
                                <i class="fa fa-plus"></i>
                            </button>
                        </td>
                    </tr>
                    <tr class="jumbotron">
                        <td></td>
                        <td scope="col" class="text-center text-sm">FROM</td>
                        <td scope="col" class="text-center text-sm">TO</td>
                    </tr>

                    <tbody>
                        <tr
                            v-for="(
                                voluntary, index
                            ) in voluntaryWorkExperience"
                            :key="index"
                        >
                            <td
                                v-if="
                                    rowErrors && rowErrors.includes(`${index}.`)
                                "
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
                                <div v-if="isComplete">
                                    <i class="text-success fas fa-check"></i>
                                </div>
                                <div v-else>
                                    {{ index + 1 }}
                                </div>
                            </td>
                            <td>
                                <input
                                    type="text"
                                    class="form-control rounded-0 border-0"
                                    :class="
                                        errors.hasOwnProperty(
                                            `${index}.name_and_address`
                                        )
                                            ? 'is-invalid'
                                            : ''
                                    "
                                    placeholder="NAME"
                                    v-model="voluntary.name_and_address"
                                    style="text-transform: uppercase"
                                />
                            </td>
                            <td>
                                <input
                                    type="date"
                                    class="form-control rounded-0 border-0"
                                    :class="
                                        errors.hasOwnProperty(
                                            `${index}.inclusive_date_from`
                                        )
                                            ? 'is-invalid'
                                            : ''
                                    "
                                    placeholder="FROM"
                                    v-model="voluntary.inclusive_date_from"
                                />
                            </td>
                            <td>
                                <input
                                    type="date"
                                    class="form-control rounded-0 border-0"
                                    :class="
                                        errors.hasOwnProperty(
                                            `${index}.inclusive_date_to`
                                        )
                                            ? 'is-invalid'
                                            : ''
                                    "
                                    placeholder="TO"
                                    v-model="voluntary.inclusive_date_to"
                                />
                            </td>
                            <td>
                                <input
                                    type="number"
                                    class="form-control rounded-0 border-0"
                                    :class="
                                        errors.hasOwnProperty(
                                            `${index}.no_of_hours`
                                        )
                                            ? 'is-invalid'
                                            : ''
                                    "
                                    placeholder="Hours"
                                    v-model="voluntary.no_of_hours"
                                />
                            </td>
                            <td>
                                <input
                                    type="text"
                                    class="form-control rounded-0 border-0"
                                    :class="
                                        errors.hasOwnProperty(
                                            `${index}.position`
                                        )
                                            ? 'is-invalid'
                                            : ''
                                    "
                                    placeholder="Position"
                                    v-model="voluntary.position"
                                    style="text-transform: uppercase"
                                />
                            </td>
                            <td class="text-center jumbotron">
                                <button
                                    class="btn btn-danger mt-1 rounded-circle"
                                    @click="removeField(index)"
                                >
                                    <i class="fa fa-times"></i>
                                </button>
                            </td>
                            <td class="text-center">
                                <button
                                    v-if="
                                        index ==
                                        voluntaryWorkExperience.length - 1
                                    "
                                    class="btn btn-primary rounded-circle shadow mt-1"
                                    @click="addNewFieldVoluntary"
                                >
                                    <i class="fa fa-plus"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="float-right mb-3">
                    <button
                        class="btn btn-success shadow"
                        :class="
                            Object.keys(errors).length != 0
                                ? 'btn-danger'
                                : 'btn-success'
                        "
                        @click="submitVoluntary"
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
</template>

<script>
import swal from "sweetalert";
export default {
    props: {
        employeeID: {
            required: true,
        },
    },
    data() {
        return {
            isLoading: false,
            isComplete: false,
            voluntaryWorkExperience: [
                {
                    name_and_address: "",
                    inclusive_date_from: "",
                    inclusive_date_to: "",
                    no_of_hours: "",
                    position: "",
                },
            ],
            errors: {},
            rowErrors: "",
        };
    },
    methods: {
        addNewFieldVoluntary() {
            this.voluntaryWorkExperience.push({
                name_and_address: "",
                inclusive_date_from: "",
                inclusive_date_to: "",
                no_of_hours: "",
                position: "",
            });
        },
        removeField(index) {
            swal({
                icon: "warning",
                text: "Are you sure you want to remove this record?",
                buttons: ["No", "Yes"],
                dangerMode: true,
            }).then((isClicked) => {
                if (isClicked) this.voluntaryWorkExperience.splice(index, 1);
            });
        },
        submitVoluntary() {
            this.isLoading = true;
            window.axios
                .post(
                    `/api/personal-data-sheet/voluntary-work/update/${this.employeeID}`,
                    this.voluntaryWorkExperience
                )
                .then((response) => {
                    if (response.status === 200) {
                        this.isLoading = false;
                        this.errors = {};
                        this.rowErrors = null;
                        this.isComplete = true;

                        let message = document.createElement('p');
                        message.innerHTML = 'Voluntary work has been updated successfully!';
                        message.setAttribute('class', 'text-dark text-center');

                        swal({
                            icon: "success",
                            content: message,
                            timer: 5000,
                            buttons: false,
                        });
                    }
                })
                .catch((error) => {
                    this.isLoading = false;
                    this.errors = {};
                    // Check the error status code.
                    if (error.response.status === 422) {
                        Object.keys(error.response.data.errors).map(
                            (field, index) => {
                                let [fieldMessage] =
                                    error.response.data.errors[field];
                                this.errors[field] = fieldMessage;
                            }
                        );
                        /* Merge all errors with join method for easily checking if an index of dynamic row is present or has error.*/
                        this.rowErrors = Object.keys(this.errors).join(",");
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
                title: "Opps!",
                icon: "error",
                buttons: false,
            });
        },
    },
    created() {
        window
            .axios(
                `/api/personal-data-sheet/voluntary-work/fetch/${this.employeeID}`
            )
            .then((response) => {
                if (response.data.length !== 0 && response.status === 200) {
                    this.voluntaryWorkExperience = response.data;
                }
            });
    },
};
</script>

<style></style>
