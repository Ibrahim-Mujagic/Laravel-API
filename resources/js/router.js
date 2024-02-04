import { createRouter, createWebHistory } from "vue-router";
import home from "./pages/home.vue";
import projects from "./pages/projects.vue";
import detailProject from "./pages/detailProject.vue";
import error404 from "./pages/error404.vue";
const router = createRouter({
    history: createWebHistory(),
    linkExactActiveClass: "active-link",
    routes: [
        {
            path: "/",
            name: "home",
            component: home,
        },
        {
            path: "/projects",
            name: "projects",
            component: projects,
        },
        {
            path: "/project_detail/:slug",
            name: "project_detail",
            component: detailProject,
        },
        {
            path: "/:pathMatch(.*)*",
            component: error404,
        },
    ],
});

export { router };
