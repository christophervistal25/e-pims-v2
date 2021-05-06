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
                            :class="
                                errors.hasOwnProperty('lastName')
                                    ? 'is-invalid'
                                    : ''
                            "
                        />
                        <p class="text-danger text-sm">{{ errors.lastName }}</p>
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
                            :class="
                                errors.hasOwnProperty('firstName')
                                    ? 'is-invalid'
                                    : ''
                            "
                        />
                        <p class="text-danger text-sm">
                            {{ errors.firstName }}
                        </p>
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
                            :class="
                                errors.hasOwnProperty('middleName')
                                    ? 'is-invalid'
                                    : ''
                            "
                        />
                        <p class="text-danger text-sm">
                            {{ errors.middleName }}
                        </p>
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
                            :class="
                                errors.hasOwnProperty('extension')
                                    ? 'is-invalid'
                                    : ''
                            "
                        >
                            <option value="" readonly selected
                                >Please select name extension</option
                            >
                            <option
                                :selected="employee.extension === 'JR'"
                                value="JR"
                                >JR</option
                            >
                            <option
                                :selected="employee.extension === 'SR'"
                                value="SR"
                                >SR</option
                            >
                            <option
                                :selected="employee.extension === 'III'"
                                value="III"
                                >III</option
                            >
                        </select>
                        <p class="text-danger text-sm">
                            {{ errors.extension }}
                        </p>
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="dateOfBirth"
                        class="col-sm-3 text-sm align-middle col-form-label"
                        >DATE OF BIRTH</label
                    >

                    <div class="col-lg-4">
                        <input
                            type="date"
                            id="dateOfBirth"
                            @change="calculateAge"
                            v-model="employee.dateOfBirth"
                            class="form-control"
                            :class="
                                errors.hasOwnProperty('dateOfBirth')
                                    ? 'is-invalid'
                                    : ''
                            "
                        />
                        <p class="text-danger text-sm">
                            {{ errors.dateOfBirth }}
                        </p>
                    </div>

                    <div class="col-lg-4">
                        <input
                            type="text"
                            id="dateOfBirth"
                            readonly="true"
                            v-model="employee.age"
                            class="form-control"
                        />
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-3 mt-4 text-center">
                <img
                    class="w-50 shadow-sm rounded border mr-auto ml-auto img-fluid img-thumbnail"
                    id="employee-image"
                    loading="lazy"
                    :src="`/storage/employee_images/${employee.image}`"
                />

                <div class="text-center mt-2">
                    <div class="button-wrapper btn btn-info">
                        <span class="label">
                            Attach Photo
                        </span>

                        <input
                            type="file"
                            name="upload"
                            id="upload"
                            class="upload-box"
                            @change="onUpload"
                            placeholder="Attach Photo"
                        />
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label
                for="officeAssignment"
                class="col-sm-2 text-sm align-middle col-form-label"
                v-if="employee.employee_id"
                >STEP
            </label>

            <div class="col-lg-3">
                <input
                    class="form-control"
                    type="number"
                    id="step"
                    readonly
                    v-if="employee.employee_id"
                    v-model="employee.step"
                />
            </div>

            <label
                for="basicRate"
                class="text-sm align-middle col-form-label"
                v-if="employee.employee_id"
                >BASIC RATE</label
            >

            <div class="col-lg-3">
                <input
                    type="number"
                    id="basicRate"
                    readonly
                    v-model="employee.basicRate"
                    v-if="employee.employee_id"
                    class="form-control"
                />
            </div>

            <label
                for="employeeId"
                class="text-sm align-middle col-form-label"
                v-if="employee.employee_id"
                >EMP. ID</label
            >

            <div class="col-lg-2" v-if="employee.employee_id">
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
                <v-select
                    label="status_name"
                    @input="onSetSelectStatus"
                    :value="
                        employee.employmentStatus
                            ? employee.employmentStatus.status_name
                            : ''
                    "
                    :options="employmentStatus"
                ></v-select>
                <p class="text-danger text-sm">
                    {{ errors["employmentStatus.stat_code"] }}
                </p>
            </div>

            <div class="col-lg-1">
                <button
                    @click="openStatusModal"
                    class="btn btn-info btn-sm rounded-circle shadow mt-1"
                >
                    <i class="fas fa-plus text-sm"></i>
                </button>
            </div>
        </div>

        <div class="form-group row">
            <label
                for="designation"
                class="col-sm-2 text-sm align-middle col-form-label"
                >POSITION</label
            >
            <div class="col-lg-9">
                <v-select
                    label="position_name"
                    :filterable="false"
                    :value="employee.designation.position_name"
                    @input="onSetSelectPosition"
                    :options="designations"
                    @search="onSearchDesignation"
                >
                    <template slot="no-options">
                        Type atleast 1 word of designation to search.
                    </template>
                </v-select>
                <p class="text-danger text-sm">
                    {{ errors["designation.position_code"] }}
                </p>
            </div>

            <div class="col-lg-1">
                <button
                    class="btn btn-info btn-sm rounded-circle shadow mt-1"
                    @click="openDestinationModal"
                >
                    <i class="fas fa-plus text-sm"></i>
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
                <v-select
                    label="office_name"
                    :filterable="false"
                    :value="employee.officeAssignment.office_name"
                    @input="onSetSelectOffice"
                    :options="offices"
                    @search="onSearchOffice"
                ></v-select>
                <p class="text-danger text-sm">
                    {{ errors["officeAssignment.office_code"] }}
                </p>
            </div>

            <div class="col-lg-1">
                <button
                    class="btn btn-info btn-sm rounded-circle shadow mt-1"
                    @click="openAssignmentModal"
                >
                    <i class="fas fa-plus text-sm"></i>
                </button>
            </div>
        </div>

        <statusmodal
            :show="isShow"
            @status-modal-dismiss="closeStatusModal"
        ></statusmodal>
        <designationmodal
            :showdesignation="isShowDesignation"
            @designation-modal-dismiss="closeDesignationModal"
        ></designationmodal>
        <assignmentmodal
            :showassignment="isShowAssignment"
            @assignment-modal-dismiss="closeAssignmentModal"
        ></assignmentmodal>
        <!-- <button>sample</button> -->
    </div>
</template>
<script>
import StatusModal from "./StatusModal.vue";
import DesignationModal from "./DesignationModal.vue";
import AssignmentModal from "./AssignmentModal.vue";
import "vue-select/dist/vue-select.css";
import _ from "lodash";
export default {
    props: ["employee", "errors", "employmentStatus"],
    data() {
        return {
            isShow: false,
            isShowDesignation: false,
            isShowAssignment: false,
            designations: [],
            offices: []
        };
    },
    components: {
        StatusModal,
        DesignationModal,
        StatusModal,
        AssignmentModal
    },
    watch: {
        dateOfBirth: function(to, from) {
            console.log(to, from);
        }
    },
    methods: {
        onSearchOffice(search, loading) {
            if (search.length) {
                loading(true);
                this.searchOffice(loading, search, this);
            } else {
                this.offices = [];
            }
        },
        onSearchDesignation(search, loading) {
            if (search.length) {
                loading(true);
                this.searchDesignation(loading, search, this);
            } else {
                this.designations = [];
            }
        },
        searchOffice: _.debounce((loading, search, vm) => {
            loading(true);
            window.axios.get(`/api/office/search/${search}`).then(response => {
                vm.offices = response.data;
                loading(false);
            });
        }, 500),
        searchDesignation: _.debounce((loading, search, vm) => {
            loading(true);
            window.axios
                .get(`/api/position/search/${search}`)
                .then(response => {
                    vm.designations = response.data;
                    loading(false);
                });
        }, 500),
        onSetSelectStatus(status) {
            this.employee.employmentStatus = status;
        },
        onSetSelectPosition(position) {
            this.employee.designation = position;
        },
        onSetSelectOffice(office) {
            this.employee.officeAssignment = office;
        },
        onUpload(event) {
            document
                .querySelector("#employee-image")
                .setAttribute(
                    "src",
                    URL.createObjectURL(event.target.files[0])
                );

            // Upload the image.
            let bodyFormData = new FormData();

            bodyFormData.append("image", event.target.files[0]);
            bodyFormData.append("employee_id", this.employee.employee_id);

            window
                .axios({
                    method: "POST",
                    url: "/api/employee/image/upload",
                    data: bodyFormData,
                    headers: { "Content-Type": "multipart/form-data" }
                })
                .then(response => {
                    this.employee.image = response.data;
                })
                .catch(response => {
                    console.log(response);
                });
        },
        calculateAge() {
            let dateYear = new Date().getFullYear();
            let age =
                dateYear - new Date(this.employee.dateOfBirth).getFullYear();
            if (age >= 18 && age <= 100) {
                this.employee.age = age > 0 ? age : "";
            } else {
                this.employee.age = "";
            }
        },
        openStatusModal() {
            this.isShow = true;
        },
        closeStatusModal(status) {
            if (status) {
                this.employmentStatus.unshift(status);
            }
            this.isShow = false;
        },
        openDestinationModal() {
            this.isShowDesignation = true;
        },
        closeDesignationModal() {
            this.isShowDesignation = false;
        },
        openAssignmentModal() {
            this.isShowAssignment = true;
        },
        closeAssignmentModal() {
            this.isShowAssignment = false;
        }
    },
    created() {}
};
</script>

<style scoped>
.button-wrapper {
    position: relative;
}

.button-wrapper span.label {
    position: relative;
    z-index: 0;
    display: inline-block;
    cursor: pointer;
    color: #fff;
    text-transform: uppercase;
}

#upload {
    display: inline-block;
    position: absolute;
    z-index: 1;
    top: 0;
    left: 0;
    opacity: 0;
}
</style>
