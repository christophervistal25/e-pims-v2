<template>
  <div>
    <div v-if="employee.hasOwnProperty('civil_service')">
        <div class='card'>
          <div class="card-body" v-for="(work, index) in employee.work_experience" :key="index">
            <p> from : {{ work.from }} </p>
            <p> to : {{ work.to }} </p>
            <p> position_title : {{ work.position_title }} </p>
            <p> office : {{ work.office }} </p>
            <p> monthly_salary : {{ work.monthly_salary }} </p>
            <p> salary_job_pay_grade : {{ work.salary_job_pay_grade }} </p>
            <p> status_of_appointment : {{ work.status_of_appointment }} </p>
            <p> government_service : {{ work.government_service }} </p>
          </div>
        </div>
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