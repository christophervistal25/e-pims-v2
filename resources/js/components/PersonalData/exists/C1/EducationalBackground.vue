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
        <p>Indicate <strong>N/A</strong> if not applicable</p>
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
                id="elemNameSchool"
                type="text"
                class="form-control"
                v-model="personal_data.educational_background.elementary_name"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span><strong>ELEMENTARY</strong></span>
            </label>
          </div>

          <div class="col-lg-3">
            <label class="form-group has-float-label" for="ebasicEduc">
              <input
                id="ebasicEduc"
                type="text"
                class="form-control"
                v-model="
                  personal_data.educational_background.elementary_education
                "
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
            <label for="eperiodFrom" class="form-group has-float-label mb-0">
              <input
                id="eperiodFrom"
                type="month"
                class="form-control"
                v-model="
                  personal_data.educational_background.elementary_period_from
                "
                :class="
                  !errors.hasOwnProperty('elementary_period_from')
                    ? ''
                    : 'is-invalid'
                "
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>PERIOD OF ATTENDANCE (FROM)</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.elementary_period_from }}
            </p>
          </div>

          <div class="col-lg-3">
            <label for="eperiodFrom" class="form-group has-float-label mb-0">
              <input
                id="eperiodTo"
                type="month"
                class="form-control"
                v-model="
                  personal_data.educational_background.elementary_period_to
                "
                :class="
                  !errors.hasOwnProperty('elementary_period_to')
                    ? ''
                    : 'is-invalid'
                "
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>PERIOD OF ATTENDANCE (TO)</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.elementary_period_to }}
            </p>
          </div>
        </div>
        <div class="pr-3 pb-3 py-3">
          <div class="row">
            <div class="col-lg-3">
              <label for="eunitEarned" class="form-group has-float-label">
                <input
                  id="eunitEarned"
                  type="number"
                  class="form-control"
                  v-model="
                    personal_data.educational_background
                      .elementary_highest_level_units_earned
                  "
                  style="outline: none; box-shadow: 0px 0px 0px transparent"
                />
                <span
                  ><strong
                    >HIGHEST LEVEL/ UNIT EARNED (if not graduated)</strong
                  ></span
                >
              </label>
            </div>

            <div class="col-lg-3">
              <label for="eyrGrad" class="form-group has-float-label mb-0">
                <input
                  id="eyrGrad"
                  type="number"
                  class="form-control"
                  style="outline: none; box-shadow: 0px 0px 0px transparent"
                  v-model="yearElementaryGraduated"
                  @input="
                    if (yearElementaryGraduated.length > yearMaxLength)
                      yearElementaryGraduated = yearElementaryGraduated.slice(
                        0,
                        yearMaxLength
                      );
                  "
                  :class="
                    !errors.hasOwnProperty('elementary_year_graduated')
                      ? ''
                      : 'is-invalid'
                  "
                />
                <span><strong>YEAR GRADUATED</strong></span>
              </label>
              <p class="text-danger text-sm">
                {{ errors.elementary_year_graduated }}
              </p>
            </div>

            <div class="col-lg-6">
              <label for="escholarship" class="form-group has-float-label">
                <input
                  id="escholarship"
                  type="text"
                  class="form-control"
                  v-model="
                    personal_data.educational_background.elementary_scholarship
                  "
                  style="
                    text-transform: uppercase;
                    outline: none;
                    box-shadow: 0px 0px 0px transparent;
                  "
                />
                <span
                  ><strong>SCHOLARSHIP/ ACADEMIC HONORS RECEIVED</strong></span
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
            <label for="snameOfSchool" class="form-group has-float-label">
              <input
                id="snameOfSchool"
                type="text"
                class="form-control"
                v-model="personal_data.educational_background.secondary_name"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span><strong>SECONDARY</strong></span>
            </label>
          </div>

          <div class="col-lg-3">
            <label for="sbasicEduc" class="form-group has-float-label">
              <input
                id="sbasicEduc"
                type="text"
                class="form-control"
                v-model="
                  personal_data.educational_background.secondary_education
                "
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
            <label for="speriodFrom" class="form-group has-float-label mb-0">
              <input
                id="speriodFrom"
                type="month"
                class="form-control"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
                v-model="
                  personal_data.educational_background.secondary_period_from
                "
                :class="
                  !errors.hasOwnProperty('secondary_period_from')
                    ? ''
                    : 'is-invalid'
                "
              />
              <span><strong>PERIOD OF ATTENDANCE (FROM)</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.secondary_period_from }}
            </p>
          </div>

          <div class="col-lg-3">
            <label for="speriodTo" class="form-group has-float-label mb-0">
              <input
                id="speriodTo"
                type="month"
                class="form-control"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
                v-model="
                  personal_data.educational_background.secondary_period_to
                "
                :class="
                  !errors.hasOwnProperty('secondary_period_to')
                    ? ''
                    : 'is-invalid'
                "
              />
              <span><strong>PERIOD OF ATTENDANCE (TO)</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.secondary_period_to }}
            </p>
          </div>
        </div>
        <div class="pr-3 pb-3 py-3">
          <div class="row">
            <div class="col-lg-3">
              <label for="sunitEarned" class="form-group has-float-label">
                <input
                  id="sunitEarned"
                  type="number"
                  style="outline: none; box-shadow: 0px 0px 0px transparent"
                  class="form-control"
                  v-model="
                    personal_data.educational_background
                      .secondary_highest_level_units_earned
                  "
                />
                <span
                  ><strong
                    >HIGHEST LEVEL/ UNIT EARNED (if not graduated)</strong
                  ></span
                >
              </label>
            </div>

            <div class="col-lg-3">
              <label for="syrGrad" class="form-group has-float-label mb-0">
                <input
                  id="syrGrad"
                  type="number"
                  class="form-control"
                  style="outline: none; box-shadow: 0px 0px 0px transparent"
                  v-model="yearSecondaryGraduated"
                  @input="
                    if (yearSecondaryGraduated.length > yearMaxLength)
                      yearSecondaryGraduated = yearSecondaryGraduated.slice(
                        0,
                        yearMaxLength
                      );
                  "
                  :class="
                    !errors.hasOwnProperty('secondary_year_graduated')
                      ? ''
                      : 'is-invalid'
                  "
                />
                <span><strong>YEAR GRADUATED</strong></span>
              </label>
              <p class="text-danger text-sm">
                {{ errors.secondary_year_graduated }}
              </p>
            </div>

            <div class="col-lg-6">
              <label for="sscholarship" class="form-group has-float-label">
                <input
                  style="
                    outline: none;
                    box-shadow: 0px 0px 0px transparent;
                    text-transform: uppercase;
                  "
                  type="text"
                  id="sscholarship"
                  class="form-control"
                  v-model="
                    personal_data.educational_background.secondary_scholarship
                  "
                />
                <span
                  ><strong>SCHOLARSHIP/ ACADEMIC HONORS RECEIVED</strong></span
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
            <label for="vanameOfVoc" class="form-group has-float-label">
              <input
                id="vanameOfVoc"
                type="text"
                class="form-control"
                v-model="
                  personal_data.educational_background
                    .vocational_trade_course_name
                "
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span><strong>VOCATIONAL / TRADE COURSE</strong></span>
            </label>
          </div>

          <div class="col-lg-3">
            <label for="vbasicEduc" class="form-group has-float-label">
              <input
                id="vbasicEduc"
                type="text"
                class="form-control"
                placeholder=""
                v-model="
                  personal_data.educational_background.vocational_education
                "
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
            <label for="vperiodFrom" class="form-group has-float-label mb-0">
              <input
                id="vperiodFrom"
                type="month"
                class="form-control"
                placeholder=""
                v-model="
                  personal_data.educational_background
                    .vocational_trade_course_period_from
                "
                :class="
                  !errors.hasOwnProperty('vocational_trade_course_period_from')
                    ? ''
                    : 'is-invalid'
                "
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>PERIOD OF ATTENDANCE (FROM)</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.vocational_trade_course_period_from }}
            </p>
          </div>
          <div class="col-lg-3">
            <label for="vperiodTo" class="form-group has-float-label mb-0">
              <input
                id="vperiodTo"
                type="month"
                class="form-control"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
                v-model="
                  personal_data.educational_background
                    .vocational_trade_course_period_to
                "
                :class="
                  !errors.hasOwnProperty('vocational_trade_course_period_to')
                    ? ''
                    : 'is-invalid'
                "
              />
              <span><strong>PERIOD OF ATTENDANCE (TO)</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.vocational_trade_course_period_to }}
            </p>
          </div>
        </div>
      </div>
      <div class="pl-3 pr-3 pb-3">
        <div class="row">
          <div class="col-lg-3">
            <label
              for="vunitEarn
            "
              class="form-group has-float-label"
            >
              <input
                type="number"
                class="form-control"
                v-model="
                  personal_data.educational_background
                    .vocational_trade_course_highest_level_units_earned
                "
                style="outline: none; box-shadow: 0px 0px 0px transparent"
              />
              <span><strong>HIGHEST LEVEL/ UNIT EARNED</strong></span>
            </label>
          </div>

          <div class="col-lg-3">
            <label for="vyrGrad" class="form-group has-float-label mb-0">
              <input
                id="vyrGrad"
                type="number"
                class="form-control"
                placeholder=""
                style="outline: none; box-shadow: 0px 0px 0px transparent"
                v-model="yearVocationalGraduated"
                @input="
                  if (yearVocationalGraduated.length > yearMaxLength)
                    yearVocationalGraduated = yearVocationalGraduated.slice(
                      0,
                      yearMaxLength
                    );
                "
                :class="
                  !errors.hasOwnProperty(
                    'vocational_trade_course_year_graduated'
                  )
                    ? ''
                    : 'is-invalid'
                "
              />
              <span><strong>YEAR GRADUATED</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.vocational_trade_course_year_graduated }}
            </p>
          </div>

          <div class="col-lg-6">
            <label for="vscholarhsip" class="form-group has-float-label">
              <input
                id="vscholarship"
                type="text"
                class="form-control"
                v-model="
                  personal_data.educational_background
                    .vocational_trade_course_scholarship
                "
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span
                ><strong>SCHOLARSHIP/ ACADEMIC HONORS RECEIVED</strong></span
              >
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
            <label for="cnameOfSchool" class="form-group has-float-label">
              <input
                id="canmeOfSchool"
                type="text"
                class="form-control"
                v-model="personal_data.educational_background.college_name"
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span><strong>COLLEGE</strong></span>
            </label>
          </div>

          <div class="col-lg-3">
            <label for="cbasicEdic" class="form-group has-float-label">
              <input
                id="cbasicEdic"
                type="text"
                class="form-control"
                placeholder=""
                v-model="personal_data.educational_background.college_education"
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
            <label for="cperiodFrom" class="form-group has-float-label mb-0">
              <input
                id="cperiodFrom"
                type="month"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
                class="form-control"
                placeholder=""
                v-model="
                  personal_data.educational_background.college_period_from
                "
                :class="
                  !errors.hasOwnProperty('college_period_from')
                    ? ''
                    : 'is-invalid'
                "
              />
              <span><strong>PERIOD OF ATTENDANCE (FROM)</strong></span>
            </label>
            <p class="text-danger text-sm">{{ errors.college_period_from }}</p>
          </div>
          <div class="col-lg-3">
            <label for="cperiodTo" class="form-group has-float-label mb-0">
              <input
                id="cperiodTo"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
                type="month"
                class="form-control"
                v-model="personal_data.educational_background.college_period_to"
                :class="
                  !errors.hasOwnProperty('college_period_to')
                    ? ''
                    : 'is-invalid'
                "
                placeholder=""
              />
              <span><strong>PERIOD OF ATTENDANCE (TO)</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.college_period_to }}
            </p>
          </div>
        </div>
      </div>

      <div class="pl-3 pr-3 pb-3">
        <div class="row">
          <div class="col-lg-3">
            <label for="cunitEarned" class="form-group has-float-label">
              <input
                id="cunitEarned"
                type="number"
                class="form-control"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
                v-model="
                  personal_data.educational_background
                    .college_highest_level_units_earned
                "
              />
              <span
                ><strong
                  >HIGHEST LEVEL/ UNIT EARNED (if not graduated)</strong
                ></span
              >
            </label>
          </div>

          <div class="col-lg-3">
            <label for="cyrGrad" class="form-group has-float-label mb-0">
              <input
                id="cyrGrad"
                type="number"
                class="form-control"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
                v-model="yearCollegeGraduated"
                @input="
                  if (yearCollegeGraduated.length > yearMaxLength)
                    yearCollegeGraduated = yearCollegeGraduated.slice(
                      0,
                      yearMaxLength
                    );
                "
                :class="
                  !errors.hasOwnProperty('college_year_graduated')
                    ? ''
                    : 'is-invalid'
                "
              />
              <span><strong>YEAR GRADUATED</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.college_year_graduated }}
            </p>
          </div>

          <div class="col-lg-6">
            <label for="cscholarship" class="form-group has-float-label">
              <input
                id="cscholarship"
                type="text"
                class="form-control"
                v-model="
                  personal_data.educational_background.college_scholarship
                "
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span
                ><strong>SCHOLARSHIP/ ACADEMIC HONORS RECEIVED</strong></span
              >
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
            <label for="gnameOfSchool" class="form-group has-float-label">
              <input
                id="gnameOfSchool"
                type="text"
                class="form-control"
                v-model="
                  personal_data.educational_background.graduate_studies_name
                "
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span><strong>GRADUATE STUDIES</strong></span>
            </label>
          </div>

          <div class="col-lg-3">
            <label for="gbasicEduc" class="form-group has-float-label">
              <input
                id="gbasicEduc"
                type="text"
                class="form-control"
                placeholder=""
                v-model="
                  personal_data.educational_background
                    .graduate_studies_education
                "
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
            <label for="gperiodFrom" class="form-group has-float-label mb-0">
              <input
                id="gperiodFrom"
                type="month"
                class="form-control"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
                v-model="
                  personal_data.educational_background
                    .graduate_studies_period_from
                "
                :class="
                  !errors.hasOwnProperty('graduate_studies_period_from')
                    ? ''
                    : 'is-invalid'
                "
              />
              <span><strong>PERIOD OF ATTENDANCE (FROM)</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.graduate_studies_period_from }}
            </p>
          </div>
          <div class="col-lg-3">
            <label for="gperiodTo" class="form-group has-float-label mb-0">
              <input
                id="gperiodTo"
                type="month"
                class="form-control"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
                v-model="
                  personal_data.educational_background
                    .graduate_studies_period_to
                "
                :class="
                  !errors.hasOwnProperty('graduate_studies_period_to')
                    ? ''
                    : 'is-invalid'
                "
              />
              <span><strong>PERIOD OF ATTENDANCE (TO)</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.graduate_studies_period_to }}
            </p>
          </div>
        </div>
      </div>

      <div class="pl-3 pr-3 pb-3">
        <div class="row">
          <div class="col-lg-3">
            <label for="gunitEarned" class="form-group has-float-label">
              <input
                id="gunitEarned"
                type="number"
                class="form-control"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
                v-model="
                  personal_data.educational_background
                    .graduate_studies_highest_level_units_earned
                "
              />
              <span><strong>HIGHEST LEVEL/ UNIT EARNED</strong></span>
            </label>
          </div>

          <div class="col-lg-3">
            <label for="gyrGrad" class="form-group has-float-label mb-0">
              <input
                id="gyrGrad"
                type="number"
                class="form-control"
                style="outline: none; box-shadow: 0px 0px 0px transparent"
                v-model="yearGraduated"
                @input="
                  if (yearGraduated.length > yearMaxLength)
                    yearGraduated = yearGraduated.slice(0, yearMaxLength);
                "
                :class="
                  !errors.hasOwnProperty('graduate_studies_year_graduated')
                    ? ''
                    : 'is-invalid'
                "
              />
              <span><strong>YEAR GRADUATED</strong></span>
            </label>
            <p class="text-danger text-sm">
              {{ errors.graduate_studies_year_graduated }}
            </p>
          </div>

          <div class="col-lg-6">
            <label for="gscholarship" class="form-group has-float-label">
              <input
                id="gscholarship"
                type="text"
                class="form-control"
                v-model="
                  personal_data.educational_background
                    .graduate_studies_scholarship
                "
                style="
                  text-transform: uppercase;
                  outline: none;
                  box-shadow: 0px 0px 0px transparent;
                "
              />
              <span
                ><strong>SCHOLARSHIP/ ACADEMIC HONORS RECEIVED</strong></span
              >
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
      yearGraduated: "",
      yearCollegeGraduated: "",
      yearVocationalGraduated: "",
      yearSecondaryGraduated: "",
      yearElementaryGraduated: "",
      errors: {},
    };
  },
  methods: {
    submitEducationalBackground() {
      this.isLoading = true;

      this.personal_data.educational_background.graduate_studies_year_graduated = this.yearGraduated;
      this.personal_data.educational_background.college_year_graduated = this.yearCollegeGraduated;
      this.personal_data.educational_background.vocational_trade_course_year_graduated = this.yearVocationalGraduated;
      this.personal_data.educational_background.secondary_year_graduated = this.yearSecondaryGraduated;
      this.personal_data.educational_background.elementary_year_graduated = this.yearElementaryGraduated;

      window.axios
        .post(
          "/employee/exists/personal/educational/background/store",
          this.personal_data.educational_background
        )
        .then((response) => {
          this.isLoading = false;
          this.isComplete = true;
          this.errors = {};
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
  created() {
    if (!this.personal_data.educational_background) {
      this.personal_data.educational_background = {
        employee_id: this.personal_data.employee_id,
        elementary_name: "",
        elementary_education: "",
        elementary_period_from: "",
        elementary_period_to: "",
        elementary_highest_level_units_earned: "",
        elementary_year_graduated: "",
        elementary_scholarship: "",
        secondary_name: "",
        secondary_education: "",
        secondary_period_from: "",
        secondary_period_to: "",
        secondary_highest_level_units_earned: "",
        secondary_year_graduated: "",
        secondary_scholarship: "",
        vocational_trade_course_name: "",
        vocational_education: "",
        vocational_trade_course_period_from: "",
        vocational_trade_course_period_to: "",
        vocational_trade_course_highest_level_units_earned: "",
        vocational_trade_course_year_graduated: "",
        vocational_trade_course_scholarship: "",
        college_name: "",
        college_education: "",
        college_period_from: "",
        college_period_to: "",
        college_highest_level_units_earned: "",
        college_year_graduated: "",
        college_scholarship: "",
        graduate_studies_name: "",
        graduate_studies_education: "",
        graduate_studies_period_from: "",
        graduate_studies_period_to: "",
        graduate_studies_highest_level_units_earned: "",
        graduate_studies_year_graduated: "",
        graduate_studies_scholarship: "",
      };
    } else {
      this.yearGraduated = this.personal_data.educational_background.graduate_studies_year_graduated;
      this.yearCollegeGraduated = this.personal_data.educational_background.college_year_graduated;
      this.yearVocationalGraduated = this.personal_data.educational_background.vocational_trade_course_year_graduated;
      this.yearSecondaryGraduated = this.personal_data.educational_background.secondary_year_graduated;
      this.yearElementaryGraduated = this.personal_data.educational_background.elementary_year_graduated;
    }
  },
};
</script>

<style></style>
