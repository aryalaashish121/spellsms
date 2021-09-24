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

      <template v-slot:[`item.actions`]="{item}">
        <v-flex>
          <v-btn class="ma-1" outlined x-small fab color="error" @click="deleteData(item.id)">
            <v-icon>mdi-delete</v-icon>
          </v-btn>
        </v-flex>
      </template>
    </v-data-table>
  </div>
</template>

<script>
import AddBlacklist from "./Add";
export default {
  components: { AddBlacklist },
  data() {
    return {
      search: "",
      selected: [],
      blacklistContacts: [],

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
          value: "mobile",
        },
        { text: "Contact name", value: "name" },
        { text: "Actions", value: "actions", sortable: false },
      ],

    };
  },

  mounted(){
    const self = this;
    self.loadBlackListData();
  },

  methods: {
    AddBlacklist() {
      const self = this;
      self.$refs.AddBlacklist.create();
    },

    async loadBlackListData(){
      const self = this;
      self.url = "/get-blacklist-contacts";
      let response = await self.getAll();
      self.blacklistContacts = response.data;
    },
    deleteData(id){
      const self = this;
      self.url = "/delete-blacklist-contact";
      let response = self.delete(id);
      self.loadBlackListData();
    }
  },
};
</script>