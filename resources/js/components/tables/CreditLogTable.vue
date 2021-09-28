<template>
  <div class="p-4">
    <v-data-table
      :headers="headers"
      :items="creditLog"
      class="shadow-md border rounded-md"
      :search="search"
    >
      <template v-slot:top>
        <v-toolbar flat class="rounded-md mb-8">
          <v-toolbar-title>
            <v-icon class="pb-1" left> mdi-clipboard-list </v-icon>
            <span class="text-base"> Credit Log </span>
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
            class="shadow-md text-xs mt-8 z-50"
          ></v-md-date-range-picker>
        </v-toolbar>
      </template>

      <template v-slot:[`item.actions`]="{}">
        <v-switch v-model="switchAction" inset> </v-switch>
        <v-flex> </v-flex>
      </template>
    </v-data-table>
  </div>
</template>

<style>
.v-md-date-range-picker {
  font-size: 10px !important;
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
      switchAction: true,

      headers: [
        {
          text: "Amount",
          value: "amount",
          sortable: false,
          align: "start",
        },
        { text: "Transaction Date", value: "transaction_date" },
        { text: "Reference", value: "reference" },
        { text: "Comments", value: "comments" },
        { text: "Actions", value: "actions", sortable: false },
      ],

      creditLog: [],
    };
  },
};
</script>