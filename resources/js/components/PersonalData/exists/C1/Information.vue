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
            <label for="surname" class="form-group has-float-label m-0">
              <input
                type="text"
                class="form-control"
                :class="!errors.hasOwnProperty('surname') ? '' : 'is-invalid'"
                id="surname"
                placeholder="Enter Surname"
                v-model="employee.lastname"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span><strong>SURNAME</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.surname }}
            </p>
          </div>
          <div class="col-lg-3">
            <label for="firstname" class="form-group has-float-label m-0">
              <input
                type="text"
                class="form-control"
                id="firstname"
                placeholder="Enter First Name"
                :class="errors.firstname ? 'is-invalid' : ''"
                v-model="employee.firstname"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span><strong>FIRST NAME</strong></span>
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
                  !errors.hasOwnProperty('middlename') ? '' : 'is-invalid'
                "
                id="middlename"
                placeholder="Enter Middle Name"
                v-model="employee.middlename"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span><strong>MIDDLE NAME</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.middlename }}
            </p>
          </div>
          <div class="col-lg-3">
            <label for="nameextension" class="form-group has-float-label">
              <select
                type="text"
                class="form-control custom-select"
                :class="!errors.hasOwnProperty('extension') ? '' : 'is-invalid'"
                maxlength="3"
                max="3"
                id="nameextension"
                v-model="employee.extension"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              >
                <option value="" disabled>Select Extension</option>
                <option value="sr">SR</option>
                <option value="sr">SR</option>
                <option value="jr">JR</option>
                <option value="iii">III</option>
              </select>
              <span><strong>EXTENSION NAME</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.extension }}
            </p>
          </div>
        </div>
        <div class="row pl-3 pr-3">
          <div class="col-lg-3">
            <label for="dateofbirth" class="form-group has-float-label m-0">
              <input
                class="form-control"
                :class="
                  !errors.hasOwnProperty('dateOfBirth') ? '' : 'is-invalid'
                "
                type="date"
                v-model="employee.date_birth"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>DATE OF BIRTH</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.dateOfBirth }}
            </p>
          </div>
          <div class="col-lg-3">
            <label
              for="placeofbirth"
              class="form-group has-float-label p-0 m-0"
            >
              <input
                type="text"
                class="form-control"
                id="placeofbirth"
                :class="
                  !errors.hasOwnProperty('placeOfBirth') ? '' : 'is-invalid'
                "
                placeholder="Enter Place of Birth"
                v-model="employee.place_birth"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span><strong>PLACE OF BIRTH</strong></span>
            </label>
            <span class="text-danger text-sm p-0">
              {{ errors.placeOfBirth }}
            </span>
          </div>

          <div class="col-lg-3">
            <label for="sex" class="form-group has-float-label m-0">
              <select
                class="form-control"
                v-model="employee.sex"
                :class="!errors.hasOwnProperty('sex') ? '' : 'is-invalid'"
                id="sex"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              >
                <option value="male">MALE</option>
                <option value="female">FEMALE</option>
              </select>
              <span><strong>SEX</strong></span>
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
                  !errors.hasOwnProperty('civil_status') ? '' : 'is-invalid'
                "
                id="status"
                v-model="employee.civil_status"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              >
                <option value="SINGLE">SINGLE</option>
                <option value="MARRIED">MARRIED</option>
                <option value="WIDOWED">WIDOWED</option>
                <option value="SEPARATED">SEPARATED</option>
                <option value="OTHERS">OTHERS</option>
              </select>
              <span><strong>STATUS</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.civil_status }}
            </p>
          </div>
        </div>
        <div class="row pl-3 pr-3">
          <div class="col-lg-4">
            <label for="height" class="form group has-float-label m-0">
              <input
                type="number"
                id="height"
                :class="!errors.hasOwnProperty('height') ? '' : 'is-invalid'"
                class="form-control"
                placeholder="Enter height in meter"
                v-model="employee.height"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>HEIGHT(m)</strong></span>
            </label>
            <p class="text-danger text-sm">{{ errors.height }}</p>
          </div>
          <div class="col-lg-4">
            <label for="weight" class="form-group has-float-label m-0">
              <input
                type="number"
                :class="!errors.hasOwnProperty('weight') ? '' : 'is-invalid'"
                id="weight"
                class="form-control"
                placeholder="Enter weight in kilogram"
                v-model="employee.weight"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>WEIGHT(kg)</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.weight }}
            </p>
          </div>
          <div class="col-lg-4">
            <label for="bloodtype" class="form-group has-float-label">
              <input
                id="bloodtype"
                type="text"
                class="form-control"
                maxlength="3"
                :class="errors.hasOwnProperty('blood_type') ? 'is-invalid' : ''"
                placeholder="Enter bloodtype"
                v-model="employee.blood_type"
                style="text-transform:uppercase outline: none; box-shadow: 0px 0px 0px transparent;"
              />
              <span><strong>BLOODTYPE</strong></span>
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
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>GSIS ID NUMBER</strong></span>
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
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>PAG-IBIG ID NUMBER</strong></span>
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
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>PHILHEALTH ID NUMBER</strong></span>
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
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>SSS ID NUMBER</strong></span>
            </label>
          </div>

          <div class="col-lg-4">
            <label for="tinidno" class="form-group has-float-label">
              <input
                type="text"
                id="tinidno"
                class="form-control"
                placeholder="Enter TIN ID No."
                style="outline: none; box-shadow: 0px 0px 0px transparent"
                v-model="employee.tin_no"
              />
              <span><strong>TIN ID NUMBER</strong></span>
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
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>AGENCY EMPLOYEE NUMBER</strong></span>
            </label>
          </div>
        </div>
        <div class="row pl-3 pr-3">
          <div class="col-lg-4">
            <label for="citizenship" class="form-group has-float-label">
              <select
                class="form-control custom-select"
                :class="
                  !errors.hasOwnProperty('citizenship') ? '' : 'is-invalid'
                "
                id="citizenship"
                v-model="employee.citizenship"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              >
                <option value="FILIPINO">FILIPINO</option>
                <option value="DUAL CITIZEN">DUAL CITIZEN</option>
              </select>
              <span><strong>CITIZENSHIP</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.citizenship }}
            </p>
          </div>
          <div class="col-lg-4" v-if="employee.citizenship == 'DUAL CITIZEN'">
            <label for="citizenshipby" class="form-group has-float-label">
              <select
                class="form-control"
                id="citizenshipby"
                :class="
                  !errors.hasOwnProperty('citizenshipBy') ? '' : 'is-invalid'
                "
                v-model="employee.citizenshipBy"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              >
                <option value="BIRTH">BIRTH</option>
                <option value="NATURALIZATION">NATURALIZATION</option>
              </select>
              <span>By</span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.citizenshipBy }}
            </p>
          </div>

          <div class="col-lg-4" v-if="employee.citizenship == 'DUAL CITIZEN'">
            <label for="countries" class="form-group has-float-label">
              <select
                class="form-control"
                id="countries"
                v-model="employee.country"
                :class="!errors.hasOwnProperty('country') ? '' : 'is-invalid'"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              >
                <option
                  v-for="(country, index) in countries"
                  :key="index"
                  :value="country"
                >
                  {{ country }}
                </option>
              </select>
              <span><strong>INDICATE COUNTRY</strong></span>
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
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>TELEPHONE NUMBER</strong></span>
            </label>
          </div>
          <div class="col-lg-4">
            <label for="mobileno" class="form-group has-float-label">
              <input
                type="text"
                :class="!errors.hasOwnProperty('mobile_no') ? '' : 'is-invalid'"
                id="mobileno"
                class="form-control"
                placeholder="Enter Mobile Number"
                v-model="employee.mobile_no"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>MOBILE NUMBER</strong></span>
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
                style="outline: none; box-shadow: 0px 0px 0px transparent"
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
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span style="text-transform: uppercase"
                ><strong>House/Block/Lot No.</strong></span
              >
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
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span><strong>STREET</strong></span>
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
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span style="text-transform: uppercase"
                ><strong>Subdivision/Village</strong></span
              >
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
                style="outline: none; box-shadow: 0px 0px 0px transparent"
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
              <span><strong>PROVINCE</strong></span>
            </label>
          </div>
          <div class="col-lg-3">
            <label for="city" class="form-group has-float-label">
              <v-select
                label="name"
                :value="employee.residential_city"
                :options="cities"
                @change="municipalChange"
                :disabled="employee.residential_province ? false : true"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              >
                <!-- <option
                                v-for="(city, index) in cities"
                                :key="index"
                                :value="city.code"
                                >{{ city.name }}</option
                            > -->
              </v-select>
              <span style="text-transform: uppercase"
                ><strong>City/Municipality</strong></span
              >
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
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              >
                <option
                  v-for="(barangay, index) in barangays"
                  :key="index"
                  :value="barangay.code"
                >
                  {{ barangay.name }}
                </option>
              </select>
              <span><strong>BARANGAY</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.residential_barangay }}
            </p>
          </div>
          <div class="col-lg-3">
            <label for="zipcode" class="form-group has-float-label m-0">
              <input
                type="number"
                v-model="employee.residential_zip_code"
                class="form-control"
                @input="
                  if (employee.residential_zip_code.length > zipCodeMaxLength)
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
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>ZIP CODE</strong></span>
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
              <strong>SAME AS ABOVE</strong>
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
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
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
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span><strong>STREET</strong></span>
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
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span style="text-transform: uppercase"
                ><strong>Subdivision/Village</strong></span
              >
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
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              >
                <option
                  v-for="(province, index) in provinces"
                  :key="index"
                  :value="province.code"
                  :selected="
                    province.code == employee.residentialProvince ? true : false
                  "
                >
                  {{ province.name }}
                </option>
              </select>
              <span><strong>PROVINCE</strong></span>
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
                  !errors.hasOwnProperty('permanentCity') ? '' : 'is-invalid'
                "
                :disabled="
                  (isSameAsAbove ? true : false) ||
                  (employee.permanentProvince == '' ? true : false)
                "
                class="form-control"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              >
                <option
                  v-for="(city, index) in permanentCities"
                  :key="index"
                  :value="city.code"
                  :selected="
                    city.code == employee.residentialCity ? true : false
                  "
                >
                  {{ city.name }}
                </option>
              </select>
              <span style="text-transform: uppercase"
                ><strong>City/Municipality</strong></span
              >
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
                  (employee.permanentProvince == '' ? true : false)
                "
                :class="
                  !errors.hasOwnProperty('permanentBarangay')
                    ? ''
                    : 'is-invalid'
                "
                class="form-control"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              >
                <option
                  v-for="(barangay, index) in permanentBarangays"
                  :key="index"
                  :value="barangay.code"
                  :selected="
                    barangay.code == employee.residentialBarangay ? true : false
                  "
                >
                  {{ barangay.name }}
                </option>
              </select>
              <span><strong>BARANGAY</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.permanentBarangay }}
            </p>
          </div>

          <div class="col-lg-3">
            <label for="zipcode" class="form-group has-float-label m-0">
              <input
                type="number"
                v-model="employee.permanent_zip_code"
                @input="
                  if (employee.permanent_zip_code.length > zipCodeMaxLength)
                    employee.permanent_zip_code = employee.permanent_zip_code.slice(
                      0,
                      zipCodeMaxLength
                    );
                "
                :class="
                  !errors.hasOwnProperty('permanentZipCode') ? '' : 'is-invalid'
                "
                :disabled="isSameAsAbove ? true : false"
                class="form-control"
                placeholder="Enter Zip Code"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>ZIP CODE</strong></span>
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
              Object.keys(errors).length != 0 ? 'btn-danger' : 'btn-primary'
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
      countries: [],
      provinces: [],
      cities: [],
      barangays: [],
      permanentCities: [],
      permanentBarangays: [],
      errors: {},
    };
  },
  methods: {
    provinceChange(province) {
      // Since the province value change we need to fetch cities by selected province code.
      window
        .axios(`/api/province/cities/by/${province.code}`)
        .then((response) => (this.cities = response.data));
    },
    municipalChange() {
      window
        .axios(`/api/city/barangay/by/${this.employee.residentialCity}`)
        .then((response) => (this.barangays = response.data));
    },
    permanentProvinceChange() {
      window
        .axios(`/api/province/cities/by/${this.employee.permanentProvince}`)
        .then((response) => (this.permanentCities = response.data));
    },
    permanentMunicipalChange() {
      window
        .axios(`/api/city/barangay/by/${this.employee.permanentCity}`)
        .then((response) => (this.permanentBarangays = response.data));
    },
    sameAsAboveAddress() {},
    submitPersonalInformation(e) {
      e.preventDefault();
      this.isLoading = true;

      window.axios
        .post("/employee/personal/information/store", this.employee)
        .then((response) => {
          if (response.status === 200) {
            this.errors = {};
            this.isLoading = false;
            this.isComplete = true;
            localStorage.setItem("employee_id", response.data.employee_id);

            localStorage.setItem(
              "personal_information",
              JSON.stringify(response.data)
            );

            // this.$emit("next-panel-family-background");
          }
        })
        .catch((error) => {
          this.isLoading = false;
          this.errors = {};
          // Check the error status code.
          if (error.response.status === 422) {
            Object.keys(error.response.data.errors).map((field) => {
              let [fieldMessage] = error.response.data.errors[field];
              this.errors[field] = fieldMessage;
            });
          }
        });
    },
  },
  mounted() {},
  created() {
    window.axios
      .get("/api/province/all")
      .then((response) => (this.provinces = response.data));

    window,
      axios
        .get("/api/countries")
        .then((response) => (this.countries = response.data));
  },
};
</script>
