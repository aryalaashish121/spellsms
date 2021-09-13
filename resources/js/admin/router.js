
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
];

const router = new VueRouter({
    routes,
    mode:'history',
});

export default router;
