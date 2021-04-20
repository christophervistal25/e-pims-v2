<template>
    <div>
        <div class="form-group">
            <label for="" class="col-form-label">PAG-IBIG MID NO.</label>
            <input
                type="number"
                v-model="employee.pagibigMidNo"
                class="form-control col-lg-12"
                :class="
                    errors.hasOwnProperty('pagibigMidNo') ? 'is-invalid' : ''
                "
            />
            <p class="text-danger text-sm">{{ errors.pagibigMidNo }}</p>
        </div>
        <div class="form-group">
            <label for="" class="col-form-label">PHILHEALTH NO.</label>
            <input
                type="number"
                v-model="employee.philhealthNo"
                class="form-control col-lg-12"
                :class="
                    errors.hasOwnProperty('philhealthNo') ? 'is-invalid' : ''
                "
            />
            <p class="text-danger text-sm">{{ errors.philhealthNo }}</p>
        </div>
        <div class="form-group">
            <label for="" class="col-form-label">SSS NO.</label>
            <input
                type="number"
                v-model="employee.sssNo"
                class="form-control col-lg-12"
                :class="errors.hasOwnProperty('sssNo') ? 'is-invalid' : ''"
            />
            <p class="text-danger text-sm">{{ errors.sssNo }}</p>
        </div>
        <div class="form-group">
            <label for="" class="col-form-label">TIN NO.</label>
            <input
                type="number"
                v-model="employee.tinNo"
                class="form-control col-lg-12"
                :class="errors.hasOwnProperty('tinNo') ? 'is-invalid' : ''"
            />
            <p class="text-danger text-sm">{{ errors.tinNo }}</p>
        </div>
        <div class="form-group">
            <label for="" class="col-form-label">LBP ACCOUNT NO.</label>
            <input
                type="number"
                v-model="employee.lbpAccountNo"
                class="form-control col-lg-12"
            />
        </div>

        <div class="form-group">
            <label for="" class="col-form-label">GSIS ID NO.</label>
            <input
                type="number"
                v-model="employee.gsisIdNo"
                class="form-control col-lg-12"
                :class="errors.hasOwnProperty('gsisIdNo') ? 'is-invalid' : ''"
            />
            <p class="text-danger text-sm">{{ errors.gsisIdNo }}</p>
        </div>

        <div class="form-group">
            <label for="" class="col-form-label">GSIS POLICY NO.</label>
            <input
                type="number"
                v-model="employee.gsisPolicyNo"
                class="form-control col-lg-12"
                :class="
                    errors.hasOwnProperty('gsisPolicyNo') ? 'is-invalid' : ''
                "
            />
            <p class="text-danger text-sm">{{ errors.gsisPolicyNo }}</p>
        </div>

        <div class="form-group">
            <label for="" class="col-form-label">GSIS BP NO.</label>
            <input
                type="number"
                v-model="employee.gsisBpNo"
                class="form-control col-lg-12"
                :class="errors.hasOwnProperty('gsisBpNo') ? 'is-invalid' : ''"
            />
            <p class="text-danger text-sm">{{ errors.gsisBpNo }}</p>
        </div>
    </div>
</template>

<script>
export default {
    props: ["employee", "errors"]
};
</script>

<style></style>
