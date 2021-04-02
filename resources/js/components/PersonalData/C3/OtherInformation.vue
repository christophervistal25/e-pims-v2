<template>
    <div>
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 p-2">
                    VIII. OTHER INFORMATION
                    <span
                    v-show="isComplete"
                    :class="isComplete ? 'text-success' : 'text-danger'"
                >
                    - VERIFIED</span
                >
                </h5>
            </div>

            <div class="collapse" :class="!isComplete && show_panel ? 'show' : ''">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr class="text-center" style="background: #EAEAEA;">
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
                            <td rowspan="2" class="align-middle">&nbsp;</td>
                        </tr>

                        <tbody>
                            <tr
                                v-for="(otherInfo, index) in otherInformation"
                                :key="index"
                            >
                                <td>
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0"
                                        placeholder=""
                                        v-model="otherInfo.skill"
                                    />
                                </td>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0"
                                        placeholder=""
                                        v-model="otherInfo.recog"
                                    />
                                </td>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0"
                                        placeholder=""
                                        v-model="otherInfo.memAssociation"
                                    />
                                </td>
                                <td class="jumbotron text-center">
                                    <button
                                        v-show="index != 0"
                                        class="btn btn-sm btn-danger font-weight-bold mt-2 rounded-circle"
                                        @click="removeField(index)"
                                    >
                                        X
                                    </button>
                                </td>
                                <td class='text-center'>
                                    <button
                                        v-if="index == noOfFields - 1"
                                        class="btn btn-primary font-weight-bold rounded-circle"
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
                            class="btn btn-primary font-weight-bold"
                            @click="submitOtherInformation"
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
    props : {
        show_panel : {
            required : true,
        }
    },
    data() {
        return {
            isLoading: false,
            isComplete: false,
            noOfFields : 0,
            otherInformation: [
                {
                    skill: "",
                    recog: "",
                    memAssociation: "",
                    employee_id : localStorage.getItem('employee_id'),
                }
            ]
        };
    },
    watch : {
        otherInformation(from, to) {
            this.noOfFields = to.length;
        }
    },
    methods: {
        addNewOtherInformationField() {
            this.otherInformation.push({
                skill: "",
                recog: "",
                memAssociation: "",
                employee_id : localStorage.getItem('employee_id'),
            });
        },
        submitOtherInformation() {
            this.isLoading = true;
            window.axios
                .post(
                    "/employee/personal/other/information",
                    this.otherInformation
                )
                .then(response => {
                    this.isComplete = true;
                    this.isLoading = false;
                    this.$emit("next_tab");
                    swal({
                        title: "Good job!",
                        text: "Min sulod na ang data!",
                        icon: "success"
                    });
                });
        },
        removeField(index) {
            if (index !== 0) {
                this.otherInformation.splice(index, 1);
            }
        }
    },
    created() {
        this.noOfFields = this.otherInformation.length;
    }
};
</script>

<style></style>
