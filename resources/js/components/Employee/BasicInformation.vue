<template>
    <div>
        <div class="form-group row">
            <label for="lastname" class="col-sm-2 col-form-label"
                >LASTNAME</label
            >
            <div class="col-lg-auto">
                <input
                    type="text"
                    id="lastname"
                    v-model="information.lastname"
                    class="form-control"
                />
            </div>
        </div>

        <div class="form-group row">
            <label for="firstname" class="col-sm-2 col-form-label"
                >FIRSTNAME</label
            >
            <div class="col-lg-3">
                <input
                    type="text"
                    id="firstname"
                    v-model="information.firstname"
                    class="form-control"
                />
            </div>
        </div>

        <div class="form-group row">
            <label for="middlename" class="col-sm-2 col-form-label"
                >MIDDLENAME</label
            >
            <div class="col-lg-auto">
                <input
                    type="text"
                    id="middlename"
                    v-model="information.middlename"
                    class="form-control"
                />
            </div>
        </div>

        <div class="form-group row">
            <label for="dateOfBirth" class="col-sm-3 col-form-label"
                >DATE OF BIRTH</label
            >
            <div class="col-lg-4">
                <input
                    type="date"
                    id="dateOfBirth"
                    v-model="information.dateOfbirth"
                    class="form-control"
                />
            </div>
        </div>

        <div class="form-group row">
            <label for="dateOfBirth" class="col-sm-3 col-form-label"
                >DATE OF BIRTH</label
            >
            <div class="col-lg-4">
                <input
                    type="date"
                    id="dateOfBirth"
                    v-model="information.controlNo"
                    class="form-control"
                />
            </div>
        </div>

        <div class="form-group row">
            <label for="salaryRate" class="col-sm-3 col-form-label"
                >Salary Rate</label
            >
            <div class="col-lg-4">
                <input
                    type="number"
                    id="salaryRate"
                    v-model="information.salaryRate"
                    class="form-control"
                />
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            information: {
                lastname: "",
                firstname: "",
                middlename: "",
                dateOfbirth: "",
                controlNo: "",
                salaryRate: ""
            }
        };
    }
};
</script>

<style></style>
