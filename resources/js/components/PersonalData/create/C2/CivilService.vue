<template>
  <div>
    <div class="card">
      <div
        class="card-header"
        :data-target="isComplete ? '#civilService' : ''"
        :data-toggle="isComplete ? 'collapse' : ''"
        :style="isComplete ? 'cursor : pointer;' : ''"
      >
        <h5 class="mb-0 p-2">
          <i v-if="isComplete" class="fa fa-check text-success"></i>
          IV. Civil Service Eligibility
          <i
            v-if="isComplete"
            class="text-success float-right fa fa-caret-down"
            aria-hidden="true"
          ></i>
        </h5>
      </div>

      <div
        class="collapse"
        :class="!isComplete ? 'show' : ''"
        :id="isComplete ? 'civilService' : ''"
      >
        <div class="card-body">
          <p>Indicate <strong>N/A </strong>if not applicable</p>
          <table class="table table-bordered">
            <tr class="text-center" style="background: #eaeaea">
              <td rowspan="2" class="align-middle text-sm">
                27. CAREER SERVICE/ RA 1080 (BOARD/ BAR) UNDER SPECIAL LAWS/
                CES/ CSEE BARANGAY ELIGIBILITY / DRIVER'S LICENSE
              </td>
              <td rowspan="2" class="align-middle text-sm">
                RATING
                <span class="text-secondary">(If Applicable)</span>
              </td>
              <td rowspan="2" class="align-middle text-sm">
                DATE OF EXAMINATION / CONFERMENT
              </td>
              <td rowspan="2" class="align-middle text-sm">
                PLACE OF EXAMINATION / CONFERMENT
              </td>
              <td colspan="2" scope="colgroup" class="text-sm">
                LICENSE
                <span class="text-secondary">(If Applicable)</span>
              </td>
              <td rowspan="2" class="pl-4 pr-4" v-if="!isComplete">&nbsp;</td>
            </tr>
            <tr style="background: #eaeaea">
              <td scope="col" class="text-center text-sm">NUMBER</td>
              <td scope="col" class="text-center text-sm">Date of Validity</td>
            </tr>

            <tbody>
              <tr v-for="(civil, index) in civilService" :key="index">
                <td scope="row">
                  <input
                    type="text"
                    class="form-control rounded-0 border-0"
                    placeholder="Input here..."
                    v-model="civil.careerServ"
                    :class="
                      errors.hasOwnProperty(`${index}.careerServ`)
                        ? 'border is-invalid'
                        : ''
                    "
                    style="text-transform: uppercase"
                  />
                </td>
                <td>
                  <input
                    type="number"
                    class="form-control rounded-0 border-0"
                    placeholder="e.g. 91.2%"
                    v-model="civil.rating"
                  />
                </td>
                <td>
                  <input
                    type="date"
                    class="form-control rounded-0 border-0"
                    :class="
                      errors.hasOwnProperty(`${index}.dateOfExam`)
                        ? 'border is-invalid'
                        : ''
                    "
                    placeholder="Input"
                    v-model="civil.dateOfExam"
                  />
                </td>
                <td>
                  <input
                    type="text"
                    class="form-control rounded-0 border-0"
                    placeholder="e.g Tandag"
                    :class="
                      errors.hasOwnProperty(`${index}.placeOfExam`)
                        ? 'border is-invalid'
                        : ''
                    "
                    v-model="civil.placeOfExam"
                    style="text-transform: uppercase"
                  />
                </td>

                <td>
                  <input
                    type="number"
                    class="form-control rounded-0 border-0"
                    v-model="civil.number"
                  />
                </td>
                <td>
                  <input
                    type="date"
                    class="form-control rounded-0 border-0"
                    placeholder="e.g. 2016"
                    v-model="civil.dateOfValid"
                  />
                </td>
                <td class="jumbotron" v-if="!isComplete">
                  <button
                    v-show="index != 0"
                    @click="removeField(index)"
                    class="btn btn-sm btn-danger font-weight-bold mt-1 rounded-circle"
                  >
                    X
                  </button>
                </td>
                <td v-if="!isComplete">
                  <button
                    v-if="index == civilService.length - 1"
                    class="btn btn-primary rounded-circle font-weight-bold"
                    @click="addNewFieldCivilServiceRow"
                  >
                    <i class="fa fa-plus"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="float-right mb-3">
            <button
              class="btn btn-danger font-weight-bold"
              @click="skipSection"
              v-if="!isComplete"
              :disabled="isLoading"
            >
              SKIP
            </button>
            <button
              class="btn btn-primary font-weight-bold"
              @click="submitCivilService"
              :disabled="isLoading || isComplete"
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
  </div>
</template>

<script>
export default {
  data() {
    return {
      isComplete: false,
      isLoading: false,
      civilService: [
        {
          number: "",
          placeOfExam: "",
          dateOfExam: "",
          rating: "",
          careerServ: "",
          number: "",
          dateOfValid: "",
          employee_id: localStorage.getItem("employee_id"),
        },
      ],
      errors: {},
    };
  },
  methods: {
    addNewFieldCivilServiceRow() {
      this.civilService.push({
        number: "",
        placeOfExam: "",
        dateOfExam: "",
        rating: "",
        careerServ: "",
        number: "",
        dateOfValid: "",
        employee_id: localStorage.getItem("employee_id"),
      });
    },
    skipSection() {
      this.isComplete = true;
      this.$emit("display-work-experience");
    },
    submitCivilService() {
      this.isLoading = true;
      window.axios
        .post("/employee/personal/civil/service", this.civilService)
        .then((response) => {
          this.isLoading = false;
          this.isComplete = true;
          this.errors = {};
          this.$emit("display-work-experience");
          localStorage.setItem("civil_service", JSON.stringify(response.data));
        })
        .catch((error) => {
          this.isLoading = false;
          this.errors = {};
          // Check the error status code.
          if (error.response.status === 422) {
            console.log(error.response.data);
            Object.keys(error.response.data.errors).map((field, index) => {
              let [fieldMessage] = error.response.data.errors[field];
              this.errors[field] = fieldMessage;
            });
          }
        });
    },
    removeField(index) {
      if (index != 0) {
        this.civilService.splice(index, 1);
      }
    },
  },
  mounted() {
    if (localStorage.getItem("civil_service")) {
      this.civilService = JSON.parse(localStorage.getItem("civil_service"));

      this.isComplete = true;

      this.$emit("display-work-experience");
    }
  },
};
</script>
