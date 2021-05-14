<template>
  <div>
    <div class="card-body">
      <div class="alert alert-warning text-center">OTHER INFORMATION</div>
      <div class="table-responsive">
        <table class="table table-nowrap">
          <thead>
            <tr>
              <th class="text-sm">SPECIAL SKILLS and HOBBIES</th>
              <th class="text-sm">NON-ACADEMIC DISTINCTIONS/RECOGNITION</th>
              <th class="text-sm">MEMBERSHIP IN ASSOCIATION/ORGANIZATION</th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="(otherInformation, index) in employee.other_information"
              :key="index"
            >
              <td>{{ otherInformation.special_skill }}</td>
              <td>{{ otherInformation.non_academic }}</td>
              <td>{{ otherInformation.organization }}</td>
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
