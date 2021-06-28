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
            class="alert alert-warning text-center"
            style="text-transform: uppercase"
          >
            <strong
              >WARNING: Any misrepresentation made in the Personal Data Sheet
              and the Work Experience Sheet shall cause the filing of
              administrative/criminal case/s against the person
              concerned.</strong
            >
          </div>
          <div
            class="alert alert-secondary text-center font-weight-bold"
            role="alert"
          >
            PERSONAL INFORMATION
          </div>
          <p>Indicate <strong>N/A </strong>if not applicable</p>
        </div>
        <div class="row pr-3 pl-3">
          <div class="col-lg-3">
            <label class="form-group has-float-label mb-0" for="surname">
              <input
                type="text"
                class="form-control"
                :class="!errors.hasOwnProperty('surname') ? '' : 'is-invalid'"
                id="surname"
                v-model="personal_data.surname"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span
                ><strong
                  >SURNAME<span class="text-danger">*</span></strong
                ></span
              >
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
                :class="errors.firstname ? 'is-invalid' : ''"
                v-model="personal_data.firstname"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span
                ><strong
                  >FIRST NAME<span class="text-danger">*</span></strong
                ></span
              >
            </label>
            <p class="text-danger text-sm">
              {{ errors.firstname }}
            </p>
          </div>
          <div class="col-lg-3">
            <label class="form-group has-float-label mb-0" for="middlename">
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
              <v2-select
                v-model="personal_data.nameExtension"
                :options="name_extensions"
              >
              </v2-select>
              <!-- <select
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
              </select> -->
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
                  !errors.hasOwnProperty('dateOfBirth') ? '' : 'is-invalid'
                "
                type="date"
                v-model="personal_data.dateOfBirth"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <p class="text-danger text-sm">
                {{ errors.dateOfBirth }}
              </p>
              <span
                ><strong
                  >DATE OF BIRTH<span class="text-danger">*</span></strong
                >
                (date/month/year)</span
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
                  !errors.hasOwnProperty('placeOfBirth') ? '' : 'is-invalid'
                "
                v-model="personal_data.placeOfBirth"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span
                ><strong
                  >PLACE OF BIRTH<span class="text-danger">*</span></strong
                ></span
              >
            </label>
            <p class="text-danger text-sm">
              {{ errors.placeOfBirth }}
            </p>
          </div>

          <div class="col-lg-2">
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
              <span
                ><strong>SEX<span class="text-danger">*</span></strong></span
              >
            </label>
            <p class="text-danger text-sm">
              {{ errors.sex }}
            </p>
          </div>

          <div class="col-lg-3" :class="statOthers ? 'col-lg-1' : 'col-lg-2'">
            <label for="status" class="form-group has-float-label mb-0">
              <select
                class="form-control"
                :class="!errors.hasOwnProperty('status') ? '' : 'is-invalid'"
                id="status"
                v-model="personal_data.status"
                @change="changeStatOthers()"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              >
                <option value="SINGLE">SINGLE</option>
                <option value="MARRIED">MARRIED</option>
                <option value="WIDOWED">WIDOWED</option>
                <option value="SEPARATED">SEPARATED</option>
                <option value="OTHERS">OTHERS</option>
              </select>
              <span
                ><strong>STATUS<span class="text-danger">*</span></strong></span
              >
            </label>
            <p class="text-danger text-sm">
              {{ errors.status }}
            </p>
          </div>
          <div class="col-lg-1" v-if="statOthers">
            <label for="statOthers" class="form-group has-float-label">
              <input
                type="text"
                name="statOthers"
                class="form-control box-shadow-0"
                :class="
                  !errors.hasOwnProperty('other_status') ? '' : 'is-invalid'
                "
                v-model="personal_data.other_status"
                id="statOthers"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span
                ><strong>PLEASE SPECIFY</strong
                ><span class="text-danger"><strong>*</strong></span></span
              >
            </label>
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
                ><strong
                  >HEIGHT (m)<span class="text-danger">*</span></strong
                ></span
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
                ><strong
                  >WEIGHT (kg)<span class="text-danger">*</span></strong
                ></span
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
                :class="errors.hasOwnProperty('bloodType') ? 'is-invalid' : ''"
                v-model="personal_data.bloodType"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span
                ><strong
                  >BLOODTYPE<span class="text-danger">*</span></strong
                ></span
              >
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
                v-model="personal_data.gsisIdNo"
                style="
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                  text-transform: uppercase;
                "
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
                v-model="personal_data.pagibigIdNo"
                style="
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                  text-transform: uppercase;
                "
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
                v-model="personal_data.philHealthIdNo"
                style="
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                  text-transform: uppercase;
                "
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
                v-model="personal_data.sssIdNo"
                style="
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                  text-transform: uppercase;
                "
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
                v-model="personal_data.tinIdNo"
                style="
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                  text-transform: uppercase;
                "
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
                v-model="personal_data.agencyEmpIdNo"
                style="
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                  text-transform: uppercase;
                "
              />
              <span><strong>AGENCY EMPLOYEE NUMBER</strong></span>
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
              <span
                ><strong
                  >CITIZENSHIP<span class="text-danger">*</span></strong
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
              <span
                ><strong>BY<span class="text-danger">*</span></strong></span
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
            <label for="countries" class="form-group has-float-label mb-0">
              <v2-select
                label="name"
                v-model="personal_data.country"
                :options="countries"
                id="resProvince"
              ></v2-select>
              <!-- <select
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
              </select> -->
              <span
                ><strong
                  >INDICATE COUNTRY<span class="text-danger">*</span></strong
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
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>TELEPHONE NUMBER</strong></span>
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
                v-model="personal_data.mobileNumber"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span
                ><strong>MOBILE NUMBER</strong
                ><span class="text-danger"><strong>*</strong></span></span
              >
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
                v-model="personal_data.emailAddress"
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
                v-model="personal_data.residentialLotNo"
                id="lotno"
                class="form-control"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
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
                v-model="personal_data.residentialSubdivision"
                id="subdivision"
                class="form-control"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
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
                id="resProvince"
              ></v2-select>
              <p class="text-danger text-sm">
                {{ errors["residentialProvince.code"] }}
              </p>
              <span
                ><strong
                  >PROVINCE<span class="text-danger">*</span></strong
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
              ></v2-select>
              <p class="text-danger text-sm">
                {{ errors["residentialCity.code"] }}
              </p>
              <span
                ><strong>CITY<span class="text-danger">*</span></strong></span
              >
            </label>
          </div>
          <div class="col-lg-3">
            <label class="form-group has-float-label">
              <v2-select
                label="name"
                v-model="personal_data.residentialBarangay"
                :options="barangays"
              ></v2-select>
              <p class="text-danger text-sm">
                {{ errors["residentialBarangay.code"] }}
              </p>
              <span
                ><strong
                  >BARANGAY<span class="text-danger">*</span></strong
                ></span
              >
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
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span
                ><strong
                  >ZIP CODE<span class="text-danger">*</span></strong
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
                v-model="personal_data.permanentLotNo"
                :readonly="isSameAsAbove ? true : false"
                class="form-control"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span><strong>HOUSE/BLOCK/LOT NO</strong></span>
            </label>
          </div>
          <div class="col-lg-4">
            <label for="permanentStreet" class="form-group has-float-label">
              <input
                type="text"
                id="permanentStreet"
                v-model="personal_data.permanentStreet"
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
                v-model="personal_data.permanentSubdivision"
                :readonly="isSameAsAbove ? true : false"
                class="form-control"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
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
              ></v2-select>
              <p class="text-danger text-sm">
                {{ errors["permanentProvince.code"] }}
              </p>
              <span
                ><strong
                  >PROVINCE<span class="text-danger">*</span></strong
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
              ></v2-select>
              <p class="text-danger text-sm">
                {{ errors["permanentCity.code"] }}
              </p>
              <span
                ><strong>CITY<span class="text-danger">*</span></strong></span
              >
            </label>
          </div>

          <div class="col-lg-3">
            <label class="form-group has-float-label">
              <v2-select
                label="name"
                v-model="personal_data.permanentBarangay"
                :options="permanentBarangays"
              ></v2-select>
              <p class="text-danger text-sm">
                {{ errors["permanentBarangay.code"] }}
              </p>
              <span
                ><strong
                  >BARANGAY<span class="text-danger">*</span></strong
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
                type="number"
                v-model="personal_data.permanentZipCode"
                @input="
                  if (personal_data.permanentZipCode.length > zipCodeMaxLength)
                    personal_data.permanentZipCode =
                      personal_data.permanentZipCode.slice(0, zipCodeMaxLength);
                "
                :class="
                  !errors.hasOwnProperty('permanentZipCode') ? '' : 'is-invalid'
                "
                :disabled="isSameAsAbove ? true : false"
                class="form-control"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span
                ><strong
                  >ZIP CODE<span class="text-danger">*</span></strong
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
            class="btn btn-primary shadow"
            :class="
              Object.keys(errors).length != 0 ? 'btn-danger' : 'btn-primary'
            "
            @click="submitPersonalInformation"
            v-if="!isComplete"
            :disabled="isLoading"
          >
            NEXT
            <i class="fa fa-hand-o-right"></i>
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
import NameExtensionModal from "./NameExtensionModal";
import "vue-select/dist/vue-select.css";

export default {
  components: { NameExtensionModal },
  props: {
    name_extensions: {
      required: true,
    },
  },
  data() {
    return {
      isShow: false,
      statOthers: false,
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
        other_status: "",
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
      nameExtensions: [],
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
    };
  },
  methods: {
    isKeyCombinationSave(event) {
      if (
        !this.isComplete &&
        event.ctrlKey &&
        event.code.toLowerCase() === "keys" &&
        event.keyCode === 83
      ) {
        this.submitPersonalInformation(event);
        event.preventDefault();
        return true;
      }
    },
    changeStatOthers() {
      if (this.personal_data.status == "OTHERS") {
        this.statOthers = true;
      } else {
        this.statOthers = false;
      }
    },
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

      if (this.isSameAsAbove) {
        this.tempPermanentAddress.province =
          this.personal_data.permanentProvince;
        this.tempPermanentAddress.city = this.personal_data.permanentCity;
        this.tempPermanentAddress.barangay =
          this.personal_data.permanentBarangay;

        this.tempPermanentAddress.house_no = this.personal_data.permanentLotNo;
        this.tempPermanentAddress.street = this.personal_data.permanentStreet;
        this.tempPermanentAddress.village =
          this.personal_data.permanentSubdivision;
        this.tempPermanentAddress.zip_code =
          this.personal_data.permanentZipCode;

        this.permanentCities = this.cities;
        this.permanentBarangays = this.barangays;
        this.personal_data.permanentLotNo = this.personal_data.residentialLotNo;
        this.personal_data.permanentStreet =
          this.personal_data.residentialStreet;
        this.personal_data.permanentSubdivision =
          this.personal_data.residentialSubdivision;
        this.personal_data.permanentBarangay =
          this.personal_data.residentialBarangay;
        this.personal_data.permanentCity = this.personal_data.residentialCity;
        this.personal_data.permanentProvince =
          this.personal_data.residentialProvince;
        this.personal_data.permanentZipCode =
          this.personal_data.residentialZipCode;
      } else {
        this.personal_data.permanentLotNo = this.tempPermanentAddress.house_no;
        this.personal_data.permanentStreet = this.tempPermanentAddress.street;
        this.personal_data.permanentSubdivision =
          this.tempPermanentAddress.village;
        this.personal_data.permanentBarangay =
          this.tempPermanentAddress.barangay;
        this.personal_data.permanentCity = this.tempPermanentAddress.city;
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
        .post("/employee/personal/information/store", this.personal_data)
        .then((response) => {
          if (response.status == 200) {
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
          if (error.response.status == 422) {
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
  mounted() {
    // This simply means that the user already filled this section.
    if (localStorage.getItem("personal_information")) {
      this.personal_data = JSON.parse(
        localStorage.getItem("personal_information")
      );

      this.isComplete = true;

      this.$emit("next-panel-family-background");
    }
    window.addEventListener("keydown", this.isKeyCombinationSave);
  },
  created() {
    window.axios
      .get("/api/province/all")
      .then((response) => (this.provinces = response.data));

    window.axios
      .get("/api/countries")
      .then((response) => (this.countries = response.data));

    window.axios.get("/api/name/extensions").then((response) => {
      this.nameExtensions = response.data;
    });
  },
};
</script>
<style scoped>
.box-shadow-0 {
  outline: none;
  box-shadow: 0px 0px 0px transparent;
  text-transform: uppercase;
}
</style>
