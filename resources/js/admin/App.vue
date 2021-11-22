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

    <!-- dialog for confirmation -->
    <v-dialog persistent v-model="showDialog" absolute max-width="450px">
      <v-card>
        <v-card-title class="primary white--text">
          <v-icon dark class="mr-3" v-if="dialogIcon" medium>{{
            dialogIcon
          }}</v-icon>
          <span>{{ dialogTitle }}</span>
        </v-card-title>

        <v-card-text>
          {{ dialogMessage }}
        </v-card-text>

        <v-card-actions v-if="dialogType == 'confirm'">
          <v-spacer></v-spacer>
          <v-btn text dark color="error" @click.native="dialogCancel"
            >Cancel</v-btn
          >
          <v-btn text dark color="primary" @click.native="dialogOk">Ok</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>

    <!-- snackbar ends here  -->
    <div v-if="showLoader" class="wask_loader bg_half_transparent">
      <scale-loader position="fixed" color="white"></scale-loader>
    </div>

    <!--loader ends here-->
    <v-navigation-drawer v-model="drawer" app class="elevation-3">
      <v-list-item class="px-2 pb-2">
        <v-list-item-avatar>
          <v-img src="" max-width="90" max-height="90"></v-img>
        </v-list-item-avatar>

        <v-list-item-title class="mt-3">
          <span class="font-semibold text-base">
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
        <router-link to="/">
          <v-list-item>
            <v-list-item-icon>
              <v-icon> mdi-home </v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>
                <span class="text-xs">Dashboard</span>
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </router-link>

        <v-list-group prepend-icon="mdi-account-group">
          <template v-slot:activator>
            <v-list-item-content>
              <v-list-item-title>
                <span class="text-xs">User Management</span>
              </v-list-item-title>
            </v-list-item-content>
          </template>

          <div class="shadow-inner bg-blue-50 py-3 rounded-md">
            <router-link to="/activeUsers">
              <v-list-item class="px-6">
                <v-list-item-icon>
                  <v-icon> mdi-account-clock </v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                  <v-list-item-title>
                    <span class="text-xs"> Active Users</span>
                  </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </router-link>

            <router-link to="/suspendedUsers">
              <v-list-item class="px-6">
                <v-list-item-icon>
                  <v-icon> mdi-account-remove </v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                  <v-list-item-title>
                    <span class="text-xs"> Suspended Accounts </span>
                  </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </router-link>

            <router-link to="/announcements">
              <v-list-item class="px-6">
                <v-list-item-icon>
                  <v-icon> mdi-bullhorn </v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                  <v-list-item-title>
                    <span class="text-xs"> Announcements </span>
                  </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </router-link>

            <router-link to="/accountManagers">
              <v-list-item class="px-6">
                <v-list-item-icon>
                  <v-icon> mdi-account-cog </v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                  <v-list-item-title>
                    <span class="text-xs"> Account Manager </span>
                  </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </router-link>

            <router-link to="/lowCredits">
              <v-list-item class="px-6">
                <v-list-item-icon>
                  <v-icon> mdi-gauge-low </v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                  <v-list-item-title>
                    <span class="text-xs"> Low Credit </span>
                  </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </router-link>
          </div>
        </v-list-group>

        <v-list-group prepend-icon="mdi-forum">
          <template v-slot:activator>
            <v-list-item-content>
              <v-list-item-title>
                <span class="text-xs">Messaging</span>
              </v-list-item-title>
            </v-list-item-content>
          </template>

          <div class="shadow-inner bg-blue-50 py-3 rounded-md">
            <router-link to="/sendSMS">
              <v-list-item class="px-6">
                <v-list-item-icon>
                  <v-icon> mdi-email </v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                  <v-list-item-title>
                    <span class="text-xs"> Send SMS </span>
                  </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </router-link>

            <router-link to="/senderId">
              <v-list-item class="px-6">
                <v-list-item-icon>
                  <v-icon> mdi-card-account-details </v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                  <v-list-item-title>
                    <span class="text-xs"> Sender ID </span>
                  </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </router-link>

            <router-link to="/templates">
              <v-list-item class="px-6">
                <v-list-item-icon>
                  <v-icon> mdi-shape </v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                  <v-list-item-title>
                    <span class="text-xs"> Templates </span>
                  </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </router-link>

            <router-link to="/blacklist">
              <v-list-item class="px-6">
                <v-list-item-icon>
                  <v-icon> mdi-account-off </v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                  <v-list-item-title>
                    <span class="text-xs"> Blacklist </span>
                  </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </router-link>

            <router-link to="/campaigns">
              <v-list-item class="px-6">
                <v-list-item-icon>
                  <v-icon> mdi-sign-text </v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                  <v-list-item-title>
                    <span class="text-xs"> Campaigns </span>
                  </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </router-link>
          </div>
        </v-list-group>

        <v-list-group prepend-icon="mdi-card-account-phone-outline">
          <template v-slot:activator>
            <v-list-item-content>
              <v-list-item-title>
                <span class="text-xs">Contacts & Groups </span>
              </v-list-item-title>
            </v-list-item-content>
          </template>

          <div class="shadow-inner bg-blue-50 py-3 rounded-md">
            <router-link to="/manageContactGroups">
              <v-list-item class="px-6">
                <v-list-item-icon>
                  <v-icon> mdi-account-group </v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                  <v-list-item-title>
                    <span class="text-xs"> Manage Groups </span>
                  </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </router-link>

            <router-link to="/manageContacts">
              <v-list-item class="px-6">
                <v-list-item-icon>
                  <v-icon> mdi-phone </v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                  <v-list-item-title>
                    <span class="text-xs"> Manage Contacts </span>
                  </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </router-link>
          </div>
        </v-list-group>

        <v-list-group prepend-icon="mdi-chart-bar">
          <template v-slot:activator>
            <v-list-item-content>
              <v-list-item-title>
                <span class="text-xs"> Reports </span>
              </v-list-item-title>
            </v-list-item-content>
          </template>

          <div class="shadow-inner bg-blue-50 py-3 rounded-md">
            <router-link to="/campaignReports">
              <v-list-item class="px-6">
                <v-list-item-icon>
                  <v-icon> mdi-sign-text </v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                  <v-list-item-title>
                    <span class="text-xs"> Campaign Report </span>
                  </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </router-link>

            <router-link to="/deliveryReports">
              <v-list-item class="px-6">
                <v-list-item-icon>
                  <v-icon> mdi-truck </v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                  <v-list-item-title>
                    <span class="text-xs"> Delivery Report </span>
                  </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </router-link>

            <router-link to="/cumulativeReports">
              <v-list-item class="px-6">
                <v-list-item-icon>
                  <v-icon> mdi-chart-box </v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                  <v-list-item-title>
                    <span class="text-xs"> Cumulative Report </span>
                  </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </router-link>

            <router-link to="/scheduledSMSReports">
              <v-list-item class="px-6">
                <v-list-item-icon>
                  <v-icon> mdi-message-text-clock </v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                  <v-list-item-title>
                    <span class="text-xs"> Scheduled SMS </span>
                  </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </router-link>

            <router-link to="/transactionReports">
              <v-list-item class="px-6">
                <v-list-item-icon>
                  <v-icon> mdi-handshake </v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                  <v-list-item-title>
                    <span class="text-xs"> Transaction Reports </span>
                  </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </router-link>

            <router-link to="">
              <v-list-item class="px-6">
                <v-list-item-icon>
                  <v-icon> mdi-archive </v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                  <v-list-item-title>
                    <span class="text-xs"> Archive Reports </span>
                  </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </router-link>
          </div>
        </v-list-group>

        <v-list-group prepend-icon="mdi-chart-gantt">
          <template v-slot:activator>
            <v-list-item-content>
              <v-list-item-title>
                <span class="text-xs"> Logs </span>
              </v-list-item-title>
            </v-list-item-content>
          </template>

          <div class="shadow-inner bg-blue-50 py-3 rounded-md">
            <router-link to="/creditsLogs">
              <v-list-item class="px-6">
                <v-list-item-icon>
                  <v-icon> mdi-cash </v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                  <v-list-item-title>
                    <span class="text-xs"> Credits Logs </span>
                  </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </router-link>
          </div>
        </v-list-group>
      </v-list>
      <!-- -->
    </v-navigation-drawer>

    <v-app-bar app color="primary" dark>
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>

      <v-toolbar-title>
        <span class="text-base">Admin Dashboard</span>
      </v-toolbar-title>

      <v-spacer></v-spacer>

      <v-menu transition="slide-y-transition" bottom offset-y>
        <template v-slot:activator="{ on, attrs }">
          <v-btn icon v-bind="attrs" v-on="on">
            <v-icon>mdi-bell</v-icon>
          </v-btn>
        </template>
        <v-list>
          <v-list-item
            v-for="(notification, i) in mynotifications"
            :key="i"
            v-if="mynotifications"
          >
            <v-list-item-title>
              <p class="text-xs cursor-pointer">
                {{ notification.data.title }}

                {{ notification.data.content }}
                <v-divider class="mt-2"></v-divider>
              </p>
            </v-list-item-title>
          </v-list-item>
          <v-list-item v-else>
            <v-list-item-title>
              <p class="text-xs cursor-pointer">
                <v-icon left small> </v-icon>
                No notification avaiable
                <v-divider class="mt-2"></v-divider>
              </p>
            </v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>

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

          <v-list-item class="elevation-0" link @click="clickLogout">
            <v-list-item-icon>
              <v-icon>mdi-logout</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>Logout</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list>
      </v-menu>
    </v-app-bar>

    <v-main>
      <div class="">
        <div class="loader-wrapper">
          <lottie-player
            src="https://assets5.lottiefiles.com/packages/lf20_x62chJ.json"
            background="transparent"
            speed="3"
            style="width: 100%; height: 100%"
            loop
            autoplay
          ></lottie-player>
        </div>
        <router-view></router-view>
      </div>
    </v-main>
  </v-app>
</template>

<style>
@import url("https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap");

#inspire {
  font-family: "Poppins", sans-serif;
}

.loader-wrapper {
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999999999;
}
</style>

<script>
import { toggleFullScreen } from "../utils";
import store from "../common/store";
import Api from "../common/Api";
export default {
  data() {
    return {
      drawer: true,
      isFullScreen: false,
      timeout: 3000,
      mynotifications: [],
    };
  },

  mounted() {
    const self = this;
    self.notifications();
  },

  created() {
    const self = this;
    self.loadPreloader();
  },

  methods: {
    async notifications() {
      const self = this;
      self.url = "/my-notifications";
      let response = await self.getAll();
      self.mynotifications = response.data;
      console.log(self.mynotifications);
    },
    async clickLogout() {
      const self = this;
      self.url = "/logout";
      let data = {
        token: localStorage.getItem("token"),
      };
      try {
        let response = await Api().post(`/logout`, data);
        if (response.status === 200 && response.data.success) {
          self.$store.commit("showSnackbar", {
            message: "Logged Out successfully",
            color: response.data.success,
          });
          localStorage.removeItem("token");
          self.$router.push("/login");
        }
      } catch (err) {
        self.loading = false;
        // alert(err);
        if (err) {
          self.loading = false;
          let errResponse = err.response;
          self.$store.commit("showSnackbar", {
            message: errResponse.data.message,
            color: errResponse.data.success,
          });
        }
      }
    },

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

    loadPreloader() {
      $(window).on("load", function () {
        $(".loader-wrapper").fadeOut("slow");
      });
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
