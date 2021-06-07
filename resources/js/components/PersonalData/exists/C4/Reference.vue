<template>
  <div>
    <div class="card">
      <div
        class="card-header"
        :data-target="isComplete ? '#reference' : ''"
        :data-toggle="isComplete ? 'collapse' : ''"
        :style="isComplete ? 'cursor : pointer;' : ''"
      >
        <h5 class="mb-0 p-2">
          <i v-if="isComplete" class="fa fa-check text-success"></i>
          41. REFERENCES
          <span class="text-danger text-sm"
            >(Person not related by consanguinity or affinity to applicant
            /appointee)</span
          >
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
        :id="isComplete ? 'reference' : ''"
      >
        <div class="card-body">
          <p>Indicate <strong>N/A </strong>if not applicable</p>
          <table class="table table-bordered">
            <tr class="text-center jumbotron text-sm">
              <td></td>
              <td>NAME</td>
              <td>ADDRESS</td>
              <td colspan="2">TEL. NO</td>
            </tr>

            <tbody>
              <tr v-for="(references, index) in references" :key="index">
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
                    :class="
                      rowErrors.includes(`${index}.name`) ? 'is-invalid' : ''
                    "
                    placeholder="NAME"
                    v-model="references.name"
                    style="text-transform: uppercase"
                  />
                </td>
                <td>
                  <input
                    type="text"
                    class="form-control rounded-0 border-0"
                    placeholder="ADDRESS"
                    v-model="references.address"
                    style="text-transform: uppercase"
                  />
                </td>
                <td>
                  <input
                    type="text"
                    class="form-control rounded-0 border-0"
                    placeholder="TEL. NO"
                    v-model="references.telephone_number"
                  />
                </td>

                <td class="jumbotron text-center">
                  <button
                    v-show="index != 0"
                    @click="removeField(index)"
                    class="btn btn-danger font-weight-bold rounded-circle"
                  >
                    <i class="fa fa-times"></i>
                  </button>
                </td>
                <td class="text-center">
                  <button
                    v-if="index == noOfFields - 1"
                    class="btn btn-primary font-weight-bold rounded-circle"
                    @click="addNewReferenceField"
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
              @click="submitReferences"
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
  </div>
</template>

<script>
import swal from "sweetalert";
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
      noOfFields: 0,
      references: [
        {
          name: "",
          address: "",
          telephone_number: "",
          employee_id: this.personal_data.employee_id,
        },
      ],
      errors: [],
      rowErrors: "",
    };
  },
  watch: {
    references(from, to) {
      this.noOfFields = to.length;
    },
  },
  methods: {
    isKeyCombinationSave() {
      if (
        !this.isComplete &&
        event.ctrlKey &&
        event.code.toLowerCase() === "keys" &&
        event.keyCode === 83
      ) {
        this.submitReferences();
        event.preventDefault();
        return true;
      }
    },
    addNewReferenceField() {
      this.references.push({
        name: "",
        address: "",
        telephone_number: "",
        employee_id: this.personal_data.employee_id,
      });
    },
    removeField(index) {
      if (index != 0) {
        this.references.splice(index, 1);
      }
    },
    submitReferences() {
      this.isLoading = true;
      window.axios
        .post("/employee/exists/personal/references", this.references)
        .then((response) => {
          this.isLoading = false;
          this.isComplete = true;
          this.$emit("display-issued-id");
        })
        .catch((error) => {
          this.isLoading = false;
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
    skipSection() {
      this.isComplete = true;
      this.$emit("display-issued-id");
    },
  },
  created() {
    window.addEventListener("keydown", this.isKeyCombinationSave);
    this.references = this.personal_data.references;
    if (this.references.length === 0) {
      this.addNewReferenceField();
    }
    this.noOfFields = this.references.length;
  },
};
</script>

<style></style>
