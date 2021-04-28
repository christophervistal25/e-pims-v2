<template>
    <div>
        <div class="card-body">
            <h3 class="card-title">
                Civil Service Eligibility
                <a
                    href="#"
                    class="edit-icon"
                    data-toggle="modal"
                    data-target="#family_info_modal"
                    ><i class="fa fa-pencil"></i
                ></a>
            </h3>
            <div class="table-responsive">
                <table class="table table-nowrap">
                    <thead>
                        <tr>
                            <th class="text-sm">
                                CAREER SERVICE
                            </th>
                            <th class="text-sm">
                                DATE OF EXAMINATION
                            </th>
                            <th class="text-sm">
                                PLACE OF EXAMINATION
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(exam, index) in employee.civil_service"
                            :key="index"
                        >
                            <td>{{ exam.career_service }}</td>
                            <td>{{ exam.date_of_examination }}</td>
                            <td>{{ exam.place_of_examination }}</td>
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
