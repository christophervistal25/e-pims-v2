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
                <basic-information></basic-information>
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
