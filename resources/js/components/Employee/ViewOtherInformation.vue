<template>
  <div>
    <div v-if="employee.hasOwnProperty('other_information')">
        <div class='card'>
          <div class="card-body" v-for="(information, index) in employee.other_information" :key="index">
            <p> special_skill : {{ information.special_skill }} </p>
            <p> non_academic : {{ information.non_academic }} </p>
            <p> organization : {{ information.organization }} </p>
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