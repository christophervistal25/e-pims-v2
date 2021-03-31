<template>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 p-2">
                EDUCATIONAL BACKGROUND
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
            :class="educational_background && !isComplete ? 'show' : ''"
        >
            <div class="p-3">
                <div
                    class="alert alert-secondary text-center font-weight-bold"
                    role="alert"
                >
                    ELEMENTARY
                </div>
            </div>
            <div class="pl-3 pr-3 pb-3">
                <div class="row">
                    <div class="col-lg-3">
                        <label>ELEMENTARY</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Name of School"
                            v-model="educationalBackground.elementary"
                        />
                    </div>

                    <div class="col-lg-3">
                        <label>BASIC EDUCATION/DEGREE/COURSE</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder=""
                            v-model="educationalBackground.ebasicEduc"
                        />
                    </div>

                    <div class="col-lg-3">
                        <label>PERIOD OF ATTENDANCE (FROM)</label>
                        <input
                            type="date"
                            class="form-control"
                            placeholder=""
                            v-model="educationalBackground.eperiodFrom"
                        />
                    </div>

                    <div class="col-lg-3">
                        <label>PERIOD OF ATTENDANCE (TO)</label>
                        <input
                            type="date"
                            class="form-control"
                            placeholder=""
                            v-model="educationalBackground.eperiodTo"
                        />
                    </div>
                </div>
                <div class="pr-3 pb-3 py-3">
                    <div class="row">
                        <div class="col-lg-3">
                            <label>HIGHEST LEVEL/ UNIT EARNED</label>
                            <input
                                type="number"
                                class="form-control"
                                placeholder="(if not graduated)"
                                v-model="educationalBackground.eunitEarned"
                            />
                        </div>

                        <div class="col-lg-3">
                            <label>YEAR GRADUATED</label>
                            <input
                                type="text"
                                class="form-control"
                                placeholder=""
                                v-model="educationalBackground.eyrGrad"
                            />
                        </div>

                        <div class="col-lg-6">
                            <label>SCHOLARSHIP/ ACADEMIC HONORS RECEIVED</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="educationalBackground.escholarship"
                            />
                        </div>
                    </div>
                </div>
            </div>

            <hr />

            <div class="p-3">
                <div
                    class="alert alert-secondary text-center font-weight-bold"
                    role="alert"
                >
                    SECONDARY
                </div>
            </div>
            <div class="pl-3 pr-3 pb-3">
                <div class="row">
                    <div class="col-lg-3">
                        <label>SECONDARY</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Name of School"
                            v-model="educationalBackground.snameOfSchool"
                        />
                    </div>

                    <div class="col-lg-3">
                        <label>BASIC EDUCATION/DEGREE/COURSE</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder=""
                            v-model="educationalBackground.sbasicEduc"
                        />
                    </div>

                    <div class="col-lg-3">
                        <label>PERIOD OF ATTENDANCE (FROM)</label>
                        <input
                            type="date"
                            class="form-control"
                            placeholder=""
                            v-model="educationalBackground.speriodFrom"
                        />
                    </div>

                    <div class="col-lg-3">
                        <label>PERIOD OF ATTENDANCE (TO)</label>
                        <input
                            type="date"
                            class="form-control"
                            placeholder=""
                            v-model="educationalBackground.speriodTo"
                        />
                    </div>
                </div>
                <div class="pr-3 pb-3 py-3">
                    <div class="row">
                        <div class="col-lg-3">
                            <label>HIGHEST LEVEL/ UNIT EARNED</label>
                            <input
                                type="number"
                                class="form-control"
                                placeholder="(if not graduated)"
                                v-model="educationalBackground.sunitEarned"
                            />
                        </div>

                        <div class="col-lg-3">
                            <label>YEAR GRADUATED</label>
                            <input
                                type="text"
                                class="form-control"
                                placeholder=""
                                v-model="educationalBackground.syrGrad"
                            />
                        </div>

                        <div class="col-lg-6">
                            <label>SCHOLARSHIP/ ACADEMIC HONORS RECEIVED</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="educationalBackground.sscholarship"
                            />
                        </div>
                    </div>
                </div>
            </div>

            <hr />

            <div class="p-3">
                <div
                    class="alert alert-secondary text-center font-weight-bold"
                    role="alert"
                >
                    VOCATIONAL / TRADE COURSE
                </div>
            </div>
            <div class="pl-3 pr-3 pb-3">
                <div class="row">
                    <div class="col-lg-3">
                        <label>VOCATIONAL / TRADE COURSE</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Name of School"
                            v-model="educationalBackground.vnameOfVoc"
                        />
                    </div>

                    <div class="col-lg-3">
                        <label>BASIC EDUCATION/DEGREE/COURSE</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder=""
                            v-model="educationalBackground.vbasicEduc"
                        />
                    </div>

                    <div class="col-lg-3">
                        <label>PERIOD OF ATTENDANCE (FROM)</label>
                        <input
                            type="date"
                            class="form-control"
                            placeholder=""
                            v-model="educationalBackground.vperiodFrom"
                        />
                    </div>
                    <div class="col-lg-3">
                        <label>PERIOD OF ATTENDANCE (TO)</label>
                        <input
                            type="date"
                            class="form-control"
                            placeholder=""
                            v-model="educationalBackground.vperiodTo"
                        />
                    </div>
                </div>
            </div>
            <div class="pl-3 pr-3 pb-3">
                <div class="row">
                    <div class="col-lg-3">
                        <label>HIGHEST LEVEL/ UNIT EARNED</label>
                        <input
                            type="number"
                            class="form-control"
                            placeholder="(if not graduated)"
                            v-model="educationalBackground.vunitEarned"
                        />
                    </div>

                    <div class="col-lg-3">
                        <label>YEAR GRADUATED</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder=""
                            v-model="educationalBackground.vyrGrad"
                        />
                    </div>

                    <div class="col-lg-6">
                        <label>SCHOLARSHIP/ ACADEMIC HONORS RECEIVED</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="educationalBackground.vscholarship"
                        />
                    </div>
                </div>
            </div>

            <hr />

            <div class="p-3">
                <div
                    class="alert alert-secondary text-center font-weight-bold"
                    role="alert"
                >
                    COLLEGE
                </div>
            </div>
            <div class="pl-3 pr-3 pb-3">
                <div class="row">
                    <div class="col-lg-3">
                        <label>COLLEGE</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Name of School"
                            v-model="educationalBackground.cnameOfSchool"
                        />
                    </div>

                    <div class="col-lg-3">
                        <label>BASIC EDUCATION/DEGREE/COURSE</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder=""
                            v-model="educationalBackground.cbasicEduc"
                        />
                    </div>

                    <div class="col-lg-3">
                        <label>PERIOD OF ATTENDANCE (FROM)</label>
                        <input
                            type="date"
                            class="form-control"
                            placeholder=""
                            v-model="educationalBackground.cperiodFrom"
                        />
                    </div>
                    <div class="col-lg-3">
                        <label>PERIOD OF ATTENDANCE (TO)</label>
                        <input
                            type="date"
                            class="form-control"
                            placeholder=""
                            v-model="educationalBackground.cperiodTo"
                        />
                    </div>
                </div>
            </div>

            <div class="pl-3 pr-3 pb-3">
                <div class="row">
                    <div class="col-lg-3">
                        <label>HIGHEST LEVEL/ UNIT EARNED</label>
                        <input
                            type="number"
                            class="form-control"
                            placeholder="(if not graduated)"
                            v-model="educationalBackground.cunitEarned"
                        />
                    </div>

                    <div class="col-lg-3">
                        <label>YEAR GRADUATED</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder=""
                            v-model="educationalBackground.cyrGrad"
                        />
                    </div>

                    <div class="col-lg-6">
                        <label>SCHOLARSHIP/ ACADEMIC HONORS RECEIVED</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="educationalBackground.cscholarship"
                        />
                    </div>
                </div>
            </div>

            <hr />

            <div class="p-3">
                <div
                    class="alert alert-secondary text-center font-weight-bold"
                    role="alert"
                >
                    GRADUATE STUDIES
                </div>
            </div>
            <div class="pl-3 pr-3 pb-3">
                <div class="row">
                    <div class="col-lg-3">
                        <label>GRADUATE STUDIES</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Name of School"
                            v-model="educationalBackground.gnameOfSchool"
                        />
                    </div>

                    <div class="col-lg-3">
                        <label>BASIC EDUCATION/DEGREE/COURSE</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder=""
                            v-model="educationalBackground.gbasicEduc"
                        />
                    </div>

                    <div class="col-lg-3">
                        <label>PERIOD OF ATTENDANCE (FROM)</label>
                        <input
                            type="date"
                            class="form-control"
                            placeholder=""
                            v-model="educationalBackground.gperiodFrom"
                        />
                    </div>
                    <div class="col-lg-3">
                        <label>PERIOD OF ATTENDANCE (TO)</label>
                        <input
                            type="date"
                            class="form-control"
                            placeholder=""
                            v-model="educationalBackground.gperiodTo"
                        />
                    </div>
                </div>
            </div>

            <div class="pl-3 pr-3 pb-3">
                <div class="row">
                    <div class="col-lg-3">
                        <label>HIGHEST LEVEL/ UNIT EARNED</label>
                        <input
                            type="number"
                            class="form-control"
                            placeholder="(if not graduated)"
                            v-model="educationalBackground.gunitEarned"
                        />
                    </div>

                    <div class="col-lg-3">
                        <label>YEAR GRADUATED</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder=""
                            v-model="educationalBackground.gyrGrad"
                        />
                    </div>

                    <div class="col-lg-6">
                        <label>SCHOLARSHIP/ ACADEMIC HONORS RECEIVED</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model="educationalBackground.gscholarship"
                        />
                    </div>
                </div>
            </div>
            <div class="float-right">
                <button
                    class="btn btn-primary font-weight-bold mr-3 mb-2"
                    @click="submitEducationalBackground"
                >
                    NEXT
                    <div
                        class="spinner-border spinner-border-sm mb-1"
                        role="status"
                        v-show="isLoading"
                    >
                        <span class="sr-only">Loading...</span>
                    </div>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        educational_background: {
            required: true
        },
        employee_id: {
            required: true
        }
    },
    data() {
        return {
            //Educational Background Guide for properties
            // E- Elemementary => (sample : ebasicEduc)

            isComplete: false,
            isLoading: false,
            educationalBackground: {
                employee_id: "",
                elementary: "",
                ebasicEduc: "",
                eperiodFrom: "",
                eperiodTo: "",
                eunitEarned: "",
                eyrGrad: "",
                escholarship: "",
                snameOfSchool: "",
                sbasicEduc: "",
                speriodFrom: "",
                speriodTo: "",
                sunitEarned: "",
                syrGrad: "",
                sscholarship: "",
                vnameOfVoc: "",
                vbasicEduc: "",
                vperiodFrom: "",
                vperiodTo: "",
                vunitEarned: "",
                vyrGrad: "",
                vscholarship: "",
                cnameOfSchool: "",
                cbasicEduc: "",
                cperiodFrom: "",
                cperiodTo: "",
                cunitEarned: "",
                cyrGrad: "",
                cscholarship: "",
                gnameOfSchool: "",
                gbasicEduc: "",
                gperiodFrom: "",
                gperiodTo: "",
                gunitEarned: "",
                gyrGrad: "",
                gscholarship: ""
            }
        };
    },
    methods: {
        submitEducationalBackground() {
            this.isLoading = true;
            this.educationalBackground.employee_id = this.employee_id;
            window.axios
                .post(
                    "/employee/personal/educational/background/store",
                    this.educationalBackground
                )
                .then(response => {
                    this.isLoading = false;
                    this.isComplete = true;

                    swal({
                        title: "Good job!",
                        text: "Min sulod na ang data!",
                        icon: "success"
                    });
                    // When it's done call event listener 
                    this.$emit('next_tab');
                })
                .catch(err => {});
        }
    }
};
</script>

<style></style>
