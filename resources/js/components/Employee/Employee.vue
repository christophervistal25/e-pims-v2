<template>
    <div>
        <div class="row">
            <div class="col-lg-4">
                <table class="table table-bordered table-hover">
                    <thead>
                        <th class="text-sm">ID Number</th>
                        <th class="text-sm">Fullname</th>
                    </thead>
                    <tbody>
                        <tr v-for="(employee, index) in employees" :key="index">
                            <td class="text-sm">{{ employee.employee_id }}</td>
                            <td class="text-sm">
                                {{ employee.lastname }} ,
                                {{ employee.firstname }}
                                {{ employee.middlename }}
                                {{ employee.extension }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-8">
                <div class="card-body p-0">
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
                            <basic-information></basic-information>
                        </div>
                        <div class="tab-pane" id="basictab2">
                                <form>
                                    <div class="form-group">
                                <label for="" class="col-form-label">PAG-IBIG MID NO.</label>
                                <input type="text" class="form-control col-lg-8" id="">
                            </div>
                                <div class="form-group">
                                    <label for="" class="col-form-label">REGISTRATION TRACKING NO.</label>
                                    <input type="text" class="form-control col-lg-8" id="">
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-form-label">PHILHEALTH NO.</label>
                                    <input type="text" class="form-control col-lg-8" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-form-label">SSS NO.</label>
                                        <input type="text" class="form-control col-lg-8" id="">
                                </div>
                                <div class="form-group">
                                        <label for="" class="col-form-label">TIN NO.</label>
                                        <input type="text" class="form-control col-lg-8" id="">
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-form-label">LBP ACCOUNT NO.</label>
                                    <input type="text" class="form-control col-lg-8" id="">
                                </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import BasicInformation from "./BasicInformation.vue";

export default {
    data() {
        return {
            employees: []
        };
    },
    components: {
        BasicInformation
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

<style></style>
