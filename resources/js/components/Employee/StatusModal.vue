<template>
    <div>
        <div
            class="modal fade"
            :class="show ? 'show' : ''"
            id="statusModal"
            role="dialog"
            :style="show ? 'padding-right: 15px; display: block;' : ''"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Employment Status</h5>
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
                            <label>Status Name</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="status.status_name"
                                :class="
                                    errors.hasOwnProperty('status_name')
                                        ? 'is-invalid'
                                        : ''
                                "
                            />
                            <p
                                class="text-danger text-sm"
                                v-if="errors.hasOwnProperty('status_name')"
                            >
                                {{ errors.status_name[0] }}
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-primary"
                            @click="submitNewStatus"
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
    props: ["show"],
    data() {
        return {
            isLoading: false,
            status: {
                stat_code: "",
                status_name: ""
            },
            errors: {}
        };
    },
    methods: {
        submitNewStatus() {
            this.isLoading = true;
            window.axios
                .post("/api/employment/status/store", this.status)
                .then(response => {
                    if (response.status === 201) {
                        this.isLoading = false;
                        swal({
                            text: "Successfully create new employment status",
                            icon: "success"
                        });
                        this.$emit("status-modal-dismiss", response.data);
                    }
                })
                .catch(error => {
                    this.isLoading = false;
                    this.errors = {};
                    if (error.response.status === 422) {
                        this.errors = error.response.data;
                    }
                });
        },
        dismissModal() {
            this.$emit("status-modal-dismiss");
        }
    }
};
</script>

<style></style>
