<template>
  <div data-aos="zoom-out" data-aos-duration="1000" class="p-5 md:px-3 md:py-2">
    <div>
      <v-breadcrumbs :items="breadcrumbsItems">
        <template v-slot:divider>
          <v-icon>mdi-chevron-right</v-icon>
        </template>
      </v-breadcrumbs>
    </div>
    <v-card elevation="3" rounded="lg">
      <v-card-title>
        <v-toolbar flat class="rounded-md">
          <v-toolbar-title>
            <v-icon class="pb-1" left> mdi-chart-box </v-icon>
            <span class="text-base"> Cumulative Report </span>
          </v-toolbar-title>
          <v-divider class="mx-4" inset vertical></v-divider>
          <v-row class="pt-6">
            <v-col cols="12" md="4">
              <v-menu
                ref="menu1"
                v-model="menu1"
                :close-on-content-click="false"
                :return-value.sync="startDate"
                transition="scale-transition"
                offset-y
                min-width="auto"
              >
                <template v-slot:activator="{ on, attrs }">
                  <v-text-field
                    v-model="startDate"
                    label="Start Date"
                    outlined
                    dense
                    class="mt-2"
                    prepend-inner-icon="mdi-calendar"
                    readonly
                    v-bind="attrs"
                    v-on="on"
                  ></v-text-field>
                </template>
                <v-date-picker v-model="startDate" no-title scrollable>
                  <v-spacer></v-spacer>
                  <v-btn text color="primary" @click="menu1 = false">
                    Cancel
                  </v-btn>
                  <v-btn
                    text
                    color="primary"
                    @click="$refs.menu1.save(startDate)"
                  >
                    OK
                  </v-btn>
                </v-date-picker>
              </v-menu>
            </v-col>
            <v-col cols="12" md="4">
              <v-menu
                ref="menu2"
                v-model="menu2"
                :close-on-content-click="false"
                :return-value.sync="endDate"
                transition="scale-transition"
                offset-y
                min-width="auto"
              >
                <template v-slot:activator="{ on, attrs }">
                  <v-text-field
                    v-model="endDate"
                    label="End Date"
                    outlined
                    dense
                    class="mt-2"
                    prepend-inner-icon="mdi-calendar"
                    readonly
                    v-bind="attrs"
                    v-on="on"
                  ></v-text-field>
                </template>
                <v-date-picker v-model="endDate" no-title scrollable>
                  <v-spacer></v-spacer>
                  <v-btn text color="primary" @click="menu2 = false">
                    Cancel
                  </v-btn>
                  <v-btn
                    text
                    color="primary"
                    @click="$refs.menu2.save(endDate)"
                  >
                    OK
                  </v-btn>
                </v-date-picker>
              </v-menu>
            </v-col>
          </v-row>
          <v-spacer></v-spacer>
          <v-btn small color="secondary" class="capitalize">
            <v-icon left color="ma-2"> mdi-download </v-icon> Download as Excel
          </v-btn>
        </v-toolbar>
      </v-card-title>
      <v-divider></v-divider>
      <!-- Main Table Container -->
      <div class="shadow-inner px-2 py-3 w-full">
        <!-- Top Most Header -->
        <div class="flex">
          <div class="w-2/12 h-10 border border-gray-400"></div>
          <div class="w-5/12 h-10 border text-center pt-2 border-gray-400">
            Delivered SMS
          </div>
          <div class="w-5/12 h-10 border text-center pt-2 border-gray-400">
            Failed SMS
          </div>
        </div>
        <!-- First Level Sub Header -->
        <div class="flex">
          <div class="w-2/12 h-10 flex">
            <div
              class="
                w-1/2
                h-10
                text-center
                pt-2
                border border-t-0 border-r-0 border-gray-400
              "
            >
              #
            </div>
            <div
              class="
                w-1/2
                h-10
                text-center
                pt-2
                border border-t-0 border-gray-400
              "
            >
              Date
            </div>
          </div>
          <div class="w-5/12 h-10 flex">
            <div
              class="
                w-1/2
                h-10
                text-center
                pt-2
                border border-t-0 border-r-0 border-gray-400
              "
            >
              API
            </div>
            <div
              class="
                w-1/2
                h-10
                text-center
                pt-2
                border border-t-0 border-gray-400
              "
            >
              Panel
            </div>
          </div>
          <div class="w-5/12 h-10 flex">
            <div
              class="
                w-1/2
                h-10
                text-center
                pt-2
                border border-t-0 border-r-0 border-gray-400
              "
            >
              API
            </div>
            <div
              class="
                w-1/2
                h-10
                text-center
                pt-2
                border border-t-0 border-gray-400
              "
            >
              Panel
            </div>
          </div>
        </div>
        <!-- Second Level Sub Header -->
        <div class="flex">
          <div
            class="w-2/12 h-10 border border-t-0 border-r-0 border-gray-400"
          ></div>
          <div class="w-5/12 h-10 flex">
            <div class="w-1/2 h-10 border border-t-0 border-gray-400 flex">
              <div
                class="
                  w-1/2
                  h-10
                  text-center
                  font-light
                  pt-2
                  border border-t-0 border-r-0 border-gray-400
                "
              >
                Mobile Count
              </div>
              <div
                class="
                  w-1/2
                  h-10
                  text-center
                  pt-2
                  border border-t-0 border-r-0 border-gray-400
                  font-light
                "
              >
                Total Messages
              </div>
            </div>
            <div class="w-1/2 h-10 flex">
              <div
                class="
                  w-1/2
                  h-10
                  text-center
                  pt-2
                  border border-t-0 border-r-0 border-gray-400
                  font-light
                "
              >
                Mobile Count
              </div>
              <div
                class="
                  w-1/2
                  h-10
                  text-center
                  pt-2
                  border border-t-0 border-r-0 border-gray-400
                  font-light
                "
              >
                Total Messages
              </div>
            </div>
          </div>
          <div class="w-5/12 h-10 flex">
            <div class="w-1/2 h-10 border border-t-0 border-gray-400 flex">
              <div
                class="
                  w-1/2
                  h-10
                  text-center
                  font-light
                  pt-2
                  border border-t-0 border-r-0 border-gray-400
                "
              >
                Mobile Count
              </div>
              <div
                class="
                  w-1/2
                  h-10
                  text-center
                  pt-2
                  border border-t-0 border-r-0 border-gray-400
                  font-light
                "
              >
                Total Messages
              </div>
            </div>
            <div class="w-1/2 h-10 flex">
              <div
                class="
                  w-1/2
                  h-10
                  text-center
                  pt-2
                  border border-t-0 border-r-0 border-gray-400
                  font-light
                "
              >
                Mobile Count
              </div>
              <div
                class="
                  w-1/2
                  h-10
                  text-center
                  pt-2
                  border border-t-0 border-gray-400
                  font-light
                "
              >
                Total Messages
              </div>
            </div>
          </div>
        </div>

        <!-- Table Content -->
        <div
          class="
            border border-t-0 border-gray-400
            w-full
            h-10
            pt-2
            text-center text-sm
            font-normal
            italic
          "
        >
          No records available
        </div>
      </div>
    </v-card>
  </div>
</template>


<script>
export default {
  data() {
    return {
      selected: [],
      menu1: false,
      menu2: false,

      startDate: new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
        .toISOString()
        .substr(0, 10),

      endDate: new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
        .toISOString()
        .substr(0, 10),

      breadcrumbsItems: [
        {
          text: "Dashboard",
          disabled: false,
          href: "/",
        },
        {
          text: "Cumulative Report",
          disabled: true,
        },
      ],

      dateRangeList: ["All", "Today", "Yesterday", "Day before Yesterday"],
      deliveryTypeList: ["All", "With F-SMSID", "Without F-SMSID"],

      headers: [
        {
          text: "Mobile",
          align: "start",
          sortable: false,
          value: "mobile",
        },
        { text: "Sent Date & Time", value: "sent_date_time" },
        { text: "Delivery Date & Time", value: "delivery_date_time" },
        { text: "Sender ID", value: "sender_id" },
        { text: "SMS Text", value: "sms_text" },
        { text: "SMS Type", value: "sms_type" },
        { text: "Msg ID", value: "msg_id" },
        { text: "Status", value: "status" },
        { text: "Explanation", value: "explanation" },
      ],

      deliveryReports: [],
    };
  },
  created() {},
};
</script>