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
            :familyShow="isFamilyBackgroundShow"
            v-if="selectedTab.name === 'C1'"
        ></family-background>
    </div>
</template>

<script>
import FamilyBackground from "./FamilyBackground.vue";
import PersonalInformation from "./Information.vue";

export default {
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
            isFamilyBackgroundShow: false
        };
    },
    methods: {
        openTab(tab) {
            this.tabs.map(tab => (tab.status = false));
            this.selectedTab = tab;
            tab.status = true;
        },
        displayFamilyBackground() {
            this.isFamilyBackgroundShow = true;
        }
    },
    created() {
        this.selectedTab = this.tabs[0];
    }
};
</script>

<style></style>
