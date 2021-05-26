<template>
  <div>
    <div class="card-body">
      <div class="alert alert-warning text-center" role="alert">
        <strong>GOVERNMENT ISSUED ID</strong>
      </div>
      <div class="table-responsive">
        <table class="table table-nowrap">
          <thead>
            <tr>
              <th class="text-sm text-center">
                <strong>GOVERNMENT ISSUED ID</strong>
              </th>
              <th class="text-sm text-center">
                <strong>ID/LICENSE/PASSPORT NO.</strong>
              </th>
              <th class="text-sm text-center">
                <strong>DATE/PLACE OF ISSUANCE</strong>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr v-if="employee.issued_id">
              <td style="text-transform: uppercase" class="text-center">
                {{ employee.issued_id.id_type }}
              </td>
              <td style="text-transform: uppercase" class="text-center">
                {{ employee.issued_id.id_no }}
              </td>
              <td style="text-transform: uppercase" class="text-center">
                {{ employee.issued_id.date }}
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
