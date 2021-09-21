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
      :loading="loading"
      :items="contact_groups"
      class="shadow-md border rounded-md"
      :search="search"
      item-key="name"
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

      <template v-slot:[`item.total_contacts`]="{ item }">
        <v-chip v-if="item.total_contacts == null" color="red" dark> 0 </v-chip>

        <v-chip v-else color="primary" dark>
          {{ item.total_contacts }}
        </v-chip>
      </template>

      <template v-slot:[`item.actions`]="{ item }">
        <v-flex>
          <v-btn class="ma-1" outlined x-small fab color="indigo">
            <v-icon>mdi-eye</v-icon>
          </v-btn>
          <v-btn class="ma-1" outlined x-small fab color="green">
            <v-icon>mdi-pencil</v-icon>
          </v-btn>
          <v-btn
            class="ma-1"
            outlined
            x-small
            fab
            color="error"
            @click="deleteContactGroup(item.id)"
          >
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
      contact_groups: [],
      loading: true,

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
          text: "Group Name",
          align: "start",
          sortable: true,
          value: "name",
        },
        { text: "Total Contacts", value: "total_contacts" },
        { text: "Actions", value: "actions", sortable: false },
      ],
    };
  },

  mounted() {
    const self = this;
    self.getAllContactGroups();
    self.$eventBus.$on("contact_groups_data", (data) => {
      self.getAllContactGroups();
    });
  },

  methods: {
    addNewGroup() {
      const self = this;
      self.$refs.AddNewGroup.create();
    },

    async getAllContactGroups() {
      const self = this;
      self.loading = true;
      try {
        self.url = "/all-contact-groups";
        let response = await self.getAll();
        self.contact_groups = response.data;
        self.loading = false;
      } catch (err) {}
    },

    async deleteContactGroup(id) {
      const self = this;
      self.url = "/delete-contact-group";

      let response = self.delete(id);
      self.getAllContactGroups();
    },
  },
};
</script>