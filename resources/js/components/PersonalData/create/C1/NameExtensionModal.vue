<template>
  <div>
    <div>
      <v-form v-model="valid" ref="form">
        <v-row justify="center" class="mt-1">
          <v-dialog
            v-model="dialog"
            persistent
            max-width="600px"
            :class="shownameext ? 'show' : ''"
          >
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                elevation="10"
                color="rgba(255, 155, 68, 1)"
                v-bind="attrs"
                v-on="on"
                fab
                x-small
                style="outline: none"
              >
                <v-icon class="text-white">mdi-plus</v-icon>
              </v-btn>
            </template>
            <v-card>
              <v-card-title>
                <span class="headline"
                  ><strong>Add New Extension Name</strong></span
                >
              </v-card-title>
              <v-card-text>
                <v-container>
                  <v-row>
                    <v-col cols="12">
                      <p class="text-danger text-sm mb-0">
                        {{
                          errors.hasOwnProperty("errors")
                            ? errors.errors.extension[0]
                            : ""
                        }}
                      </p>
                      <v-text-field
                        :rules="[(v) => !!v || 'Extension name is required']"
                        class="mt-0 form-input"
                        label="Extension Name"
                        required
                        v-model="info.extension"
                        :class="
                          errors.hasOwnProperty('errors') &&
                          errors.errors.hasOwnProperty('extension')
                            ? 'is-invalid'
                            : ''
                        "
                      ></v-text-field>
                    </v-col>
                  </v-row>
                </v-container>
              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="dismissModal()">
                  Close
                </v-btn>
                <v-btn
                  color="blue darken-1"
                  text
                  @click="submitNewNameExtension"
                >
                  <div
                    v-if="isLoading"
                    class="spinner-border spinner-border-sm"
                    role="status"
                  >
                    <span class="sr-only">Loading...</span>
                  </div>
                  Save Changes
                </v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>
        </v-row>
      </v-form>
    </div>
  </div>
</template>
<script>
import swal from "sweetalert";
export default {
  props: ["shownameext"],
  data() {
    return {
      valid: false,
      isLoading: false,
      dialog: false,
      info: {
        extension: "",
      },
      errors: {},
    };
  },
  methods: {
    submitNewNameExtension() {
      this.isLoading = true;
      window.axios
        .post("/api/name/extensions/store", this.info)
        .then((response) => {
          if (response.status === 201) {
            this.isLoading = false;
            swal({
              text: "Successfully create new name extension",
              icon: "success",
            });
            this.info = {};
            this.$emit("nameext-modal-dismiss", response.data);
            this.dialog = false;
            this.$refs.form.resetValidation();
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
      this.dialog = false;
      this.errors = {};
      this.$refs.form.resetValidation();
    },
  },
};
</script>
<style scoped>
.form-input >>> .error--text {
  color: red !important;
}
.form-input >>> input {
  caret-color: black !important;
}
</style>


