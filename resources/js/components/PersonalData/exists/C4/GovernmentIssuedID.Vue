<template>
  <div>
    <div class="card">
      <div
        class="card-header"
        :data-target="isComplete ? '#government' : ''"
        :data-toggle="isComplete ? 'collapse' : ''"
        :style="isComplete ? 'cursor : pointer;' : ''"
      >
        <h5 class="mb-0 p-2">
          <i v-if="isComplete" class="fa fa-check text-success"></i>
          GOVERNMENT ISSUED ID
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
        :id="isComplete ? 'government' : ''"
      >
        <div class="card-body">
          <table class="table table-bordered">
            <tr class="text-center text-sm" style="background: #eaeaea">
              <td>Government Issued ID</td>
              <td>ID/License/Passport No.</td>
              <td>Date/Place of Issuance</td>
            </tr>

            <tbody>
              <tr>
                <td>
                  <input
                    type="text"
                    class="form-control rounded-0 border-0"
                    placeholder="e.g Philhealth"
                    :class="
                      errors.hasOwnProperty('id_type') ? 'is-invalid' : ''
                    "
                    v-model="governmentId.id_type"
                    style="text-transform: uppercase"
                  />
                </td>
                <td>
                  <input
                    type="text"
                    class="form-control rounded-0 border-0"
                    :class="errors.hasOwnProperty('id_no') ? 'is-invalid' : ''"
                    placeholder="Enter ID Number"
                    v-model="governmentId.id_no"
                  />
                </td>
                <td>
                  <input
                    type="text"
                    class="form-control rounded-0 border-0 text-uppercase"
                    :class="errors.hasOwnProperty('date') ? 'is-invalid' : ''"
                    placeholder=""
                    v-model="governmentId.date"
                  />
                </td>
              </tr>
            </tbody>
          </table>
          <div class="float-right mb-3">
            <button
              class="btn btn-success"
              @click="submitIssuedID"
              :disabled="isLoading"
              :class="
                Object.keys(errors).length === 0 ? 'btn-success' : 'btn-danger'
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
      isComplete: false,
      isLoading: false,
      governmentId: {
        id_type: "",
        id_no: "",
        date: "",
        employee_id: this.personal_data.employee_id,
      },
      errors: {},
    };
  },
  methods: {
    isKeyCombinationSave(event) {
      if (
        event.ctrlKey &&
        event.code.toLowerCase() === "keys" &&
        event.keyCode === 83
      ) {
        this.submitIssuedID();
        event.preventDefault();
        return true;
      }
    },
    submitIssuedID() {
      this.errors = {};
      this.isLoading = true;
      window.axios
        .post("/employee/exists/personal/issued/id", this.governmentId)
        .then((response) => {
          if (response.status === 200) {
            this.errors = {};
            this.isComplete = true;
            this.isLoading = false;
            swal({
              text: "Successfully update personal data sheet",
              icon: "success",
              timer: 2000,
            });
          }
        })
        .catch((error) => {
          this.isLoading = false;
          this.errors = {};
          // Check the error status code.
          if (error.response.status === 422) {
            Object.keys(error.response.data.errors).map((field) => {
              let [fieldMessage] = error.response.data.errors[field];
              this.errors[field] = fieldMessage;
            });
          }
        });
    },
  },
  created() {
    window.addEventListener("keydown", this.isKeyCombinationSave);
    if (!this.personal_data.issued_id) {
      this.personal_data.issued_id = {
        id_type: "",
        id_no: "",
        date: "",
        employee_id: this.personal_data.employee_id,
      };
    }
    this.governmentId = this.personal_data.issued_id;
  },
};
</script>
