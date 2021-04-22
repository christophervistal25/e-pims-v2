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
                            <select
                                class="form-control"
                                v-model="office.head"
                                :class="
                                    errors.hasOwnProperty('head')
                                        ? 'is-invalid'
                                        : ''
                                "
                            >
                                <option value="ALEXANDER T. PIMENTEL"
                                    >ALEXANDER T. PIMENTEL</option
                                >
                            </select>
                            <p
                                class="text-danger text-sm"
                                v-if="errors.hasOwnProperty('head')"
                            >
                                {{ errors.head[0] }}
                            </p>
                        </div>

                        <div class="form-group">
                            <label>Position name</label>
                            <select
                                class="form-control"
                                v-model="office.position_name"
                                :class="
                                    errors.hasOwnProperty('position_name')
                                        ? 'is-invalid'
                                        : ''
                                "
                            >
                                <option
                                    v-for="(position, index) in positions"
                                    :key="index"
                                    :value="position.position_code"
                                    >{{ position.position_name }}</option
                                >
                            </select>
                            <p
                                class="text-danger text-sm"
                                v-if="errors.hasOwnProperty('position_name')"
                            >
                                {{ errors.position_name[0] }}
                            </p>
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
export default {
    props: ["showassignment", "positions"],
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
            errors: {}
        };
    },
    methods: {
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
