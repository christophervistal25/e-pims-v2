<template>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 p-2">V. WORK EXPERIENCE</h5>
        </div>

        <div class="collapse show" id="workExperience">
            <div class="card-body">
                <div class="alert alert-info text-center" role="alert">
                    Include private employment. Start from your recent work.
                </div>
                <p>Indicate <strong>N/A </strong>if not applicable</p>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr class="text-center jumbotron">
                            <td class="p-4"></td>
                            <td colspan="2" scope="colgroup" class="text-sm">
                                28. INCLUSIVE DATES (mm/dd/yyyy)
                            </td>
                            <td rowspan="2" class="align-middle text-sm">
                                POSITION TITLE (Write in full/Do not abbreviate)
                            </td>
                            <td rowspan="2" class="align-middle text-sm">
                                DEPARTMENT / AGENCY / OFFICE / COMPANY (Write in
                                full/Do not abbreviate)
                            </td>
                            <td rowspan="2" class="align-middle text-sm">
                                MONTHLY SALARY
                            </td>
                            <td rowspan="2" class="align-middle text-sm">
                                SALARY/ JOB/ PAY GRADE <br />
                                (if applicable) <br />
                                & STEP (Format "00-0")/ INCREMENT
                            </td>
                            <td rowspan="2" class="align-middle text-sm">
                                STATUS OF APPOINTMENT
                            </td>

                            <td rowspan="2" class="align-middle text-sm">
                                GOV'T SERVICE <strong>(Y/ N)</strong>
                            </td>
                            <td rowspan="2" class="pl-4 pr-4 align-middle">
                                <div v-if="workExperience.length === 0">
                                    <button
                                        class="btn btn-primary font-weight-bold mt-1 shadow rounded-circle"
                                        @click="btnAddNewWorkExperienceField"
                                    >
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="jumbotron">
                            <td class="p-4"></td>
                            <td scope="col" class="text-center text-sm">
                                FROM
                            </td>
                            <td scope="col" class="text-center text-sm">TO</td>
                        </tr>

                        <tbody>
                            <tr
                                v-for="(experience, index) in workExperience"
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
                                        type="date"
                                        class="form-control rounded-0 border-0"
                                        placeholder="FROM"
                                        :class="
                                            errors.hasOwnProperty(
                                                `${index}.from`
                                            )
                                                ? 'is-invalid'
                                                : ''
                                        "
                                        v-model="experience.from"
                                    />
                                </td>
                                <td>
                                    <input
                                        type="date"
                                        class="form-control rounded-0 border-0"
                                        :class="
                                            errors.hasOwnProperty(`${index}.to`)
                                                ? 'is-invalid'
                                                : ''
                                        "
                                        placeholder="TO"
                                        v-model="experience.to"
                                    />
                                    <!-- <p class="text-danger text-sm">
                                    {{ errors[`${index}.to`] }}
                                </p> -->
                                </td>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0"
                                        placeholder="Input"
                                        v-model="experience.position_title"
                                        :class="
                                            errors.hasOwnProperty(
                                                `${index}.position_title`
                                            )
                                                ? 'is-invalid'
                                                : ''
                                        "
                                        style="text-transform: uppercase"
                                    />
                                    <!-- <p class="text-danger text-sm">
                                    {{ errors[`${index}.position_title`] }}
                                </p> -->
                                </td>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0"
                                        placeholder="e.g Tandag"
                                        v-model="experience.office"
                                        :class="
                                            errors.hasOwnProperty(
                                                `${index}.office`
                                            )
                                                ? 'is-invalid'
                                                : ''
                                        "
                                        style="text-transform: uppercase"
                                    />
                                    <!-- <p class="text-danger text-sm">
                                    {{ errors[`${index}.office`] }}
                                </p> -->
                                </td>

                                <td>
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0"
                                        style="text-transform: uppercase"
                                        placeholder=""
                                        :class="
                                            errors.hasOwnProperty(
                                                `${index}.monthly_salary`
                                            )
                                                ? 'is-invalid'
                                                : ''
                                        "
                                        v-model="experience.monthly_salary"
                                    />
                                    <!-- <p class="text-danger text-sm">
                                    {{ errors[`${index}.monthly_salary`] }}
                                </p> -->
                                </td>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0"
                                        style="text-transform: uppercase"
                                        placeholder=""
                                        :class="
                                            errors.hasOwnProperty(
                                                `${index}.salary_job_pay_grade`
                                            )
                                                ? 'is-invalid'
                                                : ''
                                        "
                                        v-model="
                                            experience.salary_job_pay_grade
                                        "
                                    />
                                    <!-- <p class="text-danger text-sm">
                                    {{ errors[`${index}.salary_job_pay_grade`] }}
                                </p> -->
                                </td>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0"
                                        :class="
                                            errors.hasOwnProperty(
                                                `${index}.status_of_appointment`
                                            )
                                                ? 'is-invalid'
                                                : ''
                                        "
                                        placeholder="e.g J.O"
                                        v-model="
                                            experience.status_of_appointment
                                        "
                                        style="text-transform: uppercase"
                                    />
                                    <!-- <p class="text-danger text-sm">
                                    {{ errors[`${index}.status_of_appointment`] }}
                                </p> -->
                                </td>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0 text-uppercase"
                                        :class="
                                            errors.hasOwnProperty(
                                                `${index}.government_service`
                                            )
                                                ? 'is-invalid'
                                                : ''
                                        "
                                        maxlength="1"
                                        placeholder=""
                                        v-model="experience.government_service"
                                    />
                                    <!-- <p class="text-danger text-sm">
                                    {{ errors[`${index}.government_service`] }}
                                </p> -->
                                </td>
                                <td class="jumbotron align-middle">
                                    <button
                                        class="btn btn-danger mt-2 rounded-circle shadow"
                                        @click="removeField(index)"
                                    >
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                                <td class="align-middle">
                                    <button
                                        v-if="
                                            index == workExperience.length - 1
                                        "
                                        class="btn btn-primary font-weight-bold mt-1 shadow rounded-circle"
                                        @click="btnAddNewWorkExperienceField"
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
                        @click="submitWorkExperience"
                        :class="
                            Object.keys(errors).length != 0
                                ? 'btn-danger'
                                : 'btn-success'
                        "
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
            isComplete: false,
            isLoading: false,
            workExperience: [
                {
                    from: "",
                    to: "",
                    position_title: "",
                    office: "",
                    monthly_salary: "",
                    salary_job_pay_grade: "",
                    status_of_appointment: "",
                    government_service: "",
                },
            ],
            errors: {},
            rowErrors: "",
        };
    },
    methods: {
        btnAddNewWorkExperienceField() {
            this.workExperience.push({
                from: "",
                to: "",
                position_title: "",
                office: "",
                monthly_salary: "",
                salary_job_pay_grade: "",
                status_of_appointment: "",
                government_service: "",
            });
        },
        submitWorkExperience() {
            this.isLoading = true;
            window.axios
                .post(
                    `/api/personal-data-sheet/work-experience/update/${this.employeeID}`,
                    this.workExperience
                )
                .then((response) => {
                    this.isLoading = false;
                    this.isComplete = true;
                    this.rowErrors = "";
                    this.errors = {};
                    if (response.status === 200) {
                        swal({
                            icon: "success",
                            text: "Work Experience has been updated successfully!",
                            buttons: false,
                            timer: 5000,
                        });
                    }
                })
                .catch((error) => {
                    this.isLoading = false;
                    this.errors = {};
                    this.rowErrors = "";
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
        removeField(index) {
            swal({
                icon: "warning",
                text: "Are you sure you want to remove this record?",
                buttons: ["No", "Yes"],
                dangerMode: true,
            }).then((isClicked) => {
                if (isClicked) {
                    this.workExperience.splice(index, 1);
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
                `/api/personal-data-sheet/work-experience/fetch/${this.employeeID}`
            )
            .then((response) => {
                if (response.status === 200 && response.data.length !== 0) {
                    this.workExperience = response.data;
                }
            });
    },
};
</script>

<style></style>
