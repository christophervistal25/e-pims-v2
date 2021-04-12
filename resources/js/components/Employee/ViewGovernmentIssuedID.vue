<template>
  <div>
    <div v-if="employee.hasOwnProperty('issued_id')">
        <div class='card'>
          <div class="card-body">
            <p>Type of ID : {{ employee.issued_id.id_type }}</p>
            <p>ID No : {{ employee.issued_id.id_no }}</p>
            <p>Date : {{ employee.issued_id.date }}</p>
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