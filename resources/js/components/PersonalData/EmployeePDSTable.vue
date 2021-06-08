<template>
  <div>
    <div class="float-left mb-2">
      <button
        class="btn btn-warning rounded-circle shadow"
        v-if="showProfile"
        @click="showProfile = false"
      >
        <i class="la la-arrow-left text-white font-weight-bold"></i>
      </button>
    </div>
    <div class="float-right mb-2">
      <a
        href="/employee/create/personal/data/sheet"
        class="btn btn-primary float-right shadow"
      >
        <i class="la la-plus"></i> PDS for new employee</a
      >
    </div>
    <div class="clearfix"></div>
    <br />
    <div>
      <v-main v-if="!showProfile">
        <v-row>
          <v-col></v-col>
          <v-col></v-col>
          <v-col>
            <v-text-field
              v-model="search"
              append-icon="mdi-magnify"
              label="Search"
              single-line
              hide-details
            >
            </v-text-field>
          </v-col>
        </v-row>

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
              @click="fetchInformation(item.employee_id)"
              class="btn btn-info rounded-circle text-white mr-2"
            >
              <i class="la la-eye"></i>
            </button>

            <a
              :href="`/employee/create/${item.employee_id}/personal/data/sheet`"
              class="btn btn-success rounded-circle text-white mr-2"
            >
              <i class="la la-pencil"></i>
            </a>

            <a
              @click="printPersonalDataSheet(item.employee_id)"
              class="btn btn-primary rounded-circle text-white mr-2"
              :title="`Generate PDS for ${item.fullname}`"
            >
              <i class="la la-print"></i>
            </a>
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
                color="rgba(255, 155, 68, 1)"
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

    <div id="emp__profile" v-if="showProfile">
      <div class="card mb-0 rounded-0 shadow-none">
        <view-information-summary
          :employee="employee"
        ></view-information-summary>
      </div>
      <div class="row">
        <div class="col-md-6 d-flex">
          <div
            class="
              card
              profile-box
              flex-fill
              rounded-0 rounded-bottom
              border-top-0
            "
          >
            <view-personal-information
              :employee="employee"
            ></view-personal-information>
          </div>
        </div>
        <div class="col-md-6 d-flex">
          <div
            class="
              card
              profile-box
              flex-fill
              rounded-0 rounded-bottom
              border-top-0
            "
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
import io from "socket.io-client";
let socket = io.connect("http://192.168.1.14:3030");
export default {
  data() {
    return {
      employees: [],
      employee: {},
      showProfile: false,
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
          text: "Fullname",
          value: "fullname",
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
    printPersonalDataSheet(employee_id) {
      window.axios.get(`/print/pds/${employee_id}`).then(() => {
        socket.emit("preview_personal_data_sheet");
      });
    },
  },
  created() {
    window.axios.get(`/api/employee/employees`).then((response) => {
      if (response.status === 200) {
        this.employees = response.data;
      }
    });
  },
};
</script>
