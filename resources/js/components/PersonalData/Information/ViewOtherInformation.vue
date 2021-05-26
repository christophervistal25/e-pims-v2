<template>
  <div>
    <div class="card-body">
      <div class="alert alert-warning text-center">
        <strong>OTHER INFORMATION</strong>
      </div>
      <div class="table-responsive">
        <table class="table table-nowrap">
          <thead>
            <tr>
              <th class="text-sm text-center">
                <strong>SPECIAL SKILLS and HOBBIES</strong>
              </th>
              <th class="text-sm text-center">
                <strong>NON-ACADEMIC DISTINCTIONS/RECOGNITION</strong>
              </th>
              <th class="text-sm text-center">
                <strong>MEMBERSHIP IN ASSOCIATION/ORGANIZATION</strong>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="(otherInformation, index) in employee.other_information"
              :key="index"
            >
              <td style="text-transform: uppercase" class="text-center">
                {{ otherInformation.special_skill }}
              </td>
              <td style="text-transform: uppercase" class="text-center">
                {{ otherInformation.non_academic }}
              </td>
              <td style="text-transform: uppercase" class="text-center">
                {{ otherInformation.organization }}
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
