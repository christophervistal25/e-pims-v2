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
    </div>
</template>

<script>
export default {
    data() {
        return {
            employees: [],
            employee: {}
        };
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
