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

    <div class="collapse show" id="voluntary">
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
            <td rowspan="2" class="align-middle text-sm">
              <button
                class="btn btn-primary rounded-circle"
                v-if="volunOrg.length === 0"
                @click="addNewFieldVoluntary"
              >
                <i class="fa fa-plus"></i>
              </button>
            </td>
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
                  class="form-control rounded-0 border-0 uppercase"
                  :class="
                    rowErrors.includes(`${index}.name_and_address`)
                      ? 'is-invalid'
                      : ''
                  "
                  placeholder="NAME"
                  v-model="volunOrg.name_and_address"
                />
              </td>
              <td>
                <input
                  type="date"
                  class="form-control rounded-0 border-0"
                  :class="
                    rowErrors.includes(`${index}.inclusive_date_from`)
                      ? 'is-invalid'
                      : ''
                  "
                  placeholder="FROM"
                  v-model="volunOrg.inclusive_date_from"
                />
              </td>
              <td>
                <input
                  type="date"
                  class="form-control rounded-0 border-0"
                  :class="
                    rowErrors.includes(`${index}.inclusive_date_to`)
                      ? 'is-invalid'
                      : ''
                  "
                  placeholder="TO"
                  v-model="volunOrg.inclusive_date_to"
                />
              </td>
              <td>
                <input
                  type="number"
                  class="form-control rounded-0 border-0"
                  :class="
                    rowErrors.includes(`${index}.no_of_hours`)
                      ? 'is-invalid'
                      : ''
                  "
                  placeholder="Hours"
                  v-model="volunOrg.no_of_hours"
                />
              </td>
              <td>
                <input
                  type="text"
                  class="form-control rounded-0 border-0 text-uppercase"
                  :class="
                    rowErrors.includes(`${index}.position`) ? 'is-invalid' : ''
                  "
                  placeholder="Position"
                  v-model="volunOrg.position"
                />
              </td>
              <td class="text-center jumbotron">
                <button
                  class="btn btn-danger font-weight-bold rounded-circle"
                  @click="removeField(index)"
                >
                  <i class="fa fa-times"></i>
                </button>
              </td>
              <td class="text-center">
                <button
                  v-if="index == noOfFields - 1"
                  class="btn btn-primary rounded-circle font-weight-bold mt-2"
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
            class="btn btn-success shadow"
            @click="submitVoluntary"
            :disabled="isLoading"
            :class="
              Object.keys(errors).length != 0 ? 'btn-danger' : 'btn-success'
            "
          >
            <i class="la la-check" v-if="isComplete"></i>
            <i class="la la-pencil" v-else></i>

            <span v-if="isComplete">UPDATED</span>
            <span v-else>UPDATE</span>
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
    personal_data: {
      requried: true,
    },
  },
  data() {
    return {
      isComplete: false,
      isLoading: false,
      noOfFields: 0,
      volunOrg: [
        {
          name_and_address: "",
          inclusive_date_from: "",
          inclusive_date_to: "",
          no_of_hours: "",
          position: "",
          employee_id: this.personal_data.employee_id,
        },
      ],
      errors: {},
      rowErrors: "",
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
        this.submitVoluntary();
        event.preventDefault();
        return true;
      }
    },
    addNewFieldVoluntary() {
      this.volunOrg.push({
        name_and_address: "",
        inclusive_date_from: "",
        inclusive_date_to: "",
        no_of_hours: "",
        position: "",
        employee_id: this.personal_data.employee_id,
      });
    },
    removeField(index) {
      this.volunOrg.splice(index, 1);
    },
    submitVoluntary() {
      this.errors = {};
      this.rowErrors = "";
      this.isLoading = true;
      window.axios
        .post("/employee/exists/personal/personal/voluntary", this.volunOrg)
        .then((response) => {
          this.isLoading = false;
          this.isComplete = true;
          this.errors = {};
          this.rowErrors = "";

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
    window.addEventListener("keydown", this.isKeyCombinationSave);
    this.volunOrg = this.personal_data.voluntary_work;
    // Base default avlues
    if (this.volunOrg.length === 0) {
      this.addNewFieldVoluntary();
    }
    this.noOfFields = this.volunOrg.length;
  },
};
</script>

<style></style>
