<template>
    <div>
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 p-2">
                    VII. LEARNING AND DEVELOPMENT (L&D) INTERVENTIONS/TRAINING
                    PROGRAMS ATTENDED
                </h5>
            </div>

            <div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr class="text-center text-sm" style="background: #EAEAEA;">
                            <td
                                rowspan="2"
                                class="align-middle text-sm"
                                scope="colgroup"
                            >
                                TITLE OF LEARNING AND DEVELOPMENT
                                INTERVENTIONS/TRAINING PROGRAMS (Write in full)
                            </td>
                            <td
                                colspan="2"
                                class="align-middle text-sm"
                                scope="colgroup"
                            >
                                INCLUSIVE DATES OF ATTENDANCE (mm/dd/yyyy)
                            </td>
                            <td
                                rowspan="2"
                                class="align-middle text-sm"
                                scope="colgroup"
                            >
                                NUMBES OF HOURS
                            </td>
                            <td
                                rowspan="2"
                                class="align-middle text-sm"
                                scope="colgroup"
                            >
                                Type of LD(Managerial/
                                Supervisory/Technical/etc)
                            </td>
                            <td
                                rowspan="2"
                                class="align-middle text-sm"
                                scope="colgroup"
                            >
                                CONDUCTED/ SPONSORED (Write in full)
                            </td>
                            <td rowspan="2" class="align-middle">&nbsp;</td>
                        </tr>
                        <tr style="background: #EAEAEA;">
                            <td scope="col" class="text-center text-sm">FROM</td>
                            <td scope="col" class="text-center text-sm">TO</td>
                        </tr>

                        <tbody>
                            <tr
                                v-for="(learnDev, index) in learnDev"
                                :key="index"
                            >
                                <td>
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0"
                                        placeholder="NAME"
                                        v-model="learnDev.nameOfTraining"
                                    />
                                </td>
                                <td>
                                    <input
                                        type="date"
                                        class="form-control rounded-0 border-0"
                                        placeholder="FROM"
                                        v-model="learnDev.from"
                                    />
                                </td>
                                <td>
                                    <input
                                        type="date"
                                        class="form-control rounded-0 border-0"
                                        placeholder="TO"
                                        v-model="learnDev.to"
                                    />
                                </td>
                                <td>
                                    <input
                                        type="number"
                                        class="form-control rounded-0 border-0"
                                        placeholder="Hours"
                                        v-model="learnDev.noOfHours"
                                    />
                                </td>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0"
                                        placeholder=""
                                        v-model="learnDev.typeOfLD"
                                    />
                                </td>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0"
                                        placeholder=""
                                        v-model="learnDev.conducted"
                                    />
                                </td>
                                <td class="jumbotron">
                                    <button
                                        v-show="index != 0"
                                        @click="removeField(index)"
                                        class="btn btn-sm btn-danger font-weight-bold mt-2"
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
                            @click="addNewLearningAndDevelopmentField"
                        >
                            <i class="fa fa-plus"></i>
                            Add new field
                        </button>

                        <button
                            class="btn btn-success"
                            @click="submitLearningAndDevelopment"
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
            learnDev: [
                {
                    nameOfTraining: "",
                    from: "",
                    to: "",
                    noOfHours: "",
                    typeOfLD: "",
                    conducted: ""
                }
            ]
        };
    },
    methods: {
        addNewLearningAndDevelopmentField() {
            this.learnDev.push({
                nameOfTraining: "",
                from: "",
                to: "",
                noOfHours: "",
                typeOfLD: "",
                conducted: ""
            });
        },
        removeField(index) {
            if (index !== 0) {
                this.learnDev.splice(index, 1);
            }
        },
        submitLearningAndDevelopment() {
            this.isLoading = true;
            window.axios
                .post("/employee/personal/learning", this.learnDev)
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
