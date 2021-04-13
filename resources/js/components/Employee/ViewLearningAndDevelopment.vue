<template>
    <div>
        <div v-if="employee.hasOwnProperty('program_attained')">
            <div class="card">
                <div
                    class="card-body"
                    v-for="(program_attained,
                    index) in employee.program_attained"
                    :key="index"
                >
                    <p>title : {{ program_attained.title }}</p>
                    <p>
                        date_of_attendance_from :
                        {{ program_attained.date_of_attendance_from }}
                    </p>
                    <p>
                        date_of_attendance_to :
                        {{ program_attained.date_of_attendance_to }}
                    </p>
                    <p>
                        number_of_hours : {{ program_attained.number_of_hours }}
                    </p>
                    <p>type_of_id : {{ program_attained.type_of_id }}</p>
                    <p>sponsored_by : {{ program_attained.sponsored_by }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        employee: {
            required: true
        }
    }
};
</script>

<style></style>
