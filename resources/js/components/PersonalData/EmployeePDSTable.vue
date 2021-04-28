<template>
    <div>
        <div class="float-right mb-2">
            <a
                href="/employee/create/personal/data/sheet"
                class="btn btn-primary float-right"
                >PDS for new employee</a
            >
        </div>
        <div>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Employee ID</th>
                        <th scope="col">Fullname</th>
                        <th scope="col" class="text-center">Position</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(employee, index) in employees" :key="index">
                        <td>{{ employee.employee_id }}</td>
                        <td>
                            {{ employee.lastname }} , {{ employee.firstname }}
                            {{ employee.middlename }} {{ employee.extension }}
                        </td>
                        <td>&nbsp;</td>
                        <td class="text-center">
                            <button
                                @click="
                                    showFullInformation(employee.employee_id)
                                "
                                class="btn btn-info btn-sm rounded-circle shadow text-white mr-2"
                                :title="
                                    `View Information of ${employee.lastname} , ${employee.firstname} ${employee.middlename} ${employee.extension}`
                                "
                            >
                                <i class="fas fa-eye font-weight-bold"></i>
                            </button>

                            <a
                                :href="
                                    `/employee/create/${employee.employee_id}/personal/data/sheet`
                                "
                                class="btn btn-primary btn-sm rounded-circle shadow text-white mr-2"
                                :title="
                                    `Generate PDS for  ${employee.lastname} , ${employee.firstname} ${employee.middlename} ${employee.extension}`
                                "
                            >
                                <i class="fas fa-plus font-weight-bold"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="emp_profile" class="pro-overview tab-pane fade show active">
            <div class="card mb-0 rounded-0 shadow-none">
                <div class="card-body rounded-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#"
                                            ><img
                                                alt=""
                                                src="assets/img/profiles/avatar-02.jpg"
                                        /></a>
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3
                                                    class="user-name m-t-0 mb-0"
                                                >
                                                    {{ employee.fullname }}
                                                </h3>
                                                <h6 class="text-muted">
                                                    UI/UX Design Team
                                                </h6>
                                                <small class="text-muted"
                                                    >Web Designer</small
                                                >
                                                <div class="staff-id">
                                                    Employee ID : FT-0001
                                                </div>
                                                <div
                                                    class="small doj text-muted"
                                                >
                                                    Date of Join : 1st Jan 2013
                                                </div>
                                                <div class="staff-msg">
                                                    <a
                                                        class="btn btn-custom"
                                                        href="chat.html"
                                                        >Send Message</a
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <div class="title">
                                                        Phone:
                                                    </div>
                                                    <div class="text">
                                                        <a href=""
                                                            >9876543210</a
                                                        >
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">
                                                        Email:
                                                    </div>
                                                    <div class="text">
                                                        <a href=""
                                                            >johndoe@example.com</a
                                                        >
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">
                                                        Birthday:
                                                    </div>
                                                    <div class="text">
                                                        24th July
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">
                                                        Address:
                                                    </div>
                                                    <div class="text">
                                                        1861 Bayonne Ave,
                                                        Manchester Township, NJ,
                                                        08759
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">
                                                        Gender:
                                                    </div>
                                                    <div class="text">Male</div>
                                                </li>
                                                <li>
                                                    <div class="title">
                                                        Reports to:
                                                    </div>
                                                    <div class="text">
                                                        <div class="avatar-box">
                                                            <div
                                                                class="avatar avatar-xs"
                                                            >
                                                                <img
                                                                    src="assets/img/profiles/avatar-16.jpg"
                                                                    alt=""
                                                                />
                                                            </div>
                                                        </div>
                                                        <a href="profile.html">
                                                            Jeffery Lalor
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="pro-edit">
                                    <a
                                        data-target="#profile_info"
                                        data-toggle="modal"
                                        class="edit-icon"
                                        href="#"
                                        ><i class="fa fa-pencil"></i
                                    ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 d-flex">
                    <div
                        class="card profile-box flex-fill rounded-0 rounded-bottom border-top-0"
                    >
                        <view-personal-information
                            :employee="employee"
                        ></view-personal-information>
                    </div>
                </div>
                <div class="col-md-6 d-flex">
                    <div
                        class="card profile-box flex-fill rounded-0 rounded-bottom border-top-0"
                    >
                        <view-person-address
                            :employee="employee"
                        ></view-person-address>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 d-flex">
                    <div class="card profile-box flex-fill">
                        <view-government-accounts
                            :employee="employee"
                        ></view-government-accounts>
                    </div>
                </div>
                <div class="col-md-6 d-flex">
                    <div class="card profile-box flex-fill">
                        <view-family-background
                            :employee="employee"
                        ></view-family-background>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 d-flex">
                    <div class="card profile-box flex-fill">
                        <view-educational-background
                            :employee="employee"
                        ></view-educational-background>
                    </div>
                </div>
                <div class="col-md-6 d-flex">
                    <div class="card profile-box flex-fill">
                        <div class="card-body">
                            <h3 class="card-title">
                                Work Experience
                                <a
                                    href="#"
                                    class="edit-icon"
                                    data-toggle="modal"
                                    data-target="#experience_info"
                                    ><i class="fa fa-pencil"></i
                                ></a>
                            </h3>
                            <div class="experience-box">
                                <ul class="experience-list">
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name"
                                                    >Web Designer at Zen
                                                    Corporation</a
                                                >
                                                <span class="time"
                                                    >Jan 2013 - Present (5 years
                                                    2 months)</span
                                                >
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name"
                                                    >Web Designer at Ron-tech</a
                                                >
                                                <span class="time"
                                                    >Jan 2013 - Present (5 years
                                                    2 months)</span
                                                >
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name"
                                                    >Web Designer at Dalt
                                                    Technology</a
                                                >
                                                <span class="time"
                                                    >Jan 2013 - Present (5 years
                                                    2 months)</span
                                                >
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ViewPersonalInformation from "./Information/ViewPersonalInformation.vue";
import ViewPersonAddress from "./Information/ViewAddresses.vue";
import ViewGovernmentAccounts from "./Information/ViewGovernmentIDNumbers.vue";
import ViewFamilyBackground from "./Information/ViewFamilyBackground.vue";
import ViewEducationalBackground from "./Information/ViewEducationalBackground.vue";

export default {
    data() {
        return {
            employees: [],
            employee: {}
        };
    },
    components: {
        ViewPersonalInformation,
        ViewPersonAddress,
        ViewGovernmentAccounts,
        ViewFamilyBackground,
        ViewEducationalBackground
    },
    methods: {
        showFullInformation(employee_id) {
            window.axios
                .get(`/api/employee/show/${employee_id}`)
                .then(response => {
                    if (response.status === 200) {
                        this.employee = response.data;
                    }
                });
        }
    },
    created() {
        window.axios.get(`/api/employee/employees`).then(response => {
            if (response.status === 200) {
                this.employees = response.data.data;
            }
        });
    }
};
</script>
