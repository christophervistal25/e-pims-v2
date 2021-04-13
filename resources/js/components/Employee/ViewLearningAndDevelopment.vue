<template>
    <div class="card">
        <div
            v-if="
                employee.program_attained &&
                    employee.program_attained.length != 0
            "
            class="card-body"
        >
            <div class="pl-3 pr-3">
                <div
                    class="alert alert-secondary text-center font-weight-bold "
                    role="alert"
                >
                    LEARNING AND DEVELOPMENT (L&D) INTERVENTIONS/TRAINING
                    PROGRAMS ATTENDED
                </div>
            </div>
            <div class="card">
                <div
                    class="card-body"
                    v-for="(program_attained,
                    index) in employee.program_attained"
                    :key="index"
                >
                    <div class="row">
                        <div class="col-lg">
                            <div class="form-group">
                                <label class="text-capitalize text-sm"
                                    >title</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    :value="program_attained.title"
                                />
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group">
                                <label class="text-capitalize text-sm"
                                    >date of attendance from</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    :value="
                                        program_attained.date_of_attendance_from
                                    "
                                />
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group">
                                <label class="text-capitalize text-sm"
                                    >date of attendance to</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    :value="
                                        program_attained.date_of_attendance_to
                                    "
                                />
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group">
                                <label class="text-capitalize text-sm"
                                    >number of hours</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    :value="program_attained.number_of_hours"
                                />
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group">
                                <label class="text-capitalize text-sm">
                                    type of id</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    :value="program_attained.type_of_id"
                                />
                            </div>
                        </div>
                        <div class="col lg">
                            <div class="form-group">
                                <label class="text-capitalize text-sm"
                                    >sponsored by</label
                                >
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
        </div>
        <div v-else class="card-body">
            <h1>No Program Attained</h1>
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
