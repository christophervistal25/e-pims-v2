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

        <div class="form-group">
            <label for="" class="col-form-label">GSIS ID NO.</label>
            <input
                type="text"
                v-model="employee.gsisIdNo"
                class="form-control col-lg-12"
            />
        </div>

        <div class="form-group">
            <label for="" class="col-form-label">GSIS POLICY NO.</label>
            <input
                type="text"
                v-model="employee.gsisPolicyNo"
                class="form-control col-lg-12"
            />
        </div>

        <div class="form-group">
            <label for="" class="col-form-label">GSIS BP NO.</label>
            <input
                type="text"
                v-model="employee.gsisBpNo"
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
