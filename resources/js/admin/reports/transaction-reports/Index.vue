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
      :items="scheduledSMS"
      class="shadow-md border rounded-md"
      :search="search"
      item-key="sent_time"
      show-select
    >
      <template v-slot:top>
        <v-toolbar flat class="rounded-md mb-8">
          <v-toolbar-title>
            <v-icon class="pb-1" left> mdi-handshake </v-icon>
            <span class="text-base"> Transaction Reports </span>
          </v-toolbar-title>
          <v-divider class="mx-4" inset vertical></v-divider>
          <v-text-field
            v-model="search"
            append-icon="mdi-magnify"
            label="Search"
            single-line
            hide-details
            class="text-sm"
          ></v-text-field>
          <v-spacer> </v-spacer>

          <v-md-date-range-picker
            max-year="2030"
            min-year="2010"
            show-year-select
            :show-custom-range-label="value"
            :opens="opens"
            class="shadow-md text-xs mt-8"
          ></v-md-date-range-picker>
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

<style>
.v-md-date-range-picker input {
  font-size: 12px !important;
}
</style>

<script>
import DateRangePicker from "vue2-daterange-picker";
import "vue2-daterange-picker/dist/vue2-daterange-picker.css";
export default {
  components: { DateRangePicker },
  data() {
    return {
      //Date range picker custom value
      value: true,
      opens: "right",

      search: "",
      selected: [],

      breadcrumbsItems: [
        {
          text: "Dashboard",
          disabled: false,
          href: "/",
        },
        {
          text: "Transaction Reports",
          disabled: true,
        },
      ],

      headers: [
        {
          text: "Transaction Type",
          align: "start",
          sortable: false,
          value: "transaction_type",
        },
        { text: "SMS Credit", value: "sms_credit" },
        { text: "Transaction Date", value: "transaction_date" },
        { text: "Description", value: "description" },
      ],

      scheduledSMS: [],
    };
  },
  created() {},
};
</script>