<template>
  <div data-aos="zoom-out" data-aos-duration="1000" class="p-5 md:px-3 md:py-2">
    <AddSender ref="AddSender"> </AddSender>
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
      :items="campaigns"
      class="shadow-md border rounded-md"
      :search="search"
      item-key="sender_id"
      show-select
    >
      <template v-slot:top>
        <v-toolbar flat class="rounded-md">
          <v-toolbar-title>
            <v-icon class="pb-1" left> mdi-card-account-details </v-icon>
            <span class="text-base"> Sender ID </span>
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
          <v-spacer></v-spacer>

          <v-btn dark color="primary" class="capitalize" v-on:click="AddSender">
            <v-icon left small> mdi-card-account-details </v-icon>
            Add New Sender ID
          </v-btn>
        </v-toolbar>
      </template>

      <template v-slot:[`item.default`]="{ item }">
        <v-icon size="20" color="primary" v-if="item.default == 'default'">
          mdi-check-circle-outline
        </v-icon>

        <v-icon v-else color="error" size="20">
          mdi-close-circle-outline
        </v-icon>
      </template>

      <template v-slot:[`item.status`]="{ item }">
        <v-chip
          class="ma-2"
          color="indigo"
          text-color="white"
          v-if="item.status == 'approved'"
        >
          <v-avatar left>
            <v-icon>mdi-account-check</v-icon>
          </v-avatar>
          Approved
        </v-chip>

        <v-chip class="ma-2" color="orange" text-color="white" v-else>
          <v-avatar left>
            <v-icon>mdi-account-clock</v-icon>
          </v-avatar>
          Pending
        </v-chip>
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
@import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap");
th {
  font-size: 15px !important;
  font-weight: 900 !important;
  background-color: #b2ebf2 !important;
  font-family: "Montserrat", sans-serif !important;
  color: black !important;
}
</style>

<script>
import AddSender from "./Add";
export default {
  components: { AddSender },
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
          text: "Sender ID",
          disabled: true,
        },
      ],

      headers: [
        {
          text: "Sender ID",
          align: "start",
          sortable: false,
          value: "sender_id",
        },
        { text: "Company", value: "company" },
        { text: "Sender ID Details", value: "details" },
        { text: "Sample Message", value: "sample_message" },
        { text: "Route", value: "route" },
        { text: "Requested on", value: "requested_on" },
        { text: "Default", value: "default" },
        { text: "Status", value: "status" },
        { text: "Actions", value: "actions", sortable: false },
      ],

      campaigns: [
        {
          sender_id: "SMSBit",
          company: "Spell Innovation",
          details: "Lorem ipsum dolor sit amet, consectetur adipiscing elit",
          route: "SMSBIT - ID:116",
          sample_message: "Hello, your order has been successfully placed.",
          requested_on: "Wed, 15th Sep 2021 12:00 PM",
          default: "default",
          status: "approved",
        },
        {
          sender_id: "ACCSit",
          company: "Spell Innovation",
          details: "Lorem ipsum dolor sit amet",
          route: "SMSBIT - ID:116",
          sample_message: "Hello, ringtone set succesfully",
          requested_on: "Wed, 15th Sep 2021 2:00 PM",
          default: "not_default",
          status: "pending",
        },
      ],
    };
  },

  methods: {
    AddSender() {
      const self = this;
      self.$refs.AddSender.create();
    },
  },
};
</script>