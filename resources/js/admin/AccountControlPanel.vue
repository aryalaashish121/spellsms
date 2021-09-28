<template>
  <div>
    <v-card flat class="p-0">
      <v-card-text class="mt-2">
        <template>
          <v-card>
            <v-card flat>
              <v-card-text>
                <div class="flex justify-between">
                  <div>
                    <h1 class="text-xl flex">Overview</h1>
                    <div class="flex space-x-1 pl-1">
                      <div class="w-10 h-1 bg-blue-400 rounded-full"></div>
                      <div class="w-4 h-1 bg-blue-400 rounded-full"></div>
                    </div>
                  </div>

                  <div
                    class="
                      shadow-inner
                      bg-gray-100
                      rounded
                      px-5
                      py-2
                      cursor-pointer
                      group
                      hover:bg-gray-400
                      hover:text-white
                      hover:shadow-lg
                      transition
                      ease-out
                      duration-300
                    "
                  >
                    <h2>
                      <i class="mr-1 fas fa-map-signs group-hover:text-white">
                      </i>
                      <strong>Route : </strong> SMBIT22
                    </h2>
                  </div>
                </div>

                <div
                  class="
                    grid grid-cols-1
                    md:grid-cols-2
                    lg:grid-cols-3
                    gap-5
                    mt-6
                  "
                >
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
                    <div class="w-full h-5 pt-3 pl-4 justify-between flex">
                      <h1 class="text-xs">Account Info</h1>
                      <v-speed-dial
                        v-model="fab"
                        transition="slide-x-transition"
                        direction="bottom"
                      >
                        <template v-slot:activator>
                          <v-btn
                            v-model="fab"
                            x-small
                            class="mr-3 -mt-1"
                            color="green lighten-1"
                            dark
                            fab
                          >
                            <v-icon v-if="fab"> mdi-close </v-icon>
                            <v-icon v-else> mdi-pencil </v-icon>
                          </v-btn>
                        </template>
                        <div class="mt-5 -ml-1.5">
                          <tool-tip
                            v-for="(item, index) in profileTooltips"
                            :key="index"
                            :icon="item.icon"
                            :title="item.title"
                            :color="item.color"
                            :href="item.href"
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
                        <h1 class="font-semibold text-lg">Nabin Adhikari</h1>
                        <h1>
                          <v-chip
                            dark
                            small
                            color="blue darken-2"
                            class="shadow-md"
                          >
                            Reseller
                          </v-chip>
                        </h1>
                        <h2 class="font-normal text-xs mt-3">
                          <i class="fas fa-envelope mr-1"></i>
                          nabin@gmail.com
                        </h2>
                        <h2 class="font-normal text-xs mt-1">
                          <i class="fas fa-phone-square-alt mr-1"></i>
                          9875102439
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
                          <span class="italic">nabin088</span>
                        </h2>
                        <h2 class="font-normal text-xs mt-1">
                          <i class="fas fa-calendar"></i>
                          <b>Joined:</b>
                          <span>22nd Sept, 2021</span>
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
                        v-model="fab"
                        transition="slide-x-transition"
                        direction="bottom"
                      >
                        <template v-slot:activator>
                          <v-btn
                            v-model="fab"
                            x-small
                            class="mr-3 -mt-1"
                            color="primary"
                            dark
                            fab
                          >
                            <v-icon v-if="fab"> mdi-close </v-icon>
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
                        <h1 class="font-semibold text-lg">Rvo Softwares</h1>
                        <h2 class="font-normal text-xs mt-3">
                          <i class="fas fa-map-marker mr-1"></i>
                          Mid-Baneshwor, Kathmandu
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

                  <div
                    class="
                      col-span-1
                      h-96
                      rounded-tr-xl rounded-br-xl
                      shadow
                      border
                      transition
                      duration-500
                      ease-out
                      hover:shadow-xl
                      hover:bg-gray-400
                      hover:text-white
                      group
                      cursor-pointer
                    "
                  >
                    <div class="w-full h-5 pt-3 pl-4">
                      <h1 class="text-xs">Account Manager</h1>
                    </div>
                    <div class="flex-col mt-3">
                      <div
                        class="
                          w-32
                          h-32
                          rounded-full
                          bg-gray-300
                          shadow-md
                          border-4 border-gray-400
                          group-hover:border-white
                          overflow-hidden
                          mx-auto
                        "
                      >
                        <img
                          src="https://images.pexels.com/photos/6368928/pexels-photo-6368928.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                          class="object-contain w-full h-full"
                          alt=""
                        />
                      </div>
                      <div class="text-center flex-col mt-4">
                        <h1 class="font-semibold text-lg">
                          Prasidhha Shrestha
                        </h1>
                        <h2 class="font-normal text-xs mt-3">
                          <i class="fas fa-envelope"></i>
                          prashiddhashr09@gmail.com
                        </h2>
                        <h2 class="font-normal text-xs mt-3">
                          <i class="fas fa-phone-square-alt"></i>
                          9861205043
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
                          <i class="fab fa-whatsapp-square mr-1"></i>
                          <b>WhatsApp:</b>
                          <span>9861205043</span>
                        </h2>
                        <h2 class="font-normal text-xs mt-2">
                          <i class="fab fa-skype"></i>
                          <b>Skype:</b>
                          <span> 9861205043 </span>
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
                            group-hover:border-white group-hover:opacity-75
                            mx-auto
                          "
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                          />
                        </svg>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mt-5">
                  <div class="col-span-1 shadow rounded h-72 border">
                    <div class="flex flex-col p-3">
                      <div class="flex justify-between">
                        <h1 class="text-sm font-semibold">SMS Credits</h1>
                        <v-speed-dial
                          v-model="fab"
                          transition="slide-x-transition"
                          direction="bottom"
                        >
                          <template v-slot:activator>
                            <v-btn
                              v-model="fab"
                              x-small
                              class="mr-3 -mt-1"
                              color="green"
                              dark
                              fab
                            >
                              <v-icon v-if="fab"> mdi-close </v-icon>
                              <v-icon v-else> mdi-cog </v-icon>
                            </v-btn>
                          </template>
                          <div class="-ml-1.5">
                            <tool-tip
                              v-for="(item, index) in creditTooltips"
                              :key="index"
                              :title="item.title"
                              :icon="item.icon"
                              :color="item.color"
                              :href="item.href"
                            >
                            </tool-tip>
                          </div>
                        </v-speed-dial>
                      </div>
                      <div class="flex justify-center">
                        <DonutChart :height="220"></DonutChart>
                      </div>
                    </div>
                  </div>

                  <div class="col-span-1 shadow rounded h-72 border">
                    <div class="flex flex-col p-3">
                      <div class="flex justify-between">
                        <h1 class="text-sm font-semibold">SMS Sent</h1>
                        <v-btn
                          fab
                          color="green"
                          dark
                          x-small
                          href="/user/sentSMS"
                        >
                          <v-icon>mdi-cogs</v-icon>
                        </v-btn>
                      </div>
                      <div class="flex justify-center overflow-hidden">
                        <LineChart :height="220"></LineChart>
                      </div>
                    </div>
                  </div>
                </div>
              </v-card-text>
            </v-card>
          </v-card> </template
      ></v-card-text>
    </v-card>
  </div>
</template> 

<script>
import DonutChart from "./charts/CreditsDonutChart.vue";
import LineChart from "./charts/SMS-sent-LineChart.vue";
import ToolTip from "../components/ToolTips.vue";
export default {
  components: { DonutChart, LineChart, ToolTip },
  data() {
    return {
      dialog: false,
      actionSwitch: true,
      headers: [
        {
          text: "Route Title",
          value: "route",
          sortable: false,
          align: "start",
        },

        {
          text: "Actions",
          value: "actions",
        },

        {
          text: "Info",
          value: "info",
        },
      ],

      route: [{ route: "SMSBIT (RouteID: 116)", info: "5 SMS available" }],

      creditTooltips: [
        {
          icon: "mdi-eye",
          title: "View Report",
          color: "primary",
        },
        {
          icon: "mdi-wrench",
          title: "Manage Credits",
          color: "green",
          href: "/user/creditDebit",
        },
      ],

      profileTooltips: [
        {
          icon: "mdi-lock-reset",
          title: "Reset Password",
          color: "blue darken-1",
          href: "/user/resetPassword",
        },
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

      companyTooltips: [
        {
          icon: "mdi-credit-card-clock",
          title: "Credit Log",
          color: "cyan darken-3",
          href: "/user/creditLog",
        },

        {
          icon: "mdi-currency-inr",
          title: "Recharge History",
          color: "light-blue darken-1",
          href: "/user/rechargeHistory",
        },
      ],
    };
  },

  methods: {
    open() {
      const self = this;
      self.dialog = true;
    },
  },
};
</script>