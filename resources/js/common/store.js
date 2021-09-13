
import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        
        //TODO: dialog
        showDialog: false,
        dialogType: '',
        dialogTitle: '',
        dialogMessage: '',
        dialogIcon: null,
        dialogOkCb: () => { },
        dialogCancelCb: () => { },
        // TODO: snackbar
        showSnackbar: false,
        snackbarMessage: '',
        snackbarColor: '',
        snackbarDuration: 3000,

        // Loader
        showLoader: false,
        app_user: APP.USER || {},
        app_url: APP.URL,
    },

    mutations: {
        //TODO: dialog
        showDialog(state, payload) {
            state.dialogType = payload.type || 'confirm';
            state.dialogTitle = payload.title;
            state.dialogMessage = payload.message;
            state.dialogIcon = payload.icon || null;
            state.dialogOkCb = payload.okCb || function () { };
            state.dialogCancelCb = payload.cancelCb || function () { };
            state.showDialog = true;
        },
        hideDialog(state) {
            state.showDialog = false;
        },
        dialogOk(state) {
            state.dialogOkCb();
            state.showDialog = false;
        },
        dialogCancel(state) {
            state.dialogCancelCb();
            state.showDialog = false;
        },
        //TODO: snackbar
        showSnackbar(state, payload) {
            if (payload.color) {
                payload.color = 'success';
            }
            else {
                payload.color = 'error';
            }
            state.snackbarDuration = payload.duration || 3000;
            state.snackbarMessage = payload.message || 'No message';
            state.snackbarColor = payload.color || 'info';
            state.showSnackbar = true;
        },
        hideSnackbar(state) {
            state.showSnackbar = false;
        },
        // TODO: loader
        showLoader(state) {
            state.showLoader = true;
        },
        hideLoader(state) {
            state.showLoader = false;
        },
        setBreadcrumbs(state, items) {
            items.unshift({ label: 'Dashboard', to: { name: 'dashboard' } });
            state.breadcrumbs = items;
        },
        
    },
    getters: {
        // TODO: dialog
        showDialog: state => {
            return state.showDialog;
        },
        dialogTitle: state => {
            return state.dialogTitle;
        },
        dialogMessage: state => {
            return state.dialogMessage;
        },
        dialogType: state => {
            return state.dialogType;
        },
        dialogIcon: state => {
            return state.dialogIcon;
        },
        // TODO: snackbar
        showSnackbar: state => {
            return state.showSnackbar;
        },
        snackbarMessage: state => {
            return state.snackbarMessage;
        },
        snackbarColor: state => {
            return state.snackbarColor;
        },
        snackbarDuration: state => {
            return state.snackbarDuration;
        },
        showLoader: state => {
            return state.showLoader;
        },

        // TODO: breadcrumbs
        getBreadcrumbs: state => {
            return state.breadcrumbs;
        },

        appSetting: state => {
            return state.app_setting;
        },

        appUser: state => {
            return state.app_user
        }
    }


});

export default store;