<template>
    <div>
        <div v-if="employee.hasOwnProperty('employee_id')">
            <div class="form-group">
                <label>Surname</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.lastname"
                />
            </div>
            <div class="form-group">
                <label>Firstname</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.firstname"
                />
            </div>
            <div class="form-group">
                <label>Middlename</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.middlename"
                />
            </div>
            <div class="form-group">
                <label>Extension</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.extension"
                />
            </div>
            <div class="form-group">
                <label class="text-capitalize">agency employee no.</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.agency_employee_no"
                />
            </div>
            <div class="form-group">
                <label class="text-capitalize">blood type</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.blood_type"
                />
            </div>
            <div class="form-group">
                <label class="text-capitalize">citizenship</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.citizenship"
                />
            </div>
            <div class="form-group">
                <label class="text-capitalize">civil status</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.civil_status"
                />
            </div>
            <div class="form-group">
                <label class="text-capitalize">date birth</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.date_birth"
                />
            </div>
            <div class="form-group">
                <label class="text-capitalize">email address</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.email_address"
                />
            </div>
            <div class="form-group">
                <label class="text-capitalize">employee ID</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.employee_id"
                />
            </div>
            <div class="form-group">
                <label>extension</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.extension"
                />
            </div>
            <div class="form-group">
                <label class="text-uppercase">gsis bp no</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.gsis_bp_no"
                />
            </div>
            <div class="form-group">
                <label class="text-uppercase">gsis id no</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.gsis_id_no"
                />
            </div>
            <div class="form-group">
                <label class="text-uppercase">gsis policy no</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.gsis_policy_no"
                />
            </div>
            <div class="form-group">
                <label class="text-capitalize">height</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.height"
                />
            </div>
            <div class="form-group">
                <label class="text-capitalize">mobile no</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.mobile_no"
                />
            </div>
            <div class="form-group">
                <label class="text-capitalize">pag ibig no</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.pag_ibig_no"
                />
            </div>
            <div class="form-group">
                <label class="text-capitalize">permanent barangay</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.permanent_barangay"
                />
            </div>
            <div class="form-group">
                <label class="text-capitalize">permanent city</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.permanent_city"
                />
            </div>
            <div class="form-group">
                <label class="text-capitalize">permanent house NO</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.permanent_house_no"
                />
            </div>
            <div class="form-group">
                <label class="text-capitalize">permanent province</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.permanent_province"
                />
            </div>
            <div class="form-group">
                <label class="text-capitalize">permanent street</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.permanent_street"
                />
            </div>
            <div class="form-group">
                <label class="text-capitalize">permanent village</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.permanent_village"
                />
            </div>
            <div class="form-group">
                <label class="text-capitalize">permanent zip code</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.permanent_zip_code"
                />
            </div>
            <div class="form-group">
                <label class="text-capitalize">philhealth no</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.philhealth_no"
                />
            </div>
            <div class="form-group">
                <label class="text-capitalize">place birth</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.place_birth"
                />
            </div>
            <div class="form-group">
                <label class="text-capitalize">residential barangay</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.residential_barangay"
                />
            </div>
            <div class="form-group">
                <label class="text-capitalize">residential city</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.residential_city"
                />
            </div>
            <div class="form-group">
                <label class="text-capitalize">residential house no</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.residential_house_no"
                />
            </div>
            <div class="form-group">
                <label class="text-capitalize">residential province</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.residential_province"
                />
            </div>
            <div class="form-group">
                <label class="text-capitalize">residential street</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.residential_street"
                />
            </div>
            <div class="form-group">
                <label class="text-capitalize">residential village</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.residential_village"
                />
            </div>
            <div class="form-group">
                <label class="text-capitalize">residential zip code</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.residential_zip_code"
                />
            </div>
            <div class="form-group">
                <label class="text-capitalize">sex</label>
                <input type="text" class="form-control" :value="employee.sex" />
            </div>
            <div class="form-group">
                <label class="text-capitalize"
                    ><span class="text-uppercase">sss</span> no</label
                >
                <input
                    type="text"
                    class="form-control"
                    :value="employee.sss_no"
                />
            </div>
            <div class="form-group">
                <label class="text-capitalize">status</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.status"
                />
            </div>
            <div class="form-group">
                <label class="text-capitalize">telephone no</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.telephone_no"
                />
            </div>
            <div class="form-group">
                <label class="text-capitalize">tin no</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.tin_no"
                />
            </div>
            <div class="form-group">
                <label class="text-capitalize">trans no</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.trans_no"
                />
            </div>
            <div class="form-group">
                <label class="text-capitalize">weight</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.weight"
                />
            </div>
        </div>
        <div v-else></div>
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
