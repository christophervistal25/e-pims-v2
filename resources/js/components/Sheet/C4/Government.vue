<template>
    <div>
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 p-2">
                    GOVERNMENT ISSUED ID
                    <i
                        class="text-success float-right fa fa-caret-down"
                        aria-hidden="true"
                    ></i>
                </h5>
            </div>

            <div class="collapse show" id="government">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr class="text-center text-sm jumbotron">
                            <td></td>
                            <td>Government Issued ID</td>
                            <td>ID/License/Passport No.</td>
                            <td>Date/Place of Issuance</td>
                        </tr>

                        <tbody>
                            <tr>
                                <td
                                    class="align-middle text-center bg-danger text-white"
                                    style="cursor: pointer"
                                    v-if="Object.keys(errors).length !== 0"
                                    @click="
                                        Object.keys(errors).length !== 0 &&
                                            displayErrorMessage()
                                    "
                                >
                                    <i
                                        class="fa fa-exclamation-triangle"
                                        aria-hidden="true"
                                    ></i>
                                </td>
                                <td v-else></td>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0"
                                        placeholder="e.g Philhealth"
                                        :class="
                                            errors.hasOwnProperty('id_type')
                                                ? 'is-invalid'
                                                : ''
                                        "
                                        v-model="governmentId.id_type"
                                        style="text-transform: uppercase"
                                    />
                                </td>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0"
                                        :class="
                                            errors.hasOwnProperty('id_no')
                                                ? 'is-invalid'
                                                : ''
                                        "
                                        placeholder="Enter ID Number"
                                        v-model="governmentId.id_no"
                                    />
                                </td>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0"
                                        :class="
                                            errors.hasOwnProperty('date')
                                                ? 'is-invalid'
                                                : ''
                                        "
                                        placeholder=""
                                        v-model="governmentId.date"
                                        style="text-transform: uppercase"
                                    />
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
                            @click="submitIssuedID"
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
            isComplete: false,
            isLoading: false,
            governmentId: {
                id_type: "",
                id_no: "",
                date: "",
            },
            errors: {},
        };
    },
    methods: {
        displayErrorMessage() {
            let parentElement = document.createElement("ul");

            for (let [field, error] of Object.entries(this.errors)) {
                let errorElement = document.createElement("p");
                let horizontalLine = document.createElement("hr");
                errorElement.innerHTML = error;
                parentElement.appendChild(errorElement);
                parentElement.appendChild(horizontalLine);
            }

            swal({
                content: parentElement,
                title: "Opps!",
                icon: "error",
                dangerMode: true,
            });
        },
        submitIssuedID() {
            this.isLoading = true;
            window.axios
                .post(
                    `/api/personal-data-sheet/government-issued-id/update/${this.employeeID}`,
                    this.governmentId
                )
                .then((response) => {
                    if (response.status === 200) {
                        this.errors = {};
                        this.isComplete = true;
                        this.isLoading = false;
                        swal({
                            text: "Successfully store all your inputs in Government Issued I.D",
                            icon: "success",
                            buttons : false,
                            timer : 5000,
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
                    }
                });
        },
    },
    created() {
        window
            .axios(
                `/api/personal-data-sheet/government-issued-id/fetch/${this.employeeID}`
            )
            .then((response) => {
                if (response.status === 200 && response.data.length !== 0) {
                    this.governmentId = response.data;
                }
            });
    },
};
</script>
