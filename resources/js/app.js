require("./bootstrap");
window.Vue = require("vue");

import vSelect from "vue-select";

Vue.component("v-select", vSelect);

Vue.component(
    "statusmodal",
    require("./components/Employee/StatusModal.vue").default
);
Vue.component(
    "designationmodal",
    require("./components/Employee/DesignationModal.vue").default
);
Vue.component(
    "assignmentmodal",
    require("./components/Employee/AssignmentModal.vue").default
);
// Personal Information Components
Vue.component(
    "personal-data-sheet",
    require("./components/PersonalData/CreatePersonalDataSheet.vue").default
);

// Vue.component(
//     "personal-data-with-employee",
//     require("./components/PersonalData/CreatePersonalDataSheetWithEmployee.vue")
//         .default
// );

//  Leave Components
Vue.component("leave-search", require("./components/Leave/Search.vue").default);
Vue.component(
    "leave-content",
    require("./components/Leave/Content.vue").default
);

Vue.component(
    "exists-personal-information",
    require("./components/PersonalData/exists/C1/Information.vue").default
);

Vue.component(
    "create-with-existing-employee",
    require("./components/PersonalData/CreateWithExistingEmployee.vue").default
);

// BEGIN OF PERSONAL DATA SHEET CREATE
Vue.component(
    "create-personal-information",
    require("./components/PersonalData/create/C1/Information.vue").default
);

Vue.component(
    "create-family-background",
    require("./components/PersonalData/create/C1/FamilyBackground.vue").default
);

Vue.component(
    "create-educational-background",
    require("./components/PersonalData/create/C1/EducationalBackground.vue")
        .default
);

Vue.component(
    "create-civil-service",
    require("./components/PersonalData/create/C2/CivilService.vue").default
);

Vue.component(
    "create-work-experience",
    require("./components/PersonalData/create/C2/WorkExperience.vue").default
);

Vue.component(
    "create-voluntary",
    require("./components/PersonalData/create/C3/Voluntary.vue").default
);

Vue.component(
    "create-learning-and-development",
    require("./components/PersonalData/create/C3/Learning.vue").default
);

Vue.component(
    "create-other-information",
    require("./components/PersonalData/create/C3/OtherInformation.vue").default
);

Vue.component(
    "create-relevant-queries",
    require("./components/PersonalData/create/C4/RelevantQueries.vue").default
);

Vue.component(
    "create-references",
    require("./components/PersonalData/create/C4/Reference.vue").default
);

Vue.component(
    "create-goverment-issued-id",
    require("./components/PersonalData/create/C4/GovernmentIssuedID.vue")
        .default
);
// END OF PERSONAL DATA SHEET CREATE

// BEGIN OF PERSONAL DATA SHEET EXISTS
Vue.component(
    "exists-personal-information",
    require("./components/PersonalData/exists/C1/Information.vue").default
);

Vue.component(
    "exists-family-background",
    require("./components/PersonalData/exists/C1/FamilyBackground.vue").default
);

Vue.component(
    "exists-educational-background",
    require("./components/PersonalData/exists/C1/EducationalBackground.vue")
        .default
);

Vue.component(
    "exists-civil-service",
    require("./components/PersonalData/exists/C2/CivilService.vue").default
);

Vue.component(
    "exists-work-experience",
    require("./components/PersonalData/exists/C2/WorkExperience.vue").default
);

Vue.component(
    "exists-voluntary",
    require("./components/PersonalData/exists/C3/Voluntary.vue").default
);

Vue.component(
    "exists-learning-and-development",
    require("./components/PersonalData/exists/C3/Learning.vue").default
);

Vue.component(
    "exists-other-information",
    require("./components/PersonalData/exists/C3/OtherInformation.vue").default
);

Vue.component(
    "exists-relevant-queries",
    require("./components/PersonalData/exists/C4/RelevantQueries.vue").default
);

Vue.component(
    "exists-references",
    require("./components/PersonalData/exists/C4/Reference.vue").default
);

Vue.component(
    "exists-goverment-issued-id",
    require("./components/PersonalData/exists/C4/GovernmentIssuedID.vue")
        .default
);
// EDIT OF PERSONAL DATA SHEET EXISTS

Vue.component(
    "employee",
    require("./components/Employee/Employee.vue").default
);

Vue.component(
    "basic-information",
    require("./components/Employee/BasicInformation.vue").default
);

Vue.component(
    "account-number",
    require("./components/Employee/AccountNumber.vue").default
);

Vue.component(
    "employee-pds-table",
    require("./components/PersonalData/EmployeePDSTable.vue").default
);

Vue.component(
    "view-government-issued-id",
    require("./components/PersonalData/Information/ViewGovernmentIssuedID.vue")
        .default
);

const app = new Vue({
    el: "#app"
});
