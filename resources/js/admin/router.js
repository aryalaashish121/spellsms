
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
        component: require('./user-management/users/Users').default
    },
    {
        path: '/suspendedUsers',
        name: 'admin.suspended-users',
        component: require('./user-management/users/Suspended-Users').default
    },
    {
        path: '/announcements',
        name: 'admin.announcements',
        component: require('./user-management/announcements/Announcements').default
    },
];

const router = new VueRouter({
    routes,
    mode: 'history',
});

export default router;
