<template>
  <div
    @mouseenter="isParentContainerFocus = true"
    @mouseleave="isParentContainerFocus = false"
  >
    <div class="card">
      <div
        class="card-header"
        :data-target="isComplete ? '#otherInformation' : ''"
        :data-toggle="isComplete ? 'collapse' : ''"
        :style="isComplete ? 'cursor : pointer;' : ''"
      >
        <h5 class="mb-0 p-2">
          <i v-if="isComplete" class="fa fa-check text-success"></i>
          VIII. OTHER INFORMATION
          <i
            v-if="isComplete"
            class="text-success float-right fa fa-caret-down"
            aria-hidden="true"
          ></i>
        </h5>
      </div>

      <div
        class="collapse show"
        :class="!isComplete && show_panel ? 'show' : ''"
        id="otherInformation"
      >
        <div class="card-body">
          <p>Indicate <strong>N/A </strong>if not applicable</p>
          <table class="table table-bordered">
            <tr class="text-center" style="background: #eaeaea">
              <td>&nbsp;</td>
              <td rowspan="2" class="align-middle text-sm" scope="colgroup">
                31. SPECIAL SKILLS and HOBBIES
              </td>
              <td rowspan="2" class="align-middle text-sm" scope="colgroup">
                32. NON-ACADEMIC DISTINCTIONS / RECOGNITION (Write in full)
              </td>
              <td rowspan="2" class="align-middle text-sm" scope="colgroup">
                33. MEMBERSHIP IN ASSOCIATION/ORGANIZATION (Write in full)
              </td>
              <td rowspan="2" class="align-middle">
                <button
                  v-if="otherInformation.length === 0"
                  class="btn btn-primary font-weight-bold rounded-circle"
                  @click="addNewOtherInformationField"
                >
                  <i class="fa fa-plus"></i>
                </button>
              </td>
            </tr>

            <tbody>
              <tr v-for="(otherInfo, index) in otherInformation" :key="index">
                <td
                  v-if="rowErrors.includes(`${index}.`)"
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
                  <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                </td>
                <td v-else class="text-center align-middle">{{ index + 1 }}</td>
                <td>
                  <input
                    type="text"
                    class="form-control rounded-0 border-0 text-uppercase"
                    :class="
                      rowErrors.includes(`${index}.special_skill`)
                        ? 'is-invalid'
                        : ''
                    "
                    placeholder="Enter special skill"
                    v-model="otherInfo.special_skill"
                  />
                </td>
                <td>
                  <input
                    type="text"
                    class="form-control rounded-0 border-0 text-uppercase"
                    :class="
                      rowErrors.includes(`${index}.non_academic`)
                        ? 'is-invalid'
                        : ''
                    "
                    placeholder="Enter non-academic"
                    v-model="otherInfo.non_academic"
                  />
                </td>
                <td>
                  <input
                    type="text"
                    class="form-control rounded-0 border-0 text-uppercase"
                    :class="
                      rowErrors.includes(`${index}.organization`)
                        ? 'is-invalid'
                        : ''
                    "
                    placeholder="Enter organization"
                    v-model="otherInfo.organization"
                  />
                </td>
                <td class="jumbotron text-center">
                  <button
                    class="btn btn-danger font-weight-bold mt-2 rounded-circle"
                    @click="removeField(index)"
                  >
                    <i class="fa fa-times"></i>
                  </button>
                </td>
                <td class="text-center align-middle">
                  <button
                    v-if="index == noOfFields - 1"
                    class="btn btn-primary font-weight-bold rounded-circle"
                    @click="addNewOtherInformationField"
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
              @click="submitOtherInformation"
              :class="
                Object.keys(errors).length === 0 ? 'btn-success' : 'btn-danger'
              "
              :disabled="isLoading"
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
      isParentContainerFocus: false,
      isLoading: false,
      isComplete: false,
      noOfFields: 0,
      otherInformation: [
        {
          special_skill: "",
          non_academic: "",
          organization: "",
        },
      ],
      rowErrors: "",
      errors: [],
    };
  },
  watch: {
    otherInformation(to) {
      this.noOfFields = to.length;
    },
  },
  methods: {
    isKeyCombinationSave(event) {
      if (
        this.isParentContainerFocus &&
        event.ctrlKey &&
        event.code.toLowerCase() === "keys" &&
        event.keyCode === 83
      ) {
        this.submitOtherInformation();
        event.preventDefault();
        return true;
      }
    },
    addNewOtherInformationField() {
      this.otherInformation.push({
        special_skill: "",
        non_academic: "",
        organization: "",
      });
    },
    skipSection() {
      this.isComplete = true;
      this.$emit("next_tab");
    },
    submitOtherInformation() {
      this.errors = {};
      this.rowErrors = "";
      this.isLoading = true;
      window.axios
        .post(
          `/employee/exists/personal/${this.personal_data.employee_id}/other/information`,
          this.otherInformation
        )
        .then(() => {
          this.isComplete = true;
          this.isLoading = false;
          this.$emit("next_tab");
        })
        .catch((error) => {
          this.isLoading = false;
          // Check the error status code.
          if (error.response.status === 422) {
            Object.keys(error.response.data.errors).map((field) => {
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
    removeField(index) {
      this.otherInformation.splice(index, 1);
    },
  },
  created() {
    window.addEventListener("keydown", this.isKeyCombinationSave);
    this.otherInformation = this.personal_data.other_information;
    this.noOfFields = this.otherInformation.length;
  },
};
</script>

<style></style>
