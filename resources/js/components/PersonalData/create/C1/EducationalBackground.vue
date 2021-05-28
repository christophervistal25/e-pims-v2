<template>
  <div class="card">
    <div
      class="card-header"
      :data-target="isComplete ? '#educationalBackground' : ''"
      :data-toggle="isComplete ? 'collapse' : ''"
      :style="isComplete ? 'cursor : pointer;' : ''"
    >
      <h5 class="mb-0 p-2">
        <i v-if="isComplete" class="fa fa-check text-success"></i>
        EDUCATIONAL BACKGROUND
        <i
          v-if="isComplete"
          class="text-success float-right fa fa-caret-down"
          aria-hidden="true"
        ></i>
      </h5>
    </div>
    <div
      class="collapse"
      :class="educational_background && !isComplete ? 'show' : ''"
      :id="isComplete ? 'educationalBackground' : ''"
    >
      <div class="p-3">
        <p>Indicate <strong>N/A </strong>if not applicable</p>
        <div
          class="alert alert-secondary text-center font-weight-bold"
          role="alert"
        >
          ELEMENTARY
        </div>
      </div>
      <div class="pl-3 pr-3 pb-3">
        <div class="row">
          <div class="col-lg-3">
            <label class="form-group has-float-label" for="elemNameSchool">
              <input
                type="text"
                id="elemNameSchool"
                class="form-control"
                v-model="educationalBackground.elementary"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span><strong>NAME OF SCHOOL</strong></span>
            </label>
          </div>

          <div class="col-lg-3">
            <label class="form-group has-float-label" for="ebasicEduc">
              <input
                type="text"
                id="ebasicEduc"
                class="form-control"
                v-model="educationalBackground.ebasicEduc"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span><strong>BASIC EDUCATION/DEGREE/COURSE</strong></span>
            </label>
          </div>

          <div class="col-lg-3">
            <label class="form-group has-float-label" for="eperiodFrom">
              <input
                type="month"
                id="eperiodFrom"
                class="form-control"
                v-model="educationalBackground.eperiodFrom"
                :class="
                  !errors.hasOwnProperty('eperiodFrom') ? '' : 'is-invalid'
                "
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <p class="text-danger text-sm">
                {{ errors.eperiodFrom }}
              </p>
              <span><strong>PERIOD OF ATTENDANCE (FROM)</strong></span>
            </label>
          </div>

          <div class="col-lg-3">
            <label class="form-group has-float-label" for="eperiodTo">
              <input
                type="month"
                id="eperiodTo"
                class="form-control"
                v-model="educationalBackground.eperiodTo"
                :class="!errors.hasOwnProperty('eperiodTo') ? '' : 'is-invalid'"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>PERIOD OF ATTENDANCE (TO)</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.eperiodTo }}
            </p>
          </div>
        </div>
        <div class="pr-3 pb-3 py-3">
          <div class="row">
            <div class="col-lg-4">
              <label class="form-group has-float-label" for="eunitEarned">
                <input
                  type="number"
                  id="eunitEarned"
                  class="form-control"
                  v-model="educationalBackground.eunitEarned"
                  style="outline: none; box-shadow: 0px 0px 0px transparent"
                />
                <span
                  ><strong
                    >HIGHEST LEVEL/UNIT EARNED (if not graduated)</strong
                  ></span
                >
              </label>
            </div>

            <div class="col-lg-2">
              <label class="form-group has-float-label mb-0" for="eyrGrad">
                <input
                  type="number"
                  id="eyrGrad"
                  class="form-control"
                  v-model="educationalBackground.eyrGrad"
                  @input="
                    if (educationalBackground.eyrGrad.length > yearMaxLength)
                      educationalBackground.eyrGrad = educationalBackground.eyrGrad.slice(
                        0,
                        yearMaxLength
                      );
                  "
                  :class="!errors.hasOwnProperty('eyrGrad') ? '' : 'is-invalid'"
                  style="outline: none; box-shadow: 0px 0px 0px transparent"
                />
                <span><strong>YEAR GRADUATED</strong></span>
              </label>
              <p class="text-danger text-sm">
                {{ errors.eyrGrad }}
              </p>
            </div>

            <div class="col-lg-6">
              <label class="form-group has-float-label" for="escholarship">
                <input
                  type="text"
                  id="escholarship"
                  class="form-control"
                  v-model="educationalBackground.escholarship"
                  style="text-transform:uppercase; outline; none; box-shadow: 0px 0px 0px transparent;"
                />
                <span
                  ><strong>SCHOLARSHIP/ACADEMIC HONORS RECEIVED</strong></span
                >
              </label>
            </div>
          </div>
        </div>
      </div>

      <hr />

      <div class="p-3">
        <div
          class="alert alert-secondary text-center font-weight-bold"
          role="alert"
        >
          SECONDARY
        </div>
      </div>
      <div class="pl-3 pr-3 pb-3">
        <div class="row">
          <div class="col-lg-3">
            <label class="form-group has-float-label" for="snameOfSchool">
              <input
                type="text"
                id="snameOfSchool"
                class="form-control"
                v-model="educationalBackground.snameOfSchool"
                style="text-transform:uppercase; outline; none; box-shadow: 0px 0px 0px transparent;"
              />
              <span><strong>NAME OF SCHOOL</strong></span>
            </label>
          </div>

          <div class="col-lg-3">
            <label class="form-group has-float-label" for="sbasicEduc">
              <input
                type="text"
                id="sbasicEduc"
                class="form-control"
                v-model="educationalBackground.sbasicEduc"
                style="text-transform:uppercase; outline; none; box-shadow: 0px 0px 0px transparent;"
              />
              <span><strong>BASIC EDUCATION/DEGREE/COURSE</strong></span>
            </label>
          </div>

          <div class="col-lg-3">
            <label class="form-group has-float-label" for="speriodFrom">
              <input
                type="month"
                id="speriodFrom"
                class="form-control"
                v-model="educationalBackground.speriodFrom"
                :class="
                  !errors.hasOwnProperty('speriodFrom') ? '' : 'is-invalid'
                "
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>PERIOD OF ATTENDANCE (FROM)</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.speriodFrom }}
            </p>
          </div>

          <div class="col-lg-3">
            <label class="form-group has-float-label" for="speriodTo">
              <input
                type="month"
                id="speriodTo"
                class="form-control"
                v-model="educationalBackground.speriodTo"
                :class="!errors.hasOwnProperty('speriodTo') ? '' : 'is-invalid'"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>PERIOD OF ATTENDANCE (TO)</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.speriodTo }}
            </p>
          </div>
        </div>
        <div class="pr-3 pb-3 py-3">
          <div class="row">
            <div class="col-lg-4">
              <label class="form-group has-float-label" for="sunitEarned">
                <input
                  type="number"
                  id="sunitEarned"
                  class="form-control"
                  v-model="educationalBackground.sunitEarned"
                  style="outline; none; box-shadow: 0px 0px 0px transparent;"
                />
                <span
                  ><strong
                    >HIGHEST LEVEL/UNIT EARNED (if not graduated)</strong
                  ></span
                >
              </label>
            </div>

            <div class="col-lg-2">
              <label class="form-group has-float-label mb-0" for="syrGrad">
                <input
                  type="number"
                  id="syrGrad"
                  class="form-control"
                  v-model="educationalBackground.syrGrad"
                  @input="
                    if (educationalBackground.syrGrad.length > yearMaxLength)
                      educationalBackground.syrGrad = educationalBackground.syrGrad.slice(
                        0,
                        yearMaxLength
                      );
                  "
                  :class="!errors.hasOwnProperty('syrGrad') ? '' : 'is-invalid'"
                  style="outline; none; box-shadow: 0px 0px 0px transparent;"
                />
                <span><strong>YEAR GRADUATED</strong></span>
              </label>
              <p class="text-danger text-sm">
                {{ errors.syrGrad }}
              </p>
            </div>

            <div class="col-lg-6">
              <label class="form-group has-float-label" for="sscholarship">
                <input
                  type="text"
                  id="sscholarship"
                  class="form-control"
                  v-model="educationalBackground.sscholarship"
                  style="text-transform:uppercase; outline; none; box-shadow: 0px 0px 0px transparent;"
                />
                <span
                  ><strong>SCHOLARSHIP/ACADEMIC HONORS RECEIVED</strong></span
                >
              </label>
            </div>
          </div>
        </div>
      </div>

      <hr />

      <div class="p-3">
        <div
          class="alert alert-secondary text-center font-weight-bold"
          role="alert"
        >
          VOCATIONAL / TRADE COURSE
        </div>
      </div>
      <div class="pl-3 pr-3 pb-3">
        <div class="row">
          <div class="col-lg-3">
            <label class="form-group has-float-label" for="vnameOfVoc">
              <input
                type="text"
                id="vnameOfVoc"
                class="form-control"
                v-model="educationalBackground.vnameOfVoc"
                style="text-transform:uppercase; outline; none; box-shadow: 0px 0px 0px transparent;"
              />
              <span><strong>NAME OF SCHOOL</strong></span>
            </label>
          </div>

          <div class="col-lg-3">
            <label class="form-group has-float-label" for="vbasicEduc">
              <input
                type="text"
                id="vbasicEduc"
                class="form-control"
                v-model="educationalBackground.vbasicEduc"
                style="text-transform:uppercase; outline; none; box-shadow: 0px 0px 0px transparent;"
              />
              <span><strong>BASIC EDUCATION/DEGREE/COURSE</strong></span>
            </label>
          </div>

          <div class="col-lg-3">
            <label class="form-group has-float-label" for="vperiodFrom">
              <input
                type="month"
                id="vperiodFrom"
                class="form-control"
                v-model="educationalBackground.vperiodFrom"
                :class="
                  !errors.hasOwnProperty('vperiodFrom') ? '' : 'is-invalid'
                "
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>PERIOD OF ATTENDANCE (FROM)</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.vperiodFrom }}
            </p>
          </div>
          <div class="col-lg-3">
            <label class="form-group has-float-label" for="vperiodTo">
              <input
                type="month"
                id="vperiodTo"
                class="form-control"
                v-model="educationalBackground.vperiodTo"
                :class="!errors.hasOwnProperty('vperiodTo') ? '' : 'is-invalid'"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>PERIOD OF ATTENDANCE (TO)</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.vperiodTo }}
            </p>
          </div>
        </div>
      </div>
      <div class="pl-3 pr-3 pb-3">
        <div class="row">
          <div class="col-lg-4">
            <label class="form-group has-float-label" for="vunitEarned">
              <input
                type="number"
                id="vunitEarned"
                class="form-control"
                v-model="educationalBackground.vunitEarned"
                style="outline; none; box-shadow: 0px 0px 0px transparent;"
              />
              <span
                ><strong
                  >HIGHEST LEVEL/UNIT EARNED (if not graduated)</strong
                ></span
              >
            </label>
          </div>

          <div class="col-lg-2">
            <label class="form-group has-float-label mb-0" for="vyrGrad">
              <input
                type="number"
                id="vyrGrad"
                class="form-control"
                v-model="educationalBackground.vyrGrad"
                @input="
                  if (educationalBackground.vyrGrad.length > yearMaxLength)
                    educationalBackground.vyrGrad = educationalBackground.vyrGrad.slice(
                      0,
                      yearMaxLength
                    );
                "
                :class="!errors.hasOwnProperty('vyrGrad') ? '' : 'is-invalid'"
                style="outline; none; box-shadow: 0px 0px 0px transparent;"
              />
              <span><strong>YEAR GRADUATED</strong></span>
            </label>
            <p class="text-danger text-sm">{{ errors.vyrGrad }}</p>
          </div>

          <div class="col-lg-6">
            <label class="form-group has-float-label" for="vscholarship">
              <input
                type="text"
                id="vscholarship"
                class="form-control"
                v-model="educationalBackground.vscholarship"
                style="text-transform:uppercase; outline; none; box-shadow: 0px 0px 0px transparent;"
              />
              <span><strong>SCHOLARSHIP/ACADEMIC HONORS RECEIVED</strong></span>
            </label>
          </div>
        </div>
      </div>

      <hr />

      <div class="p-3">
        <div
          class="alert alert-secondary text-center font-weight-bold"
          role="alert"
        >
          COLLEGE
        </div>
      </div>
      <div class="pl-3 pr-3 pb-3">
        <div class="row">
          <div class="col-lg-3">
            <label class="form-group has-float-label" for="cnameOfSchool">
              <input
                type="text"
                id="cnameOfSchool"
                class="form-control"
                v-model="educationalBackground.cnameOfSchool"
                style="text-transform:uppercase; outline; none; box-shadow: 0px 0px 0px transparent;"
              />
              <span><strong>NAME OF SCHOOL</strong></span>
            </label>
          </div>

          <div class="col-lg-3">
            <label class="form-group has-float-label" for="cbasicEduc">
              <input
                type="text"
                id="cbasicEduc"
                class="form-control"
                v-model="educationalBackground.cbasicEduc"
                style="text-transform:uppercase; outline; none; box-shadow: 0px 0px 0px transparent;"
              />
              <span><strong>BASIC EDUCATION/DEGREE/COURSE</strong></span>
            </label>
          </div>

          <div class="col-lg-3">
            <label class="form-group has-float-label" for="cperiodFrom">
              <input
                type="month"
                id="cperiodFrom"
                class="form-control"
                v-model="educationalBackground.cperiodFrom"
                :class="
                  !errors.hasOwnProperty('cperiodFrom') ? '' : 'is-invalid'
                "
                style="outline; none; box-shadow: 0px 0px 0px transparent;"
              />
              <span><strong>PERIOD OF ATTENDANCE (FROM)</strong></span>
            </label>
            <p class="text-danger">{{ errors.cperiodFrom }}</p>
          </div>
          <div class="col-lg-3">
            <label class="form-group has-float-label" for="cperiodTo">
              <input
                type="month"
                id="cperiodTo"
                class="form-control"
                v-model="educationalBackground.cperiodTo"
                :class="!errors.hasOwnProperty('cperiodTo') ? '' : 'is-invalid'"
                style="outline; none; box-shadow: 0px 0px 0px transparent;"
              />
              <span><strong>PERIOD OF ATTENDANCE (TO)</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.cperiodTo }}
            </p>
          </div>
        </div>
      </div>

      <div class="pl-3 pr-3 pb-3">
        <div class="row">
          <div class="col-lg-4">
            <label class="form-group has-float-label" for="cunitEarned">
              <input
                type="number"
                id="cunitEarned"
                class="form-control"
                v-model="educationalBackground.cunitEarned"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span
                ><strong
                  >HIGHEST LEVEL/UNIT EARNED (if not graduated)</strong
                ></span
              >
            </label>
          </div>

          <div class="col-lg-2">
            <label class="form-group has-float-label mb-0" for="cyrGrad">
              <input
                type="number"
                id="cyrGrad"
                class="form-control"
                v-model="educationalBackground.cyrGrad"
                @input="
                  if (educationalBackground.cyrGrad.length > yearMaxLength)
                    educationalBackground.cyrGrad = educationalBackground.cyrGrad.slice(
                      0,
                      yearMaxLength
                    );
                "
                :class="!errors.hasOwnProperty('cyrGrad') ? '' : 'is-invalid'"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>YEAR GRADUATED</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.cyrGrad }}
            </p>
          </div>

          <div class="col-lg-6">
            <label class="form-group has-float-label" for="cscholarship">
              <input
                type="text"
                id="cscholarship"
                class="form-control"
                v-model="educationalBackground.cscholarship"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span><strong>SCHOLARSHIP/ACADEMIC HONORS RECEIVED</strong></span>
            </label>
          </div>
        </div>
      </div>

      <hr />

      <div class="p-3">
        <div
          class="alert alert-secondary text-center font-weight-bold"
          role="alert"
        >
          GRADUATE STUDIES
        </div>
      </div>
      <div class="pl-3 pr-3 pb-3">
        <div class="row">
          <div class="col-lg-3">
            <label class="form-group has-float-label" for="gnameOfSchool">
              <input
                type="text"
                id="gnameOfSchool"
                class="form-control"
                v-model="educationalBackground.gnameOfSchool"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span><strong>NAME OF SCHOOL</strong></span>
            </label>
          </div>

          <div class="col-lg-3">
            <label class="form-group has-float-label" for="gbasicEduc">
              <input
                type="text"
                id="gbasicEduc"
                class="form-control"
                placeholder=""
                v-model="educationalBackground.gbasicEduc"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span><strong>BASIC EDUCATION/DEGREE/COURSE</strong></span>
            </label>
          </div>

          <div class="col-lg-3">
            <label class="form-group has-float-label" for="gperiodFrom">
              <input
                type="month"
                id="gperiodFrom"
                class="form-control"
                v-model="educationalBackground.gperiodFrom"
                :class="
                  !errors.hasOwnProperty('gperiodFrom') ? '' : 'is-invalid'
                "
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>PERIOD OF ATTENDANCE (FROM)</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.gperiodFrom }}
            </p>
          </div>
          <div class="col-lg-3">
            <label class="form-group has-float-label" for="gperiodTo">
              <input
                type="month"
                id="gperiodTo"
                class="form-control"
                v-model="educationalBackground.gperiodTo"
                :class="!errors.hasOwnProperty('gperiodTo') ? '' : 'is-invalid'"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>PERIOD OF ATTENDANCE (TO)</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.gperiodTo }}
            </p>
          </div>
        </div>
      </div>

      <div class="pl-3 pr-3 pb-3">
        <div class="row">
          <div class="col-lg-4">
            <label class="form-group has-float-label">
              <input
                type="number"
                class="form-control"
                v-model="educationalBackground.gunitEarned"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span
                ><strong
                  >HIGHEST LEVEL/UNIT EARNED (if not graduated)</strong
                ></span
              >
            </label>
          </div>

          <div class="col-lg-2">
            <label class="form-group has-float-label mb-0" for="gyrGrad">
              <input
                type="number"
                id="gyrGrad"
                class="form-control"
                v-model="educationalBackground.gyrGrad"
                @input="
                  if (educationalBackground.gyrGrad.length > yearMaxLength)
                    educationalBackground.gyrGrad = educationalBackground.gyrGrad.slice(
                      0,
                      yearMaxLength
                    );
                "
                :class="!errors.hasOwnProperty('gyrGrad') ? '' : 'is-invalid'"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>YEAR GRADUATED</strong></span>
            </label>
            <p class="text-danger text-sm">{{ errors.gyrGrad }}</p>
          </div>

          <div class="col-lg-6">
            <label class="form-group has-float-label">
              <input
                type="text"
                class="form-control"
                v-model="educationalBackground.gscholarship"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span><strong>SCHOLARSHIP/ACADEMIC HONORS RECEIVED</strong></span>
            </label>
          </div>
        </div>
      </div>
      <div class="float-right">
        <button
          class="btn btn-primary font-weight-bold mr-3 mb-2"
          @click="submitEducationalBackground"
          v-if="!isComplete"
          :disabled="isLoading"
        >
          NEXT
          <div
            class="spinner-border spinner-border-sm mb-1"
            role="status"
            v-show="isLoading"
          >
            <span class="sr-only">Loading...</span>
          </div>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    educational_background: {
      required: true,
    },
  },
  data() {
    return {
      //Educational Background Guide for properties
      // E- Elemementary => (sample : ebasicEduc)
      isComplete: false,
      isLoading: false,
      yearMaxLength: 4,
      educationalBackground: {
        employee_id: "",
        elementary: "",
        ebasicEduc: "",
        eperiodFrom: "",
        eperiodTo: "",
        eunitEarned: "",
        eyrGrad: "",
        escholarship: "",
        snameOfSchool: "",
        sbasicEduc: "",
        speriodFrom: "",
        speriodTo: "",
        sunitEarned: "",
        syrGrad: "",
        sscholarship: "",
        vnameOfVoc: "",
        vbasicEduc: "",
        vperiodFrom: "",
        vperiodTo: "",
        vunitEarned: "",
        vyrGrad: "",
        vscholarship: "",
        cnameOfSchool: "",
        cbasicEduc: "",
        cperiodFrom: "",
        cperiodTo: "",
        cunitEarned: "",
        cyrGrad: "",
        cscholarship: "",
        gnameOfSchool: "",
        gbasicEduc: "",
        gperiodFrom: "",
        gperiodTo: "",
        gunitEarned: "",
        gyrGrad: "",
        gscholarship: "",
      },
      errors: {},
    };
  },
  methods: {
    submitEducationalBackground() {
      this.isLoading = true;
      this.educationalBackground.employee_id = localStorage.getItem(
        "employee_id"
      );
      window.axios
        .post(
          "/employee/personal/educational/background/store",
          this.educationalBackground
        )
        .then((response) => {
          this.isLoading = false;
          this.isComplete = true;

          localStorage.setItem(
            "educational_background",
            JSON.stringify(response.data)
          );

          // When it's done call event listener
          this.$emit("next_tab");
        })
        .catch((error) => {
          this.isLoading = false;
          this.errors = {};
          if (error.response.status === 422) {
            Object.keys(error.response.data.errors).map((field, index) => {
              let [fieldMessage] = error.response.data.errors[field];
              this.errors[field] = fieldMessage;
            });
          }
        });
    },
  },
  mounted() {
    if (localStorage.getItem("educational_background")) {
      this.educationalBackground = JSON.parse(
        localStorage.getItem("educational_background")
      );
      this.isComplete = true;
    }
  },
};
</script>

<style></style>
