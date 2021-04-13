<template>
    <div>
        <div v-if="employee.hasOwnProperty('civil_service')">
            <div class="card">
                <div
                    class="card-body"
                    v-for="(civil_service, index) in employee.civil_service"
                    :key="index"
                >
                    <div class="form-group">
                        <label class="text-capitalize">career service</label>
                        <input
                            type="text"
                            class="form-control"
                            :value="civil_service.career_service"
                        />
                    </div>

                    <div class="form-group">
                        <label class="text-capitalize">rating</label>
                        <input
                            type="text"
                            class="form-control"
                            :value="civil_service.rating"
                        />
                    </div>

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

                    <div class="form-group">
                        <label class="text-capitalize">license number</label>
                        <input
                            type="text"
                            class="form-control"
                            :value="civil_service.license_number"
                        />
                    </div>

                    <div class="form-group">
                        <label class="text-capitalize">date of validitiy</label>
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
