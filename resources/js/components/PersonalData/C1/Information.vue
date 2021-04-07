<template>
    <div>
        <div class="card">
            <div
                class="card-header"
                :data-target="isComplete ? '#information' : ''"
                :data-toggle="isComplete ? 'collapse' : ''"
                :style="isComplete ? 'cursor : pointer;' : ''"
            >
                <h5 class="mb-0 p-2">
                    <i v-if="isComplete" class="fa fa-check text-success"></i>
                    PERSONAL INFORMATION
                    <i
                        v-if="isComplete"
                        class="text-success float-right fa fa-caret-down"
                        aria-hidden="true"
                    ></i>
                </h5>
            </div>
            <div
                class="collapse"
                :class="isComplete ? '' : 'show'"
                :id="isComplete ? 'information' : ''"
            >
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
                            :class="
                                !errors.hasOwnProperty('surname')
                                    ? ''
                                    : 'is-invalid'
                            "
                            id="surname"
                            placeholder="Enter Surname"
                            v-model="personal_data.surname"
                        />
                        <p class="text-danger text-sm">
                            {{ errors.surname }}
                        </p>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="firstname">FIRST NAME</label>
                        <span class="text-danger">*</span>
                        <input
                            type="text"
                            class="form-control"
                            id="firstname"
                            placeholder="Enter First Name"
                            :class="errors.firstname ? 'is-invalid' : ''"
                            v-model="personal_data.firstname"
                        />
                        <p class="text-danger text-sm">
                            {{ errors.firstname }}
                        </p>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="middlename">MIDDLE NAME</label>
                        <input
                            type="text"
                            class="form-control"
                            :class="
                                !errors.hasOwnProperty('middlename')
                                    ? ''
                                    : 'is-invalid'
                            "
                            id="middlename"
                            placeholder="Enter Middle Name"
                            v-model="personal_data.middlename"
                        />
                        <p class="text-danger text-sm">
                            {{ errors.middlename }}
                        </p>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="nameextension">NAME EXTENSION</label>
                        <input
                            type="text"
                            class="form-control"
                            :class="
                                !errors.hasOwnProperty('nameExtension')
                                    ? ''
                                    : 'is-invalid'
                            "
                            maxlength="3"
                            id="nameextension"
                            placeholder="(JR.,SR.)"
                            v-model="personal_data.nameExtension"
                        />
                        <p class="text-danger text-sm">
                            {{ errors.nameExtension }}
                        </p>
                    </div>
                </div>
                <div class="row pl-3 pr-3">
                    <div class="form-group col-lg-3">
                        <label for="dateofbirth">DATE OF BIRTH</label
                        ><span class="text-danger">*</span>
                        <input
                            class="form-control"
                            :class="
                                !errors.hasOwnProperty('dateOfBirth')
                                    ? ''
                                    : 'is-invalid'
                            "
                            type="date"
                            v-model="personal_data.dateOfBirth"
                        />
                        <p class="text-danger text-sm">
                            {{ errors.dateOfBirth }}
                        </p>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="placeofbirth">PLACE OF BIRTH</label
                        ><span class="text-danger">*</span>
                        <input
                            type="text"
                            class="form-control"
                            id="placeofbirth"
                            :class="
                                !errors.hasOwnProperty('placeOfBirth')
                                    ? ''
                                    : 'is-invalid'
                            "
                            placeholder="Enter Place of Birth"
                            v-model="personal_data.placeOfBirth"
                        />
                        <p class="text-danger text-sm">
                            {{ errors.placeOfBirth }}
                        </p>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="sex">SEX</label
                        ><span class="text-danger">*</span>
                        <select
                            class="form-control"
                            :class="
                                !errors.hasOwnProperty('sex')
                                    ? ''
                                    : 'is-invalid'
                            "
                            id="sex"
                            v-model="personal_data.sex"
                        >
                            <option value="MALE">MALE</option>
                            <option value="FEMALE">FEMALE</option>
                        </select>
                        <p class="text-danger text-sm">
                            {{ errors.sex }}
                        </p>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="status">STATUS</label
                        ><span class="text-danger">*</span>
                        <select
                            class="form-control"
                            :class="
                                !errors.hasOwnProperty('status')
                                    ? ''
                                    : 'is-invalid'
                            "
                            id="status"
                            v-model="personal_data.status"
                        >
                            <option value="SINGLE">SINGLE</option>
                            <option value="MARRIED">MARRIED</option>
                            <option value="WIDOWED">WIDOWED</option>
                            <option value="SEPARATED">SEPARATED</option>
                            <option value="OTHERS">OTHERS</option>
                        </select>
                        <p class="text-danger text-sm">
                            {{ errors.status }}
                        </p>
                    </div>
                </div>
                <div class="row pl-3 pr-3">
                    <div class="form group col-lg-4">
                        <label for="height">HEIGHT</label
                        ><span class="text-danger">*</span
                        ><span class="text-sm text-secondary">(m)</span>
                        <input
                            type="number"
                            id="height"
                            :class="
                                !errors.hasOwnProperty('height')
                                    ? ''
                                    : 'is-invalid'
                            "
                            class="form-control"
                            placeholder="Enter height in meter"
                            v-model="personal_data.height"
                        />
                        <p class="text-danger text-sm">{{ errors.height }}</p>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="weight">WEIGHT</label
                        ><span class="text-danger">*</span
                        ><span class="text-sm text-secondary">(kg)</span>
                        <input
                            type="number"
                            :class="
                                !errors.hasOwnProperty('weight')
                                    ? ''
                                    : 'is-invalid'
                            "
                            id="weight"
                            class="form-control"
                            placeholder="Enter weight in kilogram"
                            v-model="personal_data.weight"
                        />
                        <p class="text-danger text-sm">
                            {{ errors.weight }}
                        </p>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="bloodtype">BLOODTYPE</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Enter bloodtype"
                            v-model="personal_data.bloodType"
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
                            v-model="personal_data.gsisIdNo"
                        />
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="pagibigidno">PAG-IBIG ID NUMBER</label>
                        <input
                            type="text"
                            id="pagibigidno"
                            class="form-control"
                            placeholder="Enter PAG-IBIG ID No."
                            v-model="personal_data.pagibigIdNo"
                        />
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="philhealthidno">PHILHEALTH ID NUMBER</label>
                        <input
                            type="text"
                            id="philhealthidno"
                            class="form-control"
                            placeholder="Enter PHILHEALTH ID No."
                            v-model="personal_data.philHealthIdNo"
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
                            v-model="personal_data.sssIdNo"
                        />
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="tinidno">TIN ID NUMBER</label>
                        <input
                            type="text"
                            id="tinidno"
                            class="form-control"
                            placeholder="Enter TIN ID No."
                            v-model="personal_data.tinIdNo"
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
                            v-model="personal_data.agencyEmpIdNo"
                        />
                    </div>
                </div>
                <div class="row pl-3 pr-3">
                    <div class="form-group col-lg-4">
                        <label for="citizenship">CITIZENSHIP</label
                        ><span class="text-danger">*</span>
                        <select
                            class="form-control"
                            :class="
                                !errors.hasOwnProperty('citizenship')
                                    ? ''
                                    : 'is-invalid'
                            "
                            id="citizenship"
                            v-model="personal_data.citizenship"
                        >
                            <option value="FILIPINO">FILIPINO</option>
                            <option value="DUAL CITIZEN">DUAL CITIZEN</option>
                        </select>
                        <p class="text-danger text-sm">
                            {{ errors.citizenship }}
                        </p>
                    </div>
                    <div
                        class="form-group col-lg-4"
                        v-if="personal_data.citizenship == 'DUAL CITIZEN'"
                    >
                        <label for="citizenshipby">BY</label
                        ><span class="text-danger">*</span>
                        <select
                            class="form-control"
                            id="citizenshipby"
                            :class="
                                !errors.hasOwnProperty('citizenshipBy')
                                    ? ''
                                    : 'is-invalid'
                            "
                            v-model="personal_data.citizenshipBy"
                        >
                            <option value="BIRTH">BIRTH</option>
                            <option value="NATURALIZATION"
                                >NATURALIZATION</option
                            >
                        </select>
                        <p class="text-danger text-sm">
                            {{ errors.citizenshipBy }}
                        </p>
                    </div>

                    <div
                        class="form-group col-lg-4"
                        v-if="personal_data.citizenship == 'DUAL CITIZEN'"
                    >
                        <label for="countries">INDICATE COUNTRY</label
                        ><span class="text-danger">*</span>
                        <select
                            class="form-control"
                            id="countries"
                            v-model="personal_data.country"
                            :class="
                                !errors.hasOwnProperty('country')
                                    ? ''
                                    : 'is-invalid'
                            "
                        >
                            <option
                                v-for="(country, index) in countries"
                                :key="index"
                                :value="country"
                                >{{ country }}</option
                            >
                        </select>
                        <p class="text-danger text-sm">{{ errors.country }}</p>
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="telno">TELEPHONE NUMBER</label>
                        <input
                            type="text"
                            id="telno"
                            class="form-control"
                            placeholder="Optional"
                            v-model="personal_data.telephoneNumber"
                        />
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="mobileno">MOBILE NUMBER</label
                        ><span class="text-danger">*</span>
                        <input
                            type="text"
                            :class="
                                !errors.hasOwnProperty('mobileNumber')
                                    ? ''
                                    : 'is-invalid'
                            "
                            id="mobileno"
                            class="form-control"
                            placeholder="Enter Mobile Number"
                            v-model="personal_data.mobileNumber"
                        />
                        <p class="text-danger text-sm">
                            {{ errors.mobileNumber }}
                        </p>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="email">EMAIL ADDRESS</label>
                        <input
                            type="email"
                            id="email"
                            class="form-control"
                            placeholder="Optional"
                            v-model="personal_data.emailAddress"
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
                        <label for="lotno">HOUSE/BLOCK/LOT NO.</label>
                        <input
                            type="text"
                            v-model="personal_data.residentialLotNo"
                            id="lotno"
                            class="form-control"
                            placeholder="Enter house/block/lot no."
                        />
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="street">STREET</label>
                        <input
                            type="text"
                            v-model="personal_data.residentialStreet"
                            id="street"
                            class="form-control"
                            placeholder="Enter Street"
                        />
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="subdivision">SUBDIVISION/VILLAGE</label>
                        <input
                            type="text"
                            v-model="personal_data.residentialSubdivision"
                            id="subdivision"
                            class="form-control"
                            placeholder="Enter Subdivision or Village"
                        />
                    </div>
                </div>
                <div class="row pl-3 pr-3">
                    <div class="form-group col-lg-3">
                        <label for="province">PROVINCE</label
                        ><span class="text-danger">*</span>
                        <select
                            type="text"
                            v-model="personal_data.residentialProvince"
                            @change="provinceChange"
                            class="form-control"
                            :class="
                                !errors.hasOwnProperty('residentialProvince')
                                    ? ''
                                    : 'is-invalid'
                            "
                        >
                            <option
                                v-for="(province, index) in provinces"
                                :key="index"
                                :value="province.code"
                                >{{ province.name }}</option
                            >
                        </select>
                        <p class="text-danger text-sm">
                            {{ errors.residentialProvince }}
                        </p>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="city">CITY/MUNICIPALITY</label
                        ><span class="text-danger">*</span>
                        <select
                            type="text"
                            v-model="personal_data.residentialCity"
                            @change="municipalChange"
                            class="form-control"
                            :class="
                                !errors.hasOwnProperty('residentialCity')
                                    ? ''
                                    : 'is-invalid'
                            "
                            :readonly="
                                personal_data.residentialProvince ? false : true
                            "
                            placeholder="Enter City or Municipality"
                        >
                            <option
                                v-for="(city, index) in cities"
                                :key="index"
                                :value="city.code"
                                >{{ city.name }}</option
                            >
                        </select>
                        <p class="text-danger text-sm">
                            {{ errors.residentialCity }}
                        </p>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="barangay">BARANGAY</label
                        ><span class="text-danger">*</span>
                        <select
                            v-model="personal_data.residentialBarangay"
                            class="form-control"
                            :class="
                                !errors.hasOwnProperty('residentialBarangay')
                                    ? ''
                                    : 'is-invalid'
                            "
                            :readonly="
                                personal_data.residentialCity ? false : true
                            "
                        >
                            <option
                                v-for="(barangay, index) in barangays"
                                :key="index"
                                :value="barangay.code"
                                >{{ barangay.name }}</option
                            >
                        </select>
                        <p class="text-danger text-sm">
                            {{ errors.residentialBarangay }}
                        </p>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="zipcode">ZIP CODE</label
                        ><span class="text-danger">*</span>
                        <input
                            type="number"
                            v-model="personal_data.residentialZipCode"
                            class="form-control"
                            :class="
                                !errors.hasOwnProperty('residentialZipCode')
                                    ? ''
                                    : 'is-invalid'
                            "
                            placeholder="Enter Zipcode"
                        />
                        <p class="text-danger text-sm">
                            {{ errors.residentialZipCode }}
                        </p>
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
                        <label for="lotno">HOUSE/BLOCK/LOT NO.</label>
                        <input
                            type="text"
                            v-model="personal_data.permanentLotNo"
                            :readonly="isSameAsAbove ? true : false"
                            class="form-control"
                            placeholder="Enter house/block/lot no."
                        />
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="street">STREET</label>
                        <input
                            type="text"
                            v-model="personal_data.permanentStreet"
                            :readonly="isSameAsAbove ? true : false"
                            class="form-control"
                            placeholder="Enter Street"
                        />
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="subdivision">SUBDIVISION/VILLAGE</label>
                        <input
                            type="text"
                            v-model="personal_data.permanentSubdivision"
                            :readonly="isSameAsAbove ? true : false"
                            class="form-control"
                            placeholder="Enter Subdivision or Village"
                        />
                    </div>
                </div>

                <div class="row pl-3 pr-3">
                    <div class="form-group col-lg-3">
                        <label for="province">PROVINCE</label
                        ><span class="text-danger">*</span>
                        <select
                            type="text"
                            v-model="personal_data.permanentProvince"
                            :class="
                                !errors.hasOwnProperty('permanentProvince')
                                    ? ''
                                    : 'is-invalid'
                            "
                            :readonly="isSameAsAbove ? true : false"
                            class="form-control"
                        >
                            <option
                                v-for="(province, index) in provinces"
                                :key="index"
                                :value="province.code"
                                :selected="
                                    province.code ==
                                    personal_data.residentialProvince
                                        ? true
                                        : false
                                "
                                >{{ province.name }}</option
                            >
                        </select>
                        <p class="text-danger text-sm">
                            {{ errors.permanentProvince }}
                        </p>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="city">CITY/MUNICIPALITY</label
                        ><span class="text-danger">*</span>
                        <select
                            v-model="personal_data.permanentCity"
                            :class="
                                !errors.hasOwnProperty('permanentCity')
                                    ? ''
                                    : 'is-invalid'
                            "
                            :readonly="isSameAsAbove ? true : false"
                            class="form-control"
                        >
                            <option
                                v-for="(city, index) in cities"
                                :key="index"
                                :value="city.code"
                                :selected="
                                    city.code == personal_data.residentialCity
                                        ? true
                                        : false
                                "
                                >{{ city.name }}</option
                            >
                        </select>
                        <p class="text-danger text-sm">
                            {{ errors.permanentCity }}
                        </p>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="barangay">BARANGAY</label
                        ><span class="text-danger">*</span>
                        <select
                            v-model="personal_data.permanentBarangay"
                            :readonly="isSameAsAbove ? true : false"
                            :class="
                                !errors.hasOwnProperty('permanentBarangay')
                                    ? ''
                                    : 'is-invalid'
                            "
                            class="form-control"
                        >
                            <option
                                v-for="(barangay, index) in barangays"
                                :key="index"
                                :value="barangay.code"
                                :selected="
                                    barangay.code ==
                                    personal_data.residentialBarangay
                                        ? true
                                        : false
                                "
                                >{{ barangay.name }}</option
                            >
                        </select>
                        <p class="text-danger text-sm">
                            {{ errors.permanentBarangay }}
                        </p>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="zipcode">ZIP CODE</label
                        ><span class="text-danger">*</span>
                        <input
                            type="number"
                            v-model="personal_data.permanentZipCode"
                            :class="
                                !errors.hasOwnProperty('permanentZipCode')
                                    ? ''
                                    : 'is-invalid'
                            "
                            :readonly="isSameAsAbove ? true : false"
                            class="form-control"
                            placeholder="Enter Zipcode"
                        />
                        <p class="text-danger text-sm">
                            {{ errors.permanentZipCode }}
                        </p>
                    </div>
                </div>
                <div class="p-3 float-right">
                    <button
                        class="btn btn-primary font-weight-bold"
                        @click="submitPersonalInformation"
                        v-if="!isComplete"
                        :disabled="isLoading"
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
export default {
    data() {
        return {
            isLoading: false,
            isComplete: false,
            isSameAsAbove: false,
            personal_data: {
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
            },
            countries: [
                "Afghanistan",
                "Albania",
                "Algeria",
                "Andorra",
                "Angola",
                "Antigua and Barbuda",
                "Argentina",
                "Armenia",
                "Australia",
                "Austria",
                "Azerbaijan",
                "Bahamas",
                "Bahrain",
                "Bangladesh",
                "Barbados",
                "Belarus",
                "Belgium",
                "Belize",
                "Benin",
                "Bhutan",
                "Bolivia",
                "Bosnia and Herzegovina",
                "Botswana",
                "Brazil",
                "Brunei",
                "Bulgaria",
                "Burkina Faso",
                "Burundi",
                "Côte d'Ivoire",
                "Cabo Verde",
                "Cambodia",
                "Cameroon",
                "Canada",
                "Central African Republic",
                "Chad",
                "Chile",
                "China",
                "Colombia",
                "Comoros",
                "Congo (Congo-Brazzaville)",
                "Costa Rica",
                "Croatia",
                "Cuba",
                "Cyprus",
                "Czechia (Czech Republic)",
                "Democratic Republic of the Congo",
                "Denmark",
                "Djibouti",
                "Dominica",
                "Dominican Republic",
                "Ecuador",
                "Egypt",
                "El Salvador",
                "Equatorial Guinea",
                "Eritrea",
                "Estonia",
                'Eswatini (fmr. "Swaziland")',
                "Ethiopia",
                "Fiji",
                "Finland",
                "France",
                "Gabon",
                "Gambia",
                "Georgia",
                "Germany",
                "Ghana",
                "Greece",
                "Grenada",
                "Guatemala",
                "Guinea",
                "Guinea-Bissau",
                "Guyana",
                "Haiti",
                "Holy See",
                "Honduras",
                "Hungary",
                "Iceland",
                "India",
                "Indonesia",
                "Iran",
                "Iraq",
                "Ireland",
                "Israel",
                "Italy",
                "Jamaica",
                "Japan",
                "Jordan",
                "Kazakhstan",
                "Kenya",
                "Kiribati",
                "Kuwait",
                "Kyrgyzstan",
                "Laos",
                "Latvia",
                "Lebanon",
                "Lesotho",
                "Liberia",
                "Libya",
                "Liechtenstein",
                "Lithuania",
                "Luxembourg",
                "Madagascar",
                "Malawi",
                "Malaysia",
                "Maldives",
                "Mali",
                "Malta",
                "Marshall Islands",
                "Mauritania",
                "Mauritius",
                "Mexico",
                "Micronesia",
                "Moldova",
                "Monaco",
                "Mongolia",
                "Montenegro",
                "Morocco",
                "Mozambique",
                "Myanmar (formerly Burma)",
                "Namibia",
                "Nauru",
                "Nepal",
                "Netherlands",
                "New Zealand",
                "Nicaragua",
                "Niger",
                "Nigeria",
                "North Korea",
                "North Macedonia",
                "Norway",
                "Oman",
                "Pakistan",
                "Palau",
                "Palestine State",
                "Panama",
                "Papua New Guinea",
                "Paraguay",
                "Peru",
                "Philippines",
                "Poland",
                "Portugal",
                "Qatar",
                "Romania",
                "Russia",
                "Rwanda",
                "Saint Kitts and Nevis",
                "Saint Lucia",
                "Saint Vincent and the Grenadines",
                "Samoa",
                "San Marino",
                "Sao Tome and Principe",
                "Saudi Arabia",
                "Senegal",
                "Serbia",
                "Seychelles",
                "Sierra Leone",
                "Singapore",
                "Slovakia",
                "Slovenia",
                "Solomon Islands",
                "Somalia",
                "South Africa",
                "South Korea",
                "South Sudan",
                "Spain",
                "Sri Lanka",
                "Sudan",
                "Suriname",
                "Sweden",
                "Switzerland",
                "Syria",
                "Tajikistan",
                "Tanzania",
                "Thailand",
                "Timor-Leste",
                "Togo",
                "Tonga",
                "Trinidad and Tobago",
                "Tunisia",
                "Turkey",
                "Turkmenistan",
                "Tuvalu",
                "Uganda",
                "Ukraine",
                "United Arab Emirates",
                "United Kingdom",
                "United States of America",
                "Uruguay",
                "Uzbekistan",
                "Vanuatu",
                "Venezuela",
                "Vietnam",
                "Yemen",
                "Zambia",
                "Zimbabwe"
            ],
            provinces: [],
            cities: [],
            barangays: [],
            errors: {}
        };
    },
    methods: {
        provinceChange() {
            // Since the province value change we need to fetch cities by selected province code.
            window
                .axios(
                    `/api/province/cities/by/${this.personal_data.residentialProvince}`
                )
                .then(response => (this.cities = response.data));
        },
        municipalChange() {
            window
                .axios(
                    `/api/city/barangay/by/${this.personal_data.residentialCity}`
                )
                .then(response => (this.barangays = response.data));
        },
        sameAsAboveAddress() {
            this.isSameAsAbove = !this.isSameAsAbove;

            if (!this.isSameAsAbove) {
                this.personal_data.permanentLotNo = "";
                this.personal_data.permanentStreet = "";
                this.personal_data.permanentSubdivision = "";
                this.personal_data.permanentBarangay = "";
                this.personal_data.permanentCity = "";
                this.personal_data.permanentProvince = "";
                this.personal_data.permanentZipCode = "";
            } else {
                this.personal_data.permanentLotNo = this.personal_data.residentialLotNo;
                this.personal_data.permanentStreet = this.personal_data.residentialStreet;
                this.personal_data.permanentSubdivision = this.personal_data.residentialSubdivision;
                this.personal_data.permanentBarangay = this.personal_data.residentialBarangay;
                this.personal_data.permanentCity = this.personal_data.residentialCity;
                this.personal_data.permanentProvince = this.personal_data.residentialProvince;
                this.personal_data.permanentZipCode = this.personal_data.residentialZipCode;
            }
        },
        submitPersonalInformation(e) {
            e.preventDefault();
            this.isLoading = true;

            window.axios
                .post(
                    "/employee/personal/information/store",
                    this.personal_data
                )
                .then(response => {

                    if(response.status === 200) {
                        this.errors = {};
                        this.isLoading = false;
                        this.isComplete = true;
                        localStorage.setItem(
                            "employee_id",
                            response.data.employee_id
                        );

                        localStorage.setItem(
                            "personal_information",
                            JSON.stringify(response.data)
                        );

                        this.$emit("next-panel-family-background");
                    }
                })
                .catch(error => {
                    this.isLoading = false;
                    this.errors = {};
                    // Check the error status code.
                    if (error.response.status === 422) {
                        Object.keys(error.response.data.errors).map(
                            (field, index) => {
                                let [fieldMessage] = error.response.data.errors[
                                    field
                                ];
                                this.errors[field] = fieldMessage;
                            }
                        );
                    }
                });
        }
    },
    mounted() {
        // This simply means that the user already filled this section.
        if (localStorage.getItem("personal_information")) {
            this.personal_data = JSON.parse(
                localStorage.getItem("personal_information")
            );

            this.isComplete = true;

            this.$emit("next-panel-family-background");
        }
    },
    created() {
        window.axios
            .get("/api/province/all")
            .then(response => (this.provinces = response.data));
    }
};
</script>
