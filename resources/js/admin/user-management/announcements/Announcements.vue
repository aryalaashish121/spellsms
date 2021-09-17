<template>
  <div data-aos="zoom-out" data-aos-duration="1000" class="p-5 md:px-3 md:py-2">
    <CreateAnnouncement ref="createAnnouncement"> </CreateAnnouncement>
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
      :items="announcements"
      class="shadow-md border rounded-md"
      :search="search"
      item-key="message"
      show-select
    >
      <template v-slot:top>
        <v-toolbar flat class="rounded-md">
          <v-toolbar-title>
            <v-icon class="pb-1" left> mdi-bullhorn </v-icon>
            <span class="text-base"> Announcements </span>
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
            color="orange"
            class="capitalize"
            v-on:click="createAnnouncement"
          >
            <v-icon left small> mdi-bullhorn </v-icon>
            Create Annoucement
          </v-btn>
        </v-toolbar>
      </template>

      <template v-slot:[`item.status`]="{ item }">
        <v-icon size="20" color="primary" v-if="item.status == 'Active'">
          mdi-check-circle-outline
        </v-icon>

        <v-icon v-else color="error" size="20">
          mdi-close-circle-outline
        </v-icon>
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
import CreateAnnouncement from "./Add";
export default {
  components: { CreateAnnouncement },
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
          text: "Announcements",
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
        { text: "Created By", value: "created_by" },
        { text: "Message", value: "message" },
        { text: "Display to", value: "display_to" },
        { text: "Status", value: "status" },
        { text: "Actions", value: "actions", sortable: false },
      ],

      announcements: [
        {
          sn: "1",
          created_by: "Spell Innovation",
          message: "Maintenance Starts From 3rd Ashoj",
          display_to: "All Users & Resellers",
          status: "Active",
        },
        {
          sn: "2",
          created_by: "Spell Innovation",
          message: "Clear fees by 1st Ashoj",
          display_to: "Only All Resellers",
          status: "Inactive",
        },
      ],
    };
  },

  methods: {
    createAnnouncement() {
      const self = this;
      self.$refs.createAnnouncement.create();
    },
  },
};
</script>