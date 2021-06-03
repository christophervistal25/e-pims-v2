<template>
  <div>
    <v-form v-model="valid" ref="form">
      <div data-app>
        <v-row justify="center" class="mt-1">
          <v-dialog
            persistent
            v-model="dialog"
            max-width="600px"
            :class="shownameextension ? 'show' : ''"
          >
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                color="secondary"
                elevation="10"
                dark
                v-bind="attrs"
                v-on="on"
                fab
                x-small
              >
                <v-icon>mdi-plus</v-icon>
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
                        class="mt-0"
                        label="Extension Name"
                        :rules="[(v) => !!v || 'Extension name is required']"
                        required
                        v-model="data.extension"
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
                <v-btn
                  color="blue darken-1"
                  text
                  v-on:click="dismissModal()"
                  data-dismiss="Close"
                >
                  Close
                </v-btn>
                <v-btn color="blue darken-1" text @click="submitNewNameExt">
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
      </div>
    </v-form>
  </div>
</template>
<script>
import swal from "sweetalert";
export default {
  props: ["shownameextension"],
  data() {
    return {
      valid: false,
      isLoading: false,
      dialog: false,
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
              text: "Successfully create new name extensions",
              icon: "success",
            });
            this.data = {};
            this.$emit("nameext-modal-dismiss", response.data);
            this.dialog = false;
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
      this.errors = {};
      this.$refs.form.resetValidation();
      this.dialog = false;
    },
  },
};
</script>
