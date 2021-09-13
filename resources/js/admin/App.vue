<template>
  <v-app id="inspire">
    <!-- snackbar -->
    <v-snackbar
      v-model="showSnackbar"
      :timeout="snackbarDuration"
      :color="snackbarColor"
      top
      centered
    >
      {{ snackbarMessage }}

      <template v-slot:action="{ attrs }">
        <v-btn color="blue" text v-bind="attrs" @click="showSnackbar = false">
          Close
        </v-btn>
      </template>
    </v-snackbar>
    <!-- snackbar ends here  -->

    <v-navigation-drawer v-model="drawer" app class="elevation-3">
      <v-list-item class="px-2 pb-2">
        <v-list-item-avatar>
          <v-img src="" max-width="90" max-height="90"></v-img>
        </v-list-item-avatar>

        <v-list-item-title class="mt-3">
          <span style="font-size: 14.5px; font-weight: 700">
            <v-avatar size="50">
              <img
                src="https://spellsms.com/assets/images/logo/spelllogo.png"
                alt=""
            /></v-avatar>
            SpellSMS
          </span>
        </v-list-item-title>
      </v-list-item>

      <v-divider></v-divider>

      <v-list nav dense>
        <v-list-item>
          <v-list-item-icon>
            <v-icon> mdi-home </v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>
              <router-link to="/" style="color: black"> Dashboard </router-link>
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-group prepend-icon="mdi-account-group">
          <template v-slot:activator>
            <v-list-item-content>
              <v-list-item-title> User Management </v-list-item-title>
            </v-list-item-content>
          </template>

          <v-list-item class="px-6">
            <v-list-item-icon>
              <v-icon> mdi-account-clock </v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>
                <router-link to="/activeUsers" style="color: black">
                  Active Users
                </router-link>
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>

          <v-list-item class="px-6">
            <v-list-item-icon>
              <v-icon> mdi-account-remove </v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title> Suspended Accounts </v-list-item-title>
            </v-list-item-content>
          </v-list-item>

          <v-list-item class="px-6">
            <v-list-item-icon>
              <v-icon> mdi-bullhorn </v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title> Announcements </v-list-item-title>
            </v-list-item-content>
          </v-list-item>

          <v-list-item class="px-6">
            <v-list-item-icon>
              <v-icon> mdi-account-cog </v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title> Account Manager </v-list-item-title>
            </v-list-item-content>
          </v-list-item>

          <v-list-item class="px-6">
            <v-list-item-icon>
              <v-icon> mdi-currency-usd </v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title class="font-weight-bold">
                Low Credit
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list-group>
      </v-list>
      <!-- -->
    </v-navigation-drawer>

    <v-app-bar app color="primary" dark>
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>

      <v-toolbar-title> Admin Dashboard </v-toolbar-title>

      <v-spacer></v-spacer>

      <v-btn @click="toggleTheme" icon>
        <v-icon>mdi-theme-light-dark</v-icon>
      </v-btn>
      <v-menu class="ml-3 elevation-0" offset-y>
        <template v-slot:activator="{ on }">
          <v-btn dark icon v-on="on" color="yellow">
            <v-avatar size="40">
              <img
                src="https://spellsms.com/assets/images/logo/spelllogo.png"
                alt="John"
              />
            </v-avatar>
          </v-btn>
        </template>

        <v-list class="elevation-0">
          <v-list-item class="elevation-0">
            <v-list-item-content>
              <v-list-item-title>Aashish Aryal</v-list-item-title>
              <v-list-item-subtitle
                >superadmin2021@spellsms.com</v-list-item-subtitle
              >
            </v-list-item-content>
          </v-list-item>

          <v-list-item class="elevation-0" link to="/admin/profile">
            <v-list-item-icon>
              <v-icon>mdi-account-outline</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>Profile</v-list-item-title>
            </v-list-item-content>
          </v-list-item>

          <v-list-item class="elevation-0" link to="/admin/changePassword">
            <v-list-item-icon>
              <v-icon>mdi-lock-clock</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>Change Password</v-list-item-title>
            </v-list-item-content>
          </v-list-item>

          <v-list-item class="elevation-0" link to="/admin/settings">
            <v-list-item-icon>
              <v-icon>mdi-wrench-outline</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>Settings</v-list-item-title>
            </v-list-item-content>
          </v-list-item>

          <v-list-item class="elevation-0" link @click="clickLogout()">
            <v-list-item-icon>
              <v-icon>mdi-logout</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>Logout</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list>
      </v-menu>

      <!-- <v-btn icon @click="toggleFullScreen">
                <v-icon>@{{toggleFullScreenIcon}}</v-icon>
            </v-btn> -->
    </v-app-bar>

    <v-main>
      <transition name="fade">
        <router-view></router-view>
      </transition>

      <!--  -->
    </v-main>
  </v-app>
</template>

<script>
import { toggleFullScreen } from "../utils";
import store from "../common/store";
export default {
  data: () => ({
    drawer: true,
    isFullScreen: false,
    timeout: 3000,
  }),

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
    dialogTitle() {
      return store.getters.dialogTitle;
    },
    dialogMessage() {
      return store.getters.dialogMessage;
    },
    dialogType() {
      return store.getters.dialogType;
    },
    dialogIcon() {
      return store.getters.dialogIcon;
    },
    showSnackbar: {
      get() {
        return store.getters.showSnackbar;
      },
      set(val) {
        if (!val) store.commit("hideSnackbar");
      },
    },
    snackbarDuration() {
      return store.getters.snackbarDuration;
    },
    snackbarColor() {
      return store.getters.snackbarColor;
    },
    snackbarMessage() {
      return store.getters.snackbarMessage;
    },
    showLoader() {
      return store.getters.showLoader;
    },
    getBreadcrumbs() {
      return store.getters.getBreadcrumbs;
    },
  },
};
</script>
