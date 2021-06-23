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
      <div class="collapse show" :id="isComplete ? 'familyBackground' : ''">
        <div class="form-check mt-3">
          <p>
            Indicate <strong>N/A</strong> or <strong>LEAVE BLANK</strong> if not
            applicable
          </p>
          <label for="spouse">
            <input
              id="spouse"
              type="checkbox"
              :checked="hasSpouse"
              @click="hasSpouse = !hasSpouse"
            />
            <strong
              >Do you have spouse? If YES, kindly tick the checkbox.</strong
            >
          </label>
        </div>
        <section v-if="hasSpouse" v-show="hasSpouse">
          <div class="pl-3 pr-3">
            <div
              class="alert alert-secondary text-center font-weight-bold"
              role="alert"
            >
              SPOUSE INFORMATION
            </div>
          </div>
          <div class="row pr-3 pl-3">
            <div class="col-lg-3">
              <label for="ssurname" class="form-group has-float-label mb-0">
                <input
                  type="text"
                  class="form-control"
                  :class="
                    errors.hasOwnProperty('spouse_lastname') ? 'is-invalid' : ''
                  "
                  id="ssurname"
                  v-model="personal_data.family_background.spouse_lastname"
                  value=""
                  style="
                    text-transform: uppercase;
                    box-shadow: 0px 0px 0px transparent;
                    outline: none;
                  "
                />
                <span
                  ><strong>SPOUSE'S SURNAME</strong
                  ><span class="text-danger"><strong>*</strong></span></span
                >
              </label>
              <p class="text-danger text-sm">
                {{ errors.spouse_lastname }}
              </p>
            </div>
            <div class="col-lg-3">
              <label for="sfirstname" class="form-group has-float-label mb-0">
                <input
                  type="text"
                  class="form-control"
                  :class="
                    errors.hasOwnProperty('spouse_firstname')
                      ? 'is-invalid'
                      : ''
                  "
                  id="sfirstname"
                  v-model="personal_data.family_background.spouse_firstname"
                  value=""
                  style="
                    text-transform: uppercase;
                    box-shadow: 0px 0px 0px transparent;
                    outline: none;
                  "
                />
                <span
                  ><strong>SPOUSE'S FIRST NAME</strong
                  ><span class="text-danger"><strong>*</strong></span></span
                >
              </label>
              <p class="text-danger text-sm">
                {{ errors.spouse_firstname }}
              </p>
            </div>
            <div class="col-lg-3">
              <label for="smiddleame" class="form-group has-float-label">
                <input
                  type="text"
                  class="form-control"
                  :class="
                    errors.hasOwnProperty('spouse_middlename')
                      ? 'is-invalid'
                      : ''
                  "
                  id="smiddleame"
                  v-model="personal_data.family_background.spouse_middlename"
                  value=""
                  style="
                    text-transform: uppercase;
                    outline: none;
                    box-shadow: 0px 0px 0px transparent;
                  "
                />
                <span><strong>SPOUSE'S MIDDLE NAME</strong></span>
              </label>
              <p class="text-danger text-sm">
                {{ errors.spouse_middlename }}
              </p>
            </div>
            <div class="col-lg-2">
              <label for="snameexten" class="form-group has-float-label">
                <v2-select
                  type="text"
                  label="name"
                  v-model="spouseNameExtension"
                  :options="name_extensions"
                >
                </v2-select>
                <span><strong>SPOUSE'S NAME EXTENSION</strong></span>
              </label>
            </div>
            <div class="col-lg-1">
              <name-extension-modal
                @nameext-modal-dismiss="closeNameExtensionModal"
              ></name-extension-modal>
            </div>
          </div>
          <div class="row pl-3 pr-3">
            <div class="col-lg-6">
              <label for="soccupation" class="form-group has-float-label">
                <input
                  type="text"
                  class="form-control"
                  id="soccupation"
                  v-model="personal_data.family_background.spouse_occupation"
                  style="
                    text-transform: uppercase;
                    outline: none;
                    box-shadow: 0px 0px 0px transparent;
                  "
                />
                <span><strong>SPOUSE'S OCCUPATION</strong></span>
              </label>
            </div>
            <div class="col-lg-6">
              <label for="sempname" class="form-group has-float-label">
                <input
                  type="text"
                  class="form-control"
                  id="sempname"
                  v-model="
                    personal_data.family_background
                      .spouse_employer_business_name
                  "
                  style="
                    text-transform: uppercase;
                    outline: none;
                    box-shadow: 0px 0px 0px transparent;
                  "
                />
                <span><strong>SPOUSE'S EMPLOYER/BUSINESS NAME</strong></span>
              </label>
            </div>
          </div>
          <div class="row pl-3 pr-3">
            <div class="col-sm-6">
              <label for="sbusadd" class="form-group has-float-label">
                <input
                  type="text"
                  class="form-control"
                  id="sbusadd"
                  v-model="
                    personal_data.family_background.spouse_business_address
                  "
                  style="
                    text-transform: uppercase;
                    outline: none;
                    box-shadow: 0px 0px 0px transparent;
                  "
                />
                <span><strong>SPOUSE'S BUSINESS ADDRESS</strong></span>
              </label>
            </div>
            <div class="col-sm-6">
              <label for="stelno" class="form-group has-float-label">
                <input
                  type="text"
                  class="form-control"
                  id="stelno"
                  v-model="
                    personal_data.family_background.spouse_telephone_number
                  "
                  style="outline: none; box-shadow: 0px 0px 0px transparent"
                />
                <span><strong>SPOUSE'S TELEPHONE NUMBER</strong></span>
              </label>
            </div>
          </div>
        </section>

        <div class="pl-3 pr-3">
          <div
            class="alert alert-secondary text-center font-weight-bold"
            role="alert"
          >
            CHILDREN INFORMATION
          </div>
        </div>
        <div class="p-2">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="font-weight-bold">NAME OF CHILDREN</th>
                <th class="font-weight-bold">DATE OF BIRTH</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(spouse, index) in spouse" :key="index">
                <td>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Enter Full Name of Children"
                    v-model="spouse.name"
                    style="text-transform: uppercase"
                  />
                </td>
                <td class="align-middle">
                  <input
                    type="date"
                    class="form-control"
                    :class="
                      errors.hasOwnProperty(`spouse.${index}.date_of_birth`)
                        ? 'is-invalid'
                        : ''
                    "
                    id="cdateOfBirth"
                    placeholder="Enter Spouse's Birthdate"
                    v-model="spouse.date_of_birth"
                  />
                  <div class="text-right">
                    <span class="text-danger text-xs">{{
                      errors[`spouse.${index}.date_of_birth`]
                    }}</span>
                  </div>
                </td>
                <td class="text-center">
                  <button
                    @click="removeField(index)"
                    class="btn btn-danger rounded-circle"
                  >
                    <i class="fa fa-times"></i>
                  </button>
                </td>
                <td class="text-center">
                  <button
                    v-if="index == noOfSpouseFields - 1"
                    class="btn btn-primary rounded-circle"
                    @click="generateNewSpouseField"
                  >
                    <i class="fa fa-plus"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="pl-3 pr-3">
          <div
            class="alert alert-secondary text-center font-weight-bold"
            role="alert"
          >
            FATHER'S NAME
          </div>
        </div>
        <div class="row pr-3 pl-3">
          <div class="col-lg-3">
            <label for="fsurname" class="form-group has-float-label mb-0">
              <input
                type="text"
                class="form-control"
                id="fsurname"
                :class="
                  !errors.hasOwnProperty('father_lastname') ? '' : 'is-invalid'
                "
                v-model="personal_data.family_background.father_lastname"
                value=""
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span
                ><strong>FATHER'S SURNAME</strong
                ><span class="text-danger"><strong>*</strong></span></span
              >
            </label>
            <p class="text-danger text-sm">{{ errors.father_lastname }}</p>
          </div>
          <div class="col-lg-3">
            <label for="ffirstname" class="form-group has-float-label mb-0">
              <input
                type="text"
                class="form-control"
                id="ffirstname"
                :class="
                  !errors.hasOwnProperty('father_firstname') ? '' : 'is-invalid'
                "
                v-model="personal_data.family_background.father_firstname"
                value=""
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span
                ><strong>FATHER'S FIRST NAME</strong
                ><span class="text-danger"><strong>*</strong></span></span
              >
            </label>
            <p class="text-danger text-sm">
              {{ errors.father_firstname }}
            </p>
          </div>
          <div class="col-lg-3">
            <label for="fmiddlename" class="form-group has-float-label">
              <input
                type="text"
                class="form-control"
                :class="
                  !errors.hasOwnProperty('father_middlename')
                    ? ''
                    : 'is-invalid'
                "
                id="fmiddlename"
                v-model="personal_data.family_background.father_middlename"
                value=""
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span><strong>FATHER'S MIDDLE NAME</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.father_middlename }}
            </p>
          </div>
          <div class="col-lg-2">
            <label for="fnameexten" class="form-group has-float-label">
              <v2-select
                v-model="fatherNameExtension"
                label="name"
                :options="name_extensions"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span><strong>FATHER'S NAME EXTENSION</strong></span>
            </label>
          </div>
          <div class="col-lg-1">
            <name-extension-modal
              @nameext-modal-dismiss="closeNameExtensionModal"
            ></name-extension-modal>
          </div>
        </div>

        <div class="pl-3 pr-3">
          <div
            class="alert alert-secondary text-center font-weight-bold"
            role="alert"
          >
            MOTHER'S MAIDEN NAME
          </div>
        </div>
        <div class="row pr-3 pl-3">
          <div class="col-lg-3">
            <label for="msurname" class="form-group has-float-label mb-0">
              <input
                type="text"
                class="form-control"
                :class="
                  !errors.hasOwnProperty('mother_lastname') ? '' : 'is-invalid'
                "
                id="msurname"
                v-model="personal_data.family_background.mother_lastname"
                value=""
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span
                ><strong>MOTHER'S MAIDEN SURNAME</strong
                ><span class="text-danger"><strong>*</strong></span></span
              >
            </label>
            <p class="text-danger text-sm">{{ errors.mother_lastname }}</p>
          </div>
          <div class="col-lg-3">
            <label for="mfirstname" class="form-group has-float-label mb-0">
              <input
                type="text"
                :class="
                  !errors.hasOwnProperty('mother_firstname') ? '' : 'is-invalid'
                "
                class="form-control"
                id="mfirstname"
                v-model="personal_data.family_background.mother_firstname"
                value=""
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span
                ><strong>MOTHER'S FIRST NAME</strong
                ><span class="text-danger"><strong>*</strong></span></span
              >
            </label>
            <p class="text-danger text-sm">
              {{ errors.mother_firstname }}
            </p>
          </div>
          <div class="col-lg-3">
            <label for="mmiddlename" class="form-group has-float-label">
              <input
                type="text"
                class="form-control"
                id="mmiddlename"
                :class="
                  !errors.hasOwnProperty('mother_middlename')
                    ? ''
                    : 'is-invalid'
                "
                v-model="personal_data.family_background.mother_middlename"
                value=""
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span><strong>MOTHER'S MAIDEN MIDDLE NAME</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.mother_middlename }}
            </p>
          </div>
        </div>
        <div class="float-right">
          <button
            class="btn btn-success mr-3 mb-2"
            @click="submitPersonFamilyBackground"
            :class="
              Object.keys(this.errors).length === 0
                ? 'btn-success'
                : 'btn-danger'
            "
            :disabled="isLoading"
          >
            <i class="fa fa-check text-white" v-if="isComplete"></i>
            UPDATE
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
import NameExtensionModal from "../../../PersonalData/create/C1/NameExtensionModal";
export default {
  props: {
    show_panel: {
      required: true,
    },
    personal_data: {
      required: true,
    },
    name_extensions: {
      required: true,
    },
  },
  components: {
    NameExtensionModal,
  },
  data() {
    return {
      spouseNameExtension: "",
      fatherNameExtension: "",
      isLoading: false,
      isComplete: false,
      hasSpouse: false,
      noOfSpouseFields: 1,
      spouse: [
        {
          name: "",
          date_of_birth: "",
        },
      ],
      familyBackground: {},
      errors: {},
    };
  },
  watch: {
    spouse(from, to) {
      this.noOfSpouseFields = to.length;
    },
  },
  methods: {
    isKeyCombinationSave(event) {
      if (
        event.ctrlKey &&
        event.code.toLowerCase() === "keys" &&
        event.keyCode === 83
      ) {
        this.submitPersonFamilyBackground();
        event.preventDefault();
        return true;
      }
    },
    generateNewSpouseField() {
      this.spouse.push({
        name: ``,
        date_of_birth: ``,
      });
    },
    removeField(index) {
      this.spouse.splice(index, 1);
    },
    submitPersonFamilyBackground() {
      this.errors = {};
      this.isLoading = true;
      this.personal_data.family_background.has_spouse = this.hasSpouse;
      this.personal_data.family_background.spouse = this.spouse;
      this.personal_data.family_background.spouse_extension =
        this.spouseNameExtension;
      this.personal_data.family_background.father_extension =
        this.fatherNameExtension;

      window.axios
        .post(
          "/employee/exists/personal/family/background/store",
          this.personal_data.family_background
        )
        .then(() => {
          this.isLoading = false;
          this.errors = {};
          this.isComplete = true;
        })
        .catch((error) => {
          this.isLoading = false;
          this.errors = {};
          this.isComplete = false;
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
    window.addEventListener("keydown", this.isKeyCombinationSave);

    this.noOfSpouseFields =
      this.personal_data.spouse_child.length || this.noOfSpouseFields;

    if (this.personal_data.spouse_child.length !== 0) {
      this.spouse = this.personal_data.spouse_child;
    }

    if (!this.personal_data.family_background) {
      this.personal_data.family_background = {
        employee_id: this.personal_data.employee_id,
        spouse_firstname: "",
        spouse_lastname: "",
        spouse_middlename: "",
        spouse_extension: "",
        spouse_occupation: "",
        spouse_employer_business_name: "",
        spouse_business_address: "",
        spouse_telephone_number: "",
        father_firstname: "",
        father_lastname: "",
        father_middlename: "",
        father_extension: "",
        mother_maidenname: "",
        mother_lastname: "",
        mother_firstname: "",
        mother_middlename: "",
        mother_extension: "",
      };
    } else {
      this.spouseNameExtension =
        this.personal_data.family_background.spouse_extension;
      this.fatherNameExtension =
        this.personal_data.family_background.father_extension;
      this.hasSpouse = this.personal_data.family_background.spouse_lastname;
    }
  },
};
</script>

<style></style>
