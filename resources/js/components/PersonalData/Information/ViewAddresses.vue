<template>
  <div>
    <div class="card-body">
      <div class="alert alert-warning text-center" role="alert">
        <strong>ADDRESS</strong>
      </div>
      <hr />
      <h5 class="section-title text-center text-sm">
        <strong>RESIDENTIAL ADDRESS</strong>
      </h5>
      <hr />
      <ul class="personal-info">
        <div class="row">
          <div class="col-lg-6 title">Residential House No</div>
          <div class="col-lg-auto">
            <li>
              <div class="text" style="text-transform: uppercase">
                {{ employee.residential_house_no || "N/A" }}
              </div>
            </li>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6 title">Residential Street</div>
          <div class="col-lg-auto">
            <li>
              <div class="text" style="text-transform: uppercase">
                {{ employee.residential_street || "N/A" }}
              </div>
            </li>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6 title">Residential Village</div>
          <div class="col-lg-auto">
            <li>
              <div class="text" style="text-transform: uppercase">
                {{ employee.residential_village || "N/A" }}
              </div>
            </li>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6 title">Residential Province</div>
          <div class="col-lg-auto">
            <li>
              <div class="text">
                {{ employee.residential_province_text || "N/A" }}
              </div>
            </li>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 title">Residential City</div>
          <div class="col-lg-auto">
            <li>
              <div class="text">
                {{ employee.residential_city_text || "N/A" }}
              </div>
            </li>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6 title">Residential Barangay</div>
          <div class="col-lg-auto">
            <li>
              <div class="text">
                {{ employee.residential_barangay_text || "N/A" }}
              </div>
            </li>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6 title">Residential Zip Code</div>
          <div class="col-lg-auto">
            <li>
              <div class="text">
                {{ employee.residential_zip_code || "N/A" }}
              </div>
            </li>
          </div>
        </div>
      </ul>

      <hr />
      <h5 class="section-title text-center text-sm">
        <strong>PERMANENT ADDRESS</strong>
      </h5>
      <hr />

      <ul class="personal-info">
        <div class="row">
          <div class="col-lg-6 title">Permanent House No</div>
          <div class="col-lg-auto">
            <li>
              <div class="text" style="text-transform: uppercase">
                {{ employee.permanent_house_no || "N/A" }}
              </div>
            </li>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6 title">Permanent Street</div>
          <div class="col-lg-auto">
            <li>
              <div class="text" style="text-transform: uppercase">
                {{ employee.permanent_street || "N/A" }}
              </div>
            </li>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6 title">Permanent Village</div>
          <div class="col-lg-auto">
            <li>
              <div class="text" style="text-transform: uppercase">
                {{ employee.permanent_village || "N/A" }}
              </div>
            </li>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6 title">Permanent Province</div>
          <div class="col-lg-auto">
            <li>
              <div class="text">
                {{ employee.permanent_province_text || "N/A" }}
              </div>
            </li>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 title">Permanent City</div>
          <div class="col-lg-auto">
            <li>
              <div class="text">
                {{ employee.permanent_city_text || "N/A" }}
              </div>
            </li>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6 title">Permanent Barangay</div>
          <div class="col-lg-auto">
            <li>
              <div class="text">
                {{ employee.permanent_barangay_text || "N/A" }}
              </div>
            </li>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6 title">Permanent Zip Code</div>
          <div class="col-lg-auto">
            <li>
              <div class="text">
                {{ employee.permanent_zip_code || "N/A" }}
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
  props: {
    employee: {
      required: true,
      type: Object,
    },
  },
};
</script>

<style></style>
