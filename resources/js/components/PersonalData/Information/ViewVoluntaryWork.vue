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
              <th class="text-sm text-center">
                <strong>NAME OF ORGANIZATION</strong>
              </th>
              <th class="text-sm text-center"><strong>FROM</strong></th>
              <th class="text-sm text-center"><strong>TO</strong></th>
              <th class="text-sm text-center">
                <strong>NUMBER OF HOURS</strong>
              </th>
              <th class="text-sm text-center"><strong>POSITION</strong></th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="(voluntaryWork, index) in employee.voluntary_work"
              :key="index"
            >
              <td style="text-transform: uppercase" class="text-center">
                {{ voluntaryWork.name_and_address }}
              </td>
              <td style="text-transform: uppercase" class="text-center">
                {{ voluntaryWork.inclusive_date_from }}
              </td>
              <td style="text-transform: uppercase" class="text-center">
                {{ voluntaryWork.inclusive_date_to }}
              </td>
              <td style="text-transform: uppercase" class="text-center">
                {{ voluntaryWork.no_of_hours }}
              </td>
              <td style="text-transform: uppercase" class="text-center">
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
