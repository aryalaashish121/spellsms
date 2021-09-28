
<template>
  <v-card flat>
    <v-card-text>
      <div class="flex flex-wrap">
        <div class="w-full">
          <ul
            class="
              flex
              w-full
              lg:w-1/2
              mb-0
              list-none
              flex-wrap
              pt-3
              pb-4
              flex-row
            "
          >
            <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
              <a
                class="
                  text-xs
                  font-bold
                  uppercase
                  px-5
                  py-3
                  shadow
                  rounded
                  block
                  leading-normal
                "
                v-on:click="toggleTabs(1)"
                v-bind:class="{
                  'bg-white': openTab !== 1,
                  'bg-blue-100': openTab === 1,
                }"
              >
                Credit
              </a>
            </li>
            <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
              <a
                class="
                  text-xs
                  font-bold
                  uppercase
                  px-5
                  py-3
                  shadow
                  rounded
                  block
                  leading-normal
                "
                v-on:click="toggleTabs(2)"
                v-bind:class="{
                  ' bg-white': openTab !== 2,
                  'bg-blue-100': openTab === 2,
                }"
              >
                Debit
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
              rounded
            "
          >
            <div class="flex-auto">
              <div class="tab-content tab-space">
                <div
                  v-bind:class="{ hidden: openTab !== 1, block: openTab === 1 }"
                >
                  <v-card flat>
                    <v-card-text>
                      <v-row>
                        <v-col cols="12" sm="12" md="12" lg="8">
                          <v-card shaped>
                            <v-card-text>
                              <v-row>
                                <v-col cols="12" sm="12" md="6">
                                  <v-menu
                                    v-model="menu"
                                    :close-on-content-click="false"
                                    :nudge-right="40"
                                    transition="scale-transition"
                                    offset-y
                                    min-width="auto"
                                  >
                                    <template v-slot:activator="{ on, attrs }">
                                      <v-text-field
                                        outlined
                                        dense
                                        class="caption"
                                        v-model="date"
                                        label="Select Validity"
                                        prepend-inner-icon="mdi-calendar"
                                        readonly
                                        v-bind="attrs"
                                        v-on="on"
                                      ></v-text-field>
                                    </template>
                                    <v-date-picker
                                      v-model="date"
                                      @input="menu = false"
                                    ></v-date-picker>
                                  </v-menu>
                                </v-col>

                                <v-col cols="12" sm="12" md="6">
                                  <v-select
                                    prepend-inner-icon="mdi-routes"
                                    label="Select Route"
                                    :items="routes"
                                    outlined
                                    class="caption"
                                    dense
                                  >
                                  </v-select>
                                </v-col>

                                <v-col cols="12" sm="12" md="6">
                                  <v-text-field
                                    label="Allote Credits"
                                    placeholder="Enter credits to allote"
                                    prepend-inner-icon="mdi-email"
                                    suffix="SMS"
                                    outlined
                                    type="number"
                                    class="caption"
                                    dense
                                  >
                                  </v-text-field>
                                </v-col>
                              </v-row>

                              <v-divider class="mb-3"></v-divider>
                              <div
                                class="
                                  border
                                  rounded-md
                                  space-y-3
                                  lg:space-x-3
                                  lg:flex
                                  w-full
                                  px-2
                                  py-2
                                "
                              >
                                <div class="container">
                                  <form class="form cf">
                                    <section class="plan cf">
                                      <h2 class="font-semibold">
                                        Purpose of Recharge :
                                      </h2>
                                      <input
                                        type="radio"
                                        name="radio1"
                                        id="new"
                                        value="new"
                                        checked
                                      /><label class="four col" for="new"
                                        >New</label
                                      >
                                      <input
                                        type="radio"
                                        name="radio1"
                                        id="demo"
                                        value="demo"
                                      /><label class="four col" for="demo"
                                        >Demo</label
                                      >
                                      <input
                                        type="radio"
                                        name="radio1"
                                        id="refund"
                                        value="refund"
                                      /><label class="four col" for="refund"
                                        >Refund</label
                                      >
                                    </section>

                                    <section class="payment-status cf mt-3">
                                      <h2 class="font-semibold">
                                        Payment Status :
                                      </h2>
                                      <input
                                        type="radio"
                                        name="radio2"
                                        id="paid"
                                        value="paid"
                                      /><label
                                        class="paid-label four col"
                                        for="paid"
                                        >Paid</label
                                      >
                                      <input
                                        type="radio"
                                        name="radio2"
                                        id="pending"
                                        value="pending"
                                        checked
                                      /><label
                                        class="pending-label four col"
                                        for="pending"
                                        >Pending</label
                                      >
                                    </section>
                                  </form>
                                </div>
                              </div>
                            </v-card-text>
                          </v-card>

                          <div
                            class="
                              rounded
                              w-full
                              px-7
                              py-2
                              h-20
                              mt-5
                              flex
                              items-center
                              justify-between
                              border
                            "
                          >
                            <div>
                              <h1>
                                <v-icon color="mr-1">mdi-email</v-icon>
                                SMS Credits : 1000
                              </h1>
                            </div>
                            <div>
                              <h1>
                                <v-icon color="mr-1">mdi-cash-multiple</v-icon>
                                Final Price : Rs.14,160
                              </h1>
                            </div>
                          </div>
                        </v-col>

                        <v-col cols="12" sm="12" md="12" lg="4">
                          <div class="w-full space-y-3">
                            <div
                              class="
                                bg-gradient-to-br
                                from-blue-600
                                to-blue-400
                                h-28
                                rounded-lg
                                shadow
                                transition
                                duration-500
                                ease-in-out
                                hover:shadow-xl
                                cursor-pointer
                              "
                            >
                              <div class="flex justify-between p-5">
                                <div class="text-white">
                                  <h5 class="font-light text-base">
                                    Purchase Price
                                  </h5>
                                  <div
                                    class="w-10/12 mt-4 overflow-hidden h-10"
                                  >
                                    <v-text-field
                                      dense
                                      solo
                                      class="caption"
                                      outlined
                                      type="number"
                                      suffix="Per SMS"
                                    ></v-text-field>
                                  </div>
                                </div>
                                <div class="mt-4">
                                  <v-icon
                                    size="50"
                                    color="#FFFFFF"
                                    class="opacity-70"
                                  >
                                    mdi-account-cash-outline
                                  </v-icon>
                                </div>
                              </div>
                            </div>

                            <div
                              class="
                                bg-gradient-to-br
                                from-yellow-500
                                to-yellow-300
                                h-28
                                rounded-lg
                                shadow-md
                                transition
                                duration-500
                                ease-in-out
                                hover:shadow-xl
                                cursor-pointer
                              "
                            >
                              <div class="flex justify-between p-5">
                                <div class="text-white">
                                  <h5 class="font-light text-base">
                                    Sales Price
                                  </h5>
                                  <div
                                    class="w-10/12 mt-4 overflow-hidden h-10"
                                  >
                                    <v-text-field
                                      dense
                                      solo
                                      class="caption"
                                      outlined
                                      type="number"
                                      suffix="Per SMS"
                                    ></v-text-field>
                                  </div>
                                </div>
                                <div class="mt-4">
                                  <v-icon
                                    size="50"
                                    color="#FFFFFF"
                                    class="opacity-80"
                                  >
                                    mdi-cash-register
                                  </v-icon>
                                </div>
                              </div>
                            </div>

                            <div
                              class="
                                bg-gradient-to-br
                                from-red-500
                                to-red-300
                                h-28
                                rounded-lg
                                shadow
                                transition
                                duration-500
                                ease-in-out
                                hover:shadow-xl
                                cursor-pointer
                              "
                            >
                              <div class="flex justify-between p-5">
                                <div class="text-white">
                                  <h5 class="font-light text-base">Tax</h5>
                                  <div
                                    class="w-10/12 mt-4 overflow-hidden h-10"
                                  >
                                    <v-text-field
                                      dense
                                      class="caption"
                                      solo
                                      outlined
                                      type="number"
                                      suffix="%"
                                    ></v-text-field>
                                  </div>
                                </div>
                                <div class="mt-4">
                                  <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-14 w-14 text-white opacity-70"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                  >
                                    <path
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z"
                                    />
                                  </svg>
                                </div>
                              </div>
                            </div>

                            <v-textarea
                              outlined
                              class="mt-4 pt-2 px-2 rounded caption"
                              solo
                              placeholder="Remarks"
                              rows="4"
                            >
                            </v-textarea>
                          </div>
                        </v-col>
                      </v-row>
                    </v-card-text>
                    <v-divider></v-divider>

                    <v-card-actions class="justify-end mt-3">
                      <v-btn color="primary" dark class="rounded-md">
                        <v-icon left> mdi-content-save </v-icon> Save
                      </v-btn>

                      <v-btn color="red" dark class="rounded-md">
                        Cancel <v-icon right> mdi-close-circle-outline </v-icon>
                      </v-btn>
                    </v-card-actions>
                  </v-card>
                </div>
                <div
                  v-bind:class="{ hidden: openTab !== 2, block: openTab === 2 }"
                >
                  <v-card shaped outlined flat class="w-full lg:w-3/4 pb-5">
                    <v-card-text>
                      <div class="lg:flex lg:space-x-5 space-y-3 lg:space-y-0">
                        <div class="w-full lg:1/2">
                          <div
                            class="
                              w-full
                              shadow
                              bg-gradient-to-r
                              from-blue-400
                              to-blue-200
                              h-28
                              rounded-lg
                              transition
                              duration-500
                              ease-in-out
                              cursor-pointer
                            "
                          >
                            <div class="flex justify-between p-5">
                              <div class="text-white">
                                <h5 class="font-light text-base">
                                  Deduct Credits
                                </h5>
                                <div class="w-10/12 mt-4 overflow-hidden h-10">
                                  <v-text-field
                                    dense
                                    solo
                                    class="caption"
                                    outlined
                                    type="number"
                                    suffix="SMS"
                                  ></v-text-field>
                                </div>
                              </div>
                              <div class="mt-4">
                                <v-icon
                                  size="50"
                                  dark
                                  color="black"
                                  class="opacity-50"
                                >
                                  mdi-cash-minus
                                </v-icon>
                              </div>
                            </div>
                          </div>

                          <div
                            class="
                              w-full
                              bg-gradient-to-r
                              from-green-400
                              to-green-200
                              shadow
                              mt-4
                              h-28
                              rounded-lg
                              transition
                              duration-500
                              ease-in-out
                              cursor-pointer
                            "
                          >
                            <div class="flex justify-between p-5">
                              <div class="text-white">
                                <h5 class="font-light text-base">Route</h5>
                                <div class="w-10/12 mt-4 overflow-hidden h-10">
                                  <v-select
                                    label="Route"
                                    prepend-inner-icon="mdi-routes"
                                    :items="routes"
                                    dense
                                    solo
                                    class="caption"
                                    outlined
                                  ></v-select>
                                </div>
                              </div>
                              <div class="mt-4">
                                <v-icon
                                  size="50"
                                  dark
                                  color="black"
                                  class="opacity-50"
                                >
                                  mdi-routes
                                </v-icon>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="w-full lg:1/2">
                          <v-textarea
                            rows="8"
                            outlined
                            class="caption"
                            placeholder="Maximum 500 chars only"
                            label="Remarks"
                            counter="500"
                          >
                          </v-textarea>
                        </div>
                      </div>
                    </v-card-text>
                    <v-divider></v-divider>

                    <v-card-actions class="justify-end mt-3">
                      <v-btn color="primary" dark class="rounded-md">
                        <v-icon left> mdi-content-save </v-icon> Save
                      </v-btn>

                      <v-btn color="red" dark class="rounded-md">
                        Cancel <v-icon right> mdi-close-circle-outline </v-icon>
                      </v-btn>
                    </v-card-actions>
                  </v-card>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </v-card-text>
  </v-card>
</template>

 <style scoped>
/* CONTAINERS */

.four {
  width: 32.26%;
  max-width: 32.26%;
}

/* COLUMNS */

.col {
  display: block;
  float: left;
  margin: 1% 0 1% 1.6%;
}

.col:first-of-type {
  margin-left: 0;
}

/* CLEARFIX */

.cf:before,
.cf:after {
  content: " ";
  display: table;
}

.cf:after {
  clear: both;
}

.cf {
  *zoom: 1;
}

/* FORM */

.form .plan input,
.form .payment-status input {
  display: none;
}

.form label {
  position: relative;
  color: rgb(148, 148, 148);
  background-color: #cfd8dc;
  font-size: 16px;
  text-align: center;
  height: 50px;
  border-radius: 30px;
  line-height: 20px;
  display: block;
  cursor: pointer;
  border: 2px solid transparent;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

.form .plan input:checked + label,
.form .payment-status input:checked + label {
  background-image: linear-gradient(to bottom right, #01579b, #039be5);
  color: #ffff;
}

.form .plan input:checked + label:after,
form .payment-status input:checked + label::after {
  content: "\2713";
  width: 25px;
  height: 25px;
  line-height: 25px;
  border-radius: 100%;
  background-color: #8bc34a;
  color: #ffff;
  position: absolute;
  top: -10px;
  right: -5px;
}
</style>
<script>
export default {
  name: "indigo-tabs",
  data() {
    return {
      openTab: 1,
      menu: false,
      date: new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
        .toISOString()
        .substr(0, 10),

      validity: ["1 Month", "2 months", "3 Months"],
      routes: ["SMSBIT:100", "SMSBIT:200"],
    };
  },

  methods: {
    toggleTabs: function (tabNumber) {
      this.openTab = tabNumber;
    },
  },
};
</script>