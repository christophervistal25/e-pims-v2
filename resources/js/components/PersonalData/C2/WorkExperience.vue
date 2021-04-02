<template>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 p-2">
                V. WORK EXPERIENCE
                <span
                    v-show="isComplete"
                    :class="isComplete ? 'text-success' : 'text-danger'"
                >
                    - VERIFIED</span
                >
            </h5>
        </div>

        <div
            class="collapse"
            :class="work_experience && !isComplete ? 'show' : ''"
        >
            <div class="card-body">
                <table class="table table-bordered">
                    <tr class="text-center" style="background: #EAEAEA;">
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
                        <td rowspan="2" class="align-middle text-sm">MONTHLY SALARY</td>
                        <td rowspan="2" class="align-middle text-sm">
                            SALARY/ JOB/ PAY GRADE <br />
                            (if applicable) <br />
                            & STEP (Format "00-0")/ INCREMENT
                        </td>
                        <td rowspan="2" class="align-middle text-sm">
                            STATUS OF APPOINTMENT
                        </td>

                        <td rowspan="2" class="align-middle text-sm">
                            GOV'T SERVICE (Y/ N)
                        </td>
                        <td rowspan="2" class="pl-4 pr-4">&nbsp;</td>
                    </tr>

                    <tr style="background: #EAEAEA;">
                        <td scope="col" class="text-center text-sm">FROM</td>
                        <td scope="col" class="text-center text-sm">TO</td>
                    </tr>

                    <tbody>
                        <tr
                            v-for="(workExperience, index) in workExperience"
                            :key="index"
                        >
                            <th scope="row">
                                <input
                                    type="date"
                                    class="form-control rounded-0 border-0"
                                    placeholder="FROM"
                                    v-model="workExperience.from"
                                />
                            </th>
                            <td>
                                <input
                                    type="date"
                                    class="form-control rounded-0 border-0"
                                    placeholder="TO"
                                    v-model="workExperience.to"
                                />
                            </td>
                            <td>
                                <input
                                    type="text"
                                    class="form-control rounded-0 border-0"
                                    placeholder="Input"
                                    v-model="workExperience.position"
                                />
                            </td>
                            <td>
                                <input
                                    type="text"
                                    class="form-control rounded-0 border-0"
                                    placeholder="e.g Tandag"
                                    v-model="workExperience.dept"
                                />
                            </td>

                            <td>
                                <input
                                    type="number"
                                    class="form-control rounded-0 border-0"
                                    placeholder=""
                                    v-model="workExperience.monSalary"
                                />
                            </td>
                            <td>
                                <input
                                    type="number"
                                    class="form-control rounded-0 border-0"
                                    placeholder=""
                                    v-model="workExperience.payGrade"
                                />
                            </td>
                            <td>
                                <input
                                    type="text"
                                    class="form-control rounded-0 border-0"
                                    placeholder=""
                                    v-model="workExperience.statOfApp"
                                />
                            </td>
                            <td>
                                <input
                                    type="text"
                                    class="form-control rounded-0 border-0 text-uppercase"
                                    maxlength="1"
                                    placeholder=""
                                    v-model="workExperience.govServ"
                                />
                            </td>
                            <td class="jumbotron">
                                <button
                                    v-show="index != 0"
                                    class="btn btn-sm btn-danger font-weight-bold rounded-circle"
                                    @click="removeField(index)"
                                >
                                    X
                                </button>
                            </td>
                            <td>
                                <button
                                    v-if="index == noOfFields - 1"
                                    class="btn btn-primary font-weight-bold rounded-circle"
                                    @click="btnAddNewWorkExperienceField"
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
                        @click="submitWorkExperience"
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
</template>

<script>
export default {
    props: {
        work_experience: {
            required: true
        }
    },
    data() {
        return {
            isComplete: false,
            isLoading: false,
            noOfFields: 0,
            employee_id : '',
            workExperience: [
                {
                    from: "",
                    to: "",
                    position: "",
                    dept: "",
                    monSalary: "",
                    payGrade: "",
                    statOfApp: "",
                    govServ: "N",
                    employee_id: localStorage.getItem('employee_id'),
                }
            ]
        };
    },
    watch: {
        workExperience(from, to) {
            this.noOfFields = to.length;
        }
    },
    methods: {
        btnAddNewWorkExperienceField() {
            this.workExperience.push({
                from: "",
                to: "",
                position: "",
                dept: "",
                monSalary: "",
                payGrade: "",
                statOfApp: "",
                govServ: "N",
                employee_id: localStorage.getItem('employee_id'),
            });
        },
        submitWorkExperience() {
            this.isLoading = true;
            window.axios
                .post("/employee/personal/work/experience", this.workExperience)
                .then(response => {
                    this.isLoading = false;
                    this.isComplete = true;

                    this.$emit("next_tab");

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
                this.workExperience.splice(index, 1);
            }
        }
    },
    created() {
        this.noOfFields = this.workExperience.length;
    }
};
</script>

<style></style>
