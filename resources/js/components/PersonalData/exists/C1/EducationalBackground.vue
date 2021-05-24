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
      :class="show_panel && !isComplete ? 'show' : ''"
      :id="isComplete ? 'educationalBackground' : ''"
    >
      <div class="p-3">
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
            <label>ELEMENTARY</label>
            <input
              type="text"
              class="form-control"
              placeholder="Name of School"
              v-model="personal_data.educational_background.elementary_name"
              style="text-transform: uppercase"
            />
          </div>

          <div class="col-lg-3">
            <label>BASIC EDUCATION/DEGREE/COURSE</label>
            <input
              type="text"
              class="form-control"
              placeholder=""
              v-model="
                personal_data.educational_background.elementary_education
              "
              style="text-transform: uppercase"
            />
          </div>

          <div class="col-lg-3">
            <label>PERIOD OF ATTENDANCE (FROM)</label>
            <input
              type="month"
              class="form-control"
              placeholder=""
              v-model="
                personal_data.educational_background.elementary_period_from
              "
              :class="!errors.hasOwnProperty('eperiodFrom') ? '' : 'is-invalid'"
            />
            <p class="text-danger text-sm">
              {{ errors.eperiodFrom }}
            </p>
          </div>

          <div class="col-lg-3">
            <label>PERIOD OF ATTENDANCE (TO)</label>
            <input
              type="month"
              class="form-control"
              placeholder=""
              v-model="
                personal_data.educational_background.elementary_period_to
              "
              :class="!errors.hasOwnProperty('eperiodTo') ? '' : 'is-invalid'"
            />
            <p class="text-danger text-sm">
              {{ errors.eperiodTo }}
            </p>
          </div>
        </div>
        <div class="pr-3 pb-3 py-3">
          <div class="row">
            <div class="col-lg-3">
              <label>HIGHEST LEVEL/ UNIT EARNED</label>
              <input
                type="number"
                class="form-control"
                placeholder="(if not graduated)"
                v-model="
                  personal_data.educational_background
                    .elementary_highest_level_units_earned
                "
              />
            </div>

            <div class="col-lg-3">
              <label>YEAR GRADUATED</label>
              <input
                type="number"
                class="form-control"
                placeholder=""
                v-model="
                  personal_data.educational_background.elementary_year_graduated
                "
                @input="
                  if (
                    personal_data.educational_background
                      .elementary_year_graduated.length > yearMaxLength
                  )
                    personal_data.educational_background.elementary_year_graduated = personal_data.educational_background.elementary_year_graduated.slice(
                      0,
                      yearMaxLength
                    );
                "
                :class="!errors.hasOwnProperty('eyrGrad') ? '' : 'is-invalid'"
              />
              <p class="text-danger text-sm">
                {{ errors.eyrGrad }}
              </p>
            </div>

            <div class="col-lg-6">
              <label>SCHOLARSHIP/ ACADEMIC HONORS RECEIVED</label>
              <input
                type="text"
                class="form-control"
                v-model="
                  personal_data.educational_background.elementary_scholarship
                "
                style="text-transform: uppercase"
              />
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
            <label>SECONDARY</label>
            <input
              type="text"
              class="form-control"
              placeholder="Name of School"
              v-model="personal_data.educational_background.secondary_name"
              style="text-transform: uppercase"
            />
          </div>

          <div class="col-lg-3">
            <label>BASIC EDUCATION/DEGREE/COURSE</label>
            <input
              type="text"
              class="form-control"
              placeholder=""
              v-model="personal_data.educational_background.secondary_education"
              style="text-transform: uppercase"
            />
          </div>

          <div class="col-lg-3">
            <label>PERIOD OF ATTENDANCE (FROM)</label>
            <input
              type="month"
              class="form-control"
              placeholder=""
              v-model="
                personal_data.educational_background.secondary_period_from
              "
              :class="!errors.hasOwnProperty('speriodFrom') ? '' : 'is-invalid'"
            />
            <p class="text-danger text-sm">
              {{ errors.speriodFrom }}
            </p>
          </div>

          <div class="col-lg-3">
            <label>PERIOD OF ATTENDANCE (TO)</label>
            <input
              type="month"
              class="form-control"
              placeholder=""
              v-model="personal_data.educational_background.secondary_period_to"
              :class="!errors.hasOwnProperty('speriodTo') ? '' : 'is-invalid'"
            />
            <p class="text-danger text-sm">
              {{ errors.speriodTo }}
            </p>
          </div>
        </div>
        <div class="pr-3 pb-3 py-3">
          <div class="row">
            <div class="col-lg-3">
              <label>HIGHEST LEVEL/ UNIT EARNED</label>
              <input
                type="number"
                class="form-control"
                placeholder="(if not graduated)"
                v-model="
                  personal_data.educational_background
                    .secondary_highest_level_units_earned
                "
              />
            </div>

            <div class="col-lg-3">
              <label>YEAR GRADUATED</label>
              <input
                type="number"
                class="form-control"
                placeholder=""
                v-model="
                  personal_data.educational_background
                    .secondary_highest_level_units_earned
                "
                @input="
                  if (
                    personal_data.educational_background
                      .secondary_highest_level_units_earned.length >
                    yearMaxLength
                  )
                    personal_data.educational_background.secondary_highest_level_units_earned = personal_data.educational_background.secondary_highest_level_units_earned.slice(
                      0,
                      yearMaxLength
                    );
                "
                :class="!errors.hasOwnProperty('syrGrad') ? '' : 'is-invalid'"
              />
              <p class="text-danger text-sm">
                {{ errors.syrGrad }}
              </p>
            </div>

            <div class="col-lg-6">
              <label>SCHOLARSHIP/ ACADEMIC HONORS RECEIVED</label>
              <input
                type="text"
                class="form-control"
                v-model="
                  personal_data.educational_background.secondary_scholarship
                "
                style="text-transform: uppercase"
              />
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
            <label>VOCATIONAL / TRADE COURSE</label>
            <input
              type="text"
              class="form-control"
              placeholder="Name of School"
              v-model="
                personal_data.educational_background
                  .vocational_trade_course_name
              "
              style="text-transform: uppercase"
            />
          </div>

          <div class="col-lg-3">
            <label>BASIC EDUCATION/DEGREE/COURSE</label>
            <input
              type="text"
              class="form-control"
              placeholder=""
              v-model="
                personal_data.educational_background.vocational_education
              "
              style="text-transform: uppercase"
            />
          </div>

          <div class="col-lg-3">
            <label>PERIOD OF ATTENDANCE (FROM)</label>
            <input
              type="month"
              class="form-control"
              placeholder=""
              v-model="
                personal_data.educational_background
                  .vocational_trade_course_period_from
              "
              :class="!errors.hasOwnProperty('vperiodFrom') ? '' : 'is-invalid'"
            />
            <p class="text-danger text-sm">
              {{ errors.vperiodFrom }}
            </p>
          </div>
          <div class="col-lg-3">
            <label>PERIOD OF ATTENDANCE (TO)</label>
            <input
              type="month"
              class="form-control"
              placeholder=""
              v-model="
                personal_data.educational_background
                  .vocational_trade_course_period_to
              "
              :class="!errors.hasOwnProperty('vperiodTo') ? '' : 'is-invalid'"
            />
            <p class="text-danger text-sm">
              {{ errors.vperiodTo }}
            </p>
          </div>
        </div>
      </div>
      <div class="pl-3 pr-3 pb-3">
        <div class="row">
          <div class="col-lg-3">
            <label>HIGHEST LEVEL/ UNIT EARNED</label>
            <input
              type="number"
              class="form-control"
              placeholder="(if not graduated)"
              v-model="
                personal_data.educational_background
                  .vocational_trade_course_highest_level_units_earned
              "
            />
          </div>

          <div class="col-lg-3">
            <label>YEAR GRADUATED</label>
            <input
              type="number"
              class="form-control"
              placeholder=""
              v-model="
                personal_data.educational_background
                  .vocational_trade_course_year_graduated
              "
              @input="
                if (
                  personal_data.educational_background
                    .vocational_trade_course_year_graduated.length >
                  yearMaxLength
                )
                  personal_data.educational_background.vocational_trade_course_year_graduated = personal_data.educational_background.vocational_trade_course_year_graduated.slice(
                    0,
                    yearMaxLength
                  );
              "
              :class="!errors.hasOwnProperty('vyrGrad') ? '' : 'is-invalid'"
            />
            <p class="text-danger text-sm">{{ errors.vyrGrad }}</p>
          </div>

          <div class="col-lg-6">
            <label>SCHOLARSHIP/ ACADEMIC HONORS RECEIVED</label>
            <input
              type="text"
              class="form-control"
              v-model="
                personal_data.educational_background
                  .vocational_trade_course_scholarship
              "
              style="text-transform: uppercase"
            />
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
            <label>COLLEGE</label>
            <input
              type="text"
              class="form-control"
              placeholder="Name of School"
              v-model="personal_data.educational_background.college_name"
              style="text-transform: uppercase"
            />
          </div>

          <div class="col-lg-3">
            <label>BASIC EDUCATION/DEGREE/COURSE</label>
            <input
              type="text"
              class="form-control"
              placeholder=""
              v-model="personal_data.educational_background.college_education"
              style="text-transform: uppercase"
            />
          </div>

          <div class="col-lg-3">
            <label>PERIOD OF ATTENDANCE (FROM)</label>
            <input
              type="month"
              class="form-control"
              placeholder=""
              v-model="personal_data.educational_background.college_period_from"
              :class="!errors.hasOwnProperty('cperiodFrom') ? '' : 'is-invalid'"
            />
            <p class="text-danger">{{ errors.cperiodFrom }}</p>
          </div>
          <div class="col-lg-3">
            <label>PERIOD OF ATTENDANCE (TO)</label>
            <input
              type="month"
              class="form-control"
              v-model="personal_data.educational_background.college_period_to"
              :class="!errors.hasOwnProperty('cperiodTo') ? '' : 'is-invalid'"
              placeholder=""
            />
            <p class="text-danger text-sm">
              {{ errors.cperiodTo }}
            </p>
          </div>
        </div>
      </div>

      <div class="pl-3 pr-3 pb-3">
        <div class="row">
          <div class="col-lg-3">
            <label>HIGHEST LEVEL/ UNIT EARNED</label>
            <input
              type="number"
              class="form-control"
              placeholder="(if not graduated)"
              v-model="
                personal_data.educational_background
                  .college_highest_level_units_earned
              "
            />
          </div>

          <div class="col-lg-3">
            <label>YEAR GRADUATED</label>
            <input
              type="number"
              class="form-control"
              placeholder=""
              v-model="
                personal_data.educational_background.college_year_graduated
              "
              @input="
                if (
                  personal_data.educational_background.college_year_graduated
                    .length > yearMaxLength
                )
                  personal_data.educational_background.college_year_graduated = personal_data.educational_background.college_year_graduated.slice(
                    0,
                    yearMaxLength
                  );
              "
              :class="!errors.hasOwnProperty('cyrGrad') ? '' : 'is-invalid'"
            />
            <p class="text-danger text-sm">
              {{ errors.cyrGrad }}
            </p>
          </div>

          <div class="col-lg-6">
            <label>SCHOLARSHIP/ ACADEMIC HONORS RECEIVED</label>
            <input
              type="text"
              class="form-control"
              v-model="personal_data.educational_background.college_scholarship"
              style="text-transform: uppercase"
            />
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
            <label>GRADUATE STUDIES</label>
            <input
              type="text"
              class="form-control"
              placeholder="Name of School"
              v-model="
                personal_data.educational_background.graduate_studies_name
              "
              style="text-transform: uppercase"
            />
          </div>

          <div class="col-lg-3">
            <label>BASIC EDUCATION/DEGREE/COURSE</label>
            <input
              type="text"
              class="form-control"
              placeholder=""
              v-model="
                personal_data.educational_background.graduate_studies_education
              "
              style="text-transform: uppercase"
            />
          </div>

          <div class="col-lg-3">
            <label>PERIOD OF ATTENDANCE (FROM)</label>
            <input
              type="month"
              class="form-control"
              placeholder=""
              v-model="
                personal_data.educational_background
                  .graduate_studies_period_from
              "
              :class="!errors.hasOwnProperty('gperiodFrom') ? '' : 'is-invalid'"
            />
            <p class="text-danger text-sm">
              {{ errors.gperiodFrom }}
            </p>
          </div>
          <div class="col-lg-3">
            <label>PERIOD OF ATTENDANCE (TO)</label>
            <input
              type="month"
              class="form-control"
              placeholder=""
              v-model="
                personal_data.educational_background.graduate_studies_period_to
              "
              :class="!errors.hasOwnProperty('gperiodTo') ? '' : 'is-invalid'"
            />
            <p class="text-danger text-sm">
              {{ errors.gperiodTo }}
            </p>
          </div>
        </div>
      </div>

      <div class="pl-3 pr-3 pb-3">
        <div class="row">
          <div class="col-lg-3">
            <label>HIGHEST LEVEL/ UNIT EARNED</label>
            <input
              type="number"
              class="form-control"
              placeholder="(if not graduated)"
              v-model="
                personal_data.educational_background
                  .graduate_studies_highest_level_units_earned
              "
            />
          </div>

          <div class="col-lg-3">
            <label>YEAR GRADUATED</label>
            <input
              type="number"
              class="form-control"
              placeholder=""
              v-model="
                personal_data.educational_background
                  .graduate_studies_year_graduated
              "
              @input="
                if (
                  personal_data.educational_background
                    .graduate_studies_year_graduated.length > yearMaxLength
                )
                  personal_data.educational_background.graduate_studies_year_graduated = personal_data.educational_background.graduate_studies_year_graduated.slice(
                    0,
                    yearMaxLength
                  );
              "
              :class="!errors.hasOwnProperty('gyrGrad') ? '' : 'is-invalid'"
            />
            <p class="text-danger text-sm">{{ errors.gyrGrad }}</p>
          </div>

          <div class="col-lg-6">
            <label>SCHOLARSHIP/ ACADEMIC HONORS RECEIVED</label>
            <input
              type="text"
              class="form-control"
              v-model="
                personal_data.educational_background
                  .graduate_studies_scholarship
              "
              style="text-transform: uppercase"
            />
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
    personal_data: {
      required: true,
    },
    show_panel: {
      required: true,
    },
  },
  data() {
    return {
      isComplete: false,
      isLoading: false,
      yearMaxLength: 4,
      errors: {},
    };
  },
  methods: {
    submitEducationalBackground() {
      this.isLoading = true;
      window.axios
        .post(
          "/employee/exists/personal/educational/background/store",
          this.personal_data
        )
        .then((response) => {
          this.isLoading = false;
          this.isComplete = true;
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
};
</script>

<style></style>
