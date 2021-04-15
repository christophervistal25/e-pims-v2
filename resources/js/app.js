require("./bootstrap");

window.Vue = require("vue");

Vue.component("sample", require("./components/Sample.vue").default);

// Personal Information Components
Vue.component(
    "personal-data-sheet",
    require("./components/PersonalData/CreatePersonalDataSheet.vue").default
);

Vue.component(
    "personal-data-sheet-with-employee",
    require("./components/PersonalData/CreatePersonalDataSheetWithEmployee.vue")
        .default
);

// BEGIN OF PERSONAL DATA SHEET CREATE
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
// END OF PERSONAL DATA SHEET CREATE

// BEGIN OF PERSONAL DATA SHEET EDIT
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
// EDIT OF PERSONAL DATA SHEET EDIT

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

Vue.component(
    "account-number",
    require("./components/Employee/AccountNumber.vue").default
);

Vue.component(
    "view-personal-information",
    require("./components/Employee/ViewPersonalInformation.vue").default
);

Vue.component(
    "view-family-background",
    require("./components/Employee/ViewFamilyBackground.vue").default
);

Vue.component(
    "view-educational-background",
    require("./components/Employee/ViewEducationalBackground.vue").default
);

Vue.component(
    "view-work-experience",
    require("./components/Employee/ViewWorkExperience.vue").default
);

Vue.component(
    "view-civil-service",
    require("./components/Employee/ViewCivilService.vue").default
);

Vue.component(
    "view-learning-and-development",
    require("./components/Employee/ViewLearningAndDevelopment.vue").default
);
Vue.component(
    "view-other-information",
    require("./components/Employee/ViewOtherInformation.vue").default
);

Vue.component(
    "view-references",
    require("./components/Employee/ViewReferences.vue").default
);

Vue.component(
    "view-government-issued-id",
    require("./components/Employee/ViewGovernmentIssuedID.vue").default
);

const app = new Vue({
    el: "#app"
});
