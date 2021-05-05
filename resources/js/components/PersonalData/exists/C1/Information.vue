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
                    <div class="col-lg-3">
                        <label for="surname" class="form-group has-float-label">
                        <input
                            type="text"
                            class="form-control"
                            :class="
                                !errors.hasOwnProperty('lastname')
                                    ? ''
                                    : 'is-invalid'
                            "
                            id="surname"
                            placeholder="Enter Surname"
                            v-model="employee.lastname"
                            style="text-transform:uppercase; outline:none; box-shadow: 0px 0px 0px transparent;"
                        />
                        <span>Surname</span>
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.lastname }}
                        </p>
                    </div>
                    <div class="col-lg-3">
                        <label for="firstname" class="form-group has-float-label">
                        <input
                            type="text"
                            class="form-control"
                            id="firstname"
                            placeholder="Enter First Name"
                            :class="errors.firstname ? 'is-invalid' : ''"
                            v-model="employee.firstname"
                            style="text-transform:uppercase; outline:none; box-shadow: 0px 0px 0px transparent;"
                        />
                        <span>First Name</span>
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.firstname }}
                        </p>
                    </div>
                    <div class="col-lg-3">
                        <label for="middlename" class="form-group has-float-label">
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
                            v-model="employee.middlename"
                            style="text-transform:uppercase; outline:none; box-shadow: 0px 0px 0px transparent;"
                        />
                        <span>Middle Name</span>
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.middlename }}
                        </p>
                    </div>
                    <div class="col-lg-3">
                        <label for="nameextension" class="form-group has-float-label"
                            >
                            <select
                                type="text"
                                class="form-control custom-select"
                                :class="
                                    !errors.hasOwnProperty('extension')
                                        ? ''
                                        : 'is-invalid'
                                "
                                maxlength="3"
                                max="3"
                                id="nameextension"
                                v-model="employee.extension"
                                style="text-transform:uppercase; outline: none; box-shadow: 0px 0px 0px transparent;"
                            >
                                <option value="" disabled
                                    >Select Extension</option
                                >
                                <option value="sr">SR</option>
                                <option value="sr">SR</option>
                                <option value="jr">JR</option>
                                <option value="iii">III</option>
                            </select>
                            <span>Extension Name</span>
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.extension }}
                        </p>
                    </div>
                </div>
                <div class="row pl-3 pr-3">
                    <div class="col-lg-3">
                        <label for="dateofbirth" class="form-group has-float-label"> 
                        <input
                            class="form-control"
                            :class="
                                !errors.hasOwnProperty('date_birth')
                                    ? ''
                                    : 'is-invalid'
                            "
                            type="date"
                            v-model="employee.date_birth"
                            style="outline: none; box-shadow: 0px 0px 0px transparent;"
                        />
                        <span>Date of Birth</span>
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.date_birth }}
                        </p>
                    </div>
                    <div class="col-lg-3">
                        <label for="placeofbirth" class="form-group has-float-label">
                        <input
                            type="text"
                            class="form-control"
                            id="placeofbirth"
                            :class="
                                !errors.hasOwnProperty('place_birth')
                                    ? ''
                                    : 'is-invalid'
                            "
                            placeholder="Enter Place of Birth"
                            v-model="employee.place_birth"
                            style="text-transform:uppercase; outline: none; box-shadow: 0px 0px 0px transparent;"
                        />
                        <span>Place of Birth</span>
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.place_birth }}
                        </p>
                    </div>

                    <div class="col-lg-3">
                        <label for="sex" class="form-group has-float-label">
                        <select
                            class="form-control"
                            v-model="employee.sex"
                            :class="
                                !errors.hasOwnProperty('sex')
                                    ? ''
                                    : 'is-invalid'
                            "
                            id="sex"
                            style="outline: none; box-shadow: 0px 0px 0px transparent;"
                        >
                            <option value="male">MALE</option>
                            <option value="female">FEMALE</option>
                        </select>
                        <span>Sex</span>
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.sex }}
                        </p>
                    </div>

                    <div class="col-lg-3">
                        <label for="status" class="form-group has-float-label">
                        <select
                            class="form-control"
                            :class="
                                !errors.hasOwnProperty('civil_status')
                                    ? ''
                                    : 'is-invalid'
                            "
                            id="status"
                            v-model="employee.civil_status"
                            style="outline: none; box-shadow: 0px 0px 0px transparent;"
                        >
                            <option value="SINGLE">SINGLE</option>
                            <option value="MARRIED">MARRIED</option>
                            <option value="WIDOWED">WIDOWED</option>
                            <option value="SEPARATED">SEPARATED</option>
                            <option value="OTHERS">OTHERS</option>
                        </select>
                        <span>Status</span>
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.civil_status }}
                        </p>
                    </div>
                </div>
                <div class="row pl-3 pr-3">
                    <div class="col-lg-4">
                        <label for="height" class="form group has-float-label">
                        
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
                            v-model="employee.height"
                            style="outline: none; box-shadow: 0px 0px 0px transparent;"
                        />
                        <span>Height(m)</span>
                        </label>
                        <p class="text-danger text-sm">{{ errors.height }}</p>
                    </div>
                    <div class="col-lg-4">
                        <label for="weight" class="form-group has-float-label">
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
                            v-model="employee.weight"
                            style="outline: none; box-shadow: 0px 0px 0px transparent;"
                        />
                        <span>Weight(kg)</span>
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.weight }}
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <label for="bloodtype" class="form-group has-float-label">
                        <input
                            type="text"
                            class="form-control"
                            maxlength="3"
                            :class="
                                errors.hasOwnProperty('blood_type')
                                    ? 'is-invalid'
                                    : ''
                            "
                            placeholder="Enter bloodtype"
                            v-model="employee.blood_type"
                            style="text-transform:uppercase outline: none; box-shadow: 0px 0px 0px transparent;"
                        />
                        <span>Bloodtype</span>
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.blood_type }}
                        </p>
                    </div>
                </div>
                <div class="row pl-3 pr-3">
                    <div class="col-lg-4">
                        <label for="gsisidno" class="form-group has-float-label">
                        <input
                            type="text"
                            id="gsisidno"
                            class="form-control"
                            placeholder="Enter GSIS ID No."
                            v-model="employee.gsis_id_no"
                            style="outline: none; box-shadow: 0px 0px 0px transparent;"
                        />
                        <span>GSIS ID Number</span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label for="pagibigidno" class="form-group has-float-label">
                        <input
                            type="text"
                            id="pagibigidno"
                            class="form-control"
                            placeholder="Enter PAG-IBIG ID No."
                            v-model="employee.pag_ibig_no"
                            style="outline: none; box-shadow: 0px 0px 0px transparent;"
                        />
                        <span>PAG-IBIG ID Number</span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label for="philhealthidno" class="form-group has-float-label">
                        <input
                            type="text"
                            id="philhealthidno"
                            class="form-control"
                            placeholder="Enter PHILHEALTH ID No."
                            v-model="employee.philhealth_no"
                            style="outline: none; box-shadow: 0px 0px 0px transparent;"
                        />
                        <span>Philhealth ID Number</span>
                        </label>
                    </div>
                </div>
                <div class="row pl-3 pr-3">
                    <div class="col-lg-4">
                        <label for="sssidno" class="form-group has-float-label">
                        <input
                            type="text"
                            id="sssidno"
                            class="form-control"
                            placeholder="Enter SSS ID No."
                            v-model="employee.sss_no"
                            style="outline: none; box-shadow: 0px 0px 0px transparent;"
                        />
                        <span>SSS ID Number</span>
                        </label>
                    </div>

                    <div class="col-lg-4">
                        <label for="tinidno" class="form-group has-float-label">
                        <input
                            type="text"
                            id="tinidno"
                            class="form-control"
                            placeholder="Enter TIN ID No."
                            style="outline: none; box-shadow: 0px 0px 0px transparent;"
                            v-model="employee.tin_no"
                        />
                        <span>TIN ID Number</span>
                        </label>
                    </div>

                    <div class="col-lg-4">
                        <label for="agencyempidno" class="form-group has-float-label">
                        <input
                            type="text"
                            id="agencyempidno"
                            class="form-control"
                            placeholder="Enter agency employee no."
                            v-model="employee.agency_employee_no"
                            style="outline: none; box-shadow: 0px 0px 0px transparent;"
                        />
                        <span>Agency Employee Number</span>
                        </label>
                    </div>
                </div>
                <div class="row pl-3 pr-3">
                    <div class="col-lg-4">
                        <label for="citizenship" class="form-group has-float-label">
                        <select
                            class="form-control custom-select"
                            :class="
                                !errors.hasOwnProperty('citizenship')
                                    ? ''
                                    : 'is-invalid'
                            "
                            id="citizenship"
                            v-model="employee.citizenship"
                            style="outline: none; box-shadow: 0px 0px 0px transparent;"
                        >
                            <option value="FILIPINO">FILIPINO</option>
                            <option value="DUAL CITIZEN">DUAL CITIZEN</option>
                        </select>
                        <span>Citizenship</span>
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.citizenship }}
                        </p>
                    </div>
                    <div
                        class="col-lg-4"
                        v-if="employee.citizenship == 'DUAL CITIZEN'"
                    >
                        <label for="citizenshipby" class="form-group has-float-label">
                        <select
                            class="form-control"
                            id="citizenshipby"
                            :class="
                                !errors.hasOwnProperty('citizenshipBy')
                                    ? ''
                                    : 'is-invalid'
                            "
                            v-model="employee.citizenshipBy"
                            style="outline: none; box-shadow: 0px 0px 0px transparent;"
                        >
                            <option value="BIRTH">BIRTH</option>
                            <option value="NATURALIZATION"
                                >NATURALIZATION</option
                            >
                        </select>
                        <span>By</span>
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.citizenshipBy }}
                        </p>
                    </div>

                    <div
                        class="col-lg-4"
                        v-if="employee.citizenship == 'DUAL CITIZEN'"
                    >
                        <label for="countries" class="form-group has-float-label">
                        <select
                            class="form-control"
                            id="countries"
                            v-model="employee.country"
                            :class="
                                !errors.hasOwnProperty('country')
                                    ? ''
                                    : 'is-invalid'
                            "
                            style="outline: none; box-shadow: 0px 0px 0px transparent;"
                        >
                            <option
                                v-for="(country, index) in countries"
                                :key="index"
                                :value="country"
                                >{{ country }}</option
                            >
                        </select>
                        <span>Indicate Country</span>
                        </label>
                        <p class="text-danger text-sm">{{ errors.country }}</p>
                    </div>

                    <div class="col-lg-4">
                        <label for="telno" class="form-group has-float-label">
                        <input
                            type="text"
                            id="telno"
                            class="form-control"
                            placeholder="Optional"
                            v-model="employee.telephone_no"
                            style="outline: none; box-shadow: 0px 0px 0px transparent;"
                        />
                        <span>Telephone Number</span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label for="mobileno" class="form-group has-float-label">
                        <input
                            type="text"
                            :class="
                                !errors.hasOwnProperty('mobile_no')
                                    ? ''
                                    : 'is-invalid'
                            "
                            id="mobileno"
                            class="form-control"
                            placeholder="Enter Mobile Number"
                            v-model="employee.mobile_no"
                            style="outline: none; box-shadow: 0px 0px 0px transparent;"
                        />
                        <span>Mobile Number</span>
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.mobile_no }}
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <label for="email" class="form-group has-float-label">
                        <input
                            type="email"
                            id="email"
                            class="form-control"
                            placeholder="Optional"
                            v-model="employee.email_address"
                            style="outline: none; box-shadow: 0px 0px 0px transparent;"
                        />
                        <span>Email Address</span>
                        </label>
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
                    <div class="col-lg-4">
                        <label for="lotno" class="form-group has-float-label">
                        <input
                            type="text"
                            v-model="employee.residential_house_no"
                            id="lotno"
                            class="form-control"
                            placeholder="Enter house/block/lot no."
                            style="text-transform:uppercase; outline: none; box-shadow: 0px 0px 0px transparent;"
                        />
                        <span>House/Block/Lot No.</span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label for="street" class="form-group has-float-label">
                        <input
                            type="text"
                            v-model="employee.residential_street"
                            id="street"
                            class="form-control"
                            placeholder="Enter Street"
                            style="text-transform:uppercase; outline: none; box-shadow: 0px 0px 0px transparent;"
                        />
                        <span>Street</span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label for="subdivision" class="form-group has-float-label">
                        <input
                            type="text"
                            v-model="employee.residential_village"
                            id="subdivision"
                            class="form-control"
                            placeholder="Enter Subdivision or Village"
                            style="text-transform:uppercase; outline: none; box-shadow: 0px 0px 0px transparent;"
                        />
                        <span>Subdivision/Village</span>
                        </label>
                    </div>
                </div>
                <div class="row pl-3 pr-3">
                    <div class="col-lg-3">
                        <label for="province" class="form-group has-float-label">
                        <v-select
                            label="name"
                            :options="provinces"
                            :value="employee.residential_province"
                            @input="provinceChange"
                            style="outline: none; box-shadow: 0px 0px 0px transparent;"
                        >
                            <!-- <option
                                v-for="(province, index) in provinces"
                                :key="index"
                                :value="province.code"
                                >{{ province.name }}</option
                            > -->
                        </v-select>
                        <!-- <p class="text-danger text-sm">
                            {{ errors.residential_province }}
                        </p> -->
                        <span>Province</span>
                        </label>
                    </div>
                    <div class="col-lg-3">
                        <label for="city" class="form-group has-float-label">
                        <v-select
                            label="name"
                            :value="employee.residential_city"
                            :options="cities"
                            @change="municipalChange"
                            :disabled="
                                employee.residential_province ? false : true
                            "
                            style="outline: none; box-shadow: 0px 0px 0px transparent;"
                        >
                            <!-- <option
                                v-for="(city, index) in cities"
                                :key="index"
                                :value="city.code"
                                >{{ city.name }}</option
                            > -->
                        </v-select>
                        <span>City/Municipality</span>
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.residential_city }}
                        </p>
                    </div>
                    <div class="col-lg-3">
                        <label for="barangay" class="form-group has-float-label">
                        <select
                            v-model="employee.residential_barangay"
                            class="form-control"
                            :class="
                                !errors.hasOwnProperty('residential_barangay')
                                    ? ''
                                    : 'is-invalid'
                            "
                            :disabled="employee.residential_city ? false : true"
                            style="outline: none; box-shadow: 0px 0px 0px transparent;"
                        >
                            <option
                                v-for="(barangay, index) in barangays"
                                :key="index"
                                :value="barangay.code"
                                >{{ barangay.name }}</option
                            >
                        </select>
                        <span>Barangay</span>
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.residential_barangay }}
                        </p>
                    </div>
                    <div class="col-lg-3">
                        <label for="zipcode" class="form-group has-float-label">
                        <input
                            type="number"
                            v-model="employee.residential_zip_code"
                            class="form-control"
                            @input="
                                if (
                                    employee.residential_zip_code.length >
                                    zipCodeMaxLength
                                )
                                    employee.residential_zip_code = employee.residential_zip_code.slice(
                                        0,
                                        zipCodeMaxLength
                                    );
                            "
                            :class="
                                !errors.hasOwnProperty('residential_zip_code')
                                    ? ''
                                    : 'is-invalid'
                            "
                            placeholder="Enter Zip Code"
                            style="outline: none; box-shadow: 0px 0px 0px transparent;"
                        />
                        <span>Zip Code</span>
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.residential_zip_code }}
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
                    <div class="col-lg-4">
                        <label for="lotno" class="form-group has-float-label">
                        <input
                            type="text"
                            v-model="employee.permanent_house_no"
                            :readonly="isSameAsAbove ? true : false"
                            class="form-control"
                            placeholder="Enter house/block/lot no."
                            style="text-transform:uppercase; outline: none; box-shadow: 0px 0px 0px transparent;"
                        />
                        <span>House/Block/Lot No.</span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label for="street" class="form-group has-float-label">
                        <input
                            type="text"
                            v-model="employee.permanent_street"
                            :readonly="isSameAsAbove ? true : false"
                            class="form-control"
                            placeholder="Enter Street"
                            style="text-transform:uppercase; outline: none; box-shadow: 0px 0px 0px transparent;"
                        />
                        <span>Street</span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label for="subdivision" class="form-group has-float-label">
                        <input
                            type="text"
                            v-model="employee.permanent_village"
                            :readonly="isSameAsAbove ? true : false"
                            class="form-control"
                            placeholder="Enter Subdivision or Village"
                            style="text-transform:uppercase; outline: none; box-shadow: 0px 0px 0px transparent;"
                        />
                        <span>Subdivision/Village</span>
                        </label>
                    </div>
                </div>

                <div class="row pl-3 pr-3">
                    <div class="col-lg-3">
                        <label for="province" class="form-group has-float-label">
                        <select
                            type="text"
                            v-model="employee.permanentProvince"
                            @change="permanentProvinceChange"
                            :class="
                                !errors.hasOwnProperty('permanentProvince')
                                    ? ''
                                    : 'is-invalid'
                            "
                            :disabled="isSameAsAbove ? true : false"
                            class="form-control"
                            style="outline: none; box-shadow: 0px 0px 0px transparent;"
                        >
                            <option
                                v-for="(province, index) in provinces"
                                :key="index"
                                :value="province.code"
                                :selected="
                                    province.code ==
                                    employee.residentialProvince
                                        ? true
                                        : false
                                "
                                >{{ province.name }}</option
                            >
                        </select>
                        <span>Province</span>
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.permanentProvince }}
                        </p>
                    </div>

                    <div class="col-lg-3">
                        <label for="city" class="form-group has-float-label">
                        <select
                            v-model="employee.permanentCity"
                            @change="permanentMunicipalChange"
                            :class="
                                !errors.hasOwnProperty('permanentCity')
                                    ? ''
                                    : 'is-invalid'
                            "
                            :disabled="
                                (isSameAsAbove ? true : false) ||
                                    (employee.permanentProvince == ''
                                        ? true
                                        : false)
                            "
                            class="form-control"
                            style="outline: none; box-shadow: 0px 0px 0px transparent;"
                        >
                            <option
                                v-for="(city, index) in permanentCities"
                                :key="index"
                                :value="city.code"
                                :selected="
                                    city.code == employee.residentialCity
                                        ? true
                                        : false
                                "
                                >{{ city.name }}</option
                            >
                        </select>
                        <span>City/Municipality</span>
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.permanentCity }}
                        </p>
                    </div>

                    <div class="col-lg-3">
                        <label for="barangay" class="form-group has-float-label">
                        <select
                            v-model="employee.permanentBarangay"
                            :disabled="
                                (isSameAsAbove ? true : false) ||
                                    (employee.permanentProvince == ''
                                        ? true
                                        : false)
                            "
                            :class="
                                !errors.hasOwnProperty('permanentBarangay')
                                    ? ''
                                    : 'is-invalid'
                            "
                            class="form-control"
                            style="outline: none; box-shadow: 0px 0px 0px transparent;"
                        >
                            <option
                                v-for="(barangay, index) in permanentBarangays"
                                :key="index"
                                :value="barangay.code"
                                :selected="
                                    barangay.code ==
                                    employee.residentialBarangay
                                        ? true
                                        : false
                                "
                                >{{ barangay.name }}</option
                            >
                        </select>
                        <span>Barangay</span>
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.permanentBarangay }}
                        </p>
                    </div>

                    <div class="col-lg-3">
                        <label for="zipcode" class="form-group has-float-label">
                        <input
                            type="number"
                            v-model="employee.permanent_zip_code"
                            @input="
                                if (
                                    employee.permanent_zip_code.length >
                                    zipCodeMaxLength
                                )
                                    employee.permanent_zip_code = employee.permanent_zip_code.slice(
                                        0,
                                        zipCodeMaxLength
                                    );
                            "
                            :class="
                                !errors.hasOwnProperty('permanentZipCode')
                                    ? ''
                                    : 'is-invalid'
                            "
                            :disabled="isSameAsAbove ? true : false"
                            class="form-control"
                            placeholder="Enter Zip Code"
                            style="outline: none; box-shadow: 0px 0px 0px transparent;"
                        />
                        <span>Zip Code</span>
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.permanentZipCode }}
                        </p>
                    </div>
                </div>
                <div class="p-3 float-right">
                    <button
                        class="btn btn-primary font-weight-bold"
                        :class="
                            Object.keys(errors).length != 0
                                ? 'btn-danger'
                                : 'btn-primary'
                        "
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
    props: ["employee"],
    data() {
        return {
            isLoading: false,
            isComplete: false,
            isSameAsAbove: false,
            zipCodeMaxLength: 4,
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
            permanentCities: [],
            permanentBarangays: [],
            errors: {}
        };
    },
    methods: {
        provinceChange(province) {
            // Since the province value change we need to fetch cities by selected province code.
            window
                .axios(`/api/province/cities/by/${province.code}`)
                .then(response => (this.cities = response.data));
        },
        municipalChange() {
            window
                .axios(`/api/city/barangay/by/${this.employee.residentialCity}`)
                .then(response => (this.barangays = response.data));
        },
        permanentProvinceChange() {
            window
                .axios(
                    `/api/province/cities/by/${this.employee.permanentProvince}`
                )
                .then(response => (this.permanentCities = response.data));
        },
        permanentMunicipalChange() {
            window
                .axios(`/api/city/barangay/by/${this.employee.permanentCity}`)
                .then(response => (this.permanentBarangays = response.data));
        },
        sameAsAboveAddress() {},
        submitPersonalInformation(e) {
            e.preventDefault();
            this.isLoading = true;

            window.axios
                .post("/employee/personal/information/store", this.employee)
                .then(response => {})
                .catch(error => {});
        }
    },
    mounted() {},
    created() {
        window.axios.get("/api/province/all").then(response => {
            this.provinces = response.data;
        });
    }
};
</script>
