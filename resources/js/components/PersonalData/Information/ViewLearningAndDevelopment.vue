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
              <th class="text-sm">TRAINING PROGRAMS</th>
              <th class="text-sm">FROM</th>
              <th class="text-sm">TO</th>
              <th class="text-sm">NUMBES OF HOURS</th>
              <th class="text-sm">TYPE OF LD</th>
              <th class="text-sm">CONDUCTED</th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="(programAttained, index) in employee.program_attained"
              :key="index"
            >
              <td>{{ programAttained.title }}</td>
              <td>
                {{ programAttained.date_of_attendance_from }}
              </td>
              <td>{{ programAttained.date_of_attendance_to }}</td>
              <td>{{ programAttained.number_of_hours }}</td>
              <td>{{ programAttained.type_of_id }}</td>
              <td>{{ programAttained.sponsored_by }}</td>
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
