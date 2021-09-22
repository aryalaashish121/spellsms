
import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        redirect: '/login'
    },
    {
        path: '/dashboard',
        name: 'admin.dashboard',
        component: require('./dashboard/Home').default,
        meta: { authOnly: true }
    },

    {
        path: '/admin/profile',
        name: 'admin.profile',
        component: require('./profile/Profile').default,
        meta: { authOnly: true }
    },

    {
        path: '/activeUsers',
        name: 'admin.active-users',
        component: require('./user-management/users/Users').default,
        meta: { authOnly: true }
    },
    {
        path: '/suspendedUsers',
        name: 'admin.suspended-users',
        component: require('./user-management/users/Suspended-Users').default,
        meta: { authOnly: true }
    },
    {
        path: '/announcements',
        name: 'admin.announcements',
        component: require('./user-management/announcements/Announcements').default,
        meta: { authOnly: true }
    },
    {
        path: '/accountManagers',
        name: 'admin.accountManagers',
        component: require('./user-management/account-manager/Index').default,
        meta: { authOnly: true }
    },
    {
        path: '/lowCredits',
        name: 'admin.lowCredits',
        component: require('./user-management/low-credit/Index').default,
        meta: { authOnly: true }
    },
    {
        path: '/campaigns',
        name: 'admin.campaigns',
        component: require('./messaging/campaigns/Index').default,
        meta: { authOnly: true }
    },
    {
        path: '/senderId',
        name: 'admin.senderId',
        component: require('./messaging/sender_Id/Index').default,
        meta: { authOnly: true }
    },
    {
        path: '/sendSMS',
        name: 'admin.sendSMS',
        component: require('./messaging/send-SMS/Index').default,
        meta: { authOnly: true }
    },
    {
        path: '/templates',
        name: 'admin.templates',
        component: require('./messaging/templates/Index').default,
        meta: { authOnly: true }
    },
    {
        path: '/blacklist',
        name: 'admin.blacklist',
        component: require('./messaging/blacklist/Index').default,
        meta: { authOnly: true }
    },
    {
        path: '/manageContacts',
        name: 'admin.manageContacts',
        component: require('./contact-and-groups/manage-contacts/Index').default,
        meta: { authOnly: true }
    },
    {
        path: '/manageContactGroups',
        name: 'admin.manageContactGroups',
        component: require('./contact-and-groups/manage-groups/Index').default,
        meta: { authOnly: true }
    },
    {
        path: '/campaignReports',
        name: 'admin.campaignReports',
        component: require('./reports/campaign-report/Index').default,
        meta: { authOnly: true }
    },
    {
        path: '/deliveryReports',
        name: 'admin.deliveryReports',
        component: require('./reports/delivery-report/Index').default,
        meta: { authOnly: true }
    },
    {
        path: '/cumulativeReports',
        name: 'admin.cumulativeReports',
        component: require('./reports/cumulative-report/Index').default,
        meta: { authOnly: true }
    },
    {
        path: '/scheduledSMSReports',
        name: 'admin.scheduledSMSReports',
        component: require('./reports/scheduled-sms/Index').default,
        meta: { authOnly: true }
    },
    {
        path: '/transactionReports',
        name: 'admin.transactionReports',
        component: require('./reports/transaction-reports/Index').default,
        meta: { authOnly: true }
    },
    {
        path: '/creditsLogs',
        name: 'admin.creditsLogs',
        component: require('./logs/credits_logs/Index').default,
        meta: { authOnly: true }
    },


    {
        path: '/login',
        name: 'login',
        component: require('../auth/Login').default,
        meta: { hideForAuth: true },
    }
];

const router = new VueRouter({
    routes,
    mode: 'history',
    base: process.env.BASE_URL,
});

function isLoggedIn() {
    return localStorage.getItem("token");
}

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.authOnly)) {
        if (!isLoggedIn()) {
            next({ name: 'login' })
        } else {
            next() // go to wherever I'm going
        }
    } else {
        next() // does not require auth, make sure to always call next()!
    }
    if (to.matched.some(record => record.meta.hideForAuth)) {
        if (isLoggedIn()) {
            next({ path: '/dashboard' });
        } else {
            next();
        }
    } else {
        next();
    }
});

export default router;
