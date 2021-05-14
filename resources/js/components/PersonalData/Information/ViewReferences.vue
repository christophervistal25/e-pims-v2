<template>
  <div>
    <div class="card-body">
      <div class="alert alert-warning text-center">REFERENCES</div>
      <div class="table-responsive">
        <table class="table table-nowrap">
          <thead>
            <tr>
              <th class="text-sm">NAME</th>
              <th class="text-sm">ADDRESS</th>
              <th class="text-sm">CONTACT NUMBER</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(reference, index) in employee.references" :key="index">
              <td>{{ reference.name }}</td>
              <td>{{ reference.address }}</td>
              <td>{{ reference.telephone_number }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    employee: {
      required: true,
      type: Object,
    },
  },
};
</script>

<style></style>
