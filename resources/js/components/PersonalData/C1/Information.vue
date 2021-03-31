<template>
    <div>
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 p-2">
                    PERSONAL INFORMATION
                    <span 
                    v-show="isComplete" 
                    :class="isComplete ? 'text-success' : 'text-danger'"
                    >
                        - VERIFIED</span
                    >
                </h5>
            </div>
            <div class="collapse" :class="isComplete ? '' : 'show'">
                <div class="p-3">
                    <div
                        class="alert alert-secondary text-center font-weight-bold"
                        role="alert"
                    >
                        PERSONAL INFORMATION
                    </div>
                </div>
                <div class="row pr-3 pl-3">
                    <div class="form-group col-lg-3">
                        <label for="surname">SURNAME</label>
                        <span class="text-danger">*</span>
                        <input
                            type="text"
                            class="form-control"
                            id="surname"
                            placeholder="Enter Surname"
                            v-model="personal_data.personalInformation.surname"
                        />
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="firstname">FIRST NAME</label>
                        <span class="text-danger">*</span>
                        <input
                            type="text"
                            class="form-control"
                            id="firstname"
                            placeholder="Enter First Name"
                            v-model="
                                personal_data.personalInformation.firstname
                            "
                        />
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="middlename">MIDDLE NAME</label>
                        <span class="text-danger">*</span>
                        <input
                            type="text"
                            class="form-control"
                            id="middlename"
                            placeholder="Enter Middle Name"
                            v-model="
                                personal_data.personalInformation.middlename
                            "
                        />
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="nameextension">NAME EXTENSION</label>
                        <input
                            type="text"
                            class="form-control"
                            maxlength="3"
                            id="nameextension"
                            placeholder="(JR.,SR.)"
                            v-model="
                                personal_data.personalInformation.nameExtension
                            "
                        />
                    </div>
                </div>
                <div class="row pl-3 pr-3">
                    <div class="form-group col-lg-3">
                        <label for="dateofbirth">DATE OF BIRTH</label
                        ><span class="text-danger">*</span>
                        <input
                            class="form-control"
                            type="date"
                            v-model="
                                personal_data.personalInformation.dateOfBirth
                            "
                        />
                    </div>
                    <div class="form-group col-lg-9">
                        <label for="placeofbirth">PLACE OF BIRTH</label
                        ><span class="text-danger">*</span>
                        <input
                            type="text"
                            class="form-control"
                            id="placeofbirth"
                            placeholder="Enter Place of Birth"
                            v-model="
                                personal_data.personalInformation.placeOfBirth
                            "
                        />
                    </div>
                </div>
                <div class="row pl-3 pr-3">
                    <div class="form-group col-lg-6">
                        <label for="sex">SEX</label
                        ><span class="text-danger">*</span>
                        <select
                            class="form-control"
                            id="sex"
                            v-model="personal_data.personalInformation.sex"
                        >
                            <option value="MALE">MALE</option>
                            <option value="FEMALE">FEMALE</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="status">STATUS</label
                        ><span class="text-danger">*</span>
                        <select
                            class="form-control"
                            id="status"
                            v-model="personal_data.personalInformation.status"
                        >
                            <option value="SINGLE">SINGLE</option>
                            <option value="MARRIED">MARRIED</option>
                            <option value="WIDOWED">WIDOWED</option>
                            <option value="SEPARATED">SEPARATED</option>
                            <option value="OTHERS">OTHERS</option>
                        </select>
                    </div>
                </div>
                <div class="row pl-3 pr-3">
                    <div class="form group col-lg-4">
                        <label for="height">HEIGHT</label
                        ><span class="text-danger">*</span>
                        <input
                            type="number"
                            id="height"
                            class="form-control"
                            placeholder="Enter height in meter"
                            v-model="personal_data.personalInformation.height"
                        />
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="weight">WEIGHT</label
                        ><span class="text-danger">*</span>
                        <input
                            type="number"
                            id="weight"
                            class="form-control"
                            placeholder="Enter weight in kilogram"
                            v-model="personal_data.personalInformation.weight"
                        />
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="bloodtype">BLOODTYPE</label
                        ><span class="text-danger">*</span>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Enter bloodtype"
                            v-model="
                                personal_data.personalInformation.bloodType
                            "
                        />
                    </div>
                </div>
                <div class="row pl-3 pr-3">
                    <div class="form-group col-lg-4">
                        <label for="gsisidno">GSIS ID NUMBER</label>
                        <input
                            type="text"
                            id="gsisidno"
                            class="form-control"
                            placeholder="Enter GSIS ID No."
                            v-model="personal_data.personalInformation.gsisIdNo"
                        />
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="pagibigidno">PAG-IBIG ID NUMBER</label>
                        <input
                            type="text"
                            id="pagibigidno"
                            class="form-control"
                            placeholder="Enter PAG-IBIG ID No."
                            v-model="
                                personal_data.personalInformation.pagibigIdNo
                            "
                        />
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="philhealthidno">PHILHEALTH ID NUMBER</label>
                        <input
                            type="text"
                            id="philhealthidno"
                            class="form-control"
                            placeholder="Enter PHILHEALTH ID No."
                            v-model="
                                personal_data.personalInformation.philHealthIdNo
                            "
                        />
                    </div>
                </div>
                <div class="row pl-3 pr-3">
                    <div class="form-group col-lg-4">
                        <label for="sssidno">SSS ID NUMBER</label>
                        <input
                            type="text"
                            id="sssidno"
                            class="form-control"
                            placeholder="Enter SSS ID No."
                            v-model="personal_data.personalInformation.sssIdNo"
                        />
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="tinidno">TIN ID NUMBER</label>
                        <input
                            type="text"
                            id="tinidno"
                            class="form-control"
                            placeholder="Enter TIN ID No."
                            v-model="personal_data.personalInformation.tinIdNo"
                        />
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="agencyempidno"
                            >AGENCY EMPLOYEE NUMBER</label
                        >
                        <input
                            type="text"
                            id="agencyempidno"
                            class="form-control"
                            placeholder="Enter agency employee no."
                            v-model="
                                personal_data.personalInformation.agencyEmpIdNo
                            "
                        />
                    </div>
                </div>
                <div class="row pl-3 pr-3">
                    <div class="form-group col-lg-4">
                        <label for="citizenship">CITIZENSHIP</label
                        ><span class="text-danger">*</span>
                        <select
                            class="form-control"
                            id="citizenship"
                            v-model="
                                personal_data.personalInformation.citizenship
                            "
                        >
                            <option value="FILIPINO">FILIPINO</option>
                            <option value="DUAL CITIZEN">DUAL CITIZEN</option>
                        </select>
                    </div>
                    <div
                        class="form-group col-lg-4 d-none"
                        id="citizenshipby-container"
                    >
                        <label for="citizenshipby">BY</label
                        ><span class="text-danger">*</span>
                        <select
                            class="form-control"
                            id="citizenshipby"
                            v-model="
                                personal_data.personalInformation.citizenshipBy
                            "
                        >
                            <option value="BIRTH">BIRTH</option>
                            <option value="NATURALIZATION"
                                >NATURALIZATION</option
                            >
                        </select>
                    </div>

                    <div
                        class="form-group col-lg-4 d-none"
                        id="country-container"
                    >
                        <label for="countries">INDICATE COUNTRY</label
                        ><span class="text-danger">*</span>
                        <select
                            class="form-control"
                            id="countries"
                            v-model="personal_data.personalInformation.country"
                        >
                        </select>
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="telno">TELEPHONE NUMBER</label>
                        <input
                            type="text"
                            id="telno"
                            class="form-control"
                            placeholder="Enter Telephone Number"
                            v-model="
                                personal_data.personalInformation
                                    .telephoneNumber
                            "
                        />
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="mobileno">MOBILE NUMBER</label
                        ><span class="text-danger">*</span>
                        <input
                            type="text"
                            id="mobileno"
                            class="form-control"
                            placeholder="Enter Mobile Number"
                            v-model="
                                personal_data.personalInformation.mobileNumber
                            "
                        />
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="email">EMAIL ADDRESS</label>
                        <input
                            type="email"
                            id="email"
                            class="form-control"
                            placeholder="Enter your email address"
                            v-model="
                                personal_data.personalInformation.emailAddress
                            "
                        />
                    </div>
                </div>

                <div class="pl-3 pr-3">
                    <div
                        class="alert alert-secondary text-center font-weight-bold"
                        role="alert"
                    >
                        RESIDENTIAL ADDRESS
                    </div>
                </div>
                <div class="row pl-3 pr-3">
                    <div class="form-group col-lg-4">
                        <label for="lotno">HOUSE/BLOCK/LOT NO.</label
                        ><span class="text-danger">*</span>
                        <input
                            type="text"
                            v-model="
                                personal_data.personalInformation
                                    .residentialLotNo
                            "
                            id="lotno"
                            class="form-control"
                            placeholder="Enter house/block/lot no."
                        />
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="street">STREET</label
                        ><span class="text-danger">*</span>
                        <input
                            type="text"
                            v-model="
                                personal_data.personalInformation
                                    .residentialStreet
                            "
                            id="street"
                            class="form-control"
                            placeholder="Enter Street"
                        />
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="subdivision">SUBDIVISION/VILLAGE</label
                        ><span class="text-danger">*</span>
                        <input
                            type="text"
                            v-model="
                                personal_data.personalInformation
                                    .residentialSubdivision
                            "
                            id="subdivision"
                            class="form-control"
                            placeholder="Enter Subdivision or Village"
                        />
                    </div>
                </div>
                <div class="row pl-3 pr-3">
                    <div class="form-group col-lg-3">
                        <label for="barangay">BARANGAY</label
                        ><span class="text-danger">*</span>
                        <input
                            type="text"
                            v-model="
                                personal_data.personalInformation
                                    .residentialBarangay
                            "
                            id="barangay"
                            class="form-control"
                            placeholder="Enter Barangay"
                        />
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="city">CITY/MUNICIPALITY</label
                        ><span class="text-danger">*</span>
                        <input
                            type="text"
                            v-model="
                                personal_data.personalInformation
                                    .residentialCity
                            "
                            id="city"
                            class="form-control"
                            placeholder="Enter City or Municipality"
                        />
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="province">PROVINCE</label
                        ><span class="text-danger">*</span>
                        <input
                            type="text"
                            v-model="
                                personal_data.personalInformation
                                    .residentialProvince
                            "
                            id="province"
                            class="form-control"
                            placeholder="Enter Province"
                        />
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="zipcode">ZIP CODE</label
                        ><span class="text-danger">*</span>
                        <input
                            type="number"
                            v-model="
                                personal_data.personalInformation
                                    .residentialZipCode
                            "
                            id="zipcode"
                            class="form-control"
                            placeholder="Enter Zipcode"
                        />
                    </div>
                </div>
                <div class="pl-3 pr-3">
                    <div
                        class="alert alert-secondary text-center font-weight-bold"
                        role="alert"
                    >
                        PERMANENT ADDRESS
                    </div>
                    <div class="form-group">
                        <label class="checkbox-inline">
                            <input
                                :checked="isSameAsAbove"
                                type="checkbox"
                                @click="sameAsAboveAddress"
                            />
                            SAME AS ABOVE
                        </label>
                    </div>
                </div>
                <div class="row pl-3 pr-3">
                    <div class="form-group col-lg-4">
                        <label for="lotno">HOUSE/BLOCK/LOT NO.</label
                        ><span class="text-danger">*</span>
                        <input
                            type="text"
                            v-model="
                                personal_data.personalInformation.permanentLotNo
                            "
                            id="permanent_lotno"
                            class="form-control"
                            placeholder="Enter house/block/lot no."
                        />
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="street">STREET</label
                        ><span class="text-danger">*</span>
                        <input
                            type="text"
                            v-model="
                                personal_data.personalInformation
                                    .permanentStreet
                            "
                            id="permanent_street"
                            class="form-control"
                            placeholder="Enter Street"
                        />
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="subdivision">SUBDIVISION/VILLAGE</label
                        ><span class="text-danger">*</span>
                        <input
                            type="text"
                            v-model="
                                personal_data.personalInformation
                                    .permanentSubdivision
                            "
                            id="permanent_subdivision"
                            class="form-control"
                            placeholder="Enter Subdivision or Village"
                        />
                    </div>
                </div>

                <div class="row pl-3 pr-3">
                    <div class="form-group col-lg-3">
                        <label for="barangay">BARANGAY</label
                        ><span class="text-danger">*</span>
                        <input
                            type="text"
                            v-model="
                                personal_data.personalInformation
                                    .permanentBarangay
                            "
                            id="permanent_barangay"
                            class="form-control"
                            placeholder="Enter Barangay"
                        />
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="city">CITY/MUNICIPALITY</label
                        ><span class="text-danger">*</span>
                        <input
                            type="text"
                            v-model="
                                personal_data.personalInformation.permanentCity
                            "
                            id="permanent_city"
                            class="form-control"
                            placeholder="Enter City or Municipality"
                        />
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="province">PROVINCE</label
                        ><span class="text-danger">*</span>
                        <input
                            type="text"
                            v-model="
                                personal_data.personalInformation
                                    .permanentProvince
                            "
                            id="permanent_province"
                            class="form-control"
                            placeholder="Enter Province"
                        />
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="zipcode">ZIP CODE</label
                        ><span class="text-danger">*</span>
                        <input
                            type="number"
                            v-model="
                                personal_data.personalInformation
                                    .permanentZipCode
                            "
                            id="permanent_zipcode"
                            class="form-control"
                            placeholder="Enter Zipcode"
                        />
                    </div>
                </div>
                <div class="p-3 float-right">
                    <button
                        class="btn btn-primary font-weight-bold"
                        @click="submitPersonalInformation"
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
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</template>

<script>
import swal from "sweetalert";
export default {
    data() {
        return {
            isLoading: false,
            isComplete: false,
            isSameAsAbove: false,
            personal_data: {
                personalInformation: {
                    surname: "",
                    firstname: "",
                    middlename: "",
                    nameExtension: "",
                    dateOfBirth: "",
                    placeOfBirth: "",
                    sex: "",
                    status: "",
                    height: "",
                    weight: "",
                    bloodType: "",
                    gsisIdNo: "",
                    pagibigIdNo: "",
                    philHealthIdNo: "",
                    sssIdNo: "",
                    tinIdNo: "",
                    agencyEmpIdNo: "",
                    citizenship: "",
                    citizenshipBy: "",
                    country: "",
                    telephoneNumber: "",
                    mobileNumber: "",
                    emailAddress: "",
                    residentialLotNo: "",
                    residentialStreet: "",
                    residentialSubdivision: "",
                    residentialBarangay: "",
                    residentialCity: "",
                    residentialProvince: "",
                    residentialZipCode: "",
                    permanentLotNo: "",
                    permanentStreet: "",
                    permanentSubdivision: "",
                    permanentBarangay: "",
                    permanentCity: "",
                    permanentProvince: "",
                    permanentZipCode: ""
                }
            }
        };
    },
    methods: {
        sameAsAboveAddress() {
            this.isSameAsAbove = !this.isSameAsAbove;

            if (!this.isSameAsAbove) {
                this.personal_data.personalInformation.permanentLotNo = "";
                this.personal_data.personalInformation.permanentStreet = "";
                this.personal_data.personalInformation.permanentSubdivision =
                    "";
                this.personal_data.personalInformation.permanentBarangay = "";
                this.personal_data.personalInformation.permanentCity = "";
                this.personal_data.personalInformation.permanentProvince = "";
                this.personal_data.personalInformation.permanentZipCode = "";
            } else {
                this.personal_data.personalInformation.permanentLotNo = this.personal_data.personalInformation.residentialLotNo;
                this.personal_data.personalInformation.permanentStreet = this.personal_data.personalInformation.residentialStreet;
                this.personal_data.personalInformation.permanentSubdivision = this.personal_data.personalInformation.residentialSubdivision;
                this.personal_data.personalInformation.permanentBarangay = this.personal_data.personalInformation.residentialBarangay;
                this.personal_data.personalInformation.permanentCity = this.personal_data.personalInformation.residentialCity;
                this.personal_data.personalInformation.permanentProvince = this.personal_data.personalInformation.residentialProvince;
                this.personal_data.personalInformation.permanentZipCode = this.personal_data.personalInformation.residentialZipCode;
            }
        },
        submitPersonalInformation(e) {
            e.preventDefault();
            this.isLoading = true;
            swal({
                title: "Did you double check all the data?",
                // text: "Create new employee?",
                text: "",
                icon: "warning",
                buttons: ["CHECK AGAIN", "YES"],
                dangerMode: true
            }).then(proceed => {
                if (proceed) {
                    // Send data
                    window.axios
                        .post(
                            "/employee/personal/information/store",
                            this.personal_data
                        )
                        .then(response => {
                            this.isLoading = false;
                            this.isComplete = true;
                            this.$emit(
                                "display-family-background",
                                response.data.employee_id
                            );
                            swal({
                                title: "Good job!",
                                text: "Min sulod na ang data!",
                                icon: "success"
                            });
                        })
                        .catch(response => {
                            this.isLoading = false;
                        });
                } else {
                    this.isLoading = false;
                }
            });
        }
    }
};
</script>
