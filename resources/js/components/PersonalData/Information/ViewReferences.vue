<template>
  <div>
    <div class="card-body">
      <div class="alert alert-warning text-center">
        <strong>REFERENCES</strong>
      </div>
      <div class="table-responsive">
        <table class="table table-nowrap">
          <thead>
            <tr>
              <th class="text-sm text-center"><strong>NAME</strong></th>
              <th class="text-sm text-center"><strong>ADDRESS</strong></th>
              <th class="text-sm text-center">
                <strong>CONTACT NUMBER</strong>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(reference, index) in employee.references" :key="index">
              <td style="text-transform: uppercase" class="text-center">
                {{ reference.name }}
              </td>
              <td style="text-transform: uppercase" class="text-center">
                {{ reference.address }}
              </td>
              <td style="text-transform: uppercase" class="text-center">
                {{ reference.telephone_number }}
              </td>
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
