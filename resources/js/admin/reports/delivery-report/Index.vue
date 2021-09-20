<template>
  <div data-aos="zoom-out" data-aos-duration="1000" class="p-5 md:px-3 md:py-2">
    <div>
      <v-breadcrumbs :items="breadcrumbsItems">
        <template v-slot:divider>
          <v-icon>mdi-chevron-right</v-icon>
        </template>
      </v-breadcrumbs>
    </div>
    <v-data-table
      v-model="selected"
      :headers="headers"
      :items="deliveryReports"
      class="shadow-md border rounded-md"
      :search="search"
      item-key="mobile"
      show-select
    >
      <template v-slot:top>
        <v-toolbar flat class="rounded-md">
          <v-toolbar-title>
            <v-icon class="pb-1" left> mdi-truck </v-icon>
            <span class="text-base"> Delivery Reports </span>
          </v-toolbar-title>
          <v-divider class="mx-4" inset vertical></v-divider>
          <v-row class="pt-6">
            <v-col cols="12" md="4">
              <v-select
                outlined
                dense
                :items="dateRangeList"
                prepend-inner-icon="mdi-calendar"
                placeholder="Date Range"
              >
              </v-select>
            </v-col>
            <v-col cols="12" md="4">
              <v-select
                outlined
                dense
                :items="deliveryTypeList"
                prepend-inner-icon="mdi-truck"
                placeholder="Delivery Type"
              >
              </v-select>
            </v-col>
          </v-row>

          <v-text-field
            v-model="search"
            append-icon="mdi-magnify"
            label="Search"
            single-line
            hide-details
            class="text-sm"
          ></v-text-field>
          <v-spacer></v-spacer>
          <v-btn small color="secondary" class="capitalize">
            <v-icon left color="ma-2"> mdi-download </v-icon> Download as Excel
          </v-btn>
        </v-toolbar>
      </template>
    </v-data-table>
  </div>
</template>


<script>
export default {
  data() {
    return {
      search: "",
      selected: [],

      breadcrumbsItems: [
        {
          text: "Dashboard",
          disabled: false,
          href: "/",
        },
        {
          text: "Delivery Reports",
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