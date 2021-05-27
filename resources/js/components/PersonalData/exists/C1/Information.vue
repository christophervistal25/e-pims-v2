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
          <p>Indicate <strong>N/A </strong>if not applicable</p>
          <div
            class="alert alert-secondary text-center font-weight-bold"
            role="alert"
          >
            PERSONAL INFORMATION
          </div>
        </div>
        <div class="row pr-3 pl-3">
          <div class="col-lg-3">
            <label class="form-group has-float-label mb-0" for="surname">
              <input
                type="text"
                class="form-control"
                :class="!errors.hasOwnProperty('lastname') ? '' : 'is-invalid'"
                id="surname"
                v-model="personal_data.lastname"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span
                ><strong>SURNAME</strong
                ><span class="text-danger"><strong>*</strong></span>
              </span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.lastname }}
            </p>
          </div>
          <div class="col-lg-3">
            <label class="form-group has-float-label mb-0" for="firstname">
              <input
                type="text"
                class="form-control"
                id="firstname"
                :class="errors.firstname ? 'is-invalid' : ''"
                v-model="personal_data.firstname"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span
                ><strong>FIRST NAME</strong
                ><span class="text-danger"><strong>*</strong></span></span
              >
            </label>
            <p class="text-danger text-sm">
              {{ errors.firstname }}
            </p>
          </div>
          <div class="col-lg-3">
            <label class="form-group has-float-label" for="middlename">
              <input
                type="text"
                class="form-control"
                :class="
                  !errors.hasOwnProperty('middlename') ? '' : 'is-invalid'
                "
                id="middlename"
                v-model="personal_data.middlename"
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
          <div class="col-lg-2">
            <label for="nameextension" class="form-group has-float-label mb-0">
              <v-select
                type="text"
                id="nameextension"
                v-model="personSelectedNameExtension"
                :options="name_extensions"
                :class="
                  !errors.hasOwnProperty('nameExtension') ? '' : 'is-invalid'
                "
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              >
              </v-select>
              <span><strong>EXTENSION NAME</strong></span>
            </label>

            <p class="text-danger text-sm">
              {{ errors.nameExtension }}
            </p>
          </div>
          <div class="col-lg-1">
            <name-extension-modal
              @nameext-modal-dismiss="closeNameExtensionModal"
            ></name-extension-modal>
          </div>
        </div>
        <div class="row pl-3 pr-3">
          <div class="col-lg-3">
            <label for="dateofbirth" class="form-group has-float-label">
              <input
                class="form-control"
                :class="
                  !errors.hasOwnProperty('date_birth') ? '' : 'is-invalid'
                "
                type="date"
                v-model="personal_data.date_birth"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <p class="text-danger text-sm">
                {{ errors.date_birth }}
              </p>
              <span
                ><strong>DATE OF BIRTH</strong
                ><span class="text-danger"><strong>*</strong></span>
                (dd/mm/yyyy)</span
              >
            </label>
          </div>
          <div class="col-lg-3">
            <label for="placeofbirth" class="form-group has-float-label mb-0">
              <input
                type="text"
                class="form-control"
                id="placeofbirth"
                :class="
                  !errors.hasOwnProperty('place_birth') ? '' : 'is-invalid'
                "
                v-model="personal_data.place_birth"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span
                ><strong>PLACE OF BIRTH</strong
                ><span class="text-danger"><strong>*</strong></span></span
              >
            </label>
            <p class="text-danger text-sm">
              {{ errors.place_birth }}
            </p>
          </div>

          <div class="col-lg-3">
            <label for="sex" class="form-group has-float-label mb-0">
              <select
                class="form-control custom-select"
                :class="!errors.hasOwnProperty('sex') ? '' : 'is-invalid'"
                id="sex"
                v-model="personal_data.sex"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              >
                <option value="male">MALE</option>
                <option value="female">FEMALE</option>
              </select>
              <span
                ><strong>SEX</strong
                ><span class="text-danger"><strong>*</strong></span></span
              >
            </label>
            <p class="text-danger text-sm">
              {{ errors.sex }}
            </p>
          </div>

          <div class="col-lg-3">
            <label for="status" class="form-group has-float-label mb-0">
              <select
                class="form-control"
                :class="
                  !errors.hasOwnProperty('civil_status') ? '' : 'is-invalid'
                "
                id="status"
                v-model="personal_data.civil_status"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              >
                <option value="SINGLE">SINGLE</option>
                <option value="MARRIED">MARRIED</option>
                <option value="WIDOWED">WIDOWED</option>
                <option value="SEPARATED">SEPARATED</option>
                <option value="OTHERS">OTHERS</option>
              </select>
              <span
                ><strong>STATUS</strong
                ><span class="text-danger"><strong>*</strong></span></span
              >
            </label>
            <p class="text-danger text-sm">
              {{ errors.status }}
            </p>
          </div>
        </div>
        <div class="row pl-3 pr-3">
          <div class="col-lg-4">
            <label for="height" class="form group has-float-label mb-0">
              <input
                type="number"
                id="height"
                :class="!errors.hasOwnProperty('height') ? '' : 'is-invalid'"
                class="form-control"
                v-model="personal_data.height"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span
                ><strong>HEIGHT (m)</strong
                ><span class="text-danger"><strong>*</strong></span></span
              >
            </label>
            <p class="text-danger text-sm">{{ errors.height }}</p>
          </div>
          <div class="col-lg-4">
            <label for="weight" class="form-group has-float-label mb-0">
              <input
                type="number"
                :class="!errors.hasOwnProperty('weight') ? '' : 'is-invalid'"
                id="weight"
                class="form-control"
                v-model="personal_data.weight"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span
                ><strong>WEIGHT (kg)</strong
                ><span class="text-danger"><strong>*</strong></span></span
              >
            </label>
            <p class="text-danger text-sm">
              {{ errors.weight }}
            </p>
          </div>
          <div class="col-lg-4">
            <label for="bloodtype" class="form-group has-float-label mb-0">
              <input
                type="text"
                class="form-control"
                id="bloodtype"
                maxlength="3"
                :class="errors.hasOwnProperty('blood_type') ? 'is-invalid' : ''"
                v-model="personal_data.blood_type"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span
                ><strong>BLOODTYPE</strong
                ><span class="text-danger"><strong>*</strong></span></span
              >
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
                v-model="personal_data.gsis_id_no"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>GSIS ID NUMBER</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.gsis_id_no }}
            </p>
          </div>
          <div class="col-lg-4">
            <label for="pagibigidno" class="form-group has-float-label">
              <input
                type="text"
                id="pagibigidno"
                class="form-control"
                v-model="personal_data.pag_ibig_no"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>PAG-IBIG ID NUMBER</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.pag_ibig_no }}
            </p>
          </div>
          <div class="col-lg-4">
            <label for="philhealthidno" class="form-group has-float-label">
              <input
                type="text"
                id="philhealthidno"
                class="form-control"
                v-model="personal_data.philhealth_no"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>PHILHEALTH ID NUMBER</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.philhealth_no }}
            </p>
          </div>
        </div>
        <div class="row pl-3 pr-3">
          <div class="col-lg-4">
            <label for="sssidno" class="form-group has-float-label">
              <input
                type="text"
                id="sssidno"
                class="form-control"
                v-model="personal_data.sss_no"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>SSS ID NUMBER</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.sss_no }}
            </p>
          </div>

          <div class="col-lg-4">
            <label for="tinidno" class="form-group has-float-label">
              <input
                type="text"
                id="tinidno"
                class="form-control"
                v-model="personal_data.tin_no"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>TIN ID NUMBER</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.tin_no }}
            </p>
          </div>

          <div class="col-lg-4">
            <label for="agencyempidno" class="form-group has-float-label">
              <input
                type="text"
                id="agencyempidno"
                class="form-control"
                v-model="personal_data.agency_employee_no"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>AGENCY EMPLOYEE NUMBER</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.agency_employee_no }}
            </p>
          </div>
        </div>
        <div class="row pl-3 pr-3">
          <div class="col-lg-4">
            <label for="citizenship" class="form-group has-float-label mb-0">
              <select
                class="form-control custom-select"
                :class="
                  !errors.hasOwnProperty('citizenship') ? '' : 'is-invalid'
                "
                id="citizenship"
                v-model="personal_data.citizenship"
                @input="citizenChange"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              >
                <option value="FILIPINO">FILIPINO</option>
                <option value="DUAL CITIZEN">DUAL CITIZEN</option>
              </select>
              <span
                ><strong>CITIZENSHIP</strong
                ><span class="text-danger"><strong>*</strong></span></span
              >
            </label>
            <p class="text-danger text-sm">
              {{ errors.citizenship }}
            </p>
          </div>
          <div class="col-lg-4" v-if="onCitizenDual">
            <label for="citizenshipby" class="form-group has-float-label mb-0">
              <select
                class="form-control custom-select"
                id="citizenshipby"
                :class="
                  !errors.hasOwnProperty('citizenship_by') ? '' : 'is-invalid'
                "
                v-model="personal_data.citizenship_by"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              >
                <option value="BIRTH">BIRTH</option>
                <option value="NATURALIZATION">NATURALIZATION</option>
              </select>
              <span><strong>By</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.citizenship_by }}
            </p>
          </div>

          <div class="col-lg-4" v-if="onCitizenDual">
            <label for="countries" class="form-group has-float-label mb-0">
              <v-select
                label="name"
                v-model="personCountry"
                :options="countries"
                @input="countryChange"
              >
              </v-select>
              <span><strong>INDICATE COUNTRY</strong></span>
            </label>
            <p class="text-danger text-sm">{{ errors.indicate_country }}</p>
          </div>

          <div class="col-lg-4">
            <label for="telno" class="form-group has-float-label">
              <input
                type="text"
                id="telno"
                class="form-control"
                v-model="personal_data.telephone_no"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>TELEPHONE NUMBER</strong></span>
            </label>
          </div>
          <div class="col-lg-4">
            <label for="mobileno" class="form-group has-float-label mb-0">
              <input
                type="text"
                :class="!errors.hasOwnProperty('mobile_no') ? '' : 'is-invalid'"
                id="mobileno"
                class="form-control"
                v-model="personal_data.mobile_no"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span
                ><strong>MOBILE NUMBER</strong
                ><span class="text-danger"><strong>*</strong></span></span
              >
            </label>
            <p class="text-danger text-sm">
              {{ errors.mobile_no }}
            </p>
          </div>
          <div class="col-lg-4 form-group input-group">
            <label for="email" class="has-float-label">
              <input
                type="email"
                id="email"
                class="form-control"
                :class="
                  !errors.hasOwnProperty('email_address') ? '' : 'is-invalid'
                "
                v-model="personal_data.email_address"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>EMAIL ADDRESS</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.email_address }}
            </p>
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
                v-model="personal_data.residential_house_no"
                id="lotno"
                class="form-control"
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
                v-model="personal_data.residential_street"
                id="street"
                class="form-control"
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
                v-model="personal_data.residential_village"
                id="subdivision"
                class="form-control"
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
            <label class="form-group has-float-label">
              <v-select
                label="name"
                v-model="personResidentialProvince"
                :options="provinces"
                @input="provinceChange"
                id="resProvince"
              ></v-select>
              <p class="text-danger text-sm">
                {{ errors.residential_province }}
              </p>
              <span
                ><strong>PROVINCE</strong
                ><span class="text-danger"><strong>*</strong></span></span
              >
            </label>
          </div>
          <div class="col-lg-3">
            <label class="form-group has-float-label">
              <v-select
                label="name"
                v-model="personResidentialCity"
                :options="cities"
                @input="municipalChange"
              ></v-select>
              <p class="text-danger text-sm">
                {{ errors.residential_city }}
              </p>
              <span
                ><strong>CITY</strong
                ><span class="text-danger"><strong>*</strong></span></span
              >
            </label>
          </div>
          <div class="col-lg-3">
            <label class="form-group has-float-label">
              <v-select
                label="name"
                v-model="personResidentialBarangay"
                :options="barangays"
                @input="barangayChange"
              ></v-select>
              <p class="text-danger text-sm">
                {{ errors.residential_barangay }}
              </p>
              <span
                ><strong>BARANGAY</strong
                ><span class="text-danger"><strong>*</strong></span></span
              >
            </label>
          </div>
          <div class="col-lg-3">
            <label for="zipcode" class="form-group has-float-label mb-0">
              <input
                id="zipcode"
                type="number"
                v-model="personal_data.residential_zip_code"
                class="form-control"
                @input="
                  if (
                    personal_data.residential_zip_code.length > zipCodeMaxLength
                  )
                    personal_data.residential_zip_code = personal_data.residential_zip_code.slice(
                      0,
                      zipCodeMaxLength
                    );
                "
                :class="
                  !errors.hasOwnProperty('residential_zip_code')
                    ? ''
                    : 'is-invalid'
                "
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span
                ><strong>ZIP CODE</strong
                ><span class="text-danger"><strong>*</strong></span></span
              >
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
            <label class="checkbox-inline" style="transform: scale(0.8)">
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
            <label for="permanentLotno" class="form-group has-float-label">
              <input
                type="text"
                id="permanentLotno"
                v-model="personal_data.permanent_house_no"
                :readonly="isSameAsAbove ? true : false"
                class="form-control"
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
            <label for="permanentStreet" class="form-group has-float-label">
              <input
                type="text"
                id="permanentStreet"
                v-model="personal_data.permanent_street"
                :readonly="isSameAsAbove ? true : false"
                class="form-control"
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
            <label
              for="permanentSubDivision"
              class="form-group has-float-label"
            >
              <input
                id="permanentSubDivision"
                type="text"
                v-model="personal_data.permanent_village"
                :readonly="isSameAsAbove ? true : false"
                class="form-control"
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
            <label class="form-group has-float-label">
              <v-select
                label="name"
                v-model="personPermanentProvince"
                :options="provinces"
                @input="permanentProvinceChange"
                :disabled="isSameAsAbove ? true : false"
              ></v-select>
              <p class="text-danger text-sm">
                {{ errors.permanent_province }}
              </p>
              <span
                ><strong>PROVINCE</strong
                ><span class="text-danger"><strong>*</strong></span></span
              >
            </label>
          </div>

          <div class="col-lg-3">
            <label class="form-group has-float-label">
              <v-select
                label="name"
                v-model="personPermanentCity"
                :options="permanentCities"
                @input="permanentMunicipalChange"
                :disabled="isSameAsAbove ? true : false"
              ></v-select>
              <p class="text-danger text-sm">
                {{ errors.permanent_city }}
              </p>
              <span
                ><strong>CITY</strong
                ><span class="text-danger"><strong>*</strong></span></span
              >
            </label>
          </div>

          <div class="col-lg-3">
            <label class="form-group has-float-label">
              <v-select
                label="name"
                v-model="personPermanentBarangay"
                :options="permanentBarangays"
                @input="permanentBarangayChange"
                :disabled="isSameAsAbove ? true : false"
              ></v-select>
              <p class="text-danger text-sm">
                {{ errors.permanent_barangay }}
              </p>
              <span
                ><strong>BARANGAY</strong
                ><span class="text-danger"><strong>*</strong></span></span
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
                type="number"
                v-model="personal_data.permanent_zip_code"
                @input="
                  if (
                    personal_data.permanent_zip_code.length > zipCodeMaxLength
                  )
                    personal_data.permanent_zip_code = personal_data.permanent_zip_code.slice(
                      0,
                      zipCodeMaxLength
                    );
                "
                :class="
                  !errors.hasOwnProperty('permanent_zip_code')
                    ? ''
                    : 'is-invalid'
                "
                :readonly="isSameAsAbove ? true : false"
                class="form-control"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span
                ><strong>ZIP CODE</strong
                ><span class="text-danger"><strong>*</strong></span></span
              >
            </label>
            <p class="text-danger text-sm">
              {{ errors.permanent_zip_code }}
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
import "vue-select/dist/vue-select.css";
import _ from "lodash";
import swal from "sweetalert";
export default {
  props: {
    personal_data: {
      requried: true,
    },
    name_extensions: {
      required: true,
    },
  },
  data() {
    return {
      onCitizenDual: false,
      isShow: false,
      isShowNameExtension: false,
      isLoading: false,
      isComplete: false,
      isSameAsAbove: false,
      zipCodeMaxLength: 4,
      personSelectedNameExtension: "",
      countries: [],
      provinces: [],
      cities: [],
      barangays: [],
      permanentCities: [],
      permanentBarangays: [],
      errors: {},
      personCountry: "",
      personResidentialProvince: "",
      personResidentialCity: "",
      personResidentialBarangay: "",
      personPermanentProvince: "",
      personPermanentCity: "",
      personPermanentBarangay: "",
      tempPermanentAddress: {
        province: "",
        city: "",
        barangay: "",
        house_no: "",
        street: "",
        village: "",
        zip_code: "",
      },
    };
  },
  methods: {
    countryChange() {
      this.personal_data.indicate_country = this.personCountry;
    },
    citizenChange(e) {
      let selectedCitizenShip = e.target.value;

      if (selectedCitizenShip == "DUAL CITIZEN") {
        this.onCitizenDual = true;
      } else {
        this.onCitizenDual = false;
      }
      this.personal_data.citizenship = selectedCitizenShip;
    },
    provinceChange(province) {
      if (!_.isEmpty(province)) {
        this.personal_data.residential_province = province.code;
        window
          .axios(`/api/province/cities/by/${province.code}`)
          .then((response) => (this.cities = response.data));
      }
    },
    municipalChange(municipal) {
      if (!_.isEmpty(municipal)) {
        this.personal_data.residential_city = municipal.code;
        window
          .axios(`/api/city/barangay/by/${municipal.code}`)
          .then((response) => (this.barangays = response.data));
      }
    },
    barangayChange(barangay) {
      if (!_.isEmpty(barangay)) {
        this.personal_data.residential_barangay = barangay.code;
      }
    },
    permanentProvinceChange(province) {
      if (!_.isEmpty(province)) {
        this.personal_data.permanent_province = province.code;
        window
          .axios(`/api/province/cities/by/${province.code}`)
          .then((response) => (this.permanentCities = response.data));
      }
    },
    permanentMunicipalChange(municipal) {
      if (!_.isEmpty(municipal)) {
        this.personal_data.permanent_city = municipal.code;
        window
          .axios(`/api/city/barangay/by/${municipal.code}`)
          .then((response) => (this.permanentBarangays = response.data));
      }
    },
    permanentBarangayChange(barangay) {
      if (!_.isEmpty(barangay)) {
        this.personal_data.permanent_barangay = barangay.code;
      }
    },
    sameAsAboveAddress() {
      this.isSameAsAbove = !this.isSameAsAbove;
      if (this.isSameAsAbove) {
        this.tempPermanentAddress.province = this.personPermanentProvince;
        this.tempPermanentAddress.city = this.personPermanentCity;
        this.tempPermanentAddress.barangay = this.personPermanentBarangay;

        this.tempPermanentAddress.house_no = this.personal_data.permanent_house_no;
        this.tempPermanentAddress.street = this.personal_data.permanent_street;
        this.tempPermanentAddress.village = this.personal_data.permanent_village;
        this.tempPermanentAddress.zip_code = this.personal_data.permanent_zip_code;

        this.personPermanentProvince = this.personResidentialProvince;
        this.personPermanentCity = this.personResidentialCity;
        this.personPermanentBarangay = this.personResidentialBarangay;

        this.personal_data.permanent_house_no = this.personal_data.residential_house_no;
        this.personal_data.permanent_street = this.personal_data.residential_street;
        this.personal_data.permanent_village = this.personal_data.residential_village;
        this.personal_data.permanent_zip_code = this.personal_data.residential_zip_code;

        this.personal_data.permanent_province = this.personal_data.residential_province;
        this.personal_data.permanent_city = this.personal_data.residential_city;
        this.personal_data.permanent_barangay = this.personal_data.residential_barangay;
      } else {
        this.personal_data.permanent_house_no = this.tempPermanentAddress.house_no;
        this.personal_data.permanent_street = this.tempPermanentAddress.street;
        this.personal_data.permanent_village = this.tempPermanentAddress.village;
        this.personal_data.permanent_zip_code = this.tempPermanentAddress.zip_code;

        this.personPermanentProvince = this.tempPermanentAddress.province;
        this.personPermanentCity = this.tempPermanentAddress.city;
        this.personPermanentBarangay = this.tempPermanentAddress.barangay;
      }
    },
    submitPersonalInformation(e) {
      e.preventDefault();
      this.isLoading = true;
      this.personal_data.extension = this.personSelectedNameExtension;
      window.axios
        .post("/employee/exists/personal/information/store", this.personal_data)
        .then((response) => {
          this.errors = {};
          this.isLoading = false;
          this.isComplete = true;
          if (response.status === 200) {
            this.$emit("next-panel-family-background");
          }
        })
        .catch((error) => {
          this.errors = {};
          this.isLoading = false;
          if (error.response.status === 422) {
            Object.keys(error.response.data.errors).map((field) => {
              let [fieldMessage] = error.response.data.errors[field];
              this.errors[field] = fieldMessage;
            });
          }
        });
    },
    openNameExtensionModal() {
      this.isShowNameExtension = true;
    },
    closeNameExtensionModal(newExtension) {
      if (newExtension) {
        this.$emit("update-name-extensions", newExtension);
      }
      this.isShowNameExtension = false;
    },
  },

  created() {
    window.axios
      .get("/api/province/all")
      .then((response) => (this.provinces = response.data));

    window.axios
      .get("/api/countries")
      .then((response) => (this.countries = response.data));
  },
  mounted() {
    if (this.personal_data.citizenship === "DUAL CITIZEN") {
      this.onCitizenDual = true;
    }

    this.personSelectedNameExtension = this.personal_data.extension;
    this.personCountry = this.personal_data.indicate_country;
    this.personResidentialProvince = this.personal_data.residential_province_text;
    this.personResidentialCity = this.personal_data.residential_city_text;
    this.personResidentialBarangay = this.personal_data.residential_barangay_text;

    this.personPermanentProvince = this.personal_data.permanent_province_text;
    this.personPermanentCity = this.personal_data.permanent_city_text;
    this.personPermanentBarangay = this.personal_data.permanent_barangay_text;

    if (!_.isEmpty(this.personal_data.residential_province)) {
      window
        .axios(
          `/api/province/cities/by/${this.personal_data.residential_province}`
        )
        .then((response) => (this.cities = response.data));
    }

    if (!_.isEmpty(this.personal_data.residential_city)) {
      window
        .axios(`/api/city/barangay/by/${this.personal_data.residential_city}`)
        .then((response) => (this.barangays = response.data));
    }

    if (!_.isEmpty(this.personal_data.permanent_province)) {
      window
        .axios(
          `/api/province/cities/by/${this.personal_data.permanent_province}`
        )
        .then((response) => (this.permanentCities = response.data));
    }

    if (!_.isEmpty(this.personal_data.permanent_city)) {
      window
        .axios(`/api/city/barangay/by/${this.personal_data.permanent_city}`)
        .then((response) => (this.permanentBarangays = response.data));
    }
  },
};
</script>
