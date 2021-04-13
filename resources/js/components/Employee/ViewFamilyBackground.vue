<template>
    <div>
        <div v-if="employee.hasOwnProperty('family_background')">
            <div class="pl-3 pr-3">
                    <div
                        class="alert alert-secondary text-center font-weight-bold "
                        role="alert"
                    >
                        SPOUSE INFORMATION
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize">spouse lastname : </label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.family_background.spouse_lastname"
                />
            </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize">spouse firstname : </label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.family_background.spouse_firstname"
                />
            </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize">spouse middlename : </label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.family_background.spouse_middlename"
                />
            </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize">spouse extension : </label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.family_background.spouse_extension"
                />
            </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                <label class="text-capitalize">spouse occupation : </label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.family_background.spouse_occupation"
                />
            </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                <label class="text-capitalize"
                    >spouse employer business name :
                </label>
                <input
                    type="text"
                    class="form-control"
                    :value="
                        employee.family_background.spouse_employer_business_name
                    "
                />
            </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                <label class="text-capitalize"
                    >spouse business address :
                </label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.family_background.spouse_business_address"
                />
            </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                <label class="text-capitalize"
                    >spouse telephone number :
                </label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.family_background.spouse_telephone_number"
                />
            </div>
                </div>
            </div>
            <div class="pl-3 pr-3">
                    <div
                        class="alert alert-secondary text-center font-weight-bold "
                        role="alert"
                    >
                        CHILDREN INFORMATION
                    </div>
                </div>
                <div class="pl-3 pr-3">
                    <div
                        class="alert alert-secondary text-center font-weight-bold "
                        role="alert"
                    >
                        FATHER'S INFORMATION
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize">father lastname : </label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.family_background.father_lastname"
                />
            </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize">father firstname : </label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.family_background.father_firstname"
                />
            </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize">father middlename : </label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.family_background.father_middlename"
                />
            </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                <label class="text-capitalize">father extension : </label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.family_background.father_extension"
                />
            </div>
                    </div>
                </div>
            <div class="pl-3 pr-3">
                    <div
                        class="alert alert-secondary text-center font-weight-bold "
                        role="alert"
                    >
                        MOTHER'S INFORMATION
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                <label class="text-capitalize">mother lastname : </label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.family_background.mother_lastname"
                />
            </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                <label class="text-capitalize">mother firstname : </label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.family_background.mother_firstname"
                />
            </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                <label class="text-capitalize">mother middlename : </label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.family_background.mother_middlename"
                />
            </div>

            <div class="form-group">
                <label class="text-capitalize">mother extension : </label>
                <input
                    type="text"
                    class="form-control"
                    :value="employee.family_background.mother_extension"
                />
            </div>
            <div class="card p-2">
                <div
                    v-for="(child, index) in employee.spouse_child"
                    :key="index"
                >
                    {{ index }}
                    <div class="form-group">
                        <label class="text-capialize">child name</label>
                        <input
                            type="text"
                            class="form-control"
                            :value="child.name"
                        />
                    </div>

                    <div class="form-group">
                        <label class="text-capialize"
                            >child date of birth</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            :value="child.date_of_birth"
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
