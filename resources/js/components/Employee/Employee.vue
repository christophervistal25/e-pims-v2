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
                        @click="newEmployeeForm"
                    >
                        <i class="fas fa-plus" v-if="!showAddEmployeeForm"></i>
                        <i class="fas fa-list" v-else></i>
                        {{
                            !showAddEmployeeForm
                                ? "Add Employee"
                                : "List of Employees"
                        }}
                    </button>
                </div>
                <div class="clearfix"></div>
                <div class="card shadow" v-if="!showAddEmployeeForm">
                    <div class="card-body">
                        <h4>Employees</h4>
                        <hr />

                        <div class="row">
                            <div class="col-lg-2 mb-2">
                                Show Entries
                                <select class="form-control ">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>

                            <div class="col-lg-10 text-right mt-1 mb-1">
                                <p></p>
                                <div class="col-lg-5">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Search"
                                    />
                                </div>
                            </div>
                        </div>

                        <table
                            class="table table-bordered table-hover transition"
                        >
                            <thead>
                                <th class="text-sm">Employee ID</th>
                                <th class="text-sm">Fullname</th>
                                <th class="text-sm">Position</th>
                                <th class="text-sm">Office</th>
                                <th class="text-sm">Actions</th>
                            </thead>
                            <tbody v-if="isComplete">
                                <tr
                                    v-for="(employee, index) in employees"
                                    :key="index"
                                    class="cursor-pointer"
                                >
                                    <td class="text-sm align-middle">
                                        {{ employee.employee_id }}
                                    </td>
                                    <td class="text-sm align-middle">
                                        {{ employee.lastname }} ,
                                        {{ employee.firstname }}
                                        {{ employee.middlename }}
                                        {{
                                            employee.extension
                                                ? employee.extension.toUpperCase()
                                                : ""
                                        }}
                                    </td>
                                    <td
                                        class="text-center align-middle"
                                        v-if="employee.information"
                                    >
                                        {{
                                            employee.information.position
                                                .position_name
                                        }}
                                    </td>
                                    <td v-else></td>
                                    <td
                                        class="text-center align-middle"
                                        v-if="employee.information"
                                    >
                                        {{
                                            employee.information.office
                                                .office_name
                                        }}
                                    </td>
                                    <td v-else></td>
                                    <td class="text-center">
                                        <button
                                            @click="editEmployee(employee)"
                                            class="btn btn-success rounded-circle shadow"
                                        >
                                            <i class="fas fa-edit text-sm"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="5" class="text-center">
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
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li class="page-item">
                                    <a
                                        class="page-link cursor-pointer"
                                        @click="prevPage"
                                        tabindex="-1"
                                        >Previous</a
                                    >
                                </li>
                                <li
                                    class="page-item"
                                    v-for="page in data.last_page"
                                    :key="page"
                                >
                                    <a
                                        v-if="page <= 10"
                                        class="page-link cursor-pointer"
                                        :class="
                                            page == data.current_page
                                                ? 'bg-primary text-white'
                                                : ''
                                        "
                                        @click="fetch(page)"
                                    >
                                        {{ page }}</a
                                    >
                                </li>
                                <li class="page-item">
                                    <a
                                        class="page-link cursor-pointer"
                                        @click="nextPage"
                                        >Next</a
                                    >
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-lg-12" v-if="showAddEmployeeForm">
                <div class="card">
                    <div class="card-body shadow">
                        <h4 class="mb-2">
                            Employee Information
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
                                    :errors="errors"
                                    :employmentStatus="employmentStatus"
                                    :offices="offices"
                                    :positions="positions"
                                ></basic-information>
                            </div>
                            <div class="tab-pane" id="basictab2">
                                <account-number
                                    :employee="employee"
                                    :errors="errors"
                                ></account-number>
                            </div>
                        </div>
                        <hr />
                        <div class="text-right">
                            <button
                                class="btn btn-primary rounded shadow"
                                @click="submitEmployee"
                                :disabled="isLoading"
                            >
                                <div
                                    v-if="isLoading"
                                    class="spinner-border spinner-border-sm text-white"
                                    role="status"
                                >
                                    <span class="sr-only">Loading...</span>
                                </div>
                                Submit
                            </button>
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
            isLoading: false,
            showAddEmployeeForm: false,
            employees: [],
            data: [],
            employee: {
                lastName: "",
                firstName: "",
                middleName: "",
                extension: "",
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
                philhealthNo: "",
                sssNo: "",
                tinNo: "",
                lbpAccountNo: "",
                image: "no_image.png",
                gsisPolicyNo: "",
                gsisBpNo: "",
                gsisIdNo: ""
            },
            employmentStatus: [],
            offices: [],
            positions: [],
            errors: {}
        };
    },
    components: {
        BasicInformation,
        AccountNumber
    },
    // watch: {
    //     page: function(newPage, oldPage) {
    //         console.log(newPage);
    //     }
    // },
    methods: {
        fetch(page) {
            this.isLoading = true;
            window
                .axios(`/api/employee/employees?page=${page}`)
                .then(response => {
                    this.employees = response.data.data;
                    this.data = response.data;
                    this.isLoading = false;
                });
            console.log(this.data);
        },
        nextPage() {
            window.axios(`${this.data.next_page_url}`).then(response => {
                this.employees = response.data.data;
                this.data = response.data;
                this.isLoading = false;
            });
        },
        prevPage() {
            window.axios(`${this.data.prev_page_url}`).then(response => {
                this.employees = response.data.data;
                this.data = response.data;
                this.isLoading = false;
            });
        },
        newEmployeeForm() {
            this.showAddEmployeeForm = !this.showAddEmployeeForm;
            if (this.showAddEmployeeForm) {
                // Delete the employee_id property in employee object.
                delete this.employee.employee_id;
                this.errors = {};
                // Clearning all data
                Object.keys(this.employee).map(key => {
                    if (key == "image") {
                        this.employee[key] = "no_image.png";
                    } else {
                        this.employee[key] = "";
                    }
                });
            }
        },
        submitEmployee() {
            if (
                this.employee.hasOwnProperty("employee_id") &&
                this.employee_id
            ) {
                this.updateEmployee();
            } else {
                this.addNewEmployee();
            }
        },
        addNewEmployee() {
            this.isLoading = true;
            window.axios
                .post("/employee/record/store", this.employee)
                .then(response => {
                    if (response.status === 201) {
                        this.isLoading = false;
                        swal({
                            text: "Successfully add new employee.",
                            icon: "success"
                        });
                        this.employees.push(response.data);
                    }
                })
                .catch(error => {
                    this.isLoading = false;
                    this.errors = {};
                    // Check the error status code.
                    if (error.response.status === 422) {
                        Object.keys(error.response.data.errors).map(field => {
                            let [fieldMessage] = error.response.data.errors[
                                field
                            ];
                            this.errors[field] = fieldMessage;
                        });
                    }
                });
        },
        editEmployee(employee) {
            this.fetchEmployeeData(employee.employee_id);
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
                })
                .catch(error => {
                    this.isLoading = false;
                    this.errors = {};
                    // Check the error status code.
                    if (error.response.status === 422) {
                        Object.keys(error.response.data.errors).map(field => {
                            let [fieldMessage] = error.response.data.errors[
                                field
                            ];
                            this.errors[field] = fieldMessage;
                        });
                    }
                });
        },
        fetchEmployeeData(employee_id) {
            window.axios
                .get(`/api/employee/find/${employee_id}`)
                .then(response => {
                    if (response.status == 200) {
                        this.errors = {};
                        let dateYear = new Date().getFullYear();
                        let age =
                            dateYear -
                            new Date(response.data.date_birth).getFullYear();

                        this.employee.age = age <= 100 ? age : "";
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
                        this.employee.employmentStatus = response.data.status;
                        this.employee.gsisPolicyNo =
                            response.data.gsis_policy_no;
                        this.employee.gsisBpNo = response.data.gsis_bp_no;
                        this.employee.gsisIdNo = response.data.gsis_id_no;

                        // Checking if the user has position and office
                        if (response.data.information) {
                            this.employee.image =
                                response.data.information.photo;
                            this.employee.designation =
                                response.data.information.position.position_code;
                            this.employee.officeAssignment =
                                response.data.information.office.office_code;
                        }

                        this.showAddEmployeeForm = true;
                    }
                });
        },
        loadEmployees() {
            window.axios.get(`/api/employee/employees`).then(response => {
                if (response.status === 200) {
                    this.employees = response.data.data;
                    this.data = response.data;
                    this.isComplete = true;
                }
            });
        }
    },
    created() {
        this.loadEmployees();
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
