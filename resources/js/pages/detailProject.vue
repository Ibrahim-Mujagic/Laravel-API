<script>
import axios from "axios";
import { baseUrl } from "../data/data.js";
export default {
    name: "DetailProject",
    data() {
        return {
            baseUrl,
            detailProject: {},
        };
    },
    methods: {
        getApi() {
            axios
                .get(baseUrl + "projects/" + this.$route.params.slug)
                .then((result) => {
                    this.detailProject = result.data;
                });
        },
    },
    mounted() {
        this.getApi();
    },
};
</script>

<template>
    <div class="cont-detail p-4 text-center">
        <h2>{{ detailProject.name }}</h2>
        <div v-if="detailProject.cover_image" class="card-image">
            <img :src="detailProject.cover_image" :alt="detailProject.name" />
        </div>
        <div class="card-body">
            <p>{{ detailProject.client_name }}</p>
            <p>{{ detailProject.summary }}</p>
            <span
                v-if="detailProject.techs"
                v-for="tech in detailProject.techs"
                class="badge text-bg-info me-2"
                >{{ tech.name }}</span
            >
            <span
                v-if="detailProject.category"
                class="badge text-bg-warning d-block w-25 m-auto mt-2"
                >{{ detailProject.category.name }}</span
            >
        </div>
    </div>
</template>

<style lang="scss" scoped>
.cont-detail {
    height: 600px;
    width: 850px;
    margin: 20px auto;
    box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px,
        rgba(0, 0, 0, 0.22) 0px 15px 12px;
    border-radius: 20px;
}
</style>
