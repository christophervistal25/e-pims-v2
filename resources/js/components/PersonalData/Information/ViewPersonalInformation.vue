<template>
  <div>
    <div class="card-body">
      <div class="alert alert-warning text-bold text-center" role="alert">
        <strong>PERSONAL INFORMATION</strong>
      </div>
      <ul class="personal-info">
        <div class="row">
          <div class="col-lg-6 title">Surname</div>
          <div class="text col-auto">
            <li>
              <div class="text">
                {{ employee.lastname || "N/A" }}
              </div>
            </li>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 title">First Name</div>
          <div class="text col-auto">
            <li>
              <div class="text">
                {{ employee.firstname || "N/A" }}
              </div>
            </li>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 title">Middle Name</div>
          <div class="text col-auto">
            <li>
              <div class="text">
                {{ employee.middlename || "N/A" }}
              </div>
            </li>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 title">Extension Name</div>
          <div class="text col-auto">
            <li>
              <div class="text">
                {{ employee.extension || "N/A" }}
              </div>
            </li>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 title">Date of Birth</div>
          <div class="col-auto">
            <li>
              <div class="text">
                {{ employee.date_birth || "N/A" }}
              </div>
            </li>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 title">Place of Birth</div>
          <div class="text col-auto">
            <li>
              <div class="text" style="text-transform: uppercase">
                {{ employee.place_birth || "N/A" }}
              </div>
            </li>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 title">Citizenship</div>
          <div class="col-auto">
            <li>
              <div class="text">
                {{ employee.citizenship || "N/A" }}
              </div>
            </li>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 title">Citizenship By</div>
          <div class="col-auto">
            <li>
              <div class="text">
                {{ employee.citizenship_by || "N/A" }}
              </div>
            </li>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 title">Country</div>
          <div class="col-auto">
            <li>
              <div class="text">
                {{ employee.indicate_country || "N/A" }}
              </div>
            </li>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 title">Sex</div>
          <div class="text col-6 text-uppercase">
            <li>
              <div class="text">
                {{ employee.sex || "N/A" }}
              </div>
            </li>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 title">Height</div>
          <div class="text col-auto">
            <li>
              <div class="text">
                {{ employee.height || "N/A" }}
              </div>
            </li>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 title">Weight</div>
          <div class="text col-auto">
            <li>
              <div class="text">
                {{ employee.weight || "N/A" }}
              </div>
            </li>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 title">Bloodtype</div>
          <div class="text col-auto">
            <li>
              <div class="text" style="text-transform: uppercase">
                {{ employee.blood_type || "N/A" }}
              </div>
            </li>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 title">Civil Status</div>
          <div class="text col-auto">
            <li>
              <div class="text">
                {{ employee.civil_status || "N/A" }}
              </div>
            </li>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 title">Telephone Number</div>
          <div class="text col-auto">
            <li>
              <div class="text">
                {{ employee.telephone_no || "N/A" }}
              </div>
            </li>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 title">Mobile Number</div>
          <div class="text col-auto">
            <li>
              <div class="text">
                {{ employee.mobile_no || "N/A" }}
              </div>
            </li>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 title">Email Address</div>
          <div class="text col-auto">
            <li>
              <div class="text">
                {{ employee.email_address || "N/A" }}
              </div>
            </li>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 title">Trans No</div>
          <div class="text col-auto">
            <li>
              <div class="text">
                {{ employee.trans_no || "N/A" }}
              </div>
            </li>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 title">Agency Employee No</div>
          <div class="text col-auto">
            <li>
              <div class="text">
                {{ employee.agency_employee_no || "N/A" }}
              </div>
            </li>
          </div>
        </div>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  props: ["employee"],
};
</script>

<style></style>
