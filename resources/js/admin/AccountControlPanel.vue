<template>
  <div>
    <v-card flat>
      <v-card-title class="primary white--text" elevation="5">
        <v-icon dark left> mdi-account-circle </v-icon>
        Account ControL Panel
        <v-spacer></v-spacer>
        <v-btn dark icon @click="dialog = false">
          <v-icon>mdi-close</v-icon>
        </v-btn>
      </v-card-title>
      <v-card-text class="mt-10">
        <template>
          <v-card>
            <v-tabs vertical dark background-color="teal darken-3">
              <v-tab class="text-capitalize">
                <v-icon left> mdi-account </v-icon>
                Overview
              </v-tab>
              <v-tab class="text-capitalize">
                <v-icon left> mdi-routes </v-icon>
                Route Settings
              </v-tab>
              <v-tab class="text-capitalize">
                <v-icon left> mdi-send </v-icon>
                Sent SMS
              </v-tab>
              <v-tab class="text-capitalize">
                <v-icon left> mdi-cash-multiple </v-icon>
                Credit/Debit Account
              </v-tab>
              <v-tab class="text-capitalize">
                <v-icon left> fas fa-file-invoice-dollar </v-icon>
                Recharge History
              </v-tab>
              <v-tab class="text-capitalize">
                <v-icon left> mdi-money </v-icon>
                Credit Log
              </v-tab>
              <v-tab class="text-capitalize">
                <v-icon left> mdi-account-cog </v-icon>
                Account Settings
              </v-tab>
              <v-tab class="text-capitalize">
                <v-icon left> mdi-plus </v-icon>
                Add-on Settings
              </v-tab>
              <v-tab class="text-capitalize">
                <v-icon left> mdi-account-tie </v-icon>
                Add Sender ID
              </v-tab>

              <v-tab-item>
                <v-card flat>
                  <v-card-text>
                    <h1 class="text-xl flex">
                      <v-icon> mdi-account </v-icon> Overview
                    </h1>
                    <div class="flex space-x-1 mt-1 pl-7">
                      <div class="w-10 h-0.5 bg-blue-400 rounded-full"></div>
                      <div class="w-4 h-0.5 bg-blue-400 rounded-full"></div>
                    </div>

                    <div class="grid grid-cols-3 gap-5 mt-6">
                      <div
                        class="
                          col-span-1
                          shadow
                          border
                          h-96
                          rounded
                          transition
                          duration-500
                          ease-out
                          hover:shadow-xl
                          cursor-pointer
                        "
                      >
                        <div class="w-full h-5 pt-3 pl-4">
                          <h1 class="text-gray-500">Account Info</h1>
                        </div>
                        <div class="flex-col mt-3">
                          <div
                            class="
                              w-32
                              h-32
                              rounded-full
                              shadow-md
                              border-4 border-gray-400
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
                              Nabin Adhikari
                            </h1>
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
                                mx-auto
                                mt-2
                                rounded-full
                                shadow
                              "
                            ></div>
                            <h2 class="font-normal text-xs mt-2">
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

                        <div class="w-full flex justify-end h-16">
                          <div class="w-1/6 h-16 pr-4">
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              class="
                                h-14
                                w-14
                                text-gray-500
                                mx-auto
                                opacity-50
                                -mt-3
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
                          rounded
                          shadow
                          border
                          transition
                          duration-500
                          ease-out
                          hover:shadow-xl
                          cursor-pointer
                        "
                      >
                        <div class="w-full h-5 pt-3 pl-4">
                          <h1 class="text-gray-500">Company Info</h1>
                        </div>
                        <div class="flex-col mt-3">
                          <div
                            class="
                              w-32
                              h-32
                              rounded-lg
                              shadow-md
                              border-4 border-gray-400
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

                        <div class="w-full flex justify-end mt-8 h-16">
                          <div class="w-1/6 h-16 pr-4">
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              class="
                                h-14
                                w-14
                                opacity-50
                                text-gray-500
                                mx-auto
                                -mt-8
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
                          rounded
                          shadow
                          border
                          transition
                          duration-500
                          ease-out
                          hover:shadow-xl
                          cursor-pointer
                        "
                      >
                        <div class="w-full h-5 pt-3 pl-4">
                          <h1 class="text-gray-500">Account Manager</h1>
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

                        <div class="w-full flex justify-end mt-8 h-16">
                          <div class="w-1/6 h-16 pr-4">
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              class="
                                h-14
                                w-14
                                opacity-50
                                text-gray-500
                                mx-auto
                                -mt-9
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

                    <div class="mt-5 flex justify-end w-full h-20 pl-28">
                      <div class="w-1/2 h-20 p-3">
                        <h1 class="font-semibold">Actions :</h1>
                        <div class="flex space-x-2 mt-2">
                          <v-btn
                            color="blue darken-3"
                            class="text-capitalize"
                            dark
                          >
                            Reset Password
                            <v-icon right dark> mdi-lock-reset </v-icon>
                          </v-btn>

                          <v-btn
                            color="green darken-2"
                            class="text-capitalize"
                            dark
                          >
                            Make Seller
                            <v-icon right dark> mdi-briefcase-account </v-icon>
                          </v-btn>

                          <v-btn
                            color="gray darken-4"
                            class="text-capitalize"
                            dark
                          >
                            Suspend
                            <v-icon right dark> mdi-cancel </v-icon>
                          </v-btn>

                          <v-btn color="red" class="text-capitalize" dark>
                            Delete
                            <v-icon right dark> mdi-delete </v-icon>
                          </v-btn>
                        </div>
                      </div>
                    </div>
                  </v-card-text>
                </v-card>
              </v-tab-item>
              <v-tab-item>
                <v-card flat>
                  <v-card-text>
                    <p>
                      Morbi nec metus. Suspendisse faucibus, nunc et
                      pellentesque egestas, lacus ante convallis tellus, vitae
                      iaculis lacus elit id tortor. Sed mollis, eros et ultrices
                      tempus, mauris ipsum aliquam libero, non adipiscing dolor
                      urna a orci. Curabitur ligula sapien, tincidunt non,
                      euismod vitae, posuere imperdiet, leo. Nunc sed turpis.
                    </p>

                    <p>
                      Suspendisse feugiat. Suspendisse faucibus, nunc et
                      pellentesque egestas, lacus ante convallis tellus, vitae
                      iaculis lacus elit id tortor. Proin viverra, ligula sit
                      amet ultrices semper, ligula arcu tristique sapien, a
                      accumsan nisi mauris ac eros. In hac habitasse platea
                      dictumst. Fusce ac felis sit amet ligula pharetra
                      condimentum.
                    </p>

                    <p>
                      Sed consequat, leo eget bibendum sodales, augue velit
                      cursus nunc, quis gravida magna mi a libero. Nam commodo
                      suscipit quam. In consectetuer turpis ut velit. Sed cursus
                      turpis vitae tortor. Aliquam eu nunc.
                    </p>

                    <p>
                      Etiam ut purus mattis mauris sodales aliquam. Ut varius
                      tincidunt libero. Aenean viverra rhoncus pede. Duis leo.
                      Fusce fermentum odio nec arcu.
                    </p>

                    <p class="mb-0">
                      Donec venenatis vulputate lorem. Aenean viverra rhoncus
                      pede. In dui magna, posuere eget, vestibulum et, tempor
                      auctor, justo. Fusce commodo aliquam arcu. Suspendisse
                      enim turpis, dictum sed, iaculis a, condimentum nec, nisi.
                    </p>
                  </v-card-text>
                </v-card>
              </v-tab-item>
              <v-tab-item>
                <v-card flat>
                  <v-card-text>
                    <p>
                      Fusce a quam. Phasellus nec sem in justo pellentesque
                      facilisis. Nam eget dui. Proin viverra, ligula sit amet
                      ultrices semper, ligula arcu tristique sapien, a accumsan
                      nisi mauris ac eros. In dui magna, posuere eget,
                      vestibulum et, tempor auctor, justo.
                    </p>

                    <p class="mb-0">
                      Cras sagittis. Phasellus nec sem in justo pellentesque
                      facilisis. Proin sapien ipsum, porta a, auctor quis,
                      euismod ut, mi. Donec quam felis, ultricies nec,
                      pellentesque eu, pretium quis, sem. Nam at tortor in
                      tellus interdum sagittis.
                    </p>
                  </v-card-text>
                </v-card>
              </v-tab-item>
            </v-tabs>
          </v-card>
        </template></v-card-text
      >
    </v-card>
  </div>
</template> 
<script>
export default {
  data() {
    return {
      dialog: false,
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