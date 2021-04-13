<template>
    <div>
        <div class="form-group row">
            <label for="lastname" class="col-sm-2 col-form-label"
                >LAST NAME</label
            >
            <div class="col-lg-7">
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
                >FIRST NAME</label
            >
            <div class="col-lg-7">
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
                >MIDDLE NAME</label
            >
            <div class="col-lg-7">
                <input
                    type="text"
                    id="middlename"
                    v-model="information.middlename"
                    class="form-control"
                />
            </div>
        </div>

        <div class="form-group row">
            <label for="dateOfBirth" class="col-sm-2 col-form-label"
                >DATE OF BIRTH</label
            >
            <div class="col-lg-7">
                <input
                    type="date"
                    id="dateOfBirth"
                    v-model="information.dateOfbirth"
                    class="form-control"
                />
            </div>
        </div>

        <div class="form-group row">
            <label for="dateOfBirth" class="col-sm-2 col-form-label">AGE</label>
            <div class="col-lg-2">
                <input
                    type="text"
                    id="dateOfBirth"
                    v-model="information.controlNo"
                    class="form-control"
                />
            </div>

            <label for="salaryRate" class="col-sm-2 col-form-label"
                >SALARY RATE</label
            >
            <div class="col-lg-3">
                <input
                    type="text"
                    id="salaryRate"
                    v-model="information.salaryGrade"
                    class="form-control"
                />
            </div>
        </div>

        <div class="form-group row">
            <label for="officeAssignment" class="col-sm-2 col-form-label"
                >OFFICE ASSIGNMENT</label
            >
            <div class="col-lg-7">
                <input
                    type="text"
                    id="officeAssignment"
                    v-model="information.officeAssignment"
                    class="form-control"
                />
            </div>
        </div>

        <div class="form-group row">
            <label for="designation" class="col-sm-2 col-form-label"
                >DESIGNATION</label
            >
            <div class="col-lg-7">
                <input
                    type="text"
                    id="designation"
                    v-model="information.designation"
                    class="form-control"
                />
            </div>
        </div>

        <div class="form-group row">
            <label for="employmentFrom" class="col-sm-2 col-form-label"
                >EMPLOYMENT FROM</label
            >
            <div class="col-lg-7">
                <input
                    type="text"
                    id="employmentFrom"
                    v-model="information.employmentFrom"
                    class="form-control"
                />
            </div>
        </div>

        <div class="form-group row">
            <label for="employmentTo" class="col-sm-2 col-form-label"
                >EMPLOYMENT TO</label
            >
            <div class="col-lg-7">
                <input
                    type="text"
                    id="employmentTo"
                    v-model="information.employmentTo"
                    class="form-control"
                />
            </div>
        </div>

        <div class="form-group row">
            <label for="controlNo" class="col-sm-2 col-form-label"
                >CONTROL NO</label
            >
            <div class="col-lg-7">
                <input
                    type="text"
                    id="controlNo"
                    v-model="information.controlNo"
                    class="form-control"
                />
            </div>
        </div>

        <div class="card-body">
            <h4 class="card-title">Basic tabs</h4>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a
                        class="nav-link active"
                        href="#basictab1"
                        data-toggle="tab"
                        >Home</a
                    >
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#basictab2" data-toggle="tab"
                        >Profile</a
                    >
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#basictab3" data-toggle="tab"
                        >Messages</a
                    >
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane show active" id="basictab1">
                    Tab content 1
                </div>
                <div class="tab-pane" id="basictab2">
                    Tab content 2
                </div>
                <div class="tab-pane" id="basictab3">
                    Tab content 3
                </div>
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
