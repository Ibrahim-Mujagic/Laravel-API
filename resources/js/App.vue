<script>
import Header from "./partials/header.vue";
export default {
    name: "App",
    components: {
        Header,
    },
};
</script>

<template>
    <Header />
    <router-view></router-view>
</template>

<style lang="scss"></style>
