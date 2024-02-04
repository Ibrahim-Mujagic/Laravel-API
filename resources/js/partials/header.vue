<script>
export default {
    name: "Header",
};
</script>
<template>
    <header>
        <ul>
            <li><router-link :to="{ name: 'home' }">Home</router-link></li>
            <li>
                <router-link :to="{ name: 'projects' }">Projects</router-link>
            </li>
        </ul>
    </header>
</template>

<style lang="scss" scoped>
header {
    height: 80px;
    background-color: #446ca4;
    display: flex;
    justify-content: center;
    align-items: center;
    ul {
        display: flex;
        gap: 25px;
        list-style: none;
        a {
            color: cornflowerblue;
            font-size: 1.6rem;
            text-decoration: none;
            &:hover,
            &.active-link {
                color: #fff;
                padding-bottom: 15px;
                border-bottom: 2px solid #fff;
            }
        }
    }
}
</style>
