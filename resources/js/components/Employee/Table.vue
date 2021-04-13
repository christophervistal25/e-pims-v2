<template>
    <div>
        <div>
            <label class="switch">
                <input
                    type="checkbox"
                    v-model="tableView"
                    @click="changeView"
                />
                <span class="slider round"></span>
                View more information
            </label>
        </div>
        <div>
            <table class="table table-hover table-bordered" v-if="!tableView">
                <thead>
                    <tr>
                        <th scope="col">Employee ID</th>
                        <th scope="col">Name</th>
                        <th scope="col" class="text-center">Position</th>
                        <th scope="col" class="text-center">Options</th>
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
                            <a
                                :href="`/employee/data/${employee.employee_id}`"
                                class="btn btn-primary btn-sm rounded-circle shadow text-white"
                            >
                                <i class="la la-plus font-weight-bold"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            tableView: false,
            employees: []
        };
    },
    methods: {
        changeView() {
            this.$emit("table_view", this.tableView);
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

<style></style>
