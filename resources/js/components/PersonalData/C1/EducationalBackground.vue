<template>
    <div class="card">
        <div
            class="card-header"
            :data-target="isComplete ? '#educationalBackground' : ''"
            :data-toggle="isComplete ? 'collapse' : ''"
            :style="isComplete ? 'cursor : pointer;' : ''"
        >
            <h5 class="mb-0 p-2">
                <i v-if="isComplete" class="fa fa-check text-success"></i>
                EDUCATIONAL BACKGROUND
                <i
                    v-if="isComplete"
                    class="text-success float-right fa fa-caret-down"
                    aria-hidden="true"
                ></i>
            </h5>
        </div>
        <div
            class="collapse"
            :class="educational_background && !isComplete ? 'show' : ''"
            :id="isComplete ? 'educationalBackground' : ''"
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
                            :class="
                                !errors.hasOwnProperty('eperiodFrom')
                                    ? ''
                                    : 'is-invalid'
                            "
                        />
                        <p class="text-danger text-sm">
                            {{ errors.eperiodFrom }}
                        </p>
                    </div>

                    <div class="col-lg-3">
                        <label>PERIOD OF ATTENDANCE (TO)</label>
                        <input
                            type="date"
                            class="form-control"
                            placeholder=""
                            v-model="educationalBackground.eperiodTo"
                            :class="
                                !errors.hasOwnProperty('eperiodTo')
                                    ? ''
                                    : 'is-invalid'
                            "
                        />
                        <p class="text-danger text-sm">
                            {{ errors.eperiodTo }}
                        </p>
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
                                :class="
                                    !errors.hasOwnProperty('eyrGrad')
                                        ? ''
                                        : 'is-invalid'
                                "
                            />
                            <p class="text-danger text-sm">
                                {{ errors.eyrGrad }}
                            </p>
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
                            :class="
                                !errors.hasOwnProperty('speriodFrom')
                                    ? ''
                                    : 'is-invalid'
                            "
                        />
                        <p class="text-danger text-sm">
                            {{ errors.speriodFrom }}
                        </p>
                    </div>

                    <div class="col-lg-3">
                        <label>PERIOD OF ATTENDANCE (TO)</label>
                        <input
                            type="date"
                            class="form-control"
                            placeholder=""
                            v-model="educationalBackground.speriodTo"
                            :class="
                                !errors.hasOwnProperty('speriodTo')
                                    ? ''
                                    : 'is-invalid'
                            "
                        />
                        <p class="text-danger text-sm">
                            {{ errors.speriodTo }}
                        </p>
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
                                :class="
                                    !errors.hasOwnProperty('syrGrad')
                                        ? ''
                                        : 'is-invalid'
                                "
                            />
                            <p class="text-danger text-sm">
                                {{ errors.syrGrad }}
                            </p>
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
                            :class="
                                !errors.hasOwnProperty('vperiodFrom')
                                    ? ''
                                    : 'is-invalid'
                            "
                        />
                        <p class="text-danger text-sm">
                            {{ errors.vperiodFrom }}
                        </p>
                    </div>
                    <div class="col-lg-3">
                        <label>PERIOD OF ATTENDANCE (TO)</label>
                        <input
                            type="date"
                            class="form-control"
                            placeholder=""
                            v-model="educationalBackground.vperiodTo"
                            :class="
                                !errors.hasOwnProperty('vperiodTo')
                                    ? ''
                                    : 'is-invalid'
                            "
                        />
                        <p class="text-danger text-sm">
                            {{ errors.vperiodTo }}
                        </p>
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
                            :class="
                                !errors.hasOwnProperty('vyrGrad')
                                    ? ''
                                    : 'is-invalid'
                            "
                        />
                        <p class="text-danger text-sm">{{ errors.vyrGrad }}</p>
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
                            :class="
                                !errors.hasOwnProperty('cperiodFrom')
                                    ? ''
                                    : 'is-invalid'
                            "
                        />
                        <p class="text-danger">{{ errors.cperiodFrom }}</p>
                    </div>
                    <div class="col-lg-3">
                        <label>PERIOD OF ATTENDANCE (TO)</label>
                        <input
                            type="date"
                            class="form-control"
                            v-model="educationalBackground.cperiodTo"
                            :class="
                                !errors.hasOwnProperty('cperiodTo')
                                    ? ''
                                    : 'is-invalid'
                            "
                            placeholder=""
                        />
                        <p class="text-danger text-sm">
                            {{ errors.cperiodTo }}
                        </p>
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
                            :class="
                                !errors.hasOwnProperty('cyrGrad')
                                    ? ''
                                    : 'is-invalid'
                            "
                        />
                        <p class="text-danger text-sm">
                            {{ errors.cyrGrad }}
                        </p>
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
                            :class="
                                !errors.hasOwnProperty('gperiodFrom')
                                    ? ''
                                    : 'is-invalid'
                            "
                        />
                        <p class="text-danger text-sm">
                            {{ errors.gperiodFrom }}
                        </p>
                    </div>
                    <div class="col-lg-3">
                        <label>PERIOD OF ATTENDANCE (TO)</label>
                        <input
                            type="date"
                            class="form-control"
                            placeholder=""
                            v-model="educationalBackground.gperiodTo"
                            :class="
                                !errors.hasOwnProperty('gperiodTo')
                                    ? ''
                                    : 'is-invalid'
                            "
                        />
                        <p class="text-danger text-sm">
                            {{ errors.gperiodTo }}
                        </p>
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
                            :class="
                                !errors.hasOwnProperty('gyrGrad')
                                    ? ''
                                    : 'is-invalid'
                            "
                        />
                        <p class="text-danger text-sm">{{ errors.gyrGrad }}</p>
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
                    v-if="!isComplete"
                    :disabled="isLoading"
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
            },
            errors: {}
        };
    },
    methods: {
        submitEducationalBackground() {
            this.isLoading = true;
            this.educationalBackground.employee_id = localStorage.getItem(
                "employee_id"
            );
            window.axios
                .post(
                    "/employee/personal/educational/background/store",
                    this.educationalBackground
                )
                .then(response => {
                    this.isLoading = false;
                    this.isComplete = true;

                    localStorage.setItem(
                        "educational_background",
                        JSON.stringify(response.data)
                    );

                    // When it's done call event listener
                    this.$emit("next_tab");
                })
                .catch(error => {
                    this.isLoading = false;
                    this.errors = {};
                    if (error.response.status === 422) {
                        Object.keys(error.response.data.errors).map(
                            (field, index) => {
                                let [fieldMessage] = error.response.data.errors[
                                    field
                                ];
                                this.errors[field] = fieldMessage;
                            }
                        );
                        console.log(this.errors);
                    }
                });
        }
    },
    mounted() {
        if (localStorage.getItem("educational_background")) {
            this.educationalBackground = JSON.parse(
                localStorage.getItem("educational_background")
            );
            this.isComplete = true;
        }
    }
};
</script>

<style></style>
