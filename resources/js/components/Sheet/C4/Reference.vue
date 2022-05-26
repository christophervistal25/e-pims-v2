<template>
    <div>
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 p-2">
                    <i v-if="isComplete" class="fa fa-check text-success"></i>
                    41. REFERENCES
                    <span class="text-danger text-sm"
                        >(Person not related by consanguinity or affinity to
                        applicant /appointee)</span
                    >
                    <i
                        v-if="isComplete"
                        class="text-success float-right fa fa-caret-down"
                        aria-hidden="true"
                    ></i>
                </h5>
            </div>

            <div class="collaps show" id="reference">
                <div class="card-body">
                    <p>Indicate <strong>N/A </strong>if not applicable</p>
                    <table class="table table-bordered">
                        <tr class="text-center jumbotron text-sm">
                            <td></td>
                            <td>NAME</td>
                            <td>ADDRESS</td>
                            <td colspan="2">TEL. NO</td>
                            <td>
                                <button
                                    v-if="references.length === 0"
                                    class="btn btn-primary font-weight-bold rounded-circle"
                                    @click="addNewReferenceField"
                                >
                                    <i class="fa fa-plus"></i>
                                </button>
                            </td>
                        </tr>

                        <tbody>
                            <tr
                                v-for="(reference, index) in references"
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
                                <td v-else class="align-middle text-center">
                                    {{ index + 1 }}
                                </td>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0"
                                        :class="
                                            rowErrors.includes(`${index}.name`)
                                                ? 'is-invalid'
                                                : ''
                                        "
                                        placeholder="NAME"
                                        v-model="reference.name"
                                        style="text-transform: uppercase"
                                    />
                                </td>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0"
                                        placeholder="ADDRESS"
                                        v-model="reference.address"
                                        style="text-transform: uppercase"
                                    />
                                </td>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0"
                                        placeholder="TEL. NO"
                                        v-model="reference.telephone_number"
                                    />
                                </td>

                                <td class="jumbotron text-center">
                                    <button
                                        @click="removeField(index)"
                                        class="btn btn-danger font-weight-bold rounded-circle"
                                    >
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                                <td class="text-center">
                                    <button
                                        v-if="
                                            index == references.length - 1 &&
                                            references.length <= 2
                                        "
                                        class="btn btn-primary font-weight-bold rounded-circle"
                                        @click="addNewReferenceField"
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
                            @click="submitReferences"
                            :disabled="isLoading"
                            :class="
                                Object.keys(errors).length === 0
                                    ? 'btn-success'
                                    : 'btn-danger'
                            "
                        >
                            <i class="la la-check" v-if="isComplete"></i>
                            <i class="la la-pencil" v-else></i>

                            <span v-if="isComplete">UPDATED</span>
                            <span v-else>UPDATE</span>
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
            references: [
                {
                    name: "",
                    address: "",
                    telephone_number: "",
                },
            ],
            errors: [],
            rowErrors: "",
        };
    },

    methods: {
        addNewReferenceField() {
            if (this.references.length <= 2) {
                this.references.push({
                    name: "",
                    address: "",
                    telephone_number: "",
                });
            }
        },
        removeField(index) {
            swal({
                icon: "warning",
                text: "Are you sure you want to remove this record?",
                buttons: ["No", "Yes"],
                dangerMode: true,
            }).then((isClicked) => {
                if (isClicked) {
                    this.references.splice(index, 1);
                }
            });
        },
        submitReferences() {
            this.errors = {};
            this.rowErrors = "";
            this.isLoading = true;
            window.axios
                .post(
                    `/api/personal-data-sheet/references/update/${this.employeeID}`,
                    this.references
                )
                .then((response) => {
                    if (response.status === 200) {
                        this.isComplete = true;
                        this.isLoading = false;
                        swal({
                            icon: "success",
                            text: "Successfully store all your inputs in references",
                            buttons: false,
                            timer: 5000,
                        });
                    }
                })
                .catch((error) => {
                    this.isLoading = false;
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
                `/api/personal-data-sheet/references/fetch/${this.employeeID}`
            )
            .then((response) => {
                if (response.status === 200 && response.data.length !== 0) {
                    this.references = response.data;
                }
            });
    },
};
</script>

<style></style>
