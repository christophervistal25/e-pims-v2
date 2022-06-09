<template>
    <div>
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 p-2">
                    VII. LEARNING AND DEVELOPMENT (L&D) INTERVENTIONS/TRAINING
                    PROGRAMS ATTENDED
                </h5>
            </div>

            <div class="collapse show" id="learning">
                <div class="card-body">
                    <div
                        class="alert alert-info text-center"
                        style="text-transform: uppercase"
                    >
                        <strong
                            >(Start from the most recent
                            L&D/training program and include only the relevant
                            L&D/training taken for the last five (5) years for
                            Division Chief/Executive/Managerial
                            positions)</strong
                        >
                    </div>
                    <p>Indicate <strong>N/A </strong>if not applicable</p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr
                                class="text-center text-sm"
                                style="background: #eaeaea"
                            >
                                <td></td>
                                <td
                                    rowspan="2"
                                    class="align-middle text-sm"
                                    scope="colgroup"
                                >
                                    TITLE OF LEARNING AND DEVELOPMENT
                                    INTERVENTIONS/TRAINING PROGRAMS (Write in
                                    full)
                                </td>
                                <td
                                    colspan="2"
                                    class="align-middle text-sm"
                                    scope="colgroup"
                                >
                                    INCLUSIVE DATES OF ATTENDANCE (mm/dd/yyyy)
                                </td>
                                <td
                                    rowspan="2"
                                    class="align-middle text-sm"
                                    scope="colgroup"
                                >
                                    NUMBES OF HOURS
                                </td>
                                <td
                                    rowspan="2"
                                    class="align-middle text-sm"
                                    scope="colgroup"
                                >
                                    Type of LD(Managerial/
                                    Supervisory/Technical/etc)
                                </td>
                                <td
                                    rowspan="2"
                                    class="align-middle text-sm"
                                    scope="colgroup"
                                >
                                    CONDUCTED/ SPONSORED (Write in full)
                                </td>
                                <td rowspan="2" class="align-middle">
                                    <button
                                        v-if="learnDev.length === 0"
                                        class="btn btn-primary rounded-circle font-weight-bold mt-1"
                                        @click="
                                            addNewLearningAndDevelopmentField
                                        "
                                    >
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr style="background: #eaeaea">
                                <td></td>
                                <td scope="col" class="text-center text-sm">
                                    FROM
                                </td>
                                <td scope="col" class="text-center text-sm">
                                    TO
                                </td>
                            </tr>

                            <tbody>
                                <tr
                                    v-for="(
                                        learningAndDevelopment, index
                                    ) in learnDev"
                                    :key="index"
                                >
                                    <td
                                        v-if="
                                            rowErrors &&
                                            rowErrors.includes(`${index}.`)
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
                                            <i
                                                class="fas fa-check text-success"
                                            ></i>
                                        </div>
                                        <div v-else>
                                            {{ index + 1 }}
                                        </div>
                                    </td>
                                    <td>
                                        <input
                                            type="text"
                                            class="form-control rounded-0 border-0"
                                            placeholder="NAME"
                                            v-model="
                                                learningAndDevelopment.title
                                            "
                                            :class="
                                                errors.hasOwnProperty(
                                                    `${index}.title`
                                                )
                                                    ? 'is-invalid'
                                                    : ''
                                            "
                                            style="text-transform: uppercase"
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="date"
                                            class="form-control rounded-0 border-0"
                                            :class="
                                                errors.hasOwnProperty(
                                                    `${index}.date_of_attendance_from`
                                                )
                                                    ? 'is-invalid'
                                                    : ''
                                            "
                                            placeholder="date_of_attendance_from"
                                            v-model="
                                                learningAndDevelopment.date_of_attendance_from
                                            "
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="date"
                                            class="form-control rounded-0 border-0"
                                            :class="
                                                errors.hasOwnProperty(
                                                    `${index}.date_of_attendance_to`
                                                )
                                                    ? 'is-invalid'
                                                    : ''
                                            "
                                            placeholder="TO"
                                            v-model="
                                                learningAndDevelopment.date_of_attendance_to
                                            "
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="number"
                                            class="form-control rounded-0 border-0"
                                            :class="
                                                errors.hasOwnProperty(
                                                    `${index}.number_of_hours`
                                                )
                                                    ? 'is-invalid'
                                                    : ''
                                            "
                                            placeholder="Hours"
                                            v-model="
                                                learningAndDevelopment.number_of_hours
                                            "
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="text"
                                            class="form-control rounded-0 border-0"
                                            :class="
                                                errors.hasOwnProperty(
                                                    `${index}.type_of_id`
                                                )
                                                    ? 'is-invalid'
                                                    : ''
                                            "
                                            placeholder=""
                                            v-model="
                                                learningAndDevelopment.type_of_id
                                            "
                                            style="text-transform: uppercase"
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="text"
                                            class="form-control rounded-0 border-0"
                                            :class="
                                                errors.hasOwnProperty(
                                                    `${index}.sponsored_by`
                                                )
                                                    ? 'is-invalid'
                                                    : ''
                                            "
                                            placeholder=""
                                            v-model="
                                                learningAndDevelopment.sponsored_by
                                            "
                                            style="text-transform: uppercase"
                                        />
                                    </td>
                                    <td class="jumbotron">
                                        <button
                                            @click="removeField(index)"
                                            class="btn btn-danger font-weight-bold mt-2 rounded-circle"
                                        >
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <button
                                            v-if="index == learnDev.length - 1"
                                            class="btn btn-primary rounded-circle font-weight-bold mt-1"
                                            @click="
                                                addNewLearningAndDevelopmentField
                                            "
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
                            class="btn btn-success shadow"
                            :class="
                                Object.keys(errors).length != 0
                                    ? 'btn-danger'
                                    : 'btn-success'
                            "
                            @click="submitLearningAndDevelopment"
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
            isComplete: false,
            noOfFields: 0,
            learnDev: [
                {
                    title: "",
                    date_of_attendance_from: "",
                    date_of_attendance_to: "",
                    number_of_hours: "",
                    type_of_id: "",
                    sponsored_by: "",
                },
            ],
            errors: {},
            rowErrors: "",
        };
    },
    methods: {
        addNewLearningAndDevelopmentField() {
            this.learnDev.push({
                title: "",
                date_of_attendance_from: "",
                date_of_attendance_to: "",
                number_of_hours: "",
                type_of_id: "",
                sponsored_by: "",
            });
        },
        removeField(index) {
            swal({
                icon: "warning",
                text: "Are you sure you want to remove this record?",
                buttons: ["No", "Yes"],
            }).then((isClicked) => {
                if (isClicked) this.learnDev.splice(index, 1);
            });
        },
        submitLearningAndDevelopment() {
            this.isLoading = true;
            window.axios
                .post(
                    `/api/personal-data-sheet/learning-and-development/update/${this.employeeID}`,
                    this.learnDev
                )
                .then((response) => {
                    this.isLoading = false;
                    this.isComplete = true;
                    this.errors = {};
                    this.rowErrors = null;
                    if (response.status === 200) {
                        swal({
                            icon: "success",
                            text: "You successfully store all you data you input in Learning and Development Involvement",
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
                dangerMode: true,
            });
        },
    },
    created() {
        window
            .axios(
                `/api/personal-data-sheet/learning-and-development/fetch/${this.employeeID}`
            )
            .then((response) => {
                if (response.status === 200 && response.data.length !== 0) {
                    // Store
                    this.learnDev = response.data;
                }
            });
    },
};
</script>

<style></style>
