<template>
  <div>
    <div>
      <v-form v-model="valid" ref="form">
        <v-row justify="center" class="mt-1">
          <v-dialog
            persistent
            v-model="dialog"
            max-width="600px"
            :class="showdesignation ? 'show' : ''"
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
                <span class="headline"><strong>Add Position</strong></span>
              </v-card-title>
              <v-card-text>
                <v-container>
                  <v-row>
                    <v-col cols="12">
                      <!-- <p
                        class="text-danger text-sm mb-0"
                        v-if="errors.hasOwnProperty('name')"
                      >
                        {{ errors.name[0] }}
                      </p> -->
                      <v-text-field
                        :rules="nameRules"
                        label="Position Name"
                        required
                        v-model="position.name"
                        :class="
                          errors.hasOwnProperty('name') ? 'is-invalid' : ''
                        "
                        class="pt-0 form-input"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12">
                      <!-- <p
                        class="text-danger text-sm mb-0"
                        v-if="errors.hasOwnProperty('short_name')"
                      >
                        {{ errors.short_name[0] }}
                      </p> -->
                      <v-text-field
                        label="Position Short Name"
                        :rules="nameRules"
                        class="pt-0 form-input"
                        required
                        v-model="position.short_name"
                        :class="
                          errors.hasOwnProperty('short_name')
                            ? 'is-invalid'
                            : ''
                        "
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12">
                      <!-- <p
                        class="text-danger text-sm mb-0"
                        v-if="errors.hasOwnProperty('salary_grade')"
                      >
                        {{ errors.salary_grade[0] }}
                      </p> -->
                      <v-select
                        label="Salary Grade"
                        required
                        :rules="[(v) => !!v || 'Salary grade is required']"
                        v-model="position.salary_grade"
                        :items="salary_grades"
                        class="pt-0 form-input"
                      >
                      </v-select>
                    </v-col>
                  </v-row>
                </v-container>
              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn
                  color="blue darken-1"
                  text
                  @click="dismissModal()"
                  data-dismiss="Close"
                >
                  Close
                </v-btn>
                <v-btn
                  color="blue darken-1"
                  text
                  @click="submitNewDesignation"
                  v-on:click="validate"
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
  props: ["showdesignation"],
  data() {
    return {
      valid: false,
      isLoading: false,
      dialog: false,
      salary_grades: [],
      position: {
        code: "",
        name: "",
        salary_grade: "",
        short_name: "",
      },
      errors: {},
      nameRules: [(v) => !!v || "This field can not be empty"],
      select: null,
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
              text: "Successfully create new position.",
              icon: "success",
            });
            this.position = {};
            this.$emit("designation-modal-dismiss", response.data);
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
    validate() {
      this.$refs.form.validate();
    },
  },
  created() {
    document.addEventListener("keydown", (e) => {
      if (e.keyCode === 27 && e.key.toLowerCase() === "escape") {
        this.dialog = false;
        this.errors = {};
        this.$refs.form.resetValidation();
        this.errors = {};
        this.$refs.form.resetValidation();
      }
    });
  },
  mounted() {
    this.salary_grades = Array.from({ length: 33 }, (_, i) => i + 1);
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
