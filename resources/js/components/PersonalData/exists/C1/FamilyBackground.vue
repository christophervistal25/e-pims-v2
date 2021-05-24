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
      <div
        class="collapse"
        :class="show_panel && !isComplete ? 'show' : ''"
        :id="isComplete ? 'familyBackground' : ''"
      >
        <div class="form-check mt-3">
          <label for="#spouse">
            <input
              id="spouse"
              type="checkbox"
              :checked="personal_data.family_background.spouse_firstname"
              @click="hasSpouse = !hasSpouse"
            />
            Do you have spouse? If YES, kindly tick the checkbox.
          </label>
        </div>
        <section
          v-if="personal_data.family_background.spouse_firstname"
          v-show="!hasSpouse"
        >
          <div class="pl-3 pr-3">
            <div
              class="alert alert-secondary text-center font-weight-bold"
              role="alert"
            >
              SPOUSE INFORMATION
            </div>
          </div>
          <div class="row pr-3 pl-3">
            <div class="form-group col-lg-3">
              <label for="ssurname">SPOUSE'S SURNAME</label
              ><span class="text-danger">*</span>
              <input
                type="text"
                class="form-control"
                :class="errors.hasOwnProperty('ssurname') ? 'is-invalid' : ''"
                id="ssurname"
                v-model="personal_data.family_background.spouse_lastname"
                placeholder="Enter Spouse's Surname"
                value=""
                style="text-transform: uppercase"
              />
              <p class="text-danger text-sm">
                {{ errors.ssurname }}
              </p>
            </div>
            <div class="form-group col-lg-3">
              <label for="sfirstname">SPOUSE'S FIRST NAME</label
              ><span class="text-danger">*</span>
              <input
                type="text"
                class="form-control"
                :class="errors.hasOwnProperty('sfirstname') ? 'is-invalid' : ''"
                id="sfirstname"
                v-model="personal_data.family_background.spouse_firstname"
                placeholder="Enter Spouse's First Name"
                value=""
                style="text-transform: uppercase"
              />
              <p class="text-danger text-sm">
                {{ errors.sfirstname }}
              </p>
            </div>
            <div class="form-group col-lg-3">
              <label for="smiddleame">SPOUSE'S MIDDLE NAME</label>
              <input
                type="text"
                class="form-control"
                id="smiddleame"
                v-model="personal_data.family_background.spouse_middlename"
                placeholder="Enter Spouse's Middle Name"
                value=""
                style="text-transform: uppercase"
              />
            </div>
            <div class="form-group col-lg-3">
              <label for="snameexten">SPOUSE'S NAME EXTENSION</label>
              <input
                type="text"
                maxlength="3"
                class="form-control"
                id="snameexten"
                v-model="personal_data.family_background.spouse_extension"
                placeholder="(JR., SR.)"
                value=""
                style="text-transform: uppercase"
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
                v-model="personal_data.family_background.spouse_occupation"
                style="text-transform: uppercase"
              />
            </div>
            <div class="form-group col-lg-6">
              <label for="sempname">SPOUSE'S EMPLOYER/BUSINESS NAME</label>
              <input
                type="text"
                class="form-control"
                id="sempname"
                placeholder="Enter Spouse's Employer/Business Name"
                v-model="
                  personal_data.family_background.spouse_employer_business_name
                "
                style="text-transform: uppercase"
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
                v-model="
                  personal_data.family_background.spouse_business_address
                "
                style="text-transform: uppercase"
              />
            </div>
            <div class="form-group col-sm-6">
              <label for="stelno">SPOUSE'S TELEPHONE NUMBER</label>
              <input
                type="text"
                class="form-control"
                id="stelno"
                placeholder="Enter Spouse's Telephone Number"
                v-model="
                  personal_data.family_background.spouse_telephone_number
                "
              />
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
                      errors.hasOwnProperty(`spouse.${index}.cdateOfBirth`)
                        ? 'is-invalid'
                        : ''
                    "
                    id="cdateOfBirth"
                    placeholder="Enter Spouse's Birthdate"
                    v-model="spouse.date_of_birth"
                  />
                  <div class="text-right">
                    <span class="text-danger text-xs">{{
                      errors[`spouse.${index}.cdateOfBirth`]
                    }}</span>
                  </div>
                </td>
                <td class="text-center">
                  <button
                    v-show="index != 0"
                    @click="removeField(index)"
                    class="btn btn-danger rounded-circle"
                  >
                    <i class="fa fa-times"></i>
                  </button>
                </td>
                <td class="text-center">
                  <button
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
            FATHER'S INFORMATION
          </div>
        </div>
        <div class="row pr-3 pl-3">
          <div class="form-group col-lg-3">
            <label for="fsurname">FATHER'S SURNAME</label>
            <input
              type="text"
              class="form-control"
              id="fsurname"
              :class="!errors.hasOwnProperty('fsurname') ? '' : 'is-invalid'"
              v-model="personal_data.family_background.father_lastname"
              placeholder="Enter Father's Surname"
              value=""
              style="text-transform: uppercase"
            />
            <p class="text-danger text-sm">{{ errors.fsurname }}</p>
          </div>
          <div class="form-group col-lg-3">
            <label for="ffirstname">FATHER'S FIRST NAME</label>
            <input
              type="text"
              class="form-control"
              id="ffirstname"
              :class="!errors.hasOwnProperty('ffirstname') ? '' : 'is-invalid'"
              v-model="personal_data.family_background.father_firstname"
              placeholder="Enter Father's First Name"
              value=""
              style="text-transform: uppercase"
            />
            <p class="text-danger text-sm">
              {{ errors.ffirstname }}
            </p>
          </div>
          <div class="form-group col-lg-3">
            <label for="fmiddlename">FATHER'S MIDDLE NAME</label>
            <input
              type="text"
              class="form-control"
              :class="!errors.hasOwnProperty('fmiddlename') ? '' : 'is-invalid'"
              id="fmiddlename"
              v-model="personal_data.family_background.father_middlename"
              placeholder="Enter Father's Middle Name"
              value=""
              style="text-transform: uppercase"
            />
            <p class="text-danger text-sm">
              {{ errors.fmiddlename }}
            </p>
          </div>
          <div class="form-group col-lg-3">
            <label for="fnameexten">FATHER'S NAME EXTENSION</label>
            <input
              type="text"
              maxlength="3"
              class="form-control"
              id="fnameexten"
              v-model="personal_data.family_background.extension"
              placeholder="(JR., SR.)"
              value=""
              style="text-transform: uppercase"
            />
          </div>
        </div>

        <div class="pl-3 pr-3">
          <div
            class="alert alert-secondary text-center font-weight-bold"
            role="alert"
          >
            MOTHER'S INFORMATION
          </div>
        </div>
        <div class="row pr-3 pl-3">
          <div class="form-group col-lg-3">
            <label for="msurname">MOTHER'S MAIDEN SURNAME</label>
            <input
              type="text"
              class="form-control"
              :class="!errors.hasOwnProperty('msurname') ? '' : 'is-invalid'"
              id="msurname"
              v-model="personal_data.family_background.mother_lastname"
              placeholder="Enter Mother's Maiden Surname"
              value=""
              style="text-transform: uppercase"
            />
            <p class="text-danger text-sm">{{ errors.msurname }}</p>
          </div>
          <div class="form-group col-lg-3">
            <label for="mfirstname">MOTHER'S FIRST NAME</label>
            <input
              type="text"
              :class="!errors.hasOwnProperty('mfirstname') ? '' : 'is-invalid'"
              class="form-control"
              id="mfirstname"
              v-model="personal_data.family_background.mother_firstname"
              placeholder="Enter Mother's First Name"
              value=""
              style="text-transform: uppercase"
            />
            <p class="text-danger text-sm">
              {{ errors.mfirstname }}
            </p>
          </div>
          <div class="form-group col-lg-3">
            <label for="mmiddlename">MOTHER'S MAIDEN MIDDLE NAME</label>
            <input
              type="text"
              class="form-control"
              id="mmiddlename"
              :class="!errors.hasOwnProperty('mmiddlename') ? '' : 'is-invalid'"
              v-model="personal_data.family_background.mother_middlename"
              placeholder="Enter Mother's Maiden Middle Name"
              value=""
              style="text-transform: uppercase"
            />
            <p class="text-danger text-sm">
              {{ errors.mmiddlename }}
            </p>
          </div>
        </div>
        <div class="float-right">
          <button
            class="btn btn-primary font-weight-bold mr-3 mb-2"
            @click="submitPersonFamilyBackground"
            v-if="!isComplete"
            :disabled="isLoading"
          >
            NEXT
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
export default {
  props: {
    show_panel: {
      required: true,
    },
    personal_data: {
      required: true,
    },
  },
  data() {
    return {
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
  methods: {
    generateNewSpouseField() {
      this.spouse.push({
        name: ``,
        date_of_birth: ``,
      });
    },
    removeField(index) {
      if (index != 0) {
        this.spouse.splice(index, 1);
      }
    },
    submitPersonFamilyBackground() {
      this.isLoading = true;
      this.personal_data.family_background.spouse = this.spouse;
      window.axios
        .post(
          "/employee/exists/personal/family/background/store",
          this.personal_data.family_background
        )
        .then((response) => {
          this.isLoading = false;
          this.isComplete = true;

          localStorage.setItem(
            "family_background",
            JSON.stringify(response.data)
          );
        })
        .catch((error) => {
          this.isLoading = false;
          this.errors = {};
          if (error.response.status === 422) {
            Object.keys(error.response.data.errors).map((field, index) => {
              let [fieldMessage] = error.response.data.errors[field];
              this.errors[field] = fieldMessage;
            });
          }
        });
    },
  },
  created() {
    this.noOfSpouseFields =
      this.personal_data.spouse_child.length || this.noOfSpouseFields;
    if (this.personal_data.spouse_child.length !== 0) {
      this.spouse = this.personal_data.spouse_child;
    } else {
      this.spouse.push({
        name: "",
        date_of_birth: "",
      });
    }
  },
};
</script>

<style></style>
