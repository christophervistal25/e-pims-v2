<template>
    <div>
        <div class="card">
            <div
                class="card-header"
                :data-target="isComplete ? '#familyBackground' : ''"
                :data-toggle="isComplete ? 'collapse' : ''"
                :style="isComplete ? 'cursor : pointer;' : ''"
            >
                <h5 class="mb-0 p-3">
                    <i v-if="isComplete" class="fa fa-check text-success"></i>
                    FAMILY BACKGROUND
                    <i
                        v-if="isComplete"
                        class="text-success float-right fa fa-caret-down"
                        aria-hidden="true"
                    ></i>
                </h5>
            </div>
            <div
                class="collapse"
                :class="show_panel && !isComplete ? 'show' : ''"
                :id="isComplete ? 'familyBackground' : ''"
            >
                <div class="p-3">
                    <div
                        class="alert alert-secondary text-center font-weight-bold"
                        role="alert"
                    >
                        FAMILY BACKGROUND
                    </div>
                </div>
                <div class="form-check">
                    <label for="#spouse">
                        <input
                            id="spouse"
                            type="checkbox"
                            @click="hasSpouse = !hasSpouse"
                        />
                        Do you have spouse? If YES, kindly tick the checkbox.
                    </label>
                </div>
                <section v-if="hasSpouse">
                    <div class="row pr-3 pl-3">
                        <div class="form-group col-lg-3">
                            <label for="ssurname">SPOUSE'S SURNAME</label>
                            <input
                                type="text"
                                class="form-control "
                                id="ssurname"
                                v-model="familyBackground.ssurname"
                                placeholder="Enter Spouse's Surname"
                                value=""
                            />
                        </div>
                        <div class="form-group col-lg-3 ">
                            <label for="sfirstname">SPOUSE'S FIRST NAME</label>
                            <input
                                type="text"
                                class="form-control  "
                                id="sfirstname"
                                v-model="familyBackground.sfirstname"
                                placeholder="Enter Spouse's First Name"
                                value=""
                            />
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="smiddleame">SPOUSE'S MIDDLE NAME</label>
                            <input
                                type="text"
                                class="form-control "
                                id="smiddleame"
                                v-model="familyBackground.smiddleame"
                                placeholder="Enter Spouse's Middle Name"
                                value=""
                            />
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="snameexten"
                                >SPOUSE'S NAME EXTENSION</label
                            >
                            <input
                                type="text"
                                maxlength="3"
                                class="form-control "
                                id="snameexten"
                                v-model="familyBackground.snameexten"
                                placeholder="(JR., SR.)"
                                value=""
                            />
                        </div>
                    </div>
                    <div class="row pl-3 pr-3">
                        <div class="form-group col-lg-6">
                            <label for="soccupation">SPOUSE'S OCCUPATION</label>
                            <input
                                type="text"
                                class="form-control"
                                id="soccupation"
                                placeholder="Enter Spouse's Occupation"
                                v-model="familyBackground.soccupation"
                            />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="sempname"
                                >SPOUSE'S EMPLOYER/BUSINESS NAME</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="sempname"
                                placeholder="Enter Spouse's Employer/Business Name"
                                v-model="familyBackground.sempname"
                            />
                        </div>
                    </div>
                    <div class="row pl-3 pr-3">
                        <div class="form-group col-sm-6">
                            <label for="sbusadd"
                                >SPOUSE'S BUSINESS ADDRESS</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="sbusadd"
                                placeholder="Enter Spouse's Business Address"
                                v-model="familyBackground.sbusadd"
                            />
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="stelno"
                                >SPOUSE'S TELEPHONE NUMBER</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="stelno"
                                placeholder="Enter Spouse's Telephone Number"
                                v-model="familyBackground.stelno"
                            />
                        </div>
                    </div>
                    <hr />
                    <div class="p-2">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="font-weight-bold">
                                        NAME OF CHILDREN
                                    </th>
                                    <th class="font-weight-bold">
                                        DATE OF BIRTH
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(spouse, index) in spouse"
                                    :key="index"
                                >
                                    <td>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="cname"
                                            placeholder="Enter Name of Children"
                                            v-model="spouse.cname"
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="date"
                                            class="form-control"
                                            id="cdateOfBirth"
                                            placeholder="Enter Spouse's Business Address"
                                            v-model="spouse.cdateOfBirth"
                                        />
                                    </td>
                                    <td class="text-center">
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
                                            v-if="index == noOfSpouseFields - 1"
                                            class="btn btn-primary rounded-circle"
                                            @click="generateNewSpuseField"
                                        >
                                            +
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
                <hr />

                <div class="row pr-3 pl-3">
                    <div class="form-group col-lg-3">
                        <label for="fsurname">FATHER'S SURNAME</label>
                        <input
                            type="text"
                            class="form-control "
                            id="fsurname"
                            v-model="familyBackground.fsurname"
                            placeholder="Enter Father's Surname"
                            value=""
                        />
                    </div>
                    <div class="form-group col-lg-3 ">
                        <label for="ffirstname">FATHER'S FIRST NAME</label>
                        <input
                            type="text"
                            class="form-control  "
                            id="ffirstname"
                            v-model="familyBackground.ffirstname"
                            placeholder="Enter Father's First Name"
                            value=""
                        />
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="fmiddlename">FATHER'S MIDDLE NAME</label>
                        <input
                            type="text"
                            class="form-control "
                            id="fmiddlename"
                            v-model="familyBackground.fmiddlename"
                            placeholder="Enter Father's Middle Name"
                            value=""
                        />
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="fnameexten">FATHER'S NAME EXTENSION</label>
                        <input
                            type="text"
                            maxlength="3"
                            class="form-control "
                            id="fnameexten"
                            v-model="familyBackground.fnameexten"
                            placeholder="(JR., SR.)"
                            value=""
                        />
                    </div>
                </div>
                <hr />
                <div class="row pr-3 pl-3">
                    <div class="form-group col-lg-3">
                        <label for="msurname">MOTHER'S MAIDEN SURNAME</label>
                        <input
                            type="text"
                            maxlength="3"
                            class="form-control "
                            id="msurname"
                            v-model="familyBackground.msurname"
                            placeholder="Enter Mother's Maiden Surname"
                            value=""
                        />
                    </div>
                    <div class="form-group col-lg-3 ">
                        <label for="mfirstname">MOTHER'S FIRST NAME</label>
                        <input
                            type="text"
                            class="form-control  "
                            id="mfirstname"
                            v-model="familyBackground.mfirstname"
                            placeholder="Enter Mother's First Name"
                            value=""
                        />
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="mmiddlename"
                            >MOTHER'S MAIDEN MIDDLE NAME</label
                        >
                        <input
                            type="text"
                            class="form-control "
                            id="mmiddlename"
                            v-model="familyBackground.mmiddlename"
                            placeholder="Enter Mother's Maiden Middle Name"
                            value=""
                        />
                    </div>
                </div>
                <div class="float-right">
                    <button
                        class="btn btn-primary font-weight-bold mr-3 mb-2"
                        @click="submitPersonFamilyBackground"
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
            isLoading: false,
            isComplete: false,
            hasSpouse: false,
            noOfSpouseFields: 0,
            spouse: [
                {
                    cname: "",
                    cdateOfBirth: ""
                }
            ],
            familyBackground: {
                employee_id: "",

                ssurname: "",
                sfirstname: "",
                smiddleame: "",
                snameexten: "",
                soccupation: "",
                sempname: "",
                sbusadd: "",
                stelno: "",
                cname: "",
                cdateOfBirth: "",
                fsurname: "",
                ffirstname: "",
                fmiddlename: "",
                fnameexten: "",
                msurname: "",
                mfirstname: "",
                mmiddlename: ""
            }
        };
    },
    watch: {
        spouse(from, to) {
            this.noOfSpouseFields = to.length;
        }
    },
    methods: {
        generateNewSpuseField() {
            this.spouse.push({
                name: "",
                dateOfBirth: ""
            });
        },
        removeField(index) {
            if (index != 0) {
                this.spouse.splice(index, 1);
            }
        },
        submitPersonFamilyBackground() {
            this.isLoading = true;
            this.familyBackground.employee_id = localStorage.getItem(
                "employee_id"
            );
            this.familyBackground.spouse = this.spouse;

            window.axios
                .post(
                    "/employee/personal/family/background/store",
                    this.familyBackground
                )
                .then(response => {
                    this.isLoading = false;
                    this.isComplete = true;

                    this.$emit("next-panel-educational-background");

                    localStorage.setItem(
                        "family_background",
                        JSON.stringify(response.data)
                    );
                })
                .catch(err => (this.isLoading = false));
        }
    },
    created() {
        this.noOfSpouseFields = this.spouse.length;
    },
    mounted() {
        if (localStorage.getItem("family_background")) {
            let familyBackgroundData = JSON.parse(
                localStorage.getItem("family_background")
            );

            this.familyBackground = familyBackgroundData;

            this.spouse = familyBackgroundData.spouse;

            this.isComplete = true;

            this.$emit("next-panel-educational-background");
        }
    }
};
</script>

<style></style>
