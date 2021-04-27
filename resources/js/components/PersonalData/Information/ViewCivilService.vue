<template>
    <div class="card">
        <div
            v-if="employee.civil_service && employee.civil_service.length != 0"
            class="card-body"
        >
            <div class="pl-3 pr-3">
                <div
                    class="alert alert-secondary text-center font-weight-bold "
                    role="alert"
                >
                    CIVIL SERVICE ELIGIBILITY
                </div>
            </div>
            <div class="card">
                <div
                    class="card-body"
                    v-for="(civil_service, index) in employee.civil_service"
                    :key="index"
                >
                    <div class="row">
                        <div class="col-lg">
                            <div class="form-group">
                                <label class="text-capitalize"
                                    >career service</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    :value="civil_service.career_service"
                                />
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group">
                                <label class="text-capitalize">rating</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    :value="civil_service.rating"
                                />
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group">
                                <label class="text-capitalize"
                                    >date of examination</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    :value="civil_service.date_of_examination"
                                />
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group">
                                <label class="text-capitalize"
                                    >place of examination</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    :value="civil_service.place_of_examination"
                                />
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group">
                                <label class="text-capitalize"
                                    >license number</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    :value="civil_service.license_number"
                                />
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group">
                                <label class="text-capitalize"
                                    >date of validitiy</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    :value="civil_service.date_of_validitiy"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-else class="card-body">
            <h1>No Civil Service</h1>
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
