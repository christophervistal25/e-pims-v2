<template>
    <div>
        <div
            class="modal fade"
            :class="showassignment ? 'show' : ''"
            id="assignmentModal"
            tabindex="-1"
            role="dialog"
            :style="
                showassignment ? 'padding-right: 15px; display: block;' : ''
            "
        >
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Assignment Modal</h5>
                        <button
                            @click="dismissModal"
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Office name</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="office.name"
                                :class="
                                    errors.hasOwnProperty('name')
                                        ? 'is-invalid'
                                        : ''
                                "
                            />
                            <p
                                class="text-danger text-sm"
                                v-if="errors.hasOwnProperty('name')"
                            >
                                {{ errors.name[0] }}
                            </p>
                        </div>

                        <div class="form-group">
                            <label>Office Short name</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="office.short_name"
                                :class="
                                    errors.hasOwnProperty('short_name')
                                        ? 'is-invalid'
                                        : ''
                                "
                            />
                            <p
                                class="text-danger text-sm"
                                v-if="errors.hasOwnProperty('short_name')"
                            >
                                {{ errors.short_name[0] }}
                            </p>
                        </div>

                        <div class="form-group">
                            <label>Office address</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="office.address"
                                :class="
                                    errors.hasOwnProperty('address')
                                        ? 'is-invalid'
                                        : ''
                                "
                            />
                            <p
                                class="text-danger text-sm"
                                v-if="errors.hasOwnProperty('address')"
                            >
                                {{ errors.address[0] }}
                            </p>
                        </div>

                        <div class="form-group">
                            <label>Office Short address</label>
                            <input
                                class="form-control"
                                type="text"
                                v-model="office.short_address"
                                :class="
                                    errors.hasOwnProperty('short_address')
                                        ? 'is-invalid'
                                        : ''
                                "
                            />
                            <p
                                class="text-danger text-sm"
                                v-if="errors.hasOwnProperty('short_address')"
                            >
                                {{ errors.short_address[0] }}
                            </p>
                        </div>

                        <div class="form-group">
                            <label>Office Head</label>
                            <v-select
                                label="fullname"
                                @input="onSelectOfficeHead"
                                @search="onSearchEmployee"
                                :value="office.head"
                                :options="offices"
                            >
                                <template slot="no-options">
                                    Type to search Office Head
                                </template>
                            </v-select>
                        </div>

                        <div class="form-group">
                            <label>Position name</label>
                            <v-select
                                :filterable="false"
                                label="position_name"
                                @input="onSelectPosition"
                                @search="onSearchPosition"
                                :value="office.position_name"
                                :options="positions"
                            >
                                <template slot="no-options">
                                    Type to search Position
                                </template>
                            </v-select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            @click="submitNewOffice"
                            type="button"
                            class="btn btn-primary"
                        >
                            <div
                                v-if="isLoading"
                                class="spinner-border spinner-border-sm text-white"
                                role="status"
                            >
                                <span class="sr-only">Loading...</span>
                            </div>
                            Save changes
                        </button>
                        <button
                            @click="dismissModal"
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                        >
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import swal from "sweetalert";
import "vue-select/dist/vue-select.css";
import _ from "lodash";
export default {
    props: ["showassignment"],
    data() {
        return {
            isLoading: false,
            office: {
                name: "",
                short_name: "",
                address: "",
                head: "",
                short_address: "",
                position_name: ""
            },
            offices: [],
            headOfoffice: "",
            positions: [],
            errors: {}
        };
    },
    methods: {
        onSelectOfficeHead(employee) {
            this.office.head = employee.fullname;
        },
        onSelectPosition(position) {
            this.office.position_name = position.position_name;
        },
        onSearchEmployee(search, loading) {
            if (search.length) {
                loading(true);
                this.searchOfficeHead(loading, search, this);
            } else {
                this.offices = [];
            }
        },
        onSearchPosition(search, loading) {
            if (search.length) {
                loading(true);
                this.searchPosition(loading, search, this);
            } else {
                this.positions = [];
            }
        },
        searchOfficeHead: _.debounce((loading, search, vm) => {
            loading(true);
            window.axios
                .get(`/api/employee/search/${search}`)
                .then(response => {
                    vm.offices = response.data;
                    loading(false);
                });
        }, 500),
        searchPosition: _.debounce((loading, search, vm) => {
            loading(true);
            window.axios
                .get(`/api/position/search/${search}`)
                .then(response => {
                    vm.positions = response.data;
                    loading(false);
                });
        }, 500),
        submitNewOffice() {
            this.isLoading = true;
            window.axios
                .post("/api/office/store", this.office)
                .then(response => {
                    if (response.status === 201) {
                        this.isLoading = false;
                        swal({
                            text: "Successfully create new office",
                            icon: "success"
                        });
                        this.$emit("assignment-modal-dismiss");
                    }
                })
                .catch(error => {
                    this.isLoading = false;
                    if (error.response.status === 422) {
                        this.errors = error.response.data;
                    }
                });
        },
        dismissModal() {
            this.$emit("assignment-modal-dismiss");
        }
    }
};
</script>

<style></style>
