<template>
  <div>
    <div class="">
      <label for="pagibigMidNo" class="form-group has-float-label">
        <input
          type="text"
          v-model="employee.username"
          class="form-control col-lg-12"
          :class="errors.hasOwnProperty('username') ? 'is-invalid' : ''"
        />
        <p class="text-danger text-sm">{{ errors.username }}</p>
        <span><strong>USERNAME</strong></span>
      </label>
    </div>
    <div class="">
      <label class="form-group has-float-label">
        <input
          type="text"
          v-model="employee.email"
          class="form-control col-lg-12"
          :class="errors.hasOwnProperty('email') ? 'is-invalid' : ''"
        />
        <p class="text-danger text-sm">{{ errors.email }}</p>
        <span><strong>EMAIL</strong></span>
      </label>
    </div>
    <div class="">
      <label class="form-group has-float-label">
        <input
          type="text"
          v-model="employee.password"
          class="form-control col-lg-12"
          :class="errors.hasOwnProperty('password') ? 'is-invalid' : ''"
        />
        <p class="text-danger text-sm">{{ errors.password }}</p>
        <span><strong>PASSWORD</strong></span>
      </label>
    </div>
    <div class="">
      <label class="form-group has-float-label">
        <input
          type="text"
          v-model="employee.retypePassword"
          class="form-control col-lg-12"
          :class="errors.hasOwnProperty('retypePassword') ? 'is-invalid' : ''"
        />
        <p class="text-danger text-sm">{{ errors.retypePassword }}</p>
        <span><strong>RE-TYPE PASSWORD</strong></span>
      </label>
    </div>
  </div>
</template>

<script>
export default {
  props: ["employee", "errors"],
};
</script>