<template>
  <div>
    <div>
      <v-row justify="center" class="mt-1">
        <v-dialog
          persistent
          v-model="dialog"
          max-width="600px"
          :class="showassignment ? 'show' : ''"
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
                ><strong>Add Office Assignment</strong></span
              >
            </v-card-title>
            <v-card-text>
              <v-container>
                <v-row>
                  <v-col cols="12">
                    <p
                      class="text-danger text-sm mb-0"
                      v-if="errors.hasOwnProperty('name')"
                    >
                      {{ errors.name[0] }}
                    </p>
                    <v-text-field
                      label="Office Name"
                      required
                      v-model="office.short_name"
                      :class="
                        errors.hasOwnProperty('short_name') ? 'is-invalid' : ''
                      "
                      class="mt-0"
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12">
                    <p
                      class="text-danger text-sm mb-0"
                      v-if="errors.hasOwnProperty('short_name')"
                    >
                      {{ errors.short_name[0] }}
                    </p>
                    <v-text-field
                      label="Office Short Name"
                      requried
                      v-model="office.short_name"
                      :class="
                        errors.hasOwnProperty('short_name') ? 'is-invalid' : ''
                      "
                      class="mt-0"
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12">
                    <p
                      class="text-danger text-sm mb-0"
                      v-if="errors.hasOwnProperty('address')"
                    >
                      {{ errors.address[0] }}
                    </p>
                    <v-text-field
                      label="Office Address"
                      required
                      v-model="office.address"
                      :class="
                        errors.hasOwnProperty('address') ? 'is-invalid' : ''
                      "
                      class="mt-0"
                    ></v-text-field>
                  </v-col>
                  <v-col cols="12">
                    <p
                      class="text-danger text-sm mb-0"
                      v-if="errors.hasOwnProperty('short_address')"
                    >
                      {{ errors.short_address[0] }}
                    </p>
                    <v-text-field
                      class="mt-0"
                      label="Office Short Address"
                      required
                      v-model="office.short_address"
                      :class="
                        errors.hasOwnProperty('short_address')
                          ? 'is-invalid'
                          : ''
                      "
                    >
                    </v-text-field>
                  </v-col>
                  <v-col cols="12">
                    <label>Office Head</label>
                    <v-select
                      label="Fullname"
                      required
                      @input="onSelectOfficeHead"
                      @search="onSearchEmployee"
                      :value="office.head"
                      :options="offices"
                    >
                      <template slot="no-options"
                        >Type to search office head</template
                      >
                    </v-select>
                    <p
                      class="text-danger text-sm"
                      v-if="errors.hasOwnProperty('head')"
                    >
                      {{ errors.head[0] }}
                    </p></v-col
                  >

                  <v-col cols="12">
                    <label>Position Name</label>
                    <v-select
                      label="position_name"
                      :filterable="false"
                      @input="onSelectPosition"
                      @search="onSearchPosition"
                      :value="office.position_name"
                      :options="positions"
                    >
                      <template slot="no-options"
                        >Type to search position</template
                      >
                    </v-select>
                    <p
                      class="text-danger text-sm"
                      v-if="errors.hasOwnProperty('position_name')"
                    >
                      {{ errors.position_name[0] }}
                    </p>
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
              <v-btn color="blue darken-1" text @click="submitNewOffice">
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
  props: ["showassignment"],
  data() {
    return {
      isLoading: false,
      dialog: false,
      office: {
        name: "",
        short_name: "",
        address: "",
        head: "",
        short_address: "",
        position_name: "",
      },
      offices: [],
      headOfoffice: "",
      positions: [],
      errors: {},
    };
  },

  methods: {
    onSelectOfficeHead(employee) {
      this.office.head = employee.fullname;
    },
    onSelectPosition(position) {
      this.office.position_name = position.position_name;
    },
    onSearchEmployee(search, loading) {
      if (search.length) {
        loading(true);
        this.searchOfficeHead(loading, search, this);
      } else {
        this.offices = [];
      }
    },
    onSearchPosition(search, loading) {
      if (search.length) {
        loading(true);
        this.searchPosition(loading, search, this);
      } else {
        this.positions = [];
      }
    },
    searchOfficeHead: _.debounce((loading, search, vm) => {
      loading(true);
      window.axios.get(`/api/employee/search/${search}`).then((response) => {
        vm.offices = response.data;
        loading(false);
      });
    }, 500),
    searchPosition: _.debounce((loading, search, vm) => {
      loading(true);
      window.axios.get(`/api/position/search/${search}`).then((response) => {
        vm.positions = response.data;
        loading(false);
      });
    }, 500),
    submitNewOffice() {
      this.isLoading = true;
      window.axios
        .post("/api/office/store", this.office)
        .then((response) => {
          if (response.status === 201) {
            this.isLoading = false;
            swal({
              text: "Successfully create new office",
              icon: "success",
            });
            this.$emit("assignment-modal-dismiss");
          }
        })
        .catch((error) => {
          this.isLoading = false;
          if (error.response.status === 422) {
            this.errors = error.response.data;
          }
        });
    },
    dismissModal() {
      this.$emit("assignment-modal-dismiss");
    },
  },
};
</script>
