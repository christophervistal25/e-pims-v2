<template>
    <div>
        <div class="card-body">
            <h3 class="card-title">
                Address
            </h3>
            <h5 class="section-title">Residential Address</h5>
            <ul class="personal-info">
                <div class="row">
                    <div class="col-lg-6 title">
                        Residential House No
                    </div>
                    <div class="col-lg-auto">
                        <li>
                            <div class="text">
                                {{ employee.residential_no || "N/A" }}
                            </div>
                        </li>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 title">Residential Street</div>
                    <div class="col-lg-auto">
                        <li>
                            <div class="text">
                                {{ employee.residential_street || "N/A" }}
                            </div>
                        </li>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 title">Residential Village</div>
                    <div class="col-lg-auto">
                        <li>
                            <div class="text">
                                {{ employee.residential_village || "N/A" }}
                            </div>
                        </li>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 title">Residential Province</div>
                    <div class="col-lg-auto">
                        <li>
                            <div class="text">
                                {{ employee.residential_province || "N/A" }}
                            </div>
                        </li>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 title">Residential City</div>
                    <div class="col-lg-auto">
                        <li>
                            <div class="text">
                                {{ employee.residential_city || "N/A" }}
                            </div>
                        </li>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 title">Residential Barangay</div>
                    <div class="col-lg-auto">
                        <li>
                            <div class="text">
                                {{ employee.residential_barangay || "N/A" }}
                            </div>
                        </li>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 title">Residential Zip Code</div>
                    <div class="col-lg-auto">
                        <li>
                            <div class="text">
                                {{ employee.residential_zip_code || "N/A" }}
                            </div>
                        </li>
                    </div>
                </div>
            </ul>

            <hr />
            <h5 class="section-title">Permanent Address</h5>

            <ul class="personal-info">
                <div class="row">
                    <div class="col-lg-6 title">
                        Permanent House No
                    </div>
                    <div class="col-lg-auto">
                        <li>
                            <div class="text">
                                {{ employee.permanent_no || "N/A" }}
                            </div>
                        </li>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 title">Permanent Street</div>
                    <div class="col-lg-auto">
                        <li>
                            <div class="text">
                                {{ employee.permanent_street || "N/A" }}
                            </div>
                        </li>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 title">Permanent Village</div>
                    <div class="col-lg-auto">
                        <li>
                            <div class="text">
                                {{ employee.permanent_village || "N/A" }}
                            </div>
                        </li>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 title">Permanent Province</div>
                    <div class="col-lg-auto">
                        <li>
                            <div class="text">
                                {{ employee.permanent_province || "N/A" }}
                            </div>
                        </li>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 title">Permanent City</div>
                    <div class="col-lg-auto">
                        <li>
                            <div class="text">
                                {{ employee.permanent_city || "N/A" }}
                            </div>
                        </li>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 title">Permanent Barangay</div>
                    <div class="col-lg-auto">
                        <li>
                            <div class="text">
                                {{ employee.permanent_barangay || "N/A" }}
                            </div>
                        </li>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 title">Permanent Zip Code</div>
                    <div class="col-lg-auto">
                        <li>
                            <div class="text">
                                {{ employee.permanent_zip_code || "N/A" }}
                            </div>
                        </li>
                    </div>
                </div>
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
