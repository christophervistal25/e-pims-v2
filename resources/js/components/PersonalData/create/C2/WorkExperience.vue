<template>
  <div class="card">
    <div
      class="card-header"
      :data-target="isComplete ? '#workExperience' : ''"
      :data-toggle="isComplete ? 'collapse' : ''"
      :style="isComplete ? 'cursor : pointer;' : ''"
    >
      <h5 class="mb-0 p-2">
        <i v-if="isComplete" class="fa fa-check text-success"></i>
        V. WORK EXPERIENCE
        <i
          v-if="isComplete"
          class="text-success float-right fa fa-caret-down"
          aria-hidden="true"
        ></i>
      </h5>
    </div>

    <div
      class="collapse"
      :class="work_experience && !isComplete ? 'show' : ''"
      :id="isComplete ? 'workExperience' : ''"
    >
      <div class="card-body">
        <div class="alert alert-info text-center" role="alert">
          <strong
            >Include private employment. Start from your recent work.</strong
          >
        </div>
        <p>Indicate <strong>N/A </strong>if not applicable</p>
        <table class="table table-bordered">
          <tr class="text-center" style="background: #eaeaea">
            <td class="p-4"></td>
            <td colspan="2" scope="colgroup" class="text-sm">
              28. INCLUSIVE DATES (mm/dd/yyyy)
            </td>
            <td rowspan="2" class="align-middle text-sm">
              POSITION TITLE (Write in full/Do not abbreviate)
            </td>
            <td rowspan="2" class="align-middle text-sm">
              DEPARTMENT / AGENCY / OFFICE / COMPANY (Write in full/Do not
              abbreviate)
            </td>
            <td rowspan="2" class="align-middle text-sm">MONTHLY SALARY</td>
            <td rowspan="2" class="align-middle text-sm">
              SALARY/ JOB/ PAY GRADE <br />
              (if applicable) <br />
              & STEP (Format "00-0")/ INCREMENT
            </td>
            <td rowspan="2" class="align-middle text-sm">
              STATUS OF APPOINTMENT
            </td>

            <td rowspan="2" class="align-middle text-sm">
              GOV'T SERVICE <strong>(Y/ N)</strong>
            </td>
            <td rowspan="2" class="pl-4 pr-4">&nbsp;</td>
          </tr>

          <tr style="background: #eaeaea">
            <td class="p-4"></td>
            <td scope="col" class="text-center text-sm">FROM</td>
            <td scope="col" class="text-center text-sm">TO</td>
          </tr>

          <tbody>
            <tr v-for="(workExperience, index) in workExperience" :key="index">
              <td
                @click="
                  rowErrors.includes(`${index}.`) &&
                    displayRowErrorMessage(index)
                "
                class="align-middle text-center"
                :style="rowErrors.includes(`${index}.`) ? 'cursor:pointer' : ''"
                :class="
                  rowErrors.includes(`${index}.`) ? 'bg-danger text-white' : ''
                "
              >
                <i
                  v-if="rowErrors.includes(`${index}.`)"
                  class="fa fa-exclamation-triangle"
                  aria-hidden="true"
                ></i>
              </td>
              <td scope="row">
                <input
                  type="date"
                  class="form-control rounded-0 border-0"
                  placeholder="FROM"
                  :class="
                    errors.hasOwnProperty(`${index}.from`) ? 'is-invalid' : ''
                  "
                  v-model="workExperience.from"
                />
                <!-- <p class="text-danger text-sm">
                                    {{ errors[`${index}.from`] }}
                                </p> -->
              </td>
              <td>
                <input
                  type="date"
                  class="form-control rounded-0 border-0"
                  :class="
                    errors.hasOwnProperty(`${index}.to`) ? 'is-invalid' : ''
                  "
                  placeholder="TO"
                  v-model="workExperience.to"
                />
                <!-- <p class="text-danger text-sm">
                                    {{ errors[`${index}.to`] }}
                                </p> -->
              </td>
              <td>
                <input
                  type="text"
                  class="form-control rounded-0 border-0"
                  placeholder="Input"
                  v-model="workExperience.position"
                  :class="
                    errors.hasOwnProperty(`${index}.position`)
                      ? 'is-invalid'
                      : ''
                  "
                  style="text-transform: uppercase"
                />
                <!-- <p class="text-danger text-sm">
                                    {{ errors[`${index}.position`] }}
                                </p> -->
              </td>
              <td>
                <input
                  type="text"
                  class="form-control rounded-0 border-0"
                  placeholder="e.g Tandag"
                  v-model="workExperience.dept"
                  :class="
                    errors.hasOwnProperty(`${index}.dept`) ? 'is-invalid' : ''
                  "
                  style="text-transform: uppercase"
                />
                <!-- <p class="text-danger text-sm">
                                    {{ errors[`${index}.dept`] }}
                                </p> -->
              </td>

              <td>
                <input
                  type="text"
                  class="form-control rounded-0 border-0"
                  style="text-transform: uppercase"
                  placeholder=""
                  :class="
                    errors.hasOwnProperty(`${index}.monSalary`)
                      ? 'is-invalid'
                      : ''
                  "
                  v-model="workExperience.monSalary"
                />
                <!-- <p class="text-danger text-sm">
                                    {{ errors[`${index}.monSalary`] }}
                                </p> -->
              </td>
              <td>
                <input
                  type="text"
                  class="form-control rounded-0 border-0"
                  style="text-transform: uppercase"
                  placeholder=""
                  :class="
                    errors.hasOwnProperty(`${index}.payGrade`)
                      ? 'is-invalid'
                      : ''
                  "
                  v-model="workExperience.payGrade"
                />
                <!-- <p class="text-danger text-sm">
                                    {{ errors[`${index}.payGrade`] }}
                                </p> -->
              </td>
              <td>
                <input
                  type="text"
                  class="form-control rounded-0 border-0"
                  :class="
                    errors.hasOwnProperty(`${index}.statOfApp`)
                      ? 'is-invalid'
                      : ''
                  "
                  placeholder="e.g J.O"
                  v-model="workExperience.statOfApp"
                  style="text-transform: uppercase"
                />
                <!-- <p class="text-danger text-sm">
                                    {{ errors[`${index}.statOfApp`] }}
                                </p> -->
              </td>
              <td>
                <input
                  type="text"
                  class="form-control rounded-0 border-0 text-uppercase"
                  :class="
                    errors.hasOwnProperty(`${index}.govServ`)
                      ? 'is-invalid'
                      : ''
                  "
                  maxlength="1"
                  placeholder=""
                  v-model="workExperience.govServ"
                />
                <!-- <p class="text-danger text-sm">
                                    {{ errors[`${index}.govServ`] }}
                                </p> -->
              </td>
              <td class="jumbotron align-middle">
                <button
                  v-show="index != 0"
                  class="btn btn-danger mt-2 rounded-circle"
                  @click="removeField(index)"
                >
                  <i class="fa fa-times"></i>
                </button>
              </td>
              <td class="align-middle">
                <button
                  v-if="index == noOfFields - 1"
                  class="btn btn-primary font-weight-bold rounded-circle"
                  @click="btnAddNewWorkExperienceField"
                >
                  <i class="fa fa-plus"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="float-right mb-3">
          <button
            class="btn btn-warning shadow"
            @click="skipSection"
            v-if="!isComplete"
          >
            SKIP
          </button>
          <button
            class="btn btn-primary shadow"
            @click="submitWorkExperience"
            :class="
              Object.keys(errors).length != 0 ? 'btn-danger' : 'btn-primary'
            "
            :disabled="isLoading"
            v-if="!isComplete"
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
      </div>
    </div>
  </div>
</template>

<script>
import swal from "sweetalert";
export default {
  props: {
    work_experience: {
      required: true,
    },
  },
  data() {
    return {
      isComplete: false,
      isLoading: false,
      noOfFields: 0,
      employee_id: "",
      workExperience: [
        {
          from: "",
          to: "",
          position: "",
          dept: "",
          monSalary: "",
          payGrade: "",
          statOfApp: "",
          govServ: "",
          employee_id: localStorage.getItem("employee_id"),
        },
      ],
      errors: {},
      rowErrors: "",
    };
  },
  watch: {
    workExperience(from, to) {
      this.noOfFields = to.length;
    },
  },
  methods: {
    isKeyCombinationSave(event) {
      if (
        !this.isComplete &&
        this.work_experience &&
        event.ctrlKey &&
        event.code.toLowerCase() === "keys" &&
        event.keyCode === 83
      ) {
        this.submitWorkExperience();
        event.preventDefault();
        return true;
      }
    },
    btnAddNewWorkExperienceField() {
      this.workExperience.push({
        from: "",
        to: "",
        position: "",
        dept: "",
        monSalary: "",
        payGrade: "",
        statOfApp: "",
        govServ: "",
        employee_id: localStorage.getItem("employee_id"),
      });
    },
    skipSection() {
      this.isComplete = true;
      this.$emit("next_tab");
    },
    submitWorkExperience() {
      this.isLoading = true;
      window.axios
        .post("/employee/personal/work/experience", this.workExperience)
        .then((response) => {
          this.isLoading = false;
          this.isComplete = true;
          this.rowErrors = "";
          this.errors = {};

          localStorage.setItem(
            "work_experience",
            JSON.stringify(response.data)
          );
          this.$emit("next_tab");
        })
        .catch((error) => {
          this.isLoading = false;
          this.errors = {};
          this.rowErrors = "";
          // Check the error status code.
          if (error.response.status === 422) {
            Object.keys(error.response.data.errors).map((field, index) => {
              let [fieldMessage] = error.response.data.errors[field];
              this.errors[field] = fieldMessage;
            });
            /* Merge all errors with join method for easily checking if an index of dynamic row is present or has error.*/
            this.rowErrors = Object.keys(this.errors).join(",");
          }
        });
    },
    removeField(index) {
      if (index != 0) {
        this.workExperience.splice(index, 1);
      }
    },
    displayRowErrorMessage(index) {
      let parentElement = document.createElement("ul");

      for (let [field, error] of Object.entries(this.errors)) {
        if (field.includes(`${index}.`)) {
          let errorElement = document.createElement("p");
          let horizontalLine = document.createElement("hr");
          errorElement.innerHTML = error;
          parentElement.appendChild(errorElement);
          parentElement.appendChild(horizontalLine);
        }
      }

      swal({
        content: parentElement,
        title: "Opps!",
        icon: "error",
        dangerMode: true,
      });
    },
  },
  created() {
    this.noOfFields = this.workExperience.length;
  },
  mounted() {
    if (localStorage.getItem("work_experience")) {
      this.workExperience = JSON.parse(localStorage.getItem("work_experience"));
      this.isComplete = true;
    }
    window.addEventListener("keydown", this.isKeyCombinationSave);
  },
};
</script>

<style></style>
