<template>
  <!-- DATA-APP FOR MODAL OF VUETIFY -->
  <div data-app>
    <div class="container-fluid">
      <div
        class="float-right"
        style="position: fixed; z-index: 99999; left: 97%"
      >
        <a
          @click="printPersonalDataSheet(employee.employee_id)"
          class="btn btn-primary btn-rounded shadow"
        >
          <i class="la la-print"></i>
        </a>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-lg-3" v-for="(tab, key) in tabs" :key="key">
          <button
            class="btn btn-block font-weight-bold text-uppercase m-2"
            :class="[tab.status ? 'btn-primary' : 'btn-danger']"
            @click="openTab(tab)"
          >
            {{ tab.name }}
          </button>
        </div>
      </div>
      <exists-personal-information
        :personal_data="employee"
        @update-name-extensions="updateNameExtensions"
        :name_extensions="nameExtensions"
        v-if="selectedTab.name === 'C1'"
      ></exists-personal-information>

      <exists-family-background
        :show_panel="true"
        :personal_data="employee"
        @update-name-extensions="updateNameExtensions"
        :name_extensions="nameExtensions"
        v-if="selectedTab.name === 'C1'"
      ></exists-family-background>

      <exists-educational-background
        :show_panel="true"
        :personal_data="employee"
        v-if="selectedTab.name === 'C1'"
      ></exists-educational-background>

      <!-- C2 -->
      <exists-civil-service
        :personal_data="employee"
        v-if="selectedTab.name === 'C2'"
      ></exists-civil-service>

      <exists-work-experience
        :personal_data="employee"
        v-if="selectedTab.name === 'C2'"
      ></exists-work-experience>
      <!-- END OF C2 -->

      <!-- C3 -->
      <exists-voluntary
        v-if="selectedTab.name === 'C3'"
        :personal_data="employee"
      ></exists-voluntary>

      <exists-learning-and-development
        v-if="selectedTab.name === 'C3'"
        :personal_data="employee"
        :show_panel="true"
      ></exists-learning-and-development>

      <exists-other-information
        v-if="selectedTab.name === 'C3'"
        :personal_data="employee"
        :show_panel="true"
      ></exists-other-information>
      <!-- END OF C3 -->

      <!-- C4 -->
      <exists-relevant-queries
        :personal_data="employee"
        v-if="selectedTab.name === 'C4'"
      ></exists-relevant-queries>

      <exists-references
        :show_panel="true"
        :personal_data="employee"
        v-if="selectedTab.name === 'C4'"
      ></exists-references>

      <exists-goverment-issued-id
        :show_panel="true"
        :personal_data="employee"
        v-if="selectedTab.name === 'C4'"
      ></exists-goverment-issued-id>

      <!-- END OF C4 -->
    </div>
  </div>
</template>

<script>
import io from "socket.io-client";
export default {
  props: ["employee"],
  data() {
    return {
      socket: "",
      hasSelecType: false,
      tabs: [
        {
          name: "C1",
          status: true,
          no_of_items: 3,
        },
        {
          name: "C2",
          status: false,
          no_of_items: 3,
        },
        {
          name: "C3",
          status: false,
          no_of_items: 3,
        },
        {
          name: "C4",
          status: false,
          no_of_items: 3,
        },
      ],
      nameExtensions: [],
      selectedTab: {},
      familyBackgroundPanel: false,
      educationalBackgroundPanel: false,
      isWorkExperienceShow: false,
      needToShowLearningAndDevelopment: false,
      needToShowOtherInformation: false,
      needToShowReference: false,
      needToShowIssuedID: false,
    };
  },
  methods: {
    printPersonalDataSheet(employee_id) {
      window.axios.get(`/print/pds/${employee_id}`).then(() => {
        if (!this.socket.connected) {
          this.socket = io.connect("http://192.168.1.9:3030");
          this.socket.emit("preview_personal_data_sheet");
        } else {
          this.socket.emit("preview_personal_data_sheet");
        }
      });
    },
    updateNameExtensions(newExtension) {
      if (newExtension) {
        this.nameExtensions.push(newExtension.extension.toUpperCase());
      }
    },
    workExperienceSection() {
      this.isWorkExperienceShow = true;
    },
    displayFamilyBackgroundPanel() {
      this.familyBackgroundPanel = true;
    },
    displayEducationalBackgroundPanel() {
      this.educationalBackgroundPanel = true;
    },
    displayLearningAndDevelopment() {
      this.needToShowLearningAndDevelopment = true;
    },
    displayOtherInformation() {
      this.needToShowOtherInformation = true;
    },
    displayReference() {
      this.needToShowReference = true;
    },
    displayIssuedID() {
      this.needToShowIssuedID = true;
    },
    openTab(tab) {
      this.tabs.map((tab) => (tab.status = false));
      this.selectedTab = tab;
      tab.status = true;
    },
    openNextTab() {
      // Get the current opened tab.
      let currentTabName = this.selectedTab.name;
      this.tabs.map((tab, index) => {
        if (currentTabName == tab.name) {
          this.selectedTab = this.tabs[index + 1];
          this.selectedTab.status = true;
        } else {
          tab.status = false;
        }
      });
    },
  },
  created() {
    this.socket = io.connect("http://192.168.1.9:3030");
    // set the default tab display to C1
    this.selectedTab = this.tabs[0];
    window.axios
      .get("/api/name/extensions")
      .then((response) => (this.nameExtensions = response.data));
  },
};
</script>
<style scoped></style>
