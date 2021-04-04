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
                    <i v-if="isComplete" class="fa fa-check text-success"></i>
                    GOVERNMENT ISSUED ID
                    <i v-if="isComplete" class="text-success float-right fa fa-caret-down" aria-hidden="true"></i>
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
                            class="btn btn-primary font-weight-bold"
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
        removeSavedItemsInStorage() {
            localStorage.removeItem('learning');
            localStorage.removeItem('voluntary');
            localStorage.removeItem('family_background');
            localStorage.removeItem('educational_background');
            localStorage.removeItem('relevant_queries');
            localStorage.removeItem('civil_service');
            localStorage.removeItem('other_information');
            localStorage.removeItem('employee_id');
            localStorage.removeItem('work_experience');
            localStorage.removeItem('personal_information');
            localStorage.removeItem('references');
        },
        submitIssuedID() {
            this.isLoading = true;
            window.axios
                .post("/employee/personal/issued/id", this.governmentId)
                .then(response => {
                    this.isComplete = true;
                    this.isLoading = false;
                    this.removeSavedItemsInStorage();
                    swal({
                        title: "Good job!",
                        text: "Successfully create new personal data sheet",
                        icon: "success"
                    });
                })
                .catch(err => (this.isLoading = false));
        }
    }
};
</script>
