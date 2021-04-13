<template>
    <div>
        <div v-if="employee.hasOwnProperty('employee_id')">
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                <label>Surname</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.lastname"
                />
            </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                <label>Firstname</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.firstname"
                />
            </div>
                </div>
            <div class="col-lg-3">
                <div class="form-group">
                <label>Middlename</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.middlename"
                />
            </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                <label>Extension</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.extension"
                />
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                <label class="text-capitalize">date birth</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.date_birth"
                />
            </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                <label class="text-capitalize">place birth</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.place_birth"
                />
            </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                <label class="text-capitalize">sex</label>
                <input type="text" class="form-control" :value="employee.sex" />
            </div>

            </div>
            <div class="col-lg-3">
                <div class="form-group">
                <label class="text-capitalize">civil status</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.civil_status"
                />
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                <label class="text-capitalize">height</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.height"
                />
            </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <label class="text-capitalize">weight</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.weight"
                />
            </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <label class="text-capitalize">blood type</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.blood_type"
                />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                <label class="text-uppercase">gsis bp no</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.gsis_bp_no"
                />
            </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <label class="text-uppercase">gsis id no</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.gsis_id_no"
                />
            </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <label class="text-uppercase">gsis policy no</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.gsis_policy_no"
                />
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                <label class="text-capitalize">pag ibig no</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.pag_ibig_no"
                />
            </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <label class="text-capitalize">philhealth no</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.philhealth_no"
                />
            </div>
            </div>
            <div class="col-lg-4">
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
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                <label class="text-capitalize">tin no</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.tin_no"
                />
            </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="text-capitalize">agency employee no.</label>
                    <input
                        type="text"
                        class="form-control"
                        :value="employee.agency_employee_no"
                />
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <label class="text-capitalize">citizenship</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.citizenship"
                />
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                <label class="text-capitalize">telephone no</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.telephone_no"
                />
            </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                <label class="text-capitalize">mobile no</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.mobile_no"
                />
            </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                <label class="text-capitalize">email address</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.email_address"
                />
            </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                <label class="text-capitalize">trans no</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.trans_no"
                />
            </div>
            </div>
        </div>
            <div class="pl-3 pr-3">
                    <div
                        class="alert alert-secondary text-center font-weight-bold"
                        role="alert"
                    >
                        RESIDENTIAL ADDRESS
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                <label class="text-capitalize">residential house no</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.residential_house_no"
                />
            </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                <label class="text-capitalize">residential street</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.residential_street"
                />
            </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                <label class="text-capitalize">residential village</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.residential_village"
                />
            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize">residential province</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.residential_province"
                />
            </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize">residential city</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.residential_city"
                />
            </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize">residential barangay</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.residential_barangay"
                />
            </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize">residential zip code</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.residential_zip_code"
                />
            </div>
                    </div>
                </div>
                <div class="pl-3 pr-3">
                    <div
                        class="alert alert-secondary text-center font-weight-bold"
                        role="alert"
                    >
                        PERMANENT ADDRESS
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                <label class="text-capitalize">permanent house NO</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.permanent_house_no"
                />
            </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                <label class="text-capitalize">permanent street</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.permanent_street"
                />
            </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                <label class="text-capitalize">permanent village</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.permanent_village"
                />
            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize">permanent province</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.permanent_province"
                />
            </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize">permanent city</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.permanent_city"
                />
            </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize">permanent barangay</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.permanent_barangay"
                />
            </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize">permanent zip code</label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.permanent_zip_code"
                />
            </div>
                    </div>
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
