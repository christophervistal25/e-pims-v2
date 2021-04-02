<template>
   <div>
         <!-- <div>
            <div class="container dash-border p-4">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates labore alias quasi facere, ipsa porro ipsam culpa voluptate voluptatibus quas. Id minus, veniam facilis eum commodi nemo unde laudantium eos?</p>

                <div class="text-center align-middle">
                    <button class='btn btn-primary p-2 mr-3' @click="hasSelecType = true">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        NEW EMPLOYEE
                    </button>

                    <button class="btn btn-success p-2" @click="hasSelecType = true">
                        <i class="fa fa-address-card" aria-hidden="true"></i>
                        OLD EMPLOYEE
                    </button>
                </div>
            </div>
        </div> -->
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
                @display-educational-background="dispalyEducationalBackground"
                v-if="selectedTab.name === 'C1'"
            ></family-background>

            <educational-background
                :educational_background="isEducationalBackground"
                v-if="selectedTab.name === 'C1'"
                @next_tab="openNextTab"
            ></educational-background>

            <!-- C2 -->
            <civil-service
                @display-work-experience="workExperienceSection"
                v-if="selectedTab.name === 'C2'"
            ></civil-service>

            <work-experience
                :work_experience="isWorkExperienceShow"
                v-if="selectedTab.name === 'C2'"
                @next_tab="openNextTab"
            ></work-experience>
            <!-- END OF C2 -->

            <!-- C3 -->
            <voluntary 
                @display-learning-and-development="displayLearningAndDevelopment"
                v-if="selectedTab.name === 'C3'"
            ></voluntary>

            <learning-and-development
                v-if="selectedTab.name === 'C3'"
                @display-other-information="displayOtherInformation"
                :show_panel="needToShowLearningAndDevelopment"
            ></learning-and-development>

            <other-information 
                v-if="selectedTab.name === 'C3'"
                :show_panel="needToShowOtherInformation"
                @next_tab="openNextTab"
            ></other-information>
            <!-- END OF C3 -->

            <!-- C4 -->
            <relevant-queries 
                v-if="selectedTab.name === 'C4'"
                @display-reference="displayReference"
            ></relevant-queries>
            <references
                :show_panel="needToShowReference"
                @display-issued-id="displayIssuedID"
                v-if="selectedTab.name === 'C4'"></references>
            <goverment-issued-id
                :show_panel="needToShowIssuedID"
                v-if="selectedTab.name === 'C4'"
            ></goverment-issued-id>
            <!-- END OF C4 -->
        </div>
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
        GovernmentIssuedID,
    },
    data() {
        return {
            hasSelecType : false,
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
            needToShowLearningAndDevelopment : false,
            needToShowOtherInformation : false,
            needToShowReference : false,
            needToShowIssuedID: false,
            employee_id: null
        };
    },
    methods: {
        workExperienceSection() {
            this.isWorkExperienceShow = true;
        },
        displayFamilyBackground() {
            this.isFamilyBackgroundShow = true;
        },
        dispalyEducationalBackground() {
            this.isEducationalBackground = true;
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
            this.tabs.map(tab => (tab.status = false));
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
        // set the default tab display to C1
        this.selectedTab = this.tabs[0];
    }
};
</script>
<style scoped>
    .dash-border {
        border-color : #007bff;
        border-width : 4px;  
        border-style : dashed;
    }
</style>
