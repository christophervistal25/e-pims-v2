<template>
  <div>
    <div class="card-body">
      <div class="alert alert-warning text-center">
        <strong>CIVIL SERVICE ELIGIBILITY</strong>
      </div>
      <div class="table-responsive">
        <table class="table table-nowrap">
          <thead>
            <tr>
              <th class="text-sm text-center">
                <strong>CAREER SERVICE</strong>
              </th>
              <th class="text-sm text-center">
                <strong>DATE OF EXAMINATION</strong>
              </th>
              <th class="text-sm text-center">
                <strong>PLACE OF EXAMINATION</strong>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(exam, index) in employee.civil_service" :key="index">
              <td style="text-transform: uppercase" class="text-center">
                {{ exam.career_service }}
              </td>
              <td style="text-transform: uppercase" class="text-center">
                {{ exam.date_of_examination }}
              </td>
              <td style="text-transform: uppercase" class="text-center">
                {{ exam.place_of_examination }}
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
