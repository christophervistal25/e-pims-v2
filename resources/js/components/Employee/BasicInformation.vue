<template>
  <div>
    <div class="row">
      <div class="col-lg-7 ml-4">
        <label for="lastname" class="form-group has-float-label">
          <input
            type="text"
            name="lastname"
            id="lastname"
            style="outline: none; box-shadow: 0px 0px 0px transparent"
            class="form-control text-uppercase"
            v-model="employee.lastName"
            :class="errors.hasOwnProperty('lastName') ? 'is-invalid' : ''"
          />
          <span
            ><strong>LAST NAME<span class="text-danger">*</span></strong></span
          >
          <p class="text-danger text-sm">{{ errors.lastName }}</p>
        </label>
        <label for="firstname" class="form-group has-float-label">
          <input
            type="text"
            id="firstname"
            class="form-control text-uppercase"
            style="outline: none; box-shadow: 0px 0px 0px transparent"
            v-model="employee.firstName"
            :class="errors.hasOwnProperty('firstName') ? 'is-invalid' : ''"
          />
          <span
            ><strong>FIRST NAME<span class="text-danger">*</span></strong></span
          >
          <p class="text-danger text-sm">
            {{ errors.firstName }}
          </p>
        </label>
        <label for="middlename" class="form-group has-float-label">
          <input
            type="text"
            id="middlename"
            v-model="employee.middleName"
            :class="errors.hasOwnProperty('middleName') ? 'is-invalid' : ''"
            class="form-control text-uppercase"
            style="outline: none; box-shadow: 0px 0px 0px transparent"
          />
          <span><strong>MIDDLE NAME</strong></span>
          <p class="text-danger text-sm">
            {{ errors.middleName }}
          </p>
        </label>
        <div class="row">
          <div class="col-lg-10">
            <label for="name_extension" class="form-group has-float-label">
              <select
                type="text"
                name="name_extension"
                id="name_extension"
                v-model="employee.extension"
                class="form-control text-uppercase"
                :class="errors.hasOwnProperty('extension') ? 'is-invalid' : ''"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              >
                <option value="" readonly selected>
                  Please select name extension
                </option>
                <option
                  v-for="(extension, index) in nameExtensions"
                  :key="index"
                  :selected="employee.extension === 'JR'"
                  :value="extension"
                >
                  {{ extension }}
                </option>
              </select>
              <p class="text-danger text-sm">
                {{ errors.extension }}
              </p>
            </label>
          </div>
          <div class="col-lg-1">
            <nameextmodal
              @nameext-modal-dismiss="closeNameExtensionModal"
            ></nameextmodal>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <label for="dateOfBirth" class="form-group has-float-label">
              <input
                type="date"
                id="dateOfBirth"
                @change="calculateAge"
                v-model="employee.dateOfBirth"
                :class="
                  errors.hasOwnProperty('dateOfBirth') ? 'is-invalid' : ''
                "
                class="form-control"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <p class="text-danger text-sm">
                {{ errors.dateOfBirth }}
              </p>
              <span
                ><strong
                  >DATE OF BIRTH<span class="text-danger">*</span></strong
                >
                (date/month/year)</span
              >
            </label>
          </div>
          <div class="col-lg-6">
            <input
              type="text"
              id="dateOfBirth"
              v-model="employee.age"
              style="outline: none; box-shadow: 0px 0px 0px transparent"
              readonly="true"
              class="form-control"
            />
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <label
              for="officeAssignment"
              v-if="employee.employee_id"
              class="form-group has-float-label"
            >
              <input
                type="number"
                id="officeAssignment"
                class="form-control text-uppercase"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
                v-if="employee.employee_id"
                v-model="employee.step"
                readonly
              />
              <span><strong>STEP</strong></span>
            </label>
          </div>
          <div class="col-lg-4">
            <label
              for="basicRate"
              v-if="employee.employee_id"
              class="form-group has-float-label"
            >
              <input
                type="number"
                class="form-control"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
                readonly
                v-model="employee.basicRate"
                v-if="employee.employee_id"
              />
              <span><strong>BASIC RATE</strong></span>
            </label>
          </div>
          <div class="col-lg-4">
            <label
              for="employeeID"
              class="form-group has-float-label"
              v-if="employee.employee_id"
            >
              <input
                type="text"
                id="employeeID"
                class="form-control"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
                v-if="employee.employee_id"
                readonly
                v-model="employee.employee_id"
              />
              <span><strong>EMP ID</strong></span>
            </label>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-3 mt-4 text-center">
        <img
          class="
            w-50
            shadow-sm
            rounded
            border
            mr-auto
            ml-auto
            img-fluid img-thumbnail
          "
          id="employee-image"
          loading="lazy"
          :src="`/storage/employee_images/${employee.image}`"
        />

        <div class="text-center mt-2">
          <div class="button-wrapper btn btn-info">
            <span class="label"> Attach Photo </span>

            <input
              type="file"
              name="upload"
              id="upload"
              class="upload-box"
              @change="onUpload"
              placeholder="Attach Photo"
            />
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-9 ml-4">
        <label for="officeAssignment" class="form-group has-float-label">
          <v2-select
            label="status_name"
            @input="onSetSelectStatus"
            :value="
              employee.employmentStatus
                ? employee.employmentStatus.status_name
                : ''
            "
            :options="employmentStatus"
          ></v2-select>
          <p class="text-danger text-sm">
            {{
              errors["employmentStatus.stat_code"] || errors["employmentStatus"]
            }}
          </p>
          <span
            ><strong
              >EMPLOYMENT STATUS<span class="text-danger">*</span></strong
            ></span
          >
        </label>
      </div>

      <div class="col-lg-1">
        <statmodal @status-modal-dismiss="closeStatusModal"></statmodal>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-9 ml-4">
        <label for="designation" class="form-group has-float-label">
          <v2-select
            label="position_name"
            :filterable="false"
            :value="
              employee.designation ? employee.designation.position_name : ''
            "
            @input="onSetSelectPosition"
            :options="designations"
            @search="onSearchDesignation"
          >
            <template slot="no-options">
              Type atleast 1 word of designation to search.
            </template>
          </v2-select>
          <p class="text-danger text-sm">
            {{ errors["designation.position_code"] }}
          </p>
          <span
            ><strong>POSITION<span class="text-danger">*</span></strong></span
          >
        </label>
      </div>

      <div class="col-lg-1">
        <positionmodal
          @designation-modal-dismiss="closeDesignationModal"
        ></positionmodal>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-9 ml-4">
        <label for="officeAssignment" class="form-group has-float-label">
          <v2-select
            label="office_name"
            :filterable="false"
            :value="employee.officeAssignment.office_name"
            @input="onSetSelectOffice"
            :options="offices"
            @search="onSearchOffice"
          >
            <template slot="no-options">
              Type atleast 1 word of office to search.
            </template>
          </v2-select>
          <p class="text-danger text-sm">
            {{ errors["officeAssignment.office_code"] }}
          </p>
          <span
            ><strong
              >OFFICE ASSIGNMENT<span class="text-danger">*</span></strong
            ></span
          >
        </label>
      </div>

      <div class="col-lg-1">
        <assignmodal
          @assignment-modal-dismiss="closeAssignmentModal"
        ></assignmodal>
      </div>
    </div>
  </div>
</template>
<script>
import NameExtModal from "./NameExtModal.vue";
import StatModal from "./StatModal.vue";
import PositionModal from "./PositionModal.vue";

import "vue-select/dist/vue-select.css";
import _ from "lodash";
export default {
  props: ["employee", "errors", "employmentStatus", "nameExtensions"],
  data() {
    return {
      isShow: false,
      isShowDesignation: false,
      isShowAssignment: false,
      isShowNameExtension: false,
      designations: [],
      offices: [],
    };
  },
  components: {
    NameExtModal,
    StatModal,
    PositionModal,
  },
  watch: {
    dateOfBirth: function (to, from) {
      console.log(to, from);
    },
  },
  methods: {
    onSearchOffice(search, loading) {
      if (search.length) {
        loading(true);
        this.searchOffice(loading, search, this);
      } else {
        this.offices = [];
      }
    },
    onSearchDesignation(search, loading) {
      if (search.length) {
        loading(true);
        this.searchDesignation(loading, search, this);
      } else {
        this.designations = [];
      }
    },
    searchOffice: _.debounce((loading, search, vm) => {
      loading(true);
      window.axios.get(`/api/office/search/${search}`).then((response) => {
        vm.offices = response.data;
        loading(false);
      });
    }, 500),
    searchDesignation: _.debounce((loading, search, vm) => {
      loading(true);
      window.axios.get(`/api/position/search/${search}`).then((response) => {
        vm.designations = response.data;
        loading(false);
      });
    }, 500),
    onSetSelectStatus(status) {
      this.employee.employmentStatus = status;
    },
    onSetSelectPosition(position) {
      this.employee.designation = position;
    },
    onSetSelectOffice(office) {
      this.employee.officeAssignment = office;
    },
    onUpload(event) {
      document
        .querySelector("#employee-image")
        .setAttribute("src", URL.createObjectURL(event.target.files[0]));

      // Upload the image.
      let bodyFormData = new FormData();

      bodyFormData.append("image", event.target.files[0]);
      bodyFormData.append("employee_id", this.employee.employee_id);

      window
        .axios({
          method: "POST",
          url: "/api/employee/image/upload",
          data: bodyFormData,
          headers: { "Content-Type": "multipart/form-data" },
        })
        .then((response) => {
          this.employee.image = response.data;
        })
        .catch((response) => {
          console.log(response);
        });
    },
    calculateAge() {
      let dateYear = new Date().getFullYear();
      let age = dateYear - new Date(this.employee.dateOfBirth).getFullYear();
      if (age >= 18 && age <= 100) {
        this.employee.age = age > 0 ? age : "";
      } else {
        this.employee.age = "";
      }
    },
    openStatusModal() {
      this.isShow = true;
    },
    closeStatusModal(status) {
      if (status) {
        this.employmentStatus.unshift(status);
      }
      this.isShow = false;
    },
    openDestinationModal() {
      this.isShowDesignation = true;
    },
    closeDesignationModal(designation) {
      if (designation) {
        this.designations.unshift(designation);
      }
      this.isShowDesignation = false;
    },
    openAssignmentModal() {
      this.isShowAssignment = true;
    },
    closeAssignmentModal(assignment) {
      if (assignment) {
        this.offices.unshift(assignment);
      }
    },
    openNameExtensionModal() {
      this.isShowNameExtension = true;
    },
    closeNameExtensionModal(newExtension) {
      if (newExtension) {
        // Push the new data in select option
        this.nameExtensions.push(newExtension.extension);
      }

      this.isShowNameExtension = false;
    },
  },
};
</script>

<style scoped>
.button-wrapper {
  position: relative;
}

.button-wrapper span.label {
  position: relative;
  z-index: 0;
  display: inline-block;
  cursor: pointer;
  color: #fff;
  text-transform: uppercase;
}

#upload {
  display: inline-block;
  position: absolute;
  z-index: 1;
  top: 0;
  left: 0;
  opacity: 0;
}
</style>
