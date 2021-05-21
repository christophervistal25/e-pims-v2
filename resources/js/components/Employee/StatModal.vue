<template>
  <div>
    <div>
      <v-row justify="center" class="mt-1">
        <v-dialog
          persistent
          v-model="dialog"
          max-width="600px"
          :class="show ? 'show' : ''"
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
                ><strong>Add Employment Status</strong></span
              >
            </v-card-title>
            <v-card-text>
              <v-container>
                <v-row>
                  <v-col cols="12">
                    <p
                      class="text-danger text-sm mb-0"
                      v-if="errors.hasOwnProperty('status_name')"
                    >
                      {{ errors.status_name[0] }}
                    </p>
                    <v-text-field
                      class="mt-0"
                      label="Status Name"
                      required
                      v-model="status.status_name"
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
                @click="dialog = false"
                data-dismiss="Close"
              >
                Close
              </v-btn>
              <v-btn color="blue darken-1" text @click="submitNewStatus">
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
  </div>
</template>
<script>
import swal from "sweetalert";
export default {
  props: ["show"],
  data() {
    return {
      isLoading: false,
      dialog: false,
      status: {
        stat_code: "",
        status_name: "",
      },
      errors: {},
    };
  },

  methods: {
    submitNewStatus() {
      this.isLoading = true;
      window.axios
        .post("/api/employment/status/store", this.status)
        .then((response) => {
          if (response.status === 201) {
            this.isLoading = false;
            swal({
              text: "Successfully create new employment status",
              icon: "success",
            });
            this.status = {};
            this.$emit("status-modal-dismiss", response.data);
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
      this.$emit("status-modal-dismiss");
    },
  },
};
</script>
