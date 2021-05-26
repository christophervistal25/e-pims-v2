<template>
  <div>
    <div class="card-body rounded-0">
      <div class="row">
        <div class="col-md-12">
          <div class="profile-view">
            <div class="profile-img-wrap">
              <div class="profile-img">
                <img
                  :src="`/storage/employee_images/${
                    employee.information
                      ? employee.information.photo
                      : 'no_image.png'
                  }`"
                />
              </div>
            </div>
            <div class="profile-basic">
              <div class="row">
                <div class="col-md-5">
                  <div class="profile-info-left">
                    <h5 class="user-name m-t-0 mb-0">
                      {{ employee.fullname }}
                    </h5>
                    <div class="staff-id">
                      Position :
                      {{
                        employee.information && employee.information.position
                          ? employee.information.position.position_name
                          : "N/A"
                      }}
                    </div>
                    <div class="staff-id">
                      Employee ID :
                      {{ employee.employee_id }}
                    </div>

                    <div class="staff-id">
                      Join :
                      {{ employee.created_at }}
                    </div>
                  </div>
                </div>
                <div class="col-md-7">
                  <ul class="personal-info">
                    <li>
                      <div class="title">Phone:</div>
                      <div class="text">
                        <a href="">{{ employee.mobile_no || "-" }}</a>
                      </div>
                    </li>
                    <li>
                      <div class="title">Email:</div>
                      <div class="text">
                        <a
                          :href="
                            employee.email_address
                              ? `mail:to` + employee.email_address
                              : 'javascript::void(0)'
                          "
                          >{{ employee.email_address || "-" }}</a
                        >
                      </div>
                    </li>
                    <li>
                      <div class="title">Birthday:</div>
                      <div class="text">
                        {{ employee.date_birth || "-" }}
                      </div>
                    </li>
                    <li>
                      <div class="title">Permanent Address:</div>
                      <div class="text" style="text-transform: uppercase">
                        {{ `${employee.permanent_full_address}` }}
                      </div>
                    </li>
                    <li>
                      <div class="title">Gender:</div>
                      <div class="text text-uppercase">
                        {{ employee.sex || "-" }}
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
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
