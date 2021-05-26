<template>
  <div>
    <div class="card-body">
      <div class="alert alert-warning text-center">
        <strong>FAMILY BACKGROUND</strong>
      </div>
      <div class="table-responsive">
        <table class="table table-nowrap" v-if="employee.family_background">
          <thead>
            <tr>
              <th><strong>Name</strong></th>
              <th><strong>Relationship</strong></th>
            </tr>
          </thead>
          <tbody>
            <tr v-if="employee.family_background">
              <td class="text-capitalize">
                {{ employee.family_background.mother_firstname }}
                {{ employee.family_background.mother_middlename }}
                {{ employee.family_background.mother_lastname }}
                {{ employee.family_background.mother_extension }}
              </td>
              <td>
                {{
                  employee.family_background.mother_lastname ? "Mother" : " "
                }}
              </td>
            </tr>

            <tr v-if="employee.family_background">
              <td class="text-capitalize">
                {{ employee.family_background.father_firstname }}
                {{ employee.family_background.father_middlename }}
                {{ employee.family_background.father_lastname }}
                {{ employee.family_background.father_extension }}
              </td>
              <td>
                {{
                  employee.family_background.father_firstname ? "Father" : " "
                }}
              </td>
            </tr>

            <tr v-if="employee.family_background">
              <td class="text-capitalize">
                {{ employee.family_background.spouse_firstname }}
                {{ employee.family_background.spouse_middlename }}
                {{ employee.family_background.spouse_lastname }}
                {{ employee.family_background.spouse_extension }}
              </td>
              <td v-if="employee.family_background.spouse_lastname">
                {{
                  employee.family_background.spouse_lastname ? "Spouse" : " "
                }}
              </td>
            </tr>

            <tr v-for="(child, index) in employee.spouse_child" :key="index">
              <td>{{ child.name }}</td>
              <td>Child</td>
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
