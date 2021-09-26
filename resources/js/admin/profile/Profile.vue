<template>
  <div class="px-5 pt-2">
    <div>
      <v-breadcrumbs :items="breadcrumbsItems">
        <template v-slot:divider>
          <v-icon>mdi-chevron-right</v-icon>
        </template>
      </v-breadcrumbs>
    </div>
    <div class="w-full h-auto" data-aos="zoom-out" data-aos-duration="1000">
      <div class="grid gap-5 grid-cols-12">
        <div
          class="
            col-span-12
            md:col-span-4
            h-96
            rounded-xl
            shadow-md
            flex
            justify-center
            pt-10
            bg-gradient-to-br
            from-blue-100
            to-blue-300
          "
        >
          <div class="flex-col">
            <div
              class="
                flex
                justify-center
                rounded-full
                shadow-lg
                border-4
                bg-gray-300
                p-0.5
                border-gray-50
                w-40
                h-40
                overflow-hidden
              "
            >
              <lottie-player
                src="https://assets1.lottiefiles.com/packages/lf20_8yuT3F.json"
                background="transparent"
                speed="1"
                style="width: 150px; height: 150px"
                loop
                autoplay
              ></lottie-player>
            </div>

            <div class="mt-5">
              <h5
                class="
                  drop-shadow-xl
                  text-xl
                  font-semibold
                  text-gray-700 text-center
                "
              >
                Aashish Aryal
              </h5>
            </div>
            <div class="mt-5">
              <h6 class="drop-shadow-xl text-center text-gray-700 text-sm flex">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-5 w-5 mr-1"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                  />
                </svg>
                <a
                  href="mailto:aashish121@gmail.com"
                  class="cursor-pointer"
                  style="text-decoration: none; color: #374151"
                >
                  aashish121@gmail.com
                </a>
              </h6>
              <h6
                class="
                  drop-shadow-xl
                  text-center text-gray-700 text-sm
                  flex
                  mt-2
                "
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-5 w-5 mr-1"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                  />
                </svg>
                +977 9861508762
              </h6>
            </div>

            <div
              class="mt-8 flex justify-center items-center divide-x-2 space-x-3"
            >
              <div>
                <i class="fab fa-facebook-f fa-lg text-white"></i>
              </div>
              <div class="pl-3">
                <i class="fab fa-linkedin-in fa-lg text-white"></i>
              </div>
              <div class="pl-3">
                <i class="fab fa-twitter fa-lg text-white"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-span-12 md:col-span-8 h-auto">
          <div class="flex flex-wrap">
            <div class="w-full">
              <ul
                class="
                  flex
                  mb-0
                  list-none
                  flex-wrap
                  pt-1
                  pb-4
                  flex-row
                  w-full
                  lg:w-1/2
                "
              >
                <li class="-mb-px mr-2 last:mr-0 flex-auto text-center -ml-5">
                  <a
                    class="px-5 py-3 shadow rounded block leading-normal"
                    style="text-decoration: none"
                    v-on:click="toggleTabs(1)"
                    v-bind:class="{
                      'bg-white': openTab !== 1,
                      'bg-blue-100 shadow-lg': openTab === 1,
                    }"
                  >
                    <i class="far fa-address-card fa-lg mr-1"></i>
                    <span class="text-base"> Profile</span>
                  </a>
                </li>
                <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                  <a
                    class="px-5 py-3 shadow rounded block leading-normal"
                    v-on:click="toggleTabs(2)"
                    v-bind:class="{
                      'bg-white': openTab !== 2,
                      'bg-blue-100 shadow-lg': openTab === 2,
                    }"
                  >
                    <i class="fas fa-lock text-base mr-1"></i>
                    <span class="text-base"> Password</span>
                  </a>
                </li>
              </ul>
              <div
                class="
                  relative
                  flex flex-col
                  min-w-0
                  break-words
                  bg-white
                  w-full
                  mb-6
                  shadow-lg
                  rounded
                "
              >
                <div class="px-4 py-5 flex-auto border rounded-lg">
                  <div class="tab-content tab-space rounded-lg">
                    <div
                      v-bind:class="{
                        hidden: openTab !== 1,
                        block: openTab === 1,
                      }"
                    >
                      <div class="w-3/4 lg:w-2/4 flex-col rounded-lg">
                        <v-text-field
                          outlined
                          dense
                          rounded
                          label="Full Name"
                          prepend-inner-icon="mdi-account-circle"
                        >
                        </v-text-field>

                        <v-text-field
                          outlined
                          dense
                          rounded
                          label="Email"
                          prepend-inner-icon="mdi-email"
                        >
                        </v-text-field>

                        <v-text-field
                          outlined
                          dense
                          rounded
                          label="Phone Number"
                          prepend-inner-icon="mdi-phone"
                        >
                        </v-text-field>

                        <v-text-field
                          outlined
                          dense
                          rounded
                          label="Facebook"
                          prepend-inner-icon="mdi-facebook"
                        >
                        </v-text-field>

                        <v-text-field
                          outlined
                          dense
                          rounded
                          label="Linkedin"
                          prepend-inner-icon="mdi-linkedin"
                        >
                        </v-text-field>

                        <v-text-field
                          outlined
                          dense
                          rounded
                          label="Twitter"
                          prepend-inner-icon="mdi-twitter"
                        >
                        </v-text-field>

                        <v-btn rounded dark color="green">
                          <v-icon left> mdi-account-cog </v-icon>
                          Update
                        </v-btn>
                      </div>
                    </div>
                    <div
                      v-bind:class="{
                        hidden: openTab !== 2,
                        block: openTab === 2,
                      }"
                    >
                      <div class="flex w-full pt-5">
                        <div class="w-1/2 h-auto pr-9">
                          <v-text-field
                            rounded
                            dense
                            outlined
                            v-model="currentPassword"
                            :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                            :type="show1 ? 'text' : 'password'"
                            name="input-10-1"
                            label="Current Passsword"
                            counter
                            @click:append="show1 = !show1"
                          ></v-text-field>

                          <v-text-field
                            rounded
                            outlined
                            dense
                            v-model="newPassword"
                            :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
                            :type="show2 ? 'text' : 'password'"
                            name="input-10-1"
                            label="New Passsword"
                            hint="At least 8 characters"
                            counter
                            @click:append="show2 = !show2"
                          ></v-text-field>

                          <v-text-field
                            rounded
                            outlined
                            dense
                            v-model="confirmPassword"
                            :append-icon="show3 ? 'mdi-eye' : 'mdi-eye-off'"
                            :type="show3 ? 'text' : 'password'"
                            name="input-10-1"
                            label="Confirm Passsword"
                            hint="At least 8 characters"
                            counter
                            @click:append="show3 = !show3"
                          ></v-text-field>
                        </div>
                        <div class="w-1/2 h-auto">
                          <v-alert
                            colored-border
                            type="error"
                            border="left"
                            outlined
                          >
                           <p class=" text-xs font-normal">
                              Passwords <b>must :</b>
                            <ul>
                              <li>
                                * contain a minimum of 8 characters in length
                              </li>
                              <li>
                                * contain one of each :
                                <ul>
                                  <li>i. Uppercase letter (A-Z)</li>
                                  <li>ii. Lowercase letter (a-z)</li>
                                  <li>iii. Digit (0-9)</li>
                                  <li>iv. Special characters</li>
                                </ul>
                              </li>
                            </ul>
                           </p>
                          </v-alert>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      openTab: 1,
      currentPassword: "",
      newPassword: "",
      confirmPassword: "",

      show1: false,
      show2: false,
      show3: false,

      breadcrumbsItems: [
        {
          text: "Dashboard",
          disabled: false,
          href: "/",
        },
        {
          text: "Profile",
          disabled: true,
        },
      ],
    };
  },

  methods: {
    toggleTabs: function (tabNumber) {
      this.openTab = tabNumber;
    },
  },
};
</script>