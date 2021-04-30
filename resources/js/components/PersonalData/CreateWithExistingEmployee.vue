<template>
    <div>
        <exists-personal-information
            :employee="employee"
        ></exists-personal-information>
    </div>
</template>

<script>
export default {
    props: {
        employee: {
            required: true,
            type: Object
        }
    }
};
</script>

<style></style>
