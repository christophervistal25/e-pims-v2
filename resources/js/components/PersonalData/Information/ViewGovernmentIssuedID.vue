<template>
    <div class="card">
        <div v-if="employee.issued_id" class="card-body">
            <div class="pl-3 pr-3">
                <div
                    class="alert alert-secondary text-center font-weight-bold "
                    role="alert"
                >
                    GOVERNMENT ISSUED ID
                </div>
            </div>
            <div>
                <div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="text-capitalize"
                                    >Type of ID :
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    :value="employee.issued_id.id_type"
                                />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="text-capitalize">ID No. : </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    :value="employee.issued_id.id_no"
                                />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="text-capitalize">Date : </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    :value="employee.issued_id.date"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-else class="card-body">
            <h1>No Government Issued ID</h1>
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
