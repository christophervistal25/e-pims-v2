<template>
    <div>
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

            <exists-personal-information
                :data="employeeData"
                v-on:next-panel-family-background="displayFamilyBackgroundPanel"
                v-if="selectedTab.name === 'C1'"
            ></exists-personal-information>

            <exists-family-background
                :show_panel="familyBackgroundPanel"
                v-on:next-panel-educational-background="
                    displayEducationalBackgroundPanel
                "
                v-if="selectedTab.name === 'C1'"
            ></exists-family-background>

            <exists-educational-background
                :educational_background="educationalBackgroundPanel"
                v-if="selectedTab.name === 'C1'"
                @next_tab="openNextTab"
            ></exists-educational-background>

            <!-- C2 -->
            <exists-civil-service
                @display-work-experience="workExperienceSection"
                v-if="selectedTab.name === 'C2'"
            ></exists-civil-service>

            <exists-work-experience
                :work_experience="isWorkExperienceShow"
                v-if="selectedTab.name === 'C2'"
                @next_tab="openNextTab"
            ></exists-work-experience>
            <!-- END OF C2 -->

            <!-- C3 -->
            <exists-voluntary
                @display-learning-and-development="
                    displayLearningAndDevelopment
                "
                v-if="selectedTab.name === 'C3'"
            ></exists-voluntary>

            <exists-learning-and-development
                v-if="selectedTab.name === 'C3'"
                @display-other-information="displayOtherInformation"
                :show_panel="needToShowLearningAndDevelopment"
            ></exists-learning-and-development>

            <exists-other-information
                v-if="selectedTab.name === 'C3'"
                :show_panel="needToShowOtherInformation"
                @next_tab="openNextTab"
            ></exists-other-information>
            <!-- END OF C3 -->

            <!-- C4 -->
            <exists-relevant-queries
                v-if="selectedTab.name === 'C4'"
                @display-reference="displayReference"
            ></exists-relevant-queries>
            <references
                :show_panel="needToShowReference"
                @display-issued-id="displayIssuedID"
                v-if="selectedTab.name === 'C4'"
            ></references>
            <exists-goverment-issued-id
                :show_panel="needToShowIssuedID"
                v-if="selectedTab.name === 'C4'"
            ></exists-goverment-issued-id>
            <!-- END OF C4 -->
        </div>
    </div>
</template>

<script>
import FamilyBackground from "./exists/C1/FamilyBackground.vue";
import PersonalInformation from "./exists/C1/Information.vue";
import EducationalBackground from "./exists/C1/EducationalBackground.vue";

import CivilService from "./exists/C2/CivilService.vue";
import WorkExperience from "./exists/C2/WorkExperience.vue";

import Voluntary from "./exists/C3/Voluntary.vue";
import learningAndDevelopment from "./exists/C3/Learning.vue";
import OtherInformation from "./exists/C3/OtherInformation.vue";

import RelevantQueries from "./exists/C4/RelevantQueries.vue";
import Reference from "./exists/C4/Reference.vue";
import GovernmentIssuedID from "./exists/C4/GovernmentIssuedID.vue";

export default {
    props: {
        employee: {
            type: Object,
            required: true
        }
    },
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
            hasSelecType: false,
            employeeData: "",
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
            familyBackgroundPanel: false,
            educationalBackgroundPanel: false,
            isWorkExperienceShow: false,
            needToShowLearningAndDevelopment: false,
            needToShowOtherInformation: false,
            needToShowReference: false,
            needToShowIssuedID: false
        };
    },
    methods: {
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
        }
    },
    created() {
        // set the default tab display to C1
        this.selectedTab = this.tabs[0];
        window.axios
            .get(`/api/employee/show/${this.employee.employee_id}`)
            .then(response => {
                this.employeeData = response.data;
            });
    }
};
</script>
<style scoped></style>
