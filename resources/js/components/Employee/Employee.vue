<template>
    <div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered table-hover">
                    <thead>
                        <th class="text-sm">ID Number</th>
                        <th class="text-sm">Fullname</th>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(employee, index) in employees"
                            :key="index"
                            class="cursor-pointer"
                            @click="fetchEmployeeData(employee.employee_id)"
                        >
                            <td class="text-sm">{{ employee.employee_id }}</td>
                            <td class="text-sm">
                                {{ employee.lastname }} ,
                                {{ employee.firstname }}
                                {{ employee.middlename }}
                                {{ employee.extension.toUpperCase() }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-8" v-if="false">
                <div class="card-body p-0">
                    <div>
                        <button
                            class="btn btn-primary mr-2 shadow"
                            @click="addNewEmployee"
                        >
                            ADD
                        </button>
                        <button
                            class="btn btn-success shadow"
                            @click="updateEmployee"
                        >
                            UPDATE
                        </button>
                    </div>
                    <h4 class="card-title"></h4>
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                href="#basictab1"
                                data-toggle="tab"
                                >Basic Information</a
                            >
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                href="#basictab2"
                                data-toggle="tab"
                                >Account Numbers</a
                            >
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="basictab1">
                            <basic-information
                                :employee="employee"
                            ></basic-information>
                        </div>
                        <div class="tab-pane" id="basictab2">
                            <account-number
                                :employee="employee"
                            ></account-number>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import BasicInformation from "./BasicInformation.vue";
import AccountNumber from "./AccountNumber.vue";
import swal from "sweetalert";

export default {
    data() {
        return {
            employees: [],
            employee: {
                lastName: "",
                firstName: "",
                middleName: "",
                dateOfBirth: "",
                age: "",
                salaryGrade: "",
                officeAssignment: "",
                designation: "",
                employmentFrom: "",
                employmentTo: "",
                controlNo: "",
                pagibigMidNo: "",
                registrationTrackingNo: "",
                philhealthNo: "",
                sssNo: "",
                tinNo: "",
                lbpAccountNo: ""
            }
        };
    },
    components: {
        BasicInformation,
        AccountNumber
    },
    methods: {
        addNewEmployee() {
            window.axios
                .post("/employee/record/store", this.employee)
                .then(response => {
                    if (response.status === 201) {
                        swal({
                            text: "Successfully add new employee.",
                            icon: "success"
                        });
                        this.employees.push(response.data);
                    }
                });
        },
        updateEmployee() {
            window.axios
                .put(
                    `/employee/record/${this.employee.employee_id}/update`,
                    this.employee
                )
                .then(response => {
                    if (response.status === 200) {
                        swal({
                            text: "Successfully update employee.",
                            icon: "success"
                        });
                        this.loadEmployees();
                    }
                });
        },
        fetchEmployeeData(employee_id) {
            window.axios
                .get(`/api/employee/find/${employee_id}`)
                .then(response => {
                    if (response.status == 200) {
                        console.log(response.data);
                        // let dateYear = new Date().getFullYear();
                        // let age =
                        //     dateYear -
                        //     new Date(response.data.date_birth).getFullYear();
                        // this.employee.age = age >= 18 && age <= 100 ? age : "";
                        this.employee.employee_id = response.data.employee_id;
                        this.employee.lastName = response.data.lastname;
                        this.employee.firstName = response.data.firstname;
                        this.employee.middleName = response.data.middlename;
                        this.employee.extension = response.data.extension;
                        this.employee.pagibigMidNo = response.data.pag_ibig_no;
                        this.employee.dateOfBirth = response.data.date_birth;
                        this.employee.philhealthNo =
                            response.data.philhealth_no;
                        this.employee.sssNo = response.data.sss_no;
                        this.employee.tinNo = response.data.tin_no;
                    }
                });
        },
        loadEmployees() {
            window.axios.get(`/api/employee/employees`).then(response => {
                if (response.status === 200) {
                    this.employees = response.data;
                }
            });
        }
    },
    created() {
        this.loadEmployees();
    }
};
</script>

<style>
.cursor-pointer {
    cursor: pointer;
}
</style>
