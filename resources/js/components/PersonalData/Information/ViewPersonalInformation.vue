<template>
    <div>
        <div class="card-body">
            <h3 class="card-title">
                Personal Informations
                <a
                    href="#"
                    class="edit-icon"
                    data-toggle="modal"
                    data-target="#personal_info_modal"
                    ><i class="fa fa-pencil"></i
                ></a>
            </h3>
            <ul class="personal-info">
                <li>
                    <div class="title">Surname</div>
                    <div class="text">{{ employee.lastname || "N/A" }}</div>
                </li>
                <li>
                    <div class="title">First Name</div>
                    <div class="text">{{ employee.firstname || "N/A" }}</div>
                </li>
                <li>
                    <div class="title">Middle Name</div>
                    <div class="text">{{ employee.middlename || "N/A" }}</div>
                </li>
                <li>
                    <div class="title">Extension Name</div>
                    <div class="text">{{ employee.extension || "N/A" }}</div>
                </li>
                <li>
                    <div class="title">Date of Birth</div>
                    <div class="text">{{ employee.date_birth || "N/A" }}</div>
                </li>
                <li>
                    <div class="title">Place of Birth</div>
                    <div class="text">{{ employee.place_birth || "N/A" }}</div>
                </li>
                <li>
                    <div class="title">Citizenship</div>
                    <div class="text">{{ employee.citizenship || "N/A" }}</div>
                </li>
                <li>
                    <div class="title">Sex</div>
                    <div class="text">{{ employee.sex || "N/A" }}</div>
                </li>
                <li>
                    <div class="title">Height</div>
                    <div class="text">{{ employee.height || "N/A" }}</div>
                </li>
                <li>
                    <div class="title">Weight</div>
                    <div class="text">{{ employee.weight || "N/A" }}</div>
                </li>
                <li>
                    <div class="title">Bloodtype</div>
                    <div class="text">{{ employee.blood_type || "N/A" }}</div>
                </li>
                <li>
                    <div class="title">Civil Status</div>
                    <div class="text">{{ employee.civil_status || "N/A" }}</div>
                </li>
                <li>
                    <div class="title">Telephone Number</div>
                    <div class="text">{{ employee.telephone_no || "N/A" }}</div>
                </li>
                <li>
                    <div class="title">Mobile Number</div>
                    <div class="text">{{ employee.mobile_no || "N/A" }}</div>
                </li>
                <li>
                    <div class="title">Email Address</div>
                    <div class="text">{{ employee.email || "N/A" }}</div>
                </li>
                <li>
                    <div class="title">Trans No</div>
                    <div class="text">{{ employee.trans_no || "N/A" }}</div>
                </li>
                <li>
                    <div class="title">Agency Employee No</div>
                    <div class="text">
                        {{ employee.agency_employee_no || "N/A" }}
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    props: ["employee"]
};
</script>

<style></style>
