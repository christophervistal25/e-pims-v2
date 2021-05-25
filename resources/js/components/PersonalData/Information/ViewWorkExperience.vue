<template>
  <div>
    <div class="card-body">
      <div class="alert alert-warning text-center">
        <strong>WORK EXPERIENCE</strong>
      </div>
      <div class="experience-box">
        <ul class="experience-list">
          <li
            v-for="(experience, index) in employee.work_experience"
            :key="index"
          >
            <div class="experience-user">
              <div class="before-circle"></div>
            </div>
            <div class="experience-content">
              <div class="timeline-content">
                <a href="#" class="name" style="text-transform: uppercase"
                  >{{ experience.position_title }} at {{ experience.office }}</a
                >
                <span class="time"
                  >{{ experience.from }} - {{ experience.to }}</span
                >
              </div>
            </div>
          </li>
        </ul>
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
