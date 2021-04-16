<template>
    <div>
        <div class="row">
            <div class="col-lg-12">
                <div class="float-right">
                    <button
                        class="btn btn-primary shadow rounded mb-2"
                        :class="
                            !showAddEmployeeForm ? 'btn-success' : 'btn-primary'
                        "
                        @click="showAddEmployeeForm = !showAddEmployeeForm"
                    >
                        <i class="la la-plus" v-if="!showAddEmployeeForm"></i>
                        <i class="la la-list" v-else></i>
                        {{
                            !showAddEmployeeForm
                                ? "Show Add Employee Form"
                                : "Show List of Employees"
                        }}
                    </button>
                </div>
                <div class="clearfix"></div>
                <div class="card shadow" v-if="!showAddEmployeeForm">
                    <!-- @click="fetchEmployeeData(employee.employee_id)" -->
                    <div class="card-body">
                        <table
                            class="table table-bordered table-hover transition "
                        >
                            <thead>
                                <th class="text-sm">ID Number</th>
                                <th class="text-sm">Fullname</th>
                                <th class="text-sm">Position</th>
                            </thead>
                            <tbody v-if="isComplete">
                                <tr
                                    v-for="(employee, index) in employees"
                                    :key="index"
                                    class="cursor-pointer"
                                >
                                    <td class="text-sm">
                                        {{ employee.employee_id }}
                                    </td>
                                    <td class="text-sm">
                                        {{ employee.lastname }} ,
                                        {{ employee.firstname }}
                                        {{ employee.middlename }}
                                        {{
                                            employee.extension
                                                ? employee.extension.toUpperCase()
                                                : ""
                                        }}
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="3" class="text-center">
                                        <div
                                            class="spinner-border text-primary"
                                            role="status"
                                        >
                                            <span class="sr-only"
                                                >Loading...</span
                                            >
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-12" v-if="showAddEmployeeForm">
                <div class="card">
                    <div class="card-body shadow">
                        <h4 class="mb-2">
                            Add new Employee
                        </h4>
                        <hr />
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
    </div>
</template>

<script>
import BasicInformation from "./BasicInformation.vue";
import AccountNumber from "./AccountNumber.vue";
import swal from "sweetalert";

export default {
    data() {
        return {
            isComplete: false,
            showAddEmployeeForm: false,
            employees: [],
            employee: {
                lastName: "",
                firstName: "",
                middleName: "",
                dateOfBirth: "",
                age: "",
                step: "",
                basicRate: "",
                employmentStatus: "",
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

                        this.showAddEmployeeForm = true;
                    }
                });
        },
        loadEmployees() {
            window.axios.get(`/api/employee/employees`).then(response => {
                if (response.status === 200) {
                    this.employees = response.data.data;
                    this.isComplete = true;
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

.status-item {
    border-width: 3px;
    border-style: dashed;
}

.status-item:hover {
    background: #f2f3f4;
    transition: 300ms ease-in-out;
}
</style>
