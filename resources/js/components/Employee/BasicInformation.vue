<template>
    <div>
        <div class="form-group row">
            <label
                for="lastname"
                class="col-sm-2 align-middle text-sm col-form-label"
                >LAST NAME</label
            >
            <div class="col-lg-7">
                <input
                    type="text"
                    id="lastname"
                    v-model="employee.lastName"
                    class="form-control text-uppercase"
                />
            </div>
        </div>

        <div class="form-group row">
            <label
                for="firstname"
                class="col-sm-2 text-sm align-middle col-form-label"
                >FIRST NAME</label
            >
            <div class="col-lg-7">
                <input
                    type="text"
                    id="firstname"
                    v-model="employee.firstName"
                    class="form-control text-uppercase"
                />
            </div>
        </div>

        <div class="form-group row">
            <label
                for="middlename"
                class="col-sm-2 text-sm align-middle col-form-label"
                >MIDDLE NAME</label
            >
            <div class="col-lg-7">
                <input
                    type="text"
                    id="middlename"
                    v-model="employee.middleName"
                    class="form-control text-uppercase"
                />
            </div>
        </div>

        <div class="form-group row">
            <label
                for="name_extension"
                class="col-sm-2 text-sm align-middle col-form-label"
                >NAME EXTENSION</label
            >
            <div class="col-lg-7">
                <input
                    type="text"
                    id="name_extension"
                    v-model="employee.extension"
                    class="form-control text-uppercase"
                />
            </div>
        </div>

        <div class="form-group row">
            <label
                for="dateOfBirth"
                class="col-sm-2 text-sm align-middle col-form-label"
                >DATE OF BIRTH</label
            >
            <div class="col-lg-7">
                <input
                    type="date"
                    id="dateOfBirth"
                    @change="calculateAge"
                    v-model="employee.dateOfBirth"
                    class="form-control"
                />
            </div>
        </div>

        <div class="form-group row">
            <label
                for="dateOfBirth"
                class="col-sm-2 text-sm align-middle col-form-label"
                >AGE</label
            >
            <div class="col-lg-2">
                <input
                    type="text"
                    id="dateOfBirth"
                    readonly="true"
                    v-model="employee.age"
                    class="form-control"
                />
            </div>

            <label
                for="salaryRate"
                class="col-sm-2 text-sm align-middle col-form-label"
                >SALARY RATE</label
            >
            <div class="col-lg-2">
                <input
                    type="text"
                    id="salaryRate"
                    v-model="employee.salaryGrade"
                    class="form-control"
                />
            </div>

            <label
                for="employeeId"
                class="col-sm-2 text-sm align-middle col-form-label"
                >EMP. ID</label
            >
            <div class="col-lg-2">
                <input
                    type="text"
                    id="employeeId"
                    readonly
                    v-model="employee.employee_id"
                    class="form-control"
                />
            </div>
        </div>

        <div class="form-group row">
            <label
                for="officeAssignment"
                class="col-sm-2 text-sm align-middle col-form-label"
                >OFFICE ASSIGNMENT</label
            >
            <div class="col-lg-10">
                <input
                    type="text"
                    id="officeAssignment"
                    v-model="employee.officeAssignment"
                    class="form-control"
                />
            </div>
        </div>

        <div class="form-group row">
            <label
                for="designation"
                class="col-sm-2 text-sm align-middle col-form-label"
                >DESIGNATION</label
            >
            <div class="col-lg-10">
                <input
                    type="text"
                    id="designation"
                    v-model="employee.designation"
                    class="form-control"
                />
            </div>
        </div>

        <div class="form-group row">
            <label
                for="employmentFrom"
                class="col-sm-2 text-sm align-middle col-form-label"
                >EMPLOYMENT FROM</label
            >
            <div class="col-lg-10">
                <input
                    type="text"
                    id="employmentFrom"
                    v-model="employee.employmentFrom"
                    class="form-control"
                />
            </div>
        </div>

        <div class="form-group row">
            <label
                for="employmentTo"
                class="col-sm-2 text-sm align-middle col-form-label"
                >EMPLOYMENT TO</label
            >
            <div class="col-lg-10">
                <input
                    type="text"
                    id="employmentTo"
                    v-model="employee.employmentTo"
                    class="form-control"
                />
            </div>
        </div>

        <div class="form-group row">
            <label
                for="controlNo"
                class="col-sm-2 text-sm align-middle col-form-label"
                >CONTROL NO</label
            >
            <div class="col-lg-10">
                <input
                    type="text"
                    id="controlNo"
                    v-model="employee.controlNo"
                    class="form-control"
                />
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ["employee"],
    watch: {
        dateOfBirth: function(to, from) {
            console.log(to, from);
        }
    },
    methods: {
        calculateAge() {
            let dateYear = new Date().getFullYear();
            let age =
                dateYear - new Date(this.employee.dateOfBirth).getFullYear();
            if (age >= 18 && age <= 100) {
                this.employee.age = age > 0 ? age : "";
            } else {
                this.employee.age = "";
            }
        }
    }
};
</script>

<style></style>
