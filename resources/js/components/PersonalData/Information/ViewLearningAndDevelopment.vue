<template>
  <div>
    <div class="card-body">
      <div class="alert alert-warning text-center">
        <strong
          >LEARNING AND DEVELOPMENT (L&amp;D) INTERVENTIONS/TRAINING PROGRAMS
          ATTENDED</strong
        >
      </div>

      <div class="table-responsive">
        <table class="table table-nowrap">
          <thead>
            <tr>
              <th class="text-sm text-center">
                <strong>TRAINING PROGRAMS</strong>
              </th>
              <th class="text-sm text-center"><strong>FROM</strong></th>
              <th class="text-sm text-center"><strong>TO</strong></th>
              <th class="text-sm"><strong>NUMBES OF HOURS</strong></th>
              <th class="text-sm text-center"><strong>TYPE OF LD</strong></th>
              <th class="text-sm text-center"><strong>CONDUCTED</strong></th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="(programAttained, index) in employee.program_attained"
              :key="index"
            >
              <td style="text-transform: uppercase" class="text-center">
                {{ programAttained.title }}
              </td>
              <td style="text-transform: uppercase" class="text-center">
                {{ programAttained.date_of_attendance_from }}
              </td>
              <td style="text-transform: uppercase" class="text-center">
                {{ programAttained.date_of_attendance_to }}
              </td>
              <td style="text-transform: uppercase" class="text-center">
                {{ programAttained.number_of_hours }}
              </td>
              <td style="text-transform: uppercase" class="text-center">
                {{ programAttained.type_of_id }}
              </td>
              <td style="text-transform: uppercase" class="text-center">
                {{ programAttained.sponsored_by }}
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
