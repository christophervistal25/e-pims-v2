<template>
    <div>
        <div class="container-fluid">
            <ul class="nav nav-tabs nav-tabs-solid nav-justified">
                <li class="nav-item" v-for="(tab, key) in tabs" :key="key">
                    <a
                        href="javascript:;"
                        class="font-weight-bold text-uppercase"
                        :class="
                            selected_tab === tab.name
                                ? 'nav-link active'
                                : 'nav-link'
                        "
                        @click="open(tab.name)"
                    >
                        {{ tab.name }}
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <personal-information
                    v-if="selected_tab === 'C1'"
                    :employeeID="id"
                ></personal-information>

                <family-background
                    v-if="selected_tab === 'C1'"
                    :employeeID="id"
                ></family-background>

                <educational-background
                    v-if="selected_tab === 'C1'"
                    :employeeID="id"
                ></educational-background>

                <!-- C2 -->
                <civil-service
                    :employeeID="id"
                    v-if="selected_tab === 'C2'"
                ></civil-service>

                <work-experience
                    :employeeID="id"
                    v-if="selected_tab === 'C2'"
                ></work-experience>
                <!-- END OF C2 -->

                <!-- C3 -->
                <voluntary-work
                    :employeeID="id"
                    v-if="selected_tab === 'C3'"
                ></voluntary-work>

                <learning-and-development
                    :employeeID="id"
                    v-if="selected_tab === 'C3'"
                ></learning-and-development>

                <other-information
                    :employeeID="id"
                    v-if="selected_tab === 'C3'"
                ></other-information>
                <!-- END OF C3 -->

                <!-- BEGINNING OF C4 -->
                <relevant-queries
                    :employeeID="id"
                    v-if="selected_tab === 'C4'"
                ></relevant-queries>

                <references-records
                    :employeeID="id"
                    v-if="selected_tab === 'C4'"
                ></references-records>

                <government-issued-id
                    :employeeID="id"
                    v-if="selected_tab === 'C4'"
                ></government-issued-id>
                <!-- END OF C4 -->
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["id"],
    data() {
        return {
            tabs: [
                {
                    name: "C1",
                },
                {
                    name: "C2",
                },
                {
                    name: "C3",
                },
                {
                    name: "C4",
                },
            ],
            selected_tab: "C1",
        };
    },
    methods: {
        open(tab) {
            this.selected_tab = tab;
            localStorage.setItem("current_tab", tab);
        },
        download() {
            window.open(`/api/personal-data-sheet/download/${this.id}`);
        },
    },
    created() {
        this.selected_tab = localStorage.getItem("current_tab") || "C1";
    },
};
</script>
<style scoped></style>
