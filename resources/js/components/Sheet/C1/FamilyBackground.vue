<template>
    <div>
        <div class="card">
            <div
                class="card-header"
                data-target="#familyBackground"
                data-toggle="collapse"
            >
                <h5 class="mb-0 p-2">
                    <i v-if="isComplete" class="fa fa-check text-success"></i>
                    FAMILY BACKGROUND
                    <i
                        v-if="isComplete"
                        class="text-success float-right fa fa-caret-down"
                        aria-hidden="true"
                    ></i>
                </h5>
            </div>
            <div class="collapse show" id="#familyBackground">
                <div class="form-group mt-4">
                    <p class="ml-4">
                        Indicate <strong>N/A </strong>or
                        <strong> LEAVE BLANK</strong> if not applicable
                    </p>
                    <label
                        for="spouse"
                        style="transform: scale(0.8)"
                        class="text-lg"
                    >
                        <input
                            id="spouse"
                            type="checkbox"
                            v-model="familyBackground.has_spouse"
                        />
                        <strong
                            >Do you have spouse? If YES, kindly tick the
                            checkbox.</strong
                        >
                    </label>
                </div>
                <section v-show="familyBackground.has_spouse">
                    <div class="pl-3 pr-3">
                        <div
                            class="alert alert-secondary text-center font-weight-bold"
                            role="alert"
                        >
                            SPOUSE INFORMATION
                        </div>
                    </div>
                    <div class="row pr-3 pl-3">
                        <div class="col-lg-3">
                            <label
                                for="spouse_lastname"
                                class="form-group has-float-label mb-0"
                            >
                                <input
                                    type="text"
                                    class="form-control text-uppercase"
                                    :class="
                                        errors.hasOwnProperty('spouse_lastname')
                                            ? 'is-invalid'
                                            : ''
                                    "
                                    id="ssurname"
                                    v-model="familyBackground.spouse_lastname"
                                    value=""
                                />
                                <span
                                    ><strong
                                        >SURNAME<span class="text-danger"
                                            >*</span
                                        ></strong
                                    ></span
                                >
                            </label>
                            <p class="text-danger text-sm">
                                {{ errors.spouse_lastname }}
                            </p>
                        </div>
                        <div class="col-lg-3">
                            <label
                                for="spouse_firstname"
                                class="form-group has-float-label mb-0"
                            >
                                <input
                                    type="text"
                                    class="form-control text-uppercase"
                                    :class="
                                        errors.hasOwnProperty(
                                            'spouse_firstname'
                                        )
                                            ? 'is-invalid'
                                            : ''
                                    "
                                    id="spouse_firstname"
                                    v-model="familyBackground.spouse_firstname"
                                    value=""
                                />
                                <span
                                    ><strong
                                        >FIRST NAME<span class="text-danger"
                                            >*</span
                                        ></strong
                                    ></span
                                >
                            </label>
                            <p class="text-danger text-sm">
                                {{ errors.spouse_firstname }}
                            </p>
                        </div>
                        <div class="col-lg-3">
                            <label
                                for="spouse_middlename"
                                class="form-group has-float-label"
                            >
                                <input
                                    type="text"
                                    class="form-control text-uppercase"
                                    :class="
                                        errors.hasOwnProperty(
                                            'spouse_middlename'
                                        )
                                            ? 'is-invalid'
                                            : ''
                                    "
                                    id="spouse_middlename"
                                    v-model="familyBackground.spouse_middlename"
                                    value=""
                                    style="
                                        outline: none;
                                        box-shadow: 0px 0px 0px transparent;
                                    "
                                />
                                <span><strong>MIDDLE NAME</strong></span>
                            </label>
                            <p class="text-danger text-sm">
                                {{ errors.spouse_middlename }}
                            </p>
                        </div>
                        <div class="col-lg-3">
                            <label
                                for="spouse_extension"
                                class="form-group has-float-label"
                            >
                                <input
                                    class="form-control text-uppercase"
                                    :class="
                                        errors.hasOwnProperty(
                                            'spouse_extension'
                                        )
                                            ? 'is-invalid'
                                            : ''
                                    "
                                    type="text"
                                    v-model="familyBackground.spouse_extension"
                                />
                                <span><strong>EXTENSION NAME</strong></span>
                            </label>
                            <p class="text-danger text-sm">
                                {{ errors.spouse_extension }}
                            </p>
                        </div>
                    </div>
                    <div class="row pl-3 pr-3">
                        <div class="col-lg-6">
                            <label
                                for="spouse_occupation"
                                class="form-group has-float-label"
                            >
                                <input
                                    type="text"
                                    class="form-control text-uppercase"
                                    :class="
                                        errors.hasOwnProperty(
                                            'spouse_occupation'
                                        )
                                            ? 'is-invalid'
                                            : ''
                                    "
                                    id="spouse_occupation"
                                    v-model="familyBackground.spouse_occupation"
                                />
                                <span><strong>OCCUPATION</strong></span>
                            </label>
                            <p class="text-danger text-sm">
                                {{ errors.spouse_occupation }}
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <label
                                for="spouse_employer_business_name"
                                class="form-group has-float-label"
                            >
                                <input
                                    type="text"
                                    class="form-control text-uppercase"
                                    id="spouse_employer_business_name"
                                    :class="
                                        errors.hasOwnProperty(
                                            'spouse_employer_business_name'
                                        )
                                            ? 'is-invalid'
                                            : ''
                                    "
                                    v-model="
                                        familyBackground.spouse_employer_business_name
                                    "
                                />
                                <span
                                    ><strong
                                        >EMPLOYER/BUSSINESS NAME</strong
                                    ></span
                                >
                            </label>
                            <p class="text-danger text-sm">
                                {{ errors.spouse_employer_business_name }}
                            </p>
                        </div>
                    </div>
                    <div class="row pl-3 pr-3">
                        <div class="col-sm-6">
                            <label
                                for="spouse_business_address"
                                class="form-group has-float-label"
                            >
                                <input
                                    type="text"
                                    class="form-control text-uppercase"
                                    id="spouse_business_address"
                                    :class="
                                        errors.hasOwnProperty(
                                            'spouse_business_address'
                                        )
                                            ? 'is-invalid'
                                            : ''
                                    "
                                    v-model="
                                        familyBackground.spouse_business_address
                                    "
                                />
                                <span><strong>BUSSINESS ADDRESS</strong></span>
                            </label>
                            <p class="text-danger text-sm">
                                {{ errors.spouse_business_address }}
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <label
                                for="spouse_telephone_number"
                                class="form-group has-float-label"
                            >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="spouse_telephone_number"
                                    v-model="
                                        familyBackground.spouse_telephone_number
                                    "
                                    :class="
                                        errors.hasOwnProperty(
                                            'spouse_telephone_number'
                                        )
                                            ? 'is-invalid'
                                            : ''
                                    "
                                />
                                <p class="text-danger text-sm">
                                    {{ errors.spouse_telephone_number }}
                                </p>
                                <span><strong>TELEPHONE NUMBER</strong></span>
                            </label>
                        </div>
                    </div>
                </section>

                <div class="pl-3 pr-3">
                    <div
                        class="alert alert-secondary text-center font-weight-bold"
                        role="alert"
                    >
                        CHILDREN INFORMATION
                    </div>
                </div>
                <div class="p-2">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th class="font-weight-bold">
                                        NAME OF CHILDREN
                                    </th>
                                    <th class="font-weight-bold">
                                        DATE OF BIRTH
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(spouse, index) in spouse"
                                    :key="index"
                                >
                                    <td class="align-middle text-center">
                                        {{ index + 1 }}
                                    </td>
                                    <td>
                                        <input
                                            type="text"
                                            class="form-control text-uppercase"
                                            id="name"
                                            placeholder="Fullname"
                                            v-model="spouse.name"
                                        />
                                        <div class="text-right">
                                            <span class="text-danger text-xs">{{
                                                errors[`spouse.${index}.name`]
                                            }}</span>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <input
                                            type="date"
                                            class="form-control"
                                            :class="
                                                errors.hasOwnProperty(
                                                    `spouse.${index}.date_of_birth`
                                                )
                                                    ? 'is-invalid'
                                                    : ''
                                            "
                                            id="date_of_birth"
                                            placeholder="Date of birth"
                                            v-model="spouse.date_of_birth"
                                        />
                                        <div class="text-right">
                                            <span class="text-danger text-xs">{{
                                                errors[
                                                    `spouse.${index}.date_of_birth`
                                                ]
                                            }}</span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <button
                                            @click="remove(index)"
                                            v-if="index != 0"
                                            class="btn btn-danger font-weight-bold rounded-circle"
                                        >
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button
                                            v-on:click="generate"
                                            v-if="noOfSpouseFields == index"
                                            class="btn btn-primary rounded-circle"
                                        >
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="pl-3 pr-3">
                    <div
                        class="alert alert-secondary text-center font-weight-bold"
                        role="alert"
                    >
                        FATHER'S NAME
                    </div>
                </div>
                <div class="row pr-3 pl-3">
                    <div class="col-lg-3">
                        <label
                            for="father_lastname"
                            class="form-group has-float-label mb-0"
                        >
                            <input
                                type="text"
                                class="form-control text-uppercase"
                                id="father_lastname"
                                :class="
                                    !errors.hasOwnProperty('father_lastname')
                                        ? ''
                                        : 'is-invalid'
                                "
                                v-model="familyBackground.father_lastname"
                                value=""
                                style="
                                    text-transform: uppercase;
                                    outline: none;
                                    box-shadow: 0px 0px 0px transparent;
                                "
                            />
                            <span
                                ><strong
                                    >SURNAME<span class="text-danger"
                                        >*</span
                                    ></strong
                                ></span
                            >
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.father_lastname }}
                        </p>
                    </div>
                    <div class="col-lg-3">
                        <label
                            for="father_firstname"
                            class="form-group has-float-label mb-0"
                        >
                            <input
                                type="text"
                                class="form-control text-uppercase"
                                id="father_firstname"
                                :class="
                                    !errors.hasOwnProperty('father_firstname')
                                        ? ''
                                        : 'is-invalid'
                                "
                                v-model="familyBackground.father_firstname"
                                value=""
                                style="
                                    text-transform: uppercase;
                                    outline: none;
                                    box-shadow: 0px 0px 0px transparent;
                                "
                            />
                            <span
                                ><strong
                                    >FIRST NAME<span class="text-danger"
                                        >*</span
                                    ></strong
                                ></span
                            >
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.father_firstname }}
                        </p>
                    </div>
                    <div class="col-lg-3">
                        <label
                            for="father_middlename"
                            class="form-group has-float-label"
                        >
                            <input
                                type="text"
                                class="form-control text-uppercase"
                                :class="
                                    !errors.hasOwnProperty('father_middlename')
                                        ? ''
                                        : 'is-invalid'
                                "
                                id="father_middlename"
                                v-model="familyBackground.father_middlename"
                                value=""
                            />
                            <span><strong>MIDDLE NAME</strong></span>
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.father_middlename }}
                        </p>
                    </div>
                    <div class="col-lg-3">
                        <label
                            for="father_extension"
                            class="form-group has-float-label mb-0"
                        >
                            <input
                                class="form-control text-uppercase"
                                v-model="familyBackground.father_extension"
                                :class="
                                    !errors.hasOwnProperty('father_extension')
                                        ? ''
                                        : 'is-invalid'
                                "
                            />
                            <span><strong>EXTENSION NAME</strong></span>
                        </label>
                    </div>
                </div>

                <div class="pl-3 pr-3">
                    <div
                        class="alert alert-secondary text-center font-weight-bold"
                        role="alert"
                    >
                        MOTHER'S MAIDEN NAME
                    </div>
                </div>
                <div class="row pr-3 pl-3">
                    <div class="col-lg-4">
                        <label
                            for="mother_lastnamea"
                            class="form-group has-float-label mb-0"
                        >
                            <input
                                type="text"
                                class="form-control text-uppercase"
                                :class="
                                    !errors.hasOwnProperty('mother_lastname')
                                        ? ''
                                        : 'is-invalid'
                                "
                                id="mother_lastname"
                                v-model="familyBackground.mother_lastname"
                                value=""
                            />
                            <span
                                ><strong
                                    >SURNAME<span class="text-danger"
                                        >*</span
                                    ></strong
                                ></span
                            >
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.mother_lastname }}
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <label
                            for="mother_firstname"
                            class="form-group has-float-label mb-0"
                        >
                            <input
                                type="text"
                                class="form-control text-uppercase"
                                :class="
                                    !errors.hasOwnProperty('mother_firstname')
                                        ? ''
                                        : 'is-invalid'
                                "
                                id="mother_firstname"
                                v-model="familyBackground.mother_firstname"
                                value=""
                            />
                            <span
                                ><strong
                                    >FIRST NAME<span class="text-danger"
                                        >*</span
                                    ></strong
                                ></span
                            >
                        </label>
                        <p class="text-danger text-sm">
                            {{ errors.mother_firstname }}
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <label
                            for="mother_middlename"
                            class="form-group has-float-label mb-30"
                        >
                            <input
                                type="text"
                                class="form-control text-uppercase"
                                id="mother_middlename"
                                :class="
                                    !errors.hasOwnProperty('mother_middlename')
                                        ? ''
                                        : 'is-invalid'
                                "
                                v-model="familyBackground.mother_middlename"
                                value=""
                            />
                            <span
                                ><strong
                                    >MIDDLENAME<span
                                        class="text-danger"
                                    ></span></strong
                            ></span>
                        </label>
                        <span class="text-danger text-sm">
                            {{ errors.mother_middlename }}
                        </span>
                    </div>
                </div>
                <div class="float-right">
                    <button
                        class="btn btn-success mr-3 mb-2 shadow"
                        :class="
                            Object.keys(errors).length != 0
                                ? 'btn-danger'
                                : 'btn-primary'
                        "
                        @click="submitPersonFamilyBackground"
                    >
                        <i class="la la-pencil"></i>
                        UPDATE
                        <div
                            class="spinner-border spinner-border-sm mb-1"
                            role="status"
                            v-show="isLoading"
                        >
                            <span class="sr-only">Loading...</span>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import "vue-select/dist/vue-select.css";
import familyBackground from "@core/familybackground";
export default {
    props: ["employeeID"],
    data() {
        return {
            isLoading: false,
            isComplete: false,
            noOfSpouseFields: 0,
            errors: {},
            familyBackground: {
                employee_id: this.employeeID,
                spouse_firstname: "",
                spouse_lastname: "",
                spouse_middlename: "",
                spouse_extension: "",
                spouse_occupation: "",
                spouse_employer_business_name: "",
                spouse_business_address: "",
                spouse_telephone_number: "",
                has_spouse: false,
                father_firstname: "",
                father_lastname: "",
                father_middlename: "",
                father_suffix: "",
                mother_lastname: "",
                mother_firstname: "",
                mother_middlename: "",
                spouse: [],
            },
            spouse: [
                {
                    name: "",
                    date_of_birth: "",
                },
            ],
        };
    },
    methods: {
        generate() {
            this.noOfSpouseFields =
                familyBackground.generateSpouse(this.spouse).length - 1;
        },
        remove(index) {
            familyBackground
                .removeGeneratedField(this.spouse, index)
                .then((isRemove) => {
                    if (isRemove) {
                        this.noOfSpouseFields--;
                    }
                });
        },
        submitPersonFamilyBackground() {
            this.isLoading = true;
            this.errors = {};
            this.familyBackground["spouse"] = this.spouse;

            familyBackground
                .submit(this.familyBackground, this.errors)
                .then((response) => {
                    this.isLoading = false;
                    if (response) {
                        this.errors = response;
                    }
                });
        },
    },
    mounted() {
        familyBackground.fetchUser(this.employeeID).then((response) => {
            if (response.length !== 0) {
                this.familyBackground = response;
            }
            if (
                response.hasOwnProperty("spouse") &&
                response.spouse.length != 0
            ) {
                this.spouse = response.spouse;
            }
        });
    },
};
</script>
