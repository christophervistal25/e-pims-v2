<template>
    <div>
        <div class="row mb-1">
            <div class="col-lg-8">
                <div class="form-group row">
                    <label
                        for="lastname"
                        class="col-sm-3 align-middle text-sm col-form-label"
                        >LAST NAME</label
                    >
                    <div class="col-lg-8">
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
                        class="col-sm-3 text-sm align-middle col-form-label"
                        >FIRST NAME</label
                    >
                    <div class="col-lg-8">
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
                        class="col-sm-3 text-sm align-middle col-form-label"
                        >MIDDLE NAME</label
                    >
                    <div class="col-lg-8">
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
                        class="col-sm-3 text-sm align-middle col-form-label"
                        >NAME EXTENSION</label
                    >
                    <div class="col-lg-8">
                        <select
                            type="text"
                            id="name_extension"
                            v-model="employee.extension"
                            class="form-control text-uppercase"
                        >
                            <option
                                :seleted="employee.extension === 'JR'"
                                value="JR"
                                >JR</option
                            >
                            <option
                                :seleted="employee.extension === 'SR'"
                                value="SR"
                                >SR</option
                            >
                            <option
                                :seleted="employee.extension === 'III'"
                                value="III"
                                >III</option
                            >
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="dateOfBirth"
                        class="col-sm-3 text-sm align-middle col-form-label"
                        >DATE OF BIRTH</label
                    >
                    <div class="col-lg-8">
                        <input
                            type="date"
                            id="dateOfBirth"
                            @change="calculateAge"
                            v-model="employee.dateOfBirth"
                            class="form-control"
                        />
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3 mt-4">
                <div
                    class="p-5 w-50 rounded border mr-auto ml-auto"
                    style="height : 172px;"
                ></div>
                <div class="text-center">
                    <button class="btn btn-primary mt-2">
                        Attach Photo
                    </button>
                </div>
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

            <label for="salaryRate" class="text-sm align-middle col-form-label"
                >STEP</label
            >

            <div class="col-lg-2">
                <input
                    type="text"
                    id="step"
                    v-model="employee.step"
                    class="form-control"
                />
            </div>

            <label for="employeeId" class=" text-sm align-middle col-form-label"
                >BASIC RATE</label
            >

            <div class="col-lg-2">
                <input
                    type="text"
                    id="basicRate"
                    v-model="employee.basicRate"
                    class="form-control"
                />
            </div>

            <label for="employeeId" class=" text-sm align-middle col-form-label"
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
                >EMPLOYMENT STATUS</label
            >
            <div class="col-lg-9">
                <select
                    type="text"
                    id="officeAssignment"
                    v-model="employee.employmentStatus"
                    class="form-control"
                >
                    <option value="" readonly selected
                        >Please select status</option
                    >
                    <option
                        v-for="(status, index) in employmentStatus"
                        :key="index"
                        :value="status.stat_code"
                        >{{ status.status_name }}</option
                    >
                </select>
            </div>

            <div class="col-lg-1">
                <button
                    class="btn btn-primary btn-sm rounded-circle shadow mt-1"
                >
                    <i class="la la-plus"></i>
                </button>
            </div>
        </div>

        <div class="form-group row">
            <label
                for="designation"
                class="col-sm-2 text-sm align-middle col-form-label"
                >DESIGNATION</label
            >
            <div class="col-lg-9">
                <select
                    type="text"
                    id="designation"
                    v-model="employee.designation"
                    class="form-control selectpicker"
                    data-live-search="true"
                >
                    <option value="" readonly>Please select position</option>
                    <option
                        v-for="(position, index) in positions"
                        :key="index"
                        :value="position.id"
                        >{{ position.position_name }}
                    </option>
                </select>
            </div>

            <div class="col-lg-1">
                <button
                    class="btn btn-primary btn-sm rounded-circle shadow mt-1"
                >
                    <i class="la la-plus"></i>
                </button>
            </div>
        </div>

        <div class="form-group row">
            <label
                for="officeAssignment"
                class="col-sm-2 text-sm align-middle col-form-label"
                >OFFICE ASSIGNMENT</label
            >
            <div class="col-lg-9">
                <select
                    type="text"
                    id="officeAssignment"
                    v-model="employee.officeAssignment"
                    class="form-control"
                >
                    <option value="" readonly selected
                        >Please select office</option
                    >
                    <option
                        v-for="(office, index) in offices"
                        :key="index"
                        :value="office.office_code"
                        >{{ office.office_short_name }} -
                        {{ office.office_name }}
                    </option>
                </select>
            </div>

            <div class="col-lg-1">
                <button
                    class="btn btn-primary btn-sm rounded-circle shadow mt-1"
                >
                    <i class="la la-plus"></i>
                </button>
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
                    type="date"
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
                    type="date"
                    id="employmentTo"
                    v-model="employee.employmentTo"
                    class="form-control"
                />
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ["employee"],
    data() {
        return {
            employmentStatus: [],
            offices: [],
            positions: []
        };
    },
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
    },
    created() {
        window.axios
            .get("/api/employee/employment/status")
            .then(response => {
                if (response.status === 200) {
                    this.employmentStatus = response.data;
                }
            })
            .catch(err => console.log(err));

        window.axios.get("/api/offices").then(response => {
            this.offices = response.data;
        });
        window.axios.get("/api/positions").then(response => {
            this.positions = response.data;
        });
    }
};
</script>

<style></style>
