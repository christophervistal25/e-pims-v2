require("./bootstrap");
window.Vue = require("vue");
import vSelect from "vue-select";
import Vue from "vue";

Vue.component("v2-select", vSelect);

// Personal Information Components
Vue.component(
    "personal-data-sheet",
    require("./components/Sheet/PersonalDataSheetForm.vue").default
);

// BEGIN OF PERSONAL DATA SHEET CREATE
Vue.component(
    "personal-information",
    require("./components/Sheet/C1/Information.vue").default
);

Vue.component(
    "family-background",
    require("./components/Sheet/C1/FamilyBackground.vue").default
);

Vue.component(
    "educational-background",
    require("./components/Sheet/C1/EducationalBackground.vue").default
);

Vue.component(
    "civil-service",
    require("./components/Sheet/C2/CivilService.vue").default
);

Vue.component(
    "work-experience",
    require("./components/Sheet/C2/WorkExperience.vue").default
);

Vue.component(
    "voluntary-work",
    require("./components/Sheet/C3/Voluntary.vue").default
);

Vue.component(
    "learning-and-development",
    require("./components/Sheet/C3/Learning.vue").default
);

Vue.component(
    "other-information",
    require("./components/Sheet/C3/OtherInformation.vue").default
);

Vue.component(
    "relevant-queries",
    require("./components/Sheet/C4/RelevantQueries.vue").default
);

Vue.component(
    "references-records",
    require("./components/Sheet/C4/Reference.vue").default
);

Vue.component(
    "government-issued-id",
    require("./components/Sheet/C4/Government.vue").default
);
// END OF PERSONAL DATA SHEET CREATE

const app = new Vue({
    el: "#app",
});
