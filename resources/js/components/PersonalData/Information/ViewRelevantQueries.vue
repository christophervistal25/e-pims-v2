<template>
  <div>
    <div class="card">
      <div class="card-body p-0">
        <div class="mx-3 my-3 alert alert-warning text-center">
          <strong>RELEVANT QUERIES</strong>
        </div>

        <div class="card-body p-0" v-if="employee.relevant_queries">
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
              <td scope="row" style="background: #eaeaea" class="border-0">
                <span class="ml-4 text-sm"> a. within the third degree?</span>
              </td>
              <td>
                <div class="form-check">
                  <label
                    for="yes_34_a"
                    class="form-check-label pr-2 text-sm d-flex mt-2"
                  >
                    <i
                      class="fa fa-check text-success font-weight-bold mr-1"
                      v-if="
                        employee.relevant_queries.question_34_a_answer ===
                          'yes' ||
                        employee.relevant_queries.question_34_a_answer === 'YES'
                      "
                    ></i>
                    YES
                  </label>
                </div>
              </td>
              <td>
                <div class="form-check">
                  <label
                    class="form-check-label pr-2 d-flex mt-2"
                    for="no_a_34"
                  >
                    <i
                      class="fa fa-check text-success font-weight-bold mr-1"
                      v-show="
                        employee.relevant_queries.question_34_a_answer ===
                          'no' ||
                        employee.relevant_queries.question_34_a_answer === 'NO'
                      "
                    >
                    </i>
                    NO
                  </label>
                </div>
              </td>
              <td class="w-25">
                <div class="form-check">
                  <input
                    type="text"
                    class="form-control"
                    readonly
                    placeholder="If YES, then give details"
                    v-model="employee.relevant_queries.question_34_a_details"
                  />
                </div>
              </td>
            </tr>
            <tr>
              <td scope="row" style="background: #eaeaea" class="border-0">
                <span class="ml-4 text-sm">
                  b. within the fourth degree (for Local Government Unit -
                  Career Employees)?</span
                >
              </td>
              <td>
                <div class="form-check">
                  <label
                    class="form-check-label pr-2 d-flex mt-2"
                    for="yes_b_34"
                  >
                    <i
                      class="fa fa-check text-success font-weight-bold mr-1"
                      v-if="
                        employee.relevant_queries.question_34_b_answer ===
                          'yes' ||
                        employee.relevant_queries.question_34_b_answer === 'YES'
                      "
                    ></i>
                    YES</label
                  >
                </div>
              </td>
              <td>
                <div class="form-check">
                  <label
                    class="form-check-label pr-2 d-flex mt-2"
                    for="no_34_b"
                  >
                    <i
                      class="fa fa-check text-success font-weight-bold mr-1"
                      v-if="
                        employee.relevant_queries.question_34_b_answer ===
                          'no' ||
                        employee.relevant_queries.question_34_b_answer === 'NO'
                      "
                    ></i>
                    NO</label
                  >
                </div>
              </td>
              <td class="w-25">
                <div class="form-check">
                  <input
                    type="text"
                    class="form-control"
                    readonly
                    v-model="employee.relevant_queries.question_34_b_details"
                    placeholder="If YES, then give details"
                  />
                </div>
              </td>
            </tr>
            <!-- {{-- END OF 34 --}} -->

            <!-- {{-- BEGIN OF 35 --}} -->
            <tr>
              <td style="background: #eaeaea" class="text-sm border-0">
                35. a. Have you ever been found guilty of any administrative
                offense?
              </td>
              <td>
                <div class="form-check">
                  <label
                    class="form-check-label d-flex mt-2 pr-2"
                    for="yes_35_a"
                  >
                    <i
                      class="fa fa-check text-success font-weight-bold mr-1"
                      v-if="
                        employee.relevant_queries.question_35_a_answer ===
                          'yes' ||
                        employee.relevant_queries.question_35_a_answer === 'YES'
                      "
                    ></i>
                    YES
                  </label>
                </div>
              </td>
              <td>
                <div class="form-check">
                  <label
                    class="form-check-label d-flex mt-2 pr-2"
                    for="no_35_a"
                  >
                    <i
                      class="fa fa-check text-success font-weight-bold mr-1"
                      v-if="
                        employee.relevant_queries.question_35_a_answer ===
                          'no' ||
                        employee.relevant_queries.question_35_a_answer === 'NO'
                      "
                    ></i>
                    NO
                  </label>
                </div>
              </td>
              <td class="w-25">
                <div class="form-check">
                  <input
                    type="text"
                    class="form-control"
                    readonly
                    v-model="employee.relevant_queries.question_35_a_details"
                    placeholder="If YES, then give details"
                  />
                </div>
              </td>
            </tr>

            <tr>
              <td scope="row" style="background: #eaeaea" class="border-0">
                <span class="ml-4 text-sm">
                  b. Have you been criminally charged before any court?</span
                >
              </td>
              <td>
                <div class="form-check">
                  <label
                    class="form-check-label d-flex mt-2 pr-2"
                    for="yes_b_35"
                  >
                    <i
                      class="fa fa-check text-success font-weight-bold mr-1"
                      v-if="
                        employee.relevant_queries.question_35_b_answer ===
                          'yes' ||
                        employee.relevant_queries.question_35_b_answer === 'YES'
                      "
                    ></i>
                    YES
                  </label>
                </div>
              </td>
              <td>
                <div class="form-check">
                  <label
                    class="form-check-label d-flex mt-2 pr-2"
                    for="no_b_35"
                  >
                    <i
                      class="fa fa-check text-success font-weight-bold mr-1"
                      v-if="
                        employee.relevant_queries.question_35_b_answer ===
                          'no' ||
                        employee.relevant_queries.question_35_b_answer === 'NO'
                      "
                    ></i>
                    NO</label
                  >
                </div>
              </td>
              <td class="w-25">
                <div class="form-check">
                  <input
                    type="text"
                    class="form-control"
                    readonly
                    v-model="employee.relevant_queries.question_35_b_details"
                    placeholder="If YES, then give details"
                  />
                  <label class="text-sm font-weight-bold mt-1"
                    >Date Filled</label
                  >
                  <input
                    type="text"
                    readonly
                    class="form-control"
                    v-model="
                      employee.relevant_queries.question_35_b_date_filled
                    "
                    placeholder="Date Filled"
                  />
                  <input
                    type="text"
                    class="form-control mt-2"
                    readonly
                    v-model="
                      employee.relevant_queries.question_35_b_status_of_cases
                    "
                    placeholder="Status of Case/s"
                  />
                </div>
              </td>
            </tr>
            <!-- {{-- END OF 35 --}} -->

            <!-- {{-- BEGIN OF 36 --}} -->
            <tr>
              <td style="background: #eaeaea" class="border-0 text-sm">
                36. Have you ever been convicted of any crime or violation of
                any law, decree, ordinance or regulation by any court or
                tribunal?
              </td>

              <td>
                <div class="form-check">
                  <label class="form-check-label d-flex mt-2 pr-2" for="yes_36">
                    <i
                      class="fa fa-check text-success font-weight-bold mr-1"
                      v-if="
                        employee.relevant_queries.question_36_a_answer ===
                          'yes' ||
                        employee.relevant_queries.question_36_a_answer === 'YES'
                      "
                    ></i>
                    YES</label
                  >
                </div>
              </td>
              <td>
                <div class="form-check">
                  <label class="form-check-label pr-2 d-flex mt-2" for="no_36">
                    <i
                      class="fa fa-check text-success font-weight-bold mr-1"
                      v-if="
                        employee.relevant_queries.question_36_a_answer ===
                          'no' ||
                        employee.relevant_queries.question_36_a_answer === 'NO'
                      "
                    ></i>
                    NO</label
                  >
                </div>
              </td>
              <td class="w-25">
                <div class="form-check">
                  <input
                    type="text"
                    class="form-control"
                    readonly
                    v-model="employee.relevant_queries.question_36_a_details"
                    placeholder="If YES, then give details"
                  />
                </div>
              </td>
            </tr>
            <!-- {{-- END OF 36 --}} -->

            <!-- {{-- BEGIN OF 37 --}} -->
            <tr>
              <td style="background: #eaeaea" class="border-0">
                <span class="text-sm">
                  37. Have you ever been separated from the service in any of
                  the following modes: resignation, retirement, dropped from the
                  rolls, dismissal, termination, end of term, finished contract
                  or phased out (abolition) in the public or private sector?
                </span>
              </td>

              <td>
                <div class="form-check">
                  <label class="form-check-label d-flex mt-2 pr-2" for="yes_37">
                    <i
                      class="fa fa-check text-success font-weight-bold mr-1"
                      v-if="
                        employee.relevant_queries.question_37_a_answer ===
                          'yes' ||
                        employee.relevant_queries.question_37_a_answer === 'YES'
                      "
                    ></i>
                    YES</label
                  >
                </div>
              </td>
              <td>
                <div class="form-check">
                  <label class="form-check-label d-flex mt-2 pr-2" for="no_37">
                    <i
                      class="fa fa-check text-success font-weight-bold mr-1"
                      v-if="
                        employee.relevant_queries.question_37_a_answer ===
                          'no' ||
                        employee.relevant_queries.question_37_a_answer === 'NO'
                      "
                    ></i>
                    NO</label
                  >
                </div>
              </td>
              <td class="w-25">
                <div class="form-check">
                  <input
                    type="text"
                    class="form-control"
                    readonly
                    v-model="employee.relevant_queries.question_37_a_details"
                    placeholder="If YES, then give details"
                  />
                </div>
              </td>
            </tr>
            <!-- {{-- END OF 37 --}} -->

            <!-- {{-- BEGIN OF 38 --}} -->
            <tr>
              <td style="background: #eaeaea" class="border-0 text-sm">
                38. a. Have you ever been a candidate in a national or local
                election held within the last year (except Barangay election)?
              </td>
              <td>
                <div class="form-check">
                  <label
                    class="form-check-label mt-2 d-flex pr-2"
                    for="yes_a_38"
                  >
                    <i
                      class="fa fa-check text-success font-weight-bold mr-1"
                      v-if="
                        employee.relevant_queries.question_38_a_answer ===
                          'yes' ||
                        employee.relevant_queries.question_38_a_answer === 'YES'
                      "
                    ></i>
                    YES</label
                  >
                </div>
              </td>
              <td>
                <div class="form-check">
                  <label
                    class="form-check-label mt-2 d-flex pr-2"
                    for="no_a_38"
                  >
                    <i
                      class="fa fa-check text-success font-weight-bold mr-1"
                      v-if="
                        employee.relevant_queries.question_38_a_answer ===
                          'no' ||
                        employee.relevant_queries.question_38_a_answer === 'NO'
                      "
                    ></i>
                    NO</label
                  >
                </div>
              </td>
              <td class="w-25">
                <div class="form-check">
                  <input
                    type="text"
                    class="form-control"
                    readonly
                    v-model="employee.relevant_queries.question_38_a_details"
                    placeholder="If YES, then give details"
                  />
                </div>
              </td>
            </tr>

            <tr>
              <td scope="row" style="background: #eaeaea" class="border-0">
                <span class="ml-4 text-sm">
                  b. Have you resigned from the government service during the
                  three (3)-month period before the last election to
                  promote/actively campaign for a national or local
                  candidate?</span
                >
              </td>
              <td>
                <div class="form-check">
                  <label
                    class="form-check-label mt-2 d-flex pr-2"
                    for="yes_b_38"
                  >
                    <i
                      class="fa fa-check text-success font-weight-bold mr-1"
                      v-if="
                        employee.relevant_queries.question_38_b_answer ===
                          'yes' ||
                        employee.relevant_queries.question_38_b_answer === 'YES'
                      "
                    ></i>
                    YES</label
                  >
                </div>
              </td>
              <td>
                <div class="form-check">
                  <label
                    class="form-check-label mt-2 d-flex pr-2"
                    for="no_b_38"
                  >
                    <i
                      class="fa fa-check text-success font-weight-bold mr-1"
                      v-if="
                        employee.relevant_queries.question_38_b_answer ===
                          'no' ||
                        employee.relevant_queries.question_38_b_answer === 'NO'
                      "
                    ></i>
                    NO</label
                  >
                </div>
              </td>
              <td class="w-25">
                <div class="form-check">
                  <input
                    type="text"
                    readonly
                    v-model="employee.relevant_queries.question_38_b_details"
                    class="form-control"
                    placeholder="If YES, then give details"
                  />
                </div>
              </td>
            </tr>
            <!-- {{-- END OF 38 --}} -->

            <!-- {{-- BEGIN OF 39 --}} -->
            <tr>
              <td style="background: #eaeaea" class="border-0 text-sm">
                39. Have you acquired the status of an immigrant or permanent
                resident of another country?
              </td>

              <td>
                <div class="form-check">
                  <label class="form-check-label d-flex mt-2 pr-2" for="yes_39">
                    <i
                      class="fa fa-check text-success font-weight-bold mr-1"
                      v-if="
                        employee.relevant_queries.question_39_a_answer ===
                          'yes' ||
                        employee.relevant_queries.question_39_a_answer === 'YES'
                      "
                    ></i>
                    YES</label
                  >
                </div>
              </td>
              <td>
                <div class="form-check">
                  <label class="form-check-label d-flex mt-2 pr-2" for="no_39">
                    <i
                      class="fa fa-check text-success font-weight-bold mr-1"
                      v-if="
                        employee.relevant_queries.question_39_a_answer ===
                          'no' ||
                        employee.relevant_queries.question_39_a_answer === 'NO'
                      "
                    ></i>
                    NO
                  </label>
                </div>
              </td>
              <td class="w-25">
                <div class="form-check">
                  <input
                    type="text"
                    class="form-control"
                    readonly
                    v-model="employee.relevant_queries.question_39_a_details"
                    placeholder="If YES, then give details (country)"
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
              <td scope="row" style="background: #eaeaea" class="border-0">
                <span class="ml-4 text-sm">
                  a. Are you a member of any indigenous group?</span
                >
              </td>
              <td>
                <div class="form-check">
                  <label
                    class="form-check-label d-flex mt-2 pr-2"
                    for="yes_a_40"
                  >
                    <i
                      class="fa fa-check text-success font-weight-bold mr-1"
                      v-if="
                        employee.relevant_queries.question_40_a_answer ===
                          'yes' ||
                        employee.relevant_queries.question_40_a_answer === 'YES'
                      "
                    ></i>
                    YES</label
                  >
                </div>
              </td>
              <td>
                <div class="form-check">
                  <label
                    class="form-check-label d-flex mt-2 pr-2"
                    for="no_a_40"
                  >
                    <i
                      class="fa fa-check text-success font-weight-bold mr-1"
                      v-if="
                        employee.relevant_queries.question_40_a_answer ===
                          'no' ||
                        employee.relevant_queries.question_40_a_answer === 'NO'
                      "
                    ></i>
                    NO</label
                  >
                </div>
              </td>
              <td class="w-25">
                <div class="form-check">
                  <input
                    type="text"
                    class="form-control"
                    readonly
                    v-model="employee.relevant_queries.question_40_a_details"
                    placeholder="If YES, please specify"
                  />
                </div>
              </td>
            </tr>
            <tr>
              <td scope="row" style="background: #eaeaea" class="border-0">
                <span class="ml-4 text-sm">
                  b. Are you a person with disability?</span
                >
              </td>
              <td>
                <div class="form-check">
                  <label
                    class="form-check-label d-flex mt-2 pr-2"
                    for="yes_b_40"
                  >
                    <i
                      class="fa fa-check text-success font-weight-bold mr-1"
                      v-if="
                        employee.relevant_queries.question_40_b_answer ===
                          'yes' ||
                        employee.relevant_queries.question_40_b_answer === 'YES'
                      "
                    ></i>
                    YES</label
                  >
                </div>
              </td>
              <td v-on:click="markNo('no_40_b')">
                <div class="form-check">
                  <label
                    class="form-check-label d-flex mt-2 pr-2"
                    for="no_b_40"
                  >
                    <i
                      class="fa fa-check text-success font-weight-bold mr-1"
                      v-if="
                        employee.relevant_queries.question_40_b_answer ===
                          'no' ||
                        employee.relevant_queries.question_40_b_answer === 'NO'
                      "
                    ></i>
                    NO</label
                  >
                </div>
              </td>
              <td class="w-25">
                <div class="form-check">
                  <input
                    type="text"
                    class="form-control"
                    readonly
                    v-model="employee.relevant_queries.question_40_b_details"
                    placeholder="If YES, please specify ID No"
                  />
                </div>
              </td>
            </tr>

            <tr>
              <td scope="row" style="background: #eaeaea" class="border-0">
                <span class="ml-4 text-sm"> c. Are you a solo parent?</span>
              </td>
              <td>
                <div class="form-check">
                  <label
                    class="form-check-label d-flex mt-2 pr-2"
                    for="yes_c_40"
                  >
                    <i
                      class="fa fa-check text-success font-weight-bold mr-1"
                      v-if="
                        employee.relevant_queries.question_40_c_answer ===
                          'yes' ||
                        employee.relevant_queries.question_40_c_answer === 'YES'
                      "
                    ></i>
                    YES</label
                  >
                </div>
              </td>
              <td>
                <div class="form-check">
                  <label
                    class="form-check-label mt-2 d-flex pr-2"
                    for="no_c_40"
                  >
                    <i
                      class="fa fa-check text-success font-weight-bold mr-1"
                      v-if="
                        employee.relevant_queries.question_40_c_answer ===
                          'no' ||
                        employee.relevant_queries.question_40_c_answer === 'NO'
                      "
                    ></i>
                    NO</label
                  >
                </div>
              </td>
              <td class="w-25">
                <div class="form-check">
                  <input
                    type="text"
                    class="form-control"
                    readonly
                    v-model="employee.relevant_queries.question_40_c_details"
                    placeholder="If YES, please specify ID No"
                  />
                </div>
              </td>
            </tr>
            <!-- {{-- END OF 40 --}} -->
          </table>
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
    },
  },
  data() {
    return {};
  },
  created() {},
};
</script>

