<template>
    <div>
        <div class="container jumbotron" id="test" v-show="!isClick">
            <h1>Hello , World</h1>
        </div>
        <button class="btn btn-primary" @click="isClick = !isClick">Click Me Baby!</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isClick : false,
        };
    }
}
</script>
