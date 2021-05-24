<template>
  <div>
    <div class="">
      <label for="pagibigMidNo" class="form-group has-float-label">
        <input
          type="text"
          v-model="employee.pagibigMidNo"
          id="pagibigMidNo"
          class="form-control col-lg-12"
          :class="errors.hasOwnProperty('pagibigMidNo') ? 'is-invalid' : ''"
          style="outline: none; box-shadow: 0px 0px 0px transparent"
        />
        <span><strong>PAG-IBIG MID NO.</strong></span>
      </label>
      <p class="text-danger text-sm">{{ errors.pagibigMidNo }}</p>
    </div>
    <div class="">
      <label for="philhealthNo" class="form-group has-float-label">
        <input
          type="text"
          id="philhealthNo"
          v-model="employee.philhealthNo"
          class="form-control col-lg-12"
          :class="errors.hasOwnProperty('philhealthNo') ? 'is-invalid' : ''"
          style="outline: none; box-shadow: 0px 0px 0px transparent"
        />
        <span><strong>PHILHEALTH NO.</strong></span>
      </label>
      <p class="text-danger text-sm">{{ errors.philhealthNo }}</p>
    </div>
    <div class="">
      <label for="sssNo" class="form-group has-float-label">
        <input
          type="text"
          id="sssNo"
          v-model="employee.sssNo"
          class="form-control col-lg-12"
          :class="errors.hasOwnProperty('sssNo') ? 'is-invalid' : ''"
          style="outline: none; box-shadow: 0px 0px 0px transparent"
        />
        <p class="text-danger text-sm">{{ errors.sssNo }}</p>
        <span><strong>SSS NO.</strong></span>
      </label>
    </div>
    <div class="">
      <label for="tinNo" class="form-group has-float-label">
        <input
          type="text"
          id="tinNo"
          v-model="employee.tinNo"
          class="form-control col-lg-12"
          :class="errors.hasOwnProperty('tinNo') ? 'is-invalid' : ''"
          style="outline: none; box-shadow: 0px 0px 0px transparent"
        />
        <span><strong>TIN NO.</strong></span>
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
      <label for="dbpAccountNo" class="form-group has-float-label mb-0">
        <input
          type="text"
          id="dbpAccountNo"
          v-model="employee.dbpAccountNo"
          class="form-control col-lg-12"
          :class="errors.hasOwnProperty('dbpAccountNo') ? 'is-invalid' : ''"
          style="outline: none; box-shadow: 0px 0px 0px transparent"
        />
        <span
          ><strong>DBP ACCOUNT NO.</strong
          ><span class="text-danger"><strong>*</strong></span></span
        >
      </label>
      <p class="text-danger text-sm" v-if="errors.dbpAccountNo">
        {{ errors.dbpAccountNo }}
      </p>
    </div>
    <div v-else>
      <label for="lbpAccountNo" class="form-group has-float-label mb-0">
        <input
          type="text"
          id="lbpAccountNo"
          v-model="employee.lbpAccountNo"
          class="form-control col-lg-12"
          :class="errors.hasOwnProperty('lbpAccountNo') ? 'is-invalid' : ''"
          style="outline: none; box-shadow: 0px 0px 0px transparent"
        />
        <span
          ><strong>LBP ACCOUNT NO.</strong
          ><span class="text-danger"><strong>*</strong></span></span
        >
      </label>
      <p class="text-danger text-sm" v-if="errors.lbpAccountNo">
        {{ errors.lbpAccountNo }}
      </p>
    </div>

    <div class="">
      <label for="gsisIdNo" class="form-group has-float-label mt-3">
        <input
          type="text"
          id="gsisIdNo"
          v-model="employee.gsisIdNo"
          class="form-control col-lg-12"
          :class="errors.hasOwnProperty('gsisIdNo') ? 'is-invalid' : ''"
          style="outline: none; box-shadow: 0px 0px 0px transparent"
        />
        <span><strong>GSIS ID NO.</strong></span>
      </label>
      <p class="text-danger text-sm">{{ errors.gsisIdNo }}</p>
    </div>

    <div class="">
      <label for="gsisPolicyNo" class="form-group has-float-label">
        <input
          type="text"
          id="gsisPolicyNo"
          v-model="employee.gsisPolicyNo"
          class="form-control col-lg-12"
          :class="errors.hasOwnProperty('gsisPolicyNo') ? 'is-invalid' : ''"
          style="outline: none; box-shadow: 0px 0px 0px transparent"
        />
        <span><strong>GSIS POLICY NO.</strong></span>
      </label>
      <p class="text-danger text-sm">{{ errors.gsisPolicyNo }}</p>
    </div>

    <div class="gsisBpNo">
      <label for="" class="form-group has-float-label">
        <input
          type="text"
          id="gsisBpNo"
          v-model="employee.gsisBpNo"
          class="form-control col-lg-12"
          :class="errors.hasOwnProperty('gsisBpNo') ? 'is-invalid' : ''"
          style="outline: none; box-shadow: 0px 0px 0px transparent"
        />
        <span><strong>GSIS BP NO.</strong></span>
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
