<template>
  <div>
    <div v-if="employee.hasOwnProperty('employee_id')">
      <p>Surname : {{ employee.lastname }}</p>
      <p>Firstname : {{ employee.firstname }}</p>
      <p>Middlename : {{ employee.middlename }}</p>
      <p>Extension : {{ employee.extension }}</p>
      <p>agency_employee_no : {{ employee.agency_employee_no }} </p>
      <p>blood_type : {{ employee.blood_type }} </p>
      <p>citizenship : {{ employee.citizenship }} </p>
      <p>civil_status : {{ employee.civil_status }} </p>
      <p>date_birth : {{ employee.date_birth }} </p>
      <p>email_address : {{ employee.email_address }} </p>
      <p>employee_id : {{ employee.employee_id }} </p>
      <p>extension : {{ employee.extension }} </p>
      <p>firstname : {{ employee.firstname }} </p>
      <p>gsis_bp_no : {{ employee.gsis_bp_no }} </p>
      <p>gsis_id_no : {{ employee.gsis_id_no }} </p>
      <p>gsis_policy_no : {{ employee.gsis_policy_no }} </p>
      <p>height : {{ employee.height }} </p>
      <p>lastname : {{ employee.lastname }} </p>
      <p>middlename : {{ employee.middlename }} </p>
      <p>mobile_no : {{ employee.mobile_no }} </p>
      <p>pag_ibig_no : {{ employee.pag_ibig_no }} </p>
      <p>permanent_barangay : {{ employee.permanent_barangay }} </p>
      <p>permanent_city : {{ employee.permanent_city }} </p>
      <p>permanent_house_no : {{ employee.permanent_house_no }} </p>
      <p>permanent_province : {{ employee.permanent_province }} </p>
      <p>permanent_street : {{ employee.permanent_street }} </p>
      <p>permanent_village : {{ employee.permanent_village }} </p>
      <p>permanent_zip_code : {{ employee.permanent_zip_code }} </p>
      <p>philhealth_no : {{ employee.philhealth_no }} </p>
      <p>place_birth : {{ employee.place_birth }} </p>
      <p>residential_barangay : {{ employee.residential_barangay }} </p>
      <p>residential_city : {{ employee.residential_city }} </p>
      <p>residential_house_no : {{ employee.residential_house_no }} </p>
      <p>residential_province : {{ employee.residential_province }} </p>
      <p>residential_street : {{ employee.residential_street }} </p>
      <p>residential_village : {{ employee.residential_village }} </p>
      <p>residential_zip_code : {{ employee.residential_zip_code }} </p>
      <p>sex : {{ employee.sex }} </p>
      <p>sss_no : {{ employee.sss_no }} </p>
      <p>status : {{ employee.status }} </p>
      <p>telephone_no : {{ employee.telephone_no }} </p>
      <p>tin_no : {{ employee.tin_no }} </p>
      <p>trans_no : {{ employee.trans_no }} </p>
      <p>weight : {{ employee.weight }} </p>
    </div>
    <div v-else>
        <p class='font-weight-bold'>Select Employee to view it's information</p>
    </div>
  </div>
</template>

<script>
export default {
  props  : {
    employee : {
      required :true,
    }
  },
}
</script>

<style>

</style>