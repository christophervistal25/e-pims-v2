<template>
  <div>
    <div class="card-body">
      <div class="alert alert-warning text-center">
        <strong>VOLUTARY WORK</strong>
      </div>
      <div class="table-responsive">
        <table class="table table-nowrap">
          <thead>
            <tr>
              <th class="text-sm">NAME OF ORGANIZATION</th>
              <th class="text-sm">FROM</th>
              <th class="text-sm">TO</th>
              <th class="text-sm">NUMBER OF HOURS</th>
              <th class="text-sm">POSITION</th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="(voluntaryWork, index) in employee.voluntary_work"
              :key="index"
            >
              <td style="text-transform: uppercase">
                {{ voluntaryWork.name_and_address }}
              </td>
              <td style="text-transform: uppercase">
                {{ voluntaryWork.inclusive_date_from }}
              </td>
              <td style="text-transform: uppercase">
                {{ voluntaryWork.inclusive_date_to }}
              </td>
              <td style="text-transform: uppercase">
                {{ voluntaryWork.no_of_hours }}
              </td>
              <td style="text-transform: uppercase">
                {{ voluntaryWork.position }}
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
