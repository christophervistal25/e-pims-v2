<template>
    <div>
        <div v-if="employee.hasOwnProperty('civil_service')">
            <div class="card">
                <div
                    class="card-body"
                    v-for="(work, index) in employee.work_experience"
                    :key="index"
                >
                    <div class="form-group">
                        <label class="text-capitalize">from</label>
                        <input
                            type="text"
                            class="form-control"
                            :value="work.from"
                        />
                    </div>

                    <div class="form-group">
                        <label class="text-capitalize">to</label>
                        <input
                            type="text"
                            class="form-control"
                            :value="work.to"
                        />
                    </div>

                    <div class="form-group">
                        <label class="text-capitalize">position title</label>
                        <input
                            type="text"
                            class="form-control"
                            :value="work.position_title"
                        />
                    </div>

                    <div class="form-group">
                        <label class="text-capitalize">office</label>
                        <input
                            type="text"
                            class="form-control"
                            :value="work.office"
                        />
                    </div>

                    <div class="form-group">
                        <label class="text-capitalize">month salary</label>
                        <input
                            type="text"
                            class="form-control"
                            :value="work.monthly_salary"
                        />
                    </div>

                    <div class="form-group">
                        <label class="text-capitalize"
                            >salary job pay grade</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            :value="work.salary_job_pay_grade"
                        />
                    </div>

                    <div class="form-group">
                        <label class="text-capitalize"
                            >status of appointment</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            :value="work.status_of_appointment"
                        />
                    </div>

                    <div class="form-group">
                        <label class="text-capitalize"
                            >government service</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            :value="work.government_service"
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
