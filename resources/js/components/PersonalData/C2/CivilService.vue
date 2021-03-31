<template>
    <div>
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 p-2">
                    IV. Civil Service Egibility
                    <span
                        v-show="isComplete"
                        :class="isComplete ? 'text-success' : 'text-danger'"
                    >
                        - VERIFIED</span
                    >
                </h5>
            </div>

            <div class="collapse" :class="!isComplete ? 'show' : ''">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr class="text-center" style="background: #EAEAEA;">
                            <td rowspan="2" class="align-middle">
                                27. CAREER SERVICE/ RA 1080 (BOARD/ BAR) UNDER
                                SPECIAL LAWS/ CES/ CSEE BARANGAY ELIGIBILITY /
                                DRIVER'S LICENSE
                            </td>
                            <td rowspan="2" class="align-middle">RATING</td>
                            <td rowspan="2" class="align-middle">
                                DATE OF EXAMINATION / CONFERMENT
                            </td>
                            <td rowspan="2" class="align-middle">
                                PLACE OF EXAMINATION / CONFERMENT
                            </td>
                            <td colspan="2" scope="colgroup">LICENSE</td>
                            <td rowspan="2" class="pl-4 pr-4">&nbsp;</td>
                        </tr>
                        <tr style="background: #EAEAEA;">
                            <td scope="col" class="text-center">NUMBER</td>
                            <td scope="col" class="text-center">
                                Date of Validity
                            </td>
                        </tr>

                        <tbody>
                            <tr
                                v-for="(civil, index) in civilService"
                                :key="index"
                            >
                                <th scope="row">
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0"
                                        placeholder="Input here..."
                                        v-model="civil.careerServ"
                                    />
                                </th>
                                <td>
                                    <input
                                        type="number"
                                        class="form-control rounded-0 border-0"
                                        placeholder="e.g. 91.2"
                                        v-model="civil.rating"
                                    />
                                </td>
                                <td>
                                    <input
                                        type="date"
                                        class="form-control rounded-0 border-0"
                                        placeholder="Input"
                                        v-model="civil.dateOfExam"
                                    />
                                </td>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0"
                                        placeholder="e.g Tandag"
                                        v-model="civil.placeOfExam"
                                    />
                                </td>

                                <td>
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0"
                                        placeholder="e.g. 2015"
                                        v-model="civil.number"
                                    />
                                </td>
                                <td>
                                    <input
                                        type="date"
                                        class="form-control rounded-0 border-0"
                                        placeholder="e.g. 2016"
                                        v-model="civil.dateOfValid"
                                    />
                                </td>
                                <td class="jumbotron">
                                    <button
                                        v-show="index != 0"
                                        @click="removeField(index)"
                                        class="btn btn-sm btn-danger font-weight-bold mt-1 rounded-circle"
                                    >
                                        X
                                    </button>
                                </td>
                                <td>
                                    <button
                                        v-if="index == civilService.length - 1"
                                        class="btn btn-primary rounded-circle font-weight-bold"
                                        @click="addNewFieldCivilServiceRow"
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
                            @click="submitCivilService"
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
        employee_id: {
            required: true
        }
    },
    data() {
        return {
            isComplete: false,
            isLoading: false,
            civilService: [
                {
                    number: "",
                    placeOfExam: "",
                    dateOfExam: "",
                    rating: "",
                    careerServ: "",
                    number: "",
                    dateOfValid: "",
                    employee_id: this.employee_id
                }
            ]
        };
    },
    methods: {
        addNewFieldCivilServiceRow() {
            this.civilService.push({
                number: "",
                placeOfExam: "",
                dateOfExam: "",
                rating: "",
                careerServ: "",
                number: "",
                dateOfValid: "",
                employee_id: this.employee_id
            });
        },
        submitCivilService() {
            this.isLoading = true;
            window.axios
                .post("/employee/personal/civil/service", this.civilService)
                .then(response => {
                    this.isLoading = false;
                    this.isComplete = true;
                    this.$emit("display-work-experience", this.employee_id);
                    swal({
                        title: "Good job!",
                        text: "Min sulod na ang data!",
                        icon: "success"
                    });
                })
                .catch(err => {});
        },
        removeField(index) {
            if (index != 0) {
                this.civilService.splice(index, 1);
            }
        }
    }
};
</script>
