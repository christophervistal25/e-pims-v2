<template>
  <div>
    <div class="float-left mb-2">
      <button
        class="btn btn-warning rounded-circle shadow"
        v-if="showProfile"
        @click="showProfile = false"
      >
        <i class="fas fa-arrow-circle-left"></i>
      </button>
    </div>
    <div class="float-right mb-2">
      <a
        href="/employee/create/personal/data/sheet"
        class="btn btn-primary float-right"
        >PDS for new employee</a
      >
    </div>
    <div class="clearfix"></div>
    <br />
    <div>
      <table class="table table-hover table-bordered" v-if="!showProfile">
        <thead>
          <tr>
            <th scope="col">Employee ID</th>
            <th scope="col">Fullname</th>
            <th scope="col" class="text-center">Position</th>
            <th scope="col" class="text-center">Office</th>
            <th scope="col" class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(employee, index) in employees" :key="index">
            <td>{{ employee.employee_id }}</td>
            <td>
              {{ employee.fullname }}
            </td>
            <td class="text-center">
              {{
                employee.information && employee.information.position
                  ? employee.information.position.position_name
                  : "N/A"
              }}
            </td>
            <td class="text-center">
              {{
                employee.information && employee.information.office
                  ? employee.information.office.office_name
                  : "N/A"
              }}
            </td>
            <td class="text-center">
              <button
                @click="fetchInformation(employee.employee_id)"
                class="btn btn-info btn-sm rounded-circle shadow text-white mr-2"
                :title="`View Information of ${employee.lastname} , ${employee.firstname} ${employee.middlename} ${employee.extension}`"
              >
                <i class="fas fa-eye font-weight-bold"></i>
              </button>

              <a
                :href="`/employee/create/${employee.employee_id}/personal/data/sheet`"
                class="btn btn-primary btn-sm rounded-circle shadow text-white mr-2"
                :title="`Generate PDS for  ${employee.lastname} , ${employee.firstname} ${employee.middlename} ${employee.extension}`"
              >
                <i class="fas fa-plus font-weight-bold"></i>
              </a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div id="emp__profile" v-if="showProfile">
      <div class="card mb-0 rounded-0 shadow-none">
        <view-information-summary
          :employee="employee"
        ></view-information-summary>
      </div>
      <div class="row">
        <div class="col-md-6 d-flex">
          <div
            class="card profile-box flex-fill rounded-0 rounded-bottom border-top-0"
          >
            <view-personal-information
              :employee="employee"
            ></view-personal-information>
          </div>
        </div>
        <div class="col-md-6 d-flex">
          <div
            class="card profile-box flex-fill rounded-0 rounded-bottom border-top-0"
          >
            <view-person-address :employee="employee"></view-person-address>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 d-flex">
          <div class="card profile-box flex-fill">
            <view-government-accounts
              :employee="employee"
            ></view-government-accounts>
          </div>
        </div>
        <div class="col-md-6 d-flex">
          <div class="card profile-box flex-fill">
            <view-family-background
              :employee="employee"
            ></view-family-background>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 d-flex">
          <div class="card profile-box flex-fill">
            <view-educational-background
              :employee="employee"
            ></view-educational-background>
          </div>
        </div>
        <div class="col-md-6 d-flex">
          <div class="card profile-box flex-fill">
            <view-work-experience :employee="employee"></view-work-experience>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 d-flex">
          <div class="card profile-box flex-fill">
            <view-civil-service :employee="employee"></view-civil-service>
          </div>
        </div>

        <div class="col-md-6 d-flex">
          <div class="card profile-box flex-fill">
            <view-voluntary-work :employee="employee"></view-voluntary-work>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 d-flex">
          <div class="card profile-box flex-fill">
            <view-learning-and-development
              :employee="employee"
            ></view-learning-and-development>
          </div>
        </div>

        <div class="col-md-6 d-flex">
          <div class="card profile-box flex-fill">
            <view-other-information
              :employee="employee"
            ></view-other-information>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 d-flex">
          <div class="card profile-box flex-fill">
            <view-references :employee="employee"></view-references>
          </div>
        </div>
        <div class="col-md-6 d-flex">
          <div class="card profile-box flex-fill">
            <view-government-issued-id
              :employee="employee"
            ></view-government-issued-id>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ViewInformationSummary from "./Information/ViewInformationSummary.vue";
import ViewPersonalInformation from "./Information/ViewPersonalInformation.vue";
import ViewPersonAddress from "./Information/ViewAddresses.vue";
import ViewGovernmentAccounts from "./Information/ViewGovernmentIDNumbers.vue";
import ViewFamilyBackground from "./Information/ViewFamilyBackground.vue";
import ViewEducationalBackground from "./Information/ViewEducationalBackground.vue";
import ViewWorkExperience from "./Information/ViewWorkExperience.vue";
import ViewCivilService from "./Information/ViewCivilService.vue";
import ViewVoluntaryWork from "./Information/ViewVoluntaryWork.vue";
import ViewLearningAndDevelopment from "./Information/ViewLearningAndDevelopment.vue";
import ViewOtherInformation from "./Information/ViewOtherInformation.vue";
import ViewReferences from "./Information/ViewReferences.vue";

export default {
  data() {
    return {
      employees: [],
      employee: {},
      showProfile: false,
    };
  },
  components: {
    ViewInformationSummary,
    ViewPersonalInformation,
    ViewPersonAddress,
    ViewGovernmentAccounts,
    ViewFamilyBackground,
    ViewEducationalBackground,
    ViewWorkExperience,
    ViewCivilService,
    ViewVoluntaryWork,
    ViewLearningAndDevelopment,
    ViewOtherInformation,
    ViewReferences,
  },
  methods: {
    fetchInformation(employee_id) {
      window.axios.get(`/api/employee/show/${employee_id}`).then((response) => {
        if (response.status === 200) {
          this.showProfile = true;
          this.employee = response.data;
        }
      });
    },
  },
  created() {
    window.axios.get(`/api/employee/employees`).then((response) => {
      if (response.status === 200) {
        this.employees = response.data.data;
      }
    });
  },
};
</script>
