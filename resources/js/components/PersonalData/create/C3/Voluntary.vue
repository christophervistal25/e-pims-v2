<template>
  <div class="card">
    <div
      class="card-header"
      :data-target="isComplete ? '#voluntary' : ''"
      :data-toggle="isComplete ? 'collapse' : ''"
      :style="isComplete ? 'cursor : pointer;' : ''"
    >
      <h5 class="p-2 mb-0">
        <i v-if="isComplete" class="fa fa-check text-success"></i>
        VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT / PEOPLE /
        VOLUNTARY ORGANIZATION/S
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
      :id="isComplete ? 'voluntary' : ''"
    >
      <div class="card-body">
        <p>Indicate <strong>N/A </strong>if not applicable</p>
        <table class="table table-bordered">
          <tr class="text-center" style="background: #eaeaea">
            <td></td>
            <td rowspan="2" class="align-middle text-sm" scope="colgroup">
              NAME & ADDRESS OF ORGANIZATION (Write in full)
            </td>
            <td colspan="2" class="align-middle text-sm" scope="colgroup">
              INCLUSIVE DATES (mm/dd/yyyy)
            </td>
            <td rowspan="2" class="align-middle text-sm" scope="colgroup">
              NUMBER OF HOURS
            </td>
            <td rowspan="2" class="align-middle text-sm" scope="colgroup">
              POSITION / NATURE OF WORK
            </td>
            <td rowspan="2" class="align-middle text-sm">&nbsp;</td>
          </tr>
          <tr style="background: #eaeaea">
            <td></td>
            <td scope="col" class="text-center text-sm">FROM</td>
            <td scope="col" class="text-center text-sm">TO</td>
          </tr>

          <tbody>
            <tr v-for="(volunOrg, index) in volunOrg" :key="index">
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

              <td>
                <input
                  type="text"
                  class="form-control rounded-0 border-0"
                  :class="
                    errors.hasOwnProperty(`${index}.nameOfOrg`)
                      ? 'is-invalid'
                      : ''
                  "
                  placeholder="NAME"
                  v-model="volunOrg.nameOfOrg"
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
                  v-model="volunOrg.from"
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
                  v-model="volunOrg.to"
                />
              </td>
              <td>
                <input
                  type="number"
                  class="form-control rounded-0 border-0"
                  :class="
                    errors.hasOwnProperty(`${index}.noOfHrs`)
                      ? 'is-invalid'
                      : ''
                  "
                  placeholder="Hours"
                  v-model="volunOrg.noOfHrs"
                />
              </td>
              <td>
                <input
                  type="text"
                  class="form-control rounded-0 border-0"
                  :class="
                    errors.hasOwnProperty(`${index}.position`)
                      ? 'is-invalid'
                      : ''
                  "
                  placeholder="Position"
                  v-model="volunOrg.position"
                  style="text-transform: uppercase"
                />
              </td>
              <td class="text-center jumbotron">
                <button
                  v-show="index != 0"
                  class="btn btn-danger font-weight-bold mt-1 rounded-circle"
                  @click="removeField(index)"
                >
                  <i class="fas fa-times"></i>
                </button>
              </td>
              <td class="text-center">
                <button
                  v-if="index == noOfFields - 1"
                  class="btn btn-primary rounded-circle font-weight-bold"
                  @click="addNewFieldVoluntary"
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
          >
            SKIP
          </button>
          <button
            class="btn btn-primary font-weight-bold"
            @click="submitVoluntary"
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
  data() {
    return {
      isComplete: false,
      isLoading: false,
      noOfFields: 0,
      volunOrg: [
        {
          nameOfOrg: "",
          from: "",
          to: "",
          noOfHrs: "",
          position: "",
          employee_id: localStorage.getItem("employee_id"),
        },
      ],
      errors: {},
      rowErrors: "",
    };
  },
  watch: {
    volunOrg(from, to) {
      this.noOfFields = to.length;
    },
  },
  methods: {
    addNewFieldVoluntary() {
      this.volunOrg.push({
        nameOfOrg: "",
        from: "",
        to: "",
        noOfHrs: "",
        position: "",
        employee_id: localStorage.getItem("employee_id"),
      });
    },
    removeField(index) {
      if (index != 0) {
        this.volunOrg.splice(index, 1);
      }
    },
    skipSection() {
      this.isComplete = true;
      this.$emit("display-learning-and-development");
    },
    submitVoluntary() {
      this.isLoading = true;
      window.axios
        .post("/employee/personal/voluntary", this.volunOrg)
        .then((response) => {
          this.isLoading = false;
          this.isComplete = true;
          this.errors = {};

          localStorage.setItem("voluntary", JSON.stringify(response.data));

          this.$emit("display-learning-and-development");
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
    this.noOfFields = this.volunOrg.length;
  },
  mounted() {
    if (localStorage.getItem("voluntary")) {
      this.volunOrg = JSON.parse(localStorage.getItem("voluntary"));
      this.isComplete = true;
      this.$emit("display-learning-and-development");
    }
  },
};
</script>

<style></style>
