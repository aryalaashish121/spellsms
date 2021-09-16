<template>
  <div data-aos="zoom-out" data-aos-duration="1000" class="p-5 md:px-3 md:py-2">
    <AddBlacklist ref="AddBlacklist"> </AddBlacklist>
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
      :items="blacklistContacts"
      class="shadow-md border rounded-md"
      :search="search"
      item-key="name"
      show-select
    >
      <template v-slot:top>
        <v-toolbar flat class="rounded-md">
          <v-toolbar-title>
            <v-icon class="pb-1" left> mdi-account-off </v-icon>
            <span class="text-base"> Manage Blacklist </span>
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

          <v-btn
            dark
            color="secondary"
            class="capitalize"
            v-on:click="AddBlacklist"
          >
            <v-icon left small> mdi-account-off </v-icon>
            Add New Blacklist
          </v-btn>
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
import AddBlacklist from "./Add";
export default {
  components: { AddBlacklist },
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
          text: "Blacklist",
          disabled: true,
        },
      ],

      headers: [
        {
          text: "Contact No.",
          align: "start",
          sortable: false,
          value: "contact_no",
        },
        { text: "Type", value: "type" },
        { text: "Actions", value: "actions", sortable: false },
      ],

      blacklistContacts: [
        {
          contact_no: "+977 9876543211",
          type: "Self",
        },
        {
          contact_no: "+977 9855543211",
          type: "Self",
        },
      ],
    };
  },

  methods: {
    AddBlacklist() {
      const self = this;
      self.$refs.AddBlacklist.create();
    },
  },
};
</script>