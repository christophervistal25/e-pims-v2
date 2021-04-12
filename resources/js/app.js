require("./bootstrap");

window.Vue = require("vue");
Vue.use("vue-tabs-chrome", require("vue-tabs-chrome"));

Vue.component("sample", require("./components/Sample.vue").default);

// Personal Information Components
Vue.component(
    "personal-data-sheet",
    require("./components/PersonalData/Sheet.vue").default
);
Vue.component(
    "personal-information",
    require("./components/PersonalData/C1/Information.vue").default
);

Vue.component(
    "family-background",
    require("./components/PersonalData/C1/FamilyBackground.vue").default
);

Vue.component(
    "educational-background",
    require("./components/PersonalData/C1/EducationalBackground.vue").default
);

Vue.component(
    "civil-service",
    require("./components/PersonalData/C2/CivilService.vue").default
);

Vue.component(
    "work-experience",
    require("./components/PersonalData/C2/WorkExperience.vue").default
);

Vue.component(
    "voluntary",
    require("./components/PersonalData/C3/Voluntary.vue").default
);

Vue.component(
    "learning-and-development",
    require("./components/PersonalData/C3/Learning.vue").default
);

Vue.component(
    "other-information",
    require("./components/PersonalData/C3/OtherInformation.vue").default
);

Vue.component(
    "relevant-queries",
    require("./components/PersonalData/C4/RelevantQueries.vue").default
);

Vue.component(
    "references",
    require("./components/PersonalData/C4/Reference.vue").default
);

Vue.component(
    "goverment-issued-id",
    require("./components/PersonalData/C4/GovernmentIssuedID.vue").default
);

Vue.component(
    "employee-table",
    require("./components/Employee/Table.vue").default
);
Vue.component("tab-view", require("./components/Employee/Tab.vue").default);
Vue.component(
    "employee-records",
    require("./components/Employee/Records.vue").default
);
Vue.component(
    "employee",
    require("./components/Employee/Employee.vue").default
);

Vue.component(
    "basic-information",
    require("./components/Employee/BasicInformation.vue").default
);

const app = new Vue({
    el: "#app"
});
