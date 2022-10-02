<template>
    <div>
        <div class="card">
            <div
                class="card-header"
                data-target="#information"
                data-toggle="collapse"
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
                        class="alert alert-warning text-center"
                        style="text-transform: uppercase"
                    >
                        WARNING: Any misrepresentation made in the Personal Data
                        Sheet and the Work Experience Sheet shall cause the
                        filing of administrative/criminal case/s against the
                        person concerned.
                    </div>
                    <p>Indicate <strong>N/A </strong>if not applicable</p>
                </div>
                <div class="row pr-3 pl-3">
                    <div class="col-lg-3">
                        <label
                            class="form-group has-float-label mb-0"
                            for="surname"
                        >
                            <input
                                :disabled="isComplete"
                                type="text"
                                class="form-control text-uppercase"
                                :class="
                                    !errors.hasOwnProperty('LastName')
                                        ? ''
                                        : 'is-invalid'
                                "
                                id="LastName"
                                v-model="personal_data.LastName"
                            />
                            <span
                                ><strong
                                    >SURNAME
                                    <span class="text-danger">*</span></strong
                                ></span
                            >
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.LastName }}
                        </p>
                    </div>
                    <div class="col-lg-3">
                        <label
                            class="form-group has-float-label mb-0"
                            for="FirstName"
                        >
                            <input
                                :disabled="isComplete"
                                type="text"
                                class="form-control text-uppercase"
                                id="FirstName"
                                :class="errors.FirstName ? 'is-invalid' : ''"
                                v-model="personal_data.FirstName"
                            />
                            <span
                                ><strong
                                    >FIRST NAME<span class="text-danger"
                                        >*</span
                                    ></strong
                                ></span
                            >
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.FirstName }}
                        </p>
                    </div>
                    <div class="col-lg-3">
                        <label
                            class="form-group has-float-label mb-0"
                            for="MiddleName"
                        >
                            <input
                                :disabled="isComplete"
                                type="text"
                                class="form-control text-uppercase"
                                :class="
                                    !errors.hasOwnProperty('MiddleName')
                                        ? ''
                                        : 'is-invalid'
                                "
                                id="MiddleName"
                                v-model="personal_data.MiddleName"
                            />
                            <span><strong>MIDDLE NAME</strong></span>
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.MiddleName }}
                        </p>
                    </div>
                    <div class="col-lg-3">
                        <label
                            for="Suffix"
                            class="form-group has-float-label mb-0"
                        >
                            <input
                                type="text"
                                :class="
                                    !errors.hasOwnProperty('Suffix')
                                        ? ''
                                        : 'is-invalid'
                                "
                                :disabled="isComplete"
                                maxlength="5"
                                class="form-control text-uppercase"
                                v-model="personal_data.Suffix"
                            />
                            <span><strong>SUFFIX</strong></span>
                        </label>

                        <p class="text-danger text-sm">
                            {{ errors.Suffix }}
                        </p>
                    </div>
                </div>
                <div class="row pl-3 pr-3">
                    <div class="col-lg-3">
                        <label
                            for="dateofbirth"
                            class="form-group has-float-label"
                        >
                            <input
                                :disabled="isComplete"
                                class="form-control"
                                :class="
                                    !errors.hasOwnProperty('Birthdate')
                                        ? ''
                                        : 'is-invalid'
                                "
                                type="date"
                                v-model="personal_data.Birthdate"
                            />
                            <p class="text-danger text-sm">
                                {{ errors.Birthdate }}
                            </p>
                            <span
                                ><strong
                                    >DATE OF BIRTH<span class="text-danger"
                                        >*</span
                                    ></strong
                                >
                                (date/month/year)</span
                            >
                        </label>
                    </div>
                    <div class="col-lg-3">
                        <label
                            for="BirthPlace"
                            class="form-group has-float-label mb-0"
                        >
                            <input
                                :disabled="isComplete"
                                type="text"
                                class="form-control text-uppercase"
                                id="BirthPlace"
                                :class="
                                    !errors.hasOwnProperty('BirthPlace')
                                        ? ''
                                        : 'is-invalid'
                                "
                                v-model="personal_data.BirthPlace"
                            />
                            <span
                                ><strong
                                    >PLACE OF BIRTH<span class="text-danger"
                                        >*</span
                                    ></strong
                                ></span
                            >
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.BirthPlace }}
                        </p>
                    </div>

                    <div class="col-lg-3">
                        <label
                            for="Gender"
                            class="form-group has-float-label mb-0"
                        >
                            <select
                                :disabled="isComplete"
                                class="form-control custom-select text-uppercase"
                                :class="
                                    !errors.hasOwnProperty('Gender')
                                        ? ''
                                        : 'is-invalid'
                                "
                                id="Gender"
                                v-model="personal_data.Gender"
                                style="
                                    outline: none;
                                    box-shadow: 0px 0px 0px transparent;
                                "
                            >
                                <option value="MALE">MALE</option>
                                <option value="FEMALE">FEMALE</option>
                            </select>
                            <span
                                ><strong
                                    >SEX<span class="text-danger"
                                        >*</span
                                    ></strong
                                ></span
                            >
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.Gender }}
                        </p>
                    </div>

                    <div
                        class="col-lg-3"
                        :class="statOthers ? 'col-lg-1' : 'col-lg-2'"
                    >
                        <label
                            for="status"
                            class="form-group has-float-label mb-0"
                        >
                            <select
                                :disabled="isComplete"
                                class="form-control"
                                :class="
                                    !errors.hasOwnProperty('CivilStatus')
                                        ? ''
                                        : 'is-invalid'
                                "
                                id="CivilStatus"
                                v-model="personal_data.CivilStatus"
                                @change="changeStatOthers()"
                            >
                                <option value="SINGLE">SINGLE</option>
                                <option value="MARRIED">MARRIED</option>
                                <option value="WIDOWED">WIDOWED</option>
                                <option value="SEPARATED">SEPARATED</option>
                                <option value="OTHERS">OTHERS</option>
                            </select>
                            <span
                                ><strong
                                    >CIVIL STATUS<span class="text-danger"
                                        >*</span
                                    ></strong
                                ></span
                            >
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.CivilStatus }}
                        </p>
                    </div>
                    <div class="col-lg-1" v-if="statOthers">
                        <label
                            for="statOthers"
                            class="form-group has-float-label"
                        >
                            <input
                                type="text"
                                name="statOthers"
                                class="form-control box-shadow-0"
                                :class="
                                    !errors.hasOwnProperty('other_status')
                                        ? ''
                                        : 'is-invalid'
                                "
                                v-model="personal_data.other_status"
                                :disabled="isComplete"
                                id="statOthers"
                            />
                            <span
                                ><strong>PLEASE SPECIFY</strong
                                ><span class="text-danger"
                                    ><strong>*</strong></span
                                ></span
                            >
                        </label>
                    </div>
                </div>
                <div class="row pl-3 pr-3">
                    <div class="col-lg-4">
                        <label
                            for="height"
                            class="form group has-float-label mb-0"
                        >
                            <input
                                type="number"
                                id="height"
                                :class="
                                    !errors.hasOwnProperty('height')
                                        ? ''
                                        : 'is-invalid'
                                "
                                class="form-control"
                                v-model="personal_data.height"
                                :disabled="isComplete"
                            />
                            <span><strong>HEIGHT (m)</strong></span>
                        </label>
                        <p class="text-danger text-sm">{{ errors.height }}</p>
                    </div>
                    <div class="col-lg-4">
                        <label
                            for="weight"
                            class="form-group has-float-label mb-0"
                        >
                            <input
                                type="number"
                                :class="
                                    !errors.hasOwnProperty('weight')
                                        ? ''
                                        : 'is-invalid'
                                "
                                id="weight"
                                class="form-control"
                                v-model="personal_data.weight"
                                :disabled="isComplete"
                            />
                            <span><strong>WEIGHT (kg)</strong></span>
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.weight }}
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <label
                            for="bloodtype"
                            class="form-group has-float-label mb-0"
                        >
                            <select
                                :disabled="isComplete"
                                class="form-control"
                                v-model="personal_data.bloodType"
                                :class="
                                    errors.hasOwnProperty('bloodType')
                                        ? 'is-invalid'
                                        : ''
                                "
                            >
                                <option value="" disabled selected></option>
                                <option value="A+">A+</option>
                                <option value="O+">O+</option>
                                <option value="B+">B+</option>
                                <option value="AB+">AB+</option>
                                <option value="A-">A-</option>
                                <option value="O-">O-</option>
                                <option value="B-">B-</option>
                                <option value="AB-">AB-</option>
                                <option value="O">O</option>
                                <option value="B">B</option>
                                <option value="A">A</option>
                                <option value="AB">AB</option>
                            </select>
                            <span><strong>BLOOD TYPE</strong></span>
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.bloodType }}
                        </p>
                    </div>
                </div>
                <div class="row pl-3 pr-3">
                    <div class="col-lg-4">
                        <label
                            for="gsisidno"
                            class="form-group has-float-label"
                        >
                            <input
                                :disabled="isComplete"
                                type="text"
                                id="gsis_no"
                                class="form-control"
                                :class="
                                    errors.hasOwnProperty('gsis_no')
                                        ? 'is-invalid'
                                        : ''
                                "
                                v-model="personal_data.gsis_no"
                            />
                            <p class="text-danger text-sm">
                                {{ errors.gsis_no }}
                            </p>
                            <span><strong>GSIS ID NUMBER</strong></span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label
                            for="pagibig_no"
                            class="form-group has-float-label"
                        >
                            <input
                                :disabled="isComplete"
                                type="text"
                                id="pagibig_no"
                                class="form-control"
                                v-model="personal_data.pagibig_no"
                                :class="
                                    errors.hasOwnProperty('pagibig_no')
                                        ? 'is-invalid'
                                        : ''
                                "
                            />
                            <p class="text-danger text-sm">
                                {{ errors.pagibig_no }}
                            </p>
                            <span><strong>PAG-IBIG NUMBER</strong></span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label
                            for="philhealth_no"
                            class="form-group has-float-label"
                        >
                            <input
                                :disabled="isComplete"
                                type="text"
                                id="philhealth_no"
                                class="form-control"
                                v-model="personal_data.philhealth_no"
                                :class="
                                    errors.hasOwnProperty('philhealth_no')
                                        ? 'is-invalid'
                                        : ''
                                "
                            />
                            <p class="text-danger text-sm">
                                {{ errors.philhealth_no }}
                            </p>
                            <span><strong>PHILHEALTH NUMBER</strong></span>
                        </label>
                    </div>
                </div>
                <div class="row pl-3 pr-3">
                    <div class="col-lg-4">
                        <label for="sss_no" class="form-group has-float-label">
                            <input
                                :disabled="isComplete"
                                type="text"
                                id="sss_no"
                                class="form-control"
                                v-model="personal_data.sss_no"
                                :class="
                                    errors.hasOwnProperty('sss_no')
                                        ? 'is-invalid'
                                        : ''
                                "
                            />
                            <p class="text-danger text-sm">
                                {{ errors.sss_no }}
                            </p>
                            <span><strong>SSS ID NUMBER</strong></span>
                        </label>
                    </div>

                    <div class="col-lg-4">
                        <label for="tin_no" class="form-group has-float-label">
                            <input
                                :disabled="isComplete"
                                type="text"
                                id="tin_no"
                                class="form-control"
                                v-model="personal_data.tin_no"
                                :class="
                                    errors.hasOwnProperty('tin_no')
                                        ? 'is-invalid'
                                        : ''
                                "
                            />
                            <p class="text-danger text-sm">
                                {{ errors.tin_no }}
                            </p>
                            <span><strong>TIN ID NUMBER</strong></span>
                        </label>
                    </div>

                    <div class="col-lg-4">
                        <label
                            for="agencyempidno"
                            class="form-group has-float-label"
                        >
                            <input
                                :disabled="isComplete"
                                type="text"
                                id="agencyempidno"
                                class="form-control"
                                v-model="personal_data.agencyEmpIdNo"
                                :class="
                                    errors.hasOwnProperty('agencyEmpIdNo')
                                        ? 'is-invalid'
                                        : ''
                                "
                            />
                            <p class="text-danger text-sm">
                                {{ errors.agencyEmpIdNo }}
                            </p>
                            <span><strong>AGENCY EMPLOYEE NUMBER</strong></span>
                        </label>
                    </div>
                </div>
                <div class="row pl-3 pr-3">
                    <div class="col-lg-4">
                        <label
                            for="citizenship"
                            class="form-group has-float-label mb-0"
                        >
                            <select
                                :disabled="isComplete"
                                class="form-control custom-select"
                                :class="
                                    !errors.hasOwnProperty('citizenship')
                                        ? ''
                                        : 'is-invalid'
                                "
                                id="citizenship"
                                v-model="personal_data.citizenship"
                                style="
                                    outline: none;
                                    box-shadow: 0px 0px 0px transparent;
                                "
                            >
                                <option value="FILIPINO">FILIPINO</option>
                                <option value="DUAL CITIZEN">
                                    DUAL CITIZEN
                                </option>
                            </select>
                            <span
                                ><strong
                                    >CITIZENSHIP<span class="text-danger"
                                        >*</span
                                    ></strong
                                ></span
                            >
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.citizenship }}
                        </p>
                    </div>
                    <div
                        class="col-lg-4"
                        v-if="personal_data.citizenship == 'DUAL CITIZEN'"
                    >
                        <label
                            for="citizenshipby"
                            class="form-group has-float-label mb-0"
                        >
                            <select
                                :disabled="isComplete"
                                class="form-control custom-select"
                                id="citizenshipby"
                                :class="
                                    !errors.hasOwnProperty('citizenshipBy')
                                        ? ''
                                        : 'is-invalid'
                                "
                                v-model="personal_data.citizenshipBy"
                            >
                                <option value="BIRTH">BIRTH</option>
                                <option value="NATURALIZATION">
                                    NATURALIZATION
                                </option>
                            </select>
                            <span
                                ><strong
                                    >BY<span class="text-danger"
                                        >*</span
                                    ></strong
                                ></span
                            >
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.citizenshipBy }}
                        </p>
                    </div>

                    <div
                        class="col-lg-4"
                        v-if="personal_data.citizenship == 'DUAL CITIZEN'"
                    >
                        <label
                            for="countries"
                            class="form-group has-float-label mb-0"
                        >
                            <v2-select
                                :disabled="isComplete"
                                label="name"
                                v-model="personal_data.country"
                                :options="countries"
                                id="resProvince"
                            ></v2-select>
                            <span
                                ><strong
                                    >INDICATE COUNTRY<span class="text-danger"
                                        >*</span
                                    ></strong
                                ></span
                            >
                        </label>
                        <p class="text-danger text-sm">{{ errors.country }}</p>
                    </div>

                    <div class="col-lg-4">
                        <label for="telno" class="form-group has-float-label">
                            <input
                                type="text"
                                id="telno"
                                class="form-control"
                                v-model="personal_data.telephoneNumber"
                                :disabled="isComplete"
                                :class="
                                    errors.hasOwnProperty('telephoneNumber')
                                        ? 'is-invalid'
                                        : ''
                                "
                            />
                            <p class="text-danger text-sm">
                                {{ errors.telephoneNumber }}
                            </p>
                            <span><strong>TELEPHONE NUMBER</strong></span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label
                            for="contactNumber"
                            class="form-group has-float-label mb-0"
                        >
                            <input
                                type="text"
                                :class="
                                    !errors.hasOwnProperty('ContactNumber')
                                        ? ''
                                        : 'is-invalid'
                                "
                                id="contactNumber"
                                class="form-control"
                                v-model="personal_data.ContactNumber"
                                :disabled="isComplete"
                            />
                            <span><strong>MOBILE NUMBER</strong></span>
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.ContactNumber }}
                        </p>
                    </div>
                    <div class="col-lg-4 form-group input-group">
                        <label for="Email" class="has-float-label">
                            <input
                                type="email"
                                id="Email"
                                class="form-control"
                                v-model="personal_data.Email"
                                :disabled="isComplete"
                            />
                            <span><strong>EMAIL ADDRESS</strong></span>
                        </label>
                    </div>
                </div>

                <div class="pl-3 pr-3">
                    <div
                        class="alert alert-secondary text-center font-weight-bold"
                        role="alert"
                    >
                        CURRENT ADDRESS
                    </div>
                </div>
                <div class="row pl-3 pr-3">
                    <div class="col-lg-4">
                        <label for="lotno" class="form-group has-float-label">
                            <input
                                type="text"
                                v-model="personal_data.residentialLotNo"
                                id="lotno"
                                class="form-control"
                                :class="
                                    !errors.hasOwnProperty('residentialLotNo')
                                        ? ''
                                        : 'is-invalid'
                                "
                                :disabled="isComplete"
                            />
                            <p class="text-danger text-sm">
                                {{ errors.residentialLotNo }}
                            </p>
                            <span><strong>HOUSE/BLOCK/LOT NO.</strong></span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label for="street" class="form-group has-float-label">
                            <input
                                type="text"
                                v-model="personal_data.residentialStreet"
                                id="street"
                                class="form-control"
                                :class="
                                    !errors.hasOwnProperty('residentialStreet')
                                        ? ''
                                        : 'is-invalid'
                                "
                                :disabled="isComplete"
                            />
                            <span><strong>STREET</strong></span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label
                            for="subdivision"
                            class="form-group has-float-label"
                        >
                            <input
                                type="text"
                                v-model="personal_data.residentialSubdivision"
                                id="subdivision"
                                class="form-control"
                                :class="
                                    !errors.hasOwnProperty(
                                        'residentialSubdivision'
                                    )
                                        ? ''
                                        : 'is-invalid'
                                "
                                :disabled="isComplete"
                            />
                            <p class="text-danger text-sm">
                                {{ errors.residentialSubdivision }}
                            </p>
                            <span><strong>SUBDIVISION/VILLAGE</strong></span>
                        </label>
                    </div>
                </div>
                <div class="row pl-3 pr-3">
                    <div class="col-lg-3">
                        <label class="form-group has-float-label">
                            <v2-select
                                label="name"
                                v-model="personal_data.residentialProvince"
                                :options="provinces"
                                @input="provinceChange"
                                :style="
                                    !errors.hasOwnProperty(
                                        'residentialProvince.province_code'
                                    )
                                        ? ''
                                        : 'border : 1px solid #dc3545; border-radius : 5px;'
                                "
                                id="resProvince"
                                :disabled="isComplete"
                            >
                            </v2-select>
                            <p class="text-danger text-sm">
                                {{
                                    errors["residentialProvince.province_code"]
                                }}
                            </p>
                            <span
                                ><strong
                                    >PROVINCE<span class="text-danger"
                                        >*</span
                                    ></strong
                                ></span
                            >
                        </label>
                    </div>
                    <div class="col-lg-3">
                        <label class="form-group has-float-label">
                            <v2-select
                                label="name"
                                v-model="personal_data.residentialCity"
                                :options="cities"
                                @input="municipalChange"
                                :clearable="false"
                                :style="
                                    !errors.hasOwnProperty(
                                        'residentialCity.city_code'
                                    )
                                        ? ''
                                        : 'border : 1px solid #dc3545; border-radius : 5px;'
                                "
                                :disabled="isComplete"
                            ></v2-select>
                            <p class="text-danger text-sm">
                                {{ errors["residentialCity.city_code"] }}
                            </p>
                            <span
                                ><strong
                                    >MUNICIPALITY/CITY<span class="text-danger"
                                        >*</span
                                    ></strong
                                ></span
                            >
                        </label>
                    </div>
                    <div class="col-lg-3">
                        <label class="form-group has-float-label">
                            <v2-select
                                label="name"
                                v-model="personal_data.residentialBarangay"
                                :options="barangays"
                                :clearable="false"
                                :style="
                                    !errors.hasOwnProperty(
                                        'residentialBarangay.barangay_code'
                                    )
                                        ? ''
                                        : 'border : 1px solid #dc3545; border-radius : 5px;'
                                "
                                :disabled="isComplete"
                            >
                            </v2-select>
                            <p class="text-danger text-sm">
                                {{
                                    errors["residentialBarangay.barangay_code"]
                                }}
                            </p>
                            <span
                                ><strong
                                    >BARANGAY<span class="text-danger"
                                        >*</span
                                    ></strong
                                ></span
                            >
                        </label>
                    </div>
                    <div class="col-lg-3">
                        <label
                            for="zipcode"
                            class="form-group has-float-label mb-0"
                        >
                            <input
                                id="zipcode"
                                type="text"
                                v-model="personal_data.residentialZipCode"
                                class="form-control"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                @input="
                                    if (
                                        personal_data.residentialZipCode
                                            .length > zipCodeMaxLength
                                    )
                                        personal_data.residentialZipCode =
                                            personal_data.residentialZipCode.slice(
                                                0,
                                                zipCodeMaxLength
                                            );
                                "
                                :class="
                                    !errors.hasOwnProperty('residentialZipCode')
                                        ? ''
                                        : 'is-invalid'
                                "
                                :disabled="isComplete"
                            />
                            <span
                                ><strong
                                    >ZIP CODE<span class="text-danger"
                                        >*</span
                                    ></strong
                                ></span
                            >
                        </label>
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
                        <label
                            class="checkbox-inline text-lg"
                            style="transform: scale(0.8)"
                        >
                            <input
                                :disabled="isComplete"
                                :checked="isSameAsAbove"
                                type="checkbox"
                                @click="sameAsAboveAddress"
                            />
                            <strong>SAME AS ABOVE</strong>
                        </label>
                    </div>
                </div>
                <div class="row pl-3 pr-3">
                    <div class="col-lg-4">
                        <label
                            for="permanentLotno"
                            class="form-group has-float-label"
                        >
                            <input
                                type="text"
                                id="permanentLotno"
                                v-model="personal_data.permanentLotNo"
                                :readonly="isSameAsAbove ? true : false"
                                class="form-control"
                                :class="
                                    !errors.hasOwnProperty('permanentLotNo')
                                        ? ''
                                        : 'is-invalid'
                                "
                                :disabled="isComplete"
                            />
                            <p class="text-danger text-sm">
                                {{ errors.permanentLotNo }}
                            </p>
                            <span><strong>HOUSE/BLOCK/LOT NO</strong></span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label
                            for="permanentStreet"
                            class="form-group has-float-label"
                        >
                            <input
                                type="text"
                                id="permanentStreet"
                                v-model="personal_data.permanentStreet"
                                :readonly="isSameAsAbove ? true : false"
                                class="form-control"
                                :class="
                                    !errors.hasOwnProperty('permanentStreet')
                                        ? ''
                                        : 'is-invalid'
                                "
                                :disabled="isComplete"
                            />
                            <p class="text-danger text-sm">
                                {{ errors.permanentStreet }}
                            </p>
                            <span><strong>STREET</strong></span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label
                            for="permanentSubDivision"
                            class="form-group has-float-label"
                        >
                            <input
                                id="permanentSubDivision"
                                type="text"
                                v-model="personal_data.permanentSubdivision"
                                :readonly="isSameAsAbove ? true : false"
                                class="form-control"
                                :class="
                                    !errors.hasOwnProperty(
                                        'permanentSubdivision'
                                    )
                                        ? ''
                                        : 'is-invalid'
                                "
                                :disabled="isComplete"
                            />
                            <p class="text-danger text-sm">
                                {{ errors.permanentSubdivision }}
                            </p>
                            <span><strong>SUBDIVISION/VILLAGE</strong></span>
                        </label>
                    </div>
                </div>

                <div class="row pl-3 pr-3">
                    <div class="col-lg-3">
                        <label class="form-group has-float-label">
                            <v2-select
                                label="name"
                                v-model="personal_data.permanentProvince"
                                :options="provinces"
                                @input="permanentProvinceChange"
                                :style="
                                    !errors.hasOwnProperty(
                                        'permanentProvince.province_code'
                                    )
                                        ? ''
                                        : 'border : 1px solid #dc3545; border-radius : 5px;'
                                "
                                :disabled="isComplete"
                            ></v2-select>
                            <p class="text-danger text-sm">
                                {{ errors["permanentProvince.province_code"] }}
                            </p>
                            <span
                                ><strong
                                    >PROVINCE<span class="text-danger"
                                        >*</span
                                    ></strong
                                ></span
                            >
                        </label>
                    </div>

                    <div class="col-lg-3">
                        <label class="form-group has-float-label">
                            <v2-select
                                label="name"
                                v-model="personal_data.permanentCity"
                                :options="permanentCities"
                                @input="permanentMunicipalChange"
                                :clearable="false"
                                :style="
                                    !errors.hasOwnProperty(
                                        'permanentCity.city_code'
                                    )
                                        ? ''
                                        : 'border : 1px solid #dc3545; border-radius : 5px;'
                                "
                                :disabled="isComplete"
                            ></v2-select>
                            <p class="text-danger text-sm">
                                {{ errors["permanentCity.city_code"] }}
                            </p>
                            <span
                                ><strong
                                    >MUNICIPALITY/CITY<span class="text-danger"
                                        >*</span
                                    ></strong
                                ></span
                            >
                        </label>
                    </div>

                    <div class="col-lg-3">
                        <label class="form-group has-float-label">
                            <v2-select
                                label="name"
                                v-model="personal_data.permanentBarangay"
                                :options="permanentBarangays"
                                :clearable="false"
                                :style="
                                    !errors.hasOwnProperty(
                                        'permanentBarangay.barangay_code'
                                    )
                                        ? ''
                                        : 'border : 1px solid #dc3545; border-radius : 5px;'
                                "
                                :disabled="isComplete"
                            ></v2-select>
                            <p class="text-danger text-sm">
                                {{ errors["permanentBarangay.barangay_code"] }}
                            </p>
                            <span
                                ><strong
                                    >BARANGAY<span class="text-danger"
                                        >*</span
                                    ></strong
                                ></span
                            >
                        </label>
                    </div>

                    <div class="col-lg-3">
                        <label
                            for="permanentZipCode"
                            class="form-group has-float-label mb-0"
                        >
                            <input
                                id="permanentZipCode"
                                type="text"
                                v-model="personal_data.permanentZipCode"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                @input="
                                    if (
                                        personal_data.permanentZipCode.length >
                                        zipCodeMaxLength
                                    )
                                        personal_data.permanentZipCode =
                                            personal_data.permanentZipCode.slice(
                                                0,
                                                zipCodeMaxLength
                                            );
                                "
                                :class="
                                    !errors.hasOwnProperty('permanentZipCode')
                                        ? ''
                                        : 'is-invalid'
                                "
                                :disabled="
                                    isSameAsAbove ? true : false || isComplete
                                "
                                class="form-control"
                            />
                            <span
                                ><strong
                                    >ZIP CODE<span class="text-danger"
                                        >*</span
                                    ></strong
                                ></span
                            >
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.permanentZipCode }}
                        </p>
                    </div>
                </div>
                <div class="p-3 float-right">
                    <button
                        class="btn btn-success shadow font-weight-medium"
                        :class="
                            Object.keys(errors).length != 0
                                ? 'btn-danger'
                                : 'btn-primary'
                        "
                        @click="submitPersonalInformation"
                        v-if="!isComplete"
                        :disabled="isLoading"
                    >
                        <i class="la la-pencil"></i>
                        UPDATE
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
import "vue-select/dist/vue-select.css";
export default {
    props: ["employeeID"],
    data() {
        return {
            isShow: false,
            statOthers: false,
            isShowNameExtension: false,
            isLoading: false,
            isComplete: false,
            isSameAsAbove: false,
            zipCodeMaxLength: 4,
            countries: [],
            provinces: [],
            cities: [],
            barangays: [],
            permanentCities: [],
            permanentBarangays: [],
            errors: {},
            tempPermanentAddress: {
                province: "",
                city: "",
                barangay: "",
                house_no: "",
                street: "",
                village: "",
                zip_code: "",
            },
            personal_data: {},
        };
    },
    methods: {
        changeStatOthers() {
            if (this.personal_data.status == "OTHERS") {
                this.statOthers = true;
            } else {
                this.statOthers = false;
            }
        },
        provinceChange(province) {
            this.cities = [];
            this.barangays = [];
            delete this.personal_data.residentialBarangay;
            delete this.personal_data.residentialCity;
            if (!_.isEmpty(province)) {
                window
                    .axios(`/api/province/cities/by/${province.province_code}`)
                    .then((response) => (this.cities = response.data));
            }
        },
        municipalChange(city) {
            if (!_.isEmpty(city)) {
                window
                    .axios(`/api/city/barangay/by/${city.city_code}`)
                    .then((response) => (this.barangays = response.data));
            }
        },
        permanentProvinceChange(province) {
            delete this.personal_data.permanentCity;
            delete this.personal_data.permanentBarangay;
            this.permanentCities = [];
            this.permanentBarangays = [];

            if (!_.isEmpty(province)) {
                window
                    .axios(`/api/province/cities/by/${province.province_code}`)
                    .then((response) => (this.permanentCities = response.data));
            }
        },
        permanentMunicipalChange(city) {
            if (!_.isEmpty(city)) {
                window
                    .axios(`/api/city/barangay/by/${city.city_code}`)
                    .then(
                        (response) => (this.permanentBarangays = response.data)
                    );
            }
        },
        sameAsAboveAddress() {
            this.isSameAsAbove = !this.isSameAsAbove;
            if (this.isSameAsAbove) {
                this.tempPermanentAddress.province =
                    this.personal_data.permanentProvince;
                this.tempPermanentAddress.city =
                    this.personal_data.permanentCity;
                this.tempPermanentAddress.barangay =
                    this.personal_data.permanentBarangay;
                this.tempPermanentAddress.house_no =
                    this.personal_data.permanentLotNo;
                this.tempPermanentAddress.street =
                    this.personal_data.permanentStreet;
                this.tempPermanentAddress.village =
                    this.personal_data.permanentSubdivision;
                this.tempPermanentAddress.zip_code =
                    this.personal_data.permanentZipCode;
                this.permanentCities = this.cities;
                this.permanentBarangays = this.barangays;
                this.personal_data.permanentLotNo =
                    this.personal_data.residentialLotNo;
                this.personal_data.permanentStreet =
                    this.personal_data.residentialStreet;
                this.personal_data.permanentSubdivision =
                    this.personal_data.residentialSubdivision;
                this.personal_data.permanentBarangay =
                    this.personal_data.residentialBarangay;
                this.personal_data.permanentCity =
                    this.personal_data.residentialCity;
                this.personal_data.permanentProvince =
                    this.personal_data.residentialProvince;
                this.personal_data.permanentZipCode =
                    this.personal_data.residentialZipCode;
            } else {
                this.personal_data.permanentLotNo =
                    this.tempPermanentAddress.house_no;
                this.personal_data.permanentStreet =
                    this.tempPermanentAddress.street;
                this.personal_data.permanentSubdivision =
                    this.tempPermanentAddress.village;
                this.personal_data.permanentBarangay =
                    this.tempPermanentAddress.barangay;
                this.personal_data.permanentCity =
                    this.tempPermanentAddress.city;
                this.personal_data.permanentProvince =
                    this.tempPermanentAddress.province;
                this.personal_data.permanentZipCode =
                    this.tempPermanentAddress.zip_code;
            }
        },
        submitPersonalInformation(e) {
            e.preventDefault();
            this.isLoading = true;
            window.axios
                .post(
                    `/api/personal-data-sheet/information/update/${this.employeeID}`,
                    this.personal_data
                )
                .then((response) => {
                    if (response.status == 200) {
                        this.errors = {};
                        this.isLoading = false;
                        swal({
                            title: "",
                            text: "Personal Information has been updated successfully.",
                            icon: "success",
                            buttons: false,
                            timer: 5000,
                        });
                    }
                })
                .catch((error) => {
                    this.isLoading = false;
                    this.errors = {};
                    // Check the error status code.
                    if (error.response.status == 422) {
                        Object.keys(error.response.data.errors).map((field) => {
                            let [fieldMessage] =
                                error.response.data.errors[field];
                            this.errors[field] = fieldMessage;
                        });
                    }
                });
        },
    },
    mounted() {},
    created() {
        const fetchProvince = axios.get("/api/province/all");

        const fetchCountries = axios.get("/api/countries");

        const fetchEmployeeInformation = axios.get(
            `/api/personal-data-sheet/information/fetch/${this.employeeID}`
        );

        Promise.all([
            fetchProvince,
            fetchCountries,
            fetchEmployeeInformation,
        ]).then((response) => {
            let [provinces, countries, employee] = response;
            this.provinces = provinces.data;
            this.countries = countries.data;
            this.personal_data = employee.data;
            this.personal_data.Gender = employee.data.Gender?.toUpperCase();
            this.personal_data.CivilStatus =
                employee.data.CivilStatus.toUpperCase();

            if (employee.data.residential_city) {
                this.personal_data.residentialCity =
                    employee.data.city_residential;
            }

            if (employee.data.residential_barangay) {
                this.personal_data.residentialBarangay =
                    employee.data.barangay_residential;
            }

            if (employee.data.residential_province) {
                this.personal_data.residentialProvince =
                    employee.data.province_residential;
            }

            if (employee.data.permanent_province) {
                this.personal_data.permanentProvince =
                    employee.data.province_permanent;
            }

            if (employee.data.permanent_city) {
                this.personal_data.permanentCity = employee.data.city_permanent;
            }

            if (employee.data.permanent_barangay) {
                this.personal_data.permanentBarangay =
                    employee.data.barangay_permanent;
            }
            this.personal_data.residentialLotNo =
                employee.data.residential_house_no;
            this.personal_data.residentialStreet =
                employee.data.residential_street;
            this.personal_data.residentialSubdivision =
                employee.data.residential_village;

            this.personal_data.permanentLotNo =
                employee.data.permanent_house_no;
            this.personal_data.permanentStreet = employee.data.permanent_street;
            this.personal_data.permanentSubdivision =
                employee.data.permanent_village;

            this.personal_data.residentialZipCode =
                employee.data.residential_zip_code;
            this.personal_data.permanentZipCode =
                employee.data.permanent_zip_code;
        });
    },
};
</script>
<style scoped>
.v-select-border-danger {
    border-color: "#dc345";
    border-width: 1px;
    border-radius: 5px;
}

.v-select-border-default {
    border: 1px solid transparent;
}

.overlay {
    position: absolute;
    background: black;
    left: 0%;
    top: 0%;
    right: 0%;
    bottom: 0%;
    height: auto;
    z-index: 999;
    opacity: 0.5;
    transition: all 300ms ease-in-out;
}
</style>
