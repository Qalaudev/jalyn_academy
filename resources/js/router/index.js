import { createRouter, createWebHistory } from 'vue-router';
import App from "../components/App.vue";
import Navbar from "../components/Navbar.vue";
import LoginForm from "../components/LoginForm.vue";
import RegisterForm from "../components/RegisterForm.vue";
import Main from "../components/Main.vue";
import Welcome from "../components/Welcome.vue";
import AdminPage from "../components/AdminPage.vue";


const routes = [
    {
        path:'/test',
        component:Navbar
    },
    {
        path:'/testlogin',
        component: LoginForm
    },
    {
        path:'/testregister',
        component: RegisterForm
    },
    {
        path:'/main',
        component:Main
    },
    {
        path:'/welcome',
        component:Welcome
    },
    {
        path:'/admin-page',
        component:AdminPage
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
