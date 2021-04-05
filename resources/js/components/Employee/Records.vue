<template>
    <div>
        <employee-table @table_view="viewChange"></employee-table>
        <tab-view :view_change="view"></tab-view>
    </div>
</template>

<script>
export default {
    data() {
        return {
            view: false
        };
    },
    methods: {
        viewChange() {
            this.view = !this.view;
        }
    }
};
</script>

<style></style>
