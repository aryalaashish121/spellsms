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
      :items="campaignReports"
      class="shadow-md border rounded-md"
      :search="search"
      item-key="sent_time"
      show-select
    >
      <template v-slot:top>
        <v-toolbar flat class="rounded-md mb-10">
          <v-toolbar-title>
            <v-icon class="pb-1" left> mdi-sign-text </v-icon>
            <span class="text-base"> Campaign Reports </span>
          </v-toolbar-title>
          <v-divider class="mx-4" inset vertical></v-divider>
          <v-flex class="mt-10 ml-24">
            <v-md-date-range-picker class="caption"></v-md-date-range-picker>
          </v-flex>
        </v-toolbar>
      </template>

      <template v-slot:[`item.actions`]="{}">
        <v-flex>
          <v-btn class="ma-1" outlined x-small fab color="indigo">
            <v-icon>mdi-pencil</v-icon>
          </v-btn>
          <v-btn class="ma-1" outlined x-small fab color="error">
            <v-icon>mdi-delete</v-icon>
          </v-btn>
        </v-flex>
      </template>
    </v-data-table>
  </div>
</template>


<script>
import DateRangePicker from "vue2-daterange-picker";
import "vue2-daterange-picker/dist/vue2-daterange-picker.css";
export default {
  components: { DateRangePicker },
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
          text: "Campaign Reports",
          disabled: true,
        },
      ],

      headers: [
        {
          text: "S.No",
          align: "start",
          sortable: false,
          value: "sn",
        },
        { text: "Sent Time", value: "sent_time" },
        { text: "SMS Route", value: "route" },
        { text: "SMS text", value: "sms_text" },
        { text: "No. of SMS", value: "no_of_sms" },
        { text: "Charges", value: "charges" },
        { text: "Actions", value: "actions", sortable: false },
      ],

      campaignReports: [],
    };
  },
  created() {},
};
</script>