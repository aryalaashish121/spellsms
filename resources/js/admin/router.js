
import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        redirect: '/dashboard'
    },
    {
        path: '/dashboard',
        name: 'admin.dashboard',
        component: require('./dashboard/Home').default
    },
    {
        path: '/activeUsers',
        name: 'admin.active-users',
        component: require('./user-management/Active-users').default
    },
];

const router = new VueRouter({
    routes,
    mode: 'history',
});

export default router;
