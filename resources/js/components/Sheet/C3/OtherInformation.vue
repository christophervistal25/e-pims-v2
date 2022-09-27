<template>
    <div>
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 p-2">VIII. OTHER INFORMATION</h5>
            </div>

            <div class="collapse show" id="otherInformation">
                <div class="card-body">
                    <p>Indicate <strong>N/A </strong>if not applicable</p>
                    <table class="table table-bordered">
                        <tr class="text-center jumbotron">
                            <td>&nbsp;</td>
                            <td
                                rowspan="2"
                                class="align-middle text-sm"
                                scope="colgroup"
                            >
                                31. SPECIAL SKILLS and HOBBIES
                            </td>
                            <td
                                rowspan="2"
                                class="align-middle text-sm"
                                scope="colgroup"
                            >
                                32. NON-ACADEMIC DISTINCTIONS / RECOGNITION
                                (Write in full)
                            </td>
                            <td
                                rowspan="2"
                                class="align-middle text-sm"
                                scope="colgroup"
                            >
                                33. MEMBERSHIP IN ASSOCIATION/ORGANIZATION
                                (Write in full)
                            </td>
                            <td rowspan="2" class="align-middle">
                                <button
                                    v-if="otherInformation.length === 0"
                                    class="btn btn-primary font-weight-bold shadow rounded-circle"
                                    @click="addNewOtherInformationField"
                                >
                                    <i class="fa fa-plus"></i>
                                </button>
                            </td>
                        </tr>

                        <tbody>
                            <tr
                                v-for="(otherInfo, index) in otherInformation"
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
                                        :class="
                                            rowErrors.includes(
                                                `${index}.special_skill`
                                            )
                                                ? 'is-invalid'
                                                : ''
                                        "
                                        placeholder=""
                                        v-model="otherInfo.special_skill"
                                        style="text-transform: uppercase"
                                    />
                                </td>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0"
                                        :class="
                                            rowErrors.includes(
                                                `${index}.non_academic`
                                            )
                                                ? 'is-invalid'
                                                : ''
                                        "
                                        placeholder=""
                                        v-model="otherInfo.non_academic"
                                        style="text-transform: uppercase"
                                    />
                                </td>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0"
                                        :class="
                                            rowErrors.includes(
                                                `${index}.organization`
                                            )
                                                ? 'is-invalid'
                                                : ''
                                        "
                                        placeholder=""
                                        v-model="otherInfo.organization"
                                        style="text-transform: uppercase"
                                    />
                                </td>
                                <td class="jumbotron text-center align-middle">
                                    <button
                                        class="btn btn-danger font-weight-bold shadow rounded-circle"
                                        @click="removeField(index)"
                                    >
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                                <td class="text-center">
                                    <button
                                        v-if="
                                            index == otherInformation.length - 1
                                        "
                                        class="btn btn-primary font-weight-bold shadow rounded-circle"
                                        @click="addNewOtherInformationField"
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
                            @click="submitOtherInformation"
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
            otherInformation: [
                {
                    special_skill: "",
                    non_academic: "",
                    organization: "",
                },
            ],
            errors: [],
            rowErrors: "",
        };
    },
    methods: {
        addNewOtherInformationField() {
            this.isComplete = false;
            this.otherInformation.push({
                special_skill: "",
                non_academic: "",
                organization: "",
            });
        },
        skipSection() {},
        submitOtherInformation() {
            this.isLoading = true;
            window.axios
                .post(
                    `/api/personal-data-sheet/other-information/update/${this.employeeID}`,
                    this.otherInformation
                )
                .then((response) => {
                    if (response.status === 200) {
                        this.isComplete = true;
                        this.isLoading = false;
                        swal({
                            icon: "success",
                            text : 'Other information successfully updated!',
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
                dangerMode: true,
            });
        },
        removeField(index) {
            swal({
                icon: "warning",
                text: "Are you sure you want to remove this record?",
                buttons: ["No", "Yes"],
                dangerMode: true,
            }).then((isClicked) => {
                if (isClicked) this.otherInformation.splice(index, 1);
            });
        },
    },
    created() {
        window
            .axios(
                `/api/personal-data-sheet/other-information/fetch/${this.employeeID}`
            )
            .then((response) => {
                if (response.status === 200 && response.data.length !== 0) {
                    this.otherInformation = response.data;
                }
            });
    },
};
</script>

<style></style>
