<template>
    <div>
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 p-3">
                    FAMILY BACKGROUND
                </h5>
            </div>
            <div
                id="familyBackground"
                class="collapse"
                :class="familyShow ? 'show' : ''"
                aria-labelledby="headingOne"
                data-parent="#accordion"
            >
                <div class="p-3">
                    <div
                        class="alert alert-secondary text-center font-weight-bold"
                        role="alert"
                    >
                        FAMILY BACKGROUND
                    </div>
                </div>
                <div class="row pr-3 pl-3">
                    <div class="form-group col-lg-3">
                        <label for="ssurname">SPOUSE'S SURNAME</label>
                        <input
                            type="text"
                            class="form-control "
                            id="ssurname"
                            name="familyBackground[ssurname]"
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
                            name="familyBackground[sfirstname]"
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
                            name="familyBackground[smiddleame]"
                            placeholder="Enter Spouse's Middle Name"
                            value=""
                        />
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="snameexten">SPOUSE'S NAME EXTENSION</label>
                        <input
                            type="text"
                            maxlength="3"
                            class="form-control "
                            id="snameexten"
                            name="familyBackground[snameexten]"
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
                            name="familyBackground[soccupation]"
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
                            name="familyBackground[sempname]"
                        />
                    </div>
                </div>
                <div class="row pl-3 pr-3">
                    <div class="form-group col-sm-6">
                        <label for="sbusadd">SPOUSE'S BUSINESS ADDRESS</label>
                        <input
                            type="text"
                            class="form-control"
                            id="sbusadd"
                            placeholder="Enter Spouse's Business Address"
                            name="familyBackground[sbusadd]"
                        />
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="stelno">SPOUSE'S TELEPHONE NUMBER</label>
                        <input
                            type="text"
                            class="form-control"
                            id="stelno"
                            placeholder="Enter Spouse's Telephone Number"
                            name="familyBackground[stelno]"
                        />
                    </div>
                </div>
                <hr />
                <div v-for="(no, index) in noOfSpouse" :key="index">
                    <div class="row pl-3 pr-3">
                        <div class="form-group col-lg-6">
                            <label for="cname">NAME OF CHILDREN</label>
                            <input
                                type="text"
                                class="form-control"
                                id="cname"
                                placeholder="Enter Name of Children"
                                name="familyBackground[cname]"
                            />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="cdateOfBirth">DATE OF BIRTH</label>
                            <input
                                type="date"
                                class="form-control"
                                id="cdateOfBirth"
                                placeholder="Enter Spouse's Business Address"
                                name="familyBackground[cdateOfBirth]"
                            />
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-10 text-right">
                    <button
                        class="btn btn-primary rounded-circle"
                        @click="generateNewSpuseField"
                    >
                        +
                    </button>
                </div>
                <hr />
                <div class="row pr-3 pl-3">
                    <div class="form-group col-lg-3">
                        <label for="fsurname">FATHER'S SURNAME</label>
                        <input
                            type="text"
                            class="form-control "
                            id="fsurname"
                            name="familyBackground[fsurname]"
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
                            name="familyBackground[ffirstname]"
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
                            name="familyBackground[fmiddlename]"
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
                            name="familyBackground[fnameexten]"
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
                            name="familyBackground[msurname]"
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
                            name="familyBackground[mfirstname]"
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
                            name="familyBackground[mmiddlename]"
                            placeholder="Enter Mother's Maiden Middle Name"
                            value=""
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        familyShow: {
            required: true
        }
    },
    data() {
        return {
            noOfSpouse: 1,
            familyBackground: {
                spouse: {}
            }
        };
    },
    methods: {
        generateNewSpuseField() {
            this.noOfSpouse++;
        }
    }
};
</script>

<style></style>
