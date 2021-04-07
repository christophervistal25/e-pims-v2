<template>
    <div>
        <div class="card">
            <div
                class="card-header"
                :data-target="isComplete ? '#reference' : ''"
                :data-toggle="isComplete ? 'collapse' : ''"
                :style="isComplete ? 'cursor : pointer;' : ''"
            >
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

            <div
                class="collapse"
                :class="!isComplete && show_panel ? 'show' : ''"
                :id="isComplete ? 'reference' : ''"
            >
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
                                        style="text-transform:uppercase"
                                    />
                                </td>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0"
                                        placeholder="ADDRESS"
                                        v-model="references.refAdd"
                                        style="text-transform:uppercase"
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

                                <td class="jumbotron text-center">
                                    <button
                                        v-show="index != 0"
                                        @click="removeField(index)"
                                        class="btn btn-danger font-weight-bold rounded-circle"
                                    >
                                        X
                                    </button>
                                </td>
                                <td class="text-center">
                                    <button
                                        v-if="index == noOfFields - 1"
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
                            class="btn btn-danger font-weight-bold"
                            @click="skipSection"
                            v-if="!isComplete"
                            :disabled="isLoading"
                        >
                            SKIP
                        </button>
                        <button
                            class="btn btn-primary font-weight-bold"
                            @click="submitReferences"
                            :disabled="isLoading"
                            v-if="!isComplete"
                        >
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
import swal from "sweetalert";
export default {
    props: {
        show_panel: {
            required: true
        }
    },
    data() {
        return {
            isLoading: false,
            isComplete: false,
            noOfFields: 0,
            references: [
                {
                    refName: "",
                    refAdd: "",
                    refTelNo: "",
                    employee_id: localStorage.getItem("employee_id")
                }
            ]
        };
    },
    watch: {
        references(from, to) {
            this.noOfFields = to.length;
        }
    },
    methods: {
        addNewReferenceField() {
            this.references.push({
                refName: "",
                refAdd: "",
                refTelNo: "",
                employee_id: localStorage.getItem("employee_id")
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
                    localStorage.setItem(
                        "references",
                        JSON.stringify(response.data)
                    );
                    this.$emit("display-issued-id");
                })
                .catch(err => (this.isLoading = false));
        },
        skipSection() {
            this.isComplete = true;
            this.$emit("display-issued-id");
        }
    },
    created() {
        this.noOfFields = this.references.length;
    },
    mounted() {
        if (localStorage.getItem("references")) {
            this.references = JSON.parse(localStorage.getItem("references"));
            this.isComplete = true;
            this.$emit("display-issued-id");
        }
    }
};
</script>

<style></style>
