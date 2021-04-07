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
                    <i v-if="isComplete" class="text-success float-right fa fa-caret-down" aria-hidden="true"></i>
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
                            <td style="background: #EAEAEA;" class="text-left">
                                <span class="text-sm">
                                    34. Are you related by consanguinity or
                                    affinity to the appointing or recommending
                                    authority, or to the chief of bureau or
                                    office or to the person who has immediate
                                    supervision over you in the Office, Bureau
                                    or Department where you will be apppointed,
                                </span>
                            </td>
                            <td colspan="3"></td>
                        </tr>

                        <tr>
                            <td
                                scope="row"
                                style="background: #EAEAEA;"
                                :class="errors.hasOwnProperty('no_34_a') || errors.hasOwnProperty('no_34_a_details') ? 'bg-danger text-white' : 'text-dark'"
                                class="border-0"
                            >
                                

                                <span class="ml-4 text-sm"
                                    >
                                    <i v-if="errors.hasOwnProperty('no_34_a') || errors.hasOwnProperty('no_34_a_details')" class="fa fa-times text-white " aria-hidden="true"></i>
                                    a. within the third degree?</span
                                >
                            </td>
                            <td
                                @click="relevantQueries.no_34_a = 'yes'"
                            >
                                <div class="form-check">
                                    <input
                                        id="yes_34_a"
                                        type="radio"
                                        value="yes"
                                        class="form-check-input"
                                        v-model="relevantQueries.no_34_a"
                                    />
                                    <label
                                        for="yes_34_a"
                                        class="form-check-label pr-2 text-sm"
                                    >
                                        YES
                                    </label>
                                </div>
                            </td>
                            <td
                                @click="
                                    relevantQueries.no_34_a = 'no';
                                    relevantQueries.no_34_a_details = '';
                                "
                            >
                                <div class="form-check">
                                    <input
                                        type="radio"
                                        value="no"
                                        id="no_a_34"
                                        class="form-check-input"
                                        v-model="relevantQueries.no_34_a"
                                    />
                                    <label
                                        class="form-check-label  pr-2"
                                        for="no_a_34"
                                        >NO</label
                                    >
                                </div>
                            </td>
                            <td class="w-25">
                                <div class="form-check">
                                    <input
                                        type="text"
                                        class="form-control"
                                        :class="errors.hasOwnProperty('no_34_a_details') ? 'is-invalid' : ''"
                                        :readonly="
                                            relevantQueries.no_34_a !== 'yes'
                                        "
                                        v-model="
                                            relevantQueries.no_34_a_details
                                        "
                                        placeholder="If YES, then give details"
                                    />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td
                                scope="row"
                                style="background: #EAEAEA;"
                                :class="errors.hasOwnProperty('no_34_b') || errors.hasOwnProperty('no_34_b_details') ? 'bg-danger text-white' : 'text-dark'"
                                class="border-0"
                            >
                                <span class="ml-4 text-sm"
                                    > 
                                    <i v-if="errors.hasOwnProperty('no_34_b') || errors.hasOwnProperty('no_34_b_details')" class="fa fa-times text-white " aria-hidden="true"></i>
                                    b. within the fourth degree (for Local
                                    Government Unit - Career Employees)?</span
                                >
                            </td>
                            <td
                                class=""
                                @click="relevantQueries.no_34_b = 'yes'"
                            >
                                <div class="form-check">
                                    <input
                                        id="yes_34_b"
                                        type="radio"
                                        class="form-check-input"
                                        value="yes"
                                        v-model="relevantQueries.no_34_b"
                                    />
                                    <label
                                        class="form-check-label  pr-2"
                                        for="yes_b_34"
                                        >YES</label
                                    >
                                </div>
                            </td>
                            <td
                                @click="
                                    relevantQueries.no_34_b = 'no';
                                    relevantQueries.no_34_b_details = '';
                                "
                            >
                                <div class="form-check">
                                    <input
                                        type="radio"
                                        class="form-check-input"
                                        value="no"
                                        id="no_34_b"
                                        v-model="relevantQueries.no_34_b"
                                    />
                                    <label
                                        class="form-check-label  pr-2"
                                        for="no_34_b"
                                        >NO</label
                                    >
                                </div>
                            </td>
                            <td class="w-25">
                                <div class="form-check">
                                    <input
                                        type="text"
                                        class="form-control"
                                        :class="errors.hasOwnProperty('no_34_b_details') ? 'is-invalid' : ''"
                                        placeholder="If YES, then give details"
                                        :readonly="
                                            relevantQueries.no_34_b !== 'yes'
                                        "
                                        v-model="
                                            relevantQueries.no_34_b_details
                                        "
                                    />
                                </div>
                            </td>
                        </tr>
                        <!-- {{-- END OF 34 --}} -->

                        <!-- {{-- BEGIN OF 35 --}} -->
                        <tr>
                            <td 
                                style="background: #EAEAEA;" 
                                class="text-sm border-0"
                                :class="errors.hasOwnProperty('no_35_a') || errors.hasOwnProperty('no_35_a_details') ? 'bg-danger text-white' : 'text-dark'"
                                >
                                <i v-if="errors.hasOwnProperty('no_35_a') || errors.hasOwnProperty('no_35_a_details')" class="fa fa-times text-white " aria-hidden="true"></i>
                                35. a. Have you ever been found guilty of any
                                administrative offense?
                            </td>
                            <td
                                class=""
                                @click="relevantQueries.no_35_a = 'yes'"
                            >
                                <div class="form-check">
                                    <input
                                        type="radio"
                                        class="form-check-input"
                                        v-model="relevantQueries.no_35_a"
                                        value="yes"
                                        id="yes_35_a"
                                    />
                                    <label
                                        class="form-check-label  pr-2"
                                        for="yes_35_a"
                                    >
                                        YES
                                    </label>
                                </div>
                            </td>
                            <td
                                @click="
                                    relevantQueries.no_35_a = 'no';
                                    relevantQueries.no_35_a_details = '';
                                "
                            >
                                <div class="form-check">
                                    <input
                                        type="radio"
                                        class="form-check-input"
                                        value="no"
                                        id="no_35_a"
                                        v-model="relevantQueries.no_35_a"
                                    />
                                    <label
                                        class="form-check-label pr-2"
                                        for="no_35_a"
                                        >NO</label
                                    >
                                </div>
                            </td>
                            <td class="w-25">
                                <div class="form-check">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="If YES, then give details"
                                        :class="errors.hasOwnProperty('no_35_a_details') ? 'is-invalid' : ''"
                                        :readonly="
                                            relevantQueries.no_35_a !== 'yes'
                                        "
                                        v-model="
                                            relevantQueries.no_35_a_details
                                        "
                                    />
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td 
                                scope="row"
                                style="background: #EAEAEA;"
                                class='border-0'
                                :class="errors.hasOwnProperty('no_35_b') || errors.hasOwnProperty('no_35_b_details') ? 'bg-danger text-white' : 'text-dark'"
                                >
                                <span class="ml-4 text-sm"
                                    >
                                    <i v-if="errors.hasOwnProperty('no_35_b') || errors.hasOwnProperty('no_35_b_details')" class="fa fa-times text-white " aria-hidden="true"></i>
                                    b. Have you been criminally charged before
                                    any court?</span
                                >
                            </td>
                            <td
                                class=""
                                @click="relevantQueries.no_35_b = 'yes'"
                            >
                                <div class="form-check">
                                    <input
                                        id="yes_b_35"
                                        type="radio"
                                        class="form-check-input"
                                        v-model="relevantQueries.no_35_b"
                                        value="yes"
                                    />
                                    <label
                                        class="form-check-label  pr-2"
                                        for="yes_b_35"
                                        >YES</label
                                    >
                                </div>
                            </td>
                            <td
                                @click="
                                    relevantQueries.no_35_b = 'no';
                                    relevantQueries.no_35_b_details = '';
                                "
                            >
                                <div class="form-check">
                                    <input
                                        id="no_b_35"
                                        type="radio"
                                        class="form-check-input"
                                        v-model="relevantQueries.no_35_b"
                                        value="no"
                                    />
                                    <label
                                        class="form-check-label  pr-2"
                                        for="no_b_35"
                                        >NO</label
                                    >
                                </div>
                            </td>
                            <td class="w-25">
                                <div class="form-check">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="If YES, then give details"
                                        :class="errors.hasOwnProperty('no_35_b_details') ? 'is-invalid' : ''"
                                        :readonly="
                                            relevantQueries.no_35_b !== 'yes'
                                        "
                                        v-model="
                                            relevantQueries.no_35_b_details
                                        "
                                    />
                                </div>
                            </td>
                        </tr>
                        <!-- {{-- END OF 35 --}} -->

                        <!-- {{-- BEGIN OF 36 --}} -->
                        <tr>
                            <td 
                            style="background: #EAEAEA;" 
                            class="border-0 text-sm"
                            :class="errors.hasOwnProperty('no_36') || errors.hasOwnProperty('no_36_details') ? 'bg-danger text-white' : 'text-dark'"
                            >
                            <i v-if="errors.hasOwnProperty('no_36') || errors.hasOwnProperty('no_36_details')" class="fa fa-times text-white " aria-hidden="true"></i>
                                36. Have you ever been convicted of any crime or
                                violation of any law, decree, ordinance or
                                regulation by any court or tribunal?
                            </td>

                            <td class="" @click="relevantQueries.no_36 = 'yes'">
                                <div class="form-check">
                                    <input
                                        id="yes_36"
                                        type="radio"
                                        class="form-check-input"
                                        v-model="relevantQueries.no_36"
                                        value="yes"
                                    />
                                    <label
                                        class="form-check-label  pr-2"
                                        for="yes_36"
                                        >YES</label
                                    >
                                </div>
                            </td>
                            <td
                                @click="
                                    relevantQueries.no_36 = 'no';
                                    relevantQueries.no_36_details = '';
                                "
                            >
                                <div class="form-check">
                                    <input
                                        type="radio"
                                        class="form-check-input"
                                        v-model="relevantQueries.no_36"
                                        value="no"
                                        id="no_36"
                                    />
                                    <label
                                        class="form-check-label pr-2"
                                        for="no_36"
                                        >NO</label
                                    >
                                </div>
                            </td>
                            <td class="w-25">
                                <div class="form-check">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="If YES, then give details"
                                        :class="errors.hasOwnProperty('no_36_details') ? 'is-invalid' : ''"
                                        :readonly="
                                            relevantQueries.no_36 !== 'yes'
                                        "
                                        v-model="relevantQueries.no_36_details"
                                    />
                                </div>
                            </td>
                        </tr>
                        <!-- {{-- END OF 36 --}} -->

                        <!-- {{-- BEGIN OF 37 --}} -->
                        <tr>
                            <td 
                            style="background: #EAEAEA;"
                            class='border-0'
                            :class="errors.hasOwnProperty('no_37') || errors.hasOwnProperty('no_37_details') ? 'bg-danger text-white' : 'text-dark'"
                            >
                                <span class="text-sm">
                                    <i v-if="errors.hasOwnProperty('no_37') || errors.hasOwnProperty('no_37_details')" class="fa fa-times text-white " aria-hidden="true"></i>
                                    37. Have you ever been separated from the
                                    service in any of the following modes:
                                    resignation, retirement, dropped from the
                                    rolls, dismissal, termination, end of term,
                                    finished contract or phased out (abolition)
                                    in the public or private sector?
                                </span>
                            </td>

                            <td class="" @click="relevantQueries.no_37 = 'yes'">
                                <div class="form-check">
                                    <input
                                        type="radio"
                                        class="form-check-input"
                                        v-model="relevantQueries.no_37"
                                        value="yes"
                                        id="yes_37"
                                    />
                                    <label
                                        class="form-check-label  pr-2"
                                        for="yes_37"
                                        >YES</label
                                    >
                                </div>
                            </td>
                            <td
                                @click="
                                    relevantQueries.no_37 = 'no';
                                    relevantQueries.no_37_details = '';
                                "
                            >
                                <div class="form-check">
                                    <input
                                        type="radio"
                                        class="form-check-input"
                                        v-model="relevantQueries.no_37"
                                        value="no"
                                        id="no_37"
                                    />
                                    <label
                                        class="form-check-label pr-2"
                                        for="no_37"
                                        >NO</label
                                    >
                                </div>
                            </td>
                            <td class="w-25">
                                <div class="form-check">
                                    <input
                                        type="text"
                                        class="form-control"
                                        :class="errors.hasOwnProperty('no_37_details') ? 'is-invalid' : ''"
                                        placeholder="If YES, then give details"
                                        :readonly="
                                            relevantQueries.no_37 !== 'yes'
                                        "
                                        v-model="relevantQueries.no_37_details"
                                    />
                                </div>
                            </td>
                        </tr>
                        <!-- {{-- END OF 37 --}} -->

                        <!-- {{-- BEGIN OF 38 --}} -->
                        <tr>
                            <td 
                                style="background: #EAEAEA;"
                                class="border-0 text-sm"
                                :class="errors.hasOwnProperty('no_38_a') || errors.hasOwnProperty('no_38_a_details') ? 'bg-danger text-white' : 'text-dark'"
                                >
                                <i v-if="errors.hasOwnProperty('no_38_a') || errors.hasOwnProperty('no_38_a_details')" class="fa fa-times text-white " aria-hidden="true"></i>
                                38. a. Have you ever been a candidate in a
                                national or local election held within the last
                                year (except Barangay election)?
                            </td>
                            <td
                                class=""
                                @click="relevantQueries.no_38_a = 'yes'"
                            >
                                <div class="form-check">
                                    <input
                                        type="radio"
                                        class="form-check-input"
                                        v-model="relevantQueries.no_38_a"
                                        value="yes"
                                        id="yes_a_38"
                                    />
                                    <label
                                        class="form-check-label  pr-2"
                                        for="yes_a_38"
                                        >YES</label
                                    >
                                </div>
                            </td>
                            <td
                                @click="
                                    relevantQueries.no_38_a = 'no';
                                    relevantQueries.no_38_a_details = '';
                                "
                            >
                                <div class="form-check">
                                    <input
                                        type="radio"
                                        class="form-check-input"
                                        v-model="relevantQueries.no_38_a"
                                        value="no"
                                        id="no_a_38"
                                    />
                                    <label
                                        class="form-check-label pr-2"
                                        for="no_a_38"
                                        >NO</label
                                    >
                                </div>
                            </td>
                            <td class="w-25">
                                <div class="form-check">
                                    <input
                                        type="text"
                                        class="form-control"
                                        :class="errors.hasOwnProperty('no_38_a_details') ? 'is-invalid' : ''"
                                        placeholder="If YES, then give details"
                                        :readonly="
                                            relevantQueries.no_38_a !== 'yes'
                                        "
                                        v-model="
                                            relevantQueries.no_38_a_details
                                        "
                                    />
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td 
                                scope="row" 
                                style="background: #EAEAEA;"
                                class='border-0'
                                :class="errors.hasOwnProperty('no_38_b') || errors.hasOwnProperty('no_38_b_details') ? 'bg-danger text-white' : 'text-dark'"
                                >
                                <span class="ml-4 text-sm">
                                    <i v-if="errors.hasOwnProperty('no_38_b') || errors.hasOwnProperty('no_38_b_details')" class="fa fa-times text-white " aria-hidden="true"></i>
                                    b. Have you resigned from the government
                                    service during the three (3)-month period
                                    before the last election to promote/actively
                                    campaign for a national or local
                                    candidate?</span
                                >
                            </td>
                            <td
                                class=""
                                @click="relevantQueries.no_38_b = 'yes'"
                            >
                                <div class="form-check">
                                    <input
                                        type="radio"
                                        class="form-check-input"
                                        v-model="relevantQueries.no_38_b"
                                        value="yes"
                                        id="yes_b_38"
                                    />
                                    <label
                                        class="form-check-label  pr-2"
                                        for="yes_b_38"
                                        >YES</label
                                    >
                                </div>
                            </td>
                            <td
                                class=""
                                @click="
                                    relevantQueries.no_38_b = 'no';
                                    relevantQueries.no_38_b_details = '';
                                "
                            >
                                <div class="form-check">
                                    <input
                                        type="radio"
                                        class="form-check-input"
                                        v-model="relevantQueries.no_38_b"
                                        value="no"
                                        id="no_b_38"
                                    />
                                    <label
                                        class="form-check-label  pr-2"
                                        for="no_b_38"
                                        >NO</label
                                    >
                                </div>
                            </td>
                            <td class="w-25">
                                <div class="form-check">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="If YES, then give details"
                                        :class="errors.hasOwnProperty('no_38_b_details') ? 'is-invalid' : ''"
                                        :readonly="
                                            relevantQueries.no_38_b !== 'yes'
                                        "
                                        v-model="
                                            relevantQueries.no_38_b_details
                                        "
                                    />
                                </div>
                            </td>
                        </tr>
                        <!-- {{-- END OF 38 --}} -->

                        <!-- {{-- BEGIN OF 39 --}} -->
                        <tr>
                            <td 
                                style="background: #EAEAEA;" 
                                class="border-0 text-sm"
                                :class="errors.hasOwnProperty('no_39') || errors.hasOwnProperty('no_39_details') ? 'bg-danger text-white' : 'text-dark'"
                                >
                                <i v-if="errors.hasOwnProperty('no_39') || errors.hasOwnProperty('no_39_details')" class="fa fa-times text-white " aria-hidden="true"></i>
                                39. Have you acquired the status of an immigrant
                                or permanent resident of another country?
                            </td>

                            <td class="" @click="relevantQueries.no_39 = 'yes'">
                                <div class="form-check">
                                    <input
                                        type="radio"
                                        class="form-check-input"
                                        v-model="relevantQueries.no_39"
                                        value="yes"
                                        id="yes_39"
                                    />
                                    <label
                                        class="form-check-label  pr-2"
                                        for="yes_39"
                                        >YES</label
                                    >
                                </div>
                            </td>
                            <td
                                class=""
                                @click="
                                    relevantQueries.no_39 = 'no';
                                    relevantQueries.no_39_details = '';
                                "
                            >
                                <div class="form-check">
                                    <input
                                        type="radio"
                                        class="form-check-input"
                                        v-model="relevantQueries.no_39"
                                        value="no"
                                        id="no_39"
                                    />
                                    <label
                                        class="form-check-label pr-2"
                                        for="no_39"
                                        >NO</label
                                    >
                                </div>
                            </td>
                            <td class="w-25">
                                <div class="form-check">
                                    <input
                                        type="text"
                                        class="form-control"
                                        :class="errors.hasOwnProperty('no_39_details') ? 'is-invalid' : ''"
                                        placeholder="If YES, then give details"
                                        :readonly="
                                            relevantQueries.no_39 !== 'yes'
                                        "
                                        v-model="relevantQueries.no_39_details"
                                    />
                                </div>
                            </td>
                        </tr>
                        <!-- {{-- END OF 39 --}} -->

                        <!-- {{-- BEGIN OF 40 --}} -->
                        <tr>
                            <td
                                style="background: #EAEAEA;"
                                class="border-0 text-left text-sm"
                            >
                                40. Pursuant to: (a) Indigenous People's Act (RA
                                8371); (b) Magna Carta for Disabled Persons (RA
                                7277); and (c) Solo Parents Welfare Act of 2000
                                (RA 8972), please answer the following items:
                            </td>
                            <td colspan="3"></td>
                        </tr>

                        <tr>
                            <td
                                scope="row"
                                style="background: #EAEAEA;"
                                class="border-0"
                                :class="errors.hasOwnProperty('no_40_a') || errors.hasOwnProperty('no_40_a_details') ? 'bg-danger text-white' : 'text-dark'"
                            >
                                <span class="ml-4 text-sm"
                                    >
                            <i v-if="errors.hasOwnProperty('no_40_a') || errors.hasOwnProperty('no_40_a_details')" class="fa fa-times text-white " aria-hidden="true"></i>
                                    
                                    a. Are you a member of any indigenous
                                    group?</span
                                >
                            </td>
                            <td
                                class=""
                                @click="relevantQueries.no_40_a = 'yes'"
                            >
                                <div class="form-check">
                                    <input
                                        type="radio"
                                        class="form-check-input"
                                        v-model="relevantQueries.no_40_a"
                                        value="yes"
                                        id="yes_a_40"
                                    />
                                    <label
                                        class="form-check-label  pr-2"
                                        for="yes_a_40"
                                        >YES</label
                                    >
                                </div>
                            </td>
                            <td
                                class=""
                                @click="
                                    relevantQueries.no_40_a = 'no';
                                    relevantQueries.no_40_a_details = '';
                                "
                            >
                                <div class="form-check">
                                    <input
                                        type="radio"
                                        class="form-check-input"
                                        v-model="relevantQueries.no_40_a"
                                        value="no"
                                        id="no_a_40"
                                    />
                                    <label
                                        class="form-check-label  pr-2"
                                        for="no_a_40"
                                        >NO</label
                                    >
                                </div>
                            </td>
                            <td class="w-25">
                                <div class="form-check">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="If YES, then give details"
                                        :class="errors.hasOwnProperty('no_40_a_details') ? 'is-invalid' : ''"
                                        :readonly="
                                            relevantQueries.no_40_a !== 'yes'
                                        "
                                        v-model="
                                            relevantQueries.no_40_a_details
                                        "
                                    />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td
                                scope="row"
                                style="background: #EAEAEA;"
                                class="border-0"
                                :class="errors.hasOwnProperty('no_40_b') || errors.hasOwnProperty('no_40_b_details') ? 'bg-danger text-white' : 'text-dark'"
                            >
                                <span class="ml-4 text-sm"
                                    >
                                    <i v-if="errors.hasOwnProperty('no_40_b') || errors.hasOwnProperty('no_40_b_details')" class="fa fa-times text-white " aria-hidden="true"></i>
                                    b. Are you a person with disability?</span
                                >
                            </td>
                            <td
                                class=""
                                @click="relevantQueries.no_40_b = 'yes'"
                            >
                                <div class="form-check">
                                    <input
                                        type="radio"
                                        class="form-check-input"
                                        v-model="relevantQueries.no_40_b"
                                        value="yes"
                                        id="yes_b_40"
                                    />
                                    <label
                                        class="form-check-label  pr-2"
                                        for="yes_b_40"
                                        >YES</label
                                    >
                                </div>
                            </td>
                            <td
                                class=""
                                @click="
                                    relevantQueries.no_40_b = 'no';
                                    relevantQueries.no_40_b_details = '';
                                "
                            >
                                <div class="form-check ">
                                    <input
                                        type="radio"
                                        class="form-check-input"
                                        v-model="relevantQueries.no_40_b"
                                        value="no"
                                        id="no_b_40"
                                    />
                                    <label
                                        class="form-check-label  pr-2"
                                        for="no_b_40"
                                        >NO</label
                                    >
                                </div>
                            </td>
                            <td class="w-25">
                                <div class="form-check">
                                    <input
                                        type="text"
                                        class="form-control"
                                        :class="errors.hasOwnProperty('no_40_b_details') ? 'is-invalid' : ''"
                                        placeholder="If YES, then give details"
                                        :readonly="
                                            relevantQueries.no_40_b !== 'yes'
                                        "
                                        v-model="
                                            relevantQueries.no_40_b_details
                                        "
                                    />
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td
                                scope="row"
                                style="background: #EAEAEA;"
                                class="border-0"
                                :class="errors.hasOwnProperty('no_40_c') || errors.hasOwnProperty('no_40_c_details') ? 'bg-danger text-white' : 'text-dark'"
                            >
                                <span class="ml-4 text-sm"
                                    >
                                    <i v-if="errors.hasOwnProperty('no_40_c') || errors.hasOwnProperty('no_40_c_details')" class="fa fa-times text-white " aria-hidden="true"></i>
                                    c. Are you a solo parent?</span
                                >
                            </td>
                            <td
                                class=""
                                @click="relevantQueries.no_40_c = 'yes'"
                            >
                                <div class="form-check">
                                    <input
                                        type="radio"
                                        class="form-check-input"
                                        id="yes_c_40"
                                        v-model="relevantQueries.no_40_c"
                                        value="yes"
                                    />
                                    <label
                                        class="form-check-label  pr-2"
                                        for="yes_c_40"
                                        >YES</label
                                    >
                                </div>
                            </td>
                            <td
                                class=""
                                @click="
                                    relevantQueries.no_40_c = 'no';
                                    relevantQueries.no_40_c_details = '';
                                "
                            >
                                <div class="form-check">
                                    <input
                                        type="radio"
                                        class="form-check-input"
                                        id="no_c_40"
                                        v-model="relevantQueries.no_40_c"
                                        value="no"
                                    />
                                    <label
                                        class="form-check-label pr-2"
                                        for="no_c_40"
                                        >NO</label
                                    >
                                </div>
                            </td>
                            <td class="w-25">
                                <div class="form-check">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="If YES, then give details"
                                        :class="errors.hasOwnProperty('no_40_c_details') ? 'is-invalid' : ''"
                                        :readonly="
                                            relevantQueries.no_40_c !== 'yes'
                                        "
                                        v-model="
                                            relevantQueries.no_40_c_details
                                        "
                                    />
                                </div>
                            </td>
                        </tr>
                        <!-- {{-- END OF 40 --}} -->
                    </table>

                    <div class="float-right mb-3">
                        <button
                            class="btn btn-primary  font-weight-bold"
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
    data() {
        return {
            isComplete: false,
            isLoading: false,
            relevantQueries: {
                no_34_a: "",
                no_34_a_details: "",
                no_34_b: "",
                no_34_b_details: "",

                no_35_a: "",
                no_35_a_details: "",
                no_35_b: "",
                no_35_b_details: "",

                no_36: "",
                no_36_details: "",
                no_37: "",
                no_37_details: "",

                no_38_a: "",
                no_38_a_details: "",
                no_38_b: "",
                no_38_b_details: "",

                no_39: "",
                no_39_details: "",

                no_40_a: "",
                no_40_a_details: "",

                no_40_b: "",
                no_40_b_details: "",

                no_40_c: "",
                no_40_c_details: ""
            },
            errors : {},
        };
    },
    methods: {
        submit() {
            this.isLoading = true;
            this.relevantQueries.employee_id = localStorage.getItem(
                "employee_id"
            );
            window.axios
                .post(
                    "/employee/personal/relevant/queries",
                    this.relevantQueries
                )
                .then(response => {
                    if(response.status === 200) {
                        this.isComplete = true;
                        this.isLoading = false;
                        this.errors = {};
                        
                        localStorage.setItem('relevant_queries', JSON.stringify(response.data));
                        this.$emit("display-reference");
                    }
                    
                })
                .catch(error => {
                    this.isLoading = false
                    this.errors = {};
                    // Check the error status code.
                    if (error.response.status === 422) {
                        Object.keys(error.response.data.errors).map(
                            (field, index) => {
                                let [fieldMessage] = error.response.data.errors[
                                    field
                                ];
                                this.errors[field] = fieldMessage;
                            }
                        );
                    }
                });
        }
    },
    created() {},
    mounted() {
        if(localStorage.getItem('relevant_queries')) {
            this.relevantQueries = JSON.parse(localStorage.getItem('relevant_queries'));
            this.isComplete = true;
            this.$emit("display-reference");
        }
    }
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
