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
import UsersList from "../components/admin/Users/UsersList.vue";
import AboutUs from "../components/AboutUs.vue";
import HomePage from "../components/HomePage.vue";


const requireAuth = (to, from, next) => {
    fetch('http://127.0.0.1:8000/auth-user', {
        headers: {
            Accept: 'application/json',
        },
        credentials: 'include',
    }).then(async res => {
        if (res.ok) {
            next();
        } else {
            next('/testlogin');
        }
    }).catch(() => {
        next('/testlogin');
    });
};



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
      path: '/about-us',
      component: AboutUs
    },
    {
      path: '/home',
      component: HomePage
    },
    {
        path:'/admin-page',
        component:AdminPage,
        beforeEnter: requireAuth,
    },
    {
        path: '/admin-page/courses',
        component: Courses,
        beforeEnter: requireAuth,

    },
    {
        path: '/admin-page/courses/:id',
        name: 'course-show',
        beforeEnter: requireAuth,
        component: CourseShow,
    },
    {
        path:'/admin-page/users',
        component: UsersList,
        beforeEnter: requireAuth,
    },

];



const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
