<template>
    <div>
        <div class="card">
            <div
                class="card-header"
                :data-target="isComplete ? '#government' : ''"
                :data-toggle="isComplete ? 'collapse' : ''"
                :style="isComplete ? 'cursor : pointer;' : ''"
            >
                <h5 class="mb-0 p-2">
                    GOVERNMENT ISSUED ID
                    <span
                        v-show="isComplete"
                        :class="isComplete ? 'text-success' : 'text-danger'"
                    >
                        - VERIFIED
                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                    </span>
                </h5>
            </div>

            <div
                class="collapse"
                :class="!isComplete && show_panel ? 'show' : ''"
                :id="isComplete ? 'government' : ''"
            >
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr
                            class="text-center text-sm"
                            style="background: #EAEAEA;"
                        >
                            <td>Government Issued ID</td>
                            <td>ID/License/Passport No.</td>
                            <td>Date/Place of Issuance</td>
                        </tr>

                        <tbody>
                            <tr>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0"
                                        placeholder=""
                                        v-model="governmentId.nameOfGovId"
                                    />
                                </td>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0"
                                        placeholder=""
                                        v-model="governmentId.idNo"
                                    />
                                </td>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0"
                                        placeholder=""
                                        v-model="governmentId.dateOfIssuance"
                                    />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <diva class="float-right mb-3">
                        <button
                            class="btn btn-primary"
                            @click="submitIssuedID"
                            :disabled="isLoading"
                        >
                            FINAL TOUCH
                            <div
                                class="spinner-border spinner-border-sm mb-1"
                                v-show="isLoading"
                                role="status"
                            >
                                <span class="sr-only">Loading...</span>
                            </div>
                        </button>
                    </diva>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        show_panel: {
            required: true
        }
    },
    data() {
        return {
            isComplete: false,
            isLoading: false,
            governmentId: {
                nameOfGovId: "",
                idNo: "",
                dateOfIssuance: "",
                employee_id: localStorage.getItem("employee_id")
            }
        };
    },
    methods: {
        submitIssuedID() {
            this.isLoading = true;
            window.axios
                .post("/employee/personal/issued/id", this.governmentId)
                .then(response => {
                    this.isComplete = true;
                    this.isLoading = false;
                    swal({
                        title: "Good job!",
                        text: "Min sulod na ang data!",
                        icon: "success"
                    });
                })
                .catch(err => (this.isLoading = false));
        }
    }
};
</script>
