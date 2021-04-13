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
                    <div class="form-group">
                        <label class="text-capitalize">title</label>
                        <input
                            type="text"
                            class="form-control"
                            :value="program_attained.title"
                        />
                    </div>

                    <div class="form-group">
                        <label class="text-capitalize"
                            >date of attendance from</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            :value="program_attained.date_of_attendance_from"
                        />
                    </div>

                    <div class="form-group">
                        <label class="text-capitalize"
                            >date of attendance to</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            :value="program_attained.date_of_attendance_to"
                        />
                    </div>

                    <div class="form-group">
                        <label class="text-capitalize">number of hours</label>
                        <input
                            type="text"
                            class="form-control"
                            :value="program_attained.number_of_hours"
                        />
                    </div>

                    <div class="form-group">
                        <label class="text-capitalize">type of id</label>
                        <input
                            type="text"
                            class="form-control"
                            :value="program_attained.type_of_id"
                        />
                    </div>

                    <div class="form-group">
                        <label class="text-capitalize">sponsored by</label>
                        <input
                            type="text"
                            class="form-control"
                            :value="program_attained.sponsored_by"
                        />
                    </div>
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
