<template>
  <div>
    <div class="card">
      <div
        class="card-header"
        :data-target="isComplete ? '#learning' : ''"
        :data-toggle="isComplete ? 'collapse' : ''"
        :style="isComplete ? 'cursor : pointer;' : ''"
      >
        <h5 class="mb-0 p-2">
          <i v-if="isComplete" class="fa fa-check text-success"></i>
          VII. LEARNING AND DEVELOPMENT (L&D) INTERVENTIONS/TRAINING PROGRAMS
          ATTENDED
          <i
            v-if="isComplete"
            class="text-success float-right fa fa-caret-down"
            aria-hidden="true"
          ></i>
        </h5>
      </div>

      <div
        class="collapse"
        :class="!isComplete && show_panel ? 'show' : ''"
        :id="isComplete ? 'learning' : ''"
      >
        <div class="card-body">
          <div
            class="alert alert-info text-center"
            style="text-transform: uppercase"
          >
            <strong
              >(Start from the most recent L&D/training program and include only
              the relevant L&D/training taken for the last five (5) years for
              Division Chief/Executive/Managerial positions)</strong
            >
          </div>
          <p>Indicate <strong>N/A </strong>if not applicable</p>
          <table class="table table-bordered">
            <tr class="text-center text-sm" style="background: #eaeaea">
              <td></td>
              <td rowspan="2" class="align-middle text-sm" scope="colgroup">
                TITLE OF LEARNING AND DEVELOPMENT INTERVENTIONS/TRAINING
                PROGRAMS (Write in full)
              </td>
              <td colspan="2" class="align-middle text-sm" scope="colgroup">
                INCLUSIVE DATES OF ATTENDANCE (mm/dd/yyyy)
              </td>
              <td rowspan="2" class="align-middle text-sm" scope="colgroup">
                NUMBES OF HOURS
              </td>
              <td rowspan="2" class="align-middle text-sm" scope="colgroup">
                Type of LD(Managerial/ Supervisory/Technical/etc)
              </td>
              <td rowspan="2" class="align-middle text-sm" scope="colgroup">
                CONDUCTED/ SPONSORED (Write in full)
              </td>
              <td rowspan="2" class="align-middle">&nbsp;</td>
            </tr>
            <tr style="background: #eaeaea">
              <td></td>
              <td scope="col" class="text-center text-sm">FROM</td>
              <td scope="col" class="text-center text-sm">TO</td>
            </tr>

            <tbody>
              <tr v-for="(learnDev, index) in learnDev" :key="index">
                <td
                  @click="
                    rowErrors.includes(`${index}.`) &&
                      displayRowErrorMessage(index)
                  "
                  class="align-middle text-center"
                  :style="
                    rowErrors.includes(`${index}.`) ? 'cursor:pointer' : ''
                  "
                  :class="
                    rowErrors.includes(`${index}.`)
                      ? 'bg-danger text-white'
                      : ''
                  "
                >
                  <i
                    v-if="rowErrors.includes(`${index}.`)"
                    class="fa fa-exclamation-triangle"
                    aria-hidden="true"
                  ></i>
                </td>
                <td>
                  <input
                    type="text"
                    class="form-control rounded-0 border-0"
                    placeholder="NAME"
                    v-model="learnDev.nameOfTraining"
                    :class="
                      errors.hasOwnProperty(`${index}.nameOfTraining`)
                        ? 'is-invalid'
                        : ''
                    "
                    style="text-transform: uppercase"
                  />
                </td>
                <td>
                  <input
                    type="date"
                    class="form-control rounded-0 border-0"
                    :class="
                      errors.hasOwnProperty(`${index}.from`) ? 'is-invalid' : ''
                    "
                    placeholder="FROM"
                    v-model="learnDev.from"
                  />
                </td>
                <td>
                  <input
                    type="date"
                    class="form-control rounded-0 border-0"
                    :class="
                      errors.hasOwnProperty(`${index}.to`) ? 'is-invalid' : ''
                    "
                    placeholder="TO"
                    v-model="learnDev.to"
                  />
                </td>
                <td>
                  <input
                    type="number"
                    class="form-control rounded-0 border-0"
                    :class="
                      errors.hasOwnProperty(`${index}.noOfHours`)
                        ? 'is-invalid'
                        : ''
                    "
                    placeholder="Hours"
                    v-model="learnDev.noOfHours"
                  />
                </td>
                <td>
                  <input
                    type="text"
                    class="form-control rounded-0 border-0"
                    :class="
                      errors.hasOwnProperty(`${index}.typeOfLD`)
                        ? 'is-invalid'
                        : ''
                    "
                    placeholder=""
                    v-model="learnDev.typeOfLD"
                    style="text-transform: uppercase"
                  />
                </td>
                <td>
                  <input
                    type="text"
                    class="form-control rounded-0 border-0"
                    :class="
                      errors.hasOwnProperty(`${index}.conducted`)
                        ? 'is-invalid'
                        : ''
                    "
                    placeholder=""
                    v-model="learnDev.conducted"
                    style="text-transform: uppercase"
                  />
                </td>
                <td class="jumbotron">
                  <button
                    v-show="index != 0"
                    @click="removeField(index)"
                    class="btn btn-danger font-weight-bold mt-2 rounded-circle"
                  >
                    <i class="fa fa-times"></i>
                  </button>
                </td>
                <td>
                  <button
                    v-if="index == noOfFields - 1"
                    class="btn btn-primary rounded-circle font-weight-bold"
                    @click="addNewLearningAndDevelopmentField"
                  >
                    <i class="fa fa-plus"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="float-right mb-3">
            <button
              class="btn btn-secondary text-white shadow font-weight-bold"
              @click="skipSection"
              v-if="!isComplete"
            >
              <i class="fa fa-forward"></i>
              SKIP
            </button>
            <button
              class="btn btn-primary shadow font-weight-bold"
              :class="
                Object.keys(errors).length != 0 ? 'btn-danger' : 'btn-primary'
              "
              @click="submitLearningAndDevelopment"
              :disabled="isLoading"
              v-if="!isComplete"
            >
              NEXT
              <i class="fa fa-hand-o-right font-weight-bold"></i>
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
  </div>
</template>

<script>
export default {
  props: {
    show_panel: {
      required: true,
    },
  },
  data() {
    return {
      isLoading: false,
      isComplete: false,
      noOfFields: 0,
      learnDev: [
        {
          nameOfTraining: "",
          from: "",
          to: "",
          noOfHours: "",
          typeOfLD: "",
          conducted: "",
          employee_id: localStorage.getItem("employee_id"),
        },
      ],
      errors: {},
      rowErrors: "",
    };
  },
  watch: {
    learnDev(to) {
      this.noOfFields = to.length;
    },
  },
  methods: {
    isKeyCombinationSave(event) {
      if (
        !this.isComplete &&
        this.show_panel &&
        event.ctrlKey &&
        event.code.toLowerCase() === "keys" &&
        event.keyCode === 83
      ) {
        this.submitLearningAndDevelopment();
        event.preventDefault();
        return true;
      }
    },
    addNewLearningAndDevelopmentField() {
      this.learnDev.push({
        nameOfTraining: "",
        from: "",
        to: "",
        noOfHours: "",
        typeOfLD: "",
        conducted: "",
        employee_id: localStorage.getItem("employee_id"),
      });
    },
    removeField(index) {
      if (index !== 0) {
        this.learnDev.splice(index, 1);
      }
    },
    skipSection() {
      this.isComplete = true;
      this.$emit("display-other-information");
    },
    submitLearningAndDevelopment() {
      this.isLoading = true;
      window.axios
        .post("/employee/personal/learning", this.learnDev)
        .then((response) => {
          this.isLoading = false;
          this.isComplete = true;
          this.errors = {};

          localStorage.setItem("learning", JSON.stringify(response.data));
          this.$emit("display-other-information");
        })
        .catch((error) => {
          this.isLoading = false;
          this.errors = {};
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
    this.noOfFields = this.learnDev.length;
    if (localStorage.getItem("learning")) {
      this.learnDev = JSON.parse(localStorage.getItem("learning"));
      this.isComplete = true;
      this.$emit("display-other-information");
    }
    window.addEventListener("keydown", this.isKeyCombinationSave);
  },
};
</script>

<style></style>
