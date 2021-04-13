<template>
    <div>
        <div v-if="employee.hasOwnProperty('educational_background')">
            <div class="pl-3 pr-3">
                    <div
                        class="alert alert-secondary text-center font-weight-bold "
                        role="alert"
                    >
                        ELEMENTARY
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize">elementary name : </label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.educational_background.elementary_name"
                />
            </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize">elementary education : </label>
                <input
                    type="text"
                    class="form-control"
                    :value="
                        employee.educational_background.elementary_education
                    "
                />
            </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize">elementary period from : </label>
                <input
                    type="text"
                    class="form-control"
                    :value="
                        employee.educational_background.elementary_period_from
                    "
                />
            </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize">elementary period to : </label>
                <input
                    type="text"
                    class="form-control"
                    :value="
                        employee.educational_background.elementary_period_to
                    "
                />
            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                <label class="text-capitalize"
                    >elementary highest level units earned :
                </label>
                <input
                    type="text"
                    class="form-control"
                    :value="
                        employee.educational_background
                            .elementary_highest_level_units_earned
                    "
                />
            </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                <label class="text-capitalize"
                    >elementary year graduated :
                </label>
                <input
                    type="text"
                    class="form-control"
                    :value="
                        employee.educational_background
                            .elementary_year_graduated
                    "
                />
            </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                <label class="text-capitalize">elementary scholarship : </label>
                <input
                    type="text"
                    class="form-control"
                    :value="
                        employee.educational_background.elementary_scholarship
                    "
                />
            </div>
                    </div>
                </div>
                <div class="pl-3 pr-3">
                    <div
                        class="alert alert-secondary text-center font-weight-bold "
                        role="alert"
                    >
                        SECONDARY
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize">secondary name : </label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.educational_background.secondary_name"
                />
            </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize">secondary education : </label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.educational_background.secondary_education"
                />
            </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize">secondary period from : </label>
                <input
                    type="text"
                    class="form-control"
                    :value="
                        employee.educational_background.secondary_period_from
                    "
                />
            </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize">secondary period to : </label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.educational_background.secondary_period_to"
                />
            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                <label class="text-capitalize"
                    >secondary highest level units earned :
                </label>
                <input
                    type="text"
                    class="form-control"
                    :value="
                        employee.educational_background
                            .secondary_highest_level_units_earned
                    "
                />
            </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                <label class="text-capitalize"
                    >secondary year graduated :
                </label>
                <input
                    type="text"
                    class="form-control"
                    :value="
                        employee.educational_background.secondary_year_graduated
                    "
                />
            </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                <label class="text-capitalize">secondary scholarship : </label>
                <input
                    type="text"
                    class="form-control"
                    :value="
                        employee.educational_background.secondary_scholarship
                    "
                />
            </div>
                    </div>
                </div>
                <div class="pl-3 pr-3">
                    <div
                        class="alert alert-secondary text-center font-weight-bold "
                        role="alert"
                    >
                        VOCATIONAL/TRADE COURSE
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize"
                    >vocational trade course name :
                </label>
                <input
                    type="text"
                    class="form-control"
                    :value="
                        employee.educational_background
                            .vocational_trade_course_name
                    "
                />
            </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize">vocational education : </label>
                <input
                    type="text"
                    class="form-control"
                    :value="
                        employee.educational_background.vocational_education
                    "
                />
            </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize"
                    >vocational trade course period from :
                </label>
                <input
                    type="text"
                    class="form-control"
                    :value="
                        employee.educational_background
                            .vocational_trade_course_period_from
                    "
                />
            </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize"
                    >vocational trade course period to :
                </label>
                <input
                    type="text"
                    class="form-control"
                    :value="
                        employee.educational_background
                            .vocational_trade_course_period_to
                    "
                />
            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                <label>
                    vocational trade course highest level units earned :</label
                >
                <input
                    type="text"
                    class="form-control"
                    :value="
                        employee.educational_background
                            .vocational_trade_course_highest_level_units_earned
                    "
                />
            </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                <label class="text-capitalize"
                    >vocational trade course year graduated :
                </label>
                <input
                    type="text"
                    class="form-control"
                    :value="
                        employee.educational_background
                            .vocational_trade_course_year_graduated
                    "
                />
            </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                <label class="text-capitalize"
                    >vocational trade course scholarship :
                </label>
                <input
                    type="text"
                    class="form-control"
                    :value="
                        employee.educational_background
                            .vocational_trade_course_scholarship
                    "
                />
            </div>
                    </div>
                </div>
                <div class="pl-3 pr-3">
                    <div
                        class="alert alert-secondary text-center font-weight-bold "
                        role="alert"
                    >
                        COLLEGE
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize">college name : </label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.educational_background.college_name"
                />
            </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize">college education : </label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.educational_background.college_education"
                />
            </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize">college period from : </label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.educational_background.college_period_from"
                />
            </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize">college period to : </label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.educational_background.college_period_to"
                />
            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                <label class="text-capitalize"
                    >college highest level units earned :
                </label>
                <input
                    type="text"
                    class="form-control"
                    :value="
                        employee.educational_background
                            .college_highest_level_units_earned
                    "
                />
            </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                <label class="text-capitalize">college year graduated : </label>
                <input
                    type="text"
                    class="form-control"
                    :value="
                        employee.educational_background.college_year_graduated
                    "
                />
            </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                <label class="text-capitalize">college scholarship : </label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.educational_background.college_scholarship"
                />
            </div>
                    </div>
                </div>
                <div class="pl-3 pr-3">
                    <div
                        class="alert alert-secondary text-center font-weight-bold "
                        role="alert"
                    >
                        GRADUATE STUDIES
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">  
                        <div class="form-group">
                <label class="text-capitalize">graduate studies name : </label>
                <input
                    type="text"
                    class="form-control"
                    :value="
                        employee.educational_background.graduate_studies_name
                    "
                />
            </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize"
                    >graduate studies education :
                </label>
                <input
                    type="text"
                    class="form-control"
                    :value="
                        employee.educational_background
                            .graduate_studies_education
                    "
                />
            </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize"
                    >graduate studies period from :
                </label>
                <input
                    type="text"
                    class="form-control"
                    :value="
                        employee.educational_background
                            .graduate_studies_period_from
                    "
                />
            </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize"
                    >graduate studies period to :
                </label>
                <input
                    type="text"
                    class="form-control"
                    :value="
                        employee.educational_background
                            .graduate_studies_period_to
                    "
                />
            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                <label class="text-capitalize"
                    >graduate studies highest level units earned :
                </label>
                <input
                    type="text"
                    class="form-control"
                    :value="
                        employee.educational_background
                            .graduate_studies_highest_level_units_earned
                    "
                />
            </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                <label class="text-capitalize"
                    >graduate studies year graduated :
                </label>
                <input
                    type="text"
                    class="form-control"
                    :value="
                        employee.educational_background
                            .graduate_studies_year_graduated
                    "
                />
            </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                <label class="text-capitalize"
                    >graduate studies scholarship :
                </label>
                <input
                    type="text"
                    class="form-control"
                    :value="
                        employee.educational_background
                            .graduate_studies_scholarship
                    "
                />
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
            required: true
        }
    }
};
</script>

<style></style>
