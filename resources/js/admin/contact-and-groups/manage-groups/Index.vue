<template>
  <div data-aos="zoom-out" data-aos-duration="1000" class="p-5 md:px-3 md:py-2">
    <AddNewGroup ref="AddNewGroup"> </AddNewGroup>
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
      :items="contacts"
      class="shadow-md border rounded-md"
      :search="search"
      item-key="group_name"
      show-select
    >
      <template v-slot:top>
        <v-toolbar flat class="rounded-md">
          <v-toolbar-title>
            <v-icon class="pb-1" left> mdi-account-group </v-icon>
            <span class="text-base"> Contact Groups </span>
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
            color="primary"
            small
            class="capitalize"
            v-on:click="addNewGroup"
          >
            <v-icon left small> mdi-plus </v-icon>
            Add New Group
          </v-btn>
        </v-toolbar>
      </template>

      <template v-slot:[`item.actions`]="{}">
        <v-flex>
          <v-btn class="ma-1" outlined x-small fab color="indigo">
            <v-icon>mdi-eye</v-icon>
          </v-btn>
          <v-btn class="ma-1" outlined x-small fab color="green">
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
import AddNewGroup from "./Add";
export default {
  components: { AddNewGroup },
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
          text: "Manage Groups",
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
        { text: "Group Name", value: "group_name" },
        { text: "Total Contacts", value: "total_contacts" },
        { text: "Actions", value: "actions", sortable: false },
      ],

      contacts: [
        {
          sn: "1",
          group_name: "Influencers",
          total_contacts: "10",
        },
        {
          sn: "2",
          group_name: "Managers",
          total_contacts: "5",
        },
      ],
    };
  },

  methods: {
    addNewGroup() {
      const self = this;
      self.$refs.AddNewGroup.create();
    },

    uploadFile() {
      const self = this;
      self.$refs.UploadFile.upload();
    },
  },
};
</script>