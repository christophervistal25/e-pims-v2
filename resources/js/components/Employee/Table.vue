<template>
    <div>
        <div class='row'>
            <div class="col-lg-6">
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
            <div class="col-lg-6 mb-2">
                <a href="/employee/create/personal/data/sheet" class='btn btn-primary float-right'>PDS for new employee</a>
            </div>
        </div>

        <div>
            <table class="table table-hover table-bordered" v-if="!tableView">  
                <thead>
                    <tr>
                        <th scope="col">Employee ID</th>
                        <th scope="col">Fullname</th>
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
                                :href="`/employee/create/${employee.employee_id}/personal/data/sheet`"
                                class="btn btn-primary btn-sm rounded-circle shadow text-white mr-2"
                                :title="`Generate PDS for  ${employee.lastname} , ${employee.firstname} ${employee.middlename} ${employee.extension}`"
                            >
                                <i class="la la-plus font-weight-bold"></i>
                            </a>

                            <a
                                :href="`#`"
                                class="btn btn-success btn-sm rounded-circle shadow text-white"
                            >
                                <i class="la la-edit font-weight-bold"></i>
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
