<template>
    <div class="card">
        <div class="card-header">
            <h5 class="p-2 mb-0">
                VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT /
                PEOPLE / VOLUNTARY ORGANIZATION/S
            </h5>
        </div>

        <div class="collapse show">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr class="text-center" style="background: #EAEAEA;">
                        <td rowspan="2" class="align-middle" scope="colgroup">
                            NAME & ADDRESS OF ORGANIZATION (Write in full)
                        </td>
                        <td colspan="2" class="align-middle" scope="colgroup">
                            INCLUSIVE DATES (mm/dd/yyyy)
                        </td>
                        <td rowspan="2" class="align-middle" scope="colgroup">
                            NUMBES OF HOURS
                        </td>
                        <td rowspan="2" class="align-middle" scope="colgroup">
                            POSITION / NATURE OF WORK
                        </td>
                        <td rowspan="2" class="align-middle">&nbsp;</td>
                    </tr>
                    <tr style="background: #EAEAEA;">
                        <td scope="col" class="text-center">FROM</td>
                        <td scope="col" class="text-center">TO</td>
                    </tr>

                    <tbody>
                        <tr v-for="(volunOrg, index) in volunOrg" :key="index">
                            <td>
                                <input
                                    type="text"
                                    class="form-control rounded-0 border-0"
                                    placeholder="NAME"
                                    v-model="volunOrg.nameOfOrg"
                                />
                            </td>
                            <td>
                                <input
                                    type="date"
                                    class="form-control rounded-0 border-0"
                                    placeholder="FROM"
                                    v-model="volunOrg.from"
                                />
                            </td>
                            <td>
                                <input
                                    type="date"
                                    class="form-control rounded-0 border-0"
                                    placeholder="TO"
                                    v-model="volunOrg.to"
                                />
                            </td>
                            <td>
                                <input
                                    type="number"
                                    class="form-control rounded-0 border-0"
                                    placeholder="Hours"
                                    v-model="volunOrg.noOfHrs"
                                />
                            </td>
                            <td>
                                <input
                                    type="text"
                                    class="form-control rounded-0 border-0"
                                    placeholder="Position"
                                    v-model="volunOrg.position"
                                />
                            </td>
                            <td class="jumbotron">
                                <button
                                    v-show="index != 0"
                                    class="btn btn-sm btn-danger font-weight-bold mt-1 rounded-circle"
                                    @click="removeField(index)"
                                >
                                    X
                                </button>
                            </td>
                            <td>
                                <button
                                    v-if="index == noOfFields - 1"
                                    class="btn btn-primary rounded-circle font-weight-bold"
                                    @click="addNewFieldVoluntary"
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
                        @click="submitVoluntary"
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
</template>

<script>
import swal from "sweetalert";
export default {
    data() {
        return {
            isComplete: false,
            isLoading: false,
            noOfFields: 0,
            volunOrg: [
                {
                    nameOfOrg: "",
                    from: "",
                    to: "",
                    noOfHrs: "",
                    position: ""
                }
            ]
        };
    },
    watch: {
        volunOrg(from, to) {
            this.noOfFields = to.length;
        }
    },
    methods: {
        addNewFieldVoluntary() {
            this.volunOrg.push({
                nameOfOrg: "",
                from: "",
                to: "",
                noOfHrs: "",
                position: ""
            });
        },
        removeField(index) {
            if (index != 0) {
                this.volunOrg.splice(index, 1);
            }
        },
        submitVoluntary() {
            this.isLoading = true;
            window.axios
                .post("/employee/personal/voluntary", this.volunOrg)
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
    },
    created() {
        this.noOfFields = this.volunOrg.length;
    }
};
</script>

<style></style>
