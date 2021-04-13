<template>
    <div>
        <div v-if="employee.hasOwnProperty('references')">
            <div class="pl-3 pr-3">
                    <div
                        class="alert alert-secondary text-center font-weight-bold "
                        role="alert"
                    >
                        REFERENCES
                    </div>
                </div>
            <div class="card">
                <div
                    class="card-body"
                    v-for="(reference, index) in employee.references"
                    :key="index"
                >
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label class="text-capitalize">Name : </label>
                        <input
                            type="text"
                            class="form-control"
                            :value="reference.name"
                        />
                    </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label class="text-capitalize"
                            >Telephone Number :
                        </label>
                        <input
                            type="text"
                            class="form-control"
                            :value="reference.telephone_number"
                        />
                    </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label class="text-capitalize">Address : </label>
                        <input
                            type="text"
                            class="form-control"
                            :value="reference.address"
                        />
                    </div>
                    </div>
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
