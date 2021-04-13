<template>
    <div>
        <div v-if="employee.hasOwnProperty('civil_service')">
            <div class="card">
                <div
                    class="card-body"
                    v-for="(work, index) in employee.work_experience"
                    :key="index"
                >
                
                <div class="row">
                    <div class="col-lg">
                        <div class="form-group">
                        <label class="text-capitalize text-sm">from</label>
                        <input
                            type="text"
                            class="form-control"
                            :value="work.from"
                        />
                    </div>
                    </div>
                    <div class="col-lg">
                        <div class="form-group">
                        <label class="text-capitalize text-sm">to</label>
                        <input
                            type="text"
                            class="form-control"
                            :value="work.to"
                        />
                    </div>
                    </div>
                    <div class="col-lg">
                        <div class="form-group">
                        <label class="text-capitalize text-sm">position title</label>
                        <input
                            type="text"
                            class="form-control"
                            :value="work.position_title"
                        />
                    </div>
                    </div>
                    <div class="col-lg">
                        <div class="form-group">
                        <label class="text-capitalize text-sm">office</label>
                        <input
                            type="text"
                            class="form-control"
                            :value="work.office"
                        />
                    </div>
                    </div>
                    <div class="col-lg">
                        <div class="form-group">
                        <label class="text-capitalize text-sm">monthly salary</label>
                        <input
                            type="text"
                            class="form-control"
                            :value="work.monthly_salary"
                        />
                    </div>
                    </div>
                    <div class="col-lg">
                        <div class="form-group">
                        <label class="text-capitalize text-sm"
                            >salary job pay grade</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            :value="work.salary_job_pay_grade"
                        />
                    </div>
                    </div>
                    <div class="col-lg">
                        <div class="form-group">
                        <label class="text-capitalize text-sm"
                            >status of appointment</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            :value="work.status_of_appointment"
                        />
                    </div>
                    </div>
                    <div class="col-lg-1">
                        <div class="form-group">
                        <label class="text-capitalize text-sm"
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
