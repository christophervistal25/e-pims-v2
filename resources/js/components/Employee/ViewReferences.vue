<template>
    <div>
        <div v-if="employee.hasOwnProperty('references')">
            <div class="card">
                <div
                    class="card-body"
                    v-for="(reference, index) in employee.references"
                    :key="index"
                >
                    <p>Name : {{ reference.name }}</p>
                    <p>Telephone Number {{ reference.telephone_number }}</p>
                    <p>Address : {{ reference.address }}</p>
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
