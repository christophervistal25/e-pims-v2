<template>
  <div>
    <exists-personal-information
      :employee="employee"
    ></exists-personal-information>

    <exists-family-background :employee="employee"></exists-family-background>

    <exists-educational-background
      :employee="employee"
    ></exists-educational-background>
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
