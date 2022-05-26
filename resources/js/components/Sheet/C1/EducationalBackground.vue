<template>
    <div class="card">
        <div
            class="card-header"
            data-target="#educationalBackground"
            data-toggle="collapse"
        >
            <h5 class="mb-0 p-2">EDUCATIONAL BACKGROUND</h5>
        </div>
        <div class="collapse show" id="educationalBackground">
            <div class="p-3">
                <p><strong>Leave blank if not applicable</strong></p>
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
                        <label
                            class="form-group has-float-label"
                            for="elemNameSchool"
                        >
                            <input
                                type="text"
                                id="elemNameSchool"
                                class="form-control text-uppercase"
                                v-model="educationalBackground.elementary_name"
                            />
                            <span><strong>NAME OF SCHOOL</strong></span>
                        </label>
                    </div>

                    <div class="col-lg-3">
                        <label
                            class="form-group has-float-label"
                            for="ebasicEduc"
                        >
                            <input
                                type="text"
                                id="ebasicEduc"
                                class="form-control text-uppercase"
                                readonly
                                v-model="
                                    educationalBackground.elementary_education
                                "
                            />
                            <span
                                ><strong
                                    >BASIC EDUCATION/DEGREE/COURSE</strong
                                ></span
                            >
                        </label>
                    </div>

                    <div class="col-lg-3">
                        <label
                            class="form-group has-float-label"
                            for="eperiodFrom"
                        >
                            <input
                                type="text"
                                id="eperiodFrom"
                                class="form-control"
                                v-model="
                                    educationalBackground.elementary_period_from
                                "
                                @input="numberOnly('elementary_period_from')"
                                @keypress="
                                    limitByLength(
                                        'elementary_period_from',
                                        yearMaxLength
                                    )
                                "
                                :class="
                                    isFieldInvalid('elementary_period_from')
                                "
                            />
                            <p class="text-danger text-sm">
                                {{ errors.elementary_period_from }}
                            </p>
                            <span
                                ><strong
                                    >PERIOD OF ATTENDANCE (FROM)</strong
                                ></span
                            >
                        </label>
                    </div>

                    <div class="col-lg-3">
                        <label
                            class="form-group has-float-label mb-0"
                            for="eperiodTo"
                        >
                            <input
                                type="text"
                                id="eperiodTo"
                                class="form-control"
                                v-model="
                                    educationalBackground.elementary_period_to
                                "
                                @input="numberOnly('elementary_period_to')"
                                @keypress="
                                    limitByLength(
                                        'elementary_period_to',
                                        yearMaxLength
                                    )
                                "
                                :class="isFieldInvalid('elementary_period_to')"
                            />
                            <span
                                ><strong
                                    >PERIOD OF ATTENDANCE (TO)</strong
                                ></span
                            >
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.elementary_period_to }}
                        </p>
                    </div>
                </div>
                <div class="pr-3 pb-3 py-3">
                    <div class="row">
                        <div class="col-lg-4">
                            <label
                                class="form-group has-float-label"
                                for="eunitEarned"
                            >
                                <input
                                    type="text"
                                    id="eunitEarned"
                                    class="form-control"
                                    v-model="
                                        educationalBackground.elementary_highest_level_units_earned
                                    "
                                    @input="
                                        numberOnly(
                                            'elementary_highest_level_units_earned'
                                        )
                                    "
                                    @keypress="
                                        limitByLength(
                                            'elementary_highest_level_units_earned',
                                            yearMaxLength
                                        )
                                    "
                                    :class="
                                        isFieldInvalid(
                                            'elementary_highest_level_units_earned'
                                        )
                                    "
                                />
                                <span
                                    ><strong
                                        >HIGHEST LEVEL/UNIT EARNED (if not
                                        graduated)</strong
                                    ></span
                                >
                            </label>
                        </div>

                        <div class="col-lg-2">
                            <label
                                class="form-group has-float-label mb-0"
                                for="eyrGrad"
                            >
                                <input
                                    type="text"
                                    id="eyrGrad"
                                    class="form-control"
                                    v-model="
                                        educationalBackground.elementary_year_graduated
                                    "
                                    @input="
                                        numberOnly('elementary_year_graduated')
                                    "
                                    @keypress="
                                        limitByLength(
                                            'elementary_year_graduated',
                                            yearMaxLength
                                        )
                                    "
                                    :class="
                                        isFieldInvalid(
                                            'elementary_year_graduated'
                                        )
                                    "
                                />
                                <span><strong>YEAR GRADUATED</strong></span>
                            </label>
                            <p class="text-danger text-sm">
                                {{ errors.elementary_year_graduated }}
                            </p>
                        </div>

                        <div class="col-lg-6">
                            <label
                                class="form-group has-float-label"
                                for="escholarship"
                            >
                                <input
                                    type="text"
                                    id="escholarship"
                                    class="form-control"
                                    v-model="
                                        educationalBackground.elementary_scholarship
                                    "
                                    :class="
                                        isFieldInvalid('elementary_scholarship')
                                    "
                                />
                                <span
                                    ><strong
                                        >SCHOLARSHIP/ACADEMIC HONORS
                                        RECEIVED</strong
                                    ></span
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
                        <label
                            class="form-group has-float-label"
                            for="snameOfSchool"
                        >
                            <input
                                type="text"
                                id="snameOfSchool"
                                class="form-control text-uppercase"
                                v-model="educationalBackground.secondary_name"
                            />
                            <span><strong>NAME OF SCHOOL</strong></span>
                        </label>
                    </div>

                    <div class="col-lg-3">
                        <label
                            class="form-group has-float-label"
                            for="sbasicEduc"
                        >
                            <input
                                type="text"
                                id="sbasicEduc"
                                class="form-control text-uppercase"
                                readonly
                                v-model="
                                    educationalBackground.secondary_education
                                "
                            />
                            <span
                                ><strong
                                    >BASIC EDUCATION/DEGREE/COURSE</strong
                                ></span
                            >
                        </label>
                    </div>

                    <div class="col-lg-3">
                        <label
                            class="form-group has-float-label mb-0"
                            for="speriodFrom"
                        >
                            <input
                                type="text"
                                id="speriodFrom"
                                class="form-control"
                                v-model="
                                    educationalBackground.secondary_period_from
                                "
                                @input="numberOnly('secondary_period_from')"
                                @keypress="
                                    limitByLength(
                                        'secondary_period_from',
                                        yearMaxLength
                                    )
                                "
                                :class="isFieldInvalid('secondary_period_from')"
                            />
                            <span
                                ><strong
                                    >PERIOD OF ATTENDANCE (FROM)</strong
                                ></span
                            >
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.secondary_period_from }}
                        </p>
                    </div>

                    <div class="col-lg-3">
                        <label
                            class="form-group has-float-label mb-0"
                            for="speriodTo"
                        >
                            <input
                                type="text"
                                id="speriodTo"
                                class="form-control"
                                v-model="
                                    educationalBackground.secondary_period_to
                                "
                                @input="numberOnly('secondary_period_to')"
                                @keypress="
                                    limitByLength(
                                        'secondary_period_to',
                                        yearMaxLength
                                    )
                                "
                                :class="isFieldInvalid('secondary_period_to')"
                            />
                            <span
                                ><strong
                                    >PERIOD OF ATTENDANCE (TO)</strong
                                ></span
                            >
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.secondary_period_to }}
                        </p>
                    </div>
                </div>
                <div class="pr-3 pb-3 py-3">
                    <div class="row">
                        <div class="col-lg-4">
                            <label
                                class="form-group has-float-label"
                                for="secondary_highest_level_units_earned"
                            >
                                <input
                                    type="text"
                                    id="secondary_highest_level_units_earned"
                                    class="form-control"
                                    @input="
                                        numberOnly(
                                            'secondary_highest_level_units_earned'
                                        )
                                    "
                                    v-model="
                                        educationalBackground.secondary_highest_level_units_earned
                                    "
                                />
                                <span
                                    ><strong
                                        >HIGHEST LEVEL/UNIT EARNED (if not
                                        graduated)</strong
                                    ></span
                                >
                            </label>
                        </div>

                        <div class="col-lg-2">
                            <label
                                class="form-group has-float-label mb-0"
                                for="secondary_year_graduated"
                            >
                                <input
                                    type="text"
                                    id="secondary_year_graduated"
                                    class="form-control"
                                    v-model="
                                        educationalBackground.secondary_year_graduated
                                    "
                                    @input="
                                        numberOnly(
                                            'secondary_year_graduated',
                                            yearMaxLength
                                        )
                                    "
                                    :class="
                                        isFieldInvalid(
                                            'secondary_year_graduated'
                                        )
                                    "
                                />
                                <span><strong>YEAR GRADUATED</strong></span>
                            </label>
                            <p class="text-danger text-sm">
                                {{ errors.secondary_year_graduated }}
                            </p>
                        </div>

                        <div class="col-lg-6">
                            <label
                                class="form-group has-float-label"
                                for="secondary_scholarship"
                            >
                                <input
                                    type="text"
                                    id="secondary_scholarship"
                                    class="form-control"
                                    v-model="
                                        educationalBackground.secondary_scholarship
                                    "
                                />
                                <span
                                    ><strong
                                        >SCHOLARSHIP/ACADEMIC HONORS
                                        RECEIVED</strong
                                    ></span
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
            <div class="vocational--parent--container">
                <div class="pl-3 pr-3 pb-3">
                    <div class="row">
                        <div class="col-lg-3">
                            <label
                                class="form-group has-float-label"
                                for="vocational_trade_course_name"
                            >
                                <input
                                    type="text"
                                    id="vocational_trade_course_name"
                                    class="form-control text-uppercase"
                                    v-model="
                                        educationalBackground.vocational_trade_course_name
                                    "
                                />
                                <span><strong>NAME OF SCHOOL</strong></span>
                            </label>
                        </div>

                        <div class="col-lg-3">
                            <label
                                class="form-group has-float-label"
                                for="vocational_education"
                            >
                                <input
                                    type="text"
                                    id="vocational_education"
                                    class="form-control text-uppercase"
                                    v-model="
                                        educationalBackground.vocational_education
                                    "
                                />
                                <span
                                    ><strong
                                        >BASIC EDUCATION/DEGREE/COURSE</strong
                                    ></span
                                >
                            </label>
                        </div>

                        <div class="col-lg-3">
                            <label
                                class="form-group has-float-label mb-0"
                                for="period_from"
                            >
                                <input
                                    type="text"
                                    id="period_from"
                                    class="form-control"
                                    v-model="
                                        educationalBackground.vocational_trade_course_period_from
                                    "
                                    @input="
                                        numberOnly(
                                            'vocational_trade_course_period_from'
                                        )
                                    "
                                    @keypress="
                                        limitByLength(
                                            'vocational_trade_course_period_from',
                                            yearMaxLength
                                        )
                                    "
                                    :class="
                                        !errors.hasOwnProperty(
                                            'vocational_trade_course_period_from'
                                        )
                                            ? ''
                                            : 'is-invalid'
                                    "
                                />
                                <span
                                    ><strong
                                        >PERIOD OF ATTENDANCE (FROM)</strong
                                    ></span
                                >
                            </label>
                            <p class="text-danger text-sm">
                                {{ errors.vocational_trade_course_period_from }}
                            </p>
                        </div>
                        <div class="col-lg-3">
                            <label
                                class="form-group has-float-label mb-0"
                                for="period_to"
                            >
                                <input
                                    type="text"
                                    id="period_to"
                                    class="form-control"
                                    v-model="
                                        educationalBackground.vocational_trade_course_period_to
                                    "
                                    @input="
                                        numberOnly(
                                            'vocational_trade_course_period_to'
                                        )
                                    "
                                    @keypress="
                                        limitByLength(
                                            'vocational_trade_course_period_to',
                                            yearMaxLength
                                        )
                                    "
                                    :class="
                                        isFieldInvalid(
                                            'vocational_trade_course_period_to'
                                        )
                                    "
                                />
                                <span
                                    ><strong
                                        >PERIOD OF ATTENDANCE (TO)</strong
                                    ></span
                                >
                            </label>
                            <p class="text-danger text-sm">
                                {{ errors.vocational_trade_course_period_to }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="pl-3 pr-3 pb-3">
                    <div class="row">
                        <div class="col-lg-4">
                            <label
                                class="form-group has-float-label"
                                for="vocational_trade_course_highest_level_units_earned"
                            >
                                <input
                                    type="text"
                                    id="vocational_trade_course_highest_level_units_earned"
                                    class="form-control"
                                    v-model="
                                        educationalBackground.vocational_trade_course_highest_level_units_earned
                                    "
                                    @input="
                                        numberOnly(
                                            'vocational_trade_course_highest_level_units_earned'
                                        )
                                    "
                                />
                                <span
                                    ><strong
                                        >HIGHEST LEVEL/UNIT EARNED (if not
                                        graduated)</strong
                                    ></span
                                >
                            </label>
                        </div>

                        <div class="col-lg-2">
                            <label
                                class="form-group has-float-label mb-0"
                                for="vocational_trade_course_year_graduated"
                            >
                                <input
                                    type="text"
                                    id="vocational_trade_course_year_graduated"
                                    class="form-control"
                                    v-model="
                                        educationalBackground.vocational_trade_course_year_graduated
                                    "
                                    @input="
                                        numberOnly(
                                            'vocational_trade_course_year_graduated'
                                        )
                                    "
                                    @keypress="
                                        limitByLength(
                                            'vocational_trade_course_year_graduated',
                                            yearMaxLength
                                        )
                                    "
                                    :class="
                                        isFieldInvalid(
                                            'vocational_trade_course_year_graduated'
                                        )
                                    "
                                />
                                <span><strong>YEAR GRADUATED</strong></span>
                            </label>
                            <p class="text-danger text-sm">
                                {{
                                    errors.vocational_trade_course_year_graduated
                                }}
                            </p>
                        </div>

                        <div class="col-lg-6">
                            <label
                                class="form-group has-float-label"
                                for="vocational_trade_course_scholarship"
                            >
                                <input
                                    type="text"
                                    id="vocational_trade_course_scholarship"
                                    class="form-control"
                                    v-model="
                                        educationalBackground.vocational_trade_course_scholarship
                                    "
                                />
                                <span
                                    ><strong
                                        >SCHOLARSHIP/ACADEMIC HONORS
                                        RECEIVED</strong
                                    ></span
                                >
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="dynamic__vocational__trade__course"
                v-for="(vocational, index) in educationalBackground.additionals
                    .vocational"
                :key="index"
            >
                <div class="pl-3 pr-3 pb-3">
                    <div class="float-right">
                        <button
                            @click="removeVocationalCourse(index)"
                            class="btn btn-danger font-weight-bold mt-1 rounded-circle mb-2"
                        >
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-lg-3">
                            <label
                                class="form-group has-float-label"
                                for="name"
                            >
                                <input
                                    type="text"
                                    id="name"
                                    class="form-control text-uppercase"
                                    v-model="
                                        educationalBackground.additionals
                                            .vocational[index].name
                                    "
                                />
                                <span><strong>NAME OF SCHOOL</strong></span>
                            </label>
                        </div>

                        <div class="col-lg-3">
                            <label
                                class="form-group has-float-label"
                                for="basic_education"
                            >
                                <input
                                    type="text"
                                    id="basic_education"
                                    class="form-control text-uppercase"
                                    v-model="
                                        educationalBackground.additionals
                                            .vocational[index].basic_education
                                    "
                                />
                                <span
                                    ><strong
                                        >BASIC EDUCATION/DEGREE/COURSE</strong
                                    ></span
                                >
                            </label>
                        </div>

                        <div class="col-lg-3">
                            <label
                                class="form-group has-float-label mb-0"
                                for="period_from"
                            >
                                <input
                                    type="text"
                                    id="period_from"
                                    class="form-control"
                                    v-model="
                                        educationalBackground.additionals
                                            .vocational[index].period_from
                                    "
                                    @input="
                                        numberOnly(
                                            `additionals.${index}.period_from`
                                        )
                                    "
                                    @keypress="
                                        limitByLength(
                                            `additionals.vocational.${index}.period_from`,
                                            yearMaxLength
                                        )
                                    "
                                    :class="
                                        isFieldInvalid(
                                            `additionals.vocational.${index}.period_from`
                                        )
                                    "
                                />
                                <span
                                    ><strong
                                        >PERIOD OF ATTENDANCE (FROM)</strong
                                    ></span
                                >
                            </label>
                            <p
                                class="text-danger text-sm"
                                v-if="
                                    errors[
                                        `additionals.vocational.${index}.period_from`
                                    ]
                                "
                            >
                                {{
                                    errors[
                                        `additionals.vocational.${index}.period_from`
                                    ]
                                }}
                            </p>
                        </div>
                        <div class="col-lg-3">
                            <label
                                class="form-group has-float-label mb-0"
                                for="period_to"
                            >
                                <input
                                    type="text"
                                    id="period_to"
                                    class="form-control"
                                    v-model="
                                        educationalBackground.additionals
                                            .vocational[index].period_to
                                    "
                                    @input="
                                        numberOnly(
                                            `additionals.${index}.period_to`
                                        )
                                    "
                                    @keypress="
                                        limitByLength(
                                            `additionals.${index}.period_to`,
                                            yearMaxLength
                                        )
                                    "
                                    :class="
                                        isFieldInvalid(
                                            `additionals.${index}.period_to`
                                        )
                                    "
                                />
                                <span
                                    ><strong
                                        >PERIOD OF ATTENDANCE (TO)</strong
                                    ></span
                                >
                            </label>
                            <p class="text-danger text-sm">
                                {{ errors[`additionals.${index}.period_to`] }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="pl-3 pr-3 pb-3">
                    <div class="row">
                        <div class="col-lg-4">
                            <label
                                class="form-group has-float-label"
                                for="unit_earned"
                            >
                                <input
                                    type="text"
                                    id="unit_earned"
                                    class="form-control"
                                    v-model="
                                        educationalBackground.additionals
                                            .vocational[index].unit_earned
                                    "
                                    @input="
                                        numberOnly(
                                            `additionals.${index}.unit_earned`
                                        )
                                    "
                                />
                                <span
                                    ><strong
                                        >HIGHEST LEVEL/UNIT EARNED (if not
                                        graduated)</strong
                                    ></span
                                >
                            </label>
                        </div>

                        <div class="col-lg-2">
                            <label
                                class="form-group has-float-label mb-0"
                                for="year_graduate"
                            >
                                <input
                                    type="text"
                                    id="year_graduate"
                                    class="form-control"
                                    :class="
                                        !errors.hasOwnProperty(
                                            `additionals.vocational.${index}.year_graduate`
                                        )
                                            ? ''
                                            : 'is-invalid'
                                    "
                                    v-model="
                                        educationalBackground.additionals
                                            .vocational[index].year_graduate
                                    "
                                    @input="
                                        numberOnly(
                                            `additionals.${index}.year_graduate`
                                        )
                                    "
                                    @keypress="
                                        limitByLength(
                                            `additionals.${index}.year_graduate`
                                        )
                                    "
                                />
                                <span><strong>YEAR GRADUATED</strong></span>
                            </label>
                            <p class="text-danger text-sm">
                                {{
                                    errors[
                                        `additionals.vocational.${index}.year_graduate`
                                    ]
                                }}
                            </p>
                        </div>

                        <div class="col-lg-6">
                            <label
                                class="form-group has-float-label"
                                for="scholarship"
                            >
                                <input
                                    type="text"
                                    id="scholarship"
                                    class="form-control"
                                    v-model="
                                        educationalBackground.additionals
                                            .vocational[index].scholarship
                                    "
                                />
                                <span
                                    ><strong
                                        >SCHOLARSHIP/ACADEMIC HONORS
                                        RECEIVED</strong
                                    ></span
                                >
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div class="float-right mx-3">
                <!-- <button
                    class="btn btn-info shadow-sm"
                    @click="addVocationalCourse"
                >
                    <i class="la la-plus"></i>
                    ADD VOCATIONAL / TRADE COURSE
                </button> -->
            </div>
            <div class="clearfix"></div>
            <hr />

            <div class="p-3">
                <div
                    class="alert alert-secondary text-center font-weight-bold"
                    role="alert"
                >
                    COLLEGE
                </div>
            </div>
            <div class="college__container">
                <div class="pl-3 pr-3 pb-3">
                    <div class="row">
                        <div class="col-lg-3">
                            <label
                                class="form-group has-float-label"
                                for="name"
                            >
                                <input
                                    type="text"
                                    id="name"
                                    class="form-control text-uppercase"
                                    v-model="educationalBackground.college_name"
                                />
                                <span><strong>NAME OF SCHOOL</strong></span>
                            </label>
                        </div>

                        <div class="col-lg-3">
                            <label
                                class="form-group has-float-label"
                                for="basic_education"
                            >
                                <input
                                    type="text"
                                    id="basic_education"
                                    class="form-control text-uppercase"
                                    v-model="
                                        educationalBackground.college_education
                                    "
                                    :class="isFieldInvalid(`college_education`)"
                                />
                                <span
                                    ><strong
                                        >BASIC EDUCATION/DEGREE/COURSE</strong
                                    ></span
                                >
                            </label>
                            <p class="text-danger">
                                {{ errors.college_education }}
                            </p>
                        </div>

                        <div class="col-lg-3">
                            <label
                                class="form-group has-float-label mb-0"
                                for="period_from"
                            >
                                <input
                                    type="text"
                                    id="period_from"
                                    class="form-control"
                                    v-model="
                                        educationalBackground.college_period_from
                                    "
                                    @input="numberOnly('college_period_from')"
                                    @keypress="
                                        limitByLength(
                                            'college_period_from',
                                            yearMaxLength
                                        )
                                    "
                                    :class="
                                        isFieldInvalid('college_period_from')
                                    "
                                />
                                <span
                                    ><strong
                                        >PERIOD OF ATTENDANCE (FROM)</strong
                                    ></span
                                >
                            </label>
                            <p class="text-danger">
                                {{ errors.college_period_from }}
                            </p>
                        </div>
                        <div class="col-lg-3">
                            <label
                                class="form-group has-float-label mb-0"
                                for="college_period_to"
                            >
                                <input
                                    type="text"
                                    id="college_period_to"
                                    class="form-control"
                                    v-model="
                                        educationalBackground.college_period_to
                                    "
                                    @input="numberOnly('college_period_to')"
                                    @keypress="
                                        limitByLength(
                                            'college_period_to',
                                            yearMaxLength
                                        )
                                    "
                                    :class="isFieldInvalid('college_period_to')"
                                />
                                <span
                                    ><strong
                                        >PERIOD OF ATTENDANCE (TO)</strong
                                    ></span
                                >
                            </label>
                            <p class="text-danger text-sm">
                                {{ errors.college_period_to }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="pl-3 pr-3 pb-3">
                    <div class="row">
                        <div class="col-lg-4">
                            <label
                                class="form-group has-float-label"
                                for="college_highest_level_units_earned"
                            >
                                <input
                                    type="text"
                                    id="college_highest_level_units_earned"
                                    class="form-control"
                                    v-model="
                                        educationalBackground.college_highest_level_units_earned
                                    "
                                    @input="
                                        numberOnly(
                                            'college_highest_level_units_earned'
                                        )
                                    "
                                    @keypress="
                                        limitByLength(
                                            'college_highest_level_units_earned',
                                            yearMaxLength
                                        )
                                    "
                                />
                                <span
                                    ><strong
                                        >HIGHEST LEVEL/UNIT EARNED (if not
                                        graduated)</strong
                                    ></span
                                >
                            </label>
                        </div>

                        <div class="col-lg-2">
                            <label
                                class="form-group has-float-label mb-0"
                                for="year_graduate"
                            >
                                <input
                                    type="text"
                                    id="year_graduate"
                                    class="form-control"
                                    v-model="
                                        educationalBackground.year_graduate
                                    "
                                    @input="
                                        numberOnly('college_year_graduated')
                                    "
                                    @keypress="
                                        limitByLength(
                                            'college_year_graduated',
                                            yearMaxLength
                                        )
                                    "
                                    :class="
                                        isFieldInvalid('college_year_graduated')
                                    "
                                />
                                <span><strong>YEAR GRADUATED</strong></span>
                            </label>
                            <p class="text-danger text-sm">
                                {{ errors.college_year_graduated }}
                            </p>
                        </div>

                        <div class="col-lg-6">
                            <label
                                class="form-group has-float-label"
                                for="college_scholarship"
                            >
                                <input
                                    type="text"
                                    id="college_scholarship"
                                    class="form-control"
                                    v-model="
                                        educationalBackground.college_scholarship
                                    "
                                />
                                <span
                                    ><strong
                                        >SCHOLARSHIP/ACADEMIC HONORS
                                        RECEIVED</strong
                                    ></span
                                >
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dynamic__college__container">
                <div
                    v-for="(college, index) in this.educationalBackground
                        .additionals.college"
                    :key="index"
                >
                    <hr />
                    <div class="pl-3 pr-3 pb-3">
                        <div class="float-right">
                            <button
                                @click="removeCollege(index)"
                                class="btn btn-danger font-weight-bold mt-1 rounded-circle mb-2"
                            >
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-lg-3">
                                <label
                                    class="form-group has-float-label"
                                    for="name"
                                >
                                    <input
                                        type="text"
                                        id="name"
                                        class="form-control text-uppercase"
                                        :class="
                                            isFieldInvalid(
                                                `additionals.college.${index}.name`
                                            )
                                        "
                                        v-model="
                                            educationalBackground.additionals
                                                .college[index].name
                                        "
                                    />
                                    <span><strong>NAME OF SCHOOL</strong></span>
                                </label>
                            </div>

                            <div class="col-lg-3">
                                <label
                                    class="form-group has-float-label"
                                    for="basic_education"
                                >
                                    <input
                                        type="text"
                                        id="basic_education"
                                        class="form-control text-uppercase"
                                        v-model="
                                            educationalBackground.additionals
                                                .college[index].basic_education
                                        "
                                    />
                                    <span
                                        ><strong
                                            >BASIC
                                            EDUCATION/DEGREE/COURSE</strong
                                        ></span
                                    >
                                </label>
                            </div>

                            <div class="col-lg-3">
                                <label
                                    class="form-group has-float-label mb-0"
                                    for="period_from"
                                >
                                    <input
                                        type="text"
                                        id="period_from"
                                        class="form-control"
                                        :class="
                                            isFieldInvalid(
                                                `additionals.college.${index}.period_from`
                                            )
                                        "
                                        v-model="
                                            educationalBackground.additionals
                                                .college[index].period_from
                                        "
                                        @input="
                                            numberOnly(
                                                `additionals.college.${index}.period_from`
                                            )
                                        "
                                        @keypress="
                                            limitByLength(
                                                `additionals.college.${index}.period_from`
                                            )
                                        "
                                    />
                                    <span
                                        ><strong
                                            >PERIOD OF ATTENDANCE (FROM)</strong
                                        ></span
                                    >
                                </label>
                                <p class="text-danger">
                                    {{
                                        errors[
                                            `additionals.college.${index}.period_from`
                                        ]
                                    }}
                                </p>
                            </div>
                            <div class="col-lg-3">
                                <label
                                    class="form-group has-float-label mb-0"
                                    for="period_to"
                                >
                                    <input
                                        type="text"
                                        id="period_to"
                                        class="form-control"
                                        v-model="
                                            educationalBackground.additionals
                                                .college[index].period_to
                                        "
                                        @input="
                                            numberOnly(
                                                `additionals.college.${index}.period_to`
                                            )
                                        "
                                        @keypress="
                                            limitByLength(
                                                `additionals.college.${index}.period_to`,
                                                yearMaxLength
                                            )
                                        "
                                        :class="
                                            isFieldInvalid(
                                                `additionals.college.${index}.period_to`
                                            )
                                        "
                                    />
                                    <span
                                        ><strong
                                            >PERIOD OF ATTENDANCE (TO)</strong
                                        ></span
                                    >
                                </label>
                                <p class="text-danger text-sm">
                                    {{
                                        errors[
                                            `additionals.college.${index}.period_to`
                                        ]
                                    }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="pl-3 pr-3 pb-3">
                        <div class="row">
                            <div class="col-lg-4">
                                <label
                                    class="form-group has-float-label"
                                    for="unit_earned"
                                >
                                    <input
                                        type="text"
                                        id="unit_earned"
                                        class="form-control"
                                        v-model="
                                            educationalBackground.additionals
                                                .college[index].unit_earned
                                        "
                                        @input="
                                            numberOnly(
                                                `additionals.college.${index}.unit_earned`
                                            )
                                        "
                                    />
                                    <span
                                        ><strong
                                            >HIGHEST LEVEL/UNIT EARNED (if not
                                            graduated)</strong
                                        ></span
                                    >
                                </label>
                            </div>

                            <div class="col-lg-2">
                                <label
                                    class="form-group has-float-label mb-0"
                                    for="year_graduate"
                                >
                                    <input
                                        type="text"
                                        id="year_graduate"
                                        class="form-control"
                                        v-model="
                                            educationalBackground.additionals
                                                .college[index].year_graduate
                                        "
                                        @input="
                                            numberOnly(
                                                `additionals.college.${index}.year_graduate`
                                            )
                                        "
                                        @keypress="
                                            limitByLength(
                                                `additionals.college.${index}.year_graduate`,
                                                yearMaxLength
                                            )
                                        "
                                        :class="
                                            isFieldInvalid(
                                                `additionals.college.${index}.year_graduate`
                                            )
                                        "
                                    />
                                    <span><strong>YEAR GRADUATED</strong></span>
                                </label>
                                <p class="text-danger text-sm">
                                    {{
                                        errors[
                                            `additionals.college.${index}.year_graduate`
                                        ]
                                    }}
                                </p>
                            </div>

                            <div class="col-lg-6">
                                <label
                                    class="form-group has-float-label"
                                    for="scholarship"
                                >
                                    <input
                                        type="text"
                                        id="scholarship"
                                        class="form-control"
                                        v-model="
                                            educationalBackground.additionals
                                                .college[index].scholarship
                                        "
                                    />
                                    <span
                                        ><strong
                                            >SCHOLARSHIP/ACADEMIC HONORS
                                            RECEIVED</strong
                                        ></span
                                    >
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="float-right">
                <!-- <button class="btn btn-info shadow-sm mx-3" @click="addCollege">
                    <i class="la la-plus"></i>
                    ADD COLLEGE RECORD
                </button> -->
            </div>
            <div class="clearfix"></div>
            <hr />

            <div class="p-3">
                <div
                    class="alert alert-secondary text-center font-weight-bold"
                    role="alert"
                >
                    GRADUATE STUDIES
                </div>
            </div>
            <div class="">
                <div class="pl-3 pr-3 pb-3">
                    <div class="row">
                        <div class="col-lg-3">
                            <label
                                class="form-group has-float-label"
                                for="name"
                            >
                                <input
                                    type="text"
                                    id="name"
                                    class="form-control text-uppercase"
                                    v-model="
                                        educationalBackground.graduate_studies_name
                                    "
                                />
                                <span><strong>NAME OF SCHOOL</strong></span>
                            </label>
                        </div>

                        <div class="col-lg-3">
                            <label
                                class="form-group has-float-label"
                                for="basic_education"
                            >
                                <input
                                    type="text"
                                    id="basic_education"
                                    class="form-control text-uppercase"
                                    v-model="
                                        educationalBackground.graduate_studies_education
                                    "
                                />
                                <span
                                    ><strong
                                        >BASIC EDUCATION/DEGREE/COURSE</strong
                                    ></span
                                >
                            </label>
                        </div>

                        <div class="col-lg-3">
                            <label
                                class="form-group has-float-label mb-0"
                                for="graduate_studies_period_from"
                            >
                                <input
                                    type="text"
                                    id="graduate_studies_period_from"
                                    class="form-control"
                                    v-model="
                                        educationalBackground.graduate_studies_period_from
                                    "
                                    @input="
                                        numberOnly(
                                            `graduate_studies_period_from`
                                        )
                                    "
                                    @keypress="
                                        limitByLength(
                                            `graduate_studies_period_from`,
                                            yaerMaxLength
                                        )
                                    "
                                    :class="
                                        isFieldInvalid(
                                            `graduate_studies_period_from`
                                        )
                                    "
                                />
                                <span
                                    ><strong
                                        >PERIOD OF ATTENDANCE (FROM)</strong
                                    ></span
                                >
                            </label>
                            <p class="text-danger text-sm">
                                {{ errors.graduate_studies_period_from }}
                            </p>
                        </div>
                        <div class="col-lg-3">
                            <label
                                class="form-group has-float-label mb-0"
                                for="graduate_studies_period_to"
                            >
                                <input
                                    type="text"
                                    id="graduate_studies_period_to"
                                    class="form-control"
                                    v-model="
                                        educationalBackground.graduate_studies_period_to
                                    "
                                    @input="
                                        numberOnly(`graduate_studies_period_to`)
                                    "
                                    @keypress="
                                        limitByLength(
                                            `graduate_studies_period_to`,
                                            yaerMaxLength
                                        )
                                    "
                                    :class="
                                        isFieldInvalid(
                                            `graduate_studies_period_to`
                                        )
                                    "
                                />
                                <span
                                    ><strong
                                        >PERIOD OF ATTENDANCE (TO)</strong
                                    ></span
                                >
                            </label>
                            <p class="text-danger text-sm">
                                {{ errors.graduate_studies_period_to }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="pl-3 pr-3 pb-3">
                    <div class="row">
                        <div class="col-lg-4">
                            <label class="form-group has-float-label">
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="
                                        educationalBackground.graduate_studies_highest_level_units_earned
                                    "
                                    @input="
                                        numberOnly(
                                            `graduate_studies_highest_level_units_earned`
                                        )
                                    "
                                    @keypress="
                                        limitByLength(
                                            `graduate_studies_highest_level_units_earned`,
                                            yaerMaxLength
                                        )
                                    "
                                    :class="
                                        isFieldInvalid(
                                            `graduate_studies_highest_level_units_earned`
                                        )
                                    "
                                />
                                <span
                                    ><strong
                                        >HIGHEST LEVEL/UNIT EARNED (if not
                                        graduated)</strong
                                    ></span
                                >
                            </label>
                        </div>

                        <div class="col-lg-2">
                            <label
                                class="form-group has-float-label mb-0"
                                for="year_graduate"
                            >
                                <input
                                    type="text"
                                    id="year_graduate"
                                    class="form-control"
                                    v-model="
                                        educationalBackground.graduate_studies_year_graduated
                                    "
                                    @input="
                                        numberOnly(
                                            `graduate_studies_year_graduated`
                                        )
                                    "
                                    @keypress="
                                        limitByLength(
                                            `graduate_studies_year_graduated`,
                                            yaerMaxLength
                                        )
                                    "
                                    :class="
                                        isFieldInvalid(
                                            `graduate_studies_year_graduated`
                                        )
                                    "
                                />
                                <span><strong>YEAR GRADUATED</strong></span>
                            </label>
                            <p class="text-danger text-sm">
                                {{ errors.graduate_studies_year_graduated }}
                            </p>
                        </div>

                        <div class="col-lg-6">
                            <label class="form-group has-float-label">
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="
                                        educationalBackground.graduate_studies_scholarship
                                    "
                                />
                                <span
                                    ><strong
                                        >SCHOLARSHIP/ACADEMIC HONORS
                                        RECEIVED</strong
                                    ></span
                                >
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dynamic__graduate__studies__container">
                <div
                    v-for="(graduateStudy, index) in this.educationalBackground
                        .additionals.graduate"
                    :key="index"
                >
                    <hr />
                    <div class="pl-3 pr-3 pb-3">
                        <div class="float-right">
                            <button
                                @click="removeGraduateStudy(index)"
                                class="btn btn-danger font-weight-bold mt-1 rounded-circle mb-2"
                            >
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-lg-3">
                                <label
                                    class="form-group has-float-label"
                                    for="name"
                                >
                                    <input
                                        type="text"
                                        id="name"
                                        class="form-control text-uppercase"
                                        :class="
                                            !errors.hasOwnProperty(
                                                `additionals.graduate.${index}.name`
                                            )
                                                ? ''
                                                : 'is-invalid'
                                        "
                                        v-model="
                                            educationalBackground.additionals
                                                .graduate[index].name
                                        "
                                    />
                                    <span><strong>NAME OF SCHOOL</strong></span>
                                </label>
                            </div>

                            <div class="col-lg-3">
                                <label
                                    class="form-group has-float-label"
                                    for="basic_education"
                                >
                                    <input
                                        type="text"
                                        id="basic_education"
                                        class="form-control text-uppercase"
                                        v-model="
                                            educationalBackground.additionals
                                                .graduate[index].basic_education
                                        "
                                    />
                                    <span
                                        ><strong
                                            >BASIC
                                            EDUCATION/DEGREE/COURSE</strong
                                        ></span
                                    >
                                </label>
                            </div>

                            <div class="col-lg-3">
                                <label
                                    class="form-group has-float-label mb-0"
                                    for="period_from"
                                >
                                    <input
                                        type="text"
                                        id="period_from"
                                        class="form-control"
                                        v-model="
                                            educationalBackground.additionals
                                                .graduate[index].period_from
                                        "
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                        @keypress="
                                            if (
                                                educationalBackground
                                                    .additionals.graduate[index]
                                                    .period_from.length > 3
                                            )
                                                educationalBackground.additionals.graduate[
                                                    index
                                                ].period_from = educationalBackground.additionals.graduate[
                                                    index
                                                ].period_from.slice(0, 3);
                                        "
                                        :class="
                                            !errors.hasOwnProperty(
                                                `additionals.graduate.${index}.period_from`
                                            )
                                                ? ''
                                                : 'is-invalid'
                                        "
                                    />
                                    <span
                                        ><strong
                                            >PERIOD OF ATTENDANCE (FROM)</strong
                                        ></span
                                    >
                                </label>
                                <p
                                    class="text-danger text-sm"
                                    v-if="
                                        errors[
                                            `additionals.graduate.${index}.period_from`
                                        ]
                                    "
                                >
                                    {{
                                        errors[
                                            `additionals.graduate.${index}.period_from`
                                        ]
                                    }}
                                </p>
                            </div>
                            <div class="col-lg-3">
                                <label
                                    class="form-group has-float-label mb-0"
                                    for="period_to"
                                >
                                    <input
                                        type="text"
                                        id="period_to"
                                        class="form-control"
                                        v-model="
                                            educationalBackground.additionals
                                                .graduate[index].period_to
                                        "
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                        @keypress="
                                            if (
                                                educationalBackground
                                                    .additionals.graduate[index]
                                                    .period_to.length > 3
                                            )
                                                educationalBackground.additionals.graduate[
                                                    index
                                                ].period_to = educationalBackground.additionals.graduate[
                                                    index
                                                ].period_to.slice(0, 3);
                                        "
                                        :class="
                                            !errors.hasOwnProperty(
                                                `additionals.graduate.${index}.period_to`
                                            )
                                                ? ''
                                                : 'is-invalid'
                                        "
                                    />
                                    <span
                                        ><strong
                                            >PERIOD OF ATTENDANCE (TO)</strong
                                        ></span
                                    >
                                </label>
                                <p
                                    class="text-danger text-sm"
                                    v-if="
                                        errors[
                                            `additionals.graduate.${index}.period_to`
                                        ]
                                    "
                                >
                                    {{
                                        errors[
                                            `additionals.graduate.${index}.period_to`
                                        ]
                                    }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="pl-3 pr-3 pb-3">
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="form-group has-float-label">
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="
                                            educationalBackground.additionals
                                                .graduate[index].unit_earned
                                        "
                                        oninput="this.value = this.value.replace(/[^0-9|.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    />
                                    <span
                                        ><strong
                                            >HIGHEST LEVEL/UNIT EARNED (if not
                                            graduated)</strong
                                        ></span
                                    >
                                </label>
                            </div>

                            <div class="col-lg-2">
                                <label
                                    class="form-group has-float-label mb-0"
                                    for="year_graduate"
                                >
                                    <input
                                        type="text"
                                        id="year_graduate"
                                        class="form-control"
                                        v-model="
                                            educationalBackground.additionals
                                                .graduate[index].year_graduate
                                        "
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                        @keypress="
                                            if (
                                                educationalBackground
                                                    .additionals.graduate[index]
                                                    .year_graduate.length > 3
                                            )
                                                educationalBackground.additionals.graduate[
                                                    index
                                                ].year_graduate = educationalBackground.additionals.graduate[
                                                    index
                                                ].year_graduate.slice(0, 3);
                                        "
                                        :class="
                                            !errors.hasOwnProperty(
                                                'year_graduate'
                                            )
                                                ? ''
                                                : 'is-invalid'
                                        "
                                    />
                                    <span><strong>YEAR GRADUATED</strong></span>
                                </label>
                                <p class="text-danger text-sm">
                                    {{ errors.year_graduate }}
                                </p>
                            </div>

                            <div class="col-lg-6">
                                <label class="form-group has-float-label">
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="
                                            educationalBackground.additionals
                                                .graduate[index].scholarship
                                        "
                                    />
                                    <span
                                        ><strong
                                            >SCHOLARSHIP/ACADEMIC HONORS
                                            RECEIVED</strong
                                        ></span
                                    >
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="float-right">
                <!-- <button
                    class="btn btn-info shadow-sm mx-3"
                    @click="addGraduate"
                >
                    <i class="la la-plus"></i>
                    ADD GRADUATE STUDIES RECORD
                </button> -->
            </div>
            <div class="clearfix"></div>
            <hr />
            <div class="float-right">
                <button
                    class="btn btn-success mr-3 mb-2 shadow"
                    :class="
                        Object.keys(errors).length != 0
                            ? 'btn-danger'
                            : 'btn-success'
                    "
                    @click="submitEducationalBackground"
                    :disabled="isLoading"
                >
                    <i class="fa fa-pencil"></i>

                    UPDATE
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
        employeeID: {
            required: true,
        },
    },
    data() {
        return {
            isLoading: false,
            yearMaxLength: 3,
            educationalBackground: {
                employee_id: this.employeeID,

                elementary_name: "",
                elementary_education: "PRIMARY",
                elementary_period_from: "",
                elementary_period_to: "",
                elementary_highest_level_units_earned: "",
                elementary_year_graduated: "",
                elementary_scholarship: "",

                secondary_name: "",
                secondary_education: "SECONDARY",
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
                additionals: {
                    vocational: [],
                    college: [],
                    graduate: [],
                },
            },
            errors: {},
        };
    },
    methods: {
        limitByLength(value, limit) {
            if (!this.educationalBackground.hasOwnProperty(value)) {
                throw new Error(`limitByLength method Undefined key ${value}`);
            }
            if (this.educationalBackground[value].length > 3)
                this.educationalBackground[value] = this.educationalBackground[
                    value
                ].slice(0, limit);
        },
        numberOnly(key) {
            if (!this.educationalBackground.hasOwnProperty(key)) {
                throw new Error(`numberOnly method Undefined key ${key}`);
            }
            this.educationalBackground[key] = this.educationalBackground[
                key
            ].replace(/[^0-9]/g, "");
        },
        isFieldInvalid(key) {
            if (!this.educationalBackground.hasOwnProperty(key)) {
                throw new Error(`isFieldInvalid method Undefined key ${key}`);
            }
            return this.errors.hasOwnProperty(key) ? "is-invalid" : "";
        },
        removeVocationalCourse(index) {
            swal({
                title: "Wait a minute",
                text: "Are you sure you want to remove this record?",
                icon: "warning",
            }).then((isClicked) => {
                if (isClicked) {
                    this.educationalBackground.additionals.vocational.splice(
                        index,
                        1
                    );
                }
            });
        },
        removeCollege(index) {
            swal({
                title: "Wait a minute",
                text: "Are you sure you want to remove this record?",
                icon: "warning",
            }).then((isClicked) => {
                if (isClicked) {
                    this.educationalBackground.additionals.college.splice(
                        index,
                        1
                    );
                }
            });
        },
        removeGraduateStudy(index) {
            swal({
                title: "Wait a minute",
                text: "Are you sure you want to remove this record?",
                icon: "warning",
            }).then((isClicked) => {
                if (isClicked) {
                    this.educationalBackground.additionals.graduate.splice(
                        index,
                        1
                    );
                }
            });
        },
        addVocationalCourse() {
            this.educationalBackground.additionals.vocational.push({
                name: "",
                basic_education: "",
                period_from: "",
                period_to: "",
                unit_earned: "",
                year_graduate: "",
                scholarship: "",
            });
        },
        addCollege() {
            this.educationalBackground.additionals.college.push({
                name: "",
                basic_education: "",
                period_from: "",
                period_to: "",
                unit_earned: "",
                year_graduate: "",
                scholarship: "",
            });
        },
        addGraduate() {
            this.educationalBackground.additionals.graduate.push({
                name: "",
                basic_education: "",
                period_from: "",
                period_to: "",
                unit_earned: "",
                year_graduate: "",
                scholarship: "",
            });
        },
        submitEducationalBackground() {
            this.isLoading = true;
            this.errors = {};
            window.axios
                .post(
                    `/api/personal-data-sheet/educational-background/update/${this.employeeID}`,
                    this.educationalBackground
                )
                .then((response) => {
                    if (response.status === 200) {
                        this.isLoading = false;
                        swal({
                            title: "Awesome",
                            text: "Successfully store all your inputs in educational background",
                            icon: "success",
                            buttons: false,
                            timer: 5000,
                        });
                    }
                })
                .catch((error) => {
                    this.isLoading = false;
                    this.errors = {};
                    if (error.response.status === 422) {
                        Object.keys(error.response.data.errors).map(
                            (field, index) => {
                                let [fieldMessage] =
                                    error.response.data.errors[field];
                                this.errors[field] = fieldMessage;
                            }
                        );
                    }
                });
        },
    },
    created() {
        window
            .axios(
                `/api/personal-data-sheet/educational-background/fetch/${this.employeeID}`
            )
            .then((response) => {
                if (
                    response.status === 200 &&
                    response.data.hasOwnProperty("elementary_period_from")
                ) {
                    this.educationalBackground = response.data;
                }
            });
    },
};
</script>

<style></style>
