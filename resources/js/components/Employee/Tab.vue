<template>
    <div v-show="view_change">
        <div class="row p-0">
            <div class="col-4">
                <input
                    type="text"
                    class="form-control form-control-sm mb-2"
                    placeholder="Search..."
                />
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>Fullname</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(employee, index) in employees"
                            :key="index"  
                            @click="showFullInformation(employee.employee_id)">
                            <td class="text-sm cursor-pointer">{{ employee.employee_id }}</td>
                            <td
                                class="text-sm cursor-pointer"
                               
                            >
                                {{ employee.lastname }} ,
                                {{ employee.firstname }}
                                {{ employee.middlename }}
                                {{ employee.extension }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-7">
                <div class="card-body">
                    <h6 class="card-title">Other information</h6>
                    <ul class="nav nav-tabs nav-tabs-bottom">
                        <li class="nav-item"><a class="nav-link active" href="#personal-information-tab" data-toggle="tab">Personal Information</a></li>
                        <li class="nav-item"><a class="nav-link" href="#family-background-tab" data-toggle="tab">Family Background</a></li>
                        <li class="nav-item"><a class="nav-link" href="#educational-background-tab" data-toggle="tab">Educational Background</a></li>
                        <li class="nav-item"><a class="nav-link" href="#work-experience-tab" data-toggle="tab">Work Experience</a></li>
                        <li class="nav-item dropdown">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">Others</a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#civil-service-tab" data-toggle="tab">Civil Service Egibility</a>
                                <a class="dropdown-item" href="#learning-and-development-tab" data-toggle="tab">Learning and Development</a>
                                <a class="dropdown-item" href="#other-information-tab" data-toggle="tab">Other Information</a>
                                <a class="dropdown-item" href="#relevant-queries-tab" data-toggle="tab">Relevant Queries</a>
                                <a class="dropdown-item" href="#references-tab" data-toggle="tab">References</a>
                                <a class="dropdown-item" href="#government-issued-tab" data-toggle="tab">Government Issued ID</a>
                            </div>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="personal-information-tab">
                            <view-personal-information :employee="employee"></view-personal-information>
                        </div>
                        <div class="tab-pane" id="family-background-tab">
                            <view-family-background :employee="employee"></view-family-background>
                        </div>
                        <div class="tab-pane" id="educational-background-tab">
                            <view-educational-background :employee="employee"></view-educational-background>
                        </div>

                        <div class="tab-pane" id="work-experience-tab">
                            <view-work-experience :employee="employee"></view-work-experience>
                        </div>

                        <div class="tab-pane" id="civil-service-tab">
                            <view-civil-service :employee="employee"></view-civil-service>
                        </div>

                         <div class="tab-pane" id="learning-and-development-tab">
                            <view-learning-and-development :employee="employee"></view-learning-and-development>
                        </div>

                        <div class="tab-pane" id="other-information-tab">
                            <view-other-information :employee="employee"></view-other-information>
                        </div>

                        <div class="tab-pane" id="other-information-tab">
                            Relevant Queries
                        </div>

                        <div class="tab-pane" id="references-tab">
                            <view-references :employee="employee"></view-references>
                        </div>

                        <div class="tab-pane" id="government-issued-tab">
                            <view-government-issued-id :employee="employee"></view-government-issued-id>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ViewPersonalInformation from './ViewPersonalInformation';
import ViewFamilyBackground from './ViewFamilyBackground';
import ViewEducationalBackground from './ViewEducationalBackground.vue';
import ViewWorkExperience from './ViewWorkExperience.vue';
import ViewCivilService from './ViewCivilService.vue';
import ViewLearningAndDevelopment from './ViewLearningAndDevelopment.vue';
import ViewOtherInformation from './ViewOtherInformation.vue';
import ViewReferences from './ViewReferences.vue';
import ViewGovernmentIssuedID from './ViewGovernmentIssuedID.vue';
export default {
    props: {
        view_change: {
            required: true,
        }
    },
    components: {
        ViewPersonalInformation,
        ViewFamilyBackground,
        ViewEducationalBackground,
        ViewWorkExperience,
        ViewCivilService,
        ViewLearningAndDevelopment,
        ViewOtherInformation,
        ViewReferences,
        ViewGovernmentIssuedID,
    },
    data() {
        return {
            employees : [],
            employee : {},
        }
    },
    methods: {
        showFullInformation(employee_id) {
            window.axios.get(`/api/employee/show/${employee_id}`).then(response => {
                if(response.status === 200) {
                    this.employee = response.data;
                }
            });
        },
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
<style scoped>
.cursor-pointer {
    cursor: pointer;
}
</style>
