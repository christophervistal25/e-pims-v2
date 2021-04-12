<template>
  <div>
    <div v-if="employee.hasOwnProperty('civil_service')">
        <div class='card'>
          <div class="card-body" v-for="(civil_service, index) in employee.civil_service" :key="index">
            <p> career_service : {{ civil_service.career_service }} </p>
            <p> rating : {{ civil_service.rating }} </p>
            <p> date_of_examination : {{ civil_service.date_of_examination }} </p>
            <p> place_of_examination : {{ civil_service.place_of_examination }} </p>
            <p> license_number : {{ civil_service.license_number }} </p>
            <p> date_of_validitiy : {{ civil_service.date_of_validitiy }} </p>
            <p> created_at : {{ civil_service.created_at }} </p>
            <p> updated_at : {{ civil_service.updated_at }} </p>
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