require("./bootstrap");

window.Vue = require("vue");

Vue.component("sample", require("./components/Sample.vue").default);

// Personal Information Components
Vue.component(
    "personal-data-sheet",
    require("./components/PersonalData/Sheet.vue").default
);
Vue.component(
    "personal-information",
    require("./components/PersonalData/Information.vue").default
);
Vue.component(
    "family-background",
    require("./components/PersonalData/FamilyBackground.vue").default
);

const app = new Vue({
    el: "#app"
});
