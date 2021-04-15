<template>
    <div>
        <div class="form-group">
            <label for="" class="col-form-label">PAG-IBIG MID NO.</label>
            <input
                type="text"
                v-model="employee.pagibigMidNo"
                class="form-control col-lg-12"
            />
        </div>
        <div class="form-group">
            <label for="" class="col-form-label"
                >REGISTRATION TRACKING NO.</label
            >
            <input
                type="text"
                v-model="employee.registrationTrackingNo"
                class="form-control col-lg-12"
            />
        </div>
        <div class="form-group">
            <label for="" class="col-form-label">PHILHEALTH NO.</label>
            <input
                type="text"
                v-model="employee.philhealthNo"
                class="form-control col-lg-12"
            />
        </div>
        <div class="form-group">
            <label for="" class="col-form-label">SSS NO.</label>
            <input
                type="text"
                v-model="employee.sssNo"
                class="form-control col-lg-12"
            />
        </div>
        <div class="form-group">
            <label for="" class="col-form-label">TIN NO.</label>
            <input
                type="text"
                v-model="employee.tinNo"
                class="form-control col-lg-12"
            />
        </div>
        <div class="form-group">
            <label for="" class="col-form-label">LBP ACCOUNT NO.</label>
            <input
                type="text"
                v-model="employee.lbpAccountNo"
                class="form-control col-lg-12"
            />
        </div>
    </div>
</template>

<script>
export default {
    props: ["employee"]
};
</script>

<style></style>
