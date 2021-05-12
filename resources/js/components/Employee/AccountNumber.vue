<template>
  <div>
    <div class="">
      <label for="" class="form-group has-float-label">
        <input
          type="text"
          v-model="employee.pagibigMidNo"
          class="form-control col-lg-12"
          :class="errors.hasOwnProperty('pagibigMidNo') ? 'is-invalid' : ''"
          style="outline: none; box-shadow: 0px 0px 0px transparent"
        />
        <span>PAG-IBIG MID NO.</span>
      </label>
      <p class="text-danger text-sm">{{ errors.pagibigMidNo }}</p>
    </div>
    <div class="">
      <label for="" class="form-group has-float-label">
        <input
          type="text"
          v-model="employee.philhealthNo"
          class="form-control col-lg-12"
          :class="errors.hasOwnProperty('philhealthNo') ? 'is-invalid' : ''"
          style="outline: none; box-shadow: 0px 0px 0px transparent"
        />
        <span>PHILHEALTH NO.</span>
      </label>
      <p class="text-danger text-sm">{{ errors.philhealthNo }}</p>
    </div>
    <div class="">
      <label for="" class="form-group has-float-label">
        <input
          type="text"
          v-model="employee.sssNo"
          class="form-control col-lg-12"
          :class="errors.hasOwnProperty('sssNo') ? 'is-invalid' : ''"
          style="outline: none; box-shadow: 0px 0px 0px transparent"
        />
        <p class="text-danger text-sm">{{ errors.sssNo }}</p>
        <span>SSS NO.</span>
      </label>
    </div>
    <div class="">
      <label for="" class="form-group has-float-label">
        <input
          type="text"
          v-model="employee.tinNo"
          class="form-control col-lg-12"
          :class="errors.hasOwnProperty('tinNo') ? 'is-invalid' : ''"
          style="outline: none; box-shadow: 0px 0px 0px transparent"
        />
        <span>TIN NO.</span>
      </label>
      <p class="text-danger text-sm">{{ errors.tinNo }}</p>
    </div>
    <div
      class="form-group"
      v-if="
        employee.employmentStatus &&
        employee.employmentStatus.status_name === 'PERMANENT'
      "
    >
      <label for="" class="form-group has-float-label mb-0">
        <input
          type="text"
          v-model="employee.dbpAccountNo"
          class="form-control col-lg-12"
          :class="errors.hasOwnProperty('dbpAccountNo') ? 'is-invalid' : ''"
          style="outline: none; box-shadow: 0px 0px 0px transparent"
        />
        <span>DBP ACCOUNT NO.</span>
      </label>
      <p class="text-danger text-sm" v-if="errors.dbpAccountNo">
        {{ errors.dbpAccountNo }}
      </p>
    </div>
    <div v-else>
      <label for="" class="form-group has-float-label mb-0">
        <input
          type="text"
          v-model="employee.lbpAccountNo"
          class="form-control col-lg-12"
          :class="errors.hasOwnProperty('lbpAccountNo') ? 'is-invalid' : ''"
          style="outline: none; box-shadow: 0px 0px 0px transparent"
        />
        <span>LBP ACCOUNT NO.</span>
      </label>
      <p class="text-danger text-sm" v-if="errors.lbpAccountNo">
        {{ errors.lbpAccountNo }}
      </p>
    </div>

    <div class="">
      <label for="" class="form-group has-float-label">
        <input
          type="text"
          v-model="employee.gsisIdNo"
          class="form-control col-lg-12"
          :class="errors.hasOwnProperty('gsisIdNo') ? 'is-invalid' : ''"
          style="outline: none; box-shadow: 0px 0px 0px transparent"
        />
        <span>GSIS ID NO.</span>
      </label>
      <p class="text-danger text-sm">{{ errors.gsisIdNo }}</p>
    </div>

    <div class="">
      <label for="" class="form-group has-float-label">
        <input
          type="text"
          v-model="employee.gsisPolicyNo"
          class="form-control col-lg-12"
          :class="errors.hasOwnProperty('gsisPolicyNo') ? 'is-invalid' : ''"
          style="outline: none; box-shadow: 0px 0px 0px transparent"
        />
        <span>GSIS POLICY NO.</span>
      </label>
      <p class="text-danger text-sm">{{ errors.gsisPolicyNo }}</p>
    </div>

    <div class="">
      <label for="" class="form-group has-float-label">
        <input
          type="text"
          v-model="employee.gsisBpNo"
          class="form-control col-lg-12"
          :class="errors.hasOwnProperty('gsisBpNo') ? 'is-invalid' : ''"
          style="outline: none; box-shadow: 0px 0px 0px transparent"
        />
        <span>GSIS BP NO.</span>
      </label>
      <p class="text-danger text-sm">{{ errors.gsisBpNo }}</p>
    </div>
  </div>
</template>

<script>
export default {
  props: ["employee", "errors"],
};
</script>

<style></style>
