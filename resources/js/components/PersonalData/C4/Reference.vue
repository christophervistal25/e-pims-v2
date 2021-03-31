<template>
    <div>
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 p-2">
                    41. REFERENCES
                    <span class="text-danger text-sm"
                        >(Person not related by consanguinity or affinity to
                        applicant /appointee)</span
                    >
                </h5>
            </div>

            <div class="collapse show">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr class="text-center jumbotron text-sm">
                            <td>NAME</td>
                            <td>ADDRESS</td>
                            <td colspan="2">TEL. NO</td>
                        </tr>

                        <tbody>
                            <tr
                                v-for="(references, index) in references"
                                :key="index"
                            >
                                <td>
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0"
                                        placeholder="NAME"
                                        v-model="references.refName"
                                    />
                                </td>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0"
                                        placeholder="ADDRESS"
                                        v-model="references.refAdd"
                                    />
                                </td>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0"
                                        placeholder="TEL. NO"
                                        v-model="references.refTelNo"
                                    />
                                </td>

                                <td class="jumbotron text-center" colspan="2">
                                    <button
                                        v-show="index != 0"
                                        @click="removeField(index)"
                                        class="btn-sm btn-danger font-weight-bold"
                                    >
                                        X
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="float-right mb-3">
                        <button
                            class="btn btn-primary"
                            @click="addNewReferenceField"
                        >
                            <i class="fa fa-plus"></i>
                            Add new field
                        </button>

                        <button
                            class="btn btn-success"
                            @click="submitReferences"
                        >
                            <i class="fa fa-plus"></i>
                            NEXT

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
    data() {
        return {
            isLoading: false,
            isComplete: false,
            references: [
                {
                    refName: "",
                    refAdd: "",
                    refTelNo: ""
                }
            ]
        };
    },
    methods: {
        addNewReferenceField() {
            this.references.push({
                refName: "",
                refAdd: "",
                refTelNo: ""
            });
        },
        removeField(index) {
            if (index != 0) {
                this.references.splice(index, 1);
            }
        },
        submitReferences() {
            this.isLoading = true;
            window.axios
                .post("/employee/personal/references", this.references)
                .then(response => {
                    this.isLoading = false;
                    this.isComplete = true;
                    swal({
                        title: "Good job!",
                        text: "Min sulod na ang data!",
                        icon: "success"
                    });
                });
        }
    }
};
</script>

<style></style>
