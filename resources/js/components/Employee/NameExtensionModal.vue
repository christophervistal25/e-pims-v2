<template>
  <div>
    <div
      class="modal fade"
      :class="shownameextension ? 'show' : ''"
      id="nameextensionModal"
      tabindex="-1"
      role="dialog"
      :style="shownameextension ? 'padding-right: 15px; display: block;' : ''"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Name Extension</h5>
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
              <label>Name Extension</label>
              <input
                type="text"
                class="form-control"
                v-model="data.extension"
                :class="
                  errors.hasOwnProperty('errors') &&
                  errors.errors.hasOwnProperty('extension')
                    ? 'is-invalid'
                    : ''
                "
              />
              <p class="text-danger text-sm">
                {{
                  errors.hasOwnProperty("errors")
                    ? errors.errors.extension[0]
                    : ""
                }}
              </p>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-primary"
              @click="submitNewNameExt"
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
  props: ["shownameextension"],
  data() {
    return {
      isLoading: false,
      data: {
        extension: "",
      },
      errors: {},
    };
  },
  methods: {
    submitNewNameExt() {
      this.isLoading = true;
      window.axios
        .post("/api/name/extensions/store", this.data)
        .then((response) => {
          if (response.status === 201) {
            this.isLoading = false;
            swal({
              text: "Successfully create new name extension",
              icon: "success",
            });
            this.$emit("nameext-modal-dismiss", response.data);
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
      this.$emit("nameext-modal-dismiss");
    },
  },
};
</script>
