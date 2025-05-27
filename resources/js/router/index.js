import { createRouter, createWebHistory } from 'vue-router';
import App from "../components/App.vue";
import Navbar from "../components/layout/Navbar.vue";
import LoginForm from "../components/auth/LoginForm.vue";
import RegisterForm from "../components/auth/RegisterForm.vue";
import Main from "../components/Main.vue";
import Welcome from "../components/Welcome.vue";
import AdminPage from "../components/admin/AdminPage.vue";
import Courses from "../components/admin/courses/Courses.vue";
import CourseShow from "../components/admin/courses/CourseShow.vue";


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
    },
    {
        path: '/admin-page/courses',
        component: Courses,
    },
    {
        path: '/admin-page/courses/:id',
        name: 'course-show',
        component: CourseShow,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
