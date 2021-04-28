<template>
    <div>
        <div class="card-body">
            <h3 class="card-title">
                Address<a
                    href="#"
                    data-toggle="modal"
                    data-target="#emergency_contact_modal"
                    class="edit-icon"
                    ><i class="fa fa-pencil"></i
                ></a>
            </h3>
            <h5 class="section-title">Residential Address</h5>
            <ul class="personal-info">
                <li>
                    <div class="title">
                        Residential House No
                    </div>
                    <div class="text">
                        {{ employee.residential_no || "N/A" }}
                    </div>
                </li>
                <li>
                    <div class="title">Residential Street</div>
                    <div class="text">
                        {{ employee.residential_street || "N/A" }}
                    </div>
                </li>
                <li>
                    <div class="title">Residential Village</div>
                    <div class="text">
                        {{ employee.residential_village || "N/A" }}
                    </div>
                </li>
                <li>
                    <div class="title">
                        Residential Province
                    </div>
                    <div class="text">
                        {{ employee.residential_province || "N/A" }}
                    </div>
                </li>
                <li>
                    <div class="title">Residential City</div>
                    <div class="text">
                        {{ employee.residential_city || "N/A" }}
                    </div>
                </li>
                <li>
                    <div class="title">Residential Province</div>
                    <div class="text">
                        {{ employee.residential_province || "N/A" }}
                    </div>
                </li>
                <li>
                    <div class="title">Residential Barangay</div>
                    <div class="text">
                        {{ employee.residential_barangay || "N/A" }}
                    </div>
                </li>
                <li>
                    <div class="title">Residential Zip Code</div>
                    <div class="text">
                        {{ employee.residential_zip_code || "N/A" }}
                    </div>
                </li>
            </ul>

            <hr />
            <h5 class="section-title">Permanent Address</h5>

            <ul class="personal-info">
                <li>
                    <div class="title">Permanent House No</div>
                    <div class="text">
                        {{ employee.permanent_house_no || "N/A" }}
                    </div>
                </li>
                <li>
                    <div class="title">Permanent Street</div>
                    <div class="text">
                        {{ employee.permanent_street || "N/A" }}
                    </div>
                </li>
                <li>
                    <div class="title">Permanent Village</div>
                    <div class="text">
                        {{ employee.permanent_village || "N/A" }}
                    </div>
                </li>
                <li>
                    <div class="title">Permanent Province</div>
                    <div class="text">
                        {{ employee.permanent_province || "N/A" }}
                    </div>
                </li>
                <li>
                    <div class="title">Permanent City</div>
                    <div class="text">
                        {{ employee.permanent_city || "N/A" }}
                    </div>
                </li>
                <li>
                    <div class="title">Permanent Barangay</div>
                    <div class="text">
                        {{ employee.permanent_barangay || "N/A" }}
                    </div>
                </li>
                <li>
                    <div class="title">Permanent Zip Code</div>
                    <div class="text">
                        {{ employee.permanent_zip_code || "N/A" }}
                    </div>
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
