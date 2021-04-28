<template>
    <div>
        <div class="card-body">
            <h3 class="card-title">
                Government Issued Numbers
            </h3>
            <ul class="personal-info">
                <li>
                    <div class="title">GSIS BP NO</div>
                    <div class="text">{{ employee.gsis_bp_no || "N/A" }}</div>
                </li>
                <li>
                    <div class="title">GSIS ID NO</div>
                    <div class="text">{{ employee.gsis_id_no || "N/A" }}</div>
                </li>
                <li>
                    <div class="title">GSIS POLICY NO</div>
                    <div class="text">
                        {{ employee.gsis_policy_no || "N/A" }}
                    </div>
                </li>
                <li>
                    <div class="title">PAG-IBIG NO</div>
                    <div class="text">{{ employee.pag_ibig_no || "N/A" }}</div>
                </li>
                <li>
                    <div class="title">PHILHEALTH NO</div>
                    <div class="text">
                        {{ employee.philhealth_no || "N/A" }}
                    </div>
                </li>
                <li>
                    <div class="title">SSS NO</div>
                    <div class="text">{{ employee.sss_no || "N/A" }}</div>
                </li>
                <li>
                    <div class="title">TIN NO</div>
                    <div class="text">{{ employee.tin_no || "N/A" }}</div>
                </li>
            </ul>
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
