<template>
  <div>
    <div class="row">
      <div class="col-lg-12">
        <div class="float-right">
          <button
            class="btn btn-primary shadow rounded mb-2"
            :class="!showAddEmployeeForm ? 'btn-primary' : 'btn-info'"
            @click="newEmployeeForm"
          >
            <i class="fas fa-plus" v-if="!showAddEmployeeForm"></i>
            <i class="fas fa-list" v-else></i>
            {{ !showAddEmployeeForm ? "Add Employee" : "List of Employees" }}
          </button>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-lg-12">
        <v-main v-if="!showAddEmployeeForm">
          <v-text-field
            v-model="search"
            append-icon="mdi-magnify"
            label="Search"
            single-line
            hide-details
          >
          </v-text-field>

          <div class="mt-1"></div>
          <v-data-table
            loading
            loading-text="Processing..."
            :headers="headers"
            :items="employees"
            :search="search"
            multi-sort
            :page.sync="page"
            :items-per-page="itemsPerPage"
            @page-count="pageCount = $event"
            hide-default-footer
          >
            <template v-slot:item.actions="{ item }">
              <button
                class="btn btn-success rounded-circle"
                v-on:click="editEmployee(item)"
              >
                <i class="la la-pencil"></i>
              </button>
            </template>
          </v-data-table>
          <v-container>
            <v-row class="mb-6" no-gutters>
              <v-col>
                <v-text-field
                  v-if="employees.length !== 0"
                  :value="itemsPerPage"
                  label="Items per page"
                  type="number"
                  min="-1"
                  max="15"
                  @input="itemsPerPage = parseInt($event, 10)"
                ></v-text-field>
              </v-col>
              <v-col>
                <v-pagination
                  v-if="employees.length !== 0"
                  v-model="page"
                  :length="pageCount ? pageCount : 10"
                  :total-visible="7"
                ></v-pagination>
              </v-col>
            </v-row>
          </v-container>
        </v-main>
      </div>
      <div class="col-lg-12" v-if="showAddEmployeeForm">
        <div class="card">
          <div class="card-body shadow">
            <h4 class="mb-2">Employee Information</h4>
            <hr />
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link active" href="#basictab1" data-toggle="tab">
                  Basic Information
                  <i
                    class="fas fa-exclamation-triangle text-danger"
                    v-if="sectionError.basicInformation"
                  ></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#basictab2" data-toggle="tab"
                  >Account Numbers
                  <i
                    v-if="sectionError.accountNumbers"
                    class="fas fa-exclamation-triangle text-danger"
                  ></i>
                </a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane show active" id="basictab1">
                <basic-information
                  :employee="employee"
                  :errors="errors"
                  :nameExtensions="nameExtensions"
                  :employmentStatus="employmentStatus"
                >
                </basic-information>
              </div>
              <div class="tab-pane" id="basictab2">
                <account-number
                  :employee="employee"
                  :errors="errors"
                ></account-number>
              </div>
            </div>
            <hr />
            <div class="text-right">
              <button
                class="btn btn-primary rounded shadow"
                :class="
                  showAddEmployeeForm && employee.employee_id
                    ? 'btn-success'
                    : 'btn-primary'
                "
                v-on="true ? { click: submitEmployee } : {}"
                :disabled="isLoading"
              >
                <div
                  v-if="isLoading"
                  class="spinner-border spinner-border-sm text-white"
                  role="status"
                >
                  <span class="sr-only">Loading...</span>
                </div>
                Submit
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import BasicInformation from "./BasicInformation.vue";
import AccountNumber from "./AccountNumber.vue";
import swal from "sweetalert";
import _ from "lodash";

export default {
  data() {
    return {
      page: 1,
      pageCount: 10,
      itemsPerPage: 10,
      search: "",
      employee_id: "",
      headers: [
        {
          text: "Employee ID",
          value: "employee_id",
        },
        {
          text: "Firstname",
          value: "firstname",
        },
        {
          text: "Lastname",
          value: "lastname",
        },
        {
          text: "Middlename",
          value: "middlename",
        },
        {
          text: "Extension",
          value: "extension",
        },
        {
          text: "Position",
          value: "information.position.position_name",
        },
        {
          text: "Office",
          value: "information.office.office_name",
        },
        {
          text: "Actions",
          value: "actions",
          sortable: false,
        },
      ],
      sectionError: {
        basicInformation: false,
        accountNumbers: false,
      },
      accountNumberFields: [
        "pagibigMidNo",
        "philhealthNo",
        "sssNo",
        "tinNo",
        "lbpAccountNo",
        "dbpAccountNo",
        "gsisPolicyNo",
        "gsisBpNo",
        "gsisIdNo",
      ],
      basicInformationFields: [
        "lastName",
        "firstName",
        "middleName",
        "extension",
        "dateOfBirth",
        "age",
        "step",
        "basicRate",
        "employmentStatus.stat_code",
        "officeAssignment.office_code",
        "designation.position_code",
      ],
      isComplete: false,
      isLoading: false,
      showAddEmployeeForm: false,
      employees: [],
      employee: {
        lastName: "",
        firstName: "",
        middleName: "",
        extension: "",
        dateOfBirth: "",
        age: "",
        step: "",
        basicRate: "",
        employmentStatus: "",
        officeAssignment: "",
        designation: "",
        image: "no_image.png",
        pagibigMidNo: "",
        philhealthNo: "",
        sssNo: "",
        tinNo: "",
        lbpAccountNo: "",
        dbpAccountNo: "",
        gsisPolicyNo: "",
        gsisBpNo: "",
        gsisIdNo: "",
      },
      employmentStatus: [],
      nameExtensions: [],
      offices: [],
      positions: [],
      errors: {},
    };
  },
  components: {
    BasicInformation,
    AccountNumber,
  },
  methods: {
    sectionValidatorChecker(errorFields) {
      // check for basic information
      errorFields.some((field) => {
        if (this.basicInformationFields.includes(field)) {
          this.sectionError.basicInformation = true;
          return true;
        }
      });

      // Check for account numbers
      errorFields.some((field) => {
        if (this.accountNumberFields.includes(field)) {
          this.sectionError.accountNumbers = true;
          return true;
        }
      });
    },
    newEmployeeForm() {
      this.showAddEmployeeForm = !this.showAddEmployeeForm;
      if (this.showAddEmployeeForm) {
        // Delete the employee_id property in employee object.
        delete this.employee.employee_id;
        this.errors = {};
        // Clearning all data
        Object.keys(this.employee).map((key) => {
          if (key == "image") {
            this.employee[key] = "no_image.png";
          } else {
            this.employee[key] = "";
          }
        });
      }
    },
    submitEmployee() {
      if (this.employee.hasOwnProperty("employee_id")) {
        this.updateEmployee();
      } else {
        this.addNewEmployee();
      }
    },
    addNewEmployee() {
      this.isLoading = true;
      this.sectionError.basicInformation = false;
      this.sectionError.accountNumbers = false;
      window.axios
        .post("/employee/record/store", this.employee)
        .then((response) => {
          if (response.status === 201) {
            this.isLoading = false;
            this.errors = {};
            swal({
              text: "Successfully add new employee.",
              icon: "success",
            });

            this.employees.unshift(response.data);
          }
        })
        .catch((error) => {
          this.isLoading = false;
          this.errors = {};

          this.sectionValidatorChecker(Object.keys(error.response.data.errors));

          if (error.response.status === 422) {
            Object.keys(error.response.data.errors).map((field) => {
              let [fieldMessage] = error.response.data.errors[field];
              this.errors[field] = fieldMessage;
            });
          }
        });
    },
    editEmployee(employee) {
      this.fetchEmployeeData(employee.employee_id);
    },
    updateEmployee() {
      this.isLoading = true;
      this.sectionError.basicInformation = false;
      this.sectionError.accountNumbers = false;
      window.axios
        .put(
          `/employee/record/${this.employee.employee_id}/update`,
          this.employee
        )
        .then((response) => {
          if (response.status === 200) {
            this.isLoading = false;
            swal({
              text: "Successfully update employee.",
              icon: "success",
            });
            this.errors = {};
            this.loadEmployees();
          }
        })
        .catch((error) => {
          this.isLoading = false;
          this.errors = {};

          this.sectionValidatorChecker(Object.keys(error.response.data.errors));

          // Check the error status code.
          if (error.response.status === 422) {
            this.isLoading = false;
            Object.keys(error.response.data.errors).map((field) => {
              let [fieldMessage] = error.response.data.errors[field];
              this.errors[field] = fieldMessage;
            });
          }
        });
    },
    fetchEmployeeData(employee_id) {
      window.axios.get(`/api/employee/find/${employee_id}`).then((response) => {
        if (response.status == 200) {
          this.errors = {};
          let dateYear = new Date().getFullYear();
          let age = dateYear - new Date(response.data.date_birth).getFullYear();

          this.employee.age = age <= 100 ? age : "";
          this.employee.employee_id = response.data.employee_id;
          this.employee.lastName = response.data.lastname;
          this.employee.firstName = response.data.firstname;
          this.employee.middleName = response.data.middlename;
          this.employee.extension = response.data.extension;
          this.employee.pagibigMidNo = response.data.pag_ibig_no;
          this.employee.dateOfBirth = response.data.date_birth;
          this.employee.philhealthNo = response.data.philhealth_no;
          this.employee.sssNo = response.data.sss_no;
          this.employee.tinNo = response.data.tin_no;
          this.employee.lbpAccountNo = response.data.lbp_account_no;
          this.employee.dbpAccountNo = response.data.dbp_account_no;
          this.employee.employmentStatus = response.data.status;
          this.employee.gsisPolicyNo = response.data.gsis_policy_no;
          this.employee.gsisBpNo = response.data.gsis_bp_no;
          this.employee.gsisIdNo = response.data.gsis_id_no;

          // Checking if the user has position and office
          if (response.data.information) {
            this.employee.image = response.data.information.photo;

            this.employee.officeAssignment =
              response.data.information.office.office_code;

            let hasPosition = response.data.information.hasOwnProperty(
              "position"
            );

            let hasOffice = response.data.information.hasOwnProperty("office");

            if (hasPosition) {
              this.employee.designation = response.data.information.position;
            }

            if (hasOffice) {
              this.employee.officeAssignment = response.data.information.office;
            }

            if (response.data.step) {
              this.employee.basicRate = response.data.step.salary_amount_to;
              this.employee.step = response.data.step.step_no_to;
            }
          }

          this.showAddEmployeeForm = true;
        }
      });
    },
    loadEmployees() {
      window.axios.get(`/api/employee/employees`).then((response) => {
        if (response.status === 200) {
          this.employees = response.data;
          this.isComplete = true;
        }
      });
    },
  },
  created() {
    window.axios
      .get("/api/employee/employment/status")
      .then((response) => {
        if (response.status === 200) {
          this.employmentStatus = response.data;
        }
      })
      .catch((err) => console.log(err));

    window
      .axios("/api/name/extensions")
      .then((response) => {
        if (response.status === 200) {
          this.nameExtensions = response.data;
        }
      })
      .catch((err) => console.log(err));

    this.loadEmployees();
  },
};
</script>
<style scoped>
</style>
