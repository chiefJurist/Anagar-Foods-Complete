import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
        path: '/',
        name: 'Home',
        component: HomeView
        },
        {
        path: '/about',
        name: 'About',
        // route level code-splitting
        // this generates a separate chunk (About.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () => import('../views/AboutView.vue')
        },
        {
            path: '/contact',
            name: 'Contact',
            component: () => import('../views/ContactView.vue')
        }
        ,
        {
            path: '/login',
            name: 'Login',
            component: () => import('../views/LoginView.vue')
        }
        ,
        {
            path: '/register',
            name: 'Register',
            component: () => import('../views/RegisterView.vue')
        },

        //AFTER LOGGING IN
        {
            path: '/dashboard',
            name: 'Dashboard',
            component: () => import('../views/session/DashboardView.vue')
        },
        {
            path: '/create',
            name: 'Create',
            component: () => import('../views/session/CreateView.vue')
        },
        {
            path: '/settings',
            name: 'Settings',
            component: () => import('../views/session/SettingsView.vue')
        },
        {
            path: '/notification',
            name: 'Notification',
            component: () => import('../views/session/NotificationView.vue')
        },
        {
            path: '/history',
            name: 'History',
            component: () => import('../views/session/HistoryView.vue')
        }
    ]
})

export default router
