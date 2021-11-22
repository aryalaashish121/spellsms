<template>
  <div
    class="
      col-span-1
      shadow
      border
      h-96
      rounded-tl-xl rounded-bl-xl
      transition
      duration-300
      ease-in-out
      hover:shadow-xl
      hover:bg-blue-300
      hover:text-white
      group
      cursor-pointer
    "
  >
    <ResetPasswordDialog ref="resetPassword"></ResetPasswordDialog>
    <div class="w-full h-5 pt-3 pl-4 justify-between flex">
      <h1 class="text-xs">Account Info</h1>

      <v-speed-dial
        v-model="fabOne"
        transition="slide-x-transition"
        direction="bottom"
      >
        <template v-slot:activator>
          <v-btn
            v-model="fabOne"
            x-small
            class="mr-3 -mt-1"
            color="green lighten-1"
            dark
            fab
          >
            <v-icon v-if="fabOne"> mdi-close </v-icon>
            <v-icon v-else> mdi-pencil </v-icon>
          </v-btn>
        </template>
        <div class="mt-5 -ml-1.5">
          <v-tooltip right>
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                v-on="on"
                v-bind="attrs"
                fab
                dark
                x-small
                color="primary"
                @click="resetPassword"
              >
                <v-icon>mdi-lock-reset</v-icon>
              </v-btn>
            </template>
            <span class="text-xs">Reset Password</span>
          </v-tooltip>
          <tool-tip
            v-for="(item, index) in profileTooltips"
            :key="index"
            :icon="item.icon"
            :title="item.title"
            :color="item.color"
            :href="item.href"
            :data="userdetails"
          >
          </tool-tip>
        </div>
      </v-speed-dial>
    </div>
    <div class="flex-col mt-3">
      <div
        class="
          w-32
          h-32
          rounded-full
          shadow-md
          border-4 border-gray-400
          group-hover:border-white
          overflow-hidden
          mx-auto
        "
      >
        <img
          src="https://images.pexels.com/photos/5528835/pexels-photo-5528835.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
          class="object-cover w-full h-full"
          alt=""
        />
      </div>
      <div class="text-center flex-col mt-4">
        <h1 class="font-semibold text-lg">
          {{ userdetails.name }}
        </h1>
        <h1>
          <v-chip dark small color="blue darken-2" class="shadow-md">
            Reseller
          </v-chip>
        </h1>
        <h2 class="font-normal text-xs mt-3">
          <i class="fas fa-envelope mr-1"></i>
          {{ userdetails.email }}
        </h2>
        <h2 class="font-normal text-xs mt-1">
          <i class="fas fa-phone-square-alt mr-1"></i>
          {{ userdetails.phone }}
        </h2>

        <div
          class="
            w-14
            h-0.5
            bg-gray-700
            group-hover:bg-white
            mx-auto
            mt-2
            rounded-full
            shadow
          "
        ></div>
        <h2 class="font-normal text-xs mt-3">
          <i class="fas fa-id-card mr-1"></i>
          <b>Login Id:</b>
          <span class="italic">{{ userdetails.login_id }}</span>
        </h2>
        <h2 class="font-normal text-xs mt-1">
          <i class="fas fa-calendar"></i>
          <b>Joined:</b>
          <span>{{ userdetails.created_at }}</span>
        </h2>
      </div>
    </div>

    <div class="w-full flex justify-end h-12">
      <div class="w-1/6 h-12">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="
            h-10
            w-10
            mx-auto
            opacity-50
            group-hover:text-white group-hover:opacity-75
          "
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"
          />
        </svg>
      </div>
    </div>
  </div>
</template>
<script>
import ResetPasswordDialog from "../Dialogues/ResetPassword.vue";
import ToolTip from "../ToolTips.vue";
export default {
  components: { ResetPasswordDialog, ToolTip },
  data() {
    return {
      fabOne: "",
      userdetails: [],
      slug: "",
      profileTooltips: [
        {
          icon: "mdi-briefcase-account",
          title: "Make Seller",
          color: "green lighten-1",
        },
        {
          icon: "mdi-cancel",
          title: "Suspend",
          color: "gray darken-4",
        },
        {
          icon: "mdi-delete-outline",
          title: "Delete",
          color: "red",
        },
      ],
    };
  },
  mounted() {
    const self = this;
    const user = this.$route.params.id;
    console.log(user);
    if (!user) {
      this.$router.push("/");
    }
    self.getUserDetails(user);
  },

  methods: {
    async getUserDetails(user) {
      const self = this;
      self.url = "/account/settings";
      let response = await self.show(user);
      self.userdetails = response.data;
    },

    resetPassword() {
      const self = this;
      self.$refs.resetPassword.open();
    },
  },
};
</script>