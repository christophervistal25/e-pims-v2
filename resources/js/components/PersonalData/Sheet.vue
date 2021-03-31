<template>
    <div class="container-fluid">
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

        <personal-information
            @display-family-background="displayFamilyBackground"
            v-if="selectedTab.name === 'C1'"
        ></personal-information>

        <family-background
            :family_show="isFamilyBackgroundShow"
            :employee_id="employee_id"
            @display-educational-background="dispalyEducationalBackground"
            v-if="selectedTab.name === 'C1'"
        ></family-background>

        <educational-background 
            :educational_background="isEducationalBackground"
            :employee_id="employee_id"
            v-if="selectedTab.name === 'C1'"
            @next_tab="openNextTab"
        ></educational-background>

        <!-- C2 -->
        <civil-service 
            @display-work-experience="isWorkExperienceShow = true"
            :employee_id="employee_id"
            v-if="selectedTab.name === 'C2'"></civil-service>
        <work-experience 
            :work_experience="isWorkExperienceShow"
            :employee_id="employee_id"
            v-if="selectedTab.name === 'C2'"></work-experience>
        <!-- END OF C2 -->

        <!-- C3 -->
        <voluntary v-if="selectedTab.name === 'C3'"></voluntary>
        <learning-and-development
            v-if="selectedTab.name === 'C3'"
        ></learning-and-development>
        <other-information v-if="selectedTab.name === 'C3'"></other-information>
        <!-- END OF C3 -->

        <!-- C4 -->
        <relevant-queries v-if="selectedTab.name === 'C4'"></relevant-queries>
        <references v-if="selectedTab.name === 'C4'"></references>
        <goverment-issued-id
            v-if="selectedTab.name === 'C4'"
        ></goverment-issued-id>
        <!-- END OF C4 -->
    </div>
</template>

<script>
import FamilyBackground from "./C1/FamilyBackground.vue";
import PersonalInformation from "./C1/Information.vue";
import EducationalBackground from "./C1/EducationalBackground.vue";

import CivilService from "./C2/CivilService.vue";
import WorkExperience from "./C2/WorkExperience.vue";

import Voluntary from "./C3/Voluntary.vue";
import learningAndDevelopment from "./C3/Learning.vue";
import OtherInformation from "./C3/OtherInformation.vue";

import RelevantQueries from "./C4/RelevantQueries.vue";
import Reference from "./C4/Reference.vue";
import GovernmentIssuedID from "./C4/GovernmentIssuedID.vue";

export default {
    components: {
        FamilyBackground,
        PersonalInformation,
        EducationalBackground,
        CivilService,
        WorkExperience,
        Voluntary,
        learningAndDevelopment,
        OtherInformation,
        RelevantQueries,
        Reference,
        GovernmentIssuedID
    },
    data() {
        return {
            tabs: [
                {
                    name: "C1",
                    status: true,
                    no_of_items: 3
                },
                {
                    name: "C2",
                    status: false,
                    no_of_items: 3
                },
                {
                    name: "C3",
                    status: false,
                    no_of_items: 3
                },
                {
                    name: "C4",
                    status: false,
                    no_of_items: 3
                }
            ],
            selectedTab: {},
            isFamilyBackgroundShow: false,
            isEducationalBackground: false,
            isWorkExperienceShow: false,
            employee_id: null
        };
    },
    methods: {
        openTab(tab) {
            this.tabs.map(tab => (tab.status = false));
            this.selectedTab = tab;
            tab.status = true;
        },
        displayFamilyBackground(employee_id) {
            this.isFamilyBackgroundShow = true;
            this.employee_id = employee_id;
        },
        dispalyEducationalBackground() {
            this.isEducationalBackground = true;
        },
        openNextTab() {
            // Get the current opened tab.
            let currentActiveTab = this.tabs.filter((tab) => tab.status);
            // Get the key of current tab
            let [currentTabKey] = Object.keys(currentActiveTab);
            
            // Set the display of current tab to false;
            this.tabs[currentTabKey].status = false;
            // Change the status of next tab.
            let nextTab = this.tabs[++currentTabKey];
            nextTab.status = true;
            // Show next tab
            this.selectedTab = nextTab;
        }
    },
    created() {
        // set the default tab display to C1
        this.selectedTab = this.tabs[0];
    }
};
</script>
