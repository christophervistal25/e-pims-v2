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
              <th class="text-sm">Government Issued ID</th>
              <th class="text-sm">ID/License/Passport No.</th>
              <th class="text-sm">Date/Place of Issuance</th>
            </tr>
          </thead>
          <tbody>
            <tr v-if="employee.issued_id">
              <td>{{ employee.issued_id.id_type }}</td>
              <td>{{ employee.issued_id.id_no }}</td>
              <td>{{ employee.issued_id.date }}</td>
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
