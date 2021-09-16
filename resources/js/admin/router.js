
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
    {
        path: '/accountManagers',
        name: 'admin.accountManagers',
        component: require('./user-management/account-manager/Index').default
    },
    {
        path: '/lowCredits',
        name: 'admin.lowCredits',
        component: require('./user-management/low-credit/Index').default
    },
    {
        path: '/campaigns',
        name: 'admin.campaigns',
        component: require('./messaging/campaigns/Index').default
    },
    {
        path: '/senderId',
        name: 'admin.senderId',
        component: require('./messaging/sender_Id/Index').default
    },
    {
        path: '/sendSMS',
        name: 'admin.sendSMS',
        component: require('./messaging/send-SMS/Index').default
    },
    {
        path: '/templates',
        name: 'admin.templates',
        component: require('./messaging/templates/Index').default
    },
    {
        path: '/blacklist',
        name: 'admin.blacklist',
        component: require('./messaging/blacklist/Index').default
    },
];

const router = new VueRouter({
    routes,
    mode: 'history',
});

export default router;
