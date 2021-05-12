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
            <label class="form-group has-float-label mb-0" for="surname">
              <input
                type="text"
                class="form-control"
                :class="!errors.hasOwnProperty('surname') ? '' : 'is-invalid'"
                id="surname"
                placeholder="Enter Surname"
                v-model="personal_data.surname"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span>Surname<span class="text-danger">*</span> </span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.surname }}
            </p>
          </div>
          <div class="col-lg-3">
            <label class="form-group has-float-label mb-0" for="firstname">
              <input
                type="text"
                class="form-control"
                id="firstname"
                placeholder="Enter First Name"
                :class="errors.firstname ? 'is-invalid' : ''"
                v-model="personal_data.firstname"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span>First Name<span class="text-danger">*</span></span>
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
                placeholder="Enter Middle Name"
                v-model="personal_data.middlename"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span>Middle Name</span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.middlename }}
            </p>
          </div>
          <div class="col-lg-2">
            <label for="nameextension" class="form-group has-float-label mb-0">
              <select
                type="text"
                id="nameextension"
                v-model="personal_data.nameExtension"
                class="form-control custom-select"
                :class="
                  !errors.hasOwnProperty('nameExtension') ? '' : 'is-invalid'
                "
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              >
                <option value="" readonly selected>
                  Please Select Extension Name
                </option>
                <option
                  :selected="personal_data.nameExtension === 'JR'"
                  value="JR"
                >
                  JR
                </option>
                <option
                  :selected="personal_data.nameExtension === 'SR'"
                  value="SR"
                >
                  SR
                </option>
                <option
                  :selected="personal_data.nameExtension === 'III'"
                  value="III"
                >
                  III
                </option>
              </select>
              <span>Extension Name</span>
            </label>

            <p class="text-danger text-sm">
              {{ errors.nameExtension }}
            </p>
          </div>
          <div class="col-lg-1">
            <button
              class="btn btn-sm btn-info rounded-circle shadow mt-1"
              @click="openNameExtensionModal"
            >
              <i class="fas fa-plus text-sm"></i>
            </button>
          </div>
        </div>
        <div class="row pl-3 pr-3">
          <div class="col-lg-3">
            <label for="dateofbirth" class="form-group has-float-label">
              <input
                class="form-control"
                :class="
                  !errors.hasOwnProperty('dateOfBirth') ? '' : 'is-invalid'
                "
                type="date"
                v-model="personal_data.dateOfBirth"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <p class="text-danger text-sm">
                {{ errors.dateOfBirth }}
              </p>
              <span>DATE OF BIRTH<span class="text-danger">*</span></span>
            </label>
          </div>
          <div class="col-lg-3">
            <label for="placeofbirth" class="form-group has-float-label mb-0">
              <input
                type="text"
                class="form-control"
                id="placeofbirth"
                :class="
                  !errors.hasOwnProperty('placeOfBirth') ? '' : 'is-invalid'
                "
                placeholder="Enter Place of Birth"
                v-model="personal_data.placeOfBirth"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span>Place of Birth<span class="text-danger">*</span></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.placeOfBirth }}
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
                <option value="MALE">MALE</option>
                <option value="FEMALE">FEMALE</option>
              </select>
              <span>SEX<span class="text-danger">*</span></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.sex }}
            </p>
          </div>

          <div class="col-lg-3">
            <label for="status" class="form-group has-float-label mb-0">
              <select
                class="form-control"
                :class="!errors.hasOwnProperty('status') ? '' : 'is-invalid'"
                id="status"
                v-model="personal_data.status"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              >
                <option value="SINGLE">SINGLE</option>
                <option value="MARRIED">MARRIED</option>
                <option value="WIDOWED">WIDOWED</option>
                <option value="SEPARATED">SEPARATED</option>
                <option value="OTHERS">OTHERS</option>
              </select>
              <span>STATUS<span class="text-danger">*</span></span>
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
                placeholder="Enter height in meter"
                v-model="personal_data.height"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span>Height(m)<span class="text-danger">*</span></span>
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
                placeholder="Enter weight in kilogram"
                v-model="personal_data.weight"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span>Weight(kg)<span class="text-danger">*</span></span>
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
                :class="errors.hasOwnProperty('bloodType') ? 'is-invalid' : ''"
                placeholder="Enter bloodtype"
                v-model="personal_data.bloodType"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span>Bloodtype<span class="text-danger">*</span></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.bloodType }}
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
                v-model="personal_data.gsisIdNo"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
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
                v-model="personal_data.pagibigIdNo"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
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
                v-model="personal_data.philHealthIdNo"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span>PHILHEALTH ID Number</span>
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
                v-model="personal_data.sssIdNo"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
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
                v-model="personal_data.tinIdNo"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
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
                v-model="personal_data.agencyEmpIdNo"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span>Agency Employee Number</span>
            </label>
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
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              >
                <option value="FILIPINO">FILIPINO</option>
                <option value="DUAL CITIZEN">DUAL CITIZEN</option>
              </select>
              <span>Citizenship<span class="text-danger">*</span></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.citizenship }}
            </p>
          </div>
          <div
            class="col-lg-4"
            v-if="personal_data.citizenship == 'DUAL CITIZEN'"
          >
            <label for="citizenshipby" class="form-group has-float-label mb-0">
              <select
                class="form-control custom-select"
                id="citizenshipby"
                :class="
                  !errors.hasOwnProperty('citizenshipBy') ? '' : 'is-invalid'
                "
                v-model="personal_data.citizenshipBy"
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

          <div
            class="col-lg-4"
            v-if="personal_data.citizenship == 'DUAL CITIZEN'"
          >
            <label for="countries" class="form-group has-float-label mb-0">
              <select
                class="form-control custom-select"
                id="countries"
                :class="!errors.hasOwnProperty('country') ? '' : 'is-invalid'"
                v-model="personal_data.country"
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
                v-model="personal_data.telephoneNumber"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span>Telephone Number</span>
            </label>
          </div>
          <div class="col-lg-4">
            <label for="mobileno" class="form-group has-float-label mb-0">
              <input
                type="text"
                :class="
                  !errors.hasOwnProperty('mobileNumber') ? '' : 'is-invalid'
                "
                id="mobileno"
                class="form-control"
                placeholder="Enter Mobile Number"
                v-model="personal_data.mobileNumber"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span>Mobile Number<span class="text-danger">*</span></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.mobileNumber }}
            </p>
          </div>
          <div class="col-lg-4 form-group input-group">
            <label for="email" class="has-float-label">
              <input
                type="email"
                id="email"
                class="form-control"
                placeholder="Optional"
                v-model="personal_data.emailAddress"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
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
                v-model="personal_data.residentialLotNo"
                id="lotno"
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
                v-model="personal_data.residentialStreet"
                id="street"
                class="form-control"
                placeholder="Enter Street"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span>Street</span>
            </label>
          </div>
          <div class="col-lg-4">
            <label for="subdivision" class="form-group has-float-label">
              <input
                type="text"
                v-model="personal_data.residentialSubdivision"
                id="subdivision"
                class="form-control"
                placeholder="Enter Subdivision or Village"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span>Subdivision/Village</span>
            </label>
          </div>
        </div>
        <div class="row pl-3 pr-3">
          <div class="col-lg-3">
            <label class="form-group has-float-label">
              <v-select
                label="name"
                v-model="personal_data.residentialProvince"
                :options="provinces"
                @input="provinceChange"
                id="resProvince"
              ></v-select>
              <p class="text-danger text-sm">
                {{ errors["residentialProvince.code"] }}
              </p>
              <span>Province<span class="text-danger">*</span></span>
            </label>
          </div>
          <div class="col-lg-3">
            <label class="form-group has-float-label">
              <v-select
                label="name"
                v-model="personal_data.residentialCity"
                :options="cities"
                @input="municipalChange"
              ></v-select>
              <p class="text-danger text-sm">
                {{ errors["residentialCity.code"] }}
              </p>
              <span>City<span class="text-danger">*</span></span>
            </label>
          </div>
          <div class="col-lg-3">
            <label class="form-group has-float-label">
              <v-select
                label="name"
                v-model="personal_data.residentialBarangay"
                :options="barangays"
              ></v-select>
              <p class="text-danger text-sm">
                {{ errors["residentialBarangay.code"] }}
              </p>
              <span>Barangay<span class="text-danger">*</span></span>
            </label>
          </div>
          <div class="col-lg-3">
            <label for="zipcode" class="form-group has-float-label mb-0">
              <input
                id="zipcode"
                type="number"
                v-model="personal_data.residentialZipCode"
                class="form-control"
                @input="
                  if (
                    personal_data.residentialZipCode.length > zipCodeMaxLength
                  )
                    personal_data.residentialZipCode = personal_data.residentialZipCode.slice(
                      0,
                      zipCodeMaxLength
                    );
                "
                :class="
                  !errors.hasOwnProperty('residentialZipCode')
                    ? ''
                    : 'is-invalid'
                "
                placeholder="Enter Zip Code"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span>Zip Code<span class="text-danger">*</span></span>
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
            <label class="checkbox-inline" style="transform: scale(0.8)">
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
                v-model="personal_data.permanentLotNo"
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
                v-model="personal_data.permanentStreet"
                :readonly="isSameAsAbove ? true : false"
                class="form-control"
                placeholder="Enter Street"
                style="text-transform: uppercase"
              />
              <span>Street</span>
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
                placeholder="Enter Subdivision or Village"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span>Subdivision/Village</span>
            </label>
          </div>
        </div>

        <div class="row pl-3 pr-3">
          <div class="col-lg-3">
            <label class="form-group has-float-label">
              <v-select
                label="name"
                v-model="personal_data.permanentProvince"
                :options="provinces"
                @input="permanentProvinceChange"
              ></v-select>
              <p class="text-danger text-sm">
                {{ errors["permanentProvince.code"] }}
              </p>
              <span>Province<span class="text-danger">*</span></span>
            </label>
          </div>

          <div class="col-lg-3">
            <label class="form-group has-float-label">
              <v-select
                label="name"
                v-model="personal_data.permanentCity"
                :options="permanentCities"
                @input="permanentMunicipalChange"
              ></v-select>
              <p class="text-danger text-sm">
                {{ errors["permanentCity.code"] }}
              </p>
              <span>City<span class="text-danger">*</span></span>
            </label>
          </div>

          <div class="col-lg-3">
            <label class="form-group has-float-label">
              <v-select
                label="name"
                v-model="personal_data.permanentBarangay"
                :options="permanentBarangays"
              ></v-select>
              <p class="text-danger text-sm">
                {{ errors["permanentBarangay.code"] }}
              </p>
              <span>Barangay<span class="text-danger">*</span></span>
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
                v-model="personal_data.permanentZipCode"
                @input="
                  if (personal_data.permanentZipCode.length > zipCodeMaxLength)
                    personal_data.permanentZipCode = personal_data.permanentZipCode.slice(
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
              <span>Zip Code<span class="text-danger">*</span></span>
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
    <name-extension-modal
      :shownameextension="isShowNameExtension"
      @nameext-modal-dismiss="closeNameExtensionModal"
    ></name-extension-modal>
  </div>
</template>
<script>
import NameExtensionModal from "./NameExtensionModal";

import "vue-select/dist/vue-select.css";
import _ from "lodash";
export default {
  components: { NameExtensionModal },
  props: ["data", "nameExtensions"],
  data() {
    return {
      isShow: false,
      isShowNameExtension: false,
      isLoading: false,
      isComplete: false,
      isSameAsAbove: false,
      zipCodeMaxLength: 4,
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
        permanentZipCode: "",
      },
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
      if (!_.isEmpty(province)) {
        window
          .axios(`/api/province/cities/by/${province.code}`)
          .then((response) => (this.cities = response.data));
      }
    },
    municipalChange(municipal) {
      if (!_.isEmpty(municipal)) {
        window
          .axios(`/api/city/barangay/by/${municipal.code}`)
          .then((response) => (this.barangays = response.data));
      }
    },
    permanentProvinceChange(province) {
      if (!_.isEmpty(province)) {
        window
          .axios(`/api/province/cities/by/${province.code}`)
          .then((response) => (this.permanentCities = response.data));
      }
    },
    permanentMunicipalChange(municipal) {
      if (!_.isEmpty(municipal)) {
        window
          .axios(`/api/city/barangay/by/${municipal.code}`)
          .then((response) => (this.permanentBarangays = response.data));
      }
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
        this.permanentCities = this.cities;
        this.permanentBarangays = this.barangays;
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

      // this.personal_data.permanentProvince = this.personal_data.permanentProvince.code;
      // this.personal_data.permanentCity = this.personal_data.permanentCity.code;
      // this.personal_data.permanentBarangay = this.personal_data.permanentBarangay.code;

      window.axios
        .post("/employee/personal/information/store", this.personal_data)
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

            this.$emit("next-panel-family-background");
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
    openNameExtensionModal() {
      this.isShowNameExtension = true;
    },
    closeNameExtensionModal(newExtension) {
      if (newExtension) {
        this.nameExtensions.push(newExtension.extension);
      }
      this.isShowNameExtension = false;
    },
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
  watch: {
    data: function (currentDataPassed) {
      // If employee is present then the user want to generate a pds with selected employee.
      if (currentDataPassed) {
        this.personal_data.surname = currentDataPassed.lastname;
        this.personal_data.firstname = currentDataPassed.firstname;
        this.personal_data.middlename = currentDataPassed.middlename;
        this.personal_data.nameExtension = currentDataPassed.extension;
        this.personal_data.dateOfBirth = currentDataPassed.date_birth;
        this.personal_data.placeOfBirth = currentDataPassed.place_birth;
        this.personal_data.sex = currentDataPassed.sex.toUpperCase();
        this.personal_data.status = currentDataPassed.civil_status.toUpperCase();
        this.personal_data.height = currentDataPassed.height;
        this.personal_data.weight = currentDataPassed.weight;
        this.personal_data.bloodType = currentDataPassed.blood_type;
        this.personal_data.gsisIdNo = currentDataPassed.gsis_id_no;
        this.personal_data.pagibigIdNo = currentDataPassed.pag_ibig_no;
        this.personal_data.philHealthIdNo = currentDataPassed.philhealth_no;
        this.personal_data.sssIdNo = currentDataPassed.sss_no;
        this.personal_data.tinIdNo = currentDataPassed.tin_no;
        this.personal_data.agencyEmpIdNo = currentDataPassed.agency_employee_no;
        this.personal_data.citizenship = currentDataPassed.citizenship.toUpperCase();
        this.personal_data.telephoneNumber = currentDataPassed.telephone_no;
        this.personal_data.mobileNumber = currentDataPassed.mobile_no;
        this.personal_data.emailAddress = currentDataPassed.email_address;
      }
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
};
</script>
