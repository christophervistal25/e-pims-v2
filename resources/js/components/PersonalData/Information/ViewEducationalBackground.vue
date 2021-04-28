<template>
    <div>
        <div class="card-body">
            <h3 class="card-title">
                Educational Background<a
                    href="#"
                    class="edit-icon"
                    data-toggle="modal"
                    data-target="#education_info"
                    ><i class="fa fa-pencil"></i
                ></a>
            </h3>
            <div class="experience-box">
                <ul class="experience-list">
                    <li
                        v-if="
                            employee &&
                                employee.educational_background &&
                                employee.educational_background.elementary_name
                        "
                    >
                        <div class="experience-user">
                            <div class="before-circle"></div>
                        </div>
                        <div class="experience-content">
                            <div class="timeline-content">
                                <a href="#/" class="name">Elementary</a>
                                <div>
                                    {{
                                        employee.educational_background
                                            .elementary_name
                                    }}
                                </div>
                                <span class="time"
                                    >{{
                                        employee.educational_background
                                            .elementary_period_from
                                    }}
                                    -
                                    {{
                                        employee.educational_background
                                            .elementary_period_to
                                    }}</span
                                >
                            </div>
                        </div>
                    </li>
                    <li
                        v-if="
                            employee &&
                                employee.educational_background &&
                                employee.educational_background.secondary_name
                        "
                    >
                        <div class="experience-user">
                            <div class="before-circle"></div>
                        </div>
                        <div class="experience-content">
                            <div class="timeline-content">
                                <a href="#/" class="name">Secondary</a>
                                <div>
                                    {{
                                        employee.educational_background
                                            .secondary_name
                                    }}
                                </div>
                                <span class="time"
                                    >{{
                                        employee.educational_background
                                            .secondary_period_from
                                    }}
                                    -
                                    {{
                                        employee.educational_background
                                            .secondary_period_to
                                    }}</span
                                >
                            </div>
                        </div>
                    </li>

                    <li
                        v-if="
                            employee &&
                                employee.educational_background &&
                                employee.educational_background
                                    .vocational_trade_course_name
                        "
                    >
                        <div class="experience-user">
                            <div class="before-circle"></div>
                        </div>
                        <div class="experience-content">
                            <div class="timeline-content">
                                <a href="#/" class="name"
                                    >Vocational :
                                    {{
                                        employee.educational_background
                                            .vocational_trade_course_name
                                    }}</a
                                >
                                <div>
                                    {{
                                        employee.educational_background
                                            .vocational_education
                                    }}
                                </div>
                                <span class="time"
                                    >{{
                                        employee.educational_background
                                            .vocational_trade_course_period_from
                                    }}
                                    -
                                    {{
                                        employee.educational_background
                                            .vocational_trade_course_period_to
                                    }}</span
                                >
                            </div>
                        </div>
                    </li>

                    <li v-if="employee && employee.educational_background">
                        <div class="experience-user">
                            <div class="before-circle"></div>
                        </div>
                        <div class="experience-content">
                            <div class="timeline-content">
                                <a href="#/" class="name"
                                    >College :
                                    {{
                                        employee.educational_background
                                            .college_name
                                    }}</a
                                >
                                <div>
                                    {{
                                        employee.educational_background
                                            .college_education
                                    }}
                                </div>
                                <span class="time"
                                    >{{
                                        employee.educational_background
                                            .college_period_from
                                    }}
                                    -
                                    {{
                                        employee.educational_background
                                            .college_period_to
                                    }}</span
                                >
                            </div>
                        </div>
                    </li>

                    <!-- <li>
                        <div class="experience-user">
                            <div class="before-circle"></div>
                        </div>
                        <div class="experience-content">
                            <div class="timeline-content">
                                <a href="#/" class="name">College</a>
                                <div>Computer Science</div>
                                <span class="time">2000 - 2003</span>
                            </div>
                        </div>
                    </li> -->
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        employee: {
            required: true,
            type: Object
        }
    }
};
</script>

<style></style>
