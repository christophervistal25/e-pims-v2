<template>
    <div>
        <div>
            <label class="switch">
                <input
                    type="checkbox"
                    v-model="tableView"
                    @click="changeView"
                />
                <span class="slider round"></span>
            </label>
        </div>
        <div>
            <table class="table table-hover" v-if="!tableView">
                <thead>
                    <tr>
                        <th scope="col">Employee ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Position</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>1</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>2</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            tableView: false
        };
    },
    methods: {
        changeView() {
            this.$emit("table_view", this.tableView);
        }
    }
};
</script>

<style></style>
