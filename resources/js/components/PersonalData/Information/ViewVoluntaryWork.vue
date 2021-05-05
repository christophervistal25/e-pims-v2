<template>
    <div>
        <div class="card-body">
            <h3 class="card-title">
                Voluntary Work
            </h3>
            <div class="table-responsive">
                <table class="table table-nowrap">
                    <thead>
                        <tr>
                            <th class="text-sm">
                                NAME OF ORGANIZATION
                            </th>
                            <th class="text-sm">FROM</th>
                            <th class="text-sm">TO</th>
                            <th class="text-sm">
                                NUMBER OF HOURS
                            </th>
                            <th class="text-sm">POSITION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(voluntaryWork,
                            index) in employee.voluntary_work"
                            :key="index"
                        >
                            <td>{{ voluntaryWork.name_and_address }}</td>
                            <td>{{ voluntaryWork.inclusive_date_from }}</td>
                            <td>{{ voluntaryWork.inclusive_date_to }}</td>
                            <td>{{ voluntaryWork.no_of_hours }}</td>
                            <td>{{ voluntaryWork.position }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        employee: {
            required: true,
            type: Object
        }
    }
};
</script>

<style></style>
