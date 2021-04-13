<template>
    <div>
        <div v-if="employee.hasOwnProperty('other_information')">
            <div class="card">
                <div
                    class="card-body"
                    v-for="(information, index) in employee.other_information"
                    :key="index"
                >
                <div class="pl-3 pr-3">
                    <div
                        class="alert alert-secondary text-center font-weight-bold "
                        role="alert"
                    >
                        OTHER INFORMATION
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label class="text-capitalize">Special Skill</label
                        ><input
                            type="text"
                            class="form-control"
                            :value="information.special_skill"
                        />
                    </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label class="text-capitalize">Non Academic</label
                        ><input
                            type="text"
                            class="form-control"
                            :value="information.non_academic"
                        />
                    </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label class="text-capitalize">Organization</label
                        ><input
                            type="text"
                            class="form-control"
                            :value="information.organization"
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
