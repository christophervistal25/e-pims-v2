<template>
  <div>
    <div
      class="modal fade"
      :class="showdesignation ? 'show' : ''"
      id="designationModal"
      tabindex="-1"
      role="dialog"
      :style="showdesignation ? 'padding-right: 15px; display: block;' : ''"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Designation</h5>
            <button
              @click="dismissModal"
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Position name</label>
              <input
                type="text"
                class="form-control"
                v-model="position.name"
                :class="errors.hasOwnProperty('name') ? 'is-invalid' : ''"
              />
              <p class="text-danger" v-if="errors.hasOwnProperty('name')">
                {{ errors.name[0] }}
              </p>
            </div>

            <div class="form-group">
              <label>Salary grade</label>
              <select
                class="form-control"
                v-model="position.salary_grade"
                :class="
                  errors.hasOwnProperty('salary_grade') ? 'is-invalid' : ''
                "
              >
                <option
                  v-for="(salary_grade, index) in 33"
                  :key="index"
                  :value="salary_grade"
                >
                  {{ salary_grade }}
                </option>
              </select>
              <p
                class="text-danger text-sm"
                v-if="errors.hasOwnProperty('salary_grade')"
              >
                {{ errors.salary_grade[0] }}
              </p>
            </div>

            <div class="form-group">
              <label>Position Short name</label>
              <input
                type="text"
                class="form-control"
                v-model="position.short_name"
                :class="errors.hasOwnProperty('short_name') ? 'is-invalid' : ''"
              />
              <p
                class="text-danger text-sm"
                v-if="errors.hasOwnProperty('short_name')"
              >
                {{ errors.short_name[0] }}
              </p>
            </div>
          </div>
          <div class="modal-footer">
            <button
              @click="submitNewDesignation"
              type="button"
              class="btn btn-primary"
            >
              <div
                v-if="isLoading"
                class="spinner-border spinner-border-sm text-white"
                role="status"
              >
                <span class="sr-only">Loading...</span>
              </div>
              Save changes
            </button>
            <button
              @click="dismissModal"
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Close
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
  props: ["showdesignation"],
  data() {
    return {
      isLoading: false,
      position: {
        code: "",
        name: "",
        salary_grade: "",
        short_name: "",
      },
      errors: {},
    };
  },
  methods: {
    submitNewDesignation() {
      this.isLoading = true;
      window.axios
        .post("/api/position/store", this.position)
        .then((response) => {
          if (response.status === 201) {
            this.isLoading = false;
            swal({
              text: "Successfully create new designation",
              icon: "success",
            });
            this.$emit("designation-modal-dismiss");
          }
        })
        .catch((error) => {
          this.isLoading = false;
          this.errors = {};
          if (error.response.status === 422) {
            this.errors = error.response.data;
          }
        });
    },
    dismissModal() {
      this.$emit("designation-modal-dismiss");
    },
  },
};
</script>

<style></style>
