<template>
    <div class="bg-light p-1" style="min-height : 100vh;">
        <div class="p-2">
            <h5>Search Option</h5>
            <label>
                <input type="checkbox" />
                Individual
            </label>
            <hr />
            <label>
                <input type="checkbox" />
                Office / Department
            </label>
            <div class="form-group mt-2">
                <label>Office name</label>
                <v-select class="bg-white"></v-select>
            </div>

            <div class="form-group mt-2">
                <label>Filter Options</label>
                <v-select class="bg-white"></v-select>
            </div>
        </div>

        <hr />

        <div class="p-2">
            <h5>Search Employee</h5>
            <div class="form-group mt-2">
                <label>Name of Employee</label>
                <v-select class="bg-white"></v-select>
            </div>
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style></style>
