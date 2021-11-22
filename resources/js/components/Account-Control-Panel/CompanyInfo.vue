<template>
  <div
    class="
      col-span-1
      h-96
      rounded-lg
      shadow
      border
      transition
      duration-300
      ease-in-out
      hover:shadow-xl
      hover:bg-green-400
      hover:text-white
      group
      cursor-pointer
    "
  >
    <div class="w-full h-5 pt-3 pl-4 justify-between flex">
      <h1 class="text-xs">Company Info Info</h1>
      <v-speed-dial
        v-model="fabTwo"
        transition="slide-x-transition"
        direction="bottom"
      >
        <template v-slot:activator>
          <v-btn
            v-model="fabTwo"
            x-small
            class="mr-3 -mt-1"
            color="primary"
            dark
            fab
          >
            <v-icon v-if="fabTwo"> mdi-close </v-icon>
            <v-icon v-else> mdi-pencil </v-icon>
          </v-btn>
        </template>
        <div class="mt-5 -ml-1.5">
          <tool-tip
            v-for="(item, index) in companyTooltips"
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
    <div class="flex-col mt-7">
      <div
        class="
          w-28
          h-28
          rounded-lg
          shadow-md
          border-4 border-gray-400
          group-hover:border-white
          overflow-hidden
          mx-auto
          p-4
        "
      >
        <img
          src="https://cdn-icons-png.flaticon.com/512/994/994382.png"
          class="object-contain w-full h-full"
          alt=""
        />
      </div>
      <div class="text-center flex-col mt-4">
        <h1 class="font-semibold text-lg">
          {{ userdetails.company_name }}
        </h1>
        <h2 class="font-normal text-xs mt-3">
          <i class="fas fa-map-marker mr-1"></i>
          {{ userdetails.address }}
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
        <h2 class="font-semibold mt-3">Upline:</h2>
        <h2 class="font-normal text-xs mt-1">
          <i class="far fa-building mr-1"></i>
          <b>Comapny Name:</b>
          <span>Spell Innovation Pvt. Ltd.</span>
        </h2>
        <h2 class="font-normal text-xs mt-2">
          <i class="fas fa-user"></i>
          <b>Owner Name:</b>
          <span> Aashish Aryal </span>
        </h2>
      </div>
    </div>

    <div class="w-full flex justify-end mt-3 h-12">
      <div class="w-1/6 h-12">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="
            h-10
            w-10
            opacity-50
            mx-auto
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
            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"
          />
        </svg>
      </div>
    </div>
  </div>
</template>
<script>
import ToolTip from "../ToolTips.vue";
export default {
  components: { ToolTip },
  data() {
    return {
      fabTwo: "",
      userdetails: [],
      slug: "",
      companyTooltips: [
        {
          icon: "mdi-credit-card-clock",
          title: "Credit Log",
          color: "cyan darken-3",
          href: "admin.user-credit_Debit",
        },

        {
          icon: "mdi-currency-inr",
          title: "Recharge History",
          color: "light-blue darken-1",
          href: "admin.userRechargeHistory",
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
  },
};
</script>