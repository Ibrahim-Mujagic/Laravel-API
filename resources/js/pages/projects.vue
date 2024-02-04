<script>
import axios from "axios";
import { baseUrl } from "../data/data.js";
export default {
    name: "Projects",
    data() {
        return {
            baseUrl,
            projects: [],
        };
    },
    methods: {
        getApi() {
            axios.get(this.baseUrl + "projects").then((result) => {
                this.projects = result.data;
            });
        },
    },
    mounted() {
        this.getApi();
    },
};
</script>
<template>
    <h1 class="text-center mb-3">Projects</h1>
    <div class="container d-flex gap-4 flex-wrap">
        <router-link
            v-for="project in projects"
            :key="project.id"
            class="card m-auto cursor-pointer"
            style="width: 24rem"
            :to="{ name: 'project_detail', params: { slug: project.slug } }"
        >
            <div class="card-title p-2">
                <h2>{{ project.name }}</h2>
            </div>
            <div class="card-image">
                <img :src="project.cover_image" :alt="project.name" />
            </div>
            <div class="card-body">
                <p>{{ project.client_name }}</p>
                <p>{{ project.summary }}</p>
            </div>
        </router-link>
    </div>
</template>

<style lang="scss" scoped>
h1 {
    text-shadow: 0px 0px 10px gray;
}
.card {
    box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px,
        rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
    text-decoration: none;
}
</style>
