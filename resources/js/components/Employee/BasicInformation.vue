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
                <!-- <input
                    v-if="employee.employee_id"
                    id="officeAssignment"
                    v-model="employee.employmentStatus"
                    class="form-control"
                    :class="
                        errors.hasOwnProperty('employmentStatus')
                            ? 'is-invalid'
                            : ''
                    "
                /> -->
                <v-select
                    label="status_name"
                    @input="onSetSelectStatus"
                    :options="employmentStatus"
                ></v-select>
                <!-- <select
                    id="officeAssignment"
                    v-model="employee.employmentStatus"
                    class="form-control"
                    :class="
                        errors.hasOwnProperty('employmentStatus')
                            ? 'is-invalid'
                            : ''
                    "
                >
                    <option value="" readonly selected
                        >PLEASE SELECT STATUS</option
                    >
                    <option
                        v-for="(status, index) in employmentStatus"
                        :key="index"
                        :value="status.stat_code"
                        >{{ status.status_name }}</option
                    >
                </select> -->
                <p class="text-danger text-sm">{{ errors.employmentStatus }}</p>
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
                >DESIGNATION</label
            >
            <div class="col-lg-9">
                <!-- <input
                    v-if="employee.employee_id"
                    v-model="employee.designation"
                    class="form-control"
                    :class="
                        errors.hasOwnProperty('employmentStatus')
                            ? 'is-invalid'
                            : ''
                    "
                /> -->
                <v-select
                    label="position_name"
                    @input="onSetSelectPosition"
                    :options="positions"
                ></v-select>
                <!-- <select
                    type="text"
                    id="designation"
                    v-model="employee.designation"
                    class="form-control"
                    :class="
                        errors.hasOwnProperty('designation') ? 'is-invalid' : ''
                    "
                >
                    <option value="" readonly>PLEASE SELECT POSITION</option>
                    <option
                        v-for="(position, index) in positions"
                        :key="index"
                        :value="position.position_code"
                        >{{ position.position_name }}
                    </option>
                </select> -->
                <p class="text-danger text-sm">{{ errors.designation }}</p>
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
                <!-- <input
                    v-if="employee.employee_id"
                    type="text"
                    v-model="employee.officeAssignment"
                    class="form-control"
                    :class="
                        errors.hasOwnProperty('designation') ? 'is-invalid' : ''
                    "
                /> -->
                <!-- <select
                    type="text"
                    id="officeAssignment"
                    v-model="employee.officeAssignment"
                    class="form-control"
                    :class="
                        errors.hasOwnProperty('officeAssignment')
                            ? 'is-invalid'
                            : ''
                    "
                >
                    <option value="" readonly selected
                        >PLEASE SELECT OFFICE</option
                    >
                    <option
                        v-for="(office, index) in offices"
                        :key="index"
                        :value="office.office_code"
                        >{{ office.office_short_name }} -
                        {{ office.office_name }}
                    </option>
                </select> -->
                <v-select
                    label="office_name"
                    @input="onSetSelectOffice"
                    :options="offices"
                ></v-select>
                <p class="text-danger text-sm">{{ errors.officeAssignment }}</p>
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
            :positions="positions"
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
export default {
    props: ["employee", "errors", "employmentStatus", "offices", "positions"],
    data() {
        return {
            isShow: false,
            isShowDesignation: false,
            isShowAssignment: false
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
        onSetSelectStatus(status) {
            this.employee.employmentStatus = status.stat_code;
        },
        onSetSelectPosition(position) {
            this.employee.designation = position.position_code;
        },
        onSetSelectOffice(office) {
            this.employee.officeAssignment = office.office_code;
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
        closeStatusModal(statusData) {
            if (statusData) {
                // this.employmentStatus.push(statusData);
                this.employmentStatus.unshift(statusData);
            }
            this.isShow = false;
        },
        openDestinationModal() {
            this.isShowDesignation = true;
        },
        closeDesignationModal(designation) {
            if (designation) {
                this.positions.unshift(designation);
            }

            this.isShowDesignation = false;
        },
        openAssignmentModal() {
            this.isShowAssignment = true;
        },
        closeAssignmentModal(assignment) {
            if (assignment) {
                this.offices.unshift(assignment);
            }
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
