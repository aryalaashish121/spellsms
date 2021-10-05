
require('../bootstrap');
require('../common/common');

import Vue from 'vue';
import vuetify from '../Vuetify';
import App from './App.vue';
import Login from '../auth/Login.vue';
import router from './router';
import eventBus from '../common/event';
import store from '../common/store';
import { toggleFullScreen } from "../utils";
import AxiosAjaxDetect from "../common/axiosAxajDetect";
import VMdDateRangePicker from "v-md-date-range-picker";
import JsonExcel from 'vue-json-excel'

import moment from 'moment';
// import "v-md-date-range-picker/dist/v-md-date-range-picker.css";
import './tailwindcss.css'
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
Vue.use(eventBus);
Vue.use(VMdDateRangePicker);
Vue.component('downloadExcel', JsonExcel)
const admin = new Vue({
    router,
    eventBus,
    vuetify,
    store,
    moment,
    components: {
        App, Login
    },
    el: "#admin",
    data() {
        return {
            breadCrumbsItems: [{
                text: 'Users',
                href: '/admin/users',
                disabled: false
            }],
        }
    },
    mounted() {
        const self = this;
        // AxiosAjaxDetect.init(
        //     () => {
        //         self.$Progress.start();
        //     },
        //     () => {
        //         self.$Progress.finish();
        //     }
        // );

    },
    methods: {
        toggleFullScreen() {
            if (this.isFullScreen) {
                this.isFullScreen = false;
            } else {
                this.isFullScreen = true;
            }
            toggleFullScreen();
        },
        toggleTheme() {
            this.$vuetify.theme.dark = !this.$vuetify.theme.dark;
            localStorage.setItem("darkMode", this.$vuetify.theme.dark);
        },
        dialogOk() {
            store.commit("dialogOk");
        },
        dialogCancel() {
            store.commit("dialogCancel");
        },
    },
    computed: {
        toggleFullScreenIcon() {
            return this.isFullScreen == true
                ? "mdi-fullscreen-exit"
                : "mdi-fullscreen";
        },
        showDialog: {
            get() {
              return store.getters.showDialog;
            },
            set(val) {
              if (!val) store.commit("hideDialog");
            },
          },
    }

});

export default admin;