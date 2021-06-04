<template>
  <div>
    <div class="card">
      <div
        class="card-header"
        :data-target="isComplete ? '#relevantQueries' : ''"
        :data-toggle="isComplete ? 'collapse' : ''"
        :style="isComplete ? 'cursor : pointer;' : ''"
      >
        <h5 class="mb-0 p-2">
          <i v-if="isComplete" class="fa fa-check text-success"></i>
          RELEVANT QUERIES
          <i
            v-if="isComplete"
            class="text-success float-right fa fa-caret-down"
            aria-hidden="true"
          ></i>
        </h5>
      </div>

      <div
        class="collapse"
        :class="!isComplete ? 'show' : ''"
        :id="isComplete ? 'relevantQueries' : ''"
      >
        <div class="card-body">
          <!-- {{-- BEGIN CONTENT OF RELEVANT QUERIES --}} -->
          <table class="table table-bordered">
            <!-- {{-- BEGIN OF DATA --}} -->

            <!-- {{-- BEGIN OF 34 --}} -->
            <tr>
              <td style="background: #eaeaea" class="text-left">
                <span class="text-sm">
                  34. Are you related by consanguinity or affinity to the
                  appointing or recommending authority, or to the chief of
                  bureau or office or to the person who has immediate
                  supervision over you in the Office, Bureau or Department where
                  you will be apppointed,
                </span>
              </td>
              <td colspan="3"></td>
            </tr>

            <tr>
              <td
                scope="row"
                style="background: #eaeaea"
                :class="
                  errors.hasOwnProperty('question_34_a_answer') ||
                  errors.hasOwnProperty('question_34_a_details')
                    ? 'bg-danger text-white'
                    : 'text-dark'
                "
                class="border-0"
              >
                <span class="ml-4 text-sm">
                  <i
                    v-if="
                      errors.hasOwnProperty('question_34_a_answer') ||
                      errors.hasOwnProperty('question_34_a_details')
                    "
                    class="fa fa-times text-white"
                    aria-hidden="true"
                  ></i>
                  a. within the third degree?</span
                >
              </td>
              <td @click="markYes('question_34_a')">
                <div class="form-check">
                  <input
                    id="yes_34_a"
                    type="radio"
                    value="yes"
                    class="form-check-input"
                    v-model="relevantQueries.question_34_a_answer"
                  />
                  <label for="yes_34_a" class="form-check-label pr-2 text-sm">
                    YES
                  </label>
                </div>
              </td>
              <td @click="markNo('question_34_a')">
                <div class="form-check">
                  <input
                    type="radio"
                    value="no"
                    id="no_a_34"
                    class="form-check-input"
                    v-model="relevantQueries.question_34_a_answer"
                  />
                  <label class="form-check-label pr-2" for="no_a_34">NO</label>
                </div>
              </td>
              <td class="w-25">
                <div class="form-check">
                  <input
                    type="text"
                    class="form-control"
                    :class="
                      errors.hasOwnProperty('question_34_a_details')
                        ? 'is-invalid'
                        : ''
                    "
                    :readonly="relevantQueries.question_34_a_answer !== 'yes'"
                    v-model="relevantQueries.question_34_a_details"
                    placeholder="If YES, then give details"
                  />
                </div>
              </td>
            </tr>
            <tr>
              <td
                scope="row"
                style="background: #eaeaea"
                :class="
                  errors.hasOwnProperty('question_34_b_answer') ||
                  errors.hasOwnProperty('question_34_b_details')
                    ? 'bg-danger text-white'
                    : 'text-dark'
                "
                class="border-0"
              >
                <span class="ml-4 text-sm">
                  <i
                    v-if="
                      errors.hasOwnProperty('question_34_b_answer') ||
                      errors.hasOwnProperty('question_34_b_details')
                    "
                    class="fa fa-times text-white"
                    aria-hidden="true"
                  ></i>
                  b. within the fourth degree (for Local Government Unit -
                  Career Employees)?</span
                >
              </td>
              <td class="" @click="markYes('question_34_b')">
                <div class="form-check">
                  <input
                    id="yes_34_b"
                    type="radio"
                    class="form-check-input"
                    value="yes"
                    v-model="relevantQueries.question_34_b_answer"
                  />
                  <label class="form-check-label pr-2" for="yes_b_34"
                    >YES</label
                  >
                </div>
              </td>
              <td @click="markNo('question_34_b')">
                <div class="form-check">
                  <input
                    type="radio"
                    class="form-check-input"
                    value="no"
                    id="no_34_b"
                    v-model="relevantQueries.question_34_b_answer"
                  />
                  <label class="form-check-label pr-2" for="no_34_b">NO</label>
                </div>
              </td>
              <td class="w-25">
                <div class="form-check">
                  <input
                    type="text"
                    class="form-control"
                    :class="
                      errors.hasOwnProperty('question_34_b_details')
                        ? 'is-invalid'
                        : ''
                    "
                    placeholder="If YES, then give details"
                    :readonly="relevantQueries.question_34_b_answer !== 'yes'"
                    v-model="relevantQueries.question_34_b_details"
                  />
                </div>
              </td>
            </tr>
            <!-- {{-- END OF 34 --}} -->

            <!-- {{-- BEGIN OF 35 --}} -->
            <tr>
              <td
                style="background: #eaeaea"
                class="text-sm border-0"
                :class="
                  errors.hasOwnProperty('no_35_a') ||
                  errors.hasOwnProperty('no_35_a_details')
                    ? 'bg-danger text-white'
                    : 'text-dark'
                "
              >
                <i
                  v-if="
                    errors.hasOwnProperty('question_35_a') ||
                    errors.hasOwnProperty('question_35_a_details')
                  "
                  class="fa fa-times text-white"
                  aria-hidden="true"
                ></i>
                35. a. Have you ever been found guilty of any administrative
                offense?
              </td>
              <td v-on:click="markYes('question_35_a')">
                <div class="form-check">
                  <input
                    type="radio"
                    class="form-check-input"
                    v-model="relevantQueries.question_35_a_answer"
                    value="yes"
                    id="yes_35_a"
                  />
                  <label class="form-check-label pr-2" for="yes_35_a">
                    YES
                  </label>
                </div>
              </td>
              <td v-on:click="markNo('question_35_a')">
                <div class="form-check">
                  <input
                    type="radio"
                    class="form-check-input"
                    value="no"
                    id="no_35_a"
                    v-model="relevantQueries.question_35_a_answer"
                  />
                  <label class="form-check-label pr-2" for="no_35_a">NO</label>
                </div>
              </td>
              <td class="w-25">
                <div class="form-check">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="If YES, then give details"
                    :class="
                      errors.hasOwnProperty('no_35_a_details')
                        ? 'is-invalid'
                        : ''
                    "
                    :readonly="relevantQueries.question_35_a_answer !== 'yes'"
                    v-model="relevantQueries.question_35_a_details"
                  />
                </div>
              </td>
            </tr>

            <tr>
              <td
                scope="row"
                style="background: #eaeaea"
                class="border-0"
                :class="
                  errors.hasOwnProperty('question_35_b_answer') ||
                  errors.hasOwnProperty('question_35_b_details') ||
                  errors.hasOwnProperty('question_35_b_date_filled') ||
                  errors.hasOwnProperty('question_35_b_status_of_cases')
                    ? 'bg-danger text-white'
                    : 'text-dark'
                "
              >
                <span class="ml-4 text-sm">
                  <i
                    v-if="
                      errors.hasOwnProperty('question_35_b_answer') ||
                      errors.hasOwnProperty('question_35_b_details') ||
                      errors.hasOwnProperty('question_35_b_date_filled') ||
                      errors.hasOwnProperty('question_35_b_status_of_cases')
                    "
                    class="fa fa-times text-white"
                    aria-hidden="true"
                  ></i>
                  b. Have you been criminally charged before any court?</span
                >
              </td>
              <td
                class=""
                v-on:click="
                  markYes('question_35_b', ['date_filled', 'status_of_cases'])
                "
              >
                <div class="form-check">
                  <input
                    id="yes_b_35"
                    type="radio"
                    class="form-check-input"
                    v-model="relevantQueries.question_35_b_answer"
                    value="yes"
                  />
                  <label class="form-check-label pr-2" for="yes_b_35"
                    >YES</label
                  >
                </div>
              </td>
              <td
                v-on:click="
                  markNo('question_35_b', ['date_filled', 'status_of_cases'])
                "
              >
                <div class="form-check">
                  <input
                    id="no_b_35"
                    type="radio"
                    class="form-check-input"
                    v-model="relevantQueries.question_35_b_answer"
                    value="no"
                  />
                  <label class="form-check-label pr-2" for="no_b_35">NO</label>
                </div>
              </td>
              <td class="w-25">
                <div class="form-check">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="If YES, then give details"
                    :class="
                      errors.hasOwnProperty('question_36_a_details')
                        ? 'is-invalid'
                        : ''
                    "
                    :readonly="relevantQueries.question_35_b_answer !== 'yes'"
                    v-model="relevantQueries.question_35_b_details"
                  />
                  <label class="text-sm font-weight-bold mt-1"
                    >Date Filled</label
                  >
                  <input
                    type="date"
                    class="form-control"
                    placeholder="Date Filled"
                    :class="
                      errors.hasOwnProperty('question_35_b_date_filled')
                        ? 'is-invalid'
                        : ''
                    "
                    :readonly="relevantQueries.question_35_b_answer !== 'yes'"
                    v-model="relevantQueries.question_35_b_date_filled"
                  />
                  <input
                    type="text"
                    class="form-control mt-2"
                    placeholder="Status of Case/s"
                    :class="
                      errors.hasOwnProperty('question_35_b_status_of_cases')
                        ? 'is-invalid'
                        : ''
                    "
                    :readonly="relevantQueries.question_35_b_answer !== 'yes'"
                    v-model="relevantQueries.question_35_b_status_of_cases"
                  />
                </div>
              </td>
            </tr>
            <!-- {{-- END OF 35 --}} -->

            <!-- {{-- BEGIN OF 36 --}} -->
            <tr>
              <td
                style="background: #eaeaea"
                class="border-0 text-sm"
                :class="
                  errors.hasOwnProperty('question_36_a_answer') ||
                  errors.hasOwnProperty('question_36_a_details')
                    ? 'bg-danger text-white'
                    : 'text-dark'
                "
              >
                <i
                  v-if="
                    errors.hasOwnProperty('no_36') ||
                    errors.hasOwnProperty('no_36_details')
                  "
                  class="fa fa-times text-white"
                  aria-hidden="true"
                ></i>
                36. Have you ever been convicted of any crime or violation of
                any law, decree, ordinance or regulation by any court or
                tribunal?
              </td>

              <td class="" v-on:click="markYes('question_36_a')">
                <div class="form-check">
                  <input
                    id="yes_36"
                    type="radio"
                    class="form-check-input"
                    v-model="relevantQueries.question_36_a_answer"
                    value="yes"
                  />
                  <label class="form-check-label pr-2" for="yes_36">YES</label>
                </div>
              </td>
              <td v-on:click="markNo('question_36_a')">
                <div class="form-check">
                  <input
                    type="radio"
                    class="form-check-input"
                    v-model="relevantQueries.question_36_a_answer"
                    value="no"
                    id="no_36"
                  />
                  <label class="form-check-label pr-2" for="no_36">NO</label>
                </div>
              </td>
              <td class="w-25">
                <div class="form-check">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="If YES, then give details"
                    :class="
                      errors.hasOwnProperty('question_36_a_details')
                        ? 'is-invalid'
                        : ''
                    "
                    :readonly="relevantQueries.question_36_a_answer !== 'yes'"
                    v-model="relevantQueries.question_36_a_details"
                  />
                </div>
              </td>
            </tr>
            <!-- {{-- END OF 36 --}} -->

            <!-- {{-- BEGIN OF 37 --}} -->
            <tr>
              <td
                style="background: #eaeaea"
                class="border-0"
                :class="
                  errors.hasOwnProperty('question_37_a_answer') ||
                  errors.hasOwnProperty('question_37_a_details')
                    ? 'bg-danger text-white'
                    : 'text-dark'
                "
              >
                <span class="text-sm">
                  <i
                    v-if="
                      errors.hasOwnProperty('question_37_a_answer') ||
                      errors.hasOwnProperty('question_37_a_details')
                    "
                    class="fa fa-times text-white"
                    aria-hidden="true"
                  ></i>
                  37. Have you ever been separated from the service in any of
                  the following modes: resignation, retirement, dropped from the
                  rolls, dismissal, termination, end of term, finished contract
                  or phased out (abolition) in the public or private sector?
                </span>
              </td>

              <td class="" v-on:click="markYes('question_37_a')">
                <div class="form-check">
                  <input
                    type="radio"
                    class="form-check-input"
                    v-model="relevantQueries.question_37_a_answer"
                    value="yes"
                    id="yes_37"
                  />
                  <label class="form-check-label pr-2" for="yes_37">YES</label>
                </div>
              </td>
              <td v-on:click="markNo('question_37_a')">
                <div class="form-check">
                  <input
                    type="radio"
                    class="form-check-input"
                    v-model="relevantQueries.question_37_a_answer"
                    value="no"
                    id="no_37"
                  />
                  <label class="form-check-label pr-2" for="no_37">NO</label>
                </div>
              </td>
              <td class="w-25">
                <div class="form-check">
                  <input
                    type="text"
                    class="form-control"
                    :class="
                      errors.hasOwnProperty('question_37_a_details')
                        ? 'is-invalid'
                        : ''
                    "
                    placeholder="If YES, then give details"
                    :readonly="relevantQueries.question_37_a_answer !== 'yes'"
                    v-model="relevantQueries.question_37_a_details"
                  />
                </div>
              </td>
            </tr>
            <!-- {{-- END OF 37 --}} -->

            <!-- {{-- BEGIN OF 38 --}} -->
            <tr>
              <td
                style="background: #eaeaea"
                class="border-0 text-sm"
                :class="
                  errors.hasOwnProperty('question_38_a_answer') ||
                  errors.hasOwnProperty('question_38_a_details')
                    ? 'bg-danger text-white'
                    : 'text-dark'
                "
              >
                <i
                  v-if="
                    errors.hasOwnProperty('question_38_a_answer') ||
                    errors.hasOwnProperty('question_38_a_details')
                  "
                  class="fa fa-times text-white"
                  aria-hidden="true"
                ></i>
                38. a. Have you ever been a candidate in a national or local
                election held within the last year (except Barangay election)?
              </td>
              <td class="" v-on:click="markYes('question_38_a')">
                <div class="form-check">
                  <input
                    type="radio"
                    class="form-check-input"
                    v-model="relevantQueries.question_38_a_answer"
                    value="yes"
                    id="yes_a_38"
                  />
                  <label class="form-check-label pr-2" for="yes_a_38"
                    >YES</label
                  >
                </div>
              </td>
              <td v-on:click="markNo('question_38_a')">
                <div class="form-check">
                  <input
                    type="radio"
                    class="form-check-input"
                    v-model="relevantQueries.question_38_a_answer"
                    value="no"
                    id="no_a_38"
                  />
                  <label class="form-check-label pr-2" for="no_a_38">NO</label>
                </div>
              </td>
              <td class="w-25">
                <div class="form-check">
                  <input
                    type="text"
                    class="form-control"
                    :class="
                      errors.hasOwnProperty('question_38_a_details')
                        ? 'is-invalid'
                        : ''
                    "
                    placeholder="If YES, then give details"
                    :readonly="relevantQueries.question_38_a_answer !== 'yes'"
                    v-model="relevantQueries.question_38_a_details"
                  />
                </div>
              </td>
            </tr>

            <tr>
              <td
                scope="row"
                style="background: #eaeaea"
                class="border-0"
                :class="
                  errors.hasOwnProperty('question_38_b_answer') ||
                  errors.hasOwnProperty('question_38_b_details')
                    ? 'bg-danger text-white'
                    : 'text-dark'
                "
              >
                <span class="ml-4 text-sm">
                  <i
                    v-if="
                      errors.hasOwnProperty('question_38_b_answer') ||
                      errors.hasOwnProperty('question_38_b_details')
                    "
                    class="fa fa-times text-white"
                    aria-hidden="true"
                  ></i>
                  b. Have you resigned from the government service during the
                  three (3)-month period before the last election to
                  promote/actively campaign for a national or local
                  candidate?</span
                >
              </td>
              <td class="" v-on:click="markYes('question_38_b')">
                <div class="form-check">
                  <input
                    type="radio"
                    class="form-check-input"
                    v-model="relevantQueries.question_38_b_answer"
                    value="yes"
                    id="yes_b_38"
                  />
                  <label class="form-check-label pr-2" for="yes_b_38"
                    >YES</label
                  >
                </div>
              </td>
              <td class="" v-on:click="markNo('question_38_b')">
                <div class="form-check">
                  <input
                    type="radio"
                    class="form-check-input"
                    v-model="relevantQueries.question_38_b_answer"
                    value="no"
                    id="no_b_38"
                  />
                  <label class="form-check-label pr-2" for="no_b_38">NO</label>
                </div>
              </td>
              <td class="w-25">
                <div class="form-check">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="If YES, then give details"
                    :class="
                      errors.hasOwnProperty('question_38_b_details')
                        ? 'is-invalid'
                        : ''
                    "
                    :readonly="relevantQueries.question_38_b_answer !== 'yes'"
                    v-model="relevantQueries.question_38_b_details"
                  />
                </div>
              </td>
            </tr>
            <!-- {{-- END OF 38 --}} -->

            <!-- {{-- BEGIN OF 39 --}} -->
            <tr>
              <td
                style="background: #eaeaea"
                class="border-0 text-sm"
                :class="
                  errors.hasOwnProperty('question_39_a_answer') ||
                  errors.hasOwnProperty('question_39_a_details')
                    ? 'bg-danger text-white'
                    : 'text-dark'
                "
              >
                <i
                  v-if="
                    errors.hasOwnProperty('question_39_a_answer') ||
                    errors.hasOwnProperty('question_39_a_details')
                  "
                  class="fa fa-times text-white"
                  aria-hidden="true"
                ></i>
                39. Have you acquired the status of an immigrant or permanent
                resident of another country?
              </td>

              <td v-on:click="markYes('question_39_a')">
                <div class="form-check">
                  <input
                    type="radio"
                    class="form-check-input"
                    v-model="relevantQueries.question_39_a_answer"
                    value="yes"
                    id="yes_39"
                  />
                  <label class="form-check-label pr-2" for="yes_39">YES</label>
                </div>
              </td>
              <td class="" v-on:click="markNo('question_39_a')">
                <div class="form-check">
                  <input
                    type="radio"
                    class="form-check-input"
                    v-model="relevantQueries.question_39_a_answer"
                    value="no"
                    id="no_39"
                  />
                  <label class="form-check-label pr-2" for="no_39">NO</label>
                </div>
              </td>
              <td class="w-25">
                <div class="form-check">
                  <input
                    type="text"
                    class="form-control"
                    :class="
                      errors.hasOwnProperty('question_39_a_details')
                        ? 'is-invalid'
                        : ''
                    "
                    placeholder="If YES, then give details (country)"
                    :readonly="relevantQueries.question_39_a_answer !== 'yes'"
                    v-model="relevantQueries.question_39_a_details"
                  />
                </div>
              </td>
            </tr>
            <!-- {{-- END OF 39 --}} -->

            <!-- {{-- BEGIN OF 40 --}} -->
            <tr>
              <td
                style="background: #eaeaea"
                class="border-0 text-left text-sm"
              >
                40. Pursuant to: (a) Indigenous People's Act (RA 8371); (b)
                Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents
                Welfare Act of 2000 (RA 8972), please answer the following
                items:
              </td>
              <td colspan="3"></td>
            </tr>

            <tr>
              <td
                scope="row"
                style="background: #eaeaea"
                class="border-0"
                :class="
                  errors.hasOwnProperty('question_40_a_answer') ||
                  errors.hasOwnProperty('question_40_a_details')
                    ? 'bg-danger text-white'
                    : 'text-dark'
                "
              >
                <span class="ml-4 text-sm">
                  <i
                    v-if="
                      errors.hasOwnProperty('question_40_a_answer') ||
                      errors.hasOwnProperty('question_40_a_details')
                    "
                    class="fa fa-times text-white"
                    aria-hidden="true"
                  ></i>

                  a. Are you a member of any indigenous group?</span
                >
              </td>
              <td class="" v-on:click="markYes('question_40_a')">
                <div class="form-check">
                  <input
                    type="radio"
                    class="form-check-input"
                    v-model="relevantQueries.question_40_a_answer"
                    value="yes"
                    id="yes_a_40"
                  />
                  <label class="form-check-label pr-2" for="yes_a_40"
                    >YES</label
                  >
                </div>
              </td>
              <td class="" v-on:click="markNo('question_40_a')">
                <div class="form-check">
                  <input
                    type="radio"
                    class="form-check-input"
                    v-model="relevantQueries.question_40_a_answer"
                    value="no"
                    id="no_a_40"
                  />
                  <label class="form-check-label pr-2" for="no_a_40">NO</label>
                </div>
              </td>
              <td class="w-25">
                <div class="form-check">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="If YES, please specify"
                    :class="
                      errors.hasOwnProperty('question_40_a_details')
                        ? 'is-invalid'
                        : ''
                    "
                    :readonly="relevantQueries.question_40_a_answer !== 'yes'"
                    v-model="relevantQueries.question_40_a_details"
                  />
                </div>
              </td>
            </tr>
            <tr>
              <td
                scope="row"
                style="background: #eaeaea"
                class="border-0"
                :class="
                  errors.hasOwnProperty('question_40_b_answer') ||
                  errors.hasOwnProperty('question_40_b_details')
                    ? 'bg-danger text-white'
                    : 'text-dark'
                "
              >
                <span class="ml-4 text-sm">
                  <i
                    v-if="
                      errors.hasOwnProperty('question_40_b_answer') ||
                      errors.hasOwnProperty('question_40_b_details')
                    "
                    class="fa fa-times text-white"
                    aria-hidden="true"
                  ></i>
                  b. Are you a person with disability?</span
                >
              </td>
              <td class="" v-on:click="markYes('question_40_b')">
                <div class="form-check">
                  <input
                    type="radio"
                    class="form-check-input"
                    v-model="relevantQueries.question_40_b_answer"
                    value="yes"
                    id="yes_b_40"
                  />
                  <label class="form-check-label pr-2" for="yes_b_40"
                    >YES</label
                  >
                </div>
              </td>
              <td class="" v-on:click="markNo('question_40_b')">
                <div class="form-check">
                  <input
                    type="radio"
                    class="form-check-input"
                    v-model="relevantQueries.question_40_b_answer"
                    value="no"
                    id="no_b_40"
                  />
                  <label class="form-check-label pr-2" for="no_b_40">NO</label>
                </div>
              </td>
              <td class="w-25">
                <div class="form-check">
                  <input
                    type="text"
                    class="form-control"
                    :class="
                      errors.hasOwnProperty('question_40_b_details')
                        ? 'is-invalid'
                        : ''
                    "
                    placeholder="If YES, please specify ID No"
                    :readonly="relevantQueries.question_40_b_answer !== 'yes'"
                    v-model="relevantQueries.question_40_b_details"
                  />
                </div>
              </td>
            </tr>

            <tr>
              <td
                scope="row"
                style="background: #eaeaea"
                class="border-0"
                :class="
                  errors.hasOwnProperty('question_40_c_answer') ||
                  errors.hasOwnProperty('question_40_c_details')
                    ? 'bg-danger text-white'
                    : 'text-dark'
                "
              >
                <span class="ml-4 text-sm">
                  <i
                    v-if="
                      errors.hasOwnProperty('question_40_c_answer') ||
                      errors.hasOwnProperty('question_40_c_details')
                    "
                    class="fa fa-times text-white"
                    aria-hidden="true"
                  ></i>
                  c. Are you a solo parent?</span
                >
              </td>
              <td class="" v-on:click="markYes('question_40_c')">
                <div class="form-check">
                  <input
                    type="radio"
                    class="form-check-input"
                    id="yes_c_40"
                    v-model="relevantQueries.question_40_c_answer"
                    value="yes"
                  />
                  <label class="form-check-label pr-2" for="yes_c_40"
                    >YES</label
                  >
                </div>
              </td>
              <td class="" v-on:click="markNo('question_40_c')">
                <div class="form-check">
                  <input
                    type="radio"
                    class="form-check-input"
                    id="no_c_40"
                    v-model="relevantQueries.question_40_c_answer"
                    value="no"
                  />
                  <label class="form-check-label pr-2" for="no_c_40">NO</label>
                </div>
              </td>
              <td class="w-25">
                <div class="form-check">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="If YES, please specify ID No"
                    :class="
                      errors.hasOwnProperty('question_40_c_details')
                        ? 'is-invalid'
                        : ''
                    "
                    :readonly="relevantQueries.question_40_c_answer !== 'yes'"
                    v-model="relevantQueries.question_40_c_details"
                  />
                </div>
              </td>
            </tr>
            <!-- {{-- END OF 40 --}} -->
          </table>

          <div class="float-right mb-3">
            <button
              class="btn btn-primary font-weight-bold"
              @click="submit"
              :disabled="isLoading"
              v-if="!isComplete"
            >
              NEXT
              <div
                class="spinner-border spinner-border-sm mb-1"
                v-show="isLoading"
                role="status"
              >
                <span class="sr-only">Loading...</span>
              </div>
            </button>
          </div>
        </div>
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
  },
  data() {
    return {
      isComplete: false,
      isLoading: false,
      relevantQueries: {
        employee_id: this.personal_data.employee_id,
        question_34_a_answer: "",
        question_34_a_details: "",
        question_34_b_answer: "",
        question_34_b_details: "",
        question_35_a_answer: "",
        question_35_a_details: "",
        question_35_b_answer: "",
        question_35_b_details: "",
        question_35_b_date_filled: "",
        question_35_b_status_of_cases: "",
        question_36_a_answer: "",
        question_36_a_details: "",
        question_37_a_answer: "",
        question_37_a_details: "",
        question_38_a_answer: "",
        question_38_a_details: "",
        question_38_b_answer: "",
        question_38_b_details: "",
        question_39_a_answer: "",
        question_39_a_details: "",
        question_40_a_answer: "",
        question_40_a_details: "",
        question_40_b_answer: "",
        question_40_b_details: "",
        question_40_c_answer: "",
        question_40_c_details: "",
      },
      temporary: {},
      errors: {},
    };
  },
  methods: {
    isKeyCombinationSave(event) {
      if (
        !this.isComplete &&
        event.ctrlKey &&
        event.code.toLowerCase() === "keys" &&
        event.keyCode === 83
      ) {
        this.submit();
        event.preventDefault();
        return true;
      }
    },
    markYes(question, others = []) {
      if (this.relevantQueries[`${question}_answer`] !== "yes") {
        this.relevantQueries[`${question}_answer`] = "yes";
        this.relevantQueries[`${question}_details`] = this.temporary[
          `${question}_details`
        ];

        if (others.length !== 0) {
          others.forEach(
            (other) =>
              (this.relevantQueries[`${question}_${other}`] = this.temporary[
                `${question}_${other}`
              ])
          );
        }
      }
    },
    markNo(question, others = []) {
      this.temporary[`${question}_details`] =
        this.relevantQueries[`${question}_details`] ||
        this.temporary[`${question}_details`];

      this.relevantQueries[`${question}_answer`] = "no";
      this.relevantQueries[`${question}_details`] = "";

      if (others.length !== 0) {
        others.forEach((other) => {
          this.temporary[`${question}_${other}`] =
            this.relevantQueries[`${question}_${other}`] ||
            this.temporary[`${question}_${other}`];

          this.relevantQueries[`${question}_${other}`] = "";
        });
      }
    },
    submit() {
      this.isLoading = true;
      window.axios
        .post(
          "/employee/exists/personal/relevant/queries",
          this.relevantQueries
        )
        .then((response) => {
          if (response.status === 200) {
            this.isComplete = true;
            this.isLoading = false;
            this.errors = {};

            this.$emit("display-reference");
          }
        })
        .catch((error) => {
          this.isLoading = false;
          this.errors = {};
          // Check the error status code.
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
    window.addEventListener("keydown", this.isKeyCombinationSave);
    if (!this.personal_data.relevant_queries) {
      this.personal_data.relevant_queries = this.relevantQueries;
    }
    this.relevantQueries = this.personal_data.relevant_queries;
  },
};
</script>

<style scoped>
td {
  cursor: pointer;
  transition: all 300ms ease-in-out;
}
td:hover {
  background: #f1f2f3;
}
</style>
